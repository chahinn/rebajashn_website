<?php
################################################################################
##              			-= Grupo Leitz =-					               #
## --------------------------------------------------------------------------- #
##  Dise�o PHP 			                                                       #
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

//Autenticaci�n del sitio, por si quieren accederlo directamente mandarlos a un 404
/*
a = &aacute
� = &eacute
� = &iacute
� = &oacute
� = &uacute
� = &ntilde
*/

//Conexiones a la base de datos
require_once("../inc/config.inc.php");
require("../inc/Database.class.php"); 
$db = Database::obtain(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
$db->connect(); 
$op = isset($_GET['op']) ? $_GET['op'] : "";
$pk = isset($_GET['pk']) ? $_GET['pk'] : "";
$idcorte= isset($_GET['idcorte']) ? $_GET['idcorte'] : "";

function correo($email,$msg){

$adireccion=$email;
$asunto ="Mensaje de Elevation19 ";
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
					<td align="left" style="font-size:1px;"><a href="http://www.elevation19.com/" target="_blank" title="Elevation19"><img src="http://elevation19.educatehn.net/assets/img/center.png" width="235" height="104" border="0" style="display:block;" alt="Elevation19"></a></td>
          <td align="right" valign="bottom" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#999999; line-height:20px;">
          <br>
            <a href="http://www.elevation19.com/" target="_blank" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#777777;"><span style="color:#777777;">Visitamos</span></a>&nbsp; | &nbsp;<a href="http://www.yourcompanywebsiteaddress.com/forward/" target="_blank" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#777777;"><span style="color:#777777;">Forward to a friend</span></a>&nbsp; | &nbsp;<a href="http://www.yourcompanywebsiteaddress.com/unsubscribe/" target="_blank" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#777777;"><span style="color:#777777;">Unsubscribe</span></a>
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
                        <td align="left" style="font-family:Georgia, Times New Roman, Times, serif; font-size:24px; color:#000000; padding-bottom:10px;">Saludos</td>
                      </tr>
                      <tr>
                        <td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000; line-height:19px; padding-bottom:13px;">'.$msg.'</td>
                      </tr>
                      <tr>
                        <td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:17px; font-weight:bold; color:#ffffff;">
                        	
                          <table border="0" cellspacing="0" cellpadding="0" height="36">
                            <tr>
                            	<td bgcolor="#448f01" width="10">&nbsp;</td>
                              <td bgcolor="#448f01" height="36" align="left"><span style="color: #ffffff">Visitanos</span></td>
                            	<td bgcolor="#448f01" width="10">&nbsp;</td>
                            </tr>
                          </table>
                        
                        </td>
                      </tr>
                    </table>
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
          <td align="left" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#999999;">           Toda la informaci�n y los adjuntos en este mensaje es confidencial y privilegiada. Solamente los destinatarios est�n autorizados para usar esta informaci�n. Las transmisiones de correos electr�nicos no est�n garantizadas y no son seguras o libres de errores y la empresa no acepta responsabilidad por error u omisiones. La empresa no acepta ninguna responsabilidad con respecto a cualquier comunicaci�n que haya sido emitida incumpliendo nuestra pol�tica de e-mail.
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


//buscar la foto
function buscar_foto($usuarioid,$db)
	{
		$sql = "SELECT * FROM el_usuarios WHERE id_usuario=$usuarioid";
		$row = $db->query($sql); 
		if($db->affected_rows > 0){
		  $record = $db->query_first($sql);
		  
		  // if user exists
    if($record['img']<>""){
	   $img="img_users/".$record['img'];
        return $img;
    }else{
		$img="../assets/img/avatar.png";
    	return $img;
		};
		
		}
	
	
	};	

//validar correo
function check_email_address($email) {
$mail_correcto = false; 
   	//compruebo unas cosas primeras 
   	if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){ 
      	 if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) { 
         	 //miro si tiene caracter . 
         	 if (substr_count($email,".")>= 1){ 
            	 //obtengo la terminacion del dominio 
            	 $term_dom = substr(strrchr ($email, '.'),1); 
            	 //compruebo que la terminaci�n del dominio sea correcta 
            	 if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){ 
               	 //compruebo que lo de antes del dominio sea correcto 
               	 $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1); 
               	 $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1); 
               	 if ($caracter_ult != "@" && $caracter_ult != "."){ 
                  	 $mail_correcto = true; 
               	 } 
            	 } 
         	 } 
      	 } 
   	} 
   	if ($mail_correcto) 
      	 return true; 
   	else 
      	 return false; 
} 
	
