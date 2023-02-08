<? include "valida_sessao.php" ; include "config_pcp.php";  ?>

<html>
<head>
<title> Alterar PCP </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/letras_maiscula.js"></script>
<script language="JavaScript" SRC="funcoes/auto_completar.js"></script>
<script language="JavaScript" SRC="funcoes/enter_altera.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
<script language="JavaScript" SRC="funcoes/abrir_fechar.js"></script>
<script language="JavaScript" SRC="funcoes/calendario.js"></script>
<script language="JavaScript" SRC="funcoes/enter_altera_projetos.js"></script>
<script language="javascript">
if(screen.width>="1600") 
{ 
window.resizeTo(1600,900)
} 
else if(screen.width>="1440") 
{ 
window.resizeTo(1440,900)
} 
else if(screen.width>="1366") 
{ 
window.resizeTo(1366,768)
} 
else if(screen.width>="1024") 
{ 
window.resizeTo(1024,768)
} 
else if(screen.width=="800") 
{ 
window.resizeTo(800,600) 
} 
else if(screen.width<="800") 
{ 
window.resizeTo(600,605) 
} 
</script>
</head>
<body>



 
<?

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


/* IMPRESSAO DATA PREVISAO*/
$lib_imprimir_previsao_dia = $linha["lib_imprimir_previsao_dia"]; 

$lib_dt_prog_montagem = $linha["lib_dt_prog_montagem"];

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

/* DATA PREVISAO */
$lib_data_previsao = $linha["lib_data_previsao"];

/* DATA MONTAGEM */
$lib_dt_prog_montagem = $linha["lib_dt_prog_montagem"];

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

/* MOTOR - POLIA - CARCAÇA - ROTOR DO MAXSIG */
$lib_materiais = $linha["lib_materiais"];
$lib_mat1 = $linha["lib_mat1"];
$lib_mat2 = $linha["lib_mat2"];
$lib_mat3 = $linha["lib_mat3"];
$lib_outros = $linha["lib_outros"];
$lib_obs_maxsig = $linha["lib_obs_maxsig"];

/* INSPEÇÃO */
$lib_insp = $linha["lib_insp"];
$lib_tipo_insp = $linha["lib_tipo_insp"];
$lib_cliente_insp = $linha["lib_cliente_insp"];
$lib_data_insp = $linha["lib_data_insp"];
$lib_liberar_insp = $linha["lib_liberar_insp"];
$lib_obs_insp = $linha["lib_obs_insp"];
/* INSPEÇÃO */

}

/* ----------------------- LIBERACAO PARA VER O CAMPO E ALTERAR ----------------------------------*/

/*------------------------- FILTRO LIBERACAO PARA ALTERAR O CAMPO ---------------------------*/

if ($lib_num_os == "ver"){$class_num_os="class=nedita_left"; $readonly_num_os="readonly"; $disabled_num_os="disabled";}

if ($lib_item == "ver"){$class_item="class=nedita_left"; $readonly_item="readonly"; $disabled_item="disabled";}
if ($lib_num_proposta == "ver"){$class_num_proposta="class=nedita_left"; $readonly_num_proposta="readonly"; $disabled_num_proposta="disabled";}
if ($lib_nome_cliente == "ver"){$class_nome_cliente="class=nedita_left"; $readonly_nome_cliente="readonly"; $disabled_nome_cliente="disabled";}
if ($lib_oc_obra == "ver"){$class_oc_obra="class=nedita_left"; $readonly_oc_obra="readonly"; $disabled_obra="disabled";}

if ($lib_mercado == "ver"){$class_mercado="class=nedita_left"; $readonly_mercado="readonly"; $disabled_mercado="disabled";}
if ($lib_representante == "ver"){$class_representante="class=nedita_left"; $readonly_representante="readonly"; $disabled_representante="disabled";}

if ($lib_estado == "ver"){$class_estado="class=nedita_left"; $readonly_estado="readonly"; $disabled_estado="disabled";}

if ($lib_data_entrega == "ver"){$class_data_entrega="class=nedita_left"; $readonly_data_entrega="readonly"; $disabled_data_entrega="disabled";}

if ($lib_local_venda == "ver"){$class_local_venda="class=nedita_left"; $readonly_local_venda="readonly"; $disabled_local_venda="disabled";}
if ($lib_fornecimento_motor == "ver"){$class_fornecimento_motor="class=nedita_left"; $readonly_fornecimento_motor="readonly"; $disabled_fornecimento_motor="disabled";}

if ($lib_descr_vent == "ver"){$class_descr_vent="class=nedita_left"; $readonly_descr_vent="readonly"; $disabled_descr_vent="disabled";}
if ($lib_modelo == "ver"){$class_modelo="class=nedita_left"; $readonly_modelo="readonly"; $disabled_modelo="disabled";}
if ($lib_tamanho == "ver"){$class_tamanho="class=nedita_left"; $readonly_tamanho="readonly"; $disabled_tamanho="disabled";}
if ($lib_largura_especial == "ver"){$class_largura_especial="class=nedita_left"; $readonly_largura_especial="readonly"; $disabled_largura_especial="disabled";}
if ($lib_arranjo == "ver"){$class_arranjo="class=nedita_left"; $readonly_arranjo="readonly"; $disabled_arranjo="disabled";}
if ($lib_classe == "ver"){$class_classe="class=nedita_left"; $readonly_classe="readonly"; $disabled_classe="disabled";}
if ($lib_rotacao == "ver"){$class_rotacao="class=nedita_left"; $readonly_rotacao="readonly"; $disabled_rotacao="disabled";}
if ($lib_gab == "ver"){$class_gab="class=nedita_left"; $readonly_gab="readonly"; $disabled_gab="disabled";}
if ($lib_qt == "ver"){$class_qt="class=nedita_left"; $readonly_qt="readonly"; $disabled_qt="disabled";}
if ($lib_valor_uni == "ver"){$class_valor_uni="class=nedita_left"; $readonly_valor_uni="readonly"; $disabled_valor_uni="disabled";}

if ($lib_pintura == "ver"){$class_pintura="class=nedita_left"; $readonly_pintura="readonly"; $disabled_pintura="disabled";}
if ($lib_construcao == "ver"){$class_construcao="class=nedita_left"; $readonly_construcao="readonly"; $disabled_construcao="disabled";}

if ($lib_carc_mot == "ver"){$class_carc_mot="class=nedita_left"; $readonly_carc_mot="readonly"; $disabled_carc_mot="disabled";}

if ($lib_obs == "ver"){$class_obs="class=nedita_left"; $readonly_obs="readonly"; $disabled_obs="disabled";}

if ($lib_data_motor_recebido == "ver"){$class_data_motor_recebido="class=nedita_left"; $readonly_data_motor_recebido="readonly"; $disabled_data_motor_recebido="disabled";}

if ($lib_reprogramacao == "ver"){$class_reprogramacao="class=nedita_left"; $readonly_reprogramacao="readonly"; $disabled_reprogramacao="disabled";}

if ($lib_baixa == "ver"){$class_baixa="class=nedita_left"; $readonly_baixa="readonly"; $disabled_baixa="disabled";}
if ($lib_data_baixa == "ver"){$class_data_baixa="class=nedita_left"; $readonly_data_baixa="readonly"; $disabled_data_baixa="disabled";}

if ($lib_data_prog_diaria == "ver"){$class_data_prog_diaria="class=nedita_left"; $readonly_data_prog_diaria="readonly"; $disabled_data_prog_diaria="disabled";}

/* DATA PREVISAO */
if ($lib_data_previsao == "ver"){$class_data_previsao="class=nedita_left"; $readonly_data_previsao="readonly"; $disabled_data_previsao="disabled";}

/* DATA PROG MONTAGEM */
if ($lib_dt_prog_montagem == "ver"){$class_dt_prog_montagem ="class=nedita_left"; $readonly_dt_prog_montagem ="readonly"; $disabled_dt_prog_montagem ="disabled";}

/* NUMERO CONSULTA CLIENTE */
if ($lib_n_cons_cliente == "ver"){$class_n_cons_cliente="class=nedita_left"; $readonly_n_cons_cliente="readonly"; $disabled_n_cons_cliente="disabled";}

/* JATEAMENTO / GALV. FOGO */

if ($lib_ts_jat_g_fogo == "ver"){$class_ts_jat_g_fogo="class=nedita_left"; $readonly_ts_jat_g_fogo="readonly"; $disabled_ts_jat_g_fogo="disabled";}

if ($lib_status_jat_g_fogo == "ver"){$class_status_jat_g_fogo="class=nedita_left"; $readonly_status_jat_g_fogo="readonly"; $disabled_status_jat_g_fogo="disabled";}

if ($lib_dt_status_jat_g_fogo == "ver"){$class_dt_status_jat_g_fogo="class=nedita_left"; $readonly_dt_status_jat_g_fogo="readonly"; $disabled_dt_status_jat_g_fogo="disabled";}


/* MATERIAIS */
if ($lib_mat1 == "ver"){$class_mat1="class=nedita_left"; $readonly_mat1="readonly"; $disabled_mat1="disabled";}
if ($lib_mat2 == "ver"){$class_mat2="class=nedita_left"; $readonly_mat2="readonly"; $disabled_mat2="disabled";}
if ($lib_mat3 == "ver"){$class_mat3="class=nedita_left"; $readonly_mat3="readonly"; $disabled_mat3="disabled";}
if ($lib_outros == "ver"){$class_outros="class=nedita_left"; $readonly_outros="readonly"; $disabled_outros="disabled";}

if ($lib_obs_maxsig == "ver"){$class_obs_maxsig="class=nedita_left"; $readonly_obs_maxsig="readonly"; $disabled_obs_maxsig="disabled";}

/*	SETOR PROJETOS */
if ($lib_proj == "ver"){$class_proj="class=nedita_left"; $readonly_proj="readonly"; $disabled_proj="disabled";}

/*	 DADOS PROJETOS */
if ($lib_dados_proj == "ver"){$class_dados_proj="class=nedita_left"; $readonly_dados_proj="readonly"; $disabled_dados_proj="disabled";}

/*	INSPEÇÃO */
if ($lib_tipo_insp == "ver"){$class_tipo_insp="class=nedita_left"; $readonly_tipo_insp="readonly"; $disabled_tipo_insp="disabled";}

if ($lib_cliente_insp == "ver"){$class_cliente_insp="class=nedita_left"; $readonly_cliente_insp="readonly"; $disabled_cliente_insp="disabled";}

if ($lib_data_insp == "ver"){$class_data_insp="class=nedita_left"; $readonly_data_insp="readonly"; $disabled_data_insp="disabled";}

if ($lib_obs_insp == "ver"){$class_obs_insp="class=nedita_left"; $readonly_obs_insp="readonly"; $disabled_obs_insp="disabled";}

if ($lib_liberar_insp == "ver"){$class_liberar_insp="class=nedita_left"; $readonly_liberar_insp="readonly"; $disabled_liberar_insp="disabled";}

/*------------------------- FILTRO LIBERACAO PARA ALTERAR O CAMPO ---------------------------*/


/* ----------------------- BUSCAR DADOS CONFORME ID	------------------------------------*/

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
$baixa = $dados["baixa"]; 
$data_baixa = $dados["data_baixa"]; 

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
$liberar_insp = $dados["liberar_insp"];
$obs_insp = $dados["obs_insp"];
}

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

/* DATA PREVISAO */
$dia_data_previsao = substr($data_previsao, -2); 
$mes_data_previsao = substr($data_previsao, -5,2);
$ano_data_previsao = substr($data_previsao, -10,4); 
if ($dia_data_previsao == "" AND $mes_data_previsao == "" AND $ano_data_previsao == "") 
{$data_previsao = ($dia_data_previsao."".$mes_data_previsao."".$ano_data_previsao);  } 
else {$data_previsao = ($dia_data_previsao."/".$mes_data_previsao."/".$ano_data_previsao);  }


