<? include "valida_sessao.php" ; include "config_pcp.php"; ?>

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

<body style="overflow-x:scroll;y:hidden;">

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

/* SETOR GABINETE */
$lib_expedicao = $linha["lib_expedicao"];
/* SETOR GABINETE */

/* SETOR FUNILARIA */
$lib_funilaria = $linha["lib_funilaria"];
/* SETOR FUNILARIA */

/* SETOR LASER */
$lib_laser = $linha["lib_laser"];
/* SETOR LASER */ 

$lib_almox_placar = $linha["lib_almox_placar"];
$lib_gabinete_placar = $linha["lib_gabinete_placar"];
$lib_corte_placar = $linha["lib_corte_placar"];
$lib_balanc_placar = $linha["lib_balanc_placar"];
$lib_cald1_placar = $linha["lib_cald1_placar"];
$lib_cald2_placar = $linha["lib_cald2_placar"];
$lib_rotor_ll_placar = $linha["lib_rotor_ll_placar"];
$lib_rotor_sir_placar = $linha["lib_rotor_sir_placar"];
$lib_usinagem_placar = $linha["lib_usinagem_placar"];
$lib_pintura_placar = $linha["lib_pintura_placar"];
$lib_expedicao_placar = $linha["lib_expedicao_placar"];
$lib_funilaria_placar = $linha["lib_funilaria_placar"];
$lib_laser_placar = $linha["lib_laser_placar"];
}

/*  ----------------	BUSCAR DADOS DE LIBERAÇÃO ------------------	*/

?>

<form action="" method="post" name="pcp">



<? /* -------------	CONFIGURAÇÃO PARA BUSCAR OS NUMEROS DA O.S	------------------- */ ?>

<table class=sem_borda width=100% align="center">
<tr>
</tr>
</table>

<? /* -------------	CONFIGURAÇÃO PARA BUSCAR OS NUMEROS DA O.S	------------------- */ ?>

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
              
<? /* ------------------------------------- ORGANIZAR ---------------------------------------- */ ?>

		<TR class=linha_cabecalho>

<? /* NUM_OS */ ?>             
<? if ( $lib_num_os == "ver" Or $lib_num_os == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="num_os" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Organizar Núm. O.S'); return true;" onMouseOut="nd(); return true;">
<?	if (  $check_num_os == "" ) { ?> N° O.S 
<? } } ?></P></TH>

<? /* DATA DA ENTREGA */ ?>
<? if ( $lib_data_entrega == "ver" Or $lib_data_entrega == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="data_entrega" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Organizar Data Entrega'); return true;" onMouseOut="nd(); return true;">
<? if ( $check_data_entrega == "") {?> Dt. Entrega 
<? } } ?></P></TH>


<? /* DESCRICAO VENT */ ?>
<? if ( $lib_descr_vent == "ver" Or $lib_descr_vent == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>	
<? if ( $check_descr_vent == "") {?> 
<input class=botao4 type="radio" name="organizar" value="nome_cliente" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Nome Cliente.'); return true;" onMouseOut="nd(); return true;">N. C.
<input class=botao4 type="radio" name="organizar" value="qt" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Quant.'); return true;" onMouseOut="nd(); return true;">Qt
<input class=botao4 type="radio" name="organizar" value="descr_vent" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Desc. Vent.'); return true;" onMouseOut="nd(); return true;">Dv
<input class=botao4 type="radio" name="organizar" value="modelo" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Modelo'); return true;" onMouseOut="nd(); return true;">Md
<input class=botao4 type="radio" name="organizar" value="tamanho" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Tamanho'); return true;" onMouseOut="nd(); return true;">Tm
<input class=botao4 type="radio" name="organizar" value="arranjo" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Arranjo'); return true;" onMouseOut="nd(); return true;">Ar
<input class=botao4 type="radio" name="organizar" value="classe" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Classe'); return true;" onMouseOut="nd(); return true;">Cl
<input class=botao4 type="radio" name="organizar" value="rotacao" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Rotação'); return true;" onMouseOut="nd(); return true;">Rt
<input class=botao4 type="radio" name="organizar" value="pintura" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Pintura'); return true;" onMouseOut="nd(); return true;">Pt
<input class=botao4 type="radio" name="organizar" value="construcao" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Construção'); return true;" onMouseOut="nd(); return true;">Ct
<input class=botao4 type="radio" name="organizar" value="gab" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Gabinete'); return true;" onMouseOut="nd(); return true;">Gb
<? } } ?></P></TH>

<? /* ----- SETORES PARA VIZUALIZAR PLACAR ------*/ ?>

