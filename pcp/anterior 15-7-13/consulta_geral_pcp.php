<? include "valida_sessao.php" ; include "config_pcp.php"; ?>

<html>
<head>
<title> Consulta PCP </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
<script language="JavaScript" SRC="funcoes/abrir_fechar.js"></script>
<script language="JavaScript" SRC="funcoes/calendario.js"></script>
<script language="JavaScript" SRC="funcoes/letras_maiscula.js"></script>
<script language="JavaScript" SRC="funcoes/mascara_data.js"></script>
</head>
<body class=body>

<div id="overDiv" style="position:absolute; visibility:hide; z-index:1;; width: 160px; height: 19px"></div> 

<? /*  ----------------	BUSCAR DADOS DE LIBERAÇÃO ------------------	*/
$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {

$usuario = $linha["username"];

$lib_inserir = $linha["lib_inserir"]; 
$lib_excluir = $linha["lib_excluir"];

/* SETOR VENDAS */
$lib_vendas = $linha["lib_vendas"]; 

/* SETOR PCP */
$lib_pcp = $linha["lib_pcp"]; 

/* SETOR PCP PRODUCAO */
$lib_pcp_producao = $linha["lib_pcp_producao"]; 

/* LIB OS HORIZONTAL */
$lib_os_horizontal = $linha["lib_os_horizontal"];

/* IMPRESSAO */
$lib_imprimir_geral = $linha["lib_imprimir_geral"]; 
$lib_imprimir_geral_sp = $linha["lib_imprimir_geral_sp"];
$lib_imprimir_diaria_dia = $linha["lib_imprimir_diaria_dia"];

/* IMPRESSAO DATA PREVISAO */
$lib_imprimir_previsao_dia = $linha["lib_imprimir_previsao_dia"]; 
$lib_imprimir_previsao_geral = $linha["lib_imprimir_previsao_geral"];

/* IMPRESSAO DATA PROG MONTAGEM */
$lib_imprimir_prog_montagem_dia =$linha["lib_imprimir_prog_montagem_dia"];

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

$lib_qt = $linha["lib_qt"]; 
$lib_valor_uni = $linha["lib_valor_uni"]; 
$lib_valor_total = $linha["lib_valor_total"]; 
$lib_valor_total_os = $linha["lib_valor_total_os"]; 

$lib_obs = $linha["lib_obs"]; 

$lib_reprogramacao = $linha["lib_reprogramacao"]; 

$lib_baixa = $linha["lib_baixa"]; 
$lib_data_baixa = $linha["lib_data_baixa"]; 
$lib_baixa_expedicao = $linha["lib_baixa_expedicao"]; 

$lib_data_prog_diaria = $linha["lib_data_prog_diaria"]; 

/* DATA PROG. MONTAGEM */
$lib_dt_prog_montagem = $linha["lib_dt_prog_montagem"];

/* DATA PREVISAO */
$lib_data_previsao = $linha["lib_data_previsao"];

/* NUMERO CONSULTA CLIENTE */
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

/* INSPEÇÃO */
$lib_insp = $linha["lib_insp"];
/* INSPEÇÃO */

/* SETOR CALD. 1 */
$lib_cald1 = $linha["lib_cald1"];
/* SETOR CALD. 1 */

/* SETOR CALD. 2 */
$lib_cald2 = $linha["lib_cald2"];
/* SETOR CALD. 2 */

/* SETOR PINTURA */
$lib_pintura_setor = $linha["lib_pintura_setor"];
/* SETOR PINTURA */

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
if ( $f_representante <> "" ) {$f_representante_db = "and representante='$f_representante'";} else {$f_representante_db = "";}
if ( $f_estado <> "" ) {$f_estado_db = "and estado='$f_estado'";} else {$f_estado_db = "";}



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

if ( $f_qt <> "" ) {$f_qt_db = "and qt='$f_qt'";} else {$f_qt_db = "";}
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



if ( $f_data_prog_diaria <> "" ) {$f_data_prog_diaria_db = "and data_prog_diaria='$f_data_prog_diaria'";} else {$f_data_prog_diaria_db = "";}

/* DATA PROG MONTAGEM */
if ( $f_dt_prog_montagem <> "" ) {$f_dt_prog_montagem_db = "and dt_prog_montagem='$f_dt_prog_montagem'";} else {$f_dt_prog_montagem_db = "";}


/* DATA PREVISAO*/
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


/*	INSPEÇÃO  	*/

if ( $f_tipo_insp <> "" ) {$f_tipo_insp_db = "and tipo_insp='$f_tipo_insp'";} else {$f_tipo_insp_db = "";}
if ( $f_data_insp <> "" ) {$f_data_insp_db = "and data_insp='$f_data_insp'";} else {$f_data_insp_db = "";}
if ( $f_cliente_insp <> "" ) {$f_cliente_insp_db = "and cliente_insp='$f_cliente_insp'";} else {$f_cliente_insp_db = "";}
if ( $f_obs_insp <> "" ) {$f_obs_insp_db = "and obs_insp='$f_obs_insp'";} else {$f_obs_insp_db = "";}

/*	INSPEÇÃO    */


/*	SETOR ALMOX	  	*/

if ( $f_dt_prog_almox <> "" ) {$f_dt_prog_almox_db = "and dt_prog_almox='$f_dt_prog_almox'";} else {$f_dt_prog_almox_db = "";}
if ( $f_status_almox <> "" ) {$f_status_almox_db = "and status_almox='$f_status_almox'";} else {$f_status_almox_db = "";}
if ( $f_dt_previsao_almox <> "" ) {$f_dt_previsao_almox_db = "and dt_previsao_almox='$f_dt_previsao_almox'";} else {$f_dt_previsao_almox_db = "";}


/*	SETOR ALMOX		*/


/*	SETOR CORTE	  */

if ( $f_dt_prog_corte <> "" ) {$f_dt_prog_corte_db = "and dt_prog_corte='$f_dt_prog_corte'";} else {$f_dt_prog_corte_db = "";}
if ( $f_status_corte <> "" ) {$f_status_corte_db = "and status_corte='$f_status_corte'";} else {$f_status_corte_db = "";}
if ( $f_dt_previsao_corte <> "" ) {$f_dt_previsao_corte_db = "and dt_previsao_corte='$f_dt_previsao_corte'";} else {$f_dt_previsao_corte_db = "";}


/*	SETOR CORTE	  */


/*	SETOR BALANCEAMENTO  */

if ( $f_dt_prog_balanc <> "" ) {$f_dt_prog_balanc_db = "and dt_prog_balanc='$f_dt_prog_balanc'";} else {$f_dt_prog_balanc_db = "";}
if ( $f_status_balanc <> "" ) {$f_status_balanc_db = "and status_balanc='$f_status_balanc'";} else {$f_status_balanc_db = "";}
if ( $f_dt_previsao_balanc <> "" ) {$f_dt_previsao_balanc_db = "and dt_previsao_balanc='$f_dt_previsao_balanc'";} else {$f_dt_previsao_balanc_db = "";}

/*	SETOR BALANCEAMENTO	  */


/*	SETOR USINAGEM  */

/* EIXO */
if ( $f_dt_prog_usinagem_eixo <> "" ) {$f_dt_prog_usinagem_eixo_db = "and dt_prog_usinagem_eixo='$f_dt_prog_usinagem_eixo'";} else {$f_dt_prog_usinagem_eixo_db = "";}
if ( $f_status_usinagem_eixo <> "" ) {$f_status_usinagem_eixo_db = "and status_usinagem_eixo='$f_status_usinagem_eixo'";} else {$f_status_usinagem_eixo_db = "";}
if ( $f_dt_previsao_usinagem_eixo <> "" ) {$f_dt_previsao_usinagem_eixo_db = "and dt_previsao_usinagem_eixo='$f_dt_previsao_usinagem_eixo'";} else {$f_dt_previsao_usinagem_eixo_db = "";}
/* EIXO */

/* NUC_CUBO */
if ( $f_dt_prog_usinagem_nuc_cubo <> "" ) {$f_dt_prog_usinagem_nuc_cubo_db = "and dt_prog_usinagem_nuc_cubo='$f_dt_prog_usinagem_nuc_cubo'";} else {$f_dt_prog_usinagem_nuc_cubo_db = "";}
if ( $f_status_usinagem_nuc_cubo <> "" ) {$f_status_usinagem_nuc_cubo_db = "and status_usinagem_nuc_cubo='$f_status_usinagem_nuc_cubo'";} else {$f_status_usinagem_nuc_cubo_db = "";}
if ( $f_dt_previsao_usinagem_nuc_cubo <> "" ) {$f_dt_previsao_usinagem_nuc_cubo_db = "and dt_previsao_usinagem_nuc_cubo='$f_dt_previsao_usinagem_nuc_cubo'";} else {$f_dt_previsao_usinagem_nuc_cubo_db = "";}
/* NUC_CUBO */

/* POL_MOT */
if ( $f_dt_prog_usinagem_pol_mot <> "" ) {$f_dt_prog_usinagem_pol_mot_db = "and dt_prog_usinagem_pol_mot='$f_dt_prog_usinagem_pol_mot'";} else {$f_dt_prog_usinagem_pol_mot_db = "";}
if ( $f_status_usinagem_pol_mot <> "" ) {$f_status_usinagem_pol_mot_db = "and status_usinagem_pol_mot='$f_status_usinagem_pol_mot'";} else {$f_status_usinagem_pol_mot_db = "";}
if ( $f_dt_previsao_usinagem_pol_mot <> "" ) {$f_dt_previsao_usinagem_pol_mot_db = "and dt_previsao_usinagem_pol_mot='$f_dt_previsao_usinagem_pol_mot'";} else {$f_dt_previsao_usinagem_pol_mot_db = "";}
/* POL_MOT */

/* POL_VENT */
if ( $f_dt_prog_usinagem_pol_vent <> "" ) {$f_dt_prog_usinagem_pol_vent_db = "and dt_prog_usinagem_pol_vent='$f_dt_prog_usinagem_pol_vent'";} else {$f_dt_prog_usinagem_pol_vent_db = "";}
if ( $f_status_usinagem_pol_vent <> "" ) {$f_status_usinagem_pol_vent_db = "and status_usinagem_pol_vent='$f_status_usinagem_pol_vent'";} else {$f_status_usinagem_pol_vent_db = "";}
if ( $f_dt_previsao_usinagem_pol_vent <> "" ) {$f_dt_previsao_usinagem_pol_vent_db = "and dt_previsao_usinagem_pol_vent='$f_dt_previsao_usinagem_pol_vent'";} else {$f_dt_previsao_usinagem_pol_vent_db = "";}
/* POL_VENT */

/* GAXETA */
if ( $f_dt_prog_usinagem_gaxeta <> "" ) {$f_dt_prog_usinagem_gaxeta_db = "and dt_prog_usinagem_gaxeta='$f_dt_prog_usinagem_gaxeta'";} else {$f_dt_prog_usinagem_gaxeta_db = "";}
if ( $f_status_usinagem_gaxeta <> "" ) {$f_status_usinagem_gaxeta_db = "and status_usinagem_gaxeta='$f_status_usinagem_gaxeta'";} else {$f_status_usinagem_gaxeta_db = "";}
if ( $f_dt_previsao_usinagem_gaxeta <> "" ) {$f_dt_previsao_usinagem_gaxeta_db = "and dt_previsao_usinagem_gaxeta='$f_dt_previsao_usinagem_gaxeta'";} else {$f_dt_previsao_usinagem_gaxeta_db = "";}
/* GAXETA */

/*	SETOR USINAGEM		  */


/*  SERTOR CALD 1 */
if ( $f_dt_prog_cald1 <> "" ) {$f_dt_prog_cald1_db = "and dt_prog_cald1='$f_dt_prog_cald1'";} else {$f_dt_prog_cald1_db = "";}
if ( $f_status_cald1 <> "" ) {$f_status_cald1_db = "and status_cald1='$f_status_cald1'";} else {$f_status_cald1_db = "";}
if ( $f_dt_previsao_cald1 <> "" ) {$f_dt_previsao_cald1_db = "and dt_previsao_cald1='$f_dt_previsao_cald1'";} else {$f_dt_previsao_cald1_db = "";}
/*  SERTOR CALD 1 */

/*  SERTOR CALD 2 */
if ( $f_dt_prog_cald2 <> "" ) {$f_dt_prog_cald2_db = "and dt_prog_cald2='$f_dt_prog_cald2'";} else {$f_dt_prog_cald2_db = "";}
if ( $f_status_cald2 <> "" ) {$f_status_cald2_db = "and status_cald2='$f_status_cald2'";} else {$f_status_cald2_db = "";}
if ( $f_dt_previsao_cald2 <> "" ) {$f_dt_previsao_cald2_db = "and dt_previsao_cald2='$f_dt_previsao_cald2'";} else {$f_dt_previsao_cald2_db = "";}
/*  SERTOR CALD 2 */

/*  SERTOR ROTOR LL */
if ( $f_dt_prog_rotor_ll <> "" ) {$f_dt_prog_rotor_ll_db = "and dt_prog_rotor_ll='$f_dt_prog_rotor_ll'";} else {$f_dt_prog_rotor_ll_db = "";}
if ( $f_status_rotor_ll <> "" ) {$f_status_rotor_ll_db = "and status_rotor_ll='$f_status_rotor_ll'";} else {$f_status_rotor_ll_db = "";}
if ( $f_dt_previsao_rotor_ll <> "" ) {$f_dt_previsao_rotor_ll_db = "and dt_previsao_rotor_ll='$f_dt_previsao_rotor_ll'";} else {$f_dt_previsao_rotor_ll_db = "";}
/*  SERTOR ROTOR LL  */

/*  SERTOR ROTOR SIR */
if ( $f_dt_prog_rotor_sir <> "" ) {$f_dt_prog_rotor_sir_db = "and dt_prog_rotor_sir='$f_dt_prog_rotor_sir'";} else {$f_dt_prog_rotor_sir_db = "";}
if ( $f_status_rotor_sir <> "" ) {$f_status_rotor_sir_db = "and status_rotor_sir='$f_status_rotor_sir'";} else {$f_status_rotor_sir_db = "";}
if ( $f_dt_previsao_rotor_sir <> "" ) {$f_dt_previsao_rotor_sir_db = "and dt_previsao_rotor_sir='$f_dt_previsao_rotor_sir'";} else {$f_dt_previsao_rotor_sir_db = "";}
/*  SERTOR ROTOR SIR  */

/*  SERTOR PINTURA */
if ( $f_dt_prog_pintura <> "" ) {$f_dt_prog_pintura_db = "and dt_prog_pintura='$f_dt_prog_pintura'";} else {$f_dt_prog_pintura_db = "";}
if ( $f_status_pintura <> "" ) {$f_status_pintura_db = "and status_pintura='$f_status_pintura'";} else {$f_status_pintura_db = "";}
if ( $f_dt_previsao_pintura <> "" ) {$f_dt_previsao_pintura_db = "and dt_previsao_pintura='$f_dt_previsao_pintura'";} else {$f_dt_previsao_pintura_db = "";}
/*  SERTOR PINTURA  */


/*	SETOR MONTAGEM	  */

if ( $f_dt_prog_montagem <> "" ) {$f_dt_prog_montagem_db = "and dt_prog_montagem='$f_dt_prog_montagem'";} else {$f_dt_prog_montagem_db = "";}
if ( $f_status_montagem <> "" ) {$f_status_montagem_db = "and status_montagem='$f_status_montagem'";} else {$f_status_montagem_db = "";}
if ( $f_dt_previsao_montagem <> "" ) {$f_dt_previsao_montagem_db = "and dt_previsao_montagem='$f_dt_previsao_montagem'";} else {$f_dt_previsao_montagem_db = "";}

/*	SETOR MONTAGEM    */


/*	SETOR GABINETE	  */

if ( $f_dt_prog_gabinete <> "" ) {$f_dt_prog_gabinete_db = "and dt_prog_gabinete='$f_dt_prog_gabinete'";} else {$f_dt_prog_gabinete_db = "";}
if ( $f_status_gabinete <> "" ) {$f_status_gabinete_db = "and status_gabinete='$f_status_gabinete'";} else {$f_status_gabinete_db = "";}
if ( $f_dt_previsao_gabinete <> "" ) {$f_dt_previsao_gabinete_db = "and dt_previsao_gabinete='$f_dt_previsao_gabinete'";} else {$f_dt_previsao_gabinete_db = "";}

/*	SETOR GABINETE    */


/*	SETOR EXPEDICAO	  */

if ( $f_dt_prog_expedicao <> "" ) {$f_dt_prog_expedicao_db = "and dt_prog_expedicao='$f_dt_prog_expedicao'";} else {$f_dt_prog_expedicao_db = "";}
if ( $f_status_expedicao <> "" ) {$f_status_expedicao_db = "and status_expedicao='$f_status_expedicao'";} else {$f_status_expedicao_db = "";}
if ( $f_dt_previsao_expedicao <> "" ) {$f_dt_previsao_expedicao_db = "and dt_previsao_expedicao='$f_dt_previsao_expedicao'";} else {$f_dt_previsao_expedicao_db = "";}

/*	SETOR EXPEDICAO    */


/*	SETOR FUNILARIA	  */

if ( $f_dt_prog_funilaria <> "" ) {$f_dt_prog_funilaria_db = "and dt_prog_funilaria='$f_dt_prog_funilaria'";} else {$f_dt_prog_funilaria_db = "";}
if ( $f_status_funilaria <> "" ) {$f_status_funilaria_db = "and status_funilaria='$f_status_funilaria'";} else {$f_status_funilaria_db = "";}
if ( $f_dt_previsao_funilaria <> "" ) {$f_dt_previsao_funilaria_db = "and dt_previsao_funilaria='$f_dt_previsao_funilaria'";} else {$f_dt_previsao_funilaria_db = "";}

/*	SETOR FUNILARIA    */


/*	SETOR LASER	  */

if ( $f_dt_prog_laser <> "" ) {$f_dt_prog_laser_db = "and dt_prog_laser='$f_dt_prog_laser'";} else {$f_dt_prog_laser_db = "";}
if ( $f_status_laser <> "" ) {$f_status_laser_db = "and status_laser='$f_status_laser'";} else {$f_status_laser_db = "";}
if ( $f_dt_previsao_laser <> "" ) {$f_dt_previsao_laser_db = "and dt_previsao_laser='$f_dt_previsao_laser'";} else {$f_dt_previsao_laser_db = "";}


/*	SETOR LASER	  */

?>
<? /* --------------------  FIM CONFIGURACAO DE SELECAO  -----------------------------  */  ?>


<FIELDSET>
<LEGEND> 
Dados do PCP 

<? /* IMPRIMIR GERAL */?>
<? if ( $lib_imprimir_geral == "sim" ) { ?>
<input class="botao1" type="button" name=imprimirgeral value="Imprimir Geral" onClick="javascript:void(open('imprimir_geral.php?f_data_emissao=<?echo$f_data_emissao?>&f_data_emissao_mes=<?echo$f_data_emissao_mes?>&f_num_os=<?echo$f_num_os?>&f_num_proposta=<?echo$f_num_proposta?>&f_nome_cliente=<?echo$f_nome_cliente?>&f_oc_obra=<?echo$f_oc_obra?>&f_mercado=<?echo$f_mercado?>&f_representante=<?echo$f_representante?>&f_estado=<?echo$f_estado?>&f_data_entrega=<?echo$f_data_entrega?>&f_data_entrega_mes=<?echo$f_data_entrega_mes?>&f_local_venda=<?echo$f_local_venda?>&f_fornecimento_motor=<?echo$f_fornecimento_motor?>&f_descr_vent=<?echo$f_descr_vent?>&f_modelo=<?echo$f_modelo?>&f_tamanho=<?echo$f_tamanho?>&f_arranjo=<?echo$f_arranjo?>&f_classe=<?echo$f_classe?>&f_rotacao=<?echo$f_rotacao?>&f_gab=<?echo$f_gab?>&f_pintura=<?echo$f_pintura?>&f_construcao=<?echo$f_construcao?>&f_qt=<?echo$f_qt?>&f_valor_uni=<?echo$f_valor_uni?>&f_valor_total=<?echo$f_valor_total?>&f_obs=<?echo$f_obs?>&f_data_motor_recebido=<?echo$f_data_motor_recebido?>&f_reprogramacao=<?echo$f_reprogramacao?>&f_baixa=<?echo$f_baixa?>&f_data_baixa=<?echo$f_data_baixa?>&f_data_baixa_mes=<?echo$f_data_baixa_mes?>&f_baixa=<?echo$f_baixa?>&f_data_prog_diaria=<?echo$f_data_prog_diaria?>&f_data_book=<?echo$f_data_book?>&f_certif_balanc=<?echo$f_certif_balanc?>&f_certif_materiais=<?echo$f_certif_materiais?>&f_desenho_certif=<?echo$f_desenho_certif?>','imprimirgeral','scrollbars=yes,fullscreen=no'))">
<? } ?>

<? /* IMPRIMIR GERAL SÃO PAULO  */?>
<? if ( $lib_imprimir_geral_sp == "sim" ) { ?>
<input class="botao1" type="button" name=imprimirgeralsp value="Imprimir Geral São Paulo" onClick="javascript:void(open('imprimir_geral_sp.php?f_data_emissao=<?echo$f_data_emissao?>&f_data_emissao_mes=<?echo$f_data_emissao_mes?>&f_num_os=<?echo$f_num_os?>&f_num_proposta=<?echo$f_num_proposta?>&f_nome_cliente=<?echo$f_nome_cliente?>&f_oc_obra=<?echo$f_oc_obra?>&f_mercado=<?echo$f_mercado?>&f_representante=<?echo$f_representante?>&f_estado=<?echo$f_estado?>&f_data_entrega=<?echo$f_data_entrega?>&f_data_entrega_mes=<?echo$f_data_entrega_mes?>&f_local_venda=<?echo$f_local_venda?>&f_fornecimento_motor=<?echo$f_fornecimento_motor?>&f_descr_vent=<?echo$f_descr_vent?>&f_modelo=<?echo$f_modelo?>&f_tamanho=<?echo$f_tamanho?>&f_arranjo=<?echo$f_arranjo?>&f_classe=<?echo$f_classe?>&f_rotacao=<?echo$f_rotacao?>&f_gab=<?echo$f_gab?>&f_pintura=<?echo$f_pintura?>&f_construcao=<?echo$f_construcao?>&f_qt=<?echo$f_qt?>&f_valor_uni=<?echo$f_valor_uni?>&f_valor_total=<?echo$f_valor_total?>&f_obs=<?echo$f_obs?>&f_data_motor_recebido=<?echo$f_data_motor_recebido?>&f_reprogramacao=<?echo$f_reprogramacao?>&f_baixa=<?echo$f_baixa?>&f_data_baixa_db=<?echo$f_data_baixa?>&f_data_baixa_mes=<?echo$f_data_baixa_mes?>&f_baixa=<?echo$f_baixa?>&f_data_prog_diaria=<?echo$f_data_prog_diaria?>&f_data_book=<?echo$f_data_book?>&f_certif_balanc=<?echo$f_certif_balanc?>&f_certif_materiais=<?echo$f_certif_materiais?>&f_desenho_certif=<?echo$f_desenho_certif?>','imprimirgeralsp','scrollbars=yes,fullscreen=no'))">
<? } ?>

<? /* IMPRIMIR DIARIA POR DIA */?>
<? if ( $lib_imprimir_diaria_dia == "sim" ) { ?>
<input class="botao1" type="button" name=imprimirdiariadia value="Imp. Diária" onClick="javascript:void(open('imprimir_diaria_dia.php?f_data_emissao=<?echo$f_data_emissao?>&f_data_emissao_mes=<?echo$f_data_emissao_mes?>&f_num_os=<?echo$f_num_os?>&f_num_proposta=<?echo$f_num_proposta?>&f_nome_cliente=<?echo$f_nome_cliente?>&f_oc_obra=<?echo$f_oc_obra?>&f_mercado=<?echo$f_mercado?>&f_representante=<?echo$f_representante?>&f_estado=<?echo$f_estado?>&f_data_entrega=<?echo$f_data_entrega?>&f_data_entrega_mes=<?echo$f_data_entrega_mes?>&f_local_venda=<?echo$f_local_venda?>&f_fornecimento_motor=<?echo$f_fornecimento_motor?>&f_descr_vent=<?echo$f_descr_vent?>&f_modelo=<?echo$f_modelo?>&f_tamanho=<?echo$f_tamanho?>&f_arranjo=<?echo$f_arranjo?>&f_classe=<?echo$f_classe?>&f_rotacao=<?echo$f_rotacao?>&f_gab=<?echo$f_gab?>&f_pintura=<?echo$f_pintura?>&f_construcao=<?echo$f_construcao?>&f_qt=<?echo$f_qt?>&f_valor_uni=<?echo$f_valor_uni?>&f_valor_total=<?echo$f_valor_total?>&f_obs=<?echo$f_obs?>&f_data_motor_recebido=<?echo$f_data_motor_recebido?>&f_reprogramacao=<?echo$f_reprogramacao?>&f_baixa=<?echo$f_baixa?>&f_data_baixa_db=<?echo$f_data_baixa?>f_data_baixa_mes=<?echo$f_data_baixa_mes?>&&f_baixa=<?echo$f_baixa?>&f_data_prog_diaria=<?echo$f_data_prog_diaria?>&dias_prog=<?echo$dias_prog?>&f_data_book=<?echo$f_data_book?>&f_certif_balanc=<?echo$f_certif_balanc?>&f_certif_materiais=<?echo$f_certif_materiais?>&f_desenho_certif=<?echo$f_desenho_certif?>','imprimirdiariadia','scrollbars=yes,fullscreen=no'))">
<? } ?>

<? /* IMPRIMIR PREVISAO POR DIA */?>
<? if ( $lib_imprimir_previsao_dia == "sim" ) { ?>
<input class="botao1" type="button" name=imprimirprevisaodia value="Imp. Previsão por Dia" onClick="javascript:void(open('imprimir_previsao_dia.php?f_data_emissao=<?echo$f_data_emissao?>&f_data_emissao_mes=<?echo$f_data_emissao_mes?>&f_num_os=<?echo$f_num_os?>&f_num_proposta=<?echo$f_num_proposta?>&f_nome_cliente=<?echo$f_nome_cliente?>&f_oc_obra=<?echo$f_oc_obra?>&f_mercado=<?echo$f_mercado?>&f_representante=<?echo$f_representante?>&f_estado=<?echo$f_estado?>&f_data_entrega=<?echo$f_data_entrega?>&f_data_entrega_mes=<?echo$f_data_entrega_mes?>&f_local_venda=<?echo$f_local_venda?>&f_fornecimento_motor=<?echo$f_fornecimento_motor?>&f_descr_vent=<?echo$f_descr_vent?>&f_modelo=<?echo$f_modelo?>&f_tamanho=<?echo$f_tamanho?>&f_arranjo=<?echo$f_arranjo?>&f_classe=<?echo$f_classe?>&f_rotacao=<?echo$f_rotacao?>&f_gab=<?echo$f_gab?>&f_pintura=<?echo$f_pintura?>&f_construcao=<?echo$f_construcao?>&f_qt=<?echo$f_qt?>&f_valor_uni=<?echo$f_valor_uni?>&f_valor_total=<?echo$f_valor_total?>&f_obs=<?echo$f_obs?>&f_data_motor_recebido=<?echo$f_data_motor_recebido?>&f_reprogramacao=<?echo$f_reprogramacao?>&f_baixa=<?echo$f_baixa?>&f_data_baixa_db=<?echo$f_data_baixa?>f_data_baixa_mes=<?echo$f_data_baixa_mes?>&&f_baixa=<?echo$f_baixa?>&f_data_previsao=<?echo$f_data_previsao?>&dias_previsao=<?echo$dias_previsao?>&f_data_book=<?echo$f_data_book?>&f_certif_balanc=<?echo$f_certif_balanc?>&f_certif_materiais=<?echo$f_certif_materiais?>&f_desenho_certif=<?echo$f_desenho_certif?>','imprimirdiariadia','scrollbars=yes,fullscreen=no'))">
<? } ?>

<? /* IMPRIMIR PREVISAO GERAL */?>
<? if ( $lib_imprimir_previsao_geral == "sim" ) { ?>
<input class="botao1" type="button" name=imprimirprevisaogeral value="Imprimir Previsão Geral" onClick="javascript:void(open('imprimir_previsao_geral.php?f_data_previsao=<?echo$f_data_previsao?>f_data_emissao=<?echo$f_data_emissao?>&f_data_emissao_mes=<?echo$f_data_emissao_mes?>&f_num_os=<?echo$f_num_os?>&f_num_proposta=<?echo$f_num_proposta?>&f_nome_cliente=<?echo$f_nome_cliente?>&f_oc_obra=<?echo$f_oc_obra?>&f_mercado=<?echo$f_mercado?>&f_representante=<?echo$f_representante?>&f_estado=<?echo$f_estado?>&f_data_entrega=<?echo$f_data_entrega?>&f_data_entrega_mes=<?echo$f_data_entrega_mes?>&f_local_venda=<?echo$f_local_venda?>&f_fornecimento_motor=<?echo$f_fornecimento_motor?>&f_descr_vent=<?echo$f_descr_vent?>&f_modelo=<?echo$f_modelo?>&f_tamanho=<?echo$f_tamanho?>&f_arranjo=<?echo$f_arranjo?>&f_classe=<?echo$f_classe?>&f_rotacao=<?echo$f_rotacao?>&f_gab=<?echo$f_gab?>&f_pintura=<?echo$f_pintura?>&f_construcao=<?echo$f_construcao?>&f_qt=<?echo$f_qt?>&f_valor_uni=<?echo$f_valor_uni?>&f_valor_total=<?echo$f_valor_total?>&f_obs=<?echo$f_obs?>&f_data_motor_recebido=<?echo$f_data_motor_recebido?>&f_reprogramacao=<?echo$f_reprogramacao?>&f_baixa=<?echo$f_baixa?>&f_data_baixa=<?echo$f_data_baixa?>&f_data_baixa_mes=<?echo$f_data_baixa_mes?>&f_baixa=<?echo$f_baixa?>&f_data_prog_diaria=<?echo$f_data_prog_diaria?>&f_data_book=<?echo$f_data_book?>&f_certif_balanc=<?echo$f_certif_balanc?>&f_certif_materiais=<?echo$f_certif_materiais?>&f_desenho_certif=<?echo$f_desenho_certif?>','imprimirprevisaogeral','scrollbars=yes,fullscreen=no'))">
<? } ?>

<? /* IMPRIMIR DATA PROG MONTAGEM */?>
<? if ( $lib_imprimir_prog_montagem_dia == "sim" ) { ?>
<input class="botao1" type="button" name=imprimirdtprogmontagem value="Imp. Prog. Montagem por Dia" onClick="javascript:void(open('imprimir_prog_montagem.php?f_data_emissao=<?echo$f_data_emissao?>&f_data_emissao_mes=<?echo$f_data_emissao_mes?>&f_num_os=<?echo$f_num_os?>&f_num_proposta=<?echo$f_num_proposta?>&f_nome_cliente=<?echo$f_nome_cliente?>&f_oc_obra=<?echo$f_oc_obra?>&f_mercado=<?echo$f_mercado?>&f_representante=<?echo$f_representante?>&f_estado=<?echo$f_estado?>&f_data_entrega=<?echo$f_data_entrega?>&f_data_entrega_mes=<?echo$f_data_entrega_mes?>&f_local_venda=<?echo$f_local_venda?>&f_fornecimento_motor=<?echo$f_fornecimento_motor?>&f_descr_vent=<?echo$f_descr_vent?>&f_modelo=<?echo$f_modelo?>&f_tamanho=<?echo$f_tamanho?>&f_arranjo=<?echo$f_arranjo?>&f_classe=<?echo$f_classe?>&f_rotacao=<?echo$f_rotacao?>&f_gab=<?echo$f_gab?>&f_pintura=<?echo$f_pintura?>&f_construcao=<?echo$f_construcao?>&f_qt=<?echo$f_qt?>&f_valor_uni=<?echo$f_valor_uni?>&f_valor_total=<?echo$f_valor_total?>&f_obs=<?echo$f_obs?>&f_data_motor_recebido=<?echo$f_data_motor_recebido?>&f_reprogramacao=<?echo$f_reprogramacao?>&f_baixa=<?echo$f_baixa?>&f_data_baixa_db=<?echo$f_data_baixa?>f_data_baixa_mes=<?echo$f_data_baixa_mes?>&&f_baixa=<?echo$f_baixa?>&f_data_previsao=<?echo$f_data_previsao?>&f_dt_prog_montagem=<?echo$f_dt_prog_montagem?>&dias_previsao=<?echo$dias_previsao?>&dias_prog_montagem=<?echo$dias_prog_montagem?>&f_data_book=<?echo$f_data_book?>&f_certif_balanc=<?echo$f_certif_balanc?>&f_certif_materiais=<?echo$f_certif_materiais?>&f_desenho_certif=<?echo$f_desenho_certif?>','imprimirdiariadia','scrollbars=yes,fullscreen=no'))">
<? } ?>

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
 
 
<? 
/* 
VER = VER COLUNA E CAMPO E NÃO ALTERA
ALT = VER COLUNA E CAMPO E ALTERA
N_VER = NÃO VE COLUNA E CAMPO E NÃO ALTERA
*/ 
?>            

		<TR class=linha_cabecalho >

<? /* DATA EMISSAO */ ?>              
<? if ( $lib_data_emissao == "ver" OR $lib_data_emissao == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_data_emissao == "" ) { ?> Dt. Emissão 
<? } } ?>
</P></TH>

