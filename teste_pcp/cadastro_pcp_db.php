<? include "valida_sessao.php" ; include "config_pcp.php"; ?>

<html>
<head>
<title> Cadastro PCP </title>
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

//DATA DA EMISSÃO
$b = date('d'); $c = date('n'); $d = date('Y'); 
if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; 
$data_emissao_proj = $d."/".$c."/".$b;

// -----------------------		FUNÇÃO PARA CONFIGURAR OS VALORES
function formataReais($valor_uni, $qt, $operacao)
{   // Antes de tudo , arrancamos os "," e os "." dos dois valores passados a função . Para isso , podemos usar str_replace :
    $valor_uni = str_replace (",", "", $valor_uni);
    $valor_uni = str_replace (".", "", $valor_uni);
    $qt = str_replace (",", "", $qt);
    $qt = str_replace (".", "", $qt);

    // Agora vamos usar um switch para determinar qual o tipo de operação que foi definida :
    switch ($operacao) {
        // Adição :
        case "+": $resultado = $valor_uni + $qt; break;
        // Subtração :
        case "-": $resultado = $valor_uni - $qt; break;
        // Multiplicação :
        case "*": $resultado = $valor_uni * $qt; break;
    } // Fim Switch

    // Calcula o tamanho do resultado com strlen
    $len = strlen ($resultado);

    // Novamente um switch , dessa vez de acordo com o tamanho do resultado da operação ($len) :
    // De acordo com o tamanho de $len , realizamos uma ação para dividir o resultado e colocar
    // as vírgulas e os pontos
    switch ($len) {
        // 2 : 0,99 centavos
        case "2": $retorna = "0,$resultado"; break;

        // 3 : 9,99 reais
        case "3": $d1 = substr("$resultado",0,1); $d2 = substr("$resultado",-2,2); 
		$retorna = "$d1,$d2"; break;

        // 4 : 99,99 reais
        case "4": $d1 = substr("$resultado",0,2); $d2 = substr("$resultado",-2,2);
        $retorna = "$d1,$d2"; break;

        // 5 : 999,99 reais
        case "5": $d1 = substr("$resultado",0,3); $d2 = substr("$resultado",-2,2);
		$retorna = "$d1,$d2"; break;

        // 6 : 9.999,99 reais
        case "6": $d1 = substr("$resultado",1,3); $d2 = substr("$resultado",-2,2); 
		$d3 = substr("$resultado",0,1); $retorna = "$d3.$d1,$d2"; break;

        // 7 : 99.999,99 reais
        case "7": $d1 = substr("$resultado",2,3); $d2 = substr("$resultado",-2,2);
		$d3 = substr("$resultado",0,2); $retorna = "$d3.$d1,$d2"; break;

        // 8 : 999.999,99 reais
        case "8": $d1 = substr("$resultado",3,3); $d2 = substr("$resultado",-2,2); 
		$d3 = substr("$resultado",0,3); $retorna = "$d3.$d1,$d2"; break;
    } // Fim Switch
    // Por fim , retorna o resultado já formatado
    return $retorna;
} // Fim da function

$sub_total_mostrar =  formataReais($valor_uni, $qt, "*"); 
/* echo $sub_total_mostrar; echo "<br>";  */
$sub_total2 = str_replace (".", "", $sub_total_mostrar);  
/* echo $sub_total2; echo "<br>"; */
$sub_total3 = str_replace (",", ".", $sub_total2);  
/* echo $sub_total3; echo "<br>"; */
// -----------------------		FUNÇÃO PARA CONFIGURAR OS VALORES

//----------------------------------------------------------------------------------------------------------

