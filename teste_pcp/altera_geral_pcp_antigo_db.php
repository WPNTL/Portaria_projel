<? include "valida_sessao.php" ; include"config_pcp.php"; ?>
<html>
<head>
<title> Alterar Dados PCP </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
<script language="JavaScript" SRC="funcoes/abrir_fechar.js"></script>
</head>
<body>


<form action="" method="post" name="pcp">

<?

/*	------------	CHECK AUTORIZAÇÃO DE ALTERAÇÃO POR CAMPO ------------	*/

$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {
	
$lib_inserir = $linha["lib_inserir"]; 
$lib_excluir = $linha["lib_excluir"];
$lib_consulta = $linha["lib_consulta"];
$lib_consulta_os = $linha["lib_consulta_os"]; 

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

/* IMPRESSAO DATA PREVISAO */
$lib_imprimir_previsao_dia = $linha["lib_imprimir_previsao_dia"]; 

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
$lib_arranjo = $linha["lib_arranjo"]; 
$lib_classe = $linha["lib_classe"]; 
$lib_rotacao = $linha["lib_rotacao"]; 
$lib_gab = $linha["lib_gab"]; 
$lib_pintura = $linha["lib_pintura"]; 
$lib_construcao = $linha["lib_construcao"]; 

$lib_qt = $linha["lib_qt"]; 
$lib_valor_uni = $linha["lib_valor_uni"]; 
$lib_valor_total = $linha["lib_valor_total"]; 
$lib_valor_total_os = $linha["lib_valor_total_os"]; 

$lib_obs = $linha["lib_obs"]; 

$lib_reprogramacao = $linha["lib_reprogramacao"]; 

$lib_baixa = $linha["lib_baixa"]; $lib_baixa_tipo = $linha["lib_baixa_tipo"]; 
$lib_data_baixa = $linha["lib_data_baixa"]; 

$lib_data_prog_diaria = $linha["lib_data_prog_diaria"]; 

/* DATA PREVISAO */
$lib_data_previsao = $linha["lib_data_previsao"];

/* SETOR PROJETOS */
$lib_proj = $linha["lib_proj"];  

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

/* MOTOR - POLIA - CARCAÇA - ROTOR DO MAXSIG */
$lib_motor_maxsig = $linha["lib_motor_maxsig"];
$lib_polia_maxsig = $linha["lib_polia_maxsig"];
/* MOTOR - POLIA - CARCAÇA - ROTOR DO MAXSIG */

$lib_fund_maxsig = $linha["lib_fund_maxsig"];
$lib_outros_maxsig = $linha["lib_outros_maxsig"];


/* SETOR CORTE */
$lib_corte = $linha["lib_corte"];
/* SETOR CORTE */

/* SETOR BALANCEAMENTO */
$lib_balanc = $linha["lib_balanc"];
/* SETOR BALANCEAMENTO */

/* SETOR USINAGEM */
$lib_usinagem = $linha["lib_usinagem"];
$lib_usinagem_eixo = $linha["lib_usinagem_eixo"];
$lib_usinagem_nuc_cubo = $linha["lib_usinagem_nuc_cubo"];
$lib_usinagem_pol_mot = $linha["lib_usinagem_pol_mot"];
$lib_usinagem_pol_vent = $linha["lib_usinagem_pol_vent"];
$lib_usinagem_gaxeta = $linha["lib_usinagem_gaxeta"];
/* SETOR USINAGEM */

/* SETOR CALD. 1 */
$lib_cald1 = $linha["lib_cald1"];
/* SETOR CALD. 1 */

/* SETOR CALD. 2 */
$lib_cald2 = $linha["lib_cald2"];
/* SETOR CALD. 2 */

/* SETOR ROTOR LL */
$lib_rotor_ll = $linha["lib_rotor_ll"];
/* SETOR ROTOR LL */

/* SETOR ROTOR SIR */
$lib_rotor_sir = $linha["lib_rotor_sir"];
/* SETOR ROTOR SIR */

/* SETOR PINTURA */
$lib_pintura_setor = $linha["lib_pintura_setor"];
/* SETOR PINTURA */

/* SETOR MONTAGEM */
$lib_montagem = $linha["lib_montagem"];
/* SETOR MONTAGEM */

/* SETOR ALMOX */
$lib_almox = $linha["lib_almox"];
/* SETOR ALMOX */

/* SETOR GABINETE */
$lib_gabinete = $linha["lib_gabinete"];
/* SETOR GABINETE */

/* SETOR EXPEDICAO */
$lib_expedicao = $linha["lib_expedicao"];
/* SETOR EXPEDICAO */

}

/*	------------	CHECK AUTORIZAÇÃO DE ALTERAÇÃO POR CAMPO ------------	*/



/*-----------	SETOR PROJETOS	-----------*/

/*		DATA PROGRAMADA DA OS		*/
if ($lib_proj == "alt") {

/*		STATUS	e DT STATUS	*/
 for ($i = 1; $i <= $quant_os; $i++) { 

 // -----------------------------    DT. HOJE	----------------------------------
	$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 
	if(strlen($dia_emissao) == 1){$dia_emissao = "0".$$dia_emissao;}; 
	if(strlen($mes_emissao) == 1){$mes_emissao = "0".$mes_emissao;}; 	
 // -----------------------------    DT. HOJE	----------------------------------
 	
 $id_novo = $id[$i] ;	
 $proj_os_dt_entrada_velho[$i] ; // DT. STATUS ENTRADA ANTIGO
 $proj_os_dt_saida_velho[$i] ; // DT. STATUS SAISA ANTIGO
 
 $proj_os_status_velho[$i] ;  // STATUS ANTIGO
 $proj_os_status_novo_db = $proj_os_status_novo[$i] ;  // STATUS NOVO
 
 $data_book_novo_db = $data_book_novo[$i] ;  // data book novo
 $certif_balanc_novo_db = $certif_balanc_novo[$i] ;  // certif_balanc novo
 $certif_materiais_novo_db = $certif_materiais_novo[$i] ;  // certif materiais novo
 $desenho_certif_novo_db = $desenho_certif_novo[$i] ;  // desenho certif novo
 
 if ( $proj_os_status_novo[$i] == "P" AND $proj_os_status_velho[$i] <> $proj_os_status_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS ENTRADA  SERÁ IGUAL DT. HOJE 	
	$proj_os_dt_entrada_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$proj_os_dt_entrada_novo_db = $proj_os_dt_entrada_velho[$i]; 
	$dia_proj_os_dt_entrada_novo_db = substr($proj_os_dt_entrada_novo_db, -10,2); 
    $mes_proj_os_dt_entrada_novo_db = substr($proj_os_dt_entrada_novo_db, -7,2);
    $ano_proj_os_dt_entrada_novo_db = substr($proj_os_dt_entrada_novo_db, -4);
 	if ($dia_proj_os_dt_entrada_novo_db == "" AND $mes_proj_os_dt_entrada_novo_db == "" AND $ano_proj_os_dt_entrada_novo_db == "") 
	{$proj_os_dt_entrada_novo_db = ($ano_proj_os_dt_entrada_novo_db."".$mes_proj_os_dt_entrada_novo_db."".$dia_proj_os_dt_entrada_novo_db); } 
else 
	{$proj_os_dt_entrada_novo_db = ($ano_proj_os_dt_entrada_novo_db."/".$mes_proj_os_dt_entrada_novo_db."/".$dia_proj_os_dt_entrada_novo_db); }
	}
	

 if ( $proj_os_status_novo[$i] == "E" AND $proj_os_status_velho[$i] <> $proj_os_status_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS SAIDA SERÁ IGUAL DT. HOJE 	
	$proj_os_dt_saida_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$proj_os_dt_saida_novo_db = $proj_os_dt_saida_velho[$i]; 
	$dia_proj_os_dt_saida_novo_db = substr($proj_os_dt_saida_novo_db, -10,2); 
    $mes_proj_os_dt_saida_novo_db = substr($proj_os_dt_saida_novo_db, -7,2);
    $ano_proj_os_dt_saida_novo_db = substr($proj_os_dt_saida_novo_db, -4);
 	if ($dia_proj_os_dt_saida_novo_db == "" AND $mes_proj_os_dt_saida_novo_db == "" AND $ano_proj_os_dt_saida_novo_db == "") 
	{$proj_os_dt_saida_novo_db = ($ano_proj_os_dt_saida_novo_db."".$mes_proj_os_dt_saida_novo_db."".$dia_proj_os_dt_saida_novo_db); } 
else 
	{$proj_os_dt_saida_novo_db = ($ano_proj_os_dt_saida_novo_db."/".$mes_proj_os_dt_saida_novo_db."/".$dia_proj_os_dt_saida_novo_db); }
	}
 	 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), proj_os_status='$proj_os_status_novo_db', data_book='$data_book_novo_db', certif_balanc='$certif_balanc_novo_db', certif_materiais='$certif_materiais_novo_db', desenho_certif='$desenho_certif_novo_db',  usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar proj_os_status_novo!!!"); 
 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), proj_os_dt_entrada='$proj_os_dt_entrada_novo_db', data_book='$data_book_novo_db', certif_balanc='$certif_balanc_novo_db', certif_materiais='$certif_materiais_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar proj_os_status_novo!!!"); 
  
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), proj_os_dt_saida='$proj_os_dt_saida_novo_db', data_book='$data_book_novo_db', certif_balanc='$certif_balanc_novo_db', certif_materiais='$certif_materiais_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar proj_os_status_novo!!!"); 
 
 
 }
}
/*-----------	SETOR PROJETOS	-----------*/


/*--------  	SETOR ALMOX		-----------*/

/*		DATA PROGRAMADA DA OS		*/
if ($lib_almox == "alt") {

/*		STATUS	e DT STATUS	*/
 for ($i = 1; $i <= $quant_os; $i++) { 

 // -----------------------------    DT. HOJE	----------------------------------
	$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 
	if(strlen($dia_emissao) == 1){$dia_emissao = "0".$$dia_emissao;}; 
	if(strlen($mes_emissao) == 1){$mes_emissao = "0".$mes_emissao;}; 	
 // -----------------------------    DT. HOJE	----------------------------------
 	
 $id_novo = $id[$i] ;	
 $dt_producao_almox_velho[$i] ; // DT. STATUS ENTRADA ANTIGO
 $dt_exp_almox_velho[$i] ; // DT. STATUS SAIDA ANTIGO
 
 $status_almox_velho[$i] ;  // STATUS ANTIGO
 $status_almox_novo_db = $status_almox_novo[$i] ;  // STATUS NOVO
 
 $dt_previsao_almox_novo_db = $dt_previsao_almox_novo[$i] ; // DT PREVISAO
 
 $res_almox_novo_db = $res_almox_novo[$i] ;  // RESPONSAVEL NOVO
 $obs_almox_novo_db = $obs_almox_novo[$i] ;  // OBS NOVO
 
 if ( $status_almox_novo[$i] == "P" AND $status_almox_velho[$i] <> $status_almox_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS ENTRADA  SERÁ IGUAL DT. HOJE 	
	$dt_producao_almox_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_producao_almox_novo_db = $dt_producao_almox_velho[$i]; 
	$dia_dt_producao_almox_novo_db = substr($dt_producao_almox_novo_db, -10,2); 
    $mes_dt_producao_almox_novo_db = substr($dt_producao_almox_novo_db, -7,2);
    $ano_dt_producao_almox_novo_db = substr($dt_producao_almox_novo_db, -4);
 	if ($dia_dt_producao_almox_novo_db == "" AND $mes_dt_producao_almox_novo_db == "" AND $ano_dt_producao_almox_novo_db == "") 
	{$dt_producao_almox_novo_db = ($ano_dt_producao_almox_novo_db."".$mes_dt_producao_almox_novo_db."".$dia_dt_producao_almox_novo_db); } 
else 
	{$dt_producao_almox_novo_db = ($ano_dt_producao_almox_novo_db."/".$mes_dt_producao_almox_novo_db."/".$dia_dt_producao_almox_novo_db); }
	}
	
 if ( $status_almox_novo[$i] == "E" AND $status_almox_velho[$i] <> $status_almox_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS SAIDA SERÁ IGUAL DT. HOJE 	
	$dt_exp_almox_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_exp_almox_novo_db = $dt_exp_almox_velho[$i]; 
	$dia_dt_exp_almox_novo_db = substr($dt_exp_almox_novo_db, -10,2); 
    $mes_dt_exp_almox_novo_db = substr($dt_exp_almox_novo_db, -7,2);
    $ano_dt_exp_almox_novo_db = substr($dt_exp_almox_novo_db, -4);
 	if ($dia_dt_exp_almox_novo_db == "" AND $mes_dt_exp_almox_novo_db == "" AND $ano_dt_exp_almox_novo_db == "") 
	{$dt_exp_almox_novo_db = ($ano_dt_exp_almox_novo_db."".$mes_dt_exp_almox_novo_db."".$dia_dt_exp_almox_novo_db); } 
else 
	{$dt_exp_almox_novo_db = ($ano_dt_exp_almox_novo_db."/".$mes_dt_exp_almox_novo_db."/".$dia_dt_exp_almox_novo_db); }
	}
 	 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), status_almox='$status_almox_novo_db', res_almox='$res_almox_novo_db', obs_almox='$obs_almox_novo_db', dt_previsao_almox='$dt_previsao_almox_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar status_almox_novo OS!!!");  
 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_producao_almox='$dt_producao_almox_novo_db', res_almox='$res_almox_novo_db', obs_almox='$obs_almox_novo_db', dt_previsao_almox='$dt_previsao_almox_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_producao_almox_novo!!!"); 
  
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_exp_almox='$dt_exp_almox_novo_db', res_almox='$res_almox_novo_db', obs_almox='$obs_almox_novo_db', dt_previsao_almox='$dt_previsao_almox_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_exp_almox_novo!!!");
 
 } } 
  