<? /* ALMOX */ ?>
<? if ( $lib_almox_placar == "ver" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_almox_placar == "" ) { ?>  Almox
<? } } ?>
</P></TH>

<? /* CORTE */ ?>
<? if ( $lib_corte_placar == "ver" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_corte_placar == "" ) { ?>  Corte
<? } } ?>
</P></TH>

<? /* BALANCEAMENTO */ ?>
<? if ( $lib_balanc_placar == "ver" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_balanc_placar == "" ) { ?>  Balanc
<? } } ?>
</P></TH>

<? /* CALD 1 */ ?>
<? if ( $lib_cald1_placar == "ver" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_cald1_placar == "" ) { ?>  Cald. I
<? } } ?>
</P></TH>

<? /* CALD 2 */ ?>
<? if ( $lib_cald2_placar == "ver" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_cald2_placar == "" ) { ?>  Cald. II
<? } } ?>
</P></TH>

<? /* MONTAGEM */ ?>
<? if ( $lib_montagem_placar == "ver" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_montagem_placar == "" ) { ?>  Montagem
<? } } ?>
</P></TH>

<? /* GABINETE */ ?>
<? if ( $lib_gabinete_placar == "ver" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_gabinete_placar == "" ) { ?>  Gabinete
<? } } ?>
</P></TH>

<? /* PINTURA */ ?>
<? if ( $lib_pintura_placar == "ver" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_pintura_placar == "" ) { ?>  Pint
<? } } ?>
</P></TH>

<? /* ROTOR LL */ ?>
<? if ( $lib_rotor_ll_placar == "ver" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_rotor_ll_placar == "" ) { ?>  Rt LL
<? } } ?>
</P></TH>

<? /* ROTOR SIR */ ?>
<? if ( $lib_rotor_sir_placar == "ver" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_rotor_sir_placar == "" ) { ?>  Rt SIR
<? } } ?>
</P></TH>

<? /* USINAGEM */ ?>
<? if ( $lib_usinagem_placar == "ver" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_usinagem_placar == "" ) { ?>  Eixo
<? } ?>
</P></TH>

<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_usinagem_placar == "" ) { ?>  Nuc. Cubo
<? } ?>
</P></TH>

<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_usinagem_placar == "" ) { ?>  Pol. Mot
<? } ?>
</P></TH>

<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_usinagem_placar == "" ) { ?>  Pol. Vent
<? } ?>
</P></TH>

<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_usinagem_placar == "" ) { ?>  Gaxeta
<? } } ?>
</P></TH> 

<? /* EXPEDICAO */ ?>
<? if ( $lib_expedicao_placar == "ver" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_expedicao_placar == "" ) { ?>  Expedição
<? } } ?>
</P></TH>

<? /* FUNILARIA */ ?>
<? if ( $lib_funilaria_placar == "ver" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_funilaria_placar == "" ) { ?>  Funilaria
<? } } ?>
</P></TH>

<? /* LASER */ ?>
<? if ( $lib_laser_placar == "ver" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_laser_placar == "" ) { ?>  Laser
<? } } ?>
</P></TH>

<? /* ----- SETORES PARA VIZUALIZAR PLACAR ------*/ ?>

<? /* MOTOR MAXSIG */ ?>

<? if ( $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_setor_ver == "" ) { ?>  Mot.
<? } } ?>
</P></TH>

<? /* MOTOR MAXSIG */ ?>

<? /* POLIA MAXSIG */ ?>

<? if ( $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_setor_ver == "" ) { ?>  Pol.
<? } } ?>
</P></TH>

<? /* POLIA MAXSIG */ ?>

<? /* FUND MAXSIG */ ?>

<? if ( $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_setor_ver == "" ) { ?>  Fund.
<? } } ?>
</P></TH>

<? /* FUND MAXSIG */ ?>


<? /* OUTROS MAXSIG */ ?>

<? if ( $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_setor_ver == "" ) { ?>  Outros
<? } } ?>
</P></TH>

<? /* OUTROS MAXSIG */ ?>




<? /* SETOR ALMOX */ ?>

<? if ( $lib_almox == "ver" OR $lib_almox == "alt" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_almox == "" ) { ?>  Almox
<? } } ?>
</P></TH>

<? /* SETOR ALMOX */ ?>

<? /* SETOR USINAGEM */ ?>

<? /* EIXO */ ?>
<? if ( $lib_usinagem_eixo == "ver" OR $lib_usinagem_eixo == "alt" OR $lib_setor_ver == "sim") {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_usinagem_eixo == "" ) { ?>  Eixo
<? } } ?>
</P></TH>
<? /* EIXO */ ?>

