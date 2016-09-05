<?php
// session_start();
 header('Content-Type: text/html; charset=ISO-8859-1');
  
//Conexion a la base de datos
	require_once("../inc/config.inc.php");
	require("../inc/Database.class.php"); 
	$db = Database::obtain(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect(); 
	include_once 'elevation19_secure.php';
	date_default_timezone_set('America/El_Salvador');
	setlocale(LC_TIME, 'spanish');
	 $opcion_menu=2;
//buscar la ciudad
function buscar_ciudad($ciudad,$db)
	{
		$sql = "SELECT * FROM el_area WHERE id_area=$ciudad";
		$row = $db->query($sql); 
		if($db->affected_rows > 0){
		  $record = $db->query_first($sql);
		   return $record['ciudad'];
		}
	
	
	};
	
//obtener la oferta del dia
     $ciudad=$_SESSION['SESS_CIUDAD'];
	 $sql_cupon="SELECT * FROM el_cupones where ciudad=$ciudad and ofertadeldia='si'";
	 //echo $sql_cupon;
	 $oferta =  $db->query_first($sql_cupon);	
	

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
     <link href="../assets/css/elevation19m.css" rel="stylesheet">
    
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
	<!-- CSS validation -->	   
	    <link rel="stylesheet" href="../assets/validate/validationEngine.jquery.css" type="text/css"/>
 <style>
	    .navbar-inner {
min-height: 50px;
}
    .navbar .brand {
float: left;
display: block;
padding: 8px 75px 12px;
margin-left: -20px;
font-size: 20px;
font-weight: 200;
line-height: 1;
color: #999;
margin-top:10px;
}
.navbar .nav {
position: relative;
left: 0;
display: block;
float: left;
margin: 18px 10px 0 0;

}
/*footer*/
#footer_space {
    background-color:#CC080B;
    border-bottom: 1px dashed #FFF;
    clear: both;
    float: left;
    height: 5px;
    min-width: 1040px;
    width: 100%;
}


	 </style>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>

  <body>
  <!--<img src="../assets/img/center.png" class="img-logo" width="285" height="129"> 
  
 <!-- header  ================================================== -->
<?php include 'elevation19_header.php';?>
<!-- ================================================== header -->



<div class="container"><!--Contenedor-->

<style>

#oferta{
-moz-border-radius: 3px;
border-radius: 3px;
-webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.35);
-moz-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.35);
box-shadow: 0 1px 5px rgba(0, 0, 0, 0.35);

margin: 0 30px 22px 25px;
background: white;
}
#oferta_search{
background: white;
background: -webkit-gradient(linear, left top, left bottom, color-stop(40%, white), color-stop(100%, #F3F3F3));
background: -webkit-linear-gradient(top, white 40%, #F3F3F3 100%);
background: -moz-linear-gradient(top, white 40%, #F3F3F3 100%);
background: linear-gradient(top, white 40%, #F3F3F3 100%);
-moz-border-radius: 5px 5px 0 0;
border-radius: 5px 5px 0 0;
border-bottom: 1px solid #D1D1D1;
z-index: 20;
margin: 0 30px 22px 25px;
height: 53px;
line-height:4em;
padding-left:30px;
box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);

}

#projects-content {
margin-bottom: 50px;
}
.gridview-item {
float: left;
}
.project-cover {
-moz-border-radius: 3px;
border-radius: 3px;
-webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.35);
-moz-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.35);
box-shadow: 0 1px 5px rgba(0, 0, 0, 0.35);
position: relative;
width: 253px;
margin: 0 25px 22px 0;
background: white;
}
.project-cover .cover-img {
width: 253px;
height: 190px;
display: block;
overflow: hidden;
position: relative;

}
.project-cover .cover-info {
height: 92px;
padding: 6px 10px;
background: white;
}
.project-cover .cover-stat-wrap {
-webkit-box-shadow: 0 1px 0px 0px white inset;
-moz-box-shadow: 0 1px 0px 0px white inset;
box-shadow: 0 1px 0px 0px white inset;
-moz-border-radius: 0 0 3px 3px;
border-radius: 0 0 3px 3px;
padding: 7px 8px 8px;
border-top: 1px solid #E7E7E7;
background-color: #F6F6F6;
position: relative;
}
.cover-stat {
margin-right: 8px;
}

