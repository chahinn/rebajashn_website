<?php
//PHP DE PROCESOS Y OPERACIONES
//error_reporting(-1);
//Conexion a la base de datos
session_start();
	require_once("../inc/config.inc.php");
	require("../inc/Database.class.php"); 
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect(); 
	include '../russell_secure.php';
	date_default_timezone_set('America/El_Salvador');
	setlocale(LC_TIME, 'spanish');
	
	
$op = isset($_GET['op']) ? $_GET['op'] : "";

switch ($op) {
      case 1:
	  ?>
                <script>
					   //clase para llamar la ventana de info de usuarios en linea		
				$('.clickme').cluetip({
        	    activation: 'click', 
				sticky: true, 
				width: 300,
				closeText:'Cerrar',
				showTitle: false, 
				dropShadow: true,
				cluetipClass: 'rounded'
				
				});
				</script> 	
				     <br/>
				     <h5>Listado de Usuarios</h5>
                     <ul id="listado_usuarios_linea">
                         <?php
					 //Vista de los mensajes del sitio
					$rows =$db->query("SELECT * FROM members_session where online = 1 and DATE(fecha)=DATE(NOW())");
					   $num=1;
					   
       			      while ($r___ = $db->fetch_array($rows)) {
					 			
				
					 //Vista de los mensajes del sitio
					$qry="SELECT * FROM members WHERE member_id=".$r___['user_id'];
					$result=mysql_query($qry);
					if($result) {
					if(mysql_num_rows($result) == 1) {
						  $member = mysql_fetch_assoc($result);
						  $nombres=$member['firstname'];
						  $turno=$member['turno'];
						  $puesto=$member['puesto'];
						  $login=$member['login'];
						  if (empty($member['pic']))  $member['pic']="silueta.png";
					?>
					
                 <li><img src="uploads/<?php echo $member['pic']?>" alt="" class="NewsImg"  width="30" height="30" />
                <a id="clickme" class="clickme" href="#" rel="dashboard/hovercard.php?id_user=<?php echo $member['member_id']?>&puesto=<?php echo $puesto?>&turno=<?php echo $turno?>&login=<?php echo $login?>">
                     <?php echo $member['firstname']." ".$member['lastname'] ?></a><br/><span style="font-size:10px;color:green">Disponible</span></li>
                    <?php 
					} }
					$num++;} ?>        
                          
                        </ul>
					
          <?php              
	  break;
	  case 2:
	        //ver si hay mensajes nuevos
			$sql="select * from members_mensajes where status = 0 and user_id = ". $_SESSION['SESS_MEMBER_ID'];
			$rs = mysql_query($sql);
			$result=mysql_num_rows($rs); 
			if ($result > 0)
				{
				 echo "<script>$('#cant_avisos').show();</script>";
				 echo ' '.$result;
				}else{
				 echo "<script>$('#cant_avisos').hide();</script>";
				};
				
	  break;
	  
	  case 3:
	      //ingresar los mensajes del muro a la tabla de avisos
		   //Tomar la cadena de datos esto procedimiento es el aviso en el muro
				 if( $_REQUEST["name"] )
				{
				   $name = $_REQUEST['name'];
				   //echo $name;
				}
				
				parse_str($name, $searcharray);

	   		 //Operacion de salvado del usuario
	    		$data['dirigido']  		= $searcharray['turno'];
               	$data['tipo']  		    =  $searcharray['tipo'];
				$data['titulo']  		= $searcharray['subject'];
				$data['contenido'] 		= $searcharray['content'];
				$data['publicadopor']=$_SESSION['SESS_FIRST_NAME'].' '.$_SESSION['SESS_LAST_NAME'];
				$data['publicar']=1;
	       if($data['titulo']=="" || $data['contenido']==""){
				echo "<span style='color:red'><strong>Ingrese el asunto y el contenido</strong></span>";
				/* Remove HTML tag to prevent query injection */
		   }else{
			    if ($_SESSION['SESS_TYPE']=='admin' || $_SESSION['SESS_MURO']==1)
				{
			  	  $salvar_muro = $db->query_insert("phpap105_avisos", $data);
				   echo "<span style='color:#0C3'><strong>Aviso Publicado</strong></span>";
				}else{
				   echo "<span style='color:red'><strong>Lo sentimos no tiene derecho para publicar</strong></span>";
				};
				};
	  break;
	  
	  case 4:
	      //ingresar los mensajes a la tabla de member_mensajes
		   //Tomar la cadena de datos esto procedimiento de mensajes
			 if( $_REQUEST["name"] )
				{
				   $name = $_REQUEST['name'];
				   //echo $name;
				}
				
				parse_str($name, $searcharray);

	   		 //Operacion de salvado del usuario
	    		$data['user_id']  		= $searcharray['turno'];
               	$data['asunto']  		= $searcharray['subject'];
				$data['mensaje'] 		= $searcharray['content'];
				$data['enviadopor']=$_SESSION['SESS_FIRST_NAME'].' '.$_SESSION['SESS_LAST_NAME'];
				$data['status']=0;
	       if(empty($data['asunto']) || empty($data['mensaje'])){
				echo "<span style='color:red'><strong>Ingrese el Asunto y el contenido</strong></span>";
				/* Remove HTML tag to prevent query injection */
		   }else{
			    if ($_SESSION['SESS_TYPE']=='admin' || $_SESSION['SESS_MSG']==1)
				{
					$salvar_muro = $db->query_insert("members_mensajes", $data);
					echo "<span style='color:blue'><strong>Mensaje Enviado</strong></span>";
				}else{
				   echo "<span style='color:red'><strong>Lo sentimos no tiene derecho para enviar</strong></span>";
				};	
			};
	  break;
	  
};//fin del switch
	
	

?>
   


