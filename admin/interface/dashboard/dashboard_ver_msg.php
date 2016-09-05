<?php
//ver mensajes


require_once("../inc/config.inc.php");
     require_once("../inc/database.inc.php");
     //require_once("inc/settings.inc.php");
     session_start();
    $db=new Database();	
    $db->open(); 
    $db3=new Database();	
    $db3->open();

$id_msg = isset($_GET['id']) ? $_GET['id'] : "";


?>
<ul id="TickerVertical">
<?php
   
  //Vista de los mensajes del sitio
	$db3->query("SELECT * FROM members_mensajes where id=$id_msg and user_id=$_SESSION[SESS_MEMBER_ID]  ");
	 //$turno=$_SESSION['SESS_TURNO'];
	//echo "SELECT * FROM members_mensajes where id=$id_msg and user_id=$_SESSION[SESS_MEMBER_ID] ";
	 $num=1;
	 while($r___ = $db3->fetchAssoc()){
		
		if ($r___['status']==0 )
			       {$img='<img src="img/read.png" width="40" height="40" />';
				    $asunto= $r___['asunto'];
					$sql_status="update members_mensajes set status=1 where id=$id_msg";
					//echo $sql_status;
					$reg=$db->query($sql_status);
					}
   			
?>

	<li>
	    <img src="img/silueta.png" height="45" width="45" border="0" class="NewsImg" alt="">
		<span class="NewsImg"><h4><?php echo $r___['asunto']?></h4></span><br/> 
		<p>
		<a href="#">De: <?php echo $r___['enviadopor']?></a><br/>
		Fecha: <?php echo html_entity_decode($r___['fecha'])?></p>
		
		<br/>
		<p style="font-size:14px">
		<?php 
			 $cont=html_entity_decode($r___['mensaje']);
			 echo $cont;?>
		</p>
			
	</li>

<?php };//fin del ciclo del muro?>		

</ul>