<? /* NUM_OS */ ?>             
<? if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_num_os == "" ) { ?> N° O.S 
<? } } ?>
</P></TH>

<? /* NUM_PROPOSTA */ ?>
<? if ( $lib_num_proposta == "ver" OR $lib_num_proposta == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_num_proposta == "") { ?>  N° Proposta 
<? } } ?>
</P></TH>

<? /* NOME CLIENTE */ ?> 
<? if ( $lib_nome_cliente == "ver" OR $lib_nome_cliente == "alt" ) {?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_nome_cliente == "") { ?>  Nome Cliente 
<? } } ?>
</P></TH>

<? /* OC / OBRA */ ?>
<? if ( $lib_oc_obra == "ver" OR $lib_oc_obra == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_oc_obra == "") { ?> OC / Obra 
<? } } ?>
</P></TH>

<? /* MERCADO */ ?>
<? if ( $lib_mercado == "ver" OR $lib_mercado == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_mercado == "") { ?> Merc. 
<? } } ?>
</P></TH>
   

<? /* REPRESENTANTE */ ?>
<? if ( $lib_representante == "ver" OR $lib_representante == "alt" ) { ?> 
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_representante == "") { ?> Repres. 
<? } } ?>
</P></TH>                  
                      
<? /* ESTADO */ ?>
<? if ( $lib_estado == "ver" OR $lib_estado == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_estado == "") { ?>  Estado 
<? } } ?>
</P></TH>

<? /* DATA DA ENTREGA */ ?>
<? if ( $lib_data_entrega == "ver" OR $lib_data_entrega == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_data_entrega == "") { ?>  Dt. Entrega 
<? } } ?>
</P></TH>

<? /* REPROGRAMAÇÃO */ ?>
<? if ( $lib_reprogramacao == "ver" OR $lib_reprogramacao == "alt" ) {?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_reprogramacao == "") { ?>  Reprog. 
<? } } ?>
</P></TH>

<?/* DATA PREVISAO  */?>
<? if ( $lib_data_previsao == "ver" OR $lib_data_previsao == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_data_previsao == "") { ?>  Dt. Previsão
<? } } ?>
</P></TH>

<?/* DATA PREVISAO  */?>
<? if ( $lib_dt_prog_montagem == "ver" OR $lib_dt_prog_montagem == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_dt_prog_montagem == "") { ?>  Dt. Prog. Montagem
<? } } ?>
</P></TH>

<?/* DATA PROG. DIARIA  */?>
<? if ( $lib_data_prog_diaria == "ver" OR $lib_data_prog_diaria == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_data_prog_diaria == "") { ?>  Dt. Prog. Diária 
<? } } ?>
</P></TH>


<? /* BAIXA EXPEDICAO */ ?>
<? if ( $lib_baixa_expedicao == "ver" ) {?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_baixa == "") { ?> Baixa 
<? } } ?>
</P></TH>

<? /* BAIXA */ ?>
<? if ( $lib_baixa == "ver" OR $lib_baixa == "alt" ) {?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_baixa == "") { ?> Baixa 
<? } } ?>
</P></TH>

<? /* DATA BAIXA */ ?>
<? if ( $lib_data_baixa == "ver" OR $lib_data_baixa == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_data_baixa == "" ) { ?>  Dt. da Baixa
<? } } ?>
</P></TH>

<? /* LOCAL VENDA */ ?>
<? if ( $lib_local_venda == "ver" OR $lib_local_venda == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_local_venda == "") { ?>  Local Venda 
<? } } ?>
</P></TH>

<? /* FORNECIMENTO MOTOR */ ?>
<? if ( $lib_fornecimento_motor == "ver" OR $lib_fornecimento_motor == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_fornecimento_motor == "") { ?> Forn. Mot.
<? } } ?>
</P></TH>

<? /* DATA MOTOR RECEBIDO */ ?>
<? if ( $lib_data_motor_recebido == "ver" OR $lib_data_motor_recebido == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_data_motor_recebido == "") { ?>  Dt. Motor Recebido 
<? } } ?>
</P></TH>

<? /* DESCRICAO VENT */ ?>

<? if ( $lib_descr_vent == "ver" OR $lib_descr_vent == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2">
<span style="widht:20px;"> <P class=bordas>
<?	if ( $check_descr_vent == "") { ?> Descr. Vent. 
<? } } ?>
</P></TH>

<? /* QT */ ?>
<? if ( $lib_qt == "ver" OR $lib_qt == "alt" ) { ?>
<TH align=middle widht="5%" rowspan="2"><P class=bordas>
<?	if ( $check_qt == "") { ?>  QT 
<? } } ?>
</P></TH>

<? /* MODELO */ ?>
<? if ( $lib_modelo == "ver" OR $lib_modelo == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_modelo == "") { ?>  Mod. 
<? } } ?>
</P></TH>

<? /* TAMANHO */ ?>
<? if ( $lib_tamanho == "ver" OR $lib_tamanho == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_tamanho == "") { ?>  Tam. 
<? } } ?>
</P></TH>

<? /* LARGURA ESPECIAL */ ?>
<? if ( $lib_largura_especial == "ver" OR $lib_largura_especial == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_largura_especial == "") { ?>  Lar. Esp. 
<? } } ?>
</P></TH>

<? /* ARRANJO */ ?>
<? if ( $lib_arranjo == "ver" OR $lib_arranjo == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_arranjo == "") { ?>  Arr. 
<? } } ?>
</P></TH>

<? /* CLASSE */ ?>
<? if ( $lib_classe == "ver" OR $lib_classe == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ($check_classe == "") { ?>  Cl. 
<? } } ?>
</P></TH>

<? /* ROTACAO */ ?>
<? if ( $lib_rotacao == "ver" OR $lib_rotacao == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_rotacao == "" ) { ?> Rot.
<? } } ?>
</P></TH>

<? /* GABINETE */ ?>
<? if ( $lib_gab == "ver" OR $lib_gab == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_gab == "" ) { ?>  Gab.
<? } } ?>
</P></TH>

<? /* PINTURA */ ?>
<? if ( $lib_pintura == "ver" OR $lib_pintura == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_pintura == "") { ?>  Pintura
<? } } ?>
</P></TH>

<? /* CONSTRUÇÃO */ ?>
<? if ( $lib_construcao == "ver" OR $lib_construcao == "alt" ) {?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_construcao == "" ) { ?>  Const.
<? } } ?>
</P></TH>

<? /* VALOR UNITARIO */ ?>
<? if ($lib_valor_uni == "ver" OR $lib_valor_uni == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_valor_uni == "" ) { ?>  Valor Un.
<? } } ?>
</P></TH>

<? /* VALOR TOTAL */ ?>
<? if ( $lib_valor_total == "ver" OR $lib_valor_total == "alt" ) {?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_valor_total == "" ) { ?>  Sub-Total
<? } } ?>
</P></TH>

<? /* JATEAMENTO / GALV. FOGO */ ?>
<? if ( $lib_jat_g_fogo == "ver" OR $lib_jat_g_fogo == "alt" ) { ?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_jat_g_fogo == "" ) { ?>  Jateamento / Galv. Fogo
<? } } ?>
</P></TH>


<? /* MOTOR MAXSIG */ ?>
<? if ( $lib_mat1 == "ver" OR $lib_mat1 == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_mat1 == "" ) { ?>  Mat1
<? } } ?>
</P></TH>

<? /* POLIA MAXSIG */ ?>
<? if ( $lib_mat2 == "ver" OR $lib_mat2 == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_mat2 == "" ) { ?>  Mat2
<? } } ?>
</P></TH>

<? /* FUND MAXSIG */ ?>
<? if ( $lib_mat3 == "ver" OR $lib_mat3 == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_mat3 == "" ) { ?>  Mat3
<? } } ?>
</P></TH>

<? /* OUTROS MAXSIG */ ?>
<? if ( $lib_outros == "ver" OR $lib_outros == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_outros == "" ) { ?>  Outros
<? } } ?>
</P></TH>

<? /* NUMERO CONSLUTA CLIENTE */ ?>
<? if ( $lib_n_cons_cliente == "ver" OR $lib_n_cons_cliente == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_n_cons_cliente == "" ) { ?>  Nº Cons Cliente
<? } } ?>
</P></TH>

