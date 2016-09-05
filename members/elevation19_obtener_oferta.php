<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  <?php
// session_start();
 header('Content-Type: text/html; charset=ISO-8859-1');
  
//Conexion a la base de datos
	require_once("../inc/config.inc.php");
	require("../inc/Database.class.php"); 
	$db = Database::obtain(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect(); 
	include 'elevation19_secure.php';
	date_default_timezone_set('America/El_Salvador');
	setlocale(LC_TIME, 'spanish');
 $opcion_menu=2;
$ofertaid = isset($_GET['ofertaid']) ? $_GET['ofertaid'] : "";	
	
	
//buscar la ciudad
function buscar_ciudad($ciudad,$db)
	{
		$sql = "SELECT * FROM el_area WHERE id_area=$ciudad";
		$row = $db->query($sql); 
		if($db->affected_rows > 0){
		  $record = $db->query_first($sql);
		   return $record['ciudad'];
		}
	
	
	};
	
//usar la base de datos de cupones
//ver si no esta set el cupon y ciudad sino tomar el de la session

$ciudad = isset($_GET['ciudad']) ? $_GET['ciudad'] : "";
$cupon = isset($_GET['cupon']) ? $_GET['cupon'] : "";

//buscar la informacion del cupon
 if ($ciudad=="" && $cupon=="")
   {
     $ciudad=$_SESSION['SESS_CIUDAD'];
	 $sql_cupon="SELECT * FROM el_cupones where id=$ofertaid";
	 //echo $sql_cupon;
	 $oferta =  $db->query_first($sql_cupon);
	 
   }else
   {
    // $ciudad=$_SESSION['SESS_CIUDAD'];
	// $sql_cupon="SELECT * FROM el_cupones where ciudad=$ciudad and ofertadeldia='si'";
   
   }
 

 
 function gencodigo() {
    $length = 8;
    $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
    $string = '';    
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) -1)];
    }
    return $string;
}; 
  $codigo_cupon =gencodigo(); 
  
  //informacion de la empresa
    $empid=$oferta['empresa'];
	$sqle="SELECT * FROM el_empresas where id_empresa=$empid";
	//$row_emp = $db->query_first($sqle);

if($db->affected_rows > 0){
   $row_emp = $db->query_first($sqle);
   //echo $sqle;
  
}
else{
    echo "Error: No user found.";
}

//verificar que el usuario pude abtener el cupon o no cuando no se a llegado al limite adquirido
 $adquiridos=$oferta['adquiridos']+$oferta['impresos'];
 $user=$_SESSION['SESS_USUARIO_ID'];
if($oferta['limiteadquirir']==0 || $adquiridos >=$oferta['limiteadquirir'] ){
    echo"<input type='hidden' name='cuponer' id='cuponer' value=0 />";
}else{
    $sql="SELECT * FROM el_cupones_usuarios WHERE cupon_id=$ofertaid and usuario=$user";
	$row = $db->query_first($sql);
	// if user exists
	 if(!empty($row['id_cupon_usuario']))
			echo"<input type='hidden' name='cuponer' id='cuponer' value=1 />";						
		else{
			echo"<input type='hidden' name='cuponer' id='cuponer' value=2 />";		
		};
	
};
?>


    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
     <link href="../assets/css/elevation19m.css" rel="stylesheet">
    
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
	 <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
     
	<!-- CSS validation -->	   
	    <link rel="stylesheet" href="../assets/validate/validationEngine.jquery.css" type="text/css"/>
	<!-- CSS countdown -->	
		<link rel="stylesheet" href="../assets/css/jquery.countdown.css" type="text/css"/>  
	<!-- CSS comments -->		
		<link href="../assets/comments/screen.css" media="screen" rel="stylesheet" type="text/css" />		
		

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
	<link rel="stylesheet" type="text/css" href="../assets/cupon/coupon_print.css" /> 
    <link rel="stylesheet" type="text/css" href="../assets/cupon/aico_buttons.css" /> 
    <style media="print" type="text/css">
        @media print
        {
        body * { visibility: hidden; }
        #contenedor * { visibility: visible; }
        #contenedor { position: absolute; top: 10px; left: 30px; }
        }
    </style>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>

  <body>
  <!--<img src="../assets/img/center.png" class="img-logo" width="285" height="129"> 
  
 <!-- header  ================================================== -->
 <?php include('elevation19_header.php');?>
<!-- ================================================== header -->

<!-- ===================Ventana modal de impresion del cupon=============================== -->
<style>

.modal {  width: 810px;
    margin-left: -390px; /* - width/2 */ }
