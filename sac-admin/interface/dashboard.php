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

include "../inc/secure.php";

 header('Content-Type: text/html; charset=ISO-8859-1');
	date_default_timezone_set('America/El_Salvador');
	setlocale(LC_TIME, 'spanish');



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
     <!-- css ventanas --> 
	 <link href="../assets/ventanas/style.css" rel="stylesheet">
	 
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
      
      .sidebar-nav {
    padding: 9px 0;
}
		
		.dropdown-menu .sub-menu {
		    left: 100%;
		    position: absolute;
		    top: 0;
		    visibility: hidden;
		    margin-top: -1px;
		}
		
		.dropdown-menu li:hover .sub-menu {
		    visibility: visible;
		    display: block;
		}
		
		.navbar .sub-menu:before {
		    border-bottom: 7px solid transparent;
		    border-left: none;
		    border-right: 7px solid rgba(0, 0, 0, 0.2);
		    border-top: 7px solid transparent;
		    left: -7px;
		    top: 10px;
		}
		.navbar .sub-menu:after {
		    border-top: 6px solid transparent;
		    border-left: none;
		    border-right: 6px solid #fff;
		    border-bottom: 6px solid transparent;
		    left: 10px;
		    top: 11px;
		    left: -6px;
		}
		.nav > li > a {
			  margin: 0;
			  padding-top: 11px;
			  padding-bottom: 11px;
			 
			}
			.nav  li a .hint {
			  color: #d2d2d2;
			  display: block;
			  white-space: normal !important;
			  font-size: 11px;
			  line-height: 12px;
			  width: 220px;
			  margin: 3px 0px 5px 0px;
			}
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
                <div class="container-fluid">
                  <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  <a class="brand" href="#" style="color:#006699;font-size: 30px">SAC</a>
                  <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav">
                      <li class="active"><a href="#">Inicio</a></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Aplicaciones <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="users"><a href="eventos/crud_eventos.php" target="_child" title="CRUD de Eventos"><span><i class="exicon-users"></i>Eventos u Ofertas</span>
                        		<span class="hint">Administrar de los Eventos u ofertas del sitio (CRUD).</span></a>
                            </li>
                          <li><a href="http://localhost" target="_child" title="website">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li class="nav-header">Nav header</li>
                          <li><a href="#">Separated link</a></li>
                          <li><a href="#">One more separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
				                    <li>
				                    <a href="#">2-level Dropdown <i class="icon-arrow-right"></i></a>
				                    <ul class="dropdown-menu sub-menu">
				                        <li><a href="#">Action</a></li>
				                        <li><a href="#">Another action</a></li>
				                        <li><a href="#">Something else here</a></li>
				                        <li class="divider"></li>
				                        <li class="nav-header">Nav header</li>
				                        <li><a href="#">Separated link</a></li>
				                        <li><a href="#">One more separated link</a></li>
				                    </ul>
				                </li>
                        </ul>
                      </li>
                      <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">Administraci&oacute;n <b class="caret"></b></a>
               <ul class="dropdown-menu" role="menu">
                    <li class="users"><a href="http://labs.cs-cart.com/ultimate/admin.php?dispatch=profiles.manage"><span><i class="exicon-users"></i>Usuarios</span>
                        <span class="hint">Administrar cuentas de usuario que se registran en el sitio.</span></a>
                        
                                            </li>
                   <li class="administrators"><a href="http://labs.cs-cart.com/ultimate/admin.php?dispatch=profiles.manage&amp;user_type=A"><span><i class="exicon-administrators"></i>Administradores</span>
                        <span class="hint">Lista de los administradores del sitio, los usuarios registrados con una cuenta de administrador o cliente.</span></a>
                        
                                            </li>
                   <li class="customers"><a href="http://labs.cs-cart.com/ultimate/admin.php?dispatch=profiles.manage&amp;user_type=C"><span><i class="exicon-customers"></i>Configuaciones</span>
                        <span class="hint">Cofiguraciones basicas del sitio.</span></a>
                        
                </ul>
              
              <!--
              <ul class="dropdown-menu">
            
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="nav-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
                    <li>
                    <a href="#">2-level Dropdown <i class="icon-arrow-right"></i></a>
                    <ul class="dropdown-menu sub-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="nav-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
              </ul>-->
            </li>
                    </ul>
                    <form class="navbar-search pull-left" action="">
                      <input class="search-query span2" placeholder="Search" type="text">
                    </form>
                    <ul class="nav pull-right">
                     
                      <li class="divider-vertical"></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['SESS_FIRST_NAME'].' '.$_SESSION['SESS_LAST_NAME'];?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="#"><i class="icon-home"></i> Inicio</a></li>
							<li><a href="#"><i class="iconic-fullscreen"></i> <span id="view-fullscreen"> Pantalla Completa</span></a></li>
			                <li><a href="#" onClick="window.location.reload()"><i class="icon-refresh"></i> Recargar</a></li>
			                <li class="divider"></li>
			                <li><a href="dashboard.php?logout" title="Salir del Sistema"><i class="icon-off"></i> Salir del sistema</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div><!-- /.nav-collapse -->
                </div>
              </div>
    </div>

<div class="bs-docs-example">
            <div class="navbar">
              <div class="navbar-inner">
                <ul class="nav">
                  <li style="text-align: center;font-size: 12px"><a href="#"><img src="../dash.png" align="center" ><br/>DASHBOARD</a></li>
                  <li class="divider-vertical"></li>
                  <li style="text-align: center;font-size: 12px"><a href="#"><img src="../dash.png" align="center" ><br/>REPORTES</a></li>
                  <li class="divider-vertical"></li>
                   <li style="text-align: center;font-size: 12px"><a href="#"><img src="../dash.png" align="center" ><br/>MENSAJES</a></li>
                </ul>
              </div>
            </div>
          </div>


    <div class="container-fluid">
    	    <ul class="breadcrumb">
    <li><a href="#">Home</a> <span class="divider">/</span></li>
    <li><a href="#">Library</a> <span class="divider">/</span></li>
    <li class="active">Data</li>
    </ul>
    
    
      <div class="row-fluid">
        <div class="span3">
        	
        	<div class="dash-unit">
	          <img src="assets/img/brian.jpg" alt="Brian Smith">
	          <h1>BRIAN SMITH</h1>
	          <h4>London, UK.</h4>
	          <h6>Joined April 19, 2009</h6>
	          <p><i class="icon-envelope icon-white"></i> <a href="#" class="tooltip-test" data-placement="top" data-original-title="New Mails"><span class="badge badge-one">6</span></a> 
	          - <i class="icon-comment icon-white"></i> <a href="#" class="tooltip-test" data-placement="top" data-original-title="New Messages"><span class="badge badge-one">2</span></a></p>
			</div>
        	
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Sidebar</li>
              <li class="active"><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div class="hero-unit">
          	
            <h1>Hello, world!</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
            <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
          </div>
          <div class="row-fluid">
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
          <div class="row-fluid">
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>
    
    <!-- js ventanas --> 
		<script src="../assets/ventanas/behaviour.js" type="text/javascript"></script>
    
	<script type="text/javascript">
		$(document).ready(function() {
	
		});	
		
		
	//ventanas flotantes iframe
	function loadIframe(iframeName, url) {
		$('#' + iframeName).show();
		var $iframe = $('#' + iframeName);
		if ( $iframe.length ) {
        $iframe.attr('src',url);
        return false;
       }
    return true;
	}
	</script>
	
	
	
  </body>
</html>
