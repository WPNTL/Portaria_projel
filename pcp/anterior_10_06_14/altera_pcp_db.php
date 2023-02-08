<? include "valida_sessao.php" ; include"config_pcp.php"; ?>
<html>
<head>
<title> Alterar Dados PCP </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
</head>
<body>
<?
$sql = "SELECT * FROM pcp WHERE id='$id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($dados=mysql_fetch_array($resultado)) {
	
$id = $dados["id"]; 

$data_emissao = $dados["data_emissao"]; 

$num_os = $dados["num_os"]; 
$item = $dados["item"]; 

$num_proposta = $dados["num_proposta"]; 
$nome_cliente = $dados["nome_cliente"]; 
$oc_obra = $dados["oc_obra"]; 
$mercado = $dados["mercado"]; 
$representante = $dados["representante"];
$estado = $dados["estado"]; 
$data_entrega = $dados["data_entrega"]; 
$local_venda = $dados["local_venda"]; 

$fornecimento_motor = $dados["fornecimento_motor"];
$data_motor_recebido = $dados["data_motor_recebido"]; 

$descr_vent = $dados["descr_vent"]; 
$modelo = $dados["modelo"]; 
$tamanho = $dados["tamanho"]; 
$largura_especial = $dados["largura_especial"];
$arranjo = $dados["arranjo"];
$classe = $dados["classe"]; 
$rotacao = $dados["rotacao"]; 
$gab = $dados["gab"]; 
$pintura = $dados["pintura"]; 
$construcao = $dados["construcao"]; 
$carc_mot = $dados["carc_mot"]; 
$qt = $dados["qt"]; 
$valor_uni = $dados["valor_uni"]; 
$valor_total = $dados["valor_total"];

$obs = $dados["obs"]; 

$reprogramacao = $dados["reprogramacao"]; 

$data_prog_diaria = $dados["data_prog_diaria"]; 

/* DATA PREVISAO */
$data_previsao = $dados["data_previsao"];

/* DATA PROG MONTAGEM */
$dt_prog_montagem = $dados["dt_prog_montagem"];

/* NUMERO CONSULTA CLIENTE */
$n_cons_cliente = $dados["n_cons_cliente"];

/* JATEAMENTO / GALV. FOGO */
$ts_jat_g_fogo = $dados["ts_jat_g_fogo"];
$status_jat_g_fogo = $dados["status_jat_g_fogo"];
$dt_status_jat_g_fogo = $dados["dt_status_jat_g_fogo"];

/*		SETOR PROJETOS		*/
$proj_os_dt_prog = $dados["proj_os_dt_prog"]; 
$proj_os_dt_saida = $dados["proj_os_dt_saida"];
$proj_os_status = $dados["proj_os_status"]; 
$pos_motor = $dados["pos_motor"];
$pot_motor_cv = $dados["pot_motor_cv"];
$pot_motor_polos = $dados["pot_motor_polos"];
$tensao_motor = $dados["tensao_motor"];
$vazao = $dados["vazao"];
$rotacao_rpm = $dados["rotacao_rpm"];
$p_estatica_op = $dados["p_estatica_op"];
$int_lub = $dados["int_lub"];
$tag = $dados["tag"];
$data_book = $dados["data_book"];
$certif_balanc = $dados["certif_balanc"];
$certif_materiais = $dados["certif_materiais"];
$desenho_certif = $dados["desenho_certif"];
/*		SETOR PROJETOS		*/

/* MATERIAIS */
$mat1 = $dados["mat1"];
$mat2 = $dados["mat2"];
$mat3 = $dados["mat3"];
$outros = $dados["outros"];
$obs_maxsig = $dados["obs_maxsig"];

/* INSPEÇÃO */
$tipo_insp = $dados["tipo_insp"];
$cliente_insp = $dados["cliente_insp"];
$data_insp = $dados["data_insp"];
$obs_insp = $dados["obs_insp"];
}

/*	---------		ID		------------	*/
$id = $_POST["id"];

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
	
	$porc_setor = 15; 
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



/*	-----	DATA ENTREGA	--------	*/
//echo $data_entrega_novo;
$dia_data_entrega_novo = substr($data_entrega_novo, -10,2); 
$mes_data_entrega_novo = substr($data_entrega_novo, -7,2); 
$ano_data_entrega_novo = substr($data_entrega_novo, -4); 
$data_entrega_novo = ($ano_data_entrega_novo."/".$mes_data_entrega_novo."/".$dia_data_entrega_novo); 