</style>
<div id="example" class="modal hide fade" style="display: none; ">
     <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Impresion de la Oferta</h3>
     </div>
    <div class="modal-body">
            
       <form id="asignar_form" onSubmit="return false;"> 
       <input type="hidden" id="impresion" name="impresion" value="0">
                 <input type="hidden" name="cupon_id" id="cupon_id" value="<?php echo $oferta['id'];?>" />
                <input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo_cupon?>" />
                <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['SESS_USUARIO_ID']?>" />
                <input type="hidden" name="desde" id="desde" value="<?php echo $oferta['desde']?>" />
                <input type="hidden" name="hasta" id="hasta" value="<?php echo $oferta['hasta']?>" />
                <input type="hidden" name="empresa_id" id="empresa_id" value="<?php echo $oferta['empresa']?>" />
                <input type="hidden" name="email" id="empresa_id" value="<?php echo $_SESSION['SESS_USUARIO']?>" />
                
        </form>
         <div id="coupon" >
		 
<table width="780" border="0" style="border-width: 1px; border-color:#000000;
border-style: dashed;">
   <tr>
    <td colspan="3" align="center"><img src="../assets/img/center.png" width="241" height="105" /></td>
  </tr>
     <tr>
    <td colspan="3" align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="top" style="font-size:46px"> <strong> <?php echo "<strong>$codigo_cupon</strong>";?></strong><br/></td>
  </tr>
    <tr>
    <td colspan="3" align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="top" style="font-size: 36px"><b> <?php echo $oferta['titulo'];?></b></td>
  </tr>
     <tr>
    <td colspan="3" align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="top" style="font-size: 24px"><em><?php echo $row_emp['empresa'];?> - <?php  $nombre_ciudad=buscar_ciudad($ciudad,$db);echo $nombre_ciudad?></em></td>
  </tr>
     <tr>
    <td colspan="3" align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td height="31">&nbsp;<strong>Pasos para Canjear el Cup&oacute;n:</strong></td>
    <td colspan="2" align="left">&nbsp;<strong>Acreditado a:</strong></td>
  </tr>
  <tr>
    <td colspan="2" rowspan="3" valign="top"><ol>
      <li>Presentar este cup&oacute;n o el c&oacute;digo del  mismo en el establecimiento correspondiente.</li>
      <li>Asegurarse que este vigente el  mismo.</li>
      <li>Disfrutar del cup&oacute;n con tus amigos  o familiares</li>
    </ol></td>
    <td width="374"  style="font-size: 14px"><span style="font-size: 24px"><?php echo $_SESSION['SESS_NOMBRES'].' '.$_SESSION['SESS_APELLIDOS'];?></span></td>
  </tr>
  <tr>
    <td  style="font-size: 14px"><strong>Fecha de vencimiento:</strong></td>
  </tr>
  <tr>
    <td align="center" valign="top"  style="font-size: 14px"><?php echo $oferta['hasta'];?></td>
  </tr>
  <tr>
    <td height="21" valign="top">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
</table>


		 
		 
		 </div>	<!--fin del cupon-->
       
	 </div><!--fin del cuerpo modal-->
    <div class="modal-footer">
        <a href="#" class="btn btn-success" id="imprimecupon"  onClick="printDiv('coupon');">Imprimir</a>
        <a href="#" class="btn" data-dismiss="modal">Close</a>
		
		

    </div>
</div>

<!-- ===================Ventana modal de impresion del cupon=============================== -->


<div class="container"><!--Contenedor-->

<div class="row">
    <div class="span4">
      &nbsp;<!-- /well -->
    </div>
    <div class="span4">
      &nbsp;<!-- /well -->
    </div>
    <div class="span4">
      <form>
        <div class="control-group">
		 <br/>
          <div class="control-group">
				<div class="controls">
				<select name='ciudad' id='ciudad'>
				  <?php  
				 $nombre_ciudad=buscar_ciudad($ciudad,$db);
					echo "<option VALUE=" . $ciudad . ">" . $nombre_ciudad . "</option>";
				  $fetch_areas=$db->query("SELECT * FROM  el_area where habilitada='si'");
					while ($rec_areas = $db->fetch($fetch_areas)) {	
							 echo "<option VALUE=" . $rec_areas['id_area'] . ">" . $rec_areas['ciudad'] . "</option>";
							};
					?>		
				    </select>
				</div>
			  </div>
        </div>
      </form>
    </div>
</div>

