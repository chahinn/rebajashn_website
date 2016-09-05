<?php
session_start();
	require_once("../inc/config.inc.php");
	require("../inc/Database.class.php"); 
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect(); 
	include '../russell_secure.php';
	date_default_timezone_set('America/El_Salvador');
	setlocale(LC_TIME, 'spanish');
    
	$user = isset($_GET['id_user']) ? $_GET['id_user'] : "";
	$puesto = isset($_GET['puesto']) ? $_GET['puesto'] : "";
	$turno = isset($_GET['turno']) ? $_GET['turno'] : "";
	$login = isset($_GET['login']) ? $_GET['login'] : "";

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

//FUNCION PARA BUSCAR LOS NOMBRES
function nombres($u){
   $sql="SELECT * FROM members WHERE member_id=$u;";
       //echo $sql;
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		if(empty($row['member_id']))
		  echo "N/A";
		  else
		   echo $row['firstname']." ".$row['lastname'];
};	

//FUNCION PARA BUSCAR LOS NOMBRES
function foto($u){
   $sql="SELECT * FROM members WHERE member_id=$u;";
       //echo $sql;
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		if(empty($row['member_id']))
		  echo "N/A";
		  else
		   echo $row['pic'];
};	
  
?>
<script src="../assets/js/jquery.js"></script>

<div class="tabbable" style="margin-bottom: 9px;">
   <ul class="nav nav-tabs">
      <li class="active"><a href="#1" data-toggle="tab"><i class="icon-user"></i> Informaci&oacute;n</a></li>
      <li class=""><a href="#2" data-toggle="tab"><i class="icon-envelope"></i> Enviar Mensaje</a></li>
   </ul>
   <div class="tab-content">
      <div class="tab-pane active" id="1">
            <table width="100%" border="0">
              <tr>
                <td height="23" colspan="2" style="font-size:12px"><strong><?php nombres($user);?></strong>    </td>
                <td width="39%" rowspan="5" valign="top"><img src="uploads/<?php foto($user);?>" width="76" height="76" /></td>
              </tr>
              <tr>
                <td colspan="2" style="font-size:10px"><?php puesto($puesto)?></td>
              </tr>
              <tr>
                <td colspan="2" style="font-size:10px">Turno <?php turno($turno)?> </td>
              </tr>
             </table>
			 <a href="javascript:void(0)" onclick="javascript:chatWith('<?php echo $login?>')">Chat</a>
			 
      </div>
      <div class="tab-pane" id="2">
          <div id="resultado"></div>
          <div class="control-group">
           <form id="fmensaje" onSubmit="return false;">
           <input type="hidden" id="turno" name="turno" value="<?php echo $user;?>" />
            <label class="control-label" for="subject">Titulo:</label>
            <input name="subject" type="text" id="subject" size="66" maxlength="145"  />
            <label class="control-label" for="textarea">Mensaje:</label>
            <div class="controls">
              <textarea class="input-large" name="content" id="content" rows="3"></textarea>
            </div>
            <button name="enviarm" id="enviarm" class="btn btn-success" 
              onclick="javascript:
			          alert('enviar');                    
                       var name = $('#name').val();
					   var id;
					   var str = $('#fmensaje').serialize();
					   
					  $('#resultado').load('dashboard/dashboard_procesar.php?op=4', {'name':str,'id':1} );
					  $('#resultado').fadeTo(500,1).fadeTo(10000,0);
                      ">Enviar Mensaje</button>
           </form> 
          </div>
      </div>
   </div>
</div>