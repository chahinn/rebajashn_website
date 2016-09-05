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

/*
modifying the max execution time of the script if the safe is mode is turned off. this is to ensure that all API requests get completed.
*/
if(!ini_get("safe_mode")) {
	set_time_limit(180);
}

/*
error reporting for the application. Set it to error_reporting(E_ALL) for debugging.
*/
error_reporting(0);
ini_set('display_errors', '0');

/*
session inclusion and initialization for the application.
*/
include("inc/session.php");


/*
database inclusion and initialization for the application.
*/
include("inc/database.php");

/*
configuration file which contains the application settings.
*/
include("inc/config.php");