<? /* NUC_CUBO */ ?>
<? if ( $lib_usinagem_nuc_cubo == "ver" OR $lib_usinagem_nuc_cubo == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_usinagem_nuc_cubo == "" ) { ?>  Nuc. Cubo
<? } } ?>
</P></TH>
<? /* NUC_CUBO */ ?>

<? /* POL_MOT */ ?>
<? if ( $lib_usinagem_pol_mot == "ver" OR $lib_usinagem_pol_mot == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_usinagem_pol_mot == "" ) { ?>  Pol. Mot
<? } } ?>
</P></TH>
<? /* POL_MOT */ ?>

<? /* POL_VENT */ ?>
<? if ( $lib_usinagem_pol_vent == "ver" OR $lib_usinagem_pol_vent == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_usinagem_pol_vent == "" ) { ?> Pol. Vent
<? } } ?>
</P></TH>
<? /* POL_VENT */ ?>

<? /* GAXETA */ ?>
<? if ( $lib_usinagem_gaxeta == "ver" OR $lib_usinagem_gaxeta == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_usinagem_gaxeta == "" ) { ?> Gaxeta
<? } } ?>
</P></TH>
<? /* GAXETA */ ?>

<? /* SETOR USINAGEM */ ?>



<? /* SETOR CORTE */ ?>

<? if ( $lib_corte == "ver" OR $lib_corte == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_corte == "" ) { ?>  Corte
<? } } ?>
</P></TH>

<? /* SETOR CORTE */ ?>



<? /* SETOR CALD 1 */ ?>

<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_cald1 == "" ) { ?>  Cald. I
<? } } ?>
</P></TH>

<? /* SETOR CALD 1 */ ?>



<? /* SETOR CALD 2 */ ?>

<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_cald2 == "" ) { ?>  Cald. II
<? } } ?>
</P></TH>

<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" OR $lib_setor_ver == "sim" ) {?>
<? /*
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_cald2 == "" ) { ?>  Carc.
<? } ?>
</P></TH> */?>

<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_cald2 == "" ) { ?>  Mesa
<? } ?>
</P></TH>
<? /*
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_cald2 == "" ) { ?>  Acess.
<? } ?>
</P></TH> */?>
<? } ?>
<? /* SETOR CALD 2 */ ?>



<? /* SETOR ROTOR LL */ ?>

<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_rotor_ll == "" ) { ?>  Rt LL
<? } } ?>
</P></TH>

<? /* SETOR ROTOR LL */ ?>



<? /* SETOR ROTOR SIR */ ?>

<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_rotor_sir == "" ) { ?>  Rt SIR
<? } } ?>
</P></TH>

<? /* SETOR ROTOR SIR */ ?>


<? /* SETOR MONTAGEM */ ?>

<? if ( $lib_montagem == "ver" OR $lib_montagem == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_montagem == "" ) { ?>  Mont.
<? } } ?>
</P></TH>

<? /* SETOR MONTAGEM */ ?>


<? /* SETOR GABINETE*/ ?>

<? if ( $lib_gabinete == "ver" OR $lib_gabinete == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_gabinete == "" ) { ?>  Gab.
<? } } ?>
</P></TH>

<? /* SETOR GABINETE */ ?>


<? /* SETOR BALANCEAMENTO */ ?>

<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_balanc == "" ) { ?>  Balanc
<? } } ?>
</P></TH>

<? /* SETOR BALANCEAMENTO */ ?>


<? /* SETOR PINTURA */ ?>

<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_pintura_setor == "" ) { ?>  Pint.
<? } } ?>
</P></TH>

<? /* SETOR PINTURA */ ?>

<? /* SETOR EXPEDICAO */ ?>

<? if ( $lib_expedicao == "ver" OR $lib_expedicao == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_expedicao == "" ) { ?>  Exp.
<? } } ?>
</P></TH>

<? /* SETOR EXPEDICAO */ ?>

<? /* SETOR FUNILARIA */ ?>

<? if ( $lib_funilaria == "ver" OR $lib_funilaria == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_funilaria == "" ) { ?>  Fun.
<? } } ?>
</P></TH>

<? /* SETOR FUNILARIA */ ?>

<? /* SETOR LASER */ ?>

<? if ( $lib_laser == "ver" OR $lib_laser == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="1"><P class=bordas>
<?	if ( $check_laser == "" ) { ?>  Laser
<? } } ?>
</P></TH>

<? /* SETOR LASER */ ?>


