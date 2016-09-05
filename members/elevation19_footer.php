<style>
#footer {


background-color:black;
color:white;
}
#footer {position: relative;
	margin-top: 120px; /* negative value of footer height */
	
	clear:both;} 

</style>
 <script src="../assets/js/jquery.js"></script>
 <script>
			    function checkForm() {
					var name = document.formcontacto.f_name.value;
					var email = document.formcontacto.f_email.value;
					var message = document.formcontacto.f_message.value;
					var button = document.formcontacto.b_submit;
					if(!name || !email || !message) return;
					$("#b_submit").show();
					//button.onclick = submitForm;
				}
				
	$(document).ready(function(){	
	     $("#b_submit").hide();
	     $("#resultadocontacto").hide();
	    //post a comentario 
		$("#b_submit").click(function(event){
		    //alert(1);
			var name = $("#name").val();
			var id;
			var str = $("#formcontacto").serialize();
			//$("#results").text(str);
			//alert(str);
			$("#resultadocontacto").show();
			$("#resultadocontacto").load('elevation19_proceso_members.php?op=10', {"name":str,"id":1} );
		});
	
	});			
				</script>
<div id="footer" >
<div class="linea-roja">&nbsp;</div><!--Red-linea-->
	
	<div class="container" style="background-color:black">

      <!-- Example row of columns -->
      <div class="row" style="border-bottom-width:1px;
  border-bottom-style:solid;
  border-bottom-color:#fff;">
        <div class="span4">
        <h3>Informaci&oacute;n</h3>
							<h6>Consulta a Elevation19.</h6>
          <p>
		        <div id="form">
						<form name="formcontacto" id="formcontacto"  onSubmit="return false;">
							<table width="100%" border="0">
								<tbody><tr>
									<td><em>Nombres:</em></td>
									<td><input type="text" id="f_name" name="f_name" maxlength="30" onchange="checkForm();"></td>
								</tr>
								<tr>
									<td><em>Correo:</em></td>
									<td><input type="text" id="f_email" name="f_email" maxlength="100" onchange="checkForm();"></td>
								</tr>
								<tr>
									<td valign="top"><em>Mensaje:</em><br/><br/> <button class="btn btn-inverse"  name="b_submit" id="b_submit" alt="Enviar">Enviar</button></td>
									<td><textarea id="f_message" name="f_message" onkeypress="checkForm();" rows="0" cols="0"></textarea></td>
								</tr>
								<tr>
								  <td colspan="2" >
									
								
									</td>
								</tr>
							</tbody></table>
						</form>
						<div id="resultadocontacto" style="font-size:11px"><small>&nbsp;</small></div>
					</div>
		  </p>			
        </div>
        <div class="span4">
            <h3>Cont&aacute;ctanos</h3>
						<h6>En las redes sociales o al correo electr&oacute;nico.</h6>
						<table width="100%" border="0">
							<tbody><tr>
								<td colspan="2"><img src="../assets/img/socialf.png" border="0" usemap="#Map2" /></td>
								</tr>
							  <tr>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
						      </tr>
							  <tr>
								<td><em><strong>Correo :</strong></em></td>
								<td>servicioalcliente@elevation19.com</td>
							</tr>
						</tbody></table>
       </div>
        <div class="span4">
		 <h3>Enlaces</h3>
						<h6>Paginas disponibles.</h6>
          <div style="padding: 8px 0;">
        <ul class="unstyled">
          <li class="active"><h6><a href="start.php" style="color:white"><i class="icon-home icon-white"></i> Inicio</a></h6></li>
		  <li class="active"><h6><a href="elevation19_ofertas.php" style="color:white"><i class="icon-list-alt icon-white"></i> Ofertas</a></h6></li>
		  <li class="active"><h6><a href="elevation19_eventos.php" style="color:white"><i class="icon-user icon-white"></i> Eventos</a></h6></li>
		  <li class="active"><h6><a href="elevation19_como.php" style="color:white"><i class="icon-question-sign icon-white"></i> Como Funciona</a></h6></li>
		  
	    </ul>
      </div>
        </div>
      </div>

          <footer>
        <p> ELEVATION19.COM &copy; 2012.<BR/> <span style="color:#CCCCCC">Todos los Derechos Reservados.</span></p>
      </footer>

	  <map name="Map2" id="Map2">
  <area shape="rect" coords="117,2,171,51" href="mailto:info@rebajashn.com" />
  <area shape="rect" coords="6,2,57,52" href="http://www.facebook.com/Elevation19" target="_blank" />
  <area shape="rect" coords="171,3,217,47" href="http://rebajashn.blogspot.com/" target="_blank" />
  <area shape="rect" coords="62,3,106,49" href="http://www.twitter.com/#!/Elevation19" target="_blank" />
</map>
    </div>