/*-----------		SETOR ALMOX		-----------*/



/*--------  SETOR CORTE	-----------*/

/*		DATA PROGRAMADA DA OS		*/
if ($lib_corte == "alt") {

/*		STATUS	e DT STATUS	*/
 for ($i = 1; $i <= $quant_os; $i++) { 

 // -----------------------------    DT. HOJE	----------------------------------
	$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 
	if(strlen($dia_emissao) == 1){$dia_emissao = "0".$$dia_emissao;}; 
	if(strlen($mes_emissao) == 1){$mes_emissao = "0".$mes_emissao;}; 	
 // -----------------------------    DT. HOJE	----------------------------------
 	
 $id_novo = $id[$i] ;	
 $dt_producao_corte_velho[$i] ; // DT. STATUS ENTRADA ANTIGO
 $dt_exp_corte_velho[$i] ; // DT. STATUS SAIDA ANTIGO
 
 $status_corte_velho[$i] ;  // STATUS ANTIGO
 $status_corte_novo_db = $status_corte_novo[$i] ;  // STATUS NOVO
 
 $dt_previsao_corte_novo_db = $dt_previsao_corte_novo[$i] ; // DT PREVISAO
 
 $res_corte_novo_db = $res_corte_novo[$i] ;  // RESPONSAVEL NOVO
 $obs_corte_novo_db = $obs_corte_novo[$i] ;  // OBS NOVO
 
 if ( $status_corte_novo[$i] == "P" AND $status_corte_velho[$i] <> $status_corte_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS ENTRADA  SERÁ IGUAL DT. HOJE 	
	$dt_producao_corte_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_producao_corte_novo_db = $dt_producao_corte_velho[$i]; 
	$dia_dt_producao_corte_novo_db = substr($dt_producao_corte_novo_db, -10,2); 
    $mes_dt_producao_corte_novo_db = substr($dt_producao_corte_novo_db, -7,2);
    $ano_dt_producao_corte_novo_db = substr($dt_producao_corte_novo_db, -4);
 	if ($dia_dt_producao_corte_novo_db == "" AND $mes_dt_producao_corte_novo_db == "" AND $ano_dt_producao_corte_novo_db == "") 
	{$dt_producao_corte_novo_db = ($ano_dt_producao_corte_novo_db."".$mes_dt_producao_corte_novo_db."".$dia_dt_producao_corte_novo_db); } 
else 
	{$dt_producao_corte_novo_db = ($ano_dt_producao_corte_novo_db."/".$mes_dt_producao_corte_novo_db."/".$dia_dt_producao_corte_novo_db); }
	}
	
 if ( $status_corte_novo[$i] == "E" AND $status_corte_velho[$i] <> $status_corte_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS SAIDA SERÁ IGUAL DT. HOJE 	
	$dt_exp_corte_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_exp_corte_novo_db = $dt_exp_corte_velho[$i]; 
	$dia_dt_exp_corte_novo_db = substr($dt_exp_corte_novo_db, -10,2); 
    $mes_dt_exp_corte_novo_db = substr($dt_exp_corte_novo_db, -7,2);
    $ano_dt_exp_corte_novo_db = substr($dt_exp_corte_novo_db, -4);
 	if ($dia_dt_exp_corte_novo_db == "" AND $mes_dt_exp_corte_novo_db == "" AND $ano_dt_exp_corte_novo_db == "") 
	{$dt_exp_corte_novo_db = ($ano_dt_exp_corte_novo_db."".$mes_dt_exp_corte_novo_db."".$dia_dt_exp_corte_novo_db); } 
else 
	{$dt_exp_corte_novo_db = ($ano_dt_exp_corte_novo_db."/".$mes_dt_exp_corte_novo_db."/".$dia_dt_exp_corte_novo_db); }
	}
 	 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), status_corte='$status_corte_novo_db', res_corte='$res_corte_novo_db', obs_corte='$obs_corte_novo_db', dt_previsao_corte='$dt_previsao_corte_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar status_corte_novo OS!!!");  
 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_producao_corte='$dt_producao_corte_novo_db', res_corte='$res_corte_novo_db', obs_corte='$obs_corte_novo_db', dt_previsao_corte='$dt_previsao_corte_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_producao_corte_novo!!!"); 
  
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_exp_corte='$dt_exp_corte_novo_db', res_corte='$res_corte_novo_db', obs_corte='$obs_corte_novo_db', dt_previsao_corte='$dt_previsao_corte_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_exp_novo!!!");
 
 } } 
  
/*-----------	SETOR CORTE	-----------*/


/*--------  SETOR BALANCEAMENTO	-----------*/

/*		DATA PROGRAMADA DA OS		*/
if ($lib_balanc == "alt") {

/*		STATUS	e DT STATUS	*/
 for ($i = 1; $i <= $quant_os; $i++) { 

 // -----------------------------    DT. HOJE	----------------------------------
	$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 
	if(strlen($dia_emissao) == 1){$dia_emissao = "0".$$dia_emissao;}; 
	if(strlen($mes_emissao) == 1){$mes_emissao = "0".$mes_emissao;}; 	
 // -----------------------------    DT. HOJE	----------------------------------
 	
 $id_novo = $id[$i] ;	
 $dt_producao_balanc_velho[$i] ; // DT. STATUS ENTRADA ANTIGO
 $dt_exp_balanc_velho[$i] ; // DT. STATUS SAIDA ANTIGO
 
 $status_balanc_velho[$i] ;  // STATUS ANTIGO
 $status_balanc_novo_db = $status_balanc_novo[$i] ;  // STATUS NOVO
 
 $dt_previsao_balanc_novo_db = $dt_previsao_balanc_novo[$i] ; // DT PREVISAO
 
 $res_balanc_novo_db = $res_balanc_novo[$i] ;  // RESPONSAVEL NOVO
 $obs_balanc_novo_db = $obs_balanc_novo[$i] ;  // OBS NOVO
 
 $plano1_balanc_novo_db = $plano1_balanc_novo[$i] ; // PLANO 1 NOVO
 $plano2_balanc_novo_db = $plano2_balanc_novo[$i] ; // PLANO 1 NOVO
 $residual_balanc_novo_db = $residual_balanc_novo[$i] ; // RESIDUAL NOVO
 
 if ( $status_balanc_novo[$i] == "P" AND $status_balanc_velho[$i] <> $status_balanc_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS ENTRADA  SERÁ IGUAL DT. HOJE 	
	$dt_producao_balanc_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_producao_balanc_novo_db = $dt_producao_balanc_velho[$i]; 
	$dia_dt_producao_balanc_novo_db = substr($dt_producao_balanc_novo_db, -10,2); 
    $mes_dt_producao_balanc_novo_db = substr($dt_producao_balanc_novo_db, -7,2);
    $ano_dt_producao_balanc_novo_db = substr($dt_producao_balanc_novo_db, -4);
 	if ($dia_dt_producao_balanc_novo_db == "" AND $mes_dt_producao_balanc_novo_db == "" AND $ano_dt_producao_balanc_novo_db == "") 
	{$dt_producao_balanc_novo_db = ($ano_dt_producao_balanc_novo_db."".$mes_dt_producao_balanc_novo_db."".$dia_dt_producao_balanc_novo_db); } 
else 
	{$dt_producao_balanc_novo_db = ($ano_dt_producao_balanc_novo_db."/".$mes_dt_producao_balanc_novo_db."/".$dia_dt_producao_balanc_novo_db); }
	}
	
 if ( $status_balanc_novo[$i] == "E" AND $status_balanc_velho[$i] <> $status_balanc_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS SAIDA SERÁ IGUAL DT. HOJE 	
	$dt_exp_balanc_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_exp_balanc_novo_db = $dt_exp_balanc_velho[$i]; 
	$dia_dt_exp_balanc_novo_db = substr($dt_exp_balanc_novo_db, -10,2); 
    $mes_dt_exp_balanc_novo_db = substr($dt_exp_balanc_novo_db, -7,2);
    $ano_dt_exp_balanc_novo_db = substr($dt_exp_balanc_novo_db, -4);
 	if ($dia_dt_exp_balanc_novo_db == "" AND $mes_dt_exp_balanc_novo_db == "" AND $ano_dt_exp_balanc_novo_db == "") 
	{$dt_exp_balanc_novo_db = ($ano_dt_exp_balanc_novo_db."".$mes_dt_exp_balanc_novo_db."".$dia_dt_exp_balanc_novo_db); } 
else 
	{$dt_exp_balanc_novo_db = ($ano_dt_exp_balanc_novo_db."/".$mes_dt_exp_balanc_novo_db."/".$dia_dt_exp_balanc_novo_db); }
	}
 
	 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), status_balanc='$status_balanc_novo_db', res_balanc='$res_balanc_novo_db', obs_balanc='$obs_balanc_novo_db', plano1_balanc='$plano1_balanc_novo_db', plano2_balanc='$plano2_balanc_novo_db', residual_balanc='$residual_balanc_novo_db', dt_previsao_balanc='$dt_previsao_balanc_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar status_balanc_novo OS!!!");  
 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_producao_balanc='$dt_producao_balanc_novo_db', res_balanc='$res_balanc_novo_db', obs_balanc='$obs_balanc_novo_db',  plano1_balanc='$plano1_balanc_novo_db', plano2_balanc='$plano2_balanc_novo_db', residual_balanc='$residual_balanc_novo_db', dt_previsao_balanc='$dt_previsao_balanc_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_producao_corte_novo!!!"); 
  
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_exp_balanc='$dt_exp_balanc_novo_db', res_balanc='$res_balanc_novo_db', obs_balanc='$obs_balanc_novo_db',  plano1_balanc='$plano1_balanc_novo_db', plano2_balanc='$plano2_balanc_novo_db', residual_balanc='$residual_balanc_novo_db', dt_previsao_balanc='$dt_previsao_balanc_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_exp_balanc_novo!!!");
 
 } } 
  
/*-----------	SETOR BALANCEAMENTO	-----------*/


/*--------  SETOR CALDERARIA 1	-----------*/