// -----------------------------    DATA EMISSAO	-------------------------------------------
	$data_emissao = $data_emissao_novo;
	$dia_emissao = substr($data_emissao, -10,2); $mes_emissao = substr($data_emissao, -7,2); $ano_emissao = substr($data_emissao, -4);
	//$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 	
	// --------------------	CONVERTER DATA EMISSAO PARA DATA DO BANCO MYSQL - AAAA/MM/DD
	$data_emissao_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	// --------------------	VERIFICAR DIA E MES DA EMISSÃO
    if ($dia_emissao < 0) { $dia_emissao = 30 +($dia_emissao); $mes_emissao = $mes_emissao - 1;
	if ($mes_emissao == 0) { $mes_emissao = 12; $ano_emissao = $ano_emissao - 1; }
    }
// -----------------------------    DATA EMISSAO	-------------------------------------------


// -----------------------------    DATA ENTREGA -------------------------------------------   
	$dia_entrega = substr($data_entrega, -10,2); $mes_entrega = substr($data_entrega, -7,2); $ano_entrega = substr($data_entrega, -4);
	
	// --------------------	CONVERTER DATA ENTREGA PARA DATA DO BANCO MYSQL - AAAA/MM/DD
	$data_entrega_db = ($ano_entrega."/".$mes_entrega."/".$dia_entrega);  
	// --------------------	VERIFICAR DIA E MES DA ENTREGA
	if ($dia_entrega < 0) { $dia_entrega = 30 +($dia_entrega); $mes_entrega = $mes_entrega - 1;
	if ($mes_entrega == 0) { $mes_entrega = 12; $ano_entrega = $ano_entrega - 1; }
    }	  	 	 
// -----------------------------    DATA ENTREGA ------------------------------------------- 	 	 	 
  
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
	
	$porc_setor = 15; 
//	echo "A porcentagem do setor: "; 
//	echo $porc_setor;  echo "<br>"; 
     
	$diasmais = ceil(-( $days * ( $porc_setor / 100) )) * (-1); 
//	echo "Total de Dias a Somar coma Data Emissão: ";   
//	echo $diasmais;  echo "<br>";
	//------------	DIMINUI DATA_EMISSAO_MKTIME E DATA_ENTREGA_MKTIME 

      
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

// --------------------			FAZER CALCULAR SE FOR SABADO OU DOMINGO		---------------

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
	$proj_os_dt_prog_db = $ano."/".$mes."/".$dia;
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


//------------------------------------------------------------------------------------------//

//------------********** SETOR CORTE E LASER  - DT PROG ***********------------------//

// -----------------------------    DATA EMISSAO	-------------------------------------------
	$data_emissao = $data_emissao_novo;
	$dia_emissao = substr($data_emissao, -10,2); $mes_emissao = substr($data_emissao, -7,2); $ano_emissao = substr($data_emissao, -4);
	//$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 	
	// --------------------	CONVERTER DATA EMISSAO PARA DATA DO BANCO MYSQL - AAAA/MM/DD
	$data_emissao_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	// --------------------	VERIFICAR DIA E MES DA EMISSÃO
    if ($dia_emissao < 0) { $dia_emissao = 30 +($dia_emissao); $mes_emissao = $mes_emissao - 1;
	if ($mes_emissao == 0) { $mes_emissao = 12; $ano_emissao = $ano_emissao - 1; }
    }
// -----------------------------    DATA EMISSAO	-------------------------------------------


// -----------------------------    DATA ENTREGA -------------------------------------------   
	$dia_entrega = substr($data_entrega, -10,2); $mes_entrega = substr($data_entrega, -7,2); $ano_entrega = substr($data_entrega, -4);
	
	// --------------------	CONVERTER DATA ENTREGA PARA DATA DO BANCO MYSQL - AAAA/MM/DD
	$data_entrega_db = ($ano_entrega."/".$mes_entrega."/".$dia_entrega);  
	// --------------------	VERIFICAR DIA E MES DA ENTREGA
	if ($dia_entrega < 0) { $dia_entrega = 30 +($dia_entrega); $mes_entrega = $mes_entrega - 1;
	if ($mes_entrega == 0) { $mes_entrega = 12; $ano_entrega = $ano_entrega - 1; }
    }	  	 	 
