<?php
//ver la hora y fecha actual
	date_default_timezone_set('America/El_Salvador');
	setlocale(LC_TIME, 'spanish');
	
//Conexiones a la base de datos
	require_once("../interface/inc/config.inc.php");
	require("../interface/inc/Database.class.php"); 
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect(); 

	//verificar_turno(1,1,'no');


function verificar_turno($turno,$idusuario,$rota)
{
	  //Ver cuando la rotacion esta en NO
	   if ($rota=='no')
	   {
		 //echo "<span style='padding-left:180px;color:#fff'><img src='check.png'/>&nbsp;El usuario NO ROTA</span>"."<br/>";  
		//ver la letra o letra del turno
		  $cadena_turno=letra_turno($turno);
		  //echo 'El turno es: '.$cadena_turno.'<br/>';
		//obtener la jornada  
		  $jornada=jornada($turno);
		 //echo "<span style='padding-left:180px;color:#fff'><img src='check.png'/>&nbsp;La jornada es: ".$jornada.'</span><br/>';
		 //ver si se autoriza la entrada segun rota=no, el turno y jornada
		 //$acceso=ingresar($cadena_turno,$jornada);
		 $acceso=dentro_de_horario($cadena_turno,$jornada);
		 if ($acceso==1)
		  {
		     //echo 'SI PUEDE ACCEDER'.'<br/>';
			 //echo "<span style='padding-left:180px;color:#fff'><img src='check.png'/>&nbsp;activar en linea</span>";
			  return true; 
		  }else{
			 //echo 'ver si hay extra'.'<br/>';
		     //ver si hay tiempo extra
			 $extra=extra($idusuario);
			 if($extra){
				 //echo "<span style='padding-left:180px;color:#fff'><img src='check.png'/>&nbsp;hay extra</span>".'<br/>';
				  return true; 
				 }else{
				   $error='No hay extra'.'<br/>';
				   //echo 'No hay extra'.'<br/>';
				   return false; 
				  };
		  };   
		 
	   };//fin de si cuando no rota
	 
	 //Ver cuando la rotacion esta en SI
	   if ($rota=='si')
	   {
		// echo 'El usuario ROTA'.'<br/>';
		 //ver la letra o letra del turno
		  $cadena_turno=letra_turno($turno);
		  //echo 'El turno es: '.$cadena_turno.'<br/>';
		//obtener la jornada del perfil 
		  $jornada=jornada($turno);
		 // echo 'La jornada es: '.$jornada.'<br/>';
		  //Obtener la nueva jornada que essta en la tabla de turnos rotativos
		  $jornada= rotacion($cadena_turno);
		  //echo 'en la jornada de rotacion:'.$jornada.'<br/>';
		   //ver si se autoriza la entrada segun rota=, el turno iy jornada
		 $acceso=dentro_de_horario($cadena_turno,$jornada);
		 if ($acceso==1)
		  {
		     //echo 'SI PUEDE ACCEDER'.'<br/>';
			 //echo "<span style='padding-left:180px;color:#fff'><img src='check.png'/>&nbsp;activar en linea</span>";
		  }else{
			 echo $jornada.'<br/>';
		     //ver si hay tiempo extra
			 $extra=extra($idusuario);
			 if($extra){
				 //echo 'hay extra'.'<br/>';
				 }
			    else
				{
				 	//echo 'No hay extra'.'<br/>';
				    $error= 'No hay extra'.'<br/>';
				};
		  };   
		  
	   };//fin de el si cuando el usuario rota
	   
};//fin de la funcion verificar
   
 
//funcion para recuparar la letra o letras del turno

function letra_turno($turno){
	  //Obtener la letra o letras del turno
	  $sql_turno="SELECT * FROM members_turno WHERE id=".$turno;
	  //echo $sql_turno.'<br>';

	  
	 $result_turno=mysql_query($sql_turno);
	 $total = mysql_num_rows($result_turno); 
           if($total== 1)  {
               $tur = mysql_fetch_assoc($result_turno);
                 $cadena_turno=strtolower($tur['turno']);
               }else{
                $cadena_turno="";
               };
	
	return $cadena_turno;
};

//funcion para recuparar la jornada turno

function jornada($turno){
	
	  //Obtener la letra o letras del turno
	  $sql_turno="SELECT * FROM members_turno WHERE id=$turno";
	  //echo $sql_turno.'<br>';
	
	 $result_turno=mysql_query($sql_turno);
            if(mysql_num_rows($result_turno) == 1) {
               $tur = mysql_fetch_assoc($result_turno);
                 $cadena_turno=strtolower($tur['jornada']);
               }else{
                $cadena_turno="";
               };
	
	return $cadena_turno;
};



//funcion para obtener la nueva jornada cuando el usuario rota
function rotacion($cadena_turno)
{

	       //echo 'El turno :'.$cadena_turno.'<br>';
		   //ver si esta en la tabla de turnos en el campo diurno el turno
           $sql="SELECT * FROM members_turno_rota WHERE fecha=date(now()) and diurno LIKE '%$cadena_turno%'";
		   //echo $sql.'<br>';
		   $result=mysql_query($sql);
	      
		    //ver si esta en la tabla de turnos en el campo ncturno el turno
		   $sql1="SELECT * FROM members_turno_rota WHERE fecha=date(now()) and nocturno LIKE '%$cadena_turno%'";
		   //echo $sql1.'<br>';
		   $result1=mysql_query($sql1);
	       
		   
		    if(mysql_num_rows($result)>0 ) {return 'diurna';}
			  else
		         if(mysql_num_rows($result1) == 1)  {return 'nocturna';}
				  else
				      {return 'NotieneAccesoHoy';}
	       //echo $sql1;
		   
		  
};

