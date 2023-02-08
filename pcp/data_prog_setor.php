<?php

/**
 * @author wildchered
 * @copyright 2007
 */

//---------------------------------------------------------------------------------------------

// -----------------------------    DATA EMISSAO	-------------------------------------------
	$data_emissao = $data_emissao_novo;
//	echo "Data Emissao Cadastro: "; 
//	echo $data_emissao = $data_emissao_novo; echo "<br>";
	$dia_emissao = substr($data_emissao, -10,2); $mes_emissao = substr($data_emissao, -7,2); $ano_emissao = substr($data_emissao, -4);	
	// --------------------	CONVERTER DATA EMISSAO PARA DATA DO BANCO MYSQL - AAAA/MM/DD
	$data_emissao_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	// --------------------	VERIFICAR DIA E MES DA EMISSÃO
    if ($dia_emissao < 0) { $dia_emissao = 30 +($dia_emissao); $mes_emissao = $mes_emissao - 1;
	if ($mes_emissao == 0) { $mes_emissao = 12; $ano_emissao = $ano_emissao - 1; }
    }
// -----------------------------    DATA EMISSAO	-------------------------------------------

//	echo "<br>";

// -----------------------------    DATA ENTREGA ----------------------------------------------
//	echo "Data Entrega: "; 	echo $data_entrega_novo; echo "<br>";
//	echo "Data Reprogramação: "; 	echo $reprogramacao_novo; echo "<br>";
	
	if ( $reprogramacao_novo == "" ) { $data_entrega = $data_entrega_novo;  } 
	else { $data_entrega = $reprogramacao_novo; }

//	echo "Data Entrega Final: "; 	
//	echo $data_entrega; echo "<br>";
	$dia_entrega = substr($data_entrega, -10,2); $mes_entrega = substr($data_entrega, -7,2); $ano_entrega = substr($data_entrega, -4);
	
	// --------------------	CONVERTER DATA ENTREGA PARA DATA DO BANCO MYSQL - AAAA/MM/DD
	$data_entrega_db = ($ano_entrega."/".$mes_entrega."/".$dia_entrega);  
	// --------------------	VERIFICAR DIA E MES DA ENTREGA
	if ($dia_entrega < 0) { $dia_entrega = 30 +($dia_entrega); $mes_entrega = $mes_entrega - 1;
	if ($mes_entrega == 0) { $mes_entrega = 12; $ano_entrega = $ano_entrega - 1; }
    }	  	 	 
// -----------------------------    DATA ENTREGA ------------------------------------------- 	 	 	 
//	echo "<br>";
  
//------------		CALCULAR DATA EMISSAO E ENTREGA PARA FORMATO DE NUMEROS	INTEIROS	-----------  	

	//------------	DESCOBRI NUMEROS INTEIROS DA DATA EMISSÃO E ENTREGA - MM/DD/AAAAA
  $data_emissao_mktime = mktime(0,0,0,$mes_emissao,$dia_emissao,$ano_emissao);
//	echo "data_emissao_mktime = ".$data_emissao_mktime; echo "<br>";
  $data_entrega_mktime = mktime(0,0,0,$mes_entrega,$dia_entrega,$ano_entrega);    
// 	echo "data_entrega_mktime = ".$data_entrega_mktime; echo "<br>";      
	//------------	DESCOBRI NUMEROS INTEIROS MM/DD/AAAAA


	//------------	DIMINUI DATA_EMISSAO_MKTIME E DATA_ENTREGA_MKTIME 
    $days = ($data_entrega_mktime - $data_emissao_mktime)/86400;
//	echo "A diferença de dias entre duas datas: ";   
//	echo ceil($days);  echo "<br>";
	
	$porc_setor = 50; 
//	echo "A porcentagem do setor: "; 
//	echo $porc_setor;  echo "<br>"; 
     
	$diasmais = ceil(-( $days * ( $porc_setor / 100) )) * (-1); 
//	echo "Total de Dias a Somar com Data Emissão: ";   
//	echo $diasmais;  echo "<br>";
	//------------	DIMINUI DATA_EMISSAO_MKTIME E DATA_ENTREGA_MKTIME 

//	echo "<br>";
      
//------------------------	VERIFICAR DIA COM A SOMA DO DIASMAIS	-------------------------

//------------	DIA, MES E ANO SAO IGUAL A DA DATA EMISSAO
	$dia = $dia_emissao;  	$mes = $mes_emissao;  	$ano = $ano_emissao;

	for($i = 0; $i < $diasmais; $i++) {//for()
if($mes == "01" || $mes == "03" || $mes == "05" || $mes == "07" || $mes == "08" || $mes == "10" || $mes == "12"){ //if geral 1
	if($mes == 12 && $dia == 31){  $mes = 01;   $ano++;   $dia = 00;  }
	if($dia == 31 && $mes != 12){  $mes++;  $dia = 00;   }  }//fecha if geral 1
if($mes == "04" || $mes == "06" || $mes == "09" || $mes == "11"){ //if geral 2
	if($dia == 30){  $dia = 00;   $mes++;   }   }//fecha if geral 2
if($mes == "02"){ //if geral 3
	if($ano % 4 == 0 && $ano % 100 != 0){ //ano bissexto
	if($dia == 29){  $dia = 00;   $mes++;    }    }//fecha ano bissexto
 	 else {
	if($dia == 28){  $dia = 00;  $mes++;   }   }  }//fecha if geral 3
 	 $dia++;
	}//fecha for()
  
	//CONFIRMA SAÍDA DE 2 DIGITOS NO DIA E MES
  	if(strlen($dia) == 1){$dia = "0".$dia;};
  	if(strlen($mes) == 1){$mes = "0".$mes;};
  
	//MONTAR SAIDA DA DATA CALCULADA DD/MM/AAAA
	$data_calculada = $dia."/".$mes."/".$ano;
