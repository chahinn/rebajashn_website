<?php
//Conexion a la base de datos
	require_once("../inc/config.inc.php");
	require("../inc/Database.class.php"); 
	$db = Database::obtain(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect(); 
	include_once 'elevation19_secure.php';
	date_default_timezone_set('America/El_Salvador');
	setlocale(LC_TIME, 'spanish');
//session_start();
$session_id=$_SESSION['SESS_USUARIO_ID']; //$session id
$path = "img_users/";

	$valid_formats = array("jpg", "png", "gif", "bmp");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
								mysql_query("UPDATE el_usuarios SET img='$actual_image_name' WHERE id_usuario='$session_id'");
									
									echo "<img src='img_users/".$actual_image_name."'  class='preview'>";
								}
							else
								echo "Error";
						}
						else
						echo "El tamano maximo es de 1 MB";					
						}
						else
						echo "Formato invalido..";	
				}
				
			else
				echo "Seleccione una imagen..!";
				
			exit;
		}
?>