/*	--------	DATA MOTOR RECEBIDO -------	*/
$dia_data_motor_recebido_novo = substr($data_motor_recebido_novo, -10,2); 
$mes_data_motor_recebido_novo = substr($data_motor_recebido_novo, -7,2);
$ano_data_motor_recebido_novo = substr($data_motor_recebido_novo, -4);
if ($dia_data_motor_recebido_novo == "" AND $mes_data_motor_recebido_novo == "" AND $ano_data_motor_recebido_novo == "") 
{$data_motor_recebido_novo = ($ano_data_motor_recebido_novo."".$mes_data_motor_recebido_novo."".$dia_data_motor_recebido_novo); } 
else 
{$data_motor_recebido_novo = ($ano_data_motor_recebido_novo."/".$mes_data_motor_recebido_novo."/".$dia_data_motor_recebido_novo); }

/*	--------	DATA REPROGRAMAÇÃO -------	*/
$dia_reprogramacao_novo = substr($reprogramacao_novo, -10,2); 
$mes_reprogramacao_novo = substr($reprogramacao_novo, -7,2);
$ano_reprogramacao_novo = substr($reprogramacao_novo, -4); 
if ($dia_reprogramacao_novo == "" AND $mes_reprogramacao_novo == "" AND $ano_reprogramacao_novo == "") 
{$reprogramacao_novo = ($ano_reprogramacao_novo."".$mes_reprogramacao_novo."".$dia_reprogramacao_novo); } 
else 
{$reprogramacao_novo = ($ano_reprogramacao_novo."/".$mes_reprogramacao_novo."/".$dia_reprogramacao_novo); }

/*	--------	DATA BAIXA -------	*/
$dia_data_baixa_novo = substr($data_baixa_novo, -10,2); 
$mes_data_baixa_novo = substr($data_baixa_novo, -7,2);
$ano_data_baixa_novo = substr($data_baixa_novo, -4); 
if ($dia_data_baixa_novo == "" AND $mes_data_baixa_novo == "" AND $ano_data_baixa_novo == "") 
{$data_baixa_novo = ($ano_data_baixa_novo."".$mes_data_baixa_novo."".$dia_data_baixa_novo); } 
else 
{$data_baixa_novo = ($ano_data_baixa_novo."/".$mes_data_baixa_novo."/".$dia_data_baixa_novo); }

/*	--------	DATA PROGRAMACAO DIARIA -------	*/
$dia_data_prog_diaria_novo = substr($data_prog_diaria_novo, -10,2); 
$mes_data_prog_diaria_novo = substr($data_prog_diaria_novo, -7,2);
$ano_data_prog_diaria_novo = substr($data_prog_diaria_novo, -4);
if ($dia_data_prog_diaria_novo == "" AND $mes_data_prog_diaria_novo == "" AND $ano_data_prog_diaria_novo == "") 
{$data_prog_diaria_novo = ($ano_data_prog_diaria_novo."".$mes_data_prog_diaria_novo."".$dia_data_prog_diaria_novo); } 
else 
{$data_prog_diaria_novo = ($ano_data_prog_diaria_novo."/".$mes_data_prog_diaria_novo."/".$dia_data_prog_diaria_novo); }


/*	--------	DATA PREVISAO -------	*/
$dia_data_previsao_novo = substr($data_previsao_novo, -10,2); 
$mes_data_previsao_novo = substr($data_previsao_novo, -7,2);
$ano_data_previsao_novo = substr($data_previsao_novo, -4);
if ($dia_data_previsao_novo == "" AND $mes_data_previsao_novo == "" AND $ano_data_previsao_novo == "") 
{$data_previsao_novo = ($ano_data_previsao_novo."".$mes_data_previsao_novo."".$dia_data_previsao_novo); } 
else 
{$data_previsao_novo = ($ano_data_previsao_novo."/".$mes_data_previsao_novo."/".$dia_data_previsao_novo); }

/* JATEAMENTO / GALV. FOGO */
$dia_dt_status_jat_g_fogo = substr($dt_status_jat_g_fogo, -2); 
$mes_dt_status_jat_g_fogo = substr($dt_status_jat_g_fogo, -5,2);
$ano_dt_status_jat_g_fogo = substr($dt_status_jat_g_fogo, -10,4); 
if ($dia_dt_status_jat_g_fogo == "" AND $mes_dt_status_jat_g_fogo == "" AND $ano_dt_status_jat_g_fogo == "") 
{$dt_status_jat_g_fogo = ($dia_dt_status_jat_g_fogo."".$mes_dt_status_jat_g_fogo."".$ano_dt_status_jat_g_fogo);  } 
else {$dt_status_jat_g_fogo = ($dia_dt_status_jat_g_fogo."/".$mes_dt_status_jat_g_fogo."/".$ano_dt_status_jat_g_fogo);  }
/* JATEAMENTO / GALV. FOGO */