<? /* FECHAR JANELA */ ?> 
<td width=8% align="right" rowspan="1" colspan="1" bgcolor="#99CCEA" >
<a  class="botao1" href="javascript:window.close()" target="_top"> Fecha Janela </a>
</Td>
	
	</TR> 


	<TR class=linha_cabecalho>

<? /* ----- SETORES PARA VIZUALIZAR PLACAR ------*/ ?>

<? /* ALMOX */ ?>

<? if ( $lib_almox_placar == "ver" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_almox" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Almoxarifado'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_almox_placar == "" ) { ?>  ST
<? } } ?>
</P></TH>

	
<? /* CORTE */ ?>

<? if ( $lib_corte_placar == "ver" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_corte" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Corte'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_corte_placar == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /* BALANCEAMENTO */ ?>

<? if ( $lib_balanc_placar == "ver" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_balance" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Balanceamento'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_balanc_placar == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /* CALD 1 */ ?>

<? if ( $lib_cald1_placar == "ver" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_cald1" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Calderaria 1'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_cald1_placar == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /* CALD 2 */ ?>

<? if ( $lib_cald2_placar == "ver" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_cald2" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Calderaria 2'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_cald2_placar == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /* MONTAGEM */ ?>

<? if ( $lib_montagem_placar == "ver" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_montagem" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Montagem'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_montagem_placar == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /* GABINETE */ ?>

<? if ( $lib_gabinete_placar == "ver" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_gabinete" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Gabinete'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_gabinete_placar == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /* PINTURA */ ?>

<? if ( $lib_pintura_placar == "ver" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_pintura" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Pintura'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_pintura_placar == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /* ROTOR LL */ ?>

<? if ( $lib_rotor_ll_placar == "ver" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_rotor_ll" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Rotor LL'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_rotor_ll_placar == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /* ROTOR SIR */ ?>

<? if ( $lib_rotor_sir_placar == "ver" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_rotor_sir" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Rotor SIR'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_rotor_sir_placar == "" ) { ?>  ST
<? } } ?>
</P></TH>

<?/* EIXO */?>

<? if ( $lib_usinagem_placar == "ver" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_usinagem_eixo" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Usi. Eixo'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_usinagem_placar == "" ) { ?>  ST
<? } } ?>
</P></TH> 

<?/* NUC_CUBO */?>

<? if ( $lib_usinagem_placar == "ver" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_usinagem_nuc_cubo" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Usi. Nuc.Cubo'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_usinagem_placar == "" ) { ?>  ST
<? } } ?>
</P></TH> 

<?/* POL_MOT */?>

<? if ( $lib_usinagem_placar == "ver" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_usinagem_pol_mot" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Usi. Pol.Mot'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_usinagem_placar == "" ) { ?>  ST
<? } } ?>
</P></TH> 

<?/* POL_VENT  */?>

<? if ( $lib_usinagem_placar == "ver" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_usinagem_pol_vent" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Usi. Pol.Vent'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_usinagem_placar == "" ) { ?>  ST
<? } } ?>
</P></TH>

<?/* GAXETA  */?>

<? if ( $lib_usinagem_placar == "ver" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_usinagem_gaxeta" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Usi. Gaxeta'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_usinagem_placar == "" ) { ?>  ST
<? } } ?>
</P></TH>

<?/* EXPEDICAO  */?>

<? if ( $lib_expedicao_placar == "ver" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_expedicao" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Expedição'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_expedicao_placar == "" ) { ?>  ST
<? } } ?>
</P></TH>

<?/* FUNILARIA  */?>

<? if ( $lib_funilaria_placar == "ver" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_funilaria" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Funilaria'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_funilaria_placar == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /* LASER */ ?>

<? if ( $lib_laser_placar == "ver" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_laser" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Laser'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_laser_placar == "" ) { ?>  ST
<? } } ?>
</P></TH>




<? /* ----- SETORES PARA VIZUALIZAR PLACAR ------*/ ?>


<? /*-------	MOTOR MAXSIG   --------*/ ?>


<? if ( $lib_setor_ver == "sim" ) { ?>

<? /* STATUS */ ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="motor_maxsig" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Motor Maxsig'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_setor_ver == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /*-------	MOTOR MAXSIG	  --------*/ ?>

<? /*-------	POLIA MAXSIG   --------*/ ?>


<? if ( $lib_setor_ver == "sim" ) { ?>

<? /* STATUS */ ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="polia_maxsig" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Polia Maxsig'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_setor_ver == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /*-------	POLIA MAXSIG	  --------*/ ?>

<? /*-------	FUND MAXSIG   --------*/ ?>


<? if ( $lib_setor_ver == "sim" ) { ?>

<? /* STATUS */ ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="fund_maxsig" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Fund. Maxsig'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_setor_ver == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /*-------	FUND MAXSIG	  --------*/ ?>


<? /*-------	OUTROS MAXSIG   --------*/ ?>


<? if ( $lib_setor_ver == "sim" ) { ?>

<? /* STATUS */ ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="outros_maxsig" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Outros Maxsig'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_setor_ver == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /*-------	OUTROS MAXSIG	  --------*/ ?>

<? /*-------	SETOR ALMOX   --------*/ ?>


<? if ( $lib_almox == "ver" OR $lib_almox == "alt" ) { ?>

<? /* STATUS */ ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_almox" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Almoxarifado'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_almox == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /*-------	SETOR ALMOX	  --------*/ ?>


<? /*-------	SETOR USINAGEM   --------*/ ?>

<?/* EIXO */?>

<? /* STATUS */ ?>
<? if ( $lib_usinagem_eixo == "ver" OR $lib_usinagem_eixo == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_usinagem_eixo" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Usi. Eixo'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_usinagem_eixo == "" ) { ?>  ST
<? } } ?>
</P></TH>

<?/* EIXO */?>


<?/* NUC_CUBO */?>

<? /* STATUS */ ?>
<? if ( $lib_usinagem_nuc_cubo == "ver" OR $lib_usinagem_nuc_cubo == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_usinagem_nuc_cubo" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Usi. Nuc.Cubo'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_usinagem_nuc_cubo == "" ) { ?>  ST
<? } } ?>
</P></TH>

<?/* NUC_CUBO */?>


<?/* POL_MOT */?>

<? /* STATUS */ ?>
<? if ( $lib_usinagem_pol_mot == "ver" OR $lib_usinagem_pol_mot == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_usinagem_pol_mot" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Usi. Pol.Mot'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_usinagem_pol_mot == "" ) { ?>  ST
<? } } ?>
</P></TH>

<?/* POL_MOT */?>


<?/* POL_VENT */?>

<? /* STATUS */ ?>
<? if ( $lib_usinagem_pol_vent == "ver" OR $lib_usinagem_pol_vent == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_usinagem_pol_vent" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Usi. Pol.Vent'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_usinagem_pol_vent == "" ) { ?>  ST
<? } } ?>
</P></TH>

<?/* POL_VENT */?>


<?/* GAXETA */?>

<? /* STATUS */ ?>
<? if ( $lib_usinagem_gaxeta == "ver" OR $lib_usinagem_gaxeta == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_usinagem_gaxeta" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Usi. Gaxeta'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_usinagem_gaxeta == "" ) { ?>  ST
<? } } ?>
</P></TH>

<?/* GAXETA */?>

<? /*-------	SETOR USINAGEM   --------*/ ?>

	
<? /*-------	SETOR CORTE   --------*/ ?>


<? if ( $lib_corte == "ver" OR $lib_corte == "alt" OR $lib_setor_ver == "sim" ) { ?>

<? /* STATUS */ ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_corte" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Corte'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_corte == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /*-------	SETOR CORTE   --------*/ ?>



<? /*-------	SETOR CALD 1   --------*/ ?>

<? /* STATUS */ ?>
<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_cald1" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Calderaria 1'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_cald1 == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /*-------	SETOR CALD 1   --------*/ ?>



<? /*-------	SETOR CALD 2   --------*/ ?>

<? /* STATUS */ ?>
<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" OR $lib_setor_ver == "sim" ) { ?>

<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_cald2" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Calderaria 2'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_cald2 == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" OR $lib_setor_ver == "sim" ) { ?>

<? /* CARCACA STATUS
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="carcaca_cald2" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Calderaria 2'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_cald2 == "" ) { ?>  ST
<? } ?>
</P></TH> */ ?>

<? /* MESA STATUS */ ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="mesa_cald2" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Calderaria 2'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_cald2 == "" ) { ?>  ST
<? } ?>
</P></TH>

<? /* ACESSORIO STATUS 
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="acessorio_cald2" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Calderaria 2'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_cald2 == "" ) { ?>  ST
<? } } ?>
</P></TH>*/ ?>
<? } ?>
<? /*-------	SETOR CALD 2   --------*/ ?>



