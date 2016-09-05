<!DOCTYPE html>
<html lang="es">
  <head>
  <?php
// session_start();
 header('Content-Type: text/html; charset=ISO-8859-1');
  
//Conexion a la base de datos
	require_once("../inc/config.inc.php");
	require("../inc/Database.class.php"); 
	$db = Database::obtain(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect(); 
	include 'elevation19_secure.php';
	date_default_timezone_set('America/El_Salvador');
	setlocale(LC_TIME, 'spanish');
	$opcion_menu=1;

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
//buscar la foto
function buscar_foto($usuarioid,$db)
	{
		$sql = "SELECT * FROM el_usuarios WHERE id_usuario=$usuarioid";
		$row = $db->query($sql); 
		if($db->affected_rows > 0){
		  $record = $db->query_first($sql);
		  
		  // if user exists
    if($record['img']<>""){
	   $img="img_users/".$record['img'];
        return $img;
    }else{
		$img="../assets/img/avatar.png";
    	return $img;
		};
		
		}
	
	
	};	
	
//usar la base de datos de cupones
//ver si no esta set el cupon y ciudad sino tomar el de la session

$ciudad = isset($_GET['ciudad']) ? $_GET['ciudad'] : "";
$cupon = isset($_GET['cupon']) ? $_GET['cupon'] : "";

//buscar la informacion del cupon
 if ($ciudad=="" && $cupon=="")
   {
     $ciudad=$_SESSION['SESS_CIUDAD'];
	 //$sql_cupon="SELECT * FROM el_cupones where (ciudad=$ciudad or ciudad1=$ciudad or ciudad2=$ciudad)  and ofertadeldia='si' and (NOW()>=ofertadiadesde and NOW()<=ofertadiahasta) limit 1";
$sql_cupon="SELECT * FROM el_cupones where ofertadeldia='si' and (NOW()>=ofertadiadesde and NOW()<=ofertadiahasta) and esevento<>'si' limit 1";	
	//echo $sql_cupon;
	 //$oferta =  $db->query_first($sql_cupon);
	 
	 $row = $db->query($sql_cupon); 
		if($db->affected_rows > 0){
		  $oferta = $db->query_first($sql_cupon);
		 }else{
		   //redireccionar hacia el listado de ofertas
		   header('Location: elevation19_ofertas.php');
		 };
	 
	 
   }else
   {
    // $ciudad=$_SESSION['SESS_CIUDAD'];
	// $sql_cupon="SELECT * FROM el_cupones where ciudad=$ciudad and ofertadeldia='si'";
   
   }
   
 include("time_stamp.php"); 
?>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
     <link href="../assets/css/elevation19m.css" rel="stylesheet">
    
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
	 <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
     
	<!-- CSS validation -->	   
	    <link rel="stylesheet" href="../assets/validate/validationEngine.jquery.css" type="text/css"/>
	<!-- CSS countdown -->	
		<link rel="stylesheet" href="../assets/css/jquery.countdown.css" type="text/css"/>  
	<!-- CSS comments -->		
		<link href="../assets/comments/screen.css" media="screen" rel="stylesheet" type="text/css" />	
		
		

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
  
  
 <!-- header  ================================================== -->
 <?php include('elevation19_header.php');?>
<!-- ================================================== header -->

<div id="example" class="modal hide fade in" style="display: none; ">
    
	<div class="modal-header">
        <a class="close" data-dismiss="modal">�</a>
        <strong><?php echo $oferta['titulo'];?> - <?php	 $nombre_ciudad=buscar_ciudad($ciudad,$db); echo $nombre_ciudad;?></strong>
		<br/><h6><?php  echo $oferta['brevedescripcion'];?></h6>
    </div>
    <div class="modal-body" style="background-color:#DDEACF">
	 
 	 <form id="form-recomendar"  onSubmit="return false;">
		<table width="100%" border="0">
					  <tr>
			<td><strong>para:</strong></td>
			<td><strong>Mensaje:</strong></td>
		  </tr>
		  <tr>
			<td>
			<input class="span2" type="text" placeholder="usuario@servidor" id="nom_para" name="nom_para" value="">
			<input class="span2" type="hidden"  id="nom_titulo" name="nom_titulo" value="<?php echo $oferta['titulo'];?>">
			<input class="span2" type="hidden"  id="nom_descripcion" name="nom_descripcion" value="<?php  echo $oferta['brevedescripcion'];?>">
			</td>
			<td rowspan="7" valign="top"><textarea id="nom_contenido" name="nom_contenido" rows="5" cols="35"></textarea><br/>Elevation19.com
			 <div id="result_recomendar"></div>
			  <input class="span2" type="hidden" placeholder=".span2" id="nom_ofertaid" name="nom_ofertaid" value="<?php echo $oferta['id']?>">
			</td>
		  </tr>
		  <tr>
			<td><strong>De:</strong></td>
		  </tr>
		  <tr>
			<td>
			<input class="span2" type="text" placeholder=".span2" id="nom_recomienda" name="nom_recomienda" value="<?php echo $_SESSION['SESS_NOMBRES'].' '.$_SESSION['SESS_APELLIDOS'];?>">
			<input class="span2" type="hidden" placeholder=".span2" id="nom_correo" name="nom_correo"value="<?php echo $_SESSION['SESS_USUARIO'];?>">
		
			</td>
		  </tr>
		 
		</table>
       </form>	
    </div>
	    <div class="modal-footer">
	    <a href="#" id="enviar_amigo" class="btn btn-success">Enviar</a>
        <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
    </div>

</div>




<div class="container"><!--Contenedor-->

<div class="row">
    <div class="span4" align="right">
      &nbsp;<!-- /well -->
	  <h2>Oferta del D&iacute;a</h2>
    </div>
    <div class="span4">
      &nbsp;<!-- /well -->
    </div>
    <div class="span4" align="right">
      <form>
        <div class="control-group">
		 <br/>
          <div class="control-group">
				<div class="controls">
	<style>
				.styled-select {
width: 200px;
height: 34px;
overflow: hidden;
background: url(../assets/img/down_arrow_select.jpg) no-repeat right;
}
.styled-select select {
background: transparent;
width: 223px;
padding: 5px;
border: 0px solid #CCC;
font-size: 16px;
height: 34px;
-webkit-appearance: none;
font-size:20px;
 color: white;
    text-shadow: 0 0 4px rgba(0, 0, 0, 0.8);
}

.tachado{text-decoration:line-through;}
</style>
				
			</div>

			  </div>
        </div>
      </form>
    </div>
  </div>


<!--Contenido del CUPON-->
<div class="row-fluid" id="contenedor"><!--Segundo Recuadro-->
  
  <div class="container">
      <div class="row">
        <div class="span3">
		<div>
		<table class="table table-bordered">
			    	<thead>
			    		<tr style="background-color:#f5f5f5;">
			    			<th><span style="margin-right:10px;font-size:14px" class="label label-success"> &Uacute;ltimos Cupones</span></th>
			    		</tr>
			    	</thead>
			    	<tbody>			    	
                		<tr style="background-color:#fff;">
                   			<td>
                    			<div class="score_container_right">
							     
							        <div id="score_step_info" class="score_info">
					<?php
					  //listado de las ultimas 3 ofertas ingresadas
					  $sql_ultimas = "SELECT * FROM el_cupones where activo='1' and esevento='no' ORDER BY id DESC  LIMIT 0,3";
					  //echo $sql_ultimas;
  					  $rows_ultimas = $db->query($sql_ultimas);
						while ($record_ultimas = $db->fetch($rows_ultimas)) {
					?>
					
					
					<div class="extraDealMulti">
									   <div class="extraDealDescription">
										 <h4><a href="elevation19_oferta.php?visto=1&id=<?php echo $record_ultimas['id'];?>"><?php echo $record_ultimas['titulo'] ?></a></h4>
										 <p><?php echo $record_ultimas['brevedescripcion'] ?></p>
									   </div>

									   <div class="extraDealData">
										   <div class="price">
											   <span class="priceIcon"></span>
												<strong><?php echo $record_ultimas['valor'] ?></strong>
											</div>
									   <div class="value">
											   <span class="tachado"><?php echo $record_ultimas['anterior'] ?></span></a></div>
										   <div class="extraDealView">
											<a href="elevation19_oferta.php?visto=1&id=<?php echo $record_ultimas['id'];?>">
											 <button class="btn btn-mini btn-success">Ver Oferta </button>
											 </a>
											 </div>
										   <div class="extraDealImage">
												<a title="" class="jSideDeal" href="elevation19_oferta.php?visto=1&id=<?php echo $record_ultimas['id'];?>">
												<img width="85" height="55" src="img_cupones/<?php echo $record_ultimas['img'];?>" class="thumbnail">
												</a>
											</div><br/>
									   </div>
									   <div class="wrapper">
										   <!-- &nbsp; -->
									   </div>
					</div>
					<?php };?>
					
		


				
							     </div>
								</div>
                    		</td>
			          	</tr>
			    	</tbody>
			    </table> 
		</div> 		
        <br/>
<table class="table table-bordered">
			    	<thead>
			    		<tr style="background-color:#f5f5f5;">
							<th><span style="margin-right:10px;font-size:14px" class="label label-success"> Los m&aacute;s vistos</span></th>
			    		</tr>
			    	</thead>
			    	<tbody>			    	
                		<tr style="background-color:#fff;">
                   			<td>
                    			<div class="score_container_right">
							        <!--<div id="score_step" class="example_step"><h3>Listado de las Ultimas Ofertas</h3></div>-->
							        <div id="score_step_info" class="score_info">
										<?php
					  //listado de las ultimas 3 ofertas ingresadas
					  $sql_ultimas = "SELECT * FROM el_cupones where activo='1' and esevento='no'  ORDER BY visto DESC  LIMIT 0,3";
					  //echo $sql_ultimas;
  					  $rows_ultimas = $db->query($sql_ultimas);
						while ($record_ultimas = $db->fetch($rows_ultimas)) {
					?>
					
					
					<div class="extraDealMulti">
									   <div class="extraDealDescription">
										 <h4><a href="elevation19_oferta.php?visto=1&id=<?php echo $record_ultimas['id'];?>"><?php echo $record_ultimas['titulo'] ?></a></h4>
										 <p><?php echo $record_ultimas['brevedescripcion'] ?></p>
									   </div>

									   <div class="extraDealData">
										   <div class="price">
											   <span class="priceIcon"></span>
												<?php echo $record_ultimas['valor'] ?>
											</div>
									   <div class="value">
											  <span class="tachado"><?php echo $record_ultimas['anterior'] ?></span></a></div>
										   <div class="extraDealView">
											<a href="elevation19_oferta.php?visto=1&id=<?php echo $record_ultimas['id'];?>">
											 <button class="btn btn-mini btn-success">Ver Oferta </button>
											 </a>
											</div>
										   <div class="extraDealImage">
												<a title="" class="jSideDeal" href="elevation19_oferta.php?visto=1&id=<?php echo $record_ultimas['id'];?>">
												<img width="85" height="55" src="img_cupones/<?php echo $record_ultimas['img'];?>" class="thumbnail">
												</a>
											</div><br/>
									   </div>
									   <div class="wrapper">
										   <!-- &nbsp; -->
									   </div>
					</div>
					<?php };?>		
								
				
															  
										
							    </div>
								</div>
                    		</td>
			          	</tr>
			    	</tbody>
			    </table>		
        </div><!--/span-->
        <div class="span9">
			<table class="table table-bordered">
			    	<thead>
			    		<tr style="background-color:#f5f5f5;">
			    			<th style="font-size:20px"><?php echo $oferta['titulo'];?> - <?php echo $nombre_ciudad;?>
							    <br/><span style="font-size:15px;color:#BEBEBE"><?php  echo $oferta['brevedescripcion'];?></span>
							</th>
			    		</tr>
			    	</thead>
			    	<tbody>			    	
                		<tr style="background-color:#fff;">
                   			<td>
                    			<div class="score_container_right">
								    <div class="row-fluid">
									  <div class="span12">
										
										<div class="row-fluid">
										  <div class="span8" align="center">
										      <img src="img_cupones/<?php echo $oferta['img'];?>" width="500" height="500" class="thumbnail">
										  <br/>
										  <ul id="myTab" class="nav nav-tabs">
											<li class="active"><a href="#home" data-toggle="tab"><i class="icon-info-sign"></i> Descripci&oacute;n</a></li>
											<li><a href="#profile" data-toggle="tab"> <i class="icon-list-alt"></i> T&eacute;rminos</a></li>
											<li><a href="#ubicacion" data-toggle="tab"><i class="icon-road"></i> Ubicaci&oacute;n</a></li>
										
										  </ul>
										  <div id="myTabContent" class="tab-content">
											<div class="tab-pane fade in active" id="home" align="left">
											   
												<p><?php echo $oferta['descripcion'];?></p>	
											</div>
											<div class="tab-pane fade" id="profile" align="left">
											
													<p><?php echo $oferta['terminos'];?></p>
											</div>
											<div class="tab-pane fade" id="ubicacion" align="left">
											 
													<p><?php echo $oferta['direccion'];?></p>
											</div>
										
										  </div>
										</div>
										  
										  <div class="span4">
												 <!--Precio-->
											  <div id="div3" class="info_box1"> 
												<h1 style="color:black;font-size: 3em;padding-top:10px"><?php echo $oferta['valor'];?> </h1><br/>
											  </div>
											  <!--boton-->
											  <div id="div5" class="info_box"> 
											     <?php $oferta_id=$oferta['id'];?>
												<a class="btn btn-primary btn-large btn-success"  style="height: 30px; width: 200px;font-size:22px"  href="elevation19_obtener_oferta.php?ofertaid=<?php echo $oferta_id; ?>"><img src="../assets/img/oferta.png"></a>
												
											  </div>
											  <!--datos ahorro-->
											  <div id="div3" class="info_box1" align="center"> 
											  <br/>
											  <span class="countdown_row countdown_show3">
												<span class="countdown_section"><span  style="font-size:16px">Anterior</span><br><span class="countdown_amount"><?php echo $oferta['anterior'];?></span></span>
												<span class="countdown_section"><span  style="font-size:16px">Descuento</span><br><span class="countdown_amount"><?php echo $oferta['descuento'];?></span></span>
												<span class="countdown_section"><span  style="font-size:16px">Ahorro</span><br><span class="countdown_amount"><?php echo $oferta['ahorro'];?></span></span>
												</span>
												<br/>
											   </div>
											   <!--Recomendacion-->
											   <div id="div3" class="info_box1"  > 
											  
											   <a data-toggle="modal" href="#example" style="text-decoration:none;">&nbsp;
												   <h4 style="padding-top:30px;padding-bottom:10px"> <img src="../assets/img/icon_gift_blue.gif" alt="" />Recomi�ndalo a un amigo. </h4></a>
											   </div>
											   <!--Tiempo de espera-->	
												<div id="div3" class="info_box2" style="border-top-width:1px; border-top-style:solid;border-top-color:gray;"> 
												   <h6 style="padding-top:10px;padding-bottom:10px;color:black"><img src="../assets/img/clock.png" width="16" height="16"> &nbsp;Tiempo Restante para Adquirir</h6>
													<div id="defaultCountdown" style="font-weight:bold;"></div>							   
												 </div>
											   <!--Deal-->  
											   <div id="div3" class="info_box2" > 
											     <br /> <br /> 
												 <h3 style="padding-top:18px">Se han Adquirido <?php $adquiridos=$oferta['adquiridos']+$oferta['impresos']; echo $adquiridos;?></h3>
												
												    
												 <?php
												  if($oferta['limiteadquirir']==0){
												    echo '<h4 style="padding-top:18px;padding-bottom:18px;"><span><img alt="" class="ib" height="28" src="../assets/img/check_mark.png?SxxwvrIa" title="" width="27">La oferta esta Activa!</span></h4>';
												  }else{	
													$adquiridos=$oferta['adquiridos']+$oferta['impresos'];
													if($adquiridos>=$oferta['limiteadquirir'])
														{
															echo '<h4 style="padding-top:18px;padding-bottom:18px;"><span><img alt="" class="ib" height="28" src="../assets/img/check_mark.png" title="" width="27">La oferta esta Activa!</span><br/><span style="font-size:12px;color:#0099FF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cantidad disponible limitada</span></h4>';
												  		}else{
														    //calcular el porcentaje 
															$porcentaje=($adquiridos/$oferta['limiteadquirir'])*100;
															$faltan=$oferta['limiteadquirir']-$adquiridos;
															?>
															<section class="main">
																<div class="progress">
																  <span class="green" style="width: <?php echo $porcentaje?>%;"><span><?php echo $adquiridos."/".$oferta['limiteadquirir']?> </span></span>
																</div>
																</section>
															<?php	
																echo '<h4 style="padding-top:18px;padding-bottom:18px;"><span> El cup&oacuten aun NO esta Activo! <br/> <h6>Falta que '. $faltan.'  personas lo adquieran para activarlo. </h6></span></h4>';
														
														};
												  };?>		
												  
											   </div>
									
													<div class="result">
													Enlaces a sociales
													</div>
												
										  </div>
										</div>
									  </div>
									</div>
							        
									
							    </div>
							   </div>	
                    		</td>
			          	</tr>
			    	</tbody>
			    </table> 
          <div class="row-fluid">
            <div class="span8">
			<div class="row-fluid">
				  <div class="span12">
				
					<div class="row-fluid">
					  <div class="span8"><h2>Comentarios sobre el cup&oacute;n</h2></div>
					  <div class="span4">
					  			<!--votos-->  
												<?php
												 //buscar todos los votos correspondiente a la oferta
												  $sql_votos = "SELECT *, SUM(rating) As total_votos,COUNT(oferta_id) AS votantes FROM el_comments where oferta_id=$oferta[id]";
												  //echo $sql_votos;
												  $votos = $db->query_first($sql_votos);
												   $totalvotos=$votos['total_votos'];
												  //echo "Total de puntos: ".$totalvotos."<br/>";
												  $totalvotantes=$votos['votantes'];
												  //echo "Total de Votantes: ".$totalvotantes."<br/>";
												 
												  //echo "El rating:".$rating."<br/>"; 
												  if($totalvotantes== 0){
													$rating = 0;
													$roundedrating=0;
												  }else{
													 $rating = $totalvotos/$totalvotantes;
													  $roundedrating = floor($rating)+round($rating - floor($rating))/2;
													}
												  //echo "DATO:".$roundedrating."<br/>"; 	
											     ?>	
							 <h6>Calificaci&oacute;n del cup&oacute;n</h6>
												 <div class="star-rating" id="rating1result<?php echo $roundedrating; ?>" style="background-position:0 -<?php echo $roundedrating * 32; ?>px;">
													<div class="star1"></div>
													<div class="star1"></div>
													<div class="star1"></div>
													<div class="star1"></div>
													<div class="star1"></div>
													</div>
													<div class="result">
													<span style="color:green"></span> <i class="icon-user"></i> (<?php echo $totalvotantes; ?>)
													</div>	
					  </div>
					</div>
				  </div>
				</div>
			
			 <form  name="form-comentar" id="form-comentar" onSubmit="return false;" >
				<div class="UIComposer_Box">
					<span class="w">
					 <textarea id="comentario" name="comentario" placeholder="Que Opinas de la Oferta?" rows="2" style="width: 97%;"></textarea>
					 <input type="hidden" id="nombres" name="nombres" value="<?php echo $_SESSION['SESS_NOMBRES'].' '.$_SESSION['SESS_APELLIDOS'];?>">
					  <input type="hidden" id="oferta_id" name="oferta_id" value="<?php echo $oferta['id'];?>">
					    <input type="hidden" id="foto" name="foto" value="<?php echo $_SESSION['SESS_USUARIO_ID'];?>">
						<input id="votos" name="votos" class="span2" type="hidden" placeholder="votos">
						
					</span>
					<br clear="all" />
					<div align="left" style="height:30px; padding:3px 3px;">
					 <span style="float:left"> &nbsp; Calificar &nbsp;&nbsp; </span>
					  
					 <div class="star-rating" id="rating1result0">
						<div class="star"></div>
						<div class="star"></div>
						<div class="star"></div>
						<div class="star"></div>
						<div class="star"></div>
						</div>
						
					  		  
					
					
					<button id="comentar" style="float:right" class="btn btn-small btn-info" ><i class="icon-edit icon-white"></i> Comentar</button>
					<div id="resultado_comentario"></div>
					</div>
				</div>
			  </form>
			
					<div id='content'>
			  <?php
						$sql="select * from el_comments where oferta_id=$oferta[id] order by p_id DESC limit 3";
						$result=mysql_query($sql);
						while($row=mysql_fetch_row($result))
						{
						$time = "$row[5]";
						
						echo "<div class='tweet_box' id='co_$row[0]'>";?> <a class='close'onclick='$("#data_<?php echo $row['0']?>").show();'> &nbsp�</a><?php
						echo "<div class='tweet_user'><img class='user_img' src='".buscar_foto($row[4],$db)."'></div>";
						echo "<div class='tweet_body'>";
						?>
						<div class='tweet_time'><?php time_stamp($time);?></div>
						<?php
						echo "<div><b>$row[2]</b><br/>";
						 ?>
						   <div class="star-rating" id="rating1result<?php echo $roundedrating; ?>" style="background-position:0 -<?php echo $row[7] ; ?>px;">
								<div class="star1"></div>
								<div class="star1"></div>
								<div class="star1"></div>
								<div class="star1"></div>
								<div class="star1"></div>
							</div>
							
						
						 <?php
						echo "</div>";
						echo "<div class='tweet_text'>$row[3]</div>";
						//echo "</div><a  class='btn btn-mini btn-danger' onclick='javascript:borrar($row[4],$row[0]);'> Eliminar</a></div>";
						echo "</div><br/> <div id='data_$row[0]' style='display:none;'>�Desea eliminar el comentario? <a  class='btn btn-mini btn-danger' onclick='javascript:borrar($row[4],$row[0]);'> Si</a>  -"; ?> <a class='btn btn-mini btn-inverse' onclick='$("#data_<?php echo $row['0']?>").hide();'>No</a><?php 
						echo "</div></div>";
						$ultimo=$row[0];
						}
                       
						?>
						
						<button class="btn btn-info more" href="#" onclick="javascript:carga_comentarios(3,<?php echo $oferta['id']?>)">Mostrar m&aacutes comentarios </button>
			        </div>
			  	<br clear="all" />
	      	  			
				
            </div><!--/span-->
            <div class="span4">
              <table class="table table-bordered">
			    	<thead>
			    		<tr style="background-color:#f5f5f5;">
			    			<th><span style="margin-right:10px;" class="label label-success">Promesa Elevation19</span> </th>
			    		</tr>
			    	</thead>
			    	<tbody>			    	
                		<tr style="background-color:#fff;">
                   			<td>
                    			<div class="score_container_right">
							        <div id="score_step" class="example_step" align="center"><img src="../assets/img/promesa.png"></div>
							        <div id="score_step_info" class="score_info">
						<p>Proveerle a los usuarios constantemente las mejores ofertas y eventos sociales, para que descubran y disfruten de su ciudad. </p>
		
							    </div>
							   </div>	
                    		</td>
			          	</tr>
			    	</tbody>
			    </table>
			  
			  </div><!--/span-->
        
	
        </div><!--/span-->
      </div><!--/row-->

      <hr>





</div> <!-- /container -->



</div> 

</div><!-- /container -->

</div>
<style>
#footer {


background-color:black;
color:white;
}