// -----------------------------    DATA ENTREGA ------------------------------------------- 	 	 	 
  
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
	
	$porc_setor = 30; 
//	echo "A porcentagem do setor: "; 
//	echo $porc_setor;  echo "<br>"; 
     
	$diasmais = ceil(-( $days * ( $porc_setor / 100) )) * (-1); 
//	echo "Total de Dias a Somar coma Data Emissão: ";   
//	echo $diasmais;  echo "<br>";
	//------------	DIMINUI DATA_EMISSAO_MKTIME E DATA_ENTREGA_MKTIME 

      
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

// --------------------			FAZER CALCULAR SE FOR SABADO OU DOMINGO		---------------

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
	$dt_prog_corte_db = $ano."/".$mes."/".$dia;
	$dt_prog_laser_db = $ano."/".$mes."/".$dia;
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

//------------********** SETOR CORTE E LASER  - DT PROG ***********------------------//

//------------------------------------------------------------------------------------------//

//-----********** SETOR BALANCEAMENTO - CALD. 1 E CALD. 2 - USINAGEM POL_MOT/POL_VENT - DT PROG ***********-----//

// -----------------------------    DATA EMISSAO	-------------------------------------------
	$data_emissao = $data_emissao_novo;
	$dia_emissao = substr($data_emissao, -10,2); $mes_emissao = substr($data_emissao, -7,2); $ano_emissao = substr($data_emissao, -4);
	//$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 	
	// --------------------	CONVERTER DATA EMISSAO PARA DATA DO BANCO MYSQL - AAAA/MM/DD
	$data_emissao_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	// --------------------	VERIFICAR DIA E MES DA EMISSÃO
    if ($dia_emissao < 0) { $dia_emissao = 30 +($dia_emissao); $mes_emissao = $mes_emissao - 1;
	if ($mes_emissao == 0) { $mes_emissao = 12; $ano_emissao = $ano_emissao - 1; }
    }
// -----------------------------    DATA EMISSAO	-------------------------------------------


// -----------------------------    DATA ENTREGA -------------------------------------------   
	$dia_entrega = substr($data_entrega, -10,2); $mes_entrega = substr($data_entrega, -7,2); $ano_entrega = substr($data_entrega, -4);
	
	// --------------------	CONVERTER DATA ENTREGA PARA DATA DO BANCO MYSQL - AAAA/MM/DD
	$data_entrega_db = ($ano_entrega."/".$mes_entrega."/".$dia_entrega);  
	// --------------------	VERIFICAR DIA E MES DA ENTREGA
	if ($dia_entrega < 0) { $dia_entrega = 30 +($dia_entrega); $mes_entrega = $mes_entrega - 1;
	if ($mes_entrega == 0) { $mes_entrega = 12; $ano_entrega = $ano_entrega - 1; }
    }	  	 	 
// -----------------------------    DATA ENTREGA ------------------------------------------- 	 	 	 
  
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
	
	$porc_setor = 70; 
//	echo "A porcentagem do setor: "; 
//	echo $porc_setor;  echo "<br>"; 
     
	$diasmais = ceil(-( $days * ( $porc_setor / 100) )) * (-1); 
//	echo "Total de Dias a Somar coma Data Emissão: ";   
//	echo $diasmais;  echo "<br>";
	//------------	DIMINUI DATA_EMISSAO_MKTIME E DATA_ENTREGA_MKTIME 

      
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

// --------------------			FAZER CALCULAR SE FOR SABADO OU DOMINGO		---------------

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
	$dt_prog_balanc_db = $ano."/".$mes."/".$dia;
	$dt_prog_usinagem_pol_mot_db = $ano."/".$mes."/".$dia;
	$dt_prog_usinagem_pol_vent_db = $ano."/".$mes."/".$dia;
	$dt_prog_cald1_db = $ano."/".$mes."/".$dia;
	$dt_prog_cald2_db = $ano."/".$mes."/".$dia;
	$dt_prog_funilaria_db = $ano."/".$mes."/".$dia;
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