/* DATA PROG MONTAGEM */
$dia_dt_prog_montagem = substr($dt_prog_montagem, -2); 
$mes_dt_prog_montagem = substr($dt_prog_montagem, -5,2);
$ano_dt_prog_montagem = substr($dt_prog_montagem, -10,4); 
if ($dia_dt_prog_montagem == "" AND $mes_dt_prog_montagem == "" AND $ano_dt_prog_montagem == "") 
{$dt_prog_montagem = ($dia_dt_prog_montagem."".$mes_dt_prog_montagem."".$ano_dt_prog_montagem);  } 
else {$dt_prog_montagem = ($dia_dt_prog_montagem."/".$mes_dt_prog_montagem."/".$ano_dt_prog_montagem);  }


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
{ 
$data_baixa = ($dia_data_baixa."".$mes_data_baixa."".$ano_data_baixa); } 
else
{
$data_baixa = ($dia_data_baixa."/".$mes_data_baixa."/".$ano_data_baixa); }


/*		SETOR PROJETOS		*/
$dia_proj_os_dt_prog = substr($proj_os_dt_prog, -2); 
$mes_proj_os_dt_prog = substr($proj_os_dt_prog, -5,2);
$ano_proj_os_dt_prog = substr($proj_os_dt_prog, -10,4); 
if ($dia_proj_os_dt_prog == "" AND $mes_proj_os_dt_prog == "" AND $ano_proj_os_dt_prog == "") 
{$proj_os_dt_prog = ($dia_proj_os_dt_prog."".$mes_proj_os_dt_prog."".$ano_proj_os_dt_prog); } 
else {$proj_os_dt_prog = ($dia_proj_os_dt_prog."/".$mes_proj_os_dt_prog."/".$ano_proj_os_dt_prog); }

$dia_proj_os_dt_saida = substr($proj_os_dt_saida, -2); 
$mes_proj_os_dt_saida = substr($proj_os_dt_saida, -5,2);
$ano_proj_os_dt_saida = substr($proj_os_dt_saida, -10,4); 
if ($dia_proj_os_dt_saida == "" AND $mes_proj_os_dt_saida == "" AND $ano_proj_os_dt_saida == "") 
{$proj_os_dt_saida = ($dia_proj_os_dt_saida."".$mes_proj_os_dt_saida."".$ano_proj_os_dt_saida); } 
else {$proj_os_dt_saida = ($dia_proj_os_dt_saida."/".$mes_proj_os_dt_saida."/".$ano_proj_os_dt_saida); }

/*		SETOR PROJETOS		*/

/* ----------------------- FIM CONVERTER DATAS	------------------------------------*/

?>

<form action="" method="post" name="pcp">



<? /* ----------------------- DADOS OCULTOS PARA FAZER A VERIFICACAO NA ALTERACAO------------------------------*/ ?>

<? /* ID  */ ?>
<input class=nedita_left readonly type=hidden name=id value="<?echo $id?>">
<? /*  USUARIO */ ?>
<input class=nedita_left readonly type=hidden name=usuario_alt value="<?echo $nome_usuario?>">
<? /* BAIXA */ ?>
<input class=nedita_left readonly type=hidden name=baixa value="<?echo $baixa?>">
<? /* LIB_ALTERAR */ ?>
<input class=nedita_left readonly type=hidden name=lib_alterar value="<?echo $lib_alterar?>">
<? /* DATA EMISSAO */ ?>
<input class=nedita_left readonly type=hidden name=data_emissao_novo value="<?echo $data_emissao?>">

<? /* REPRESENTANTE */ ?>
<input class=nedita_left readonly type=hidden name=representante_novo value="<?echo $representante?>">
<? /* ----------------------- DADOS OCULTOS PARA FAZER A VERIFICACAO NA ALTERACAO------------------------------*/ ?>



<table class=sem_borda width="750" align="center">
<td>


<? /*-------------------------- SETOR VENDAS -------------------------------  */ ?>
<? if ( $lib_vendas == "ver" OR $lib_vendas == "alt" OR $lib_vendas == "sim" ) { ?>


<? /*-------------------------- INICIO DADOS DO CLIENTE -------------------------------  */ ?>
<table class=sem_borda width=100% align="center">
<tr><td class=titulo height="25" align="center"> DADOS DO CLIENTE ( * = Dados Obrigatórios ) </td></tr></table>

<br>
<table class=sem_borda width=100% align="center">

<tr>


<? /* 	NUMERO OS 	*/  ?>
<? if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) { ?>
<td class=right width=25%> N° O.S* </td>
<td class=left> 
<input <?echo $class_num_os;?> <?echo $readonly_num_os;?> name=num_os_novo maxLength=5 size=6 value="<?echo $num_os?>" onFocus="nextfield ='item_novo';" onkeyup="saltaCampo(event,this,'money2','0')" onKeypress="return validaConteudo(event,this);">
</td>
<? } else { ?>
<input type=hidden name=num_os_novo value="<?echo $num_os?>" >
<? } ?>


<? /* 	ITEM	 */ ?>
<? if ( $lib_item == "ver" OR $lib_item == "alt" ) { ?>
<td class=right width=5%> Item* </td>
<td class=left>
<input <?echo $class_item;?> <?echo $readonly_item;?> name=item_novo maxLength=2 size=3 value="<?echo $item?>" onFocus="nextfield ='num_proposta_novo';" onkeyup="saltaCampo(event,this,'money2','0')" onKeypress="return validaConteudo(event,this);">
</td>
<? } else { ?>
<input type=hidden name=item_novo value="<?echo $item?>" >
<? } ?>


<td width=5%> &nbsp; </td>


<? /* 	NUMERO PROPOSTA	 */ ?>
<? if ( $lib_num_proposta == "ver" OR $lib_num_proposta == "alt" ) { ?>
<td class=right width=15%> N° Prop. </td>
<td class=left> 
<input <?echo $class_num_proposta;?> <?echo $readonly_num_proposta;?> name=num_proposta_novo maxLength=11 size=12 value="<?echo $num_proposta?>" onFocus="nextfield ='nome_cliente_novo';" onkeyup="saltaCampo(event,this,'money2','0');Texto_Maiuscula_Altera();">
</td>
<? } else { ?>
<input type=hidden name=num_proposta_novo value="<?echo $num_proposta?>" >
<? } ?>


<td width=5%> &nbsp; </td>


<? /* 	NOME CLIENTE	 */ ?>
<? if ( $lib_nome_cliente == "ver" OR $lib_nome_cliente == "alt" ) { ?>
<td class=right width=40%> Nome Cliente* </td>
<?
$buscacliente=mysql_query("select distinct nome_cliente from pcp order by 'nome_cliente'");
$totalcliente=mysql_num_rows($buscacliente);
$count=$totalcliente-1;
for($i=0;$i<$totalcliente;$i++) {$nomecliente=mysql_result($buscacliente,$i,"nome_cliente");$palavrascliente.="'$nomecliente'";
if($i<$count) { $palavrascliente.=","; }   }
?>
<td class=left>
<input <?echo $class_nome_cliente;?> <?echo $readonly_nome_cliente;?> name=nome_cliente_novo maxLength=30 size=31 value="<?echo $nome_cliente?>" onKeyUp="checkList(this,arvorecliente);Texto_Maiuscula_Altera();" id="textbox1"  onFocus="nextfield ='oc_obra_novo';">
</td>
<? } else { ?>
<input type=hidden name=nome_cliente_novo value="<?echo $nome_cliente?>" >
<? } ?>


<td width=8%> &nbsp; </td>


<? /* 	OC / OBRA	 */ ?>
<? if ( $lib_oc_obra == "ver" OR $lib_oc_obra == "alt" ) { ?>
<td class=right width=10%> OC/Obra </td>
<?
$buscaoc_obra = mysql_query("select distinct oc_obra from pcp order by 'oc_obra'");
$totaloc_obra = mysql_num_rows($buscaoc_obra); $count = $totaloc_obra-1;
for($i=0; $i<$totaloc_obra; $i++) { $nomeoc_obra = mysql_result($buscaoc_obra,$i,"oc_obra"); $palavrasoc_obra.="'$nomeoc_obra'";
if($i<$count) { $palavrasoc_obra.=","; } }
?>
<td class=left>
<input <?echo $class_oc_obra;?> <?echo $readonly_oc_obra;?> name=oc_obra_novo maxLength=30 size=31 value="<?echo $oc_obra?>"
onKeyUp="checkList(this,arvoreoc_obra);Texto_Maiuscula_Altera();" id="textbox2" onFocus="nextfield ='estado_novo';">
</td>
<? } else { ?>
<input type=hidden name=oc_obra_novo  value="<?echo $oc_obra?>">
<? } ?>


</tr>
</table>

<BR>

<table class=sem_borda width=100% align="center">

<tr>

<? /* 	ESTADO	 */ ?>
<? if ( $lib_estado == "ver" OR $lib_estado == "alt" ) { ?>
<td class=right> Estado* </td>
<?
$buscaestado = mysql_query("select distinct estado from pcp order by 'estado'");
$totalestado = mysql_num_rows($buscaestado); $count = $totalestado-1;
for($i=0; $i<$totalestado; $i++) { $nomeestado = mysql_result($buscaestado,$i,"estado"); $palavrasestado.="'$nomeestado'";
if($i<$count) { $palavrasestado.=","; } }
?>
<td class=left>
<input <?echo $class_estado;?> <?echo $readonly_estado;?> name=estado_novo maxLength=2 size=3 value="<?echo $estado ?>"
onKeyUp="checkList(this,arvoreestado);Texto_Maiuscula_Altera();" id="textbox4" onFocus="nextfield ='data_entrega_novo';">
</td>
<? } else { ?>
<input type=hidden name=estado_novo value="<?echo $estado?>">
<? } ?>


<td> &nbsp;</td>

<? /* 	DATA ENTREGA	 */ ?>
<? if ( $lib_data_entrega == "ver" OR $lib_data_entrega == "alt") { ?>
<td class=right> Data Entrega* </td>
<td class=left>
<input <?echo $class_data_entrega;?> <?echo $readonly_data_entrega;?> name=data_entrega_novo value="<?echo $data_entrega?>" size="11">
<? if ($lib_data_entrega == "alt" ){ ?>
<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pcp.data_entrega_novo);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a>

<? /* TIPO DE ALTERAÇÃ0 NA DT ENTREGA */ ?>
Altera: 
<INPUT TYPE="radio" NAME=tipo_data_entrega VALUE="item" checked <?echo $class_data_entrega;?> <?echo $readonly_data_entrega;?> <?echo $disabled_data_entrega;?> > Item
<INPUT TYPE="radio" NAME=tipo_data_entrega VALUE="os" <?echo $class_data_entrega;?> <?echo $readonly_data_entrega;?> <?echo $disabled_data_entrega?> > OS
<? } ?>
</td>
<? } else { ?>
<input type=hidden name=data_entrega value="<?echo $data_entrega?>">
<? } ?>


<td> &nbsp; </td>


<? /* 	LOCAL VENDA	 */ ?>
<? if ( $lib_local_venda == "ver" OR $lib_local_venda == "alt" ) { ?>
<td class=right> Local Venda* </td>
<td class=left>
<select <?echo $class_local_venda;?> <?echo $readonly_local_venda;?> <?echo $disabled_local_venda;?> name=local_venda_novo>
<option value='' <? echo ($local_venda==''?"SELECTED":""); ?> >  </option>
<option value='Matriz' <? echo ($local_venda=='Matriz'?"SELECTED":""); ?> > Matriz </option>
<option value='São Paulo' <? echo ($local_venda=='São Paulo'?"SELECTED":""); ?> > São Paulo </option>
</select>
</td>
<? } else { ?>
<input type=hidden name=local_venda_novo value="<?echo $local_venda?>">
<? } ?>


<td> &nbsp; </td>


<? /* 	FRONECIMENTO MOTOR	 */ ?>
<? if ( $lib_fornecimento_motor == "ver" OR $lib_fornecimento_motor == "alt" ) { ?>
<td class=right> Forn. Motor* </td>
<td class=left>
<select <?echo $class_fornecimento_motor;?> <?echo $readonly_fornecimento_motor;?> <?echo $disabled_fornecimento_motor;?> name=fornecimento_motor_novo>
<option value='' <? echo ($fornecimento_motor==''?"SELECTED":""); ?> >  </option>
<option value='C' <? echo ($fornecimento_motor=='C'?"SELECTED":""); ?> > Cliente </option>
<option value='P' <? echo ($fornecimento_motor=='P'?"SELECTED":""); ?> > Projelmec </option>
<option value='S' <? echo ($fornecimento_motor=='S'?"SELECTED":""); ?> > Sem Motor </option>
</select>
</td>
<? } else { ?>
<input type=hidden name=fornecimento_motor_novo value="<?echo $fornecimento_motor?>">
<? } ?>