/*	--------	DATA PROG MONTAGEM -------	*/
$dia_dt_prog_montagem_novo = substr($dt_prog_montagem_novo, -10,2); 
$mes_dt_prog_montagem_novo = substr($dt_prog_montagem_novo, -7,2);
$ano_dt_prog_montagem_novo = substr($dt_prog_montagem_novo, -4);
if ($dia_dt_prog_montagem_novo == "" AND $mes_dt_prog_montagem_novo == "" AND $ano_dt_prog_montagem_novo == "") 
{$dt_prog_montagem_novo = ($ano_dt_prog_montagem_novo."".$mes_dt_prog_montagem_novo."".$dia_dt_prog_montagem_novo); } 
else 
{$dt_prog_montagem_novo = ($ano_dt_prog_montagem_novo."/".$mes_dt_prog_montagem_novo."/".$dia_dt_prog_montagem_novo); }


/*	--------	FUNCAO FAZER SOMA DE VALORES DO ITEM -------	*/
function formataReais($valor_uni_novo, $qt_novo, $operacao)
{
    $valor_uni_novo = str_replace (",", "", $valor_uni_novo); $valor_uni_novo = str_replace (".", "", $valor_uni_novo);
    $qt_novo = str_replace (",", "", $qt_novo); $qt_novo = str_replace (".", "", $qt_novo);
    // Agora vamos usar um switch para determinar qual o tipo de operação que foi definida :
    switch ($operacao) {
        // Adição :
        case "+": $resultado = $valor_uni_novo + $qt_novo; break;
        // Subtração :
        case "-": $resultado = $valor_uni_novo - $qt_novo; break;
        // Multiplicação :
        case "*": $resultado = $valor_uni_novo * $qt_novo; break;
    } // Fim Switch

    $len = strlen ($resultado);
    switch ($len) {     // 2 : 0,99 centavos
        case "2": $retorna = "0,$resultado";  break;

        // 3 : 9,99 reais
        case "3": $d1 = substr("$resultado",0,1);  $d2 = substr("$resultado",-2,2);  $retorna = "$d1,$d2";  break;

        // 4 : 99,99 reais
        case "4": $d1 = substr("$resultado",0,2);  $d2 = substr("$resultado",-2,2);  $retorna = "$d1,$d2";  break;

        // 5 : 999,99 reais
        case "5": $d1 = substr("$resultado",0,3);  $d2 = substr("$resultado",-2,2);  $retorna = "$d1,$d2";  break;

        // 6 : 9.999,99 reais
        case "6": $d1 = substr("$resultado",1,3);  $d2 = substr("$resultado",-2,2);  $d3 = substr("$resultado",0,1);
            $retorna = "$d3.$d1,$d2"; break;

        // 7 : 99.999,99 reais
        case "7": $d1 = substr("$resultado",2,3);  $d2 = substr("$resultado",-2,2);  $d3 = substr("$resultado",0,2);
            $retorna = "$d3.$d1,$d2"; break;

        // 8 : 999.999,99 reais
        case "8": $d1 = substr("$resultado",3,3);  $d2 = substr("$resultado",-2,2);  $d3 = substr("$resultado",0,3);
            $retorna = "$d3.$d1,$d2"; break;
    } // Fim Switch
    // Por fim , retorna o resultado já formatado
    return $retorna;
} // Fim da function

$sub_total_mostrar =  formataReais($valor_uni_novo, $qt_novo, "*"); 
$sub_total2 = str_replace (".", "", $sub_total_mostrar);  $sub_total3 = str_replace (",", ".", $sub_total2); 

/*	--------	FUNCAO FAZER SOMA DE VALORES DO ITEM -------	*/