<? /* OBS */ ?>
<? if ( $lib_obs == "ver" OR $lib_obs == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_obs == "" ) { ?>  OBS
<? } } ?>
</P></TH>


<? /* SETOR PROJETOS */ ?>

<? /* OS */ ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle widht="10%" colspan="4"><P class=bordas>
<?	if ( $check_proj == "" ) { ?>  Projeto OS
<? } } ?>
</P></TH>

<? /* DIAS */ ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_proj == "" ) { ?>  Projeto
<? } } ?>
</P></TH>


<? /* documento */ ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle widht="10%" colspan="4"><P class=bordas>
<?	if ( $check_documento == "" ) { ?>  Projeto Doc.
<? } } ?>
</P></TH>


<? /* SETOR PROJETOS */ ?>


<? /* INSPEÇÃO */ ?>

<? /* OS */ ?>
<? if ( $lib_insp == "ver" OR $lib_insp == "alt" ) { ?>
<TH align=middle widht="10%" colspan="4"><P class=bordas>
<?	if ( $check_insp == "" ) { ?>  Inspeção
<? } } ?>
</P></TH>

<? /* INSPEÇÃO */ ?>


<? /*-------	SETORES PCP   ---------*/ ?>

<? /* ALMOX */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_almox_ver == "" ) { ?>
<? } } ?>
</P></TH>

<? /* USINAGEM */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_eixo_ver == "" ) { ?>
<? } } ?>
</P></TH>

<? /* USINAGEM */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_nuc_cubo_ver == "" ) { ?>
<? } } ?>
</P></TH>

<? /* USINAGEM */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_pol_mot_ver == "" ) { ?>
<? } } ?>
</P></TH>

<? /* USINAGEM */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_pol_vent_ver == "" ) { ?>
<? } } ?>
</P></TH>

<? /* USINAGEM */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_gaxeta_ver == "" ) { ?>
<? } } ?>
</P></TH>


<? /* CORTE */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_corte_ver == "" ) { ?>
<? } } ?>
</P></TH>

<? /* CALDERARIA 1 */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald1_ver == "" ) { ?>
<? } } ?>
</P></TH>

<? /* CALDERARIA 2 */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald2_ver == "" ) { ?>
<? } } ?>
</P></TH>

<? /* ROTOR LL */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotorll_ver == "" ) { ?>
<? } } ?>
</P></TH>

<? /* ROTOR SIR */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotorsir_ver == "" ) { ?>
<? } } ?>
</P></TH>

<? /* MONTAGEM */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_montagem_ver == "" ) { ?>
<? } } ?>
</P></TH>

<? /* GABINETE */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_gabinete_ver == "" ) { ?>
<? } } ?>
</P></TH>

<? /* BALANCEAMENTO */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_balance_ver == "" ) { ?>
<? } } ?>
</P></TH>

<? /* PINTURA */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_pintura_ver == "" ) { ?>
<? } } ?>
</P></TH>

<? /* EXPEDICAO */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_expedicao_ver == "" ) { ?>
<? } } ?>
</P></TH>

<? /* FUNILARIA */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_funilaria_ver == "" ) { ?>
<? } } ?>
</P></TH>

<? /*LASER */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_laser_ver == "" ) { ?>
<? } } ?>
</P></TH>

<? /*-------	SETORES PCP   ---------*/ ?>


<? /* SETOR ALMOX */ ?>

<? if ( $lib_almox == "ver" OR $lib_almox == "alt" ) { ?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_almox == "" ) { ?>  Almoxarifado
<? } } ?>
</P></TH>

<? /* SETOR ALMOX */ ?>


<? /* SETOR CORTE */ ?>

<? if ( $lib_corte == "ver" OR $lib_corte == "alt" ) { ?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_corte == "" ) { ?>  Corte
<? } } ?>
</P></TH>

<? /* SETOR CORTE */ ?>


<? /* SETOR BALANCEAMENTO */ ?>

<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" ) { ?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_balanc == "" ) { ?>  Balanceamento
<? } } ?>
</P></TH>

<? /* SETOR BALANCEAMENTO */ ?>

<? /* SETOR CALDERARIA 1 */ ?>

<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" ) { ?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_cald1 == "" ) { ?>  Calderaria I
<? } } ?>
</P></TH>

<? /* SETOR CALDERARIA 1 */ ?>

<? /* SETOR CALDERARIA 2 */ ?>

<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" ) { ?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_cald2 == "" ) { ?>  Calderaria II
<? } } ?>
</P></TH>

<? /* SETOR CALDERARIA 2 */ ?>

<? /* SETOR PINTURA */ ?>

<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" ) { ?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_pinturasetor == "" ) { ?>  Pintura
<? } } ?>
</P></TH>

<? /* SETOR PINTURA */ ?>

<? /* SETOR ROTOR LL */ ?>

<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" ) { ?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_rotor_ll == "" ) { ?>  Rotor LL
<? } } ?>
</P></TH>

<? /* SETOR ROTOR LL */ ?>

<? /* SETOR ROTOR SIR */ ?>

<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" ) { ?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_rotor_sir == "" ) { ?>  Rotor SIR
<? } } ?>
</P></TH>

<? /* SETOR ROTOR SIR */ ?>


<? /* SETOR MONTAGEM */ ?>

<? if ( $lib_montagem == "ver" OR $lib_montagem == "alt" ) { ?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_montagem == "" ) { ?>  Montagem
<? } } ?>
</P></TH>

<? /* SETOR MONTAGEM */ ?>


<? /* SETOR GABINETE */ ?>

<? if ( $lib_gabinete == "ver" OR $lib_gabinete == "alt" ) { ?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_gabinete == "" ) { ?>  Gabinete
<? } } ?>
</P></TH>

<? /* SETOR GABINETE */ ?>


<? /* SETOR USINAGEM */ ?>

<? /* EIXO */ ?>

<? if ( $lib_usinagem_eixo == "ver" OR $lib_usinagem_eixo == "alt" ) { ?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_usinagem_eixo == "" ) { ?>  Usinagem Eixo
<? } } ?>
</P></TH>

<? /* EIXO */ ?>


<? /* NUC_CUBO */ ?>

<? if ( $lib_usinagem_nuc_cubo == "ver" OR $lib_usinagem_nuc_cubo == "alt" ) { ?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_usinagem_nuc_cubo == "" ) { ?>  Usinagem Nuc/Cubo
<? } } ?>
</P></TH>

<? /* NUC_CUBO */ ?>


<? /* POL_MOT */ ?>

<? if ( $lib_usinagem_pol_mot == "ver" OR $lib_usinagem_pol_mot == "alt" ) { ?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_usinagem_pol_mot == "" ) { ?>  Usinagem Pol.Mot.
<? } } ?>
</P></TH>

<? /* POL_MOT */ ?>


<? /* POL_VENT */ ?>

<? if ( $lib_usinagem_pol_vent == "ver" OR $lib_usinagem_pol_vent == "alt" ) { ?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_usinagem_pol_vent == "" ) { ?>  Usinagem Pol.Vent.
<? } } ?>
</P></TH>

<? /* POL_VENT */ ?>


<? /* GAXETA */ ?>

<? if ( $lib_usinagem_gaxeta == "ver" OR $lib_usinagem_gaxeta == "alt" ) { ?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_usinagem_gaxeta == "" ) { ?>  Usinagem Gaxeta
<? } } ?>
</P></TH>

<? /* GAXETA */ ?>

<? /* SETOR USINAGEM */ ?>

<? /* SETOR EXPEDICAO */ ?>

<? if ( $lib_expedicao == "ver" OR $lib_expedicao == "alt" ) { ?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_expedicao == "" ) { ?>  Expedição
<? } } ?>
</P></TH>

<? /* SETOR EXPEDICAO */ ?>

<? /* SETOR FUNILARIA */ ?>

<? if ( $lib_funilaria == "ver" OR $lib_funilaria == "alt" ) { ?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_funilaria == "" ) { ?>  Funilaria
<? } } ?>
</P></TH>

<? /* SETOR FUNILARIA */ ?>


<? /* SETOR LASER */ ?>

<? if ( $lib_laser == "ver" OR $lib_laser == "alt" ) { ?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_laser == "" ) { ?>  Laser
<? } } ?>
</P></TH>

<? /* SETOR LASER */ ?>

	</TR> 


	<TR class=linha_cabecalho>
	
<? /*-------	SETOR JATEAMENTO / GALV. FOGO	--------*/ ?>

<? /* tipo serviço */ ?>
<? if ($lib_jat_g_fogo == "ver" OR $lib_jat_g_fogo == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_jat_g_fogo == "" ) { ?>  T.S.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_jat_g_fogo == "ver" OR $lib_jat_g_fogo == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_jat_g_fogo == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT STATUS */ ?>

<? if ( $lib_jat_g_fogo == "ver" OR $lib_jat_g_fogo == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>	
<?  if ( $check_jat_g_fogo == "" ) { ?>  Dt. Status
<? } } ?>
</P></TH>

<? /*-------	SETOR JATEAMENTO / GALV. FOGO	--------*/ ?>	

	

<? /*-------	SETOR PROJETOS ---- O.S	--------*/ ?>

<? /* PROJ OS DT PROG */ ?>
<? if ($lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_proj == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* PROJ OS STATUS */ ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_proj == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* PROJ OS DT STATUS ENTRADA */ ?>

<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>	
<?  if ( $check_proj == "" ) { ?>  Dt. Em Produção
<? } } ?>
</P></TH>

<? /* PROJ OS DT STATUS SAIDA */ ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_proj == "" ) { ?>  Dt. Expedição
<? } } ?>
</P></TH>
<? /*-------	SETOR PROJETOS ---- O.S	--------*/ ?>

<? /*-------	SETOR PROJETOS ---- DIAS	--------*/ ?>

<? /* TOTAL DIAS */ ?>
<? if ($lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_documento == "" ) { ?>  Tot.
<? } } ?>
</P></TH>

<? /* SOMA DIAS */ ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_documento == "" ) { ?>  Dias
<? } } ?>
</P></TH>

<? /* PORCENTAGEM */ ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_documento == "" ) { ?>  %Eng.
<? } } ?>
</P></TH>

<? /*-------	SETOR PROJETOS ---- DIAS	--------*/ ?>


<? /*-------	SETOR PROJETOS ---- documento	--------*/ ?>

<? /* data book */ ?>
<? if ($lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_documento == "" ) { ?>  DB
<? } } ?>
</P></TH>

<? /* certif. balanceamento */ ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_documento == "" ) { ?>  CB
<? } } ?>
</P></TH>

<? /* certif. materiais */ ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_documento == "" ) { ?>  CM
<? } } ?>
</P></TH>

<? /* desenho certif. */ ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_documento == "" ) { ?>  DC
<? } } ?>
</P></TH>
<? /*-------	SETOR PROJETOS ---- documento	--------*/ ?>


<? /*-------  INSPEÇÃO	--------*/ ?>

<? /* TIPO */ ?>
<? if ($lib_insp == "ver" OR $lib_insp == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_insp == "" ) { ?>  Tipo
<? } } ?>
</P></TH>

<? /* CLIENTE */ ?>
<? if ( $lib_insp == "ver" OR $lib_insp == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_insp == "" ) { ?>  Cliente
<? } } ?>
</P></TH>

<? /* DATA */ ?>
<? if ( $lib_insp == "ver" OR $lib_insp == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>	
<?  if ( $check_insp == "" ) { ?>  Data
<? } } ?>
</P></TH>

<? /* OBS */ ?>
<? if ( $lib_insp == "ver" OR $lib_insp == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_insp == "" ) { ?>  Obs
<? } } ?>
</P></TH>
<? /*------- INSPEÇÃO --------*/ ?>

<? /*-------	SETORES PCP   ---------*/ ?>

<? /* ALMOX */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_almox_ver == "" ) { ?>  Alm.
<? } } ?>
</P></TH>

<? /* USINAGEM */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_eixo_ver == "" ) { ?>  Eixo
<? } } ?>
</P></TH>

<? /* USINAGEM */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_nuc_cubo_ver == "" ) { ?>  N. C
<? } } ?>
</P></TH>

<? /* USINAGEM */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_pol_mot_ver == "" ) { ?>  P. M
<? } } ?>
</P></TH>

<? /* USINAGEM */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_pol_vent_ver == "" ) { ?>  P. V
<? } } ?>
</P></TH>

<? /* USINAGEM */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_gaxeta_ver == "" ) { ?>  Gax.
<? } } ?>
</P></TH>


<? /* CORTE */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_corte_ver == "" ) { ?>  Co.
<? } } ?>
</P></TH>

<? /* CALDERARIA 1 */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald1_ver == "" ) { ?>  C.I
<? } } ?>
</P></TH>

<? /* CALDERARIA 2 */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald2_ver == "" ) { ?>  C.II
<? } } ?>
</P></TH>

<? /* ROTOR LL */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotorll_ver == "" ) { ?>  R.LL
<? } } ?>
</P></TH>

<? /* ROTOR SIR */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotorsir_ver == "" ) { ?>  R.SIR
<? } } ?>
</P></TH>

<? /* MONTAGEM */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_montagem_ver == "" ) { ?>  Mont.
<? } } ?>
</P></TH>

<? /* GABINETE */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_gabinete_ver == "" ) { ?>  Gab.
<? } } ?>
</P></TH>

<? /* BALANCEAMENTO */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_balance_ver == "" ) { ?>  Ba.
<? } } ?>
</P></TH>

<? /* PINTURA */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_pintura_ver == "" ) { ?>  Pin.
<? } } ?>
</P></TH>

<? /* EXPEDICAO */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_expedicao_ver == "" ) { ?>  Exp.
<? } } ?>
</P></TH>

<? /* FUNILARIA */ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_funilaria_ver == "" ) { ?>  Fun.
<? } } ?>
</P></TH>

<? /* LASER*/ ?>
<? if ($lib_setor_ver == "sim") { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_laser_ver == "" ) { ?>  Las.
<? } } ?>
</P></TH>

<? /*-------	SETORES PCP   ---------*/ ?>


<? /*-------	SETOR ALMOX ---------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_almox == "ver" OR $lib_almox == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_almox == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_almox == "ver" OR $lib_almox == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_almox == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_almox == "ver" OR $lib_almox == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_almox == "" ) { ?>  Dt Previsão
<? } } ?>
</P></TH>

<? /*-------	SETOR ALMOX   --------*/ ?>


<? /*-------	SETOR CORTE ---------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_corte == "ver" OR $lib_corte == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_corte == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_corte == "ver" OR $lib_corte == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_corte == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_corte == "ver" OR $lib_corte == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_corte == "" ) { ?>  Dt Previsão
<? } } ?>
</P></TH>

<? /*-------	SETOR CORTE   --------*/ ?>


<? /*-------	SETOR BALANCEAMENTO ---------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_balanc == "ver" OR $lib_balanc == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_balanc == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_balanc == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_balanc == "" ) { ?>  Dt Previsão
<? } } ?>
</P></TH>


<? /*-------	SETOR BALANCEAMENTO   --------*/ ?>

<? /*-------	SETOR CALDERARIA 1 ---------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_cald1 == "ver" OR $lib_cald1 == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald1 == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald1 == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald1 == "" ) { ?>  Dt Previsão
<? } } ?>
</P></TH>


<? /*-------	SETOR CALDERARIA 1   --------*/ ?>

<? /*-------	SETOR CALDERARIA 2 ---------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_cald2 == "ver" OR $lib_cald2 == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald2 == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald2 == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald2 == "" ) { ?>  Dt Previsão
<? } } ?>
</P></TH>


<? /*-------	SETOR CALDERARIA 2   --------*/ ?>

<? /*-------	SETOR PINTURA  ---------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_pinturasetor == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_pinturasetor == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_pinturasetor == "" ) { ?>  Dt Previsão
<? } } ?>
</P></TH>

<? /*-------	SETOR PINTURA  --------*/ ?>


<? /*-------	SETOR ROTOR LL ---------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotor_ll == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotor_ll == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* ST PREVISAO */ ?>
<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotor_ll == "" ) { ?>  Dt Previsão
<? } } ?>
</P></TH>

<? /*-------	SETOR ROTOR LL   --------*/ ?>

<? /*-------	SETOR ROTOR SIR ---------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotor_sir == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotor_sir == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotor_sir == "" ) { ?>  Dt Previsão
<? } } ?>
</P></TH>

<? /*-------	SETOR ROTOR SIR   --------*/ ?>

<? /*-------	SETOR MONTAGEM   ---------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_montagem == "ver" OR $lib_montagem == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_montagem == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_montagem == "ver" OR $lib_montagem == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_montagem == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_montagem == "ver" OR $lib_montagem == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_montagem == "" ) { ?>  Dt Previsão
<? } } ?>
</P></TH>

<? /*-------	SETOR MONTAGEM   --------*/ ?>


<? /*-------	SETOR GABINETE   ---------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_gabinete == "ver" OR $lib_gabinete == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_gabinete == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_gabinete == "ver" OR $lib_gabinete == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_gabinete == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_gabinete == "ver" OR $lib_gabinete == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_gabinete == "" ) { ?>  Dt Previsão
<? } } ?>
</P></TH>

<? /*-------	SETOR GABINETE   --------*/ ?>


<? /*-------	SETOR USINAGEM ---------*/ ?>

<? /* EIXO */ ?>

<? /* DT PROG */ ?>
<? if ($lib_usinagem_eixo == "ver" OR $lib_usinagem_eixo == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_eixo == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_usinagem_eixo == "ver" OR $lib_usinagem_eixo == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_eixo == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_usinagem_eixo == "ver" OR $lib_usinagem_eixo == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_eixo == "" ) { ?>  Dt Previsão
<? } } ?>
</P></TH>

<? /* EIXO */ ?>

<? /* NUC_CUBO */ ?>

<? /* DT PROG */ ?>
<? if ($lib_usinagem_nuc_cubo == "ver" OR $lib_usinagem_nuc_cubo == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_nuc_cubo == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_usinagem_nuc_cubo == "ver" OR $lib_usinagem_nuc_cubo == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_nuc_cubo == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_usinagem_nuc_cubo == "ver" OR $lib_usinagem_nuc_cubo == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_nuc_cubo == "" ) { ?>  Dt Previsão
<? } } ?>
</P></TH>

<? /* NUC_CUBO */ ?>

<? /* POL_MOT */ ?>

<? /* DT PROG */ ?>
<? if ($lib_usinagem_pol_mot == "ver" OR $lib_usinagem_pol_mot == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_pol_mot == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_usinagem_pol_mot == "ver" OR $lib_usinagem_pol_mot == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_pol_mot == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_usinagem_pol_mot == "ver" OR $lib_usinagem_pol_mot == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_pol_mot == "" ) { ?>  Dt Previsão
<? } } ?>
</P></TH>

<? /* POL_MOT */ ?>

<? /* POL_VENT */ ?>

<? /* DT PROG */ ?>
<? if ($lib_usinagem_pol_vent == "ver" OR $lib_usinagem_pol_vent == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_pol_vent == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_usinagem_pol_vent == "ver" OR $lib_usinagem_pol_vent == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_pol_vent == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_usinagem_pol_vent == "ver" OR $lib_usinagem_pol_vent == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_pol_vent == "" ) { ?>  Dt Previsão
<? } } ?>
</P></TH>

<? /* POL_VENT */ ?>

<? /* GAXETA */ ?>

<? /* DT PROG */ ?>
<? if ($lib_usinagem_gaxeta == "ver" OR $lib_usinagem_gaxeta == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_gaxeta == "" ) { ?>  Dt. Prog.
</P></TH>
<? } } ?>

<? /* STATUS */ ?>
<? if ( $lib_usinagem_gaxeta == "ver" OR $lib_usinagem_gaxeta == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_gaxeta == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_usinagem_gaxeta == "ver" OR $lib_usinagem_gaxeta == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_gaxeta == "" ) { ?>  Dt Previsão
<? } } ?>
</P></TH>

<? /* GAXETA */ ?>

<? /*-------	SETOR USINAGEM   --------*/ ?>


<? /*-------	SETOR EXPEDICAO   ---------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_expedicao == "ver" OR $lib_expedicao == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_expedicao == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_expedicao == "ver" OR $lib_expedicao == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_expedicao == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_expedicao == "ver" OR $lib_expedicao == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_expedicao == "" ) { ?>  Dt Previsão
<? } } ?>
</P></TH>

<? /*-------	SETOR EXPEDICAO   --------*/ ?>


<? /*-------	SETOR FUNILARIA   ---------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_funilaria == "ver" OR $lib_funilaria == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_funilaria == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_funilaria == "ver" OR $lib_funilaria == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_funilaria == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_funilaria == "ver" OR $lib_funilaria == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_funilaria == "" ) { ?>  Dt Previsão
<? } } ?>
</P></TH>

<? /*-------	SETOR FUNILARIA   --------*/ ?>



