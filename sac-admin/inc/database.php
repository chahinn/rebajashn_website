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



// definicion de variables para la app de ingenieria
$db_server 		= "localhost";
$db_user	 	= "root";
$db_password 	= "";
$db_name 		= "c334953_elevation19";

/*
connecting to the database using PHP PDO. all the database connectivity in the application is handled using PDO only for injection proof queries.
*/
try {
	$db = new PDO("mysql:host={$db_server};dbname={$db_name}", $db_user, $db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	/* displaying the error page over here. */
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Oops!</title>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1, minimum-scale=1, width=device-width">
<style>
*{margin:0;padding:0}html,code{font:15px/22px arial,sans-serif}html{background:#1a1a1a;color:#fefefe;padding:15px}body{margin:7% auto 0;max-width:390px;min-height:180px;padding:30px 0 15px}p{margin:0 0 10px;overflow:hidden}ins{font-size:13px;color:#efefef;text-decoration:none}a{text-decoration:none;color:#fff;}a img{border:0}@media screen and (max-width:772px){body{background:none;margin-top:0;max-width:none;padding-right:0}}
</style>
</head>
<body>
<h1>Oops!</h1><br/>
<p>Algo ha salido mal en esta página. Por favor, inténtelo de nuevo dentro unos minutos tiempo.</p><br/>
<ins>Hemos recibido un informe sobre este problema. Estamos trabajando para resolver esta situación lo antes posible.</ins>
</body>
</html>
<?php
	exit;
}
?>