<? include "valida_sessao.php" ; include "config_pcp.php"; ?>

<html>
<head>
<title> Cadastro Pedido </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/letras_maiscula.js"></script>
<script language="JavaScript" SRC="funcoes/auto_completar.js"></script>
<script language="JavaScript" SRC="funcoes/enter_altera.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
<script language="JavaScript" SRC="funcoes/abrir_fechar.js"></script>
<script language="JavaScript" SRC="funcoes/calendario.js"></script>
</head>
<body>

<?

// 		-----------------------------    data_rec_pedido		-------------------------------------------------

//echo "data_rec_pedido = ".$data_rec_pedido; echo "<br>";
	$dia_rec_pedido = substr($data_rec_pedido, -10,2); 
	$mes_rec_pedido = substr($data_rec_pedido, -7,2); 
	$ano_rec_pedido = substr($data_rec_pedido, -4);
	
	// --------------------	converter data_rec_pedido AAAA/MM/DD
	$data_rec_pedido_db = ($ano_rec_pedido."-".$mes_rec_pedido."-".$dia_rec_pedido);  
	// --------------------	converter data_rec_pedido AAAA/MM/DD

	// --------------------	verificar dia e mes da data_rec_pedido
	if ($dia_rec_pedido < 0) { $dia_rec_pedido = 30 +($dia_rec_pedido); $mes_rec_pedido = $mes_rec_pedido - 1;
	if ($mes_rec_pedido == 0) { $mes_rec_pedido = 12; $ano_rec_pedido = $ano_rec_pedido - 1; }
    }
	// --------------------	verificar dia e mes da data_rec_pedido
	
	//---------------------	descobrir numeros interios data_rec_pedido - MM/DD/AAAAA
  $data_rec_pedido_mktime = mktime(0,0,0,$mes_rec_pedido,$dia_rec_pedido,$ano_rec_pedido);
//echo "data_rec_pedido_mktime = ".$data_rec_pedido_mktime; echo "<br>";
    //---------------------	descobrir numeros interios data_rec_pedido - MM/DD/AAAAA
	
// 		-----------------------------    data_rec_pedido		-------------------------------------------------
 	


//		-------------------------------			prazo_entrega_data		-------------------------------------------------
	
//echo "prazo_entrega_data = ".$prazo_entrega_data; echo "<br>";
	$dia_prazo_entrega_data = substr($prazo_entrega_data, -10,2); 
	$mes_prazo_entrega_data = substr($prazo_entrega_data, -7,2); 
	$ano_prazo_entrega_data = substr($prazo_entrega_data, -4);
	
	// --------------------	converter prazo_entrega_data AAAA/MM/DD
	if ( $prazo_entrega_data == "" ) 
	{ 	$prazo_entrega_data_db = ""; }
	else 
	{   $prazo_entrega_data_db = ($ano_prazo_entrega_data."-".$mes_prazo_entrega_data."-".$dia_prazo_entrega_data); }
//echo "prazo_entrega_data_db = ".$prazo_entrega_data_db; echo "<br>";
	// --------------------	converter prazo_entrega_data AAAA/MM/DD

	// --------------------	verificar dia e mes da prazo_entrega_data
	if ($dia_prazo_entrega_data < 0) { $dia_prazo_entrega_data = 30 +($dia_prazo_entrega_data); $mes_prazo_entrega_data = $mes_prazo_entrega_data - 1;
	if ($mes_prazo_entrega_data == 0) { $mes_prazo_entrega_data = 12; $ano_prazo_entrega_data = $ano_prazo_entrega_data - 1; }
    }
	// --------------------	verificar dia e mes da prazo_entrega_data
	
	//---------------------	descobrir numeros interios prazo_entrega_data - MM/DD/AAAAA
  $prazo_entrega_data_mktime = mktime(0,0,0,$mes_prazo_entrega_data,$dia_prazo_entrega_data,$ano_prazo_entrega_data);
//echo "prazo_entrega_data_mktime = ".$prazo_entrega_data_mktime; echo "<br>";
    //---------------------	descobrir numeros interios prazo_entrega_data - MM/DD/AAAAA
    
//		-------------------------------			prazo_entrega_data		-------------------------------------------------	