/* ----------------------- BUSCAR DADOS DE LIBERAÇÃO ------------------------------------*/
$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {
 
/* ----------------------- LIBERACAO PARA VER O CAMPO E ALTERAR ----------------------------------*/

$lib_alterar = $linha["lib_alterar"]; 

/* SETOR VENDAS */
$lib_vendas = $linha["lib_vendas"]; 
/* SETOR PCP */
$lib_pcp = $linha["lib_pcp"]; 
/* SETOR PCP PRODUCAO */
$lib_pcp_producao = $linha["lib_pcp_producao"]; 
/* IMPRESSAO */
$lib_imprimir_geral = $linha["lib_imprimir_geral"]; 
$lib_imprimir_geral_sp = $linha["lib_imprimir_geral_sp"];
$lib_imprimir_diaria_dia = $linha["lib_imprimir_diaria_dia"]; 

$lib_data_emissao = $linha["lib_data_emissao"]; 

$lib_num_os = $linha["lib_num_os"]; 
$lib_item = $linha["lib_item"]; 
$lib_num_proposta = $linha["lib_num_proposta"]; 
$lib_nome_cliente = $linha["lib_nome_cliente"]; 
$lib_oc_obra = $linha["lib_oc_obra"]; 
$lib_mercado = $linha["lib_mercado"]; 
$lib_representante = $linha["lib_representante"];
$lib_estado = $linha["lib_estado"]; 
$lib_data_entrega = $linha["lib_data_entrega"]; 

$lib_local_venda = $linha["lib_local_venda"]; 

$lib_fornecimento_motor = $linha["lib_fornecimento_motor"];
$lib_data_motor_recebido = $linha["lib_data_motor_recebido"]; 

$lib_descr_vent = $linha["lib_descr_vent"]; 
$lib_modelo = $linha["lib_modelo"]; 
$lib_tamanho = $linha["lib_tamanho"]; 
$lib_largura_especial = $linha["lib_largura_especial"]; 
$lib_arranjo = $linha["lib_arranjo"]; 
$lib_classe = $linha["lib_classe"]; 
$lib_rotacao = $linha["lib_rotacao"]; 
$lib_gab = $linha["lib_gab"]; 
$lib_pintura = $linha["lib_pintura"]; 
$lib_construcao = $linha["lib_construcao"]; 
$lib_carc_mot = $linha["lib_carc_mot"];

$lib_qt = $linha["lib_qt"]; 
$lib_valor_uni = $linha["lib_valor_uni"]; 
$lib_valor_total = $linha["lib_valor_total"]; 
$lib_valor_total_os = $linha["lib_valor_total_os"]; 

$lib_obs = $linha["lib_obs"]; 

$lib_reprogramacao = $linha["lib_reprogramacao"]; 

$lib_baixa = $linha["lib_baixa"]; $lib_baixa_tipo = $linha["lib_baixa_tipo"];
$lib_data_baixa = $linha["lib_data_baixa"]; 

$lib_data_prog_diaria = $linha["lib_data_prog_diaria"]; 

/* DATA PROG MONTAGEM */
$lib_dt_prog_montagem = $linha["lib_dt_prog_montagem"]; 

/* DATA PREVISAO */
$lib_data_previsao = $linha["lib_data_previsao"]; 

/* NUMERO CONSULTA CLIENTE */
$lib_n_cons_cliente = $linha["lib_n_cons_cliente"]; 

/* JATEAMENTO / GALV. FOGO */
$lib_jat_g_fogo = $linha["lib_jat_g_fogo"];
$lib_ts_jat_g_fogo = $linha["lib_ts_jat_g_fogo"];
$lib_status_jat_g_fogo = $linha["lib_status_jat_g_fogo"]; $lib_status_tipo_jat_g_fogo = $linha["lib_status_tipo_jat_g_fogo"];
$lib_dt_status_jat_g_fogo = $linha["lib_dt_status_jat_g_fogo"];

/* SETOR PROJETOS */
$lib_proj = $linha["lib_proj"];  
$lib_dados_proj = $linha["lib_dados_proj"];  
$lib_pos_motor = $linha["lib_pos_motor"];
$lib_pot_motor_cv = $linha["lib_pot_motor_cv"];
$lib_pot_motor_polos = $linha["lib_pot_motor_polos"];
$lib_tensao_motor = $linha["lib_tensao_motor"];
$lib_vazao = $linha["lib_vazao"];
$lib_rotacao_rpm = $linha["lib_rotacao_rpm"];
$lib_p_estatica_op = $linha["lib_p_estatica_op"];
$lib_int_lub = $linha["lib_int_lub"];
$lib_tag = $linha["lib_tag"];
$lib_data_book = $linha["lib_data_book"];
$lib_certif_balanc = $linha["lib_certif_balanc"];
$lib_certif_materiais = $linha["lib_certif_materiais"];
$lib_desenho_certif = $linha["lib_desenho_certif"];
/* SETOR PROJETOS */

/* MATERIAIS */
$lib_maxsig = $linha["lib_maxsig"];
$lib_mat1 = $linha["lib_mat1"];
$lib_mat2 = $linha["lib_mat2"];
$lib_mat3 = $linha["lib_mat3"];
$lib_outros = $linha["lib_outros"];


/* INSPEÇÃO */
$lib_insp = $linha["lib_insp"];
$lib_tipo_insp = $linha["lib_tipo_insp"];
$lib_cliente_insp = $linha["lib_cliente_insp"];
$lib_data_insp = $linha["lib_data_insp"];
$lib_obs_insp = $linha["lib_obs_insp"];
/* INSPEÇÃO */

}
/* ----------------------- LIBERACAO PARA VER O CAMPO E ALTERAR ----------------------------------*/


