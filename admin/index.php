<?php 
//verificar la session
session_start();
	
if(!empty($_SESSION['SESS_MEMBER_ID']))
	{
	  header("Location:interface/dashboard.php");}	
	  
?>	
<!DOCTYPE html>
<html lang="es">
  <head>

	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>SAC, Elevation19</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- styles -->
    <link href="interface/assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
		background: url(interface/img/body-background.png);
      }
	  .box-shadow{
		border-radius: 4px; 
		-moz-border-radius: 4px; 
		-webkit-border-radius: 4px; 
		background: #fff;
		box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.80);
		-moz-box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.80);
		-webkit-box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.80);			
		
	}


      .sidebar-nav {
        padding: 9px 0;
      }
	  form label.error{ color:red;}
     .red-text{
	    color:#DD4B39;
	   }
	  #footer {
	   position:fixed;
	   left:0px;
	   bottom:0px;
	   height:35px;
	   width:100%;
	   border-top: 1px solid #ebebeb;
	   }
	  #footer ul {
		  color: #999;
		  float: left;
		  max-width: 80%;
		  }
		  #footer ul li {
		  display: inline;
		  padding: 0 1.5em 0 0;
		  }
		  #footer a {
		  color: #333;
		  }

    </style>
    <link href="interface/assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="interface/images/favicon.ico">
    <link rel="apple-touch-icon" href="interface/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="interface/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="interface/images/apple-touch-icon-114x114.png">
	

  
  </head>

  <body>
 



	<!-- Ventana Modal para envio de Mensajes ================================================== -->


          <!-- sample modal content -->
          <div id="myModal"  class="modal hide fade">
          <form class="modal-form form-horizontal" name="form-2domail">
  <div class="modal-header">
    <h3>
      <img src="interface/assets/img/2domail-logo.png" style="height:30px;">&nbsp;Mensaje para: <span id="span-to">Elevation19</span>
   
    </h3>
    <div style="clear:both"></div>
  </div>
  <div class="modal-body">
  
      <div class="control-group">
        <span class="control-label">De :</span>
        <div class="controls">
          <input type="text" name="from" id="from" value="" placeholder="usuario@servidor">
        </div>
      </div>
      
      <div class="control-group" id="ctrl-action">
        <span class="control-label">Tipo de Problema</span>
        <div class="controls">
        <select name="action" id="action" onchange="setImportance();" class="">
          <option selected="" value="">Seleccione una Opcion</option>
          <option disabled="">-----------------------</option>
          <option value="0">No recuerdo mi Usuario</option>
          <option value="0">No recuerdo mi clave</option>
		   <option value="0">Consulta Personal</option>
          
        </select>
        </div>
      </div>
      
       
      <input type="hidden" name="to" id="to" value="egarciazd">
      <input type="hidden" name="importance" id="importance" value="0">
      <input type="hidden" name="requested_action" id="requested_action" value="">
      
      <div class="control-group" id="ctrl-subject">
        <span class="control-label">Titulo :</span>
        <div class="controls">
          <input class="input" name="subject" id="subject">
        </div>
      </div>
      <div class="control-group" id="ctrl-message">
        <span class="control-label">Mensaje</span>
        <div class="controls">
          <textarea name="message" id="message" class="input-block-level" placeholder="Escriba se mensaje aqui..." rows="4" onkeyup="countDown();"></textarea>
          <span class="label label-info">Solo se Permiten</span>&nbsp;<span class="label" id="ccount">500 carateres maximo</span>
        </div>
      </div>
    
    <div class="alert alert-success hide" id="addContactError"><strong>Success!</strong> User was added to your contact list.</div>
    <div class="alert alert-error hide" id="errorAlert"><strong>Error!</strong> There are errors in the form, please fix them</div>
  </div>
  <div class="modal-footer">
    <button type="button" id="btn-submit" class="btn btn-primary" onclick="doPost();"><img id="img-loader" src="http://cdn.2domail.com/img/ajax-loader.gif" class="hide">&nbsp;Enviar Mensaje</button>
   <a href="#" class="btn" data-dismiss="modal" onclick="$('#myModal').modal('hide')" >Cancelar</a>
  </div>
  </form>
          </div>

