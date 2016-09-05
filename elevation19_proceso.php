	

<?php
################################################################################
##              			-= Grupo Leitz =-					               #
## --------------------------------------------------------------------------- #
##  Diseño PHP 			                                                       #
##  Desarrollado por :  Eduardo Garcia Pacheco                                 # 
##  License:       GNU GPL v.2                                                 #
##  Site:          http://www.grupoleitz.com			                       #
##  Copyright:     (c) 2010 Derechos Reservados.  	        				   #
##                                                                             #
##  Modulos Adicionales(embedded):                                             #
##  -- 960CSS 		                        					http://960.gs/ #
##  -- jQuery 		                                        http://jquery.com/ #
##                                                                             #
################################################################################

//Autenticación del sitio

//Conexiones a la base de datos
require_once("inc/config.inc.php");
require("inc/Database.class.php"); 
$db = Database::obtain(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
$db->connect(); 
$op = isset($_GET['op']) ? $_GET['op'] : "";
$pk = isset($_GET['pk']) ? $_GET['pk'] : "";
$idcorte= isset($_GET['idcorte']) ? $_GET['idcorte'] : "";

function correo($email,$msg,$asunto){

$adireccion=$email;
if($asunto=="") {$asunto ="Mensaje de Elevation19 ";};
$remitente="servicioalcliente@elevation19.com";
	// MIME BOUNDARY 
	//$mime_boundary = "----Email_Boundary----".md5(time()); 
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: Elevation19 <$remitente>\r\n";
$headers .= "Reply-To: $remitente\n"; 
$headers .= "Organization: elevation19.com\r\n";
$headers .= "MIME-Version: 1.0\n"; 
//Define multipart boundary
//$headers .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n"; 

//$headers .= "Reply-To: $remitente\r\n";
//$headers .= "Return-path: $remitente\r\n"; 
//$headers .= "Bcc: copiamensaje@misitio.com\r\n";
$contenidomail= '
<html>
<head>
<title>Elevation19</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css"> 
	.ReadMsgBody { width: 100%;}
	.ExternalClass {width: 100%;}
</style>

</head>
<body bgcolor="#e8e8e8">
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#e8e8e8">
	<tr>
		<td valign="top" align="center">
    
    	<br>
			<table width="600" border="0" cellspacing="0" cellpadding="0">
				<tr>
        	<td align="left" width="20">&nbsp;</td>
					<td align="left" style="font-size:1px;"><a href="http://www.elevation19.com/" target="_blank" title="Elevation19"><img src="http://www.rebajashn.com/elevation19/assets/img/email.png" border="0" style="display:block;" alt=""></a></td>
          <td align="right" valign="bottom" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#999999; line-height:20px;">
          	Preguntas sobre Elevation19? <a href="http://www.elevation19.com/faq.php" target="_blank" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#777777;"><span style="color:#777777;">Click Aqui</span></a>.<br>
            <a href="http://www.elevation19.com/quienes.php" target="_blank" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#777777;"><span style="color:#777777;">Quienes Somos</span></a>&nbsp; | &nbsp; <a href="http://www.elevation19.com/" target="_blank" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#777777;"><span style="color:#777777;">Visitanos</span></a>
          </td>
          <td align="left" width="20">&nbsp;</td>
				</tr>
			</table>
      <br>
      
      <table width="600" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td bgcolor="#ffffff">
          	<div style="padding-bottom:20px;">
            	<br>
              <table width="599" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="20">&nbsp;</td>
                  <td valign="top">
                  	<table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="left" style="font-family:Georgia, Times New Roman, Times, serif; font-size:24px; color:#000000; padding-bottom:10px;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000; line-height:19px; padding-bottom:13px;">'.$msg.'</td>
                      </tr>
                      <tr>
                        <td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:17px; font-weight:bold; color:#ffffff;">
                        	
                          <table border="0" cellspacing="0" cellpadding="0" height="100%">
                            <tr>
                            	<td bgcolor="#448f01" width="10">&nbsp;</td>
                              <td bgcolor="#448f01" height="36" align="left"><span style="color: #ffffff"><a href="http://www.elevation19.com" target="_blank" style="color:#ffffff;">Visitanos</a></span></td>
                            	<td bgcolor="#448f01" width="10">&nbsp;</td>
                            </tr>
							
                          </table>
                        
                        </td>
                      </tr>
                    </table>
					<br/>
					<span style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#777777;"> Cualquier pregunta me la puedes hacer saber y con gusto te la responderemos. <br/> Que disfrutes de ELEVATION19.COM !</span><br/>
					<br/><span style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#777777;">Saludos,<span></br>
					<br/><span style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#777777;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jorge Ocampo<br/> Gerente de Operaciones</strong></span>
                  </td>
                  <td width="20">&nbsp;</td>
                </tr>
              </table>
            </div>
          </td>
        </tr>
      </table><br>
            
      <table width="560" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#999999;">           Toda la información y los adjuntos en este mensaje es confidencial y privilegiada. Solamente los destinatarios están autorizados para usar esta información. Las transmisiones de correos electrónicos no están garantizadas y no son seguras o libres de errores y la empresa no acepta responsabilidad por error u omisiones. La empresa no acepta ninguna responsabilidad con respecto a cualquier comunicación que haya sido emitida incumpliendo nuestra política de e-mail.
          </td>
        </tr>
        <tr>
        	<td style="border-bottom:1px solid #cccccc;">&nbsp;</td>
        </tr>
        <tr>
        	<td>&nbsp;</td>
        </tr>
        <tr>
<td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#999999;">ELEVATION19.COM<span style="color: #777777"><br/>Todos los Derechos reservados</span></td>        </tr>
      </table>
      <br><br>
      
		</td>
	</tr>
</table>

</body>
</html>
';
mail ($adireccion, $asunto, $contenidomail,$headers);

};

//Generar el la clave
function gencodigo() {
    $length = 6;
    $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
    $string = '';    
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) -1)];
    }
    return $string;
};



