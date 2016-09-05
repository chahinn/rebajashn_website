<?php
 require_once("../inc/config.inc.php");
     require_once("../inc/database.inc.php");
     //require_once("inc/settings.inc.php");
     session_start();
    $db=new Database();	
    $db->open(); 
    $db3=new Database();	
    $db3->open();
	
function truncate_text($text, $nbrChar = null, $append = ' ...') {
if(strlen($text) > $nbrChar) {
$text = substr($text, 0, $nbrChar);
$text .= $append;
}
return $text;
}

?>
<ul id="TickerVertical">
<?php	
//Vista de los mensajes del sitio
	$db3->query("SELECT * FROM "._DB_PREFIX."avisos where (dirigido='general' or dirigido=$_SESSION[SESS_TURNO]) and publicar=1 ORDER BY fecha DESC limit 0,4");
	 //$turno=$_SESSION['SESS_TURNO'];
	//echo "SELECT * FROM "._DB_PREFIX."avisos where dirigido='general' or dirigido=$turno ORDER BY fecha DESC limit 0,4";
	 $num=1;
	 while($r___ = $db3->fetchAssoc()){
		   if ($r___['tipo']=='bajo' )
			       {$img='label label-info';$tipo_msg='Informativo';}
				   elseif ($r___['tipo']=='medio' )
					 {$img='label label-warning';$tipo_msg='Atenci&oacute;n';} 
		    			 else
						  {$img='label label-important';$tipo_msg='Importante';}
	

?>
	<li>
	    <img src="img/silueta.png" height="80" width="80" border="0" class="NewsImg" alt="">
		<span class="<?php echo $img;?> NewsImg"><?php echo $tipo_msg;?></span> 
		<span class="NewsTitle">
		<a href="#"><?php echo $r___['titulo']?></a>
		</span>
			<?php 
			 $cont=html_entity_decode($r___['contenido']);
			 echo truncate_text($cont, 180);?>
			
		<div>
			<span class="NewsFooter"><strong>Publicado <?php echo html_entity_decode($r___['fecha'])?></strong> 
			<small style="font-size:10px">DIRIGIDO A: <?php if ($r___['dirigido']=='general') {echo '<span class="label" style="font-size:8px">TODO EL PERSONAL</label>';} else {echo '<span class="label label-success" style="font-size:8px">TURNO ACTUAL</label>';};?></small>
			<a class="btn btn-mini" href="#" onclick="$('#NewsVertical').load('dashboard/dashboard_ver_noticia.php?id=<?php echo $r___['id']?>');" style="float:right;top:0px"><i class="icon-comment"></i> Leer</a></span>
			</div>
			
	</li>

<?php };//fin del ciclo del muro?>					
							
</ul>