</tr>
</table>
<? /*-------------------------- FIM DADOS DO CLIENTE -------------------------------  */?>

<BR>

<? /*-------------------------- INICIO DADOS DO VENTILADOR ----------------------------  */?>

<table class=sem_borda width=100% align="center">
<tr><td class=titulo height="25" align="center"> DADOS DO VENTILADOR </td></tr></table>

<BR>

<table class=sem_borda width=100% align="center">

<tr>

<? /* 	MERCADO	 */ ?>
<? if ( $lib_mercado == "ver" OR $lib_mercado == "alt") { ?>
<td class=left> Mercado* </td>
<td class=left>
<select <?echo $class_mercado;?> <?echo $readonly_mercado;?> <?echo $disabled_mercado;?> name=mercado_novo >
<option value='' <? echo ($mercado==''?"SELECTED":""); ?> >  </option>
<option value='Agrícola' <? echo ($mercado=='Agrícola'?"SELECTED":""); ?> > Agrícola </option>
<option value='Cerâmica' <? echo ($mercado=='Cerâmica'?"SELECTED":""); ?> > Cerâmica </option>
<option value='Conforto' <? echo ($mercado=='Conforto'?"SELECTED":""); ?> > Conforto </option>
<option value='HVAC' <? echo ($mercado=='HVAC'?"SELECTED":""); ?> > HVAC </option>
<option value='Industrial' <? echo ($mercado=='Industrial'?"SELECTED":""); ?> > Industrial </option>
</select>
</td>
<? } else { ?>
<input type=hidden name=mercado_novo value="<?echo $mercado?>">
<? } ?>

<td width=10%> &nbsp; </td>

<? /* REPRESENTANTE */ ?>
<? if ( $lib_representante == "ver" OR $lib_representante == "alt") { ?>
<td class=left> Representante </td>
<td class=left>
<select <?echo $class_representante;?> <?echo $readonly_representante;?> <?echo $disabled_representante;?> name=representante_novo >
<option value='' <? echo ($representante==''?"SELECTED":""); ?> >  </option>
<option value='ETICO' <? echo ($representante=='ETICO'?"SELECTED":""); ?> > ETICO </option>
<option value='GN' <? echo ($representante=='GN'?"SELECTED":""); ?> > GN </option>
<option value='IMR' <? echo ($representante=='IMR'?"SELECTED":""); ?> > IMR </option>
<option value='INTERMAX' <? echo ($representante=='INTERMAX'?"SELECTED":""); ?> > INTERMAX </option>
<option value='JPAF' <? echo ($representante=='JPAF'?"SELECTED":""); ?> > JPAF </option>
<option value='SLC' <? echo ($representante=='SLC'?"SELECTED":""); ?> > SLC </option>
<option value='TECNOPRED' <? echo ($representante=='TECNOPRED'?"SELECTED":""); ?> > TECNOPRED </option>
<option value='TR' <? echo ($representante=='TR'?"SELECTED":""); ?> > TR </option>
<option value='SLC' <? echo ($representante=='SLC'?"SELECTED":""); ?> > SLC </option>
<option value='ERONI - SC' <? echo ($representante=='ERONI - SC'?"SELECTED":""); ?> > ERONI - SC </option>
<option value='DUAL CLIMA' <? echo ($representante=='DUAL CLIMA'?"SELECTED":""); ?> > DUAL CLIMA </option>
<option value='ENGEAR' <? echo ($representante=='ENGEAR'?"SELECTED":""); ?> > ENGEAR </option>
<option value='PUÇA' <? echo ($representante=='PUÇA'?"SELECTED":""); ?> > PUÇA </option>
</select>
<? } else { ?>
<input type=hidden name=representante_novo value="<?echo $representante?>">
<? } ?>
</td>
<? /* REPRESENTANTE */ ?>


<? /* 	DESCRICAO VENT	 */ ?>
<? if ( $lib_descr_vent == "ver" OR $lib_descr_vent == "alt" ) { ?>
<td class=left width=8%> Descrição* </td>
<?
$buscadescr_vent = mysql_query("select distinct descr_vent from pcp order by 'descr_vent'");
$totaldescr_vent = mysql_num_rows($buscadescr_vent); $count = $totaldescr_vent-1;
for($i=0; $i<$totaldescr_vent; $i++) { $nomedescr_vent = mysql_result($buscadescr_vent,$i,"descr_vent"); $palavrasdescr_vent.="'$nomedescr_vent'";
if($i<$count) { $palavrasdescr_vent.=","; } }
?>
<td class=left>
<input <?echo $class_descr_vent;?> <?echo $readonly_descr_vent;?> name=descr_vent_novo maxLength=25 size=25 value="<?echo $descr_vent?>"
onKeyUp="checkList(this,arvoredescr_vent);Texto_Maiuscula_Altera();" id="textbox5" onFocus="nextfield ='modelo_novo';">
</td>
<? } else { ?>
<input type=hidden name=descr_vent_novo value="<?echo $descr_vent?>">
<? } ?>


<td width=10%> &nbsp; </td>


<? /* 	MODELO	 */ ?>
<? if ( $lib_modelo == "ver" OR $lib_modelo == "alt") { ?>
<td class=left width=5%> Modelo* </td>
<?
$buscamodelo = mysql_query("select distinct modelo from pcp order by 'modelo'");
$totalmodelo = mysql_num_rows($buscamodelo); $count = $totalmodelo-1;
for($i=0; $i<$totalmodelo; $i++) { $nomemodelo = mysql_result($buscamodelo,$i,"modelo"); $palavrasmodelo.="'$nomemodelo'";
if($i<$count) { $palavrasmodelo.=","; } }
?>
<td class=left>
<input <?echo $class_modelo;?> <?echo $readonly_modelo;?> name=modelo_novo maxLength=5 size=7 value="<?echo $modelo?>"
onKeyUp="checkList(this,arvoremodelo);Texto_Maiuscula_Altera();" id="textbox6" onFocus="nextfield ='tamanho_novo';">
</td>
<? } else { ?>
<input type=hidden name=modelo_novo value="<?echo $modelo?>">
<? } ?>


<td width=10%> &nbsp; </td>


<? /* 	TAMANHO	 */ ?>
<? if ( $lib_tamanho == "ver" OR $lib_tamanho == "alt" ) { ?>
<td class=left width=8%> Tamanho* </td>
<?
$buscatamanho = mysql_query("select distinct tamanho from pcp order by 'tamanho'");
$totaltamanho = mysql_num_rows($buscatamanho); $count = $totaltamanho-1;
for($i=0; $i<$totaltamanho; $i++) { $nometamanho = mysql_result($buscatamanho,$i,"tamanho"); $palavrastamanho.="'$nometamanho'";
if($i<$count) { $palavrastamanho.=","; } }
?>
<td class=left>
<input <?echo $class_tamanho;?> <?echo $readonly_tamanho;?> name=tamanho_novo maxLength=5 size=7 value="<?echo $tamanho?>" onKeyUp="checkList(this,arvoretamanho);Texto_Maiuscula_Altera();" id="textbox7" onFocus="nextfield ='largura_especial_novo';">
</td>
<? } else { ?>
<input type=hidden name=tamanho_novo value="<?echo $tamanho?>">
<? } ?>


</tr>
</table>

<BR>

<table class=sem_borda width=100% align="center">

<tr>

<? /* 	LE	 */ ?>
<? if ( $lib_largura_especial == "ver" OR $lib_largura_especial == "alt" ) { ?>
<td class=left width=2%> LE </td>
<?$buscalargura_especial = mysql_query("select distinct largura_especial from pcp order by 'largura_especial'");
$totallargura_especial = mysql_num_rows($buscalargura_especial); $count = $totallargura_especial-1;
for($i=0; $i<$totallargura_especial; $i++) { $nomelargura_especial = mysql_result($buscalargura_especial,$i,"largura_especial"); $palavraslargura_especial.="'$nomelargura_especial'";
if($i<$count) { $palavraslargura_especial.=","; } }
?>
<td class=left>
<input <?echo $class_largura_especial;?> <?echo $readonly_largura_especial;?> name=largura_especial_novo maxLength=5 size=7 value="<?echo $largura_especial?>" onKeyUp="checkList(this,arvorelargura_especial);" onchange="this.value = this.value.toUpperCase();" id="textbox95" onFocus="nextfield ='arranjo_novo';">
</td>
<? } else { ?>
<input type=hidden name=largura_especial_novo value="<?echo $largura_especial?>">
<? } ?>



</tr>
</table>

<BR>

<table class=sem_borda width=100% align="center">

<tr>

<? /* 	ARRANJO	 */ ?>
<? if ( $lib_arranjo == "ver" OR $lib_arranjo == "alt" ) { ?>
<td class=right width=5%> Arranjo </td>
<?
$buscaarranjo = mysql_query("select distinct arranjo from pcp order by 'arranjo'");
$totalarranjo = mysql_num_rows($buscaarranjo); $count = $totalarranjo-1;
for($i=0; $i<$totalarranjo; $i++) { $nomearranjo = mysql_result($buscaarranjo,$i,"arranjo"); $palavrasarranjo.="'$nomearranjo'";
if($i<$count) { $palavrasarranjo.=","; } }
?>
<td class=left>
<input <?echo $class_arranjo;?> <?echo $readonly_arranjo;?> name=arranjo_novo maxLength=2 size=3 value="<?echo $arranjo?>" onKeyUp="checkList(this,arvorearranjo);Texto_Maiuscula_Altera();" id="textbox8" onFocus="nextfield ='classe_novo';" >
</td>
<? } else { ?>
<input type=hidden name=arranjo_novo value="<?echo $arranjo?>">
<? } ?>


<td width=5%> &nbsp; </td>


<? /* 	CLASSE	 */ ?>
<? if ( $lib_classe == "ver" OR $lib_classe == "alt" ) { ?>
<td class=right width=5%> Classe </td>
<?
$buscaclasse = mysql_query("select distinct classe from pcp order by 'classe'");
$totalclasse = mysql_num_rows($buscaclasse); $count = $totalclasse-1;
for($i=0; $i<$totalclasse; $i++) { $nomeclasse = mysql_result($buscaclasse,$i,"classe"); $palavrasclasse.="'$nomeclasse'";
if($i<$count) { $palavrasclasse.=","; } }
?>
<td class=left>
<select <?echo $class_classe;?> <?echo $readonly_classe;?> <?echo $disabled_classe;?> name=classe_novo> 
<option value='' <? echo ($classe==''?"SELECTED":""); ?> >  </option>
<option value='I' <? echo ($classe=='I'?"SELECTED":""); ?> > I </option>
<option value='II' <? echo ($classe=='II'?"SELECTED":""); ?> > II </option>
<option value='III' <? echo ($classe=='III'?"SELECTED":""); ?> > III </option>
<option value='IV' <? echo ($classe=='IV'?"SELECTED":""); ?> > IV </option>
<option value='SP' <? echo ($classe=='SP'?"SELECTED":""); ?> > SP </option>
<option value='B' <? echo ($classe=='B'?"SELECTED":""); ?> > B </option>
<option value='P' <? echo ($classe=='P'?"SELECTED":""); ?> > P </option>
<option value='Q' <? echo ($classe=='Q'?"SELECTED":""); ?> > Q </option>
</select>
</td>
<? } else { ?>
<input type=hidden name=classe_novo value="<?echo $classe?>">
<? } ?>


<td width=5%> &nbsp; </td>


<? /* 	ROTACAO	 */ ?>
<? if ( $lib_rotacao == "ver" OR $lib_rotacao == "alt" ) { ?>
<td class=right width=28%> Sentido Giro/Fluxo </td>
<td class=left>
<select <?echo $class_rotacao;?> <?echo $readonly_rotacao;?> <?echo $disabled_rotacao;?> name=rotacao_novo>
<option value='' <? echo ($rotacao==''?"SELECTED":""); ?> >  </option>
<option value='AH' <? echo ($rotacao=='AH'?"SELECTED":""); ?> > A-H </option>
<option value='HA' <? echo ($rotacao=='HA'?"SELECTED":""); ?> > H-A </option>
<option value='R' <? echo ($rotacao=='R'?"SELECTED":""); ?> > R </option>
<option value='CR' <? echo ($rotacao=='CR'?"SELECTED":""); ?> > CR </option>
</select>
</td>
<? } else { ?>
<input type=hidden name=rotacao_novo value="<?echo $rotacao?>">
<? } ?>


