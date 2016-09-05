<?php ob_start(); session_start(); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Elevation19</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/elevation19.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
 
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
        <link type="text/css" rel="stylesheet" href="assets/css/jquery.pnotify.default.css" />
	 <!-- CSS Slider -->
	 	<link rel="stylesheet" href="assets/slideshow/css/supersized.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="assets/slideshow/theme/supersized.shutter.css" type="text/css" media="screen" />
	<!-- CSS validation -->	   
	    <link rel="stylesheet" href="assets/validate/validationEngine.jquery.css" type="text/css"/>
   <link rel="stylesheet" type="text/css" href="modulos/fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
  </head>

  <body>

<!-- Panel -->
<div id="toppanel" style="z-index:1999" align="center">
	<div id="panel">
	
		<div class="content clearfix">
			<div class="prose signin-section drawer-content" id="signin" style="overflow: hidden; display: block; ">
  
	<form  id="form-ingresar"  onSubmit="return false;"> 
     <table width="90%" border="0">
  <tr>
    <td>Elevation19</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	 <td>&nbsp;</td>
  </tr>
  <tr>
    <td><h1 style="font-family: helvetica,arial,sans-serif;color:#fff">Ingresar</h1></td>
    <td align="center">   
	   <input type="text" name="user" id="user" class="input-xlarge txt validate[required,custom[email]] text-input" placeholder="usuario@servidor"></td>
    <td>   
	    <input type="password" name="pass" id="pass" class="input-xlarge txt validate[required] text-input" placeholder="clave"></td>
	 <td>
	   <button name="ingresar" id="ingresar" class="btn btn-large btn-primary btn-info" href="#"> <strong>INGRESAR</strong></button> <img src="assets/img/close_icon.png" alt="" id="close" class="close"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;<a data-toggle="modal" href="#recupera" style="font-size:14px">&iquest;Olvide mi contrase&ntilde;a?</a> <div id="resultado_ingresar" style="color:red;font-size:16px"></div></td>
    <td><label class="checkbox" style="color:#fff">
                <input type="checkbox" id="recuerda" name="recuerda" value="1">
                Recordarme en este dispositivo
              </label></td>
	 <td>&nbsp;</td>
  </tr>

  </table>
  </form>

    </div>
		
		</div>
</div> <!-- /login -->	

	
	
</div> <!--panel -->

