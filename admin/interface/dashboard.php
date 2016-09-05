<!DOCTYPE html>
<html lang="es">
  <head>
  <?php
// session_start();
 header('Content-Type: text/html; charset=ISO-8859-1');
 
 //ver la hora y fecha actual
	date_default_timezone_set('America/El_Salvador');
	setlocale(LC_TIME, 'spanish');
  // example 1 
$time1 = date('H:i'); 
$time2 = "23:35"; 

//echo "Time difference: ".get_time_difference($time1, $time2)." segundos<br/>"; 
$sesion=get_time_difference($time1, $time2);

function get_time_difference($time1, $time2) 
{ 
    $time1 = strtotime("1/1/1980 $time1"); 
    $time2 = strtotime("1/1/1980 $time2"); 
     
    if ($time2 < $time1) 
    { 
        $time2 = $time2 + 86400; 
    } 
    $x= round(abs($time2 - $time1),1);
    //return ($time2 - $time1) / 3600; 
	return $x;
     
} 
  setcookie("loggedin", "true", $sesion);
//Conexion a la base de datos
	require_once("inc/config.inc.php");
	require("inc/Database.class.php"); 
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect(); 
	include 'russell_secure.php';
	date_default_timezone_set('America/El_Salvador');
	setlocale(LC_TIME, 'spanish');

	
//FUNCION PARA BUSCAR TURNOS
// Devuelve la letra del turno 
function turno($turno_id){
   //echo $turno_id;
   $sql="SELECT * FROM  members_turno WHERE id=$turno_id;";
       //echo $sql;
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		if(empty($row['id']))
		  echo "N/A";
		  else
		   echo strtoupper($row['turno']);
};
//FUNCION PARA BUSCAR GRUPO DE APP
// Devuelve el nombre del grupo de aplicasiones 
function grupo($grupo_id){
   $sql="SELECT * FROM phpap105_menu WHERE id=$grupo_id;";
       //echo $sql;
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		if(empty($row['id']))
		  echo "N/A";
		  else
		   echo $row['name'];
};	

//FUNCION PARA BUSCAR EL PUESTO
// Devuelve el nombre del puesto
function puesto($puesto_id){
   $sql="SELECT * FROM members_puesto WHERE id=$puesto_id;";
       //echo $sql;
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		if(empty($row['id']))
		  echo "N/A";
		  else
		   echo $row['epuesto'];
};	
//FUNCION PARA BUSCAR LA HORA Y FECHA
// Devuelve el nombre del puesto
function ingreso($usuario_id){
	$hoy=date('Y-m-d');
	//echo $hoy;
   $sql="SELECT * FROM members_session WHERE user_id=$usuario_id and fecha='$hoy';";
       //echo $sql;
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		if(empty($row['id']))
		  echo "N/A";
		  else
		   echo $row['fecha'].' Hora : '.$row['hora_i'];
};	
//crear los sql para los menus

 if ($_SESSION['SESS_TYPE']=='admin')
   {
    $qry_menu="SELECT * FROM "._DB_PREFIX."menu WHERE id <> 1 and is_menu_group = 1 AND is_hidden = 0   ORDER BY order_index ASC";
	//echo "SELECT * FROM "._DB_PREFIX."menu WHERE is_menu_group = 1 AND is_hidden = 0 AND  is_dashboard_icon = 1  ORDER BY order_index ASC";
	
   }else{
    $qry_menu="SELECT * FROM "._DB_PREFIX."menu WHERE is_menu_group = 1 AND is_hidden = 0  AND id=". $_SESSION['SESS_GROUP'] ." ORDER BY order_index ASC";
	//echo $qry_menu;
   }
?>
<meta charset="utf-8">
<title>Sistema de Apoyo y control</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Eduardo Garcia Pacheco">


    <!-- Le styles -->
	<link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
		background-color: #EEE;
		background: url(img/body-background.png);
		background-image: url(temp/bg_body.png);
      }
	  
	
	  /* Fullscreen */
html:-moz-full-screen {
   background: url(img/body-background.png);
}

html:-webkit-full-screen {
   background: url(img/body-background.png);
}

