<? include "valida_sessao.php" ; include "config_pcp.php"; include "consulta_placar_pcp_db.php";?>

<html>
<head>
<title> Consulta Placar PCP </title>
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

<div id="overDiv" style="position:absolute; visibility:hide; z-index:1;; width: 160px; height: 19px">
</div>


<? /*  ----------------	BUSCAR DADOS DE LIBERAÇÃO ------------------	*/



$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {
	
$lib_inserir = $linha["lib_inserir"]; 
$lib_alterar_geral = $linha["lib_alterar_geral"];

/* SETOR VENDAS */
$lib_vendas = $linha["lib_vendas"]; 

/* SETOR PCP */
$lib_pcp = $linha["lib_pcp"]; 

/* SETOR PCP PRODUCAO */
$lib_pcp_producao = $linha["lib_pcp_producao"]; 

$lib_num_os = $linha["lib_num_os"]; 
$lib_item = $linha["lib_item"]; 

$lib_data_entrega = $linha["lib_data_entrega"]; 

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

$lib_obs = $linha["lib_obs"]; 

$lib_baixa = $linha["lib_baixa"]; $lib_baixa_tipo = $linha["lib_baixa_tipo"]; 
$lib_data_baixa = $linha["lib_data_baixa"]; 

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

/* SETOR FUNILARIA */
$lib_funilaria = $linha["lib_funilaria"];
/* SETOR FUNILARIA */

/* SETOR LASER */
$lib_laser = $linha["lib_laser"];
/* SETOR LASER */ 


$lib_almox_placar = $linha["lib_almox_placar"];
$lib_corte_placar = $linha["lib_corte_placar"];
$lib_balanc_placar = $linha["lib_balanc_placar"];
$lib_cald1_placar = $linha["lib_cald1_placar"];
$lib_cald2_placar = $linha["lib_cald2_placar"];
$lib_rotor_ll_placar = $linha["lib_rotor_ll_placar"];
$lib_rotor_sir_placar = $linha["lib_rotor_sir_placar"];
$lib_usinagem_placar = $linha["lib_usinagem_placar"];
$lib_pintura_placar = $linha["lib_pintura_placar"];
$lib_montagem_placar = $linha["lib_montagem_placar"];
$lib_gabinete_placar = $linha["lib_gabinete_placar"];
$lib_expedicao_placar = $linha["lib_expedicao_placar"];
$lib_funilaria_placar = $linha["lib_funilaria_placar"];
$lib_laser_placar = $linha["lib_laser_placar"];
}

/*  ----------------	BUSCAR DADOS DE LIBERAÇÃO ------------------	*/

?>

<form action="javascript:Atualizar()" method="post" name="pcp">



<? /* -------------	CONFIGURAÇÃO PARA BUSCAR OS NUMEROS DA O.S	------------------- */ ?>

<table class=sem_borda width=100% align="center">
<tr>
</tr>
</table>

<? /* -------------	CONFIGURAÇÃO PARA BUSCAR OS NUMEROS DA O.S	------------------- */ ?>



<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>

<?   /* --------	ALTERAR GERAL ---------	*/  ?>	
<? if ( $lib_alterar_geral == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<input class="botao1" name="alterar_tudo" type="button" value="Alterar Tudo" Onclick="Alterar_Placar();">
</span>
</P></TD>
<? } ?>	
<?   /* --------	ALTERAR GERAL ---------	*/  ?>

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
                    
					<br>  
	
<? /* ------------------------------------- ORGANIZAR ---------------------------------------- */ ?>

	
<? /* --------------------  INICIO DA CONSULTA  -----------------------------  */  ?>

<?
if ($organizar == "") { $organizar = "data_entrega"; } else { $organizar = $organizar; }

$quant_os = 0; $x = 0;

$query = "SELECT * FROM pcp WHERE baixa='P' $f_num_os_db $f_nome_cliente_db $f_data_entrega_mes_db $f_data_entrega_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_construcao_db $f_qt_db $f_obs_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $baixa_organizar $f_status_almox_db $f_status_corte_db $f_status_laser_db $f_status_balanc_db $f_status_cald1_db  $f_status_cald2_db $f_status_pintura_db $f_status_rotor_ll_db $f_status_rotor_sir_db  $f_status_usinagem_eixo_db $f_status_montagem_db $f_status_usinagem_nuc_cubo_db $f_status_usinagem_pol_mot_db $f_status_usinagem_pol_vent_db $f_status_usinagem_gaxeta_db $f_status_pintura_db $f_status_gabinete_db $f_status_expedicao_db $f_status_funilaria_db ORDER BY '$organizar'";