<? /*-------	SETOR LASER---------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_laser == "ver" OR $lib_laser == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_laser == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_laser == "ver" OR $lib_laser == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_laser == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_laser == "ver" OR $lib_laser == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_laser== "" ) { ?>  Dt Previsão
<? } } ?>
</P></TH>

<? /*-------	SETOR CORTE   --------*/ ?>

	</TR>         


		<? /* FIM EXIBICAO DE PEÇAS POR SETORES */ ?>    
              

<? /* --------------------  INICIO DA CONSULTA  -----------------------------  */  ?>
<? 
//echo " data book - ".$f_data_book_db;
$valor_total_os = 0; $quant_os = 0; $data_total_dias_os = 0; $resultado_dias_proj_os = 0; $porcentagem_total_os = 0; $quant_os_atrasada = 0; $quant_os_reprogramacao = 0;

$query = "SELECT * FROM pcp WHERE id>='0' $f_data_emissao_mes_db $f_data_emissao_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_representante_db $f_estado_db $f_data_entrega_mes_db $f_data_entrega_db $f_data_prog_diaria_db $f_data_previsao_db $f_dt_prog_montagem_db $f_n_cons_cliente_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_largura_especial_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_construcao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_ts_jat_g_fogo_db $f_status_jat_g_fogo_db $f_dt_status_jat_g_fogo_db $f_obs_db $f_mat1_db $f_mat2_db $f_outros_db $f_mat3_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $baixa_organizar $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_proj_os_dt_saida_mes_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_tipo_insp_db $f_cliente_insp_db $f_data_insp_db $f_obs_insp_db $f_dt_prog_almox_db $f_status_almox_db $f_dt_previsao_almox_db $f_dt_prog_corte_db $f_status_corte_db $f_dt_previsao_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_dt_previsao_balanc_db $f_dt_prog_cald1_db $f_status_cald1_db $f_dt_previsao_cald1_db $f_dt_prog_cald2_db $f_status_cald2_db $f_dt_previsao_cald2_db $f_dt_prog_pintura_db $f_status_pintura_db $f_dt_previsao_pintura_db $f_dt_prog_rotor_ll_db $f_status_rotor_ll_db $f_dt_previsao_rotor_ll_db $f_dt_prog_rotor_sir_db $f_status_rotor_sir_db $f_dt_previsao_rotor_sir_db $f_dt_prog_montagem_db $f_status_montagem_db $f_dt_previsao_montagem_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db $f_dt_previsao_usinagem_eixo_db $f_dt_prog_usinagem_nuc_cubo_db $f_status_usinagem_nuc_cubo_db $f_dt_previsao_usinagem_nuc_cubo_db $f_dt_prog_usinagem_pol_mot_db $f_status_usinagem_pol_mot_db $f_dt_previsao_usinagem_pol_mot_db $f_dt_prog_usinagem_pol_vent_db $f_status_usinagem_pol_vent_db $f_dt_previsao_usinagem_pol_vent_db $f_dt_prog_usinagem_gaxeta_db $f_status_usinagem_gaxeta_db $f_dt_previsao_usinagem_gaxeta_db $f_dt_prog_gabinete_db $f_status_gabinete_db $f_dt_previsao_gabinete_db $f_dt_prog_expedicao_db $f_status_expedicao_db $f_dt_previsao_expedicao_db $f_dt_prog_funilaria_db $f_status_funilaria_db $f_dt_previsao_funilaria_db $f_dt_prog_laser_db $f_status_laser_db $f_dt_previsao_laser_db ORDER BY '$organizar'";

$result = MYSQL_QUERY($query); $x=0;
while ($dados = mysql_fetch_array($result)) {

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
$qt = $dados["qt"]; 
$valor_uni = $dados["valor_uni"]; 
$valor_total = $dados["valor_total"];

$obs = $dados["obs"]; 

$reprogramacao = $dados["reprogramacao"]; 
$baixa = $dados["baixa"]; 
$data_baixa = $dados["data_baixa"]; 

$data_prog_diaria = $dados["data_prog_diaria"]; 

/* DATA PROG MONTAGEM */
$dt_prog_montagem = $dados["dt_prog_montagem"];

/* DATA PREVISAO */
$data_previsao = $dados["data_previsao"];

/* NUMERO CONSULTA CLIENTE */
$n_cons_cliente = $dados["n_cons_cliente"];

/* JATEAMENTO / GALV. FOGO */
$ts_jat_g_fogo = $dados["ts_jat_g_fogo"];
$status_jat_g_fogo = $dados["status_jat_g_fogo"];
$dt_status_jat_g_fogo = $dados["dt_status_jat_g_fogo"];


/*		SETOR PROJETOS		*/
$proj_os_dt_prog = $dados["proj_os_dt_prog"]; 
$proj_os_status = $dados["proj_os_status"]; 
$proj_os_dt_entrada = $dados["proj_os_dt_entrada"];
$proj_os_dt_saida = $dados["proj_os_dt_saida"];

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

/* INSPEÇÃO */
$tipo_insp = $dados["tipo_insp"];
$cliente_insp = $dados["cliente_insp"];
$data_insp = $dados["data_insp"];
$obs_insp = $dados["obs_insp"];
/* INSPEÇÃO */

/*		SETOR ALMOX		*/
$dt_prog_almox = $dados["dt_prog_almox"]; 
$status_almox = $dados["status_almox"]; 
$dt_previsao_almox = $dados["dt_previsao_almox"];
/*		SETOR ALMOX		*/


/*		SETOR CORTE		*/
$dt_prog_corte = $dados["dt_prog_corte"]; 
$status_corte = $dados["status_corte"]; 
$dt_previsao_corte = $dados["dt_previsao_corte"];
/*		SETOR CORTE		*/

/*		SETOR BALANCEAMENTO		*/
$dt_prog_balanc = $dados["dt_prog_balanc"]; 
$status_balanc = $dados["status_balanc"]; 
$dt_previsao_balanc = $dados["dt_previsao_balanc"];
/*		SETOR BALANCEAMENTO		*/

/*		SETOR CALD 1		*/
$dt_prog_cald1 = $dados["dt_prog_cald1"]; 
$status_cald1 = $dados["status_cald1"]; 
$dt_previsao_cald1 = $dados["dt_previsao_cald1"];
/*		SETOR CALD 1		*/

/*		SETOR CALD 2		*/
$dt_prog_cald2 = $dados["dt_prog_cald2"]; 
$status_cald2 = $dados["status_cald2"]; 
$dt_previsao_cald2 = $dados["dt_previsao_cald2"];
/*		SETOR CALD 2		*/

/*		SETOR PINTURA		*/
$dt_prog_pintura = $dados["dt_prog_pintura"]; 
$status_pintura = $dados["status_pintura"]; 
$dt_previsao_pintura = $dados["dt_previsao_pintura"];
/*		SETOR PINTURA		*/

/*		SETOR ROTOR LL		*/
$dt_prog_rotor_ll = $dados["dt_prog_rotor_ll"]; 
$status_rotor_ll = $dados["status_rotor_ll"]; 
$dt_previsao_rotor_ll = $dados["dt_previsao_rotor_ll"];
/*		SETOR ROTOR LL		*/

/*		SETOR ROTOR SIR		*/
$dt_prog_rotor_sir = $dados["dt_prog_rotor_sir"]; 
$status_rotor_sir = $dados["status_rotor_sir"]; 
$dt_previsao_rotor_sir = $dados["dt_previsao_rotor_sir"];
/*		SETOR ROTOR SIR		*/


/*		SETOR MONTAGEM		*/
$dt_prog_montagem = $dados["dt_prog_montagem"]; 
$status_montagem = $dados["status_montagem"]; 
$dt_previsao_montagem = $dados["dt_previsao_montagem"];
/*		SETOR MONTAGEM		*/


/*		SETOR GABINETE		*/
$dt_prog_gabinete = $dados["dt_prog_gabinete"]; 
$status_gabinete = $dados["status_gabinete"]; 
$dt_previsao_gabinete = $dados["dt_previsao_gabinete"];
/*		SETOR GABINETE		*/


/*		SETOR USINAGEM		*/

/* EIXO	*/
$dt_prog_usinagem_eixo = $dados["dt_prog_usinagem_eixo"]; 
$status_usinagem_eixo = $dados["status_usinagem_eixo"]; 
$dt_previsao_usinagem_eixo = $dados["dt_previsao_usinagem_eixo"];
/* EIXO	*/

/* NUC_CUBO	*/
$dt_prog_usinagem_nuc_cubo = $dados["dt_prog_usinagem_nuc_cubo"]; 
$status_usinagem_nuc_cubo = $dados["status_usinagem_nuc_cubo"];
$dt_previsao_usinagem_nuc_cubo = $dados["dt_previsao_usinagem_nuc_cubo"]; 
/* NUC_CUBO */

/* POL_MOT	*/
$dt_prog_usinagem_pol_mot = $dados["dt_prog_usinagem_pol_mot"]; 
$status_usinagem_pol_mot = $dados["status_usinagem_pol_mot"]; 
$dt_previsao_usinagem_pol_mot = $dados["dt_previsao_usinagem_pol_mot"];
/* POL_MOT */

/* POL_VENT	*/
$dt_prog_usinagem_pol_vent = $dados["dt_prog_usinagem_pol_vent"]; 
$status_usinagem_pol_vent = $dados["status_usinagem_pol_vent"]; 
$dt_previsao_usinagem_pol_vent = $dados["dt_previsao_usinagem_pol_vent"];
/* POL_VENT */

/* GAXETA */
$dt_prog_usinagem_gaxeta = $dados["dt_prog_usinagem_gaxeta"]; 
$status_usinagem_gaxeta = $dados["status_usinagem_gaxeta"]; 
$dt_previsao_usinagem_gaxeta = $dados["dt_previsao_usinagem_gaxeta"];
/* GAXETA */

/*		SETOR USINAGEM		*/

/*		SETOR expedicao		*/
$dt_prog_expedicao = $dados["dt_prog_expedicao"]; 
$status_expedicao = $dados["status_expedicao"]; 
$dt_previsao_expedicao = $dados["dt_previsao_expedicao"];
/*		SETOR expedicao		*/


/*		SETOR FUNILARIA		*/
$dt_prog_funilaria = $dados["dt_prog_funilaria"]; 
$status_funilaria = $dados["status_funilaria"]; 
$dt_previsao_funilaria = $dados["dt_previsao_funilaria"];
/*		SETOR FUNILARIA		*/


/*		SETOR LASER	*/
$dt_prog_laser = $dados["dt_prog_laser"]; 
$status_laser = $dados["status_laser"]; 
$dt_previsao_laser = $dados["dt_previsao_laser"];
/*		SETOR LASER		*/

/* ----------------------- CONVERTER DATAS	------------------------------------*/

$dia_data_emissao = substr($data_emissao, -2); 
$mes_data_emissao = substr($data_emissao, -5,2);
$ano_data_emissao = substr($data_emissao, -10,4); 
$data_emissao = ($dia_data_emissao."/".$mes_data_emissao."/".$ano_data_emissao); 


$dia_data_entrega = substr($data_entrega, -2); 
$mes_data_entrega = substr($data_entrega, -5,2);
$ano_data_entrega = substr($data_entrega, -10,4); 
$data_entrega = ($dia_data_entrega."/".$mes_data_entrega."/".$ano_data_entrega); 


$dia_data_prog_diaria = substr($data_prog_diaria, -2); 
$mes_data_prog_diaria = substr($data_prog_diaria, -5,2);
$ano_data_prog_diaria = substr($data_prog_diaria, -10,4); 
if ($dia_data_prog_diaria == "" AND $mes_data_prog_diaria == "" AND $ano_data_prog_diaria == "") 
{$data_prog_diaria = ($dia_data_prog_diaria."".$mes_data_prog_diaria."".$ano_data_prog_diaria);  } 
else {$data_prog_diaria = ($dia_data_prog_diaria."/".$mes_data_prog_diaria."/".$ano_data_prog_diaria);  }

/* DATA PROG MONTAGEM */
$dia_dt_prog_montagem = substr($dt_prog_montagem, -2); 
$mes_dt_prog_montagem = substr($dt_prog_montagem, -5,2);
$ano_dt_prog_montagem = substr($dt_prog_montagem, -10,4); 
if ($dia_dt_prog_montagem == "" AND $mes_dt_prog_montagem == "" AND $ano_dt_prog_montagem == "") 
{$dt_prog_montagem = ($dia_dt_prog_montagem."".$mes_dt_prog_montagem."".$ano_dt_prog_montagem);  } 
else {$dt_prog_montagem = ($dia_dt_prog_montagem."/".$mes_dt_prog_montagem."/".$ano_dt_prog_montagem);  }

/* DATA PREVISAO */
$dia_data_previsao = substr($data_previsao, -2); 
$mes_data_previsao = substr($data_previsao, -5,2);
$ano_data_previsao = substr($data_previsao, -10,4); 
if ($dia_data_previsao == "" AND $mes_data_previsao== "" AND $ano_data_previsao == "") 
{$data_previsao = ($dia_data_previsao."".$mes_data_previsao."".$ano_data_previsao);  } 
else {$data_previsao = ($dia_data_previsao."/".$mes_data_previsao."/".$ano_data_previsao);  }

$dia_data_motor_recebido = substr($data_motor_recebido, -2); 
$mes_data_motor_recebido = substr($data_motor_recebido, -5,2);
$ano_data_motor_recebido = substr($data_motor_recebido, -10,4);
if ($dia_data_motor_recebido == "" AND $mes_data_motor_recebido == "" AND $ano_data_motor_recebido == "") 
{$data_motor_recebido = ($dia_data_motor_recebido."".$mes_data_motor_recebido."".$ano_data_motor_recebido); } 
else {$data_motor_recebido = ($dia_data_motor_recebido."/".$mes_data_motor_recebido."/".$ano_data_motor_recebido); }


$dia_reprogramacao = substr($reprogramacao, -2); 
$mes_reprogramacao = substr($reprogramacao, -5,2); 
$ano_reprogramacao = substr($reprogramacao, -10,4);
if ($dia_reprogramacao == "" AND $mes_reprogramacao == "" AND $ano_reprogramacao == "") 
{$reprogramacao = ($dia_reprogramacao."".$mes_reprogramacao."".$ano_reprogramacao); } 
else {$reprogramacao = ($dia_reprogramacao."/".$mes_reprogramacao."/".$ano_reprogramacao); }


$dia_data_baixa = substr($data_baixa, -2); 
$mes_data_baixa = substr($data_baixa, -5,2); 
$ano_data_baixa = substr($data_baixa, -10,4);
if ($dia_data_baixa == "" AND $mes_data_baixa == "" AND $ano_data_baixa == "") 
{$data_baixa = ($dia_data_baixa."".$mes_data_baixa."".$ano_data_baixa); } 
else {$data_baixa = ($dia_data_baixa."/".$mes_data_baixa."/".$ano_data_baixa); }


/*		SETOR PROJETOS		*/
$dia_proj_os_dt_prog = substr($proj_os_dt_prog, -2); 
$mes_proj_os_dt_prog = substr($proj_os_dt_prog, -5,2);
$ano_proj_os_dt_prog = substr($proj_os_dt_prog, -10,4); 
if ($dia_proj_os_dt_prog == "" AND $mes_proj_os_dt_prog == "" AND $ano_proj_os_dt_prog == "") 
{$proj_os_dt_prog = ($dia_proj_os_dt_prog."".$mes_proj_os_dt_prog."".$ano_proj_os_dt_prog); } 
else {$proj_os_dt_prog = ($dia_proj_os_dt_prog."/".$mes_proj_os_dt_prog."/".$ano_proj_os_dt_prog); }

$dia_proj_os_dt_entrada = substr($proj_os_dt_entrada, -2); 
$mes_proj_os_dt_entrada = substr($proj_os_dt_entrada, -5,2);
$ano_proj_os_dt_entrada = substr($proj_os_dt_entrada, -10,4); 
if ($dia_proj_os_dt_entrada == "" AND $mes_proj_os_dt_entrada == "" AND $ano_proj_os_dt_entrada == "") 
{$proj_os_dt_entrada = ($dia_proj_os_dt_entrada."".$mes_proj_os_dt_entrada."".$ano_proj_os_dt_entrada); }
else {$proj_os_dt_entrada = ($dia_proj_os_dt_entrada."/".$mes_proj_os_dt_entrada."/".$ano_proj_os_dt_entrada); }

$dia_proj_os_dt_saida = substr($proj_os_dt_saida, -2); 
$mes_proj_os_dt_saida = substr($proj_os_dt_saida, -5,2);
$ano_proj_os_dt_saida = substr($proj_os_dt_saida, -10,4); 
if ($dia_proj_os_dt_saida == "" AND $mes_proj_os_dt_saida == "" AND $ano_proj_os_dt_saida == "") 
{$proj_os_dt_saida = ($dia_proj_os_dt_saida."".$mes_proj_os_dt_saida."".$ano_proj_os_dt_saida); }
else {$proj_os_dt_saida = ($dia_proj_os_dt_saida."/".$mes_proj_os_dt_saida."/".$ano_proj_os_dt_saida); }
/*		SETOR PROJETOS		*/

/*		SETOR ALMOX		*/
$dia_dt_prog_almox = substr($dt_prog_almox, -2); 
$mes_dt_prog_almox = substr($dt_prog_almox, -5,2);
$ano_dt_prog_almox = substr($dt_prog_almox, -10,4); 
if ($dia_dt_prog_almox == "" AND $mes_dt_prog_almox == "" AND $ano_dt_prog_almox == "") 
{$dt_prog_almox = ($dia_dt_prog_almox."".$mes_dt_prog_almox."".$ano_dt_prog_almox); } 
else {$dt_prog_almox = ($dia_dt_prog_almox."/".$mes_dt_prog_almox."/".$ano_dt_prog_almox); }
/*		SETOR ALMOX		*/

/*		SETOR CORTE		*/
$dia_dt_prog_corte = substr($dt_prog_corte, -2); 
$mes_dt_prog_corte = substr($dt_prog_corte, -5,2);
$ano_dt_prog_corte = substr($dt_prog_corte, -10,4); 
if ($dia_dt_prog_corte == "" AND $mes_dt_prog_corte == "" AND $ano_dt_prog_corte == "") 
{$dt_prog_corte = ($dia_dt_prog_corte."".$mes_dt_prog_corte."".$ano_dt_prog_corte); } 
else {$dt_prog_corte = ($dia_dt_prog_corte."/".$mes_dt_prog_corte."/".$ano_dt_prog_corte); }
/*		SETOR CORTE		*/

/*		SETOR BALANCEAMENTO		*/
$dia_dt_prog_balanc = substr($dt_prog_balanc, -2); 
$mes_dt_prog_balanc = substr($dt_prog_balanc, -5,2);
$ano_dt_prog_balanc = substr($dt_prog_balanc, -10,4); 
if ($dia_dt_prog_balanc == "" AND $mes_dt_prog_balanc == "" AND $ano_dt_prog_balanc == "") 
{$dt_prog_balanc = ($dia_dt_prog_balanc."".$mes_dt_prog_balanc."".$ano_dt_prog_balanc); } 
else {$dt_prog_balanc = ($dia_dt_prog_balanc."/".$mes_dt_prog_balanc."/".$ano_dt_prog_balanc); }
/*		SETOR BALANCEAMENTO		*/

/*		SETOR CALD 1		*/
$dia_dt_prog_cald1 = substr($dt_prog_cald1, -2); 
$mes_dt_prog_cald1 = substr($dt_prog_cald1, -5,2);
$ano_dt_prog_cald1 = substr($dt_prog_cald1, -10,4); 
if ($dia_dt_prog_cald1 == "" AND $mes_dt_prog_cald1 == "" AND $ano_dt_prog_cald1 == "") 
{$dt_prog_cald1 = ($dia_dt_prog_cald1."".$mes_dt_prog_cald1."".$ano_dt_prog_cald1); } 
else {$dt_prog_cald1 = ($dia_dt_prog_cald1."/".$mes_dt_prog_cald1."/".$ano_dt_prog_cald1); }
/*		SETOR CALD 1		*/

/*		SETOR CALD 2		*/
$dia_dt_prog_cald2 = substr($dt_prog_cald2, -2); 
$mes_dt_prog_cald2 = substr($dt_prog_cald2, -5,2);
$ano_dt_prog_cald2 = substr($dt_prog_cald2, -10,4); 
if ($dia_dt_prog_cald2 == "" AND $mes_dt_prog_cald2 == "" AND $ano_dt_prog_cald2 == "") 
{$dt_prog_cald2 = ($dia_dt_prog_cald2."".$mes_dt_prog_cald2."".$ano_dt_prog_cald2); } 
else {$dt_prog_cald2 = ($dia_dt_prog_cald2."/".$mes_dt_prog_cald2."/".$ano_dt_prog_cald2); }
/*		SETOR CALD 2		*/

/*		SETOR PINTURA		*/
$dia_dt_prog_pintura = substr($dt_prog_pintura, -2); 
$mes_dt_prog_pintura = substr($dt_prog_pintura, -5,2);
$ano_dt_prog_pintura = substr($dt_prog_pintura, -10,4); 
if ($dia_dt_prog_pintura == "" AND $mes_dt_prog_pintura == "" AND $ano_dt_prog_pintura == "") 
{$dt_prog_pintura = ($dia_dt_prog_pintura."".$mes_dt_prog_pintura."".$ano_dt_prog_pintura); } 
else {$dt_prog_pintura = ($dia_dt_prog_pintura."/".$mes_dt_prog_pintura."/".$ano_dt_prog_pintura); }
/*		SETOR PINTURA		*/

/*		SETOR ROTOR LL		*/
$dia_dt_prog_rotor_ll = substr($dt_prog_rotor_ll, -2); 
$mes_dt_prog_rotor_ll = substr($dt_prog_rotor_ll, -5,2);
$ano_dt_prog_rotor_ll = substr($dt_prog_rotor_ll, -10,4); 
if ($dia_dt_prog_rotor_ll == "" AND $mes_dt_prog_rotor_ll == "" AND $ano_dt_prog_rotor_ll == "") 
{$dt_prog_rotor_ll = ($dia_dt_prog_rotor_ll."".$mes_dt_prog_rotor_ll."".$ano_dt_prog_rotor_ll); } 
else {$dt_prog_rotor_ll = ($dia_dt_prog_rotor_ll."/".$mes_dt_prog_rotor_ll."/".$ano_dt_prog_rotor_ll); }
/*		SETOR ROTOR LL		*/

/*		SETOR ROTOR SIR		*/
$dia_dt_prog_rotor_sir = substr($dt_prog_rotor_sir, -2); 
$mes_dt_prog_rotor_sir = substr($dt_prog_rotor_sir, -5,2);
$ano_dt_prog_rotor_sir = substr($dt_prog_rotor_sir, -10,4); 
if ($dia_dt_prog_rotor_sir == "" AND $mes_dt_prog_rotor_sir == "" AND $ano_dt_prog_rotor_sir == "") 
{$dt_prog_rotor_sir = ($dia_dt_prog_rotor_sir."".$mes_dt_prog_rotor_sir."".$ano_dt_prog_rotor_sir); } 
else {$dt_prog_rotor_sir = ($dia_dt_prog_rotor_sir."/".$mes_dt_prog_rotor_sir."/".$ano_dt_prog_rotor_sir); }
/*		SETOR ROTOR SIR		*/

/*		SETOR MONTAGEM		
$dia_dt_prog_montagem = substr($dt_prog_montagem, -2); 
$mes_dt_prog_montagem = substr($dt_prog_montagem, -5,2);
$ano_dt_prog_montagem = substr($dt_prog_montagem, -10,4); 
if ($dia_dt_prog_montagem == "" AND $mes_dt_prog_montagem == "" AND $ano_dt_prog_montagem == "") 
{$dt_prog_montagem = ($dia_dt_prog_montagem."".$mes_dt_prog_montagem."".$ano_dt_prog_montagem); } 
else {$dt_prog_montagem = ($dia_dt_prog_montagem."/".$mes_dt_prog_montagem."/".$ano_dt_prog_montagem); }
/*		SETOR MONTAGEM		*/

/*		SETOR GABINETE		*/
$dia_dt_prog_gabinete = substr($dt_prog_gabinete, -2); 
$mes_dt_prog_gabinete = substr($dt_prog_gabinete, -5,2);
$ano_dt_prog_gabinete = substr($dt_prog_gabinete, -10,4); 
if ($dia_dt_prog_gabinete == "" AND $mes_dt_prog_gabinete == "" AND $ano_dt_prog_gabinete == "") 
{$dt_prog_gabinete = ($dia_dt_prog_gabinete."".$mes_dt_prog_gabinete."".$ano_dt_prog_gabinete); } 
else {$dt_prog_gabinete = ($dia_dt_prog_gabinete."/".$mes_dt_prog_gabinete."/".$ano_dt_prog_gabinete); }
/*		SETOR GABINETE		*/

/*		SETOR USINAGEM		*/

/* DT PROG - EIXO */
$dia_dt_prog_usinagem_eixo = substr($dt_prog_usinagem_eixo, -2); 
$mes_dt_prog_usinagem_eixo = substr($dt_prog_usinagem_eixo, -5,2);
$ano_dt_prog_usinagem_eixo = substr($dt_prog_usinagem_eixo, -10,4); 
if ($dia_dt_prog_usinagem_eixo == "" AND $mes_dt_prog_usinagem_eixo == "" AND $ano_dt_prog_usinagem_eixo == "") 
{$dt_prog_usinagem_eixo = ($dia_dt_prog_usinagem_eixo."".$mes_dt_prog_usinagem_eixo."".$ano_dt_prog_usinagem_eixo); } 
else {$dt_prog_usinagem_eixo = ($dia_dt_prog_usinagem_eixo."/".$mes_dt_prog_usinagem_eixo."/".$ano_dt_prog_usinagem_eixo); }
/* DT PROG - EIXO */

/* DT PROG - NUC_CUBO */
$dia_dt_prog_usinagem_nuc_cubo = substr($dt_prog_usinagem_nuc_cubo, -2); 
$mes_dt_prog_usinagem_nuc_cubo = substr($dt_prog_usinagem_nuc_cubo, -5,2);
$ano_dt_prog_usinagem_nuc_cubo = substr($dt_prog_usinagem_nuc_cubo, -10,4); 
if ($dia_dt_prog_usinagem_nuc_cubo == "" AND $mes_dt_prog_usinagem_nuc_cubo == "" AND $ano_dt_prog_usinagem_nuc_cubo == "") 
{$dt_prog_usinagem_nuc_cubo = ($dia_dt_prog_usinagem_nuc_cubo."".$mes_dt_prog_usinagem_nuc_cubo."".$ano_dt_prog_usinagem_nuc_cubo); } 
else {$dt_prog_usinagem_nuc_cubo = ($dia_dt_prog_usinagem_nuc_cubo."/".$mes_dt_prog_usinagem_nuc_cubo."/".$ano_dt_prog_usinagem_nuc_cubo); }
/* DT PROG - NUC_CUBO */

/* DT PROG - POL_MOT */
$dia_dt_prog_usinagem_pol_mot = substr($dt_prog_usinagem_pol_mot, -2); 
$mes_dt_prog_usinagem_pol_mot = substr($dt_prog_usinagem_pol_mot, -5,2);
$ano_dt_prog_usinagem_pol_mot = substr($dt_prog_usinagem_pol_mot, -10,4); 
if ($dia_dt_prog_usinagem_pol_mot == "" AND $mes_dt_prog_usinagem_pol_mot == "" AND $ano_dt_prog_usinagem_pol_mot == "") 
{$dt_prog_usinagem_pol_mot = ($dia_dt_prog_usinagem_pol_mot."".$mes_dt_prog_usinagem_pol_mot."".$ano_dt_prog_usinagem_pol_mot); } 
else {$dt_prog_usinagem_pol_mot = ($dia_dt_prog_usinagem_pol_mot."/".$mes_dt_prog_usinagem_pol_mot."/".$ano_dt_prog_usinagem_pol_mot); }
/* DT PROG - POL_MOT */

/* DT PROG - POL_VENT */
$dia_dt_prog_usinagem_pol_vent = substr($dt_prog_usinagem_pol_vent, -2); 
$mes_dt_prog_usinagem_pol_vent = substr($dt_prog_usinagem_pol_vent, -5,2);
$ano_dt_prog_usinagem_pol_vent = substr($dt_prog_usinagem_pol_vent, -10,4); 
if ($dia_dt_prog_usinagem_pol_vent == "" AND $mes_dt_prog_usinagem_pol_vent == "" AND $ano_dt_prog_usinagem_pol_vent == "") 
{$dt_prog_usinagem_pol_vent = ($dia_dt_prog_usinagem_pol_vent."".$mes_dt_prog_usinagem_pol_vent."".$ano_dt_prog_usinagem_pol_vent); } 
else {$dt_prog_usinagem_pol_vent = ($dia_dt_prog_usinagem_pol_vent."/".$mes_dt_prog_usinagem_pol_vent."/".$ano_dt_prog_usinagem_pol_vent); }
/* DT PROG - POL_VENT */

/* DT PROG - GAXETA */
$dia_dt_prog_usinagem_gaxeta = substr($dt_prog_usinagem_gaxeta, -2); 
$mes_dt_prog_usinagem_gaxeta = substr($dt_prog_usinagem_gaxeta, -5,2);
$ano_dt_prog_usinagem_gaxeta = substr($dt_prog_usinagem_gaxeta, -10,4); 
if ($dia_dt_prog_usinagem_gaxeta == "" AND $mes_dt_prog_usinagem_gaxeta == "" AND $ano_dt_prog_usinagem_gaxeta == "") 
{$dt_prog_usinagem_gaxeta = ($dia_dt_prog_usinagem_gaxeta."".$mes_dt_prog_usinagem_gaxeta."".$ano_dt_prog_usinagem_gaxeta); } 
else {$dt_prog_usinagem_gaxeta = ($dia_dt_prog_usinagem_gaxeta."/".$mes_dt_prog_usinagem_gaxeta."/".$ano_dt_prog_usinagem_gaxeta); }
/* DT PROG - GAXETA */

/*		SETOR USINAGEM		*/

/*		SETOR EXPEDICAO		*/
$dia_dt_prog_expedicao = substr($dt_prog_expedicao, -2); 
$mes_dt_prog_expedicao = substr($dt_prog_expedicao, -5,2);
$ano_dt_prog_expedicao = substr($dt_prog_expedicao, -10,4); 
if ($dia_dt_prog_expedicao == "" AND $mes_dt_prog_expedicao == "" AND $ano_dt_prog_expedicao == "") 
{$dt_prog_expedicao = ($dia_dt_prog_expedicao."".$mes_dt_prog_expedicao."".$ano_dt_prog_expedicao); } 
else {$dt_prog_expedicao = ($dia_dt_prog_expedicao."/".$mes_dt_prog_expedicao."/".$ano_dt_prog_expedicao); }
/*		SETOR EXPEDICAO		*/


/*		SETOR FUNILARIA		*/

$dia_dt_prog_funilaria = substr($dt_prog_funilaria, -2); 
$mes_dt_prog_funilaria = substr($dt_prog_funilaria, -5,2);
$ano_dt_prog_funilaria = substr($dt_prog_funilaria, -10,4); 
if ($dia_dt_prog_funilaria == "" AND $mes_dt_prog_funilaria == "" AND $ano_dt_prog_funilaria == "") 
{$dt_prog_funilaria = ($dia_dt_prog_funilaria."".$mes_dt_prog_funilaria."".$ano_dt_prog_funilaria); } 
else {$dt_prog_funilaria = ($dia_dt_prog_funilaria."/".$mes_dt_prog_funilaria."/".$ano_dt_prog_funilaria); }

/*		SETOR FUNILARIA		*/

/*		SETOR LASER	*/
$dia_dt_prog_laser = substr($dt_prog_laser, -2); 
$mes_dt_prog_laser = substr($dt_prog_laser, -5,2);
$ano_dt_prog_laser = substr($dt_prog_laser, -10,4); 
if ($dia_dt_prog_laser== "" AND $mes_dt_prog_laser == "" AND $ano_dt_prog_laser == "") 
{$dt_prog_laser = ($dia_dt_prog_laser."".$mes_dt_prog_laser."".$ano_dt_prog_laser); } 
else {$dt_prog_laser = ($dia_dt_prog_laser."/".$mes_dt_prog_laser."/".$ano_dt_prog_laser); }
/*		SETOR LASER		*/

/* ----------------------- FIM CONVERTER DATAS	------------------------------------*/

/*------------	SETORES - DATA DE HOJE E SOMA DE DIAS	-------------*/ 

//DATA HOJE
$dia = date('d'); $mes = date('n'); $ano = date('Y'); 
if(strlen($dia) == 1){$dia = "0".$dia;};
if(strlen($mes) == 1){$mes = "0".$mes;}; 
$data_hoje = $dia."/".$mes."/".$ano;

$proxima_data1 = mktime(0, 0, 0, date("m"), date("d") + 1, date("Y"));
$proxima_data11 = date("d/m/Y",  $proxima_data1);

$proxima_data2 = mktime(0, 0, 0, date("m"), date("d") + 2, date("Y"));
$proxima_data12 = date("d/m/Y",  $proxima_data2);

$proxima_data3 = mktime(0, 0, 0, date("m"), date("d") + 3, date("Y"));
$proxima_data13 = date("d/m/Y",  $proxima_data3);

$proxima_data4 = mktime(0, 0, 0, date("m"), date("d") + 4, date("Y"));
$proxima_data14 = date("d/m/Y",  $proxima_data4);

$proxima_data5 = mktime(0, 0, 0, date("m"), date("d") + 5, date("Y"));
$proxima_data15 = date("d/m/Y",  $proxima_data5);

$proxima_data6 = mktime(0, 0, 0, date("m"), date("d") + 6, date("Y"));
$proxima_data16 = date("d/m/Y",  $proxima_data6);

$proxima_data7 = mktime(0, 0, 0, date("m"), date("d") + 7, date("Y"));
$proxima_data17 = date("d/m/Y",  $proxima_data7);

/*------------	SETORES - DATA DE HOJE E SOMA DE DIAS	-------------*/
?>


				<TR class=linha0 border-style: solid; border-width: 1;  
			onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 	onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))">
			
	
