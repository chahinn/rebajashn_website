<?php
################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 #
## --------------------------------------------------------------------------- #
##  PHP AdminPanel Free                                                        #
##  Developed by:  ApPhp <info@apphp.com>                                      # 
##  License:       GNU GPL v.2                                                 #
##  Site:          http://www.apphp.com/php-adminpanel/                        #
##  Copyright:     PHP AdminPanel (c) 2006-2009. All rights reserved.          #
##                                                                             #
##  Additional modules (embedded):                                             #
##  -- PHP DataGrid 4.2.8                   http://www.apphp.com/php-datagrid/ #
##  -- JS AFV 1.0.5                 http://www.apphp.com/js-autoformvalidator/ #
##  -- jQuery 1.1.2                                         http://jquery.com/ #
##                                                                             #
################################################################################


//ver la hora y fecha actual
	date_default_timezone_set('America/El_Salvador');
	setlocale(LC_TIME, 'spanish');
// SITE MODES
//------------------------------------------------------------------------------
define("_SITE_MODE",    "debug"); // debug, production 

// SITE CONSTANTS
//------------------------------------------------------------------------------
define("_PANEL_NAME",   "SAC-RUSSELL");
define("_SITE_NAME",    "SAC-RUSSELL");
define("_SITE_ADDRESS", "russell.com");
define("_SITE_LANGUAGE", "en");
define("_ADMIN_EMAIL",  "admin@russell.com");
define("_CSS_STYLE",    "blue"); // blue, green
define("_DB_PREFIX",    "members_");
define("_PHP_AP_VERSION", "1.0.0"); 
define("_SUPPORT_EMAIL", "support <support@domain.com>");
define("_CUSTOMER_EMAIL", "support <support@domain.com>");
define("_SITE_DIRECTORY", ""); // relatively to root (public html directory)
define("_SITE_UP_DIRECTORY", ""); // relatively to root (public html directory)


//Configuracion de la base de datos
//define('DB_SERVER', "mysql1107.opentransfer.com");
	define('DB_SERVER', "localhost");
	//database login name
//define('DB_USER', "C334953_eleva");	
	define('DB_USER', "root");
	//database login password
//define('DB_PASS', "Nolose2012");
	define('DB_PASS', "");
	//database name
define('DB_DATABASE', "C334953_elevation19");	
	//define('DB_DATABASE', "elevation19");



/*$username = "root";
$password = "";
$hostname = "localhost";	
$database = "pepe_tienda";

mysql_connect($hostname, $username, $password) or die(mysql_error());
mysql_select_db($database) or die(mysql_error()); */


//Definir variables adicionales

//------------------------------------------------------------------------------

//------------------------------------------------------------------------------
if(_SITE_MODE == "debug"){
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors','1');
    ini_set('display_startup_errors','1');
    error_reporting (E_ALL);    
}

class Config
{

    var $host = '';
    var $user = ''; 
    var $password = '';
    var $database = '';  

    function Config()
    {
	$this->host     = "localhost";  
	$this->user     = "root";
	$this->password = "";
	$this->database = "elevation19";		
    }

}
error_reporting(0);
	

?>