<div class="row">
    <div class="span8">
      <form  name="form-cupon" id="form-cupon" onSubmit="return false;" >
	    <input type="hidden" name="cupon_id" id="cupon_id" value="<?php echo $oferta['id'];?>" />
                <input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo_cupon?>" />
                <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['SESS_USUARIO_ID']?>" />
                <input type="hidden" name="desde" id="desde" value="<?php echo $oferta['desde']?>" />
                <input type="hidden" name="hasta" id="hasta" value="<?php echo $oferta['hasta']?>" />
                <input type="hidden" name="empresa_id" id="empresa_id" value="<?php echo $oferta['empresa']?>" />
                <input type="hidden" name="email" id="empresa_id" value="<?php echo $_SESSION['SESS_USUARIO']?>" />
		<table class="table table-bordered">
		  	<thead>
		   		<tr style="background-color:#f5f5f5;">
				<th><span style="margin-right:10px;" class="label label-success"> Detalle de la Orden</span></th>
		   		</tr>
		   	</thead>
		   	<tbody>			    	
        	<tr style="background-color:#fff;">
        		<td>
          			<div class="score_container_right">
			        <div id="score_step" class="example_step"><h3><?php echo $oferta['titulo']?></h3></div>
			        <div id="score_step_info" class="score_info">
					<p><?php echo $oferta['brevedescripcion']?></p>
					  <span ><h3 style="color:#0099CC">Este cupón es gratuito</h3></span>
				    <table class="table">
						<thead>
                          <tr>
                            <th class="grid_9 first">Descripcion</th>
                            <th class="grid_2 text_center">Cantidad</th>
                            <th class="grid_1 text_center">&nbsp;</th>
                            <th class="grid_2 text_center">Precio</th>
                            <th class="grid_1 text_center">&nbsp;</th>
                            <th class="grid_2 last text_right">Total</th>
                          </tr>
                        </thead>
						<tbody>
                        <tr>
                         <td><?php echo $oferta['titulo']?></td>
						 <td>1</td>
						 <td>x</td>
						 <td><?php echo $oferta['valor']?></td>
						 <td>=</td>
						 <td><?php echo $oferta['valor']?></td>
						</tr>
					    </tbody>
					</table>
					   
						<div id="resultado" class="alert alert-info">
					  ...
					</div>
					<div id="resultado2" class="alert alert-info">
					  ...
					</div>
					<button class="btn  btn-primary btn-success" id="enviarcorreo" href="#"><i class="icon-envelope icon-white"></i> Enviar a mi Correo</button>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a data-toggle="modal" href="#example" id="impre" class="btn  btn-primary btn-info"><i class="icon-print icon-white"></i> Imprimir</a>
					<a class="btn" id="otrocupon" href="#"><i class="icon-refresh"></i> Obtener otro cupón</a>
					<a class="btn" id="reservar" href="#"><i class="icon-pencil"></i> Obtener cupón</a>
				
					
					</div>
				   </div>	
           		</td>
		   	</tr>
		   	</tbody>
		</table>  
	 </form>	
    </div>
    <div class="span4">
        <table class="table table-bordered">
		   	<thead>
		   		<tr style="background-color:#f5f5f5;">
				<th><span style="margin-right:10px;" class="label label-success">Promesa Elevation19</span> </th>
		   		</tr>
		   	</thead>
		   	<tbody>			    	
        	<tr style="background-color:#fff;">
        		<td>
          			<div class="score_container_right">
			       <div id="score_step" class="example_step" align="center"><img src="../assets/img/promesa.png"></div>
			        <div id="score_step_info" class="score_info">
					<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
				    </div>
				   </div>	
           		</td>
		   	</tr>
		   	</tbody>
		</table>
		<?php
		  $adquiridos=$oferta['adquiridos']+$oferta['impresos'];
		  //echo $adquiridos;
		  if($adquiridos<=$oferta['limiteadquirir']  )
		  {?>
			<div class="alert alert-success">
				<button class="close" data-dismiss="alert">×</button>
				<strong style="font-size:18px"><img src="../assets/img/importante.png"> Importante !</strong><br/>
				<p>Este cupón aun no esta activo para canje, sin embargo pude ser adquirido 1 sola vez dando clic sobre obtener cupon, una vez que se llegue a la cantidad minina de cupones adquiridos podrás hacer uso del mismo y adquirir mas códigos para canjear.</p>
			</div>
		  <?php };?>	
    </div>
</div>