</style>


<?php include('elevation19_footer.php');?>



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
	  
	  <!-- countdown    ================================================== -->
	  <script type="text/javascript" src="../assets/js/jquery.countdown.js"></script>
	  <script type="text/javascript" src="../assets/js/jquery.countdown-es.js"></script>
		<script type="text/javascript">
		$(function () {
			var austDay = new Date();
			austDay = new Date(<?php echo  substr($oferta['hasta'],0,4); ?>, <?php echo  substr($oferta['hasta'],5,2); ?> - 1, <?php echo  substr($oferta['hasta'],8,2); ?>,<?php echo  substr($oferta['hasta'],11,2); ?>, <?php echo  substr($oferta['hasta'],14,2); ?>, 0);
			$('#defaultCountdown').countdown({until: austDay});
			$('#year').text(austDay.getFullYear());
		});
		</script>
		
	 <!-- comments    ================================================== -->	
	  <script type="text/javascript" src="../assets/comments/jquery.livequery.js"></script>
	  <script src="../assets/comments/jquery.elastic.js" type="text/javascript" charset="utf-8"></script>
	  <script src="../assets/comments/jquery.watermarkinput.js" type="text/javascript"></script>
	  <script type="text/javascript">

	// <![CDATA[	

	$(document).ready(function(){	
	    //post a comentario 
		$("#comentar").click(function(event){
			var name = $("#name").val();
			var id;
			var str = $("#form-comentar").serialize();
			var voto = $("#votos").val();
			var comentario = $("#comentario").val();
			if(voto=="" || comentario=="")
			  { alert ("Debe ingresar un comentario y su calificaci�n para el cup�n")}
			  else
			  {
			   	//alert(str);
			   $("#content").load('elevation19_proceso_members.php?op=4', {"name":str,"id":1} );
			   $("#comentario").val("");
			   $("#votos").val("");
			   $('.star').parent().css('backgroundPosition','0% ' +(-0)+ 'px'); 
		
			  };
			
		});
	   //crear el raiting
		$('.star').mouseover(function (){
			var star = $(this).index()+1;
			var x =(32 * star);
			$('#votos').val(x);
			$(this).parent().css('backgroundPosition','0% ' +(-x)+ 'px'); 
		});
		$('.star1').mouseover(function (){
			var star = $(this).index()+1;
			var x =(32 * star);
			$('#votos').val(x);
			//$(this).parent().css('backgroundPosition','0% ' +(-x)+ 'px'); 
		});
		
		 //enviar a un amigo
		$("#enviar_amigo").click(function(event){
			var name = $("#name").val();
			var id;
			var str = $("#form-recomendar").serialize();
			//alert(str); 
			$("#result_recomendar").load('elevation19_proceso_members.php?op=7', {"name":str,"id":1} ); 
			
		});
	
});	