/*		DATA PROGRAMADA DA OS		*/
if ($lib_cald1 == "alt") {

/*		STATUS	e DT STATUS	*/
 for ($i = 1; $i <= $quant_os; $i++) { 

 // -----------------------------    DT. HOJE	----------------------------------
	$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 
	if(strlen($dia_emissao) == 1){$dia_emissao = "0".$$dia_emissao;}; 
	if(strlen($mes_emissao) == 1){$mes_emissao = "0".$mes_emissao;}; 	
 // -----------------------------    DT. HOJE	----------------------------------
 	
 $id_novo = $id[$i] ;	
 $dt_producao_cald1_velho[$i] ; // DT. STATUS ENTRADA ANTIGO
 $dt_exp_cald1_velho[$i] ; // DT. STATUS SAIDA ANTIGO
 
 $status_cald1_velho[$i] ;  // STATUS ANTIGO
 $status_cald1_novo_db = $status_cald1_novo[$i] ;  // STATUS NOVO
 
 $dt_previsao_cald1_novo_db = $dt_previsao_cald1_novo[$i] ; // DT PREVISAO
 
 $res_cald1_novo_db = $res_cald1_novo[$i] ;  // RESPONSAVEL NOVO
 $obs_cald1_novo_db = $obs_cald1_novo[$i] ;  // OBS NOVO
 
 if ( $status_cald1_novo[$i] == "P" AND $status_cald1_velho[$i] <> $status_cald1_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS ENTRADA  SERÁ IGUAL DT. HOJE 	
	$dt_producao_cald1_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_producao_cald1_novo_db = $dt_producao_cald1_velho[$i]; 
	$dia_dt_producao_cald1_novo_db = substr($dt_producao_cald1_novo_db, -10,2); 
    $mes_dt_producao_cald1_novo_db = substr($dt_producao_cald1_novo_db, -7,2);
    $ano_dt_producao_cald1_novo_db = substr($dt_producao_cald1_novo_db, -4);
 	if ($dia_dt_producao_cald1_novo_db == "" AND $mes_dt_producao_cald1_novo_db == "" AND $ano_dt_producao_cald1_novo_db == "") 
	{$dt_producao_cald1_novo_db = ($ano_dt_producao_cald1_novo_db."".$mes_dt_producao_cald1_novo_db."".$dia_dt_producao_cald1_novo_db); } 
else 
	{$dt_producao_cald1_novo_db = ($ano_dt_producao_cald1_novo_db."/".$mes_dt_producao_cald1_novo_db."/".$dia_dt_producao_cald1_novo_db); }
	}
	
 if ( $status_cald1_novo[$i] == "E" AND $status_cald1_velho[$i] <> $status_cald1_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS SAIDA SERÁ IGUAL DT. HOJE 	
	$dt_exp_cald1_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_exp_cald1_novo_db = $dt_exp_cald1_velho[$i]; 
	$dia_dt_exp_cald1_novo_db = substr($dt_exp_cald1_novo_db, -10,2); 
    $mes_dt_exp_cald1_novo_db = substr($dt_exp_cald1_novo_db, -7,2);
    $ano_dt_exp_cald1_novo_db = substr($dt_exp_cald1_novo_db, -4);
 	if ($dia_dt_exp_cald1_novo_db == "" AND $mes_dt_exp_cald1_novo_db == "" AND $ano_dt_exp_cald1_novo_db == "") 
	{$dt_exp_cald1_novo_db = ($ano_dt_exp_cald1_novo_db."".$mes_dt_exp_cald1_novo_db."".$dia_dt_exp_cald1_novo_db); } 
else 
	{$dt_exp_cald1_novo_db = ($ano_dt_exp_cald1_novo_db."/".$mes_dt_exp_cald1_novo_db."/".$dia_dt_exp_cald1_novo_db); }
	}
 
	 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), status_cald1='$status_cald1_novo_db', res_cald1='$res_cald1_novo_db', obs_cald1='$obs_cald1_novo_db', dt_previsao_cald1='$dt_previsao_cald1_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar status_cald1_novo OS!!!");  
 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_producao_cald1='$dt_producao_cald1_novo_db', res_cald1='$res_cald1_novo_db', obs_cald1='$obs_cald1_novo_db',  dt_previsao_cald1='$dt_previsao_cald1_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_producao_cald1_novo!!!"); 
  
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_exp_cald1='$dt_exp_cald1_novo_db', res_cald1='$res_cald1_novo_db', obs_cald1='$obs_cald1_novo_db', dt_previsao_cald1='$dt_previsao_cald1_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_exp_cald1_novo!!!");
 
 } } 
  
/*-----------	SETOR CALDERARIA 1	-----------*/

/*--------  SETOR CALDERARIA 2	-----------*/

/*		DATA PROGRAMADA DA OS		*/
if ($lib_cald2 == "alt") {

/*		STATUS	e DT STATUS	*/
 for ($i = 1; $i <= $quant_os; $i++) { 

 // -----------------------------    DT. HOJE	----------------------------------
	$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 
	if(strlen($dia_emissao) == 1){$dia_emissao = "0".$$dia_emissao;}; 
	if(strlen($mes_emissao) == 1){$mes_emissao = "0".$mes_emissao;}; 	
 // -----------------------------    DT. HOJE	----------------------------------
 	
 $id_novo = $id[$i] ;	
 $dt_producao_cald2_velho[$i] ; // DT. STATUS ENTRADA ANTIGO
 $dt_exp_cald2_velho[$i] ; // DT. STATUS SAIDA ANTIGO
 
 $status_cald2_velho[$i] ;  // STATUS ANTIGO
 $status_cald2_novo_db = $status_cald2_novo[$i] ;  // STATUS NOVO
 
 $dt_previsao_cald2_novo_db = $dt_previsao_cald2_novo[$i] ; // DT PREVISAO
 
 $res_cald2_novo_db = $res_cald2_novo[$i] ;  // RESPONSAVEL NOVO
 $obs_cald2_novo_db = $obs_cald2_novo[$i] ;  // OBS NOVO
 
 if ( $status_cald2_novo[$i] == "P" AND $status_cald2_velho[$i] <> $status_cald2_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS ENTRADA  SERÁ IGUAL DT. HOJE 	
	$dt_producao_cald2_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_producao_cald2_novo_db = $dt_producao_cald2_velho[$i]; 
	$dia_dt_producao_cald2_novo_db = substr($dt_producao_cald2_novo_db, -10,2); 
    $mes_dt_producao_cald2_novo_db = substr($dt_producao_cald2_novo_db, -7,2);
    $ano_dt_producao_cald2_novo_db = substr($dt_producao_cald2_novo_db, -4);
 	if ($dia_dt_producao_cald2_novo_db == "" AND $mes_dt_producao_cald2_novo_db == "" AND $ano_dt_producao_cald2_novo_db == "") 
	{$dt_producao_cald2_novo_db = ($ano_dt_producao_cald2_novo_db."".$mes_dt_producao_cald2_novo_db."".$dia_dt_producao_cald2_novo_db); } 
else 
	{$dt_producao_cald2_novo_db = ($ano_dt_producao_cald2_novo_db."/".$mes_dt_producao_cald2_novo_db."/".$dia_dt_producao_cald2_novo_db); }
	}
	
 if ( $status_cald2_novo[$i] == "E" AND $status_cald2_velho[$i] <> $status_cald2_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS SAIDA SERÁ IGUAL DT. HOJE 	
	$dt_exp_cald2_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_exp_cald2_novo_db = $dt_exp_cald2_velho[$i]; 
	$dia_dt_exp_cald2_novo_db = substr($dt_exp_cald2_novo_db, -10,2); 
    $mes_dt_exp_cald2_novo_db = substr($dt_exp_cald2_novo_db, -7,2);
    $ano_dt_exp_cald2_novo_db = substr($dt_exp_cald2_novo_db, -4);
 	if ($dia_dt_exp_cald2_novo_db == "" AND $mes_dt_exp_cald2_novo_db == "" AND $ano_dt_exp_cald2_novo_db == "") 
	{$dt_exp_cald2_novo_db = ($ano_dt_exp_cald2_novo_db."".$mes_dt_exp_cald2_novo_db."".$dia_dt_exp_cald2_novo_db); } 
else 
	{$dt_exp_cald2_novo_db = ($ano_dt_exp_cald2_novo_db."/".$mes_dt_exp_cald2_novo_db."/".$dia_dt_exp_cald2_novo_db); }
	}
 
	 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), status_cald2='$status_cald2_novo_db', res_cald2='$res_cald2_novo_db', obs_cald2='$obs_cald2_novo_db', dt_previsao_cald2='$dt_previsao_cald2_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar status_cald1_novo OS!!!");  
 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_producao_cald2='$dt_producao_cald2_novo_db', res_cald2='$res_cald2_novo_db', obs_cald2='$obs_cald2_novo_db', dt_previsao_cald2='$dt_previsao_cald2_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_producao_cald1_novo!!!"); 
  
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_exp_cald2='$dt_exp_cald2_novo_db', res_cald2='$res_cald2_novo_db', obs_cald2='$obs_cald2_novo_db', dt_previsao_cald2='$dt_previsao_cald2_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_exp_cald1_novo!!!");
 
 } } 
  
/*-----------	SETOR CALDERARIA 2	-----------*/


/*--------  SETOR PINTURA	-----------*/

/*		DATA PROGRAMADA DA OS		*/
if ($lib_pintura_setor == "alt") {

/*		STATUS	e DT STATUS	*/
 for ($i = 1; $i <= $quant_os; $i++) { 

 // -----------------------------    DT. HOJE	----------------------------------
	$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 
	if(strlen($dia_emissao) == 1){$dia_emissao = "0".$$dia_emissao;}; 
	if(strlen($mes_emissao) == 1){$mes_emissao = "0".$mes_emissao;}; 	
 // -----------------------------    DT. HOJE	----------------------------------
 	
 $id_novo = $id[$i] ;	
 $dt_producao_pintura_velho[$i] ; // DT. STATUS ENTRADA ANTIGO
 $dt_exp_pintura_velho[$i] ; // DT. STATUS SAIDA ANTIGO
 
 $status_pintura_velho[$i] ;  // STATUS ANTIGO
 $status_pintura_novo_db = $status_pintura_novo[$i] ;  // STATUS NOVO
 
 $dt_previsao_pintura_novo_db = $dt_previsao_pintura_novo[$i] ; // DT PREVISAO
 
 $res_pintura_novo_db = $res_pintura_novo[$i] ;  // RESPONSAVEL NOVO
 $obs_pintura_novo_db = $obs_pintura_novo[$i] ;  // OBS NOVO
 
 if ( $status_pintura_novo[$i] == "P" AND $status_pintura_velho[$i] <> $status_pintura_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS ENTRADA  SERÁ IGUAL DT. HOJE 	
	$dt_producao_pintura_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_producao_pintura_novo_db = $dt_producao_pintura_velho[$i]; 
	$dia_dt_producao_pintura_novo_db = substr($dt_producao_pintura_novo_db, -10,2); 
    $mes_dt_producao_pintura_novo_db = substr($dt_producao_pintura_novo_db, -7,2);
    $ano_dt_producao_pintura_novo_db = substr($dt_producao_pintura_novo_db, -4);
 	if ($dia_dt_producao_pintura_novo_db == "" AND $mes_dt_producao_pintura_novo_db == "" AND $ano_dt_producao_pintura_novo_db == "") 
	{$dt_producao_pintura_novo_db = ($ano_dt_producao_pintura_novo_db."".$mes_dt_producao_pintura_novo_db."".$dia_dt_producao_pintura_novo_db); } 
else 
	{$dt_producao_pintura_novo_db = ($ano_dt_producao_pintura_novo_db."/".$mes_dt_producao_pintura_novo_db."/".$dia_dt_producao_pintura_novo_db); }
	}
	
 if ( $status_pintura_novo[$i] == "E" AND $status_pintura_velho[$i] <> $status_pintura_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS SAIDA SERÁ IGUAL DT. HOJE 	
	$dt_exp_pintura_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_exp_pintura_novo_db = $dt_exp_pintura_velho[$i]; 
	$dia_dt_exp_pintura_novo_db = substr($dt_exp_pintura_novo_db, -10,2); 
    $mes_dt_exp_pintura_novo_db = substr($dt_exp_pintura_novo_db, -7,2);
    $ano_dt_exp_pintura_novo_db = substr($dt_exp_pintura_novo_db, -4);
 	if ($dia_dt_exp_pintura_novo_db == "" AND $mes_dt_exp_pintura_novo_db == "" AND $ano_dt_exp_pintura_novo_db == "") 
	{$dt_exp_pintura_novo_db = ($ano_dt_exp_pintura_novo_db."".$mes_dt_exp_pintura_novo_db."".$dia_dt_exp_pintura_novo_db); } 
else 
	{$dt_exp_pintura_novo_db = ($ano_dt_exp_pintura_novo_db."/".$mes_dt_exp_pintura_novo_db."/".$dia_dt_exp_pintura_novo_db); }
	}
 	 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), status_pintura='$status_pintura_novo_db', res_pintura='$res_pintura_novo_db', obs_pintura='$obs_pintura_novo_db', dt_previsao_pintura='$dt_previsao_pintura_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar status_pintura_novo OS!!!");  
 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_producao_pintura='$dt_producao_pintura_novo_db', res_pintura='$res_pintura_novo_db', obs_pintura='$obs_pintura_novo_db', dt_previsao_pintura='$dt_previsao_pintura_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_producao_pintura_novo!!!"); 
  
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_exp_pintura='$dt_exp_pintura_novo_db', res_pintura='$res_pintura_novo_db', obs_pintura='$obs_pintura_novo_db', dt_previsao_pintura='$dt_previsao_pintura_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_exp_pintura_novo!!!");
 
 } } 
  