<?	/* MOSTRAR DATA EMISSAO  */   ?> 			
<? if ( $lib_data_emissao == "ver" OR $lib_data_emissao == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_data_emissao == "" ) { ?>
<span style="width:95px;word-wrap:break-word;"> 
<?echo "$data_emissao";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR NUMERO O.S  */   ?>
<? if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_num_os == "" ) { ?>
<span style="width:60px;word-wrap:break-word;"> 
<?echo $num_os ."/". $item;?> 
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR NUMERO PROPOSTA  */   ?>	
<? if ( $lib_num_proposta == "ver" OR $lib_num_proposta == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_num_proposta == "") { ?>
<span style="width:90px;word-wrap:break-word;"> 
<?echo $num_proposta;?> 
</span>
<? } } ?>
</P></TD>
		
<?	/* MOSTRAR NOME CLIENTE  */   ?>				
<? if ( $lib_nome_cliente == "ver" OR $lib_nome_cliente == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_nome_cliente == "") { ?>
<span style="width:150px;word-wrap:break-word;"> 
<?echo $nome_cliente;?> 
</span>
<? } } ?>
</P></TD>	

<?	/* MOSTRAR OC_OBRA  */   ?>	
<? if ( $lib_oc_obra == "ver" OR $lib_oc_obra == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_oc_obra == "" ) { ?>
<span style="width:125px;word-wrap:break-word;"> 
<?echo "$oc_obra";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR MERCADO  */   ?>
<? if ( $lib_mercado == "ver" OR $lib_mercado == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_mercado == "" ) { ?>
<span style="width:65px;word-wrap:break-word;"> 
<?echo "$mercado";?> 
</span>
<? } } ?>
</P></TD>

