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


// SITE CONSTANTS
//------------------------------------------------------------------------------

define("_SITE_NAME",    "Elevarion19");
define("_SITE_ADDRESS", "www.elevation19.com");
define("_PANEL_NAME",   "SAC-Elevation19");


define('MODS_DIRECTORY', 'modules');
define('LANG_DIRECTORY', 'languages');
define('STATIC_DIRECTORY', 'static');
define('ADMIN_DIRECTORY', 'admin');

/**
 * Email Constants - these specify what goes in
 * the from field in the emails that the script
 * sends to users, and whether to send a
 * welcome email to newly registered users.
 */
define("EMAIL_FROM_NAME", "Your Name");
define("EMAIL_FROM_ADDR", "yourname@domain.com");
define("EMAIL_WELCOME", true);//set this false if you do not want your users to receive a welcome Email after registration

/**
 * This constant forces all users to have
 * lowercase usernames, capital letters are
 * converted automatically.
 */
define("ALL_LOWERCASE", false);

/**
 * Special Names and Level Constants - the admin
 * page will only be accessible to the user with
 * the admin name and also to those users at the
 * admin user level. Feel free to change the names
 * and level constants as you see fit, you may
 * also add additional level specifications.
 * Levels must be digits between 0-9.
 */
define("ADMIN_NAME", "root");
define("GUEST_NAME", "visita");
define("ADMIN_LEVEL", 9);
define("USER_LEVEL",  1);
define("GUEST_LEVEL", 0);

/**
 * This boolean constant controls whether or
 * not the script keeps track of active users
 * and active guests who are visiting the site.
 */
define("TRACK_VISITORS", true);

/**
 * Timeout Constants - these constants refer to
 * the maximum amount of time (in minutes) after
 * their last page fresh that a user and guest
 * are still considered active visitors.
 */
define("USER_TIMEOUT", 10);
define("GUEST_TIMEOUT", 5);

/**
 * Cookie Constants - these are the parameters
 * to the setcookie function call, change them
 * if necessary to fit your website. If you need
 * help, visit www.php.net for more info.
 * <http://www.php.net/manual/en/function.setcookie.php>
 */
define("COOKIE_EXPIRE", 60*60*24*100);  //100 days by default
define("COOKIE_PATH", "/");  //Avaible in whole domain



?>