//-----********** SETOR BALANCEAMENTO - USINAGEM POL_MOT/POL_VENT - DT PROG ***********-----//

//------------------------------------------------------------------------------------------//

//-----********** SETOR USINAGEM NUC_CUBO - DT PROG ***********-----//

// -----------------------------    DATA EMISSAO	-------------------------------------------
	$data_emissao = $data_emissao_novo;
	$dia_emissao = substr($data_emissao, -10,2); $mes_emissao = substr($data_emissao, -7,2); $ano_emissao = substr($data_emissao, -4);
	//$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 	
	// --------------------	CONVERTER DATA EMISSAO PARA DATA DO BANCO MYSQL - AAAA/MM/DD
	$data_emissao_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	// --------------------	VERIFICAR DIA E MES DA EMISSÃO
    if ($dia_emissao < 0) { $dia_emissao = 30 +($dia_emissao); $mes_emissao = $mes_emissao - 1;
	if ($mes_emissao == 0) { $mes_emissao = 12; $ano_emissao = $ano_emissao - 1; }
    }
// -----------------------------    DATA EMISSAO	-------------------------------------------


// -----------------------------    DATA ENTREGA -------------------------------------------   
	$dia_entrega = substr($data_entrega, -10,2); $mes_entrega = substr($data_entrega, -7,2); $ano_entrega = substr($data_entrega, -4);
	
	// --------------------	CONVERTER DATA ENTREGA PARA DATA DO BANCO MYSQL - AAAA/MM/DD
	$data_entrega_db = ($ano_entrega."/".$mes_entrega."/".$dia_entrega);  
	// --------------------	VERIFICAR DIA E MES DA ENTREGA
	if ($dia_entrega < 0) { $dia_entrega = 30 +($dia_entrega); $mes_entrega = $mes_entrega - 1;
	if ($mes_entrega == 0) { $mes_entrega = 12; $ano_entrega = $ano_entrega - 1; }
    }	  	 	 
// -----------------------------    DATA ENTREGA ------------------------------------------- 	 	 	 
  
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
	
	$porc_setor = 40; 
//	echo "A porcentagem do setor: "; 
//	echo $porc_setor;  echo "<br>"; 
     
	$diasmais = ceil(-( $days * ( $porc_setor / 100) )) * (-1); 
//	echo "Total de Dias a Somar coma Data Emissão: ";   
//	echo $diasmais;  echo "<br>";
	//------------	DIMINUI DATA_EMISSAO_MKTIME E DATA_ENTREGA_MKTIME 

      
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

// --------------------			FAZER CALCULAR SE FOR SABADO OU DOMINGO		---------------

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
	$dt_prog_usinagem_nuc_cubo_db = $ano."/".$mes."/".$dia;
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

//-----********** SETOR USINAGEM NUC_CUBO - DT PROG ***********-----//

//------------------------------------------------------------------------------------------//


//-----********** SETOR ROTOR LL E ROTOR SIR - DT PROG ***********-----//

// -----------------------------    DATA EMISSAO	-------------------------------------------
	$data_emissao = $data_emissao_novo;
	$dia_emissao = substr($data_emissao, -10,2); $mes_emissao = substr($data_emissao, -7,2); $ano_emissao = substr($data_emissao, -4);
	//$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 	
	// --------------------	CONVERTER DATA EMISSAO PARA DATA DO BANCO MYSQL - AAAA/MM/DD
	$data_emissao_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	// --------------------	VERIFICAR DIA E MES DA EMISSÃO
    if ($dia_emissao < 0) { $dia_emissao = 30 +($dia_emissao); $mes_emissao = $mes_emissao - 1;
	if ($mes_emissao == 0) { $mes_emissao = 12; $ano_emissao = $ano_emissao - 1; }
    }
// -----------------------------    DATA EMISSAO	-------------------------------------------


