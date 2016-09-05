<?php 

session_start();
	
if(empty($_SESSION['SESS_MEMBER_ID'])) 
   {
   	 header("Location:../index.php");
   };
	

//salir del sistema
if(isset($_GET['logout']))
{

	session_unset();
	session_destroy();
	
	header("Location:../index.php");
} 


	



?>