html:fullscreen {
   background: url(img/body-background.png);
}
	.cargando{
	background-color:none;
	width:270px;
	height:150px;
	position:relative;
	
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
}
.cargando img{
	font-size:22px;
	margin:15px 85px 10px;
	color:white;
	text-align:center;
	position:absolute;
}
      .sidebar-nav {
        padding: 9px 0;
      }
 #iframe1
        {
            position: absolute;
            left: 0px;
            top: 36px;
			width: 100%;
            height: 95%;
        }

/* div foto y datos  */		

/*------------------------------------------------------------------
[7. Account / .account-container]
*/

.account-container {
	display: table;
}

.account-avatar,
.account-details {
	display: table-cell;
	vertical-align: top;
}

.account-avatar {
	padding-right: 1em;
}

.account-avatar img {
	width: 125px;
	height: 125px;
}

.account-details {
}

.account-details span {
	display: block;
}

.account-details .account-name {
	font-size: 15px;
	font-weight: 600;
}

.account-details .account-role {
	color: #888;
}

.account-details .account-actions {
	color: #BBB;
}

.account-details a {
	font-size: 11px;
}
 
			  .ca {
				background: white;
				border: 1px solid #E3E3D9;
				-webkit-border-radius: 4px;
				-moz-border-radius: 4px;
				border-radius: 4px;
				}
		
    </style>

			<style>
	.main {
background-color: 
white;
min-height: 450px;
border-top: 1px solid 
#D7DBE3;
border-left: 1px solid 
#C4C7CF;
border-right: 1px solid 
#C4C7CF;
border-bottom: 1px solid 
#A8ACB3;
-moz-border-radius: 3px 0 3px 3px;
-webkit-border-radius: 3px 0 3px 3px;
border-radius: 3px 0 3px 3px;
width: 654px;
float: left;
-moz-box-shadow: 1px 2px 5px rgba(0,0,0,0.07);
-webkit-box-shadow: 1px 2px 5px 
rgba(0, 0, 0, 0.07);
box-shadow: 1px 2px 5px 
rgba(0, 0, 0, 0.07);
}
.sombra_caja {
-webkit-box-shadow: 0 8px 6px -6px #545454;
-moz-box-shadow: 0 8px 6px -6px #545454;
box-shadow: 0 8px 6px -6px #545454;
}
#small_title_bar {
display: block;
z-index: 100;
height: 38px;
border-bottom: 1px solid 
#DDDFE0;
background-color: 
#EFF0F1;
-moz-border-radius: 4px 0 0 0;
-webkit-border-radius: 4px 0 0 0;
border-radius: 4px 0 0 0;
-moz-box-shadow: 0 13px 15px rgba(255,255,255,0.5) inset;
-webkit-box-shadow: 0 13px 15px 
rgba(255, 255, 255, 0.5) inset;
box-shadow: 0 13px 15px 
rgba(255, 255, 255, 0.5) inset;
display: inline-block;
}


/* ////////////// */
/* Blog */
/* ///////////////*/
.post {
	background:#fff;
	margin-bottom: 20px;
    padding: 20px 20px 10px;
	position:relative;
	border: 1px solid #D9D9D7;
    border-radius: 0 0 3px 3px;
    box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1), 0 0 0 3px #F9F9F9 inset;
}

.masonry_item {
	float:left;
	width:271px;
	margin-right: 20px;
  	margin-bottom: 20px;
}
.entry-header {
	background:#393c41 url("images/bg/bg-post-header.gif") repeat;
	border-bottom: 1px solid #2A2C30;
    border-top: 2px solid #2A2C30;
    color: #E1E1E2;
    margin: -20px -20px 15px;
    padding: 15px 20px 2px;
}
.entry-header a, .entry-header a:visited {
	color: #E1E1E2;
	text-decoration:none;
}
.entry-header a:hover {
	color: #fff;
	text-decoration:none;
}
.entry-header p {
	border-left: 1px solid #494b4f;
    margin: 0 0 0 30px;
    padding-left: 15px;
	line-height:20px;
}
.entry-header .icon {
	margin-top:2px;	
}
.entry-title {
    color: #40403d;
    margin-bottom: 15px;
	font-size:16px;
	font-weight:bold;
}
.entry-title a {
	font-weight:bold;
	color:#4D4D49;
	text-decoration:none;
}
.type-page .entry-title, .single .entry-title {
	border-bottom: 1px solid #E5E5E3;
    font-size: 16px;
    margin: 0 -20px 20px;
    padding: 0 20px 15px;
}
.entry-title a:hover {
	color:#4d4d4d;
}