//funcion para cargar mas datos
function carga_comentarios(ultimo,ofertaid){
  //alert(ultimo);
  $("#content").append('<img src="..assets/img/loader.gif" />');
  $("#content").load("elevation19_proceso_members.php?op=6&ultimo="+ultimo+"&ofertaid="+ofertaid);
}

//funcion para borrar comentarios
 function borrar(idusuario,idcomentario){
        var usuario="<?php echo  $_SESSION['SESS_USUARIO_ID']?>"
		 //alert(usuario);
		 if (idusuario==usuario){
			$.ajax({
					type: "POST",
					url: "elevation19_proceso_members.php?op=5&idusuario="+idusuario+"&idcomentario="+idcomentario,
					cache: false,
					success: function(html){
											$("#co_"+idcomentario).remove(); 
										}
					});
			
           }else{
		    alert ('Lo sentimos, Ud. debe ser el autor para poder eliminar el comentario.');
		   }
  
 };

</script>

	  
	  
	  
	  
	  <script src="../assets/validate/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
	  <script src="../assets/validate/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	
	   <script type="text/javascript">
	 $(document).ready(function() {
	  	$("#perfil").click(function(event){
			$("#contenedor").load('elevation19_perfil.php?op=3');
		});
	

	
	
	 });
     
	
 
	 </script>
	
  </body>
</html>