// -----------------------------    DATA ENTREGA -------------------------------------------   
	$dia_entrega = substr($data_entrega, -10,2); $mes_entrega = substr($data_entrega, -7,2); $ano_entrega = substr($data_entrega, -4);
	
	// --------------------	CONVERTER DATA ENTREGA PARA DATA DO BANCO MYSQL - AAAA/MM/DD
	$data_entrega_db = ($ano_entrega."/".$mes_entrega."/".$dia_entrega);  
	// --------------------	VERIFICAR DIA E MES DA ENTREGA
	if ($dia_entrega < 0) { $dia_entrega = 30 +($dia_entrega); $mes_entrega = $mes_entrega - 1;
	if ($mes_entrega == 0) { $mes_entrega = 12; $ano_entrega = $ano_entrega - 1; }
    }	  	 	 
// -----------------------------    DATA ENTREGA ------------------------------------------- 	 	 	 
  
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
	
	$porc_setor = 80; 
//	echo "A porcentagem do setor: "; 
//	echo $porc_setor;  echo "<br>"; 
     
	$diasmais = ceil(-( $days * ( $porc_setor / 100) )) * (-1); 
//	echo "Total de Dias a Somar coma Data Emissão: ";   
//	echo $diasmais;  echo "<br>";
	//------------	DIMINUI DATA_EMISSAO_MKTIME E DATA_ENTREGA_MKTIME 

      
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

// --------------------			FAZER CALCULAR SE FOR SABADO OU DOMINGO		---------------

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
	$dt_prog_rotor_ll_db = $ano."/".$mes."/".$dia;
	$dt_prog_rotor_sir_db = $ano."/".$mes."/".$dia;
	$dt_prog_pintura_db = $ano."/".$mes."/".$dia;
	$dt_prog_preparacao_db = $ano."/".$mes."/".$dia;
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

//-----********** SETOR ROTOR LL E ROTOR SIR - DT PROG ***********-----//
 
 //---------------------------------------------------------------------------//

//-----********** SETOR USINAGEM EIXO/GAXETA - DT PROG ***********-----//

// -----------------------------    DATA EMISSAO	-------------------------------------------
	$data_emissao = $data_emissao_novo;
	$dia_emissao = substr($data_emissao, -10,2); $mes_emissao = substr($data_emissao, -7,2); $ano_emissao = substr($data_emissao, -4);
	//$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 	
	// --------------------	CONVERTER DATA EMISSAO PARA DATA DO BANCO MYSQL - AAAA/MM/DD
	$data_emissao_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	// --------------------	VERIFICAR DIA E MES DA EMISSÃO
    if ($dia_emissao < 0) { $dia_emissao = 30 +($dia_emissao); $mes_emissao = $mes_emissao - 1;
	if ($mes_emissao == 0) { $mes_emissao = 12; $ano_emissao = $ano_emissao - 1; }
    }
// -----------------------------    DATA EMISSAO	-------------------------------------------


// -----------------------------    DATA ENTREGA -------------------------------------------   
	$dia_entrega = substr($data_entrega, -10,2); $mes_entrega = substr($data_entrega, -7,2); $ano_entrega = substr($data_entrega, -4);
	
	// --------------------	CONVERTER DATA ENTREGA PARA DATA DO BANCO MYSQL - AAAA/MM/DD
	$data_entrega_db = ($ano_entrega."/".$mes_entrega."/".$dia_entrega);  
	// --------------------	VERIFICAR DIA E MES DA ENTREGA
	if ($dia_entrega < 0) { $dia_entrega = 30 +($dia_entrega); $mes_entrega = $mes_entrega - 1;
	if ($mes_entrega == 0) { $mes_entrega = 12; $ano_entrega = $ano_entrega - 1; }
    }	  	 	 
// -----------------------------    DATA ENTREGA ------------------------------------------- 	 	 	 
  
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
	
	$porc_setor = 90; 
//	echo "A porcentagem do setor: "; 
//	echo $porc_setor;  echo "<br>"; 
     
	$diasmais = ceil(-( $days * ( $porc_setor / 100) )) * (-1); 