/*-----------	SETOR PINTURA	-----------*/


/*--------  SETOR ROTOR LL	-----------*/

/*		DATA PROGRAMADA DA OS		*/
if ($lib_rotor_ll == "alt") {

/*		STATUS	e DT STATUS	*/
 for ($i = 1; $i <= $quant_os; $i++) { 

 // -----------------------------    DT. HOJE	----------------------------------
	$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 
	if(strlen($dia_emissao) == 1){$dia_emissao = "0".$$dia_emissao;}; 
	if(strlen($mes_emissao) == 1){$mes_emissao = "0".$mes_emissao;}; 	
 // -----------------------------    DT. HOJE	----------------------------------
 	
 $id_novo = $id[$i] ;	
 $dt_producao_rotor_ll_velho[$i] ; // DT. STATUS ENTRADA ANTIGO
 $dt_exp_rotor_ll_velho[$i] ; // DT. STATUS SAIDA ANTIGO
 
 $status_rotor_ll_velho[$i] ;  // STATUS ANTIGO
 $status_rotor_ll_novo_db = $status_rotor_ll_novo[$i] ;  // STATUS NOVO
 
 $dt_previsao_rotor_ll_novo_db = $dt_previsao_rotor_ll_novo[$i] ; // DT PREVISAO
 
 $res_rotor_ll_novo_db = $res_rotor_ll_novo[$i] ;  // RESPONSAVEL NOVO
 $obs_rotor_ll_novo_db = $obs_rotor_ll_novo[$i] ;  // OBS NOVO
 
 if ( $status_rotor_ll_novo[$i] == "P" AND $status_rotor_ll_velho[$i] <> $status_rotor_ll_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS ENTRADA  SERÁ IGUAL DT. HOJE 	
	$dt_producao_rotor_ll_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_producao_rotor_ll_novo_db = $dt_producao_rotor_ll_velho[$i]; 
	$dia_dt_producao_rotor_ll_novo_db = substr($dt_producao_rotor_ll_novo_db, -10,2); 
    $mes_dt_producao_rotor_ll_novo_db = substr($dt_producao_rotor_ll_novo_db, -7,2);
    $ano_dt_producao_rotor_ll_novo_db = substr($dt_producao_rotor_ll_novo_db, -4);
 	if ($dia_dt_producao_rotor_ll_novo_db == "" AND $mes_dt_producao_rotor_ll_novo_db == "" AND $ano_dt_producao_rotor_ll_novo_db == "") 
	{$dt_producao_rotor_ll_novo_db = ($ano_dt_producao_rotor_ll_novo_db."".$mes_dt_producao_rotor_ll_novo_db."".$dia_dt_producao_rotor_ll_novo_db); } 
else 
	{$dt_producao_rotor_ll_novo_db = ($ano_dt_producao_rotor_ll_novo_db."/".$mes_dt_producao_rotor_ll_novo_db."/".$dia_dt_producao_rotor_ll_novo_db); }
	}
	
 if ( $status_rotor_ll_novo[$i] == "E" AND $status_rotor_ll_velho[$i] <> $status_rotor_ll_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS SAIDA SERÁ IGUAL DT. HOJE 	
	$dt_exp_rotor_ll_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_exp_rotor_ll_novo_db = $dt_exp_rotor_ll_velho[$i]; 
	$dia_dt_exp_rotor_ll_novo_db = substr($dt_exp_rotor_ll_novo_db, -10,2); 
    $mes_dt_exp_rotor_ll_novo_db = substr($dt_exp_rotor_ll_novo_db, -7,2);
    $ano_dt_exp_rotor_ll_novo_db = substr($dt_exp_rotor_ll_novo_db, -4);
 	if ($dia_dt_exp_rotor_ll_novo_db == "" AND $mes_dt_exp_rotor_ll_novo_db == "" AND $ano_dt_exp_rotor_ll_novo_db == "") 
	{$dt_exp_rotor_ll_novo_db = ($ano_dt_exp_rotor_ll_novo_db."".$mes_dt_exp_rotor_ll_novo_db."".$dia_dt_exp_rotor_ll_novo_db); } 
else 
	{$dt_exp_rotor_ll_novo_db = ($ano_dt_exp_rotor_ll_novo_db."/".$mes_dt_exp_rotor_ll_novo_db."/".$dia_dt_exp_rotor_ll_novo_db); }
	}
 
	 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), status_rotor_ll='$status_rotor_ll_novo_db', res_rotor_ll='$res_rotor_ll_novo_db', obs_rotor_ll='$obs_rotor_ll_novo_db', dt_previsao_rotor_ll='$dt_previsao_rotor_ll_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar status_cald1_novo OS!!!");  
 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_producao_rotor_ll='$dt_producao_rotor_ll_novo_db', res_rotor_ll='$res_rotor_ll_novo_db', obs_rotor_ll='$obs_rotor_ll_novo_db', dt_previsao_rotor_ll='$dt_previsao_rotor_ll_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_producao_cald1_novo!!!"); 
  
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_exp_rotor_ll='$dt_exp_rotor_ll_novo_db', res_rotor_ll='$res_rotor_ll_novo_db', obs_rotor_ll='$obs_rotor_ll_novo_db', dt_previsao_rotor_ll='$dt_previsao_rotor_ll_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_exp_cald1_novo!!!");
 
 } } 
  
/*-----------	SETOR ROTOR LL	-----------*/


/*--------  SETOR ROTOR SIR	-----------*/

/*		DATA PROGRAMADA DA OS		*/
if ($lib_rotor_sir == "alt") {

/*		STATUS	e DT STATUS	*/
 for ($i = 1; $i <= $quant_os; $i++) { 

 // -----------------------------    DT. HOJE	----------------------------------
	$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 
	if(strlen($dia_emissao) == 1){$dia_emissao = "0".$$dia_emissao;}; 
	if(strlen($mes_emissao) == 1){$mes_emissao = "0".$mes_emissao;}; 	
 // -----------------------------    DT. HOJE	----------------------------------
 	
 $id_novo = $id[$i] ;	
 $dt_producao_rotor_sir_velho[$i] ; // DT. STATUS ENTRADA ANTIGO
 $dt_exp_rotor_sir_velho[$i] ; // DT. STATUS SAIDA ANTIGO
 
 $status_rotor_sir_velho[$i] ;  // STATUS ANTIGO
 $status_rotor_sir_novo_db = $status_rotor_sir_novo[$i] ;  // STATUS NOVO
 
 $dt_previsao_rotor_sir_novo_db = $dt_previsao_rotor_sir_novo[$i] ; // DT PREVISAO
 
 $res_rotor_sir_novo_db = $res_rotor_sir_novo[$i] ;  // RESPONSAVEL NOVO
 $obs_rotor_sir_novo_db = $obs_rotor_sir_novo[$i] ;  // OBS NOVO
 
 if ( $status_rotor_sir_novo[$i] == "P" AND $status_rotor_sir_velho[$i] <> $status_rotor_sir_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS ENTRADA  SERÁ IGUAL DT. HOJE 	
	$dt_producao_rotor_sir_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_producao_rotor_sir_novo_db = $dt_producao_rotor_sir_velho[$i]; 
	$dia_dt_producao_rotor_sir_novo_db = substr($dt_producao_rotor_sir_novo_db, -10,2); 
    $mes_dt_producao_rotor_sir_novo_db = substr($dt_producao_rotor_sir_novo_db, -7,2);
    $ano_dt_producao_rotor_sir_novo_db = substr($dt_producao_rotor_sir_novo_db, -4);
 	if ($dia_dt_producao_rotor_sir_novo_db == "" AND $mes_dt_producao_rotor_sir_novo_db == "" AND $ano_dt_producao_rotor_sir_novo_db == "") 
	{$dt_producao_rotor_sir_novo_db = ($ano_dt_producao_rotor_sir_novo_db."".$mes_dt_producao_rotor_sir_novo_db."".$dia_dt_producao_rotor_sir_novo_db); } 
else 
	{$dt_producao_rotor_sir_novo_db = ($ano_dt_producao_rotor_sir_novo_db."/".$mes_dt_producao_rotor_sir_novo_db."/".$dia_dt_producao_rotor_sir_novo_db); }
	}
	
 if ( $status_rotor_sir_novo[$i] == "E" AND $status_rotor_sir_velho[$i] <> $status_rotor_sir_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS SAIDA SERÁ IGUAL DT. HOJE 	
	$dt_exp_rotor_sir_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_exp_rotor_sir_novo_db = $dt_exp_rotor_sir_velho[$i]; 
	$dia_dt_exp_rotor_sir_novo_db = substr($dt_exp_rotor_sir_novo_db, -10,2); 
    $mes_dt_exp_rotor_sir_novo_db = substr($dt_exp_rotor_sir_novo_db, -7,2);
    $ano_dt_exp_rotor_sir_novo_db = substr($dt_exp_rotor_sir_novo_db, -4);
 	if ($dia_dt_exp_rotor_sir_novo_db == "" AND $mes_dt_exp_rotor_sir_novo_db == "" AND $ano_dt_exp_rotor_sir_novo_db == "") 
	{$dt_exp_rotor_sir_novo_db = ($ano_dt_exp_rotor_sir_novo_db."".$mes_dt_exp_rotor_sir_novo_db."".$dia_dt_exp_rotor_sir_novo_db); } 
else 
	{$dt_exp_rotor_sir_novo_db = ($ano_dt_exp_rotor_sir_novo_db."/".$mes_dt_exp_rotor_sir_novo_db."/".$dia_dt_exp_rotor_sir_novo_db); }
	}
 
	 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), status_rotor_sir='$status_rotor_sir_novo_db', res_rotor_sir='$res_rotor_sir_novo_db', obs_rotor_sir='$obs_rotor_sir_novo_db', dt_previsao_rotor_sir='$dt_previsao_rotor_sir_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar status_cald1_novo OS!!!");  
 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_producao_rotor_sir='$dt_producao_rotor_sir_novo_db', res_rotor_sir='$res_rotor_sir_novo_db', obs_rotor_sir='$obs_rotor_sir_novo_db', dt_previsao_rotor_sir='$dt_previsao_rotor_sir_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_producao_cald1_novo!!!"); 
  
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_exp_rotor_sir='$dt_exp_rotor_sir_novo_db', res_rotor_sir='$res_rotor_sir_novo_db', obs_rotor_sir='$obs_rotor_sir_novo_db', dt_previsao_rotor_sir='$dt_previsao_rotor_sir_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_exp_cald1_novo!!!");
 
 } } 
  
/*-----------	SETOR ROTOR SIR	-----------*/


/*--------  SETOR MONTAGEM	-----------*/