//buscar la ciudad
function buscar_ciudad($ciudad,$db)
	{
		$sql = "SELECT * FROM el_area WHERE id_area=$ciudad";
		$row = $db->query($sql); 
		if($db->affected_rows > 0){
		  $record = $db->query_first($sql);
		   return $record['ciudad'];
		}
	
	
	};

//buscar la empresa
function buscar_empresa($empid,$db)
	{
		$sqle="SELECT * FROM el_empresas where id_empresa=$empid";
		$rowe = $db->query($sqle); 
		if($db->affected_rows > 0){
		  $recorde = $db->query_first($sqle);
		   return $recorde['empresa'];
		}
	
	
	};	
 include("time_stamp.php"); 

switch ($op) {
      case 1:
      			//Actualizar los datos del usuario en el perfil
				 if( $_REQUEST["name"] )
					{
					   $name = $_REQUEST['name'];
					   $id = $_REQUEST['id'];
					}
								
                    parse_str($name, $searcharray);
					date_default_timezone_set('America/El_Salvador');
					$user=$searcharray['correo'];
					//ver si hay cambio de clave
					 $clave=$searcharray['clave'];
					 if($clave<>"")
					  {
					$usuario['clave'] 	 = md5($searcharray['clave']);};
					$usuario['nombres'] = $searcharray['nombres'];
					$usuario['apellidos'] 	 = $searcharray['apellidos'];
					$usuario['genero'] 	 = $searcharray['sexo'];
					$usuario['dia'] 	 = $searcharray['dias'];
					$usuario['mes'] 	 = $searcharray['mes'];
					$usuario['anio'] 	 = $searcharray['anio'];
					$usuario['ciudad'] 	 = $searcharray['ciudad'];
					//verificar si la cuenta de correo esta siendo cambiada
					 $sql = "SELECT * FROM el_usuarios WHERE usuario='$user'";
					$result = $db->query($sql); 
					if($db->affected_rows > 0){
					   // ver si es el mismo usuario para no hacer nada
					   $member = mysql_fetch_assoc($result);
					   if($user==$member['usuario']) 
					    {
						  //echo "Es el mismo";
						
						}
					}else{
					     $usuario['usuario'] = $searcharray['correo'];
					}
					session_start();
			    	 $u=$_SESSION['SESS_USUARIO_ID'];
					// Insertar datos en la tabla de estilos
					 $almacenar = $db->update("el_usuarios", $usuario,"id_usuario=$u");
				    echo "<strong><i style='font-size: 20px; color: #468847' class='iconic-check'></i> Informaci&oacuten actualizada con &eacutexito</strong>";
					//crear la session y loginear la nuevo usuario
					
					
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
				    $sql = "SELECT * FROM el_usuarios WHERE usuario='$usuario' and clave='$clave'";
					$result = $db->query($sql); 
					if($db->affected_rows > 0){
						echo "Ingresa";
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
						
						//actualizar la visita
							$actua="update el_usuarios set visitas=visitas+1 where usuario='$usuario'";
							//echo $actua;
							$modi=$db->query($actua);	
						//redireccionar al sitio de miembros
						
						 echo "<script type='text/javascript'> window.location = 'members/start.php'; </script>";
						
						  
	
					}
					else{
						echo "Error: no ingresa.";
					}
				
				
				
				 
				
      break;
	  
	 case 3:
            //registrar el cupon 
		     //proceso para asignar un cupon mediante el boton de imprimir cupon
		     $imp = isset($_GET['imp']) ? $_GET['imp'] : "";
	        if( $_REQUEST["name"] )
				{
				   $name = $_REQUEST['name'];
				   $id = $_REQUEST['id'];
				   //echo $id;
				   //echo $name;
				}
				
				parse_str($name, $searcharray);
				
				//Obtener la variables que no son arreglos
					$data['cupon_id'] 	    = $searcharray['cupon_id'];
					$data['codigo']   	 	= $searcharray['codigo'];
					$data['usuario'] 	 	= $searcharray['usuario'];
					$data['desde'] 			= $searcharray['desde'];
					$data['hasta'] 		 	= $searcharray['hasta'];
					$data['empresa_id'] 	= $searcharray['empresa_id'];
					$email		 			= $searcharray['email'];
				$ofertaid=$searcharray['cupon_id'];
					$user= $searcharray['usuario'];
				//verificar si el cupon no tiene limite de aquisicion
				 $sql_cupon="SELECT * FROM el_cupones where id=$ofertaid";
				 //echo $sql_cupon;
				 $oferta =  $db->query_first($sql_cupon);
				 $correor=$email;
				 $adquiridos=$oferta['adquiridos']+$oferta['impresos'];
				if($oferta['limiteadquirir']==0 || $adquiridos >=$oferta['limiteadquirir'] ){
					 //insertar el cupon seleccionado en la tabla de cupones por usuario
					$acreditar = $db->insert("el_cupones_usuarios", $data);
					//aunmentar los acreditados en 1
					$oferta['impresos'] = "INCREMENT(1)";
					$db->update('el_cupones', $oferta, "id='$ofertaid'");
					//mensaje de salida
					echo "<img src='../assets/img/info.png'> El cup&oacute;n ha sido acreditado con &eacute;xito, gracias";
									 
				}else{
				    //verificar si no se le a otorgado el cupon a este usuario
					$sql="SELECT * FROM el_cupones_usuarios WHERE cupon_id=$ofertaid and usuario=$user";
						$row = $db->query_first($sql);
						// if user exists
						if(!empty($row['id_cupon_usuario']))
							echo "<img src='../assets/img/importante.png'>Ya ha sido acreditado un cup&oacuten a su cuenta, espere a que el mismo este activo para adquirir otro, gracias";
						else{
							//insertar el cupon seleccionado en la tabla de cupones por usuario
							$acreditar = $db->insert("el_cupones_usuarios", $data);
							//aunmentar los acreditados en 1
							$oferta['impresos'] = "INCREMENT(1)";
							$db->update('el_cupones', $oferta, "id='$ofertaid'");
							//mensaje de salida
							echo "<img src='../assets/img/info.png'> El cup&oacuten ha sido acreditado con &eacutexito, verifique su cuenta de correo, gracias";
						};
				
				};		
				
				
      break;
	  case 4:
           //insertar comentario
			 if( $_REQUEST["name"] )
				{
				   $name = $_REQUEST['name'];
				   $id = $_REQUEST['id'];
				   //echo $id;
				   //echo $name;
				}
				
				parse_str($name, $searcharray);
				
				//Obtener la variables que no son arreglos
					$data['oferta_id'] 	 	= $searcharray['oferta_id'];
					$data['f_name']   	 	= $searcharray['nombres'];
					$post			    	= $searcharray['comentario'];
					$data['f_image']		= $searcharray['foto'];
					$data['date_created'] 	= time();
					$data['userip'] 		= $_SERVER['REMOTE_ADDR'];
					$data['rating']			= $searcharray['votos'];
					
					//ver las malas palabras del post
					$censuradas = array("Puta","ptav","put","mierda","mrda","merda","mirda","mierd","culero","culo","culon","clero","culro","culer","pendejo","pndejo","pendej","pndjo","estupido","stupido","stpido","stupdo");
					$censuradas2=array("stupid","cerote","crote","cerot","certe","puta","hijue","puta","idiota","idiot","idota","diota","malparido","pene","pne","pen","sexo","sxo","sex","pija","pja","pij","teta","tet");
					$censuradas3=array("chiches","chiche","chche","cuca","cucv","cca","qk","dick","tits","ass","asshole","poop","pupu","pija","verga","puta","joder","jodido");			
					$mensaje = str_replace($censuradas,"***",$post);
					$mensaje = str_replace($censuradas2,"***",$mensaje);
					$mensaje = str_replace($censuradas3,"***",$mensaje);
					
					$data['post'] 	    	= $mensaje;
					
					$almacenar = $db->insert("el_comments", $data);
					
					$sql="select * from el_comments where oferta_id=$data[oferta_id] order by p_id DESC limit 3";
						$result=mysql_query($sql);
						while($row=mysql_fetch_row($result))
						{
						$time = "$row[5]";
						echo "<div class='tweet_box' id='co_$row[0]'>";?> <a class='close' style="font-size:12px" onclick='$("#data_<?php echo $row['0']?>").show();'>&nbsp; <strong>X</strong></a><?php
						echo "<div class='tweet_user'><img class='user_img' src='".buscar_foto($row[4],$db)."'></div>";
						echo "<div class='tweet_body'>";
						?>
						<div class='tweet_time'><?php time_stamp($time);?></div>
											  
												 
						<?php
						echo "<div><b>$row[2]</b><br/>";
						?>
						<div class="star-rating" id="rating1result<?php echo $row[1]; ?>" style="background-position:0 -<?php echo $row[7] ; ?>px;">
								<div class="star1"></div>
								<div class="star1"></div>
								<div class="star1"></div>
								<div class="star1"></div>
								<div class="star1"></div>
							</div>
						<?php
							echo "</div>";
						echo "<div class='tweet_text'>$row[3]</div>";
						//echo "</div><a  class='btn btn-mini btn-danger' onclick='javascript:borrar($row[4],$row[0]);'> Eliminar</a></div>";
						echo "</div><br/> <div id='data_$row[0]' style='display:none;'>&iquest;Desea eliminar el comentario? <a  class='btn btn-mini btn-danger' onclick='javascript:borrar($row[4],$row[0]);'> Si</a>  -"; ?> <a class='btn btn-mini btn-inverse' onclick='$("#data_<?php echo $row['0']?>").hide();'>No</a><?php 
						echo "</div></div>";
						$ultimo=$row[0];
						}
                      ?>
					   <button class="btn btn-info more" href="#" onclick="javascript:carga_comentarios(3,<?php echo $data['oferta_id']?>)">Mostrar m&aacutes comentarios </button>
					<?php
					
				
				
      break;
	  case 5:
	        //eliminar el comentario de lista
			$idusuario = isset($_GET['idusuario']) ? $_GET['idusuario'] : "";
			$idcomentario = isset($_GET['idcomentario']) ? $_GET['idcomentario'] : "";
			echo "delete from el_comments where f_image=$idusuario and p_id=$idcomentario";
			$eliminar=$db->query("delete from el_comments where f_image=$idusuario and p_id=$idcomentario");
		    //echo "El registro ha sido Eliminado con exito";
			
			
	  break;
	  case 6:
	        $ultimo = isset($_GET['ultimo']) ? $_GET['ultimo'] : "";
			$ofertaid = isset($_GET['ofertaid']) ? $_GET['ofertaid'] : "";
			$ultimo=$ultimo+3;
			
			$sql="select * from el_comments where oferta_id=$ofertaid order by p_id DESC limit $ultimo";
							$result=mysql_query($sql);
						while($row=mysql_fetch_row($result))
						{
						$time = "$row[5]";
						echo "<div class='tweet_box' id='co_$row[0]'>";?> <a class='close' style="font-size:12px" onclick='$("#data_<?php echo $row['0']?>").show();'>&nbsp; <strong>X</strong></a><?php
						echo "<div class='tweet_user'><img class='user_img' src='".buscar_foto($row[4],$db)."'></div>";
						echo "<div class='tweet_body'>";
						?>
						<div class='tweet_time'><?php time_stamp($time);?></div>
											  
												 
						<?php
						echo "<div><b>$row[2]</b><br/>";
						?>
						<div class="star-rating" id="rating1result<?php echo $row[1]; ?>" style="background-position:0 -<?php echo $row[7] ; ?>px;">
								<div class="star1"></div>
								<div class="star1"></div>
								<div class="star1"></div>
								<div class="star1"></div>
								<div class="star1"></div>
							</div>
						<?php
							echo "</div>";
						echo "<div class='tweet_text'>$row[3]</div>";
						//echo "</div><a  class='btn btn-mini btn-danger' onclick='javascript:borrar($row[4],$row[0]);'> Eliminar</a></div>";
						echo "</div><br/> <div id='data_$row[0]' style='display:none;'>&iquest;Desea eliminar el comentario? <a  class='btn btn-mini btn-danger' onclick='javascript:borrar($row[4],$row[0]);'> Si</a>  -"; ?> <a class='btn btn-mini btn-inverse' onclick='$("#data_<?php echo $row['0']?>").hide();'>No</a><?php 
						echo "</div></div>";
						$ultimo=$row[0];
						}
			
			echo "<button class='btn btn-info more' href='#' onclick='javascript:carga_comentarios($ultimo,$ofertaid)'>Mostrar m&aacutes comentarios </button>";
	  break;
	  case 7:
	         //proceso de recomendar
			 if( $_REQUEST["name"] )
				{
				   $name = $_REQUEST['name'];
				   $id = $_REQUEST['id'];
				 
				}
				
				parse_str($name, $searcharray);
				
				//Obtener la variables que no son arreglos
					$correor 	 	= $searcharray['nom_para'];
					$msg   	 		= $searcharray['nom_contenido'];
					$ofertaid 	    = $searcharray['nom_ofertaid'];
					$recomienda		= $searcharray['nom_recomienda'];
					$titulo			= $searcharray['nom_titulo'];
					$descripcion	= $searcharray['nom_descripcion'];

	       
			 //echo $_SERVER['SERVER_NAME'];
			
			 $msg="<br/>".$recomienda.", te recomienda el cup&oacuten <br/>".$titulo."<br/>".$descripcion."<br/>Encuentralo en www.elevation19.com" ;
			 //echo $msg;	
			 correo($correor,$msg);
			 echo "<span style='color:red'>Correo enviado!!";
	  break;
	  case 8:
			//proceso para envia a mi correo el cupon mediante el boton de enviar a mi correo
			  if( $_REQUEST["name"] )
				{
				   $name = $_REQUEST['name'];
				   $id = $_REQUEST['id'];
				}
				parse_str($name, $searcharray);
				//Obtener la variables que no son arreglos
					$data['cupon_id'] 	    = $searcharray['cupon_id'];
					$data['codigo']   	 	= $searcharray['codigo'];
					$data['usuario'] 	 	= $searcharray['usuario'];
					$data['desde'] 			= $searcharray['desde'];
					$data['hasta'] 		 	= $searcharray['hasta'];
					$data['empresa_id'] 	= $searcharray['empresa_id'];
					$email		 			= $searcharray['email'];
					$ofertaid=$searcharray['cupon_id'];
					$user= $searcharray['usuario'];
				//verificar si el cupon no tiene limite de aquisicion
				 $sql_cupon="SELECT * FROM el_cupones where id=$ofertaid";
				 //echo $sql_cupon;
				 $oferta =  $db->query_first($sql_cupon);
				 $correor=$email;
				 $adquiridos=$oferta['adquiridos']+$oferta['impresos'];
				if($oferta['limiteadquirir']==0 || $adquiridos >=$oferta['limiteadquirir'] ){
										
				    //insertar el cupon seleccionado en la tabla de cupones por usuario
					$acreditar = $db->insert("el_cupones_usuarios", $data);
					//aunmentar los acreditados en 1
					$oferta['adquiridos'] = "INCREMENT(1)";
					$db->update('el_cupones', $oferta, "id='$ofertaid'");
					//mensaje de salida
					echo "<img src='../assets/img/info.png'> El cup&oacuten ha sido acreditado con &eacutexito, verifique su cuenta de correo, gracias";
					//enviar el correo
					session_start();
					$nom=$_SESSION['SESS_NOMBRES'];						
					 //echo $nom;
					 $msg=$nom."<br/>------------------------<br/>"."Titulo: ".$oferta['titulo']."C�digo del Cup�n: ".$data['codigo']."<br/>------------------------<br/>" ;
					 //echo $msg;	
					 correo($correor,$msg);
				 
				}else{
				    //verificar si no se le a otorgado el cupon a este usuario
					$sql="SELECT * FROM el_cupones_usuarios WHERE cupon_id=$ofertaid and usuario=$user";
						$row = $db->query_first($sql);
						// if user exists
						if(!empty($row['id_cupon_usuario']))
							echo "<img src='../assets/img/importante.png'>Ya ha sido acreditado un cup&oacuten a su cuenta, espere a que el mismo este activo para adquirir otro, gracias";
						else{
							//insertar el cupon seleccionado en la tabla de cupones por usuario
							$acreditar = $db->insert("el_cupones_usuarios", $data);
							//aunmentar los acreditados en 1
							$oferta['adquiridos'] = "INCREMENT(1)";
							$db->update('el_cupones', $oferta, "id='$ofertaid'");
							//mensaje de salida
							echo "<img src='../assets/img/info.png'> El cup&oacuten ha sido acreditado con &eacutexito, verifique su cuenta de correo, gracias";
							//enviar el correo
							session_start();
							$nom=$_SESSION['SESS_NOMBRES'];						
							 //echo $nom;
							 $msg=$nom."<br/>------------------------<br/>"."Titulo: ".$oferta['titulo']."C�digo del Cup�n: ".$data['codigo']."<br/>------------------------<br/>" ;
							 //echo $msg;	
							 correo($correor,$msg);
					    };
				
				};
				
	  break;
	  case 9:
	          //registrar el cupon 
		     //proceso para asignar un cupon mediante el boton de imprimir cupon
		     $imp = isset($_GET['imp']) ? $_GET['imp'] : "";
	        if( $_REQUEST["name"] )
				{
				   $name = $_REQUEST['name'];
				   $id = $_REQUEST['id'];
				   //echo $id;
				   //echo $name;
				}
				
				parse_str($name, $searcharray);
				
				//Obtener la variables que no son arreglos
					$data['cupon_id'] 	    = $searcharray['cupon_id'];
					$data['codigo']   	 	= $searcharray['codigo'];
					$data['usuario'] 	 	= $searcharray['usuario'];
					$data['desde'] 			= $searcharray['desde'];
					$data['hasta'] 		 	= $searcharray['hasta'];
					$data['empresa_id'] 	= $searcharray['empresa_id'];
					$data['habilitado'] 	= 0;
					$email		 			= $searcharray['email'];
					
				$ofertaid=$searcharray['cupon_id'];
					$user= $searcharray['usuario'];
				//verificar si el cupon no tiene limite de aquisicion
				 $sql_cupon="SELECT * FROM el_cupones where id=$ofertaid";
				 //echo $sql_cupon;
				 $oferta =  $db->query_first($sql_cupon);
				 $correor=$email;
				 $adquiridos=$oferta['adquiridos']+$oferta['impresos'];
				 $limite=$oferta['limiteadquirir'];
				 
					//insertar el cupon seleccionado en la tabla de cupones por usuario
					$acreditar = $db->insert("el_cupones_usuarios", $data);
					//aunmentar los acreditados en 1
					$oferta['adquiridos'] = "INCREMENT(1)";
					$db->update('el_cupones', $oferta, "id='$ofertaid'");
					//mensaje de salida
					echo "<img src='../assets/img/info.png'> El cup&oacuten ha sido acreditado con &eacutexito, gracias";
							
				//ver si con el ultimo cupon se llego al numero para habilitar los cupones
			      $adquiridos++;
				 		 
				
				if( $adquiridos >=$limite)
				  {
				   //echo "habilitar";
				   $habilita['habilitado'] = 1;
					$db->update('el_cupones_usuarios', $habilita, "cupon_id='$ofertaid'");
				  }
				
	  break;
	  case 10:
	        if( $_REQUEST["name"] )
				{
				   $name = $_REQUEST['name'];
				   $id = $_REQUEST['id'];
				   //echo $id;
				   //echo $name;
				}
				
				parse_str($name, $searcharray);
				
				//Obtener la variables que no son arreglos
					$nombres 	    = $searcharray['f_name'];
					$correo   	 	= $searcharray['f_email'];
					$mensaje 	 	= $searcharray['f_message'];
				//validar correo
				if (check_email_address($correo)) 
				{
				   $msg=$nombres."<br/>------------------------<br/>"."mensaje: ".$mensaje."<br/>------------------------<br/>" ;
				    //echo $msg;	
					correo($correo,$msg);
				} 
				else 
				{
				   echo $correo. ' <span style="color:red">no es una direcci&oacuten v&aacutelida de correo.</span>';
				}			
				
	  break;
	  case 11:
	        $k = isset($_GET['keyword']) ? $_GET['keyword'] : "";
			$c = isset($_GET['city']) ? $_GET['city'] : "";
			$ca= isset($_GET['cat']) ? $_GET['cat'] : "";
			$orden= isset($_GET['orden']) ? $_GET['orden'] : "";
			 $keyword =     trim($k) ;//Remove any extra  space
		     $city =     trim($c);
			 $cat =     trim($ca);
			 //echo $orden;
			 if($orden<>"")
			 $ordenar="valor ".$orden;
			  
				else
				  $ordenar="id desc";
			  	
				
	        if($city<>"")
			  $query = "select * from el_cupones where activo='1' and (NOW()>=desde and NOW()<=hasta) and ciudad=$city order by $ordenar";
			   if($cat<>"")
			  $query = "select * from el_cupones where activo='1' and (NOW()>=desde and NOW()<=hasta) and categoria=$cat order by $ordenar";
			if($city<>0 && $cat<>0 )
  			    $query = "select * from el_cupones where activo='1' and (NOW()>=desde and NOW()<=hasta) and categoria=$cat and ciudad=$city order by $ordenar";
		  	 if($city<>"" && $cat==0)
			  $query = "select * from el_cupones where activo='1' and (NOW()>=desde and NOW()<=hasta) and ciudad=$city order by $ordenar";
			   if($city==0 && $cat<>"")
			  $query = "select * from el_cupones where activo='1' and (NOW()>=desde and NOW()<=hasta) and categoria=$cat order by $ordenar";
			if($city==0 && $cat==0)
			   $query = "select * from el_cupones where activo='1' and (NOW()>=desde and NOW()<=hasta) order by $ordenar";
			
			  if($keyword<>"" ) 
 		      $query = "select * from el_cupones where activo='1' and (NOW()>=desde and NOW()<=hasta) and titulo like '%$keyword%' or brevedescripcion like '%$keyword%' or descripcion like '%$keyword%' or direccion like '%$keyword%'";
		
			//The SQL Query that will search for the word typed by the user .
            //echo $query;
		   
			
			$row = $db->query($query); 
		if($db->affected_rows > 0){
		    $rows_ofertas = $db->query($query);
			echo '<ul  class="books gridview cfix alt_content unstyled">';
			while ($record_ofertas = $db->fetch($rows_ofertas)) {
			?>
			
			 <script type="text/javascript">
	
	   
	 $(document).ready(function() {

		
		
		
		$('.cover').contenthover({
    overlay_background:'#000',
    overlay_opacity:0.8
});

});
</script>
			  <li class="book first odd gridview-item gridview-item-first gridview-row-first" data-type="app">  
			
				<div id="project-cover-4504321" class="project-cover cfix hover" project_id="4504321" style="border-top-left-radius:10px;border-top-right-radius:12px;">
			   	  <div id="coverImg4504321" class="cover-img" style="border-top-left-radius:10px;border-top-right-radius:12px;">
				    <img  class="cover" src="img_cupones/<?php echo $record_ofertas['img'];?>" width="300" height="280"  border="0" />
					<div class="contenthover">
						<!--<h3><strong><p class="price"><?php echo $record_ofertas['valor'] ?></p></strong> en vez de <?php echo $record_ofertas['anterior'] ?></h3>-->
						 <p class="text"><h3><strong><?php echo $record_ofertas['titulo'] ?></strong></h3></p>
						<p><a class="btn btn-success" href="elevation19_oferta.php?visto=1&id=<?php echo $record_ofertas['id'];?>">Ver Oferta</a></p>
					</div>
				  </div>
					<div class="cover-info">
						
						<div class="cover-by-wrap">
						   <p class="text"><span style="font-size:18px;color:#0099CC">	<?php $idemp=$record_ofertas['empresa']; $nombre_empresa=buscar_empresa($idemp,$db); echo $nombre_empresa;?></span><br/>
						   	<?php	 $nombre_ciudad=buscar_ciudad($record_ofertas['ciudad'],$db); echo $nombre_ciudad;?></p>
						</div><!-- .cover-by-wrap -->
						<div class="cover-name">
							<!--<h4 style="color:#ffffff"><a href="elevation19_oferta.php?visto=1&id=<?php echo $record_ofertas['id'];?>"><p class="text" style="color:#ffffff"><?php echo $record_ofertas['titulo'] ?></p></a></h4>-->
							<h4><p class="text" style="color:#ffffff"><?php echo $record_ofertas['titulo'] ?></p></h4>
							
						</div>
					</div><!-- .cover-info -->
					<div class="cover-stat-wrap">
						<span class="cover-stat cover-stat-appreciations cover-stat-highlighted">
						<span class="stat-label be-font-inline"><i class="icon-eye-open"></i> Visto</span>
						<span class="stat-value"><?php echo $record_ofertas['visto'] ?></span>
						</span>
						<span class="cover-stat cover-stat-views">
						<span class="stat-label be-font-inline"><i class="icon-download-alt"></i> Adquirido</span>
						<span class="stat-value"><?php echo $record_ofertas['adquiridos']+$record_ofertas['impresos'] ?></span>
						</span>
					</div><!-- .cover-stat-wrap -->
			
				  

				</div><!-- .project-cover -->
			</li>		
			<?php }//fin del while
			 echo "</ul>";
		};
	
		
			
			
	  break;
	 
}//fin del caso





?>
