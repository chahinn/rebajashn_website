     
			
$(document).ready(function() {
//roller de las imagenes del menu
	$("img.rollover").hover( 
		function() { this.src = this.src.replace("_off", "_on"); }, 
		function() { this.src = this.src.replace("_on", "_off"); 
	});
				
//validar el formulario de registro
	/*$("#form-registrar").validationEngine({
				ajaxFormValidation: true,
				ajaxFormValidationMethod: 'post',
				onAjaxFormComplete: ajaxValidationCallback
			});	
	*/
//tooltip
 $("[rel=tooltip]").tooltip();	
	
jQuery("#form-registrar").validationEngine('attach', {
  onValidationComplete: function(form, status){
    if(status)
	  { 
	   var name = $("#name").val();
			var id;
			var str = $("#form-registrar").serialize();
			//$("#results").text(str);
			//alert(str);
			$("#resultado").load('elevation19_proceso.php?op=1', {"name":str,"id":1} );
		    //$('#detalle').load('maquina_detalle_corte.php?id=<?php echo $record['id'] ?>');
			//$("#gracias").show();
		    //limpiaForm($("#form-registrar"));
			 //$("#resultado").fadeTo(500,1).fadeTo(13000,0);
			 //$("#resultado").hide(100);
			//if($("#resultado").html().indexOf('Not Set')==-1) {};
			//setTimeout("recargar()",3000);
	  
	  };
    //alert("The form status is: " +status+", it will never submit");
  }  
});


jQuery("#form-recuperar").validationEngine('attach', {
  onValidationComplete: function(form, status){
    if(status)
	  { 
	   var name = $("#name").val();
			var id;
			var str = $("#form-recuperar").serialize();
			//$("#results").text(str);
			//alert(str);
			$("#resultado_recupera").load('elevation19_proceso.php?op=3', {"name":str,"id":1} );
		    //$('#detalle').load('maquina_detalle_corte.php?id=<?php echo $record['id'] ?>');
			//$("#resultado").show();
			 //$("#resultado").fadeTo(500,1).fadeTo(13000,0);
			 //$("#resultado").hide(100);
			//if($("#resultado").html().indexOf('Not Set')==-1) {};
			//setTimeout("recargar()",3000);
	  
	  };
    //alert("The form status is: " +status+", it will never submit");
  }  
});


jQuery("#form-ingresar").validationEngine('attach', {
promptPosition:"bottomLeft",
  onValidationComplete: function(form, status){
    if(status)
	  { 
	   var name = $("#name").val();
			var id;
			var str = $("#form-ingresar").serialize();
			//$("#results").text(str);
			//alert(str);
			$("#resultado_ingresar").load('elevation19_proceso.php?op=2', {"name":str,"id":1} );
		    //$('#detalle').load('maquina_detalle_corte.php?id=<?php echo $record['id'] ?>');
			//$("#resultado").show();
			 //$("#resultado").fadeTo(500,1).fadeTo(13000,0);
			 //$("#resultado").hide(100);
			//if($("#resultado").html().indexOf('Not Set')==-1) {};
			//setTimeout("recargar()",3000);
	  
	  };
    //alert("The form status is: " +status+", it will never submit");
  }  
});



$('.click-toggle').click(function() {
    $('.target-toggle').toggle();
});


// Expand Panel
$("#open").click(function(){
		$("div#panel").slideDown("slow");
		
	
	});	
	// Collapse Panel
	$("#close").click(function(){
		$("div#panel").slideUp("slow");	
	});		
	
	// Switch buttons from "Log In | Register" to "Close Panel" on click
	$("#toggle a").click(function () {
		$("#toggle a").toggle();
	});		
		


}); //fin


	