//	echo "Total de Dias a Somar coma Data Emissão: ";   
//	echo $diasmais;  echo "<br>";
	//------------	DIMINUI DATA_EMISSAO_MKTIME E DATA_ENTREGA_MKTIME 

      
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

// --------------------			FAZER CALCULAR SE FOR SABADO OU DOMINGO		---------------

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
	$dt_prog_usinagem_eixo_db = $ano."/".$mes."/".$dia;
	$dt_prog_usinagem_gaxeta_db = $ano."/".$mes."/".$dia;
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

//-----********** SETOR USINAGEM EIXO/GAXETA - DT PROG ***********-----//

//------------------------------------------------------------------------------------------//


// --------------------	PROCESSO DA BAIXA, STATUS DO SETOR PROJETOS
$baixa = "P"; $proj_os_status = "A"; $status_corte = ""; $status_balanc = ""; $status_cald1 = ""; $status_cald2 = ""; $status_funilaria = ""; $status_rotor_ll = ""; $status_rotor_sir = ""; $status_usinagem_eixo = ""; $status_usinagem_nuc_cubo = ""; $status_usinagem_pol_mot = ""; $status_usinagem_pol_vent = ""; $status_usinagem_gaxeta = ""; $status_pintura = ""; $status_montagem = ""; $status_almox = "";

/*	verificar se os documentos do projetos sao selecionados */
if ( $data_book == "DATA_BOOK" ) { $data_book_db = "S"; } else { $data_book_db = "N"; }
if ( $certif_balanc == "CERTIF_BALANC" ) { $certif_balanc_db = "S"; } else { $certif_balanc_db = "N"; }
if ( $certif_materiais == "CERTIF_MATERIAIS" ) { $certif_materiais_db = "S"; } else { $certif_materiais_db = "N"; }
if ( $desenho_certif== "DESENHO_CERTIF" ) { $desenho_certif_db = "S"; } else { $desenho_certif_db = "N"; } 
/*	verificar se os documentos do projetos sao selecionados */

if ($nome_cliente == "SPRINGER") {
	$proj_os_status = "E"; $proj_os_dt_entrada = "$data_emissao_proj"; $proj_os_dt_saida = "$data_emissao_proj";
}

