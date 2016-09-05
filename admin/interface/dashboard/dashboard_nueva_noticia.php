<?php
 require_once("../inc/config.inc.php");
     require_once("../inc/database.inc.php");
     //require_once("inc/settings.inc.php");
     session_start();
    $db=new Database();	
    $db->open(); 
    $db3=new Database();	
    $db3->open();
?>
<script src="../assets/js/jquery.js"></script>
<script type="text/javascript">



        
   
	
	//envio de correo de la seccion del footer
     $("#enviar_noti").click(function(event){
					   var name = $("#name").val();
					   var id;
					   var str = $("#form_noti").serialize();
					   //alert(str);
					  $("#resultado_noti").load('dashboard/dashboard_procesar.php?op=3', {"name":str,"id":1} );
					 // $("#resultado_noti").fadeTo(500,1).fadeTo(10000,0);
					  $("#resultado_noti").text("<b>Some</b> new text.");	
									
				  });


</script>

<div id="resultado_noti" class="alert alert-success">Nueva Notificacion</div>
<form onSubmit="return false;" id="form_noti" name="form_noti" class="form-horizontal">

		 <div class="control-group">
            <label class="control-label" for="select01">Turno</label>
            <div class="controls">
              <select name="turno" id="turno2">
                <option value="general">General</option>
               <?php
				   //Creaar la lista de turnos
					$sql_cat="SELECT * FROM members_turno order by turno asc";
					echo $sql_cat;   
					 $db->query($sql_cat);
					 while($record_cat= $db->fetchAssoc()){
					 
									   
						   echo "<option value=".$record_cat['id'].">".$record_cat['turno']."</option>";
				   }//fin del ciclo de las bases 
				  ?>                            
              </select>
            </div>
          </div>
           
		 <div class="control-group">
            <label class="control-label" for="select02">Nivel</label>
            <div class="controls">
              <select name="tipo" id="tipo">
					  <option value="bajo">Bajo</option>
					  <option value="medio">Medio</option>
					  <option value="alto">Alto</option>
				</select>
            </div>
          </div>
          
		  <div class="control-group">
            <label class="control-label" for="subject">Titulo</label>
            <div class="controls">
            <input name="subject" id="subject"  class="span3" type="text">
			  <p class="help-block">Titulo de la Notificacion.</p>
            </div>
          </div>
         
         <div class="control-group">
            <label class="control-label" for="textarea11">Contenido</label>
            <div class="controls">
              <textarea name="content" class="input-xlarge"  id="content" rows="6"></textarea>
			  
            </div>
          </div>
 
       <div class="form-actions">
            <button name="enviar_noti" id="enviar_noti" class="btn btn-primary">Publicar</button>
            
          </div>
</form>