//		-------------------------------			diminui prazo_entrega_data_mktime menos data_rec_pedido_mktime 		---------------	

  $prazo_entrega_data_dias = ($prazo_entrega_data_mktime - $data_rec_pedido_mktime)/86400;
//echo "prazo_entrega_data : ";  echo ceil($prazo_entrega_data_dias);  echo "<br>";
	
//		-------------------------------			diminui prazo_entrega_data_mktime menos data_rec_pedido_mktime 		---------------	



//		-----------------------			verefica se foi digitado o prazo em data ou dias		-------------------------	

if ( $prazo_entrega_data <> "" ) { $prazo_entrega_dias = $prazo_entrega_data_dias;} 
if ( $prazo_entrega_data == "" ) { $prazo_entrega_dias = $prazo_entrega_dias;} 
//echo "prazo_entrega_dias : ";  echo $prazo_entrega_dias;  echo "<br>";	

//		-----------------------			verefica se foi digitado o prazo em data ou dias		-------------------------	



//		-------------------------------			data_entrega		-------------------------------------------------

	//------------	porcentagem
	$porc_entrega = 100; 
//echo "porcentagem entrega = ".$porc_entrega;  echo "<br>"; 
	//------------	porcentagem
	
	// soma total de dias a somar com data_rec_pedido
	$dias_mais_entrega = ceil(-( $prazo_entrega_dias * ( $porc_entrega / 100) )) * (-1); 
//echo "dias a somar com a data_rec_pedido = ".$dias_mais_entrega;  echo "<br>"; 
	// soma total de dias a somar com data_rec_pedido

//	echo "<br>";
      
//------------------------	VERIFICAR DIA COM A SOMA DO DIASMAIS	-------------------------