/* monta query em SQL para insercao */
$sql = "INSERT INTO pcp ( 
data_emissao, 
num_os, 
item, 
num_proposta, 
nome_cliente, 
oc_obra, 
mercado, 
representante,
estado, 
data_entrega, 
local_venda, 
fornecimento_motor,
descr_vent, 
modelo, 
tamanho, 
arranjo, 
classe, 
rotacao, 
gab, 
pintura,
construcao,
carc_mot,
qt, 
valor_uni, 
valor_total, 
obs, 
baixa,
proj_os_dt_prog, proj_os_status, proj_os_dt_entrada, proj_os_dt_saida,
tag, pos_motor, pot_motor_cv, pot_motor_polos, tensao_motor, vazao, rotacao_rpm, p_estatica_op, int_lub,
data_book, certif_balanc, certif_materiais, desenho_certif,
usuario,
dt_prog_almox, status_almox,
dt_prog_corte, status_corte,
dt_prog_balanc, status_balanc,
dt_prog_cald1, status_cald1,
dt_prog_cald2, status_cald2,
dt_prog_funilaria, status_funilaria,
dt_prog_pintura, status_pintura,
dt_prog_preparacao, status_preparacao,
dt_prog_rotor_ll, status_rotor_ll,
dt_prog_rotor_sir, status_rotor_sir,
status_montagem,
dt_prog_usinagem_eixo, status_usinagem_eixo,
dt_prog_usinagem_nuc_cubo, status_usinagem_nuc_cubo,
dt_prog_usinagem_pol_mot, status_usinagem_pol_mot,
dt_prog_usinagem_pol_vent, status_usinagem_pol_vent,
dt_prog_usinagem_gaxeta, status_usinagem_gaxeta,
dt_prog_laser,
data_previsao,
data_prog_diaria
) VALUES (
NOW(), 
'".$_POST['num_os']."', 
'".$_POST['item']."', 
'".$_POST['num_proposta']."',
'".$_POST['nome_cliente']."', 
'".$_POST['oc_obra']."', 
'".$_POST['mercado']."', 
'".$_POST['representante']."',
'".$_POST['estado']."', 
'$data_entrega_db', 
'".$_POST['local_venda']."', 
'".$_POST['fornecimento_motor']."',
'".$_POST['descr_vent']."', 
'".$_POST['modelo']."', 
'".$_POST['tamanho']."', 
'".$_POST['arranjo']."',
'".$_POST['classe']."',
'".$_POST['rotacao']."',
'".$_POST['gab']."', 
'".$_POST['pintura']."',
'".$_POST['construcao']."',
'".$_POST['carc_mot']."',
'".$_POST['qt']."', 
'".$_POST['valor_uni']."', 
'$sub_total3', 
'".$_POST['obs']."',
'$baixa',
'$proj_os_dt_prog_db', '$proj_os_status', '$proj_os_dt_entrada', '$proj_os_dt_saida', 
'".$_POST['tag']."', '".$_POST['pos_motor']."', '".$_POST['pot_motor_cv']."', '".$_POST['pot_motor_polos']."', '".$_POST['tensao_motor']."', '".$_POST['vazao']."', '".$_POST['rotacao_rpm']."', '".$_POST['p_estatica_op']."', '".$_POST['int_lub']."',
'$data_book_db', '$certif_balanc_db', '$certif_materiais_db','$desenho_certif_db',
'".$_POST['usuario']."',
'$dt_prog_almox_db', '$status_almox',
'$dt_prog_corte_db', '$status_corte',
'$dt_prog_balanc_db', '$status_balanc',
'$dt_prog_cald1_db', '$status_cald1',
'$dt_prog_cald2_db', '$status_cald2',
'$dt_prog_funilaria_db', '$status_funilaria',
'$dt_prog_pintura_db', '$status_pintura',
'$dt_prog_preparacao_db', '$status_preparacao',
'$dt_prog_rotor_ll_db', '$status_rotor_ll',
'$dt_prog_rotor_sir_db', '$status_rotor_sir',
'$status_montagem',
'$dt_prog_usinagem_eixo_db', '$status_usinagem_eixo',
'$dt_prog_usinagem_nuc_cubo_db', '$status_usinagem_nuc_cubo',
'$dt_prog_usinagem_pol_mot_db', '$status_usinagem_pol_mot',
'$dt_prog_usinagem_pol_vent_db', '$status_usinagem_pol_vent',
'$dt_prog_usinagem_gaxeta_db', '$status_usinagem_gaxeta',
'$dt_prog_laser_db',
'$data_entrega_db',
'$data_entrega_db'
)";

$sql = mysql_query($sql) or die ("Houve erro na gravação dos dados na tabela PCP.");  

/* -----------------------------  FIM GRAVACAO DE DADOS NO BANCO PCP    --------------------------------- */




?>

<form action="" method="post" name="pcp">

<table class=sem_borda width="750" align="center">
<td>

<table class=sem_borda width=30% align="center">
<tr><td class=titulo height="25" align="center"> O.S = <?echo $num_os ."/". $item;?> </td></tr>
<tr><td class=titulo height="25" align="center"> Sub Total = <?echo "R$". $sub_total_mostrar; ?> </td></tr>

<?
$query = "SELECT SUM(valor_total) AS valor_total FROM pcp WHERE num_os='$num_os' order by 'id'";
$sql = mysql_query($query); $valor_total_os = mysql_fetch_array($sql);
?>
<tr>
<td class=titulo height="25" align="center"> Total O.S = <? echo "R$". number_format($valor_total_os['valor_total'], 2, ",", "."); ?> </td></tr>
<tr><td class=titulo height="25" align="center"> Cadastrada com Sucesso ! </td></tr>
</table>