/* Blog Meta */
.entry-meta {
	padding:10px 20px;
	font-size: 10px;
	color: #737373 !important;
	text-shadow: 0 1px 0 #FFFFFF;
	position:relative;
}
.entry-meta a {
	color: #737373 !important;
	text-decoration:none;	
}
.entry-meta a:hover {
	color: #404040;
	text-decoration:none;	
}
.post .entry-meta, .theme_portfolio .entry-meta {
	background:#f1f1f1;
	margin: 0 -20px -10px;
	border-top:1px solid #D9D9D7;
}
body.single .entry-meta {
	border-top:none;
	padding:0;	
}
.entry-title.cat {
	border-bottom: 1px solid #E5E5E3;
    font-size: 14px;
    margin: 0 -20px 10px;
    padding: 0 20px 15px;
}
.entry-meta ul, .categories {
    list-style: none outside none;
    margin: 0;
    padding: 0;
	font-size: 11px;
}
.entry-meta ul li, .categories li {
	border-bottom:1px solid #D9D9D7;
	margin-bottom: 10px;
    padding-bottom: 10px;
}
.entry-meta ul li.last, .categories li.last {
	border-bottom:0;
	padding-bottom:0;
}
.entry-meta ul li.current-cat, .categories li.current-cat {
	font-weight:bold;
}
.entry-meta ul li .icon {
	margin-right: 15px;	
}





		</style>	
	
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
     <!-- css ventanas --> 
	 <link href="librerias/ventanas/style.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
	 <!-- css de chat --> 
	<link type="text/css" rel="stylesheet" media="all" href="modules/chat/css/chat.css" />
     <!--<link type="text/css" rel="stylesheet" media="all" href="modules/chat/css/screen.css" />--> 
	<!--[if lte IE 7]>
		<link type="text/css" rel="stylesheet" media="all" href="modules/chat/css/screen_ie.css" />
	<![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
  
  </head>


<body>

<!--Dialog box contents-->
<div id="dialogExpired" title="Session (Page) Expired!"><p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 0 0;"></span> Your session has expired!<p id="dialogText-expired"></p></div>
<div id="dialogWarning" title="Session (Page) Expiring!"><p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 0 0;"></span> Your session will expire in <span id="dialogText-warning"></span> seconds!</div>


<div class="cargando" id="carga"><p><img src="img/cargar.gif"></p></div>


<!-- Barra de Navegacion ================================================== -->
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Elevation19</a>
   	    <div class="nav-collapse">
          <ul class="nav">
		  <li class="item-435 current active"><a href="#" onclick="$('#cont').show();$('#iframe1').hide()"><i class="icon-home icon-white"></i> Inicio</a></li>
           	<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Aplicaciones <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <?php  
                 //opciones del menu de aplicaciones
				    $row = $db->query($qry_menu);
					while ($record = $db->fetch_array($row)) { ?>	 
			            <li class="dropdown"><a href="#"><?php echo $record["name"];?><b class="caret"></b></a>
				       <ul class="dropdown-menu">
						   <?php
						    //ciclo de sub-menu
					        $qry_submenu="SELECT * FROM "._DB_PREFIX."menu WHERE is_menu_group = 0 AND is_hidden = 0 AND parent_id = ".intval($record['id'])." ORDER BY order_index ASC";
							$result2=mysql_query($qry_submenu);
							while($row2 = mysql_fetch_array($result2)) { ?>		
  					      	   <li><a  href="<?php echo $row2['page_name'] . '?ad=2&dere=' . $row3['derechos']; ?>" target="_child"><?php echo $row2["name"];?></a></li>
						   <?php };//fin de los sub-menus?>
						 </ul>
					</li>
				    <?php };//fin del ciclo de menu?>
				<li class="divider"></li>
                <li class="dropdown"><a href="#">Adicionales <b class="caret"></b></a>
					<ul class="dropdown-menu">
					<?php
$qry_adicionales="SELECT phpap105_menu.name, phpap105_menu.page_name,phpap105_menu.icon, phpap105_adicionales.id, phpap105_adicionales.id_app, phpap105_adicionales.id_member, phpap105_adicionales.derechos
FROM phpap105_adicionales, phpap105_menu
WHERE phpap105_menu.id = phpap105_adicionales.id_app
AND phpap105_adicionales.id_member =".$_SESSION['SESS_MEMBER_ID'];
                     $result3=mysql_query($qry_adicionales);
					  while($row3 = mysql_fetch_array($result3)) { ?>			
						   <li><a href="<?php echo $row3['page_name'] . '?ad=2&dere=' . $row3['derechos']; ?>" target="_child"><?php echo $row3["name"];?></a></li>
					<?php };//fin del sub-menu adicionales?>  	   
						 </ul>
					</li>
				</ul>
			 			
			  
            </li>
			 <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administraci&oacute;n <b class="caret"></b></a>
			  <ul class="dropdown-menu">
			 <?php	
              //Menu Administrativo
 			if ($_SESSION['SESS_TYPE']=='admin'){
				//crear el sub-menu
		 		$qry_admin="SELECT * FROM "._DB_PREFIX."menu WHERE is_menu_group = 0 AND is_hidden = 0 AND parent_id =1 ORDER BY order_index ASC";
				$result_admin=mysql_query($qry_admin);
				while($row_admin = mysql_fetch_array($result_admin)) {?>     
					 <li><a href="<?php echo $row_admin['page_name'] . '?ad=2&dere=' . $row_admin['derechos']; ?>"  target="_child"><?php echo $row_admin["name"];?></a></li> 
			  
			 <?php 
			    };//fin del ciclo del menu administrativo
			    };//fin del si del menu administrativo?>
			 </ul>	
             </li>
			 
          </ul>
          
		  <ul class="nav pull-right">
		    <li class="divider-vertical"></li>
		      <li class="dropdown ">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['id'].$_SESSION['SESS_FIRST_NAME'].' '.$_SESSION['SESS_LAST_NAME'];?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-home"></i> Inicio</a></li>
				<li><a href="#"><i class="iconic-fullscreen"></i> <span id="view-fullscreen"> Pantalla Completa</span></a></li>
                <li><a href="#" onClick="window.location.reload()"><i class="icon-refresh"></i> Recargar</a></li>
                <li class="divider"></li>
                <li><a href="dashboard.php?logout" title="Salir del Sistema"><i class="icon-off"></i> Salir del sistema</a></li>
			  </ul>
            </li>
          </ul>

          </div><!--/.nav-collapse -->
        </div>
      </div>
</div>
<!-- Fin de la Barra de navegacion================================================== -->  




<!-- CONTENIDO CENTRAL ================================================== -->
<div class="container-fluid" id="cont" style="display:none;" >

<div class="container post">

    <div class="row-fluid ">
            <div class="span6">
             	<div class="account-container">
				<div class="account-avatar">
				<?php
				 if ($_SESSION['SESS_PIC']==''){?>
                   <img src="img/silueta.png" alt="" width="100px" height="100px" class="thumbnail" />
                  <?php }else{?>
                   <img src="uploads/<?php echo $_SESSION['SESS_PIC']?>" alt="" width="100px" height="100px" class="thumbnail" />
                <?php };?>
				</div> <!-- /account-avatar -->
				<div class="account-details">
				    <span style="font-size:14px">Bienvenido</span>
				    <span class="account-name" id="no"><?php echo $_SESSION['id'].$_SESSION['SESS_FIRST_NAME'].' '.$_SESSION['SESS_LAST_NAME'];?></span>
					<span class="account-role">
					 <?php 
					    if ($_SESSION['SESS_TYPE']=='admin')
						{ echo "Administrador";}else{echo "Cliente";};?></span>
					<span class="account-actions">
						<a href="javascript:;">Profile</a> |
						<a href="javascript:;">Edit Settings</a>
						<p>
						<a href="" style="font-size:13px;color:gray">105 Mensajes</a> | <a href="" style="font-size:13px;color:gray">15 Tareas</a>
						</p>
						
					</span>
					
						<div id="example">Some element</div>

				</div> <!-- /account-details -->

				</div> <!-- /account-container -->	

			</div><!--/span6-->
            
			<div class="span2">
				<ul class="nav nav-list">
					<li class="nav-header">Dashboard</li>
					<li><a href="#"><i class="icon-home"></i> Inicio</a></li>
					<li><a href="#" onClick="window.location.reload()"><i class="icon-refresh"></i> Recargar</a></li>
					<li><a href="#"><i class="icon-move"></i> <span id="cancel-fullscreen"> Pantalla Completa</span></a></li>
				</ul>
			</div>
            <div class="span4 ">
				  <h3>Success</h3>
				  <div class="alert alert-success">
					<button class="close" data-dismiss="alert">×</button>
					<strong>Well done!</strong> You successfully read this important alert message.
				  </div>
			</div>
    </div>	
     <br/>


 <div class="row-fluid">
	  
        <div class="span3">
					<style>
	/* COMMENTS   
----------------------------------------------------------*/
ul#comments {
	padding: 0;
	margin: 0;
	list-style: none;
	line-height: 1.2em;
	text-shadow: 1px 1px 0px #fff;
}
ul#comments a.all-messages {
	text-align: center;
	display: block;
	padding: 1px 0;
}
ul#comments span.unreaded {
	display: block;
	color: #999;
	font-weight: normal;
}
ul#comments li.last {
	background-color: #EFF3F8;
	font-weight: bold;
	font-size: .9em;
}
ul#comments li.last:hover {
	background-color: #fff;
}
ul#comments li {
	-moz-transition: all 0.3s ease-out; /* FF3.7+ */;
	-o-transition: all 0.3s ease-out; /* Opera 10.5 */;
	-webkit-transition: all 0.3s ease-out; /* Saf3.2+, Chrome */;
	padding: 5px 6px;
	margin:0;
	border-top: 1px #ddd solid;
}
ul#comments li.new {
	background-color: #FFFFCC;
}
ul#comments li:hover {
	background-color: #fff;
}
ul#comments img {
	float: left;
	margin-right: 10px;
	padding-top: 3px;
}
ul#comments span {
	display: block;
}
ul#comments span.sender {
	font-size: 1.1em;
	font-weight: bold;
}
ul#comments span.description {
	font-size: .9em;
	color: #555;
	font-weight: normal;
}
ul#comments span.date {
	font-size: .8em;
	color: #aaa;
	font-weight: normal;
}
</style>
                <h4>Clientes en Linea</h4>
				<ul id="comments" class="tooltip-enabled">
					<li><a href="#" original-title="this comment is from John Doe">
					<img alt="user" src="img/online.png">
					<span class="sender">John Doe</span>
					
					<span class="description"><a href="#" original-title="Aprrove this comment">Approve</a> | 
					<a href="#" original-title="Delete this comment">Delete</a>
					</span>
					<br class="clear">
					</li>
					<li><a href="#" original-title="again this guy!">
					<img alt="user" src="images/icons/sender.png">
					<span class="sender">John Doe</span>
					<span class="description">Hi, i need some help.</span>
					<span class="date">24 minutes ago...</span> </a>
					<span class="floatright"><a href="#" original-title="Aprrove this comment">Approve</a> | 
					<a href="#" original-title="Delete this comment">Delete</a>
					</span>
					<br class="clear">
					</li>
					<li><a href="#" original-title="is he a spammer?">
					<img alt="user" src="images/icons/sender.png">
					<span class="sender">John Doe</span>
					<span class="description">Thank you for your help.</span>
					<span class="date">50 minutes ago...</span> </a>
					<span class="floatright"><a href="#" original-title="Aprrove this comment">Approve</a> | 
					<a href="#" original-title="Delete this comment">Delete</a>
					</span>
					<br class="clear">
					</li>
					<li class="last"><a class="all-messages" href="#" original-title="See all comments awaiting confirmation.">See all comments!
					<span class="unreaded">8 awaiting confirm.</span> </a></li>
				</ul>
								
			
			
        </div><!--/span-->
        <div class="span9">
			