switch ($op) {
      case 1:
      			//Crear la nueva usuario
				 if( $_REQUEST["name"] )
					{
					   $name = $_REQUEST['name'];
					   $id = $_REQUEST['id'];
					}
								
                    parse_str($name, $searcharray);
					date_default_timezone_set('America/El_Salvador');
					$usuario['usuario'] = $searcharray['correo'];
					$usuario['clave'] 	 = md5($searcharray['clave']);
					$usuario['nombres'] = $searcharray['nombres'];
					$usuario['apellidos'] 	 = $searcharray['apellidos'];
					$usuario['genero'] 	 = $searcharray['sexo'];
					$usuario['dia'] 	 = $searcharray['dia'];
					$usuario['mes'] 	 = $searcharray['mes'];
					$usuario['anio'] 	 = $searcharray['anio'];
					$usuario['ciudad'] 	 = $searcharray['ciudad'];
					$usuario['administrativo'] 	 ="no";
					$usuario['activo'] 	 = "si";
					$usuario['ultima_visita'] 	 = date('Y-m-d H:i:s');
			    	$pass=$searcharray['clave'];
					$user=$searcharray['correo'];
					
					
					
					 $sql="SELECT * FROM el_usuarios WHERE usuario='$user'";
					$result = $db->query($sql); 
					if($db->affected_rows > 0)
							
							$existe= 1;
						else
							$existe= 0;
					
					//echo $existe;
					if($existe==1){
					    
					}else{
					
					// Insertar datos en la tabla de estilos
					$almacenar = $db->insert("el_usuarios", $usuario);
				    //echo " Generando por favor espere...";
					//crear la session y loginear la nuevo usuario
					$usuario = $searcharray['correo']; 
					$clave   = md5($searcharray['clave']); 
					$sql = "SELECT * FROM el_usuarios WHERE usuario='$usuario' and clave='$clave'";
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
						 //enviar el correo con la nueva clave al usuario
						 $nom=$member['nombres'];
						 $msg="<strong style='font-size:12px'>Hola,</strong>".$nom."<br/> <strong style='font-size:12px'>Para la comunidad de Elevation19 es un placer que estés con nosotros.</strong> Te damos la más cordial de las bienvenidas <br/>------------------------<br/>"."Su cuenta es: ".$usuario."<br/>Su clave es: ".$pass."<br/>------------------------<br/>" ;
						$asunto="Bienvenido a Elevation19";
						correo($usuario,$msg,$asunto);
						
						//actualizar la visita
							$actua="update el_usuarios set visitas=visitas+1 where usuario='$usuario'";
							//echo $actua;
							$modi=$db->query($actua);	
						//redireccionar al sitio de miembros
						
						// echo "<script type='text/javascript'> window.location = 'members/start.php'; </script>";?>
						
							 echo "<script type='text/javascript'> window.location = 'members/start.php'; </script>";
						<?php
		     
	
					   }
					};
					
      break;
      
	  case 2:
              if( $_REQUEST["name"] )
					{
					   $name = $_REQUEST['name'];
					   $id = $_REQUEST['id'];
					}
								
                    parse_str($name, $searcharray);
					date_default_timezone_set('America/El_Salvador');
					//Prevenir losSQL injection
					function clean($str) {
						$str = @trim($str);
						if(get_magic_quotes_gpc()) {
							$str = stripslashes($str);
						}
						return mysql_real_escape_string($str);
					}
	
					$usuario = clean($searcharray['user']); 
					$clave   = md5(clean($searcharray['pass'])); 
					//$recordarme=$searcharray['recuerda'];
				    $sql = "SELECT * FROM el_usuarios WHERE usuario='$usuario' and clave='$clave'";
					$result = $db->query($sql); 
					if($db->affected_rows > 0){
						echo '<img src="assets/img/loading.gif"><strong style:"color:white">Ingresando..</strong>';
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
						//crear el cookie
						$recordarme = isset($_GET['recordarme']) ? $_GET['recordarme'] :"0";
						if ($recordarme==1)
						{
						  //$number_of_days = 5 ;
						  //$date_of_expiry = time() + 60 * 60 * 24 * $number_of_days ;
						  //setcookie( "$_SESSION['SESS_USUARIO']", "anonymous", $date_of_expiry );
						};
					
						 
						
						//actualizar la visita
							$actua="update el_usuarios set visitas=visitas+1 where usuario='$usuario'";
							//echo $actua;
							$modi=$db->query($actua);	
						//redireccionar al sitio de miembros
						
						 echo "<script type='text/javascript'> window.location = 'members/start.php'; </script>";
						
						  
	
					}
					else{
						echo '<img src="assets/img/importante.png"> <strong>El usuario o la clave no es correcta.</strong>';
					}
				
				
				
				 
				
      break;
	  
	 case 3:
           //Crear la nueva usuario
				 if( $_REQUEST["name"] )
					{
					   $name = $_REQUEST['name'];
					   $id = $_REQUEST['id'];
					}
								
                    parse_str($name, $searcharray);
					date_default_timezone_set('America/El_Salvador');
					$correor = $searcharray['email'];
					$dia 	 = $searcharray['day'];
					$mes 	 = $searcharray['month'];
					$anio 	 = $searcharray['year'];
					
				//verificar si el cupon ya fue asignado al usuario y esta en fecha
			 $sql="SELECT * FROM el_usuarios WHERE usuario='$correor' and dia=$dia and mes=$mes and anio=$anio;";
				$row = $db->query_first($sql);
				//echo $sql;
				// if user exists
				if(!empty($row['id_usuario']))
				  {
					//generar el codigo
					$nueva_clave=gencodigo();
					//echo "nueva clave: ".$nueva_clave;
					//$clave_nueva=sha1(md5($nueva_clave));
					//enviar el correo con la nueva clave al usuario
					
					 $nom=$row['nombres'];						
					 //echo $nom;
					 $msg=$nom."<br/>------------------------<br/>"."Su cuenta es: ".$correor."<br/>Su clave nueva es: ".$nueva_clave."<br/>------------------------<br/>" ;
					 //echo $msg;	
					 correo($correor,$msg);
						
					//sustituir la nueva clave en la base de datos
						$sql2="UPDATE el_usuarios set clave=md5('$nueva_clave') where id_usuario=$row[id_usuario]";
						//echo $sql2;
						$activar=$db->query($sql2);  
						echo "La nueva clave ha sido enviada con Exito!!";
				  }else{
					echo "Algunos de los datos son Incorrectos!!";  
				  };
				
      break;
	  case 4:
           
				 echo "El registro ha sido actualizado con exito";
				
				
      break;
	  
	 
}//fin del caso





?>