<BR>

<table class=sem_borda width=100% align="center">
<tr>
<td class=titulo height="25" align="center"> Deseja Cadastrar Novo Item na O.S = <?echo $num_os?> ?
<input class="botao1" type="button" value="Sim" onClick="Cadastro_Novo_Item();">
<input class="botao1" type="button" value="Não" onClick="Cadastro_Nova_Os();">
</td>
</tr>
</table>


<?/* DADOS DO CLIENTE*/ ?>
<input class=nedita_left readonly type=hidden name="num_os" value="<?echo $num_os?>"><BR>
<?$item = $item + 1; if(strlen($item) == 1){$item_final = "0".$item;} else {$item_final = $item;};?>
<input class=nedita_left readonly type=hidden name="item" value="<?echo $item_final?>"><BR>
<input class=nedita_left readonly type=hidden name="num_proposta" value="<?echo $num_proposta?>"><BR>
<input class=nedita_left readonly type=hidden name="nome_cliente" value="<?echo $nome_cliente?>"><BR>
<input class=nedita_left readonly type=hidden name="oc_obra" value="<?echo $oc_obra?>"><BR>
<input class=nedita_left readonly type=hidden name="mercado" value="<?echo $mercado?>"><BR>
<input class=nedita_left readonly type=hidden name="representante" value="<?echo $representante?>"><BR>
<input class=nedita_left readonly type=hidden name="estado" value="<?echo $estado ?>"><BR>
<input class=nedita_left readonly type=hidden name="data_entrega" value="<?echo $data_entrega ?>"><BR>
<input class=nedita_left readonly type=hidden name="local_venda" value="<?echo $local_venda ?>"><BR>
<input class=nedita_left readonly type=hidden name="fornecimento_motor" value="<?echo $fornecimento_motor ?>" size="11"><BR> 

<?/* DADOS DO VENTILADOR */ ?>
<input class=nedita_left readonly type=hidden name="descr_vent" value="<?echo $descr_vent?>"><BR>
<input class=nedita_left readonly type=hidden name="modelo" value="<?echo $modelo?>"><BR>
<input class=nedita_left readonly type=hidden name="tamanho" value="<?echo $tamanho?>"><BR>
<input class=nedita_left readonly type=hidden name="arranjo" value="<?echo $arranjo?>"><BR>
<input class=nedita_left readonly type=hidden name="classe" value="<?echo $classe?>"><BR>
<input class=nedita_left readonly type=hidden name="rotacao" value="<?echo $rotacao?>"><BR>
<input class=nedita_left readonly type=hidden name="gab" value="<?echo $gab?>"><BR>
<input class=nedita_left readonly type=hidden name="qt" value="<?echo $qt?>"><BR>
<input class=nedita_left readonly type=hidden name="valor_uni" value="<?echo $valor_uni;?>"><BR>
<input class=nedita_left readonly type=hidden name="pintura" value="<?echo $pintura;?>"><BR>
<input class=nedita_left readonly type=hidden name="construcao" value="<?echo $construcao;?>"><BR>
<input class=nedita_left readonly type=hidden name="obs" value="<?echo $obs;?>"><BR>

<?/* DADOS DO PROJETOS */ ?>
<input class=nedita_left readonly type=hidden name="tag" value="<?echo $tag?>"><BR>
<input class=nedita_left readonly type=hidden name="data_book" value="<?echo $data_book?>"><BR>
<input class=nedita_left readonly type=hidden name="certif_balanc" value="<?echo $certif_balanc?>"><BR>
<input class=nedita_left readonly type=hidden name="certif_materiais" value="<?echo $certif_materiais?>"><BR>
<input class=nedita_left readonly type=hidden name="desenho_certif" value="<?echo $desenho_certif?>"><BR>


</form>
</td>
</table>
</body>
</html>


