<? include "valida_sessao.php" ; include"config_pcp.php"; ?>
<html>
<head>
<title> Alterar Dados PCP </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
</head>
<body>

<?

// 		-----------------------------    data_rec_pedido_novo		-------------------------------------------------

//echo "data_rec_pedido_novo = ".$data_rec_pedido_novo; echo "<br>";
	$dia_rec_pedido_novo = substr($data_rec_pedido_novo, -10,2); 
	$mes_rec_pedido_novo = substr($data_rec_pedido_novo, -7,2); 
	$ano_rec_pedido_novo = substr($data_rec_pedido_novo, -4);
	
	// --------------------	converter data_rec_pedido_novo AAAA/MM/DD
	$data_rec_pedido_novo_db = ($ano_rec_pedido_novo."-".$mes_rec_pedido_novo."-".$dia_rec_pedido_novo);  
	// --------------------	converter data_rec_pedido_novo AAAA/MM/DD

	// --------------------	verificar dia e mes da data_rec_pedido_novo
	if ($dia_rec_pedido_novo < 0) { $dia_rec_pedido_novo = 30 +($dia_rec_pedido_novo); $mes_rec_pedido_novo = $mes_rec_pedido_novo - 1;
	if ($mes_rec_pedido_novo == 0) { $mes_rec_pedido_novo = 12; $ano_rec_pedido_novo = $ano_rec_pedido_novo - 1; }
    }
	// --------------------	verificar dia e mes da data_rec_pedido_novo
	
	//---------------------	descobrir numeros interios data_rec_pedido - MM/DD/AAAAA
  $data_rec_pedido_novo_mktime = mktime(0,0,0,$mes_rec_pedido_novo,$dia_rec_pedido_novo,$ano_rec_pedido_novo);
//echo "data_rec_pedido__novo_mktime = ".$data_rec_pedido_novo_mktime; echo "<br>";
    //---------------------	descobrir numeros interios data_rec_pedido - MM/DD/AAAAA
	
// 		-----------------------------    data_rec_pedido_novo		-------------------------------------------------
 	

//		-------------------------------			prazo_entrega_data_novo		-------------------------------------------------
	
//echo "prazo_entrega_data_novo = ".$prazo_entrega_data_novo; echo "<br>";
	$dia_prazo_entrega_data_novo = substr($prazo_entrega_data_novo, -10,2); 
	$mes_prazo_entrega_data_novo = substr($prazo_entrega_data_novo, -7,2); 
	$ano_prazo_entrega_data_novo = substr($prazo_entrega_data_novo, -4);
	
	// --------------------	converter prazo_entrega_data_novo AAAA/MM/DD
	if ( $prazo_entrega_data_novo == "" ) 
	{ 	$prazo_entrega_data_novo_db = ""; }
	else 
	{   $prazo_entrega_data_novo_db = ($ano_prazo_entrega_data_novo."-".$mes_prazo_entrega_data_novo."-".$dia_prazo_entrega_data_novo); }
//echo "prazo_entrega_data_novo_db = ".$prazo_entrega_data_novo_db; echo "<br>";
	// --------------------	converter prazo_entrega_data_novo AAAA/MM/DD

	// --------------------	verificar dia e mes da prazo_entrega_data_novo
	if ($dia_prazo_entrega_data_novo < 0) { $dia_prazo_entrega_data_novo = 30 +($dia_prazo_entrega_data_novo); $mes_prazo_entrega_data_novo = $mes_prazo_entrega_data_novo - 1;
	if ($mes_prazo_entrega_data_novo == 0) { $mes_prazo_entrega_data_novo = 12; $ano_prazo_entrega_data_novo = $ano_prazo_entrega_data_novo - 1; }
    }
	// --------------------	verificar dia e mes da prazo_entrega_data_novo
	
	//---------------------	descobrir numeros interios prazo_entrega_data_novo - MM/DD/AAAAA
  $prazo_entrega_data_novo_mktime = mktime(0,0,0,$mes_prazo_entrega_data_novo,$dia_prazo_entrega_data_novo,$ano_prazo_entrega_data_novo);
