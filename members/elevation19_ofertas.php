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

//buscar la empresa
function buscar_empresa($empid,$db)
	{
		$sqle="SELECT * FROM el_empresas where id_empresa=$empid";
		$rowe = $db->query($sqle); 
		if($db->affected_rows > 0){
		  $recorde = $db->query_first($sqle);
		   return $recorde['empresa'];
		}
	
	
	};
	
//obtener la oferta del dia
     $ciudad=$_SESSION['SESS_CIUDAD'];
	 //$sql_cupon="SELECT * FROM el_cupones where ciudad=$ciudad and ofertadeldia='si'";
	 //echo $sql_cupon;
	 //$oferta =  $db->query_first($sql_cupon);	
	
	 //$sql_cupon="SELECT * FROM el_cupones where (ciudad=$ciudad or ciudad1=$ciudad or ciudad2=$ciudad) and ofertadeldia='si' and (NOW()>=ofertadiadesde and NOW()<=ofertadiahasta) and esevento='no'";
	  $sql_cupon="SELECT * FROM el_cupones where ofertadeldia='si' and (NOW()>=ofertadiadesde and NOW()<=ofertadiahasta) and esevento='no'";
	 //echo $sql_cupon;
	 //$oferta =  $db->query_first($sql_cupon);
	 
	 $row = $db->query($sql_cupon); 
		if($db->affected_rows > 0){
		  $oferta = $db->query_first($sql_cupon);
		  $ofertadia=true;
		 }else{
		   //redireccionar hacia el listado de ofertas
		  // header('Location: elevation19_ofertas.php');
		  $ofertadia=false;
		 };
	
	

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Elevation19.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Eduardo Garcia Pacheco">

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
		<tr style="background-color:#f5f5f5;"> <th><span style="margin-right:10px;font-size:18px" class="label label-success">La oferta del d&iacute;a</span></th></tr>
	</thead>
	<tbody>			    	
    <tr style="background-color:#fff;">
    <td>
     <div class="score_container_right">
	     
		<!--Contenedor oferta principal-->
		<?php
		  if($ofertadia){
		    ?>
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
		   <?php }else{?>
		      
		   
		   <?php };?>
		<!--FIN Contenedor oferta Principal-->
	    
		
		
		<style>
		/* div layout */
div.books-list{
	float: left;
	width: 100%;
}

div.books-list div.books{
	float: left;
	width: 100%;
	margin: 10px 0px 10px 0px;
}

div.books-list div.books .book{
	float: left;
	width: 100%;
	border: 1px solid #cccccc;
	background-color: #efefef;
	margin: 0px 0px 15px 0px;
}

div.books-list div.books .book .img{
	width: 130px;
	float: left;
	margin: 20px 20px 20px 20px;
	padding: 0px 0px 0px 10px;
}

div.books-list div.books .book .img img{
	border: 1px solid #000000;
}

div.books-list div.books .book .desc{
	float: right;
	width: 750px;
	margin: 20px 20px 20px 0px;
}



div#paging{
	float: left;
	width: 100%;
	height: 27px;	
	
	margin: 0px 0px 10px 0px;
	padding: 3px 0px 0px 0px;
}


#pagingprev,
#pagingmid,
#pagingnext{
	float: left;
}

#pagingprev{
	padding: 0px 0px 0px 5px;
}

div#paging #buttons{
	float: left;
	width: 200px;
	height: 20px;
	padding: 2px 0px 0px 0px;
	margin: 0px 10px 0px 10px;
	border: 1px solid #aaaaaa;
	
}

div#paging #buttons span{
	cursor: pointer;
	color: gray;
	padding: 0px 5px 0px 0px;	
}

div#paging #buttons  span.current{
	font-weight: bold;
	color: red;
}

div#paging #info{
	float: left;
	width: 100px;
	height: 20px;
	padding: 2px 5px 0px 5px;
	margin: 0px 10px 0px 0px;
	border: 1px solid #aaaaaa;
}

div#paging .text{
	float: left;
	padding: 0px 5px 0px 15px;
}