.contenthover { padding:20px 20px 10px 20px; }
.contenthover, .contenthover h3, contenthover a { color:#fff; }
.contenthover h3, .contenthover p { margin:0 0 10px 0; line-height:1.4em; padding:0; }
.contenthover a.mybutton { display:block; float:left; padding:5px 10px; background:#3c9632; color:#fff; -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px; }
.contenthover a.mybutton:hover { background:#34742d }
</style>
<br/><br/>
<div id="projects-content" class="container">

<table class="table table-bordered"  >
   	<thead>
		<tr style="background-color:#f5f5f5;"> <th><span style="margin-right:10px;" class="label label-success">Ofertas</span> La orferta del dia</th></tr>
	</thead>
	<tbody>			    	
    <tr style="background-color:#fff;">
    <td>
     <div class="score_container_right">
	     
		<!--Contenedor oferta principal-->
		   <br/>
			<div style="padding-left:0px;" id="oferta" >
			<div class="row-fluid show-grid" style="padding-left:15px;padding-top:15px;padding-bottom:15px;">
				<div class="span5"><img src="img_cupones/<?php echo $oferta['img'];?>" class="thumbnail"></div>
				<div class="span6">
				   <h2> <?php echo $oferta['titulo'];?> - <?php	 $nombre_ciudad=buscar_ciudad($ciudad,$db); echo $nombre_ciudad;?> </h2>
					<br/><h6><?php  echo $oferta['brevedescripcion'];?></h6>
					
					<p><?php echo $oferta['descripcion'];?></p>	
					  <br/>
					  
					  <a title="" class="jSideDeal" href="start.php">
					<button class="btn btn-large btn-success" href="#"><strong>Ver la Oferta</strong></button>
					</a>
					<hr>
				</div>
			   
			 </div>
	
			</div>
		    <br/>
		
		<!--FIN Contenedor oferta Principal-->
	    
		

		
		
		<div class="navbar">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
      
        <div class="nav-collapse">
          <ul class="nav">
           
            <li>
			<select id="select01" class="search-query " style=" color: #FFF;background-color: #626262;border: 1px solid #151515;">
                <option>Categorias</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select></li>
			   <li>
			<select id="select01" class="search-query " style=" color: #FFF;background-color: #626262;border: 1px solid #151515;">
                <option>Ciudad</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select></li>
			<li>
				<input type="text" class="search-query span2" placeholder="Search">
			</li>	
            
          </ul>
       
          <ul class="nav pull-right">
           
            <li class="divider-vertical"></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Filtros <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div>
    </div><!-- /navbar-inner -->
  </div>
  
		
	

<div id="paging_container3" class="container">
	<div class="alt_page_navigation pagination"></div>
	<div class="info_text"></div>
		<ul class="gridview cfix alt_content unstyled" align="center">
		<?php
			//crear el sql del listado
			  $sql_ofertas = "SELECT * FROM el_cupones where activo='1'  ORDER BY id DESC";
			  //echo $sql_ultimas;
			  $rows_ofertas = $db->query($sql_ofertas);
			while ($record_ofertas = $db->fetch($rows_ofertas)) {
			
		?>	
	
			
			<li class="first odd gridview-item gridview-item-first gridview-row-first" data-type="app">    
				<div id="project-cover-4504321" class="project-cover cfix hover" project_id="4504321">
			   
				  <div id="coverImg4504321" class="cover-img">
				
				  <img  class="cover" src="img_cupones/<?php echo $record_ofertas['img'];?>" width="300" height="280"  border="0" />
					<div class="contenthover">
						<h3><strong><?php echo $record_ofertas['valor'] ?></strong> en vez de <?php echo $record_ofertas['anterior'] ?></h3>
						<p><?php echo $record_ofertas['brevedescripcion'] ?></p>
						<p><a href="elevation19_oferta.php?visto=1&id=<?php echo $record_ofertas['id'];?>" class="mybutton">Ver Oferta</a></p>
					</div>
					
			</div>
			  
				  <div class="cover-info">

					<div class="cover-name">
					<h4><?php echo $record_ofertas['titulo'] ?></h4>
					 
					</div>
				
					<div class="cover-by-wrap">
						
						<?php	 $nombre_ciudad=buscar_ciudad($ciudad,$db); echo $nombre_ciudad;?>
					</div><!-- .cover-by-wrap -->
			
					
				  </div><!-- .cover-info -->

				  <div class="cover-stat-wrap">
					<span class="cover-stat cover-stat-appreciations cover-stat-highlighted">
									<span class="stat-label be-font-inline">F</span>
									<span class="stat-value">86</span>
								  </span>
								  <span class="cover-stat cover-stat-views">
									<span class="stat-label be-font-inline">G</span>
									<span class="stat-value">332</span>
								  </span>
					
				  
					
				  </div><!-- .cover-stat-wrap -->

				  

				</div><!-- .project-cover -->
			</li>		
		<?php }//fin del ciclo del listado?>	

		</ul>
</div><!-- fin del div de paginacion -->
							        
									
	    </div>
							
   		</td>
      	</tr>
   	</tbody>
</table> 
      
    
</div> <!-- /container -->
</div>
</div>
<!--FOOTER-->
<?php include('elevation19_footer.php');?>
<!--FOOTER-->

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
	
	<!-- efecto de orden para filtros -->
		<script src="../assets/js/jquery.quicksand.js" type="text/javascript" charset="utf-8"></script>

		
	    <!-- efecto de las fotos -->
		<script src="../assets/js/jquery.contenthover.min.js" type="text/javascript" charset="utf-8"></script>

		<script src="../assets/validate/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
	  <script src="../assets/validate/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="../assets/js/jquery.pajinate.js"></script>	 
	
	   <script type="text/javascript">
	 $(document).ready(function() {
	  	$("#perfil").click(function(event){
			$("#contenedor").load('elevation19_perfil.php?op=3');
		});
		
		$('.cover').contenthover({
    overlay_background:'#000',
    overlay_opacity:0.8
});
		
		$('#paging_container3').pajinate({
					items_per_page : 8,
					item_container_id : '.alt_content',
					nav_panel_id : '.alt_page_navigation',
					nav_label_first : '<<',
					nav_label_last : '>>',
					nav_label_prev : '<',
					nav_label_next : '>'
					
				});
	
	 });
     
</script>



	
  </body>
</html>