</div> <!-- /container -->
<br/><br/><br/>
<br/>
<!--FOOTER-->
<?php include('elevation19_footer.php');?>
<!--FOOTER-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>
	  
     <!--Ventana de Alertas-->     
	<script type="text/javascript" src="../assets/apprise/apprise-1.5.full.js"></script>
	<link rel="stylesheet" href="../assets/apprise/apprise.css" type="text/css" />
	
	  
	  
	  
	  
	  <script src="../assets/validate/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
	  <script src="../assets/validate/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	
	   <script type="text/javascript">
	 $(document).ready(function() {
	     //alert( $("#cuponer").val());
		 var desactivar=$("#cuponer").val();
		  if(desactivar==0)
		   {
			$("#reservar").hide();
			$("#resultado2").hide();		
		   }
		 if(desactivar==1)
		   {
		    $("#impre").hide();
			$("#enviarcorreo").hide();
			$("#reservar").hide();
			$("#resultado2").show();
			$("#resultado2").html("<img src='../assets/img/info.png'> El cup&oacuten ya ha sido acreditado a su cuenta, gracias");
					
		   }
		   if(desactivar==2)
		   {
		     $("#impre").hide();
			$("#enviarcorreo").hide();
			$("#reservar").show();
			
					
		   }
	    $("#resultado").hide();
	  	$("#perfil").click(function(event){
			$("#contenedor").load('elevation19_perfil.php?op=3');
		});
		$('#otrocupon').hide();
		$('#otrocupon').click(function() {
                location.reload();
            });
		$("#enviarcorreo").click(function(event){
		   //alert('enviar al correo');
		   	var name = $("#name").val();
			var id;
			var str = $("#form-cupon").serialize();
			//alert(str);
			$("#resultado").show();
			  $("#resultado").load('elevation19_proceso_members.php?op=8', {"name":str,"id":1} );
			$('#enviarcorreo').hide();$('#impre').hide();$('#otrocupon').show();
			//redireccionar a ofertas
			 apprise('El cupón ha sido adquirido con éxito, verifique su correo ',{'textOk':'Aceptar'});
			window.location.href ="elevation19_ofertas.php";
		});
	    $("#reservar").click(function(event){
		   //alert('enviar al correo');
		   	var name = $("#name").val();
			var id;
			var str = $("#form-cupon").serialize();
			//alert(str);
			$("#resultado").show();
			  $("#resultado").load('elevation19_proceso_members.php?op=9', {"name":str,"id":1} );
			$('#enviarcorreo').hide();$('#impre').hide();$('#otrocupon').hide();$('#reservar').hide();
			//redireccionar a ofertas
			//redireccionar a ofertas
			 apprise('El cupón ha sido adquirido con éxito',{'textOk':'Aceptar'});
			window.location.href ="elevation19_ofertas.php";
		});
	 });
     
	 //funcion para impresion del cupon
      function printDiv(divName) {
	     $("#code0").hide();
		 $("#code").show();
		 
		 
	imprimir =document.getElementById('impresion').value;
        if (imprimir==0)
        {    
        //alert(divName); 
	var DocumentContainer = document.getElementById(divName).innerHTML;
      
        //alert(DocumentContainer);
		
	var strHtml = "<html>\n<head>\n <link rel=\"stylesheet\" type=\"text/css\"  href=\"../assets/cupon/coupon_print.css\">\n</head><body><div style=\"testStyle\">\n"
		+ DocumentContainer + "\n</div>\n</body>\n</html>";
		//alert(strHtml);
        var WindowObject = window.open('', "TrackHistoryData", "width=620,height=320,top=250,left=345,toolbars=no,scrollbars=no,status=no,resizable=no");
        //alert(ctrl);
        //alert(DocumentContainer);
        WindowObject.document.write(strHtml);
        //alert(ctrl);
        WindowObject.document.close();
        WindowObject.focus();
        WindowObject.print();
        WindowObject.close();
		              //Procesar el cupon para darlo de baja y actulizar el vamor de impreso en la data
		               var name = $("#name").val();
					   var id;
					   var str = $("#asignar_form").serialize();
					   //$("#results").text(str);
					   //alert(str);
					   $("#resultado").show();
					  $("#resultado").load('elevation19_proceso_members.php?op=3&imp=1', {"name":str,"id":1} );
                                         //cambiar el valor del textbox de imprimir
                                         $('#impresion').val(1);
										 $('#enviarcorreo').hide();$('#impre').hide();$('#otrocupon').show();
										 //redireccionar a ofertas
										 apprise('El cupón ha sido adquirido con éxito',{'textOk':'Aceptar'});
										window.location.href ="elevation19_ofertas.php";
										 
					 // $("#resultado").fadeTo(500,1).fadeTo(10000,0);
        }else{
		 
		 apprise('Esta Oferta ya ha sido asignada a su cuenta',{'textOk':'Aceptar'});
		 
		};
        
        //apprise('El cupón le ha sido acreditado con éxito,\n por favor <strong>VERIFIQUE SU CORREO ELECTRONICO para VER EL CODIGO ASIGNADO</strong>. Recuerde que el mismo será necesario para realizar el canje del cupón en el respectivo establecimiento. Gracias!  ',{'textOk':'Aceptar'});
					
		};
		
	
	
	
 
	 </script>

  </body>
</html>