<td width=5%> &nbsp; </td>

<? /* 	posicao motor	 */ ?>
<? if ( $lib_pos_motor == "ver" OR $lib_pos_motor == "alt" ) { ?>
<td class=left_sem_borda width=11%> Posição Motor </td>
<?
$buscapos_motor = mysql_query("select distinct pos_motor from pcp order by 'pos_motor'");
$totalpos_motor = mysql_num_rows($buscapos_motor); $count = $totalpos_motor-1;
for($i=0; $i<$totalpos_motor; $i++) { $nomepos_motor = mysql_result($buscapos_motor,$i,"pos_motor"); $palavraspos_motor.="'$nomepos_motor'";
if($i<$count) { $palavraspos_motor.=","; } }
?>
<td class=left_sem_borda>
<input <?echo $class_pos_motor;?> <?echo $readonly_pos_motor;?> name=pos_motor_novo maxLength=13 size=14 value="<?echo $pos_motor?>"
onKeyUp="checkList(this,arvorepos_motor);Texto_Maiuscula_Altera();" id="textbox13" onFocus="nextfield ='gab_novo';">
</td>
<? } else { ?>
<input type=hidden name=pos_motor_novo value="<?echo $pos_motor?>">
<? } ?>


<td width=5%> &nbsp; </td>


<? /* 	GABINETE	 */ ?>
<? if ( $lib_gab == "ver" OR $lib_gab == "alt" ) { ?>
<td class=right width=5%> Gabinete </td>
<td class=left>
<select <?echo $class_gab;?> <?echo $readonly_gab;?> <?echo $disabled_gab;?> name=gab_novo>
<option value='' <? echo ($gab==''?"SELECTED":""); ?> >  </option>
<option value='-' <? echo ($gab=='-'?"SELECTED":""); ?> > --- </option>
<option value='I' <? echo ($gab=='I'?"SELECTED":""); ?> > Incluso </option>
</select>
</td>
<? } else { ?>
<input type=hidden name=gab_novo value="<?echo $gab?>">
<? } ?>


<td width=5%> &nbsp; </td>


<? /* 	QT	 */ ?>
<? if ( $lib_qt == "ver" OR $lib_qt == "alt" ) { ?>
<td class=right width=3%> Qtde* </td>
<td class=left>
<input <?echo $class_qt;?> <?echo $readonly_qt;?> name=qt_novo maxLength=3 size=4 onKeypress="return validaConteudo(event,this,'money2');" onkeyup="saltaCampo(event,this,'money2','0')" onFocus="nextfield ='valor_uni_novo';" value=<? echo $qt;?> >
</td>
<? } else { ?>
<input type=hidden name=qt_novo value="<?echo $qt?>">
<? } ?>


<td width=5%> &nbsp; </td>


<? /* 	VALOR UNITARIO	 */ ?>
<? if ( $lib_valor_uni == "ver" OR $lib_valor_uni == "alt" ) { ?>
<td class=right width=20%> Valor Unitário* </td>
<td class=left>
<input <?echo $class_valor_uni;?> <?echo $readonly_valor_uni;?> name=valor_uni_novo maxLength=8 size=11 onKeypress="return validaConteudo(event,this,'money2');" onBlur="formatCamp(this,'money2');" onkeyup="saltaCampo(event,this,'money2','0')" onFocus="return removeCaracs(this,'money2');" value=<? echo $valor_uni; ?> >
</td>
<? } else { ?>
<input type=hidden name=valor_uni_novo value="<?echo $valor_uni?>">
<? } ?>

</tr>
</table>

<BR>

<table class=sem_borda width=100% align="center">

<tr>

<? /* 	tag	 */ ?>
<? if ( $lib_tag == "ver" OR $lib_tag == "alt" ) { ?>
<td class=left_sem_borda width=5%> TAG </td>
<td class=left_sem_borda>
<input <?echo $class_tag;?> <?echo $readonly_tag;?> name=tag_novo maxLength=15 size=16 value="<?echo $tag?>"
onKeyUp="Texto_Maiuscula_Altera();" onFocus="nextfield ='pintura_novo';">
</td>
<? } else { ?>
<input type=hidden name=tag_novo value="<?echo $tag?>">
<? } ?>


<? /* 	PINTURA	 */ ?>
<? if ( $lib_pintura == "ver" OR $lib_pintura == "alt" ) { ?>
<td class=rigth_sem_borda width=6%> Pintura </td>
<?
$buscapintura = mysql_query("select distinct pintura from pcp order by 'pintura'");
$totalpintura = mysql_num_rows($buscapintura); $count = $totalpintura-1;
for($i=0; $i<$totalpintura; $i++) { $nomepintura = mysql_result($buscapintura,$i,"pintura"); $palavraspintura.="'$nomepintura'";
if($i<$count) { $palavraspintura.=","; } }
?>
<td class=left_sem_borda>
<input <?echo $class_pintura;?> <?echo $readonly_pintura;?> name=pintura_novo maxLength=15 size=16 value="<?echo $pintura?>"
onKeyUp="checkList(this,arvorepintura);Texto_Maiuscula_Altera();" id="textbox11" onFocus="nextfield ='construcao_novo';">

<? /* TIPO DE ALTERAÇÃ0 NA PINTURA */ ?>
Altera: 
<INPUT TYPE="radio" NAME=tipo_pintura VALUE="item" checked <?echo $class_pintura;?> <?echo $readonly_pintura;?> <?echo $disabled_pintura;?> > Item
<INPUT TYPE="radio" NAME=tipo_pintura VALUE="os" <?echo $class_pintura;?> <?echo $readonly_pintura;?> <?echo $disabled_pintura?> > OS

</td>
<? } else { ?>
<input type=hidden name=pintura_novo value="<?echo $pintura?>">
<? } ?>



<? /* 	CONSTRUCAO	 */ ?>
<? if ( $lib_construcao == "ver" OR $lib_construcao == "alt" ) { ?>
<td class=rigth_sem_borda width=5%> Construção </td>
<td class=left_sem_borda>
<select <?echo $class_construcao;?> <?echo $readonly_construcao;?> <?echo $disabled_construcao;?> name=construcao_novo onKeyUp="checkList(this,arvoreconstrucao);" onFocus="nextfield ='obs_novo';">
<option value='' <? echo ($construcao==''?"SELECTED":""); ?> >  </option>
<option value='CP' <? echo ($construcao=='CP'?"SELECTED":""); ?> > Chapa Preta </option>
<option value='AL' <? echo ($construcao=='AL'?"SELECTED":""); ?> > Alumínio </option>
<option value='PP' <? echo ($construcao=='PP'?"SELECTED":""); ?> > Polipropileno </option>
<option value='GF' <? echo ($construcao=='GF'?"SELECTED":""); ?> > Galv. Fogo </option>
<option value='CG' <? echo ($construcao=='CG'?"SELECTED":""); ?> > Chapa Galvanizada </option>
<option value='IN' <? echo ($construcao=='IN'?"SELECTED":""); ?> > Inox </option>
</select>

<? /* TIPO DE ALTERAÇÃ0 NA CONSTRUCAO */ ?>
Altera: 
<INPUT TYPE="radio" NAME=tipo_construcao VALUE="item" checked <?echo $class_construcao;?> <?echo $readonly_construcao;?> <?echo $disabled_construcao;?> > Item
<INPUT TYPE="radio" NAME=tipo_construcao VALUE="os" <?echo $class_construcao;?> <?echo $readonly_construcao;?> <?echo $disabled_construcao?> > OS

</td>
<? } else { ?>
<input type=hidden name=construcao_novo value="<?echo $construcao?>">
<? } ?>

</tr>
</table>

<br>

<table class=sem_borda width=100% align="center">
<tr>

<? /* 	CARC MOT	 */ ?>
<? if ( $lib_carc_mot == "ver" OR $lib_carc_mot == "alt" ) { ?>

<?
$buscacarc_mot = mysql_query("select distinct carc_mot from pcp order by 'carc_mot'");
$totalcarc_mot = mysql_num_rows($buscacarc_mot); $count = $totalcarc_mot-1;
for($i=0; $i<$totalcarc_mot; $i++) { $nomecarc_mot = mysql_result($buscacarc_mot,$i,"carc_mot"); $palavrascarc_mot.="'$nomecarc_mot'";
if($i<$count) { $palavrascarc_mot.=","; } }
?>
<td class=center> Carc. Mot
<input <?echo $class_carc_mot;?> <?echo $readonly_carc_mot;?> name=carc_mot_novo maxLength=12 size=10 value="<?echo $carc_mot?>" onKeyUp="checkList(this,arvorearranjo);Texto_Maiuscula_Altera();" id="textbox8" onFocus="nextfield ='classe_novo';" onchange="this.value = this.value.toUpperCase();">


<? /* TIPO DE ALTERAÇÃ0 NA PINTURA */ ?>
Altera: 
<INPUT TYPE="radio" NAME=tipo_carc_mot VALUE="item" checked <?echo $class_carc_mot;?> <?echo $readonly_carc_mot;?> <?echo $disabled_carc_mot;?> > Item
<INPUT TYPE="radio" NAME=tipo_carc_mot VALUE="os" <?echo $class_carc_mot;?> <?echo $readonly_carc_mot;?> <?echo $disabled_carc_mot?> > OS
</td>

<? } else { ?>
<input type=hidden name=carc_mot_novo value="<?echo $carc_mot?>">
<? } ?>

</tr>
</table>


<BR>


<table class=sem_borda width=100% align="center">

<tr>

<? /* 	OBS	 */ ?>
<? if ( $lib_obs == "ver" OR $lib_obs == "alt" ) { ?>
<td class=left> Obs </td>
<?
$buscaobs = mysql_query("select distinct obs from pcp order by 'obs'");
$totalobs = mysql_num_rows($buscaobs); $count = $totalobs-1;
for($i=0; $i<$totalobs; $i++) { $nomeobs = mysql_result($buscaobs,$i,"obs"); $palavrasobs.="'$nomeobs'";
if($i<$count) { $palavrasobs.=","; } }
?>
<td class=left>
<textarea <?echo $class_obs;?> <?echo $readonly_obs;?> name=obs_novo rows=2 cols=87 id="textbox10"><? echo $obs; ?></textarea>
</td>
<? } else { ?>
<input type=hidden name=obs_novo value="<?echo $obs?>">
<? } ?>

</tr>
</table>
<? /*-------------------------- FIM DADOS DO VENTILADOR -------------------------------  */?>

<? } ?>
<? /*-------------------------- SETOR VENDAS -------------------------------  */ ?>

<BR>

<? /*-------------------------- INICIO DADOS DO PCP -------------------------------  */?>
<? if ( $lib_pcp == "ver" OR $lib_pcp == "alt" OR $lib_pcp == "sim" ) { ?>

<table class=sem_borda width=100% align="center">
<tr><td class=titulo height="25" align="center"> DADOS DO PCP </td></tr></table>
<BR>


<table class=sem_borda width=100% align="center">

<tr>

<td width=3%> &nbsp; </td>


<? /* 	REPROGRAMACAO	 */ ?>
<? if ( $lib_reprogramacao == "ver" OR $lib_reprogramacao == "alt" ) { ?>
<td class=left width=6%> Reprog. </td>
<td class=left>
<input <?echo $class_reprogramacao;?> <?echo $readonly_reprogramacao;?> name=reprogramacao_novo value="<?echo $reprogramacao?>" size="11">
<? if ( $lib_reprogramacao == "alt" ) { ?>
<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pcp.reprogramacao_novo);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a>

<? /* TIPO DE ALTERAÇÃ0 NA REPROGRAMAÇÃO */ ?>
Altera: 
<INPUT TYPE="radio" NAME=tipo_reprogramacao VALUE="item" checked <?echo $class_reprogramacao;?> <?echo $readonly_reprogramacao;?> <?echo $disabled_reprogramacao;?> > Item
<INPUT TYPE="radio" NAME=tipo_reprogramacao VALUE="os" <?echo $class_reprogramacao;?> <?echo $readonly_reprogramacao;?> <?echo $disabled_reprogramacao;?> > OS

</td>
<? } } else { ?>
<input type=hidden name=reprogramacao_novo value="<?echo $reprogramacao?>">
<? } ?>
 
 
<td width=3%> &nbsp; </td>