<div class="row-fluid">
		    
<div class="span8">

			<style>
			.sideBottom{
    position:fixed;
    z-index:200;
    bottom:-10px;left:40px;
    width:183px;
    height:auto;
    min-height:30px;
    background-color:rgb(255,255,255);
    border-right:1px rgb(235,235,235) solid;
    border-left:1px rgb(235,235,235) solid;
	}
.sideBottom .headblue{
width:inherit;
height:30px;

-webkit-border-radius: 0px;
     -moz-border-radius: 0px;
          border-radius: 0px;
    text-shadow:none;
    font-family:"OpenSansRegular";

}
.sideBottom .headblue i{
    margin-top:2px;
}

.sideBottom #tasksSideList li{
    padding:3px 10px 4px 3px;
    font-size:12px;
    margin:0;
    border-bottom:1px rgb(235,235,235) solid;
}
.sideBottom #tasksSideList li a{
    color:#222;
    text-decoration:none;
}
.sideBottom #tasksSideList li:last-child{
    border:none;
}
.sideBottom #tasksSideList li:hover{
    background-color:rgb(245,245,245);
}
.sideBottom #tasksSideList li i{
    margin-top:1px;
    margin-right:4px;
}
	 .sombras{
	    -moz-box-shadow:0px 0px 8px 0px rgba(119, 119, 119, 0.98);
-webkit-box-shadow:0px 0px 8px 0px rgba(119, 119, 119, 0.98);
box-shadow:0px 0px 8px 0px rgba(119, 119, 119, 0.98);
   }

			</style>
			
		<div class="sideBottom sombras">
				<button class="btn btn-primary headblue" data-toggle="collapse" data-target="#tasksSideList">TaskList <i class="icon-white icon-circle-arrow-down"></i></button>
				<ul id="tasksSideList" class="collapse" style="height: 0px; ">
					<li data-taskid="6" data-taskstate="1"><i class="icon-ok"></i> 6. <a href="#">Explore Elements</a></li>
					<li data-taskid="5" data-taskstate="0"><i class="icon-remove"></i> 5. <a href="#">Add New Project</a></li>
					<li data-taskid="4" data-taskstate="0"><i class="icon-remove"></i> 4. <a href="#">Add New Messages</a></li>
					<li data-taskid="3" data-taskstate="1"><i class="icon-ok"></i> 3. <a href="#">Custom Functions</a></li>
					<li data-taskid="2" data-taskstate="0"><i class="icon-remove"></i> 2. <a href="#"></a>Custom CSS</li>
					<li data-taskid="1" data-taskstate="1"><i class="icon-ok"></i> 1. <a href="#">Love this Theme :)</a></li>
				</ul>
			</div>	
			
			
				
			

            </div><!--/span-->
          