<? /*-------	SETOR ROTOR LL   --------*/ ?>

<? /* STATUS */ ?>
<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_rotor_ll" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Rotor LL'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_rotor_ll == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /*-------	SETOR ROTOR LL   --------*/ ?>




<? /*-------	SETOR ROTOR SIR   --------*/ ?>

<? /* STATUS */ ?>
<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_rotor_sir" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Rotor SIR'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_rotor_sir == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /*-------	SETOR ROTOR SIR   --------*/ ?>



<? /*-------	SETOR MONTAGEM   --------*/ ?>

<? if ( $lib_montagem == "ver" OR $lib_montagem == "alt" OR $lib_setor_ver == "sim" ) { ?>

<? /* STATUS */ ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_montagem" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Montagem'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_montagem == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /*-------	SETOR MONTAGEM   --------*/ ?>


<? /*-------	SETOR GABINETE   --------*/ ?>

<? if ( $lib_gabinete == "ver" OR $lib_gabinete == "alt" OR $lib_setor_ver == "sim" ) { ?>

<? /* STATUS */ ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_gabinete" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Gabinete'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_gabinete == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /*-------	SETOR GABINETE   --------*/ ?>


<? /*-------	SETOR BALANCEAMENTO   --------*/ ?>

<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" OR $lib_setor_ver == "sim" ) { ?>

<? /* STATUS */ ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_balance" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Balanceamento'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_balanc == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /*-------	SETOR BALANCEAMENTO   --------*/ ?>


<? /*-------	SETOR PINTURA   --------*/ ?>

<? /* STATUS */ ?>
<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_pintura" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Pintura'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_pintura_setor == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /*-------	SETOR PINTURA   --------*/ ?>


<? /*-------	SETOR EXPEDICAO   --------*/ ?>

<? /* STATUS */ ?>
<? if ( $lib_expedicao == "ver" OR $lib_expedicao == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_expedicao" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Expedição'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_expedicao == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /*-------	SETOR EXPEDICAO   --------*/ ?>


<? /*-------	SETOR FUNILARIA   --------*/ ?>

<? /* STATUS */ ?>
<? if ( $lib_funilaria == "ver" OR $lib_funilaria == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_funilaria" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Funilaria'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_funilaria == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /*-------	SETOR FUNILARIA   --------*/ ?>

<? /*-------	SETOR LASER   --------*/ ?>


<? if ( $lib_laser == "ver" OR $lib_laser == "alt" OR $lib_setor_ver == "sim" ) { ?>

<? /* STATUS */ ?>
<TH align=middle widht="8%" ><P class=bordas>
<input class=botao4 type="radio" name="organizar" value="status_laser" onClick="Atualizar_Placar_PCP();" onMouseOver="drc('','Laser'); return true;" onMouseOut="nd(); return true;">
<?	if ( $check_laser == "" ) { ?>  ST
<? } } ?>
</P></TH>

<? /*-------	SETOR LASER   --------*/ ?>


	</TR>
	
	
<?
?>
	
		<TR class=linha1 border-style: solid; border-width: 1;>
			
<? /* ------- ID  ------- */ ?>
<input class=nedita_left readonly type=hidden name="id[<?echo$x;?>]" value="<?echo $id?>" size="2">	

<?	/* MOSTRAR NUMERO O.S  */   ?>
<? if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) { ?>
<TD align=middle bgcolor="#99CCEA" ><P class=bordas>
<?	if ( $check_num_os == "" ) { ?>
<span style="width:60px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR DATA ENTREGA  */   ?>
<? if ( $lib_data_entrega == "ver" OR $lib_data_entrega == "alt" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas>
<?	if ( $check_data_entrega == "" ) { ?>
<span style="width:72px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR DESCRICÃO DO VENTILADOR  */   ?>
<? if ( $lib_descr_vent == "ver" OR $lib_descr_vent == "alt" ) { ?>
<TD class=left align=middle bgcolor="#99CCEA"><P class=bordas >
<?	if ( $check_descr_vent == "" ) { ?>
<span style="width:450px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /*------------	 SETORES PCP 	-------------*/  ?>

<?   /* MOTOR MAXSIG*/  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* POLIA MAXSIG*/  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* FUND MAXSIG*/  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* OUTROS MAXSIG*/  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS ALMOX 
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>*/  ?>

<?   /* STATUS CORTE */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS CALDERARIA 1 */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS CALDERARIA 2 */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* MESA CALDERARIA 2 */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS ROTOR LL */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS ROTOR SIR */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS MONTAGEM */  ?>
<? if ( $lib_setor_ver == "sim"  ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS GABINETE */  ?>
<? if ( $lib_setor_ver == "sim"  ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS BALANCEAMENTO */  ?>
<? if ( $lib_setor_ver == "sim"  ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS PINTURA */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS USINAGEM EIXO */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS USINAGEM NUC CUBO */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS USINAGEM POL MOT */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS USINAGEM POL VENT */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS USINAGEM GAXETA */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS EXPEDICAO */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>


<?   /* STATUS FUNILARIA */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS LASER */  ?>
<? if ( $lib_setor_ver == "sim" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /*------------	 SETORES PCP 	-------------*/  ?>


<?  /*------------	 SETORES PARA VIZUALIZAR PLACAR -------------*/  ?>

<?   /* STATUS ALMOX */  ?>
<? if ( $lib_almox_placar == "ver") { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_almox_ver == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS CORTE */  ?>
<? if ( $lib_corte_placar == "ver") { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS BALANCEAMENTO */  ?>
<? if ( $lib_balanc_placar == "ver" ) { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS CALDERARIA 1 */  ?>
<? if ( $lib_cald1_placar == "ver") { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS CALDERARIA 2 */  ?>
<? if ( $lib_cald2_placar == "ver") { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS FUNILARIA */  ?>
<? if ( $lib_funilaria_placar == "ver") { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS MONTAGEM */  ?>
<? if ( $lib_montagem_placar == "ver") { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS GABINETE */  ?>
<? if ( $lib_gabinete_placar == "ver") { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS PINTURA */  ?>
<? if ( $lib_pintura_placar == "ver") { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS ROTOR LL */  ?>
<? if ( $lib_rotor_ll_placar == "ver") { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS ROTOR SIR */  ?>
<? if ( $lib_rotor_sir_placar == "ver") { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS USINAGEM EIXO */  ?>
<? if ( $lib_usinagem_placar == "ver") { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS USINAGEM NUC CUBO */  ?>
<? if ( $lib_usinagem_placar == "ver") { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS USINAGEM POL MOT */  ?>
<? if ( $lib_usinagem_placar == "ver") { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS USINAGEM POL VENT */  ?>
<? if ( $lib_usinagem_placar == "ver") { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS USINAGEM GAXETA */  ?>
<? if ( $lib_usinagem_placar == "ver") { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS GABINETE */  ?>
<? if ( $lib_expedicao_placar == "ver") { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>

<?   /* STATUS LASER */  ?>
<? if ( $lib_laser_placar == "ver") { ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<?	if ( $check_setor_ver == "" ) { ?>
<span style="width:50px;word-wrap:break-word;"> 
</span>
<? } } ?>
</P></TD>


<?   /*------------	 SETORES PARA VIZUALIZAR PLACAR -------------*/   ?>


<?	/*------------- SETOR ALMOX -----------*/   ?>

<? if ( $lib_almox == "alt" OR $lib_almox == "ver" ) {
	if ( $check_almox == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>
<? } 

  
/*-----------	SETOR ALMOX	-----------*/  ?>

	
<?	/*------------- SETOR CORTE -----------*/   ?>

<? if ( $lib_corte == "alt" OR $lib_corte == "ver" ) {
	if ( $check_corte == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>
<? } 

  
/*-----------	SETOR CORTE	-----------*/  ?>

<?	/*------------- SETOR CALDERARIA 1 -----------*/   ?>

<? if ( $lib_cald1 == "alt" OR $lib_cald1 == "ver" ) {
	if ( $check_cald1 == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>
<? } ?>

<?	/*------------- SETOR CALDERARIA 1 -----------*/   ?>


<?	/*------------- SETOR CALDERARIA 2 -----------*/   ?>

<? if ( $lib_cald2 == "alt" OR $lib_cald2 == "ver" ) {
	if ( $check_cald2 == "" ) { ?>

<?	/* STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>

	<? if ( $check_cald2 == "" ) { ?>

<?	/* CARCACA STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>

<? 	if ( $check_cald2 == "" ) { ?>

<?	/* MESA STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>

<? 	if ( $check_cald2 == "" ) { ?>

<?	/* ACESSORIO STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>
<? } ?> 

<?	/*------------- SETOR CALDERARIA 2 -----------*/   ?>


<?	/*------------- SETOR ROTOR LL -----------*/   ?>

<? if ( $lib_rotor_ll == "alt" OR $lib_rotor_ll == "ver" ) {
	if ( $check_rotor_ll == "" ) { ?>


<?	/* STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>
<? } ?>

<?	/*------------- SETOR ROTOR LL -----------*/   ?>


<?	/*------------- SETOR ROTOR SIR -----------*/   ?>

<? if ( $lib_rotor_sir == "alt" OR $lib_rotor_sir == "ver" ) {
	if ( $check_rotor_sir == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>
<? } ?>

<?	/*------------- SETOR ROTOR SIR -----------*/   ?>

<?	/*------------- SETOR BALANCEAMENTOS -----------*/   ?>

<? if ( $lib_balanc == "alt" OR $lib_balanc == "ver" ) {
	if ( $check_balanc == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>
<? } ?>

<?	/*------------- SETOR BALANCEAMENTO -----------*/   ?>


<?	/*------------- SETOR MONTAGEM -----------*/   ?>

<? if ( $lib_montagem == "alt" OR $lib_montagem == "ver" ) {
	if ( $check_montagem == "" ) { ?>


<?	/* STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>
<? } ?>

<?	/*------------- SETOR MONTAGEM -----------*/   ?>


<?	/*------------- SETOR GABINETE -----------*/   ?>

<? if ( $lib_gabinete == "alt" OR $lib_gabinete == "ver" ) {
	if ( $check_gabinete == "" ) { ?>


<?	/* STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>
<? } ?>

<?	/*------------- SETOR GABINETE -----------*/   ?>


<?	/*------------- SETOR PINTURA -----------*/   ?>

<? if ( $lib_pintura_setor == "alt" OR $lib_pintura_setor == "ver" ) {
	if ( $check_pintura_setor == "" ) { ?>


<?	/* STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>
<? } ?>

<?	/*------------- SETOR PINTURA -----------*/   ?>


<?	/*------------- SETOR USINAGEM -----------*/   ?>

<?/* SETOR EIXO */?>

<? if ( $lib_usinagem_eixo == "alt" OR $lib_usinagem_eixo == "ver" ) {
	if ( $check_usinagem_eixo == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>
<? } ?>

<?/* SETOR EIXO */?>


<?/* SETOR NUC_CUBO */?>

<? if ( $lib_usinagem_nuc_cubo == "alt" OR $lib_usinagem_nuc_cubo == "ver" ) {
	if ( $check_usinagem_nuc_cubo == "" ) { ?>

<?	/* STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>
<? } ?>

<?/* SETOR NUC_CUBO */?>


<?/* SETOR POL_MOT */?>

<? if ( $lib_usinagem_pol_mot == "alt" OR $lib_usinagem_pol_mot == "ver" ) {
	if ( $check_usinagem_pol_mot == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>
<? } ?>

<?/* SETOR POL_MOT */?>


<?/* SETOR POL_VENT */?>

<? if ( $lib_usinagem_pol_vent == "alt" OR $lib_usinagem_pol_vent == "ver" ) {
	if ( $check_usinagem_pol_vent == "" ) { ?>

<?	/* STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>
<? } ?>

<?/* SETOR POL_VENT */?>


<?/* SETOR GAXETA */?>

<? if ( $lib_usinagem_gaxeta == "alt" OR $lib_usinagem_gaxeta == "ver" ) {
	if ( $check_usinagem_gaxeta == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>
<? } ?>

<?/* SETOR GAXETA */?>

<?	/*------------- SETOR EXPEDICAO -----------*/   ?>

<? if ( $lib_expedicao == "alt" OR $lib_expedicao == "ver" ) {
	if ( $check_expedicao == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>
<? } 

  
/*-----------	SETOR EXPEDICAO	-----------*/  ?>


<?	/*------------- SETOR FUNILARIA -----------*/   ?>

<? if ( $lib_funilaria == "alt" OR $lib_funilaria == "ver" ) {
	if ( $check_funilaria == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>
<? } 

  
/*-----------	SETOR EXPEDICAO	-----------*/  ?>

<?	/*------------- SETOR LASER -----------*/   ?>

<? if ( $lib_laser == "alt" OR $lib_laser == "ver" ) {
	if ( $check_laser == "" ) { ?>
	
<?	/* STATUS  */   ?>
<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:50px;word-wrap:break-word;"> 
</span>
</P></TD>

<? } ?>
<? } 

  
/*-----------	SETOR LASER	-----------*/  ?>

<?	/*------------- FECHAR JANELA -----------*/   ?>

<TD align=middle bgcolor="#99CCEA"><P class=bordas> 
<span style="width:80px;word-wrap:break-word;"> 
</span>
</P></TD>


<?	/*------------- FECHAR JANELA -----------*/   ?>

	
		</TR>  
		
		
<? 
$valor_total_os = $valor_total_os + $valor_total; 
$quant_os = $quant_os + 1;  
$qt_total = $qt_total + $qt; 
?>

<?   /* FECHAMENTO DO WHILE */  ?>	


			        
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