<? if ( $tipo_insp != "" AND $liberar_insp == "S" OR $tipo_insp == "" ) { ?>


<? /* 	BAIXA	 */  ?>
<? /* 	------ USUARIOS LIBERADOS PARA QUALQUER BAIXAR --------- */  ?>
<? if ( $lib_baixa == "ver" OR $lib_baixa == "alt" OR $lib_baixa == "e" ) { 
	if ( $lib_baixa_tipo == "alt" OR $lib_baixa_tipo == "todos" ) {  ?>
<td class=left width=5%> Baixa </td>
<td class=left>
<select <?echo $class_baixa;?> <?echo $readonly_baixa;?> <?echo $disabled_baixa;?> name=baixa_novo OnChange="Baixa()">
<option value='P' <? echo ($baixa=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($baixa=='E'?"SELECTED":""); ?> > E </option>
<option value='S' <? echo ($baixa=='S'?"SELECTED":""); ?> > S </option>
<option value='C' <? echo ($baixa=='C'?"SELECTED":""); ?> > C </option>
</select>
<? }

/* ------ USUARIOS LIBERADOS PARA SOMENTE PROCESSO DE EXPEDIÇÃO --------- 

lib_baixa no banco tera q estar com o letra "e" para o usuario só dar baixa......

*/
elseif ( $lib_baixa == "e" AND $lib_baixa_tipo == "e" ) {
	if ( $baixa == "E" OR $baixa == "e" ) { 
		$check_baixa = "checked"; $class_baixa="class=nedita_left"; $readonly_baixa="readonly"; $disabled_baixa="disabled"; }  ?>
<td class=left width=5%> Baixa </td>
<td class=left>
<input type="checkbox" name=baixa_novo <?echo $class_baixa;?> <?echo $readonly_baixa;?> <?echo $disabled_baixa;?> <?echo $check_baixa;?> value="checked"> 
</td>
</td>
<? } 

/*  -------- USUARIOS LIBERADOS PARA SOMENTE VISUALIZAÇÃO ----------- */

elseif ( $lib_baixa == "ver" ) {   
	if ( $baixa == "E" OR $baixa == "e" ) { $check_baixa = "checked"; }
?>
<td class=left width=5%> Baixa </td>
<td class=left>
<input type="checkbox" name=baixa_novo <?echo $class_baixa;?> <?echo $readonly_baixa;?> <?echo $check_baixa;?> <?echo $disabled_baixa;?> >
</td>
<? 
} 
elseif ( $lib_baixa == "n_ver" ) {
?>

<?  /*  -------- ESSA PARTE SOMENTE COLOCAR VALOR NA VARIAVEL ----------- */ ?>
<input type=hidden name=baixa_novo value="<?echo $baixa?>">

<? } } ?>


<? /* 	DATA BAIXA	 */  ?>
<? if ( $lib_data_baixa == "ver" OR $lib_data_baixa == "alt" ) { ?>
<td class=left width=5%> Data Baixa </td>
<td class=left>

<? if ( $lib_baixa == "e" OR $lib_baixa_tipo == "e" ) { 
	if ($dia_data_baixa == "" AND $mes_data_baixa == "" AND $ano_data_baixa == "") { 
	$dia_baixa = date('d');  $mes_baixa = date('n');  $ano_baixa = date('Y'); 
	if(strlen($dia_baixa) == 1){$dia_baixa = "0".$dia_baixa;};
  	if(strlen($mes_baixa) == 1){$mes_baixa = "0".$mes_baixa;};
	$data_baixa = ($dia_baixa."/".$mes_baixa."/".$ano_baixa); }
?>
<input name=data_baixa_novo value="<?echo $data_baixa?>" size="11" <?echo $class_data_baixa;?> <?echo $readonly_data_baixa;?> >
<? } else { ?>
<input name=data_baixa_novo value="<?echo $data_baixa?>" size="11" <?echo $class_data_baixa;?> <?echo $readonly_data_baixa;?> >
<? } ?>

<? /* COLOCAR ICONE DA DATA P/ ESCOLHER A DATA DA BAIXA */ ?>
<? if ( $lib_data_baixa == "alt" ) { ?>
<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pcp.data_baixa_novo);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a>
<? } ?>

<? /* TIPO DE ALTERAÇÃ0 NA BAIXA */ ?>
<? if ( $lib_data_baixa == "alt" OR $lib_baixa_tipo == "e" ) { ?>
Altera: 
<INPUT TYPE="radio" NAME="tipo_baixa" VALUE="item" checked  <?echo $class_baixa;?> <?echo $readonly_baixa;?> <?echo $disabled_baixa;?> > Item
<INPUT TYPE="radio" NAME="tipo_baixa" VALUE="os"  <?echo $class_baixa;?> <?echo $readonly_baixa;?> <?echo $disabled_baixa;?> > OS
</td>

<? } }  else { ?>
<input type=hidden name=data_baixa_novo value="<?echo $data_baixa?>">
<? } ?>
</tr>
</table>
<? } else { ?>
<input type=hidden name=baixa_novo value="<?echo $baixa_novo?>">
<input type=hidden name=data_baixa_novo value="<?echo $data_baixa?>">	
<? } ?>

<? } ?>



<table class=sem_borda width=100% align="center">

<?/* MOSTRAR NUMERO CONSULTA CLIENTE */?>
<? if ( $lib_n_cons_cliente == "ver" OR $lib_n_cons_cliente == "alt" ) { ?>
<br>
<td class=left width=15%> Nº Cons. Cliente</td>
<td class=left>
<select <?echo $class_n_cons_cliente;?> <?echo $readonly_n_cons_cliente;?> <?echo $disabled_n_cons_cliente;?> name=n_cons_cliente_novo>
<option value='' <? echo ($n_cons_cliente==''?"SELECTED":""); ?> >  </option>
<option value='1' <? echo ($n_cons_cliente=='1'?"SELECTED":""); ?> > 1 </option>
<option value='2' <? echo ($n_cons_cliente=='2'?"SELECTED":""); ?> > 2 </option>
<option value='3' <? echo ($n_cons_cliente=='3'?"SELECTED":""); ?> > 3 </option>
<option value='4' <? echo ($n_cons_cliente=='4'?"SELECTED":""); ?> > 4 </option>
<option value='5' <? echo ($n_cons_cliente=='5'?"SELECTED":""); ?> > 5 </option>
</select>

<? /* TIPO DE ALTERAÇÃ0 NA DATA PROG. DIARIA */ ?>
 Altera: 
<INPUT TYPE="radio" NAME="tipo_n_cons_cliente" VALUE="item" checked <?echo $class_n_cons_cliente;?> <?echo $readonly_n_cons_cliente;?> <?echo $disabled_n_cons_cliente;?> > Item

<INPUT TYPE="radio" NAME="tipo_n_cons_cliente" VALUE="os" <?echo $class_n_cons_cliente;?> <?echo $readonly_n_cons_cliente;?> <?echo $disabled_n_cons_cliente;?> > OS
</td>
<? } ?>
<?/* MOSTRAR NUMERO CONSULTA CLIENTE */?>
</table>
<br>

<?/* -*----JATEAMENTO / GALV. FOGO --*-----*/?>
<? if ( $lib_jat_g_fogo == "ver" OR $lib_jat_g_fogo == "alt" OR $lib_jat_g_fogo == "sim" ) { ?>

<table class=sem_borda width=100% align="center">
<tr><td class=titulo height="25" align="center"> DADOS DO JATEAMENTO E GALV. FOGO </td></tr></table>
<BR>

<table class=sem_borda width=100% align="center">
<tr>

<? /* 	TIPO SERVIÇO DO JAT. GALV. FOGO	 */ ?>
<? if ( $lib_ts_jat_g_fogo == "ver" OR $lib_ts_jat_g_fogo == "alt") { ?>
<td class=left width=0%> TS </td>
<td class=left>
<select <?echo $class_ts_jat_g_fogo;?> <?echo $readonly_ts_jat_g_fogo;?> <?echo $disabled_ts_jat_g_fogo;?> name=ts_jat_g_fogo_novo >
<option value='' <? echo ($ts_jat_g_fogo==''?"SELECTED":""); ?> >  </option>
<option value='J' <? echo ($ts_jat_g_fogo=='J'?"SELECTED":""); ?> > J </option>
<option value='GF' <? echo ($ts_jat_g_fogo=='GF'?"SELECTED":""); ?> > GF </option>
</select>
<? /* TIPO DE ALTERAÇÃ0 */ ?>
 Altera: 
<INPUT TYPE="radio" NAME="tipo_ts_jat_g_fogo" VALUE="item" checked <?echo $class_ts_jat_g_fogo;?> <?echo $readonly_ts_jat_g_fogo;?> <?echo $disabled_ts_jat_g_fogo;?> > Item

<INPUT TYPE="radio" NAME="tipo_ts_jat_g_fogo" VALUE="os" <?echo $class_ts_jat_g_fogo;?> <?echo $readonly_ts_jat_g_fogo;?> <?echo $disabled_ts_jat_g_fogo;?> > OS
</td>
<? } else { ?>
<input type=hidden name=ts_jat_g_fogo_novo value="<?echo $ts_jat_g_fogo?>">
<? } ?>

<? /* 	STATUS	 */  ?>
<? /* 	------ USUARIOS LIBERADOS PARA QUALQUER BAIXAR --------- */  ?>
<? if ( $lib_status_jat_g_fogo == "ver" OR $lib_status_jat_g_fogo == "alt" OR $lib_status_jat_g_fogo == "e" ) { 
	if ( $lib_status_tipo_jat_g_fogo == "alt" OR $lib_status_tipo_jat_g_fogo == "todos" ) {  ?>
<td class=left width=5%> Status </td>
<td class=left>
<select <?echo $class_status_jat_g_fogo;?> <?echo $readonly_status_jat_g_fogo;?> <?echo $disabled_status_jat_g_fogo;?> name=status_jat_g_fogo_novo OnChange="Status_Jat_Galv()">
<option value='' <? echo ($status_jat_g_fogo==''?"SELECTED":""); ?> >  </option>
<option value='E' <? echo ($status_jat_g_fogo=='E'?"SELECTED":""); ?> > E </option>
<option value='A' <? echo ($status_jat_g_fogo=='A'?"SELECTED":""); ?> > A </option>
<option value='EP' <? echo ($status_jat_g_fogo=='EP'?"SELECTED":""); ?> > EP </option>
<option value='AP' <? echo ($status_jat_g_fogo=='AP'?"SELECTED":""); ?> > AP </option>
<option value='-' <? echo ($status_jat_g_fogo=='-'?"SELECTED":""); ?> > - </option>
</select>
<? }

/* ------ USUARIOS LIBERADOS PARA SOMENTE PROCESSO DE EXPEDIÇÃO --------- 

lib_STATUS_JAT_G_FOGO no banco tera q estar com o letra "e" para o usuario só dar baixa......

*/
elseif ( $lib_status_jat_g_fogo == "e" AND $lib_status_tipo_jat_g_fogo == "e" ) {
	if ( $status_jat_g_fogo == "")  ?>
<td class=left width=5%> Status </td>
<td class=left>
<select <?echo $class_status_jat_g_fogo;?> <?echo $readonly_status_jat_g_fogo;?> <?echo $disabled_status_jat_g_fogo;?> name=status_jat_g_fogo_novo OnChange="">
<option value='' <? echo ($status_jat_g_fogo==''?"SELECTED":""); ?> >  </option>
<option value='E' <? echo ($status_jat_g_fogo=='E'?"SELECTED":""); ?> > E </option>
<option value='A' <? echo ($status_jat_g_fogo=='A'?"SELECTED":""); ?> > A </option>
<option value='EP' <? echo ($status_jat_g_fogo=='EP'?"SELECTED":""); ?> > EP </option>
<option value='AP' <? echo ($status_jat_g_fogo=='AP'?"SELECTED":""); ?> > AP </option>
<option value='-' <? echo ($status_jat_g_fogo=='-'?"SELECTED":""); ?> > - </option>
</select> 
</td>
</td>
<? } 

/*  -------- USUARIOS LIBERADOS PARA SOMENTE VISUALIZAÇÃO ----------- */

elseif ( $lib_status_jat_g_fogo == "ver" ) {   
	if ( $status_jat_g_fogo == "A" OR $status_jat_g_fogo == "a" ) { $check_status_jat_g_fogo = "checked"; }
?>
<td class=left width=5%> Status </td>
<td class=left>
<input type="checkbox" name=status_jat_g_fogo_novo <?echo $class_status_jat_g_fogo;?> <?echo $readonly_status_jat_g_fogo;?> <?echo $check_status_jat_g_fogo;?> <?echo $disabled_status_jat_g_fogo;?> >
</td>
<? 
} 
elseif ( $lib_status_jat_g_fogo == "n_ver" ) {
?>

<?  /*  -------- ESSA PARTE SOMENTE COLOCAR VALOR NA VARIAVEL ----------- */ ?>
<input type=hidden name=status_jat_g_fogo_novo value="<?echo $status_jat_g_fogo?>">

<? } } ?>


<? /* 	DATA STATUS	 */  ?>
<? if ( $lib_dt_status_jat_g_fogo == "ver" OR $lib_dt_status_jat_g_fogo == "alt" ) { ?>
<td class=left width=10%> Data Status </td>
<td class=left>

<? if ( $lib_status_jat_g_fogo == "e" OR $lib_status_tipo_jat_g_fogo == "e" ) { 
	if ($dia_dt_status_jat_g_fogo == "" AND $mes_dt_status_jat_g_fogo == "" AND $ano_dt_status_jat_g_fogo == "") { 
	$dia_dt_status_jat_g_fogo = date('d');  $mes_dt_status_jat_g_fogo = date('n');  $ano_dt_status_jat_g_fogo = date('Y'); 
	if(strlen($dia_dt_status_jat_g_fogo) == 1){$dia_dt_status_jat_g_fogo = "0".$dia_dt_status_jat_g_fogo;};
  	if(strlen($mes_dt_status_jat_g_fogo) == 1){$mes_dt_status_jat_g_fogo = "0".$mes_dt_status_jat_g_fogo;};
	$dt_status_jat_g_fogo = ($dia_dt_status_jat_g_fogo."/".$mes_dt_status_jat_g_fogo."/".$ano_dt_status_jat_g_fogo); }
?>
<input name=dt_status_jat_g_fogo_novo value="<?echo $dt_status_jat_g_fogo?>" size="11" <?echo $class_dt_status_jat_g_fogo;?> <?echo $readonly_dt_status_jat_g_fogo;?> >
<? } else { ?>
<input name=dt_status_jat_g_fogo_novo value="<?echo $dt_status_jat_g_fogo?>" size="11" <?echo $class_dt_status_jat_g_fogo;?> <?echo $readonly_dt_status_jat_g_fogo;?> >
<? } ?>

<? /* COLOCAR ICONE DA DATA P/ ESCOLHER A DATA DA BAIXA */ ?>
<? if ( $lib_dt_status_jat_g_fogo == "alt" ) { ?>
<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pcp.dt_status_jat_g_fogo_novo);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a>
<? } ?>

<? /* TIPO DE ALTERAÇÃ0 NA BAIXA */ ?>
<? if ( $lib_dt_status_jat_g_fogo == "alt" OR $lib_status_tipo_jat_g_fogo == "e" ) { ?>
Altera: 
<INPUT TYPE="radio" NAME="tipo_status_jat_g_fogo" VALUE="item" checked  <?echo $class_status_jat_g_fogo;?> <?echo $readonly_status_jat_g_fogo;?> <?echo $disabled_status_jat_g_fogo;?> > Item
<INPUT TYPE="radio" NAME="tipo_status_jat_g_fogo" VALUE="os"  <?echo $class_status_jat_g_fogo;?> <?echo $readonly_status_jat_g_fogo;?> <?echo $disabled_status_jat_g_fogo;?> > OS
</td>

<? } }  else { ?>
<input type=hidden name=dt_status_jat_g_fogo_novo value="<?echo $dt_status_jat_g_fogo?>">
<? } ?>