<?	/*  MOSTRAR REPRESENTANTE  */   ?>
<? if ( $lib_representante == "ver" OR $lib_representante == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_representante == "" ) { ?>
<span style="width:80px;word-wrap:break-word;"> 
<?echo "$representante";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR ESTADO  */   ?>
<? if ( $lib_estado == "ver" OR $lib_estado == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_estado == "") { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$estado";?> 
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR DATA ENTREGA  */   ?>
<? if ( $lib_data_entrega == "ver" OR $lib_data_entrega == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_data_entrega == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 

<?
	
$data_hoje_mktime  = mktime(0,0,0,$mes,$dia,$ano);
$data_entrega_mktime = mktime(0,0,0,$mes_data_entrega,$dia_data_entrega,$ano_data_entrega);



if  ($baixa == "P") {
	if ( $data_hoje_mktime > $data_entrega_mktime ) {  ?>
<FONT COLOR="#FF0000">
<? } else { ?>
<FONT COLOR="#006400">
<? }  

	if ( $data_hoje == $data_entrega OR $proxima_data11 == $data_entrega OR $proxima_data12 == $data_entrega OR $proxima_data13 == $data_entrega OR $proxima_data14 == $data_entrega OR $proxima_data15 == $data_entrega OR $proxima_data16 == $data_entrega OR $proxima_data17 == $data_entrega ) { ?>
<FONT COLOR="#FF9900">
<? } } ?>

<?echo "$data_entrega";?> 
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR REPROGRAMAÇÃO  */   ?>
<? if ( $lib_reprogramacao == "ver" OR $lib_reprogramacao == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_reprogramacao == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$reprogramacao";?> 
</span>
<? } } ?>
</P></TD>

<? 
if ($reprogramacao == "") 
	 {$dia_dt_comb = $dia_data_entrega; $mes_dt_comb = $mes_data_entrega; $ano_dt_comb = $ano_data_entrega;}
else {$dia_dt_comb = $dia_reprogramacao; $mes_dt_comb = $mes_reprogramacao; $ano_dt_comb = $ano_reprogramacao;}

$data_comb_mktime  = mktime(0,0,0,$mes_dt_comb,$dia_dt_comb,$ano_dt_comb);    
$data_baixa_mktime = mktime(0,0,0,$mes_data_baixa,$dia_data_baixa,$ano_data_baixa);    

$dias_atraso = ($data_comb_mktime - $data_baixa_mktime)/86400;
$soma_dias_atraso = $soma_dias_atraso + $dias_atraso;
if ($data_comb_mktime >= $data_baixa_mktime) {$pont_item = 1;} else {$pont_item = 0;}
$soma_pont_item = $soma_pont_item + $pont_item;
?> 

<?	/* MOSTRAR DATA PREVISAO  */   ?>
<? if ( $lib_data_previsao == "ver" OR $lib_data_previsao == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_data_previsao == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$data_previsao";?> 
</span>
<? } } ?>
</P></TD> 

<?	/* MOSTRAR DATA PROG MONTAGEM  */   ?>
<? if ( $lib_dt_prog_montagem == "ver" OR $lib_dt_prog_montagem == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_dt_prog_montagem == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_montagem";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR DATA PROG. DIARIA  */   ?>
<? if ( $lib_data_prog_diaria == "ver" OR $lib_data_prog_diaria == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_data_prog_diaria == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$data_prog_diaria";?> 
</span>
<? } } ?>
</P></TD> 

<?	/* MOSTRAR BAIXA  */   ?>
<? if ( $lib_baixa_expedicao == "ver") { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_baixa == "" ) { ?>
<span style="width:20px;word-wrap:break-word;"> 
<?echo "$baixa";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR BAIXA  */   ?>
<? if ( $lib_baixa == "ver" OR $lib_baixa == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_baixa == "" ) { ?>
<span style="width:20px;word-wrap:break-word;"> 
<?echo "$baixa";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR DATA BAIXA  */   ?>
<? if ( $lib_data_baixa == "ver" OR $lib_data_baixa == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_data_baixa == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$data_baixa";?> 
</span>
<? } } ?>
</P></TD>

<? 
$data_entrega_mktime  = mktime(0,0,0,$mes_data_entrega,$dia_data_entrega,$ano_data_entrega);    
$data_baixa_mktime = mktime(0,0,0,$mes_data_baixa,$dia_data_baixa,$ano_data_baixa);    

$dias_atraso_qual = ($data_entrega_mktime - $data_baixa_mktime)/86400;
$soma_dias_atraso_qual = $soma_dias_atraso_qual + $dias_atraso_qual;
if ($data_entrega_mktime >= $data_baixa_mktime) {$pont_item_qual = 1;} else {$pont_item_qual = 0;}
$soma_pont_item_qual = $soma_pont_item_qual + $pont_item_qual;
?> 
	
<? 
//DATA
$b = date('d'); $c = date('n'); $d = date('Y'); 
if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; 
$data_hoje = $b."/".$c."/".$d; 

//CONVERTENDO DATA DE HOJE
/*$dia_data_hoje = substr($data_hoje, -2); 
$mes_data_hoje = substr($data_hoje, -5,2);
$ano_data_hoje = substr($data_hoje, -10,4); 
$data_hoje = ($dia_data_hoje."/".$mes_data_hoje."/".$ano_data_hoje);*/

$data_entrega_mktime  = mktime(0,0,0,$mes_data_entrega,$dia_data_entrega,$ano_data_entrega);
$data_hoje_mktime = mktime(0,0,0,$c,$b,$d);    

if ($data_hoje_mktime > $data_entrega_mktime) {
$dias_atraso_fab = ($data_hoje_mktime - $data_entrega_mktime)/86400;}
else {$dias_atraso_fab = 0;}

$soma_dias_atraso_fab = $soma_dias_atraso_fab + $dias_atraso_fab;

if ($data_entrega_mktime >= $data_hoje_mktime) {$pont_item_fab = 1;} else {$pont_item_fab = 0;}
$soma_pont_item_fab = $soma_pont_item_fab + $pont_item_fab;
?> 


<?	/* MOSTRAR LOCAL VENDA  */   ?>
<? if ( $lib_local_venda == "ver" OR $lib_local_venda == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_local_venda == "" ) { ?>
<span style="width:65px;word-wrap:break-word;"> 
<?echo "$local_venda";?>
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR FORNECIMENTO DO MOTOR  */   ?>
<? if ( $lib_fornecimento_motor == "ver" OR $lib_fornecimento_motor == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_fornecimento_motor == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$fornecimento_motor";?> 
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR DATA MOTOR RECEBIDO  */   ?>
<? if ($lib_data_motor_recebido == "ver" OR $lib_data_motor_recebido == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_data_motor_recebido == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$data_motor_recebido";?> 
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR DESCRICÃO DO VENTILADOR  */   ?>
<? if ( $lib_descr_vent == "ver" OR $lib_descr_vent == "alt" ) { ?>
<TD align=middle><P class=bordas>
<?	if ( $check_descr_vent == "" ) { ?>

<span style="width:70px;word-wrap:break-word;"> 
<?echo "$descr_vent";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR QT  */   ?>
<? if ( $lib_qt == "ver" OR $lib_qt == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_qt == "" ) { ?>
<span style="width:20px;word-wrap:break-word;"> 
<?echo "$qt";?> 
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR MODELO  */   ?>
<? if ( $lib_modelo == "ver" OR $lib_modelo == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_modelo == "" ) { ?>
<span style="width:55px;word-wrap:break-word;">
<?echo "$modelo";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR TAMANHO  */   ?>
<? if ( $lib_tamanho == "ver" OR $lib_tamanho == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_tamanho == "" ) { ?>
<span style="width:55px;word-wrap:break-word;"> 
<?echo "$tamanho";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR LARGURA ESPECIAL  */   ?>
<? if ( $lib_largura_especial == "ver" OR $lib_largura_especial == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_largura_especial == "" ) { ?>
<span style="width:55px;word-wrap:break-word;"> 
<?echo "$largura_especial";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR ARRANJO  */   ?>
<? if ( $lib_arranjo == "ver" OR $lib_arranjo == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_arranjo == "" ) { ?>
<span style="width:35px;word-wrap:break-word;"> 
<?echo "$arranjo";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR CLASSE  */   ?>
<? if ( $lib_classe == "ver" OR $lib_classe == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_classe == "" ) { ?>
<span style="width:35px;word-wrap:break-word;">
<?echo "$classe";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR ROTAÇÃO  */   ?>
<? if ( $lib_rotacao == "ver" OR $lib_rotacao == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_rotacao == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$rotacao";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR GAB  */   ?>
<? if ( $lib_gab == "ver" OR $lib_gab == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_gab == "" ) { ?>
<span style="width:20px;word-wrap:break-word;"> 
<?echo "$gab";?>
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR PINTURA  */   ?>
<? if ( $lib_pintura == "ver" OR $lib_pintura == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_pintura == "" ) { ?>
<span style="width:65px;word-wrap:break-word;"> 
<?echo "$pintura";?> 
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR CONSTRUÇÃO  */   ?>
<? if ( $lib_construcao == "ver" OR $lib_construcao == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_construcao == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$construcao";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR VALOR UNITARIO  */   ?>
<? if ( $lib_valor_uni == "ver" OR $lib_valor_uni == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_valor_uni == "" ) { ?>
<span style="width:95px;word-wrap:break-word;"> 
<?echo "R$". "$valor_uni";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR VALOR TOTAL  */   ?>
<? if ( $lib_valor_total == "ver" OR $lib_valor_total == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_valor_total == "" ) { ?>
<span style="width:95px;word-wrap:break-word;"> 
<?echo "R$". number_format($valor_total, 2, ",", ".");?> 
</span>
<? } } ?>
</P></TD>

<?   /*------------	JATEAMENTO / GALV. FOGO	-------------*/  ?>

<?   /* TIPO DE SERVIÇO */  ?>
<? if ( $lib_jat_g_fogo == "ver" OR $lib_jat_g_fogo == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_jat_g_fogo == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$ts_jat_g_fogo";?> 
</span>
<? } } ?>
</P></TD>

<?	/*  STATUS  */   ?>
<? if ( $lib_jat_g_fogo == "ver" OR $lib_jat_g_fogo == "alt" ) {?>
<TD align=middle><P class=bordas> 
<?	if ( $check_jat_g_fogo == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$status_jat_g_fogo";?> 
</span>
<? } } ?>
</P></TD>

<?	/* DT STATUS */   ?>
<? if ( $lib_jat_g_fogo == "ver" OR $lib_jat_g_fogo == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_jat_g_fogo == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_status_jat_g_fogo";?> 
</span>
<? } } ?>
</P></TD>
<?   /*------------	JATEAMENTO / GALV. FOGO	-------------*/  ?>

<?	/* MOSTRAR MAT1 */   ?>
<? if ( $lib_mat1 == "ver" OR $lib_mat1 == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_mat1 == "" ) { ?>
<span style="width:30px;word-wrap:break-word;">
<?echo "$mat1";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR MAT2  */   ?>
<? if ( $lib_mat2 == "ver" OR $lib_mat2 == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_mat2 == "" ) { ?>
<span style="width:30px;word-wrap:break-word;">
<?echo "$mat2";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR MAT3  */   ?>
<? if ( $lib_mat3 == "ver" OR $lib_mat3 == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_mat3 == "" ) { ?>
<span style="width:30px;word-wrap:break-word;">
<?echo "$mat3";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR OUTROS MAXSIG  */   ?>
<? if ( $lib_outros == "ver" OR $lib_outros == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_outros == "" ) { ?>
<span style="width:30px;word-wrap:break-word;">
<?echo "$outros";?> 
</span>
<? } } ?>
</P></TD>

<?	/* NUMERO CONSULTA CLIENTE  */   ?>
<? if ( $lib_n_cons_cliente == "ver" OR $lib_n_cons_cliente == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_n_cons_cliente == "" ) { ?>
<span style="width:30px;word-wrap:break-word;">
<?echo "$n_cons_cliente";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR OBS  */   ?>
<? if ( $lib_obs == "ver" OR $lib_obs == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_obs == "" ) { ?>
<span style="width:250px;word-wrap:break-word;">
<?echo "$obs";?> 
</span>
<? } } ?>
</P></TD>


<?   /*------------	SETOR PROJETOS	-------------*/  ?>

<?   /*------------	OS	-------------*/  ?>
<?   /* PROJETO OS DT PROG */  ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_proj == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 

<?
$data_hoje_mktime  = mktime(0,0,0,$mes,$dia,$ano);
$proj_os_dt_prog_mktime = mktime(0,0,0,$mes_proj_os_dt_prog,$dia_proj_os_dt_prog,$ano_proj_os_dt_prog);

if  ($baixa == "P") {
	if ( $data_hoje_mktime > $proj_os_dt_prog_mktime ) {  ?>
<FONT COLOR="#FF0000">
<? } else { ?>
<FONT COLOR="#006400">
<? }  

	if ( $data_hoje == $proj_os_dt_prog OR $proxima_data11 == $proj_os_dt_prog OR $proxima_data12 == $proj_os_dt_prog OR $proxima_data13 == $proj_os_dt_prog OR $proxima_data14 == $proj_os_dt_prog OR $proxima_data15 == $proj_os_dt_prog OR $proxima_data16 == $proj_os_dt_prog OR $proxima_data17 == $proj_os_dt_prog ) { ?>
<FONT COLOR="#FF9900">
<? } } ?>

<? if ($proj_os_status == "E") { ?>
<FONT COLOR="#000000">
<? } ?>

<? if ($proj_os_status == "N") { ?>
<FONT COLOR="#000000">
<? } ?>

<?echo "$proj_os_dt_prog";?> 
</span>
<? } } ?>
</P></TD>

<?	/* PROJETO OS STATUS  */   ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) {?>
<TD align=middle><P class=bordas> 
<?	if ( $check_proj == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$proj_os_status";?> 
</span>
<? } } ?>
</P></TD>

<?	/* PROJETO OS DT STATUS ENTRADA */   ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_proj == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$proj_os_dt_entrada";?> 
</span>
<? } } ?>
</P></TD>

<?  /* PROJETO OS DT STATUS SAIDA */  ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_proj == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$proj_os_dt_saida";?> 
</span>
<? } } ?>
</P></TD>
<?
$proj_os_dt_entrada_mktime = mktime(0,0,0,$mes_proj_os_dt_entrada,$dia_proj_os_dt_entrada,$ano_proj_os_dt_entrada);

$proj_os_dt_saida_mktime = mktime(0,0,0,$mes_proj_os_dt_saida,$dia_proj_os_dt_saida,$ano_proj_os_dt_saida);

if ( $proj_os_dt_entrada == "" ) {
	$dias_concluidos_proj = "0";
} else {
if ( $proj_os_status == "E") {
	$dias_concluidos_proj = ($proj_os_dt_saida_mktime - $proj_os_dt_entrada_mktime)/86400;
} else {
	$dias_concluidos_proj = ($data_hoje_mktime - $proj_os_dt_entrada_mktime)/86400;
}
}
$soma_dias_concluidos_proj = $soma_dias_concluidos_proj + $dias_concluidos_proj;
?>
<?   /*------------	OS	-------------*/  ?>


<?   /*------------	DIAS ------------*/  ?>
<?   /* TOTAL DIAS */  ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_documento == "" ) { ?>
<span style="width:25px;word-wrap:break-word;">
<?
$data_emissao_mktime = mktime(0,0,0,$mes_data_emissao,$dia_data_emissao,$ano_data_emissao);
$data_entrega_mktime = mktime(0,0,0,$mes_data_entrega,$dia_data_entrega,$ano_data_entrega);

$data_total_dias = ($data_entrega_mktime - $data_emissao_mktime)/86400;
?>
<?echo ceil("$data_total_dias");?> 
</span>
<? } } ?>
</P></TD>

<?	/* DIAS */   ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_documento == "" ) { ?>
<span style="width:25px;word-wrap:break-word;"> 
<?
$proj_os_dt_entrada_mktime = mktime(0,0,0,$mes_proj_os_dt_entrada,$dia_proj_os_dt_entrada,$ano_proj_os_dt_entrada);
$proj_os_dt_saida_mktime = mktime(0,0,0,$mes_proj_os_dt_saida,$dia_proj_os_dt_saida,$ano_proj_os_dt_saida);
$data_hoje_mktime  = mktime(0,0,0,$mes,$dia,$ano);

if ($proj_os_dt_saida == "") {
	
	$resultado_dias_proj = ($data_hoje_mktime - $proj_os_dt_entrada_mktime)/86400;
} else {
	
	$resultado_dias_proj = ($proj_os_dt_saida_mktime - $proj_os_dt_entrada_mktime)/86400;
}
?>
<?echo ceil("$resultado_dias_proj");?>
</span>
<? } } ?>
</P></TD>

<?	/* PROCENTAGEM */   ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) {?>
<TD align=middle><P class=bordas> 
<?	if ( $check_documento == "" ) { ?>
<span style="width:20px;word-wrap:break-word;"> 
<? $porcentagem_total = ($resultado_dias_proj / $data_total_dias)*100 ?>
<?echo ceil("$porcentagem_total");?> 
</span>
<? } } ?>
</P></TD>

<?   /*------------	DIAS -------------*/  ?>


<?   /*------------	documento	-------------*/  ?>
<?   /* data book */  ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_documento == "" ) { ?>
<span style="width:8px;word-wrap:break-word;"> 
<?echo "$data_book";?> 
</span>
<? } } ?>
</P></TD>

<?	/* certif. balanc  */   ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_documento == "" ) { ?>
<span style="width:8px;word-wrap:break-word;"> 
<?echo "$certif_balanc";?> 
</span>
<? } } ?>
</P></TD>

<?	/* certif materiais */   ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) {?>
<TD align=middle><P class=bordas> 
<?	if ( $check_documento == "" ) { ?>
<span style="width:8px;word-wrap:break-word;"> 
<?echo "$certif_materiais";?> 
</span>
<? } } ?>
</P></TD>

<?  /* desenho certif */  ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_documento == "" ) { ?>
<span style="width:8px;word-wrap:break-word;"> 
<?echo "$desenho_certif";?> 
</span>
<? } } ?>
</P></TD>
<?   /*------------	documento	-------------*/  ?>

<?   /*------------	SETOR PROJETOS	-------------*/  ?>



<?   /*------------	INSPEÇÃO -------------*/  ?>

<?   /* TIPO */  ?>
<? if ( $lib_insp == "ver" OR $lib_insp == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_insp == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$tipo_insp";?> 
</span>
<? } } ?>
</P></TD>

<?	/* CLIENTE  */   ?>
<? if ( $lib_insp == "ver" OR $lib_insp == "alt" ) {?>
<TD align=middle><P class=bordas> 
<?	if ( $check_insp == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$cliente_insp";?> 
</span>
<? } } ?>
</P></TD>

<?	/* DATA */   ?>
<? if ( $lib_insp == "ver" OR $lib_insp == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_insp == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$data_insp";?> 
</span>
<? } } ?>
</P></TD>

<?  /* OBS */  ?>
<? if ( $lib_insp == "ver" OR $lib_insp == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_insp == "" ) { ?>
<span style="width:250px;word-wrap:break-word;"> 
<?echo "$obs_insp";?> 
</span>
<? } } ?>
</P></TD>
<?   /*------------	INSPEÇÃO -------------*/  ?>


<?   /*------------	 SETORES PCP 	-------------*/  ?>

<?   /* STATUS ALMOX */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_almox_ver == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$status_almox";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS USINAGEM */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_eixo_ver == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$status_usinagem_eixo";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS USINAGEM */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_nuc_cubo_ver == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$status_usinagem_nuc_cubo";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS USINAGEM */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_pol_mot_ver == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$status_usinagem_pol_mot";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS USINAGEM */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_pol_vent_ver == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$status_usinagem_pol_vent";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS USINAGEM */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_gaxeta_ver == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$status_usinagem_gaxeta";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS CORTE */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_corte_ver == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$status_corte";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS CALDERARIA 1 */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_cald1_ver == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$status_cald1";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS CALDERARIA 2 */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_cald2_ver == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$status_cald2";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS ROTOR LL */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_rotorll_ver == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$status_rotor_ll";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS ROTOR SIR */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_rotorsir_ver == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$status_rotor_sir";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS MONTAGEM */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_montagem_ver == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$status_montagem";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS GABINETE */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_gabinete_ver == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$status_gabinete";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS BALANCEAMENTO */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_balance_ver == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$status_balanc";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS PINTURA */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_pintura_ver == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$status_pintura";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS EXPEDICAO */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_expedicao_ver == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$status_expedicao";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS FUNILARIA */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_funilaria_ver == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$status_funilaria";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS LASER */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_laser_ver == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$status_laser";?> 
</span>
<? } } ?>
</P></TD>


<?   /*------------	 SETORES PCP 	-------------*/  ?>


<?   /*------------	SETOR ALMOX	-------------*/  ?>


<?   /* DT PROG */  ?>
<? if ( $lib_almox == "ver" OR $lib_almox == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_almox == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 

<?
$data_hoje_mktime  = mktime(0,0,0,$mes,$dia,$ano);
$dt_prog_almox_mktime = mktime(0,0,0,$mes_dt_prog_almox,$dia_dt_prog_almox,$ano_dt_prog_almox);

if  ($baixa == "P") {
	if ( $data_hoje_mktime > $dt_prog_almox_mktime ) {  ?>
<FONT COLOR="#FF0000">
<? } else { ?>
<FONT COLOR="#006400">
<? }  

	if ( $data_hoje == $dt_prog_almox OR $proxima_data11 == $dt_prog_almox OR $proxima_data12 == $dt_prog_almox OR $proxima_data13 == $dt_prog_almox OR $proxima_data14 == $dt_prog_almox OR $proxima_data15 == $dt_prog_almox OR $proxima_data16 == $dt_prog_almox OR $proxima_data17 == $dt_prog_almox ) { ?>
<FONT COLOR="#FF9900">
<? } } ?>

<? if ($status_almox == "E") { ?>
<FONT COLOR="#000000">
<? } ?>

<? if ($status_almox == "N") { ?>
<FONT COLOR="#000000">
<? } ?>

<?echo "$dt_prog_almox";?> 
</span>
<? } } ?>
</P></TD>

<?	/* STATUS  */   ?>
<? if ( $lib_almox == "ver" OR $lib_almox == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_almox == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_almox";?> 
</span>
<? } } ?>
</P></TD>

<?	/* DT PREVISAO  */   ?>
<? if ( $lib_almox == "ver" OR $lib_almox == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_almox == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_almox";?> 
</span>
<? } } ?>
</P></TD>

<?   /*------------	SETOR ALMOX	-------------*/  ?>


<?   /*------------	SETOR CORTE	-------------*/  ?>

<?   /* CORTE DT PROG */  ?>
<? if ( $lib_corte == "ver" OR $lib_corte == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_corte == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 

<?
$data_hoje_mktime  = mktime(0,0,0,$mes,$dia,$ano);
$dt_prog_corte_mktime = mktime(0,0,0,$mes_dt_prog_corte,$dia_dt_prog_corte,$ano_dt_prog_corte);

if  ($baixa == "P") {
	if ( $data_hoje_mktime > $dt_prog_corte_mktime ) {  ?>
<FONT COLOR="#FF0000">
<? } else { ?>
<FONT COLOR="#006400">
<? }  

	if ( $data_hoje == $dt_prog_corte OR $proxima_data11 == $dt_prog_corte OR $proxima_data12 == $dt_prog_corte OR $proxima_data13 == $dt_prog_corte OR $proxima_data14 == $dt_prog_corte OR $proxima_data15 == $dt_prog_corte OR $proxima_data16 == $dt_prog_corte OR $proxima_data17 == $dt_prog_corte ) { ?>
<FONT COLOR="#FF9900">
<? } } ?>

<? if ($status_corte == "E") { ?>
<FONT COLOR="#000000">
<? } ?>

<? if ($status_corte == "N") { ?>
<FONT COLOR="#000000">
<? } ?>

<?echo "$dt_prog_corte";?> 
</span>
<? } } ?>
</P></TD>

<?	/* CORTE STATUS  */   ?>
<? if ( $lib_corte == "ver" OR $lib_corte == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_corte == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_corte";?> 
</span>
<? } } ?>
</P></TD>

<?	/* DT PREVISAO  */   ?>
<? if ( $lib_corte == "ver" OR $lib_corte == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_corte == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_corte";?> 
</span>
<? } } ?>
</P></TD>

<?   /*------------	SETOR CORTE	-------------*/  ?>


<?   /*------------	SETOR BALANCEAMENTO	-------------*/  ?>

<?   /* BALANC DT PROG */  ?>
<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_balanc == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 

<?
$data_hoje_mktime  = mktime(0,0,0,$mes,$dia,$ano);
$dt_prog_balanc_mktime = mktime(0,0,0,$mes_dt_prog_balanc,$dia_dt_prog_balanc,$ano_dt_prog_balanc);

if  ($baixa == "P") {
	if ( $data_hoje_mktime > $dt_prog_balanc_mktime ) {  ?>
<FONT COLOR="#FF0000">
<? } else { ?>
<FONT COLOR="#006400">
<? }  

	if ( $data_hoje == $dt_prog_balanc OR $proxima_data11 == $dt_prog_balanc OR $proxima_data12 == $dt_prog_balanc OR $proxima_data13 == $dt_prog_balanc OR $proxima_data14 == $dt_prog_balanc OR $proxima_data15 == $dt_prog_balanc OR $proxima_data16 == $dt_prog_balanc OR $proxima_data17 == $dt_prog_balanc ) { ?>
<FONT COLOR="#FF9900">
<? } } ?>

<? if ($status_balanc == "E") { ?>
<FONT COLOR="#000000">
<? } ?>

<? if ($status_balanc == "N") { ?>
<FONT COLOR="#000000">
<? } ?>

<?echo "$dt_prog_balanc";?> 
</span>
<? } } ?>
</P></TD>

<?	/* BALANC STATUS  */   ?>
<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_balanc == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_balanc";?> 
</span>
<? } } ?>
</P></TD>

<?	/* DT PREVISAO */   ?>
<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_balanc == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_balanc";?> 
</span>
<? } } ?>
</P></TD>

<?   /*------------	SETOR BALANCEAMENTO	-------------*/  ?>

<?   /*------------	SETOR CALDERARIA 1	-------------*/  ?>

<?   /* DT PROG */  ?>
<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_cald1 == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 

