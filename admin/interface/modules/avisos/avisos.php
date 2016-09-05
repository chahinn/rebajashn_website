<?
################################################################################
##              			-= Grupo Leitz=- 				                   #
## --------------------------------------------------------------------------- #
##  SAC, Sistema de Apoyo y Control                                            #
##  Desarrollado por:  Grupo Leitz <info@grupoleitz.com>                       # 
##  Licencia:      Russell corp                                                #
##  Site:          http://www.grupoleitz.com		                           #
##  Copyright:     Grupo Leitz (c) 2010. All rights reserved.                  #
##                                                                             #
##  Pagina:      home.php		                                               #
##  Descripcion: Pagina que genera la seccion del dashboar con los iconos y    #
##               la seccion de mensajes                                        #
##                                                                             #
##                                                                             #
################################################################################

    // Initialize the session.
    //session_start();
    //require_once('../../../auth/auth.php');
   // require_once("file:///D|/xampp/htdocs/russell_mocha/interface/inc/checkAdminPagePermissions.php");
     require_once("../../inc/config.inc.php");
     require_once("../../inc/database.inc.php");
     //require_once("inc/settings.inc.php");
 
    
    $db3=new Database();	
    $db3->open();
	
    
?>

<style>
.list-1 {
	padding: 0 0 3px 0;
	width: 100%;
	overflow: hidden;
}

	.list-1 li {
		float: left;
		width: 220px;
		padding: 0 35px 34px 0;
	}
	
	.list-1 li.extra {
		padding: 0 0 34px 0;
	}
	
		.list-1 li img {
			float: left;
			margin: 1px 14px 0 0;
		}
		
		.list-1 li p {
			overflow: hidden !important;
			padding: 0 !important;
			line-height: 1.571em !important;
			font-size: 1.167em !important;
			color: #6d6d6d !important;
		}
		
			.list-1 li p strong {
				display: block;
				padding: 0 0 7px 0;
				line-height: 1.2em;
				font-size: 1.314em;
				font-weight: normal;
				color: #000;
			}
			
			.list-1 li p b {
				display: block;
				width: 100%;
				padding: 9px 0 0 0;
				overflow: hidden;
				font-weight: normal;
			}
			
				.list-1 li p b a {
					float: left;
					color: #55bae2;
					text-decoration:none
				}
</style>
 
    <ul class="list-1">
      <?
    	 //Vista de los mensajes del sitio
	  	$db3->query("SELECT * FROM "._DB_PREFIX."avisos ORDER BY fecha DESC limit 0,4");
		   $num=1;
		   while($r___ = $db3->fetchAssoc()){
			   if ($r___['tipo']=='bajo' )
			       {$img='<img src="images/aviso1.png" width="20" height="20" />';}
				   elseif ($r___['tipo']=='medio' )
					 {$img='<img src="images/aviso2.png" width="20" height="20" />';} 
		    			 else
						  {$img='<img src="images/aviso3.png" width="20" height="20" />';}
					?>
      <li>
       <? echo $img ?>
	   <p> 
         	<strong><? echo $r___['titulo']?></strong>
            <span style=" font-size:10px"> <? echo  html_entity_decode($r___['resumen'])?></span>
            <span style=" font-size:8px"><? echo  html_entity_decode($r___['fecha'])?> </span>
             <b><a href="#" onclick="popupwin=window.open('modules/avisos/avisos_mostrar.php?aviso=<? echo $r___['id']?> ','popupwin','width=700,height=800,scrollbars=yes,resizeable=no'); if(!popupwin){alert('Popup blocker esta activado'); return false;} this.form.target='popupwin';"/>Leer más</a></b> 
        </p>
      </li>

       <? $num++;}; ?>               

</ul>                                      