$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) {

$x = $x + 1;

$id = $dados["id"]; 

$data_emissao = $dados["data_emissao"]; 

$num_os = $dados["num_os"]; 
$nome_cliente = $dados["nome_cliente"];
$item = $dados["item"]; 

$data_entrega = $dados["data_entrega"]; 

$descr_vent = $dados["descr_vent"]; 
$modelo = $dados["modelo"]; 
$tamanho = $dados["tamanho"]; 
$arranjo = $dados["arranjo"];
$classe = $dados["classe"]; 
$rotacao = $dados["rotacao"]; 
$gab = $dados["gab"]; 
$pintura = $dados["pintura"]; 
$construcao = $dados["construcao"]; 
$qt = $dados["qt"]; 

$obs = $dados["obs"]; 

$baixa = $dados["baixa"]; 
$data_baixa = $dados["data_baixa"]; 

/* MOTOR - POLIA - CARCAÇA - ROTOR DO MAXSIG */
$motor_maxsig = $dados["motor_maxsig"];
$polia_maxsig = $dados["polia_maxsig"];
$fund_maxsig = $dados["fund_maxsig"];
$outros_maxsig = $dados["outros_maxsig"];

/*		SETOR ALMOX	  */

$dt_producao_almox = $dados["dt_producao_almox"];
$dt_exp_almox = $dados["dt_exp_almox"]; 
$status_almox = $dados["status_almox"];
$status_almox_db = $dados["status_almox"];

/*		SETOR ALMOX	  */

/*		SETOR CORTE		*/

$dt_producao_corte = $dados["dt_producao_corte"];
$dt_exp_corte = $dados["dt_exp_corte"]; 
$status_corte = $dados["status_corte"];
$status_corte_db = $dados["status_corte"];

/*		SETOR CORTE		*/


/*		SETOR BALANCEAMENTO		*/

$dt_producao_balanc = $dados["dt_producao_balanc"];
$dt_exp_balanc = $dados["dt_exp_balanc"]; 
$status_balanc = $dados["status_balanc"];
$status_balanc_db = $dados["status_balanc"];

/*		SETOR BALANCEAMENTO     */


/*		SETOR CALD 1		*/

$dt_producao_cald1 = $dados["dt_producao_cald1"];
$dt_exp_cald1 = $dados["dt_exp_cald1"]; 
$status_cald1 = $dados["status_cald1"];
$status_cald1_db = $dados["status_cald1"];

/*		SETOR CALD 1     */

/*		SETOR CALD 2		*/

$dt_producao_cald2 = $dados["dt_producao_cald2"];
$dt_exp_cald2 = $dados["dt_exp_cald2"]; 
$status_cald2 = $dados["status_cald2"];
$status_cald2_db = $dados["status_cald2"];

$mesa_cald2 = $dados["mesa_cald2"];
$mesa_cald2_db = $dados["mesa_cald2"];

/*		SETOR CALD 2     */

/*		SETOR ROTOR LL		*/

$dt_producao_rotor_ll = $dados["dt_producao_rotor_ll"];
$dt_exp_rotor_ll = $dados["dt_exp_rotor_ll"]; 
$status_rotor_ll = $dados["status_rotor_ll"];
$status_rotor_ll_db = $dados["status_rotor_ll"];

/*		SETOR ROTOR LL     */

/*		SETOR ROTOR SIR		*/

$dt_producao_rotor_sir = $dados["dt_producao_rotor_sir"];
$dt_exp_rotor_sir = $dados["dt_exp_rotor_sir"]; 
$status_rotor_sir = $dados["status_rotor_sir"];
$status_rotor_sir_db = $dados["status_rotor_sir"];

/*		SETOR ROTOR SIR     */

/*		SETOR MONTAGEM	*/

$dt_producao_montagem = $dados["dt_producao_montagem"];
$dt_exp_montagem = $dados["dt_exp_montagem"]; 
$status_montagem = $dados["status_montagem"];
$status_montagem_db = $dados["status_montagem"];

/*		SETOR MONTAGEM     */

/*		SETOR GABINETE	*/

$dt_producao_gabinete = $dados["dt_producao_gabinete"];
$dt_exp_gabinete = $dados["dt_exp_gabinete"]; 
$status_gabinete = $dados["status_gabinete"];
$status_gabinete_db = $dados["status_gabinete"];

/*		SETOR GABINETE     */

/*		SETOR USINAGEM		*/

/* EIXO */

$dt_producao_usinagem_eixo = $dados["dt_producao_usinagem_eixo"];
$dt_exp_usinagem_eixo = $dados["dt_exp_usinagem_eixo"]; 
$status_usinagem_eixo = $dados["status_usinagem_eixo"];
$status_usinagem_eixo_db = $dados["status_usinagem_eixo"];

/* EIXO */

/* NUC_CUBO */

$dt_producao_usinagem_nuc_cubo = $dados["dt_producao_usinagem_nuc_cubo"];
$dt_exp_usinagem_nuc_cubo = $dados["dt_exp_usinagem_nuc_cubo"]; 
$status_usinagem_nuc_cubo = $dados["status_usinagem_nuc_cubo"];
$status_usinagem_nuc_cubo_db = $dados["status_usinagem_nuc_cubo"];

/* NUC_CUBO */

/* POL_MOT */

$dt_producao_usinagem_pol_mot = $dados["dt_producao_usinagem_pol_mot"];
$dt_exp_usinagem_pol_mot = $dados["dt_exp_usinagem_pol_mot"]; 
$status_usinagem_pol_mot = $dados["status_usinagem_pol_mot"];
$status_usinagem_pol_mot_db = $dados["status_usinagem_pol_mot"];

/* POL_MOT */

/* POL_VENT */

$dt_producao_usinagem_pol_vent = $dados["dt_producao_usinagem_pol_vent"];
$dt_exp_usinagem_pol_vent = $dados["dt_exp_usinagem_pol_vent"]; 
$status_usinagem_pol_vent = $dados["status_usinagem_pol_vent"];
$status_usinagem_pol_vent_db = $dados["status_usinagem_pol_vent"];

/* POL_VENT */

/* GAXETA */

$dt_producao_usinagem_gaxeta = $dados["dt_producao_usinagem_gaxeta"];
$dt_exp_usinagem_gaxeta = $dados["dt_exp_usinagem_gaxeta"]; 
$status_usinagem_gaxeta = $dados["status_usinagem_gaxeta"];
$status_usinagem_gaxeta_db = $dados["status_usinagem_gaxeta"];

/* GAXETA */


/*		SETOR PINTURA		*/

$dt_producao_pintura = $dados["dt_producao_pintura"];
$dt_exp_pintura = $dados["dt_exp_pintura"]; 
$status_pintura = $dados["status_pintura"];
$status_pintura_db = $dados["status_pintura"];

/*		SETOR PINTURA		*/

/*		SETOR EXPEDICAO		*/

$dt_producao_expedicao = $dados["dt_producao_expedicao"];
$dt_exp_expedicao = $dados["dt_exp_expedicao"]; 
$status_expedicao = $dados["status_expedicao"];
$status_expedicao_db = $dados["status_expedicao"];

/*		SETOR EXPEDICAO		*/

/*		SETOR FUNILARIA		*/

$dt_producao_funilaria = $dados["dt_producao_funilaria"];
$dt_exp_funilaria = $dados["dt_exp_funilaria"]; 
$status_funilaria = $dados["status_funilaria"];
$status_funilaria_db = $dados["status_funilaria"];

/*		SETOR FUNILARIA     */

/*		SETOR LASER	*/

$dt_producao_laser = $dados["dt_producao_laser"];
$dt_exp_laser = $dados["dt_exp_laser"]; 
$status_laser = $dados["status_laser"];
$status_laser_db = $dados["status_laser"];

/*		SETOR LASER		*/


/* ----------------------- CONVERTER DATAS	------------------------------------*/

$dia_data_entrega = substr($data_entrega, -2); 
$mes_data_entrega = substr($data_entrega, -5,2);
$ano_data_entrega = substr($data_entrega, -10,4); 
$data_entrega = ($dia_data_entrega."/".$mes_data_entrega."/".$ano_data_entrega);

/*-------	SETOR ALMOX ---------*/
$dia_dt_prog_almox = substr($dt_prog_almox, -2); 
$mes_dt_prog_almox = substr($dt_prog_almox, -5,2);
$ano_dt_prog_almox = substr($dt_prog_almox, -10,4); 
if ($dia_dt_prog_almox == "" AND $mes_dt_prog_almox == "" AND $ano_dt_prog_almox == "") 
{$dt_prog_almox = ($dia_dt_prog_almox."".$mes_dt_prog_almox."".$ano_dt_prog_almox); } 
else 
{$dt_prog_almox = ($dia_dt_prog_almox."/".$mes_dt_prog_almox."/".$ano_dt_prog_almox); }

$dia_dt_producao_almox = substr($dt_producao_almox, -2); 
$mes_dt_producao_almox = substr($dt_producao_almox, -5,2);
$ano_dt_producao_almox = substr($dt_producao_almox, -10,4); 
if ($dia_dt_producao_almox == "" AND $mes_dt_producao_almox == "" AND $ano_dt_producao_almox == "") 
{$dt_producao_almox = ($dia_dt_producao_almox."".$mes_dt_producao_almox."".$ano_dt_producao_almox); }
else 
{$dt_producao_almox = ($dia_dt_producao_almox."/".$mes_dt_producao_almox."/".$ano_dt_producao_almox); }

$dia_dt_exp_almox = substr($dt_exp_almox, -2); 
$mes_dt_exp_almox = substr($dt_exp_almox, -5,2);
$ano_dt_exp_almox = substr($dt_exp_almox, -10,4); 
if ($dia_dt_exp_almox == "" AND $mes_dt_exp_almox == "" AND $ano_dt_exp_almox == "") 
{$dt_exp_almox = ($dia_dt_exp_almox."".$mes_dt_exp_almox."".$ano_dt_exp_almox); }
else 
{$dt_exp_almox = ($dia_dt_exp_almox."/".$mes_dt_exp_almox."/".$ano_dt_exp_almox); }
/*-------	SETOR ALMOX	---------*/ 



/*-------	SETOR BALANCEAMENTO	---------*/
$dia_dt_prog_balanc = substr($dt_prog_balanc, -2); 
$mes_dt_prog_balanc = substr($dt_prog_balanc, -5,2);
$ano_dt_prog_balanc = substr($dt_prog_balanc, -10,4); 
if ($dia_dt_prog_balanc == "" AND $mes_dt_prog_balanc == "" AND $ano_dt_prog_balanc == "") 
{$dt_prog_balanc = ($dia_dt_prog_balanc."".$mes_dt_prog_balanc."".$ano_dt_prog_balanc); } 
else 
{$dt_prog_balanc = ($dia_dt_prog_balanc."/".$mes_dt_prog_balanc."/".$ano_dt_prog_balanc); }

$dia_dt_producao_balanc = substr($dt_producao_balanc, -2); 
$mes_dt_producao_balanc = substr($dt_producao_balanc, -5,2);
$ano_dt_producao_balanc = substr($dt_producao_balanc, -10,4); 
if ($dia_dt_producao_balanc == "" AND $mes_dt_producao_balanc == "" AND $ano_dt_producao_balanc == "") 
{$dt_producao_balanc = ($dia_dt_producao_balanc."".$mes_dt_producao_balanc."".$ano_dt_producao_balanc); }
else 
{$dt_producao_balanc = ($dia_dt_producao_balanc."/".$mes_dt_producao_balanc."/".$ano_dt_producao_balanc); }

$dia_dt_exp_balanc = substr($dt_exp_balanc, -2); 
$mes_dt_exp_balanc = substr($dt_exp_balanc, -5,2);
$ano_dt_exp_balanc = substr($dt_exp_balanc, -10,4); 
if ($dia_dt_exp_balanc == "" AND $mes_dt_exp_balanc == "" AND $ano_dt_exp_balanc == "") 
{$dt_exp_balanc = ($dia_dt_exp_balanc."".$mes_dt_exp_balanc."".$ano_dt_exp_balanc); }
else 
{$dt_exp_balanc = ($dia_dt_exp_balanc."/".$mes_dt_exp_balanc."/".$ano_dt_exp_balanc); }
/*-------	SETOR BALANCEAMENTO	---------*/

/*-------	SETOR CALDERARIA 1	---------*/
$dia_dt_prog_cald1 = substr($dt_prog_cald1, -2); 
$mes_dt_prog_cald1 = substr($dt_prog_cald1, -5,2);
$ano_dt_prog_cald1 = substr($dt_prog_cald1, -10,4); 
if ($dia_dt_prog_cald1 == "" AND $mes_dt_prog_cald1 == "" AND $ano_dt_prog_cald1 == "") 
{$dt_prog_cald1 = ($dia_dt_prog_cald1."".$mes_dt_prog_cald1."".$ano_dt_prog_cald1); } 
else 
{$dt_prog_cald1 = ($dia_dt_prog_cald1."/".$mes_dt_prog_cald1."/".$ano_dt_prog_cald1); }

$dia_dt_producao_cald1 = substr($dt_producao_cald1, -2); 
$mes_dt_producao_cald1 = substr($dt_producao_cald1, -5,2);
$ano_dt_producao_cald1 = substr($dt_producao_cald1, -10,4); 
if ($dia_dt_producao_cald1 == "" AND $mes_dt_producao_cald1 == "" AND $ano_dt_producao_cald1 == "") 
{$dt_producao_cald1 = ($dia_dt_producao_cald1."".$mes_dt_producao_cald1."".$ano_dt_producao_cald1); }
else 
{$dt_producao_cald1 = ($dia_dt_producao_cald1."/".$mes_dt_producao_cald1."/".$ano_dt_producao_cald1); }

$dia_dt_exp_cald1 = substr($dt_exp_cald1, -2); 
$mes_dt_exp_cald1 = substr($dt_exp_cald1, -5,2);
$ano_dt_exp_cald1 = substr($dt_exp_cald1, -10,4); 
if ($dia_dt_exp_cald1 == "" AND $mes_dt_exp_cald1 == "" AND $ano_dt_exp_cald1 == "") 
{$dt_exp_cald1 = ($dia_dt_exp_cald1."".$mes_dt_exp_cald1."".$ano_dt_exp_cald1); }
else 
{$dt_exp_cald1 = ($dia_dt_exp_cald1."/".$mes_dt_exp_cald1."/".$ano_dt_exp_cald1); }
/*-------	SETOR CALDERARIA 1	---------*/

/*		SETOR CALD 2		*/
$dia_dt_prog_cald2 = substr($dt_prog_cald2, -2); 
$mes_dt_prog_cald2 = substr($dt_prog_cald2, -5,2);
$ano_dt_prog_cald2 = substr($dt_prog_cald2, -10,4); 
if ($dia_dt_prog_cald2 == "" AND $mes_dt_prog_cald2 == "" AND $ano_dt_prog_cald2 == "") 
{$dt_prog_cald2 = ($dia_dt_prog_cald2."".$mes_dt_prog_cald2."".$ano_dt_prog_cald2); } 
else {$dt_prog_cald2 = ($dia_dt_prog_cald2."/".$mes_dt_prog_cald2."/".$ano_dt_prog_cald2); }

$dia_dt_producao_cald2 = substr($dt_producao_cald2, -2); 
$mes_dt_producao_cald2 = substr($dt_producao_cald2, -5,2);
$ano_dt_producao_cald2 = substr($dt_producao_cald2, -10,4); 
if ($dia_dt_producao_cald2 == "" AND $mes_dt_producao_cald2 == "" AND $ano_dt_producao_cald2 == "") 
{$dt_producao_cald2 = ($dia_dt_producao_cald2."".$mes_dt_producao_cald2."".$ano_dt_producao_cald2); }
else 
{$dt_producao_cald2 = ($dia_dt_producao_cald2."/".$mes_dt_producao_cald2."/".$ano_dt_producao_cald2); }

$dia_dt_exp_cald2 = substr($dt_exp_cald2, -2); 
$mes_dt_exp_cald2 = substr($dt_exp_cald2, -5,2);
$ano_dt_exp_cald2 = substr($dt_exp_cald2, -10,4); 
if ($dia_dt_exp_cald2 == "" AND $mes_dt_exp_cald2 == "" AND $ano_dt_exp_cald2 == "") 
{$dt_exp_cald2 = ($dia_dt_exp_cald2."".$mes_dt_exp_cald2."".$ano_dt_exp_cald2); }
else 
{$dt_exp_cald2 = ($dia_dt_exp_cald2."/".$mes_dt_exp_cald2."/".$ano_dt_exp_cald2); }
/*		SETOR CALDERARIA 2		*/

/*-------	SETOR PINTURA	---------*/
$dia_dt_prog_pintura = substr($dt_prog_pintura, -2); 
$mes_dt_prog_pintura = substr($dt_prog_pintura, -5,2);
$ano_dt_prog_pintura = substr($dt_prog_pintura, -10,4); 
if ($dia_dt_prog_pintura == "" AND $mes_dt_prog_pintura == "" AND $ano_dt_prog_pintura == "") 
{$dt_prog_pintura = ($dia_dt_prog_pintura."".$mes_dt_prog_pintura."".$ano_dt_prog_pintura); } 
else 
{$dt_prog_pintura = ($dia_dt_prog_pintura."/".$mes_dt_prog_pintura."/".$ano_dt_prog_pintura); }

$dia_dt_producao_pintura = substr($dt_producao_pintura, -2); 
$mes_dt_producao_pintura = substr($dt_producao_pintura, -5,2);
$ano_dt_producao_pintura = substr($dt_producao_pintura, -10,4); 
if ($dia_dt_producao_pintura == "" AND $mes_dt_producao_pintura == "" AND $ano_dt_producao_pintura == "") 
{$dt_producao_pintura = ($dia_dt_producao_pintura."".$mes_dt_producao_pintura."".$ano_dt_producao_pintura); }
else 
{$dt_producao_pintura = ($dia_dt_producao_pintura."/".$mes_dt_producao_pintura."/".$ano_dt_producao_pintura); }

$dia_dt_exp_pintura = substr($dt_exp_pintura, -2); 
$mes_dt_exp_pintura = substr($dt_exp_pintura, -5,2);
$ano_dt_exp_pintura = substr($dt_exp_pintura, -10,4); 
if ($dia_dt_exp_pintura == "" AND $mes_dt_exp_pintura == "" AND $ano_dt_exp_pintura == "") 
{$dt_exp_pintura = ($dia_dt_exp_pintura."".$mes_dt_exp_pintura."".$ano_dt_exp_pintura); }
else 
{$dt_exp_pintura = ($dia_dt_exp_pintura."/".$mes_dt_exp_pintura."/".$ano_dt_exp_pintura); }
/*-------	SETOR PINTURA	---------*/


/*-------	SETOR MONTAGEM	---------*/
$dia_dt_prog_montagem = substr($dt_prog_montagem, -2); 
$mes_dt_prog_montagem = substr($dt_prog_montagem, -5,2);
$ano_dt_prog_montagem = substr($dt_prog_montagem, -10,4); 
if ($dia_dt_prog_montagem == "" AND $mes_dt_prog_montagem == "" AND $ano_dt_prog_montagem == "") 
{$dt_prog_montagem = ($dia_dt_prog_montagem."".$mes_dt_prog_montagem."".$ano_dt_prog_montagem); } 
else 
{$dt_prog_montagem = ($dia_dt_prog_montagem."/".$mes_dt_prog_montagem."/".$ano_dt_prog_montagem); }

$dia_dt_producao_montagem = substr($dt_producao_montagem, -2); 
$mes_dt_producao_montagem = substr($dt_producao_montagem, -5,2);
$ano_dt_producao_montagem = substr($dt_producao_montagem, -10,4); 
if ($dia_dt_producao_montagem == "" AND $mes_dt_producao_montagem == "" AND $ano_dt_producao_montagem == "") 
{$dt_producao_montagem = ($dia_dt_producao_montagem."".$mes_dt_producao_montagem."".$ano_dt_producao_montagem); }
else 
{$dt_producao_montagem = ($dia_dt_producao_montagem."/".$mes_dt_producao_montagem."/".$ano_dt_producao_montagem); }

$dia_dt_exp_montagem = substr($dt_exp_montagem, -2); 
$mes_dt_exp_montagem = substr($dt_exp_montagem, -5,2);
$ano_dt_exp_montagem = substr($dt_exp_montagem, -10,4); 
if ($dia_dt_exp_montagem == "" AND $mes_dt_exp_montagem == "" AND $ano_dt_exp_montagem == "") 
{$dt_exp_montagem = ($dia_dt_exp_montagem."".$mes_dt_exp_montagem."".$ano_dt_exp_montagem); }
else 
{$dt_exp_montagem = ($dia_dt_exp_montagem."/".$mes_dt_exp_montagem."/".$ano_dt_exp_montagem); }
/*-------	SETOR MONTAGEM	---------*/


/*-------	SETOR GABINETE	---------*/
$dia_dt_prog_gabinete = substr($dt_prog_gabinete, -2); 
$mes_dt_prog_gabinete = substr($dt_prog_gabinete, -5,2);
$ano_dt_prog_gabinete = substr($dt_prog_gabinete, -10,4); 
if ($dia_dt_prog_gabinete == "" AND $mes_dt_prog_gabinete == "" AND $ano_dt_prog_gabinete == "") 
{$dt_prog_gabinete = ($dia_dt_prog_gabinete."".$mes_dt_prog_gabinete."".$ano_dt_prog_gabinete); } 
else 
{$dt_prog_gabinete = ($dia_dt_prog_gabinete."/".$mes_dt_prog_gabinete."/".$ano_dt_prog_gabinete); }

$dia_dt_producao_gabinete = substr($dt_producao_gabinete, -2); 
$mes_dt_producao_gabinete = substr($dt_producao_gabinete, -5,2);
$ano_dt_producao_gabinete = substr($dt_producao_gabinete, -10,4); 
if ($dia_dt_producao_gabinete == "" AND $mes_dt_producao_gabinete == "" AND $ano_dt_producao_gabinete == "") 
{$dt_producao_gabinete = ($dia_dt_producao_gabinete."".$mes_dt_producao_gabinete."".$ano_dt_producao_gabinete); }
else 
{$dt_producao_gabinete = ($dia_dt_producao_gabinete."/".$mes_dt_producao_gabinete."/".$ano_dt_producao_gabinete); }

$dia_dt_exp_gabinete = substr($dt_exp_gabinete, -2); 
$mes_dt_exp_gabinete = substr($dt_exp_gabinete, -5,2);
$ano_dt_exp_gabinete = substr($dt_exp_gabinete, -10,4); 
if ($dia_dt_exp_gabinete == "" AND $mes_dt_exp_gabinete == "" AND $ano_dt_exp_gabinete == "") 
{$dt_exp_gabinete = ($dia_dt_exp_gabinete."".$mes_dt_exp_gabinete."".$ano_dt_exp_gabinete); }
else 
{$dt_exp_gabinete = ($dia_dt_exp_gabinete."/".$mes_dt_exp_gabinete."/".$ano_dt_exp_gabinete); }
/*-------	SETOR GABINETE	---------*/


/*		SETOR ROTOR LL		*/
$dia_dt_prog_rotor_ll = substr($dt_prog_rotor_ll, -2); 
$mes_dt_prog_rotor_ll = substr($dt_prog_rotor_ll, -5,2);
$ano_dt_prog_rotor_ll = substr($dt_prog_rotor_ll, -10,4); 
if ($dia_dt_prog_rotor_ll == "" AND $mes_dt_prog_rotor_ll == "" AND $ano_dt_prog_rotor_ll == "") 
{$dt_prog_rotor_ll = ($dia_dt_prog_rotor_ll."".$mes_dt_prog_rotor_ll."".$ano_dt_prog_rotor_ll); } 
else {$dt_prog_rotor_ll = ($dia_dt_prog_rotor_ll."/".$mes_dt_prog_rotor_ll."/".$ano_dt_prog_rotor_ll); }

$dia_dt_producao_rotor_ll = substr($dt_producao_rotor_ll, -2); 
$mes_dt_producao_rotor_ll = substr($dt_producao_rotor_ll, -5,2);
$ano_dt_producao_rotor_ll = substr($dt_producao_rotor_ll, -10,4); 
if ($dia_dt_producao_rotor_ll == "" AND $mes_dt_producao_rotor_ll == "" AND $ano_dt_producao_rotor_ll == "") 
{$dt_producao_rotor_ll = ($dia_dt_producao_rotor_ll."".$mes_dt_producao_rotor_ll."".$ano_dt_producao_rotor_ll); }
else 
{$dt_producao_rotor_ll = ($dia_dt_producao_rotor_ll."/".$mes_dt_producao_rotor_ll."/".$ano_dt_producao_rotor_ll); }

$dia_dt_exp_rotor_ll = substr($dt_exp_rotor_ll, -2); 
$mes_dt_exp_rotor_ll = substr($dt_exp_rotor_ll, -5,2);
$ano_dt_exp_rotor_ll = substr($dt_exp_rotor_ll, -10,4); 
if ($dia_dt_exp_rotor_ll == "" AND $mes_dt_exp_rotor_ll == "" AND $ano_dt_exp_rotor_ll == "") 
{$dt_exp_rotor_ll = ($dia_dt_exp_rotor_ll."".$mes_dt_exp_rotor_ll."".$ano_dt_exp_rotor_ll); }
else 
{$dt_exp_rotor_ll = ($dia_dt_exp_rotor_ll."/".$mes_dt_exp_rotor_ll."/".$ano_dt_exp_rotor_ll); }
/*		SETOR ROTOR LL		*/

/*		SETOR ROTOR SIR		*/
$dia_dt_prog_rotor_sir = substr($dt_prog_rotor_sir, -2); 
$mes_dt_prog_rotor_sir = substr($dt_prog_rotor_sir, -5,2);
$ano_dt_prog_rotor_sir = substr($dt_prog_rotor_sir, -10,4); 
if ($dia_dt_prog_rotor_sir == "" AND $mes_dt_prog_rotor_sir == "" AND $ano_dt_prog_rotor_sir == "") 
{$dt_prog_rotor_sir = ($dia_dt_prog_rotor_sir."".$mes_dt_prog_rotor_sir."".$ano_dt_prog_rotor_sir); } 
else {$dt_prog_rotor_sir = ($dia_dt_prog_rotor_sir."/".$mes_dt_prog_rotor_sir."/".$ano_dt_prog_rotor_sir); }

$dia_dt_producao_rotor_sir = substr($dt_producao_rotor_sir, -2); 
$mes_dt_producao_rotor_sir = substr($dt_producao_rotor_sir, -5,2);
$ano_dt_producao_rotor_sir = substr($dt_producao_rotor_sir, -10,4); 
if ($dia_dt_producao_rotor_sir == "" AND $mes_dt_producao_rotor_sir == "" AND $ano_dt_producao_rotor_sir == "") 
{$dt_producao_rotor_sir = ($dia_dt_producao_rotor_sir."".$mes_dt_producao_rotor_sir."".$ano_dt_producao_rotor_sir); }
else 
{$dt_producao_rotor_sir = ($dia_dt_producao_rotor_sir."/".$mes_dt_producao_rotor_sir."/".$ano_dt_producao_rotor_sir); }

$dia_dt_exp_rotor_sir = substr($dt_exp_rotor_sir, -2); 
$mes_dt_exp_rotor_sir = substr($dt_exp_rotor_sir, -5,2);
$ano_dt_exp_rotor_sir = substr($dt_exp_rotor_sir, -10,4); 
if ($dia_dt_exp_rotor_sir == "" AND $mes_dt_exp_rotor_sir == "" AND $ano_dt_exp_rotor_sir == "") 
{$dt_exp_rotor_sir = ($dia_dt_exp_rotor_sir."".$mes_dt_exp_rotor_sir."".$ano_dt_exp_rotor_sir); }
else 
{$dt_exp_rotor_sir = ($dia_dt_exp_rotor_sir."/".$mes_dt_exp_rotor_sir."/".$ano_dt_exp_rotor_sir); }
/*		SETOR ROTOR SIR		*/


/*-------	SETOR USINAGEM EIXO	---------*/
$dia_dt_prog_usinagem_eixo = substr($dt_prog_usinagem_eixo, -2); 
$mes_dt_prog_usinagem_eixo = substr($dt_prog_usinagem_eixo, -5,2);
$ano_dt_prog_usinagem_eixo = substr($dt_prog_usinagem_eixo, -10,4); 
if ($dia_dt_prog_usinagem_eixo == "" AND $mes_dt_prog_usinagem_eixo == "" AND $ano_dt_prog_usinagem_eixo == "") 
{$dt_prog_usinagem_eixo = ($dia_dt_prog_usinagem_eixo."".$mes_dt_prog_usinagem_eixo."".$ano_dt_prog_usinagem_eixo); } 
else 
{$dt_prog_usinagem_eixo = ($dia_dt_prog_usinagem_eixo."/".$mes_dt_prog_usinagem_eixo."/".$ano_dt_prog_usinagem_eixo); }

$dia_dt_producao_usinagem_eixo = substr($dt_producao_usinagem_eixo, -2); 
$mes_dt_producao_usinagem_eixo = substr($dt_producao_usinagem_eixo, -5,2);
$ano_dt_producao_usinagem_eixo = substr($dt_producao_usinagem_eixo, -10,4); 
if ($dia_dt_producao_usinagem_eixo == "" AND $mes_dt_producao_usinagem_eixo == "" AND $ano_dt_producao_usinagem_eixo == "") 
{$dt_producao_usinagem_eixo = ($dia_dt_producao_usinagem_eixo."".$mes_dt_producao_usinagem_eixo."".$ano_dt_producao_usinagem_eixo); }
else 
{$dt_producao_usinagem_eixo = ($dia_dt_producao_usinagem_eixo."/".$mes_dt_producao_usinagem_eixo."/".$ano_dt_producao_usinagem_eixo); }

$dia_dt_exp_usinagem_eixo = substr($dt_exp_usinagem_eixo, -2); 
$mes_dt_exp_usinagem_eixo = substr($dt_exp_usinagem_eixo, -5,2);
$ano_dt_exp_usinagem_eixo = substr($dt_exp_usinagem_eixo, -10,4); 
if ($dia_dt_exp_usinagem_eixo == "" AND $mes_dt_exp_usinagem_eixo == "" AND $ano_dt_exp_usinagem_eixo == "") 
{$dt_exp_usinagem_eixo = ($dia_dt_exp_usinagem_eixo."".$mes_dt_exp_usinagem_eixo."".$ano_dt_exp_usinagem_eixo); }
else 
{$dt_exp_usinagem_eixo = ($dia_dt_exp_usinagem_eixo."/".$mes_dt_exp_usinagem_eixo."/".$ano_dt_exp_usinagem_eixo); }
/*-------	SETOR USINAGEM EIXO ---------*/

/*-------	SETOR USINAGEM NUC_CUBO	---------*/
$dia_dt_prog_usinagem_nuc_cubo = substr($dt_prog_usinagem_nuc_cubo, -2); 
$mes_dt_prog_usinagem_nuc_cubo = substr($dt_prog_usinagem_nuc_cubo, -5,2);
$ano_dt_prog_usinagem_nuc_cubo = substr($dt_prog_usinagem_nuc_cubo, -10,4); 
if ($dia_dt_prog_usinagem_nuc_cubo == "" AND $mes_dt_prog_usinagem_nuc_cubo == "" AND $ano_dt_prog_usinagem_nuc_cubo == "") 
{$dt_prog_usinagem_nuc_cubo = ($dia_dt_prog_usinagem_nuc_cubo."".$mes_dt_prog_usinagem_nuc_cubo."".$ano_dt_prog_usinagem_nuc_cubo); } 
else 
{$dt_prog_usinagem_nuc_cubo = ($dia_dt_prog_usinagem_nuc_cubo."/".$mes_dt_prog_usinagem_nuc_cubo."/".$ano_dt_prog_usinagem_nuc_cubo); }

$dia_dt_producao_usinagem_nuc_cubo = substr($dt_producao_usinagem_nuc_cubo, -2); 
$mes_dt_producao_usinagem_nuc_cubo = substr($dt_producao_usinagem_nuc_cubo, -5,2);
$ano_dt_producao_usinagem_nuc_cubo = substr($dt_producao_usinagem_nuc_cubo, -10,4); 
if ($dia_dt_producao_usinagem_nuc_cubo == "" AND $mes_dt_producao_usinagem_nuc_cubo == "" AND $ano_dt_producao_usinagem_nuc_cubo == "") 
{$dt_producao_usinagem_nuc_cubo = ($dia_dt_producao_usinagem_nuc_cubo."".$mes_dt_producao_usinagem_nuc_cubo."".$ano_dt_producao_usinagem_nuc_cubo); }
else 
{$dt_producao_usinagem_nuc_cubo = ($dia_dt_producao_usinagem_nuc_cubo."/".$mes_dt_producao_usinagem_nuc_cubo."/".$ano_dt_producao_usinagem_nuc_cubo); }

$dia_dt_exp_usinagem_nuc_cubo = substr($dt_exp_usinagem_nuc_cubo, -2); 
$mes_dt_exp_usinagem_nuc_cubo = substr($dt_exp_usinagem_nuc_cubo, -5,2);
$ano_dt_exp_usinagem_nuc_cubo = substr($dt_exp_usinagem_nuc_cubo, -10,4); 
if ($dia_dt_exp_usinagem_nuc_cubo == "" AND $mes_dt_exp_usinagem_nuc_cubo == "" AND $ano_dt_exp_usinagem_nuc_cubo == "") 
{$dt_exp_usinagem_nuc_cubo = ($dia_dt_exp_usinagem_nuc_cubo."".$mes_dt_exp_usinagem_nuc_cubo."".$ano_dt_exp_usinagem_nuc_cubo); }
else 
{$dt_exp_usinagem_nuc_cubo = ($dia_dt_exp_usinagem_nuc_cubo."/".$mes_dt_exp_usinagem_nuc_cubo."/".$ano_dt_exp_usinagem_nuc_cubo); }
/*-------	SETOR USINAGEM NUC_CUBO ---------*/

/*-------	SETOR USINAGEM POL_MOT	---------*/
$dia_dt_prog_usinagem_pol_mot = substr($dt_prog_usinagem_pol_mot, -2); 
$mes_dt_prog_usinagem_pol_mot = substr($dt_prog_usinagem_pol_mot, -5,2);
$ano_dt_prog_usinagem_pol_mot = substr($dt_prog_usinagem_pol_mot, -10,4); 
if ($dia_dt_prog_usinagem_pol_mot == "" AND $mes_dt_prog_usinagem_pol_mot == "" AND $ano_dt_prog_usinagem_pol_mot == "") 
{$dt_prog_usinagem_pol_mot = ($dia_dt_prog_usinagem_pol_mot."".$mes_dt_prog_usinagem_pol_mot."".$ano_dt_prog_usinagem_pol_mot); } 
else 
{$dt_prog_usinagem_pol_mot = ($dia_dt_prog_usinagem_pol_mot."/".$mes_dt_prog_usinagem_pol_mot."/".$ano_dt_prog_usinagem_pol_mot); }

$dia_dt_producao_usinagem_pol_mot = substr($dt_producao_usinagem_pol_mot, -2); 
$mes_dt_producao_usinagem_pol_mot = substr($dt_producao_usinagem_pol_mot, -5,2);
$ano_dt_producao_usinagem_pol_mot = substr($dt_producao_usinagem_pol_mot, -10,4); 
if ($dia_dt_producao_usinagem_pol_mot == "" AND $mes_dt_producao_usinagem_pol_mot == "" AND $ano_dt_producao_usinagem_pol_mot == "") 
{$dt_producao_usinagem_pol_mot = ($dia_dt_producao_usinagem_pol_mot."".$mes_dt_producao_usinagem_pol_mot."".$ano_dt_producao_usinagem_pol_mot); }
else 
{$dt_producao_usinagem_pol_mot = ($dia_dt_producao_usinagem_pol_mot."/".$mes_dt_producao_usinagem_pol_mot."/".$ano_dt_producao_usinagem_pol_mot); }

$dia_dt_exp_usinagem_pol_mot = substr($dt_exp_usinagem_pol_mot, -2); 
$mes_dt_exp_usinagem_pol_mot = substr($dt_exp_usinagem_pol_mot, -5,2);
$ano_dt_exp_usinagem_pol_mot = substr($dt_exp_usinagem_pol_mot, -10,4); 
if ($dia_dt_exp_usinagem_pol_mot == "" AND $mes_dt_exp_usinagem_pol_mot == "" AND $ano_dt_exp_usinagem_pol_mot == "") 
{$dt_exp_usinagem_pol_mot = ($dia_dt_exp_usinagem_pol_mot."".$mes_dt_exp_usinagem_pol_mot."".$ano_dt_exp_usinagem_pol_mot); }
else 
{$dt_exp_usinagem_pol_mot = ($dia_dt_exp_usinagem_pol_mot."/".$mes_dt_exp_usinagem_pol_mot."/".$ano_dt_exp_usinagem_pol_mot); }
/*-------	SETOR USINAGEM POL_MOT ---------*/

/*-------	SETOR USINAGEM POL_VENT  ---------*/
$dia_dt_prog_usinagem_pol_vent = substr($dt_prog_usinagem_pol_vent, -2); 
$mes_dt_prog_usinagem_pol_vent = substr($dt_prog_usinagem_pol_vent, -5,2);
$ano_dt_prog_usinagem_pol_vent = substr($dt_prog_usinagem_pol_vent, -10,4); 
if ($dia_dt_prog_usinagem_pol_vent == "" AND $mes_dt_prog_usinagem_pol_vent == "" AND $ano_dt_prog_usinagem_pol_vent == "") 
{$dt_prog_usinagem_pol_vent = ($dia_dt_prog_usinagem_pol_vent."".$mes_dt_prog_usinagem_pol_vent."".$ano_dt_prog_usinagem_pol_vent); } 
else 
{$dt_prog_usinagem_pol_vent = ($dia_dt_prog_usinagem_pol_vent."/".$mes_dt_prog_usinagem_pol_vent."/".$ano_dt_prog_usinagem_pol_vent); }

$dia_dt_producao_usinagem_pol_vent = substr($dt_producao_usinagem_pol_vent, -2); 
$mes_dt_producao_usinagem_pol_vent = substr($dt_producao_usinagem_pol_vent, -5,2);
$ano_dt_producao_usinagem_pol_vent = substr($dt_producao_usinagem_pol_vent, -10,4); 
if ($dia_dt_producao_usinagem_pol_vent == "" AND $mes_dt_producao_usinagem_pol_vent == "" AND $ano_dt_producao_usinagem_pol_vent == "") 
{$dt_producao_usinagem_pol_vent = ($dia_dt_producao_usinagem_pol_vent."".$mes_dt_producao_usinagem_pol_vent."".$ano_dt_producao_usinagem_pol_vent); }
else 
{$dt_producao_usinagem_pol_vent = ($dia_dt_producao_usinagem_pol_vent."/".$mes_dt_producao_usinagem_pol_vent."/".$ano_dt_producao_usinagem_pol_vent); }

$dia_dt_exp_usinagem_pol_vent = substr($dt_exp_usinagem_pol_vent, -2); 
$mes_dt_exp_usinagem_pol_vent = substr($dt_exp_usinagem_pol_vent, -5,2);
$ano_dt_exp_usinagem_pol_vent = substr($dt_exp_usinagem_pol_vent, -10,4); 
if ($dia_dt_exp_usinagem_pol_vent == "" AND $mes_dt_exp_usinagem_pol_vent == "" AND $ano_dt_exp_usinagem_pol_vent == "") 
{$dt_exp_usinagem_pol_vent = ($dia_dt_exp_usinagem_pol_vent."".$mes_dt_exp_usinagem_pol_vent."".$ano_dt_exp_usinagem_pol_vent); }
else 
{$dt_exp_usinagem_pol_vent = ($dia_dt_exp_usinagem_pol_vent."/".$mes_dt_exp_usinagem_pol_vent."/".$ano_dt_exp_usinagem_pol_vent); }
/*-------	SETOR USINAGEM POL_VENT ---------*/

/*-------	SETOR USINAGEM GAXETA	---------*/
$dia_dt_prog_usinagem_gaxeta = substr($dt_prog_usinagem_gaxeta, -2); 
$mes_dt_prog_usinagem_gaxeta = substr($dt_prog_usinagem_gaxeta, -5,2);
$ano_dt_prog_usinagem_gaxeta = substr($dt_prog_usinagem_gaxeta, -10,4); 
if ($dia_dt_prog_usinagem_gaxeta == "" AND $mes_dt_prog_usinagem_gaxeta == "" AND $ano_dt_prog_usinagem_gaxeta == "") 
{$dt_prog_usinagem_gaxeta = ($dia_dt_prog_usinagem_gaxeta."".$mes_dt_prog_usinagem_gaxeta."".$ano_dt_prog_usinagem_gaxeta); } 
else 
{$dt_prog_usinagem_gaxeta = ($dia_dt_prog_usinagem_gaxeta."/".$mes_dt_prog_usinagem_gaxeta."/".$ano_dt_prog_usinagem_gaxeta); }

$dia_dt_producao_usinagem_gaxeta = substr($dt_producao_usinagem_gaxeta, -2); 
$mes_dt_producao_usinagem_gaxeta = substr($dt_producao_usinagem_gaxeta, -5,2);
$ano_dt_producao_usinagem_gaxeta = substr($dt_producao_usinagem_gaxeta, -10,4); 
if ($dia_dt_producao_usinagem_gaxeta == "" AND $mes_dt_producao_usinagem_gaxeta == "" AND $ano_dt_producao_usinagem_gaxeta == "") 
{$dt_producao_usinagem_gaxeta = ($dia_dt_producao_usinagem_gaxeta."".$mes_dt_producao_usinagem_gaxeta."".$ano_dt_producao_usinagem_gaxeta); }
else 
{$dt_producao_usinagem_gaxeta = ($dia_dt_producao_usinagem_gaxeta."/".$mes_dt_producao_usinagem_gaxeta."/".$ano_dt_producao_usinagem_gaxeta); }

$dia_dt_exp_usinagem_gaxeta = substr($dt_exp_usinagem_gaxeta, -2); 
$mes_dt_exp_usinagem_gaxeta = substr($dt_exp_usinagem_gaxeta, -5,2);
$ano_dt_exp_usinagem_gaxeta = substr($dt_exp_usinagem_gaxeta, -10,4); 
if ($dia_dt_exp_usinagem_gaxeta == "" AND $mes_dt_exp_usinagem_gaxeta == "" AND $ano_dt_exp_usinagem_gaxeta == "") 
{$dt_exp_usinagem_gaxeta = ($dia_dt_exp_usinagem_gaxeta."".$mes_dt_exp_usinagem_gaxeta."".$ano_dt_exp_usinagem_gaxeta); }
else 
{$dt_exp_usinagem_gaxeta = ($dia_dt_exp_usinagem_gaxeta."/".$mes_dt_exp_usinagem_gaxeta."/".$ano_dt_exp_usinagem_gaxeta); }
/*-------	SETOR USINAGEM GAXETA ---------*/

/*-------	SETOR EXPEDICAO	---------*/
$dia_dt_prog_expedicao = substr($dt_prog_expedicao, -2); 
$mes_dt_prog_expedicao = substr($dt_prog_expedicao, -5,2);
$ano_dt_prog_expedicao = substr($dt_prog_expedicao, -10,4); 
if ($dia_dt_prog_expedicao == "" AND $mes_dt_prog_expedicao == "" AND $ano_dt_prog_expedicao == "") 
{$dt_prog_expedicao = ($dia_dt_prog_expedicao."".$mes_dt_prog_expedicao."".$ano_dt_prog_expedicao); } 
else 
{$dt_prog_expedicao = ($dia_dt_prog_expedicao."/".$mes_dt_prog_expedicao."/".$ano_dt_prog_expedicao); }

$dia_dt_producao_expedicao = substr($dt_producao_expedicao, -2); 
$mes_dt_producao_expedicao = substr($dt_producao_expedicao, -5,2);
$ano_dt_producao_expedicao = substr($dt_producao_expedicao, -10,4); 
if ($dia_dt_producao_expedicao == "" AND $mes_dt_producao_expedicao == "" AND $ano_dt_producao_expedicao == "") 
{$dt_producao_expedicao = ($dia_dt_producao_expedicao."".$mes_dt_producao_expedicao."".$ano_dt_producao_expedicao); }
else 
{$dt_producao_expedicao = ($dia_dt_producao_expedicao."/".$mes_dt_producao_expedicao."/".$ano_dt_producao_expedicao); }

$dia_dt_exp_expedicao = substr($dt_exp_expedicao, -2); 
$mes_dt_exp_expedicao = substr($dt_exp_expedicao, -5,2);
$ano_dt_exp_expedicao = substr($dt_exp_expedicao, -10,4); 
if ($dia_dt_exp_expedicao == "" AND $mes_dt_exp_expedicao == "" AND $ano_dt_exp_expedicao == "") 
{$dt_exp_expedicao = ($dia_dt_exp_expedicao."".$mes_dt_exp_expedicao."".$ano_dt_exp_expedicao); }
else 
{$dt_exp_expedicao = ($dia_dt_exp_expedicao."/".$mes_dt_exp_expedicao."/".$ano_dt_exp_expedicao); }
/*-------	SETOR EXPEDICAO	---------*/


/*-------	SETOR FUNILARIA	---------*/
$dia_dt_prog_funilaria = substr($dt_prog_funilaria, -2); 
$mes_dt_prog_funilaria = substr($dt_prog_funilaria, -5,2);
$ano_dt_prog_funilaria = substr($dt_prog_funilaria, -10,4); 
if ($dia_dt_prog_funilaria == "" AND $mes_dt_prog_funilaria == "" AND $ano_dt_prog_funilaria == "") 
{$dt_prog_funilaria = ($dia_dt_prog_funilaria."".$mes_dt_prog_funilaria."".$ano_dt_prog_funilaria); } 
else 
{$dt_prog_funilaria = ($dia_dt_prog_funilaria."/".$mes_dt_prog_funilaria."/".$ano_dt_prog_funilaria); }

$dia_dt_producao_funilaria = substr($dt_producao_funilaria, -2); 
$mes_dt_producao_funilaria = substr($dt_producao_funilaria, -5,2);
$ano_dt_producao_funilaria = substr($dt_producao_funilaria, -10,4); 
if ($dia_dt_producao_funilaria == "" AND $mes_dt_producao_funilaria == "" AND $ano_dt_producao_funilaria == "") 
{$dt_producao_funilaria = ($dia_dt_producao_funilaria."".$mes_dt_producao_funilaria."".$ano_dt_producao_funilaria); }
else 
{$dt_producao_funilaria = ($dia_dt_producao_funilaria."/".$mes_dt_producao_funilaria."/".$ano_dt_producao_funilaria); }

$dia_dt_exp_funilaria = substr($dt_exp_funilaria, -2); 
$mes_dt_exp_funilaria = substr($dt_exp_funilaria, -5,2);
$ano_dt_exp_funilaria = substr($dt_exp_funilaria, -10,4); 
if ($dia_dt_exp_funilaria == "" AND $mes_dt_exp_funilaria == "" AND $ano_dt_exp_funilaria == "") 
{$dt_exp_funilaria = ($dia_dt_exp_funilaria."".$mes_dt_exp_funilaria."".$ano_dt_exp_funilaria); }
else 
{$dt_exp_funilaria = ($dia_dt_exp_funilaria."/".$mes_dt_exp_funilaria."/".$ano_dt_exp_funilaria); }
/*-------	SETOR FUNILARIA	---------*/

/*-------	SETOR LASER	---------*/
$dia_dt_prog_laser = substr($dt_prog_laser, -2); 
$mes_dt_prog_laser = substr($dt_prog_laser, -5,2);
$ano_dt_prog_laser = substr($dt_prog_laser, -10,4); 
if ($dia_dt_prog_laser == "" AND $mes_dt_prog_laser == "" AND $ano_dt_prog_laser == "") 
{$dt_prog_laser = ($dia_dt_prog_laser."".$mes_dt_prog_laser."".$ano_dt_prog_laser); } 
else 
{$dt_prog_laser = ($dia_dt_prog_laser."/".$mes_dt_prog_laser."/".$ano_dt_prog_laser); }

$dia_dt_producao_laser = substr($dt_producao_laser, -2); 
$mes_dt_producao_laser = substr($dt_producao_laser, -5,2);
$ano_dt_producao_laser = substr($dt_producao_laser, -10,4); 
if ($dia_dt_producao_laser == "" AND $mes_dt_producao_laser == "" AND $ano_dt_producao_laser == "") 
{$dt_producao_laser = ($dia_dt_producao_laser."".$mes_dt_producao_laser."".$ano_dt_producao_laser); }
else 
{$dt_producao_laser = ($dia_dt_producao_laser."/".$mes_dt_producao_laser."/".$ano_dt_producao_laser); }

$dia_dt_exp_laser = substr($dt_exp_laser, -2); 
$mes_dt_exp_laser = substr($dt_exp_laser, -5,2);
$ano_dt_exp_laser = substr($dt_exp_laser, -10,4); 
if ($dia_dt_exp_laser == "" AND $mes_dt_exp_laser == "" AND $ano_dt_exp_laser == "") 
{$dt_exp_laser = ($dia_dt_exp_laser."".$mes_dt_exp_laser."".$ano_dt_exp_laser); }
else 
{$dt_exp_laser = ($dia_dt_exp_laser."/".$mes_dt_exp_laser."/".$ano_dt_exp_laser); }

/*-------	SETOR LASER	---------*/



/* ----------------------- CONVERTER DATAS	------------------------------------*/

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
			onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;">
			

<? /* ------- ID  ------- */ ?>
<input class=nedita_left readonly type=hidden name="id[<?echo$x;?>]" value="<?echo $id?>" size="2">	

<?	/* MOSTRAR NUMERO O.S  */   ?>
<? if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) { ?>
<TD align=middle ><P class=bordas>
<?	if ( $check_num_os == "" ) { ?>
<span style="width:55px;word-wrap:break-word;"> 
<?echo $num_os ."/". $item;?> 
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR DATA ENTREGA  */   ?>
<? if ( $lib_data_entrega == "ver" OR $lib_data_entrega == "alt" ) { ?>
<TD align=middle ><P class=bordas>
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
	
<?	/* MOSTRAR DESCRICÃO DO VENTILADOR  */   ?>
<? if ( $lib_descr_vent == "ver" OR $lib_descr_vent == "alt" ) { ?>
<TD class=left align=middle ><P class=bordas>
<?	if ( $check_descr_vent == "" ) { ?>
<span style="width:450px;word-wrap:break-word;"> 

<? if ( $gab == "") {
					$gab = "";
		} else 
		$gab = "GAB";
	?>

<?$rest = substr("$nome_cliente", 0, 10); echo "$rest";?> - <?echo "$qt";?>x - <?echo "$descr_vent";?> - <?echo "$modelo";?> - <?echo "$tamanho";?> / <?echo "$arranjo";?> - <?echo "$classe";?> - <?echo "$rotacao";?> - <?echo "$pintura";?> - <?echo "$construcao";?> - <?echo "$gab";?>

<?  ?>

</span>
<? } } ?>
</P></TD>

<?   /* MOTOR MAXSIG */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$motor_maxsig";?> 
</span>
<? } } ?>
</P></TD>

<?   /* POLIA MAXSIG */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$polia_maxsig";?> 
</span>
<? } } ?>
</P></TD>