/*		DATA PROGRAMADA DA OS		*/
if ($lib_montagem == "alt") {

/*		STATUS	e DT STATUS	*/
 for ($i = 1; $i <= $quant_os; $i++) { 

 // -----------------------------    DT. HOJE	----------------------------------
	$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 
	if(strlen($dia_emissao) == 1){$dia_emissao = "0".$$dia_emissao;}; 
	if(strlen($mes_emissao) == 1){$mes_emissao = "0".$mes_emissao;}; 	
 // -----------------------------    DT. HOJE	----------------------------------
 	
 $id_novo = $id[$i] ;	
 $dt_producao_montagem_velho[$i] ; // DT. STATUS ENTRADA ANTIGO
 $dt_exp_montagem_velho[$i] ; // DT. STATUS SAIDA ANTIGO
 
 $status_montagem_velho[$i] ;  // STATUS ANTIGO
 $status_montagem_novo_db = $status_montagem_novo[$i] ;  // STATUS NOVO
 
 $dt_previsao_montagem_novo_db = $dt_previsao_montagem_novo[$i] ; // DT PREVISAO
 
 $res_montagem_novo_db = $res_montagem_novo[$i] ;  // RESPONSAVEL NOVO
 $obs_montagem_novo_db = $obs_montagem_novo[$i] ;  // OBS NOVO
 
 if ( $status_montagem_novo[$i] == "P" AND $status_montagem_velho[$i] <> $status_montagem_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS ENTRADA  SERÁ IGUAL DT. HOJE 	
	$dt_producao_montagem_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_producao_montagem_novo_db = $dt_producao_montagem_velho[$i]; 
	$dia_dt_producao_montagem_novo_db = substr($dt_producao_montagem_novo_db, -10,2); 
    $mes_dt_producao_montagem_novo_db = substr($dt_producao_montagem_novo_db, -7,2);
    $ano_dt_producao_montagem_novo_db = substr($dt_producao_montagem_novo_db, -4);
 	if ($dia_dt_producao_montagem_novo_db == "" AND $mes_dt_producao_montagem_novo_db == "" AND $ano_dt_producao_montagem_novo_db == "") 
	{$dt_producao_montagem_novo_db = ($ano_dt_producao_montagem_novo_db."".$mes_dt_producao_montagem_novo_db."".$dia_dt_producao_montagem_novo_db); } 
else 
	{$dt_producao_montagem_novo_db = ($ano_dt_producao_montagem_novo_db."/".$mes_dt_producao_montagem_novo_db."/".$dia_dt_producao_montagem_novo_db); }
	}
	
 if ( $status_montagem_novo[$i] == "E" AND $status_montagem_velho[$i] <> $status_montagem_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS SAIDA SERÁ IGUAL DT. HOJE 	
	$dt_exp_montagem_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_exp_montagem_novo_db = $dt_exp_montagem_velho[$i]; 
	$dia_dt_exp_montagem_novo_db = substr($dt_exp_montagem_novo_db, -10,2); 
    $mes_dt_exp_montagem_novo_db = substr($dt_exp_montagem_novo_db, -7,2);
    $ano_dt_exp_montagem_novo_db = substr($dt_exp_montagem_novo_db, -4);
 	if ($dia_dt_exp_montagem_novo_db == "" AND $mes_dt_exp_montagem_novo_db == "" AND $ano_dt_exp_montagem_novo_db == "") 
	{$dt_exp_montagem_novo_db = ($ano_dt_exp_montagem_novo_db."".$mes_dt_exp_montagem_novo_db."".$dia_dt_exp_montagem_novo_db); } 
else 
	{$dt_exp_montagem_novo_db = ($ano_dt_exp_montagem_novo_db."/".$mes_dt_exp_montagem_novo_db."/".$dia_dt_exp_montagem_novo_db); }
	}
 	 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), status_montagem='$status_montagem_novo_db', res_montagem='$res_montagem_novo_db', obs_montagem='$obs_montagem_novo_db', dt_previsao_montagem='$dt_previsao_montagem_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar status_montagem_novo OS!!!");  
 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_producao_montagem='$dt_producao_montagem_novo_db', res_montagem='$res_montagem_novo_db', obs_montagem='$obs_montagem_novo_db', dt_previsao_montagem='$dt_previsao_montagem_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_producao_montagem_novo!!!"); 
  
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_exp_montagem='$dt_exp_montagem_novo_db', res_montagem='$res_montagem_novo_db', obs_montagem='$obs_montagem_novo_db', dt_previsao_montagem='$dt_previsao_montagem_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_exp_montagem_novo!!!");
 
 } } 
  
/*-----------	SETOR MONTAGEM	-----------*/


/*--------  SETOR GABINETE	-----------*/

/*		DATA PROGRAMADA DA OS		*/
if ($lib_gabinete == "alt") {

/*		STATUS	e DT STATUS	*/
 for ($i = 1; $i <= $quant_os; $i++) { 

 // -----------------------------    DT. HOJE	----------------------------------
	$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 
	if(strlen($dia_emissao) == 1){$dia_emissao = "0".$$dia_emissao;}; 
	if(strlen($mes_emissao) == 1){$mes_emissao = "0".$mes_emissao;}; 	
 // -----------------------------    DT. HOJE	----------------------------------
 	
 $id_novo = $id[$i] ;	
 $dt_producao_gabinete_velho[$i] ; // DT. STATUS ENTRADA ANTIGO
 $dt_exp_gabinete_velho[$i] ; // DT. STATUS SAIDA ANTIGO
 
 $status_gabinete_velho[$i] ;  // STATUS ANTIGO
 $status_gabinete_novo_db = $status_gabinete_novo[$i] ;  // STATUS NOVO
 
 $dt_previsao_gabinete_novo_db = $dt_previsao_gabinete_novo[$i] ; // DT PREVISAO
 
 $res_gabinete_novo_db = $res_gabinete_novo[$i] ;  // RESPONSAVEL NOVO
 $obs_gabinete_novo_db = $obs_gabinete_novo[$i] ;  // OBS NOVO
 
 if ( $status_gabinete_novo[$i] == "P" AND $status_gabinete_velho[$i] <> $status_gabinete_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS ENTRADA  SERÁ IGUAL DT. HOJE 	
	$dt_producao_gabinete_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_producao_gabinete_novo_db = $dt_producao_gabinete_velho[$i]; 
	$dia_dt_producao_gabinete_novo_db = substr($dt_producao_gabinete_novo_db, -10,2); 
    $mes_dt_producao_gabinete_novo_db = substr($dt_producao_gabinete_novo_db, -7,2);
    $ano_dt_producao_gabinete_novo_db = substr($dt_producao_gabinete_novo_db, -4);
 	if ($dia_dt_producao_gabinete_novo_db == "" AND $mes_dt_producao_gabinete_novo_db == "" AND $ano_dt_producao_gabinete_novo_db == "") 
	{$dt_producao_gabinete_novo_db = ($ano_dt_producao_gabinete_novo_db."".$mes_dt_producao_gabinete_novo_db."".$dia_dt_producao_gabinete_novo_db); } 
else 
	{$dt_producao_gabinete_novo_db = ($ano_dt_producao_gabinete_novo_db."/".$mes_dt_producao_gabinete_novo_db."/".$dia_dt_producao_gabinete_novo_db); }
	}
	
 if ( $status_gabinete_novo[$i] == "E" AND $status_gabinete_velho[$i] <> $status_gabinete_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS SAIDA SERÁ IGUAL DT. HOJE 	
	$dt_exp_gabinete_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_exp_gabinete_novo_db = $dt_exp_gabinete_velho[$i]; 
	$dia_dt_exp_gabinete_novo_db = substr($dt_exp_gabinete_novo_db, -10,2); 
    $mes_dt_exp_gabinete_novo_db = substr($dt_exp_gabinete_novo_db, -7,2);
    $ano_dt_exp_gabinete_novo_db = substr($dt_exp_gabinete_novo_db, -4);
 	if ($dia_dt_exp_gabinete_novo_db == "" AND $mes_dt_exp_gabinete_novo_db == "" AND $ano_dt_exp_gabinete_novo_db == "") 
	{$dt_exp_gabinete_novo_db = ($ano_dt_exp_gabinete_novo_db."".$mes_dt_exp_gabinete_novo_db."".$dia_dt_exp_gabinete_novo_db); } 
else 
	{$dt_exp_gabinete_novo_db = ($ano_dt_exp_gabinete_novo_db."/".$mes_dt_exp_gabinete_novo_db."/".$dia_dt_exp_gabinete_novo_db); }
	}
 	 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), status_gabinete='$status_gabinete_novo_db', res_gabinete='$res_gabinete_novo_db', obs_gabinete='$obs_gabinete_novo_db', dt_previsao_gabinete='$dt_previsao_gabinete_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar status_gabinete_novo OS!!!");  
 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_producao_gabinete='$dt_producao_gabinete_novo_db', res_gabinete='$res_gabinete_novo_db', obs_gabinete='$obs_gabinete_novo_db', dt_previsao_gabinete='$dt_previsao_gabinete_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_producao_gabinete_novo!!!"); 
  
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_exp_gabinete='$dt_exp_gabinete_novo_db', res_gabinete='$res_gabinete_novo_db', obs_gabinete='$obs_gabinete_novo_db', dt_previsao_gabinete='$dt_previsao_gabinete_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_exp_gabinete_novo!!!");
 
 } } 
  
/*-----------	SETOR GABINETE	-----------*/



/*--------  SETOR USINAGEM EIXO	-----------*/

/*		DATA PROGRAMADA 		*/
if ($lib_usinagem_eixo == "alt") {

/*		STATUS	e DT STATUS	*/
 for ($i = 1; $i <= $quant_os; $i++) { 

 // -----------------------------    DT. HOJE	----------------------------------
	$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 
	if(strlen($dia_emissao) == 1){$dia_emissao = "0".$$dia_emissao;}; 
	if(strlen($mes_emissao) == 1){$mes_emissao = "0".$mes_emissao;}; 	
 // -----------------------------    DT. HOJE	----------------------------------
 	
 $id_novo = $id[$i] ;	
 $dt_producao_usinagem_eixo_velho[$i] ; // DT. STATUS ENTRADA ANTIGO
 $dt_exp_usinagem_eixo_velho[$i] ; // DT. STATUS SAIDA ANTIGO
 
 $status_usinagem_eixo_velho[$i] ;  // STATUS ANTIGO
 $status_usinagem_eixo_novo_db = $status_usinagem_eixo_novo[$i] ;  // STATUS NOVO
 
 $dt_previsao_usinagem_eixo_novo_db = $dt_previsao_usinagem_eixo_novo[$i] ; // DT PREVISAO
 
 $res_usinagem_novo_db = $res_usinagem_novo[$i] ;  // RESPONSAVEL NOVO
 $obs_usinagem_novo_db = $obs_usinagem_novo[$i] ;  // OBS NOVO
 
 if ( $status_usinagem_eixo_novo[$i] == "P" AND $status_usinagem_eixo_velho[$i] <> $status_usinagem_eixo_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS ENTRADA  SERÁ IGUAL DT. HOJE 	
	$dt_producao_usinagem_eixo_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_producao_usinagem_eixo_novo_db = $dt_producao_usinagem_eixo_velho[$i]; 
	$dia_dt_producao_usinagem_eixo_novo_db = substr($dt_producao_usinagem_eixo_novo_db, -10,2); 
    $mes_dt_producao_usinagem_eixo_novo_db = substr($dt_producao_usinagem_eixo_novo_db, -7,2);
    $ano_dt_producao_usinagem_eixo_novo_db = substr($dt_producao_usinagem_eixo_novo_db, -4);
 	if ($dia_dt_producao_usinagem_eixo_novo_db == "" AND $mes_dt_producao_usinagem_eixo_novo_db == "" AND $ano_dt_producao_usinagem_eixo_novo_db == "") 
	{$dt_producao_usinagem_eixo_novo_db = ($ano_dt_producao_usinagem_eixo_novo_db."".$mes_dt_producao_usinagem_eixo_novo_db."".$dia_dt_producao_usinagem_eixo_novo_db); } 
else 
	{$dt_producao_usinagem_eixo_novo_db = ($ano_dt_producao_usinagem_eixo_novo_db."/".$mes_dt_producao_usinagem_eixo_novo_db."/".$dia_dt_producao_usinagem_eixo_novo_db); }
	}
	
 if ( $status_usinagem_eixo_novo[$i] == "E" AND $status_usinagem_eixo_velho[$i] <> $status_usinagem_eixo_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS SAIDA SERÁ IGUAL DT. HOJE 	
	$dt_exp_usinagem_eixo_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_exp_usinagem_eixo_novo_db = $dt_exp_usinagem_eixo_velho[$i]; 
	$dia_dt_exp_usinagem_eixo_novo_db = substr($dt_exp_usinagem_eixo_novo_db, -10,2); 
    $mes_dt_exp_usinagem_eixo_novo_db = substr($dt_exp_usinagem_eixo_novo_db, -7,2);
    $ano_dt_exp_usinagem_eixo_novo_db = substr($dt_exp_usinagem_eixo_novo_db, -4);
 	if ($dia_dt_exp_usinagem_eixo_novo_db == "" AND $mes_dt_exp_usinagem_eixo_novo_db == "" AND $ano_dt_exp_usinagem_eixo_novo_db == "") 
	{$dt_exp_usinagem_eixo_novo_db = ($ano_dt_exp_usinagem_eixo_novo_db."".$mes_dt_exp_usinagem_eixo_novo_db."".$dia_dt_exp_usinagem_eixo_novo_db); } 
else 
	{$dt_exp_usinagem_eixo_novo_db = ($ano_dt_exp_usinagem_eixo_novo_db."/".$mes_dt_exp_usinagem_eixo_novo_db."/".$dia_dt_exp_usinagem_eixo_novo_db); }
	}
 
	 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), status_usinagem_eixo='$status_usinagem_eixo_novo_db', res_usinagem='$res_usinagem_novo_db', obs_usinagem='$obs_usinagem_novo_db', dt_previsao_usinagem_eixo='$dt_previsao_usinagem_eixo_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar status_usinagem_eixo_novo OS!!!");  
 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_producao_usinagem_eixo='$dt_producao_usinagem_eixo_novo_db', res_usinagem='$res_usinagem_novo_db', obs_usinagem='$obs_usinagem_novo_db', dt_previsao_usinagem_eixo='$dt_previsao_usinagem_eixo_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_producao_usinagem_eixo_novo!!!"); 
  
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_exp_usinagem_eixo='$dt_exp_usinagem_eixo_novo_db', res_usinagem='$res_usinagem_novo_db', obs_usinagem='$obs_usinagem_novo_db', dt_previsao_usinagem_eixo='$dt_previsao_usinagem_eixo_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_exp_usinagem_eixo novo!!!");
 
 } } 
  
