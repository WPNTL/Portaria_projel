<? include "valida_sessao.php" ; include "config_pcp.php"; ?>

<html>
<head>
<title> Cabeçalho do PCP </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
<script language="JavaScript" SRC="funcoes/abrir_fechar.js"></script>
<script language="JavaScript" SRC="funcoes/calendario.js"></script>
<script language="JavaScript" SRC="funcoes/letras_maiscula.js"></script>
</head>
<body>

<div id="overDiv" style="position:absolute; visibility:hide; z-index:1;; width: 100px; height: 5px"></div>


<? /*  ----------------	BUSCAR DADOS DE LIBERAÇÃO ------------------	*/
$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {
	
$lib_inserir = $linha["lib_inserir"]; 

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

/* DATA PREVISAO */
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
$lib_largura_especial = $linha["lib_largura_especial"];
$lib_arranjo = $linha["lib_arranjo"]; 
$lib_classe = $linha["lib_classe"]; 
$lib_rotacao = $linha["lib_rotacao"]; 
$lib_gab = $linha["lib_gab"]; 
$lib_pintura = $linha["lib_pintura"]; 
$lib_construcao = $linha["lib_construcao"]; 
$lib_carc_mot = $linha["lib_carc_mot"];


$lib_qt = $linha["lib_qt"]; 
$lib_tag = $linha["lib_tag"]; 
$lib_valor_uni = $linha["lib_valor_uni"]; 
$lib_valor_total = $linha["lib_valor_total"]; 
$lib_valor_total_os = $linha["lib_valor_total_os"]; 

$lib_obs = $linha["lib_obs"]; 

$lib_reprogramacao = $linha["lib_reprogramacao"]; 

$lib_baixa = $linha["lib_baixa"]; $lib_baixa_tipo = $linha["lib_baixa_tipo"];
$lib_data_baixa = $linha["lib_data_baixa"]; 
$lib_baixa_expedicao = $linha["lib_baixa_expedicao"];

$lib_data_prog_diaria = $linha["lib_data_prog_diaria"];

/* DATA PROG MONTAGEM */
$lib_dt_prog_montagem = $linha["lib_dt_prog_montagem"];

/* DATA PREVISAO*/
$lib_data_previsao = $linha["lib_data_previsao"];

/* DATA PREVISAO*/
$lib_n_cons_cliente = $linha["lib_n_cons_cliente"];  

/* JATEAMENTO / GALV. FOGO */
$lib_jat_g_fogo = $linha["lib_jat_g_fogo"];

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
$lib_materiais = $linha["lib_materiais"];
$lib_mat1 = $linha["lib_mat1"];
$lib_mat2 = $linha["lib_mat2"];
$lib_mat3 = $linha["lib_mat3"];
$lib_outros = $linha["lib_outros"];

/* INSPEÇÃO */
$lib_insp = $linha["lib_insp"];
/* INSPEÇÃO */


/* SETORES PCP */
$lib_setor_ver = $linha["lib_setor_ver"];
/* SETORES PCP */

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

/* SETOR CALD1 */
$lib_cald1 = $linha["lib_cald1"];
/* SETOR CALD1 */

/* SETOR CALD2 */
$lib_cald2 = $linha["lib_cald2"];
/* SETOR CALD2 */

/* SETOR PINTURA */
$lib_pintura_setor = $linha["lib_pintura_setor"];
/* SETOR PINTURA */

/* SETOR PREPARAÇÃO */
$lib_preparacao = $linha["lib_preparacao"];
/* SETOR PREPARAÇÃO */


/* SETOR ROTOR LL */
$lib_rotor_ll = $linha["lib_rotor_ll"];
/* SETOR ROTOR LL */

/* SETOR ROTOR SIR */
$lib_rotor_sir = $linha["lib_rotor_sir"];
/* SETOR ROTOR SIR */

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

/* SETOR FUNILARIA */
$lib_funilaria = $linha["lib_funilaria"];
/* SETOR FUNILARIA */

/* SETOR LASER */
$lib_laser = $linha["lib_laser"];
/* SETOR LASER */

}
?>

<form action="" method="post" name="pcp">

<? /* --------------------  INICIO CONFIGURACAO DE SELECAO  -----------------------------  */  ?>
<?
if ( $f_data_emissao <> "") {$f_data_emissao_db = "and data_emissao='$f_data_emissao'";} else {$f_data_emissao_db = "";}
if ( $f_data_emissao_mes <> "") {$f_data_emissao_mes_db = "and data_emissao LIKE '$f_data_emissao_mes%'";} else {$f_data_emissao_mes_db = "";}


if ( $f_num_os <> "") {$f_num_os_db = "and num_os='$f_num_os'";} else {$f_num_os_db = "";}
if ( $f_num_proposta <> "") {$f_num_proposta_db = "and num_proposta='$f_num_proposta'";} else {$f_num_proposta_db = "";}
if ( $f_nome_cliente <> "" ) {$f_nome_cliente_db = "and nome_cliente='$f_nome_cliente'";} else {$f_nome_cliente_db = "";}
if ( $f_oc_obra <> "" ) {$f_oc_obra_db = "and oc_obra='$f_oc_obra'";} else {$f_oc_obra_db = "";}
if ( $f_mercado <> "" ) {$f_mercado_db = "and mercado='$f_mercado'";} else {$f_mercado_db = "";}
if ( $f_estado <> "" ) {$f_estado_db = "and estado='$f_estado'";} else {$f_estado_db = "";}

if ( $f_representante <> "" ) {$f_representante_db = "and representante='$f_representante'";} else {$f_representante_db = "";}

if ( $f_data_entrega <> "" ) {$f_data_entrega_db = "and data_entrega='$f_data_entrega'";} else {$f_data_entrega_db = "";}
if ( $f_data_entrega_mes <> "") {$f_data_entrega_mes_db = "and data_entrega LIKE '$f_data_entrega_mes%'";} else {$f_data_entrega_mes_db = "";}

if ( $f_local_venda <> "" ) {$f_local_venda_db = "and local_venda='$f_local_venda'";} else {$f_local_venda_db = "";}
if ( $f_fornecimento_motor <> "" ) {$f_fornecimento_motor_db = "and fornecimento_motor='$f_fornecimento_motor'";} else {$f_fornecimento_motor_db = "";}

if ( $f_descr_vent <> "" ) {$f_descr_vent_db = "and descr_vent='$f_descr_vent'";} else {$f_descr_vent_db = "";}
if ( $f_modelo <> "" ) {$f_modelo_db = "and modelo='$f_modelo'";} else {$f_modelo_db = "";}
if ( $f_tamanho <> "" ) {$f_tamanho_db = "and tamanho='$f_tamanho'";} else {$f_tamanho_db = "";}
if ( $f_largura_especial <> "" ) {$f_largura_especial_db = "and largura_especial='$f_largura_especial'";} else {$f_largura_especial_db = "";}
if ( $f_arranjo <> "" ) {$f_arranjo_db = "and arranjo='$f_arranjo'";} else {$f_arranjo_db = "";}
if ( $f_classe <> "" ) {$f_classe_db = "and classe='$f_classe'";} else {$f_classe_db = "";}
if ( $f_rotacao <> "" ) {$f_rotacao_db = "and rotacao='$f_rotacao'";} else {$f_rotacao_db = "";}

if ( $f_gab <> "" ) {$f_gab_db = "and gab='$f_gab'";} else {$f_gab_db = "";}
if ( $f_pintura <> "" ) {$f_pintura_db = "and pintura='$f_pintura'";} else {$f_pintura_db = "";}
if ( $f_construcao <> "" ) {$f_construcao_db = "and construcao='$f_construcao'";} else {$f_construcao_db = "";}

if ( $f_carc_mot <> "" ) {$f_carc_mot_db = "and carc_mot='$f_carc_mot'";} else {$f_carc_mot_db = "";}

if ( $f_qt <> "" ) {$f_qt_db = "and qt='$f_qt'";} else {$f_qt_db = "";}
if ( $f_tag <> "" ) {$f_tag_db = "and tag='$f_tag'";} else {$f_tag_db = "";}
if ( $f_valor_uni <> "" ) {$f_valor_uni_db = "and valor_uni='$f_valor_uni'";} else {$f_valor_uni_db = "";}
if ( $f_valor_total <> "" ) {$f_valor_total_db = "and valor_total='$f_valor_total'";} else {$f_valor_total_db = "";}

if ( $f_obs <> "" ) {$f_obs_db = "and obs='$f_obs'";} else {$f_obs_db = "";}

if ( $f_data_motor_recebido <> "" ) {$f_data_motor_recebido_db = "and data_motor_recebido='$f_data_motor_recebido'";} else {$f_data_motor_recebido_db = "";}

if ( $f_reprogramacao <> "" ) {$f_reprogramacao_db = "and reprogramacao='$f_reprogramacao'";} else {$f_reprogramacao_db = "";}


if ( $organizar == "" ) {  $organizar = "data_entrega";  }

if ( $f_baixa == "" ) { $f_baixa_db = "and baixa='P'"; $f_baixa = "P"; $organizar = $organizar;  }
elseif ( $f_baixa == "TODOS") { $f_baixa_db = ""; $f_baixa = $f_baixa; $organizar = $organizar; }

if ( $f_baixa == "p" or $f_baixa == "P" ) 
{ $f_baixa_db = "and baixa='$f_baixa'"; $f_baixa_organizar = "and baixa='P'"; $f_baixa = $f_baixa; $organizar = $organizar; }

elseif ( $f_baixa == "e" or $f_baixa == "E" ) 
{ $f_baixa_db = "and baixa='$f_baixa'"; $f_baixa_organizar = "and baixa='E'"; $f_baixa = $f_baixa; $organizar = $organizar; } 

elseif ( $f_baixa == "s" or $f_baixa == "S" ) 
{ $f_baixa_db = "and baixa='$f_baixa'"; $f_baixa_organizar = "and baixa='S'"; $f_baixa = $f_baixa; $organizar = $organizar; }  

elseif ( $f_baixa == "c" or $f_baixa == "C" ) 
{ $f_baixa_db = "and baixa='$f_baixa'"; $f_baixa_organizar = "and baixa='C'"; $f_baixa = $f_baixa; $organizar = $organizar; } 


if ( $f_data_baixa <> "" ) {$f_data_baixa_db = "and data_baixa='$f_data_baixa'";} else {$f_data_baixa_db = "";}
if ( $f_data_baixa_mes <> "" ) {$f_data_baixa_mes_db = "and data_baixa LIKE '$f_data_baixa_mes%'";} else {$f_data_baixa_mes_db = "";}

if ( $f_dt_prog_montagem <> "" ) {$f_dt_prog_montagem_db = "and dt_prog_montagem='$f_dt_prog_montagem'";} else {$f_dt_prog_montagem_db = "";}

if ( $f_data_prog_diaria <> "" ) {$f_data_prog_diaria_db = "and data_prog_diaria='$f_data_prog_diaria'";} else {$f_data_prog_diaria_db = "";}

/* DATA PREVISAO */
if ( $f_data_previsao <> "" ) {$f_data_previsao_db = "and data_previsao='$f_data_previsao'";} else {$f_data_previsao_db = "";}

/* NUMERO CONSULTA CLIENTE */
if ( $f_n_cons_cliente <> "" ) {$f_n_cons_cliente_db = "and n_cons_cliente='$f_n_cons_cliente'";} else {$f_n_cons_cliente_db = "";}

/* JATEAMENTO / GALV. FOGO */
if ( $f_ts_jat_g_fogo <> "" ) {$f_ts_jat_g_fogo_db = "and ts_jat_g_fogo='$f_ts_jat_g_fogo'";} else {$f_ts_jat_g_fogo_db = "";}

if ( $f_status_jat_g_fogo <> "" ) {$f_status_jat_g_fogo_db = "and status_jat_g_fogo='$f_status_jat_g_fogo'";} else {$f_status_jat_g_fogo_db = "";}

if ( $f_dt_status_jat_g_fogo <> "" ) {$f_dt_status_jat_g_fogo_db = "and dt_status_jat_g_fogo='$f_dt_status_jat_g_fogo'";} else {$f_dt_status_jat_g_fogo_db = "";}

/*		SETOR PROJETOS		*/

if ( $f_proj_os_dt_prog <> "" ) {$f_proj_os_dt_prog_db = "and proj_os_dt_prog='$f_proj_os_dt_prog'";} else {$f_proj_os_dt_prog_db = "";}
if ( $f_proj_os_dt_entrada <> "" ) {$f_proj_os_dt_entrada_db = "and proj_os_dt_entrada='$f_proj_os_dt_entrada'";} else {$f_proj_os_dt_entrada_db = "";}
if ( $f_proj_os_dt_saida <> "" ) {$f_proj_os_dt_saida_db = "and proj_os_dt_saida='$f_proj_os_dt_saida'";} else {$f_proj_os_dt_saida_db = "";}
if ( $f_proj_os_dt_saida_mes <> "" ) {$f_proj_os_dt_saida_mes_db = "and proj_os_dt_saida LIKE '$f_proj_os_dt_saida_mes%'";} else {$f_proj_os_dt_saida_mes_db = "";}
if ( $f_proj_os_status <> "" ) {$f_proj_os_status_db = "and proj_os_status='$f_proj_os_status'";} else {$f_proj_os_status_db = "";}


if ( $f_data_book <> "" ) {$f_data_book_db = "and data_book='$f_data_book'";} else {$f_data_book_db = "";}
if ( $f_certif_balanc <> "" ) {$f_certif_balanc_db = "and certif_balanc='$f_certif_balanc'";} else {$f_certif_balanc_db = "";}
if ( $f_certif_materiais <> "" ) {$f_certif_materiais_db = "and certif_materiais='$f_certif_materiais'";} else {$f_certif_materiais_db = "";}
if ( $f_desenho_certif <> "" ) {$f_desenho_certif_db = "and desenho_certif='$f_desenho_certif'";} else {$f_desenho_certif_db = "";}


/*		SETOR PROJETOS		*/


/* MOTOR - POLIA - CARCAÇA - ROTOR DO MAXSIG */

if ( $f_mat1 <> "" ) {$f_mat1_db = "and mat1='$f_mat1'";} else {$f_mat1_db = "";}
if ( $f_mat2 <> "" ) {$f_mat2_db = "and mat2='$f_mat2'";} else {$f_mat2_db = "";}
if ( $f_mat3 <> "" ) {$f_mat3_db = "and mat3='$f_mat3'";} else {$f_mat3_db = "";}
if ( $f_outros <> "" ) {$f_outros_db = "and outros='$f_outros'";} else {$f_outros_db = "";}


/*		SETOR CORTE		*/

if ( $f_dt_prog_corte <> "" ) {$f_dt_prog_corte_db = "and dt_prog_corte='$f_dt_prog_corte'";} else {$f_dt_prog_corte_db = "";}
if ( $f_status_corte <> "" ) {$f_status_corte_db = "and status_corte='$f_status_corte'";} else {$f_status_corte_db = "";}
if ( $f_dt_previsao_corte <> "" ) {$f_dt_previsao_corte_db = "and dt_previsao_corte='$f_dt_previsao_corte'";} else {$f_dt_previsao_corte_db = "";}

/*		SETOR CORTE		*/


/*	SETOR BALANCEAMENTO  */

if ( $f_dt_prog_balanc <> "" ) {$f_dt_prog_balanc_db = "and dt_prog_balanc='$f_dt_prog_balanc'";} else {$f_dt_prog_balanc_db = "";}
if ( $f_status_balanc <> "" ) {$f_status_balanc_db = "and status_balanc='$f_status_balanc'";} else {$f_status_balanc_db = "";}
if ( $f_dt_previsao_balanc <> "" ) {$f_dt_previsao_balanc_db = "and dt_previsao_balanc='$f_dt_previsao_balanc'";} else {$f_dt_previsao_balanc_db = "";}

/*	SETOR BALANCEAMENTO	  */

/*		SETOR CALDERARIA 1		*/

if ( $f_dt_prog_cald1 <> "" ) {$f_dt_prog_cald1_db = "and dt_prog_cald1='$f_dt_prog_cald1'";} else {$f_dt_prog_cald1_db = "";}
if ( $f_status_cald1 <> "" ) {$f_status_cald1_db = "and status_cald1='$f_status_cald1'";} else {$f_status_cald1_db = "";}
if ( $f_dt_previsao_cald1 <> "" ) {$f_dt_previsao_cald1_db = "and dt_previsao_cald1='$f_dt_previsao_cald1'";} else {$f_dt_previsao_cald1_db = "";}


/*		SETOR CALDERARIA 1		*/


/*		SETOR CALDERARIA 2		*/

if ( $f_dt_prog_cald2 <> "" ) {$f_dt_prog_cald2_db = "and dt_prog_cald2='$f_dt_prog_cald2'";} else {$f_dt_prog_cald2_db = "";}
if ( $f_status_cald2 <> "" ) {$f_status_cald2_db = "and status_cald2='$f_status_cald2'";} else {$f_status_cald2_db = "";}
if ( $f_dt_previsao_cald2 <> "" ) {$f_dt_previsao_cald2_db = "and dt_previsao_cald2='$f_dt_previsao_cald2'";} else {$f_dt_previsao_cald2_db = "";}



/*		SETOR CALDERARIA 2		*/

/*		SETOR ROTOR LL		*/

if ( $f_dt_prog_rotor_ll <> "" ) {$f_dt_prog_rotor_ll_db = "and dt_prog_rotor_ll='$f_dt_prog_rotor_ll'";} else {$f_dt_prog_rotor_ll_db = "";}
if ( $f_status_rotor_ll <> "" ) {$f_status_rotor_ll_db = "and status_rotor_ll='$f_status_rotor_ll'";} else {$f_status_rotor_ll_db = "";}
if ( $f_dt_previsao_rotor_ll <> "" ) {$f_dt_previsao_rotor_ll_db = "and dt_previsao_rotor_ll='$f_dt_previsao_rotor_ll'";} else {$f_dt_previsao_rotor_ll_db = "";}

/*		SETOR ROTOR LL		*/

/*		SETOR ROTOR SIR		*/

if ( $f_dt_prog_rotor_sir <> "" ) {$f_dt_prog_rotor_sir_db = "and dt_prog_rotor_sir='$f_dt_prog_rotor_sir'";} else {$f_dt_prog_rotor_sir_db = "";}
if ( $f_status_rotor_sir <> "" ) {$f_status_rotor_sir_db = "and status_rotor_sir='$f_status_rotor_sir'";} else {$f_status_rotor_sir_db = "";}
if ( $f_dt_previsao_rotor_sir <> "" ) {$f_dt_previsao_rotor_sir_db = "and dt_previsao_rotor_sir='$f_dt_previsao_rotor_sir'";} else {$f_dt_previsao_rotor_sir_db = "";}

/*		SETOR ROTOR SIR		*/

/*	SETOR USINAGEM EIXO  */

if ( $f_dt_prog_usinagem_eixo <> "" ) {$f_dt_prog_usinagem_eixo_db = "and dt_prog_usinagem_eixo='$f_dt_prog_usinagem_eixo'";} else {$f_dt_prog_usinagem_eixo_db = "";}
if ( $f_status_usinagem_eixo <> "" ) {$f_status_usinagem_eixo_db = "and status_usinagem_eixo='$f_status_usinagem_eixo'";} else {$f_status_usinagem_eixo_db = "";}
if ( $f_dt_previsao_usinagem_eixo <> "" ) {$f_dt_previsao_usinagem_eixo_db = "and dt_previsao_usinagem_eixo='$f_dt_previsao_usinagem_eixo'";} else {$f_dt_previsao_usinagem_eixo_db = "";}

/*	SETOR USINAGEM EIXO	  */

/*	SETOR USINAGEM NUC_CUBO  */

if ( $f_dt_prog_usinagem_nuc_cubo <> "" ) {$f_dt_prog_usinagem_nuc_cubo_db = "and dt_prog_usinagem_nuc_cubo='$f_dt_prog_usinagem_nuc_cubo'";} else {$f_dt_prog_usinagem_nuc_cubo_db = "";}
if ( $f_status_usinagem_nuc_cubo <> "" ) {$f_status_usinagem_nuc_cubo_db = "and status_usinagem_nuc_cubo='$f_status_usinagem_nuc_cubo'";} else {$f_status_usinagem_nuc_cubo_db = "";}
if ( $f_dt_previsao_usinagem_nuc_cubo <> "" ) {$f_dt_previsao_usinagem_nuc_cubo_db = "and dt_previsao_usinagem_nuc_cubo='$f_dt_previsao_usinagem_nuc_cubo'";} else {$f_dt_previsao_usinagem_nuc_cubo_db = "";}

/*	SETOR USINAGEM NUC_CUBO	  */

/*	SETOR USINAGEM POL_MOT  */

if ( $f_dt_prog_usinagem_pol_mot <> "" ) {$f_dt_prog_usinagem_pol_mot_db = "and dt_prog_usinagem_pol_mot='$f_dt_prog_usinagem_pol_mot'";} else {$f_dt_prog_usinagem_pol_mot_db = "";}
if ( $f_status_usinagem_pol_mot <> "" ) {$f_status_usinagem_pol_mot_db = "and status_usinagem_pol_mot='$f_status_usinagem_pol_mot'";} else {$f_status_usinagem_pol_mot_db = "";}
if ( $f_dt_previsao_usinagem_pol_mot <> "" ) {$f_dt_previsao_usinagem_pol_mot_db = "and dt_previsao_usinagem_pol_mot='$f_dt_previsao_usinagem_pol_mot'";} else {$f_dt_previsao_usinagem_pol_mot_db = "";}

/*	SETOR USINAGEM POL_MOT	  */

/*	SETOR USINAGEM POL_VENT  */

if ( $f_dt_prog_usinagem_pol_vent <> "" ) {$f_dt_prog_usinagem_pol_vent_db = "and dt_prog_usinagem_pol_vent='$f_dt_prog_usinagem_pol_vent'";} else {$f_dt_prog_usinagem_pol_vent_db = "";}
if ( $f_status_usinagem_pol_vent <> "" ) {$f_status_usinagem_pol_vent_db = "and status_usinagem_pol_vent='$f_status_usinagem_pol_vent'";} else {$f_status_usinagem_pol_vent_db = "";}
if ( $f_dt_previsao_usinagem_pol_vent <> "" ) {$f_dt_previsao_usinagem_pol_vent_db = "and dt_previsao_usinagem_pol_vent='$f_dt_previsao_usinagem_pol_vent'";} else {$f_dt_previsao_usinagem_pol_vent_db = "";}

/*	SETOR USINAGEM POL_VENT	  */

/*	SETOR USINAGEM GAXETA  */

if ( $f_dt_prog_usinagem_gaxeta <> "" ) {$f_dt_prog_usinagem_gaxeta_db = "and dt_prog_usinagem_gaxeta='$f_dt_prog_usinagem_gaxeta'";} else {$f_dt_prog_usinagem_gaxeta_db = "";}
if ( $f_status_usinagem_gaxeta <> "" ) {$f_status_usinagem_gaxeta_db = "and status_usinagem_gaxeta='$f_status_usinagem_gaxeta'";} else {$f_status_usinagem_gaxeta_db = "";}
if ( $f_dt_previsao_usinagem_gaxeta <> "" ) {$f_dt_previsao_usinagem_gaxeta_db = "and dt_previsao_usinagem_gaxeta='$f_dt_previsao_usinagem_gaxeta'";} else {$f_dt_previsao_usinagem_gaxeta_db = "";}

/*	SETOR USINAGEM GAXETA	  */

/*  SETOR PINTURA */
if ( $f_dt_prog_pintura <> "" ) {$f_dt_prog_pintura_db = "and dt_prog_pintura='$f_dt_prog_pintura'";} else {$f_dt_prog_pintura_db = "";}
if ( $f_status_pintura <> "" ) {$f_status_pintura_db = "and status_pintura='$f_status_pintura'";} else {$f_status_pintura_db = "";}
if ( $f_dt_previsao_pintura <> "" ) {$f_dt_previsao_pintura_db = "and dt_previsao_pintura='$f_dt_previsao_pintura'";} else {$f_dt_previsao_pintura_db = "";}
/*  SETOR PINTURA  */


/*  SETOR PREPARAÇÃO */
if ( $f_dt_prog_preparacao <> "" ) {$f_dt_prog_preparacao_db = "and dt_prog_preparacao='$f_dt_prog_preparacao'";} else {$f_dt_prog_preparacao_db = "";}
if ( $f_status_preparacao <> "" ) {$f_status_preparacao_db = "and status_preparacao='$f_status_preparacao'";} else {$f_status_preparacao_db = "";}
if ( $f_dt_previsao_preparacao <> "" ) {$f_dt_previsao_preparacao_db = "and dt_previsao_preparacao='$f_dt_previsao_preparacao'";} else {$f_dt_previsao_preparacao_db = "";}
/*  SETOR PREPARAÇÃO  */

/*	SETOR MONTAGEM	  */

