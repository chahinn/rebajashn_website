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
 $opcion_menu=2;
$ofertaid = isset($_GET['id']) ? $_GET['id'] : "";	
	

 //echo $ofertaid;
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
	

//buscar el codigo del cupon
function buscar_codigo($cuponid,$db)
	{ 
	    $idusuario=$_SESSION['SESS_USUARIO_ID'];
		$sql = "SELECT * FROM el_cupones_usuarios WHERE cupon_id=$cuponid and usuario=$idusuario and (NOW()>=desde and NOW()<=hasta) and canje=0";
		$row = $db->query($sql); 
		if($db->affected_rows > 0){
		  $record = $db->query_first($sql);
		   return $record['codigo'];
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
	 $sql_cupon="SELECT * FROM el_cupones where id=$ofertaid";
	 //echo $sql_cupon;
	 $oferta =  $db->query_first($sql_cupon);
	 
   }else
   {
    // $ciudad=$_SESSION['SESS_CIUDAD'];
	// $sql_cupon="SELECT * FROM el_cupones where ciudad=$ciudad and ofertadeldia='si'";
   
   }
 

 
  
  //informacion de la empresa
    $empid=$oferta['empresa'];
	$sqle="SELECT * FROM el_empresas where id_empresa=$empid";
	//$row_emp = $db->query_first($sqle);

if($db->affected_rows > 0){
   $row_emp = $db->query_first($sqle);
   //echo $sqle;
  
}
else{
    echo "Error: No user found.";
}

//verificar que el usuario pude abtener el cupon o no cuando no se a llegado al limite adquirido
 $adquiridos=$oferta['adquiridos']+$oferta['impresos'];
 $user=$_SESSION['SESS_USUARIO_ID'];
if($oferta['limiteadquirir']==0 || $adquiridos >=$oferta['limiteadquirir'] ){
    echo"<input type='hidden' name='cuponer' id='cuponer' value=0 />";
}else{
    $sql="SELECT * FROM el_cupones_usuarios WHERE cupon_id=$ofertaid and usuario=$user";
	$row = $db->query_first($sql);
	// if user exists
	 if(!empty($row['id_cupon_usuario']))
			echo"<input type='hidden' name='cuponer' id='cuponer' value=1 />";						
		else{
			echo"<input type='hidden' name='cuponer' id='cuponer' value=2 />";		
		};
	
};

?>
<table width="780" border="0" style="border-width: 1px; border-color:#000000;
border-style: dashed;">
 
  <tr>
    <td colspan="3" align="center"><img src="../assets/img/center.png" width="241" height="105" /></td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="top" style="font-size:46px"> <strong><?php $cod=buscar_codigo($oferta['id'],$db); echo $cod;?></strong></td>
  </tr>

  <tr>
    <td colspan="3" align="center" valign="top" style="font-size: 36px"><b> <?php echo $oferta['titulo'];?></b></td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="top" style="font-size: 24px"><em><?php echo $row_emp['empresa'];?> - <?php  $nombre_ciudad=buscar_ciudad($ciudad,$db);echo $nombre_ciudad?></em></td>
  </tr>
  <tr>
    <td height="31">&nbsp;<strong>Pasos para Canjear el Cup&oacute;n:</strong></td>
    <td colspan="2" align="left">&nbsp;<strong>Acreditado a:</strong></td>
  </tr>
  <tr>
    <td colspan="2" rowspan="3" valign="top"><ol>
      <li>Presentar este cup&oacute;n o el c&oacute;digo del  mismo en el establecimiento correspondiente.</li>
      <li>Asegurarse que este vigente el  mismo.</li>
      <li>Disfrutar del cup&oacute;n con tus amigos  o familiares</li>
    </ol></td>
    <td width="374"  style="font-size: 14px"><span style="font-size: 24px"><?php echo $_SESSION['SESS_NOMBRES'].' '.$_SESSION['SESS_APELLIDOS'];?></span></td>
  </tr>
  <tr>
    <td  style="font-size: 14px"><strong>Fecha de vencimiento:</strong></td>
  </tr>
  <tr>
    <td align="center" valign="top"  style="font-size: 14px"><?php echo $oferta['hasta'];?></td>
  </tr>
  <tr>
    <td height="21" valign="top">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
</table>
