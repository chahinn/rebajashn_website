<?php
$validateValue=$_REQUEST['fieldValue'];
$validateId=$_REQUEST['fieldId'];

$arrayToJs = array();
$arrayToJs[0] = $validateId;

$conn = mysql_pconnect('mysql1107.opentransfer.com','C334953_eleva','Nolose2012');
mysql_select_db('C334953_elevation19');

$SQL = "SELECT * FROM el_usuarios WHERE usuario = '$validateValue';";
$res = mysql_query($SQL);

if (mysql_num_rows($res) > 0) {
    $arrayToJs[1] = false;
    echo json_encode($arrayToJs);
}else{
    $arrayToJs[1] = true;
    echo json_encode($arrayToJs);
}
?>