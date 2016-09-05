<?php
	include('dbcon.php');
	
	$userip = $_SERVER['REMOTE_ADDR'];
	
	mysql_query("delete from el_comments where p_id ='".$_REQUEST['id']."' AND userip ='".$userip."'");
	mysql_query("delete from el_comments_post where post_id ='".$_REQUEST['id']."'");
	
?>