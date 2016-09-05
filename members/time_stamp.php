
<?php
function time_stamp($session_time) 
{ 
 
$time_difference = time() - $session_time ; 
$seconds = $time_difference ; 
$minutes = round($time_difference / 60 );
$hours = round($time_difference / 3600 ); 
$days = round($time_difference / 86400 ); 
$weeks = round($time_difference / 604800 ); 
$months = round($time_difference / 2419200 ); 
$years = round($time_difference / 29030400 ); 

if($seconds <= 60)
{
echo"hace $seconds segundos"; 
}
else if($minutes <=60)
{
   
   echo"hace $minutes minutos"; 
  
}
else if($hours <=24)
{
   
  echo"hace $hours horas";
 
}
else if($days <=7)
{
 
  echo"hace $days dias";
 
  
}
else if($weeks <=4)
{
 
  echo"hace $weeks semanas";

 }
else if($months <=12)
{
   if($months==1)
   {
   echo"Hace un mes";
   }
  else
  {
  echo"hace $months meses";
  }
 
   
}

else
{
if($years==1)
   {
   echo"hace un a&ntildeo";
   }
  else
  {
  echo"hace $years a&ntildeo";
  }


}
 


} 



?>