<div class="span4">



<table class="table table-bordered">
			    	<thead>
			    		<tr style="background-color:#f5f5f5;">
			    			<th><span class="label label-success" style="margin-right:10px;">Enlaces</span> Acceso Directo</th>
			    		</tr>
			    	</thead>
			    	<tbody>			    	
                		<tr>
                   			<td>
                    			<div class="score_container_right">
										 <dl id="lista_app">
										<?php
										//Crear el listado de Iconos
										$qry_icons="SELECT * FROM "._DB_PREFIX."menu WHERE is_menu_group = 0 AND is_hidden = 0 AND is_dashboard_icon = 1 AND 
										parent_id = ".intval($_SESSION['SESS_GROUP'])." ORDER BY order_index ASC";
										//echo $qry_icons;
										$rows_pu = $db->query($qry_icons);
										 while ($record_pu = $db->fetch_array($rows_pu)) {
										   if($record_pu['icon'] != "")
											{ ?>			
											 <dd>
											 <a href="<?php echo $record_pu['page_name'];?>" class="highlightit" onclick="return loadIframe('iframe1', this.href);">
											 <img src="icons/<?php echo $record_pu['icon']?>"  border="0" width="20" height="20">
											 <span> <?php  echo $record_pu['name']?></span></a>
											 </dd>
											<?php } };?>    
									  </dl>
							    </div>
                    		</td>
			          	</tr>
			    	</tbody>
			    </table>


            </div><!--/span-->
          </div><!--/row-->
     
        </div><!--/span-->
      </div>
	  
	  
      <hr>

      <footer>
        <p>© ELEVATION19 2012</p>
      </footer>

    </div>
   

	
	
 </div><!-- /row-fluid-->


