<?php
################################################################################
##              			-= Grupo Leitz=- 				                   #
## --------------------------------------------------------------------------- #
##  SAC, Sistema de Apoyo y Control                                            #
##  Desarrollado por:  Grupo Leitz <info@grupoleitz.com>                       # 
##  Licencia:      Russell corp                                                #
##  Site:          http://www.grupoleitz.com		                           #
##  Copyright:     Grupo Leitz (c) 2010. All rights reserved.                  #
##                                                                             #
##  Pagina:      login-execute.php                                             #
##  Descripcion: Pagina realiza la auten. del usuario y asigna las variables   #
##               de sesion                                                     #
##                                                                             #
##                                                                             #
################################################################################
	//sesion de 8 horas
	//$sessionCookieExpireTime=8*60*60;
 	//$sessionCookieExpireTime=2*60;
	//session_set_cookie_params($sessionCookieExpireTime);
	//session_set_cookie_params('60'); // 10 minutes.
	//Start session
	session_start();
  
	//Incluir la base de datos y el php de verificacion de usuarios
	require_once('../interface/inc/config.inc.php');
	require_once('verifica.php');
	//Array to store validation errors
	$errmsg_arr = array();
	//Validation error flag
	$errflag = false;
	//Connect to mysql server
	$link = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
	if(!$link) {
		die('Fallo al conectar al sever de base de datos: ' . mysql_error());
	}
	//Seleccionar la base de datos
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {die("No se pudo seleccionar la base de datos");	}
	
	//Prevenir losSQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$login = clean($_POST['login']);
	$password = clean($_POST['password']);
		
	//Crear el query
	$qry="SELECT * FROM members WHERE login='$login' AND password='".$_POST['password']."'";
	$result=mysql_query($qry);
	
	//variable para redireccion inicialmente 0 para ir al login
	$redireccionar=0;
	//Ver si hay resultado de la seleccion del usuario y clave
	if(mysql_num_rows($result)== 1) 
	{
		 
         //crear la nueva session
			session_regenerate_id();
			$new_sessionid = session_id();
		 //crear las variables de session	
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['member_id'];
			$_SESSION['SESS_USER'] = $member['login'];
			$_SESSION['SESS_FIRST_NAME'] = $member['firstname'];
			$_SESSION['SESS_LAST_NAME'] = $member['lastname'];
			$_SESSION['SESS_PIC'] = $member['pic'];
			$_SESSION['SESS_TYPE'] = $member['type'];
			$_SESSION['SESS_GROUP'] = $member['grupo'];
			$_SESSION['SESS_TURNO'] = $member['turno'];
			$_SESSION['SESS_ROTA'] = $member['rota'];
			$_SESSION['SESS_PUESTO'] = $member['puesto'];
			$_SESSION['SESS_AREA'] = $member['area'];
			$_SESSION['SESS_MURO'] = $member['muro'];
			$_SESSION['SESS_MSG'] = $member['msg'];
			//$_SESSION['adm_logged'] == true;
			$_SESSION['SESS_IP']=$_SERVER['REMOTE_ADDR'];
			 $_SESSION['timeout'] = time();
		
	     //proceso para verificar si esta en su horario de trabajo 
		 	  //colocar el usuario en linea
				// enlinea();
				 //redireccionar a la interface de sistema
				  $redireccionar=1;
			session_write_close();
		  $iniciar=true;
		  //echo $iniciar;
			if ($iniciar)
			{
			     //colocar el usuario en linea
				 enlinea();
				 //redireccionar a la interface de sistema
				  //$redireccionar=1;
				   
				  echo 1;
			}else{
				
				//redireccionar a la interface de sistema
				  $redireccionar=0;
				  $error='Acceso Denegado el Usuario o Clave no es valido.';
                  echo 3;
			};//fin del si de iniciar 
		 
	
	
	}else {
	  //die("Query failed");
      	//redireccionar a la interface de sistema
				  $redireccionar=0;
				  $error='Acceso Denegado el Usuario o Clave no es valido.';
				  echo 2;
	}//fin del si $result

?>