<!--Arrow Navigation del slider-->
	<a id="prevslide" class="load-item"></a>
	<a id="nextslide" class="load-item"></a>
   <div class="navbar navbar-fixed-top caja-top" style="height: 120px;" >
       
      <div class="container">
			<div class="row show-grid">
    <div class="span3" align="center">
		<a href="index.php"><img src="assets/img/center.png"></a>
			</div>
    <div class="span6" >
	<ul class="thumbnails">
       
        <li class="span2" id="cssSpriteDemo">
          <a href="quienes.php" class="">
            <img src="assets/img/m1_off.png" class="rollover"  alt="">
          </a>
        </li>
	    <li class="span2">
          <a href="funciona.php" class="">
             <img src="assets/img/m2_off.png" class="rollover"  alt="">
          </a>
        </li>
        <li class="span2">
           <a href="faq.php" class="">
             <img src="assets/img/m3_off.png" class="rollover"  alt="">
          </a>
        </li>
      </ul>
	
	</div>
	<div class="span3">
	   <br/>
	   <div id="container" style="">
	 <div id="topnav" class="topnav"> <span style="font-size:14px">&iquest;Ya estas Registrado?<br/>
		   &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-large" id="open" class="open" href="#"><i class="icon-user"></i> Ingresa</button></span>
		   <br/><br/>
		  
		  
		  <?php if ( !isset($_SESSION["userprofile"]) ) { ?>

	

    	<a href="http://rebajashn.com/elevation19/fb3/auth/login.php?app=facebook" target="_blank">
           <img src="assets/img/fb_login.png" alt="facebook">	
		</a>



<?php } else { unset ($_SESSION['app']); ?>

    	<?php
		
		
		$user_profile=$_SESSION["userprofile"];
		
		
		  //Conexiones a la base de datos
require_once("inc/config.inc.php");
require("inc/Database.class.php"); 
$db = Database::obtain(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
$db->connect(); 
  //verificar que el usuario este para crear la session sino crearlo y generar la session
	   $usr=$user_profile['email'];
	   
	   $sql = "SELECT * FROM el_usuarios WHERE usuario='$usr'";
	  // echo $sql;
		$result = $db->query($sql); 
		if($db->affected_rows > 0){
          // echo "ya esta registrado";
		   //session_start();
						session_regenerate_id();
						$new_sessionid = session_id();
						//crear las variables de session	
						$member = mysql_fetch_assoc($result);
						$_SESSION['SESS_USUARIO_ID'] = $member['id_usuario'];
						$_SESSION['SESS_USUARIO'] = $member['usuario'];
						$_SESSION['SESS_NOMBRES'] = $member['nombres'];
						$_SESSION['SESS_APELLIDOS'] = $member['apellidos'];
						$_SESSION['SESS_PIC'] = $member['img'];
						$_SESSION['SESS_CIUDAD']= $member['ciudad'];
					 //echo "<script type='text/javascript'> window.location = 'http://rebajashn.com/elevation19/members/start.php'; </script>";
						//header("Location: http://www.elevation19.com/members/start.php");
        }else{
		  //echo "El usuario no esta registrado";
		  //varibles para almacenar los datos
		          date_default_timezone_set('America/El_Salvador');
					$usuario['usuario'] = $user_profile['email'];
					$usuario['id_fb'] = $user_profile['id'];
					$usuario['clave'] 	 = md5('elevation19');
					$usuario['nombres'] = $user_profile['first_name'];
					$usuario['apellidos'] 	 = $user_profile['last_name'];
					$sexo=$user_profile['gender'];
					if ($sexo=='male') {$sexo="Hombre";};
					if ($sexo=='female') {$sexo="Mujer";};
					$usuario['genero'] 	 = $sexo;
					$dateArray=explode('/',$user_profile['birthday']);
					echo $dateArray[1].$dateArray[2].$dateArray[0];
					$usuario['dia'] 	 = $dateArray[1];
					$usuario['mes'] 	 = $dateArray[0];
					$usuario['anio'] 	 = $dateArray[2];
     				$usuario['ciudad'] 	 = 1;
					$usuario['administrativo'] 	 ="no";
					$usuario['activo'] 	 = "si";
					$usuario['ultima_visita'] 	 = date('Y-m-d H:i:s');
		        print_r($usuario);
				// Insertar datos en la tabla de usuarios
					$almacenar = $db->insert("el_usuarios", $usuario);
					$sql = "SELECT * FROM el_usuarios WHERE usuario='$usr'";
					$result = $db->query($sql); 
					if($db->affected_rows > 0){
						//echo '<img src="assets/img/loading.gif"><strong style:"color:white">Ingresando..</strong>';
						//crear la nueva session
						session_start();
						session_regenerate_id();
						$new_sessionid = session_id();
						//crear las variables de session	
						$member = mysql_fetch_assoc($result);
						$_SESSION['SESS_USUARIO_ID'] = $member['id_usuario'];
						$_SESSION['SESS_USUARIO'] = $member['usuario'];
						$_SESSION['SESS_NOMBRES'] = $member['nombres'];
						$_SESSION['SESS_APELLIDOS'] = $member['apellidos'];
						$_SESSION['SESS_PIC'] = $member['img'];
						$_SESSION['SESS_TYPE'] = $member['administrativo'];
						$_SESSION['SESS_SEXO']= $member['genero'];
						$_SESSION['SESS_CIUDAD']= $member['ciudad'];
						/*		
						//enviar el correo con la nueva clave al usuario
						 $nom=$member['nombres'];
						 $msg="<strong style='font-size:12px'>Hola,</strong>".$nom."<br/> <strong style='font-size:12px'>Para la comunidad de Elevation19 es un placer que est�s con nosotros.</strong> Te damos la m�s cordial de las bienvenidas <br/>------------------------<br/>"."Su cuenta es: ".$usuario."<br/>Su clave es: ".$pass."<br/>------------------------<br/>" ;
						$asunto="Bienvenido a Elevation19";
						correo($usuario,$msg,$asunto);
						*/
						//actualizar la visita
							$actua="update el_usuarios set visitas=visitas+1 where usuario='$usr'";
							//echo $actua;
							$modi=$db->query($actua);	
						//redireccionar al sitio de miembros
						
						// echo "<script type='text/javascript'> window.location = 'members/start.php'; </script>";
						// echo "<script type='text/javascript'> window.location = 'http://rebajashn.com/elevation19/members/start.php'; </script>";
						//header("Location: http://www.elevation19.com/members/start.php");
	
					   }
		};	
		
		
		
		}?>
   
	

  

		  
		  
		  
		  
		  
		  
		  
		  <!-- The tab on top -->	
	
	 </div>					
		</div>
	   
	</div>
  </div>
			
	  </div>	  
    </div>

    <div class="container" style="width: 80%;">
<!-- ventana modal de recuparacion -->
<style>

#recupera { 
    position: absolute; 
  top:70%;
   width: 430px;
    margin-left: -180px;
   }
