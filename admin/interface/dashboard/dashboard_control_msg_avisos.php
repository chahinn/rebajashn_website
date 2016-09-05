<?php
 require_once("../inc/config.inc.php");
     require_once("../inc/database.inc.php");
     //require_once("inc/settings.inc.php");
     session_start();
    $db=new Database();	
    $db->open(); 
    $db3=new Database();	
    $db3->open();
	$op = isset($_GET['op']) ? $_GET['op'] : "";
?>

<?php

  switch(op)
  {
    case 1:
	 echo "aaa";
	brake;
	
	 case 2:
	  
	brake;
  };	