<?
$data_hoje_mktime  = mktime(0,0,0,$mes,$dia,$ano);
$dt_prog_cald1_mktime = mktime(0,0,0,$mes_dt_prog_cald1,$dia_dt_prog_cald1,$ano_dt_prog_cald1);

if  ($baixa == "P") {
	if ( $data_hoje_mktime > $dt_prog_cald1_mktime ) {  ?>
<FONT COLOR="#FF0000">
<? } else { ?>
<FONT COLOR="#006400">
<? }  

	if ( $data_hoje == $dt_prog_cald1 OR $proxima_data11 == $dt_prog_cald1 OR $proxima_data12 == $dt_prog_cald1 OR $proxima_data13 == $dt_prog_cald1 OR $proxima_data14 == $dt_prog_cald1 OR $proxima_data15 == $dt_prog_cald1 OR $proxima_data16 == $dt_prog_cald1 OR $proxima_data17 == $dt_prog_cald1 ) { ?>
<FONT COLOR="#FF9900">
<? } } ?>

<? if ($status_cald1 == "E") { ?>
<FONT COLOR="#000000">
<? } ?>

<? if ($status_cald1 == "N") { ?>
<FONT COLOR="#000000">
<? } ?>

<?echo "$dt_prog_cald1";?> 
</span>
<? } } ?>
</P></TD>

<?	/* STATUS  */   ?>
<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_cald1 == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_cald1";?> 
</span>
<? } } ?>
</P></TD>

<?	/* DT PREVISAO  */   ?>
<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_cald1 == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_cald1";?> 
</span>
<? } } ?>
</P></TD>

<?   /*------------	SETOR CALDERARIA 1	-------------*/  ?>

<?   /*------------	SETOR CALDERARIA 2	-------------*/  ?>

<?   /* DT PROG */  ?>
<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_cald2 == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 

<?
$data_hoje_mktime  = mktime(0,0,0,$mes,$dia,$ano);
$dt_prog_cald2_mktime = mktime(0,0,0,$mes_dt_prog_cald2,$dia_dt_prog_cald2,$ano_dt_prog_cald2);

if  ($baixa == "P") {
	if ( $data_hoje_mktime > $dt_prog_cald2_mktime ) {  ?>
<FONT COLOR="#FF0000">
<? } else { ?>
<FONT COLOR="#006400">
<? }  

	if ( $data_hoje == $dt_prog_cald2 OR $proxima_data11 == $dt_prog_cald2 OR $proxima_data12 == $dt_prog_cald2 OR $proxima_data13 == $dt_prog_cald2 OR $proxima_data14 == $dt_prog_cald2 OR $proxima_data15 == $dt_prog_cald2 OR $proxima_data16 == $dt_prog_cald2 OR $proxima_data17 == $dt_prog_cald2 ) { ?>
<FONT COLOR="#FF9900">
<? } } ?>

<? if ($status_cald2 == "E") { ?>
<FONT COLOR="#000000">
<? } ?>

<? if ($status_cald2 == "N") { ?>
<FONT COLOR="#000000">
<? } ?>

<?echo "$dt_prog_cald2";?> 
</span>
<? } } ?>
</P></TD>

<?	/* STATUS  */   ?>
<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_cald2 == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_cald2";?> 
</span>
<? } } ?>
</P></TD>

<?	/* DT PREVISAO  */   ?>
<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_cald2 == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_cald2";?> 
</span>
<? } } ?>
</P></TD>

<?   /*------------	SETOR CALDERARIA 2	-------------*/  ?>

<?   /*------------	SETOR PINTURA	-------------*/  ?>

<?   /* CORTE DT PROG */  ?>
<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_pinturasetor == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 

<?
$data_hoje_mktime  = mktime(0,0,0,$mes,$dia,$ano);
$dt_prog_pintura_mktime = mktime(0,0,0,$mes_dt_prog_pintura,$dia_dt_prog_pintura,$ano_dt_prog_pintura);

if  ($baixa == "P") {
	if ( $data_hoje_mktime > $dt_prog_pintura_mktime ) {  ?>
<FONT COLOR="#FF0000">
<? } else { ?>
<FONT COLOR="#006400">
<? }  

	if ( $data_hoje == $dt_prog_pintura OR $proxima_data11 == $dt_prog_pintura OR $proxima_data12 == $dt_prog_pintura OR $proxima_data13 == $dt_prog_pintura OR $proxima_data14 == $dt_prog_pintura OR $proxima_data15 == $dt_prog_pintura OR $proxima_data16 == $dt_prog_pintura OR $proxima_data17 == $dt_prog_pintura ) { ?>
<FONT COLOR="#FF9900">
<? } } ?>

<? if ($status_pintura == "E") { ?>
<FONT COLOR="#000000">
<? } ?>

<? if ($status_pintura == "N") { ?>
<FONT COLOR="#000000">
<? } ?>

<?echo "$dt_prog_pintura";?> 
</span>
<? } } ?>
</P></TD>

<?	/* CORTE STATUS  */   ?>
<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_pinturasetor == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_pintura";?> 
</span>
<? } } ?>
</P></TD>

<?	/* DT PREVISAO  */   ?>
<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_pinturasetor == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_pintura";?> 
</span>
<? } } ?>
</P></TD>

<?   /*------------	SETOR PINTURA	-------------*/  ?>

<?   /*------------	SETOR ROTOR LL	-------------*/  ?>

<?   /* DT PROG */  ?>
<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_rotor_ll == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 

<?
$data_hoje_mktime  = mktime(0,0,0,$mes,$dia,$ano);
$dt_prog_rotor_ll_mktime = mktime(0,0,0,$mes_dt_prog_rotor_ll,$dia_dt_prog_rotor_ll,$ano_dt_prog_rotor_ll);

if  ($baixa == "P") {
	if ( $data_hoje_mktime > $dt_prog_rotor_ll_mktime ) {  ?>
<FONT COLOR="#FF0000">
<? } else { ?>
<FONT COLOR="#006400">
<? }  

	if ( $data_hoje == $dt_prog_rotor_ll OR $proxima_data11 == $dt_prog_rotor_ll OR $proxima_data12 == $dt_prog_rotor_ll OR $proxima_data13 == $dt_prog_rotor_ll OR $proxima_data14 == $dt_prog_rotor_ll OR $proxima_data15 == $dt_prog_rotor_ll OR $proxima_data16 == $dt_prog_rotor_ll OR $proxima_data17 == $dt_prog_rotor_ll ) { ?>
<FONT COLOR="#FF9900">
<? } } ?>

<? if ($status_rotor_ll == "E") { ?>
<FONT COLOR="#000000">
<? } ?>

<? if ($status_rotor_ll == "N") { ?>
<FONT COLOR="#000000">
<? } ?>

<?echo "$dt_prog_rotor_ll";?> 
</span>
<? } } ?>
</P></TD>

<?	/* STATUS  */   ?>
<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_rotor_ll == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_rotor_ll";?> 
</span>
<? } } ?>
</P></TD>

<?	/* DT PREVISAO  */   ?>
<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_rotor_ll == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_rotor_ll";?> 
</span>
<? } } ?>
</P></TD>

<?   /*------------	SETOR ROTOR LL	-------------*/  ?>

<?   /*------------	SETOR ROTOR SIR	-------------*/  ?>

<?   /* DT PROG */  ?>
<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_rotor_sir == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 

<?
$data_hoje_mktime  = mktime(0,0,0,$mes,$dia,$ano);
$dt_prog_rotor_sir_mktime = mktime(0,0,0,$mes_dt_prog_rotor_sir,$dia_dt_prog_rotor_sir,$ano_dt_prog_rotor_sir);

if  ($baixa == "P") {
	if ( $data_hoje_mktime > $dt_prog_rotor_sir_mktime ) {  ?>
<FONT COLOR="#FF0000">
<? } else { ?>
<FONT COLOR="#006400">
<? }  

	if ( $data_hoje == $dt_prog_rotor_sir OR $proxima_data11 == $dt_prog_rotor_sir OR $proxima_data12 == $dt_prog_rotor_sir OR $proxima_data13 == $dt_prog_rotor_sir OR $proxima_data14 == $dt_prog_rotor_sir OR $proxima_data15 == $dt_prog_rotor_sir OR $proxima_data16 == $dt_prog_rotor_sir OR $proxima_data17 == $dt_prog_rotor_sir ) { ?>
<FONT COLOR="#FF9900">
<? } } ?>

<? if ($status_rotor_sir == "E") { ?>
<FONT COLOR="#000000">
<? } ?>

<? if ($status_rotor_sir == "N") { ?>
<FONT COLOR="#000000">
<? } ?>

<?echo "$dt_prog_rotor_sir";?> 
</span>
<? } } ?>
</P></TD>

<?	/* STATUS  */   ?>
<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_rotor_sir == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_rotor_sir";?> 
</span>
<? } } ?>
</P></TD>

<?	/* DT PREVISAO  */   ?>
<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_rotor_sir == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_rotor_sir";?> 
</span>
<? } } ?>
</P></TD>

<?   /*------------	SETOR ROTOR SIR	-------------*/  ?>


<?   /*------------	SETOR MONTAGEM	-------------*/  ?>

<?   /* DT PROG */  ?>
<? if ( $lib_montagem == "ver" OR $lib_montagem == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_montagem == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 

<?
$data_hoje_mktime  = mktime(0,0,0,$mes,$dia,$ano);
$dt_prog_montagem_mktime = mktime(0,0,0,$mes_dt_prog_montagem,$dia_dt_prog_montagem,$ano_dt_prog_montagem);

if  ($baixa == "P") {
	if ( $data_hoje_mktime > $dt_prog_montagem_mktime ) {  ?>
<FONT COLOR="#FF0000">
<? } else { ?>
<FONT COLOR="#006400">
<? }  

	if ( $data_hoje == $dt_prog_montagem OR $proxima_data11 == $dt_prog_montagem OR $proxima_data12 == $dt_prog_montagem OR $proxima_data13 == $dt_prog_montagem OR $proxima_data14 == $dt_prog_montagem OR $proxima_data15 == $dt_prog_montagem OR $proxima_data16 == $dt_prog_montagem OR $proxima_data17 == $dt_prog_montagem ) { ?>
<FONT COLOR="#FF9900">
<? } } ?>

<? if ($status_montagem == "E") { ?>
<FONT COLOR="#000000">
<? } ?>

<? if ($status_montagem == "N") { ?>
<FONT COLOR="#000000">
<? } ?>

<?echo "$dt_prog_montagem";?> 
</span>
<? } } ?>
</P></TD>

<?	/* STATUS  */   ?>
<? if ( $lib_montagem == "ver" OR $lib_montagem == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_montagem == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_montagem";?> 
</span>
<? } } ?>
</P></TD>

<?	/* DT PREVISAO  */   ?>
<? if ( $lib_montagem == "ver" OR $lib_montagem == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_montagem == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_montagem";?> 
</span>
<? } } ?>
</P></TD>

<?   /*------------	SETOR MONTAGEM	-------------*/  ?>


<?   /*------------	SETOR GABINETE	-------------*/  ?>

<?   /* DT PROG */  ?>
<? if ( $lib_gabinete == "ver" OR $lib_gabinete == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_gabinete == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 

<?
$data_hoje_mktime  = mktime(0,0,0,$mes,$dia,$ano);
$dt_prog_gabinete_mktime = mktime(0,0,0,$mes_dt_prog_gabinete,$dia_dt_prog_gabinete,$ano_dt_prog_gabinete);

if  ($baixa == "P") {
	if ( $data_hoje_mktime > $dt_prog_gabinete_mktime ) {  ?>
<FONT COLOR="#FF0000">
<? } else { ?>
<FONT COLOR="#006400">
<? }  

	if ( $data_hoje == $dt_prog_gabinete OR $proxima_data11 == $dt_prog_gabinete OR $proxima_data12 == $dt_prog_gabinete OR $proxima_data13 == $dt_prog_gabinete OR $proxima_data14 == $dt_prog_gabinete OR $proxima_data15 == $dt_prog_gabinete OR $proxima_data16 == $dt_prog_gabinete OR $proxima_data17 == $dt_prog_gabinete ) { ?>
<FONT COLOR="#FF9900">
<? } } ?>

<? if ($status_gabinete == "E") { ?>
<FONT COLOR="#000000">
<? } ?>

<? if ($status_gabinete == "N") { ?>
<FONT COLOR="#000000">
<? } ?>

<?echo "$dt_prog_gabinete";?> 
</span>
<? } } ?>
</P></TD>

<?	/* STATUS  */   ?>
<? if ( $lib_gabinete == "ver" OR $lib_gabinete == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_gabinete == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_gabinete";?> 
</span>
<? } } ?>
</P></TD>

<?	/* DT PREVISAO  */   ?>
<? if ( $lib_gabinete == "ver" OR $lib_gabinete == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_gabinete == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_gabinete";?> 
</span>
<? } } ?>
</P></TD>

<?   /*------------	SETOR GABINETE -------------*/  ?>



<?   /*------------	SETOR USINAGEM	-------------*/  ?>

<?/* EIXO */?>

<?   /* DT PROG */  ?>
<? if ( $lib_usinagem_eixo == "ver" OR $lib_usinagem_eixo == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_usinagem_eixo == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_usinagem_eixo";?> 
</span>
<? } } ?>
</P></TD>

<?	/* STATUS  */   ?>
<? if ( $lib_usinagem_eixo == "ver" OR $lib_usinagem_eixo == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_usinagem_eixo == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_usinagem_eixo";?> 
</span>
<? } } ?>
</P></TD>

<?   /* DT PREVISAO */  ?>
<? if ( $lib_usinagem_eixo == "ver" OR $lib_usinagem_eixo == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_usinagem_eixo == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_usinagem_eixo";?> 
</span>
<? } } ?>
</P></TD>

<?/* EIXO */?>

<?/* NUC_CUBO */?>

<?   /* DT PROG */  ?>
<? if ( $lib_usinagem_nuc_cubo == "ver" OR $lib_usinagem_nuc_cubo == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_usinagem_nuc_cubo == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_usinagem_nuc_cubo";?> 
</span>
<? } } ?>
</P></TD>

<?	/* STATUS  */   ?>
<? if ( $lib_usinagem_nuc_cubo == "ver" OR $lib_usinagem_nuc_cubo == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_usinagem_nuc_cubo == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_usinagem_nuc_cubo";?> 
</span>
<? } } ?>
</P></TD>

<?	/* DT PREVISAO  */   ?>
<? if ( $lib_usinagem_nuc_cubo == "ver" OR $lib_usinagem_nuc_cubo == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_usinagem_nuc_cubo == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_usinagem_nuc_cubo";?> 
</span>
<? } } ?>
</P></TD>

<?/* NUC_CUBO */?>

<?/* POL_MOT */?>

<?   /* DT PROG */  ?>
<? if ( $lib_usinagem_pol_mot == "ver" OR $lib_usinagem_pol_mot == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_usinagem_pol_mot == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_usinagem_pol_mot";?> 
</span>
<? } } ?>
</P></TD>

<?	/* STATUS  */   ?>
<? if ( $lib_usinagem_pol_mot == "ver" OR $lib_usinagem_pol_mot == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_usinagem_pol_mot == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_usinagem_pol_mot";?> 
</span>
<? } } ?>
</P></TD>

<?   /* DT PREVISAO */  ?>
<? if ( $lib_usinagem_pol_mot == "ver" OR $lib_usinagem_pol_mot == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_usinagem_pol_mot == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_usinagem_pol_mot";?> 
</span>
<? } } ?>
</P></TD>

<?/* POL_MOT */?>

<?/* POL_VENT */?>

<?   /* DT PROG */  ?>
<? if ( $lib_usinagem_pol_vent == "ver" OR $lib_usinagem_pol_vent == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_usinagem_pol_vent == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_usinagem_pol_vent";?> 
</span>
<? } } ?>
</P></TD>

<?	/* STATUS  */   ?>
<? if ( $lib_usinagem_pol_vent == "ver" OR $lib_usinagem_pol_vent == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_usinagem_pol_vent == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_usinagem_pol_vent";?> 
</span>
<? } } ?>
</P></TD>

<?   /* DT PREVISAO */  ?>
<? if ( $lib_usinagem_pol_vent == "ver" OR $lib_usinagem_pol_vent == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_usinagem_pol_vent == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_usinagem_pol_vent";?> 
</span>
<? } } ?>
</P></TD>

<?/* POL_VENT */?>

<?/* GAXETA */?>

<?   /* DT PROG */  ?>
<? if ( $lib_usinagem_gaxeta == "ver" OR $lib_usinagem_gaxeta == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_usinagem_gaxeta == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_usinagem_gaxeta";?> 
</span>
<? } } ?>
</P></TD>

<?	/* STATUS  */   ?>
<? if ( $lib_usinagem_gaxeta == "ver" OR $lib_usinagem_gaxeta == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_usinagem_gaxeta == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_usinagem_gaxeta";?> 
</span>
<? } } ?>
</P></TD>

<?   /* DT PREVISAO */  ?>
<? if ( $lib_usinagem_gaxeta == "ver" OR $lib_usinagem_gaxeta == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_usinagem_gaxeta == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_usinagem_gaxeta";?> 
</span>
<? } } ?>
</P></TD>

<?/* GAXETA */?>




<?   /*------------	SETOR USINAGEM	-------------*/  ?>


<?   /*------------	SETOR EXPEDICAO	-------------*/  ?>

<?   /* DT PROG */  ?>
<? if ( $lib_expedicao == "ver" OR $lib_expedicao == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_expedicao == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 

<?
$data_hoje_mktime  = mktime(0,0,0,$mes,$dia,$ano);
$dt_prog_expedicao_mktime = mktime(0,0,0,$mes_dt_prog_expedicao,$dia_dt_prog_expedicao,$ano_dt_prog_expedicao);

if  ($baixa == "P") {
	if ( $data_hoje_mktime > $dt_prog_expedicao_mktime ) {  ?>
<FONT COLOR="#FF0000">
<? } else { ?>
<FONT COLOR="#006400">
<? }  

	if ( $data_hoje == $dt_prog_expedicao OR $proxima_data11 == $dt_prog_expedicao OR $proxima_data12 == $dt_prog_expedicao OR $proxima_data13 == $dt_prog_expedicao OR $proxima_data14 == $dt_prog_expedicao OR $proxima_data15 == $dt_prog_expedicao OR $proxima_data16 == $dt_prog_expedicao OR $proxima_data17 == $dt_prog_expedicao ) { ?>
<FONT COLOR="#FF9900">
<? } } ?>

<? if ($status_expedicao == "E") { ?>
<FONT COLOR="#000000">
<? } ?>

<? if ($status_expedicao == "N") { ?>
<FONT COLOR="#000000">
<? } ?>

<?echo "$dt_prog_expedicao";?> 
</span>
<? } } ?>
</P></TD>

<?	/* STATUS  */   ?>
<? if ( $lib_expedicao == "ver" OR $lib_expedicao == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_expedicao == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_expedicao";?> 
</span>
<? } } ?>
</P></TD>

<?	/* DT PREVISAO  */   ?>
<? if ( $lib_expedicao == "ver" OR $lib_expedicao == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_expedicao == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_expedicao";?> 
</span>
<? } } ?>
</P></TD>

<?   /*------------	SETOR EXPEDICAO	-------------*/  ?>


<?   /*------------	SETOR FUNILARIA	-------------*/  ?>

<?   /* DT PROG */  ?>
<? if ( $lib_funilaria == "ver" OR $lib_funilaria == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_funilaria == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 

<?
$data_hoje_mktime  = mktime(0,0,0,$mes,$dia,$ano);
$dt_prog_funilaria_mktime = mktime(0,0,0,$mes_dt_prog_funilaria,$dia_dt_prog_funilaria,$ano_dt_prog_funilaria);

if  ($baixa == "P") {
	if ( $data_hoje_mktime > $dt_prog_funilaria_mktime ) {  ?>
<FONT COLOR="#FF0000">
<? } else { ?>
<FONT COLOR="#006400">
<? }  

	if ( $data_hoje == $dt_prog_funilaria OR $proxima_data11 == $dt_prog_funilaria OR $proxima_data12 == $dt_prog_funilaria OR $proxima_data13 == $dt_prog_funilaria OR $proxima_data14 == $dt_prog_funilaria OR $proxima_data15 == $dt_prog_funilaria OR $proxima_data16 == $dt_prog_funilaria OR $proxima_data17 == $dt_prog_funilaria ) { ?>
<FONT COLOR="#FF9900">
<? } } ?>

<? if ($status_funilaria == "E") { ?>
<FONT COLOR="#000000">
<? } ?>

<? if ($status_funilaria == "N") { ?>
<FONT COLOR="#000000">
<? } ?>

<?echo "$dt_prog_funilaria";?> 
</span>
<? } } ?>
</P></TD>