<?   /* FUND MAXSIG */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$fund_maxsig";?> 
</span>
<? } } ?>
</P></TD>

<?   /* OUTROS MAXSIG */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$outros_maxsig";?> 
</span>
<? } } ?>
</P></TD>


<?   /*------------	 SETORES PCP 	-------------*/  ?>

<?   /* STATUS ALMOX 
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_almox";?> 
</span>
<? } } ?>
</P></TD> */ ?>

<?   /* STATUS USINAGEM EIXO */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_usinagem_eixo";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS USINAGEM NUC_CUBO */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_usinagem_nuc_cubo";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS USINAGEM POL_MOT */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_usinagem_pol_mot";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS USINAGEM POL_VENT */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_usinagem_pol_vent";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS USINAGEM GAXETA */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_usinagem_gaxeta";?> 
</span>
<? } } ?>
</P></TD> 

<?   /* STATUS CORTE */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_corte";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS CALDERARIA 1 */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_cald1";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS CALDERARIA 2 */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_cald2";?> 
</span>
<? } } ?>
</P></TD>
<?   /* MESA CALDERARIA 2 */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$mesa_cald2";?> 
</span>
<? } } ?>
</P></TD>


<?   /* STATUS ROTOR LL */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_rotor_ll";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS ROTOR SIR */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_rotor_sir";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS MONTAGEM */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_montagem";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS GABINETE */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_gabinete";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS BALANCEAMENTO */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_balanc";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS PINTURA */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_pintura";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS EXPEDICAO */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_expedicao";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS FUNILARIA */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_funilaria";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS LASER */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$status_laser";?> 
</span>
<? } } ?>
</P></TD>