</tr></table>
<? } ?>
<table class=sem_borda width=70% align="center">
<? if ( $lib_jat_g_fogo == "ver" OR $lib_jat_g_fogo == "alt" ) {
	if ( $check_jat_g_fogo == "" OR $check_documento == "" ) { ?>
<BR>
 E=Enviado/ A=Atendido / EP=Enviado Parcial / AP=Atendido Parcial / - =Não Necessita <? } } ?>
</table>

<? /*-------------------------- FIM DADOS DO PCP -------------------------------  */?>

<? /*-------------------------- INICIO DADOS DO MAXSIG ------------------------  */?>

<? if ($lib_materiais == "alt" OR $lib_materiais == "ver") { ?>
<table class=sem_borda width=100% align="center">
<BR>
<tr><td class=titulo height="25" align="center"> DADOS DE MATERIAIS </td></tr></table>

<? /* 	MOTOR MAXSIG	 */ ?>
<table class=sem_borda width=100% align="center">
<BR>
<? if ($lib_mat1 == "alt" OR $lib_mat1 == "ver") { ?>
<td class=rigth_sem_borda width=50%> Mat1
<select <?echo $class_mat1;?> <?echo $readonly_mat1;?> <?echo $disabled_mat1;?> name=mat1_novo >
<option value=''  <? echo ($mat1==''?"SELECTED":""); ?> >  </option>
<option value='S' <? echo ($mat1=='S'?"SELECTED":""); ?> > S </option>
<option value='SP' <? echo ($mat1=='SP'?"SELECTED":""); ?> > SP </option>
<option value='C' <? echo ($mat1=='C'?"SELECTED":""); ?> > C </option>
<option value='E' <? echo ($mat1=='E'?"SELECTED":""); ?> > E </option>
<option value='EP' <? echo ($mat1=='EP'?"SELECTED":""); ?> > EP </option>
<option value='R' <? echo ($mat1=='R'?"SELECTED":""); ?> > R </option>
<option value='RP' <? echo ($mat1=='RP'?"SELECTED":""); ?> > RP </option>
<option value='M' <? echo ($mat1=='M'?"SELECTED":""); ?> > M </option>
<option value='MP' <? echo ($mat1=='MP'?"SELECTED":""); ?> > MP </option>
</select>

<? /* TIPO DE ALTERAÇÃ0 NO MOTOR */ ?>
Altera: 
<INPUT TYPE="radio" NAME="tipo_mat1" VALUE="item" checked <?echo $class_mat1;?> <?echo $readonly_mat1;?> <?echo $disabled_mat1;?> > Item
<INPUT TYPE="radio" NAME="tipo_mat1" VALUE="os" <?echo $class_mat1;?> <?echo $readonly_mat1;?> <?echo $disabled_mat1?> > OS

</td>
<? } else { ?>
<input type=hidden name=mat1_novo value="<?echo $mat1?>">
<? } ?>

<?/* POLIA MAXSIG */?>
<? if ($lib_mat2 == "alt" OR $lib_mat2 == "ver") { ?>
<td class=left_sem_borda width=40%> Mat2
<select <?echo $class_mat2;?> <?echo $readonly_mat2;?> <?echo $disabled_mat2;?> name=mat2_novo >
<option value=''  <? echo ($mat2==''?"SELECTED":""); ?> >  </option>
<option value='S' <? echo ($mat2=='S'?"SELECTED":""); ?> > S </option>
<option value='SP' <? echo ($mat2=='SP'?"SELECTED":""); ?> > SP </option>
<option value='C' <? echo ($mat2=='C'?"SELECTED":""); ?> > C </option>
<option value='E' <? echo ($mat2=='E'?"SELECTED":""); ?> > E </option>
<option value='EP' <? echo ($mat2=='EP'?"SELECTED":""); ?> > EP </option>
<option value='R' <? echo ($mat2=='R'?"SELECTED":""); ?> > R </option>
<option value='RP' <? echo ($mat2=='RP'?"SELECTED":""); ?> > RP </option>
<option value='M' <? echo ($mat2=='M'?"SELECTED":""); ?> > M </option>
<option value='MP' <? echo ($mat2=='MP'?"SELECTED":""); ?> > MP </option>
</select>

<? /* TIPO DE ALTERAÇÃ0 NO POLIA */ ?>
Altera: 
<INPUT TYPE="radio" NAME="tipo_mat2" VALUE="item" checked <?echo $class_mat2;?> <?echo $readonly_mat2;?> <?echo $disabled_mat2;?> > Item
<INPUT TYPE="radio" NAME="tipo_mat2" VALUE="os" <?echo $class_mat2;?> <?echo $readonly_mat2;?> <?echo $disabled_mat2?> > OS

</td>
<? } else { ?>
<input type=hidden name=mat2_novo value="<?echo $mat2?>">
<? } ?>
</table>

<?/* FUND MAXSIG */?>
<table class=sem_borda width=100% align="center">
<? if ($lib_mat3 == "alt" OR $lib_mat3== "ver") { ?>
<BR>
<td class=rigth_sem_borda width=50%> Mat3
<select <?echo $class_mat3;?> <?echo $readonly_mat3;?> <?echo $disabled_mat3;?> name=mat3_novo >
<option value=''  <? echo ($mat3==''?"SELECTED":""); ?> >  </option>
<option value='S' <? echo ($mat3=='S'?"SELECTED":""); ?> > S </option>
<option value='SP' <? echo ($mat3=='SP'?"SELECTED":""); ?> > SP </option>
<option value='C' <? echo ($mat3=='C'?"SELECTED":""); ?> > C </option>
<option value='E' <? echo ($mat3=='E'?"SELECTED":""); ?> > E </option>
<option value='EP' <? echo ($mat3=='EP'?"SELECTED":""); ?> > EP </option>
<option value='R' <? echo ($mat3=='R'?"SELECTED":""); ?> > R </option>
<option value='RP' <? echo ($mat3=='RP'?"SELECTED":""); ?> > RP </option>
<option value='M' <? echo ($mat3=='M'?"SELECTED":""); ?> > M </option>
<option value='MP' <? echo ($mat3=='MP'?"SELECTED":""); ?> > MP </option>
</select>

<? /* TIPO DE ALTERAÇÃ0 NO CARCAÇA */ ?>
Altera: 
<INPUT TYPE="radio" NAME="tipo_mat3" VALUE="item" checked <?echo $class_mat3;?> <?echo $readonly_mat3;?> <?echo $disabled_mat3;?> > Item
<INPUT TYPE="radio" NAME="tipo_mat3" VALUE="os" <?echo $class_mat3;?> <?echo $readonly_mat3;?> <?echo $disabled_mat3?> > OS

</td>
<? } else { ?>
<input type=hidden name=mat3_novo value="<?echo $mat3?>">
<? } ?>

<?/* OUTROS MAXSIG */?>
<? if ($lib_outros == "alt" OR $lib_outros == "ver") { ?>
<td class=left_sem_borda width=40%> Outros
<select <?echo $class_outros;?> <?echo $readonly_outros;?> <?echo $disabled_outros;?> name=outros_novo >
<option value=''  <? echo ($outros==''?"SELECTED":""); ?> >  </option>
<option value='S' <? echo ($outros=='S'?"SELECTED":""); ?> > S </option>
<option value='SP' <? echo ($outros=='SP'?"SELECTED":""); ?> > SP </option>
<option value='C' <? echo ($outros=='C'?"SELECTED":""); ?> > C </option>
<option value='E' <? echo ($outros=='E'?"SELECTED":""); ?> > E </option>
<option value='EP' <? echo ($outros=='EP'?"SELECTED":""); ?> > EP </option>
<option value='R' <? echo ($outros=='R'?"SELECTED":""); ?> > R </option>
<option value='RP' <? echo ($outros=='RP'?"SELECTED":""); ?> > RP </option>
<option value='M' <? echo ($outros=='M'?"SELECTED":""); ?> > M </option>
<option value='MP' <? echo ($outros=='MP'?"SELECTED":""); ?> > MP </option>
</select>

<? /* TIPO DE ALTERAÇÃ0 NO ROTOR */ ?>
Altera: 
<INPUT TYPE="radio" NAME="tipo_outros" VALUE="item" checked <?echo $class_outros;?> <?echo $readonly_outros;?> <?echo $disabled_outros;?> > Item
<INPUT TYPE="radio" NAME="tipo_outros" VALUE="os" <?echo $class_outros;?> <?echo $readonly_outros;?> <?echo $disabled_outros?> > OS

</td>
<? } else { ?>
<input type=hidden name=outros_novo value="<?echo $outros?>">
<? } ?>
</table>

<br>

<table class=sem_borda width=75% align="center">

<tr>

<? /* 	OBS	MAXSIG */ ?>
<? if ( $lib_obs_maxsig == "ver" OR $lib_obs_maxsig == "alt" ) { ?>
<td class=left> Obs </td>
<td class=left>
<textarea <?echo $class_obs_maxsig;?> <?echo $readonly_obs_maxsig;?> name=obs_maxsig_novo rows=2 cols=70 id="textbox10"><? echo $obs_maxsig; ?></textarea>
</td>
<? } else { ?>
<input type=hidden name=obs_maxsig_novo value="<?echo $obs_maxsig?>">
<? } ?>

</tr>
</table>


<table class=sem_borda width=75% align="center">
<? if ( $lib_maxsig == "ver" OR $lib_maxsig == "alt" ) {
	if ( $check_maxsig == "" OR $check_documento == "" ) { ?>
<BR>
S=Solicitado / SP=Solicitado Parcial / C=Comprado / E=Entregue / EP=Entregue Parcial / R=Reservado / RP=Reservado Parcial / M=Retirado(Montagem) / MP=Retirado Parcial(Montagem) <? } } ?>

</table>
<? } ?>
<BR>
<? /*-------------------------- FIM DADOS DO MAXSIG ------------------------  */?>