div#sorts{
	float: left;
	width: 100%;
	height: 27px;
	
	margin: 0px 0px 10px 0px;
	padding: 3px 0px 0px 0px;
}

#sorts p{
	padding: 0px 15px 0px 15px;
	float: left;
}


		</style>

		
		
		
     <div class="navbar box">						
		<!-- horizontal -->	
		
		<div id="cupones" class="books-list">
			<div class="navbar">
				<div class="navbar-inner">
					<div class="container">
					
					
					<ul class="nav">
					<li>
						<select id="select01" class="search-query " style="width: 180px;color: #FFF;background-color: #626262;border: 1px solid #151515;">
							 <?php  
							
								echo "<option VALUE='0'>" ."Todas" . "</option>";
							  $fetch_catego=$db->query("SELECT * FROM  el_categorias");
								while ($rec_catego = $db->fetch($fetch_catego)) {	
										 echo "<option VALUE=" . $rec_catego['id_categoria'] . " onclick='javascript:filtrar()'>" . $rec_catego['categoria'] . "</option>";
										};
										echo "<option VALUE='0' onclick='javascript:filtrar()'>Todas</option>";
								?>	
						  </select></li>
						   <li>
						<select id="select02" class="search-query " style="width: 180px;color: #FFF;background-color: #626262;border: 1px solid #151515;">
							 <?php  
							 $nombre_ciudad=buscar_ciudad($ciudad,$db);
								echo "<option VALUE=" . $ciudad . ">" . $nombre_ciudad . "</option>";
							  $fetch_areas=$db->query("SELECT * FROM  el_area where habilitada='si'");
								while ($rec_areas = $db->fetch($fetch_areas)) {	
										 echo "<option VALUE=" . $rec_areas['id_area'] . " onclick='javascript:filtrar()'>" . $rec_areas['ciudad'] . "</option>";
										};
								 echo "<option VALUE='0' onclick='javascript:filtrar()'>Nacional</option>";
							
								?>		
						  </select></li>
						  <select id="select03" class="search-query " style="width: 180px;color: #FFF;background-color: #626262;border: 1px solid #151515;">
							 <option VALUE='' onclick='javascript:filtrar()'>Ordernar por</option>
							 <option VALUE='asc' onclick='javascript:filtrar()'>Por precio alto a bajo </option>
							 <option VALUE='desc' onclick='javascript:filtrar()'>Por precio bajo a alto</option>
							
								
						  </select></li>  
						  
						<li>
						
					   
						
				
					</ul>
					
						
					
			<ul class="nav pull-right">
				<li><div id="filter">
									<p>
									 <!--<input class="title" type="text" value="" placeholder="titulo">-->
									 <input class="description" name="query" id="faq_search_input"  type="text" value="" placeholder="Buscar Cupones" style="margin-left: 20px;"/>
									 </p>

								</div></li>
				<li class="divider-vertical"></li>
				
          </ul>
					
							
						
    </div>
  </div>