.h{
background: rgb(178,225,255); /* Old browsers */
background: -moz-linear-gradient(top, rgba(178,225,255,1) 0%, rgba(102,182,252,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(178,225,255,1)), color-stop(100%,rgba(102,182,252,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(178,225,255,1) 0%,rgba(102,182,252,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(178,225,255,1) 0%,rgba(102,182,252,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(178,225,255,1) 0%,rgba(102,182,252,1) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(178,225,255,1) 0%,rgba(102,182,252,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b2e1ff', endColorstr='#66b6fc',GradientType=0 ); /* IE6-9 */

} 
.f{
background: rgb(242,245,246); /* Old browsers */
background: -moz-linear-gradient(top, rgba(242,245,246,1) 0%, rgba(227,234,237,1) 37%, rgba(200,215,220,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(242,245,246,1)), color-stop(37%,rgba(227,234,237,1)), color-stop(100%,rgba(200,215,220,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%); /* W3C */
}


</style>
<div id="recupera" class="modal hide fade in" style="display: none; ">
            <div class="modal-header h" >
              <a class="close" data-dismiss="modal">�</a>
              <h3>Recuparar contrase&ntilde;a</h3>
            </div>
            <div class="modal-body">
             <form  id="form-recuperar"  onSubmit="return false;">
			     <label class="control-label" for="input01"><strong>Escriba su cuenta de Correo</strong></label>
				 <input value="" class="validate[required,custom[email]] text-input" type="text" name="email" id="email" placeholder="usuario@servidor">
				  <a href="#" rel="tooltip" data-original-title="Este debe de ser el mismo correo con el que registro en Elevation19."><i class="icon-question-sign"></i></a>
				 <label class="control-label" for="input01"><strong>Seleccione su fecha de nacimiento</strong></label>
				 <div class="form-inline">
							<select name="day" id="day" class="input-small validate[required]">
								   <option value="">D&iacute;a:</option>
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
							<select name="month" id="month" class="input-small validate[required]">
									<option value="">Mes:</option>
									<option value="1">1</option><option value="2">2</option>
									<option value="3">3</option><option value="4">4</option>
									<option value="5">5</option><option value="6">6</option>
									<option value="7">7</option><option value="8">8</option>
									<option value="9">9</option><option value="10">10</option>
									<option value="11">11</option><option value="12">12</option>
							</select>
							<select name="year" id="year" class="input-small validate[required]">
									<option value="">A&ntilde;o:</option>
									<option value="1940">1940</option><option value="1941">1941</option><option value="1942">1942</option><option value="1943">1943</option><option value="1944">1944</option><option value="1945">1945</option><option value="1946">1946</option><option value="1947">1947</option><option value="1948">1948</option><option value="1949">1949</option><option value="1950">1950</option><option value="1951">1951</option><option value="1952">1952</option><option value="1953">1953</option><option value="1954">1954</option><option value="1955">1955</option><option value="1956">1956</option><option value="1957">1957</option><option value="1958">1958</option><option value="1959">1959</option><option value="1960">1960</option><option value="1961">1961</option><option value="1962">1962</option><option value="1963">1963</option><option value="1964">1964</option><option value="1965">1965</option><option value="1966">1966</option><option value="1967">1967</option><option value="1968">1968</option><option value="1969">1969</option><option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option>                               
							</select>
											 <a href="#" rel="tooltip" data-original-title="Este debe de ser la misma fecha de nacimiento que registro en Elevation19."><i class="icon-question-sign"></i></a>
						</div><br/>
						
						<button align="right" name="recupararme" id="recuperarme"  class="btn btn-large btn-primary  btn-info" style="font-size:14px"><i class="icon-envelope icon-white"></i> Enviar a mi correo</button>
				 
			 </form>
		     <div id="resultado_recupera"></div>
		   
            </div>
            <div class="modal-footer f">
             Elevation19.com
            </div>
          </div>
<!-- ventana modal de recuparacion -->

	

	
	<div class="row" >
    <div class="span4" id="caja_acceso">
	  <div id="registro" class="caja" style="width:290px"> 
	  <h3>&iquest;Tu primera vez en Elevation19?</h3> <h3 style="padding-left:15px" >&iquest;&Uacute;nete gratis hoy!</h3> 
      
	<form  id="form-registrar"  onSubmit="return false;">
		
		<span style="font-size:13px;color:#000;padding-top:0px;padding-left:0px"><strong>Nombre<strong></span>
		 <span style="font-size:13px;color:#000;padding-top:0px;padding-left:85px"><strong>Apellido<strong></span><br>
		 <div class="form-inline">
			<input name="nombres" id="nombres" type="text" class="txt input-small validate[required,minSize[3]] text-input" data-prompt-position="topLeft" style="width:130px" placeholder="Nombre" >
			<input name="apellidos" id="apellidos" type="text" class="txt input-small validate[required,minSize[3]] text-input"  style="width:130px" placeholder="Apellido">
		 </div><br/>
	
	   <span style="font-size:13px;color:#000;padding-top:0px;padding-left:0px"><strong>Direcci&oacute;n de correo:<strong></span><br> 
	    <input type="text"  class="input-xlarge validate[required,custom[email],ajax[ajaxCheckUser]] text-input" name="correo" id="correo" placeholder="usuario@servidor"/>
		<br/>
        <span style="font-size:13px;color:#000;padding-top:0px;padding-left:0px"><strong>Contrase&ntilde;a:<strong></span><br>
		<input name="clave" id="clave" type="password" class="input-xlarge txt validate[required] text-input" placeholder="Contrase&ntilde;a">
		
		 <span style="font-size:13px;color:#000;padding-top:0px;padding-left:0px"><strong>Fecha de Nacimiento:<strong></span><br>
		  <div class="form-inline">
						<select name="dia" id="dia" class="input-small validate[required] " data-prompt-position="topLeft:-20,5">
                               <option value="">D&iacute;a:</option>
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
                                <option value="">Mes:</option>
             					<option value="1">1</option><option value="2">2</option>
                                <option value="3">3</option><option value="4">4</option>
                                <option value="5">5</option><option value="6">6</option>
                                <option value="7">7</option><option value="8">8</option>
                                <option value="9">9</option><option value="10">10</option>
                                <option value="11">11</option><option value="12">12</option>
                        </select>
						<select name="anio" class="input-small validate[required] select" data-prompt-position="bottomRight">
                                <option value="">A&ntilde;o:</option>
								<option value="1940">1940</option><option value="1941">1941</option><option value="1942">1942</option><option value="1943">1943</option><option value="1944">1944</option><option value="1945">1945</option><option value="1946">1946</option><option value="1947">1947</option><option value="1948">1948</option><option value="1949">1949</option><option value="1950">1950</option><option value="1951">1951</option><option value="1952">1952</option><option value="1953">1953</option><option value="1954">1954</option><option value="1955">1955</option><option value="1956">1956</option><option value="1957">1957</option><option value="1958">1958</option><option value="1959">1959</option><option value="1960">1960</option><option value="1961">1961</option><option value="1962">1962</option><option value="1963">1963</option><option value="1964">1964</option><option value="1965">1965</option><option value="1966">1966</option><option value="1967">1967</option><option value="1968">1968</option><option value="1969">1969</option><option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option>
						</select>
		    </div>
			<br/>
					
		 <div class="form-inline">
		  <span style="font-size:13px;color:#000;padding-top:0px;padding-left:0px"><strong>Yo soy:  &nbsp;&nbsp;&nbsp;&nbsp;<strong></span>
				
				<label class="radio">
               <input class="validate[required] radio" type="radio" name="sexo" id="radio1" value="Hombre">
                <span style="font-size:15px;color:gray"> Hombre</span>
              </label>&nbsp;&nbsp;
			  &nbsp;&nbsp;&nbsp;&nbsp;
			  <label class="radio">
                <input class="validate[required] radio" type="radio" name="sexo" id="radio1" value="Mujer">
                <span style="font-size:15px;color:gray"> Mujer</span>
              </label>
			  
		  </div><br/>
		  
		  <span style="font-size:13px;color:#000;padding-top:0px;padding-left:0px"><strong>Ciudad:<strong></span><br>
		  <select id="ciudad" name="ciudad" class="input-xlarge validate[required]">
		      <option value="">Ciudad</option>
			  <option value="1">San Pedro Sula</option>
			  <option value="2">Tegucigalpa</option>
			  <option value="3">Otra</option>
			 
			</select><br/> 
			
			 <input name="racepto" type="checkbox" value="" width="30px" height="30px" class="validate[required]" data-prompt-position="bottomLeft" /><span style="font-size:12px">&nbsp;&nbsp;Acepto los Terminos</span> <br/>
		 <div class="row-fluid">
  <div class="span12">
 
    <div class="row-fluid">
      <div class="span4" align="center" style="padding-top:20px;">
	     <h4>Es Gratis </h4>
	  </div>
      <div class="span8" align="center" style="padding-left:-10px;">
	  		<button type="submit" name="registrame" id="registrame"  class="btn btn-large btn-primary btn-success" style="font-size:16px"> <img src="assets/img/registrate.png" alt=""></button>
           
	  </div>
    </div>
  </div>
</div>

		</form>
        </div>
	</div>
    <div class="span6" style="background-color:none;padding-top:40px" align="center">
     
	  <div id="resultado"></div>
	  <div id="gracias" class="caja" style="width: 380px;height:290px;background-image:url('assets/img/gracias.png');" > </div>
<a id="single_image" href="assets/img/soon.jpg">&nbsp;</a>
    
	 <!--<input type="submit" class="submit"  id="registrar" value="Validate &amp; Send the form!"/><hr/>
	 <h2> Ingresar a RebajasHN</h2>
		<form id="formulario" >
		  <label>Usuario</label>
		  <input type="text" class="span4 txt"  placeholder="usuario@servidor">
		 
		  <label>Clave</label>
		  <input type="text" class="span4 txt" placeholder="Clave registrada">
		  
		  
		  <label class="checkbox">
			<input type="checkbox"> Recordarme 20 dias.
		  </label>
		  <button type="submit" class="btn ">Submit</button>
		</form>
	  -->
	</div>
  </div>
 
    </div> <!-- /container -->

	<div id="footer">
		<!-- Footer start -->
		<p><strong>&reg; Derechos Reservados , Elevation19</strong> 2012</p>
		<!-- Footer end -->
</div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap-modal.js"></script>
	<script src="assets/js/bootstrap-tooltip.js"></script>
	  
	<script src="assets/validate/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
	<script src="assets/validate/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script src="assets/js/elevation19.js"></script>

	
	<script type="text/javascript" src="assets/js/jquery.pnotify.js"></script>
	
	<script type="text/javascript" src="modulos/fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	

	
	
	 <!-- Js slider    ================================================== -->
		<script type="text/javascript" src="assets/slideshow/js/jquery.easing.min.js"></script>
		<script type="text/javascript" src="assets/slideshow/js/supersized.3.2.7.min.js"></script>
		<script type="text/javascript" src="assets/slideshow/theme/supersized.shutter.min.js"></script>
		
<script type="text/javascript">
    $(document).ready(function() {
      //  $("#single_image").fancybox().trigger('click');
	//	$("a#single_image").fancybox();
		$("#gracias").hide();
		
	
    });
	function ver(){
	//alert(2);
	//$("#gracias").show();
	}
</script>			
				
				<script type="text/javascript">
			
			jQuery(function($){
				
				$.supersized({
				    autoplay:0,
					// Functionality
					//slide_interval          :   10000,		// Length between transitions
					//transition              :   3, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					//transition_speed		:	900,		// Speed of transition
															   
					// Components							
					slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					slides 					:  	[			// Slideshow Images
														{image : 'slider/slider2.jpg', title : '', thumb : '', url : '#'},
														{image : 'slider/slider1.jpg', title : '', thumb : '', url : '#'},
														{image : 'slider/slider3.jpg', title : '', thumb : '', url : '#'},
														
												]
					
				});
				
			
		    });
		    
			
			
		</script>
<script>

function mostrar_gracias(){
   $("#gracias").show();

}

//show_stack_info();

function show_stack_info() {
    var modal_overlay;
    if (typeof info_box != "undefined") {
        info_box.pnotify_display();
        return;
    }
    info_box = $.pnotify({
        title: "Usuario Registrado",
        text: "Gracias por registrarte en elevation19.com, ya estas participando el sorteo estaremos en contacto v�a correo electr�nico para visitarte cuando estemos en operaci�n",
        type: "info",
        icon: "picon picon-object-order-raise",
        delay: 20000,
        history: false,
        stack: false,
        before_open: function(pnotify) {
            // Position this notice in the center of the screen.
            pnotify.css({
                "top": ($(window).height() / 2) - (pnotify.height() / 2),
                "left": ($(window).width() / 2) - (pnotify.width() / 2)
            });
            // Make a modal screen overlay.
            if (modal_overlay) modal_overlay.fadeIn("fast");
            else modal_overlay = $("<div />", {
                "class": "ui-widget-overlay",
                "css": {
                    "display": "none",
                    "position": "fixed",
                    "top": "0",
                    "bottom": "0",
                    "right": "0",
                    "left": "0"
                }
            }).appendTo("body").fadeIn("fast");
        },
        before_close: function() {
            modal_overlay.fadeOut("fast");
        }
    });
}

function limpiaForm(miForm) {
// recorremos todos los campos que tiene el formulario
$(':input', miForm).each(function() {
var type = this.type;
var tag = this.tagName.toLowerCase();
//limpiamos los valores de los campos�
if (type == 'text' || type == 'password' || tag ==  'textarea')
this.value = "";
// excepto de los checkboxes y radios, le quitamos el checked
// pero su valor no debe ser cambiado
else if (type == 'checkbo' || type == 'radio')
this.checked = false;
// los selects le ponesmos el indice a -
else if (tag == 'select')
this.selectedIndex = -1;
});
}

</script>
		
  </body>
</html>
<?php ob_end_flush(); ?>