/*-----------	SETOR USINAGEM EIXO	-----------*/

/*--------  SETOR USINAGEM NUC_CUBO -----------*/

/*		DATA PROGRAMADA 		*/
if ($lib_usinagem_nuc_cubo == "alt") {

/*		STATUS	e DT STATUS	*/
 for ($i = 1; $i <= $quant_os; $i++) { 

 // -----------------------------    DT. HOJE	----------------------------------
	$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 
	if(strlen($dia_emissao) == 1){$dia_emissao = "0".$$dia_emissao;}; 
	if(strlen($mes_emissao) == 1){$mes_emissao = "0".$mes_emissao;}; 	
 // -----------------------------    DT. HOJE	----------------------------------
 	
 $id_novo = $id[$i] ;	
 $dt_producao_usinagem_nuc_cubo_velho[$i] ; // DT. STATUS ENTRADA ANTIGO
 $dt_exp_usinagem_nuc_cubo_velho[$i] ; // DT. STATUS SAIDA ANTIGO
 
 $status_usinagem_nuc_cubo_velho[$i] ;  // STATUS ANTIGO
 $status_usinagem_nuc_cubo_novo_db = $status_usinagem_nuc_cubo_novo[$i] ;  // STATUS NOVO
 
 $dt_previsao_usinagem_nuc_cubo_novo_db = $dt_previsao_usinagem_nuc_cubo_novo[$i] ; // DT PREVISAO
 
 $res_usinagem_novo_db = $res_usinagem_novo[$i] ;  // RESPONSAVEL NOVO
 $obs_usinagem_novo_db = $obs_usinagem_novo[$i] ;  // OBS NOVO
 
 if ( $status_usinagem_nuc_cubo_novo[$i] == "P" AND $status_usinagem_nuc_cubo_velho[$i] <> $status_usinagem_nuc_cubo_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS ENTRADA  SERÁ IGUAL DT. HOJE 	
	$dt_producao_usinagem_nuc_cubo_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_producao_usinagem_nuc_cubo_novo_db = $dt_producao_usinagem_nuc_cubo_velho[$i]; 
	$dia_dt_producao_usinagem_nuc_cubo_novo_db = substr($dt_producao_usinagem_nuc_cubo_novo_db, -10,2); 
    $mes_dt_producao_usinagem_nuc_cubo_novo_db = substr($dt_producao_usinagem_nuc_cubo_novo_db, -7,2);
    $ano_dt_producao_usinagem_nuc_cubo_novo_db = substr($dt_producao_usinagem_nuc_cubo_novo_db, -4);
 	if ($dia_dt_producao_usinagem_nuc_cubo_novo_db == "" AND $mes_dt_producao_usinagem_nuc_cubo_novo_db == "" AND $ano_dt_producao_usinagem_nuc_cubo_novo_db == "") 
	{$dt_producao_usinagem_nuc_cubo_novo_db = ($ano_dt_producao_usinagem_nuc_cubo_novo_db."".$mes_dt_producao_usinagem_nuc_cubo_novo_db."".$dia_dt_producao_usinagem_nuc_cubo_novo_db); } 
else 
	{$dt_producao_usinagem_nuc_cubo_novo_db = ($ano_dt_producao_usinagem_nuc_cubo_novo_db."/".$mes_dt_producao_usinagem_nuc_cubo_novo_db."/".$dia_dt_producao_usinagem_nuc_cubo_novo_db); }
	}
	
 if ( $status_usinagem_nuc_cubo_novo[$i] == "E" AND $status_usinagem_nuc_cubo_velho[$i] <> $status_usinagem_nuc_cubo_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS SAIDA SERÁ IGUAL DT. HOJE 	
	$dt_exp_usinagem_nuc_cubo_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_exp_usinagem_nuc_cubo_novo_db = $dt_exp_usinagem_nuc_cubo_velho[$i]; 
	$dia_dt_exp_usinagem_nuc_cubo_novo_db = substr($dt_exp_usinagem_nuc_cubo_novo_db, -10,2); 
    $mes_dt_exp_usinagem_nuc_cubo_novo_db = substr($dt_exp_usinagem_nuc_cubo_novo_db, -7,2);
    $ano_dt_exp_usinagem_nuc_cubo_novo_db = substr($dt_exp_usinagem_nuc_cubo_novo_db, -4);
 	if ($dia_dt_exp_usinagem_nuc_cubo_novo_db == "" AND $mes_dt_exp_usinagem_nuc_cubo_novo_db == "" AND $ano_dt_exp_usinagem_nuc_cubo_novo_db == "") 
	{$dt_exp_usinagem_nuc_cubo_novo_db = ($ano_dt_exp_usinagem_nuc_cubo_novo_db."".$mes_dt_exp_usinagem_nuc_cubo_novo_db."".$dia_dt_exp_usinagem_nuc_cubo_novo_db); } 
else 
	{$dt_exp_usinagem_nuc_cubo_novo_db = ($ano_dt_exp_usinagem_nuc_cubo_novo_db."/".$mes_dt_exp_usinagem_nuc_cubo_novo_db."/".$dia_dt_exp_usinagem_nuc_cubo_novo_db); }
	}
 
	 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), status_usinagem_nuc_cubo='$status_usinagem_nuc_cubo_novo_db', res_usinagem='$res_usinagem_novo_db', obs_usinagem='$obs_usinagem_novo_db', dt_previsao_usinagem_nuc_cubo='$dt_previsao_usinagem_nuc_cubo_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar status_usinagem_eixo_novo OS!!!");  
 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_producao_usinagem_nuc_cubo='$dt_producao_usinagem_nuc_cubo_novo_db', res_usinagem='$res_usinagem_novo_db', obs_usinagem='$obs_usinagem_novo_db', dt_previsao_usinagem_nuc_cubo='$dt_previsao_usinagem_nuc_cubo_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_producao_usinagem_eixo_novo!!!"); 
  
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_exp_usinagem_nuc_cubo='$dt_exp_usinagem_nuc_cubo_novo_db', res_usinagem='$res_usinagem_novo_db', obs_usinagem='$obs_usinagem_novo_db', dt_previsao_usinagem_nuc_cubo='$dt_previsao_usinagem_nuc_cubo_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_exp_usinagem_eixo novo!!!");
 
 } } 
  
/*-----------	SETOR USINAGEM NUC_CUBO	-----------*/

/*--------  SETOR USINAGEM POL_MOT	-----------*/

/*		DATA PROGRAMADA 		*/
if ($lib_usinagem_pol_mot == "alt") {

/*		STATUS	e DT STATUS	*/
 for ($i = 1; $i <= $quant_os; $i++) { 

 // -----------------------------    DT. HOJE	----------------------------------
	$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 
	if(strlen($dia_emissao) == 1){$dia_emissao = "0".$$dia_emissao;}; 
	if(strlen($mes_emissao) == 1){$mes_emissao = "0".$mes_emissao;}; 	
 // -----------------------------    DT. HOJE	----------------------------------
 	
 $id_novo = $id[$i] ;	
 $dt_producao_usinagem_pol_mot_velho[$i] ; // DT. STATUS ENTRADA ANTIGO
 $dt_exp_usinagem_pol_mot_velho[$i] ; // DT. STATUS SAIDA ANTIGO
 
 $status_usinagem_pol_mot_velho[$i] ;  // STATUS ANTIGO
 $status_usinagem_pol_mot_novo_db = $status_usinagem_pol_mot_novo[$i] ;  // STATUS NOVO
 
 $dt_previsao_usinagem_pol_mot_novo_db = $dt_previsao_usinagem_pol_mot_novo[$i] ; // DT PREVISAO
 
 $res_usinagem_novo_db = $res_usinagem_novo[$i] ;  // RESPONSAVEL NOVO
 $obs_usinagem_novo_db = $obs_usinagem_novo[$i] ;  // OBS NOVO
 
 if ( $status_usinagem_pol_mot_novo[$i] == "P" AND $status_usinagem_pol_mot_velho[$i] <> $status_usinagem_pol_mot_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS ENTRADA  SERÁ IGUAL DT. HOJE 	
	$dt_producao_usinagem_pol_mot_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_producao_usinagem_pol_mot_novo_db = $dt_producao_usinagem_pol_mot_velho[$i]; 
	$dia_dt_producao_usinagem_pol_mot_novo_db = substr($dt_producao_usinagem_pol_mot_novo_db, -10,2); 
    $mes_dt_producao_usinagem_pol_mot_novo_db = substr($dt_producao_usinagem_pol_mot_novo_db, -7,2);
    $ano_dt_producao_usinagem_pol_mot_novo_db = substr($dt_producao_usinagem_pol_mot_novo_db, -4);
 	if ($dia_dt_producao_usinagem_pol_mot_novo_db == "" AND $mes_dt_producao_usinagem_pol_mot_novo_db == "" AND $ano_dt_producao_usinagem_pol_mot_novo_db == "") 
	{$dt_producao_usinagem_pol_mot_novo_db = ($ano_dt_producao_usinagem_pol_mot_novo_db."".$mes_dt_producao_usinagem_pol_mot_novo_db."".$dia_dt_producao_usinagem_pol_mot_novo_db); } 
else 
	{$dt_producao_usinagem_pol_mot_novo_db = ($ano_dt_producao_usinagem_pol_mot_novo_db."/".$mes_dt_producao_usinagem_pol_mot_novo_db."/".$dia_dt_producao_usinagem_pol_mot_novo_db); }
	}
	
 if ( $status_usinagem_pol_mot_novo[$i] == "E" AND $status_usinagem_pol_mot_velho[$i] <> $status_usinagem_pol_mot_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS SAIDA SERÁ IGUAL DT. HOJE 	
	$dt_exp_usinagem_pol_mot_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_exp_usinagem_pol_mot_novo_db = $dt_exp_usinagem_pol_mot_velho[$i]; 
	$dia_dt_exp_usinagem_pol_mot_novo_db = substr($dt_exp_usinagem_pol_mot_novo_db, -10,2); 
    $mes_dt_exp_usinagem_pol_mot_novo_db = substr($dt_exp_usinagem_pol_mot_novo_db, -7,2);
    $ano_dt_exp_usinagem_pol_mot_novo_db = substr($dt_exp_usinagem_pol_mot_novo_db, -4);
 	if ($dia_dt_exp_usinagem_pol_mot_novo_db == "" AND $mes_dt_exp_usinagem_pol_mot_novo_db == "" AND $ano_dt_exp_usinagem_pol_mot_novo_db == "") 
	{$dt_exp_usinagem_pol_mot_novo_db = ($ano_dt_exp_usinagem_pol_mot_novo_db."".$mes_dt_exp_usinagem_pol_mot_novo_db."".$dia_dt_exp_usinagem_pol_mot_novo_db); } 
else 
	{$dt_exp_usinagem_pol_mot_novo_db = ($ano_dt_exp_usinagem_pol_mot_novo_db."/".$mes_dt_exp_usinagem_pol_mot_novo_db."/".$dia_dt_exp_usinagem_pol_mot_novo_db); }
	}
 
	 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), status_usinagem_pol_mot='$status_usinagem_pol_mot_novo_db', res_usinagem='$res_usinagem_novo_db', obs_usinagem='$obs_usinagem_novo_db', dt_previsao_usinagem_pol_mot='$dt_previsao_usinagem_pol_mot_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar status_usinagem_pol_mot_novo OS!!!");  
 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_producao_usinagem_pol_mot='$dt_producao_usinagem_pol_mot_novo_db', res_usinagem='$res_usinagem_novo_db', obs_usinagem='$obs_usinagem_novo_db', dt_previsao_usinagem_pol_mot='$dt_previsao_usinagem_pol_mot_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_producao_usinagem_pol_mot_novo!!!"); 
  
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_exp_usinagem_pol_mot='$dt_exp_usinagem_pol_mot_novo_db', res_usinagem='$res_usinagem_novo_db', obs_usinagem='$obs_usinagem_novo_db', dt_previsao_usinagem_pol_mot='$dt_previsao_usinagem_pol_mot_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_exp_usinagem_pol_mot novo!!!");
 
 } } 
  