//funcion para ver si tiene tiempo extra para acceder fuera de su horario de trabajo
function extra($idusuario)
{
	 //verificar si esta autorizado por piso para trabajar extra
			$sql="SELECT * FROM members_turno_extra WHERE idusuario='$idusuario' and fecha_apr=date(now())";
			$result=mysql_query($sql);
			//echo $sql;
			if(mysql_num_rows($result) == 1) {
				$tur2 = mysql_fetch_assoc($result);
				$fecha=$tur2['fecha_apr'];
				$fecha=strftime('%d-%m-%y', strtotime($fecha));  
				//echo '</br>'.$fecha.'</br>';
			 }
			 else
			 {
			  return 0;
			 };
			 $hoy=date("d-m-y"); 
			 //echo $hoy;
		     if( $hoy==$fecha)
               {
				   return 1;
			   }else{
				   return 0;
			 
			   };//fin del if para verificar turno extra
				 			
};

/**
 * Determina si la hora de referencia queda dentro del rango horario dado
 *
 * - Todas las horas son cadenas en formato HH:MM (o HH:MM:SS)
 * - El rango es cerrado y de tipo 9:00-14:00 o 23:00-6:00
 * - Compara con la hora actual si no se indica lo contrario
 * recordar que debe existir en la tabla de members turnos turno a noctutrno y un turno a diurno
 */
function dentro_de_horario($cadena_turno,$jornada){ // v2011-06-21
$sql="SELECT * FROM members_turno WHERE turno='$cadena_turno' and jornada='$jornada'";
	//echo $sql.'</br>';
	$result=mysql_query($sql);
            if(mysql_num_rows($result) == 1) {
				$tur = mysql_fetch_assoc($result);
				$desde=$tur['inicio'];
				//echo "<span style='padding-left:180px;color:#fff'><img src='check.png'/>&nbsp;desde:".$desde.'</span></br>';
				$hasta=$tur['final'];
				//echo "<span style='padding-left:180px;color:#fff'><img src='check.png'/>&nbsp;hasta:".$hasta.'</span></br>';
				$hora_act = time();   
				$hora=date("H:i:s",$hora_act);
				//echo "hora act:".$hora.'</br>';
			};
    $hms_inicio=$desde;
	$hms_fin=$hasta;
	$hms_referencia=NULL;
    if( is_null($hms_referencia) ){
        $hms_referencia = date('G:i:s');
		//echo $hms_referencia;
    }

    list($h, $m, $s) = array_pad(preg_split('/[^\d]+/', $hms_inicio), 3, 0);
    $s_inicio = 3600*$h + 60*$m + $s;
    //echo $s_inicio.'<br/>';
    list($h, $m, $s) = array_pad(preg_split('/[^\d]+/', $hms_fin), 3, 0);
    $s_fin = 3600*$h + 60*$m + $s;
    //echo $s_fin.'<br/>';
    list($h, $m, $s) = array_pad(preg_split('/[^\d]+/', $hms_referencia), 3, 0);
    $s_referencia = 3600*$h + 60*$m + $s;
     //echo $s_referencia.'<br/>';
	 
    if($s_inicio<=$s_fin){
        return $s_referencia>=$s_inicio && $s_referencia<=$s_fin;
    }else{
        return $s_referencia>=$s_inicio || $s_referencia<=$s_fin;
    }
}

//colocar al usuario en linea
 function enlinea()
 {
	
	$sql="SELECT * FROM members_session WHERE user_id=".$_SESSION['SESS_MEMBER_ID']." and fecha=CURRENT_DATE()";
			//echo $sql;
			$result=mysql_query($sql);
			if(mysql_num_rows($result) == 1) 
			{
			 //echo "actualiza el registo";
			  $sql_u="UPDATE  members_session SET  online=1, hora_i=CURRENT_TIME() WHERE  user_id =".$_SESSION['SESS_MEMBER_ID']." and fecha=CURRENT_DATE()";
			  // echo $sql_u;
			   mysql_query($sql_u);
			
			}else{
				 //echo "inserta el registro";
				
				 $sql_i="INSERT INTO  members_session(user_id,user,session,fecha,hora_i,ip,online) VALUES (".$_SESSION['SESS_MEMBER_ID'].",'".$_SESSION['SESS_USER']."','".$_SESSION['SESS_MEMBER_ID']."',CURRENT_DATE(),CURRENT_TIME(),'". $_SESSION['SESS_IP']."',1)";
                 // echo $sql_i;
				  mysql_query($sql_i);
			};

	
	 
 };
 
 
 function cerrar_session($userid)
 {
    $sql_u="UPDATE  members_session SET  online=0,hora_s=CURRENT_TIME() WHERE  user_id =".$userid." and fecha=CURRENT_DATE()";
			   //echo $sql_u;
			   mysql_query($sql_u);
 };
?>   