//echo "prazo_entrega_data_mktime = ".$prazo_entrega_data_mktime; echo "<br>";
    //---------------------	descobrir numeros interios prazo_entrega_data_novo - MM/DD/AAAAA
    
//		-------------------------------			prazo_entrega_data_novo		-------------------------------------------------	



//		-------------------------------			diminui prazo_entrega_data_mktime menos data_rec_pedido_novo_mktime 		---------------	

  $prazo_entrega_data_dias_novo = ($prazo_entrega_data_novo_mktime - $data_rec_pedido_novo_mktime)/86400;
//echo "prazo_entrega_data : ";  echo ceil($prazo_entrega_data_dias);  echo "<br>";
	
//		-------------------------------			diminui prazo_entrega_data_mktime menos data_rec_pedido_novo_mktime 		---------------	



//		-----------------------			verefica se foi digitado o prazo em data ou dias		-------------------------	

if ( $prazo_entrega_data_novo <> "" ) { $prazo_entrega_dias_novo = ceil($prazo_entrega_data_dias_novo);} 
if ( $prazo_entrega_data_novo == "" ) { $prazo_entrega_dias_novo = ceil($prazo_entrega_dias_novo);} 
//echo "prazo_entrega_dias_novo : ";  echo $prazo_entrega_dias_novo;  echo "<br>";	

//		-----------------------			verefica se foi digitado o prazo em data ou dias		-------------------------	
	
	

//		-------------------------------			data_entrega		-------------------------------------------------
	
	//------------	porcentagem
	$porc_entrega = 100; 
//echo "porcentagem entrega = ".$porc_entrega;  echo "<br>"; 
	//------------	porcentagem
	
	// soma total de dias a somar com data_rec_pedido_novo
	$dias_mais_entrega = ceil(-( $prazo_entrega_dias_novo * ( $porc_entrega / 100) )) * (-1); 
//echo "dias a somar com a data_rec_pedido_novo = ".$dias_mais_entrega;  echo "<br>"; 
	// soma total de dias a somar com data_rec_pedido_novo

	// calcular a data_rec_pedido_novo + diasmais
	$dia = $dia_rec_pedido_novo;  	$mes = $mes_rec_pedido_novo;  	$ano = $ano_rec_pedido_novo;

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
	// calcular a data_rec_pedido_novo + diasmais
  
  
	// confirmar dois digitos no dia e mes
  	if(strlen($dia) == 1){$dia = "0".$dia;};
  	if(strlen($mes) == 1){$mes = "0".$mes;}; 		
	// confirmar dois digitos no dia e mes
	
	  
	// montar saida da data_entrega DD/MM/AAAA
	$data_entrega = $dia."/".$mes."/".$ano;
	$data_entrega_db = $ano."/".$mes."/".$dia;
//echo "data_entrega = ".$data_entrega; echo "<br>";
	// montar saida da data_entrega DD/MM/AAAA
		
	
	// descobrir dia da semana conforme data_entrega
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

		if($val0 == "0")  {$dia_semana_entrega = "Sábado";}
        if($val0 == "1")  {$dia_semana_entrega = "Domingo";}
        if($val0 == "2")  {$dia_semana_entrega = "Segunda-feira";}
		if($val0 == "3")  {$dia_semana_entrega = "Terça-feira";}
        if($val0 == "4")  {$dia_semana_entrega = "Quarta-feira";}
        if($val0 == "5")  {$dia_semana_entrega = "Quinta-feira";}
        if($val0 == "6")  {$dia_semana_entrega = "Sexta-feira";}
        
//echo "dia_semana_entrega = ".$dia_semana_entrega; 	echo "<br>";   echo "<br>"; 
	// descobrir dia da semana conforme data_entrega
	
//		-------------------------------			data_entrega		-------------------------------------------------	
	
	
	
	