//------------	DIA, MES E ANO SAO IGUAL A DA DATA EMISSAO
	$dia = $dia_rec_pedido;  	$mes = $mes_rec_pedido;  	$ano = $ano_rec_pedido;

	for($i = 0; $i < $dias_mais_entrega; $i++) {//for()
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
	if ($val0 == "0") { $dias_mais_entrega = $dias_mais_entrega - 1; } 
		elseif ($val0 == "1") { $dias_mais_entrega = $dias_mais_entrega + 1; } 

//	echo "diasmais_calculada_final =".ceil($diasmais);  echo "<br>";
	// CALCULAR DE DIASMAIS PARA DIASMAIS_FINAL

	// DIA, MES E ANO SAO IGUAL A DA DATA EMISSAO
	$dia = $dia_rec_pedido;  	$mes = $mes_rec_pedido;  	$ano = $ano_rec_pedido;

	for($i = 0; $i < $dias_mais_entrega; $i++) {//for()
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
	$data_entrega = $dia."/".$mes."/".$ano;
	$data_entrega_db = $ano."/".$mes."/".$dia;
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

//		-------------------------------			data_entrega		-------------------------------------------------	
	
	

//		-------------------------------			data da copia		-------------------------------------------------

//------------	porcentagem
	
	$porc_copia = 10; 
//	echo "A porcentagem do setor: "; 
//	echo $porc_setor;  echo "<br>"; 
     
	$dias_mais_copia = ceil(-( $prazo_entrega_dias * ( $porc_copia / 100) )) * (-1); 
//	echo "Total de Dias a Somar com Data Emissão: ";   
//	echo $diasmais;  echo "<br>";
	//------------	DIMINUI DATA_EMISSAO_MKTIME E DATA_ENTREGA_MKTIME 

//	echo "<br>";
      
//------------------------	VERIFICAR DIA COM A SOMA DO DIASMAIS	-------------------------

//------------	DIA, MES E ANO SAO IGUAL A DA DATA EMISSAO
	$dia = $dia_rec_pedido;  	$mes = $mes_rec_pedido;  	$ano = $ano_rec_pedido;

	for($i = 0; $i < $dias_mais_copia; $i++) {//for()
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
	if ($val0 == "0") { $dias_mais_copia = $dias_mais_copia - 1; } 
		elseif ($val0 == "1") { $dias_mais_copia = $dias_mais_copia + 1; } 

//	echo "diasmais_calculada_final =".ceil($diasmais);  echo "<br>";
	// CALCULAR DE DIASMAIS PARA DIASMAIS_FINAL

	// DIA, MES E ANO SAO IGUAL A DA DATA EMISSAO
	$dia = $dia_rec_pedido;  	$mes = $mes_rec_pedido;  	$ano = $ano_rec_pedido;

	for($i = 0; $i < $dias_mais_copia; $i++) {//for()
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
	$data_copia = $dia."/".$mes."/".$ano;
	$data_copia_db = $ano."-".$mes."-".$dia;
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
      
//		-------------------------------			data da copia		-------------------------------------------------


//		-------------------------------			data da emissao pedido		-------------------------------------------------

//------------	porcentagem
	
	$porc_emissao_pedido = 5; 
//	echo "A porcentagem do setor: "; 
//	echo $porc_setor;  echo "<br>"; 
     
	$dias_mais_emissao_pedido = ceil(-( $prazo_entrega_dias * ( $porc_emissao_pedido / 100) )) * (-1); 
//	echo "Total de Dias a Somar com Data Emissão: ";   
//	echo $diasmais;  echo "<br>";
	//------------	DIMINUI DATA_EMISSAO_MKTIME E DATA_ENTREGA_MKTIME 

//	echo "<br>";
      
//------------------------	VERIFICAR DIA COM A SOMA DO DIASMAIS	-------------------------

//------------	DIA, MES E ANO SAO IGUAL A DA DATA EMISSAO
	$dia = $dia_rec_pedido;  	$mes = $mes_rec_pedido;  	$ano = $ano_rec_pedido;

	for($i = 0; $i < $dias_mais_emissao_pedido; $i++) {//for()
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
	if ($val0 == "0") { $dias_mais_emissao_pedido = $dias_mais_emissao_pedido - 1; } 
		elseif ($val0 == "1") { $dias_mais_emissao_pedido = $dias_mais_emissao_pedido + 1; } 

//	echo "diasmais_calculada_final =".ceil($diasmais);  echo "<br>";
	// CALCULAR DE DIASMAIS PARA DIASMAIS_FINAL

	// DIA, MES E ANO SAO IGUAL A DA DATA EMISSAO
	$dia = $dia_rec_pedido;  	$mes = $mes_rec_pedido;  	$ano = $ano_rec_pedido;

	for($i = 0; $i < $dias_mais_emissao_pedido; $i++) {//for()
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
	$data_emissao_pedido = $dia."/".$mes."/".$ano;
	$data_emissao_pedido_db = $ano."-".$mes."-".$dia;
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
      
//		-------------------------------			data da emissao pedido		-------------------------------------------------


//		-------------------------------			data da liberacao financeiro		-------------------------------------------------

//------------	porcentagem
	
	$porc_lib_financeiro = 7;
//	echo "A porcentagem do setor: "; 
//	echo $porc_setor;  echo "<br>"; 
     
	$dias_mais_lib_financeiro = ceil(-( $prazo_entrega_dias * ( $porc_lib_financeiro / 100) )) * (-1); 
//	echo "Total de Dias a Somar com Data Emissão: ";   
//	echo $diasmais;  echo "<br>";
	//------------	DIMINUI DATA_EMISSAO_MKTIME E DATA_ENTREGA_MKTIME 

//	echo "<br>";
      
//------------------------	VERIFICAR DIA COM A SOMA DO DIASMAIS	-------------------------

//------------	DIA, MES E ANO SAO IGUAL A DA DATA EMISSAO
	$dia = $dia_rec_pedido;  	$mes = $mes_rec_pedido;  	$ano = $ano_rec_pedido;

	for($i = 0; $i < $dias_mais_lib_financeiro; $i++) {//for()
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
	if ($val0 == "0") { $dias_mais_lib_financeiro = $dias_mais_lib_financeiro - 1; } 
		elseif ($val0 == "1") { $dias_mais_lib_financeiro = $dias_mais_lib_financeiro + 1; } 

//	echo "diasmais_calculada_final =".ceil($diasmais);  echo "<br>";
	// CALCULAR DE DIASMAIS PARA DIASMAIS_FINAL

	// DIA, MES E ANO SAO IGUAL A DA DATA EMISSAO
	$dia = $dia_rec_pedido;  	$mes = $mes_rec_pedido;  	$ano = $ano_rec_pedido;

	for($i = 0; $i < $dias_mais_lib_financeiro; $i++) {//for()
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
	$data_lib_financeiro = $dia."/".$mes."/".$ano;
	$data_lib_financeiro_db = $ano."-".$mes."-".$dia;
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
//		-------------------------------			data da liberacao financeiro		-------------------------------------------------




//		-------------------------------			data da analise critica		-------------------------------------------------

	//------------	porcentagem
	$porc_analise_critica = 9; 
//echo "porcentagem analise_critica = ".$porc_analise_critica;  echo "<br>"; 
	//------------	porcentagem
     
	$dias_mais_analise_critica = ceil(-( $prazo_entrega_dias * ( $porc_analise_critica / 100) )) * (-1); 
//	echo "Total de Dias a Somar com Data Emissão: ";   
//	echo $diasmais;  echo "<br>";
	//------------	DIMINUI DATA_EMISSAO_MKTIME E DATA_ENTREGA_MKTIME 

//	echo "<br>";
      
//------------------------	VERIFICAR DIA COM A SOMA DO DIASMAIS	-------------------------

//------------	DIA, MES E ANO SAO IGUAL A DA DATA EMISSAO
	$dia = $dia_rec_pedido;  	$mes = $mes_rec_pedido;  	$ano = $ano_rec_pedido;

	for($i = 0; $i < $dias_mais_analise_critica; $i++) {//for()
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
	if ($val0 == "0") { $dias_mais_analise_critica = $dias_mais_analise_critica - 1; } 
		elseif ($val0 == "1") { $dias_mais_analise_critica = $dias_mais_analise_critica + 1; } 

//	echo "diasmais_calculada_final =".ceil($diasmais);  echo "<br>";
	// CALCULAR DE DIASMAIS PARA DIASMAIS_FINAL

	// DIA, MES E ANO SAO IGUAL A DA DATA EMISSAO
	$dia = $dia_rec_pedido;  	$mes = $mes_rec_pedido;  	$ano = $ano_rec_pedido;

	for($i = 0; $i < $dias_mais_analise_critica; $i++) {//for()
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
	$data_analise_critica = $dia."/".$mes."/".$ano;
	$data_analise_critica_db = $ano."-".$mes."-".$dia;
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

//		-------------------------------			data da analise critica		-------------------------------------------------

//		monta query em SQL para insercao 

$sql = "INSERT INTO pcp_pedido 
( 
data_emissao, 
nome_cliente, 
oc_obra, 
data_rec_pedido,
prazo_entrega_data,
prazo_entrega_dias,
data_entrega,
data_copia,
data_emissao_pedido,
data_lib_financeiro,
data_analise_critica, 
usuario 
) 
VALUES 
( 
NOW(), 
'".$_POST['nome_cliente']."', 
'".$_POST['oc_obra']."', 
'$data_rec_pedido_db',
'$prazo_entrega_data_db',
'$prazo_entrega_dias',
'$data_entrega_db' ,
'$data_copia_db' ,
'$data_emissao_pedido_db',
'$data_lib_financeiro_db' ,
'$data_analise_critica_db' ,
'".$_POST['usuario']."' 
)";

$sql = mysql_query($sql) or die ("Houve erro na gravação dos dados na tabela PCP PEDIDO.");  
/*
*/
?>

<form action="" method="post" name="pcp">

<table class=sem_borda width="750" align="center">
<td>

<table class=sem_borda width=30% align="center">
<tr>
<td class=titulo height="25" align="center"> Cadastrada com Sucesso ! 
</td>
</tr>
</table>

<BR>

<table class=sem_borda width=100% align="center">
<tr>
<td class=titulo height="25" align="center"> 
Deseja Cadastrar Novo Pedido ?
<input class="botao1" type="button" value="Sim" onClick="Abrir_Cadastro_Pedido();">
<input class="botao1" type="button" value="Não" onClick="Abrir_Cadastro_PCP();">
</td>
</tr>
</table>


</td>
</table>

</form>
</body>
</html>