<? /*-------------------------- INICIO DADOS DO PCP PRODUÇÃO ------------------------  */?>
<? if ( $lib_pcp_producao == "ver" OR $lib_pcp_producao == "alt" OR $lib_pcp_producao == "sim" ) { ?>

<table class=sem_borda width=100% align="center">
<tr><td class=titulo height="25" align="center"> DADOS DO PCP PRODUÇÃO </td></tr></table>
<BR>

<table class=sem_borda width=100% align="center"> 

<tr>

<?/* MOSTRAR DATA PREVISAO */?>
<? if ( $lib_data_previsao == "ver" OR $lib_data_previsao == "alt" ) { ?>
<br>
<td class=left width=12%> Data Previsão </td>
<td class=left>
<input <?echo $class_data_previsao;?> <?echo $readonly_data_previsao;?> name=data_previsao_novo value="<?echo $data_previsao?>" size="11">
<? if ( $lib_data_previsao == "alt" ) { ?>
<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pcp.data_previsao_novo);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a>

<? /* TIPO DE ALTERAÇÃ0 NA DATA PROG. DIARIA */ ?>
 Altera: 
<INPUT TYPE="radio" NAME="tipo_data_previsao" VALUE="item" checked <?echo $class_data_previsao;?> <?echo $readonly_data_previsao;?> <?echo $disabled_data_previsao;?> > Item

<INPUT TYPE="radio" NAME="tipo_data_previsao" VALUE="os" <?echo $class_data_previsao;?> <?echo $readonly_data_previsao;?> <?echo $disabled_data_previsao;?> > OS
</td>
<? } } else { ?>
<input type=hidden name=data_previsao_novo value="<?echo $data_previsao?>">
<? } ?>
<?/* MOSTRAR DATA PREVISAO */?>


<? if ( $lib_data_prog_diaria == "ver" OR $lib_data_prog_diaria == "alt" ) { ?>
<td class=left width=14%> Data Prog. Diária </td>
<td class=left width=35%>
<input <?echo $class_data_prog_diaria;?> <?echo $readonly_data_prog_diaria;?> name=data_prog_diaria_novo value="<?echo $data_prog_diaria?>" size="11">
<? if ( $lib_data_prog_diaria == "alt" ) { ?>
<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pcp.data_prog_diaria_novo);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a>

<? /* TIPO DE ALTERAÇÃ0 NA DATA PROG. DIARIA */  ?>
 Altera: 
<INPUT TYPE="radio" NAME="tipo_data_prog_diaria" VALUE="item" checked <?echo $class_data_prog_diaria;?> <?echo $readonly_data_prog_diaria;?> <?echo $disabled_data_prog_diaria;?> > Item

<INPUT TYPE="radio" NAME="tipo_data_prog_diaria" VALUE="os" <?echo $class_data_prog_diaria;?> <?echo $readonly_data_prog_diaria;?> <?echo $disabled_data_prog_diaria;?> > OS</td>

<? } } else { ?>
<input type=hidden name=data_prog_diaria_novo value="<?echo $data_prog_diaria?>">
<? } ?>

</tr>
</table>
<br>
<table class=sem_borda width=100% align="center"> 
<tr>

<td class=left> 

<?/* MOSTRAR DATA PROG MONTAGEM */?>
<? if ( $lib_dt_prog_montagem == "ver" OR $lib_dt_prog_montagem == "alt" ) { ?>
<br>
<td class=left width=12%> Data Prog. Montagem </td>
<td class=left>
<input <?echo $class_dt_prog_montagem;?> <?echo $readonly_dt_prog_montagem;?> name=dt_prog_montagem_novo value="<?echo $dt_prog_montagem?>" size="11">
<? if ( $lib_dt_prog_montagem == "alt" ) { ?>
<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pcp.dt_prog_montagem_novo);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a>

<? /* TIPO DE ALTERAÇÃ0 NA DATA PROG. DIARIA */ ?>
 Altera: 
<INPUT TYPE="radio" NAME="tipo_dt_prog_montagem" VALUE="item" checked <?echo $class_dt_prog_montagem;?> <?echo $readonly_dt_prog_montagem;?> <?echo $disabled_dt_prog_montagem;?> > Item

<INPUT TYPE="radio" NAME="tipo_dt_prog_montagem" VALUE="os" <?echo $class_dt_prog_montagem;?> <?echo $readonly_dt_prog_montagem;?> <?echo $disabled_dt_prog_montagem;?> > OS
</td>
<? } } else { ?>
<input type=hidden name=dt_prog_montagem_novo value="<?echo $dt_prog_montagem?>">
<? } ?>
<?/* MOSTRAR DATA PROG MONTAGEM */?>

</td>

<td class=left> &nbsp; </td>

</tr>
</table>

<? } ?>
<? /*-------------------------- FIM DADOS DO PCP PRODUÇÃO ------------------------  */?>

<BR>

<? /*-------------------------- INICIO DADOS DO PROJETOS ------------------------  */?>

<? if ( $lib_proj == "ver" OR $lib_proj == "alt" OR $lib_proj == "sim"  OR $lib_dados_proj == "alt" ) { ?>

<table class=sem_borda width=100% align="center">
<tr><td class=titulo height="25" align="center"> DADOS DO PROJETOS </td></tr></table>

<BR>

<table class=sem_borda width=100% align="center"> 

<tr>


<? /* 	potencia motor cv */ ?>
<? if ( $lib_pot_motor_cv == "ver" OR $lib_pot_motor_cv == "alt" OR $lib_pot_motor_polos == "ver" OR $lib_pot_motor_polos == "alt" ) { ?>
<td class=right_sem_borda width=12%> Potencia Motor </td>
<?
/* pot. motor cv */
$buscapot_motor_cv = mysql_query("select distinct pot_motor_cv from pcp order by 'pot_motor_cv'");
$totalpot_motor_cv = mysql_num_rows($buscapot_motor_cv); $count = $totalpot_motor_cv-1;
for($i=0; $i<$totalpot_motor_cv; $i++) { $nomepot_motor_cv = mysql_result($buscapot_motor_cv,$i,"pot_motor_cv"); $palavraspot_motor_cv.="'$nomepot_motor_cv'";
if($i<$count) { $palavraspot_motor_cv.=","; } }
/* pot. motor polos */
$buscapot_motor_polos = mysql_query("select distinct pot_motor_polos from pcp order by 'pot_motor_polos'");
$totalpot_motor_polos = mysql_num_rows($buscapot_motor_polos); $count = $totalpot_motor_polos-1;
for($i=0; $i<$totalpot_motor_polos; $i++) { $nomepot_motor_polos = mysql_result($buscapot_motor_polos,$i,"pot_motor_polos"); $palavraspot_motor_polos.="'$nomepot_motor_polos'";
if($i<$count) { $palavraspot_motor_polos.=","; } }
?>
<td class=left_sem_borda>
<input <?echo $class_pot_motor_cv;?> <?echo $readonly_pot_motor_cv;?> name=pot_motor_cv_novo maxLength=7 size=7 value="<?echo $pot_motor_cv?>"
onKeyUp="checkList(this,arvorepot_motor_cv);Texto_Maiuscula_Altera();" id="textbox14" onFocus="nextfield ='pot_motor_polos_novo';"> CV
<input <?echo $class_pot_motor_polos;?> <?echo $readonly_pot_motor_polos;?> name=pot_motor_polos_novo maxLength=7 size=7 value="<?echo $pot_motor_polos?>"
onKeyUp="checkList(this,arvorepot_motor_polos);Texto_Maiuscula_Altera();" id="textbox15" onFocus="nextfield ='tensao_motor_novo';"> Polos

</td>
<? } else { ?>
<input type=hidden name=pot_motor_cv_novo value="<?echo $pot_motor_cv?>">
<input type=hidden name=pot_motor_polos_novo value="<?echo $pot_motor_polos?>">
<? } ?>


<? /* 	tensao motor	 */ ?>
<? if ( $lib_tensao_motor == "ver" OR $lib_tensao_motor == "alt" ) { ?>
<td class=rigth_sem_borda width=11%> Tensão Motor </td>
<?
$buscatensao_motor = mysql_query("select distinct tensao_motor from pcp order by 'tensao_motor'");
$totaltensao_motor = mysql_num_rows($buscatensao_motor); $count = $totaltensao_motor-1;
for($i=0; $i<$totaltensao_motor; $i++) { $nometensao_motor = mysql_result($buscatensao_motor,$i,"tensao_motor"); $palavrastensao_motor.="'$nometensao_motor'";
if($i<$count) { $palavrastensao_motor.=","; } }
?>
<td class=left_sem_borda>
<input <?echo $class_tensao_motor;?> <?echo $readonly_tensao_motor;?> name=tensao_motor_novo maxLength=13 size=14 value="<?echo $tensao_motor?>"
onKeyUp="checkList(this,arvoretensao_motor);Texto_Maiuscula_Altera();" id="textbox16" onFocus="nextfield ='vazao_novo';">
</td>
<? } else { ?>
<input type=hidden name=tensao_motor_novo value="<?echo $tensao_motor?>">
<? } ?>


<? /* 	vazao	 */ ?>
<? if ( $lib_vazao == "ver" OR $lib_vazao == "alt" ) { ?>
<td class=left_sem_borda width=5%> Vazão </td>
<?
$buscavazao = mysql_query("select distinct vazao from pcp order by 'vazao'");
$totalvazao = mysql_num_rows($buscavazao); $count = $totalvazao-1;
for($i=0; $i<$totalvazao; $i++) { $nomevazao = mysql_result($buscavazao,$i,"vazao"); $palavrasvazao.="'$nomevazao'";
if($i<$count) { $palavrasvazao.=","; } }
?>
<td class=left_sem_borda>
<input <?echo $class_vazao;?> <?echo $readonly_vazao;?> name=vazao_novo maxLength=10 size=11 value="<?echo $vazao?>"
onKeyUp="checkList(this,arvorevazao);Texto_Maiuscula_Altera();" id="textbox17" onFocus="nextfield ='rotacao_rpm_novo';">
m3/h
</td>
<? } else { ?>
<input type=hidden name=vazao_novo value="<?echo $vazao?>">
<? } ?>


</tr>
</table>



<table class=sem_borda width=100% align="center"> 

<tr>


<? /* 	rotacao rpm	 */ ?>
<? if ( $lib_rotacao_rpm == "ver" OR $lib_rotacao_rpm == "alt" ) { ?>
<td class=left_sem_borda width=5%> Rotação </td>
<?
$buscarotacao_rpm = mysql_query("select distinct rotacao_rpm from pcp order by 'rotacao_rpm'");
$totalrotacao_rpm = mysql_num_rows($buscarotacao_rpm); $count = $totalrotacao_rpm-1;
for($i=0; $i<$totalrotacao_rpm; $i++) { $nomerotacao_rpm = mysql_result($buscarotacao_rpm,$i,"rotacao_rpm"); $palavrasrotacao_rpm.="'$nomerotacao_rpm'";
if($i<$count) { $palavrasrotacao_rpm.=","; } }
?>
<td class=left_sem_borda>
<input <?echo $class_rotacao_rpm;?> <?echo $readonly_rotacao_rpm;?> name=rotacao_rpm_novo maxLength=5 size=6 value="<?echo $rotacao_rpm?>"
onKeyUp="checkList(this,arvorerotacao_rpm);Texto_Maiuscula_Altera();" id="textbox18" onFocus="nextfield ='p_estatica_op_novo';">
rpm
</td>
<? } else { ?>
<input type=hidden name=rotacao_rpm_novo value="<?echo $rotacao_rpm?>">
<? } ?>


<? /* 	pressao estatica (op) */ ?>
<? if ( $lib_p_estatica_op == "ver" OR $lib_p_estatica_op == "alt" ) { ?>
<td class=left_sem_borda width=13%> P. Estática (op) </td>
<?
$buscap_estatica_op = mysql_query("select distinct p_estatica_op from pcp order by 'p_estatica_op'");
$totalp_estatica_op = mysql_num_rows($buscap_estatica_op); $count = $totalp_estatica_op-1;
for($i=0; $i<$totalp_estatica_op; $i++) { $nomep_estatica_op = mysql_result($buscap_estatica_op,$i,"p_estatica_op"); $palavrasp_estatica_op.="'$nomep_estatica_op'";
if($i<$count) { $palavrasp_estatica_op.=","; } }
?>
<td class=left_sem_borda>
<input <?echo $class_p_estatica_op;?> <?echo $readonly_p_estatica_op;?> name=p_estatica_op_novo maxLength=10 size=10 value="<?echo $p_estatica_op?>"
onKeyUp="checkList(this,arvorep_estatica_op);Texto_Maiuscula_Altera();" id="textbox25" onFocus="nextfield ='int_lub_novo';">
mmCA
</td>
<? } else { ?>
<input type=hidden name=p_estatica_op_novo value="<?echo $p_estatica_op?>">
<? } ?>


<? /* 	int. lubrificacao */ ?>
<? if ( $lib_int_lub == "ver" OR $lib_int_lub == "alt" ) { ?>
<td class=left_sem_borda width=7%> Int. Lub. </td>
<?
$buscaint_lub = mysql_query("select distinct int_lub from pcp order by 'int_lub'");
$totalint_lub = mysql_num_rows($buscaint_lub); $count = $totalint_lub-1;
for($i=0; $i<$totalint_lub; $i++) { $nomeint_lub = mysql_result($buscaint_lub,$i,"int_lub"); $palavrasint_lub.="'$nomeint_lub'";
if($i<$count) { $palavrasint_lub.=","; } }
?>
<td class=left_sem_borda>
<input <?echo $class_int_lub;?> <?echo $readonly_int_lub;?> name=int_lub_novo maxLength=5 size=6 value="<?echo $int_lub?>"
gonKeyUp="checkList(this,arvoreint_lub);Texto_Maiuscula_Altera();" id="textbox19" onFocus="nextfield ='Atualizar_Cadastro';">
hs
</td>
<? } else { ?>
<input type=hidden name=int_lub_novo value="<?echo $int_lub?>">
<? } ?>

</tr>
</table>


<? } ?>
<? /*-------------------------- FIM DADOS DO PROJETOS ------------------------  */?>

