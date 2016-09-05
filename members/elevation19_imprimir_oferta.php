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

.container {padding: 20px 0 0 0}
.hero-unit{background: #FFF;padding: 0}
.page-header{clear: both; }
.carousel-inner img{height: 300px; width: 100%}
#printBtn,#downBtn{width: 100%;margin: 10px 0 0 0 }
footer{text-align: center}

.noPrint{display: none}

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
<br/><br/>

      <div class="container">
            <div class="span8">
                <div class="thumbnail span3">
                    <img src="images/me.jpg" alt="" />
                </div>
                <div class="hero-unit span4">
                    <h1>John Doe</h1>
                    <h2>PRESIDENT OF THE UNIVERSE</h2>
                    <p>
                        <i class="icon-map-marker"></i>
                        3678 Street name
                        city , XX 010101
                        somewhere on 
                        planet earth
                    </p>
                </div>
                <div class="page-header">
                </div>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mauris arcu, ultricies in vestibulum in, iaculis nec enim. Quisque sapien odio, venenatis mollis mollis id, pulvinar congue sapien. 
                </p>
                <p>
                    Donec laoreet faucibus odio quis sollicitudin. Sed sagittis semper ultrices. Morbi eget eros felis, vel convallis nibh. Quisque ut felis magna, at lobortis sem. 
                </p>
                <div  class="page-header noPrint">
                    <h2>Last work</h2>
                </div>
                <div id="myCarousel" class="carousel noPrint">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="active item">
                            <img src="images/1.jpg" alt="" />
                            <div class="carousel-caption">
                                <h4>1 - Thumbnail label</h4>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/2.jpg" alt="" />
                            <div class="carousel-caption">
                                <h4>2 - Thumbnail label</h4>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/3.jpg" alt="" />
                            <div class="carousel-caption">
                                <h4>3 - Thumbnail label</h4>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/4.jpg" alt="" />
                            <div class="carousel-caption">
                                <h4>4 - Thumbnail label</h4>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                </div>
                <div class="page-header">
                    <h2>Education</h2>
                </div>
                <dl>
                    <dt><i class="icon-asterisk"></i> Aenean interdum viverra sodales</dt>
                    <dd>Phasellus id arcu magna. Sed mollis porta gravida. Cras lobortis, massa non dignissim imperdiet, nunc dolor placerat nisi, nec rhoncus arcu ipsum viverra libero.</dd>
                    <dt><i class="icon-asterisk"></i> Donec lobortis, lectus sed</dt>
                    <dd>Phasellus id arcu magna. Sed mollis porta gravida. Cras lobortis, massa non dignissim imperdiet, nunc dolor placerat nisi, nec rhoncus arcu ipsum viverra libero.</dd>
                    <dt><i class="icon-asterisk"></i> Cras lobortis</dt>
                    <dd>Vivamus eu quam dapibus magna vulputate suscipit. Sed ut auctor lectus. Aenean ut turpis ipsum, vitae egestas ante.</dd>
                </dl>  

                <div class="page-header">
                    <h2>Work History</h2>
                </div> 
                <dl>
                    <dt><i class="icon-asterisk"></i> Aenean interdum viverra sodales</dt>
                    <dd>Phasellus id arcu magna. Sed mollis porta gravida. Cras lobortis, massa non dignissim imperdiet, nunc dolor placerat nisi, nec rhoncus arcu ipsum viverra libero.</dd>
                    <dt><i class="icon-asterisk"></i> Donec lobortis, lectus sed</dt>
                    <dd>Phasellus id arcu magna. Sed mollis porta gravida. Cras lobortis, massa non dignissim imperdiet, nunc dolor placerat nisi, nec rhoncus arcu ipsum viverra libero.</dd>
                    <dt><i class="icon-asterisk"></i> Cras lobortis</dt>
                    <dd>Vivamus eu quam dapibus magna vulputate suscipit. Sed ut auctor lectus. Aenean ut turpis ipsum, vitae egestas ante.</dd>
                </dl>  

                <div class="page-header">
                    <h2>Interests</h2>
                </div> 
                <dl>
                    <dt><i class="icon-asterisk"></i> Aenean interdum viverra sodales</dt>
                    <dd>Phasellus id arcu magna. Sed mollis porta gravida. Cras lobortis, massa non dignissim imperdiet, nunc dolor placerat nisi, nec rhoncus arcu ipsum viverra libero.</dd>
                    <dt><i class="icon-asterisk"></i> Donec lobortis, lectus sed</dt>
                    <dd>Phasellus id arcu magna. Sed mollis porta gravida. Cras lobortis, massa non dignissim imperdiet, nunc dolor placerat nisi, nec rhoncus arcu ipsum viverra libero.</dd>
                    <dt><i class="icon-asterisk"></i> Cras lobortis</dt>
                    <dd>Vivamus eu quam dapibus magna vulputate suscipit. Sed ut auctor lectus. Aenean ut turpis ipsum, vitae egestas ante.</dd>
                </dl>  

            </div>
            <div class="span3">
                <h2>Contact</h2>
                <p><i class="icon-envelope"></i> zied.hosni.mail@gmail.com</p>
                <p><i class="icon-signal"></i> +216 97 62 04 95</p>

                <a href="#" class="btn btn-large noPrint" id="printBtn"><i class="icon-print"></i> Print</a>
                <a href="Curriculum_Vitae.pdf" class="btn btn-large noPrint" id="downBtn"><i class="icon-download"></i> Download</a>
            </div>
        </div>


        <div class="container">
            <footer>
                <p>
                    <i class="icon-envelope"></i> zied.hosni.mail@gmail.com &nbsp; 
                    <i class="icon-signal"></i> +216 97 62 04 95 &nbsp; 
                    <i class="icon-map-marker"></i>
                    3678 Street name
                    city , XX 010101
                    somewhere on 
                    planet earth 
                </p>
            </footer>
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