<?   /*------------	 SETORES PCP 	-------------*/  ?>



<?   /*------------	 SETORES PARA VIZUALIZAR PLACAR -------------*/  ?>

<?   /* STATUS ALMOX */  ?>
<? if ( $lib_almox_placar == "ver" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_almox_placar == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
<?echo "$status_almox";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS CORTE */  ?>
<? if ( $lib_corte_placar == "ver" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_corte_placar == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
<?echo "$status_corte";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS BALANCEAMENTO */  ?>
<? if ( $lib_balanc_placar == "ver" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_balanc_placar == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
<?echo "$status_balanc";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS CALDERARIA 1 */  ?>
<? if ( $lib_cald1_placar == "ver" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_cald1_placar == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
<?echo "$status_cald1";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS CALDERARIA 2 */  ?>
<? if ( $lib_cald1_placar == "ver" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
<?echo "$status_cald2";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS MONTAGEM */  ?>
<? if ( $lib_montagem_placar == "ver" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_montagem_placar == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
<?echo "$status_montagem";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS GABINETE */  ?>
<? if ( $lib_gabinete_placar == "ver" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_gabinete_placar == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
<?echo "$status_gabinete";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS PINTURA */  ?>
<? if ( $lib_pintura_placar == "ver" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_pintura_placar == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
<?echo "$status_pintura";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS ROTOR LL */  ?>
<? if ( $lib_rotor_ll_placar == "ver" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_rotor_ll_placar == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
<?echo "$status_rotor_ll";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS ROTOR SIR */  ?>
<? if ( $lib_rotor_sir_placar == "ver" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_rotor_sir_placar == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
<?echo "$status_rotor_sir";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS USINAGEM EIXO */  ?>
<? if ( $lib_usinagem_placar == "ver" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_usinagem_placar == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
<?echo "$status_usinagem_eixo";?> 
</span>
<? } ?>
</P></TD>

<?   /* STATUS USINAGEM NUC_CUBO */  ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_usinagem_placar == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
<?echo "$status_usinagem_nuc_cubo";?> 
</span>
<? } ?>
</P></TD>

<?   /* STATUS USINAGEM POL_MOT */  ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_usinagem_placar == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
<?echo "$status_usinagem_pol_mot";?> 
</span>
<? } ?>
</P></TD>

<?   /* STATUS USINAGEM POL_VENT */  ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_usinagem_placar == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
<?echo "$status_usinagem_pol_vent";?> 
</span>
<? } ?>
</P></TD>

<?   /* STATUS USINAGEM GAXETA */  ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_usinagem_placar == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
<?echo "$status_usinagem_gaxeta";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS EXPEDICAO */  ?>
<? if ( $lib_expedicao_placar == "ver" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_expedicao_placar == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
<?echo "$status_expedicao";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS FUNILARIA */  ?>
<? if ( $lib_funilaria_placar == "ver" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_funilaria_placar == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
<?echo "$status_funilaria";?> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS LASER */  ?>
<? if ( $lib_laser_placar == "ver" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_laser_placar == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
<?echo "$status_laser";?> 
</span>
<? } } ?>
</P></TD>


<?   /*------------	 SETORES PARA VIZUALIZAR PLACAR 	-------------*/  ?>



<?	/*------------- 	SETOR ALMOX		 -----------*/   ?>

<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>
<? if ( $lib_almox == "alt" OR $lib_almox == "ver" ) {
	if ( $check_almox == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;">
<select name=status_almox_novo[<?echo$x;?>] >
<option value='' <? echo ($status_almox==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_almox=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_almox=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_almox=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_almox=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_almox_velho[<?echo$x;?>] value="<?echo $status_almox_db?>" size="11">

<?	/* DT PRODUCAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_producao_almox_velho[<?echo$x;?>] value="<?echo $dt_producao_almox?>" size="11">

<?	/* DT EXPEDICAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_exp_almox_velho[<?echo$x;?>] value="<?echo $dt_exp_almox?>" size="11">

</span>
</P></TD>


<? } ?>
<? } ?>

<?/*-----------		SETOR ALMOX		-----------*/?>


<?	/*------------- SETOR USINAGEM -----------*/   ?>

<?/* SETOR EIXO */?>

<? if ( $lib_usinagem_eixo == "alt" OR $lib_usinagem_eixo == "ver" ) {
	if ( $check_usinagem_eixo == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select name=status_usinagem_eixo_novo[<?echo$x;?>] >
<option value='' <? echo ($status_usinagem_eixo==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_usinagem_eixo=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_usinagem_eixo=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_usinagem_eixo=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_usinagem_eixo=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_usinagem_eixo_velho[<?echo$x;?>] value="<?echo $status_usinagem_eixo_db?>" size="11">

<?	/* DT PRODUCAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_producao_usinagem_eixo_velho[<?echo$x;?>] value="<?echo $dt_producao_usinagem_eixo?>" size="11">

<?	/* DT EXPEDICAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_exp_usinagem_eixo_velho[<?echo$x;?>] value="<?echo $dt_exp_usinagem_eixo?>" size="11">

</span>
</P></TD>

<? } ?>
<? } ?>

<?/* SETOR EIXO */?>


<?/* SETOR NUC_CUBO */?>

<? if ( $lib_usinagem_nuc_cubo == "alt" OR $lib_usinagem_nuc_cubo == "ver" ) {
	if ( $check_usinagem_nuc_cubo == "" ) { ?>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select name=status_usinagem_nuc_cubo_novo[<?echo$x;?>] >
<option value='' <? echo ($status_usinagem_nuc_cubo==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_usinagem_nuc_cubo=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_usinagem_nuc_cubo=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_usinagem_nuc_cubo=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_usinagem_nuc_cubo=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_usinagem_nuc_cubo_velho[<?echo$x;?>] value="<?echo $status_usinagem_nuc_cubo_db?>" size="11">

<?	/* DT PRODUCAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_producao_usinagem_nuc_cubo_velho[<?echo$x;?>] value="<?echo $dt_producao_usinagem_nuc_cubo?>" size="11">

<?	/* DT EXPEDICAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_exp_usinagem_nuc_cubo_velho[<?echo$x;?>] value="<?echo $dt_exp_usinagem_nuc_cubo?>" size="11">

</span>
</P></TD>

<? } ?>
<? } ?>

<?/* SETOR NUC_CUBO */?>


<?/* SETOR POL_MOT */?>

<? if ( $lib_usinagem_pol_mot == "alt" OR $lib_usinagem_pol_mot == "ver" ) {
	if ( $check_usinagem_pol_mot == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select name=status_usinagem_pol_mot_novo[<?echo$x;?>] >
<option value='' <? echo ($status_usinagem_pol_mot==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_usinagem_pol_mot=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_usinagem_pol_mot=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_usinagem_pol_mot=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_usinagem_pol_mot=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_usinagem_pol_mot_velho[<?echo$x;?>] value="<?echo $status_usinagem_pol_mot_db?>" size="11">

<?	/* DT PRODUCAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_producao_usinagem_pol_mot_velho[<?echo$x;?>] value="<?echo $dt_producao_usinagem_pol_mot?>" size="11">

<?	/* DT EXPEDICAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_exp_usinagem_pol_mot_velho[<?echo$x;?>] value="<?echo $dt_exp_usinagem_pol_mot?>" size="11">

</span>
</P></TD>

<? } ?>
<? } ?>

<?/* SETOR POL_MOT */?>


<?/* SETOR POL_VENT */?>

<? if ( $lib_usinagem_pol_vent == "alt" OR $lib_usinagem_pol_vent == "ver" ) {
	if ( $check_usinagem_pol_vent == "" ) { ?>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select name=status_usinagem_pol_vent_novo[<?echo$x;?>] >
<option value='' <? echo ($status_usinagem_pol_vent==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_usinagem_pol_vent=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_usinagem_pol_vent=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_usinagem_pol_vent=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_usinagem_pol_vent=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_usinagem_pol_vent_velho[<?echo$x;?>] value="<?echo $status_usinagem_pol_vent_db?>" size="11">

<?	/* DT PRODUCAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_producao_usinagem_pol_vent_velho[<?echo$x;?>] value="<?echo $dt_producao_usinagem_pol_vent?>" size="11">

<?	/* DT EXPEDICAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_exp_usinagem_pol_vent_velho[<?echo$x;?>] value="<?echo $dt_exp_usinagem_pol_vent?>" size="11">

</span>
</P></TD>

<? } ?>
<? } ?>

<?/* SETOR POL_VENT */?>


<?/* SETOR GAXETA */?>

<? if ( $lib_usinagem_gaxeta == "alt" OR $lib_usinagem_gaxeta == "ver" ) {
	if ( $check_usinagem_gaxeta == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select name=status_usinagem_gaxeta_novo[<?echo$x;?>] >
<option value='' <? echo ($status_usinagem_gaxeta==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_usinagem_gaxeta=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_usinagem_gaxeta=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_usinagem_gaxeta=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_usinagem_gaxeta=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_usinagem_gaxeta_velho[<?echo$x;?>] value="<?echo $status_usinagem_gaxeta_db?>" size="11">

<?	/* DT PRODUCAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_producao_usinagem_gaxeta_velho[<?echo$x;?>] value="<?echo $dt_producao_usinagem_gaxeta?>" size="11">

<?	/* DT EXPEDICAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_exp_usinagem_gaxeta_velho[<?echo$x;?>] value="<?echo $dt_exp_usinagem_gaxeta?>" size="11">

</span>
</P></TD>

<? } ?>
<? } ?>

<?/* SETOR GAXETA */?>


<?	/*------------- SETOR USINAGEM -----------*/   ?>

	
<?	/*------------- SETOR CORTE -----------*/   ?>

<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>
<? if ( $lib_corte == "alt" OR $lib_corte == "ver" ) {
	if ( $check_corte == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;">
<select name=status_corte_novo[<?echo$x;?>] >
<option value='' <? echo ($status_corte==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_corte=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_corte=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_corte=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_corte=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_corte_velho[<?echo$x;?>] value="<?echo $status_corte_db?>" size="11">

<?	/* DT PRODUCAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_producao_corte_velho[<?echo$x;?>] value="<?echo $dt_producao_corte?>" size="11">

<?	/* DT EXPEDICAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_exp_corte_velho[<?echo$x;?>] value="<?echo $dt_exp_corte?>" size="11">

</span>
</P></TD>

<? } ?>
<? } 

/*-----------	SETOR CORTE	-----------*/?>

<?	/*------------- SETOR CALDERARIA 1 -----------*/   ?>

<? if ( $lib_cald1 == "alt" OR $lib_cald1 == "ver" ) {
	if ( $check_cald1 == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select name=status_cald1_novo[<?echo$x;?>] >
<option value='' <? echo ($status_cald1==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_cald1=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_cald1=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_cald1=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_cald1=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_cald1_velho[<?echo$x;?>] value="<?echo $status_cald1_db?>" size="11">

<?	/* DT PRODUCAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_producao_cald1_velho[<?echo$x;?>] value="<?echo $dt_producao_cald1?>" size="11">

<?	/* DT EXPEDICAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_exp_cald1_velho[<?echo$x;?>] value="<?echo $dt_exp_cald1?>" size="11">

</span>
</P></TD>

<? } ?>
<? } ?>

<?	/*------------- SETOR CALDERARIA 1 -----------*/   ?>


<?	/*------------- SETOR CALDERARIA 2 -----------*/   ?>

<? if ( $lib_cald2 == "alt" OR $lib_cald2 == "ver" ) {
	if ( $check_cald2 == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas>  
<span style="width:50px;word-wrap:break-word;"> 
<select name=status_cald2_novo[<?echo$x;?>] >
<option value='' <? echo ($status_cald2==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_cald2=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_cald2=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_cald2=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_cald2=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_cald2_velho[<?echo$x;?>] value="<?echo $status_cald2_db?>" size="11">


<?	/* DT PRODUCAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_producao_cald2_velho[<?echo$x;?>] value="<?echo $dt_producao_cald2?>" size="11">

<?	/* DT EXPEDICAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_exp_cald2_velho[<?echo$x;?>] value="<?echo $dt_exp_cald2?>" size="11">

</span>
</P></TD>


<?	/* CARCAÇA  
<TD align=middle><P class=bordas>  
<span style="width:50px;word-wrap:break-word;"> 
<select name=carcaca_cald2_novo[<?echo$x;?>] >
<option value='' <? echo ($carcaca_cald2==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($carcaca_cald2=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($carcaca_cald2=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($carcaca_cald2=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($carcaca_cald2=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* CARCACA ANTIGO DO BANCO 
<input readonly type=hidden name=carcaca_cald2_velho[<?echo$x;?>] value="<?echo $carcaca_cald2_db?>" size="11">

</span>
</P></TD>
*/   ?>

<?	/* MESA  */   ?>
<TD align=middle><P class=bordas>  
<span style="width:50px;word-wrap:break-word;"> 
<select name=mesa_cald2_novo[<?echo$x;?>] >
<option value='' <? echo ($mesa_cald2==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($mesa_cald2=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($mesa_cald2=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($mesa_cald2=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($mesa_cald2=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* MESA ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=mesa_cald2_velho[<?echo$x;?>] value="<?echo $mesa_cald2_db?>" size="11">

</span>
</P></TD>

<?	/* ACESSORIO  
<TD align=middle><P class=bordas>  
<span style="width:50px;word-wrap:break-word;" > 
<select name=acessorio_cald2_novo[<?echo$x;?>] >
<option value='' <? echo ($acessorio_cald2==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($acessorio_cald2=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($acessorio_cald2=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($acessorio_cald2=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($acessorio_cald2=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* ACESSORIO ANTIGO DO BANCO 
<input readonly type=hidden name=acessorio_cald2_velho[<?echo$x;?>] value="<?echo $acessorio_cald2_db?>" size="11">

</span>
</P></TD>*/   ?>

<? } ?>
<? } ?>

<?	/*------------- SETOR CALDERARIA 2 -----------*/   ?>



<?	/*------------- SETOR ROTOR LL -----------*/   ?>


<? if ( $lib_rotor_ll == "alt" OR $lib_rotor_ll == "ver" ) {
	if ( $check_rotor_ll == "" ) { ?>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select name=status_rotor_ll_novo[<?echo$x;?>] >
<option value='' <? echo ($status_rotor_ll==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_rotor_ll=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_rotor_ll=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_rotor_ll=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_rotor_ll=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_rotor_ll_velho[<?echo$x;?>] value="<?echo $status_rotor_ll_db?>" size="11">

<?	/* DT PRODUCAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_producao_rotor_ll_velho[<?echo$x;?>] value="<?echo $dt_producao_rotor_ll?>" size="11">

<?	/* DT EXPEDICAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_exp_rotor_ll_velho[<?echo$x;?>] value="<?echo $dt_exp_rotor_ll?>" size="11">

</span>
</P></TD>

<? } ?>
<? } ?>

<?	/*------------- SETOR ROTOR LL -----------*/   ?>


<?	/*------------- SETOR ROTOR SIR -----------*/   ?>


<? if ( $lib_rotor_sir == "alt" OR $lib_rotor_sir == "ver" ) {
	if ( $check_rotor_sir == "" ) { ?>

	
<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select name=status_rotor_sir_novo[<?echo$x;?>] >
<option value='' <? echo ($status_rotor_sir==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_rotor_sir=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_rotor_sir=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_rotor_sir=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_rotor_sir=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_rotor_sir_velho[<?echo$x;?>] value="<?echo $status_rotor_sir_db?>" size="11">

<?	/* DT PRODUCAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_producao_rotor_sir_velho[<?echo$x;?>] value="<?echo $dt_producao_rotor_sir?>" size="11">

<?	/* DT EXPEDICAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_exp_rotor_sir_velho[<?echo$x;?>] value="<?echo $dt_exp_rotor_sir?>" size="11">

</span>
</P></TD>

<? } ?>
<? } ?>

<?	/*------------- SETOR ROTOR SIR -----------*/   ?>




<?	/*------------- SETOR MONTAGEM -----------*/   ?>

<? if ( $lib_montagem == "alt" OR $lib_montagem == "ver" ) {
	if ( $check_montagem == "" ) { ?>


<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select name=status_montagem_novo[<?echo$x;?>] >
<option value='' <? echo ($status_montagem==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_montagem=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_montagem=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_montagem=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_montagem=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_montagem_velho[<?echo$x;?>] value="<?echo $status_montagem_db?>" size="11">

<?	/* DT PRODUCAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_producao_montagem_velho[<?echo$x;?>] value="<?echo $dt_producao_montagem?>" size="11">

<?	/* DT EXPEDICAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_exp_montagem_velho[<?echo$x;?>] value="<?echo $dt_exp_montagem?>" size="11">

</span>
</P></TD>

<? } ?>
<? } ?>

<?	/*------------- SETOR MONTAGEM -----------*/   ?>


<?	/*------------- SETOR GABINETE  -----------*/   ?>

<? if ( $lib_gabinete == "alt" OR $lib_gabinete == "ver" ) {
	if ( $check_gabinete == "" ) { ?>


<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select name=status_gabinete_novo[<?echo$x;?>] >
<option value='' <? echo ($status_gabinete==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_gabinete=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_gabinete=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_gabinete=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_gabinete=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_gabinete_velho[<?echo$x;?>] value="<?echo $status_gabinete_db?>" size="11">

<?	/* DT PRODUCAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_producao_gabinete_velho[<?echo$x;?>] value="<?echo $dt_producao_gabinete?>" size="11">

<?	/* DT EXPEDICAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_exp_gabinete_velho[<?echo$x;?>] value="<?echo $dt_exp_gabinete?>" size="11">

</span>
</P></TD>

<? } ?>
<? } ?>

<?	/*------------- SETOR GABINETE -----------*/   ?>


<?	/*------------- SETOR BALANCEAMENTO -----------*/   ?>

<? if ( $lib_balanc == "alt" OR $lib_balanc == "ver" ) {
	if ( $check_balanc == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select name=status_balanc_novo[<?echo$x;?>] >
<option value='' <? echo ($status_balanc==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_balanc=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_balanc=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_balanc=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_balanc=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_balanc_velho[<?echo$x;?>] value="<?echo $status_balanc_db?>" size="11">

<?	/* DT PRODUCAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_producao_balanc_velho[<?echo$x;?>] value="<?echo $dt_producao_balanc?>" size="11">

<?	/* DT EXPEDICAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_exp_balanc_velho[<?echo$x;?>] value="<?echo $dt_exp_balanc?>" size="11">

</span>
</P></TD>

<? } ?>
<? } ?>

<?	/*------------- SETOR BALANCEAMENTO -----------*/   ?>



<?	/*------------- SETOR PINTURA -----------*/   ?>

<? if ( $lib_pintura_setor == "alt" OR $lib_pintura_setor == "ver" ) {
	if ( $check_pintura_setor == "" ) { ?>


<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select name=status_pintura_novo[<?echo$x;?>] >
<option value='' <? echo ($status_pintura==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_pintura=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_pintura=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_pintura=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_pintura=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_pintura_velho[<?echo$x;?>] value="<?echo $status_pintura_db?>" size="11">

<?	/* DT PRODUCAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_producao_pintura_velho[<?echo$x;?>] value="<?echo $dt_producao_pintura?>" size="11">

<?	/* DT EXPEDICAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_exp_pintura_velho[<?echo$x;?>] value="<?echo $dt_exp_pintura?>" size="11">

</span>
</P></TD>

<? } ?>
<? } ?>

<?	/*------------- SETOR PINTURA -----------*/   ?>


<?	/*------------- 	SETOR EXPEDICAO		 -----------*/   ?>

<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>
<? if ( $lib_expedicao == "alt" OR $lib_expedicao == "ver" ) {
	if ( $check_expedicao == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;">
<select name=status_expedicao_novo[<?echo$x;?>] >
<option value='' <? echo ($status_expedicao==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_expedicao=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_expedicao=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_expedicao=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_expedicao=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_expedicao_velho[<?echo$x;?>] value="<?echo $status_expedicao_db?>" size="11">

<?	/* DT PRODUCAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_producao_expedicao_velho[<?echo$x;?>] value="<?echo $dt_producao_expedicao?>" size="11">

<?	/* DT EXPEDICAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_exp_expedicao_velho[<?echo$x;?>] value="<?echo $dt_exp_expedicao?>" size="11">

</span>
</P></TD>


<? } ?>
<? } ?>

<?/*-----------		SETOR EXPEDICAO		-----------*/?>


<?	/*------------- 	SETOR FUNILARIA		 -----------*/   ?>

<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>
<? if ( $lib_funilaria == "alt" OR $lib_funilaria == "ver" ) {
	if ( $check_funilaria == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;">
<select name=status_funilaria_novo[<?echo$x;?>] >
<option value='' <? echo ($status_funilaria==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_funilaria=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_funilaria=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_funilaria=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_funilaria=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_funilaria_velho[<?echo$x;?>] value="<?echo $status_funilaria_db?>" size="11">

<?	/* DT PRODUCAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_producao_funilaria_velho[<?echo$x;?>] value="<?echo $dt_producao_funilaria?>" size="11">

<?	/* DT EXPEDICAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_exp_funilaria_velho[<?echo$x;?>] value="<?echo $dt_exp_funilaria?>" size="11">

</span>
</P></TD>


<? } ?>
<? } ?>

<?/*-----------		SETOR FUNILARIA		-----------*/?>




<?/*------------- SETOR LASER -----------*/   ?>

<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>
<? if ( $lib_laser == "alt" OR $lib_laser == "ver" ) {
	if ( $check_laser == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;">
<select name=status_laser_novo[<?echo$x;?>] >
<option value='' <? echo ($status_laser==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_laser=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_laser=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_laser=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_laser=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_laser_velho[<?echo$x;?>] value="<?echo $status_laser_db?>" size="11">

<?	/* DT PRODUCAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_producao_laser_velho[<?echo$x;?>] value="<?echo $dt_producao_laser?>" size="11">

<?	/* DT EXPEDICAO ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=dt_exp_laser_velho[<?echo$x;?>] value="<?echo $dt_exp_laser?>" size="11">

</span>
</P></TD>

<? } ?>
<? } 

/*-----------	SETOR LASER	-----------*/?>

	
		</TR>  
		
		
<? 
$valor_total_os = $valor_total_os + $valor_total; 
$quant_os = $quant_os + 1;  
$qt_total = $qt_total + $qt; 
?>

<?   /* FECHAMENTO DO WHILE */  ?>	
<? } ?>	


		<TR class=sem_borda>
	
<? if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) { ?>
<TD align=middle><P class=borda>
<?	if ( $check_num_os == "" ) { ?>
<span style="width:65px;word-wrap:break-word;"> O.S </span>
<? 
$dias_atraso_total = $soma_dias_atraso / $quant_os;
$pontualidade = $soma_pont_item * 100/ $quant_os;

//FORMULA ATRASO E PONTUALIDADE DA FABRICA
$dias_atraso_total_fab = $soma_dias_atraso_fab / $quant_os;
$pontualidade_fab = $soma_pont_item_fab * 100/ $quant_os;
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

	
	<? if ( $lib_data_entrega == "ver" OR $lib_data_entrega == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_data_entrega == "" ) { ?> 
	<? } } ?>

	<? if ( $lib_descr_vent == "ver" OR $lib_descr_vent == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_descr_vent == "" ) { ?>          
	<? } } ?>

<? if ( $lib_corte == "ver" OR $lib_corte == "alt" ) { ?>
	<TD colspan="1" rowspan="1"><P class=bordas>
<?	if ( $check_corte == "" ) { ?>
<? } } ?>	
	
	<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" ) { ?>
	<TD colspan="10" rowspan="1"><P class=bordas>
	<?	if ( $check_balanc == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" ) { ?>
	<TD colspan="7" rowspan="1"><P class=bordas>
	<?	if ( $check_cald1 == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" ) { ?>
	<TD colspan="7" rowspan="1"><P class=bordas>
	<?	if ( $check_cald2 == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_montagem == "ver" OR $lib_montagem == "alt" ) { ?>
	<TD colspan="7" rowspan="1"><P class=bordas>
	<?	if ( $check_montagem == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_gabinete == "ver" OR $lib_gabinete == "alt" ) { ?>
	<TD colspan="7" rowspan="1"><P class=bordas>
	<?	if ( $check_gabinete == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" ) { ?>
	<TD colspan="7" rowspan="1"><P class=bordas>
	<?	if ( $check_pintura == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" ) { ?>
	<TD colspan="7" rowspan="1"><P class=bordas>
	<?	if ( $check_rotor_ll == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" ) { ?>
	<TD colspan="7" rowspan="1"><P class=bordas>
	<?	if ( $check_rotor_sir == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_usinagem == "ver" OR $lib_usinagem == "alt" ) { ?>
	<TD colspan="5" rowspan="1"><P class=bordas>
	<?	if ( $check_usinagem == "" ) { ?>
	<? } } ?>
	
	
	<? if ( $lib_laser == "ver" OR $lib_laser == "alt" ) { ?>
	<TD colspan="1" rowspan="1"><P class=bordas>
<?	if ( $check_laser == "" ) { ?>
<? } } ?>	
	
		</TR>
			      
			</TBODY>			
			</TABLE>
			</TD>
			
<?   /* --------	ALTERAR GERAL ---------	*/  ?>	
<? if ( $lib_alterar_geral == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<input class="botao1" name="alterar_tudo" type="button" value="Alterar Tudo" Onclick="Alterar_Placar();">
</span>
</P></TD>
<? } ?>	
<?   /* --------	ALTERAR GERAL ---------	*/  ?>			
			
				  
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
	  
<?   /* --------	ALTERAR GERAL ---------	*/  ?>	
<? if ( $lib_alterar_geral == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<input class="botao1" name="alterar_tudo" type="button" value="Alterar Tudo" Onclick="Alterar_Placar();">
</span>
</P></TD>
<? } ?>	
<?   /* --------	ALTERAR GERAL ---------	*/  ?>	 	  
	  
	  </TABLE>
	   


<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="calendario/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>

</form>
</body>
</html>

<script>
var arvorenum_os = new Array(<?= $palavrasnum_os ?>);
var arvore_valor = new Array(<?= $palavras_valor ?>);
var arvore_res_corte = new Array(<?= $palavras_valor_res_corte ?>);
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