<BR>

<? /*-------------------------- INICIO DADOS DA INSPEÇÃO ------------------------  */?>
<? if ( $lib_insp == "ver" OR $lib_insp == "alt" ) { ?>

<table class=sem_borda width=100% align="center">
<tr><td class=titulo height="25" align="center"> DADOS DA INSPEÇÃO </td></tr></table>
<BR>

<table class=sem_borda width=100% align="center"> 

<tr>

<?/* TIPO DE INSPEÇÃO */?>
<? if ($lib_tipo_insp == "alt" OR $lib_tipo_insp == "ver") { ?>
<td class=left_sem_borda> Tipo
<select <?echo $class_tipo_insp;?> <?echo $readonly_tipo_insp;?> <?echo $disabled_tipo_insp;?> name=tipo_insp_novo >
<option value=''  <? echo ($tipo_insp==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($tipo_insp=='A'?"SELECTED":""); ?> > A </option>
<option value='B' <? echo ($tipo_insp=='B'?"SELECTED":""); ?> > B </option>
<option value='C' <? echo ($tipo_insp=='C'?"SELECTED":""); ?> > C </option>
<option value='D' <? echo ($tipo_insp=='D'?"SELECTED":""); ?> > D </option>
<option value='E' <? echo ($tipo_insp=='E'?"SELECTED":""); ?> > E </option>
</select>

<? /* TIPO DE ALTERAÇÃ0 NO TIPO DE INSPEÇÃO*/ ?>
Altera: 
<INPUT TYPE="radio" NAME="tipo_tipo_insp" VALUE="item" checked <?echo $class_tipo_insp;?> <?echo $readonly_tipo_insp;?> <?echo $disabled_tipo_insp;?> > Item
<INPUT TYPE="radio" NAME="tipo_tipo_insp" VALUE="os" <?echo $class_tipo_insp;?> <?echo $readonly_tipo_insp;?> <?echo $disabled_tipo_insp?> > OS

</td>
<? } else { ?>
<input type=hidden name=tipo_insp_novo value="<?echo $tipo_insp?>">
<? } ?>
<?/* TIPO DE INSPEÇÃO */?>


<?/* CLIENTE DE INSPEÇÃO */?>
<? if ($lib_cliente_insp == "alt" OR $lib_cliente_insp == "ver") { ?>
<td class=left_sem_borda > Cliente
<select <?echo $class_cliente_insp;?> <?echo $readonly_cliente_insp;?> <?echo $disabled_cliente_insp;?> name=cliente_insp_novo >
<option value=''  <? echo ($cliente_insp==''?"SELECTED":""); ?> >  </option>
<option value='S' <? echo ($cliente_insp=='S'?"SELECTED":""); ?> > S </option>
<option value='N' <? echo ($cliente_insp=='N'?"SELECTED":""); ?> > N </option>
</select>

<? /* TIPO DE ALTERAÇÃ0 NO CLIENTE DE INSPEÇÃO*/ ?>
Altera: 
<INPUT TYPE="radio" NAME="tipo_cliente_insp" VALUE="item" checked <?echo $class_cliente_insp;?> <?echo $readonly_cliente_insp;?> <?echo $disabled_cliente_insp;?> > Item
<INPUT TYPE="radio" NAME="tipo_cliente_insp" VALUE="os" <?echo $class_cliente_insp;?> <?echo $readonly_cliente_insp;?> <?echo $disabled_cliente_insp?> > OS

</td>
<? } else { ?>
<input type=hidden name=cliente_insp_novo value="<?echo $cliente_insp?>">
<? } ?>
<?/* CLIENTE DE INSPEÇÃO */?>


<?/* DATA DE INSPEÇÃO */?>
<? if ( $lib_data_insp == "ver" OR $lib_data_insp == "alt" ) { ?>
<td class=left > Data
<input <?echo $class_data_insp;?> <?echo $readonly_data_insp;?> name=data_insp_novo value="<?echo $data_insp?>" size="11">
<? if ( $lib_data_insp == "alt" ) { ?>
<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pcp.data_insp_novo);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a>

<? /* TIPO DE ALTERAÇÃ0 NA DATA INSPEÇÃO */ ?>
 Altera: 
<INPUT TYPE="radio" NAME="tipo_data_insp" VALUE="item" checked <?echo $class_data_insp;?> <?echo $readonly_data_insp;?> <?echo $disabled_data_insp;?> > Item

<INPUT TYPE="radio" NAME="tipo_data_insp" VALUE="os" <?echo $class_data_insp;?> <?echo $readonly_data_insp;?> <?echo $disabled_data_insp;?> > OS</td>

<? } } else { ?>
<input type=hidden name=data_insp_novo value="<?echo $data_insp?>">
<? } ?>
<?/* DATA DE INSPEÇÃO */?>

</table>

<br>

<table class=sem_borda width=100% align="center">

<tr>

<? /* LIBERAR INSPEÇAO */ ?>
<? if ( $tipo_insp != "" ) { ?>

<? if ( $lib_liberar_insp == "ver" OR $lib_liberar_insp == "alt" ) { ?>
<td class=left_sem_borda> Inspecionado
<select <?echo $class_liberar_insp;?> <?echo $readonly_liberar_insp;?> <?echo $disabled_liberar_insp;?> name=liberar_insp_novo >
<option value=''  <? echo ($liberar_insp==''?"SELECTED":""); ?> >  </option>
<option value='S' <? echo ($liberar_insp=='S'?"SELECTED":""); ?> > S </option>
</select>
</td>
<? } else { ?>
<input type=hidden name=liberar_insp_novo value="<?echo $liberar_insp?>">
<? } ?>

<? } ?>

<? /* 	OBS	DE INSPEÇÃO */ ?>
<? if ( $lib_obs_insp == "ver" OR $lib_obs_insp == "alt" ) { ?>
<td class=center> Obs
<textarea <?echo $class_obs_insp;?> <?echo $readonly_obs_insp;?> name=obs_insp_novo rows=2 cols=45 id="textbox10"><? echo $obs_insp; ?></textarea>
</td>
<? } else { ?>
<input type=hidden name=obs_insp_novo value="<?echo $obs_insp?>">
<? } ?>
<? /* 	OBS	DE INSPEÇÃO */ ?>

</tr>
</table>

<td class=left> &nbsp; </td>
<td class=left> &nbsp; </td>

</tr>
</table>

<? } ?>
<? /*-------------------------- FIM DADOS DA INSPEÇÃO ------------------------  */?>


<br>

<? /*-------------------------- BOTOES ------------------------  */?>

<table class=sem_borda width=40% align="center">
<tr>
<? 
if ( $lib_alterar == "sim" ) { 
if ( $lib_baixa == "e" AND $lib_baixa_tipo == "e" AND $baixa == "E" OR $baixa == "e") { } else {
?>
<td>
<input class="botao1" name="Atualizar_Cadastro" type="button" value="Atualizar_Cadastro" OnClick="Alterar_DB();" onFocus="nextfield ='done';">
</td>
<? } } ?>

<td>
<input class="botao1" name="Fechar" type="button" value="Fechar Janela" OnClick="javascript:window.close();">
</td>
</tr>
</table>

<? /*-------------------------- BOTOES ------------------------  */?>

<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="calendario/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>

</form>
</body>
</html>

<script>
var arvorecliente = new Array(<?= $palavrascliente ?>);
var arvoreoc_obra = new Array(<?= $palavrasoc_obra ?>);
var arvoremercado = new Array(<?= $palavrasmercado ?>);
var arvoreestado = new Array(<?= $palavrasestado ?>);
var arvoredescr_vent = new Array(<?= $palavrasdescr_vent ?>);
var arvoremodelo = new Array(<?= $palavrasmodelo ?>);
var arvoretamanho = new Array(<?= $palavrastamanho ?>);
var arvorelargura_especial = new Array(<?= $palavraslargura_especial ?>);
var arvorearranjo = new Array(<?= $palavrasarranjo ?>);
var arvoreclasse = new Array(<?= $palavrasclasse ?>);
var arvorepintura = new Array(<?= $palavraspintura ?>);
var arvoreconstrucao = new Array(<?= $palavrasconstrucao ?>);

var arvorepos_motor = new Array(<?= $palavraspos_motor ?>);
var arvorepot_motor_cv = new Array(<?= $palavraspot_motor_cv ?>);
var arvorepot_motor_polos = new Array(<?= $palavraspot_motor_polos ?>);
var arvoretensao_motor = new Array(<?= $palavrastensao_motor ?>);
var arvorevazao = new Array(<?= $palavrasvazao ?>);
var arvorerotacao_rpm = new Array(<?= $palavrasrotacao_rpm ?>);
var arvorep_estatica_op = new Array(<?= $palavrasp_estatica_op ?>);
var arvoreint_lub = new Array(<?= $palavrasint_lub ?>);


document.write('<style type="text/css">'+
	  '#listHolder{position:absolute;border:0;}'+
	  '.list{font-family:verdana;font-size:10;color:#000000;background:;}'+
	 '<\/style>')
</script>
