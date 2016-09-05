<?php
################################################################################
##              			-= Grupo Leitz =-					               #
## --------------------------------------------------------------------------- #
##  Diseño PHP 			                                                       #
##  Desarrollado por :  Eduardo Garcia Pacheco                                 # 
##  License:       GNU GPL v.2                                                 #
##  Site:          http://www.grupoleitz.com			                       #
##  Copyright:     (c) 2010 Derechos Reservados.  	        				   #
##                                                                             #
##  Modulos Adicionales(embedded):                                             #
##  -- 960CSS 		                        					http://960.gs/ #
##  -- jQuery 		                                        http://jquery.com/ #
##                                                                             #
################################################################################

//Autenticación del sitio


?>

<html xmlns="http://www.w3.org/1999/xhtml">

    <HEAD>
    
        <title>SAC :: Sistema de Apoyo y Control, Russell Coorp.</title>
      
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="Content-Language" content="es"/>
        <link rel="shortcut icon" href="favicon.ico?tmsp=20101008"/>
        
       
        <!--Reset CSS-->      
    	 <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
         
        	<link rel="stylesheet" type="text/css" href="fancybox/fancybox/jquery.fancybox-1.3.1.css" media="screen" />
 			<link rel="stylesheet" href="fancybox/style.css" />
        <!--autoriza CSS-->      
    	<link rel="stylesheet" type="text/css" href="demo/demo.css" media="screen" />
    	<link rel="stylesheet" type="text/css" href="demo/login_panel/css/slide.css" media="screen" />
        
        <!-- archivo principal de ExtJS -->
        <link rel="stylesheet" type="text/css" href="extjs/resources/css/ext-all.css"/>
        <link rel="stylesheet" type="text/css" href="extjs/resources/css/theme-slate/css/xtheme-slate.css" />
        <link rel="stylesheet" type="text/css" href="extjs/resources/css/theme-slate/css/style.css" />
        <!--Listado de los CSS-->      
      	<link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
		<!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->

 		
     </HEAD>


<body>


	<div id="contenedor" class="container_12">
		<div id="header" class="grid_12">
		  <img src="img/logo.png" width="268" height="51" alt="logo">
		</div> 
		<!--Fin del grid_12 (header)--> 
		<div class="clear"></div>
	
    	<div id="menu" class="grid_12">
				<ul class="nav main">
                     <li>
						<img  src="img/ico_refresh.png" width="16" height="16" alt="recargar">
					</li>
					<li>
					<a id="recargar" href="#">Recargar</a>
					</li>
                     <li>
						<img src="img/ico_print.png" width="16" height="16" alt="imprimir">
					</li>
                    <li>
						<div ><a href="#" id="externalCSS" >Imprimir</a></div>
					</li>
                     <li>
						<img src="img/lock.png" width="16" height="16" alt="autorizar">
					</li>
                    <li>
						<a id="various3" href="#">Autorizar</a>
					</li>               
                    
                    <li class="secondary">
						<a href="#" title="SAC">Sistema de Apoyo y Control</a>
					</li>
				</ul><!--Fin del nav main (menu)-->
		</div><!--Fin del grid_12 (menu)-->
             
		<div class="clear"></div>
		
      <div id="referencia" class="grid_12">
		  <ul id="crumbs">
            <li><a href="#"><img src="img/home_ico.png" width="16" height="16" border="0"> Inicio &raquo;</a></li>
            <li><a href="#">Enlace #1 &raquo;</a></li>
            <li><a href="#">Enlace #2 &raquo;</a></li>
            <li><a href="#">Enlace #3 &raquo;</a></li>
            <li>Pagina Actual</li>
          </ul>
		</div><!--Fin del grid_12 (referencia)--> 
		
    	<div class="clear"></div>
	    
        <div id="contenido" class="grid_12">

          <P> Aqui va el contendio de la pagina que se desee</P>


		</div><!--Fin del grid_12 (contenido)--> 
	    
        
        	
            
     <div class="clear"></div>
       
			<div class="grid_12" id="site_info">
				<div class="box">
					<p><a href="#">SAC :: Sistema de Apoyo y Control</a> </p>
				</div>
			</div><!--Fin del grid_12 (footer)--> 
	<div class="clear"></div>
			
	</div><!--Fin del container_12 (contenedor)--> 
    
    
		<!--Listado de los modulos EXTJS-->
        <script type="text/javascript" src="extjs/adapter/ext/ext-base.js"></script>
		<script type="text/javascript" src="extjs/ext-all.js" ></script>
		<script type="text/javascript" src="extjs/locale/ext-lang-es.js"></script> 
      
        <!--Listado de los modulos JQUERY--> 
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script>
		<script type="text/javascript" src="js/jquery-fluid16.js"></script>
        <script type="text/javascript" src="js/jquery.printElement.js"></script>
        
       
         
        <script type="text/javascript"> 
       		$(document).ready(function() {
				$("#externalCSS").click(function() {
					printElem({printMode: 'popup' , overrideElementCSS: ['css/text.css','css/layout.css','css/grid.css','css/nav.css']});			
				 });
			  });
			 function printElem(options){
				 $('#contenedor').printElement(options);
			 }
	    </script> 
        <script type="text/javascript">
			$(document).ready(function() {
				$('#recargar').click(function() {
					location.reload();
				});
			});       
	    </script>
      
      <script type="text/javascript" src="fancybox/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
	<script type="text/javascript" src="fancybox/fancybox/jquery.fancybox-1.3.1.js"></script>
      <script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/

			$("a#example1").fancybox({
				'titleShow'		: false
			});

			$("a#example2").fancybox({
				'titleShow'		: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});

			$("a#example3").fancybox({
				'titleShow'		: false,
				'transitionIn'	: 'none',
				'transitionOut'	: 'none'
			});

			$("a#example4").fancybox();

			$("a#example5").fancybox({
				'titlePosition'	: 'inside'
			});

			$("a#example6").fancybox({
				'titlePosition'	: 'over'
			});

			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

			/*
			*   Examples - various
			*/

			$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$("#various2").fancybox();

			$("#various3").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});

			$("#various4").fancybox({
				'padding'			: 0,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
		});
	</script>

	</body>
</html>