if ( $f_dt_prog_montagem <> "" ) {$f_dt_prog_montagem_db = "and dt_prog_montagem='$f_dt_prog_montagem'";} else {$f_dt_prog_montagem_db = "";}
if ( $f_status_montagem <> "" ) {$f_status_montagem_db = "and status_montagem='$f_status_montagem'";} else {$f_status_montagem_db = "";}
if ( $f_dt_previsao_montagem <> "" ) {$f_dt_previsao_montagem_db = "and dt_previsao_montagem='$f_dt_previsao_montagem'";} else {$f_dt_previsao_montagem_db = "";}

/*	SETOR MONTAGEM    */

/*		SETOR ALMOX		*/

if ( $f_dt_prog_almox <> "" ) {$f_dt_prog_almox_db = "and dt_prog_almox='$f_dt_prog_almox'";} else {$f_dt_prog_almox_db = "";}
if ( $f_status_almox <> "" ) {$f_status_almox_db = "and status_almox='$f_status_almox'";} else {$f_status_almox_db = "";}
if ( $f_dt_previsao_almox <> "" ) {$f_dt_previsao_almox_db = "and dt_previsao_almox='$f_dt_previsao_almox'";} else {$f_dt_previsao_almox_db = "";}

/*		SETOR ALMOX		*/

/*	SETOR GABINETE	  */

if ( $f_dt_prog_gabinete <> "" ) {$f_dt_prog_gabinete_db = "and dt_prog_gabinete='$f_dt_prog_gabinete'";} else {$f_dt_prog_gabinete_db = "";}
if ( $f_status_gabinete <> "" ) {$f_status_gabinete_db = "and status_gabinete='$f_status_gabinete'";} else {$f_status_gabinete_db = "";}
if ( $f_dt_previsao_gabinete <> "" ) {$f_dt_previsao_gabinete_db = "and dt_previsao_gabinete='$f_dt_previsao_gabinete'";} else {$f_dt_previsao_gabinete_db = "";}

/*	SETOR GABINETE	  */


/*	SETOR EXPEDICAO	  */

if ( $f_dt_prog_expedicao <> "" ) {$f_dt_prog_expedicao_db = "and dt_prog_expedicao='$f_dt_prog_expedicao'";} else {$f_dt_prog_expedicao_db = "";}
if ( $f_status_expedicao <> "" ) {$f_status_expedicao_db = "and status_expedicao='$f_status_expedicao'";} else {$f_status_expedicao_db = "";}
if ( $f_dt_previsao_expedicao <> "" ) {$f_dt_previsao_expedicao_db = "and dt_previsao_expedicao='$f_dt_previsao_expedicao'";} else {$f_dt_previsao_expedicao_db = "";}

/*	SETOR EXPEDICAO	  */


/*	SETOR FUNILARIA	  */

if ( $f_dt_prog_funilaria <> "" ) {$f_dt_prog_funilaria_db = "and dt_prog_funilaria='$f_dt_prog_funilaria'";} else {$f_dt_prog_funilaria_db = "";}
if ( $f_status_funilaria <> "" ) {$f_status_funilaria_db = "and status_funilaria='$f_status_funilaria'";} else {$f_status_funilaria_db = "";}
if ( $f_dt_previsao_funilaria <> "" ) {$f_dt_previsao_funilaria_db = "and dt_previsao_funilaria='$f_dt_previsao_funilaria'";} else {$f_dt_previsao_funilaria_db = "";}

/*	SETOR FUNILARIA   */


/*	  INSPEÇÃO	   */

if ( $f_tipo_insp <> "" ) {$f_tipo_insp_db = "and tipo_insp='$f_tipo_insp'";} else {$f_tipo_insp_db = "";}
if ( $f_cliente_insp <> "" ) {$f_cliente_insp_db = "and cliente_insp='$f_cliente_insp'";} else {$f_cliente_insp_db = "";}
if ( $f_data_insp <> "" ) {$f_data_insp_db = "and data_insp='$f_data_insp'";} else {$f_data_insp_db = "";}
if ( $f_obs_insp <> "" ) {$f_obs_insp_db = "and obs_insp='$f_obs_insp'";} else {$f_obs_insp_db = "";}

/*	  INSPEÇÃO	   */

/*		SETOR LASER	*/

if ( $f_dt_prog_laser <> "" ) {$f_dt_prog_laser_db = "and dt_prog_laser='$f_dt_prog_laser'";} else {$f_dt_prog_laser_db = "";}
if ( $f_status_laser <> "" ) {$f_status_laser_db = "and status_laser='$f_status_laser'";} else {$f_status_laser_db = "";}
if ( $f_dt_previsao_laser <> "" ) {$f_dt_previsao_laser_db = "and dt_previsao_laser='$f_dt_previsao_laser'";} else {$f_dt_previsao_laser_db = "";}

/*		SETOR LASER	*/

?>

<? /* -------------------- FIM CONFIGURACAO DE SELECAO -----------------------  */  ?>


<FIELDSET>
<LEGEND>Menu do PCP 
<input class="botao1" name="Atualizar Filtros" type="button" value="Atualizar Filtros" onclick="Atualizar_Dados();">
<a class="botao1" href="javascript:window.close()" target="_top"> Fecha Janela </a>
</LEGEND>

<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
  
    <TD>
    
      <TABLE class=legenda cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD width="1%">&nbsp;</TD>
          <TD vAlign=top width="48%">
          
            <TABLE height=1 cellSpacing=1 width="100%" border=0>
              <TBODY>
 
 
 
 <? /* --------------------  INICIO DOS BOTOES OCULTAR COLUNA  ------------------------  */  ?>
              
              <TR class=linha_cabecalho1>
 
              
