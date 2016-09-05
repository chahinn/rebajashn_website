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
<br/><br/>
<div class="container-fluid">
    <div class="row-fluid">
    <div class="span3">
			<div class="thumbnail" id='preview'>
			<?php 
			  if ($img==""){
			?>  
            <img src="../assets/img/profile.jpg" width="210" height="210" alt="">
			<?php } else {
			 	echo "<img width='210' height='210' alt='' src='img_users/".$img."'>";
			
			};?>
	     
           </div><!--/span-->
		   
		   <form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
			Seleccione su imagen <input type="file" name="photoimg" id="photoimg" />
			</form>
<div >
</div>
		   
		   
		   
		   
		   

		   
	</div>
				
    <div class="span9">
		 
		    <h2><?php echo $_SESSION['SESS_NOMBRES'].' '.$_SESSION['SESS_APELLIDOS'];?></h2>
          <p>Información básica</p>
		<div class="tabs-left">
			<ul class="nav nav-tabs">
			<li class="active"><a href="#user-control" data-toggle="tab"><i class="icon-cog"></i> General</a></li>
			<li class=""><a href="#user-ofertas" data-toggle="tab"><i class="icon-list-alt"></i>  Acerca de</a></li>
			</ul>
			
			<div class="tab-content">
			<div class="tab-pane fade active in" id="user-control">
				<div class="row-fluid">
					<div class="span7">
						<form  id="form-actualizar-perfil"  onSubmit="return false;">
							
							<span style="font-size:13px;color:#000;padding-top:0px;padding-left:0px"><strong>Nombres</strong></span>
							 <span style="font-size:13px;color:#000;padding-top:0px;padding-left:85px"><strong>Apellidos</strong></span><br>
							 <div class="form-inline">
								<input name="nombres" id="nombres" type="text" class="txt input-small validate[required,minSize[3]] text-input"  style="width:130px" value="<?php echo $nombres;?>" >
								<input name="apellidos" id="apellidos" type="text" class="txt input-small validate[required,minSize[3]] text-input"  style="width:130px" value="<?php echo $apellidos;?>">
							 </div><br/>
							 <span style="font-size:13px;color:#000;padding-top:0px;padding-left:0px"><strong>Dirección de correo:</strong></span>
						
							 <a href="#" rel="tooltip" data-original-title="Recuerde que este tambien es su usuario del sistema."><i class="icon-question-sign"></i></a>
							 <br> 
							<input type="text"  class="input-xlarge validate[required] text-input" name="correo" id="correo" value="<?php echo $usuario;?>"/>
							<br/>
							<span style="font-size:13px;color:#000;padding-top:0px;padding-left:0px"><strong>Contrase&ntilde;a:</strong></span><br>
							<input name="clave" id="clave" type="password" class="input-xlarge txt " placeholder="Contrase&ntilde;a"><br/>
							
							 <span style="font-size:13px;color:#000;padding-top:0px;padding-left:0px"><strong>Fecha de Nacimiento:</strong></span><br>
							<div class="form-inline">
							<select name="dias" id="dias" class="input-small validate[required]" >
                               <option value="<?php echo $dia;?>"><?php echo $dia;?></option>
                                <option value="1">1</option><option value="2">2</option>
                                <option value="3">3</option><option value="4">4</option>
                                <option value="5">5</option><option value="6">6</option>
                                <option value="7">7</option><option value="8">8</option>
                                <option value="9">9</option><option value="10">10</option>
                                <option value="11">11</option><option value="12">12</option>
                                <option value="13">13</option><option value="14">14</option>
                                <option value="15">15</option><option value="16">16</option>
                                <option value="17">17</option><option value="18">18</option>
                                <option value="19">19</option><option value="20">20</option>
                                <option value="21">21</option><option value="22">22</option>
                                <option value="23">23</option><option value="24">24</option>
                                <option value="25">25</option><option value="26">26</option>
                                <option value="27">27</option><option value="28">28</option>
                                <option value="29">29</option><option value="30">30</option>
                                <option value="31">31</option>
							 </select>
							 <select name="mes" class="input-small validate[required]">
                                <option value="<?php echo $mes;?>"><?php echo $mes;?></option>
             					<option value="1">1</option><option value="2">2</option>
                                <option value="3">3</option><option value="4">4</option>
                                <option value="5">5</option><option value="6">6</option>
                                <option value="7">7</option><option value="8">8</option>
                                <option value="9">9</option><option value="10">10</option>
                                <option value="11">11</option><option value="12">12</option>
							 </select>
							 <select name="anio" class="input-small validate[required]">
                                <option value="<?php echo $anio;?>"><?php echo $anio;?></option>
								<option value="1940">1940</option><option value="1941">1941</option><option value="1942">1942</option><option value="1943">1943</option><option value="1944">1944</option><option value="1945">1945</option><option value="1946">1946</option><option value="1947">1947</option><option value="1948">1948</option><option value="1949">1949</option><option value="1950">1950</option><option value="1951">1951</option><option value="1952">1952</option><option value="1953">1953</option><option value="1954">1954</option><option value="1955">1955</option><option value="1956">1956</option><option value="1957">1957</option><option value="1958">1958</option><option value="1959">1959</option><option value="1960">1960</option><option value="1961">1961</option><option value="1962">1962</option><option value="1963">1963</option><option value="1964">1964</option><option value="1965">1965</option><option value="1966">1966</option><option value="1967">1967</option><option value="1968">1968</option><option value="1969">1969</option><option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option>                               
							 </select>
							</div>
							 <div class="form-inline">
							    
							  <span style="font-size:13px;color:#000;padding-top:0px;padding-left:0px"><strong>Yo soy:</strong></span><br>
							   <label class="radio">
							   <?php
							     if($sexo=="Hombre"){$x="checked";$y="";}else{$x="";$y="checked";};?>
							   <input class="validate[required] radio" type="radio" name="sexo" id="radio1" value="Hombre" <?php echo $x;?>>
								<span style="font-size:15px;color:gray"> Hombre</span>
								 </label>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
								  <label class="radio">
									<input class="validate[required] radio" type="radio" name="sexo" id="radio1" value="Mujer" <?php echo $y;?>>
									<span style="font-size:15px;color:gray"> Mujer</span>
							      </label>
							 </div>
							 <span style="font-size:13px;color:#000;padding-top:0px;padding-left:0px"><strong>Ciudad:</strong></span><br>
							  <select id="ciudad" name="ciudad" class="input-xlarge validate[required]">
							    <?php
								   if($ciudad==1){$a="San Pedro Sula";}else{$a="Tegucigalpa";};?>
								  <option value="<?php echo $ciudad?>"><?php echo $a?></option>
								  <option value="1">San Pedro Sula</option>
								  <option value="2">Tegucigalpa</option>
								</select>
							 
							<div style="padding-left:170px">
							<button name="registrame" id="registrame"  class="btn btn-success" style=""> Salvar Datos</button>
							</div>  
						</form>	
					  
					 
					  
					</div><!--/span8 del formulario-->
					<div class="span5">
						<div class="alert alert-success">
						<button class="close" data-dismiss="alert">×</button>
<strong>Perfil Elevation19</strong><br/>
El mantener actualizada su información en nuestras bases de datos nos ayuda proporcionarle el contenido y las experiencias más relevantes, es posible que combinemos la información que nos envíe junto con información de fuentes públicas y de nuestros socios de confianza para mejorar nuestros servicios. 
<br/><br/><span style=""><strong>Nota:</strong></span> <p style="font-size:10px">En algunos casos será necesario salir y volver a entrar para ver los cambios de la información.</p>
						</div>					
						
						<div class="alert " id="msg">
						
								<div id="resultado"></div>
						</div>
					</div><!--/span-->
					
				</div><!--/row-->
  			</div>
			<div class="tab-pane fade" id="user-ofertas">
			      En construcción
			
			</div>
	
	
			</div><!--/fin contenido de los tabs-->
	
		
		
        

    </div>

</div>


</div>

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