/*	------------	CONFORME LIBERACAO, GRAVA NO BANCO ------------	*/

/*	NUMERO O.S */
if ($lib_num_os == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), num_os='$num_os_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!"); }

/*	ITEM */
if ($lib_item == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), item='$item_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

/*	NUMERO PROPOSTA */
if ($lib_num_proposta == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), num_proposta='$num_proposta_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

/*	NOME CLIENTE */
if ($lib_nome_cliente == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), nome_cliente='$nome_cliente_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

/*	OC_OBRA */
if ($lib_oc_obra == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), oc_obra='$oc_obra_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

/*	MERCADO */
if ($lib_mercado == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), mercado='$mercado_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

/*	REPRESENTANTE  */
if ($lib_representante == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), representante='$representante_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

/*	ESTADO */
if ($lib_estado == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), estado='$estado_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

/*	DATA ENTREGA */
/* if ($lib_data_entrega == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), data_entrega='$data_entrega_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");} */

if ($lib_data_entrega == "alt"){
	if ($tipo_data_entrega == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), data_entrega='$data_entrega_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - data_entrega!!!");  } 
	if ($tipo_data_entrega == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), data_entrega='$data_entrega_novo' ,usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - data_entrega!!!"); } 
}

/*	LOCAL VENDA */
if ($lib_local_venda == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), local_venda='$local_venda_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

/*	FORNECIMENTO MOTOR */
if ($lib_fornecimento_motor == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), fornecimento_motor='$fornecimento_motor_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

/*	DESCRICAO VENTILADOR */
if ($lib_descr_vent == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), descr_vent='$descr_vent_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

/*	MODELO */
if ($lib_modelo == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), modelo='$modelo_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

/*	TAMANHO */
if ($lib_tamanho == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), tamanho='$tamanho_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

/*	LE*/
if ($lib_largura_especial == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), largura_especial='$largura_especial_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");} 

/*	ARRANJO */
if ($lib_arranjo == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), arranjo='$arranjo_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

/*	CLASSE */
if ($lib_classe == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), classe='$classe_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

/*	POSIÇÃO MOTOR  */
if ($lib_pos_motor == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), pos_motor='$pos_motor_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar !!!");}

/*	ROTAÇÃO */
if ($lib_rotacao == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), rotacao='$rotacao_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

/*	GABINETE */
if ($lib_gab == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), gab='$gab_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}


/*	QT */
if ($lib_qt == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), qt='$qt_novo', usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!"); }

/*	VALOR UNITARIO */
if ($lib_valor_uni == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), valor_uni='$valor_uni_novo', usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");	}

/*	VALOR TOTAL */
if ($lib_valor_total == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), valor_total='$sub_total3', usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!"); }




/*	PINTURA 
if ($lib_pintura == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), pintura='$pintura_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}*/
if ($lib_pintura == "alt"){
	if ($tipo_pintura == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), pintura='$pintura_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - Pintura!!!");  } 
	if ($tipo_pintura == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), pintura='$pintura_novo' ,usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - Pintura!!!"); } 
}


/*	CONSTRUÇAO 
if ($lib_construcao == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), construcao='$construcao_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}
*/
if ($lib_construcao == "alt"){
	if ($tipo_construcao == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), construcao='$construcao_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - Construção!!!");  } 
	if ($tipo_construcao == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), construcao='$construcao_novo' ,usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - Construção!!!"); } 
}


/*	CARC MOT */
if ($lib_carc_mot == "alt"){
	if ($tipo_carc_mot == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), carc_mot='$carc_mot_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 
	if ($tipo_carc_mot == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), carc_mot='$carc_mot_novo' ,usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!"); } 
}



/*	OBS */
if ($lib_obs == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), obs='$obs_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}


/*	REPROGRAMAÇÃO */
if ($lib_reprogramacao == "alt"){
	if ($tipo_reprogramacao == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), reprogramacao='$reprogramacao_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 
	if ($tipo_reprogramacao == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), reprogramacao='$reprogramacao_novo' ,usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!"); } 
}


/*	TIPO DE BAIXA E DATA DA BAIXA	*/
if  ( $baixa_novo == "checked" ) { $baixa_novo = "E"; } 
if  ( $baixa_novo == "" ) { $baixa_novo = "P"; }