<?	/* STATUS  */   ?>
<? if ( $lib_funilaria == "ver" OR $lib_funilaria == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_funilaria == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_funilaria";?> 
</span>
<? } } ?>
</P></TD>

<?	/* DT PREVISAO  */   ?>
<? if ( $lib_funilaria == "ver" OR $lib_funilaria == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_funilaria == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_funilaria";?> 
</span>
<? } } ?>
</P></TD>

<?   /*------------	SETOR FUNILARIA	-------------*/  ?>



<?   /*------------	SETOR LASER	-------------*/  ?>

<?   /* LASER DT PROG */  ?>
<? if ( $lib_laser== "ver" OR $lib_laser == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_laser == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 

<?
$data_hoje_mktime  = mktime(0,0,0,$mes,$dia,$ano);
$dt_prog_laser_mktime = mktime(0,0,0,$mes_dt_prog_laser,$dia_dt_prog_laser,$ano_dt_prog_laser);

if  ($baixa == "P") {
	if ( $data_hoje_mktime > $dt_prog_laser_mktime ) {  ?>
<FONT COLOR="#FF0000">
<? } else { ?>
<FONT COLOR="#006400">
<? }  

	if ( $data_hoje == $dt_prog_laser OR $proxima_data11 == $dt_prog_laser OR $proxima_data12 == $dt_prog_laser OR $proxima_data13 == $dt_prog_laser OR $proxima_data14 == $dt_prog_laser OR $proxima_data15 == $dt_prog_laser OR $proxima_data16 == $dt_prog_laser OR $proxima_data17 == $dt_prog_laser ) { ?>
<FONT COLOR="#FF9900">
<? } } ?>

<? if ($status_laser == "E") { ?>
<FONT COLOR="#000000">
<? } ?>

<? if ($status_laser == "N") { ?>
<FONT COLOR="#000000">
<? } ?>

<?echo "$dt_prog_laser";?> 
</span>
<? } } ?>
</P></TD>

<?	/* LASER STATUS  */   ?>
<? if ( $lib_laser == "ver" OR $lib_laser== "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_laser == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_laser";?> 
</span>
<? } } ?>
</P></TD>

<?	/* DT PREVISAO  */   ?>
<? if ( $lib_laser == "ver" OR $lib_laser == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_laser == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_laser";?> 
</span>
<? } } ?>
</P></TD>

<?   /*------------	SETOR LASER------------*/  ?>




		</TR> 


<?   /* FECHAMENTO DO WHILE */  ?>	
 

		
	</TR> 
 
		</TR> 
<? 
$valor_total_os = $valor_total_os + $valor_total; 
$quant_os = $quant_os + 1;  
$qt_total = $qt_total + $qt; 
$data_total_dias_os = $data_total_dias_os + $data_total_dias;
$resultado_dias_proj_os = $resultado_dias_proj_os + $resultado_dias_proj;
$porcentagem_total_os = $porcentagem_total_os + $porcentagem_total;


if ($data_hoje_mktime > $data_entrega_mktime) {
	$quant_os_atrasada = $quant_os_atrasada + 1;
}

$reprogramacao_mktime = mktime(0,0,0,$mes_reprogramacao,$dia_reprogramacao,$ano_reprogramacao);

if ($reprogramacao == "") {
if ($data_hoje_mktime > $data_entrega_mktime) {
	$quant_os_reprogramacao = $quant_os_reprogramacao + 1; }
} else { if ($data_hoje_mktime > $reprogramacao_mktime) {
	$quant_os_reprogramacao = $quant_os_reprogramacao + 1;}
}

?>		
<? } ?>	

<? /*------------INFORMAÇÕES DO FINAL DA TABELA DO PCP---------------*/ ?>		
		<TR class=sem_borda>
              
    <? if ( $lib_data_emissao == "ver" OR $lib_data_emissao == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_data_emissao == "" ) { ?>          
	<? } } ?>
	
<? if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) { ?>
<TD align=middle><P class=borda>
<?	if ( $check_num_os == "" ) { ?>
<span style="width:65px;word-wrap:break-word;"> O.S </span>
<? 
$dias_atraso_total = $soma_dias_atraso / $quant_os;
$pontualidade = $soma_pont_item * 100/ $quant_os;

//formula atraso e pontualidade indice da qualidade
$dias_atraso_total_qual = $soma_dias_atraso_qual / $quant_os;
$pontualidade_qual = $soma_pont_item_qual * 100/ $quant_os;

//FORMULA ATRASO E PONTUALIDADE DA FABRICA
$dias_atraso_total_fab = $soma_dias_atraso_fab / $quant_os;
$pontualidade_fab = $soma_pont_item_fab * 100/ $quant_os;

//FORMULA MEDIA - DIAS ENGENHARIA / PROJETOS
$data_total_dias_media = ($data_total_dias_os / $quant_os);
$resultado_dias_proj_media = ($resultado_dias_proj_os / $quant_os);
$porcentagem_total_media = ($porcentagem_total_os / $quant_os);
//$pontualidade_fab = $soma_pont_item_fab * 100/ $quant_os;

if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) {
	if ( $check_num_os == "" ) {
?>
<span style="width:65px;word-wrap:break-word;"> 	
<input class=nedita_center readonly type=hidden name="quant_os" value="<?echo $quant_os; ?>" size="2">  
<?echo $quant_os; ?> 
</span>
<? } } ?>
</P></TD>

<? } } ?>

	<? if ( $lib_num_proposta == "ver" OR $lib_num_proposta == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_num_proposta == "" ) { ?> 
	<? } } ?>
	
	<? if ( $lib_nome_cliente == "ver" OR $lib_nome_cliente == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_nome_cliente == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_oc_obra == "ver" OR $lib_oc_obra == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_oc_obra == "" ) { ?>       
	<? } } ?>
	
	<? if ( $lib_mercado == "ver" OR $lib_mercado == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_mercado == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_representante == "ver" OR $lib_representante == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_representante == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_estado == "ver" OR $lib_estado == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_estado == "" ) { ?>          
	<? } } ?>

<? if ( $lib_data_entrega == "ver" OR $lib_data_entrega == "alt" ) { ?>
<TD align=middle><P class=borda>
<?	if ( $check_data_entrega == "" ) { ?> Atraso <br>
<?echo ceil($dias_atraso_total); ?></P></TD>

<? } } ?>

	<? if ( $lib_reprogramacao == "ver" OR $lib_reprogramacao == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_reprogramacao == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_data_previsao == "ver" OR $lib_data_previsao == "alt" ) { ?>
<TD align=middle><P class=titulo> 
<?	if ( $check_data_previsao == "" ) { ?> Atraso Fabr. <br>
<?echo ceil($dias_atraso_total_fab); ?> </P></TD>
<? } } ?>

	<? if ( $lib_dt_prog_montagem == "ver" OR $lib_dt_prog_montagem == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_dt_prog_montagem == "" ) { ?> 
	<? } } ?>
	
	<? if ( $lib_data_prog_diaria == "ver" OR $lib_data_prog_diaria == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_data_prog_diaria == "" ) { ?> 
	<? } } ?>
	
	<? if ( $lib_baixa == "ver" OR $lib_baixa == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_baixa == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_data_baixa == "ver" OR $lib_data_baixa == "alt" ) { ?>
	<TD align=middle><P class=borda> 
	<?	if ( $check_data_baixa == "" ) { ?> Atraso dias <br>
<?echo ceil($dias_atraso_total_qual); ?> </P></TD>
	<? } } ?>
	
	<? if ( $lib_local_venda == "ver" OR $lib_local_venda == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_local_venda == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_fornecimento_motor == "ver" OR $lib_fornecimento_motor == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_fornecimento_motor == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_data_motor_recebido == "ver" OR $lib_data_motor_recebido == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_data_motor_recebido == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_descr_vent == "ver" OR $lib_descr_vent == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_descr_vent == "" ) { ?>          
	<? } } ?>

<? if ( $lib_qt == "ver" OR $lib_qt == "alt" ) { ?>
<TD align=middle><P class=borda> 
<?	if ( $check_qt == "" ) {?>
<span style="width:35px;word-wrap:break-word;"> QT <br>
<?echo $qt_total; ?>
</span>
</P></TD>

<? } } ?>

	<? if ( $lib_modelo == "ver" OR $lib_modelo == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_modelo == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_tamanho == "ver" OR $lib_tamanho == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_tamanho == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_arranjo == "ver" OR $lib_arranjo == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_arranjo == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_classe == "ver" OR $lib_classe == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_classe == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_rotacao == "ver" OR $lib_rotacao == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_rotacao == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_gab == "ver" OR $lib_gab == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_gab == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_pintura == "ver" OR $lib_pintura == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_pintura == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_construcao == "ver" OR $lib_construcao == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_construcao == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_valor_uni == "ver" OR $lib_valor_uni == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_valor_uni == "" ) { ?>          
	<? } } ?>
	
<? if ( $lib_valor_total == "ver" OR $lib_valor_total == "alt" ) { ?>
<TD align=middle><P class=borda> 
<? if ( $check_valor_total == "" ) {?>
<span style="width:95px;word-wrap:break-word;"> Valor Total <br>
<?echo "R$". number_format($valor_total_os, 2, ",", "."); ?>
</span>
</P></TD>
<? } } ?>
	
	<? if ( $lib_jat_g_fogo == "ver" OR $lib_jat_g_fogo == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_jat_g_fogo == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_motor_maxsig == "ver" OR $lib_motor_maxsig == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_motor_maxsig == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_polia_maxsig == "ver" OR $lib_polia_maxsig == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_polia_maxsig == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_fund_maxsig == "ver" OR $lib_fund_maxsig == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_fund_maxsig == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_outros_maxsig == "ver" OR $lib_outros_maxsig == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_outros_maxsig == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_obs == "ver" OR $lib_obs == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_obs == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=titulo> 
	
		<?
$media_concluidos_proj = ($soma_dias_concluidos_proj / $quant_os);

echo number_format($media_concluidos_proj, 2, '.', ''); ?>

	</P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> <?echo ceil("$data_total_dias_media");?> </P></TD>
	<TD align=middle><P class=bordas> <?echo ceil("$resultado_dias_proj_media");?> </P></TD>
	<TD align=middle><P class=bordas> <?echo ceil("$porcentagem_total_media");?> </P></TD>
	<?	if ( $check_proj == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_corte == "ver" OR $lib_corte == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_corte == "" ) { ?>
	<? } } ?>	
	
	<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_balanc == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_cald1 == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_cald2 == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_pinturasetor == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_rotor_ll == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_rotor_sir == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_usinagem_eixo == "ver" OR $lib_usinagem_eixo == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_usinagem_eixo == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_usinagem_nuc_cubo == "ver" OR $lib_usinagem_nuc_cubo == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_usinagem_nuc_cubo == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_usinagem_pol_mot == "ver" OR $lib_usinagem_pol_mot == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_usinagem_pol_mot == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_usinagem_pol_vent == "ver" OR $lib_usinagem_pol_vent == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_usinagem_pol_vent == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_usinagem_gaxeta == "ver" OR $lib_usinagem_gaxeta == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_usinagem_gaxeta == "" ) { ?>
	<? } } ?>
				
		</TR>
		
		
		<TR class=sem_borda>
              
	<? if ( $lib_data_emissao == "ver" OR $lib_data_emissao == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_data_emissao == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) { ?>
	<TD align=middle><P class=borda> 
	<?	if ( $check_num_os == "" ) { ?>
	<span style="width:65px;word-wrap:break-word;"> Atrasada
	<input class=nedita_center readonly type=hidden name="quant_os_atrasada" value="<?echo $quant_os_atrasada; ?>" size="2">  
	<?echo $quant_os_atrasada; ?> 
	</span>
	</P></TD>
	<? } } ?>
	
	<? if ( $lib_num_proposta == "ver" OR $lib_num_proposta == "alt" ) { ?>
	<TD align=middle><P class=borda>	
	<span style="width:65px;word-wrap:break-word;"> Atraso Rep.
	<input class=nedita_center readonly type=hidden name="quant_os_reprogramacao" value="<?echo $quant_os_reprogramacao; ?>" size="2">  
	<?echo $quant_os_reprogramacao; ?>  </P></TD>
	<?	if ( $check_num_proposta == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_nome_cliente == "ver" OR $lib_nome_cliente == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_nome_cliente == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_oc_obra == "ver" OR $lib_oc_obra == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_oc_obra == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_mercado == "ver" OR $lib_mercado == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_mercado == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_representante == "ver" OR $lib_representante == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_representante == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_estado == "ver" OR $lib_estado == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_estado == "" ) { ?>          
	<? } } ?>
	
<? if ( $lib_data_entrega == "ver" OR $lib_data_entrega == "alt" ) { ?>
<TD align=middle><P class=borda>
<?	if ( $check_data_entrega == "" ) { ?> Pontualidade <br>
<?echo number_format($pontualidade,2,',',''); ?>
</P></TD>
<? } } ?>

	<? if ( $lib_reprogramacao == "ver" OR $lib_reprogramacao == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_reprogramacao == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_data_previsao == "ver" OR $lib_data_previsao == "alt" ) { ?>
<TD align=middle><P class=titulo> 
<?	if ( $check_data_previsao == "" ) { ?>Pont. Fabr. <br>
<?echo number_format($pontualidade_fab,0,',','')."%"; ?> </P></TD>     
<? } } ?>
	
	<? if ( $lib_dt_prog_montagem == "ver" OR $lib_dt_prog_montagem == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_dt_prog_montagem == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_data_prog_diaria == "ver" OR $lib_data_prog_diaria == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_data_prog_diaria == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_baixa == "ver" OR $lib_baixa == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_baixa == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_data_baixa == "ver" OR $lib_data_baixa == "alt" ) { ?>
	<TD align=middle><P class=borda> 
	<?	if ( $check_data_baixa == "" ) { ?> Pont.% <br>
<?echo number_format($pontualidade_qual,2,',',''); ?>  </P></TD>
	<? } } ?>
	
	<? if ( $lib_local_venda == "ver" OR $lib_local_venda == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_local_venda == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_fornecimento_motor == "ver" OR $lib_fornecimento_motor == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_fornecimento_motor == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_data_motor_recebido == "ver" OR $lib_data_motor_recebido == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_data_motor_recebido == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_descr_vent == "ver" OR $lib_descr_vent == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_descr_vent == "" ) { ?>          
	<? } } ?>

	<? if ( $lib_qt == "ver" OR $lib_qt == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<? if ( $check_qt == "" ) {?>
	<? } } ?>

	<? if ( $lib_modelo == "ver" OR $lib_modelo == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>	
	<?	if ( $check_modelo == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_tamanho == "ver" OR $lib_tamanho == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_tamanho == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_arranjo == "ver" OR $lib_arranjo == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_arranjo == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_classe == "ver" OR $lib_classe == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_classe == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_rotacao == "ver" OR $lib_rotacao == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_rotacao == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_gab == "ver" OR $lib_gab == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_gab == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_pintura == "ver" OR $lib_pintura == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_pintura == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_construcao == "ver" OR $lib_construcao == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_construcao == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_valor_uni == "ver" OR $lib_valor_uni == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_valor_uni == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_valor_total == "ver" OR $lib_valor_total == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<? if ( $check_valor_total == "" ) {?>
	<? } } ?>
	
	<? if ( $lib_jat_g_fogo == "ver" OR $lib_jat_g_fogo == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_jat_g_fogo == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_motor_maxsig == "ver" OR $lib_motor_maxsig == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_motor_maxsig == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_polia_maxsig == "ver" OR $lib_polia_maxsig == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_polia_maxsig == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_carcaca_maxsig == "ver" OR $lib_carcaca_maxsig == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_carcaca_maxsig == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_rotor_maxsig == "ver" OR $lib_rotor_maxsig == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_rotor_maxsig == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_obs == "ver" OR $lib_obs == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_obs == "" ) { ?>         
	<? } } ?>
	
	<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_proj == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_corte == "ver" OR $lib_corte == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_corte == "" ) { ?>
	<? } } ?>	
	
	<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_balanc == "" ) { ?>
	<? } } ?>
	
		<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_cald1 == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_cald2 == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_pinturasetor == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_rotor_ll == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_rotor_sir == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_usinagem_eixo == "ver" OR $lib_usinagem_eixo == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_usinagem_eixo == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_usinagem_nuc_cubo == "ver" OR $lib_usinagem_nuc_cubo == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_usinagem_nuc_cubo == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_usinagem_pol_mot == "ver" OR $lib_usinagem_pol_mot == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_usinagem_pol_mot == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_usinagem_pol_vent == "ver" OR $lib_usinagem_pol_vent == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_usinagem_pol_vent == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_usinagem_gaxeta == "ver" OR $lib_usinagem_gaxeta == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_usinagem_gaxeta == "" ) { ?>
	<? } } ?>
	
	
	
	<? if ( $lib_laser == "ver" OR $lib_laser == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_laser == "" ) { ?>
	<? } } ?>	
				
		</TR>
<? /*------------INFORMAÇÕES DO FINAL DA TABELA DO PCP---------------*/ ?>
   
			             
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
	  </TABLE>
	  

</FIELDSET>
<?/* --------------- EXIBIR NUM OS NA HORIZONTAL --------------- */?>
<? if ( $lib_os_horizontal == "sim" ) { ?>
<? if ( $quant_os < "200") { ?>
<TR class=sem_borda>
<table>
<TD align=left><P class=bordas> 
<?php  
$sql3 = "SELECT distinct num_os FROM pcp WHERE id>='0' $f_data_emissao_mes_db $f_data_emissao_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_representante_db $f_estado_db $f_data_entrega_mes_db $f_data_entrega_db $f_data_prog_diaria_db $f_data_previsao_db $f_dt_prog_montagem_db $f_n_cons_cliente_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_construcao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_ts_jat_g_fogo_db $f_status_jat_g_fogo_db $f_dt_status_jat_g_fogo_db $f_obs_db $f_mat1_db $f_mat2_db $f_outros_db $f_mat3_db $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $baixa_organizar $f_proj_os_dt_prog_db $f_proj_os_status_db $f_proj_os_dt_entrada_db $f_proj_os_dt_saida_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db $f_tipo_insp_db $f_cliente_insp_db $f_data_insp_db $f_obs_insp_db $f_dt_prog_almox_db $f_status_almox_db $f_dt_previsao_almox_db $f_dt_prog_corte_db $f_status_corte_db $f_dt_previsao_corte_db $f_dt_prog_balanc_db $f_status_balanc_db $f_dt_previsao_balanc_db $f_dt_prog_cald1_db $f_status_cald1_db $f_dt_previsao_cald1_db $f_dt_prog_cald2_db $f_status_cald2_db $f_dt_previsao_cald2_db $f_dt_prog_pintura_db $f_status_pintura_db $f_dt_previsao_pintura_db $f_dt_prog_rotor_ll_db $f_status_rotor_ll_db $f_dt_previsao_rotor_ll_db $f_dt_prog_rotor_sir_db $f_status_rotor_sir_db $f_dt_previsao_rotor_sir_db $f_dt_prog_montagem_db $f_status_montagem_db $f_dt_previsao_montagem_db $f_dt_prog_usinagem_eixo_db $f_status_usinagem_eixo_db $f_dt_previsao_usinagem_eixo_db $f_dt_prog_usinagem_nuc_cubo_db $f_status_usinagem_nuc_cubo_db $f_dt_previsao_usinagem_nuc_cubo_db $f_dt_prog_usinagem_pol_mot_db $f_status_usinagem_pol_mot_db $f_dt_previsao_usinagem_pol_mot_db $f_dt_prog_usinagem_pol_vent_db $f_status_usinagem_pol_vent_db $f_dt_previsao_usinagem_pol_vent_db $f_dt_prog_usinagem_gaxeta_db $f_status_usinagem_gaxeta_db $f_dt_previsao_usinagem_gaxeta_db $f_dt_prog_gabinete_db $f_status_gabinete_db $f_dt_previsao_gabinete_db $f_dt_prog_expedicao_db $f_status_expedicao_db $f_dt_previsao_expedicao_db $f_dt_prog_funilaria_db $f_status_funilaria_db $f_dt_previsao_funilaria_db GROUP BY 'num_os' ORDER BY '$organizar' ";  
$qr2 = mysql_query($sql3);  
  
while($row2 = mysql_fetch_row($qr2)) {  
    //Exibe os dados da linha atual separados por , utilizando
    //o índice numérico da coluna
    echo $row2[0].", ";  
}  
?>		
</P></TD>
</table>
</tr> 
<? } } ?>
<?/* --------------- EXIBIR NUM OS NA HORIZONTAL --------------- */?>
</form>
</body>
</html>