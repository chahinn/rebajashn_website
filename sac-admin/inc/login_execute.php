<?php
/*
	@! SAC_ADMIN v3.0
	@@ Sistema de apoyo y control administrativo
-----------------------------------------------------------------------------	
	** author: Eduardo Garcia
	** website: http://www.grupoletiz.com
	** email: egarciazd@gmail.com
-----------------------------------------------------------------------------
	@@package: DashBoard 1.0
*/


session_start();
  
	//Incluir la base de datos y el php de verificacion de usuarios
	require_once('database.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	//Validation error flag
	$errflag = false;
	//Connect to mysql server
	$link = mysql_connect($db_server, $db_user, $db_password);
	if(!$link) {
		die('Fallo al conectar al sever de base de datos: ' . mysql_error());
	}
	//Seleccionar la base de datos
	$db = mysql_select_db($db_name);
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
	$login = clean($_POST['username']);
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
		
	       //crear el cookie si se solicto el recordar por el usuario
	       if($subremember){
      			
				$numero_de_dias = 30 ;
				$valido_hasta   = time() + 60 * 60 * 24 * $numero_de_dias ;
				
						        
		        setcookie("cookname", $_SESSION['SESS_USER'], $valido_hasta);
		        setcookie("cookid",   $_SESSION['SESS_MEMBER_ID'],$valido_hasta);
		      }
				 
		   //Enviar el ok del login
		   echo 1;
		 
	
	
	}else {
	  //die("Query failed");
     
				  echo 2;
	}//fin del si $result








?>