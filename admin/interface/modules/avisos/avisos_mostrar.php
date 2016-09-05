<?php
################################################################################
##              			-= Grupo Leitz=- 				                   #
## --------------------------------------------------------------------------- #
##  SAC, Sistema de Apoyo y Control                                            #
##  Desarrollado por:  Grupo Leitz <info@grupoleitz.com>                       # 
##  Licencia:      Russell corp                                                #
##  Site:          http://www.grupoleitz.com		                           #
##  Copyright:     Grupo Leitz (c) 2010. All rights reserved.                  #
##                                                                             #
##                                                                             #
################################################################################

    // Initialize the session.
    //session_start();
   // require_once('../../../auth/auth.php');
   // require_once("file:///D|/xampp/htdocs/russell_mocha/interface/inc/checkAdminPagePermissions.php");
     require_once("../../inc/config.inc.php");
     require_once("../../inc/database.inc.php");
     //require_once("inc/settings.inc.php");
 
    
     $aviso=$_GET['aviso'];
	 $db=new Database();	
     $db->open();
     $db->query("SELECT * FROM "._DB_PREFIX."avisos WHERE id=$aviso ORDER BY fecha ASC limit 0,4");
	 $r___ = $db->fetchAssoc();
	 
	 if ($r___['tipo']=='bajo' )
	       {$img='<img src="../../images/avisos/aviso1.png" width="48" height="48" />';}
		   elseif ($r___['tipo']=='medio' )
				 {$img='<img src="../../images/avisos/aviso2.png" width="48" height="48" />';} 
				 else
	    		  {$img='<img src="../../images/avisos/aviso3.png" width="48" height="48" />';}
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Comunicado de Russell</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="css/stylesvistaprev.css" />

<script>

function displayHTML() {
var inf = document.getElementById('content').innerHTML;
win = window.open("print.html", 'popup', 'height=800,width=900, toolbar = no, status = no');
win.document.write(inf);
win.document.close();
}

</script>

<script type="text/javascript">

function printSelection(node){

  var content=node.innerHTML
  var pwin=window.open('','print_content','width=100,height=100');

  pwin.document.open();
  pwin.document.write('<html><body onload="window.print()">'+content+'</body></html>');
  pwin.document.close();
 
  setTimeout(function(){pwin.close();},1000);

}
</script>


<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	left:408px;
	top:56px;
	width:125px;
	height:49px;
	z-index:1;
}
-->
</style>
</head>
<body>
<!-- Begin Wrapper -->
<div id="apDiv1"><img src="img/logo_inside.png" alt="" width="234" height="52" /></div>
<div id="wrapper">
  <!-- Begin Header -->
  <div id="header">
    <h1><strong>Noticias</strong></h1>
  </div>
  <!-- End Header -->
  <!-- Begin Naviagtion -->
  <div id="navigation">
    <table width="320" border="0" cellpadding="0" cellspacing="0" class="table_navigation">
      <tr>
     
        <td width="31" align="left" valign="middle"><img src="img/printer.png" alt="" width="24" height="24" onclick="printSelection(document.getElementById('content'));return false" style="cursor:pointer"  /></td>
        <td width="46" align="left" valign="middle">Imprimir</td>
        <td width="31" align="left" valign="middle"><img src="img/reload.png" alt="" width="24" height="24" onclick="window.location.reload()" style="cursor:pointer"  /></td>
        <td width="161" align="left" valign="middle">Recargar</td>
        <td width="51" align="left" valign="middle">&nbsp;</td>
      </tr>
    </table>
  </div>
  <!-- End Naviagtion -->
  <!-- Begin Content -->
  <div id="content">
    <table width="670" border="0">
      <tr>
        <td width="4%">&nbsp;</td>
        <td width="58%" valign="bottom"><? echo $img;?><span style="font-size: 18pt; color: #000000"><? echo $r___['titulo']?></span><br/></td>
        <td width="38%" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><span style="font-family: Verdana; font-size: 8pt; color: #ADADAD"><? echo $r___['fecha']?></span><br />		</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td style="font-style:italic;"><strong><?php echo html_entity_decode($r___['resumen']); ?></strong></td>
        <td align="right">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><hr border: 1px solid #ff0000  /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><?php echo html_entity_decode($r___['contenido']);  ?><br />



</td>
      </tr>
    </table>
  </div>
  <!-- Begin Content -->
</div>


<div id="footer">
SAC-Russell Corp &copy;</div>
</div>
<!-- End Wrapper -->

</body>
</html>
