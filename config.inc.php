<?php
################################################################################
##              			-= Grupo Leitz =-					               #
## --------------------------------------------------------------------------- #
##  Diseño PHP 			                                                       #
##  Desarrollado por :  Eduardo Garcia Pacheco                                 # 
##  License:       Rebajashn, Elevation19                                      #
##  Site:          http://www.elevation19.com			                       #
##  Copyright:     (c) 2012 Derechos Reservados.  	        				   #
##                                                                             #
##  Modulos Adicionales(embedded):                                             #
##  -- twitter bootstrap                    								   #
##  -- jQuery 		                                        				   #
##                                                                             #
################################################################################

// MODO DEL SITIO
//------------------------------------------------------------------------------
define("_SITE_MODE",    "debug"); // debug, production 

//------------------------------------------------------------------------------
if(_SITE_MODE == "debug"){
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors','1');
    ini_set('display_startup_errors','1');
    error_reporting (E_ALL);    
}

// SITE CONSTANTS
//------------------------------------------------------------------------------
define("_PANEL_NAME",   "Admin Panel");
define("_SITE_NAME",    "Your Site Name");
define("_SITE_ADDRESS", "domain.com");
define("_SITE_LANGUAGE", "en");
define("_ADMIN_EMAIL",  "admin@domain.com");
define("_CSS_STYLE",    "blue"); // blue, green
define("_DB_PREFIX",    "PHPAP105_");
define("_PHP_AP_VERSION", "1.0.5"); 
define("_SUPPORT_EMAIL", "support <support@domain.com>");
define("_CUSTOMER_EMAIL", "support <support@domain.com>");
define("_SITE_DIRECTORY", ""); // relatively to root (public html directory)
define("_SITE_UP_DIRECTORY", ""); // relatively to root (public html directory)

define("WEBM", "http://localhost/elevation19/members/"); // relatively to root (public html directory)


//Configuracion de la base de datos
define('DB_SERVER', "mysql1107.opentransfer.com");
//	define('DB_SERVER', "localhost");
	//database login name
define('DB_USER', "C334953_eleva");	
	//define('DB_USER', "root");
	//database login password
define('DB_PASS', "Nolose2012");
	//define('DB_PASS', "");
	//database name
define('DB_DATABASE', "C334953_elevation19");	
	//define('DB_DATABASE', "elevation19");


//smart to define your table names also
define('TABLE_USERS', "users");
define('TABLE_NEWS', "news");

?>