//		-------------------------------			data da copia		-------------------------------------------------

	//------------	porcentagem
	$porc_copia = 10; 
//echo "porcentagem copia = ".$porc_copia;  echo "<br>"; 
	//------------	porcentagem


	// soma total de dias a somar com data_rec_pedido_novo
	$dias_mais_copia = ceil(-( $prazo_entrega_dias_novo * ( $porc_copia / 100) )) * (-1); 
//echo "dias a somar com a data_rec_pedido_novo = ".$dias_mais_copia;  echo "<br>";
	// soma total de dias a somar com data_rec_pedido_novo
	
	
		// calcular a data_rec_pedido_novo + dias_mais_copia
	$dia = $dia_rec_pedido_novo;  	$mes = $mes_rec_pedido_novo;  	$ano = $ano_rec_pedido_novo;

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
	// calcular a data_rec_pedido_novo + dias_mais_copia
  
  
	// confirmar dois digitos no dia e mes
  	if(strlen($dia) == 1){$dia = "0".$dia;};
  	if(strlen($mes) == 1){$mes = "0".$mes;}; 		
	// confirmar dois digitos no dia e mes
	
	  
	// montar saida da data_entrega DD/MM/AAAA
	$data_copia = $dia."/".$mes."/".$ano;
	$data_copia_db = $ano."-".$mes."-".$dia;
//echo "data_copia = ".$data_copia; echo "<br>";
	// montar saida da data_entrega DD/MM/AAAA	
	
	
	// descobrir dia da semana conforme data_copia
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

		if($val0 == "0")  {$dia_semana_copia = "Sábado";}
        if($val0 == "1")  {$dia_semana_copia = "Domingo";}
        if($val0 == "2")  {$dia_semana_copia = "Segunda-feira";}
		if($val0 == "3")  {$dia_semana_copia = "Terça-feira";}
        if($val0 == "4")  {$dia_semana_copia = "Quarta-feira";}
        if($val0 == "5")  {$dia_semana_copia = "Quinta-feira";}
        if($val0 == "6")  {$dia_semana_copia = "Sexta-feira";}
        
//echo "dia_semana_copia = ".$dia_semana_copia; 	echo "<br>";   echo "<br>"; 
	// descobrir dia da semana conforme data_copia

      
//		-------------------------------			data da copia		-------------------------------------------------




//		-------------------------------			data da emissao pedido_novo		-------------------------------------------------

	//------------	porcentagem
	$porc_emissao_pedido_novo = 5; 
//echo "porcentagem emissao_pedido_novo = ".$porc_emissao_pedido_novo;  echo "<br>"; 
	//------------	porcentagem


	// soma total de dias a somar com data_rec_pedido_novo
	$dias_mais_emissao_pedido_novo = ceil(-( $prazo_entrega_dias_novo * ( $porc_emissao_pedido_novo / 100) )) * (-1); 