</div><!-- /Fin del div cont -->
<!-- FIN CONTENIDO CENTRAL ================================================== -->

<!-- IFRAME CONTENIDO CENTRAL ================================================== -->
	<iframe id="iframe1" name="iframe1" src="dashboard/loading.html" frameborder="0">Cargando...</iframe>
<!-- /IFRAME CONTENIDO CENTRAL ================================================== -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
	<script src="assets/jqueryui/jquery-ui-1.8.14.custom.min.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
	<!-- reloj -->
    <script src="assets/js/jquery.MyDigitClock.js"></script>
	
	<!-- Fullscreen -->
    <script src="assets/js/fullscreen.js"></script>
	 <!-- Scroll -->
    <script src="assets/js/slimScroll.min.js"></script>
	
	<!-- js ventanas --> 
		<script src="librerias/ventanas/behaviour.js" type="text/javascript"></script>
	
	<script type="text/javascript">
	
	$(document).ready(function(){
			setTimeout(function() {
      	$('#carga').hide();
		$('#cont').fadeIn(1500);}, 3000);			   
         $("#iframe1").hide();  
	



		$(window).resize(function(){

				$('.cargando').css({
					position:'absolute',
					left: ($(window).width() - $('.cargando').outerWidth())/2,
					top: ($(window).height() - $('.cargando').outerHeight())/2
				});
				
			});
			// To initially run the function:
			$(window).resize();

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
		
		 $('#testrailvisible').slimscroll({
				  width: '300px',
				  railVisible: false,
				  allowPageScroll: true
			  });
		

   </script>
	
	<script>
	$(function()
{
  var hideDelay = 500;  
  var currentID;
  var hideTimer = null;

  // One instance that's reused to show info for the current person
  var container = $('<div id="personPopupContainer">'
      + '<table width="" border="0" cellspacing="0" cellpadding="0" align="center" class="personPopupPopup">'
      + '<tr>'
      + '   <td class="corner topLeft"></td>'
      + '   <td class="top"></td>'
      + '   <td class="corner topRight"></td>'
      + '</tr>'
      + '<tr>'
      + '   <td class="left">&nbsp;</td>'
      + '   <td><div id="personPopupContent"></div></td>'
      + '   <td class="right">&nbsp;</td>'
      + '</tr>'
      + '<tr>'
      + '   <td class="corner bottomLeft">&nbsp;</td>'
      + '   <td class="bottom">&nbsp;</td>'
      + '   <td class="corner bottomRight"></td>'
      + '</tr>'
      + '</table>'
      + '</div>');

  $('body').append(container);

  $('.personPopupTrigger').live('mouseover', function()
  {
      // format of 'rel' tag: pageid,personguid
      var settings = $(this).attr('rel').split(',');
      var pageID = settings[0];
      currentID = settings[1];

      // If no guid in url rel tag, don't popup blank
      if (currentID == '')
          return;

      if (hideTimer)
          clearTimeout(hideTimer);

      var pos = $(this).offset();
      var width = $(this).width();
      container.css({
          left: (pos.left + width) + 'px',
          top: pos.top - 5 + 'px'
      });

      $('#personPopupContent').html('&nbsp;');

      $.ajax({
          type: 'GET',
          url: 'info.php',
          data: 'page=' + pageID + '&guid=' + currentID,
          success: function(data)
          {
              // Verify that we're pointed to a page that returned the expected results.
              if (data.indexOf('personPopupResult') < 0)
              {
                  $('#personPopupContent').html('<span >Page ' + pageID + ' did not return a valid result for person ' + currentID + 'Please have your administrator check the error log.</span>');
              }

              // Verify requested person is this person since we could have multiple ajax
              // requests out if the server is taking a while.
              if (data.indexOf(currentID) > 0)
              {                  
                  var text = $(data).find('.personPopupResult').html();
                  $('#personPopupContent').html(text);
              }
          }
      });

      container.css('display', 'block');
  });

  $('.personPopupTrigger').live('mouseout', function()
  {
      if (hideTimer)
          clearTimeout(hideTimer);
      hideTimer = setTimeout(function()
      {
          container.css('display', 'none');
      }, hideDelay);
  });

  // Allow mouse over of details without hiding details
  $('#personPopupContainer').mouseover(function()
  {
      if (hideTimer)
          clearTimeout(hideTimer);
  });

  // Hide after mouseout
  $('#personPopupContainer').mouseout(function()
  {
      if (hideTimer)
          clearTimeout(hideTimer);
      hideTimer = setTimeout(function()
      {
          container.css('display', 'none');
      }, hideDelay);
  });
});

</script>
	<script type="text/javascript" language="javascript">
//event to check session time variable declaration
var checkSessionTimeEvent;

$(document).ready(function() {
	//event to check session time left (times 1000 to convert seconds to milliseconds)
    checkSessionTimeEvent = setInterval("checkSessionTime()",10*1000);
});
//Your timing variables in number of seconds

//total length of session in seconds
//var sessionLength = 30; 
var sessionLength = <?php echo $sesion?>; 
//time warning shown (10 = warning box shown 10 seconds before session starts)
var warning = 10;  
//time redirect forced (10 = redirect forced 10 seconds after session ends)     
var forceRedirect = 10; 

//time session started
var pageRequestTime = new Date();

//session timeout length
var timeoutLength = sessionLength*1000;

//set time for first warning, ten seconds before session expires
var warningTime = timeoutLength - (warning*1000);

//force redirect to log in page length (session timeout plus 10 seconds)
var forceRedirectLength = timeoutLength + (forceRedirect*1000);

//set number of seconds to count down from for countdown ticker
var countdownTime = warning;

//warning dialog open; countdown underway
var warningStarted = false;

function checkSessionTime()
{
	//get time now
	var timeNow = new Date(); 
	
	//event create countdown ticker variable declaration
	var countdownTickerEvent; 	
	
	//difference between time now and time session started variable declartion
	var timeDifference = 0;
	
	timeDifference = timeNow - pageRequestTime;

    if (timeDifference > warningTime && warningStarted === false)
        {            
            //call now for initial dialog box text (time left until session timeout)
            countdownTicker(); 
            
            //set as interval event to countdown seconds to session timeout
            countdownTickerEvent = setInterval("countdownTicker()", 1000);
            
            $('#dialogWarning').dialog('open');
			warningStarted = true;
        }
    else if (timeDifference > timeoutLength){
    		//close warning dialog box
            if ($('#dialogWarning').dialog('isOpen')) $('#dialogWarning').dialog('close');
            
            //$("p#dialogText-expired").html(timeDifference);
            $('#dialogExpired').dialog('open');
            
             //clear (stop) countdown ticker
            clearInterval(countdownTickerEvent);
        }
        
    if (timeDifference > forceRedirectLength)
     	{    
        	//clear (stop) checksession event
            clearInterval(checkSessionTimeEvent);
            //force relocation
            window.location="dashboard.php?logout";
        }

}

function countdownTicker()
{
	//put countdown time left in dialog box
	$("span#dialogText-warning").html(countdownTime);
	
	//decrement countdownTime
	countdownTime--;
}

$(function(){              
                // jQuery UI Dialog    
                $('#dialogWarning').dialog({
                    autoOpen: false,
                    width: 400,
                    modal: true,
                    resizable: false,
                    buttons: {
                        "Restart Session": function() {
                           // location.reload();
                        }
                    }
                });
                
                $('#dialogExpired').dialog({
                    autoOpen: false,
                    width: 400,
                    modal: true,
                    resizable: false,
					close: function() {
                            window.location="dashboard.php?logout";
                        },
                    buttons: {
                        "Login": function() {
                            window.location="dashboard.php?logout";
                        }
                    }
                });
});


$(window).resize( function(e)
{
    //alert($(window).width());
if ($(window).width() <= 420) {
 //$('#no').css('font-size',($(window).width()/20)+'px');
 $('#no').css('font-size',11+'px');
 }
 if ($(window).width() >420 && $(window).width() <= 1000) {
 $('#no').css('font-size',16+'px');
 }
 if ($(window).width() >1000) {
 $('#no').css('font-size',21+'px');
 }
});

//reloj
$(function(){
	$("#clock1").MyDigitClock();

	$("#clock2").MyDigitClock({
		fontSize:50, 
		fontFamily:"Century gothic", 
		fontColor: "#000", 
		fontWeight:"bold", 
		bAmPm:true,
		background:'#fff',
		bShowHeartBeat:true
		});
		
	$("#clock3").MyDigitClock({
		fontSize:150, 
		fontColor:"grey",
		background:"#fff",
		fontWeight:"bold",
		timeFormat: '{HH}:{MM}'}
	);
});

 
</script>
	
  </body>
</html>