//	echo "data_calculada = ".$data_calculada; echo "<br>";
//------------	DIA, MES E ANO SAO IGUAL A DA DATA EMISSAO
	
//------------	DESCOBRIR SEMANA A PARTIR DA DATA CALCULADA
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

		if($val0 == "0")  {$dia_semana_calculada = "Sábado";}
        if($val0 == "1")  {$dia_semana_calculada = "Domingo";}
        if($val0 == "2")  {$dia_semana_calculada = "Segunda-feira";}
		if($val0 == "3")  {$dia_semana_calculada = "Terça-feira";}
        if($val0 == "4")  {$dia_semana_calculada = "Quarta-feira";}
        if($val0 == "5")  {$dia_semana_calculada = "Quinta-feira";}
        if($val0 == "6")  {$dia_semana_calculada = "Sexta-feira";}
        
//	    echo "dia_semana_calculado = ".$dia_semana_calculada; 	echo "<br>";   
//------------	DESCOBRIR SEMANA A PARTIR DA DATA CALCULADA
	   	
//------------------------	VERIFICAR DIA COM A SOMA DO DIASMAIS	-------------------------

//	echo "<br>";
	
// --------------------			FAZER CALCULAR FINAL DE SABADO e DOMINGO		---------------

	// CALCULAR DE DIASMAIS PARA DIASMAIS_FINAL
	if ($val0 == "0") { $diasmais = $diasmais - 1; } 
		elseif ($val0 == "1") { $diasmais = $diasmais - 2; } 

//	echo "diasmais_calculada_final =".ceil($diasmais);  echo "<br>";
	// CALCULAR DE DIASMAIS PARA DIASMAIS_FINAL

	// DIA, MES E ANO SAO IGUAL A DA DATA EMISSAO
	$dia = $dia_emissao;  	$mes = $mes_emissao;  	$ano = $ano_emissao;

	for($i = 0; $i < $diasmais; $i++) {//for()
if($mes == "01" || $mes == "03" || $mes == "05" || $mes == "07" || $mes == "08" || $mes == "10" || $mes == "12"){ //if geral 1
	if($mes == 12 && $dia == 31){  $mes = 01;   $ano++;   $dia = 00;  }
	if($dia == 31 && $mes != 12){  $mes++;  $dia = 00;   }  }//fecha if geral 1
if($mes == "04" || $mes == "06" || $mes == "09" || $mes == "11"){ //if geral 2
	if($dia == 30){  $dia = 00;   $mes++;   }   }//fecha if geral 2
if($mes == "02"){ //if geral 3
	if($ano % 4 == 0 && $ano % 100 != 0){ //ano bissexto
	if($dia == 29){  $dia = 00;   $mes++;    }    }//fecha ano bissexto
 	 else {
	if($dia == 28){  $dia = 00;  $mes++;   }   }  }//fecha if geral 3
 	 $dia++;
	}//fecha for()

	// CONFIRMA SAÍDA DE 2 DIGITOS NO DIA E MES
  	if(strlen($dia) == 1){$dia = "0".$dia;};
  	if(strlen($mes) == 1){$mes = "0".$mes;};
  
	// MONTAR SAIDA DA DATA CALCULADA DD/MM/AAAA
	$data_calculada_final = $dia."/".$mes."/".$ano;  
	$proj_os_dt_prog_novo = $ano."/".$mes."/".$dia;
//	echo "data_calculada_final = ".$data_calculada_final; echo "<br>";
	// DIA, MES E ANO SAO IGUAL A DA DATA EMISSAO
	
// --------------------			FAZER CALCULAR SE FOR SABADO OU DOMINGO		---------------

	
//------------	DESCOBRIR DIA DA SEMANA FINAL, A PARTIR DA DATA CALCULADA FINAL
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
		
		if($val0 == "0")  {$dia_semana_final = "Sábado";}
        if($val0 == "1")  {$dia_semana_final = "Domingo";}
        if($val0 == "2")  {$dia_semana_final = "Segunda-feira";}
		if($val0 == "3")  {$dia_semana_final = "Terça-feira";}
        if($val0 == "4")  {$dia_semana_final = "Quarta-feira";}
        if($val0 == "5")  {$dia_semana_final = "Quinta-feira";}
        if($val0 == "6")  {$dia_semana_final = "Sexta-feira";}
//	  echo "dia_semana_final = ".$dia_semana_final;	echo "<br>";
//------------	DESCOBRIR DIA DA SEMANA FINAL, A PARTIR DA DATA CALCULADA FINAL

//----------------------------------------------------------------------------------------------



?>