//echo "dias a somar com a data_rec_pedido_novo = ".$dias_mais_emissao_pedido_novo;  echo "<br>";
	// soma total de dias a somar com data_rec_pedido_novo
	
	
		// calcular a data_rec_pedido_novo + dias_mais_emissao_pedido_novo
	$dia = $dia_rec_pedido_novo;  $mes = $mes_rec_pedido_novo;  	$ano = $ano_rec_pedido_novo;

	for($i = 0; $i < $dias_mais_emissao_pedido_novo; $i++) {//for()
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
	// calcular a data_rec_pedido_novo + dias_mais_emissao_pedido_novo
  
  
	// confirmar dois digitos no dia e mes
  	if(strlen($dia) == 1){$dia = "0".$dia;};
  	if(strlen($mes) == 1){$mes = "0".$mes;}; 		
	// confirmar dois digitos no dia e mes
	
	  
	// montar saida da data_entrega DD/MM/AAAA
	$data_emissao_pedido = $dia."/".$mes."/".$ano;
	$data_emissao_pedido_db = $ano."-".$mes."-".$dia;
//echo "data_emissao_pedido_novo = ".$data_emissao_pedido_novo; echo "<br>";
	// montar saida da data_entrega DD/MM/AAAA	
	
	
	// descobrir dia da semana conforme data_emissao_pedido_novo
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

		if($val0 == "0")  {$dia_semana_emissao_pedido_novo = "Sábado";}
        if($val0 == "1")  {$dia_semana_emissao_pedido_novo = "Domingo";}
        if($val0 == "2")  {$dia_semana_emissao_pedido_novo = "Segunda-feira";}
		if($val0 == "3")  {$dia_semana_emissao_pedido_novo = "Terça-feira";}
        if($val0 == "4")  {$dia_semana_emissao_pedido_novo = "Quarta-feira";}
        if($val0 == "5")  {$dia_semana_emissao_pedido_novo = "Quinta-feira";}
        if($val0 == "6")  {$dia_semana_emissao_pedido_novo = "Sexta-feira";}
        
//echo "dia_semana_emissao_pedido_novo = ".$dia_semana_emissao_pedido_novo; 	echo "<br>";   echo "<br>"; 
	// descobrir dia da semana conforme data_emissao_pedido_novo

      
//		-------------------------------			data da emissao pedido_novo		-------------------------------------------------



//		-------------------------------			data da liberacao financeiro		-------------------------------------------------

	//------------	porcentagem
	$porc_lib_financeiro = 7; 
//echo "porcentagem lib_financeiro = ".$porc_lib_financeiro;  echo "<br>"; 
	//------------	porcentagem


	// soma total de dias a somar com data_rec_pedido_novo
	$dias_mais_lib_financeiro = ceil(-( $prazo_entrega_dias_novo * ( $porc_lib_financeiro / 100) )) * (-1); 
//echo "dias a somar com a data_rec_pedido_novo = ".$dias_mais_lib_financeiro;  echo "<br>";
	// soma total de dias a somar com data_rec_pedido_novo
	
	
		// calcular a data_rec_pedido_novo + dias_mais_lib_financeiro
	$dia = $dia_rec_pedido_novo;  	$mes = $mes_rec_pedido_novo;  	$ano = $ano_rec_pedido_novo;

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
	// calcular a data_rec_pedido_novo + dias_mais_lib_financeiro
  
  
	// confirmar dois digitos no dia e mes
  	if(strlen($dia) == 1){$dia = "0".$dia;};
  	if(strlen($mes) == 1){$mes = "0".$mes;}; 		
	// confirmar dois digitos no dia e mes
	
	  
	// montar saida da data_entrega DD/MM/AAAA
	$data_lib_financeiro = $dia."/".$mes."/".$ano;
	$data_lib_financeiro_db = $ano."-".$mes."-".$dia;
//echo "data_lib_financeiro = ".$data_lib_financeiro; echo "<br>";
	// montar saida da data_entrega DD/MM/AAAA	
	
	
	// descobrir dia da semana conforme data_lib_financeiro
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

		if($val0 == "0")  {$dia_semana_lib_financeiro = "Sábado";}
        if($val0 == "1")  {$dia_semana_lib_financeiro = "Domingo";}
        if($val0 == "2")  {$dia_semana_lib_financeiro = "Segunda-feira";}
		if($val0 == "3")  {$dia_semana_lib_financeiro = "Terça-feira";}
        if($val0 == "4")  {$dia_semana_lib_financeiro = "Quarta-feira";}
        if($val0 == "5")  {$dia_semana_lib_financeiro = "Quinta-feira";}
        if($val0 == "6")  {$dia_semana_lib_financeiro = "Sexta-feira";}
        
//echo "dia_semana_lib_financeiro = ".$dia_semana_lib_financeiro; 	echo "<br>";   echo "<br>"; 
	// descobrir dia da semana conforme data_lib_financeiro

      
//		-------------------------------			data da liberacao financeiro		-------------------------------------------------




//		-------------------------------			data da analise critica		-------------------------------------------------

	//------------	porcentagem
	$porc_analise_critica = 9; 
//echo "porcentagem analise_critica = ".$porc_analise_critica;  echo "<br>"; 
	//------------	porcentagem


	// soma total de dias a somar com data_rec_pedido_novo
	$dias_mais_analise_critica = ceil(-( $prazo_entrega_dias_novo * ( $porc_analise_critica / 100) )) * (-1); 
//echo "dias a somar com a data_rec_pedido_novo = ".$dias_mais_analise_critica;  echo "<br>";
	// soma total de dias a somar com data_rec_pedido_novo
	
	
		// calcular a data_rec_pedido_novo + dias_mais_analise_critica
	$dia = $dia_rec_pedido_novo;  	$mes = $mes_rec_pedido_novo;  	$ano = $ano_rec_pedido_novo;

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
	// calcular a data_rec_pedido_novo + dias_mais_analise_critica
  
  
	// confirmar dois digitos no dia e mes
  	if(strlen($dia) == 1){$dia = "0".$dia;};
  	if(strlen($mes) == 1){$mes = "0".$mes;}; 		
	// confirmar dois digitos no dia e mes
	
	  
	// montar saida da data_entrega DD/MM/AAAA
	$data_analise_critica = $dia."/".$mes."/".$ano;
	$data_analise_critica_db = $ano."-".$mes."-".$dia;
//echo "data_analise_critica = ".$data_analise_critica; echo "<br>";
	// montar saida da data_entrega DD/MM/AAAA	
	
	
	// descobrir dia da semana conforme data_analise_critica
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

		if($val0 == "0")  {$dia_semana_analise_critica = "Sábado";}
        if($val0 == "1")  {$dia_semana_analise_critica = "Domingo";}
        if($val0 == "2")  {$dia_semana_analise_critica = "Segunda-feira";}
		if($val0 == "3")  {$dia_semana_analise_critica = "Terça-feira";}
        if($val0 == "4")  {$dia_semana_analise_critica = "Quarta-feira";}
        if($val0 == "5")  {$dia_semana_analise_critica = "Quinta-feira";}
        if($val0 == "6")  {$dia_semana_analise_critica = "Sexta-feira";}
        
// echo "dia_semana_analise_critica = ".$dia_semana_analise_critica; 	echo "<br>";   echo "<br>"; 
// descobrir dia da semana conforme data_analise_critica

      
//		-------------------------------			data da analise critica		-------------------------------------------------

// monta query em SQL para insercao  
/**/
$sql = "UPDATE pcp_pedido SET data_emissao=NOW(), 
nome_cliente='$nome_cliente_novo', 
oc_obra='$oc_obra_novo', 
data_rec_pedido='$data_rec_pedido_novo_db', 

pendencias='$pendencias_novo',

prazo_entrega_data='$prazo_entrega_data_novo_db',
prazo_entrega_dias='$prazo_entrega_dias_novo', 

data_entrega='$data_entrega_db',
data_copia='$data_copia_db', 
data_emissao_pedido='$data_emissao_pedido_db', 
data_lib_financeiro='$data_lib_financeiro_db', 
data_analise_critica='$data_analise_critica_db', 
usuario_alt='$usuario_alt' WHERE id='$id_novo'"; 


$resultado = mysql_query($sql) or die ("Houve erro na gravação dos dados na tabela PCP PEDIDO.");
 
?>

<form action="" method="post" name="pcp">

<table class=sem_borda width="750" align="center">
<td>

<table class=sem_borda width=30% align="center">
<tr>
<td class=titulo height="25" align="center"> Cadastrada com Sucesso ! 
</td>
</tr>

<tr>
<td class=titulo height="25" align="center"> 
<a class="botao1" href="javascript:window.close()" target="_top"> Fecha Janela </a>
</td>
</tr>
</table>


</td>
</table>

</form>
</body>
</html>


