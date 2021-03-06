<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>jQuery Alert Dialogs<</title>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery.ui.draggable.js" type="text/javascript"></script>    
    <script src="js/jquery.alerts.js" type="text/javascript"></script>
    <link href="css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />    
 
    <script type="text/javascript">
 
        $(document).ready(function() {
                    
            $("#alert1").click(function() {
                jAlert('error', 'This is the error dialog box with some extra text.', 'Error Dialog');
            });
 
            $("#alert2").click(function() {
                jAlert('warning', 'This is the warning dialog along with some <u>html</u>.', 'Warning Dialog');
            });
 
            $("#alert3").click(function() {
                jAlert('success', 'This is the success dialog.', 'Success Dialog');
            });
 
            $("#alert4").click(function() {
                jAlert('info', 'This is the info dialog.', 'Info Dialog');
            });
 
            $("#confirm").click(function() {
                jConfirm('Can you confirm this?', 'Confirmation Dialog', function(r) {
                    jAlert('success', 'Confirmed: ' + r, 'Confirmation Results');
                });
            });
 
            $("#prompt").click(function() {
                jPrompt('Type something:', 'Prefilled value', 'Prompt Dialog', function(r) {
                    if (r) alert('You entered ' + r);
                });
            });
        });
			
    </script>    
</head>
<body>
    <h1>jQuery Alert Dialogs</h1>
    <input id="alert1" type="button" value="Error" />
    <input id="alert2" type="button" value="Warning" />
    <input id="alert3" type="button" value="Success" />
    <input id="alert4" type="button" value="Info" />
    <input id="prompt" type="button" value="Prompt" />
    <input id="confirm" type="button" value="confirm" />    
</body>
</html>
Z