<? /* DATA EMISSAO */ ?>
<? if ( $lib_data_emissao == "ver" OR $lib_data_emissao == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_data_emissao" value="checked" <?echo $check_data_emissao?> 
onMouseOver="drc('','Data Emissão'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>
             
<? /* NUMERO OS */ ?>
<TH align=middle ><P class=bordas>
<input type="hidden" name="lib_num_os" value="<?echo $lib_num_os;?>" size="7">Ocultar</P></TH>

<? /* NUMERO PROPOSTA */ ?>
<? if ( $lib_num_proposta == "ver" OR $lib_num_proposta == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_num_proposta" value="checked" <?echo $check_num_proposta?> 
onMouseOver="drc('','Número Proposta'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* NOME CLIENTE */ ?>
<? if ( $lib_nome_cliente == "ver" OR $lib_nome_cliente == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_nome_cliente" value="checked" <?echo $check_nome_cliente?> 
onMouseOver="drc('','Nome Cliente'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* OC - OBRA */ ?>
<? if ( $lib_oc_obra == "ver" OR $lib_oc_obra == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_oc_obra" value="checked" <?echo $check_oc_obra?> 
onMouseOver="drc('','OC/Obra'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* MERCADO */ ?>
<? if ( $lib_mercado == "ver" OR $lib_mercado == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_mercado" value="checked" <?echo $check_mercado?> 
onMouseOver="drc('','Mercado'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* REPRESENTANTE */ ?>
<? if ( $lib_representante == "ver" OR $lib_representante == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_representante" value="checked" <?echo $check_representante?> 
onMouseOver="drc('','Representante'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* ESTADO */ ?>
<? if ( $lib_estado == "ver" OR $lib_estado == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_estado" value="checked" <?echo $check_estado?> 
onMouseOver="drc('','Estado'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* DATA DA ENTREGA */ ?>
<? if ( $lib_data_entrega == "ver" OR $lib_data_entrega == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_data_entrega" value="checked" <?echo $check_data_entrega?> onMouseOver="drc('','Data da Entrega'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* REPROGRAMACAO */ ?>
<? if ( $lib_reprogramacao == "ver" OR $lib_reprogramacao == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_reprogramacao" value="checked" <?echo $check_reprogramacao?>  onMouseOver="drc('','Reprogramação'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* DATA PREVISAO */ ?>
<? if ( $lib_data_previsao == "ver" OR $lib_data_previsao == "alt" ) { ?>
<TH align=middle ><P class=bordas> 
<input class=botao2 type="checkbox" name="check_data_previsao" value="checked" <?echo $check_data_previsao?>  onMouseOver="drc('','Data Previsão'); return true;" onMouseOut="nd(); return true;" >

<? /* DIAS DE IMPRESSÃO */ ?>
<? if ( $check_data_previsao == "" ) { ?>
<select name="dias_previsao" onChange="Atualizar_Dados();">
<option value='3' <? echo ($dias_previsao=='3'?"SELECTED":""); ?> > 3 </option>
<option value='1' <? echo ($dias_previsao=='1'?"SELECTED":""); ?> > 1 </option>
<option value='2' <? echo ($dias_previsao=='2'?"SELECTED":""); ?> > 2 </option>
<option value='3' <? echo ($dias_previsao=='3'?"SELECTED":""); ?> > 3 </option>
<option value='4' <? echo ($dias_previsao=='4'?"SELECTED":""); ?> > 4 </option>
<option value='5' <? echo ($dias_previsao=='5'?"SELECTED":""); ?> > 5 </option>
<option value='6' <? echo ($dias_previsao=='6'?"SELECTED":""); ?> > 6 </option>
<option value='7' <? echo ($dias_previsao=='7'?"SELECTED":""); ?> > 7 </option>
</select>
Dias
<? } } ?>
</P></TH>

<? /* DATA PROG MONTAGEM */ ?>
<? if ( $lib_dt_prog_montagem == "ver" OR $lib_dt_prog_montagem == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_dt_prog_montagem" value="checked" <?echo $check_dt_prog_montagem?>  onMouseOver="drc('','Data Prog Montagem'); return true;" onMouseOut="nd(); return true;" >

<? /* DIAS DE IMPRESSÃO */ ?>
<? if ( $check_dt_prog_montagem == "" ) { ?>
<select name="dias_prog_montagem" onChange="Atualizar_Dados();">
<option value='3' <? echo ($dias_prog_montagem=='3'?"SELECTED":""); ?> > 3 </option>
<option value='1' <? echo ($dias_prog_montagem=='1'?"SELECTED":""); ?> > 1 </option>
<option value='2' <? echo ($dias_prog_montagem=='2'?"SELECTED":""); ?> > 2 </option>
<option value='3' <? echo ($dias_prog_montagem=='3'?"SELECTED":""); ?> > 3 </option>
<option value='4' <? echo ($dias_prog_montagem=='4'?"SELECTED":""); ?> > 4 </option>
<option value='5' <? echo ($dias_prog_montagem=='5'?"SELECTED":""); ?> > 5 </option>
<option value='6' <? echo ($dias_prog_montagem=='6'?"SELECTED":""); ?> > 6 </option>
<option value='7' <? echo ($dias_prog_montagem=='7'?"SELECTED":""); ?> > 7 </option>
</select>
Dias
<? } } ?>
</P></TH>

<? /* DATA PROG. DIARIA */ ?>
<? if ( $lib_data_prog_diaria == "ver" OR $lib_data_prog_diaria == "alt" ) { ?>
<TH align=middle ><P class=bordas> 
<input class=botao2 type="checkbox" name="check_data_prog_diaria" value="checked" <?echo $check_data_prog_diaria?>  onMouseOver="drc('','Data Prog. Diária'); return true;" onMouseOut="nd(); return true;" >

<? /* DIAS DE IMPRESSÃO */ ?>
<? if ( $check_data_prog_diaria == "" ) { ?>
<select name="dias_prog" onChange="Atualizar_Dados();">
<option value='3' <? echo ($dias_prog=='3'?"SELECTED":""); ?> > 3 </option>
<option value='1' <? echo ($dias_prog=='1'?"SELECTED":""); ?> > 1 </option>
<option value='2' <? echo ($dias_prog=='2'?"SELECTED":""); ?> > 2 </option>
<option value='3' <? echo ($dias_prog=='3'?"SELECTED":""); ?> > 3 </option>
<option value='4' <? echo ($dias_prog=='4'?"SELECTED":""); ?> > 4 </option>
<option value='5' <? echo ($dias_prog=='5'?"SELECTED":""); ?> > 5 </option>
<option value='6' <? echo ($dias_prog=='6'?"SELECTED":""); ?> > 6 </option>
<option value='7' <? echo ($dias_prog=='7'?"SELECTED":""); ?> > 7 </option>
</select>
Dias
<? } } ?>
</P></TH>

<? /* BAIXA EXPEDICAO */ ?>
<? if ( $lib_baixa_expedicao == "ver" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_baixa" value="checked" <?echo $check_baixa?>  onMouseOver="drc('','Baixa'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* BAIXA */ ?>
<? if ( $lib_baixa == "ver" OR $lib_baixa == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_baixa" value="checked" <?echo $check_baixa?>  onMouseOver="drc('','Baixa'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* DATA BAIXA */ ?>
<? if ( $lib_data_baixa == "ver" OR $lib_data_baixa == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_data_baixa" value="checked" <?echo $check_data_baixa?>  onMouseOver="drc('','Data da Baixa'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>


<? /* LOCAL VENDA */ ?>
<? if ( $lib_local_venda == "ver" OR $lib_local_venda == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_local_venda" value="checked" <?echo $check_local_venda?>  onMouseOver="drc('','Local Venda'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* FORNECIMENTO MOTOR */ ?>
<? if ( $lib_fornecimento_motor == "ver" OR $lib_fornecimento_motor == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_fornecimento_motor" value="checked" <?echo $check_fornecimento_motor?>  onMouseOver="drc('','Forn. Motor'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* DATA MOTOR RECEBIDO */ ?>
<? if ( $lib_data_motor_recebido == "ver" OR $lib_data_motor_recebido == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_data_motor_recebido" value="checked" <?echo $check_data_motor_recebido?>  onMouseOver="drc('','Data Motor Recebido'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* DESCRICAO VENTILADOR */ ?>
<? if ( $lib_descr_vent == "ver" OR $lib_descr_vent == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_descr_vent" value="checked" <?echo $check_descr_vent?>  onMouseOver="drc('','Descrição Vent.'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* QT */ ?>
<? if ( $lib_qt == "ver" OR $lib_qt == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_qt" value="checked" <?echo $check_qt?>  onMouseOver="drc('','QT'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* TAG */ ?>
<? if ( $lib_tag == "ver" OR $lib_tag == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_tag" value="checked" <?echo $check_tag?>  onMouseOver="drc('','TAG'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* MODELO */ ?>
<? if ( $lib_modelo == "ver" OR $lib_modelo == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_modelo" value="checked" <?echo $check_modelo?>  onMouseOver="drc('','Modelo'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* TAMANHO */ ?>
<? if ( $lib_tamanho == "ver" OR $lib_tamanho == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_tamanho" value="checked" <?echo $check_tamanho?>  onMouseOver="drc('','Tamanho'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* LARGURA ESPECIAL */ ?>
<? if ( $lib_largura_especial == "ver" OR $lib_largura_especial == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_largura_especial" value="checked" <?echo $check_largura_especial?>  onMouseOver="drc('','Largura Especial'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* ARRANJO */ ?>
<? if ( $lib_arranjo == "ver" OR $lib_arranjo == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_arranjo" value="checked" <?echo $check_arranjo?>  onMouseOver="drc('','Arranjo'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* CLASSE */ ?>
<? if ( $lib_classe == "ver" OR $lib_classe == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_classe" value="checked" <?echo $check_classe?>  onMouseOver="drc('','Classe'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* ROTACAO */ ?>
<? if ( $lib_rotacao == "ver" OR $lib_rotacao == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_rotacao" value="checked" <?echo $check_rotacao?>  onMouseOver="drc('','Rotação'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* CARC MOT */ ?>
<? if ( $lib_carc_mot == "ver" OR $lib_carc_mot == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_carc_mot" value="checked" <?echo $check_carc_mot?>  onMouseOver="drc('','Carc. Mot'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>


<? /* GAB */ ?>
<? if ( $lib_gab == "ver" OR $lib_gab == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_gab" value="checked" <?echo $check_gab?>  onMouseOver="drc('','Gabinete'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* PINTURA */ ?>
<? if ( $lib_pintura == "ver" OR $lib_pintura == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_pintura" value="checked" <?echo $check_pintura?>  onMouseOver="drc('','Pintura'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* CONSTRUÇÃO */ ?>
<? if ( $lib_construcao == "ver" OR $lib_construcao == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_construcao" value="checked" <?echo $check_construcao?>  onMouseOver="drc('','Construção'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* VALOR UNITARIO */ ?>
<? if ( $lib_valor_uni == "ver" OR $lib_valor_uni == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_valor_uni" value="checked" <?echo $check_valor_uni?>  onMouseOver="drc('','Valor Unitário'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* VALOR TOTAL */ ?>
<? if ( $lib_valor_total == "ver" OR $lib_valor_total == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_valor_total" value="checked" <?echo $check_valor_total?>  onMouseOver="drc('','Sub-Total'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* JATEAMENTO / GALV. FOTO */ ?>
<? if ( $lib_jat_g_fogo == "ver" OR $lib_jat_g_fogo == "alt" ) { ?>
<TH align=middle  colspan="3"><P class=bordas>
<input class=botao2 type="checkbox" name="check_jat_g_fogo" value="checked" <?echo $check_jat_g_fogo?>  onMouseOver="drc('','Setor Jat./Galv. Fogo'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_jat_g_fogo == "") { ?> Jat./Galv. Fogo  <? } ?>
<? } ?>
</P></TH>

<? /* MAT1 */ ?>
<? if ( $lib_mat1 == "ver" OR $lib_mat1 == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_mat1" value="checked" <?echo $check_mat1?>  onMouseOver="drc('','Mat1'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* MAT2 */ ?>
<? if ( $lib_mat2 == "ver" OR $lib_mat2 == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_mat2" value="checked" <?echo $check_mat2?>  onMouseOver="drc('','Mat2'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* MAT3 */ ?>
<? if ( $lib_mat3 == "ver" OR $lib_mat3 == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_mat3" value="checked" <?echo $check_mat3?>  onMouseOver="drc('','Mat3'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* OUTROS */ ?>
<? if ( $lib_outros == "ver" OR $lib_outros == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_outros" value="checked" <?echo $check_outros?>  onMouseOver="drc('','Outros'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* NUMERO CONSULTA CLIENTES */ ?>
<? if ( $lib_n_cons_cliente == "ver" OR $lib_n_cons_cliente == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_n_cons_cliente" value="checked" <?echo $check_n_cons_cliente?>  onMouseOver="drc('','Nº Cons. Cliente'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* OBS */ ?>
<? if ( $lib_obs == "ver" OR $lib_obs == "alt" ) { ?>
<TH align=middle ><P class=bordas>
<input class=botao2 type="checkbox" name="check_obs" value="checked" <?echo $check_obs?>  onMouseOver="drc('','Obs'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>


<? /* SETOR PROJETOS */ ?>

<? /* -------   OS   --------- */ ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle  colspan="4"><P class=bordas>
<input class=botao2 type="checkbox" name="check_proj" value="checked" <?echo $check_proj?>  onMouseOver="drc('','Setor Projeto OS'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_proj == "") { ?> Projeto OS  <? } ?>
<? } ?>
</P></TH>

<? /* --------   DOCUMENTAÇÃO    -------- */ ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle  colspan="4"><P class=bordas>
<input class=botao2 type="checkbox" name="check_documento" value="checked" <?echo $check_documento?>  onMouseOver="drc('','Setor Projeto Doc.'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_documento == "") { ?> Projeto Doc.  <? } ?>
<? } ?>
</P></TH>

<? /* SETOR PROJETOS */ ?>	


<? /* -------   INSPEÇÃO   --------- */ ?>
<? if ( $lib_insp == "ver" OR $lib_insp == "alt" ) { ?>
<TH align=middle  colspan="4"><P class=bordas>
<input class=botao2 type="checkbox" name="check_insp" value="checked" <?echo $check_insp?>  onMouseOver="drc('','Inspeção'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_insp == "") { ?> Inspeção  <? } ?>
<? } ?>
</P></TH>


<? /* SETORES PCP */ ?>

<? /* PROJETOS */ ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TH align=middle  colspan="1"><P class=bordas>
<input class=botao2 type="checkbox" name="check_projetos_ver" value="checked" <?echo $check_projetos_ver?>  onMouseOver="drc('','Proj.'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* ALMOX */ ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TH align=middle  colspan="1"><P class=bordas>
<input class=botao2 type="checkbox" name="check_almox_ver" value="checked" <?echo $check_almox_ver?>  onMouseOver="drc('','Almox'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>
<? /* EIXO */ ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TH align=middle  colspan="1"><P class=bordas>
<input class=botao2 type="checkbox" name="check_eixo_ver" value="checked" <?echo $check_eixo_ver?>  onMouseOver="drc('','Eixo'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>
<? /* NUC CUBO */ ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TH align=middle  colspan="1"><P class=bordas>
<input class=botao2 type="checkbox" name="check_nuc_cubo_ver" value="checked" <?echo $check_nuc_cubo_ver?>  onMouseOver="drc('','Nucleo Cubo'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>
<? /* POL MOT */ ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TH align=middle  colspan="1"><P class=bordas>
<input class=botao2 type="checkbox" name="check_pol_mot_ver" value="checked" <?echo $check_pol_mot_ver?>  onMouseOver="drc('','Polia Motor'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>
<? /* POL VENT */ ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TH align=middle  colspan="1"><P class=bordas>
<input class=botao2 type="checkbox" name="check_pol_vent_ver" value="checked" <?echo $check_pol_vent_ver?>  onMouseOver="drc('','Polia Vent.'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>
<? /* GAXETA */ ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TH align=middle  colspan="1"><P class=bordas>
<input class=botao2 type="checkbox" name="check_gaxeta_ver" value="checked" <?echo $check_gaxeta_ver?>  onMouseOver="drc('','Gaxeta'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>
<? /* CORTE */ ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TH align=middle  colspan="1"><P class=bordas>
<input class=botao2 type="checkbox" name="check_corte_ver" value="checked" <?echo $check_corte_ver?>  onMouseOver="drc('','Corte'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>
<? /* CALD 1 */ ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TH align=middle  colspan="1"><P class=bordas>
<input class=botao2 type="checkbox" name="check_cald1_ver" value="checked" <?echo $check_cald1_ver?>  onMouseOver="drc('','Cald. 1'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>
<? /* CALD 2 */ ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TH align=middle  colspan="1"><P class=bordas>
<input class=botao2 type="checkbox" name="check_cald2_ver" value="checked" <?echo $check_cald2_ver?>  onMouseOver="drc('','Cald. 2'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>
<? /* ROTORLL */ ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TH align=middle  colspan="1"><P class=bordas>
<input class=botao2 type="checkbox" name="check_rotorll_ver" value="checked" <?echo $check_rotorll_ver?>  onMouseOver="drc('','Rotor LL'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>
<? /* ROTORsir */ ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TH align=middle  colspan="1"><P class=bordas>
<input class=botao2 type="checkbox" name="check_rotorsir_ver" value="checked" <?echo $check_rotorsir_ver?>  onMouseOver="drc('','Rotor SIR'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>
<? /* MONTAGEM */ ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TH align=middle  colspan="1"><P class=bordas>
<input class=botao2 type="checkbox" name="check_montagem_ver" value="checked" <?echo $check_montagem_ver?>  onMouseOver="drc('','Montagem'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>
<? /* GABINETE */ ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TH align=middle  colspan="1"><P class=bordas>
<input class=botao2 type="checkbox" name="check_gabinete_ver" value="checked" <?echo $check_gabinete_ver?>  onMouseOver="drc('','Gabinete'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>
<? /* BALANCEAMENTO */ ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TH align=middle  colspan="1"><P class=bordas>
<input class=botao2 type="checkbox" name="check_balance_ver" value="checked" <?echo $check_balance_ver?>  onMouseOver="drc('','Balanceamento'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>
<? /* PINTURA */ ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TH align=middle  colspan="1"><P class=bordas>
<input class=botao2 type="checkbox" name="check_pintura_ver" value="checked" <?echo $check_pintura_ver?>  onMouseOver="drc('','Pintura'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>
<? /* EXPEDICAO */ ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TH align=middle  colspan="1"><P class=bordas>
<input class=botao2 type="checkbox" name="check_expedicao_ver" value="checked" <?echo $check_expedicao_ver?>  onMouseOver="drc('','Expedição'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>
<? /* FUNILARIA */ ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TH align=middle  colspan="1"><P class=bordas>
<input class=botao2 type="checkbox" name="check_funilaria_ver" value="checked" <?echo $check_funilaria_ver?>  onMouseOver="drc('','Funilaria'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>

<? /* LASER */ ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TH align=middle  colspan="1"><P class=bordas>
<input class=botao2 type="checkbox" name="check_laser_ver" value="checked" <?echo $check_laser_ver?>  onMouseOver="drc('','Laser'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</P></TH>


<? /* SETORES PCP */ ?>


<? /* SETOR ALMOX */ ?>

<? if ( $lib_almox == "ver" OR $lib_almox == "alt" ) { ?>
<TH align=middle  colspan="3"><P class=bordas>
<input class=botao2 type="checkbox" name="check_almox" value="checked" <?echo $check_almox?>  onMouseOver="drc('','Setor Almoxarifado'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_almox == "") { ?> Almoxarifado <? } ?>
<? } ?>
</P></TH>

<? /* SETOR ALMOX */ ?>	


<? /* SETOR CORTE */ ?>

<? if ( $lib_corte == "ver" OR $lib_corte == "alt" ) { ?>
<TH align=middle  colspan="3"><P class=bordas>
<input class=botao2 type="checkbox" name="check_corte" value="checked" <?echo $check_corte?>  onMouseOver="drc('','Setor Corte'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_corte == "") { ?> Corte <? } ?>
<? } ?>
</P></TH>

<? /* SETOR CORTE */ ?>	

<? /* SETOR BALANCEAMENTO */ ?>

<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" ) { ?>
<TH align=middle  colspan="3"><P class=bordas>
<input class=botao2 type="checkbox" name="check_balanc" value="checked" <?echo $check_balanc?>  onMouseOver="drc('','Setor Balanceamento'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_balanc == "") { ?> Balanceamento <? } ?>
<? } ?>
</P></TH>

<? /* SETOR BALANCEAMENTO */ ?>  

<? /* SETOR CALDERARIA 1 */ ?>

<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" ) { ?>
<TH align=middle  colspan="3"><P class=bordas>
<input class=botao2 type="checkbox" name="check_cald1" value="checked" <?echo $check_cald1?>  onMouseOver="drc('','Setor Calderaria I'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_cald1 == "") { ?> Calderaria I <? } ?>
<? } ?>
</P></TH>

<? /* SETOR CALDERARIA 1 */ ?>

<? /* SETOR CALDERARIA 2 */ ?>

<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" ) { ?>
<TH align=middle  colspan="3"><P class=bordas>
<input class=botao2 type="checkbox" name="check_cald2" value="checked" <?echo $check_cald2?>  onMouseOver="drc('','Setor Calderaria II'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_cald2 == "") { ?> Calderaria II <? } ?>
<? } ?>
</P></TH>

<? /* SETOR CALDERARIA 2 */ ?>  

<? /* SETOR PINTURA */ ?>

<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" ) { ?>
<TH align=middle  colspan="3"><P class=bordas>
<input class=botao2 type="checkbox" name="check_pinturasetor" value="checked" <?echo $check_pinturasetor?>  onMouseOver="drc('','Setor Pintura'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_pinturasetor == "") { ?> Pintura <? } ?>
<? } ?>
</P></TH>

<? /* SETOR PINTURA */ ?>   


<? /* SETOR PREPARAÇÃO */ ?>

<? if ( $lib_preparacao == "ver" OR $lib_preparacao == "alt" ) { ?>
<TH align=middle  colspan="3"><P class=bordas>
<input class=botao2 type="checkbox" name="check_preparacao" value="checked" <?echo $check_preparacao?>  onMouseOver="drc('','Setor Preparação'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_preparacao == "") { ?> Preparação <? } ?>
<? } ?>
</P></TH>

<? /* SETOR PREPARAÇÃO */ ?>   


<? /* SETOR ROTOR LL */ ?>

<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" ) { ?>
<TH align=middle  colspan="3"><P class=bordas>
<input class=botao2 type="checkbox" name="check_rotor_ll" value="checked" <?echo $check_rotor_ll?>  onMouseOver="drc('','Setor Rotor LL'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_rotor_ll == "") { ?> Rotor LL <? } ?>
<? } ?>
</P></TH>

<? /* SETOR ROTOR LL */ ?>  


<? /* SETOR ROTOR SIR */ ?>

<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" ) { ?>
<TH align=middle  colspan="3"><P class=bordas>
<input class=botao2 type="checkbox" name="check_rotor_sir" value="checked" <?echo $check_rotor_sir?>  onMouseOver="drc('','Setor Rotor SIR'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_rotor_sir == "") { ?> Rotor SIR <? } ?>
<? } ?>
</P></TH>

<? /* SETOR ROTOR SIR */ ?>  


<? /* SETOR MONTAGEM */ ?>

<? if ( $lib_montagem == "ver" OR $lib_montagem == "alt" ) { ?>
<TH align=middle  colspan="3"><P class=bordas>
<input class=botao2 type="checkbox" name="check_montagem" value="checked" <?echo $check_montagem?>  onMouseOver="drc('','Setor Montagem'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_montagem == "") { ?> Montagem <? } ?>
<? } ?>
</P></TH>

<? /* SETOR MONTAGEM */ ?>  

<? /* SETOR GABINETE */ ?>

<? if ( $lib_gabinete == "ver" OR $lib_gabinete == "alt" ) { ?>
<TH align=middle  colspan="3"><P class=bordas>
<input class=botao2 type="checkbox" name="check_gabinete" value="checked" <?echo $check_gabinete?>  onMouseOver="drc('','Setor Gabinete'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_montagem == "") { ?> Gabinete <? } ?>
<? } ?>
</P></TH>

<? /* SETOR GABINETE */ ?> 

<? /* SETOR USINAGEM EIXO */ ?>

<? if ( $lib_usinagem_eixo == "ver" OR $lib_usinagem_eixo == "alt" ) { ?>
<TH align=middle  colspan="3"><P class=bordas>
<input class=botao2 type="checkbox" name="check_usinagem_eixo" value="checked" <?echo $check_usinagem_eixo?>  onMouseOver="drc('','Setor Usinagem Eixo'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_usinagem_eixo == "") { ?> Usinagem Eixo <? } ?>
<? } ?>
</P></TH>

<? /* SETOR USINAGEM EIXO */ ?>	

<? /* SETOR USINAGEM NUC_CUBO */ ?>

<? if ( $lib_usinagem_nuc_cubo == "ver" OR $lib_usinagem_nuc_cubo == "alt" ) { ?>
<TH align=middle  colspan="3"><P class=bordas>
<input class=botao2 type="checkbox" name="check_usinagem_nuc_cubo" value="checked" <?echo $check_usinagem_nuc_cubo?>  onMouseOver="drc('','Setor Usinagem Nuc.Cubo'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_usinagem_nuc_cubo == "") { ?> Usinagem Nuc.Cubo <? } ?>
<? } ?>
</P></TH>

<? /* SETOR USINAGEM NUC_CUBO */ ?>	

<? /* SETOR USINAGEM POL_MOT */ ?>

<? if ( $lib_usinagem_pol_mot == "ver" OR $lib_usinagem_pol_mot == "alt" ) { ?>
<TH align=middle  colspan="3"><P class=bordas>
<input class=botao2 type="checkbox" name="check_usinagem_pol_mot" value="checked" <?echo $check_usinagem_pol_mot?>  onMouseOver="drc('','Setor Usinagem Pol.Mot'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_usinagem_pol_mot == "") { ?> Usinagem Pol.Mot <? } ?>
<? } ?>
</P></TH>

<? /* SETOR USINAGEM POL_MOT */ ?>

<? /* SETOR USINAGEM POL_VENT */ ?>

<? if ( $lib_usinagem_pol_vent == "ver" OR $lib_usinagem_pol_vent == "alt" ) { ?>
<TH align=middle  colspan="3"><P class=bordas>
<input class=botao2 type="checkbox" name="check_usinagem_pol_vent" value="checked" <?echo $check_usinagem_pol_vent?>  onMouseOver="drc('','Setor Usinagem Pol.Vent'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_usinagem_pol_vent == "") { ?> Usinagem Pol.Vent <? } ?>
<? } ?>
</P></TH>

<? /* SETOR USINAGEM POL_VENT */ ?>

<? /* SETOR USINAGEM GAXETA */ ?>

<? if ( $lib_usinagem_gaxeta == "ver" OR $lib_usinagem_gaxeta == "alt" ) { ?>
<TH align=middle  colspan="3"><P class=bordas>
<input class=botao2 type="checkbox" name="check_usinagem_gaxeta" value="checked" <?echo $check_usinagem_gaxeta?>  onMouseOver="drc('','Setor Usinagem Gaxeta'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_usinagem_gaxeta == "") { ?> Usinagem Gaxeta <? } ?>
<? } ?>
</P></TH>

<? /* SETOR USINAGEM GAXETA */ ?>

<? /* SETOR EXPEDICAO */ ?>

<? if ( $lib_expedicao == "ver" OR $lib_expedicao == "alt" ) { ?>
<TH align=middle  colspan="3"><P class=bordas>
<input class=botao2 type="checkbox" name="check_expedicao" value="checked" <?echo $check_expedicao?>  onMouseOver="drc('','Setor Expedição'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_expedicao == "") { ?> Expedição <? } ?>
<? } ?>
</P></TH>

<? /* SETOR EXPEDICAO */ ?>

<? /* SETOR FUNILARIA */ ?>

<? if ( $lib_funilaria == "ver" OR $lib_funilaria == "alt" ) { ?>
<TH align=middle  colspan="3"><P class=bordas>
<input class=botao2 type="checkbox" name="check_funilaria" value="checked" <?echo $check_funilaria?>  onMouseOver="drc('','Setor Funilaria'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_funilaria == "") { ?> Funilaria <? } ?>
<? } ?>
</P></TH>

<? /* SETOR FUNILARIA */ ?>

<? /* SETOR LASER */ ?>

<? if ( $lib_laser == "ver" OR $lib_laser == "alt" ) { ?>
<TH align=middle  colspan="3"><P class=bordas>
<input class=botao2 type="checkbox" name="check_laser" value="checked" <?echo $check_laser?>  onMouseOver="drc('','Setor Laser'); return true;" onMouseOut="nd(); return true;" >
<? if ($check_laser == "") { ?> Laser <? } ?>
<? } ?>
</P></TH>

<? /* SETOR LASER*/ ?>	
		  
		</TR>

<? /* --------------------  FIM DOS BOTOES OCULTAR COLUNA  -----------------------------  */  ?>



<? /* --------------------  INICIO DOS BOTOES ORGANIZACAO  -----------------------------  */  ?>

		<TR class=linha_cabecalho>

<? /* DATA EMISSÃO */ ?>
<? if ( $lib_data_emissao == "ver" Or $lib_data_emissao == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_data_emissao == "" ) { ?> 
<input class=botao4 type="radio" name="organizar" value="data_emissao" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Dt. Emissão'); return true;" onMouseOut="nd(); return true;"> Dt. Emissão <? } } ?></P></TH>

<? /* NUM_OS */ ?>             
<? if ( $lib_num_os == "ver" Or $lib_num_os == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if (  $check_num_os == "" ) { ?> 
<input class=botao4 type="radio" name="organizar" value="num_os" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Núm. O.S'); return true;" onMouseOut="nd(); return true;"> N° O.S <? } } ?></P></TH>

<? /* NUM_PROPOSTA */ ?>
<? if ( $lib_num_proposta == "ver" Or $lib_num_proposta == "alt" ) { ?> 
<TH align=middle  ><P class=bordas>
<?	if ( $check_num_proposta == "") { ?> 
<input class=botao4 type="radio" name="organizar" value="num_proposta" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Núm. Proposta'); return true;" onMouseOut="nd(); return true;"> N° Proposta <? } } ?></P></TH>

<? /* NOME CLIENTE */ ?> 
<? if ( $lib_nome_cliente == "ver" Or $lib_nome_cliente == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_nome_cliente == "") { ?> 
<input class=botao4 type="radio" name="organizar" value="nome_cliente" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Nome Cliente'); return true;" onMouseOut="nd(); return true;"> Nome Cliente <? } } ?></P></TH>

<? /* OC / OBRA */ ?>
<? if ( $lib_oc_obra == "ver" Or $lib_oc_obra == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_oc_obra == "") { ?> 
<input class=botao4 type="radio" name="organizar" value="oc_obra" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Oc_Obra'); return true;" onMouseOut="nd(); return true;">OC / Obra <? } } ?></P></TH>

<? /* MERCADO */ ?>
<? if ( $lib_mercado == "ver" Or $lib_mercado == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_mercado == "") { ?> 
<input class=botao4 type="radio" name="organizar" value="mercado" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Mercado'); return true;" onMouseOut="nd(); return true;"> Merc. <? } } ?></P></TH>

<? /* REPRESENTANTE */ ?>
<? if ( $lib_representante == "ver" Or $lib_representante == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_representante == "") { ?> 
<input class=botao4 type="radio" name="organizar" value="mercado" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Representante'); return true;" onMouseOut="nd(); return true;"> Repres. <? } } ?></P></TH>
                      
<? /* ESTADO */ ?>
<? if ( $lib_estado == "ver" Or $lib_estado == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_estado == "") {?> 
<input class=botao4 type="radio" name="organizar" value="estado" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Estado'); return true;" onMouseOut="nd(); return true;"> Estado <? } } ?></P></TH>

<? /* DATA DA ENTREGA */ ?>
<? if ( $lib_data_entrega == "ver" Or $lib_data_entrega == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_data_entrega == "") {?> 
<input class=botao4 type="radio" name="organizar" value="data_entrega" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Data Entrega'); return true;" onMouseOut="nd(); return true;"> Dt. Entrega <? } } ?></P></TH>

<? /* REPROGRAMACAO */ ?>
<? if ( $lib_reprogramacao == "ver" Or $lib_reprogramacao == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_reprogramacao == "") {?> 
<input class=botao4 type="radio" name="organizar" value="reprogramacao" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Reprogramação'); return true;" onMouseOut="nd(); return true;"> Reprog. <? } } ?></P></TH>

<?/*  DATA PREVISAO  */?>
<? if ( $lib_data_previsao == "ver" Or $lib_data_previsao == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_data_previsao == "") {?> 
<input class=botao4 type="radio" name="organizar" value="data_previsao" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Data Previsão'); return true;" onMouseOut="nd(); return true;"> Dt. Previsão <? } } ?></P></TH>

<?/*  DATA PROG. MONTAGEM  */?>
<? if ( $lib_dt_prog_montagem == "ver" Or $lib_dt_prog_montagem == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_dt_prog_montagem == "") {?> 
<input class=botao4 type="radio" name="organizar" value="dt_prog_montagem" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Data Prog. Montagem'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. Montagem <? } } ?></P></TH>

<?/*  DATA PROG. DIÁRIA  */?>
<? if ( $lib_data_prog_diaria == "ver" Or $lib_data_prog_diaria == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_data_prog_diaria == "") {?> 
<input class=botao4 type="radio" name="organizar" value="data_prog_diaria" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Data Prog. Diária'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. Diária <? } } ?></P></TH>

<? /* BAIXA EXPEDICAO */ ?>
<? if ( $lib_baixa_expedicao == "ver" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_baixa == "") {?> 
<input class=botao4 type="radio" name="organizar" value="baixa" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Baixa'); return true;" onMouseOut="nd(); return true;"> Baixa <? } } ?></P></TH>

<? /* BAIXA */ ?>
<? if ( $lib_baixa == "ver" Or $lib_baixa == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_baixa == "") {?> 
<input class=botao4 type="radio" name="organizar" value="baixa" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Baixa'); return true;" onMouseOut="nd(); return true;"> Baixa <? } } ?></P></TH>

<? /* DATA BAIXA */ ?>
<? if ( $lib_data_baixa == "ver" Or $lib_data_baixa == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_data_baixa == "") {?> 
<input class=botao4 type="radio" name="organizar" value="data_baixa" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Data Baixa'); return true;" onMouseOut="nd(); return true;"> Dt. da Baixa <? } } ?></P></TH>

<? /* LOCAL VENDA */ ?>
<? if ( $lib_local_venda == "ver" Or $lib_local_venda == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_local_venda == "") {?> 
<input class=botao4 type="radio" name="organizar" value="local_venda" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Local Venda'); return true;" onMouseOut="nd(); return true;"> Local Venda <? } } ?></P></TH>

<? /* FORNECIMENTO MOTOR */ ?>
<? if ( $lib_fornecimento_motor == "ver" Or $lib_fornecimento_motor == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_fornecimento_motor == "") {?> 
<input class=botao4 type="radio" name="organizar" value="fornecimento_motor" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Forn. Motor'); return true;" onMouseOut="nd(); return true;"> Forn. Mot. <? } } ?></P></TH>

<? /* DATA MOTOR RECEBIDO */ ?>
<? if ( $lib_data_motor_recebido == "ver" Or $lib_data_motor_recebido == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if (  $check_data_motor_recebido == "") {?> 
<input class=botao4 type="radio" name="organizar" value="data_motor_recebido" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Data Motor Recebido'); return true;" onMouseOut="nd(); return true;"> Dt. Motor Recebido <? } } ?></P></TH>

<? /* DESCRICAO VENT */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $lib_descr_vent == "ver" Or $lib_descr_vent == "alt" ) { 
	if ( $check_descr_vent == "") {?> 
<input class=botao4 type="radio" name="organizar" value="descr_vent" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Descrição Ventilador'); return true;" onMouseOut="nd(); return true;"> Descr. Vent. <? } } ?></P></TH>

<? /* QT */ ?>
<? if ( $lib_qt == "ver" Or $lib_qt == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_qt == "") {?> 
<input class=botao4 type="radio" name="organizar" value="qt" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar QT'); return true;" onMouseOut="nd(); return true;"> QT <? } } ?></P></TH>

<? /* TAG */ ?>
<? if ( $lib_tag == "ver" Or $lib_tag == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_tag == "") {?> 
<input class=botao4 type="radio" name="organizar" value="tag" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar TAG'); return true;" onMouseOut="nd(); return true;"> TAG <? } } ?></P></TH>

<? /* MODELO */ ?>
<? if ( $lib_modelo == "ver" Or $lib_modelo == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_modelo == "") {?> 
<input class=botao4 type="radio" name="organizar" value="modelo" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Modelo'); return true;" onMouseOut="nd(); return true;"> Mod. <? } } ?></P></TH>

<? /* TAMANHO */ ?>
<? if ( $lib_tamanho == "ver" Or $lib_tamanho == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_tamanho == "") {?> 
<input class=botao4 type="radio" name="organizar" value="tamanho" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Tamanho'); return true;" onMouseOut="nd(); return true;"> Tam. <? } } ?></P></TH>

<? /* LARGURA ESPECIAL */ ?>
<? if ( $lib_largura_especial == "ver" Or $lib_largura_especial == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_largura_especial == "") {?> 
<input class=botao4 type="radio" name="organizar" value="largura_especial" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Largura Especial'); return true;" onMouseOut="nd(); return true;"> Lar. Esp. <? } } ?></P></TH>

<? /* ARRANJO */ ?>
<? if ( $lib_arranjo == "ver" Or $lib_arranjo == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_arranjo == "") {?> 
<input class=botao4 type="radio" name="organizar" value="arranjo" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Arranjo'); return true;" onMouseOut="nd(); return true;"> Arr. <? } } ?></P></TH>

<? /* CLASSE */ ?>
<? if ( $lib_classe == "ver" Or $lib_classe == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_classe == "") {?> 
<input class=botao4 type="radio" name="organizar" value="classe" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Classe'); return true;" onMouseOut="nd(); return true;"> Cl. <? } } ?></P></TH>

<? /* ROTACAO */ ?>
<? if ( $lib_rotacao == "ver" Or $lib_rotacao == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_rotacao == "") {?> 
<input class=botao4 type="radio" name="organizar" value="rotacao" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Rotação'); return true;" onMouseOut="nd(); return true;"> Rot. <? } } ?></P></TH>

<? /* CARC MOT */ ?>
<? if ( $lib_carc_mot == "ver" Or $lib_carc_mot == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_carc_mot == "") {?> 
<input class=botao4 type="radio" name="organizar" value="carc_mot" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Carc. Mot'); return true;" onMouseOut="nd(); return true;"> Carc. Mot <? } } ?></P></TH>

<? /* GABINETE */ ?>
<? if ( $lib_gab == "ver" Or $lib_gab == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_gab == "") {?>
<input class=botao4 type="radio" name="organizar" value="gab" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Gabinete'); return true;" onMouseOut="nd(); return true;"> Gab. <? } } ?></P></TH>

<? /* PINTURA */ ?>
<? if ( $lib_pintura == "ver" Or $lib_pintura == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_pintura == "") {?> 
<input class=botao4 type="radio" name="organizar" value="pintura" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Pintura'); return true;" onMouseOut="nd(); return true;"> Pint. <? } } ?></P></TH>

<? /* CONSTRUÇÃO */ ?>
<? if ( $lib_construcao == "ver" Or $lib_construcao == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_construcao == "") {?> 
<input class=botao4 type="radio" name="organizar" value="construcao" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Construção'); return true;" onMouseOut="nd(); return true;"> Const. <? } } ?></P></TH>

<? /* VALOR UNITARIO */ ?>
<? if ( $lib_valor_uni == "ver" Or $lib_valor_uni == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_valor_uni == "") {?> 
<input class=botao4 type="radio" name="organizar" value="valor_uni" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Valor Unitário'); return true;" onMouseOut="nd(); return true;"> Valor Un. <? } } ?></P></TH>

<? /* VALOR TOTAL O.S */ ?>
<? if ( $lib_valor_total == "ver" Or $lib_valor_total == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_valor_total == "") {?> 
<input class=botao4 type="radio" name="organizar" value="valor_total" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Valor Total'); return true;" onMouseOut="nd(); return true;"> Sub-Total <? } } ?></P></TH>

<? /* 		JATEAMENTO / GALV. FOTO 	*/ ?>

<? if ( $lib_jat_g_fogo == "ver" Or $lib_jat_g_fogo == "alt" ) { ?>
	
<? /* TS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_jat_g_fogo == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="ts_jat_g_fogo" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar T. S.'); return true;" onMouseOut="nd(); return true;"> T.S. </P></TH>
<? } ?>

<? /* PROJ OS STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_jat_g_fogo == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_jat_g_fogo" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Status'); return true;" onMouseOut="nd(); return true;"> Status </P></TH>
<? } ?>

<? /* DT STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_jat_g_fogo == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="dt_status_jat_g_fogo" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Dt. Status.'); return true;" onMouseOut="nd(); return true;"> Dt. Status </P></TH>
<? } ?>

<? } ?>

<? /* 		JATEAMENTO / GALV. FOTO 	*/ ?>

<? /* MOTOR MAXSIG */ ?>
<? if ( $lib_mat1 == "ver" Or $lib_mat1 == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_mat1 == "") {?> 
<input class=botao4 type="radio" name="organizar" value="mat1" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Mat1'); return true;" onMouseOut="nd(); return true;"> Mat1 <? } } ?></P></TH>

<? /* POLIA MAXSIG */ ?>
<? if ( $lib_mat2 == "ver" Or $lib_mat2 == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_mat2 == "") {?> 
<input class=botao4 type="radio" name="organizar" value="mat2" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Mat2'); return true;" onMouseOut="nd(); return true;"> Mat2 <? } } ?></P></TH>

<? /* FUND MAXSIG */ ?>
<? if ( $lib_mat3 == "ver" Or $lib_mat3 == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_mat3 == "") {?> 
<input class=botao4 type="radio" name="organizar" value="mat3" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Mat3'); return true;" onMouseOut="nd(); return true;"> Mat3 <? } } ?></P></TH>
		
<? /* OUTROS MAXSIG */ ?>
<? if ( $lib_outros == "ver" Or $lib_outros == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_outros == "") {?> 
<input class=botao4 type="radio" name="organizar" value="outros" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Outros'); return true;" onMouseOut="nd(); return true;"> Outros <? } } ?></P></TH>

<? /* NUMERO CONSULTA CLIENTE */ ?>
<? if ( $lib_n_cons_cliente == "ver" Or $lib_n_cons_cliente == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_n_cons_cliente == "") {?> 
<input class=botao4 type="radio" name="organizar" value="n_cons_cliente" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Nº Cons. Cliente'); return true;" onMouseOut="nd(); return true;"> Nº Cons. Cliente <? } } ?></P></TH>

<? /* OBS */ ?>
<? if ( $lib_obs == "ver" Or $lib_obs == "alt" ) { ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_obs == "") {?> 
<input class=botao4 type="radio" name="organizar" value="obs" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar OBS'); return true;" onMouseOut="nd(); return true;"> OBS <? } } ?></P></TH> 

	
<? /* 		SETOR PROJETOS ----  OS		*/ ?>


<? if ( $lib_proj == "ver" Or $lib_proj == "alt" ) { ?>
	
<? /* PROJ OS DT PROG */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_proj == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="proj_os_dt_prog" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Proj. O.S Dt. Prog'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. </P></TH>
<? } ?>

<? /* PROJ OS STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_proj == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="proj_os_status" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Proj. O.S Status'); return true;" onMouseOut="nd(); return true;"> Status </P></TH>
<? } ?>

<? /* PROJ OS DT ENTRADA */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_proj == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="proj_os_dt_entrada" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Proj. Dt. Entr.'); return true;" onMouseOut="nd(); return true;"> Dt. Em Produção </P></TH>
<? } ?>

<? /* PROJ OS DT SAIDA */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_proj == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="proj_os_dt_saida" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Proj. Dt. Saida'); return true;" onMouseOut="nd(); return true;"> Dt. Expedição
</P></TH>	

<? } ?>

<? /* 		SETOR PROJETOS ----  OS		*/ ?>


<? /* 		SETOR PROJETOS ----  DOCUMENTOS	*/ ?>

<? /* PROJ DOC. DATA BOOK */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_documento == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="data_book" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Data Book'); return true;" onMouseOut="nd(); return true;"> DB
</P></TH>
<? } ?>

<? /* PROJ DOC. CERTIFICADO BALANCEAMENTO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_documento == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="certif_balanc" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Certif. Balanceamento'); return true;" onMouseOut="nd(); return true;"> CB
</P></TH>
<? } ?>

<? /* PROJ DOC. CERTIFICADO MATERIAIS  */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_documento == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="certif_materiais" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Certif. Mateirais'); return true;" onMouseOut="nd(); return true;"> CM
</P></TH>
<? } ?>

<? /* PROJ DOC. DESENHOS CERTIFICADO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_documento == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="desenho_certif" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Desenho Certif.'); return true;" onMouseOut="nd(); return true;"> DC
</P></TH>
<? } ?>

<? } ?>

<? /* 		SETOR PROJETOS ----  DOCUMENTOS	*/ ?> 


<? /* 	======	INSPEÇÃO  =======  	*/ ?>


<? if ( $lib_insp == "ver" Or $lib_insp == "alt" ) { ?>
	
<? /* TIPO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_insp == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="tipo_insp" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Tipo Inspeção'); return true;" onMouseOut="nd(); return true;"> Tipo </P></TH>
<? } ?>

<? /* CÇLIENTE */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_insp == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="cliente_insp" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Cliente Inspeção'); return true;" onMouseOut="nd(); return true;"> Cliente </P></TH>
<? } ?>

<? /* DATA */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_insp == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="data_insp" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Data Inspeção'); return true;" onMouseOut="nd(); return true;"> Data </P></TH>
<? } ?>

<? /* OBS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_insp == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="obs_insp" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Obs Inspeção'); return true;" onMouseOut="nd(); return true;"> Obs
</P></TH>	

<? } } ?>

<? /* 	======	INSPEÇÃO  =======  	*/ ?>



<? /* 	SETORES PCP    */ ?>

<? if ( $lib_setor_ver == "sim" ) {?>

<? /* PROJETOS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_projetos_ver == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="proj_os_status" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Proj. Status'); return true;" onMouseOut="nd(); return true;"> Proj. </P></TH>
<? } ?>

<? /* ALMOX */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_almox_ver == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="status_almox" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Almox. Status'); return true;" onMouseOut="nd(); return true;"> Almox. </P></TH>
<? } ?>
	
<? /* USINAGEM EIXO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_eixo_ver == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_usinagem_eixo" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Usi. Status'); return true;" onMouseOut="nd(); return true;"> Eixo </P></TH>
<? } ?>

<? /* USINAGEM NUC CUBP */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_nuc_cubo_ver == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_usinagem_nuc_cubo" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Usi. Status'); return true;" onMouseOut="nd(); return true;"> Nuc. Cubo </P></TH>
<? } ?>

<? /* USINAGEM POL MOT */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_pol_mot_ver == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_usinagem_pol_mot" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Usi. Status'); return true;" onMouseOut="nd(); return true;"> Pol. Mot. </P></TH>
<? } ?>

<? /* USINAGEM POL Vent */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_pol_vent_ver == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_usinagem_pol_vent" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Usi. Status'); return true;" onMouseOut="nd(); return true;"> Pol. Vent. </P></TH>
<? } ?>
	
<? /* USINAGEM POL Vent */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_gaxeta_ver == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_usinagem_gaxeta" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Usi. Status'); return true;" onMouseOut="nd(); return true;"> Gaxeta </P></TH>
<? } ?>
	
<? /* CORTE */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_corte_ver == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="status_corte" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Corte Status'); return true;" onMouseOut="nd(); return true;"> Corte </P></TH>
<? } ?>

<? /* CALDERARIA I */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_cald1_ver == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_cald1" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Cald. I Status'); return true;" onMouseOut="nd(); return true;"> Cald. I </P></TH>
<? } ?>

<? /* CALDERARIA 2 */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_cald2_ver == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_cald2" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Cald. II Status'); return true;" onMouseOut="nd(); return true;"> Cald. II </P></TH>
<? } ?>

<? /* ROTOR LL */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_rotorll_ver == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_rotor_ll" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Rot. LL Status'); return true;" onMouseOut="nd(); return true;"> Rot. LL </P></TH>
<? } ?>

<? /* ROTOR SIR */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_rotorsir_ver == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_rotor_sir" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Rot. SIR Status'); return true;" onMouseOut="nd(); return true;"> Rot. SIR </P></TH>
<? } ?>

<? /* MONTAGEM */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_montagem_ver == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_montagem" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Montagem Status'); return true;" onMouseOut="nd(); return true;"> Montagem </P></TH>
<? } ?>

<? /* GABINETE */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_gabinete_ver == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_gabinete" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Gabinete Status'); return true;" onMouseOut="nd(); return true;"> Gabinete </P></TH>
<? } ?>

<? /* BALANCEAMENTO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_balance_ver == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_balanc" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Balanc. Status'); return true;" onMouseOut="nd(); return true;"> Balanc. </P></TH>
<? } ?>

<? /* PINTURA */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_pintura_ver == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_pintura" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Pintura Status'); return true;" onMouseOut="nd(); return true;"> Pintura </P></TH>
<? } ?>

<? /* EXPEDICAO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_expedicao_ver == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_expedicao" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Exp. Status'); return true;" onMouseOut="nd(); return true;"> Expedição </P></TH>
<? } ?>

<? /* FUNILARIA */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_funilaria_ver == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="status_funilaria" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Fun. Status'); return true;" onMouseOut="nd(); return true;"> Funilaria </P></TH>
<? } ?>


<? /* LASER*/ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_laser_ver == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="status_laser" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Laser Status'); return true;" onMouseOut="nd(); return true;"> Laser </P></TH>
<? } ?>


<? } ?>

<? /* 	SETORES PCP   */ ?>


<? /* 	SETOR ALMOX    */ ?>

<? if ( $lib_almox == "ver" Or $lib_almox == "alt" ) {?>
	
<? /* DT PROG */ ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_almox == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="dt_prog_almox" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Almox. Dt. Prog'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. </P></TH>
<? } ?>

<? /* OS STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_almox == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_almox" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Almox. Status'); return true;" onMouseOut="nd(); return true;"> Status </P></TH>
<? } ?>

<? /* DT PREVISAO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_almox == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="dt_previsao_almox" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Almox. Dt Previsão'); return true;" onMouseOut="nd(); return true;"> Dt Previsão </P></TH>
<? } ?>
<? } ?>

<? /* 	SETOR ALMOX   */ ?>


<? /* 	SETOR CORTE    */ ?>

<? if ( $lib_corte == "ver" Or $lib_corte == "alt" ) {?>
	
<? /* DT PROG */ ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_corte == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="dt_prog_corte" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Corte Dt. Prog'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. </P></TH>
<? } ?>

<? /* OS STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_corte == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_corte" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Corte Status'); return true;" onMouseOut="nd(); return true;"> Status </P></TH>
<? } ?>

<? /* DT PREVISAO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_corte == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="dt_previsao_corte" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Corte Dt Previsão'); return true;" onMouseOut="nd(); return true;"> Dt Previsão </P></TH>
<? } ?>
<? } ?>

<? /* 	SETOR CORTE   */ ?>


<? /* 	SETOR BALANCEAMENTO    */ ?>

<? if ( $lib_balanc == "ver" Or $lib_balanc == "alt" ) {?>
	
<? /* DT PROG */ ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_balanc == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="dt_prog_balanc" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Balanc. Dt. Prog'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. </P></TH>
<? } ?>

<? /* STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_balanc == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_balanc" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Balanc. Status'); return true;" onMouseOut="nd(); return true;"> Status </P></TH>
<? } ?>

<? /* DT PREVISAO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_balanc == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="dt_previsao_balanc" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Balanc. Dt Previsão'); return true;" onMouseOut="nd(); return true;"> Dt Previsão </P></TH>
<? } ?>
<?  } ?>

<? /* 	SETOR BALANCEAMENTO   */ ?>

<? /* 	SETOR CALDERARIA 1    */ ?>

<? if ( $lib_cald1 == "ver" Or $lib_cald1 == "alt" ) {?>
	
<? /* DT PROG */ ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_cald1 == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="dt_prog_cald1" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Cald. I Dt. Prog'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. </P></TH>
<? } ?>

<? /* OS STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_cald1 == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_cald1" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Cald. I Status'); return true;" onMouseOut="nd(); return true;"> Status </P></TH>
<? } ?>

<? /* DT PREVISAO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_cald1 == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="dt_previsao_cald1" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Cald. I Dt Previsão'); return true;" onMouseOut="nd(); return true;"> Dt Previsão </P></TH>
<? } ?>

<? } ?>

<? /* 	SETOR CALDERARIA 1  */ ?>

<? /* 	SETOR CALDERARIA 2    */ ?>

<? if ( $lib_cald2 == "ver" Or $lib_cald2 == "alt" ) {?>
	
<? /* DT PROG */ ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_cald2 == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="dt_prog_cald2" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Cald. II Dt. Prog'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. </P></TH>
<? } ?>

<? /* OS STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_cald2 == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_cald2" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Cald. II Status'); return true;" onMouseOut="nd(); return true;"> Status </P></TH>
<? } ?>

<? /* DT PREVISAO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_cald2 == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="dt_previsao_cald2" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Cald. II Dt Previsão'); return true;" onMouseOut="nd(); return true;"> Dt Previsão </P></TH>
<? } ?>

<? } ?>

<? /* 	SETOR CALDERARIA 2  */ ?>


<? /* 	SETOR PINTURA    */ ?>

<? if ( $lib_pintura_setor == "ver" Or $lib_pintura_setor == "alt" ) {?>
	
<? /* DT PROG */ ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_pinturasetor == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="dt_prog_pintura" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Pintura Dt. Prog'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. </P></TH>
<? } ?>

<? /* OS STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_pinturasetor == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_pintura" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Pintura Status'); return true;" onMouseOut="nd(); return true;"> Status </P></TH>
<? } ?>

<? /* DT PREVISAO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_pinturasetor == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="dt_previsao_pintura" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Pintura Dt Previsão'); return true;" onMouseOut="nd(); return true;"> Dt Previsão </P></TH>
<? } ?>

<? } ?>

<? /* 	SETOR PINTURA  */ ?>


<? /* 	SETOR PREPARAÇAO    */ ?>

<? if ( $lib_preparacao == "ver" Or $lib_preparacao == "alt" ) {?>
	
<? /* DT PROG */ ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_preparacao == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="dt_prog_preparacao" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Preparação Dt. Prog'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. </P></TH>
<? } ?>

<? /* OS STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_preparacao == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_preparacao" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Preparação Status'); return true;" onMouseOut="nd(); return true;"> Status </P></TH>
<? } ?>

<? /* DT PREVISAO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_preparacao == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="dt_previsao_preparacao" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Preparação Dt Previsão'); return true;" onMouseOut="nd(); return true;"> Dt Previsão </P></TH>
<? } ?>

<? } ?>

<? /* 	SETOR PREPARAÇÃO  */ ?>


<? /* 	SETOR ROTOR LL    */ ?>

<? if ( $lib_rotor_ll == "ver" Or $lib_rotor_ll == "alt" ) {?>
	
<? /* DT PROG */ ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_rotor_ll == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="dt_prog_rotor_ll" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Rotor LL Dt. Prog'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. </P></TH>
<? } ?>

<? /* OS STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_rotor_ll == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_rotor_ll" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Rotor LL Status'); return true;" onMouseOut="nd(); return true;"> Status </P></TH>
<? } ?>

<? /* DT PREVISAO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_rotor_ll == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="dt_previsao_rotor_ll" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Rotor LL Dt Previsão'); return true;" onMouseOut="nd(); return true;"> Dt Previsão </P></TH>
<? } ?>

<? } ?>

<? /* 	SETOR ROTOR LL  */ ?>

<? /* 	SETOR ROTOR SIR    */ ?>

<? if ( $lib_rotor_sir == "ver" Or $lib_rotor_sir == "alt" ) {?>
	
<? /* DT PROG */ ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_rotor_sir == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="dt_prog_rotor_sir" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Rotor SIR Dt. Prog'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. </P></TH>
<? } ?>

<? /* OS STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_rotor_sir == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_rotor_sir" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Rotor SIR Status'); return true;" onMouseOut="nd(); return true;"> Status </P></TH>
<? } ?>

<? /* DT PREVISAO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_rotor_sir == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="dt_previsao_rotor_sir" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Rotor SIR Dt Previsão'); return true;" onMouseOut="nd(); return true;"> Dt Previsão </P></TH>
<? } ?>

<? } ?>

<? /* 	SETOR ROTOR SIR  */ ?>


<? /* 	SETOR MONTAGEM    */ ?>

<? if ( $lib_montagem == "ver" Or $lib_montagem == "alt" ) {?>
	
<? /* DT PROG */ ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_montagem == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="dt_prog_montagem" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Montagem Dt. Prog'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. </P></TH>
<? } ?>

<? /* OS STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_montagem == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_montagem" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Montagem Status'); return true;" onMouseOut="nd(); return true;"> Status </P></TH>
<? } ?>

<? /* DT PREVISAO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_montagem == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="dt_previsao_montagem" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Montagem Dt Previsão'); return true;" onMouseOut="nd(); return true;"> Dt Previsão </P></TH>
<? } ?>

<? } ?>

<? /* 	SETOR MONTAGEM   */ ?>


<? /* 	SETOR USINAGEM EIXO    */ ?>

<? if ( $lib_usinagem_eixo == "ver" Or $lib_usinagem_eixo == "alt" ) {?>
	
<? /* DT PROG */ ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_usinagem_eixo == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="dt_prog_usinagem_eixo" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Usi. Dt. Prog'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. </P></TH>
<? } ?>
<? /* STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_usinagem_eixo == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_usinagem_eixo" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Usi. Status'); return true;" onMouseOut="nd(); return true;"> Status </P></TH>
<? } ?>

<? /* DT PREVISAO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_usinagem_eixo == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="dt_previsao_usinagem_eixo" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Usi. Dt Previsão'); return true;" onMouseOut="nd(); return true;"> Dt Previsão </P></TH>
<? } ?>

<? } ?>

<? /* 	SETOR USINAGEM EIXO   */ ?>

<? /* 	SETOR USINAGEM NUC_CUBO    */ ?>

<? if ( $lib_usinagem_nuc_cubo == "ver" Or $lib_usinagem_nuc_cubo == "alt" ) {?>
	
<? /* DT PROG */ ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_usinagem_nuc_cubo == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="dt_prog_usinagem_nuc_cubo" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Usi. Dt. Prog'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. </P></TH>
<? } ?>

<? /* STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_usinagem_nuc_cubo == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="status_usinagem_nuc_cubo" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Usi. Status'); return true;" onMouseOut="nd(); return true;"> Status </P></TH>
<? } ?>

<? /* DT PREVISAO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_usinagem_nuc_cubo == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="dt_previsao_usinagem_nuc_cubo" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Usi. Dt Previsão'); return true;" onMouseOut="nd(); return true;"> Dt Previsão </P></TH>
<? } ?>

<? } ?>

<? /* 	SETOR USINAGEM NUC_CUBO   */ ?>

<? /* 	SETOR USINAGEM POL_MOT   */ ?>

<? if ( $lib_usinagem_pol_mot == "ver" Or $lib_usinagem_pol_mot == "alt" ) {?>
	
<? /* DT PROG */ ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_usinagem_pol_mot == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="dt_prog_usinagem_pol_mot" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Usi. Dt. Prog'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. </P></TH>
<? } ?>

<? /* STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_usinagem_pol_mot == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="status_usinagem_pol_mot" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Usi. Status'); return true;" onMouseOut="nd(); return true;"> Status </P></TH>
<? } ?>

<? /* DT PREVISAO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_usinagem_pol_mot == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="dt_previsao_usinagem_pol_mot" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Usi. Dt Previsão'); return true;" onMouseOut="nd(); return true;"> Dt Previsão </P></TH>
<? } ?>

<? } ?>

<? /* 	SETOR USINAGEM POL_MOT   */ ?>

<? /* 	SETOR USINAGEM POL_VENT   */ ?>

<? if ( $lib_usinagem_pol_vent == "ver" Or $lib_usinagem_pol_vent == "alt" ) {?>
	
<? /* DT PROG */ ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_usinagem_pol_vent == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="dt_prog_usinagem_pol_vent" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Usi. Dt. Prog'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. </P></TH>
<? } ?>

<? /* STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_usinagem_pol_vent == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="status_usinagem_pol_vent" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Usi. Status'); return true;" onMouseOut="nd(); return true;"> Status </P></TH>
<? } ?>

<? /* DT PREVISAO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_usinagem_pol_vent == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="dt_previsao_usinagem_pol_vent" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Usi. Dt Previsão'); return true;" onMouseOut="nd(); return true;"> Dt Previsão </P></TH>
<? } ?>

<? } ?>

<? /* 	SETOR USINAGEM POL_VENT   */ ?>

<? /* 	SETOR USINAGEM GAXETA   */ ?>

<? if ( $lib_usinagem_gaxeta == "ver" Or $lib_usinagem_gaxeta == "alt" ) {?>
	
<? /* DT PROG */ ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_usinagem_gaxeta == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="dt_prog_usinagem_gaxeta" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Usi. Dt. Prog'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. </P></TH>
<? } ?>

<? /* STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_usinagem_gaxeta == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="status_usinagem_gaxeta" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Usi. Status'); return true;" onMouseOut="nd(); return true;"> Status </P></TH>
<? } ?>

<? /* DT PREVISAO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_usinagem_gaxeta == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="dt_previsao_usinagem_gaxeta" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Usi. Dt Previsão'); return true;" onMouseOut="nd(); return true;"> Dt Previsão </P></TH>
<? } ?>

<? } ?>

<? /* 	SETOR USINAGEM GAXETA   */ ?>

<? /* 	SETOR EXPEDICAO    */ ?>

<? if ( $lib_expedicao == "ver" Or $lib_expedicao == "alt" ) {?>
	
<? /* DT PROG */ ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_expedicao == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="dt_prog_expedicao" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Exp. Dt. Prog'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. </P></TH>
<? } ?>

<? /* OS STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_expedicao == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_expedicao" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Exp. Status'); return true;" onMouseOut="nd(); return true;"> Status </P></TH>
<? } ?>

<? /* DT PREVISAO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_expedicao == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="dt_previsao_expedicao" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Exp. Dt Previsão'); return true;" onMouseOut="nd(); return true;"> Dt Previsão </P></TH>
<? } ?>
<? } ?>

<? /* 	SETOR EXPEDICAO   */ ?>


<? /* 	SETOR FUNILARIA    */ ?>

<? if ( $lib_funilaria == "ver" Or $lib_funilaria == "alt" ) {?>
	
<? /* DT PROG */ ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_funilaria == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="dt_prog_funilaria" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Fun. Dt. Prog'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. </P></TH>
<? } ?>

<? /* OS STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_funilaria == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_funilaria" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Fun. Status'); return true;" onMouseOut="nd(); return true;"> Status </P></TH>
<? } ?>

<? /* DT PREVISAO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_funilaria == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="dt_previsao_funilaria" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Fun. Dt Previsão'); return true;" onMouseOut="nd(); return true;"> Dt Previsão </P></TH>
<? } ?>
<? } ?>

<? /* 	SETOR FUNILARIA   */ ?>

<? /* 	SETOR LASER   */ ?>

<? if ( $lib_laser == "ver" Or $lib_laser == "alt" ) {?>
	
<? /* DT PROG */ ?>
<TH align=middle  ><P class=bordas>
<?	if ( $check_laser == "" ) { ?>
<input class=botao4 type="radio" name="organizar" value="dt_prog_laser" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Laser Dt. Prog'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. </P></TH>
<? } ?>

<? /* OS STATUS */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_laser == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="status_laser" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Laser Status'); return true;" onMouseOut="nd(); return true;"> Status </P></TH>
<? } ?>

<? /* DT PREVISAO */ ?>
<TH align=middle  ><P class=bordas>
<? if ( $check_laser == "" ) {?>
<input class=botao4 type="radio" name="organizar" value="dt_previsao_laser" onClick="Atualizar_Dados_PCP();" onMouseOver="drc('','Organizar Laser Dt Previsão'); return true;" onMouseOut="nd(); return true;"> Dt Previsão </P></TH>
<? } ?>
<? } ?>

<? /* 	SETOR LASER  */ ?>




		</TR> 		
		
<? /* --------------------  FIM DOS BOTOES ORGANIZACAO  -----------------------------  */  ?>		
 

<? /* --------------------  INICIO DOS BOTOES SELECAO  -----------------------------  */  ?>


		<TR class=linha_cabecalho>

              
<? /* DATA EMISSAO */ ?>
<? if ( $lib_data_emissao == "ver" OR $lib_data_emissao == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_data_emissao == "") {
		if ($f_data_emissao == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_data_emissao"  style='width:95px'>
 <?
  $query = "select distinct data_emissao from pcp where id>='0' $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_representante_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_almox_db $f_status_almox_db $f_dt_prog_corte_db $f_status_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->data_emissao==$f_data_emissao)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$data_emissao_port = $sRow->data_emissao; 
$dia_data_emissao = substr($data_emissao_port, -2);
$mes_data_emissao = substr($data_emissao_port, -5,2);
$ano_data_emissao = substr($data_emissao_port, -10,4);
$data_emissao_port = ($dia_data_emissao."/".$mes_data_emissao."/".$ano_data_emissao);
  print("<option value='$sRow->data_emissao' $sSelect>  $data_emissao_port </option>");
}   
?>
</select> 

<? /* 	DATA EMISSAO MES		*/ ?>
<? if ($f_data_emissao_mes == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_data_emissao_mes"  style='width:95px'>
 <?
  $query = "select distinct data_emissao from pcp where id>='0' $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_representante_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_mes_db $f_data_baixa_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  	$data_emissao_port = $sRow->data_emissao; 
	$mes_data_emissao = substr($data_emissao_port, -5,2);
	$ano_data_emissao = substr($data_emissao_port, -10,4);
	$data_emissao_tela   = ($ano_data_emissao."-".$mes_data_emissao);

  if ($data_emissao_tela==$f_data_emissao_mes)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$data_emissao_port = $sRow->data_emissao; 
$mes_data_emissao = substr($data_emissao_port, -5,2);
$ano_data_emissao = substr($data_emissao_port, -10,4);
$data_emissao_port = ($mes_data_emissao."/".$ano_data_emissao);
$data_emissao_db   = ($ano_data_emissao."-".$mes_data_emissao);

  print("<option value='$data_emissao_db' $sSelect>  $data_emissao_port </option>");
}   
?>
</select>
<? } } ?>
</P></TH>

<?  /* NUM_OS */  ?>           
<? if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_num_os == "") {
		if ( $f_num_os == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_num_os"  style='width:60px'>
<?
$query = "select distinct num_os from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by num_os";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->num_os==$f_num_os)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->num_os' $sSelect> $sRow->num_os</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<?  /* NUM_PROPOSTA */  ?>
<? if ( $lib_num_proposta == "ver" OR $lib_num_proposta == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_num_proposta == "") { 
	if ( $f_num_proposta == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_num_proposta"  style='width:100px'>
<?
$query = "select distinct num_proposta from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by num_proposta";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->num_proposta==$f_num_proposta)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->num_proposta' $sSelect> $sRow->num_proposta</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* NOME CLIENTE */ ?>
<? if ( $lib_nome_cliente == "ver" OR $lib_nome_cliente == "alt" ) { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_nome_cliente == "") {
		if ( $f_nome_cliente == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_nome_cliente"  style='width:150px'>
 <?
  $query = "select distinct nome_cliente from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by nome_cliente";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->nome_cliente==$f_nome_cliente)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->nome_cliente' $sSelect> $sRow->nome_cliente</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* OC _ OBRA */ ?>
<? if ( $lib_oc_obra == "ver" OR $lib_oc_obra == "alt" ) { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_oc_obra == "") { 
		if ( $f_oc_obra == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_oc_obra"  style='width:125px'>
 <?
  $query = "select distinct oc_obra from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by oc_obra";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->oc_obra==$f_oc_obra)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->oc_obra' $sSelect> $sRow->oc_obra</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* MERCADO */ ?>
<? if ( $lib_mercado == "ver" OR $lib_mercado == "alt" ) { ?>
	<TH align=middle widht="15%" ><P class=bordas>
	<?if ( $check_mercado == "") { if ( $f_mercado == "") {$botao = "";} else 
		 {$botao = "class=select_filtrado";} ?>
		
<select <?echo $botao?> size="1" name="f_mercado"  style='width:65px'>
 <?
  $query = "select distinct mercado from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by mercado";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->mercado==$f_mercado)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->mercado' $sSelect> $sRow->mercado</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* REPRESENTANTE */ ?>
<? if ( $lib_representante == "ver" OR $lib_representante == "alt" ) { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_representante == "") { 
		if ( $f_representante == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_representante"  style='width:80px'>
 <?
  $query = "select distinct representante from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by mercado";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->representante==$f_representante)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->representante' $sSelect> $sRow->representante</option>");   }  ?>
</select>
<? } } ?>
</P></TH>


<? /* ESTADO */ ?>
<? if ( $lib_estado == "ver" OR  $lib_estado == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_estado == "") { 
		if ( $f_estado == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
 <select <?echo $botao?> size="1" name="f_estado"  style='width:40px'>
 <?
  $query = "select distinct estado from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by estado";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->estado==$f_estado)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->estado' $sSelect> $sRow->estado</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* DATA DA ENTREGA */ ?>
<? if ( $lib_data_entrega == "ver" OR $lib_data_entrega == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_data_entrega == "") {
		if ( $f_data_entrega == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_data_entrega"  style='width:95px'>
 <?
  $query = "select distinct data_entrega from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_representante_db $f_estado_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by data_entrega";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->data_entrega==$f_data_entrega)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$data_entrega_port = $sRow->data_entrega; 
$dia_data_entrega = substr($data_entrega_port, -2);
$mes_data_entrega = substr($data_entrega_port, -5,2);
$ano_data_entrega = substr($data_entrega_port, -10,4);
$data_entrega_port = ($dia_data_entrega."/".$mes_data_entrega."/".$ano_data_entrega);
  print("<option value='$sRow->data_entrega' $sSelect>  $data_entrega_port </option>");
}   
?>
</select> 

<? /*	DATA ENTREGA MES	*/ ?>
<? if ($f_data_entrega_mes == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_data_entrega_mes"  style='width:95px'>
 <?
  $query = "select distinct data_entrega from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_baixa_mes_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by data_entrega";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
	$data_entrega_port = $sRow->data_entrega; 
	$mes_data_entrega = substr($data_entrega_port, -5,2);
	$ano_data_entrega = substr($data_entrega_port, -10,4);
	$data_entrega_tela   = ($ano_data_entrega."/".$mes_data_entrega);
	if ($data_entrega_tela==$f_data_entrega_mes)   {
  	$sSelect = "SELECTED";
  	}  else  {
	$sSelect = "";
}  
$data_entrega_port = $sRow->data_entrega; 
$mes_data_entrega = substr($data_entrega_port, -5,2);
$ano_data_entrega = substr($data_entrega_port, -10,4);
$data_entrega_port = ($mes_data_entrega."/".$ano_data_entrega);
$data_entrega_db   = ($ano_data_entrega."/".$mes_data_entrega);
	print("<option value='$data_entrega_db' $sSelect>  $data_entrega_port </option>");
}   
?>
</select>
<? } } ?>
</P></TH>




<? /* REPROGRAMAÇÃO */ ?>
<? if ( $lib_reprogramacao == "ver" OR $lib_reprogramacao == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_reprogramacao == "") {
		if ( $f_reprogramacao == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_reprogramacao"  style='width:95px'>
 <?
  $query = "select distinct reprogramacao from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by reprogramacao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->reprogramacao==$f_reprogramacao)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$reprogramacao = $sRow->reprogramacao;
$dia_reprogramacao = substr($reprogramacao, -2);
$mes_reprogramacao = substr($reprogramacao, -5,2);
$ano_reprogramacao = substr($reprogramacao, -10,4);
if ($dia_reprogramacao == "" AND $mes_reprogramacao == "" AND $ano_reprogramacao == "") 
{$reprogramacao = ($dia_reprogramacao."".$mes_reprogramacao."".$ano_reprogramacao); } 
else 
{$reprogramacao = ($dia_reprogramacao."/".$mes_reprogramacao."/".$ano_reprogramacao); }
	print("<option value='$sRow->reprogramacao' $sSelect>  $reprogramacao </option>");
}  
?>
</select>
<? } } ?>
</P></TH>

<?/* DATA PREVISÃO   */?>
<? if ( $lib_data_previsao == "ver" OR $lib_data_previsao == "alt") {?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_data_previsao == "") {
		if ( $f_data_previsao == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_data_previsao"  >
 <?
  $query = "select distinct data_previsao from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_local_venda_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_data_prog_diaria_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by data_previsao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->data_previsao==$f_data_previsao)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$data_previsao_port = $sRow->data_previsao; 
$dia_data_previsao = substr($data_previsao_port, -2);
$mes_data_previsao = substr($data_previsao_port, -5,2);
$ano_data_previsao = substr($data_previsao_port, -10,4);
if ($dia_data_previsao == "" AND $mes_data_previsao == "" AND $ano_data_previsao == "") 
{$data_previsao_port = ($dia_data_previsao."".$mes_data_previsao."".$ano_data_previsao); } 
else 
{$data_previsao_port = ($dia_data_previsao."/".$mes_data_previsao."/".$ano_data_previsao); }
	print("<option value='$sRow->data_previsao' $sSelect>  $data_previsao_port </option>");
}  ?>
</select>
<? } } ?>
</P></TH>

<? /* DT PROG */ ?>
<? if ( $lib_dt_prog_montagem == "ver" OR $lib_dt_prog_montagem == "alt") {?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_dt_prog_montagem == "") {		
if ( $f_dt_prog_montagem == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_prog_montagem"  style='width:90px'>
 <?
  $query = "select distinct dt_prog_montagem from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db  $f_status_balanc_db $f_status_cald1_db $f_dt_previsao_cald1_db $f_status_cald2_db $f_dt_previsao_cald1_db $f_status_rotor_ll_db $f_dt_previsao_rotor_ll_db $f_dt_previsao_montagem_db $f_status_montagem_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_prog_montagem";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_prog_montagem==$f_dt_prog_montagem)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_prog_montagem = $sRow->dt_prog_montagem;
$dia_dt_prog_montagem = substr($dt_prog_montagem, -2);
$mes_dt_prog_montagem = substr($dt_prog_montagem, -5,2);
$ano_dt_prog_montagem = substr($dt_prog_montagem, -10,4);
if ($dia_dt_prog_montagem == "" AND $mes_dt_prog_montagem == "" AND $ano_dt_prog_montagem == "") 
{$dt_prog_montagem = ($dia_dt_prog_montagem."".$mes_dt_prog_montagem."".$ano_dt_prog_montagem); } 
else 
{$dt_prog_montagem = ($dia_dt_prog_montagem."/".$mes_dt_prog_montagem."/".$ano_dt_prog_montagem); }
  print("<option value='$sRow->dt_prog_montagem' $sSelect>  $dt_prog_montagem </option>");   
}  ?>
</select>
</P></TH>
<? } } ?>

<?/* DATA PROG. DIÁRIA   */?>
<? if ( $lib_data_prog_diaria == "ver" OR $lib_data_prog_diaria == "alt") {?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_data_prog_diaria == "") {
		if ( $f_data_prog_diaria == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_data_prog_diaria"  >
 <?
  $query = "select distinct data_prog_diaria from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_local_venda_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by data_prog_diaria";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->data_prog_diaria==$f_data_prog_diaria)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$data_prog_diaria_port = $sRow->data_prog_diaria; 
$dia_data_prog_diaria = substr($data_prog_diaria_port, -2);
$mes_data_prog_diaria = substr($data_prog_diaria_port, -5,2);
$ano_data_prog_diaria = substr($data_prog_diaria_port, -10,4);
if ($dia_data_prog_diaria == "" AND $mes_data_prog_diaria == "" AND $ano_data_prog_diaria == "") 
{$data_prog_diaria_port = ($dia_data_prog_diaria."".$mes_data_prog_diaria."".$ano_data_prog_diaria); } 
else 
{$data_prog_diaria_port = ($dia_data_prog_diaria."/".$mes_data_prog_diaria."/".$ano_data_prog_diaria); }
	print("<option value='$sRow->data_prog_diaria' $sSelect>  $data_prog_diaria_port </option>");
}  ?>
</select>
<? } } ?>
</P></TH>

<? /* BAIXA EXPEDICAO */ ?>
<? if ( $lib_baixa_expedicao == "ver" ) { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_baixa == "") {
		if ( $f_baixa == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_baixa"  style='width:40px'>
 <?
  $query = "select distinct baixa from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by baixa";
  $result = MYSQL_QUERY($query);
  print("<option value='TODOS' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->baixa==$f_baixa)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->baixa' $sSelect> $sRow->baixa</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* BAIXA */ ?>
<? if ( $lib_baixa == "ver" OR $lib_baixa == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_baixa == "") {
		if ( $f_baixa == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_baixa"  style='width:40px'>
 <?
  $query = "select distinct baixa from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by baixa";
  $result = MYSQL_QUERY($query);
  print("<option value='TODOS' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->baixa==$f_baixa)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->baixa' $sSelect> $sRow->baixa</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* DATA BAIXA */ ?>
<? if ( $lib_data_baixa == "ver" OR $lib_data_baixa == "alt") {?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_data_baixa == "") {
		if ( $f_data_baixa == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_data_baixa"  style='width:95px'>
 <?
  $query = "select distinct data_baixa from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by data_baixa";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->data_baixa==$f_data_baixa)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$data_baixa = $sRow->data_baixa;
$dia_data_baixa = substr($data_baixa, -2);
$mes_data_baixa = substr($data_baixa, -5,2);
$ano_data_baixa = substr($data_baixa, -10,4);
if ($dia_data_baixa == "" AND $mes_data_baixa == "" AND $ano_data_baixa == "") 
{$data_baixa = ($dia_data_baixa."".$mes_data_baixa."".$ano_data_baixa); } 
else 
{$data_baixa = ($dia_data_baixa."/".$mes_data_baixa."/".$ano_data_baixa); }
  print("<option value='$sRow->data_baixa' $sSelect>  $data_baixa </option>");   
}  ?>
</select>

<? /*	DATA BAIXA MES	*/ ?>
<? if ($f_data_baixa_mes == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_data_baixa_mes"  style='width:95px'>
 <?
  $query = "select distinct data_baixa from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by data_baixa";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
	$data_baixa_port = $sRow->data_baixa; 
	$mes_data_baixa = substr($data_baixa_port, -5,2);
	$ano_data_baixa = substr($data_baixa_port, -10,4);
	$data_baixa_tela   = ($ano_data_baixa."/".$mes_data_baixa);
	if ($data_baixa_tela==$f_data_baixa_mes)   {
  	$sSelect = "SELECTED";
  	}  else  {
	$sSelect = "";
}  
$data_baixa_port = $sRow->data_baixa; 
$mes_data_baixa = substr($data_baixa_port, -5,2);
$ano_data_baixa = substr($data_baixa_port, -10,4);
$data_baixa_port = ($mes_data_baixa."/".$ano_data_baixa);
$data_baixa_db   = ($ano_data_baixa."/".$mes_data_baixa);
	print("<option value='$data_baixa_db' $sSelect>  $data_baixa_port </option>");
}   
?>
</select>
<? } } ?>
</P></TH> 

<? /* LOCAL VENDA */ ?>
<? if ( $lib_local_venda == "ver" OR $lib_local_venda == "alt") {?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_local_venda == "") {
		if ( $f_local_venda == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_local_venda"  style='width:65px'>
 <?
  $query = "select distinct local_venda from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by local_venda";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->local_venda==$f_local_venda)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->local_venda' $sSelect> $sRow->local_venda</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* FORNECIMENTO MOTOR */ ?>
<? if ( $lib_fornecimento_motor == "ver" OR $lib_fornecimento_motor == "alt") {?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_fornecimento_motor == "") {
		if ( $f_fornecimento_motor == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_fornecimento_motor"  style='width:35px'>
 <?
  $query = "select distinct fornecimento_motor from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by fornecimento_motor";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->fornecimento_motor==$f_fornecimento_motor)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->fornecimento_motor' $sSelect> $sRow->fornecimento_motor</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* DATA MOTOR RECEBIDO */ ?>
<? if ( $lib_data_motor_recebido == "ver" OR $lib_data_motor_recebido == "alt") {?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_data_motor_recebido == "") {
		if ($f_data_motor_recebido == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_data_motor_recebido"  style='width:95px'>
 <?
  $query = "select distinct data_motor_recebido from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by data_motor_recebido";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->data_motor_recebido==$f_data_motor_recebido)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
} 
$data_motor_recebido = $sRow->data_motor_recebido;
$dia_data_motor_recebido = substr($data_motor_recebido, -2);
$mes_data_motor_recebido = substr($data_motor_recebido, -5,2);
$ano_data_motor_recebido = substr($data_motor_recebido, -10,4);
if ($dia_data_motor_recebido == "" AND $mes_data_motor_recebido == "" AND $ano_data_motor_recebido == "") 
{$data_motor_recebido = ($dia_data_motor_recebido."".$mes_data_motor_recebido."".$ano_data_motor_recebido); } 
else 
{$data_motor_recebido = ($dia_data_motor_recebido."/".$mes_data_motor_recebido."/".$ano_data_motor_recebido); }
	print("<option value='$sRow->data_motor_recebido' $sSelect>  $data_motor_recebido </option>");
}  ?>
</select>
<? } } ?>
</P></TH>

<? /* DESCRICAO VENT */ ?>
<? if ( $lib_descr_vent == "ver" OR $lib_descr_vent == "alt") {?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_descr_vent == "") {
		if ( $f_descr_vent == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_descr_vent"  style='width:125px'>
 <?
  $query = "select distinct descr_vent from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by descr_vent";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->descr_vent==$f_descr_vent)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->descr_vent' $sSelect> $sRow->descr_vent</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* QTDE */ ?>
<? if ( $lib_qt == "ver" OR $lib_qt == "alt") {?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_qt == "") {
		if ( $f_qt == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_qt"  style='width:45px'>
 <?
  $query = "select distinct qt from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by qt";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->qt==$f_qt)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->qt' $sSelect> $sRow->qt</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* TAG */ ?>
<? if ( $lib_tag == "ver" OR $lib_tag == "alt") {?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_tag == "") {
		if ( $f_tag == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_tag"  style='width:45px'>
 <?
  $query = "select distinct tag from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by tag";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->tag==$f_tag)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->tag' $sSelect> $sRow->tag</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* MODELO */ ?>
<? if ( $lib_modelo == "ver" OR $lib_modelo == "alt") {?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_modelo == "") {
		if ( $f_modelo == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_modelo" style='width:55px'>
 <?
  $query = "select distinct modelo from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by modelo";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->modelo==$f_modelo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->modelo' $sSelect> $sRow->modelo</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* TAMANHO */ ?>
<? if ( $lib_tamanho == "ver" OR $lib_tamanho == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_tamanho == "") {
		if ( $f_tamanho == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_tamanho"  style='width:55px'>
 <?
  $query = "select distinct tamanho from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by tamanho";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->tamanho==$f_tamanho)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->tamanho' $sSelect> $sRow->tamanho</option>");   }  ?>
</select>
<? } } ?>
</P></TH>


<? /* LARGURA ESPECIAL */ ?>
<? if ( $lib_largura_especial == "ver" OR $lib_largura_especial == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_largura_especial == "") {
		if ( $f_largura_especial == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_largura_especial"  style='width:55px'>
 <?
  $query = "select distinct largura_especial from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by largura_especial";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->largura_especial==$f_largura_especial)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->largura_especial' $sSelect> $sRow->largura_especial</option>");   }  ?>
</select>
<? } } ?>
</P></TH>


<? /* ARRANJO */ ?>
<? if ( $lib_arranjo == "ver" OR $lib_arranjo == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_arranjo == "") {
		if ( $f_arranjo == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_arranjo"  style='width:35px'>
 <?
  $query = "select distinct arranjo from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by arranjo";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->arranjo==$f_arranjo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->arranjo' $sSelect> $sRow->arranjo</option>");   }  ?>
</select>
<? } } ?>
</P></TH>



<? /* CLASSE */ ?>
<? if ( $lib_classe == "ver" OR $lib_classe == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_classe == "") {
		if ( $f_classe == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_classe"  style='width:45px'>
 <?
  $query = "select distinct classe from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by classe";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->classe==$f_classe)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->classe' $sSelect> $sRow->classe</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* ROTAÇÃO */ ?>
<? if ( $lib_rotacao == "ver" OR $lib_rotacao == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_rotacao == "") {
		if ( $f_rotacao == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_rotacao"  style='width:45px'>
 <?
  $query = "select distinct rotacao from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by rotacao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->rotacao==$f_rotacao)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->rotacao' $sSelect> $sRow->rotacao</option>");   }  ?>
</select>
<? } } ?>
</P></TH>


<? /* ROTAÇÃO */ ?>
<? if ( $lib_carc_mot == "ver" OR $lib_carc_mot == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_carc_mot == "") {
		if ( $f_carc_mot == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_carc_mot"  style='width:45px'>
 <?
  $query = "select distinct carc_mot from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by carc_mot";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->carc_mot==$f_carc_mot)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->carc_mot' $sSelect> $sRow->carc_mot</option>");   }  ?>
</select>
<? } } ?>
</P></TH>


<? /* GABINETE */ ?>
<? if ( $lib_gab == "ver" OR $lib_gab == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_gab == "") {
		if ( $f_gab == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_gab"  style='width:35px'>
 <?
  $query = "select distinct gab from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by gab";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->gab==$f_gab)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->gab' $sSelect> $sRow->gab</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* PINTURA */ ?>
<? if ( $lib_pintura == "ver" OR $lib_pintura == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_pintura == "") {
		if ( $f_pintura == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_pintura"  style='width:65px'>
 <?
  $query = "select distinct pintura from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by pintura";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->pintura==$f_pintura)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->pintura' $sSelect> $sRow->pintura</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* CONSTRUÇÃO */ ?>
<? if ( $lib_construcao == "ver" OR $lib_construcao == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_construcao == "") {
		if ( $f_construcao == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_construcao"  style='width:45px'>
 <?
  $query = "select distinct construcao from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by construcao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->construcao==$f_construcao)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->construcao' $sSelect> $sRow->construcao</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* VALOR UNITARIO */ ?>
<? if ( $lib_valor_uni == "ver" OR $lib_valor_uni == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_valor_uni == "") {
		if ( $f_valor_uni == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_valor_uni"  style='width:95px'>
 <?
  $query = "select distinct valor_uni from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by valor_uni";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->valor_uni==$f_valor_uni)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->valor_uni' $sSelect> $sRow->valor_uni</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* VALOR TOTAL O.S */ ?>
<? if ( $lib_valor_total == "ver" OR $lib_valor_total == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_valor_total == "") {
		if ( $f_valor_total == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_valor_total"  style='width:95px'>
 <?
  $query = "select distinct valor_total from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by valor_total";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->valor_total==$f_valor_total)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->valor_total' $sSelect> $sRow->valor_total</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* 	JATEAMENTO / GALV. FOGO 	*/ ?>

<? if ( $lib_jat_g_fogo == "ver" OR $lib_jat_g_fogo == "alt") {?>

<? /* TIPO SERVIÇO */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_jat_g_fogo == "") {
if ( $f_ts_jat_g_fogo == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_ts_jat_g_fogo"  style='width:40px'>
 <?
  $query = "select distinct ts_jat_g_fogo from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_status_jat_g_fogo_db $f_dt_status_jat_g_fogo_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by ts_jat_g_fogo";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->ts_jat_g_fogo==$f_ts_jat_g_fogo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->ts_jat_g_fogo' $sSelect> $sRow->ts_jat_g_fogo</option>");  } ?>
</select>
</P></TH>
<? } ?>

<? /* STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_jat_g_fogo == "") {
if ( $f_status_jat_g_fogo == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_status_jat_g_fogo"  style='width:40px'>
 <?
  $query = "select distinct status_jat_g_fogo from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_ts_jat_g_fogo_db $f_dt_status_jat_g_fogo_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by status_jat_g_fogo";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_jat_g_fogo==$f_status_jat_g_fogo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_jat_g_fogo' $sSelect> $sRow->status_jat_g_fogo</option>");  } ?>
</select>
</P></TH>
<? } ?>

<? /* DT STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_jat_g_fogo == "") {		
if ( $f_dt_status_jat_g_fogo == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_status_jat_g_fogo"  style='width:95px'>
 <?
  $query = "select distinct dt_status_jat_g_fogo from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_status_jat_g_fogo_db $f_dt_status_jat_g_fogo_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_status_jat_g_fogo";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_status_jat_g_fogo==$f_dt_status_jat_g_fogo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_status_jat_g_fogo = $sRow->dt_status_jat_g_fogo;
$dia_dt_status_jat_g_fogo = substr($dt_status_jat_g_fogo, -2);
$mes_dt_status_jat_g_fogo = substr($dt_status_jat_g_fogo, -5,2);
$ano_dt_status_jat_g_fogo = substr($dt_status_jat_g_fogo, -10,4);
//if ($dia_data_baixa == "" AND $mes_data_baixa == "" AND $ano_data_baixa == "") 
//{$data_baixa = ($dia_data_baixa."".$mes_data_baixa."".$ano_data_baixa); } 
//else 
//{$data_baixa = ($dia_data_baixa."/".$mes_data_baixa."/".$ano_data_baixa); }
  print("<option value='$sRow->dt_status_jat_g_fogo' $sSelect>  $dt_status_jat_g_fogo </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? } /* 	JATEAMENTO / GALV. FOGO 	*/ ?>


<? /* MAT 1 */ ?>
<? if ( $lib_mat1 == "ver" OR $lib_mat1 == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_mat1 == "") {
		if ( $f_mat1 == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_mat1"  style='width:40px'>
 <?
  $query = "select distinct mat1 from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db  $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by mat1";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->mat1==$f_mat1)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->mat1' $sSelect> $sRow->mat1</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* MAT 2 */ ?>
<? if ( $lib_mat2 == "ver" OR $lib_mat2 == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_mat2 == "") {
		if ( $f_mat2 == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_mat2"  style='width:40px'>
 <?
  $query = "select distinct mat2 from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db  $f_motor_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by mat2";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->mat2==$f_mat2)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->mat2' $sSelect> $sRow->mat2</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* MAT 3 */ ?>
<? if ( $lib_mat3 == "ver" OR $lib_mat3 == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_mat3 == "") {
		if ( $f_mat3 == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_mat3"  style='width:40px'>
 <?
  $query = "select distinct mat3 from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db  $f_motor_maxsig_db $f_polia_maxsig_db $f_outros_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by mat3";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->mat3==$f_mat3)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->mat3' $sSelect> $sRow->mat3</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* OUTROS */ ?>
<? if ( $lib_outros == "ver" OR $lib_outros == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_outros == "") {
		if ( $f_outros == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_outros"  style='width:40px'>
 <?
  $query = "select distinct outros from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db  $f_motor_maxsig_db $f_polia_maxsig_db $f_fund_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by outros";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->outros==$f_outros)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->outros' $sSelect> $sRow->outros</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* N CONSULTA CLIENTE */ ?>
<? if ( $lib_n_cons_cliente == "ver" OR $lib_n_cons_cliente == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_n_cons_cliente == "") {
		if ( $f_n_cons_cliente == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_n_cons_cliente"  style='width:40px'>
 <?
  $query = "select distinct n_cons_cliente from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db  $f_motor_maxsig_db $f_polia_maxsig_db $f_fund_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by n_cons_cliente";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->n_cons_cliente==$f_n_cons_cliente)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->n_cons_cliente' $sSelect> $sRow->n_cons_cliente</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* OBS */ ?>
<? if ( $lib_obs == "ver" OR $lib_obs == "alt") { ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_obs == "") {
		if ( $f_obs == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_obs"  style='width:250px'>
 <?
  $query = "select distinct obs from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by obs";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->obs==$f_obs)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->obs' $sSelect> $sRow->obs</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* 		SETOR PROJETOS 		*/ ?>

<? /* 		OS		*/ ?>

<? if ( $lib_proj == "ver" OR $lib_proj == "alt") {?>

<? /* PROJ OS DT PROG */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_proj == "") {		
if ( $f_proj_os_dt_prog == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_proj_os_dt_prog"  style='width:95px'>
 <?
  $query = "select distinct proj_os_dt_prog from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by proj_os_dt_prog";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->proj_os_dt_prog==$f_proj_os_dt_prog)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$proj_os_dt_prog = $sRow->proj_os_dt_prog;
$dia_proj_os_dt_prog = substr($proj_os_dt_prog, -2);
$mes_proj_os_dt_prog = substr($proj_os_dt_prog, -5,2);
$ano_proj_os_dt_prog = substr($proj_os_dt_prog, -10,4);
if ($dia_proj_os_dt_prog == "" AND $mes_proj_os_dt_prog == "" AND $ano_proj_os_dt_prog == "") 
{$proj_os_dt_prog = ($dia_proj_os_dt_prog."".$mes_proj_os_dt_prog."".$ano_proj_os_dt_prog); } 
else 
{$proj_os_dt_prog = ($dia_proj_os_dt_prog."/".$mes_proj_os_dt_prog."/".$ano_proj_os_dt_prog); }
  print("<option value='$sRow->proj_os_dt_prog' $sSelect>  $proj_os_dt_prog </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* PROJ OS STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_proj == "") {
if ( $f_proj_os_status == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_proj_os_status"  style='width:40px'>
 <?
  $query = "select distinct proj_os_status from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by proj_os_status";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->proj_os_status==$f_proj_os_status)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->proj_os_status' $sSelect> $sRow->proj_os_status</option>");  } ?>
</select>
</P></TH>
<? } ?>

<? /* PROJ OS DT ENTRADA */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_proj == "") {
	if ( $f_proj_os_dt_entrada == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_proj_os_dt_entrada"  style='width:95px'>
 <?
  $query = "select distinct proj_os_dt_entrada from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by proj_os_dt_entrada";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->proj_os_dt_entrada==$f_proj_os_dt_entrada)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$proj_os_dt_entrada = $sRow->proj_os_dt_entrada;
$dia_proj_os_dt_entrada = substr($proj_os_dt_entrada, -2);
$mes_proj_os_dt_entrada = substr($proj_os_dt_entrada, -5,2);
$ano_proj_os_dt_entrada = substr($proj_os_dt_entrada, -10,4);
if ($dia_proj_os_dt_entrada == "" AND $mes_proj_os_dt_entrada == "" AND $ano_proj_os_dt_entrada == "") 
{$proj_os_dt_entrada = ($dia_proj_os_dt_entrada."".$mes_proj_os_dt_entrada."".$ano_proj_os_dt_entrada); } 
else 
{$proj_os_dt_entrada = ($dia_proj_os_dt_entrada."/".$mes_proj_os_dt_entrada."/".$ano_proj_os_dt_entrada); }
  print("<option value='$sRow->proj_os_dt_entrada' $sSelect>  $proj_os_dt_entrada </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* PROJ OS DT SAIDA */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	 if ( $check_proj == "") {
	if ( $f_proj_os_dt_saida == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_proj_os_dt_saida"  style='width:95px'>
 <?
  $query = "select distinct proj_os_dt_saida from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by proj_os_dt_saida";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->proj_os_dt_saida==$f_proj_os_dt_saida)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$proj_os_dt_saida_port = $sRow->proj_os_dt_saida;
$dia_proj_os_dt_saida = substr($proj_os_dt_saida_port, -2);
$mes_proj_os_dt_saida = substr($proj_os_dt_saida_port, -5,2);
$ano_proj_os_dt_saida = substr($proj_os_dt_saida_port, -10,4);
if ($dia_proj_os_dt_saida == "" AND $mes_proj_os_dt_saida == "" AND $ano_proj_os_dt_saida == "") 
{$proj_os_dt_saida_port = ($dia_proj_os_dt_saida."".$mes_proj_os_dt_saida."".$ano_proj_os_dt_saida); } 
else 
{$proj_os_dt_saida_port = ($dia_proj_os_dt_saida."/".$mes_proj_os_dt_saida."/".$ano_proj_os_dt_saida); }
  print("<option value='$sRow->proj_os_dt_saida' $sSelect>  $proj_os_dt_saida_port </option>");   
}  ?>
</select>

<? /*  PROJ OS DT SAIDA  MES		*/ ?>
<? if ($f_proj_os_dt_saida_mes == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_proj_os_dt_saida_mes"  style='width:95px'>
 <?
  $query = "select distinct proj_os_dt_saida from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by proj_os_dt_saida";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
	$proj_os_dt_saida_port = $sRow->proj_os_dt_saida; 
	$mes_proj_os_dt_saida = substr($proj_os_dt_saida_port, -5,2);
	$ano_proj_os_dt_saida = substr($proj_os_dt_saida_port, -10,4);
	$proj_os_dt_saida_tela   = ($ano_proj_os_dt_saida."/".$mes_proj_os_dt_saida);
	if ($proj_os_dt_saida_tela==$f_proj_os_dt_saida_mes)   {
  	$sSelect = "SELECTED";
  	}  else  {
	$sSelect = "";
}  
$proj_os_dt_saida_port = $sRow->proj_os_dt_saida; 
$mes_proj_os_dt_saida = substr($proj_os_dt_saida_port, -5,2);
$ano_proj_os_dt_saida = substr($proj_os_dt_saida_port, -10,4);
$proj_os_dt_saida_port = ($mes_proj_os_dt_saida."/".$ano_proj_os_dt_saida);
$proj_os_dt_saida_db   = ($ano_proj_os_dt_saida."/".$mes_proj_os_dt_saida);
	print("<option value='$proj_os_dt_saida_db' $sSelect>  $proj_os_dt_saida_port </option>");
}   
?>
</select>
<? } ?>
</P></TH>

<?  // configuracao do projeto os
	
  	// configuracao do projeto documentos ?>

<? /* data book */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_documento == "") {
if ( $f_data_book == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_data_book"  style='width:40px'>
 <?
  $query = "select distinct data_book from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by data_book";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->data_book==$f_data_book)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->data_book' $sSelect> $sRow->data_book</option>");  } ?>
</select>
</P></TH>
<? } ?>

<? /* certif. balanc */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_documento == "") {
if ( $f_certif_balanc == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_certif_balanc"  style='width:40px'>
 <?
  $query = "select distinct certif_balanc from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by certif_balanc";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->certif_balanc==$f_certif_balanc)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->certif_balanc' $sSelect> $sRow->certif_balanc</option>");  } ?>
</select>
</P></TH>
<? } ?>

<? /* certif. materiais */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_documento == "") {
if ( $f_certif_materiais == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_certif_materiais"  style='width:40px'>
 <?
  $query = "select distinct certif_materiais from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by certif_materiais";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->certif_materiais==$f_certif_materiais)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->certif_materiais' $sSelect> $sRow->certif_materiais</option>");  } ?>
</select>
</P></TH>
<? } ?>

<? /* desenho certif.  */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_documento == "") {
if ( $f_desenho_certif == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_desenho_certif"  style='width:40px'>
 <?
  $query = "select distinct desenho_certif from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by desenho_certif";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->desenho_certif==$f_desenho_certif)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->desenho_certif' $sSelect> $sRow->desenho_certif</option>");  } ?>
</select>
</P></TH>
<? } ?>

<? } // configuracao do projeto documentos  ?>

<?  /* 		SETOR PROJETOS 		*/ ?>


<? /* 		INSPEÇÃO 		*/ ?>

<? if ( $lib_insp == "ver" OR $lib_insp == "alt") {?>

<? /* TIPO */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_insp == "") {
if ( $f_tipo_insp == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_tipo_insp"  style='width:40px'>
 <?
  $query = "select distinct tipo_insp from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by tipo_insp";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->tipo_insp==$f_tipo_insp)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->tipo_insp' $sSelect> $sRow->tipo_insp</option>");  } ?>
</select>
</P></TH>
<? } ?>

<? /* CLIENTE */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_insp == "") {
if ( $f_cliente_insp == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_cliente_insp"  style='width:40px'>
 <?
  $query = "select distinct cliente_insp from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by cliente_insp";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->cliente_insp==$f_cliente_insp)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->cliente_insp' $sSelect> $sRow->cliente_insp</option>");  } ?>
</select>
</P></TH>
<? } ?>

<? /* DATA DA ENTREGA */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_insp == "") {
		if ( $f_data_insp == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_data_insp"  style='width:95px'>
 <?
  $query = "select distinct data_insp from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by data_insp";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->data_insp==$f_data_insp)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$data_insp = $sRow->data_insp; 
/*$dia_data_insp = substr($data_insp, -2);
$mes_data_insp = substr($data_insp, -5,2);
$ano_data_insp = substr($data_insp, -10,4);
$data_insp = ($dia_data_insp."/".$mes_data_insp."/".$ano_data_insp);*/
  print("<option value='$sRow->data_insp' $sSelect>  $data_insp </option>");
}   }
?>
</select> 


<? /* OBS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<?	if ( $check_insp == "") {
if ( $f_obs_insp == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_obs_insp"  style='width:200px'>
 <?
  $query = "select distinct obs_insp from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by obs_insp";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->obs_insp==$f_obs_insp)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->obs_insp' $sSelect> $sRow->obs_insp</option>");  } ?>
</select>
</P></TH>
<? } ?>

<?  }// INSPEÇÃO ?>


<? /* 		SETORES PCP		*/ ?>

<? if ( $lib_setor_ver == "sim") { ?>

<? /* PROJETOS - STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_projetos_ver == "") { 
	if ( $f_status_almox == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_proj_os_status"  style='width:40px'>
<?
$query = "select distinct proj_os_status from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_almox_db $f_obs_almox_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by proj_os_status";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->proj_os_status==$f_proj_os_status)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->proj_os_status' $sSelect> $sRow->proj_os_status</option>");   }  ?>
</select>
<? } ?>
</P></TH>

<? /* ALMOX - STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_almox_ver == "") { 
	if ( $f_status_almox == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_almox"  style='width:40px'>
<?
$query = "select distinct status_almox from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_almox_db $f_obs_almox_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by status_almox";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_almox==$f_status_almox)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_almox' $sSelect> $sRow->status_almox</option>");   }  ?>
</select>
<? } ?>
</P></TH>

<? /* USINAGEM EIXO - STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_eixo_ver == "") { 
	if ( $f_status_usinagem_eixo == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_usinagem_eixo"  style='width:40px'>
<?
$query = "select distinct status_usinagem_eixo from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db order by status_usinagem_eixo";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_usinagem_eixo==$f_status_usinagem_eixo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_usinagem_eixo' $sSelect> $sRow->status_usinagem_eixo</option>");   }  ?>
</select>
<? }  ?>
</P></TH>

<? /* USINAGEM NUC CUBO - STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_nuc_cubo_ver == "") { 
	if ( $f_status_usinagem_nuc_cubo == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_usinagem_nuc_cubo"  style='width:40px'>
<?
$query = "select distinct status_usinagem_nuc_cubo from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db  $f_status_usinagem_eixo_db $f_dt_prog_usinagem_nuc_cubo_db order by status_usinagem_nuc_cubo";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_usinagem_nuc_cubo==$f_status_usinagem_nuc_cubo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_usinagem_nuc_cubo' $sSelect> $sRow->status_usinagem_nuc_cubo</option>");   }  ?>
</select>
<? }  ?>
</P></TH>


<? /* USINAGEM POL MOT - STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_pol_mot_ver == "") { 
	if ( $f_status_usinagem_pol_mot == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_usinagem_pol_mot"  style='width:40px'>
<?
$query = "select distinct status_usinagem_pol_mot from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db  $f_status_usinagem_eixo_db $f_dt_prog_usinagem_nuc_cubo_db $f_status_usinagem_nuc_cubo_db $f_dt_prog_usinagem_pol_mot_db order by status_usinagem_pol_mot";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_usinagem_pol_mot==$f_status_usinagem_pol_mot)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_usinagem_pol_mot' $sSelect> $sRow->status_usinagem_pol_mot</option>");   }  ?>
</select>
<? }  ?>
</P></TH>


<? /* USINAGEM POL VENT - STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_pol_vent_ver == "") { 
	if ( $f_status_usinagem_pol_vent == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_usinagem_pol_vent"  style='width:40px'>
<?
$query = "select distinct status_usinagem_pol_vent from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db  $f_status_usinagem_eixo_db $f_dt_prog_usinagem_nuc_cubo_db $f_status_usinagem_nuc_cubo_db $f_dt_prog_usinagem_pol_mot_db $f_status_usinagem_pol_mot_db $f_dt_prog_usinagem_pol_vent_db order by status_usinagem_pol_vent";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_usinagem_pol_vent==$f_status_usinagem_pol_vent)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_usinagem_pol_vent' $sSelect> $sRow->status_usinagem_pol_vent</option>");   }  ?>
</select>
<? }  ?>
</P></TH>


<? /* USINAGEM GAXETA - STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_gaxeta_ver == "") { 
	if ( $f_status_usinagem_gaxeta == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_usinagem_gaxeta"  style='width:40px'>
<?
$query = "select distinct status_usinagem_gaxeta from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db  $f_status_usinagem_eixo_db $f_dt_prog_usinagem_nuc_cubo_db $f_status_usinagem_nuc_cubo_db $f_dt_prog_usinagem_pol_mot_db $f_status_usinagem_pol_mot_db $f_dt_prog_usinagem_pol_vent_db $f_status_usinagem_pol_vent_db $f_dt_prog_usinagem_gaxeta_db order by status_usinagem_gaxeta";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_usinagem_gaxeta==$f_status_usinagem_gaxeta)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_usinagem_gaxeta' $sSelect> $sRow->status_usinagem_gaxeta</option>");   }  ?>
</select>
<? }  ?>
</P></TH>

<? /* CORTE - STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_corte_ver == "") { 
	if ( $f_status_corte == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_corte"  style='width:40px'>
<?
$query = "select distinct status_corte from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by status_corte";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_corte==$f_status_corte)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_corte' $sSelect> $sRow->status_corte</option>");   }  ?>
</select>
<? } ?>
</P></TH>


<? /* CALDERARIA 1 - STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_cald1_ver == "") { 
	if ( $f_status_cald1 == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_cald1"  style='width:40px'>
<?
$query = "select distinct status_cald1 from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_status_corte_db $f_status_balanc_db $f_status_cald2_db $f_status_rotor_ll_db $f_status_rotor_sir_db $f_status_usinagem_eixo_db $f_status_usinagem_nuc_cubo_db $f_status_usinagem_pol_mot_db $f_status_usinagem_pol_vent_db $f_status_usinagem_gaxeta_db order by status_cald1";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_cald1==$f_status_cald1)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_cald1' $sSelect> $sRow->status_cald1</option>");   }  ?>
</select>
<? } ?>
</P></TH>

<? /* CALDERARIA 2 - STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_cald2_ver == "") { 
	if ( $f_status_cald2 == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_cald2"  style='width:40px'>
<?
$query = "select distinct status_cald2 from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_status_corte_db $f_status_balanc_db $f_status_cald1_db $f_status_rotor_ll_db $f_status_rotor_sir_db $f_status_usinagem_eixo_db $f_status_usinagem_nuc_cubo_db $f_status_usinagem_pol_mot_db $f_status_usinagem_pol_vent_db $f_status_usinagem_gaxeta_db order by status_cald2";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_cald2==$f_status_cald2)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_cald2' $sSelect> $sRow->status_cald2</option>");   }  ?>
</select>
<? } ?>
</P></TH>


<? /* ROTOR LL - STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_rotorll_ver == "") { 
	if ( $f_status_rotor_ll == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_rotor_ll"  style='width:40px'>
<?
$query = "select distinct status_rotor_ll from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_status_corte_db $f_status_balanc_db $f_status_cald1_db $f_status_cald2_db $f_status_rotor_sir_db $f_status_usinagem_eixo_db $f_status_usinagem_nuc_cubo_db $f_status_usinagem_pol_mot_db $f_status_usinagem_pol_vent_db $f_status_usinagem_gaxeta_db order by status_rotor_ll";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_rotor_ll==$f_status_rotor_ll)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_rotor_ll' $sSelect> $sRow->status_rotor_ll</option>");   }  ?>
</select>
<? } ?>
</P></TH>

<? /* ROTOR SIR - STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_rotorsir_ver == "") { 
	if ( $f_status_rotor_sir == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_rotor_sir"  style='width:40px'>
<?
$query = "select distinct status_rotor_sir from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_status_corte_db $f_status_balanc_db $f_status_cald1_db $f_status_cald2_db $f_status_rotor_ll_db $f_status_usinagem_eixo_db $f_status_usinagem_nuc_cubo_db $f_status_usinagem_pol_mot_db $f_status_usinagem_pol_vent_db $f_status_usinagem_gaxeta_db order by status_rotor_sir";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_rotor_sir==$f_status_rotor_sir)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_rotor_sir' $sSelect> $sRow->status_rotor_sir</option>");   }  ?>
</select>
<? } ?>
</P></TH>

<? /* MONTAGEM - STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_montagem_ver == "") { 
	if ( $f_status_montagem == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_montagem"  style='width:40px'>
<?
$query = "select distinct status_montagem from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_status_corte_db $f_status_balanc_db $f_status_cald1_db $f_status_rotor_ll_db $f_status_rotor_sir_db $f_status_montagem_db $f_status_usinagem_eixo_db $f_status_usinagem_nuc_cubo_db $f_status_usinagem_pol_mot_db $f_status_usinagem_pol_vent_db $f_status_usinagem_gaxeta_db order by status_montagem";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_montagem==$f_status_montagem)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_montagem' $sSelect> $sRow->status_montagem</option>");   }  ?>
</select>
<? } ?>
</P></TH>


<? /* GABINETE - STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_gabinete_ver == "") { 
	if ( $f_status_gabinete == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_gabinete"  style='width:40px'>
<?
$query = "select distinct status_gabinete from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_status_corte_db $f_status_balanc_db $f_status_cald1_db $f_status_rotor_ll_db $f_status_rotor_sir_db $f_status_montagem_db $f_status_usinagem_eixo_db $f_status_usinagem_nuc_cubo_db $f_status_usinagem_pol_mot_db $f_status_usinagem_pol_vent_db $f_status_usinagem_gaxeta_db order by status_gabinete";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_gabinete==$f_status_gabinete)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_gabinete' $sSelect> $sRow->status_gabinete</option>");   }  ?>
</select>
<? } ?>
</P></TH>


<? /* BALANCEAMENTO - STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_balance_ver == "") { 
	if ( $f_status_balanc == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_corte"  style='width:40px'>
<?
$query = "select distinct status_balanc from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_status_corte_db $f_status_cald1_db $f_status_cald2_db $f_status_rotor_ll_db $f_status_rotor_sir_db $f_status_usinagem_eixo_db $f_status_usinagem_nuc_cubo_db $f_status_usinagem_pol_mot_db $f_status_usinagem_pol_vent_db $f_status_usinagem_gaxeta_db order by status_balanc";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_balanc==$f_status_balanc)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_balanc' $sSelect> $sRow->status_balanc</option>");   }  ?>
</select>
<? } ?>
</P></TH>



<? /* PINTURA - STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_pintura_ver == "") { 
	if ( $f_status_pintura == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_pintura"  style='width:40px'>
<?
$query = "select distinct status_pintura from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_status_corte_db $f_status_balanc_db $f_status_cald1_db $f_status_rotor_ll_db $f_status_rotor_sir_db $f_status_usinagem_eixo_db $f_status_usinagem_nuc_cubo_db $f_status_usinagem_pol_mot_db $f_status_usinagem_pol_vent_db $f_status_usinagem_gaxeta_db order by status_pintura";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_pintura==$f_status_pintura)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_pintura' $sSelect> $sRow->status_pintura</option>");   }  ?>
</select>
<? } ?>
</P></TH>


<? /* EXPEDICAO - STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_expedicao_ver == "") { 
	if ( $f_status_expedicao == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_expedicao"  style='width:40px'>
<?
$query = "select distinct status_expedicao from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_status_corte_db $f_status_balanc_db $f_status_cald1_db $f_status_rotor_ll_db $f_status_rotor_sir_db $f_status_usinagem_eixo_db $f_status_usinagem_nuc_cubo_db $f_status_usinagem_pol_mot_db $f_status_usinagem_pol_vent_db $f_status_usinagem_gaxeta_db order by status_expedicao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_expedicao==$f_status_expedicao)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_expedicao' $sSelect> $sRow->status_expedicao</option>");   }  ?>
</select>
<? } ?>
</P></TH>

<? /* FUNILARIA - STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_funilaria_ver == "") { 
	if ( $f_status_funilaria == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_funilaria"  style='width:40px'>
<?
$query = "select distinct status_funilaria from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_status_corte_db $f_status_balanc_db $f_status_cald1_db $f_status_rotor_ll_db $f_status_rotor_sir_db $f_status_usinagem_eixo_db $f_status_usinagem_nuc_cubo_db $f_status_usinagem_pol_mot_db $f_status_usinagem_pol_vent_db $f_status_usinagem_gaxeta_db order by status_funilaria";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_funilaria==$f_status_funilaria)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_funilaria' $sSelect> $sRow->status_funilaria</option>");   }  ?>
</select>
<? } ?>
</P></TH>


<? /* LASER - STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_corte_ver == "") { 
	if ( $f_status_laser == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_laser"  style='width:40px'>
<?
$query = "select distinct status_corte from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_laser_db $f_obs_laser_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by status_corte";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_laser==$f_status_laser)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_laser' $sSelect> $sRow->status_laser</option>");   }  ?>
</select>
<? } ?>
</P></TH>


<? } // configuracao do SETORES PCP   ?>

<?  /* 		SETORES PCP		*/ ?>


<? /* 		SETOR ALMOX 		*/ ?>

<? if ( $lib_almox == "ver" OR $lib_almox == "alt") {?>

<? /* DT PROG */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_almox == "") {		
if ( $f_dt_prog_almox == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_prog_almox"  style='width:90px'>
 <?
  $query = "select distinct dt_prog_almox from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_status_almox_db $f_obs_almox_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_prog_almox";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_prog_almox==$f_dt_prog_almox)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_prog_almox = $sRow->dt_prog_almox;
$dia_dt_prog_almox = substr($dt_prog_almox, -2);
$mes_dt_prog_almox = substr($dt_prog_almox, -5,2);
$ano_dt_prog_almox = substr($dt_prog_almox, -10,4);
if ($dia_dt_prog_almox == "" AND $mes_dt_prog_almox == "" AND $ano_dt_prog_almox == "") 
{$dt_prog_almox = ($dia_dt_prog_almox."".$mes_dt_prog_almox."".$ano_dt_prog_almox); } 
else 
{$dt_prog_almox = ($dia_dt_prog_almox."/".$mes_dt_prog_almox."/".$ano_dt_prog_almox); }
  print("<option value='$sRow->dt_prog_almox' $sSelect>  $dt_prog_almox </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* STATUS */ ?>
<? if ( $lib_almox == "ver" OR $lib_almox == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_almox == "") { 
	if ( $f_status_almox == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_almox"  style='width:40px'>
<?
$query = "select distinct status_almox from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_almox_db $f_obs_almox_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by status_almox";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_almox==$f_status_almox)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_almox' $sSelect> $sRow->status_almox</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_almox == "ver" OR $lib_almox == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_almox == "") { 
	if ( $f_dt_previsao_almox == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_dt_previsao_almox"  style='width:90px'>
<?
$query = "select distinct dt_previsao_almox from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_almox_db $f_obs_almox_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_previsao_almox";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_previsao_almox==$f_dt_previsao_almox)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->dt_previsao_almox' $sSelect> $sRow->dt_previsao_almox</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? } // configuracao do ALMOX   ?>

<?  /* 		SETOR ALMOX 		*/ ?>


<? /* 		SETOR CORTE 		*/ ?>

<? if ( $lib_corte == "ver" OR $lib_corte == "alt") {?>

<? /* DT PROG */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_corte == "") {		
if ( $f_dt_prog_corte == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_prog_corte"  style='width:90px'>
 <?
  $query = "select distinct dt_prog_corte from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_prog_corte";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_prog_corte==$f_dt_prog_corte)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_prog_corte = $sRow->dt_prog_corte;
$dia_dt_prog_corte = substr($dt_prog_corte, -2);
$mes_dt_prog_corte = substr($dt_prog_corte, -5,2);
$ano_dt_prog_corte = substr($dt_prog_corte, -10,4);
if ($dia_dt_prog_corte == "" AND $mes_dt_prog_corte == "" AND $ano_dt_prog_corte == "") 
{$dt_prog_corte = ($dia_dt_prog_corte."".$mes_dt_prog_corte."".$ano_dt_prog_corte); } 
else 
{$dt_prog_corte = ($dia_dt_prog_corte."/".$mes_dt_prog_corte."/".$ano_dt_prog_corte); }
  print("<option value='$sRow->dt_prog_corte' $sSelect>  $dt_prog_corte </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* STATUS */ ?>
<? if ( $lib_corte == "ver" OR $lib_corte == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_corte == "") { 
	if ( $f_status_corte == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_corte"  style='width:40px'>
<?
$query = "select distinct status_corte from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by status_corte";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_corte==$f_status_corte)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_corte' $sSelect> $sRow->status_corte</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_corte == "ver" OR $lib_corte == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_corte == "") { 
	if ( $f_dt_previsao_corte == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_dt_previsao_corte"  style='width:90px'>
<?
$query = "select distinct dt_previsao_corte from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_previsao_corte";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_previsao_corte==$f_dt_previsao_corte)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->dt_previsao_corte' $sSelect> $sRow->dt_previsao_corte</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? } // configuracao do CORTE   ?>

<?  /* 		SETOR CORTE 		*/ ?>
			  
			  
<? /* 		SETOR BALANCEAMENTO 		*/ ?>

<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt") {?>

<? /* DT PROG */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_balanc == "") {		
if ( $f_dt_prog_balanc == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_prog_balanc"  style='width:90px'>
 <?
  $query = "select distinct dt_prog_balanc from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_prog_balanc";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_prog_balanc==$f_dt_prog_balanc)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_prog_balanc = $sRow->dt_prog_balanc;
$dia_dt_prog_balanc = substr($dt_prog_balanc, -2);
$mes_dt_prog_balanc = substr($dt_prog_balanc, -5,2);
$ano_dt_prog_balanc = substr($dt_prog_balanc, -10,4);
if ($dia_dt_prog_balanc == "" AND $mes_dt_prog_balanc == "" AND $ano_dt_prog_balanc == "") 
{$dt_prog_balanc = ($dia_dt_prog_balanc."".$mes_dt_prog_balanc."".$ano_dt_prog_balanc); } 
else 
{$dt_prog_balanc = ($dia_dt_prog_balanc."/".$mes_dt_prog_balanc."/".$ano_dt_prog_balanc); }
  print("<option value='$sRow->dt_prog_balanc' $sSelect>  $dt_prog_balanc </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* STATUS */ ?>

<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_balanc == "") { 
	if ( $f_status_balanc == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_balanc"  style='width:40px'>
<?
$query = "select distinct status_balanc from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by status_balanc";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_balanc==$f_status_balanc)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_balanc' $sSelect> $sRow->status_balanc</option>");   }  ?>
</select>
<? }  ?>
</P></TH>


<? /* DT PREVISAO */ ?>
<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_balanc == "") { 
	if ( $f_dt_previsao_balanc == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_dt_previsao_balanc"  style='width:90px'>
<?
$query = "select distinct dt_previsao_balanc from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_previsao_balanc";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_previsao_balanc==$f_dt_previsao_balanc)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->dt_previsao_balanc' $sSelect> $sRow->dt_previsao_balanc</option>");   }  ?>
</select>
<? } } ?>
</P></TH>


<? } // configuracao do balanceamento  ?>

<?  /* 		SETOR BALANCEAMENTO 		*/ ?>


<? /* 		SETOR CALDERARIA 1 		*/ ?>

<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt") {?>

<? /* DT PROG */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_cald1 == "") {		
if ( $f_dt_prog_cald1 == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_prog_cald1"  style='width:90px'>
 <?
  $query = "select distinct dt_prog_cald1 from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db  $f_status_balanc_db $f_status_cald1_db $f_dt_previsao_cald1_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_prog_cald1";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_prog_cald1==$f_dt_prog_cald1)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_prog_cald1 = $sRow->dt_prog_cald1;
$dia_dt_prog_cald1 = substr($dt_prog_cald1, -2);
$mes_dt_prog_cald1 = substr($dt_prog_cald1, -5,2);
$ano_dt_prog_cald1 = substr($dt_prog_cald1, -10,4);
if ($dia_dt_prog_cald1 == "" AND $mes_dt_prog_cald1 == "" AND $ano_dt_prog_cald1 == "") 
{$dt_prog_cald1 = ($dia_dt_prog_cald1."".$mes_dt_prog_cald1."".$ano_dt_prog_cald1); } 
else 
{$dt_prog_cald1 = ($dia_dt_prog_cald1."/".$mes_dt_prog_cald1."/".$ano_dt_prog_cald1); }
  print("<option value='$sRow->dt_prog_cald1' $sSelect>  $dt_prog_cald1 </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_cald1 == "") { 
	if ( $f_status_cald1 == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_cald1"  style='width:40px'>
<?
$query = "select distinct status_cald1 from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_obs_balanc_db $f_dt_prog_cald1_db $f_dt_previsao_cald1_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by status_cald1";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_cald1==$f_status_cald1)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_cald1' $sSelect> $sRow->status_cald1</option>");   }  ?>
</select>
<? }  ?>
</P></TH>


<? /* DT PREVISAO */ ?>
<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_cald1 == "") { 
	if ( $f_dt_previsao_cald1 == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_dt_previsao_cald1"  style='width:90px'>
<?
$query = "select distinct dt_previsao_cald1 from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_cald1_db $f_obs_cald1_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_previsao_cald1";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_previsao_cald1==$f_dt_previsao_cald1)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->dt_previsao_cald1' $sSelect> $sRow->dt_previsao_cald1</option>");   }  ?>
</select>
<? } } ?>
</P></TH>


<? } // configuracao do balanceamento  ?>

<?  /* 		SETOR CALDERARIA 1 		*/ ?>


<? /* 		SETOR CALDERARIA 2 		*/ ?>

<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt") {?>

<? /* DT PROG */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_cald2 == "") {		
if ( $f_dt_prog_cald2 == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_prog_cald2"  style='width:90px'>
 <?
  $query = "select distinct dt_prog_cald2 from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db  $f_status_balanc_db $f_status_cald1_db $f_dt_previsao_cald1_db $f_status_cald2_db $f_dt_previsao_cald2_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_prog_cald2";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_prog_cald2==$f_dt_prog_cald2)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_prog_cald2 = $sRow->dt_prog_cald2;
$dia_dt_prog_cald2 = substr($dt_prog_cald2, -2);
$mes_dt_prog_cald2 = substr($dt_prog_cald2, -5,2);
$ano_dt_prog_cald2 = substr($dt_prog_cald2, -10,4);
if ($dia_dt_prog_cald2 == "" AND $mes_dt_prog_cald2 == "" AND $ano_dt_prog_cald2 == "") 
{$dt_prog_cald2 = ($dia_dt_prog_cald2."".$mes_dt_prog_cald2."".$ano_dt_prog_cald2); } 
else 
{$dt_prog_cald2 = ($dia_dt_prog_cald2."/".$mes_dt_prog_cald2."/".$ano_dt_prog_cald2); }
  print("<option value='$sRow->dt_prog_cald2' $sSelect>  $dt_prog_cald2 </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_cald2 == "") { 
	if ( $f_status_cald2 == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_cald2"  style='width:40px'>
<?
$query = "select distinct status_cald2 from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_obs_balanc_db $f_dt_prog_cald1_db $f_dt_previsao_cald1_db $f_dt_prog_cald2_db $f_dt_previsao_cald2_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by status_cald2";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_cald2==$f_status_cald2)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_cald2' $sSelect> $sRow->status_cald2</option>");   }  ?>
</select>
<? }  ?>
</P></TH>


<? /* DT PREVISAO */ ?>
<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_cald2 == "") { 
	if ( $f_dt_previsao_cald2 == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_dt_previsao_cald2"  style='width:90px'>
<?
$query = "select distinct dt_previsao_cald2 from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_cald1_db $f_obs_cald1_db $f_dt_prog_cald2_db $f_obs_cald2_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_previsao_cald2";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_previsao_cald2==$f_dt_previsao_cald2)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->dt_previsao_cald2' $sSelect> $sRow->dt_previsao_cald2</option>");   }  ?>
</select>
<? } } ?>
</P></TH>


<? } // configuracao do balanceamento  ?>

<?  /* 		SETOR CALDERARIA 2 		*/ ?>


<? /* 		SETOR PINTURA 		*/ ?>

<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt") {?>

<? /* DT PROG */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_pinturasetor == "") {		
if ( $f_dt_prog_pintura == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_prog_pintura"  style='width:90px'>
 <?
  $query = "select distinct dt_prog_pintura from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_status_corte_db $f_status_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_dt_previsao_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db $f_status_pintura_db $f_dt_previsao_pintura_db order by dt_prog_pintura";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_prog_pintura==$f_dt_prog_pintura)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_prog_pintura = $sRow->dt_prog_pintura;
$dia_dt_prog_pintura = substr($dt_prog_pintura, -2);
$mes_dt_prog_pintura = substr($dt_prog_pintura, -5,2);
$ano_dt_prog_pintura = substr($dt_prog_pintura, -10,4);
if ($dia_dt_prog_pintura == "" AND $mes_dt_prog_pintura == "" AND $ano_dt_prog_pintura == "") 
{$dt_prog_pintura = ($dia_dt_prog_pintura."".$mes_dt_prog_pintura."".$ano_dt_prog_pintura); } 
else 
{$dt_prog_pintura = ($dia_dt_prog_pintura."/".$mes_dt_prog_pintura."/".$ano_dt_prog_pintura); }
  print("<option value='$sRow->dt_prog_pintura' $sSelect>  $dt_prog_pintura </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* STATUS */ ?>
<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_pinturasetor == "") { 
	if ( $f_status_pintura == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_pintura"  style='width:40px'>
<?
$query = "select distinct status_pintura from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db $f_dt_prog_pintura_db $f_dt_previsao_pintura_db order by status_pintura";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_pintura==$f_status_pintura)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_pintura' $sSelect> $sRow->status_pintura</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_pinturasetor == "") { 
	if ( $f_dt_previsao_pintura == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_dt_previsao_pintura"  style='width:90px'>
<?
$query = "select distinct dt_previsao_pintura from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_dt_prog_pintura_db $f_status_pintura_db $f_dt_prog_balanc_db $f_status_balanc_db  $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_previsao_pintura";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_previsao_pintura==$f_dt_previsao_pintura)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->dt_previsao_pintura' $sSelect> $sRow->dt_previsao_pintura</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? } // configuracao do pintura   ?>

<?  /* 		SETOR PINTURA 		*/ ?>



<? /* 		SETOR PREPARACAO 		*/ ?>

<? if ( $lib_preparacao == "ver" OR $lib_preparacao == "alt") {?>

<? /* DT PROG */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_preparacao == "") {		
if ( $f_dt_prog_preparacao == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_prog_preparacao"  style='width:90px'>
 <?
  $query = "select distinct dt_prog_preparacao from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_status_corte_db $f_status_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_dt_previsao_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db $f_status_pintura_db $f_dt_previsao_pintura_db order by dt_prog_preparacao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_prog_preparacao==$f_dt_prog_preparacao)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_prog_preparacao = $sRow->dt_prog_preparacao;
$dia_dt_prog_preparacao = substr($dt_prog_preparacao, -2);
$mes_dt_prog_preparacao = substr($dt_prog_preparacao, -5,2);
$ano_dt_prog_preparacao = substr($dt_prog_preparacao, -10,4);
if ($dia_dt_prog_preparacao == "" AND $mes_dt_prog_preparacao == "" AND $ano_dt_prog_preparacao == "") 
{$dt_prog_preparacao = ($dia_dt_prog_preparacao."".$mes_dt_prog_preparacao."".$ano_dt_prog_preparacao); } 
else 
{$dt_prog_preparacao = ($dia_dt_prog_preparacao."/".$mes_dt_prog_preparacao."/".$ano_dt_prog_preparacao); }
  print("<option value='$sRow->dt_prog_preparacao' $sSelect>  $dt_prog_preparacao </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* STATUS */ ?>
<? if ( $lib_preparacao == "ver" OR $lib_preparacao == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_preparacao == "") { 
	if ( $f_status_preparacao == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_preparacao"  style='width:40px'>
<?
$query = "select distinct status_preparacao from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db $f_dt_prog_pintura_db $f_dt_previsao_pintura_db order by status_preparacao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_preparacao==$f_status_preparacao)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_preparacao' $sSelect> $sRow->status_preparacao</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_preparacao == "ver" OR $lib_preparacao == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_preparacao == "") { 
	if ( $f_dt_previsao_preparacao == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_dt_previsao_preparacao"  style='width:90px'>
<?
$query = "select distinct dt_previsao_preparacao from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_dt_prog_pintura_db $f_status_pintura_db $f_dt_prog_balanc_db $f_status_balanc_db  $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_previsao_preparacao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_previsao_preparacao==$f_dt_previsao_preparacao)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->dt_previsao_preparacao' $sSelect> $sRow->dt_previsao_preparacao</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? } // configuracao do PREPARACAO   ?>

<?  /* 		SETOR PREPARACAO 		*/ ?>


<? /* 		SETOR ROTOR LL 		*/ ?>

<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt") {?>

<? /* DT PROG */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_rotor_ll == "") {		
if ( $f_dt_prog_rotor_ll == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_prog_rotor_ll"  style='width:90px'>
 <?
  $query = "select distinct dt_prog_rotor_ll from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db  $f_status_balanc_db $f_status_cald1_db $f_dt_previsao_cald1_db $f_status_cald2_db $f_dt_previsao_cald1_db $f_status_rotor_ll_db $f_dt_previsao_rotor_ll_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_prog_rotor_ll";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_prog_rotor_ll==$f_dt_prog_rotor_ll)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_prog_rotor_ll = $sRow->dt_prog_rotor_ll;
$dia_dt_prog_rotor_ll = substr($dt_prog_rotor_ll, -2);
$mes_dt_prog_rotor_ll = substr($dt_prog_rotor_ll, -5,2);
$ano_dt_prog_rotor_ll = substr($dt_prog_rotor_ll, -10,4);
if ($dia_dt_prog_rotor_ll == "" AND $mes_dt_prog_rotor_ll == "" AND $ano_dt_prog_rotor_ll == "") 
{$dt_prog_rotor_ll = ($dia_dt_prog_rotor_ll."".$mes_dt_prog_rotor_ll."".$ano_dt_prog_rotor_ll); } 
else 
{$dt_prog_rotor_ll = ($dia_dt_prog_rotor_ll."/".$mes_dt_prog_rotor_ll."/".$ano_dt_prog_rotor_ll); }
  print("<option value='$sRow->dt_prog_rotor_ll' $sSelect>  $dt_prog_rotor_ll </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_rotor_ll == "") { 
	if ( $f_status_rotor_ll == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_rotor_ll"  style='width:40px'>
<?
$query = "select distinct status_rotor_ll from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_obs_balanc_db $f_dt_prog_cald1_db $f_dt_previsao_cald1_db $f_dt_prog_cald2_db $f_dt_previsao_cald2_db $f_dt_prog_rotor_ll_db $f_dt_previsao_rotor_ll_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by status_rotor_ll";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_rotor_ll==$f_status_rotor_ll)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_rotor_ll' $sSelect> $sRow->status_rotor_ll</option>");   }  ?>
</select>
<? }  ?>
</P></TH>


<? /* DT PREVISAO */ ?>
<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_rotor_ll == "") { 
	if ( $f_dt_previsao_rotor_ll == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_dt_previsao_rotor_ll"  style='width:100px'>
<?
$query = "select distinct dt_previsao_rotor_ll from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_cald1_db $f_obs_cald1_db $f_dt_prog_cald2_db $f_obs_cald2_db $f_dt_prog_rotor_ll_db $f_obs_rotor_ll_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_previsao_rotor_ll";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_previsao_rotor_ll==$f_dt_previsao_rotor_ll)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->dt_previsao_rotor_ll' $sSelect> $sRow->dt_previsao_rotor_ll</option>");   }  ?>
</select>
<? } } ?>
</P></TH>


<? } // configuracao do ROTOR LL  ?>

<?  /* 		SETOR ROTOR LL 		*/ ?>

<? /* 		SETOR ROTOR SIR 		*/ ?>

<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt") {?>

<? /* DT PROG */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_rotor_sir == "") {		
if ( $f_dt_prog_rotor_sir == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_prog_rotor_sir"  style='width:90px'>
 <?
  $query = "select distinct dt_prog_rotor_sir from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db  $f_status_balanc_db $f_status_cald1_db $f_dt_previsao_cald1_db $f_status_cald2_db $f_dt_previsao_cald1_db $f_status_rotor_ll_db $f_dt_previsao_rotor_ll_db $f_status_rotor_sir_db $f_dt_previsao_rotor_sir_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_prog_rotor_sir";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_prog_rotor_sir==$f_dt_prog_rotor_sir)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_prog_rotor_sir = $sRow->dt_prog_rotor_sir;
$dia_dt_prog_rotor_sir = substr($dt_prog_rotor_sir, -2);
$mes_dt_prog_rotor_sir = substr($dt_prog_rotor_sir, -5,2);
$ano_dt_prog_rotor_sir = substr($dt_prog_rotor_sir, -10,4);
if ($dia_dt_prog_rotor_sir == "" AND $mes_dt_prog_rotor_sir == "" AND $ano_dt_prog_rotor_sir == "") 
{$dt_prog_rotor_sir = ($dia_dt_prog_rotor_sir."".$mes_dt_prog_rotor_sir."".$ano_dt_prog_rotor_sir); } 
else 
{$dt_prog_rotor_sir = ($dia_dt_prog_rotor_sir."/".$mes_dt_prog_rotor_sir."/".$ano_dt_prog_rotor_sir); }
  print("<option value='$sRow->dt_prog_rotor_sir' $sSelect>  $dt_prog_rotor_sir </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_rotor_sir == "") { 
	if ( $f_status_rotor_sir == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_rotor_sir"  style='width:40px'>
<?
$query = "select distinct status_rotor_sir from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_obs_balanc_db $f_dt_prog_cald1_db $f_dt_previsao_cald1_db $f_dt_prog_cald2_db $f_dt_previsao_cald2_db $f_dt_prog_rotor_ll_db $f_dt_previsao_rotor_ll_db $f_dt_prog_rotor_sir_db $f_dt_previsao_rotor_sir_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by status_rotor_sir";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_rotor_sir==$f_status_rotor_sir)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_rotor_sir' $sSelect> $sRow->status_rotor_sir</option>");   }  ?>
</select>
<? }  ?>
</P></TH>


<? /* DT PREVISAO */ ?>
<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_rotor_sir == "") { 
	if ( $f_dt_previsao_rotor_sir == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_dt_previsao_rotor_sir"  style='width:100px'>
<?
$query = "select distinct dt_previsao_rotor_sir from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_cald1_db $f_obs_cald1_db $f_dt_prog_cald2_db $f_obs_cald2_db $f_dt_prog_rotor_ll_db $f_obs_rotor_ll_db $f_dt_prog_rotor_sir_db $f_obs_rotor_sir_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_previsao_rotor_sir";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_previsao_rotor_sir==$f_dt_previsao_rotor_sir)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->dt_previsao_rotor_sir' $sSelect> $sRow->dt_previsao_rotor_sir</option>");   }  ?>
</select>
<? } } ?>
</P></TH>


<? } ?>

<?  /* 		SETOR ROTOR SIR 		*/ ?>


<? /* 		SETOR MONTAGEM 		*/ ?>

<? if ( $lib_montagem == "ver" OR $lib_montagem == "alt") {?>

<? /* DT PROG */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_montagem == "") {		
if ( $f_dt_prog_montagem == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_prog_montagem"  style='width:90px'>
 <?
  $query = "select distinct dt_prog_montagem from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db  $f_status_balanc_db $f_status_cald1_db $f_dt_previsao_cald1_db $f_status_cald2_db $f_dt_previsao_cald1_db $f_status_rotor_ll_db $f_dt_previsao_rotor_ll_db $f_dt_previsao_montagem_db $f_status_montagem_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_prog_montagem";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_prog_montagem==$f_dt_prog_montagem)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_prog_montagem = $sRow->dt_prog_montagem;
$dia_dt_prog_montagem = substr($dt_prog_montagem, -2);
$mes_dt_prog_montagem = substr($dt_prog_montagem, -5,2);
$ano_dt_prog_montagem = substr($dt_prog_montagem, -10,4);
if ($dia_dt_prog_montagem == "" AND $mes_dt_prog_montagem == "" AND $ano_dt_prog_montagem == "") 
{$dt_prog_montagem = ($dia_dt_prog_montagem."".$mes_dt_prog_montagem."".$ano_dt_prog_montagem); } 
else 
{$dt_prog_montagem = ($dia_dt_prog_montagem."/".$mes_dt_prog_montagem."/".$ano_dt_prog_montagem); }
  print("<option value='$sRow->dt_prog_montagem' $sSelect>  $dt_prog_montagem </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_montagem == "") { 
	if ( $f_status_montagem == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_montagem"  style='width:40px'>
<?
$query = "select distinct status_montagem from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_obs_balanc_db $f_dt_prog_cald1_db $f_dt_previsao_cald1_db $f_dt_prog_cald2_db $f_dt_previsao_cald2_db $f_dt_prog_rotor_ll_db $f_dt_prog_montagem_db $f_dt_previsao_montagem_db $f_dt_previsao_rotor_ll_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by status_montagem";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_montagem==$f_status_montagem)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_montagem' $sSelect> $sRow->status_montagem</option>");   }  ?>
</select>
<? }  ?>
</P></TH>


<? /* DT PREVISAO */ ?>
<? if ( $lib_montagem == "ver" OR $lib_montagem == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_montagem == "") { 
	if ( $f_dt_previsao_montagem == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_dt_previsao_montagem"  style='width:100px'>
<?
$query = "select distinct dt_previsao_montagem from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_cald1_db $f_dt_prog_cald2_db $f_dt_prog_montagem_db $f_status_montagem_db $f_dt_prog_rotor_ll_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_previsao_montagem";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_previsao_montagem==$f_dt_previsao_montagem)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->dt_previsao_montagem' $sSelect> $sRow->dt_previsao_montagem</option>");   }  ?>
</select>
<? } } ?>
</P></TH>


<? } // configuracao do MONTAGEM  ?>

<?  /* 		SETOR MONTAGEM 		*/ ?>



<? /* 		SETOR GABINETE 		*/ ?>

<? if ( $lib_gabinete == "ver" OR $lib_gabinete == "alt") {?>

<? /* DT PROG */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_gabinete == "") {		
if ( $f_dt_prog_gabinete == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_prog_gabinete"  style='width:90px'>
 <?
  $query = "select distinct dt_prog_gabinete from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db  $f_status_balanc_db $f_status_cald1_db $f_dt_previsao_cald1_db $f_status_cald2_db $f_dt_previsao_cald1_db $f_status_rotor_ll_db $f_dt_previsao_rotor_ll_db $f_dt_previsao_montagem_db $f_status_montagem_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_prog_gabinete";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_prog_gabinete==$f_dt_prog_gabinete)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_prog_gabinete = $sRow->dt_prog_gabinete;
$dia_dt_prog_gabinete = substr($dt_prog_gabinete, -2);
$mes_dt_prog_gabinete = substr($dt_prog_gabinete, -5,2);
$ano_dt_prog_gabinete = substr($dt_prog_gabinete, -10,4);
if ($dia_dt_prog_gabinete == "" AND $mes_dt_prog_gabinete == "" AND $ano_dt_prog_gabinete == "") 
{$dt_prog_gabinete = ($dia_dt_prog_gabinete."".$mes_dt_prog_gabinete."".$ano_dt_prog_gabinete); } 
else 
{$dt_prog_gabinete = ($dia_dt_prog_gabinete."/".$mes_dt_prog_gabinete."/".$ano_dt_prog_gabinete); }
  print("<option value='$sRow->dt_prog_gabinete' $sSelect>  $dt_prog_gabinete </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_gabinete == "") { 
	if ( $f_status_gabinete == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_gabinete"  style='width:40px'>
<?
$query = "select distinct status_gabinete from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_obs_balanc_db $f_dt_prog_cald1_db $f_dt_previsao_cald1_db $f_dt_prog_cald2_db $f_dt_previsao_cald2_db $f_dt_prog_rotor_ll_db $f_dt_prog_montagem_db $f_dt_previsao_montagem_db $f_dt_previsao_rotor_ll_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by status_gabinete";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_gabinete==$f_status_gabinete)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_gabinete' $sSelect> $sRow->status_gabinete</option>");   }  ?>
</select>
<? }  ?>
</P></TH>


<? /* DT PREVISAO */ ?>
<? if ( $lib_gabinete == "ver" OR $lib_gabinete == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_gabinete == "") { 
	if ( $f_dt_previsao_gabinete == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_dt_previsao_gabinete"  style='width:100px'>
<?
$query = "select distinct dt_previsao_gabinete from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_cald1_db $f_dt_prog_cald2_db $f_dt_prog_montagem_db $f_status_montagem_db $f_dt_prog_rotor_ll_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_previsao_gabinete";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_previsao_gabinete==$f_dt_previsao_gabinete)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->dt_previsao_gabinete' $sSelect> $sRow->dt_previsao_gabinete</option>");   }  ?>
</select>
<? } } ?>
</P></TH>


<? } // configuracao do GABINETE  ?>

<?  /* 		SETOR GABINETE 		*/ ?>



<? /* 		SETOR USINAGEM EIXO 		*/ ?>

<? if ( $lib_usinagem_eixo == "ver" OR $lib_usinagem_eixo == "alt") {?>

<? /* DT PROG */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_usinagem_eixo == "") {		
if ( $f_dt_prog_usinagem_eixo == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_prog_usinagem_eixo"  style='width:90px'>
 <?
  $query = "select distinct dt_prog_usinagem_eixo from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_status_balanc_db $f_obs_balanc_db $f_status_usinagem_eixo_db order by dt_prog_usinagem_eixo";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_prog_usinagem_eixo==$f_dt_prog_usinagem_eixo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_prog_usinagem_eixo = $sRow->dt_prog_usinagem_eixo;
$dia_dt_prog_usinagem_eixo = substr($dt_prog_usinagem_eixo, -2);
$mes_dt_prog_usinagem_eixo = substr($dt_prog_usinagem_eixo, -5,2);
$ano_dt_prog_usinagem_eixo = substr($dt_prog_usinagem_eixo, -10,4);
if ($dia_dt_prog_usinagem_eixo == "" AND $mes_dt_prog_usinagem_eixo == "" AND $ano_dt_prog_usinagem_eixo == "") 
{$dt_prog_usinagem_eixo = ($dia_dt_prog_usinagem_eixo."".$mes_dt_prog_usinagem_eixo."".$ano_dt_prog_usinagem_eixo); } 
else 
{$dt_prog_usinagem_eixo = ($dia_dt_prog_usinagem_eixo."/".$mes_dt_prog_usinagem_eixo."/".$ano_dt_prog_usinagem_eixo); }
  print("<option value='$sRow->dt_prog_usinagem_eixo' $sSelect>  $dt_prog_usinagem_eixo </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_usinagem_eixo == "") { 
	if ( $f_status_usinagem_eixo == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_usinagem_eixo"  style='width:40px'>
<?
$query = "select distinct status_usinagem_eixo from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db order by status_usinagem_eixo";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_usinagem_eixo==$f_status_usinagem_eixo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_usinagem_eixo' $sSelect> $sRow->status_usinagem_eixo</option>");   }  ?>
</select>
<? }  ?>
</P></TH>


<? /* DT PREVISAO */ ?>
<? if ( $lib_usinagem_eixo == "ver" OR $lib_usinagem_eixo == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_usinagem_eixo == "") { 
	if ( $f_dt_previsao_usinagem_eixo == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_dt_previsao_usinagem_eixo"  style='width:90px'>
<?
$query = "select distinct dt_previsao_usinagem_eixo from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_previsao_usinagem_eixo";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_previsao_usinagem_eixo==$f_dt_previsao_usinagem_eixo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->dt_previsao_usinagem_eixo' $sSelect> $sRow->dt_previsao_usinagem_eixo</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? } // configuracao do USINAGEM EIXO  ?>

<?  /* 		SETOR USINAGEM EIXO 		*/ ?>

<? /* 		SETOR USINAGEM NUC_CUBO 		*/ ?>

<? if ( $lib_usinagem_nuc_cubo == "ver" OR $lib_usinagem_nuc_cubo == "alt") {?>

<? /* DT PROG */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_usinagem_nuc_cubo == "") {		
if ( $f_dt_prog_usinagem_nuc_cubo == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_prog_usinagem_nuc_cubo"  style='width:90px'>
 <?
  $query = "select distinct dt_prog_usinagem_nuc_cubo from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db $f_status_usinagem_nuc_cubo_db order by dt_prog_usinagem_nuc_cubo";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_prog_usinagem_nuc_cubo==$f_dt_prog_usinagem_nuc_cubo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_prog_usinagem_nuc_cubo = $sRow->dt_prog_usinagem_nuc_cubo;
$dia_dt_prog_usinagem_nuc_cubo = substr($dt_prog_usinagem_nuc_cubo, -2);
$mes_dt_prog_usinagem_nuc_cubo = substr($dt_prog_usinagem_nuc_cubo, -5,2);
$ano_dt_prog_usinagem_nuc_cubo = substr($dt_prog_usinagem_nuc_cubo, -10,4);
if ($dia_dt_prog_usinagem_nuc_cubo == "" AND $mes_dt_prog_usinagem_nuc_cubo == "" AND $ano_dt_prog_usinagem_nuc_cubo == "") 
{$dt_prog_usinagem_nuc_cubo = ($dia_dt_prog_usinagem_nuc_cubo."".$mes_dt_prog_usinagem_nuc_cubo."".$ano_dt_prog_usinagem_nuc_cubo); } 
else 
{$dt_prog_usinagem_nuc_cubo = ($dia_dt_prog_usinagem_nuc_cubo."/".$mes_dt_prog_usinagem_nuc_cubo."/".$ano_dt_prog_usinagem_nuc_cubo); }
  print("<option value='$sRow->dt_prog_usinagem_nuc_cubo' $sSelect>  $dt_prog_usinagem_nuc_cubo </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_usinagem_nuc_cubo == "") { 
	if ( $f_status_usinagem_nuc_cubo == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_usinagem_nuc_cubo"  style='width:40px'>
<?
$query = "select distinct status_usinagem_nuc_cubo from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db  $f_status_usinagem_eixo_db $f_dt_prog_usinagem_nuc_cubo_db order by status_usinagem_nuc_cubo";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_usinagem_nuc_cubo==$f_status_usinagem_nuc_cubo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_usinagem_nuc_cubo' $sSelect> $sRow->status_usinagem_nuc_cubo</option>");   }  ?>
</select>
<? }  ?>
</P></TH>


<? /* DT PREVISAO */ ?>
<? if ( $lib_usinagem_nuc_cubo == "ver" OR $lib_usinagem_nuc_cubo == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_usinagem_nuc_cubo == "") { 
	if ( $f_dt_previsao_usinagem_nuc_cubo == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_dt_previsao_usinagem_nuc_cubo"  style='width:90px'>
<?
$query = "select distinct dt_previsao_usinagem_nuc_cubo from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_previsao_usinagem_nuc_cubo";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_previsao_usinagem_nuc_cubo==$f_dt_previsao_usinagem_nuc_cubo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->dt_previsao_usinagem_nuc_cubo' $sSelect> $sRow->dt_previsao_usinagem_nuc_cubo</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? } // configuracao do USINAGEM nuc_cubo  ?>

<?  /* 		SETOR USINAGEM NUC_CUBO 		*/ ?>

<? /* 		SETOR USINAGEM POL_MOT 		*/ ?>

<? if ( $lib_usinagem_pol_mot == "ver" OR $lib_usinagem_pol_mot == "alt") {?>

<? /* DT PROG */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_usinagem_pol_mot == "") {		
if ( $f_dt_prog_usinagem_pol_mot == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_prog_usinagem_pol_mot"  style='width:90px'>
 <?
  $query = "select distinct dt_prog_usinagem_pol_mot from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db $f_dt_prog_usinagem_nuc_cubo_db $f_status_usinagem_nuc_cubo_db $f_status_usinagem_pol_mot_db order by dt_prog_usinagem_pol_mot";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_prog_usinagem_pol_mot==$f_dt_prog_usinagem_pol_mot)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_prog_usinagem_pol_mot = $sRow->dt_prog_usinagem_pol_mot;
$dia_dt_prog_usinagem_pol_mot = substr($dt_prog_usinagem_pol_mot, -2);
$mes_dt_prog_usinagem_pol_mot = substr($dt_prog_usinagem_pol_mot, -5,2);
$ano_dt_prog_usinagem_pol_mot = substr($dt_prog_usinagem_pol_mot, -10,4);
if ($dia_dt_prog_usinagem_pol_mot == "" AND $mes_dt_prog_usinagem_pol_mot == "" AND $ano_dt_prog_usinagem_pol_mot == "") 
{$dt_prog_usinagem_pol_mot = ($dia_dt_prog_usinagem_pol_mot."".$mes_dt_prog_usinagem_pol_mot."".$ano_dt_prog_usinagem_pol_mot); } 
else 
{$dt_prog_usinagem_pol_mot = ($dia_dt_prog_usinagem_pol_mot."/".$mes_dt_prog_usinagem_pol_mot."/".$ano_dt_prog_usinagem_pol_mot); }
  print("<option value='$sRow->dt_prog_usinagem_pol_mot' $sSelect>  $dt_prog_usinagem_pol_mot </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_usinagem_pol_mot == "") { 
	if ( $f_status_usinagem_pol_mot == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_usinagem_pol_mot"  style='width:40px'>
<?
$query = "select distinct status_usinagem_pol_mot from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db  $f_status_usinagem_eixo_db $f_dt_prog_usinagem_nuc_cubo_db $f_status_usinagem_nuc_cubo_db $f_dt_prog_usinagem_pol_mot_db order by status_usinagem_pol_mot";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_usinagem_pol_mot==$f_status_usinagem_pol_mot)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_usinagem_pol_mot' $sSelect> $sRow->status_usinagem_pol_mot</option>");   }  ?>
</select>
<? }  ?>
</P></TH>


<? /* DT PREVISAO */ ?>
<? if ( $lib_usinagem_pol_mot == "ver" OR $lib_usinagem_pol_mot == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_usinagem_pol_mot == "") { 
	if ( $f_dt_previsao_usinagem_pol_mot == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_dt_previsao_usinagem_pol_mot"  style='width:90px'>
<?
$query = "select distinct dt_previsao_usinagem_pol_mot from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_previsao_usinagem_pol_mot";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_previsao_usinagem_pol_mot==$f_dt_previsao_usinagem_pol_mot)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->dt_previsao_usinagem_pol_mot' $sSelect> $sRow->dt_previsao_usinagem_pol_mot</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? } // configuracao do USINAGEM POL_MOT  ?>

<?  /* 		SETOR USINAGEM POL_MOT 		*/ ?>

<? /* 		SETOR USINAGEM POL_VENT 		*/ ?>

<? if ( $lib_usinagem_pol_vent == "ver" OR $lib_usinagem_pol_vent == "alt") {?>

<? /* DT PROG */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_usinagem_pol_vent == "") {		
if ( $f_dt_prog_usinagem_pol_vent == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_prog_usinagem_pol_vent"  style='width:90px'>
 <?
  $query = "select distinct dt_prog_usinagem_pol_vent from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db $f_dt_prog_usinagem_nuc_cubo_db $f_status_usinagem_nuc_cubo_db $f_dt_prog_usinagem_pol_mot_db $f_status_usinagem_pol_mot_db $f_status_usinagem_pol_vent_db order by dt_prog_usinagem_pol_vent";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_prog_usinagem_pol_vent==$f_dt_prog_usinagem_pol_vent)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_prog_usinagem_pol_vent = $sRow->dt_prog_usinagem_pol_vent;
$dia_dt_prog_usinagem_pol_vent = substr($dt_prog_usinagem_pol_vent, -2);
$mes_dt_prog_usinagem_pol_vent = substr($dt_prog_usinagem_pol_vent, -5,2);
$ano_dt_prog_usinagem_pol_vent = substr($dt_prog_usinagem_pol_vent, -10,4);
if ($dia_dt_prog_usinagem_pol_vent == "" AND $mes_dt_prog_usinagem_pol_vent == "" AND $ano_dt_prog_usinagem_pol_vent == "") 
{$dt_prog_usinagem_pol_vent = ($dia_dt_prog_usinagem_pol_vent."".$mes_dt_prog_usinagem_pol_vent."".$ano_dt_prog_usinagem_pol_vent); } 
else 
{$dt_prog_usinagem_pol_vent = ($dia_dt_prog_usinagem_pol_vent."/".$mes_dt_prog_usinagem_pol_vent."/".$ano_dt_prog_usinagem_pol_vent); }
  print("<option value='$sRow->dt_prog_usinagem_pol_vent' $sSelect>  $dt_prog_usinagem_pol_vent </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_usinagem_pol_vent == "") { 
	if ( $f_status_usinagem_pol_vent == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_usinagem_pol_vent"  style='width:40px'>
<?
$query = "select distinct status_usinagem_pol_vent from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db  $f_status_usinagem_eixo_db $f_dt_prog_usinagem_nuc_cubo_db $f_status_usinagem_nuc_cubo_db $f_dt_prog_usinagem_pol_mot_db $f_status_usinagem_pol_mot_db $f_dt_prog_usinagem_pol_vent_db order by status_usinagem_pol_vent";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_usinagem_pol_vent==$f_status_usinagem_pol_vent)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_usinagem_pol_vent' $sSelect> $sRow->status_usinagem_pol_vent</option>");   }  ?>
</select>
<? }  ?>
</P></TH>


<? /* DT PREVISAO */ ?>
<? if ( $lib_usinagem_pol_vent == "ver" OR $lib_usinagem_pol_vent == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_usinagem_pol_vent == "") { 
	if ( $f_dt_previsao_usinagem_pol_vent == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_dt_previsao_usinagem_pol_vent"  style='width:90px'>
<?
$query = "select distinct dt_previsao_usinagem_pol_vent from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_previsao_usinagem_pol_vent";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_previsao_usinagem_pol_vent==$f_dt_previsao_usinagem_pol_vent)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->dt_previsao_usinagem_pol_vent' $sSelect> $sRow->dt_previsao_usinagem_pol_vent</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? } // configuracao do USINAGEM POL_VENT  ?>

<?  /* 		SETOR USINAGEM POL_VENT 		*/ ?>

<? /* 		SETOR USINAGEM GAXETA 		*/ ?>

<? if ( $lib_usinagem_gaxeta == "ver" OR $lib_usinagem_gaxeta == "alt") {?>

<? /* DT PROG */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_usinagem_gaxeta == "") {		
if ( $f_dt_prog_usinagem_gaxeta == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_prog_usinagem_gaxeta"  style='width:90px'>
 <?
  $query = "select distinct dt_prog_usinagem_gaxeta from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db $f_dt_prog_usinagem_nuc_cubo_db $f_status_usinagem_nuc_cubo_db $f_dt_prog_usinagem_pol_mot_db $f_status_usinagem_pol_mot_db $f_dt_prog_usinagem_pol_vent_db $f_status_usinagem_pol_vent_db $f_status_usinagem_gaxeta_db order by dt_prog_usinagem_gaxeta";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_prog_usinagem_gaxeta==$f_dt_prog_usinagem_gaxeta)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_prog_usinagem_gaxeta = $sRow->dt_prog_usinagem_gaxeta;
$dia_dt_prog_usinagem_gaxeta = substr($dt_prog_usinagem_gaxeta, -2);
$mes_dt_prog_usinagem_gaxeta = substr($dt_prog_usinagem_gaxeta, -5,2);
$ano_dt_prog_usinagem_gaxeta = substr($dt_prog_usinagem_gaxeta, -10,4);
if ($dia_dt_prog_usinagem_gaxeta == "" AND $mes_dt_prog_usinagem_gaxeta == "" AND $ano_dt_prog_usinagem_gaxeta == "") 
{$dt_prog_usinagem_gaxeta = ($dia_dt_prog_usinagem_gaxeta."".$mes_dt_prog_usinagem_gaxeta."".$ano_dt_prog_usinagem_gaxeta); } 
else 
{$dt_prog_usinagem_gaxeta = ($dia_dt_prog_usinagem_gaxeta."/".$mes_dt_prog_usinagem_gaxeta."/".$ano_dt_prog_usinagem_gaxeta); }
  print("<option value='$sRow->dt_prog_usinagem_gaxeta' $sSelect>  $dt_prog_usinagem_gaxeta </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* STATUS */ ?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_usinagem_gaxeta == "") { 
	if ( $f_status_usinagem_gaxeta == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_usinagem_gaxeta"  style='width:40px'>
<?
$query = "select distinct status_usinagem_gaxeta from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db  $f_status_usinagem_eixo_db $f_dt_prog_usinagem_nuc_cubo_db $f_status_usinagem_nuc_cubo_db $f_dt_prog_usinagem_pol_mot_db $f_status_usinagem_pol_mot_db $f_dt_prog_usinagem_pol_vent_db $f_status_usinagem_pol_vent_db $f_dt_prog_usinagem_gaxeta_db order by status_usinagem_gaxeta";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_usinagem_gaxeta==$f_status_usinagem_gaxeta)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_usinagem_gaxeta' $sSelect> $sRow->status_usinagem_gaxeta</option>");   }  ?>
</select>
<? }  ?>
</P></TH>


<? /* DT PREVISAO */ ?>
<? if ( $lib_usinagem_gaxeta == "ver" OR $lib_usinagem_gaxeta == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_usinagem_gaxeta == "") { 
	if ( $f_dt_previsao_usinagem_gaxeta == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_dt_previsao_usinagem_gaxeta"  style='width:90px'>
<?
$query = "select distinct dt_previsao_usinagem_gaxeta from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_previsao_usinagem_gaxeta";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_previsao_usinagem_gaxeta==$f_dt_previsao_usinagem_gaxeta)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->dt_previsao_usinagem_gaxeta' $sSelect> $sRow->dt_previsao_usinagem_gaxeta</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? } // configuracao do USINAGEM GAXETA  ?>

<?  /* 		SETOR USINAGEM GAXETA 		*/ ?>

<? /* 		SETOR EXPEDICAO 		*/ ?>

<? if ( $lib_expedicao == "ver" OR $lib_expedicao == "alt") {?>

<? /* DT PROG */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_expedicao == "") {		
if ( $f_dt_prog_expedicao == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_prog_expedicao"  style='width:90px'>
 <?
  $query = "select distinct dt_prog_expedicao from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_status_almox_db $f_obs_almox_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db $f_status_expedicao_db $f_previsao_expedicao_db order by dt_prog_expedicao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_prog_expedicao==$f_dt_prog_expedicao)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_prog_expedicao = $sRow->dt_prog_expedicao;
$dia_dt_prog_expedicao = substr($dt_prog_expedicao, -2);
$mes_dt_prog_expedicao = substr($dt_prog_expedicao, -5,2);
$ano_dt_prog_expedicao = substr($dt_prog_expedicao, -10,4);
if ($dia_dt_prog_expedicao == "" AND $mes_dt_prog_expedicao == "" AND $ano_dt_prog_expedicao == "") 
{$dt_prog_expedicao = ($dia_dt_prog_expedicao."".$mes_dt_prog_expedicao."".$ano_dt_prog_expedicao); } 
else 
{$dt_prog_expedicao = ($dia_dt_prog_expedicao."/".$mes_dt_prog_expedicao."/".$ano_dt_prog_expedicao); }
  print("<option value='$sRow->dt_prog_expedicao' $sSelect>  $dt_prog_expedicao </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* STATUS */ ?>
<? if ( $lib_expedicao == "ver" OR $lib_expedicao == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_expedicao == "") { 
	if ( $f_status_expedicao == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_expedicao"  style='width:40px'>
<?
$query = "select distinct status_expedicao from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_almox_db $f_obs_almox_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db $f_dt_prog_expedicao_db $f_previsao_expedicao_db order by status_expedicao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_expedicao==$f_status_expedicao)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_expedicao' $sSelect> $sRow->status_expedicao</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_expedicao == "ver" OR $lib_expedicao == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_expedicao == "") { 
	if ( $f_dt_previsao_expedicao == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_dt_previsao_expedicao"  style='width:90px'>
<?
$query = "select distinct dt_previsao_expedicao from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_almox_db $f_obs_almox_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db $f_dt_prog_expedicao_db $f_status_expedicao_db order by dt_previsao_expedicao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_previsao_expedicao==$f_dt_previsao_expedicao)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->dt_previsao_expedicao' $sSelect> $sRow->dt_previsao_expedicao</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? } // configuracao do expedicao  ?>

<?  /* 		SETOR EXPEDICAO 		*/ ?>


<? /* 		SETOR FUNILARIA 		*/ ?>

<? if ( $lib_funilaria == "ver" OR $lib_funilaria == "alt") {?>

<? /* DT PROG */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_funilaria == "") {		
if ( $f_dt_prog_funilaria == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_prog_funilaria"  style='width:90px'>
 <?
  $query = "select distinct dt_prog_funilaria from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_status_almox_db $f_obs_almox_db $f_status_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db $f_status_expedicao_db $f_previsao_expedicao_db order by dt_prog_funilaria";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_prog_funilaria==$f_dt_prog_funilaria)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_prog_funilaria = $sRow->dt_prog_funilaria;
$dia_dt_prog_funilaria = substr($dt_prog_funilaria, -2);
$mes_dt_prog_funilaria = substr($dt_prog_funilaria, -5,2);
$ano_dt_prog_funilaria = substr($dt_prog_funilaria, -10,4);
if ($dia_dt_prog_funilaria == "" AND $mes_dt_prog_funilaria == "" AND $ano_dt_prog_funilaria == "") 
{$dt_prog_funilaria = ($dia_dt_prog_funilaria."".$mes_dt_prog_funilaria."".$ano_dt_prog_funilaria); } 
else 
{$dt_prog_funilaria = ($dia_dt_prog_funilaria."/".$mes_dt_prog_funilaria."/".$ano_dt_prog_funilaria); }
  print("<option value='$sRow->dt_prog_funilaria' $sSelect>  $dt_prog_funilaria </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* STATUS */ ?>
<? if ( $lib_funilaria == "ver" OR $lib_funilaria == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_funilaria == "") { 
	if ( $f_status_funilaria == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_funilaria"  style='width:40px'>
<?
$query = "select distinct status_funilaria from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_almox_db $f_obs_almox_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db $f_dt_prog_expedicao_db $f_previsao_expedicao_db order by status_funilaria";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_funilaria==$f_status_funilaria)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_funilaria' $sSelect> $sRow->status_funilaria</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_funilaria == "ver" OR $lib_funilaria == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_funilaria == "") { 
	if ( $f_dt_previsao_funilaria == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_dt_previsao_funilaria"  style='width:90px'>
<?
$query = "select distinct dt_previsao_funilaria from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_almox_db $f_obs_almox_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db $f_dt_prog_expedicao_db $f_status_expedicao_db order by dt_previsao_funilaria";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_previsao_funilaria==$f_dt_previsao_funilaria)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->dt_previsao_funilaria' $sSelect> $sRow->dt_previsao_funilaria</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? } // configuracao do FUNILARIA  ?>

<?  /* 		SETOR FUNILARIA 		*/ ?>



<? /* 		SETOR LASER		*/ ?>

<? if ( $lib_laser == "ver" OR $lib_laser == "alt") {?>

<? /* DT PROG */ ?>
<TH align=middle widht="15%" ><P class=bordas>	
<? if ( $check_laser == "") {		
if ( $f_dt_prog_laser == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="f_dt_prog_laser"  style='width:90px'>
 <?
  $query = "select distinct dt_prog_laser from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_status_corte_db $f_obs_corte_db $f_status_laser_db $f_obs_laser_db  $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_prog_laser";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_prog_laser==$f_dt_prog_laser)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
}  
$dt_prog_laser = $sRow->dt_prog_laser;
$dia_dt_prog_laser = substr($dt_prog_laser, -2);
$mes_dt_prog_laser = substr($dt_prog_laser, -5,2);
$ano_dt_prog_laser = substr($dt_prog_laser, -10,4);
if ($dia_dt_prog_laser == "" AND $mes_dt_prog_laser == "" AND $ano_dt_prog_laser == "") 
{$dt_prog_laser= ($dia_dt_prog_laser."".$mes_dt_prog_laser."".$ano_dt_prog_laser); } 
else 
{$dt_prog_laser = ($dia_dt_prog_laser."/".$mes_dt_prog_laser."/".$ano_dt_prog_laser); }
  print("<option value='$sRow->dt_prog_laser' $sSelect>  $dt_prog_laser </option>");   
}  ?>
</select>
</P></TH>
<? } ?>

<? /* STATUS */ ?>
<? if ( $lib_laser == "ver" OR $lib_laser == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_laser == "") { 
	if ( $f_status_laser == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_status_laser"  style='width:40px'>
<?
$query = "select distinct status_laser from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db  $f_obs_corte_db $f_dt_prog_laser_db $f_obs_laser_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by status_laser";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->status_laser==$f_status_laser)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->status_laser' $sSelect> $sRow->status_laser</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_laser == "ver" OR $lib_laser == "alt" ) {?>
<TH align=middle widht="15%" ><P class=bordas>
<? if ( $check_laser == "") { 
	if ( $f_dt_previsao_laser == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="f_dt_previsao_laser"  style='width:90px'>
<?
$query = "select distinct dt_previsao_laser from pcp where id>='0' $f_data_emissao_db $f_data_emissao_mes_db $f_num_os_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_data_entrega_mes_db $f_data_prog_diaria_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_contrucao_db $f_qt_db $f_valor_uni_db $f_obs_db $f_motor_maxsig_db $f_polia_maxsig_db $f_carcaca_maxsig_db $f_rotor_maxsig_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_dt_prog_corte_db $f_obs_corte_db $f_dt_prog_laser_db $f_obs_laser_db $f_dt_prog_balanc_db $f_status_balanc_db $f_obs_balanc_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db order by dt_previsao_laser";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dt_previsao_laser==$f_dt_previsao_laser)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->dt_previsao_laser' $sSelect> $sRow->dt_previsao_laser</option>");   }  ?>
</select>
<? } } ?>
</P></TH>

<? } // configuracao do LASER   ?>

<?  /* 		SETOR LASER		*/ ?>
			  


			</TR>  

<? /* --------------------  FIM DOS BOTOES SELECAO  -----------------------------  */  ?>

</FIELDSET>
		             
			</TBODY>
			</TABLE>
			</TD>
				  
          <TD width="2%">&nbsp;</TD>
          <TD vAlign=top width="48%">
          
            </TD>
				  
          <TD width="1%">&nbsp;</TD>
		  </TR>
		  </TBODY>
		  </TABLE>
		  
      <DIV class=espaco>&nbsp;</DIV>
	  
	  </TR>
	  </TBODY>
	  </TD>
	  </TABLE>
	  
</FIELDSET>



</form>
</body>
</html>