<!--  ==================================================FIN Ventana Modal para envio de Mensajes -->
  
  
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
         
          <div class="nav-collapse">
            <ul class="nav">
			<a class="brand" href="#">Elevation19</a>
            
            </ul>
            <p class="navbar-text pull-right">&iquest;Necesitas Ayuda?</p>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
     
	 <div class="row-fluid">
        <div class="span7">
            
        <h2 class="red-text">Gestion Administrativa</h2>
			<div class="row">
    <div class="span6">
     
     </div>
   
  </div>
				
		   <div class="row-fluid">
		    <div class="span3">
			 <img src="interface/img/acceso.png" alt="" align="right">
			</div>
			<div class="span9">
              <h3>Acceso de Usuarios</h3>
              <p>Aseg&uacuterese de tener un Usuario y Clave v&aacute;lidos para acceso al sistema o bien solicite una credencial al administrador del mismo. </p> 
             
            </div><!--/span-->
            </div><!--/row-->
			
			<div class="row-fluid">
		    <div class="span3">
			 <img src="interface/img/horario.png" alt="" align="right">
			</div>
			<div class="span9">
              <h3>Horario de Ingreso</h3>
              <p> El horario de atencion en liene es de 7:30am a 6:00pm, en caso de no tener una assesor disponible deje su duda en la seccion de problemas.</p>
            
            </div><!--/span-->
            </div><!--/row-->
			
			<div class="row-fluid">
		    <div class="span3">
			  <img src="interface/img/browser.png" alt="" align="right">
			</div>
			<div class="span9">
              <h3>Navegadores</h3>
              <p>Para hacer uso del sistema es necesario de un navegador web como Internet Explorer 6+, Chrome, Mozilla, Firefox u Opera.</p>
             
            </div><!--/span-->
            </div><!--/row-->
       
        </div><!--/span-->
     
    <div class="span4">
		

		<div id="content">
	        <h2>&nbsp;</h2>

			<form id="login_form" method="post" class="well box-shadow" >
				 <table width="100%" border="0">
					<tr>
						<td><a href="#" class="thumbnail"><img src="interface/assets/img/center.png" width="300" height="100"></a></td>
					</tr>
				</table>
			  <fieldset>
					<div class="control-group">
						<label for="name" class="control-label"><strong>Nombre de usuario</strong></label>
						<div class="controls">
						<input type="text" class="input-xlarge"  name="login" id="login" placeholder="Usuario" title="Valor Requerido!">
						</div>
					</div>
					<div class="control-group">
						<label for="clave" class="control-label"><strong>Clave asignada </strong></label>
						<div class="controls">
						<input class="input-xlarge" type="password" name="password" id="password" placeholder="Contrase&ntilde;a" title="Valor Requerido!">
						</div>
					</div>
					
					<button class="btn btn-large primary" type="submit"><i class="icon-user icon-black"></i> Acceder al Sistema</button>
			   </fieldset>
			
				  <a data-toggle="modal" href="#myModal">&iquest;No puedes acceder a tu cuenta? </a>
						
			
			</form>
		
			<div id="vali" class="alert alert-info">
				  <a class="close" data-dismiss="alert">×</a>
				  <h4 class="alert-heading">No Acceso!</h4>
				  Best check yo self, you're not...
			</div>
			<span id="msgbox" style="display:none">
		</div>

     </div><!--/span-->

</div><!--/row-->
	  

  

    </div><!--/.fluid-container-->
	
	<div id="footer">
	  <ul>
  <li>Elevation19 &copy; 2012</li>
  
  
 
  </ul>

	 </div> 
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="interface/assets/js/jquery.js"></script>
    <script src="interface/assets/js/bootstrap-transition.js"></script>
    <script src="interface/assets/js/bootstrap-alert.js"></script>
    <script src="interface/assets/js/bootstrap-modal.js"></script>
    <script src="interface/assets/js/bootstrap-popover.js"></script>
    <script src="interface/assets/js/bootstrap-button.js"></script>
    
   
	<script src="interface/assets/js/jquery.validation1.js"></script>
  	
	<script type="text/javascript">
    $(document).ready(function() {
      //validar el formulario
	  $("#login_form").validate({
        rules: {
          login	 	: "required",
		  password	: "required",
         
        }, });//fin de la validacion
	  //$(".alert").alert();//ventana de alerta
	  //$(".alert").alert('close');
	  $('#vali').hide();
	  
	//control del formulario
	$("#login_form").submit(function()
	{
		
		//remove all the class add the messagebox classes and start fading
		$("#vali").removeClass().addClass('alert alert-info').text('Validando....').fadeIn(1000);
		//check the username exists or not from ajax
		$.post("auth/login_execute.php",{ login:$('#login').val(),password:$('#password').val(),rand:Math.random() } ,function(data)
        {
		 //alert(data);
		 var op =parseInt(data);
		  //alert(op);
		  switch (op)
			{
			case 1:
			{
				$("#vali").fadeTo(200,0.1,function()  //start fading the messagebox
				{ 
				  //add message and change the class of the box and start fading
				  $("#vali").removeClass().addClass('alert alert-success').text('Accediendo....').fadeTo(900,1,
				  function()
				  { 
					 //redirect to secure page
					 document.location='interface/dashboard.php';
				  });
				  
					});
		    }
			  break;
			case 2:
			{
			  	 
					$("#vali").fadeTo(200,0.1,function() //start fading the messagebox
					{ 
					//add message and change the class of the box and start fading
					$("#vali").removeClass().addClass('alert alert-error').html('<h4 class="alert-heading">&iexcl;Acceso Denegado!</h4>  El Usuario o Clave no es valido.').fadeTo(900,1);
					});		
			}		
			  break;
			case 3:
			{
			  	 
					$("#vali").fadeTo(200,0.1,function() //start fading the messagebox
					{ 
					//add message and change the class of the box and start fading
					$("#vali").removeClass().addClass('alert alert-block').html('<h4 class="alert-heading">&iexcl;Fuera de Horario!</h4>  Lo sentimos Ud. se encuentra fuera de su horario.').fadeTo(900,1);
					});		
			}		
			  break;
			
			}
         			
			
        });
 		return false; //not to post the  form physically
	})
	  
	  
    });
  </script>
	

  </body>
</html>
