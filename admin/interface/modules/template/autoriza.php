<?php
$loginUsername = isset($_POST["loginUsername"]) ? $_POST["loginUsername"] : "";
 
if($loginUsername == "f"){
    echo "{success: true}";
} else {
    echo "{success: false, errors: { reason: 'Identificaci�n incorrecta. Int�ntelo de nuevo.' }}";
}
?>