/*-----------	SETOR USINAGEM POL_MOT	-----------*/

/*--------  SETOR USINAGEM POL_VENT	-----------*/

/*		DATA PROGRAMADA 		*/
if ($lib_usinagem_pol_vent == "alt") {

/*		STATUS	e DT STATUS	*/
 for ($i = 1; $i <= $quant_os; $i++) { 

 // -----------------------------    DT. HOJE	----------------------------------
	$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 
	if(strlen($dia_emissao) == 1){$dia_emissao = "0".$$dia_emissao;}; 
	if(strlen($mes_emissao) == 1){$mes_emissao = "0".$mes_emissao;}; 	
 // -----------------------------    DT. HOJE	----------------------------------
 	
 $id_novo = $id[$i] ;	
 $dt_producao_usinagem_pol_vent_velho[$i] ; // DT. STATUS ENTRADA ANTIGO
 $dt_exp_usinagem_pol_vent_velho[$i] ; // DT. STATUS SAIDA ANTIGO
 
 $status_usinagem_pol_vent_velho[$i] ;  // STATUS ANTIGO
 $status_usinagem_pol_vent_novo_db = $status_usinagem_pol_vent_novo[$i] ;  // STATUS NOVO
 
 $dt_previsao_usinagem_pol_vent_novo_db = $dt_previsao_usinagem_pol_vent_novo[$i] ; // DT PREVISAO
 
 $res_usinagem_novo_db = $res_usinagem_novo[$i] ;  // RESPONSAVEL NOVO
 $obs_usinagem_novo_db = $obs_usinagem_novo[$i] ;  // OBS NOVO
 
 if ( $status_usinagem_pol_vent_novo[$i] == "P" AND $status_usinagem_pol_vent_velho[$i] <> $status_usinagem_pol_vent_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS ENTRADA  SERÁ IGUAL DT. HOJE 	
	$dt_producao_usinagem_pol_vent_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_producao_usinagem_pol_vent_novo_db = $dt_producao_usinagem_pol_vent_velho[$i]; 
	$dia_dt_producao_usinagem_pol_vent_novo_db = substr($dt_producao_usinagem_pol_vent_novo_db, -10,2); 
    $mes_dt_producao_usinagem_pol_vent_novo_db = substr($dt_producao_usinagem_pol_vent_novo_db, -7,2);
    $ano_dt_producao_usinagem_pol_vent_novo_db = substr($dt_producao_usinagem_pol_vent_novo_db, -4);
 	if ($dia_dt_producao_usinagem_pol_vent_novo_db == "" AND $mes_dt_producao_usinagem_pol_vent_novo_db == "" AND $ano_dt_producao_usinagem_pol_vent_novo_db == "") 
	{$dt_producao_usinagem_pol_vent_novo_db = ($ano_dt_producao_usinagem_pol_vent_novo_db."".$mes_dt_producao_usinagem_pol_vent_novo_db."".$dia_dt_producao_usinagem_pol_vent_novo_db); } 
else 
	{$dt_producao_usinagem_pol_vent_novo_db = ($ano_dt_producao_usinagem_pol_vent_novo_db."/".$mes_dt_producao_usinagem_pol_vent_novo_db."/".$dia_dt_producao_usinagem_pol_vent_novo_db); }
	}
	
 if ( $status_usinagem_pol_vent_novo[$i] == "E" AND $status_usinagem_pol_vent_velho[$i] <> $status_usinagem_pol_vent_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS SAIDA SERÁ IGUAL DT. HOJE 	
	$dt_exp_usinagem_pol_vent_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_exp_usinagem_pol_vent_novo_db = $dt_exp_usinagem_pol_vent_velho[$i]; 
	$dia_dt_exp_usinagem_pol_vent_novo_db = substr($dt_exp_usinagem_pol_vent_novo_db, -10,2); 
    $mes_dt_exp_usinagem_pol_vent_novo_db = substr($dt_exp_usinagem_pol_vent_novo_db, -7,2);
    $ano_dt_exp_usinagem_pol_vent_novo_db = substr($dt_exp_usinagem_pol_vent_novo_db, -4);
 	if ($dia_dt_exp_usinagem_pol_vent_novo_db == "" AND $mes_dt_exp_usinagem_pol_vent_novo_db == "" AND $ano_dt_exp_usinagem_pol_vent_novo_db == "") 
	{$dt_exp_usinagem_pol_vent_novo_db = ($ano_dt_exp_usinagem_pol_vent_novo_db."".$mes_dt_exp_usinagem_pol_vent_novo_db."".$dia_dt_exp_usinagem_pol_vent_novo_db); } 
else 
	{$dt_exp_usinagem_pol_vent_novo_db = ($ano_dt_exp_usinagem_pol_vent_novo_db."/".$mes_dt_exp_usinagem_pol_vent_novo_db."/".$dia_dt_exp_usinagem_pol_vent_novo_db); }
	}
 
	 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), status_usinagem_pol_vent='$status_usinagem_pol_vent_novo_db', res_usinagem='$res_usinagem_novo_db', obs_usinagem='$obs_usinagem_novo_db', dt_previsao_usinagem_pol_vent='$dt_previsao_usinagem_pol_vent_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar status_usinagem_pol_mot_novo OS!!!");  
 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_producao_usinagem_pol_vent='$dt_producao_usinagem_pol_vent_novo_db', res_usinagem='$res_usinagem_novo_db', obs_usinagem='$obs_usinagem_novo_db', dt_previsao_usinagem_pol_vent='$dt_previsao_usinagem_pol_vent_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_producao_usinagem_pol_mot_novo!!!"); 
  
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_exp_usinagem_pol_vent='$dt_exp_usinagem_pol_vent_novo_db', res_usinagem='$res_usinagem_novo_db', obs_usinagem='$obs_usinagem_novo_db', dt_previsao_usinagem_pol_vent='$dt_previsao_usinagem_pol_vent_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_exp_usinagem_pol_mot novo!!!");
 
 } } 
  
/*-----------	SETOR USINAGEM POL_VENT	-----------*/


/*--------  SETOR USINAGEM GAXETA	-----------*/

/*		DATA PROGRAMADA 		*/
if ($lib_usinagem_gaxeta == "alt") {

/*		STATUS	e DT STATUS	*/
 for ($i = 1; $i <= $quant_os; $i++) { 

 // -----------------------------    DT. HOJE	----------------------------------
	$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 
	if(strlen($dia_emissao) == 1){$dia_emissao = "0".$$dia_emissao;}; 
	if(strlen($mes_emissao) == 1){$mes_emissao = "0".$mes_emissao;}; 	
 // -----------------------------    DT. HOJE	----------------------------------
 	
 $id_novo = $id[$i] ;	
 $dt_producao_usinagem_gaxeta_velho[$i] ; // DT. STATUS ENTRADA ANTIGO
 $dt_exp_usinagem_gaxeta_velho[$i] ; // DT. STATUS SAIDA ANTIGO
 
 $status_usinagem_gaxeta_velho[$i] ;  // STATUS ANTIGO
 $status_usinagem_gaxeta_novo_db = $status_usinagem_gaxeta_novo[$i] ;  // STATUS NOVO
 
 $dt_previsao_usinagem_gaxeta_novo_db = $dt_previsao_usinagem_gaxeta_novo[$i] ; // DT PREVISAO
 
 $res_usinagem_novo_db = $res_usinagem_novo[$i] ;  // RESPONSAVEL NOVO
 $obs_usinagem_novo_db = $obs_usinagem_novo[$i] ;  // OBS NOVO
 
 if ( $status_usinagem_gaxeta_novo[$i] == "P" AND $status_usinagem_gaxeta_velho[$i] <> $status_usinagem_gaxeta_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS ENTRADA  SERÁ IGUAL DT. HOJE 	
	$dt_producao_usinagem_gaxeta_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_producao_usinagem_gaxeta_novo_db = $dt_producao_usinagem_gaxeta_velho[$i]; 
	$dia_dt_producao_usinagem_gaxeta_novo_db = substr($dt_producao_usinagem_gaxeta_novo_db, -10,2); 
    $mes_dt_producao_usinagem_gaxeta_novo_db = substr($dt_producao_usinagem_gaxeta_novo_db, -7,2);
    $ano_dt_producao_usinagem_gaxeta_novo_db = substr($dt_producao_usinagem_gaxeta_novo_db, -4);
 	if ($dia_dt_producao_usinagem_gaxeta_novo_db == "" AND $mes_dt_producao_usinagem_gaxeta_novo_db == "" AND $ano_dt_producao_usinagem_gaxeta_novo_db == "") 
	{$dt_producao_usinagem_gaxeta_novo_db = ($ano_dt_producao_usinagem_gaxeta_novo_db."".$mes_dt_producao_usinagem_gaxeta_novo_db."".$dia_dt_producao_usinagem_gaxeta_novo_db); } 
else 
	{$dt_producao_usinagem_gaxeta_novo_db = ($ano_dt_producao_usinagem_gaxeta_novo_db."/".$mes_dt_producao_usinagem_gaxeta_novo_db."/".$dia_dt_producao_usinagem_gaxeta_novo_db); }
	}
	
 if ( $status_usinagem_gaxeta_novo[$i] == "E" AND $status_usinagem_gaxeta_velho[$i] <> $status_usinagem_gaxeta_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS SAIDA SERÁ IGUAL DT. HOJE 	
	$dt_exp_usinagem_gaxeta_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_exp_usinagem_gaxeta_novo_db = $dt_exp_usinagem_gaxeta_velho[$i]; 
	$dia_dt_exp_usinagem_gaxeta_novo_db = substr($dt_exp_usinagem_gaxeta_novo_db, -10,2); 
    $mes_dt_exp_usinagem_gaxeta_novo_db = substr($dt_exp_usinagem_gaxeta_novo_db, -7,2);
    $ano_dt_exp_usinagem_gaxeta_novo_db = substr($dt_exp_usinagem_gaxeta_novo_db, -4);
 	if ($dia_dt_exp_usinagem_gaxeta_novo_db == "" AND $mes_dt_exp_usinagem_gaxeta_novo_db == "" AND $ano_dt_exp_usinagem_gaxeta_novo_db == "") 
	{$dt_exp_usinagem_gaxeta_novo_db = ($ano_dt_exp_usinagem_gaxeta_novo_db."".$mes_dt_exp_usinagem_gaxeta_novo_db."".$dia_dt_exp_usinagem_gaxeta_novo_db); } 
else 
	{$dt_exp_usinagem_gaxeta_novo_db = ($ano_dt_exp_usinagem_gaxeta_novo_db."/".$mes_dt_exp_usinagem_gaxeta_novo_db."/".$dia_dt_exp_usinagem_gaxeta_novo_db); }
	}
 
	 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), status_usinagem_gaxeta='$status_usinagem_gaxeta_novo_db', res_usinagem='$res_usinagem_novo_db', obs_usinagem='$obs_usinagem_novo_db', dt_previsao_usinagem_gaxeta='$dt_previsao_usinagem_gaxeta_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar status_usinagem_pol_mot_novo OS!!!");  
 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_producao_usinagem_gaxeta='$dt_producao_usinagem_gaxeta_novo_db', res_usinagem='$res_usinagem_novo_db', obs_usinagem='$obs_usinagem_novo_db', dt_previsao_usinagem_gaxeta='$dt_previsao_usinagem_gaxeta_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_producao_usinagem_pol_mot_novo!!!"); 
  
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_exp_usinagem_gaxeta='$dt_exp_usinagem_gaxeta_novo_db', res_usinagem='$res_usinagem_novo_db', obs_usinagem='$obs_usinagem_novo_db', dt_previsao_usinagem_gaxeta='$dt_previsao_usinagem_gaxeta_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_exp_usinagem_pol_mot novo!!!");
 
 } } 
  
