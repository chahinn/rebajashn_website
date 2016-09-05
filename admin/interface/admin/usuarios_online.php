 <?php
//conectar a la base de datos
     
   // require_once("../mensajealingresar/inc/checkAdminPagePermissions.php");
     require_once("../inc/config.inc.php");
     require_once("../inc/database.inc.php");
     require_once("../inc/settings.inc.php");
	 
	 
    $db3=new Database();	
    $db3->open();
	$db4=new Database();	
    $db4->open();
	
   function turno($turnoid)
	{
	    $sql="SELECT * FROM members_turno WHERE id='$turnoid'";
		$result=mysql_query($sql);
		if(mysql_num_rows($result) == 1) {
			$tur = mysql_fetch_assoc($result);
			return $tur['turno'];
			}else{
			return '';
			};
		
	};
	
	  function puesto($puestoid)
	{
	    $sql="SELECT * FROM members_puesto WHERE id='$puestoid'";
		$result=mysql_query($sql);
		if(mysql_num_rows($result) == 1) {
			$tur = mysql_fetch_assoc($result);
			return $tur['epuesto'];
			}else{
			return '';
			};
		
	};
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
    <title>SAC-RUSSELL :: Admin Panel :: Home</title>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <link href="css/style_blue.css" type=text/css rel=stylesheet>
  <script language="javascript" src="../modules/jquery/jquery-1.4.2.js"></script>
<script type="text/javascript">
        
		
		function check(){
   		  location.reload();
		};
		
	$(document).ready(function() {
          
			 window.setTimeout(function() {check();}, 10000);
        });       
    </script>
</head>
 
 
<!-- BEGIN MAIN CONTENT ARE -->
 
<link rel='stylesheet' type='text/css' href='../modules/datagrid/css/style_gray.css'>
<!-- DataGrid CSS definitions - END -->
 
<div class='gray_class_caption'>
 <div id='headerhome' >
	  <a href='#' id='logo1'>SAC</a>
	  <ul id='service'>
		<li><a href='usuarios_online.php'>Usuarios en Línea</a></li>
	  </ul>
 </div>
  <br/>
  <div id='breadcrumb'>
       <a class='home' href='usuarios_online.php'>Inicio</a>
  </div>
</div>

 <?php
					 //Vista de los mensajes del sitio
					$db3->query("SELECT * FROM members_session where online = 1");
					   $num=1;
					   while($r___ = $db3->fetchAssoc()){
						
						
						  
					?>
                      
                       <?php
					 //Vista de los mensajes del sitio
					$qry="SELECT * FROM members WHERE member_id=".$r___['user_id'];
					$result=mysql_query($qry);
					if($result) {
					if(mysql_num_rows($result) == 1) {
						  $member = mysql_fetch_assoc($result);
					?>
                      
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="8%" rowspan="6" align="center" valign="top">&nbsp;</td>
                        <td width="11%" rowspan="6" align="center" valign="top">
                        
                        <?php if ($member['pic']==""){?>
               			  <img src="../images/silueta.png" width="85" height="85" border="0" alt="<?php echo $member['firstname']?>" >
                		<?php }else{?>
               <img src="../uploads/<?php echo $member['pic']?> " alt="" width="85" height="85" style="border-bottom-style:solid; border-color: #930" border="1" >
                		<?php }?>
                        
                        </td>
                        <td width="51%" align="left" valign="top"><h3><?php echo $member['firstname']." ".$member['lastname'] ?></h3></td>
                        <td width="30%" valign="bottom">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2" valign="top"><h3><?php echo puesto($member['puesto']); ?></h3></td>
                      </tr>
                      <tr>
                        <td><h4>Turno : <?php echo turno($member['turno']); ?></h4></td>
                        <td rowspan="4" >&nbsp;</td>
                      </tr>
                      <tr>
                        <td>IP : <?php echo $r___['ip'];?></td>
                      </tr>
                      <tr>
                        <td>Ingreso : <?php echo  ' '.$r___['hora_i'];?></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                    <?php };
					};
					?>
                     </p>
                     
                   <p>
				  
                 <?php $num++;}; ?>                   
				
				  


    
    
    
    
    
    <br /><br />
 
</body>
</html>

