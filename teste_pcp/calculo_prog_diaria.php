<?php


// CALCULAR DATA PROG DIARIA +1 OU +2 DIAS ATRAVES DA DATA PROG MONTAGEM
$proxima_prog_montagem = mktime(0, 0, 0, date("$mes_dt_prog_montagem_novo"), date("$dia_dt_prog_montagem_novo") + 1, date("$ano_dt_prog_montagem_novo"));
$proxima_prog_montagem1 = date("Y/m/d",  $proxima_prog_montagem);

$proxima_prog_montagem3 = mktime(0, 0, 0, date("$mes_dt_prog_montagem_novo"), date("$dia_dt_prog_montagem_novo") + 2, date("$ano_dt_prog_montagem_novo"));
$proxima_prog_montagem2 = date("Y/m/d",  $proxima_prog_montagem3);

//CONVERTENDO DATA_CALCULADA
$dia_proxima_prog_montagem1 = substr($proxima_prog_montagem1, -2); 
$mes_proxima_prog_montagem1 = substr($proxima_prog_montagem1, -5,2);
$ano_proxima_prog_montagem1 = substr($proxima_prog_montagem1, -10,4); 

//CONVERTENDO DATA_CALCULADA
$dia_proxima_prog_montagem2 = substr($proxima_prog_montagem2, -2); 
$mes_proxima_prog_montagem2 = substr($proxima_prog_montagem2, -5,2);
$ano_proxima_prog_montagem2 = substr($proxima_prog_montagem2, -10,4);

//descobrir dia da semana
$timestamp1 = mktime(0, 0, 0, $mes_proxima_prog_montagem1, $dia_proxima_prog_montagem1, $ano_proxima_prog_montagem1); // mês/dia/ano
$timestamp2 = mktime(0, 0, 0, $mes_proxima_prog_montagem2, $dia_proxima_prog_montagem2, $ano_proxima_prog_montagem2); // mês/dia/ano

  // data: 22/11/2006
  //$data = mktime(0, 0, 0, 11, 22, 2006);


//converter dia da semana em numeros
  // domingo = 0;
  // sábado = 6; 
  $dia_semana1 = date("w", $timestamp1);
  $dia_semana2 = date("w", $timestamp2);  
  //if(($dia_semana != 0) && ($dia_semana != 6))
  
//FORMULA PARA CALCULO DA DATA PROG DIARIA
if ( $dt_prog_montagem_novo == "" ) {
	$data_prog_diaria_novo = "$data_prog_diaria_novo";
} else {
	if ( $gab_novo == "-" OR $gab_novo == "" OR $gab == "-" OR $gab == ""  ) {
		if ($dia_semana1 == "6") {
$proxima_prog_montagem1 = mktime(0, 0, 0, date("$mes_proxima_prog_montagem1"), date("$dia_proxima_prog_montagem1") + 2, date("$ano_proxima_prog_montagem1"));
$proxima_prog_montagem_final = date("Y/m/d",  $proxima_prog_montagem1);
		
		$data_prog_diaria_novo = "$proxima_prog_montagem_final";
		
		} elseif ($dia_semana1 == "0") {
$proxima_prog_montagem1 = mktime(0, 0, 0, date("$mes_proxima_prog_montagem1"), date("$dia_proxima_prog_montagem1") + 1, date("$ano_proxima_prog_montagem1"));
$proxima_prog_montagem_final = date("Y/m/d",  $proxima_prog_montagem1);
		
		$data_prog_diaria_novo = "$proxima_prog_montagem_final";
		
		} else {
		
		$data_prog_diaria_novo = "$proxima_prog_montagem1";
		
		} 
	} elseif ( $gab_novo == "I" OR $gab == "I" ) {
		if ( $dia_semana2 == "6") {
$proxima_prog_montagem2 = mktime(0, 0, 0, date("$mes_proxima_prog_montagem2"), date("$dia_proxima_prog_montagem2") + 2, date("$ano_proxima_prog_montagem2"));
$proxima_prog_montagem_final2 = date("Y/m/d",  $proxima_prog_montagem2);
		
		$data_prog_diaria_novo = "$proxima_prog_montagem_final2";
		
		} elseif ($dia_semana2 == "0") {
$proxima_prog_montagem2 = mktime(0, 0, 0, date("$mes_proxima_prog_montagem2"), date("$dia_proxima_prog_montagem2") + 1, date("$ano_proxima_prog_montagem2"));
$proxima_prog_montagem_final2 = date("Y/m/d",  $proxima_prog_montagem2);
		
		$data_prog_diaria_novo = "$proxima_prog_montagem_final2";
		
		} else {
			
		$data_prog_diaria_novo = "$proxima_prog_montagem2";
			
		}
	}  else {
		$data_prog_diaria_novo = $data_prog_diaria;
}
}
?>