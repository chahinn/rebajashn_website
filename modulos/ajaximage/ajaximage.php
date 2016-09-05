<?php
//include('db.php');
//Conexiones a la base de datos
require_once("../../admin/inc/config.inc.php");
require("../../admin/inc/Database.class.php"); 
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect(); 

session_start();
$session_id=$_SESSION['SESS_ID_USUARIO']; //$session id
$path = "uploads/";

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
								
								  $sql="UPDATE re_usuarios SET img='$actual_image_name' WHERE id_usuario=$session_id";
                                   $activar=$db->query($sql);
									//echo "UPDATE re_usuarios SET img='$actual_image_name' WHERE id_usuario=$session_id";
									echo "<img src='modulos/ajaximage/uploads/".$actual_image_name."' width='123' height='116'  class='preview'>";
								}
							else
								echo "failed";
						}
						else
						echo "Image file size max 1 MB";					
						}
						else
						echo "Invalid file format..";	
				}
				
			else
				echo "Please select image..!";
				
			exit;
		}
?>