if ($lib_baixa == "alt" OR $lib_baixa == "E" OR $lib_baixa == "e") {
	if ($lib_baixa_tipo == "E" OR $lib_baixa_tipo == "e") {
		if ($tipo_baixa == "item" AND $baixa_novo == "P") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), baixa='$baixa_novo', usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 

		if ($tipo_baixa == "item" AND $baixa_novo == "E") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), baixa='$baixa_novo', data_baixa='$data_baixa_novo', usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 
	
		if ($tipo_baixa == "os" AND $baixa == "P" OR $baixa == "E") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), baixa='$baixa_novo', data_baixa='$data_baixa_novo', usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo' AND baixa='$baixa'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!"); }

		elseif ($tipo_baixa == "os" AND $baixa == "S" OR $baixa == "C") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), baixa='$baixa_novo', data_baixa='$data_baixa_novo', usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!"); }
} 
else {
		if ($tipo_baixa == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), baixa='$baixa_novo', data_baixa='$data_baixa_novo', usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 
	
		if ($tipo_baixa == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), baixa='$baixa_novo', data_baixa='$data_baixa_novo', usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!"); }
} 
}


/*	DATA PROGRAMADA DIARIA E REGRA PARA DATA PROG. MONTAGEM */
if ($lib_data_prog_diaria == "alt"){
	
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

if ( $dt_prog_montagem_novo != "") {	
	if ( $gab == "" OR $gab == "-" ) {

		if ($dia_semana1 == "6") {

$proxima_prog_montagem1 = mktime(0, 0, 0, date("$mes_proxima_prog_montagem1"), date("$dia_proxima_prog_montagem1") + 2, date("$ano_proxima_prog_montagem1"));
$proxima_prog_montagem_final = date("Y/m/d",  $proxima_prog_montagem1);
		
		$data_prog_diaria_novo = "$proxima_prog_montagem_final"; $data_previsao_novo = "";
		
		} elseif ($dia_semana1 == "0") {
$proxima_prog_montagem1 = mktime(0, 0, 0, date("$mes_proxima_prog_montagem1"), date("$dia_proxima_prog_montagem1") + 1, date("$ano_proxima_prog_montagem1"));
$proxima_prog_montagem_final = date("Y/m/d",  $proxima_prog_montagem1);
		
		$data_prog_diaria_novo = "$proxima_prog_montagem_final"; $data_previsao_novo = "";
		
		} else {
		
		$data_prog_diaria_novo = "$proxima_prog_montagem1"; $data_previsao_novo = "";
		
		}
		
	} elseif ( $gab == "I" ) {

		if ( $dia_semana2 == "6") {
$proxima_prog_montagem2 = mktime(0, 0, 0, date("$mes_proxima_prog_montagem2"), date("$dia_proxima_prog_montagem2") + 2, date("$ano_proxima_prog_montagem2"));
$proxima_prog_montagem_final2 = date("Y/m/d",  $proxima_prog_montagem2);
		
		$data_prog_diaria_novo = "$proxima_prog_montagem_final2"; $data_previsao_novo = "";
		
		} elseif ($dia_semana2 == "0") {
$proxima_prog_montagem2 = mktime(0, 0, 0, date("$mes_proxima_prog_montagem2"), date("$dia_proxima_prog_montagem2") + 1, date("$ano_proxima_prog_montagem2"));
$proxima_prog_montagem_final2 = date("Y/m/d",  $proxima_prog_montagem2);
		
		$data_prog_diaria_novo = "$proxima_prog_montagem_final2"; $data_previsao_novo = "";
		
		} else {
			
		$data_prog_diaria_novo = "$proxima_prog_montagem2"; $data_previsao_novo = "";
			
		}
	
	}  else {
	
		$data_prog_diaria_novo = "$data_prog_diaria_novo";
}

} else {
	
	$data_prog_diaria_novo = "$data_prog_diaria_novo";
}
	
	if ($tipo_data_prog_diaria == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), data_prog_diaria='$data_prog_diaria_novo', usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 
	if ($tipo_data_prog_diaria == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), data_prog_diaria='$data_prog_diaria_novo', usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!"); } 
}


/*	DATA PREVISAO */
if ($lib_data_previsao == "alt"){
	if ($tipo_data_previsao == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), data_previsao='$data_previsao_novo', usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 
	if ($tipo_data_previsao == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), data_previsao='$data_previsao_novo', usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!"); } 
}

/*	DATA PROG MONTAGEM */
if ($lib_dt_prog_montagem == "alt"){
	if ($tipo_dt_prog_montagem == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), dt_prog_montagem='$dt_prog_montagem_novo', usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 
	if ($tipo_dt_prog_montagem == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), dt_prog_montagem='$dt_prog_montagem_novo', usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!"); } 

}


