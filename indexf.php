<?php ob_start(); session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SONHLAB Social Auth PHP Plugin Demo - Login</title>
<meta name="description" content="This is a demo of SONHLAB Social Auth PHP Plugin. This Plugin is free and easy to use" />

<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8"/>

<link href='http://fonts.googleapis.com/css?family=Droid+Sans|Cuprum' rel='stylesheet' type='text/css'>


</head>

<body>
	
<div id="header">
	<h1><a href="http://www.elvation19.com" style="color:#1e1e1e;">Elevation19.com </a></h1>
</div>


<?php if ( !isset($_SESSION["userprofile"]) ) { ?>
<div id="login_zone">
	
	<div id="login_zone_title">Redes Sociales</div>
	<div id="login_zone_confirm">
    	<!--
		<a href="auth/login.php?app=facebook">
           	<img src="images/facebook_login_bt.png" alt="facebook_login_button" />
		</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="auth/login.php?app=twitter">
			<img src="images/twitter_login_bt.png" alt="twitter_login_button" />
		</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="auth/login.php?app=google">
			<img src="images/googleplus_login_bt.png" alt="googleplus_login_button" />
		</a><br />&nbsp;
		 
		-->
		<img src="assets/img/center.png" alt="facebook">	
	</div>
	<div class="clearspace"></div>
</div>

<?php } else { unset ($_SESSION['app']); ?>
<div id="login_zone" style="width:960px;">
	<div id="login_zone_confirm">
    <a href="auth/logout.php">Logout</a>
    <br /><br />
    <div style="text-align:left;">
	<pre>
    	<?php //print_r($_SESSION["userprofile"]); 
		$user_profile=$_SESSION["userprofile"];
		
		
		  //Conexiones a la base de datos
require_once("../inc/config.inc.php");
require("../inc/Database.class.php"); 
$db = Database::obtain(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
$db->connect(); 
  //verificar que el usuario este para crear la session sino crearlo y generar la session
	   $usr=$user_profile['email'];
	   
	   $sql = "SELECT * FROM el_usuarios WHERE usuario='$usr'";
	   echo $sql;
		$result = $db->query($sql); 
		if($db->affected_rows > 0){
          // echo "ya esta registrado";
		   //session_start();
						session_regenerate_id();
						$new_sessionid = session_id();
						//crear las variables de session	
						$member = mysql_fetch_assoc($result);
						$_SESSION['SESS_USUARIO_ID'] = $member['id_usuario'];
						$_SESSION['SESS_USUARIO'] = $member['usuario'];
						$_SESSION['SESS_NOMBRES'] = $member['nombres'];
						$_SESSION['SESS_APELLIDOS'] = $member['apellidos'];
						$_SESSION['SESS_PIC'] = $member['img'];
						$_SESSION['SESS_CIUDAD']= $member['ciudad'];
					 echo "<script type='text/javascript'> window.location = 'http://rebajashn.com/elevation19/members/start.php'; </script>";
						//header("Location: http://www.elevation19.com/members/start.php");
        }else{
		 // echo "El usuario no esta registrado";
		  //varibles para almacenar los datos
		          date_default_timezone_set('America/El_Salvador');
					$usuario['usuario'] = $user_profile['email'];
					$usuario['id_fb'] = $user_profile['id'];
					$usuario['clave'] 	 = md5('elevation19');
					$usuario['nombres'] = $user_profile['first_name'];
					$usuario['apellidos'] 	 = $user_profile['last_name'];
					$sexo=$user_profile['gender'];
					if ($sexo=='male') {$sexo="Hombre";};
					if ($sexo=='female') {$sexo="Mujer";};
					$usuario['genero'] 	 = $sexo;
					$dateArray=explode('/',$user_profile['birthday']);
					echo $dateArray[1].$dateArray[2].$dateArray[0];
					$usuario['dia'] 	 = $dateArray[1];
					$usuario['mes'] 	 = $dateArray[0];
					$usuario['anio'] 	 = $dateArray[2];
     				$usuario['ciudad'] 	 = 1;
					$usuario['administrativo'] 	 ="no";
					$usuario['activo'] 	 = "si";
					$usuario['ultima_visita'] 	 = date('Y-m-d H:i:s');
		        //print_r($usuario);
				// Insertar datos en la tabla de usuarios
					$almacenar = $db->insert("el_usuarios", $usuario);
					$sql = "SELECT * FROM el_usuarios WHERE usuario='$usr'";
					$result = $db->query($sql); 
					if($db->affected_rows > 0){
						//echo '<img src="assets/img/loading.gif"><strong style:"color:white">Ingresando..</strong>';
						//crear la nueva session
						session_start();
						session_regenerate_id();
						$new_sessionid = session_id();
						//crear las variables de session	
						$member = mysql_fetch_assoc($result);
						$_SESSION['SESS_USUARIO_ID'] = $member['id_usuario'];
						$_SESSION['SESS_USUARIO'] = $member['usuario'];
						$_SESSION['SESS_NOMBRES'] = $member['nombres'];
						$_SESSION['SESS_APELLIDOS'] = $member['apellidos'];
						$_SESSION['SESS_PIC'] = $member['img'];
						$_SESSION['SESS_TYPE'] = $member['administrativo'];
						$_SESSION['SESS_SEXO']= $member['genero'];
						$_SESSION['SESS_CIUDAD']= $member['ciudad'];
						/*		
						//enviar el correo con la nueva clave al usuario
						 $nom=$member['nombres'];
						 $msg="<strong style='font-size:12px'>Hola,</strong>".$nom."<br/> <strong style='font-size:12px'>Para la comunidad de Elevation19 es un placer que estés con nosotros.</strong> Te damos la más cordial de las bienvenidas <br/>------------------------<br/>"."Su cuenta es: ".$usuario."<br/>Su clave es: ".$pass."<br/>------------------------<br/>" ;
						$asunto="Bienvenido a Elevation19";
						correo($usuario,$msg,$asunto);
						*/
						//actualizar la visita
							$actua="update el_usuarios set visitas=visitas+1 where usuario='$usr'";
							//echo $actua;
							$modi=$db->query($actua);	
						//redireccionar al sitio de miembros
						
						// echo "<script type='text/javascript'> window.location = 'members/start.php'; </script>";
						 echo "<script type='text/javascript'> window.location = 'http://rebajashn.com/elevation19/members/start.php'; </script>";
						//header("Location: http://www.elevation19.com/members/start.php");
	
					   }
		};	
		
		
		
		?>
    </pre>
    </div>
	
	<?php// print_r($user_profile); ?>
    <br /><br />
    <a href="auth/logout.php">Logout</a>
	</div>
</div>
<?php } ?>


</body>
</html>



<?php ob_end_flush(); ?>