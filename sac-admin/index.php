<?php
/*
	@! SAC_ADMIN v3.0
	@@ Sistema de apoyo y control administrativo
-----------------------------------------------------------------------------	
	** author: Eduardo Garcia
	** website: http://www.grupoletiz.com
	** email: egarciazd@gmail.com
-----------------------------------------------------------------------------
	@@package: DashBoard 1.0
*/
include "init.php"; 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SAC-ADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">

      /* Sticky footer styles
      -------------------------------------------------- */

      html,
      body {
        height: 100%;
		background-color:black;
		background-image: url('cc-outer.jpg');
		background-repeat:no-repeat;
		
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 60px;
      }
	 #caja {
       background: rgba(17, 17, 17, .8);
       color:white;
       padding-top:20px;
       padding-left:20px;
       padding-right:20px;
      }

      #footer {
       background: rgba(17, 17, 17, .8);
      }

      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }



      /* Custom page CSS
      -------------------------------------------------- */
      /* Not required for template or sticky footer method. */

      .container {
        width: auto;
        max-width: 680px;
      }
      .container .credit {
        margin: 20px 0;
      }

    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    
     
    
  </head>

  <body>



    <!-- Part 1: Wrap all page content here -->
    <div id="wrap">

      <!-- Begin page content -->
     

<div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
            &nbsp;
        </div><!--/span-->
        <div class="span9">

          <div class="row-fluid" style="padding-top:160px">
            <div class="span4">
             &nbsp;
            </div><!--/span-->
     
            <div id="caja" class="span8">
              <span style="font-size: 20px;">Sistema de Apoyo y Control para <?php echo _SITE_NAME;?> </span>
            
               <div class="row-fluid">
				  <div class="span12">
				    &nbsp;
				    <div class="row-fluid">
				      <div class="span6" style=" border-right: 1px solid #CCC">
				      			
		              <span style="font-size: 18px;color:#006699">¡ BIENVENIDO !</span><br />
		              <p> para poder acceder a las funcionalidades de la p&aacute;gina debes, en primer lugar, introducir tu nombre de usuario y la contrase&ntilde;a que se te ha otorgado. </p>
		              <p>&nbsp;</p>
					  <div id="resultado" style="width: 220px">&nbsp;</div>			            
				      	<p>&nbsp;</p>
				      	<div style="font-size: 12px">Hoy es <?php include "inc/clock.php"?></div>
				      </div>
				      <div class="span6">
				      	   <span style="font-size: 13px"> sesi&oacute;n con su ID de SAC</span>
				      		<form method="post" action="" id="login_form">
							  <div class="control-group">
							    <label class="control-label" for="inputEmail">Usuario:</label>
							    <div class="controls">
							      <input type="text" id="username" name="username" placeholder="ID o Email">
							    </div>
							  </div>
							  <div class="control-group">
							    <label class="control-label" for="inputPassword">Clave:</label>
							    <div class="controls">
							      <input type="password" id="password" name="password" placeholder="Contrase&ntilde;a">
							    </div>
							  </div>
							  <div class="control-group">
							    <div class="controls">
							      <label class="checkbox">
							        <input type="checkbox"> <span style="font-size: 11px;color:#ccc">Recordarme en este Maquina</span>
							      </label>
							     
							       <input name="Submit" type="submit" id="submit" value="Iniciar Sesi&oacute;n" class="btn btn-info"/>
						  			
							    </div>
							  </div>
							</form>
				      	
				      </div>
				    </div>
				  </div>
				</div>
              
              
  							
            </div><!--/span-->
          </div><!--/row-->

        </div><!--/span-->
      </div><!--/row-->

  
    </div>



      <div id="push"></div>
    </div>

    <div id="footer">
      <div class="container" align="center">
        <p class="muted credit">&copy; Todos los derechos reservados. <a href="http://<?php echo _SITE_ADDRESS;?>"><?php echo _SITE_NAME;?>.</a> </p>
      </div>
    </div>



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
<script type="text/javascript">

$(document).ready(function()
{
	$("#login_form").submit(function()
	{
		//remove all the class add the messagebox classes and start fading
		$("#resultado").removeClass().addClass('alert alert-info').text('Validando....').fadeIn(1000);
		//check the username exists or not from ajax
		$.post("inc/login_execute.php",{ username:$('#username').val(),password:$('#password').val(),rand:Math.random() } ,function(data)
        {
        	
         alert(data);	
		  if(data=='1') //if correct login detail
		  {
		  	$("#resultado").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Ingresando.....').addClass('alert alert-success').fadeTo(900,1,
              function()
			  { 
			  	 //redirect to secure page
				 document.location='interface/dashboard.php';
			  });
			  
			});
		  }
		  else 
		  {
		  	$("#resultado").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Usuario o Clave incorrecta...').addClass('alert alert-error').fadeTo(900,1);
			});		
          }
				
        });
 		return false; //not to post the  form physically
	});
	//now call the ajax also focus move from 
	$("#password").blur(function()
	{
		$("#login_form").trigger('submit');
	});
});
</script>
  </body>
</html>
