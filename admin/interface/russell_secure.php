<?php 

session_start();
	
if(empty($_SESSION['SESS_MEMBER_ID']))
	header("Location:../index.php");	

 function cerrar_session($userid)
 {
    $sql_u="UPDATE  members_session SET  online=0,hora_s=CURRENT_TIME() WHERE  user_id =$userid and fecha=CURRENT_DATE();";
			   echo $sql_u;
			  mysql_query($sql_u);
 };

// Tiempo 
$now = time();

// tiempo en que va a termina la session
$limit = $now - 60 * 30;

// ver la ultima activida en el sitio
if (isset ($_SESSION['ultima_visita']) && $_SESSION['ultima_visita'] < $limit) {
  // si se pasa destruir la session y sacarlo la login
  $_SESSION = array();
  header('Location: ../index.php');
  exit;
} else {
  // si la sesion esta dentro de limite y se da actividad reinicar el contador de tiempo
  $_SESSION['ultima_visita'] = $now;
}


//salir del sistema
if(isset($_GET['logout']))
{
	//include '../auth/russell_verifica.php';
	// cerrar_session($_SESSION['SESS_MEMBER_ID']);
	$userid=$_SESSION['SESS_MEMBER_ID'];
	 $sql_u="UPDATE members_session SET online=0,hora_s=CURRENT_TIME() WHERE user_id =$userid and fecha=CURRENT_DATE();";
			   //echo $sql_u;
			 $result = mysql_query($sql_u);
			 if (!$result) {
    die('Invalid query: ' . mysql_error());
}

	session_unset();
	session_destroy();
	
	header("Location:../index.php");
}	



?>