/*-----------	SETOR USINAGEM GAXETA	-----------*/


/*--------  	SETOR EXPEDICAO		-----------*/

/*		DATA PROGRAMADA DA OS		*/
if ($lib_expedicao == "alt") {

/*		STATUS	e DT STATUS	*/
 for ($i = 1; $i <= $quant_os; $i++) { 

 // -----------------------------    DT. HOJE	----------------------------------
	$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 
	if(strlen($dia_emissao) == 1){$dia_emissao = "0".$$dia_emissao;}; 
	if(strlen($mes_emissao) == 1){$mes_emissao = "0".$mes_emissao;}; 	
 // -----------------------------    DT. HOJE	----------------------------------
 	
 $id_novo = $id[$i] ;	
 $dt_producao_expedicao_velho[$i] ; // DT. STATUS ENTRADA ANTIGO
 $dt_exp_expedicao_velho[$i] ; // DT. STATUS SAIDA ANTIGO
 
 $status_expedicao_velho[$i] ;  // STATUS ANTIGO
 $status_expedicao_novo_db = $status_expedicao_novo[$i] ;  // STATUS NOVO
 
 $dt_previsao_expedicao_novo_db = $dt_previsao_expedicao_novo[$i] ; // DT PREVISAO
 
 $res_expedicao_novo_db = $res_expedicao_novo[$i] ;  // RESPONSAVEL NOVO
 $obs_expedicao_novo_db = $obs_expedicao_novo[$i] ;  // OBS NOVO
 
 if ( $status_expedicao_novo[$i] == "P" AND $status_expedicao_velho[$i] <> $status_expedicao_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS ENTRADA  SERÁ IGUAL DT. HOJE 	
	$dt_producao_expedicao_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_producao_expedicao_novo_db = $dt_producao_expedicao_velho[$i]; 
	$dia_dt_producao_expedicao_novo_db = substr($dt_producao_expedicao_novo_db, -10,2); 
    $mes_dt_producao_expedicao_novo_db = substr($dt_producao_expedicao_novo_db, -7,2);
    $ano_dt_producao_expedicao_novo_db = substr($dt_producao_expedicao_novo_db, -4);
 	if ($dia_dt_producao_expedicao_novo_db == "" AND $mes_dt_producao_expedicao_novo_db == "" AND $ano_dt_producao_expedicao_novo_db == "") 
	{$dt_producao_expedicao_novo_db = ($ano_dt_producao_expedicao_novo_db."".$mes_dt_producao_expedicao_novo_db."".$dia_dt_producao_expedicao_novo_db); } 
else 
	{$dt_producao_expedicao_novo_db = ($ano_dt_producao_expedicao_novo_db."/".$mes_dt_producao_expedicao_novo_db."/".$dia_dt_producao_expedicao_novo_db); }
	}
	
 if ( $status_expedicao_novo[$i] == "E" AND $status_expedicao_velho[$i] <> $status_expedicao_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS SAIDA SERÁ IGUAL DT. HOJE 	
	$dt_exp_expedicao_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$dt_exp_expedicao_novo_db = $dt_exp_expedicao_velho[$i]; 
	$dia_dt_exp_expedicao_novo_db = substr($dt_exp_expedicao_novo_db, -10,2); 
    $mes_dt_exp_expedicao_novo_db = substr($dt_exp_expedicao_novo_db, -7,2);
    $ano_dt_exp_expedicao_novo_db = substr($dt_exp_expedicao_novo_db, -4);
 	if ($dia_dt_exp_expedicao_novo_db == "" AND $mes_dt_exp_expedicao_novo_db == "" AND $ano_dt_exp_expedicao_novo_db == "") 
	{$dt_exp_expedicao_novo_db = ($ano_dt_exp_expedicao_novo_db."".$mes_dt_exp_expedicao_novo_db."".$dia_dt_exp_expedicao_novo_db); } 
else 
	{$dt_exp_expedicao_novo_db = ($ano_dt_exp_expedicao_novo_db."/".$mes_dt_exp_expedicao_novo_db."/".$dia_dt_exp_expedicao_novo_db); }
	}
 	 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), status_expedicao='$status_expedicao_novo_db', res_expedicao='$res_expedicao_novo_db', obs_expedicao='$obs_expedicao_novo_db', dt_previsao_expedicao='$dt_previsao_expedicao_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar status_expedicao_novo OS!!!");  
 
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_producao_expedicao='$dt_producao_expedicao_novo_db', res_expedicao='$res_expedicao_novo_db', obs_expedicao='$obs_expedicao_novo_db', dt_previsao_expedicao='$dt_previsao_expedicao_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_producao_expedicao_novo!!!"); 
  
 $sql = "UPDATE Antigos SET data_emissao_alt=NOW(), dt_exp_expedicao='$dt_exp_expedicao_novo_db', res_expedicao='$res_expedicao_novo_db', obs_expedicao='$obs_expedicao_novo_db', dt_previsao_expedicao='$dt_previsao_expedicao_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar dt_exp_expedicao_novo!!!");
 
 } } 
  
/*-----------		SETOR EXPEDICAO		-----------*/



?>




<table class=sem_borda width="750" align="center">
<td>

		<table class=sem_borda width=30% align="center">
	<tr>
<td class=titulo height="25" align="center"> Alterada com Sucesso ! </td>
	</tr>
		</table>

<br>

	<? /* -------------	CONFIGURAÇÃO PARA BUSCAR OS NUMEROS DA O.S	------------------- */ ?>

			<table class=sem_borda width=75% align="center">
		<tr>

<?
/* LIBERAR USUARIO PARA VER TUDO OU SOMENTE O Q ESTA SENDO PRODUZIDO */
if ( $lib_baixa_tipo == "alt" OR $lib_baixa_tipo == "todos" ) 
{ $lib_baixa_tipo_busca = ""; $lib_baixa_tipo_busca_dados = ""; $lib_baixa_tipo_texto = "Mostrar todas Baixas."; } 
else 
{ $lib_baixa_tipo_busca = "WHERE baixa='P'"; $lib_baixa_tipo_busca_dados = "AND baixa='P'"; $lib_baixa_tipo_texto = "Mostrar somente o que está sendo Produzido."; }
/* LIBERAR USUARIO PARA VER TUDO OU SOMENTE O Q ESTA SENDO PRODUZIDO */
?>


<td class=right> Nova Busca
<select name="tipo_busca" OnChange="Atualizar_Dados_PCP_Altera();">
<option value='' <? echo ($tipo_busca==''?"SELECTED":""); ?> >  </option>
<option value='num_os' <? echo ($tipo_busca=='num_os'?"SELECTED":""); ?> > Num_OS </option>
<option value='nome_cliente' <? echo ($tipo_busca=='nome_cliente'?"SELECTED":""); ?> > Nome Cliente </option>
<option value='num_proposta' <? echo ($tipo_busca=='num_proposta'?"SELECTED":""); ?> > Num. Prop. </option>
<option value='oc_obra' <? echo ($tipo_busca=='oc_obra'?"SELECTED":""); ?> > OC_Obra </option>
<option value='data_entrega' <? echo ($tipo_busca=='data_entrega'?"SELECTED":""); ?> > Dt. Entrega </option>
<option value='baixa' <? echo ($tipo_busca=='baixa'?"SELECTED":""); ?> > Baixa </option>
<option value='data_baixa' <? echo ($tipo_busca=='data_baixa'?"SELECTED":""); ?> > Dt. Baixa </option>
<option value='local_venda' <? echo ($tipo_busca=='local_venda'?"SELECTED":""); ?> > Local Venda </option>
<option value='descr_vent' <? echo ($tipo_busca=='descr_vent'?"SELECTED":""); ?> > Descr. Vent. </option>
<option value='mercado' <? echo ($tipo_busca=='mercado'?"SELECTED":""); ?> > Mercado </option>
<option value='representante' <? echo ($tipo_busca=='representante'?"SELECTED":""); ?> > Representante </option>
<option value='modelo' <? echo ($tipo_busca=='modelo'?"SELECTED":""); ?> > Modelo </option>
<option value='tamanho' <? echo ($tipo_busca=='tamanho'?"SELECTED":""); ?> > Tamanho </option>
<option value='arranjo' <? echo ($tipo_busca=='arranjo'?"SELECTED":""); ?> > Arranjo </option>
<option value='classe' <? echo ($tipo_busca=='classe'?"SELECTED":""); ?> > Classe </option>
<option value='rotacao' <? echo ($tipo_busca=='rotacao'?"SELECTED":""); ?> > Rotação </option>
<option value='gab' <? echo ($tipo_busca=='gab'?"SELECTED":""); ?> > Gab. </option>
<option value='qt' <? echo ($tipo_busca=='qt'?"SELECTED":""); ?> > Qtde </option>
<option value='fornecimento_motor' <? echo ($tipo_busca=='fornecimento_motor'?"SELECTED":""); ?> > Forn. Motor </option>
</select>
</td>

<? /* CONFIGURAÇÃO PARA BUSCAR CAMPO AUTOMÁTICO */
$busca_valor=mysql_query("select distinct $tipo_busca from pcp $lib_baixa_tipo_busca order by $tipo_busca");
$total_valor=mysql_num_rows($busca_valor);
$count=$total_valor-1;
for($i=0;$i<$total_valor;$i++) {
	$nome_valor=mysql_result($busca_valor,$i,$tipo_busca);
	$palavras_valor.="'$nome_valor'";
if($i<$count) { $palavras_valor.=","; }   }
?>

<? /* DADOS DA BUSCA */ ?>
<td class=left>
<input class=left name=valor maxLength=35 size=36 value="<?echo $valor?>" onKeyUp="checkList(this,arvore_valor)"; id="textbox2" > 

<? /* BOTÃO DE BUSCAR */ ?>
<input class="botao1" name="novabusca" type="button" value="Nova Buscar" 
Onclick="Atualizar_Dados_PCP_Altera();"> 
</td>


		</tr>
			</table>

<? /* -------------	CONFIGURAÇÃO PARA BUSCAR OS NUMEROS DA O.S	------------------- */ ?>

</td>
</table>
</body>
</html>

<script>
var arvorenum_os = new Array(<?= $palavrasnum_os ?>);
var arvore_valor = new Array(<?= $palavras_valor ?>);
document.write('<style type="text/css">'+
	  '#listHolder{position:absolute;border:0;}'+
	  '.list{font-family:verdana;font-size:10;color:#000000;background:;}'+
	 '<\/style>')
	 
function SaltaCampo(campo,prox,teclapres){
    var tecla = teclapres.keyCode ? teclapres.keyCode : teclapres.which ? teclapres.which : teclapres.charCode;
    if (tecla == 13){
  document.pcp[prox].select(); //se não quiser o foco, desabilite!
  document.pcp[prox].focus();
    }
}
</script>