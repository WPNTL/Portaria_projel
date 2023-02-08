<?
//data inicio
$datainicio = "2008-08-14";  
$dia_datainicio = substr($datainicio, -2);   
$mes_datainicio = substr($datainicio, -5,2);  
$ano_datainicio = substr($datainicio, -10,4); 
echo "datainicio = ". $datainicio; echo "<br>"; 
//hora inicio
$horainicio = "10:00:00"; 
echo "horainicio = ". $horainicio; echo "<br>"; 

echo "<br>";

//data fim
$datafim = "2008-08-20";  
echo "datafim = ". $datafim; echo "<br>";
//hora fim
$horafim = "13:20:40"; 
echo "horafim = ". $horafim; echo "<br>"; 

 echo "<br>"; 

//datahora inicio junto
$datahorainicio = $datainicio." ".$horainicio;
echo "datahorainicio = ". $datahorainicio; echo "<br>"; 
//datahora fim junto
$datahorafim = $datafim." ".$horafim;
echo "datahorafim = ". $datahorafim; echo "<br>"; 

echo "<br>"; 


//VARIAVEIS                 


//DIAS DO FOR DA DATA PROGR.
$dias_inicial = 0;	
$dias_prog = 5;
$dias_prog = $dias_prog - 1;               	
                    	
                    	

// FOR SOMAR DIAS	------------------------------------------------
	for ( $dias=$dias_inicial; $dias<=$dias_prog; $dias++ )	{
  

// DESCOBRI DIA, MES E ANO DA DATA PROGR. DIARIA  ------------------------------------------------

$dia = $dia_datainicio; $mes = $mes_datainicio; $ano = $mes_datainicio;


// FOR DESCOBRI DIA DA SEMANA	------------------------------------------------
	for($semana = 0; $semana<$dias; $semana++) {
    
  	if($mes == "01" || $mes == "03" || $mes == "05" || $mes == "07" || $mes == "08" || $mes == "10" || $mes == "12"){
  	if($mes == 12 && $dia == 31){  $mes = 01;   $ano++;   $dia = 00;  }
  	if($dia == 31 && $mes != 12){  $mes++;  $dia = 00;   }  }//fecha if geral
  
  	if($mes == "04" || $mes == "06" || $mes == "09" || $mes == "11"){
  	if($dia == 30){  $dia = 00;   $mes++;   }   }//fecha if geral
  
  	if($mes == "02"){
  	if($ano % 4 == 0 && $ano % 100 != 0){ //ano bissexto
  	if($dia == 29){  $dia = 00;   $mes++;    }    }
  else {
  	if($dia == 28){  $dia = 00;  $mes++;   }   }  }//FECHA IF DO MÊS 2
  
  $dia++;   
  
}//FECHAR FOR DESCOBRI DIA DA SEMANA (semana)	------------------------------------------------
  
  
// Confirma Saída de 2 dígitos   ------------------------------------------------
	if(strlen($dia) == 1){$dia = "0".$dia;};
	if(strlen($mes) == 1){$mes = "0".$mes;};
  
// Monta Saída ----------------------------------------------------------------
	$data_programada = $dia."/".$mes."/".$ano;   
	$data_programada_db = $ano."/".$mes."/".$dia; 

//	echo "<br>";  echo "data_programada_db = ". $data_programada_db; 

	$mes_x = $mes;
  
	if ($mes == 1) { $mes_x = 13; $ano = $ano-1;}
	if ($mes == 2) { $mes_x = 14; $ano = $ano-1;}
	
	$val4 = (($mes_x+1)*3)/5;
		$val4_int=number_format($val4,0,'.','');
		if ($val4 < $val4_int) {$val4 = $val4_int - 1;} else {$val4 = $val4_int;}
	$val5 = $ano/4;
   		$val5_int=number_format($val5,0,'.','');
		if ($val5 < $val5_int) {$val5 = $val5_int - 1;} else {$val5 = $val5_int;}
	$val6 = $ano/100;
   		$val6_int=number_format($val6,0,'.','');
		if ($val6 < $val6_int) {$val6 = $val6_int - 1;} else {$val6 = $val6_int;}
	$val7 = $ano/400;
   		$val7_int=number_format($val7,0,'.','');
		if ($val7 < $val7_int) {$val7 = $val7_int - 1;} else {$val7 = $val7_int;}
	$val8 = $dia+($mes_x*2)+$val4+$ano+$val5-$val6+$val7+2;
	$val9 = $val8/7;
		$val9_int=number_format($val9,0,'.','');
		if ($val9 < $val9_int) {$val9 = $val9_int - 1;} else {$val9 = $val9_int;}
	$val0 = $val8-($val9*7); 
   
		if($val0 == "0")  {$dia_semana = "Sábado";}
        if($val0 == "1")  {$dia_semana = "Domingo";}
        if($val0 == "2")  {$dia_semana = "Segunda-feira";}
		if($val0 == "3")  {$dia_semana = "Terça-feira";}
        if($val0 == "4")  {$dia_semana = "Quarta-feira";}
        if($val0 == "5")  {$dia_semana = "Quinta-feira";}
        if($val0 == "6")  {$dia_semana = "Sexta-feira";}
        
	echo "<br>";  echo "dia_semana = ".$dia_semana;  	echo "<br>";

//-----------------------------------------------------------------------------------------


//QUANDO NÃO FOR SABADO OU DOMINGO 
if ( $dia_semana <> "Sábado" AND $dia_semana <> "Domingo"  ) 
{ 
	echo "NÃO"; echo "<br>";
}
//QUANDO NÃO FOR SABADO OU DOMINGO 

else
//QUANDO FOR SABADO OU DOMINGO
{
  	echo "SABADO E DOMINGO"; echo "<br>"; 	
	$sabadodomingo = $sabadodomingo + 1;
   //$dias_prog = $dias_prog + 1; 
}
//QUANDO FOR SABADO OU DOMINGO 


}//FECHAR FOR SOMAR DIAS (dias)	
echo "<br>";
echo "sabadodomingo = " .$sabadodomingo;


?>