/*	DATA PROGRAMADA DIARIA */
if ($lib_data_prog_diaria == "alt"){
	if ($tipo_data_prog_diaria == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), data_prog_diaria='$data_prog_diaria_novo', usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 
	if ($tipo_data_prog_diaria == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), data_prog_diaria='$data_prog_diaria_novo', usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!"); } 
}

/*	NUMERO CONSULTA CLIENTE */
if ($lib_n_cons_cliente == "alt"){
	if ($tipo_n_cons_cliente == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), n_cons_cliente='$n_cons_cliente_novo', usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar n_cons_cliente ITEM!!!");  } 
	if ($tipo_n_cons_cliente == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), n_cons_cliente='$n_cons_cliente_novo', usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar n_cons_cliente OS!!!"); } 
}


/*	SETOR PROJETOS */ 
if ($lib_proj == "alt" OR $lib_dados_proj == "alt"){
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), tag='$tag_novo', pos_motor='$pos_motor_novo', pot_motor_cv='$pot_motor_cv_novo', pot_motor_polos='$pot_motor_polos_novo', tensao_motor='$tensao_motor_novo', vazao='$vazao_novo', rotacao_rpm='$rotacao_rpm_novo', p_estatica_op='$p_estatica_op_novo', int_lub='$int_lub_novo', usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar Setor Projetos!!!");   

}

/* MAT 1 */
if ($lib_mat1 == "alt"){
	if ($tipo_mat1 == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), mat1='$mat1_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - mat1 !!!");  } 
	if ($tipo_mat1 == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), mat1='$mat1_novo' ,usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - mat1!!!"); } 
}

/* mat2 */
if ($lib_mat2 == "alt"){
	if ($tipo_mat2 == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), mat2='$mat2_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - mat2!!!");  } 
	if ($tipo_mat2 == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), mat2='$mat2_novo' ,usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - mat2!!!"); }
}

/* mat3 */
if ($lib_mat3 == "alt"){
	if ($tipo_mat3 == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), mat3='$mat3_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - mat3!!");  } 
	if ($tipo_mat3 == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), mat3='$mat3_novo' ,usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - mat3!!!"); }
}

/* OUTROS */
if ($lib_outros == "alt"){
	if ($tipo_outros == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), outros='$outros_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - outros!!!");  } 
	if ($tipo_outros == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), outros='$outros_novo' ,usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - outros!!!"); } 
}

/*	OBS MAXSIG */
if ($lib_obs_maxsig == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), obs_maxsig='$obs_maxsig_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}


/* --- INSPEÇÃO --- */

/* TIPO */
if ($lib_tipo_insp == "alt"){
	if ($tipo_tipo_insp == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), tipo_insp='$tipo_insp_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - TIPO INSP!!!");  } 
	if ($tipo_tipo_insp == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), tipo_insp='$tipo_insp_novo' ,usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - TIPO INSP!!!"); }
}

/* CLIENTE */
if ($lib_cliente_insp == "alt"){
	if ($tipo_cliente_insp == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), cliente_insp='$cliente_insp_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - cliente_insp!!!");  } 
	if ($tipo_cliente_insp == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), cliente_insp='$cliente_insp_novo' ,usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - cliente_insp!!!"); } 
}

/* DATA */
if ($lib_data_insp == "alt"){
	if ($tipo_data_insp == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), data_insp='$data_insp_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - data_insp!!!");  } 
	if ($tipo_data_insp == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), data_insp='$data_insp_novo' ,usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - data_insp!!!"); } 
}

/*	OBS  */
if ($lib_obs_insp == "alt"){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), obs_insp='$obs_insp_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}


/* ----- JATEAMENTO E GALV.FOGO ----- */

/* TIPO DE SERVIÇO */
if ($lib_ts_jat_g_fogo == "alt"){
	if ($tipo_ts_jat_g_fogo == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), ts_jat_g_fogo='$ts_jat_g_fogo_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - ts_jat_g_fogo!!!");  } 
	if ($tipo_ts_jat_g_fogo == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), ts_jat_g_fogo='$ts_jat_g_fogo_novo' ,usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar - ts_jat_g_fogo!!!"); } 
}

