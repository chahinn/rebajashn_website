<!DOCTYPE html>
<html lang="en">
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
        
		<style>      
	body {			padding-top: 1%; /* 60px to make the container go all the way to the bottom of the topbar */			
	background-image:url('assets/img/noise.gif');			/*margin-left: auto;	
	margin-right: auto;			width: 940px;*/		  
	}	 
	.post {
	background:#fff;
	margin-bottom: 20px;
    padding: 20px 20px 10px;
	position:relative;
	border: 1px solid #D9D9D7;
    border-radius: 0 0 3px 3px;
    box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1), 0 0 0 3px #F9F9F9 inset;
}
   </style>
	 
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  	<!-- CSS validation -->	   
	    <link rel="stylesheet" href="assets/validate/validationEngine.jquery.css" type="text/css"/>
   
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
	   <button name="ingresar" id="ingresar" class="btn btn-large btn-primary btn-info" href="#"> Ingresar</button></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;<a data-toggle="modal" href="#recupera" style="font-size:14px">�Olvide mi contrase�a?</a> <div id="resultado_ingresar" style="color:red;font-size:16px"></div></td>
    <td><label class="checkbox" style="color:#fff">
                <input type="checkbox" id="recuerda" name="recuerda" value="1">
                Recordarme en este dispositivo
              </label></td>
	 <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	 <td align="right"><img src="assets/img/close_icon.png" alt="" id="close" class="close"></td>
  </tr>
  </table>
  </form>
 
    </div>
		
		</div>
</div> <!-- /login -->	


	
	
</div> <!--panel -->
	   <div class="navbar navbar-fixed-top caja-top" style="height: 120px;" >
       
      <div class="container">
			<div class="row show-grid">
    <div class="span3" align="center">
		<a href="index.php"><img src="assets/img/center.png"></a>
			</div>
    <div class="span6">
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
	  <div id="container" style="display:none">
	 <div id="topnav" class="topnav"> <span style="font-size:14px">�Ya estas Registrado?<br/>
		   &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-large" id="open" class="open" href="#"><i class="icon-user"></i> Ingresar</button></span>
		  <!-- The tab on top -->	
	
	 </div>					
		</div>
	   
	</div>
  </div>
			
	  </div>	  
    </div>

    <div class="container" style="width: 80%;background-color:none;">
	<!-- ventana modal de recuparacion -->
<style>

#recupera { 
    position: absolute; 
  top:70%;
   width: 430px;
    margin-left: -180px;
   }
</style>
<div id="recupera" class="modal hide fade in" style="display: none; ">
            <div class="modal-header">
              <a class="close" data-dismiss="modal">�</a>
              <h3>Recuparar contrase�a</h3>
            </div>
            <div class="modal-body">
            	<form id="form-recuperar"  onSubmit="return false;" class="form-inline">
					 <span style="font-size:13px;color:#000;padding-top:0px;padding-left:0px"><strong>Direcci�n de correo:<strong></span><br> 
						<input type="text" class="input-xlarge validate[required,custom[email]] text-input" name="correor" id="correor" placeholder="usuario@servidor">
						<br/><br/>
						<span style="font-size:13px;color:#000;padding-top:0px;padding-left:0px"><strong>Fecha de Nacimiento:<strong></span><br>
						<div class="form-inline">
							<select name="dia" id="dia" class="input-small validate[required]" >
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
							<select name="anio" class="input-small validate[required]">
									<option value="">A&ntilde;o:</option>
									<option value="1940">1940</option><option value="1941">1941</option><option value="1942">1942</option><option value="1943">1943</option><option value="1944">1944</option><option value="1945">1945</option><option value="1946">1946</option><option value="1947">1947</option><option value="1948">1948</option><option value="1949">1949</option><option value="1950">1950</option><option value="1951">1951</option><option value="1952">1952</option><option value="1953">1953</option><option value="1954">1954</option><option value="1955">1955</option><option value="1956">1956</option><option value="1957">1957</option><option value="1958">1958</option><option value="1959">1959</option><option value="1960">1960</option><option value="1961">1961</option><option value="1962">1962</option><option value="1963">1963</option><option value="1964">1964</option><option value="1965">1965</option><option value="1966">1966</option><option value="1967">1967</option><option value="1968">1968</option><option value="1969">1969</option><option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option>                               
							</select>
						</div><br/>
						<button type="submit" class="btn">Enviar a mi correo</button><div id="resultado_recupera" align="right" style="color:green"></div>
					  </form>
            </div>
            <div class="modal-footer">
             Elevation19.com
            </div>
          </div>
<!-- ventana modal de recuparacion 
		<img src="assets/img/hero.jpg">-->
		
    </div> <!-- /container -->
<div class="container post" style="width:80%;top:105px;">
<img src="assets/img/headerD.jpg">
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h2 style="font-size:40px">Nuestra Misi&oacute;n</h2><br/>
		
        <p style="font-size:20px"> Proveerle a los usuarios constantemente las mejores ofertas y eventos sociales, para que descubran y disfruten de su ciudad.</p>
       
      </div>

      <br/><br/><br/>

      <hr>

      <footer>
       <p><strong>&reg; Derechos Reservados , Elevation19.com </strong> 2012</p>
      </footer>

    </div>
		


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
	
	<script src="assets/validate/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
	<script src="assets/validate/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script src="assets/js/elevation19.js"></script>

		
		<script type="text/javascript">
        $(document).ready(function() {

            $(".signin").click(function(e) {          
				e.preventDefault();
                $("fieldset#signin_menu").toggle();
				$(".signin").toggleClass("menu-open");
            });
			
			$("fieldset#signin_menu").mouseup(function() {
				return false
			});
			$(document).mouseup(function(e) {
				if($(e.target).parent("a.signin").length==0) {
					$(".signin").removeClass("menu-open");
					$("fieldset#signin_menu").hide();
				}
			});			
			
        });
		</script>
  </body>
</html>
