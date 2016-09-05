<?php 

session_start();
	
if(empty($_SESSION['SESS_USUARIO_ID']))	header("Location:../index.php");	

 
//salir del sistema
if(isset($_GET['logout']))
{
	//include '../auth/russell_verifica.php';
	// cerrar_session($_SESSION['SESS_MEMBER_ID']);
	//$userid=$_SESSION['SESS_MEMBER_ID'];
	 //$sql_u="UPDATE members_session SET online=0,hora_s=CURRENT_TIME() WHERE user_id =$userid and fecha=CURRENT_DATE();";
			   //echo $sql_u;
		//	 $result = mysql_query($sql_u);
		//	 if (!$result) {
    //die('Invalid query: ' . mysql_error());


	session_unset();
	session_destroy();
	header("Location:../index.php");
}	


?>
