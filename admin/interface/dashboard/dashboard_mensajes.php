<?php
    require_once("../inc/config.inc.php");
     require_once("../inc/database.inc.php");
     //require_once("inc/settings.inc.php");
     session_start();
    $db=new Database();	
    $db->open(); 
    $db3=new Database();	
    $db3->open();
	 //FUNCION PARA BUSCAR LA HORA Y FECHA
	// Devuelve el nombre del puesto
	function usuario($usuario_id){
	$hoy=date('Y-m-d');
	//echo $hoy;
   $sql="SELECT * FROM members WHERE member_id=$usuario_id ;";
       //echo $sql;
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		if(empty($row['id']))
		   echo $row['firstname'].' '.$row['lastname'];
		};	
?>
<style>
.slidingDiv {
	height:340px;
	width:450px;
	background-color:#EEE;
	padding:1px;
	margin-top:25px;
	
}

.show_hide {
	display:none;
}

.checkbox, .radio {
	width: 19px;
	height: 25px;
	padding: 0 5px 0 0;
	background: url(checkbox.gif) no-repeat;
	display: block;
	clear: left;
	float: left;
}
.radio {
	background: url(radio.gif) no-repeat;
}
.select {
	position: absolute;
	width: 158px; /* With the padding included, the width is 190 pixels: the actual width of the image. */
	height: 21px;
	padding: 0 24px 0 8px;
	color: #fff;
	font: 12px/21px arial,sans-serif;
	background: url(select.gif) no-repeat;
	overflow: hidden;
}
</style>

<script type="text/javascript">

$(document).ready(function(){

        $(".slidingDiv").hide();
        $(".show_hide").show();
		$("#muro").show();
		//esconder el div el mensaje
		
	$('.show_hide').click(function(){
	$(".slidingDiv").slideToggle();
 	$("#muro").slideToggle();
	
	});
	
	
	//envio de correo de la seccion del footer
     $("#enviar").click(function(event){
					   var name = $("#name").val();
					   var id;
					   var str = $("#muroform").serialize();
					   alert(str);
					  $("#resultado").load('dashboard_procesar.php?op=4', {"name":str,"id":1} );
					  $("#resultado").fadeTo(500,1).fadeTo(10000,0);
			
									
				  });

});


</script>
 <link rel="stylesheet" href="css/tiptip.css" type="text/css"  media="screen">
  <script src="js/jquery.tiptip.js"></script>
  <script>
  // Launch TipTip tooltip
			$('.tiptip a.button, .tiptip button').tipTip();
			
			</script>



<?php
 //ver si se desea leer un mensaje
 $idm = isset($_GET['idm']) ? $_GET['idm'] : "";

 if ($idm!="") {   $ver_mensaje=1;} else{   $ver_mensaje=0;}

?>



<!--LISTADO DE LOS AVISOS PARA TODO O PARA TURNO-->

 
<style>
 .content {
background-color: white;
border-top: 0;
padding: 1px 2px;
font-size: 14px;
list-style:none;
}
.content  .inner {
margin: 3px;
}
.content ul {
margin: 0.5em 0;
padding: 0 0 0 15px;
list-style:none;


}
.content li {
margin-bottom: 0.9em;
padding: 0;

}
.content small, .content small a {
font-size: 11px;
color: #666;
}
.content p {
padding: 0;
margin: 0.5em 0;
width: 100%;
overflow-x: hidden;
}

 

 </style>
 
<table class="table table-striped">
	<thead>
	  <tr>
		<th>#</th>
		<th>Enviado por</th>
		<th>Subject</th>
		<th>Fecha</th>
	  </tr>
	</thead>
	<tbody>
  
   <?php
   
  //Vista de los mensajes del sitio
	$db3->query("SELECT * FROM members_mensajes where user_id=$_SESSION[SESS_MEMBER_ID] ORDER BY status ASC , fecha DESC limit 0,8");
	 //$turno=$_SESSION['SESS_TURNO'];
	//echo "SELECT * FROM "._DB_PREFIX."avisos where dirigido='general' or dirigido=$turno ORDER BY fecha DESC limit 0,4";
	 $num=1;
	 while($r___ = $db3->fetchAssoc()){
		   if ($r___['status']==1 )
			       {$img='<img src="img/old_msg.png"/>';
				    $asunto= $r___['asunto'];
					$estilo="";
					}
   			 else
 				   {$img='<img src="img/new_msg.png"/>';
				   $asunto= "<strong>". $r___['asunto'] ."</strong>";
				   $estilo="font-weight:bold";
				   }
					?>
		 
          <tr style="<?php echo $estilo;?>">
				
				<td><a href="#" onclick="$('#NewsVertical2').load('dashboard/dashboard_ver_msg.php?id=<?php echo $r___['id']?>');"><?php echo $img ?></a></td>
				<td><a href="#" onclick="$('#NewsVertical2').load('dashboard/dashboard_ver_msg.php?id=<?php echo $r___['id']?>');"><?php echo  $r___['enviadopor']; ?></a></td>
				<td><?php echo $asunto;?></td>
				<td><?php echo html_entity_decode($r___['fecha'])?></td>
				
		  </tr>
		  

 <?php $num++;}; ?>    

  </tbody>
</table>


<!--ver el mensaje de datos-->


<?php if ($ver_mensaje==1){ 
   
   $sql2="SELECT * FROM members_mensajes WHERE id=$idm ;";
       //echo $sql;
		$result2 = mysql_query($sql2);
		$row2 = mysql_fetch_array($result2);
		if(!empty($row2['id'])){
		    $asunto=$row2['asunto'];
		   $mensaje=$row2['mensaje'];
		   $fecha=$row2['fecha'];
		   $enviado=$row2['user_id'];
		   $enviadopor=$row2['enviadopor'];
		   
		   $sql_status="update members_mensajes set status=1 where id=$idm";
			//echo $sql_publi;
			$reg=$db->query($sql_status);
		};	
  

  ?>
<script>
    $("#muro").hide();
   $("#mensaje").show();
  
 </script>
 
<div id="mensaje">
   
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
     
         <td style=" vertical-align:top" ><br/>
		  <span style="color:#718BA6; font-size:15px; padding-left:10px;"><strong><?php echo $asunto?></strong></span><br />
           <span style="color: #CCC; font-size:12px; padding-left:10px;">Enviado por: <?php echo $enviadopor; ?> </span> <br/>
           <small style="color: #CCC; font-size:12px; padding-left:10px;"><?php echo 'En fecha:'.html_entity_decode($fecha)?></small>
          </td>
        
          </tr>
          <tr>
            <td style=" vertical-align:top; padding-left:10px; padding-top:5px" ><?php echo $mensaje;?></td>
          </tr>
</table>
  
 <?php };?> 

