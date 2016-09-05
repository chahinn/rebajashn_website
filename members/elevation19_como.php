<!DOCTYPE html>
<html lang="es">
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
    <title>Elevation19</title>
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
	include_once 'elevation19_secure.php';
	date_default_timezone_set('America/El_Salvador');
	setlocale(LC_TIME, 'spanish');
    $opcion_menu=1;
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
	
//buscar los datos del cliente
 $sql = "SELECT * FROM el_usuarios WHERE id_usuario=$_SESSION[SESS_USUARIO_ID]";
		//echo $sql;
		$row = $db->query($sql); 
		
		if($db->affected_rows > 0){
				 $member = mysql_fetch_assoc($row);
				  $usuario		=$member['usuario'];
				  $nombres		=$member['nombres'];
			 	  $apellidos	=$member['apellidos'];
				  $telefono		=$member['telefono'];
				  $sexo			=$member['genero'];
				  $dia			=$member['dia'];
				  $mes			=$member['mes'];
				  $anio			=$member['anio'];
				  $ciudad		=$member['ciudad'];
				  $img		    =$member['img'];
		};	
	
  $opcion_menu=4;
?>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

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
		
		
 <style>
	    .navbar-inner {
min-height: 50px;
}
    .navbar .brand {
float: left;
display: block;
padding: 8px 75px 12px;
margin-left: -20px;
font-size: 20px;
font-weight: 200;
line-height: 1;
color: #999;
margin-top:10px;
}
.navbar .nav {
position: relative;
left: 0;
display: block;
float: left;
margin: 18px 10px 0 0;

}
/*footer*/
#footer_space {
    background-color:#CC080B;
    border-bottom: 1px dashed #FFF;
    clear: both;
    float: left;
    height: 5px;
    min-width: 1040px;
    width: 100%;
}


	 </style>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>

  <body>
  
  
 <!-- header  ================================================== -->
 <?php include('elevation19_header.php');?>
<!-- ================================================== header -->
<br/>
<div class="container-fluid">
    <div class="row-fluid" align="center">
    	<img src="../assets/img/hero1.jpg">		

			
                        
					 
				
	
	
			</div><!--/fin contenido de los tabs-->
	
		
		
        

    </div>



<!--FOOTER-->
<?php include 'elevation19_footer.php';?>
<!--FOOTER-->


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
   
    <script src="../assets/js/bootstrap-tab.js"></script>
  
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>

    <script src="../assets/js/bootstrap-typeahead.js"></script>

	
	<script src="../assets/validate/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
	<script src="../assets/validate/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script src="../assets/js/elevation19.js"></script>
	
	  <script src="../assets/js/bootstrap-tooltip.js"></script>
<script src="../assets/js/jquery.form.js"></script>
		
	<script type="text/javascript" >
 $(document).ready(function() { 
        //esconder la ventana de msg
		 $("#msg").hide();
		 
		//tooltip
			$("[rel=tooltip]").tooltip();	
		
            $('#photoimg').live('change', function()			{ 
			           $("#preview").html('');
			    $("#preview").html('<img src="../assets/img/loader.gif" alt="Subiendo...."/>');
			$("#imageform").ajaxForm({
						target: '#preview'
		}).submit();
		
			});
	
		//salvar los datos
		jQuery("#form-actualizar-perfil").validationEngine('attach', {
		  onValidationComplete: function(form, status){
			if(status)
			  { 
			   var name = $("#name").val();
					var id;
					var str = $("#form-actualizar-perfil").serialize();
					//$("#results").text(str);
					//alert(str);
					$("#resultado").load('elevation19_proceso_members.php?op=1', {"name":str,"id":1} );
					$("#msg").show();
					$("#msg").fadeOut(9000);;
					
					
			  
			  };
			//alert("The form status is: " +status+", it will never submit");
		  }  
		});
			
});//fin del ready 
</script>



	  
	  
	  
	
  </body>
</html>
