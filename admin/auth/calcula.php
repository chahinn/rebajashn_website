<?php
//ver la hora y fecha actual
	date_default_timezone_set('America/El_Salvador');
	setlocale(LC_TIME, 'spanish');
function sECONDS_TO_HMS($seconds)
  {

     $days = floor($seconds/86400);
     $hrs = floor($seconds/3600);
     $mins = intval(($seconds / 60) % 60); 
     $sec = intval($seconds % 60);

        if($days>0){
          //echo $days;exit;
          $hrs = str_pad($hrs,2,'0',STR_PAD_LEFT);
          $hours=$hrs-($days*24);
          $return_days = $days." Days ";
          $hrs = str_pad($hours,2,'0',STR_PAD_LEFT);
     }else{
      $return_days="";
      $hrs = str_pad($hrs,2,'0',STR_PAD_LEFT);
     }

     $mins = str_pad($mins,2,'0',STR_PAD_LEFT);
     $sec = str_pad($sec,2,'0',STR_PAD_LEFT);

     return $return_days.$hrs.":".$mins.":".$sec;
  }

//echo sECONDS_TO_HMS(65); // 00:01:05
//echo sECONDS_TO_HMS(76325); //21:12:05
//echo sECONDS_TO_HMS(345872); // 4 Days 00:04:32 
?>

<?php
# Desc: function to return Time difference in between the two Times in a day
# Parm: Start_time end Time as 12hr/24hr format within single day
# Return: duration in time format: hh:mm:ss
function time_difference($start_time="11:00:00",$end_time="12:00:00")
{
list($h1,$m1,$s1)    =     explode(':',$start_time);  
$startTimeStamp    =    mktime($h1,$m1,$s1,0,0,0);

list($h2,$m2,$s2)    =     explode(':',$end_time);   

//check end time is in 12 hrs format:
if($h2 < $h1)
$h2+=12;

$endTimeStamp    =    mktime($h2,$m2,$s2,0,0,0); 
$time=abs($endTimeStamp - $startTimeStamp);

$value = array(
"hours" => "00",
"minutes" => "00",
"seconds" => "00"

);

if($time >= 3600){
$value["hours"] = sprintf("%02d",floor($time/3600));
$time = ($time%3600);
}
if($time >= 60){
$value["minutes"] = sprintf("%02d",floor($time/60));
$time = ($time%60);
}

$value["seconds"] = sprintf("%02d",floor($time));

return implode(":",$value); 
}

//echo time_difference("11:45:00","01:30:00");
//echo "<br />";
//echo time_difference("13:00:00","15:00:00");

//Output:
// 01:45:00
// 02:00:00

?>
<? function calcular_tiempo_trasnc($hora1,$hora2){ 
    $separar[1]=explode(':',$hora1); 
    $separar[2]=explode(':',$hora2); 

$total_minutos_trasncurridos[1] = ($separar[1][0]*60)+$separar[1][1]; 
$total_minutos_trasncurridos[2] = ($separar[2][0]*60)+$separar[2][1]; 
$total_minutos_trasncurridos = $total_minutos_trasncurridos[1]-$total_minutos_trasncurridos[2]; 
if($total_minutos_trasncurridos<=59) return($total_minutos_trasncurridos.' Minutos'); 
elseif($total_minutos_trasncurridos>59){ 
$HORA_TRANSCURRIDA = round($total_minutos_trasncurridos/60); 
if($HORA_TRANSCURRIDA<=9) $HORA_TRANSCURRIDA='0'.$HORA_TRANSCURRIDA; 
$MINUITOS_TRANSCURRIDOS = $total_minutos_trasncurridos%60; 
if($MINUITOS_TRANSCURRIDOS<=9) $MINUITOS_TRANSCURRIDOS='0'.$MINUITOS_TRANSCURRIDOS; 
return ($HORA_TRANSCURRIDA.':'.$MINUITOS_TRANSCURRIDOS.' Horas'); 

} } 
//llamamos la función e imprimimos
echo date('H:i')."<br/>"; 
//echo calcular_tiempo_trasnc(date('H:i'),'17:12'); 
 $w=calcular_tiempo_trasnc('22:00',date('H:i')); 
 //echo $w;
 
 

 
 // example 1 
$time1 = date('H:i'); 
$time2 = "23:30"; 

echo "Time difference: ".get_time_difference($time1, $time2)." minutos<br/>"; 


function get_time_difference($time1, $time2) 
{ 
    $time1 = strtotime("1/1/1980 $time1"); 
    $time2 = strtotime("1/1/1980 $time2"); 
     
    if ($time2 < $time1) 
    { 
        $time2 = $time2 + 86400; 
    } 
    $x= round(abs($time2 - $time1),1);
    //return ($time2 - $time1) / 3600; 
	return $x;
     
} 
?> 