/*	TIPO DE JAT E DATA DA JAT	*/
if ($lib_status_jat_g_fogo == "alt" OR $lib_status_jat_g_fogo == "E" OR $lib_status_jat_g_fogo == "e") {
	if ($lib_status_tipo_jat_g_fogo == "E" OR $lib_status_tipo_jat_g_fogo == "e") {
		
		if ($tipo_status_jat_g_fogo == "item" AND $status_jat_g_fogo_novo == "E") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), status_jat_g_fogo='$status_jat_g_fogo_novo', dt_status_jat_g_fogo='$dt_status_jat_g_fogo_novo', usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 

	if ($tipo_status_jat_g_fogo == "os" AND $status_jat_g_fogo_novo == "E") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), status_jat_g_fogo='$status_jat_g_fogo_novo', dt_status_jat_g_fogo='$dt_status_jat_g_fogo_novo', usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 

		if ($tipo_status_jat_g_fogo == "item" AND $status_jat_g_fogo_novo == "A") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), status_jat_g_fogo='$status_jat_g_fogo_novo', dt_status_jat_g_fogo='$dt_status_jat_g_fogo_novo', usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 

		if ($tipo_status_jat_g_fogo == "os" AND $status_jat_g_fogo_novo == "A") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), status_jat_g_fogo='$status_jat_g_fogo_novo', dt_status_jat_g_fogo='$dt_status_jat_g_fogo_novo', usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  }

		if ($tipo_status_jat_g_fogo == "item" AND $status_jat_g_fogo_novo == "EP") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), status_jat_g_fogo='$status_jat_g_fogo_novo', dt_status_jat_g_fogo='$dt_status_jat_g_fogo_novo', usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 

		if ($tipo_status_jat_g_fogo == "os" AND $status_jat_g_fogo_novo == "EP") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), status_jat_g_fogo='$status_jat_g_fogo_novo', dt_status_jat_g_fogo='$dt_status_jat_g_fogo_novo', usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 

		if ($tipo_status_jat_g_fogo == "item" AND $status_jat_g_fogo_novo == "AP") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), status_jat_g_fogo='$status_jat_g_fogo_novo', dt_status_jat_g_fogo='$dt_status_jat_g_fogo_novo', usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 

		if ($tipo_status_jat_g_fogo == "os" AND $status_jat_g_fogo_novo == "AP") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), status_jat_g_fogo='$status_jat_g_fogo_novo', dt_status_jat_g_fogo='$dt_status_jat_g_fogo_novo', usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 
	
		if ($tipo_status_jat_g_fogo == "os" AND $status_jat_g_fogo == "E" OR $status_jat_g_fogo == "A") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), status_jat_g_fogo='$status_jat_g_fogo_novo', dt_status_jat_g_fogo='$dt_status_jat_g_fogo_novo', usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!"); }

		elseif ($tipo_status_jat_g_fogo == "os" AND $status_jat_g_fogo == "-" ) {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), status_jat_g_fogo='$status_jat_g_fogo_novo', dt_status_jat_g_fogo='$dt_status_jat_g_fogo_novo', usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!"); }
} 
else {
		if ($tipo_status_jat_g_fogo == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), status_jat_g_fogo='$status_jat_g_fogo_novo', dt_status_jat_g_fogo='$dt_status_jat_g_fogo_novo', usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 
	
		if ($tipo_status_jat_g_fogo == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), status_jat_g_fogo='$status_jat_g_fogo_novo', dt_status_jat_g_fogo='$dt_status_jat_g_fogo_novo', usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!"); }
} 
}
/*	TIPO DE JAT E DATA DA JAT	*/

/*	------------	CONFORME LIBERACAO, GRAVA NO BANCO ------------	*/



?>

<table class=sem_borda width="750" align="center">
<td>

<table class=sem_borda width=30% align="center">
<tr>
<td class=titulo height="25" align="center"> O.S = <?echo $num_os_novo ."/". $item_novo;?> </td>
</tr>

<?
/*	------------	CONSULTAR VALOR TOTAL DA O.S ------------	*/
if ($lib_valor_uni == "alt" OR $lib_valor_uni == "ver") { 
?>
<tr><td class=titulo height="25" align="center"> Sub Total = <?echo "R$". $sub_total_mostrar; ?> </td></tr>
<? 
$query = "SELECT SUM(valor_total) AS valor_total FROM pcp WHERE num_os='$num_os_novo' order by 'id'";
$sql = mysql_query($query);
$valor_total_os = mysql_fetch_array($sql);
?>
<tr>
<td class=titulo height="25" align="center"> Total O.S = <? echo "R$". number_format($valor_total_os['valor_total'], 2, ",", "."); ?> </td>
</tr>
<? } 
/*	------------	CONSULTAR VALOR TOTAL DA O.S ------------	*/
?>

<tr>
<td class=titulo height="25" align="center"> Alterada com Sucesso ! </td>
</tr>

<tr>
<td class=titulo height="25" align="center">
<form action="javascript:window.close()" method="post">
<input class="botao1" type="submit" value="Fechar Janela">
</td>
</tr>
</table>

</td>
</table>

</body>
</html>