</div>
  
		<div id="listados">		
						
						
						<!-- list -->   
						<ul  class="books gridview cfix alt_content unstyled">
						
						
						<?php
			//crear el sql del listado
			  $sql_ofertas = "SELECT * FROM el_cupones where activo='1' and (NOW()>=desde and NOW()<=hasta) and esevento='no' ORDER BY id DESC";
			  //echo $sql_ofertas;
			  $rows_ofertas = $db->query($sql_ofertas);
			while ($record_ofertas = $db->fetch($rows_ofertas)) {
			
		?>	
	
			
			<li class="book first odd gridview-item gridview-item-first gridview-row-first" data-type="app">  
			
				<div id="project-cover-4504321" class="project-cover cfix hover" project_id="4504321" style="border-top-left-radius:10px;border-top-right-radius:12px;">
			   	  <div id="coverImg4504321" class="cover-img" style="border-top-left-radius:10px;border-top-right-radius:12px;">
				    <img  class="cover" src="img_cupones/<?php echo $record_ofertas['img'];?>" width="300" height="280"  border="0" />
					<div class="contenthover">
						<!--<h3><strong><p class="price"><?php echo $record_ofertas['valor'] ?></p></strong> en vez de <?php echo $record_ofertas['anterior'] ?></h3>-->
						 <p class="text"><h3><strong><?php echo $record_ofertas['titulo'] ?></strong></h3></p>
						<p><a class="btn btn-success" href="elevation19_oferta.php?visto=1&id=<?php echo $record_ofertas['id'];?>">Ver Oferta</a></p>
					</div>
				  </div>
					<div class="cover-info">
						
						<div class="cover-by-wrap">
						   <p class="text"><span style="font-size:18px;color:#0099CC">	<?php $idemp=$record_ofertas['empresa']; $nombre_empresa=buscar_empresa($idemp,$db); echo $nombre_empresa;?></span><br/>
						   	<?php	 $nombre_ciudad=buscar_ciudad($ciudad,$db); echo $nombre_ciudad;?></p>
						</div><!-- .cover-by-wrap -->
						<div class="cover-name">
							<!--<h4 style="color:#ffffff"><a href="elevation19_oferta.php?visto=1&id=<?php echo $record_ofertas['id'];?>"><p class="text" style="color:#ffffff"><?php echo $record_ofertas['titulo'] ?></p></a></h4>-->
							<h4><p class="text" style="color:#ffffff"><?php echo $record_ofertas['titulo'] ?></p></h4>
							
						</div>
					</div><!-- .cover-info -->
					<div class="cover-stat-wrap">
						<span class="cover-stat cover-stat-appreciations cover-stat-highlighted">
						<span class="stat-label be-font-inline"><i class="icon-eye-open"></i> Visto</span>
						<span class="stat-value"><?php echo $record_ofertas['visto'] ?></span>
						</span>
						<span class="cover-stat cover-stat-views">
						<span class="stat-label be-font-inline"><i class="icon-download-alt"></i> Adquirido</span>
						<span class="stat-value"><?php echo $record_ofertas['adquiridos']+$record_ofertas['impresos'] ?></span>
						</span>
					</div><!-- .cover-stat-wrap -->
			
				  

				</div><!-- .project-cover -->
			</li>		
		<?php }//fin del ciclo del listado?>	
						
											
							
						
						</ul>
		</div><!-- fin listado -->			
		
					</div>
			</div>

									
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
 

	   <script type="text/javascript">
	   function recargar(){
	     location.reload();
	   }
	   
	   
	 $(document).ready(function() {
	  	$("#perfil").click(function(event){
			$("#contenedor").load('elevation19_perfil.php?op=3');
		});
		
		
	
		$('.cover').contenthover({
    overlay_background:'#000',
    overlay_opacity:0.8
});


	

$("#faq_search_input").keyup(function()
{
faq_search_input = $(this).val();
 dataString = 'keyword='+ faq_search_input;
if(faq_search_input.length>2)
//If length of input field greater than 2
{
$.ajax({//Make the ajax call using GET
type: "GET",
url: "elevation19_proceso_members.php?op=11",
data: dataString,//The data to pass to the file
beforeSend:  function() {

$('input#faq_search_input').addClass('loading');
//Code responsible for the animated loaded image
},
success: function(server_response)
{//If successfull ,output server response in div

$('#listados').html(server_response).show();
//Show the result on the page
$('span#faq_category_title').html(faq_search_input);

if ($('input#faq_search_input').hasClass("loading")) {
 $("input#faq_search_input").removeClass("loading");
 } //And finally remove the animated loading image to make it static .

}
});
}return false;
});


		
	
	 });
     
	 function scategoria(id){$("#listados").load('elevation19_proceso_members.php?op=11&cat='+id);};
	 function sciudad(id){$("#listados").load('elevation19_proceso_members.php?op=11&city='+id);};
	 function filtrar(){
 	    var cat=$('#select01').val();
		var city=$('#select02').val();
		var orden=$('#select03').val();
        //alert(a);alert(b);	
        $("#listados").load('elevation19_proceso_members.php?op=11&cat='+cat+'&city='+city+'&orden='+orden);		
	 }
</script>



	
  </body>
</html>
