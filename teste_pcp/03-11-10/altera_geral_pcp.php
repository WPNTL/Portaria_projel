<? include "valida_sessao.php" ; include "config_pcp.php"; ?>

<html>

<head>
<title> Altera Geral PCP </title>
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
$lib_motor_maxsig = $linha["lib_motor_maxsig"];
$lib_polia_maxsig = $linha["lib_polia_maxsig"];
/* MOTOR - POLIA - CARCAÇA - ROTOR DO MAXSIG */


$lib_fund_maxsig = $linha["lib_fund_maxsig"];
$lib_outros_maxsig = $linha["lib_outros_maxsig"];


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

}

/*  ----------------	BUSCAR DADOS DE LIBERAÇÃO ------------------	*/


/*------------------------- FILTRO LIBERACAO PARA ALTERAR O CAMPO ---------------------------*/

if ($lib_corte == "ver"){$class_corte="class=nedita_left"; $readonly_corte="readonly"; $disabled_corte="disabled";}

if ($lib_almox == "ver"){$class_almox="class=nedita_left"; $readonly_almox="readonly"; $disabled_almox="disabled";}

if ($lib_balanc == "ver"){$class_balanc="class=nedita_left"; $readonly_balanc="readonly"; $disabled_balanc="disabled";}

if ($lib_montagem == "ver"){$class_montagem="class=nedita_left"; $readonly_montagem="readonly"; $disabled_montagem="disabled";}

if ($lib_usinagem == "ver"){$class_usinagem="class=nedita_left"; $readonly_usinagem="readonly"; $disabled_usinagem="disabled";}

if ($lib_usinagem_eixo == "ver"){$class_usinagem_eixo="class=nedita_left"; $readonly_usinagem_eixo="readonly"; $disabled_usinagem_eixo="disabled";}

if ($lib_usinagem_nuc_cubo == "ver"){$class_usinagem_nuc_cubo="class=nedita_left"; $readonly_usinagem_nuc_cubo="readonly"; $disabled_usinagem_nuc_cubo="disabled";}

if ($lib_usinagem_pol_mot == "ver"){$class_usinagem_pol_mot="class=nedita_left"; $readonly_usinagem_pol_mot="readonly"; $disabled_usinagem_pol_mot="disabled";}

if ($lib_usinagem_pol_vent == "ver"){$class_usinagem_pol_vent="class=nedita_left"; $readonly_usinagem_pol_vent="readonly"; $disabled_usinagem_pol_vent="disabled";}

if ($lib_usinagem_gaxeta == "ver"){$class_usinagem_gaxeta="class=nedita_left"; $readonly_usinagem_gaxeta="readonly"; $disabled_usinagem_gaxeta="disabled";}

if ($lib_expedicao == "ver"){$class_expedicao="class=nedita_left"; $readonly_expedicao="readonly"; $disabled_expedicao="disabled";}

if ($lib_funilaria == "ver"){$class_funilaria="class=nedita_left"; $readonly_funilaria="readonly"; $disabled_funilaria="disabled";}

?>


<form action="" method="post" name="pcp">



<? /* -------------	CONFIGURAÇÃO PARA BUSCAR OS NUMEROS DA O.S	------------------- */ ?>

<table class=sem_borda width=100% align="center">
<tr>

<?
/* LIBERAR USUARIO PARA VER TUDO OU SOMENTE O Q ESTA SENDO PRODUZIDO */
if ( $lib_baixa_tipo == "alt" OR $lib_baixa_tipo == "todos" ) 
{ $lib_baixa_tipo_busca = ""; $lib_baixa_tipo_busca_dados = ""; $lib_baixa_tipo_texto = "Mostrar todas Baixas."; } 
else 
{ $lib_baixa_tipo_busca = "WHERE baixa='P'"; $lib_baixa_tipo_busca_dados = "AND baixa='P'"; $lib_baixa_tipo_texto = "Mostrar somente o que está sendo Produzido."; }
/* LIBERAR USUARIO PARA VER TUDO OU SOMENTE O Q ESTA SENDO PRODUZIDO */
?>

<td class=right> Tipo Campo
<select name="tipo_busca" OnChange="Atualizar_Dados_PCP_Altera();">
<option value='' <? echo ($tipo_busca==''?"SELECTED":""); ?> >  </option>
<?if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) { ?>
<option value='num_os' <? echo ($tipo_busca=='num_os'?"SELECTED":""); ?> > Num. O.S </option>
<? } ?>
<?if ( $lib_nome_cliente == "ver" OR $lib_nome_cliente == "alt" ) { ?>
<option value='nome_cliente' <? echo ($tipo_busca=='nome_cliente'?"SELECTED":""); ?> > Nome Cliente </option>
<? } ?>
<?if ( $lib_num_proposta == "ver" OR $lib_num_proposta == "alt" ) { ?>
<option value='num_proposta' <? echo ($tipo_busca=='num_proposta'?"SELECTED":""); ?> > Num. Prop. </option>
<? } ?>
<?if ( $lib_oc_obra == "ver" OR $lib_oc_obra == "alt" ) { ?>
<option value='oc_obra' <? echo ($tipo_busca=='oc_obra'?"SELECTED":""); ?> > OC_Obra </option>
<? } ?>
<?if ( $lib_local_venda == "ver" OR $lib_local_venda == "alt" ) { ?>
<option value='local_venda' <? echo ($tipo_busca=='local_venda'?"SELECTED":""); ?> > Local Venda </option>
<? } ?>
<?if ( $lib_descr_vent == "ver" OR $lib_descr_vent == "alt" ) { ?>
<option value='descr_vent' <? echo ($tipo_busca=='descr_vent'?"SELECTED":""); ?> > Descr. Vent. </option>
<? } ?>
<?if ( $lib_mercado == "ver" OR $lib_mercado == "alt" ) { ?>
<option value='mercado' <? echo ($tipo_busca=='mercado'?"SELECTED":""); ?> > Mercado </option>
<? } ?>
<?if ( $lib_representante == "ver" OR $lib_representante == "alt" ) { ?>
<option value='representante' <? echo ($tipo_busca=='representante'?"SELECTED":""); ?> > Representante </option>
<? } ?>
<?if ( $lib_modelo== "ver" OR $lib_modelo == "alt" ) { ?>
<option value='modelo' <? echo ($tipo_busca=='modelo'?"SELECTED":""); ?> > Modelo </option>
<? } ?>
<?if ( $lib_tamanho == "ver" OR $lib_tamanho == "alt" ) { ?>
<option value='tamanho' <? echo ($tipo_busca=='tamanho'?"SELECTED":""); ?> > Tamanho </option>
<? } ?>
<?if ( $lib_arranjo == "ver" OR $lib_arranjo == "alt" ) { ?>
<option value='arranjo' <? echo ($tipo_busca=='arranjo'?"SELECTED":""); ?> > Arranjo </option>
<? } ?>
<?if ( $lib_classe == "ver" OR $lib_classe == "alt" ) { ?>
<option value='classe' <? echo ($tipo_busca=='classe'?"SELECTED":""); ?> > Classe </option>
<? } ?>
<?if ( $lib_rotacao == "ver" OR $lib_rotacao == "alt" ) { ?>
<option value='rotacao' <? echo ($tipo_busca=='rotacao'?"SELECTED":""); ?> > Rotação </option>
<? } ?>
<?if ( $lib_gab == "ver" OR $lib_gab == "alt" ) { ?>
<option value='gab' <? echo ($tipo_busca=='gab'?"SELECTED":""); ?> > Gab. </option>
<? } ?>
<?if ( $lib_fornecimento_motor == "ver" OR $lib_fornecimento_motor == "alt" ) { ?>
<option value='fornecimento_motor' <? echo ($tipo_busca=='fornecimento_motor'?"SELECTED":""); ?> > Forn. Motor </option>
<? } ?>
</select>
</td>


<?
 /* CONFIGURAÇÃO PARA BUSCAR CAMPO AUTOMÁTICO */
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
<? if ( $tipo_busca == "num_os" ) {  ?>
<input class=left name=valor maxLength=25 size=26 value="<?echo $valor?>" > 
<? } else { ?>
<input class=left name=valor maxLength=25 size=26 value="<?echo $valor?>" onKeyUp="checkList(this,arvore_valor)" id="textbox2" > 
<? } ?>


<? /* BOTÃO DE BUSCAR */ ?>
<input class="botao1" name="busca" type="button" value="Buscar" Onclick="Atualizar_Dados_PCP_Altera();">

<? /* MOSTRAR TEXTO SOBRE O Q VC PODE VER */ ?> 
<b><font color="#FF0000"><? echo $lib_baixa_tipo_texto; ?></b></font>
</td>

<? /* FECHAR JANELA */ ?> 
<td class=left>
<a class="botao1" href="javascript:window.close()" target="_top"> Fecha Janela </a>
</td>

</tr>
</table>

<? /* -------------	CONFIGURAÇÃO PARA BUSCAR OS NUMEROS DA O.S	------------------- */ ?>

<FIELDSET>
<LEGEND> Dados do PCP </LEGEND>

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

           
<? /* DATA EMISSÃO */ ?>

<? if ( $lib_data_emissao == "ver" Or $lib_data_emissao == "alt" ) { ?>
<TH align=middle rowspan="2"><P class=bordas>	
<? if ( $check_data_emissao == "" ) { ?> 
<input class=botao4 type="radio" name="organizar" value="data_emissao" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Dt. Emissão'); return true;" onMouseOut="nd(); return true;"> Dt. Emissão <? } } ?></P></TH>

<? /* NUM_OS */ ?>             
<? if ( $lib_num_os == "ver" Or $lib_num_os == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<?	if (  $check_num_os == "" ) { ?> 
<input class=botao4 type="radio" name="organizar" value="num_os" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Núm. O.S'); return true;" onMouseOut="nd(); return true;"> N° O.S <? } } ?></P></TH>

<? /* NUM_PROPOSTA */ ?>

<? if ( $lib_num_proposta == "ver" Or $lib_num_proposta == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>	
<? if ( $check_num_proposta == "") { ?> 
<input class=botao4 type="radio" name="organizar" value="num_proposta" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Núm. Proposta'); return true;" onMouseOut="nd(); return true;"> N° Proposta <? } } ?></P></TH>

<? /* NOME CLIENTE */ ?> 

<? if ( $lib_nome_cliente == "ver" Or $lib_nome_cliente == "alt" ) { ?> 
<TH align=middle  rowspan="2"><P class=bordas>	
<? if ( $check_nome_cliente == "") { ?> 
<input class=botao4 type="radio" name="organizar" value="nome_cliente" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Nome Cliente'); return true;" onMouseOut="nd(); return true;"> Nome Cliente <? } } ?></P></TH>

<? /* OC / OBRA */ ?>

<? if ( $lib_oc_obra == "ver" Or $lib_oc_obra == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>	
<? if ( $check_oc_obra == "") { ?> 
<input class=botao4 type="radio" name="organizar" value="oc_obra" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Oc_Obra'); return true;" onMouseOut="nd(); return true;">OC / Obra <? } } ?></P></TH>

<? /* MERCADO */ ?>

<? if ( $lib_mercado == "ver" Or $lib_mercado == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>	
<? if ( $check_mercado == "") { ?> 
<input class=botao4 type="radio" name="organizar" value="mercado" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Mercado'); return true;" onMouseOut="nd(); return true;"> Merc. <? } } ?></P></TH>

<? /* REPRESENTANTE */ ?>

<? if ( $lib_representante == "ver" Or $lib_representante == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>	
<? if ( $check_representante == "") { ?> 
<input class=botao4 type="radio" name="organizar" value="representante" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Representante'); return true;" onMouseOut="nd(); return true;"> Repres. <? } } ?></P></TH>
                      
<? /* ESTADO */ ?>

<? if ( $lib_estado == "ver" Or $lib_estado == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>	
<? if ( $check_estado == "") {?> 
<input class=botao4 type="radio" name="organizar" value="estado" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Estado'); return true;" onMouseOut="nd(); return true;"> Estado <? } } ?></P></TH>

<? /* DATA DA ENTREGA */ ?>

<? if ( $lib_data_entrega == "ver" Or $lib_data_entrega == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>	
<? if ( $check_data_entrega == "") {?> 
<input class=botao4 type="radio" name="organizar" value="data_entrega" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Data Entrega'); return true;" onMouseOut="nd(); return true;"> Dt. Entrega <? } } ?></P></TH>

<? /* REPROGRAMACAO */ ?>

<? if ( $lib_reprogramacao == "ver" Or $lib_reprogramacao == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>	
<? if ( $check_reprogramacao == "") {?> 
<input class=botao4 type="radio" name="organizar" value="reprogramacao" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Reprogramação'); return true;" onMouseOut="nd(); return true;"> Reprog. <? } } ?></P></TH>

<? /* BAIXA */ ?>

<? if ( $lib_baixa == "ver" Or $lib_baixa == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>	
<? if ( $check_baixa == "") {?> 
<input class=botao4 type="radio" name="organizar" value="baixa" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Baixa'); return true;" onMouseOut="nd(); return true;"> Baixa <? } } ?></P></TH>

<? /* DATA BAIXA */ ?>

<? if ( $lib_data_baixa == "ver" Or $lib_data_baixa == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>	
<? if ( $check_data_baixa == "") {?> 
<input class=botao4 type="radio" name="organizar" value="data_baixa" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Data Baixa'); return true;" onMouseOut="nd(); return true;"> Dt. da Baixa <? } } ?></P></TH>

<?/*  DATA PROG. DIÁRIA  */?>

<? if ( $lib_data_prog_diaria == "ver" Or $lib_data_prog_diaria == "alt" ) { ?> 
<TH align=middle  rowspan="2"><P class=bordas>	
<? if ( $check_data_prog_diaria == "") {?> 
<input class=botao4 type="radio" name="organizar" value="data_prog_diaria" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Data Prog. Diária'); return true;" onMouseOut="nd(); return true;"> Dt. Prog. Diária <? } } ?></P></TH>

<?/*  DATA PREVISAO  */?>
<? if ( $lib_data_previsao == "ver" Or $lib_data_previsao == "alt" ) { ?> 
<TH align=middle  rowspan="2"><P class=bordas>	
<? if ( $check_data_previsao == "") {?> 
<input class=botao4 type="radio" name="organizar" value="data_previsao" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Data Previsão'); return true;" onMouseOut="nd(); return true;"> Dt. Previsão <? } } ?></P></TH>

<? /* LOCAL VENDA */ ?>
<? if ( $lib_local_venda == "ver" Or $lib_local_venda == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>	
<? if ( $check_local_venda == "") {?> 
<input class=botao4 type="radio" name="organizar" value="local_venda" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Local Venda'); return true;" onMouseOut="nd(); return true;"> Local Venda <? } } ?></P></TH>

<? /* FORNECIMENTO MOTOR */ ?>
<? if ( $lib_fornecimento_motor == "ver" Or $lib_fornecimento_motor == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<?	if ( $check_fornecimento_motor == "") {?> 
<input class=botao4 type="radio" name="organizar" value="fornecimento_motor" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Forn. Motor'); return true;" onMouseOut="nd(); return true;"> Forn. Mot. <? } } ?></P></TH>

<? /* DATA MOTOR RECEBIDO */ ?>
<? if ( $lib_data_motor_recebido == "ver" Or $lib_data_motor_recebido == "alt" ) {?>
<TH align=middle  rowspan="2"><P class=bordas>
<?	if (  $check_data_motor_recebido == "") {?> 
<input class=botao4 type="radio" name="organizar" value="data_motor_recebido" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Data Motor Recebido'); return true;" onMouseOut="nd(); return true;"> Dt. Motor Recebido <? } } ?></P></TH>

<? /* DESCRICAO VENT */ ?>
<? if ( $lib_descr_vent == "ver" Or $lib_descr_vent == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>	
<? if ( $check_descr_vent == "") {?> 
<input class=botao4 type="radio" name="organizar" value="descr_vent" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Descrição Ventilador'); return true;" onMouseOut="nd(); return true;"> Descr. Vent. <? } } ?></P></TH>

<? /* QT */ ?>
<? if ( $lib_qt == "ver" Or $lib_qt == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<?	if ( $check_qt == "") {?> 
<input class=botao4 type="radio" name="organizar" value="qt" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar QT'); return true;" onMouseOut="nd(); return true;"> QT <? } } ?></P></TH>

<? /* MODELO */ ?>
<? if ( $lib_modelo == "ver" Or $lib_modelo == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<?	if ( $check_modelo == "") {?> 
<input class=botao4 type="radio" name="organizar" value="modelo" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Modelo'); return true;" onMouseOut="nd(); return true;"> Mod. <? } } ?></P></TH>

<? /* TAMANHO */ ?>
<? if ( $lib_tamanho == "ver" Or $lib_tamanho == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<?	if ( $check_tamanho == "") {?> 
<input class=botao4 type="radio" name="organizar" value="tamanho" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Tamanho'); return true;" onMouseOut="nd(); return true;"> Tam. <? } } ?></P></TH>

<? /* ARRANJO */ ?>
<? if ( $lib_arranjo == "ver" Or $lib_arranjo == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<?	if ( $check_arranjo == "") {?> 
<input class=botao4 type="radio" name="organizar" value="arranjo" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Arranjo'); return true;" onMouseOut="nd(); return true;"> Arr. <? } } ?></P></TH>

<? /* CLASSE */ ?>
<? if ( $lib_classe == "ver" Or $lib_classe == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<?	if ( $check_classe == "") {?> 
<input class=botao4 type="radio" name="organizar" value="classe" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Classe'); return true;" onMouseOut="nd(); return true;"> Cl. <? } } ?></P></TH>

<? /* ROTACAO */ ?>
<? if ( $lib_rotacao == "ver" Or $lib_rotacao == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<?	if ( $check_rotacao == "") {?> 
<input class=botao4 type="radio" name="organizar" value="rotacao" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Rotação'); return true;" onMouseOut="nd(); return true;"> Rot. <? } } ?></P></TH>

<? /* GABINETE */ ?>
<? if ( $lib_gab == "ver" Or $lib_gab == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<?	if ( $check_gab == "") {?>
<input class=botao4 type="radio" name="organizar" value="gab" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Gabinete'); return true;" onMouseOut="nd(); return true;"> Gab. <? } } ?></P></TH>

<? /* PINTURA */ ?>
<? if ( $lib_pintura == "ver" Or $lib_pintura == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<?	if ( $check_pintura == "") {?> 
<input class=botao4 type="radio" name="organizar" value="pintura" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Pintura'); return true;" onMouseOut="nd(); return true;"> Pint. <? } } ?></P></TH>

<? /* CONSTRUÇÃO */ ?>
<? if ( $lib_construcao == "ver" Or $lib_construcao == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<?	if ( $check_construcao == "") {?> 
<input class=botao4 type="radio" name="organizar" value="construcao" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Construção'); return true;" onMouseOut="nd(); return true;"> Const. <? } } ?></P></TH>

<? /* VALOR UNITARIO */ ?>
<? if ( $lib_valor_uni == "ver" Or $lib_valor_uni == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<?	if ( $check_valor_uni == "") {?> 
<input class=botao4 type="radio" name="organizar" value="valor_uni" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Valor Unitário'); return true;" onMouseOut="nd(); return true;"> Valor Un. <? } } ?></P></TH>

<? /* VALOR TOTAL O.S */ ?>
<? if ( $lib_valor_total == "ver" Or $lib_valor_total == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<?	if ( $check_valor_total == "") {?> 
<input class=botao4 type="radio" name="organizar" value="valor_total" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Valor Total'); return true;" onMouseOut="nd(); return true;"> Sub-Total <? } } ?></P></TH>

<? /* JATEAMENTO / GALV. FOGO */ ?>
<? if ( $lib_jat_g_fogo == "ver" OR $lib_jat_g_fogo == "alt" ) {?>
<TH align=middle widht="10%" colspan="3"><P class=bordas>
<?	if ( $check_jat_g_fogo == "" ) { ?>  Jateamento/Galv. Fogo
<? } } ?>
</P></TH>

<? /* MOTOR MAXSIG */ ?>
<? if ( $lib_motor_maxsig == "ver" Or $lib_motor_maxsig == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<?	if ( $check_motor_maxsig == "") {?> 
<input class=botao4 type="radio" name="organizar" value="motor_maxsig" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Motor'); return true;" onMouseOut="nd(); return true;"> Motor <? } } ?></P></TH>

<? /* POLIA MAXSIG */ ?>
<? if ( $lib_polia_maxsig == "ver" Or $lib_polia_maxsig == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<?	if ( $check_polia_maxsig == "") {?> 
<input class=botao4 type="radio" name="organizar" value="polia_maxsig" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Polia'); return true;" onMouseOut="nd(); return true;"> Polia <? } } ?></P></TH>

<? /* FUND MAXSIG */ ?>
<? if ( $lib_fund_maxsig == "ver" Or $lib_fund_maxsig == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<?	if ( $check_fund_maxsig == "") {?> 
<input class=botao4 type="radio" name="organizar" value="fund_maxsig" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Fund.'); return true;" onMouseOut="nd(); return true;"> Fund. <? } } ?></P></TH>

<? /* OUTROS MAXSIG */ ?>
<? if ( $lib_outros_maxsig == "ver" Or $lib_outros_maxsig == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<?	if ( $check_outros_maxsig == "") {?> 
<input class=botao4 type="radio" name="organizar" value="outros_maxsig" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar Outros'); return true;" onMouseOut="nd(); return true;"> Outros <? } } ?></P></TH>


<? /* OBS */ ?>
<? if ( $lib_obs == "ver" Or $lib_obs == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<?	if ( $check_obs == "") {?> 
<input class=botao4 type="radio" name="organizar" value="obs" onClick="Atualizar_Dados_PCP_Altera();" onMouseOver="drc('','Organizar OBS'); return true;" onMouseOut="nd(); return true;"> OBS <? } } ?></P></TH>


<? /* SETOR PROJETOS */ ?>

<? /* OS */ ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) {?>
<TH align=middle widht="10%" colspan="4"><P class=bordas>
<?	if ( $check_proj == "" ) { ?>  Projeto OS
<? } } ?>
</P></TH>


<? /* documento */ ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle widht="10%" colspan="4"><P class=bordas>
<?	if ( $check_documento == "" ) { ?>  Projeto Doc.
<? } } ?>
</P></TH>

<? /* SETOR PROJETOS */ ?>

<? /* SETOR ALMOX */ ?>

<? if ( $lib_almox == "ver" OR $lib_almox == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="7"><P class=bordas>
<?	if ( $check_almox == "" ) { ?>  Almox
<? } } ?>
</P></TH>

<? /* SETOR ALMOX */ ?>

<? /* SETOR CORTE */ ?>

<? if ( $lib_corte == "ver" OR $lib_corte == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="7"><P class=bordas>
<?	if ( $check_corte == "" ) { ?>  Corte
<? } } ?>
</P></TH>

<? /* SETOR CORTE */ ?>

<? /* SETOR BALANCEAMENTO */ ?>

<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="10"><P class=bordas>
<?	if ( $check_balanc == "" ) { ?>  Balanceamento
<? } } ?>
</P></TH>

<? /* SETOR BALANCEAMENTO */ ?>

<? /* SETOR CALD 1 */ ?>

<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="7"><P class=bordas>
<?	if ( $check_cald1 == "" ) { ?>  Calderaria I
<? } } ?>
</P></TH>

<? /* SETOR CALD 1 */ ?>

<? /* SETOR CALD 2 */ ?>

<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="7"><P class=bordas>
<?	if ( $check_cald2 == "" ) { ?>  Calderaria II
<? } } ?>
</P></TH>

<? /* SETOR CALD 2 */ ?>

<? /* SETOR PINTURA */ ?>

<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="7"><P class=bordas>
<?	if ( $check_pintura_setor == "" ) { ?>  Pintura
<? } } ?>
</P></TH>

<? /* SETOR PINTURA */ ?>

<? /* SETOR ROTOR LL */ ?>

<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="7"><P class=bordas>
<?	if ( $check_rotor_ll == "" ) { ?>  Rotor LL
<? } } ?>
</P></TH>

<? /* SETOR ROTOR LL */ ?>

<? /* SETOR ROTOR SIR */ ?>

<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="7"><P class=bordas>
<?	if ( $check_rotor_sir == "" ) { ?>  Rotor SIR
<? } } ?>
</P></TH>

<? /* SETOR ROTOR SIR */ ?>

<? /* SETOR MONTAGEM */ ?>

<? if ( $lib_montagem == "ver" OR $lib_montagem == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="7"><P class=bordas>
<?	if ( $check_montagem == "" ) { ?>  Montagem
<? } } ?>
</P></TH>

<? /* SETOR MONTAGEM */ ?>

<? /* SETOR GABINETE */ ?>

<? if ( $lib_gabinete == "ver" OR $lib_gabinete == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="7"><P class=bordas>
<?	if ( $check_gabinete == "" ) { ?>  Gabinete
<? } } ?>
</P></TH>

<? /* SETOR GABINETE */ ?>

<? /* SETOR USINAGEM */ ?>

<? /* EIXO */ ?>
<? if ( $lib_usinagem_eixo == "ver" OR $lib_usinagem_eixo == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="5"><P class=bordas>
<?	if ( $check_usinagem_eixo == "" ) { ?>  Usinagem Eixo
<? } } ?>
</P></TH>
<? /* EIXO */ ?>

<? /* NUC_CUBO */ ?>
<? if ( $lib_usinagem_nuc_cubo == "ver" OR $lib_usinagem_nuc_cubo == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="5"><P class=bordas>
<?	if ( $check_usinagem_nuc_cubo == "" ) { ?>  Usinagem Nuc.Cubo
<? } } ?>
</P></TH>
<? /* NUC_CUBO */ ?>

<? /* POL_MOT */ ?>
<? if ( $lib_usinagem_pol_mot == "ver" OR $lib_usinagem_pol_mot == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="5"><P class=bordas>
<?	if ( $check_usinagem_pol_mot == "" ) { ?>  Usinagem Pol.Mot
<? } } ?>
</P></TH>
<? /* POL_MOT */ ?>

<? /* POL_VENT */ ?>
<? if ( $lib_usinagem_pol_vent == "ver" OR $lib_usinagem_pol_vent == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="5"><P class=bordas>
<?	if ( $check_usinagem_pol_vent == "" ) { ?>  Usinagem Pol.Vent
<? } } ?>
</P></TH>
<? /* POL_VENT */ ?>

<? /* GAXETA */ ?>
<? if ( $lib_usinagem_gaxeta == "ver" OR $lib_usinagem_gaxeta == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="5"><P class=bordas>
<?	if ( $check_usinagem_gaxeta == "" ) { ?>  Usinagem Gaxeta
<? } } ?>
</P></TH>
<? /* GAXETA */ ?>

<? /* RESPONSAVEL E OBSERVACAO */ ?>
<? if ( $lib_usinagem == "ver" OR $lib_usinagem == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="2"><P class=bordas>
<?	if ( $check_usinagem_ == "" ) { ?> Usinagem
<? } } ?>
</P></TH>
<? /* RESPONSAVEL E OBSERVACAO */ ?>

<? /* SETOR USINAGEM */ ?>


<? /* SETOR EXPEDICAO */ ?>

<? if ( $lib_expedicao == "ver" OR $lib_expedicao == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="7"><P class=bordas>
<?	if ( $check_expedicao == "" ) { ?>  Expedição
<? } } ?>
</P></TH>

<? /* SETOR EXPEDICAO */ ?>


<? /* SETOR FUNILARIA */ ?>

<? if ( $lib_funilaria == "ver" OR $lib_funilaria == "alt" OR $lib_setor_ver == "sim" ) {?>
<TH align=middle widht="10%" colspan="7"><P class=bordas>
<?	if ( $check_funilaria == "" ) { ?>  Funilação
<? } } ?>
</P></TH>

<? /* SETOR FUNILARIA */ ?>

	</TR> 


	<TR class=linha_cabecalho>
	
<? /*-------	JATEAMENTO / GALV. FOGO 	--------*/ ?>

<? /* TS */ ?>
<? if ($lib_jat_g_fogo == "ver" OR $lib_jat_g_fogo == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_jat_g_fogo == "" ) { ?>  T. S.
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
<?	if ( $check_jat_g_fogo == "" ) { ?>  Dt. Status
<? } } ?>
</P></TH>	

<? /*-------	JATEAMENTO / GALV. FOGO 	--------*/ ?>	


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
<?	if ( $check_proj == "" ) { ?>  Dt. Em Produção
<? } } ?>
</P></TH>

<? /* PROJ OS DT STATUS SAIDA */ ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_proj == "" ) { ?>  Dt. Expedição
<? } } ?>
</P></TH>
<? /*-------	SETOR PROJETOS ---- O.S	--------*/ ?>


<? /*-------	SETOR PROJETOS ---- documento	--------*/ ?>
<? /* data book */ ?>
<? if ($lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle widht="8%" onMouseOver="this.style.background='#99CCEA'; drc('','DB = Data Book'); return true; " onMouseOut="this.style.background='#4275a5'; nd(); return true;" ><P class=bordas>
<?	if ( $check_documento == "" ) { ?>  DB
<? } } ?>
</P></TH>

<? /* certif. balanceamento */ ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) {?>
<TH align=middle widht="8%" onMouseOver="this.style.background='#99CCEA'; drc('','CB = Certif. Balanc.'); return true; " onMouseOut="this.style.background='#4275a5'; nd(); return true;" ><P class=bordas>
<?	if ( $check_documento == "" ) { ?>  CB
<? } } ?>
</P></TH>

<? /* certif. materiais */ ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle widht="8%" onMouseOver="this.style.background='#99CCEA'; drc('','CM = Certif. Materiais'); return true; " onMouseOut="this.style.background='#4275a5'; nd(); return true;" ><P class=bordas>
<?	if ( $check_documento == "" ) { ?>  CM
<? } } ?>
</P></TH>

<? /* desenho certif. */ ?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>
<TH align=middle widht="8%" onMouseOver="this.style.background='#99CCEA'; drc('','DC = Desenho Certif.'); return true; " onMouseOut="this.style.background='#4275a5'; nd(); return true;" ><P class=bordas>
<?	if ( $check_documento == "" ) { ?>  DC
<? } } ?>
</P></TH>

<? /*-------	SETOR PROJETOS ---- documento	--------*/ ?>


<? /*-------	SETOR ALMOX   --------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_almox == "ver" OR $lib_almox == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_almox == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_almox == "ver" OR $lib_almox == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_almox == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT STATUS ENTRADA */ ?>
<? if ( $lib_almox == "ver" OR $lib_almox == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_almox == "" ) { ?>  Dt. Em Produção
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_almox == "ver" OR $lib_almox == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_almox == "" ) { ?>  Dt. Previsão
<? } } ?>
</P></TH>

<? /* DT STATUS SAIDA */ ?>
<? if ( $lib_almox == "ver" OR $lib_almox == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_almox == "" ) { ?>  Dt. Expedição
<? } } ?>
</P></TH>

<? /* RESPOSANVEL */ ?>
<? if ( $lib_almox == "ver" OR $lib_almox == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_almox == "" ) { ?>  Responsável
<? } } ?>
</P></TH>

<? /* OBS */ ?>
<? if ( $lib_almox == "ver" OR $lib_almox == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_almox == "" ) { ?>  Obs
<? } } ?>
</P></TH>

<? /*-------	SETOR ALMOX   --------*/ ?>



<? /*-------	SETOR CORTE   --------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_corte == "ver" OR $lib_corte == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_corte == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_corte == "ver" OR $lib_corte == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_corte == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT STATUS ENTRADA */ ?>
<? if ( $lib_corte == "ver" OR $lib_corte == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_corte == "" ) { ?>  Dt. Em Produção
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_corte == "ver" OR $lib_corte == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_corte == "" ) { ?>  Dt. Previsão
<? } } ?>
</P></TH>

<? /* DT STATUS SAIDA */ ?>
<? if ( $lib_corte == "ver" OR $lib_corte == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_corte == "" ) { ?>  Dt. Expedição
<? } } ?>
</P></TH>

<? /* RESPOSANVEL */ ?>
<? if ( $lib_corte == "ver" OR $lib_corte == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_corte == "" ) { ?>  Responsável
<? } } ?>
</P></TH>

<? /* OBS */ ?>
<? if ( $lib_corte == "ver" OR $lib_corte == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_corte == "" ) { ?>  Obs
<? } } ?>
</P></TH>

<? /*-------	SETOR CORTE   --------*/ ?>


<? /*-------	SETOR BALANCEAMENTO   --------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_balanc == "ver" OR $lib_balanc == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_balanc == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_balanc == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT STATUS ENTRADA */ ?>
<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_balanc == "" ) { ?>  Dt. Em Produção
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_balanc == "" ) { ?>  Dt. Previsão
<? } } ?>
</P></TH>

<? /* DT STATUS SAIDA */ ?>
<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_balanc == "" ) { ?>  Dt. Expedição
<? } } ?>
</P></TH>

<? /* PLANO 1 */ ?>
<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_balanc == "" ) { ?>  Plano 1
<? } } ?>
</P></TH>

<? /* PLANO 2 */ ?>
<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_balanc == "" ) { ?>  Plano 2
<? } } ?>
</P></TH>

<? /* RESIDUAL */ ?>
<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_balanc == "" ) { ?>  Residual
<? } } ?>
</P></TH>

<? /* RESPOSANVEL */ ?>
<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_balanc == "" ) { ?>  Responsável
<? } } ?>
</P></TH>

<? /* OBS */ ?>
<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_balanc == "" ) { ?>  Obs
<? } } ?>
</P></TH>

<? /*-------	SETOR BALANCEAMENTO   --------*/ ?>


<? /*-------	SETOR CALD 1   --------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_cald1 == "ver" OR $lib_cald1 == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald1 == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald1 == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT STATUS ENTRADA */ ?>
<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald1 == "" ) { ?>  Dt. Em Produção
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald1 == "" ) { ?>  Dt. Previsão
<? } } ?>
</P></TH>

<? /* DT STATUS SAIDA */ ?>
<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald1 == "" ) { ?>  Dt. Expedição
<? } } ?>
</P></TH>

<? /* RESPOSANVEL */ ?>
<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald1 == "" ) { ?>  Responsável
<? } } ?>
</P></TH>

<? /* OBS */ ?>
<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald1 == "" ) { ?>  Obs
<? } } ?>
</P></TH>

<? /*-------	SETOR CALD 1   --------*/ ?>

<? /*-------	SETOR CALD 2   --------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_cald2 == "ver" OR $lib_cald2 == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald2 == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald2 == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT STATUS ENTRADA */ ?>
<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald2 == "" ) { ?>  Dt. Em Produção
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald2 == "" ) { ?>  Dt. Previsão
<? } } ?>
</P></TH>

<? /* DT STATUS SAIDA */ ?>
<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald2 == "" ) { ?>  Dt. Expedição
<? } } ?>
</P></TH>

<? /* RESPOSANVEL */ ?>
<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald2 == "" ) { ?>  Responsável
<? } } ?>
</P></TH>

<? /* OBS */ ?>
<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_cald2 == "" ) { ?>  Obs
<? } } ?>
</P></TH>

<? /*-------	SETOR CALD 2   --------*/ ?>

<? /*-------	SETOR PINTURA   --------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_pintura_setor == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_pintura_setor == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT STATUS ENTRADA */ ?>
<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_pintura_setor == "" ) { ?>  Dt. Em Produção
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_pintura_setor == "" ) { ?>  Dt. Previsão
<? } } ?>
</P></TH>

<? /* DT STATUS SAIDA */ ?>
<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_pintura_setor == "" ) { ?>  Dt. Expedição
<? } } ?>
</P></TH>

<? /* RESPOSANVEL */ ?>
<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_pintura_setor == "" ) { ?>  Responsável
<? } } ?>
</P></TH>

<? /* OBS */ ?>
<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_pintura_setor == "" ) { ?>  Obs
<? } } ?>
</P></TH>

<? /*-------	SETOR PINTURA   --------*/ ?>


<? /*-------	SETOR ROTOR LL   --------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotor_ll == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotor_ll == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT STATUS ENTRADA */ ?>
<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotor_ll == "" ) { ?>  Dt. Em Produção
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotor_ll == "" ) { ?>  Dt. Previsão
<? } } ?>
</P></TH>

<? /* DT STATUS SAIDA */ ?>
<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotor_ll == "" ) { ?>  Dt. Expedição
<? } } ?>
</P></TH>

<? /* RESPOSANVEL */ ?>
<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotor_ll == "" ) { ?>  Responsável
<? } } ?>
</P></TH>

<? /* OBS */ ?>
<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotor_ll == "" ) { ?>  Obs
<? } } ?>
</P></TH>

<? /*-------	SETOR ROTOR LL   --------*/ ?>


<? /*-------	SETOR ROTOR SIR   --------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotor_sir == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotor_sir == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT STATUS ENTRADA */ ?>
<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotor_sir == "" ) { ?>  Dt. Em Produção
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotor_sir == "" ) { ?>  Dt. Previsão
<? } } ?>
</P></TH>

<? /* DT STATUS SAIDA */ ?>
<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotor_sir == "" ) { ?>  Dt. Expedição
<? } } ?>
</P></TH>

<? /* RESPOSANVEL */ ?>
<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotor_sir == "" ) { ?>  Responsável
<? } } ?>
</P></TH>

<? /* OBS */ ?>
<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_rotor_sir == "" ) { ?>  Obs
<? } } ?>
</P></TH>

<? /*-------	SETOR ROTOR SIR   --------*/ ?>


<? /*-------	SETOR MONTAGEM   --------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_montagem == "ver" OR $lib_montagem == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_montagem == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_montagem == "ver" OR $lib_montagem == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_montagem == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT STATUS ENTRADA */ ?>
<? if ( $lib_montagem == "ver" OR $lib_montagem == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_montagem == "" ) { ?>  Dt. Em Produção
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_montagem == "ver" OR $lib_montagem == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_montagem == "" ) { ?>  Dt. Previsão
<? } } ?>
</P></TH>

<? /* DT STATUS SAIDA */ ?>
<? if ( $lib_montagem == "ver" OR $lib_montagem == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_montagem == "" ) { ?>  Dt. Expedição
<? } } ?>
</P></TH>

<? /* RESPOSANVEL */ ?>
<? if ( $lib_montagem == "ver" OR $lib_montagem == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_montagem == "" ) { ?>  Responsável
<? } } ?>
</P></TH>

<? /* OBS */ ?>
<? if ( $lib_montagem == "ver" OR $lib_montagem == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_montagem == "" ) { ?>  Obs
<? } } ?>
</P></TH>

<? /*-------	SETOR MONTAGEM   --------*/ ?>


<? /*-------	SETOR GABINETE   --------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_gabinete == "ver" OR $lib_gabinete == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_gabinete == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_gabinete == "ver" OR $lib_gabinete == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_gabinete == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT STATUS ENTRADA */ ?>
<? if ( $lib_gabinete == "ver" OR $lib_gabinete == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_gabinete == "" ) { ?>  Dt. Em Produção
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_gabinete == "ver" OR $lib_gabinete == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_gabinete == "" ) { ?>  Dt. Previsão
<? } } ?>
</P></TH>

<? /* DT STATUS SAIDA */ ?>
<? if ( $lib_gabinete == "ver" OR $lib_gabinete == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_gabinete == "" ) { ?>  Dt. Expedição
<? } } ?>
</P></TH>

<? /* RESPOSANVEL */ ?>
<? if ( $lib_gabinete == "ver" OR $lib_gabinete == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_gabinete == "" ) { ?>  Responsável
<? } } ?>
</P></TH>

<? /* OBS */ ?>
<? if ( $lib_gabinete == "ver" OR $lib_gabinete == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_gabinete == "" ) { ?>  Obs
<? } } ?>
</P></TH>

<? /*-------	SETOR GABINETE   --------*/ ?>


<? /*-------	SETOR USINAGEM   --------*/ ?>

<?/* EIXO */?>

<? /* DT PROG */ ?>
<? if ($lib_usinagem_eixo == "ver" OR $lib_usinagem_eixo == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_eixo == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_usinagem_eixo == "ver" OR $lib_usinagem_eixo == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_eixo == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT STATUS ENTRADA */ ?>
<? if ( $lib_usinagem_eixo == "ver" OR $lib_usinagem_eixo == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_eixo == "" ) { ?>  Dt. Em Produção
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_usinagem_eixo == "ver" OR $lib_usinagem_eixo == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_eixo == "" ) { ?>  Dt. Previsão
<? } } ?>
</P></TH>

<? /* DT STATUS SAIDA */ ?>
<? if ( $lib_usinagem_eixo == "ver" OR $lib_usinagem_eixo == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_eixo == "" ) { ?>  Dt. Expedição
<? } } ?>
</P></TH>

<?/* EIXO */?>


<?/* NUC_CUBO */?>

<? /* DT PROG */ ?>
<? if ($lib_usinagem_nuc_cubo == "ver" OR $lib_usinagem_nuc_cubo == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_nuc_cubo == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_usinagem_nuc_cubo == "ver" OR $lib_usinagem_nuc_cubo == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_nuc_cubo == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT STATUS ENTRADA */ ?>
<? if ( $lib_usinagem_nuc_cubo == "ver" OR $lib_usinagem_nuc_cubo == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_nuc_cubo == "" ) { ?>  Dt. Em Produção
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_usinagem_nuc_cubo == "ver" OR $lib_usinagem_nuc_cubo == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_nuc_cubo == "" ) { ?>  Dt. Previsão
<? } } ?>
</P></TH>

<? /* DT STATUS SAIDA */ ?>
<? if ( $lib_usinagem_nuc_cubo == "ver" OR $lib_usinagem_nuc_cubo == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_nuc_cubo == "" ) { ?>  Dt. Expedição
<? } } ?>
</P></TH>

<?/* NUC_CUBO */?>


<?/* POL_MOT */?>

<? /* DT PROG */ ?>
<? if ($lib_usinagem_pol_mot == "ver" OR $lib_usinagem_pol_mot == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_pol_mot == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_usinagem_pol_mot == "ver" OR $lib_usinagem_pol_mot == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_pol_mot == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT STATUS ENTRADA */ ?>
<? if ( $lib_usinagem_pol_mot == "ver" OR $lib_usinagem_pol_mot == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_pol_mot == "" ) { ?>  Dt. Em Produção
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_usinagem_pol_mot == "ver" OR $lib_usinagem_pol_mot == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_pol_mot == "" ) { ?>  Dt. Previsão
<? } } ?>
</P></TH>

<? /* DT STATUS SAIDA */ ?>
<? if ( $lib_usinagem_pol_mot == "ver" OR $lib_usinagem_pol_mot == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_pol_mot == "" ) { ?>  Dt. Expedição
<? } } ?>
</P></TH>

<?/* POL_MOT */?>


<?/* POL_VENT */?>

<? /* DT PROG */ ?>
<? if ($lib_usinagem_pol_vent == "ver" OR $lib_usinagem_pol_vent == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_pol_vent == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_usinagem_pol_vent == "ver" OR $lib_usinagem_pol_vent == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_pol_vent == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT STATUS ENTRADA */ ?>
<? if ( $lib_usinagem_pol_vent == "ver" OR $lib_usinagem_pol_vent == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_pol_vent == "" ) { ?>  Dt. Em Produção
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_usinagem_pol_vent == "ver" OR $lib_usinagem_pol_vent == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_pol_vent == "" ) { ?>  Dt. Previsão
<? } } ?>
</P></TH>

<? /* DT STATUS SAIDA */ ?>
<? if ( $lib_usinagem_pol_vent == "ver" OR $lib_usinagem_pol_vent == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_pol_vent == "" ) { ?>  Dt. Expedição
<? } } ?>
</P></TH>

<?/* POL_VENT */?>


<?/* GAXETA */?>

<? /* DT PROG */ ?>
<? if ($lib_usinagem_gaxeta == "ver" OR $lib_usinagem_gaxeta == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_gaxeta == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_usinagem_gaxeta == "ver" OR $lib_usinagem_gaxeta == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_gaxeta == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT STATUS ENTRADA */ ?>
<? if ( $lib_usinagem_gaxeta == "ver" OR $lib_usinagem_gaxeta == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_gaxeta == "" ) { ?>  Dt. Em Produção
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_usinagem_gaxeta == "ver" OR $lib_usinagem_gaxeta == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_gaxeta == "" ) { ?>  Dt. Previsão
<? } } ?>
</P></TH>

<? /* DT STATUS SAIDA */ ?>
<? if ( $lib_usinagem_gaxeta == "ver" OR $lib_usinagem_gaxeta == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem_gaxeta == "" ) { ?>  Dt. Expedição
<? } } ?>
</P></TH>

<?/* GAXETA */?>

<? /* RESPOSANVEL */ ?>
<? if ( $lib_usinagem == "ver" OR $lib_usinagem == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem == "" ) { ?>  Responsável
<? } } ?>
</P></TH>

<? /* OBS */ ?>
<? if ( $lib_usinagem == "ver" OR $lib_usinagem == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_usinagem == "" ) { ?>  Obs
<? } } ?>
</P></TH>

<? /*-------	SETOR USINAGEM   --------*/ ?>


<? /*-------	SETOR EXPEDICAO   --------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_expedicao == "ver" OR $lib_expedicao == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_expedicao == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_expedicao == "ver" OR $lib_expedicao == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_expedicao == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT STATUS ENTRADA */ ?>
<? if ( $lib_expedicao == "ver" OR $lib_expedicao == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_expedicao == "" ) { ?>  Dt. Em Produção
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_expedicao == "ver" OR $lib_expedicao == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_expedicao == "" ) { ?>  Dt. Previsão
<? } } ?>
</P></TH>

<? /* DT STATUS SAIDA */ ?>
<? if ( $lib_expedicao == "ver" OR $lib_expedicao == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_expedicao == "" ) { ?>  Dt. Expedição
<? } } ?>
</P></TH>

<? /* RESPOSANVEL */ ?>
<? if ( $lib_expedicao == "ver" OR $lib_expedicao == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_expedicao == "" ) { ?>  Responsável
<? } } ?>
</P></TH>

<? /* OBS */ ?>
<? if ( $lib_expedicao == "ver" OR $lib_expedicao == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_expedicao == "" ) { ?>  Obs
<? } } ?>
</P></TH>

<? /*-------	SETOR EXPEDICAO   --------*/ ?>


<? /*-------	SETOR FUNILARIA   --------*/ ?>

<? /* DT PROG */ ?>
<? if ($lib_funilaria == "ver" OR $lib_funilaria == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_funilaria == "" ) { ?>  Dt. Prog.
<? } } ?>
</P></TH>

<? /* STATUS */ ?>
<? if ( $lib_funilaria == "ver" OR $lib_funilaria == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_funilaria == "" ) { ?>  Status
<? } } ?>
</P></TH>

<? /* DT STATUS ENTRADA */ ?>
<? if ( $lib_funilaria == "ver" OR $lib_funilaria == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_funilaria == "" ) { ?>  Dt. Em Produção
<? } } ?>
</P></TH>

<? /* DT PREVISAO */ ?>
<? if ( $lib_funilaria == "ver" OR $lib_funilaria == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_funilaria == "" ) { ?>  Dt. Previsão
<? } } ?>
</P></TH>

<? /* DT STATUS SAIDA */ ?>
<? if ( $lib_funilaria == "ver" OR $lib_funilaria == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_funilaria == "" ) { ?>  Dt. Expedição
<? } } ?>
</P></TH>

<? /* RESPOSANVEL */ ?>
<? if ( $lib_funilaria == "ver" OR $lib_funilaria == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_funilaria == "" ) { ?>  Responsável
<? } } ?>
</P></TH>

<? /* OBS */ ?>
<? if ( $lib_funilaria == "ver" OR $lib_funilaria == "alt" OR $lib_setor_ver == "sim" ) { ?>
<TH align=middle widht="8%" ><P class=bordas>
<?	if ( $check_funilaria == "" ) { ?>  Obs
<? } } ?>
</P></TH>

<? /*-------	SETOR FUNILARIA   --------*/ ?>


	</TR>
	
	
<? /* ------------------------------------- ORGANIZAR ---------------------------------------- */ ?>

	
<? /* --------------------  INICIO DA CONSULTA  -----------------------------  */  ?>

<?
if ($organizar == "") { $organizar = "num_os"; } else { $organizar = $organizar; }

$valor_total_os = 0; $quant_os = 0; $x = 0;

$query = "SELECT * FROM pcp WHERE $tipo_busca<>'' AND $tipo_busca='$valor' $f_baixa_db ORDER BY '$organizar'";

//$query = "SELECT * FROM pcp WHERE num_os='$valor' $lib_baixa_tipo_busca_dados ORDER BY '$organizar'";

//echo "query - ".$query;

$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) { 

$x = $x + 1;

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

/* DATA PREVISAO */
$data_previsao = $dados["data_previsao"];

/* JATEAMENTO / GALV. FOGO */
$ts_jat_g_fogo = $dados["ts_jat_g_fogo"];
$status_jat_g_fogo = $dados["status_jat_g_fogo"];
$dt_status_jat_g_fogo = $dados["dt_status_jat_g_fogo"];

/*		SETOR PROJETOS		*/
$proj_os_dt_prog = $dados["proj_os_dt_prog"]; 
$proj_os_dt_entrada = $dados["proj_os_dt_entrada"];
$proj_os_dt_saida = $dados["proj_os_dt_saida"];
$proj_os_status = $dados["proj_os_status"]; 
$proj_os_status_db = $dados["proj_os_status"]; 

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
$data_book_db = $dados["data_book"];

$certif_balanc = $dados["certif_balanc"];
$certif_balanc_db = $dados["certif_balanc"];

$certif_materiais = $dados["certif_materiais"];
$certif_materiais_db = $dados["certif_materiais"];

$desenho_certif = $dados["desenho_certif"];
$desenho_certif_db = $dados["desenho_certif"];
/*		SETOR PROJETOS		*/


/* MOTOR - POLIA - CARCAÇA - ROTOR DO MAXSIG */
$motor_maxsig = $dados["motor_maxsig"];
$polia_maxsig = $dados["polia_maxsig"];
/* MOTOR - POLIA - CARCAÇA - ROTOR DO MAXSIG */

$fund_maxsig = $dados["fund_maxsig"];
$outros_maxsig = $dados["outros_maxsig"];



/*		SETOR ALMOX		*/
$dt_prog_almox = $dados["dt_prog_almox"];
$dt_producao_almox = $dados["dt_producao_almox"];
$dt_exp_almox = $dados["dt_exp_almox"]; 
$status_almox = $dados["status_almox"];
$status_almox_db = $dados["status_almox"];
$dt_previsao_almox = $dados["dt_previsao_almox"];
$res_almox = $dados["res_almox"];
$obs_almox = $dados["obs_almox"];
/*		SETOR ALMOX		*/


/*		SETOR CORTE		*/
$dt_prog_corte = $dados["dt_prog_corte"];
$dt_producao_corte = $dados["dt_producao_corte"];
$dt_exp_corte = $dados["dt_exp_corte"]; 
$status_corte = $dados["status_corte"];
$status_corte_db = $dados["status_corte"];
$dt_previsao_corte = $dados["dt_previsao_corte"];
$res_corte = $dados["res_corte"];
$obs_corte = $dados["obs_corte"];
/*		SETOR CORTE		*/


/*		SETOR BALANCEAMENTO		*/
$dt_prog_balanc = $dados["dt_prog_balanc"];
$dt_producao_balanc = $dados["dt_producao_balanc"];
$dt_exp_balanc = $dados["dt_exp_balanc"]; 
$status_balanc = $dados["status_balanc"];
$status_balanc_db = $dados["status_balanc"];
$dt_previsao_balanc = $dados["dt_previsao_balanc"];
$res_balanc = $dados["res_balanc"];
$obs_balanc = $dados["obs_balanc"];
$plano1_balanc = $dados["plano1_balanc"];
$plano2_balanc = $dados["plano2_balanc"];
$residual_balanc = $dados["residual_balanc"];
/*		SETOR BALANCEAMENTO     */


/*		SETOR CALD 1		*/
$dt_prog_cald1 = $dados["dt_prog_cald1"];
$dt_producao_cald1 = $dados["dt_producao_cald1"];
$dt_exp_cald1 = $dados["dt_exp_cald1"]; 
$status_cald1 = $dados["status_cald1"];
$status_cald1_db = $dados["status_cald1"];
$dt_previsao_cald1 = $dados["dt_previsao_cald1"];
$res_cald1 = $dados["res_cald1"];
$obs_cald1 = $dados["obs_cald1"];
/*		SETOR CALD 1     */

/*		SETOR CALD 2		*/
$dt_prog_cald2 = $dados["dt_prog_cald2"];
$dt_producao_cald2 = $dados["dt_producao_cald2"];
$dt_exp_cald2 = $dados["dt_exp_cald2"]; 
$status_cald2 = $dados["status_cald2"];
$status_cald2_db = $dados["status_cald2"];
$dt_previsao_cald2 = $dados["dt_previsao_cald2"];
$res_cald2 = $dados["res_cald2"];
$obs_cald2 = $dados["obs_cald2"];
/*		SETOR CALD 2     */

/*		SETOR ROTOR LL		*/
$dt_prog_rotor_ll = $dados["dt_prog_rotor_ll"];
$dt_producao_rotor_ll = $dados["dt_producao_rotor_ll"];
$dt_exp_rotor_ll = $dados["dt_exp_rotor_ll"]; 
$status_rotor_ll = $dados["status_rotor_ll"];
$status_rotor_ll_db = $dados["status_rotor_ll"];
$dt_previsao_rotor_ll = $dados["dt_previsao_rotor_ll"];
$res_rotor_ll = $dados["res_rotor_ll"];
$obs_rotor_ll = $dados["obs_rotor_ll"];
/*		SETOR ROTOR LL     */

/*		SETOR ROTOR SIR		*/
$dt_prog_rotor_sir = $dados["dt_prog_rotor_sir"];
$dt_producao_rotor_sir = $dados["dt_producao_rotor_sir"];
$dt_exp_rotor_sir = $dados["dt_exp_rotor_sir"]; 
$status_rotor_sir = $dados["status_rotor_sir"];
$status_rotor_sir_db = $dados["status_rotor_sir"];
$dt_previsao_rotor_sir = $dados["dt_previsao_rotor_sir"];
$res_rotor_sir = $dados["res_rotor_sir"];
$obs_rotor_sir = $dados["obs_rotor_sir"];
/*		SETOR ROTOR SIR     */

/*		SETOR USINAGEM		*/

/* EIXO */
$dt_prog_usinagem_eixo = $dados["dt_prog_usinagem_eixo"];
$dt_producao_usinagem_eixo = $dados["dt_producao_usinagem_eixo"];
$dt_exp_usinagem_eixo = $dados["dt_exp_usinagem_eixo"]; 
$status_usinagem_eixo = $dados["status_usinagem_eixo"];
$status_usinagem_eixo_db = $dados["status_usinagem_eixo"];
$dt_previsao_usinagem_eixo = $dados["dt_previsao_usinagem_eixo"];
/* EIXO */

/* NUC_CUBO */
$dt_prog_usinagem_nuc_cubo = $dados["dt_prog_usinagem_nuc_cubo"];
$dt_producao_usinagem_nuc_cubo = $dados["dt_producao_usinagem_nuc_cubo"];
$dt_exp_usinagem_nuc_cubo = $dados["dt_exp_usinagem_nuc_cubo"]; 
$status_usinagem_nuc_cubo = $dados["status_usinagem_nuc_cubo"];
$status_usinagem_nuc_cubo_db = $dados["status_usinagem_nuc_cubo"];
$dt_previsao_usinagem_nuc_cubo = $dados["dt_previsao_usinagem_nuc_cubo"];
/* NUC_CUBO */

/* POL_MOT */
$dt_prog_usinagem_pol_mot = $dados["dt_prog_usinagem_pol_mot"];
$dt_producao_usinagem_pol_mot = $dados["dt_producao_usinagem_pol_mot"];
$dt_exp_usinagem_pol_mot = $dados["dt_exp_usinagem_pol_mot"]; 
$status_usinagem_pol_mot = $dados["status_usinagem_pol_mot"];
$status_usinagem_pol_mot_db = $dados["status_usinagem_pol_mot"];
$dt_previsao_usinagem_pol_mot = $dados["dt_previsao_usinagem_pol_mot"];
/* POL_MOT */

/* POL_VENT */
$dt_prog_usinagem_pol_vent = $dados["dt_prog_usinagem_pol_vent"];
$dt_producao_usinagem_pol_vent = $dados["dt_producao_usinagem_pol_vent"];
$dt_exp_usinagem_pol_vent = $dados["dt_exp_usinagem_pol_vent"]; 
$status_usinagem_pol_vent = $dados["status_usinagem_pol_vent"];
$status_usinagem_pol_vent_db = $dados["status_usinagem_pol_vent"];
$dt_previsao_usinagem_pol_vent = $dados["dt_previsao_usinagem_pol_vent"];
/* POL_VENT */

/* GAXETA */
$dt_prog_usinagem_gaxeta = $dados["dt_prog_usinagem_gaxeta"];
$dt_producao_usinagem_gaxeta = $dados["dt_producao_usinagem_gaxeta"];
$dt_exp_usinagem_gaxeta = $dados["dt_exp_usinagem_gaxeta"]; 
$status_usinagem_gaxeta = $dados["status_usinagem_gaxeta"];
$status_usinagem_gaxeta_db = $dados["status_usinagem_gaxeta"];
$dt_previsao_usinagem_gaxeta = $dados["dt_previsao_usinagem_gaxeta"];
/* GAXETA */

/* RESP. E OBS. */
$res_usinagem = $dados["res_usinagem"];
$obs_usinagem = $dados["obs_usinagem"];
/* RESP. E OBS. */

/*		SETOR PINTURA		*/
$dt_prog_pintura = $dados["dt_prog_pintura"];
$dt_producao_pintura = $dados["dt_producao_pintura"];
$dt_exp_pintura = $dados["dt_exp_pintura"]; 
$status_pintura = $dados["status_pintura"];
$status_pintura_db = $dados["status_pintura"];
$dt_previsao_pintura = $dados["dt_previsao_pintura"];
$res_pintura = $dados["res_pintura"];
$obs_pintura = $dados["obs_pintura"];
/*		SETOR PINTURA		*/

/*		SETOR MONTAGEN		*/
$dt_prog_montagem = $dados["dt_prog_montagem"];
$dt_producao_montagem = $dados["dt_producao_montagem"];
$dt_exp_montagem = $dados["dt_exp_montagem"]; 
$status_montagem = $dados["status_montagem"];
$status_montagem_db = $dados["status_montagem"];
$dt_previsao_montagem = $dados["dt_previsao_montagem"];
$res_montagem = $dados["res_montagem"];
$obs_montagem = $dados["obs_montagem"];
/*		SETOR MONTAGEN		*/

/*		SETOR GABINETE	*/
$dt_prog_gabinete = $dados["dt_prog_gabinete"];
$dt_producao_gabinete = $dados["dt_producao_gabinete"];
$dt_exp_gabinete = $dados["dt_exp_gabinete"]; 
$status_gabinete = $dados["status_gabinete"];
$status_gabinete_db = $dados["status_gabinete"];
$dt_previsao_gabinete = $dados["dt_previsao_gabinete"];
$res_gabinete = $dados["res_gabinete"];
$obs_gabinete = $dados["obs_gabinete"];
/*		SETOR GABINETE     */

/*		SETOR EXPEDICAO		*/
$dt_prog_expedicao = $dados["dt_prog_expedicao"];
$dt_producao_expedicao = $dados["dt_producao_expedicao"];
$dt_exp_expedicao = $dados["dt_exp_expedicao"]; 
$status_expedicao = $dados["status_expedicao"];
$status_expedicao_db = $dados["status_expedicao"];
$dt_previsao_expedicao = $dados["dt_previsao_expedicao"];
$res_expedicao = $dados["res_expedicao"];
$obs_expedicao = $dados["obs_expedicao"];
/*		SETOR EXPEDICAO     */

/*		SETOR FUNILARIA		*/
$dt_prog_funilaria = $dados["dt_prog_funilaria"];
$dt_producao_funilaria = $dados["dt_producao_funilaria"];
$dt_exp_funilaria = $dados["dt_exp_funilaria"]; 
$status_funilaria = $dados["status_funilaria"];
$status_funilaria_db = $dados["status_funilaria"];
$dt_previsao_funilaria = $dados["dt_previsao_funilaria"];
$res_funilaria = $dados["res_funilaria"];
$obs_funilaria = $dados["obs_funilaria"];
/*		SETOR FUNILARIA     */


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
else 
{$data_prog_diaria = ($dia_data_prog_diaria."/".$mes_data_prog_diaria."/".$ano_data_prog_diaria);}


/* DATA PREVISAO */
$dia_data_previsao = substr($data_previsao, -2); 
$mes_data_previsao = substr($data_previsao, -5,2);
$ano_data_previsao = substr($data_previsao, -10,4); 
if ($dia_data_previsao == "" AND $mes_data_previsao == "" AND $ano_data_previsao == "") 
{$data_previsao = ($dia_data_previsao."".$mes_data_previsao."".$ano_data_previsao);  } 
else 
{$data_previsao = ($dia_data_previsao."/".$mes_data_previsao."/".$ano_data_previsao);}



$dia_data_motor_recebido = substr($data_motor_recebido, -2); 
$mes_data_motor_recebido = substr($data_motor_recebido, -5,2);
$ano_data_motor_recebido = substr($data_motor_recebido, -10,4);
if ($dia_data_motor_recebido == "" AND $mes_data_motor_recebido == "" AND $ano_data_motor_recebido == "") 
{$data_motor_recebido = ($dia_data_motor_recebido."".$mes_data_motor_recebido."".$ano_data_motor_recebido); } 
else 
{$data_motor_recebido = ($dia_data_motor_recebido."/".$mes_data_motor_recebido."/".$ano_data_motor_recebido); }


$dia_reprogramacao = substr($reprogramacao, -2); 
$mes_reprogramacao = substr($reprogramacao, -5,2); 
$ano_reprogramacao = substr($reprogramacao, -10,4);
if ($dia_reprogramacao == "" AND $mes_reprogramacao == "" AND $ano_reprogramacao == "") 
{$reprogramacao = ($dia_reprogramacao."".$mes_reprogramacao."".$ano_reprogramacao); } 
else 
{$reprogramacao = ($dia_reprogramacao."/".$mes_reprogramacao."/".$ano_reprogramacao); }


$dia_data_baixa = substr($data_baixa, -2); 
$mes_data_baixa = substr($data_baixa, -5,2); 
$ano_data_baixa = substr($data_baixa, -10,4);
if ($dia_data_baixa == "" AND $mes_data_baixa == "" AND $ano_data_baixa == "") 
{$data_baixa = ($dia_data_baixa."".$mes_data_baixa."".$ano_data_baixa); } 
else 
{$data_baixa = ($dia_data_baixa."/".$mes_data_baixa."/".$ano_data_baixa); }


/*-------	SETOR PROJETOS	---------*/
$dia_proj_os_dt_prog = substr($proj_os_dt_prog, -2); 
$mes_proj_os_dt_prog = substr($proj_os_dt_prog, -5,2);
$ano_proj_os_dt_prog = substr($proj_os_dt_prog, -10,4); 
if ($dia_proj_os_dt_prog == "" AND $mes_proj_os_dt_prog == "" AND $ano_proj_os_dt_prog == "") 
{$proj_os_dt_prog = ($dia_proj_os_dt_prog."".$mes_proj_os_dt_prog."".$ano_proj_os_dt_prog); } 
else 
{$proj_os_dt_prog = ($dia_proj_os_dt_prog."/".$mes_proj_os_dt_prog."/".$ano_proj_os_dt_prog); }

$dia_proj_os_dt_entrada = substr($proj_os_dt_entrada, -2); 
$mes_proj_os_dt_entrada = substr($proj_os_dt_entrada, -5,2);
$ano_proj_os_dt_entrada = substr($proj_os_dt_entrada, -10,4); 
if ($dia_proj_os_dt_entrada == "" AND $mes_proj_os_dt_entrada == "" AND $ano_proj_os_dt_entrada == "") 
{$proj_os_dt_entrada = ($dia_proj_os_dt_entrada."".$mes_proj_os_dt_entrada."".$ano_proj_os_dt_entrada); }
else 
{$proj_os_dt_entrada = ($dia_proj_os_dt_entrada."/".$mes_proj_os_dt_entrada."/".$ano_proj_os_dt_entrada); }

$dia_proj_os_dt_saida = substr($proj_os_dt_saida, -2); 
$mes_proj_os_dt_saida = substr($proj_os_dt_saida, -5,2);
$ano_proj_os_dt_saida = substr($proj_os_dt_saida, -10,4); 
if ($dia_proj_os_dt_saida == "" AND $mes_proj_os_dt_saida == "" AND $ano_proj_os_dt_saida == "") 
{$proj_os_dt_saida = ($dia_proj_os_dt_saida."".$mes_proj_os_dt_saida."".$ano_proj_os_dt_saida); }
else 
{$proj_os_dt_saida = ($dia_proj_os_dt_saida."/".$mes_proj_os_dt_saida."/".$ano_proj_os_dt_saida); }
/*-------	SETOR PROJETOS	---------*/


/*-------	SETOR ALMOX	---------*/
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


/*-------	SETOR CORTE	---------*/
$dia_dt_prog_corte = substr($dt_prog_corte, -2); 
$mes_dt_prog_corte = substr($dt_prog_corte, -5,2);
$ano_dt_prog_corte = substr($dt_prog_corte, -10,4); 
if ($dia_dt_prog_corte == "" AND $mes_dt_prog_corte == "" AND $ano_dt_prog_corte == "") 
{$dt_prog_corte = ($dia_dt_prog_corte."".$mes_dt_prog_corte."".$ano_dt_prog_corte); } 
else 
{$dt_prog_corte = ($dia_dt_prog_corte."/".$mes_dt_prog_corte."/".$ano_dt_prog_corte); }

$dia_dt_producao_corte = substr($dt_producao_corte, -2); 
$mes_dt_producao_corte = substr($dt_producao_corte, -5,2);
$ano_dt_producao_corte = substr($dt_producao_corte, -10,4); 
if ($dia_dt_producao_corte == "" AND $mes_dt_producao_corte == "" AND $ano_dt_producao_corte == "") 
{$dt_producao_corte = ($dia_dt_producao_corte."".$mes_dt_producao_corte."".$ano_dt_producao_corte); }
else 
{$dt_producao_corte = ($dia_dt_producao_corte."/".$mes_dt_producao_corte."/".$ano_dt_producao_corte); }

$dia_dt_exp_corte = substr($dt_exp_corte, -2); 
$mes_dt_exp_corte = substr($dt_exp_corte, -5,2);
$ano_dt_exp_corte = substr($dt_exp_corte, -10,4); 
if ($dia_dt_exp_corte == "" AND $mes_dt_exp_corte == "" AND $ano_dt_exp_corte == "") 
{$dt_exp_corte = ($dia_dt_exp_corte."".$mes_dt_exp_corte."".$ano_dt_exp_corte); }
else 
{$dt_exp_corte = ($dia_dt_exp_corte."/".$mes_dt_exp_corte."/".$ano_dt_exp_corte); }
/*-------	SETOR CORTE	---------*/


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


/*-------	SETOR MONTAGEM	---------*/
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


/* ----------------------- FIM CONVERTER DATAS	------------------------------------

	
		<TR class=linha0 border-style: solid; border-width: 1;  
			onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))">

*/
?>

			
		<TR class=linha0 border-style: solid; border-width: 1;>
			
<? /* ------- ID  ------- */ ?>
<input class=nedita_left readonly type=hidden name="id[<?echo$x;?>]" value="<?echo $id?>" size="2">	

<?	/* MOSTRAR DATA EMISSAO  */   ?> 			
<? if ( $lib_data_emissao == "ver" OR $lib_data_emissao == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas> 
<?	if ( $check_data_emissao == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$data_emissao";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR NUMERO O.S  */   ?>
<? if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_num_os == "" ) { ?>
<span style="width:55px;word-wrap:break-word;"> 
<?echo $num_os ."/". $item;?> 
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR NUMERO PROPOSTA  */   ?>	
<? if ( $lib_num_proposta == "ver" OR $lib_num_proposta == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_num_proposta == "") { ?>
<span style="width:80px;word-wrap:break-word;"> 
<?echo "$num_proposta";?> 
</span>
<? } } ?>
</P></TD>
		
<?	/* MOSTRAR NOME CLIENTE  */   ?>				
<? if ( $lib_nome_cliente == "ver" OR $lib_nome_cliente == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas> 
<?	if ( $check_nome_cliente == "") { ?>
<span style="width:120px;word-wrap:break-word;"> 
<?echo "$nome_cliente";?> 
</span>
<? } } ?>
</P></TD>	

<?	/* MOSTRAR OC_OBRA  */   ?>	
<? if ( $lib_oc_obra == "ver" OR $lib_oc_obra == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_oc_obra == "" ) { ?>
<span style="width:100px;word-wrap:break-word;"> 
<?echo "$oc_obra";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR MERCADO  */   ?>
<? if ( $lib_mercado == "ver" OR $lib_mercado == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))"><P class=bordas> 
<?	if ( $check_mercado == "" ) { ?>
<span style="width:55px;word-wrap:break-word;"> 
<?echo "$mercado";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR REPRESENTANTE  */   ?>
<? if ( $lib_representante == "ver" OR $lib_representante == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))"><P class=bordas> 
<?	if ( $check_representante == "" ) { ?>
<span style="width:80px;word-wrap:break-word;"> 
<?echo "$representante";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR ESTADO  */   ?>
<? if ( $lib_estado == "ver" OR $lib_estado == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas> 
<?	if ( $check_estado == "") { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$estado";?> 
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR DATA ENTREGA  */   ?>
<? if ( $lib_data_entrega == "ver" OR $lib_data_entrega == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_data_entrega == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$data_entrega";?> 
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR REPROGRAMAÇÃO  */   ?>
<? if ( $lib_reprogramacao == "ver" OR $lib_reprogramacao == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
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

<?	/* MOSTRAR BAIXA  */   ?>
<? if ( $lib_baixa == "ver" OR $lib_baixa == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_baixa == "" ) { ?>
<span style="width:15px;word-wrap:break-word;"> 
<?echo "$baixa";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR DATA BAIXA  */   ?>
<? if ( $lib_data_baixa == "ver" OR $lib_data_baixa == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas> 
<?	if ( $check_data_baixa == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$data_baixa";?> 
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR DATA PROG. DIARIA  */   ?>
<? if ( $lib_data_prog_diaria == "ver" OR $lib_data_prog_diaria == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_data_prog_diaria == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$data_prog_diaria";?> 
</span>
<? } } ?>
</P></TD> 


<?	/* MOSTRAR DATA PREVISAO  */   ?>
<? if ( $lib_data_previsao == "ver" OR $lib_data_previsao == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_data_previsao == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$data_previsao";?> 
</span>
<? } } ?>
</P></TD>

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
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_local_venda == "" ) { ?>
<span style="width:65px;word-wrap:break-word;"> 
<?echo "$local_venda";?>
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR FORNECIMENTO DO MOTOR  */   ?>
<? if ( $lib_fornecimento_motor == "ver" OR $lib_fornecimento_motor == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_fornecimento_motor == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$fornecimento_motor";?> 
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR DATA MOTOR RECEBIDO  */   ?>
<? if ($lib_data_motor_recebido == "ver" OR $lib_data_motor_recebido == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_data_motor_recebido == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$data_motor_recebido";?> 
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR DESCRICÃO DO VENTILADOR  */   ?>
<? if ( $lib_descr_vent == "ver" OR $lib_descr_vent == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_descr_vent == "" ) { ?>
<span style="width:65px;word-wrap:break-word;"> 
<?echo "$descr_vent";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR QT  */   ?>
<? if ( $lib_qt == "ver" OR $lib_qt == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_qt == "" ) { ?>
<span style="width:15px;word-wrap:break-word;"> 
<?echo "$qt";?> 
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR MODELO  */   ?>
<? if ( $lib_modelo == "ver" OR $lib_modelo == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_modelo == "" ) { ?>
<span style="width:40px;word-wrap:break-word;">
<?echo "$modelo";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR TAMANHO  */   ?>
<? if ( $lib_tamanho == "ver" OR $lib_tamanho == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_tamanho == "" ) { ?>
<span style="width:35px;word-wrap:break-word;"> 
<?echo "$tamanho";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR ARRANJO  */   ?>
<? if ( $lib_arranjo == "ver" OR $lib_arranjo == "alt" ) {?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_arranjo == "" ) { ?>
<span style="width:25px;word-wrap:break-word;"> 
<?echo "$arranjo";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR CLASSE  */   ?>
<? if ( $lib_classe == "ver" OR $lib_classe == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_classe == "" ) { ?>
<span style="width:35px;word-wrap:break-word;">
<?echo "$classe";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR ROTAÇÃO  */   ?>
<? if ( $lib_rotacao == "ver" OR $lib_rotacao == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_rotacao == "" ) { ?>
<span style="width:35px;word-wrap:break-word;"> 
<?echo "$rotacao";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR GAB  */   ?>
<? if ( $lib_gab == "ver" OR $lib_gab == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_gab == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$gab";?>
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR PINTURA  */   ?>
<? if ( $lib_pintura == "ver" OR $lib_pintura == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_pintura == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$pintura";?> 
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR CONSTRUÇÃO  */   ?>
<? if ( $lib_construcao == "ver" OR $lib_construcao == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_construcao == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$construcao";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR VALOR UNITARIO  */   ?>
<? if ( $lib_valor_uni == "ver" OR $lib_valor_uni == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_valor_uni == "" ) { ?>
<span style="width:85px;word-wrap:break-word;"> 
<?echo "R$". "$valor_uni";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR VALOR TOTAL  */   ?>
<? if ( $lib_valor_total == "ver" OR $lib_valor_total == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas> 
<?	if ( $check_valor_total == "" ) { ?>
<span style="width:85px;word-wrap:break-word;"> 
<?echo "R$". number_format($valor_total, 2, ",", ".");?> 
</span>
<? } } ?>
</P></TD>

<?/* JATEAMENTO / GALV. FOGO */?>

<? if ( $lib_jat_g_fogo == "ver" OR $lib_jat_g_fogo == "alt" ) {
	if ( $check_jat_g_fogo == "" ) { ?>

<?   /* TS */  ?>	
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas> 	
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$ts_jat_g_fogo";?>
</span>
</P></TD>

<?	/* STATUS */   ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas> 
<span style="width:25px;word-wrap:break-word;"> 
<?echo "$status_jat_g_fogo"?>
</span>
</P></TD>

<?   /* DT STATUS */  ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_status_jat_g_fogo"?>
</span>
</P></TD>
<? } } ?>

<?/* JATEAMENTO / GALV. FOGO */?>

<?  /* MOSTRAR MOTOR - MAXSIG  */  ?>
<? if ( $lib_motor_maxsig == "ver" OR $lib_motor_maxsig == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_motor_maxsig == "" ) { ?>
<span style="width:35px;word-wrap:break-word;"> 
<?echo "$motor_maxsig";?>
</span>
<? } } ?>
</P></TD>

<?  /* MOSTRAR POLIA - MAXSIG */   ?>
<? if ( $lib_polia_maxsig == "ver" OR $lib_polia_maxsig == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_polia_maxsig == "" ) { ?>
<span style="width:35px;word-wrap:break-word;"> 
<?echo "$polia_maxsig";?>
</span>
<? } } ?>
</P></TD>

<?  /* MOSTRAR FUND - MAXSIG  */  ?>
<? if ( $lib_fund_maxsig == "ver" OR $lib_fund_maxsig == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_fund_maxsig == "" ) { ?>
<span style="width:35px;word-wrap:break-word;"> 
<?echo "$fund_maxsig";?>
</span>
<? } } ?>
</P></TD>

<?  /* MOSTRAR OUTROS - MAXSIG   */ ?>
<? if ( $lib_outros_maxsig == "ver" OR $lib_outros_maxsig == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_outros_maxsig == "" ) { ?>
<span style="width:35px;word-wrap:break-word;"> 
<?echo "$outros_maxsig";?>
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR OBS  */   ?>
<? if ( $lib_obs == "ver" OR $lib_obs == "alt" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas> 
<?	if ( $check_obs == "" ) { ?>
<span style="width:200px;word-wrap:break-word;">
<?echo "$obs";?> 
</span>
<? } } ?>
</P></TD>


<?   /*------------	SETOR PROJETOS	-------------*/  ?>


<?   /*------------	OS	-------------*/  ?>

<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) {
	if ( $check_proj == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* PROJETO OS DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$proj_os_dt_prog";?>
</span>
</P></TD>

<?	/* PROJETO OS STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select name=proj_os_status_novo[<?echo$x;?>] >
<option value=''  <? echo ($proj_os_status==''?"SELECTED":""); ?> >  </option>
<option value='P' <? echo ($proj_os_status=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($proj_os_status=='E'?"SELECTED":""); ?> > E </option>
</select>
<?	/* PROJETO OS STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=proj_os_status_velho[<?echo$x;?>] value="<?echo $proj_os_status_db?>" size="11">
</span>
</P></TD>

<?	/* PROJETO OS DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$proj_os_dt_entrada"?>
<input readonly type=hidden name=proj_os_dt_entrada_velho[<?echo$x;?>] value="<?echo $proj_os_dt_entrada?>" size="11">
</span>
</P></TD>

<?   /* PROJETO OS DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$proj_os_dt_saida"?>
<input readonly type=hidden name=proj_os_dt_saida_velho[<?echo$x;?>] value="<?echo $proj_os_dt_saida?>" size="11">
</span>
</P></TD>

<? } ?>
<?   /*------------	OS	-------------*/  ?>


<?   /*------------	documento	-------------*/  ?>

<? 	if ( $check_documento == "" ) { ?>

<?   /* data book */  ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select name=data_book_novo[<?echo$x;?>] >
<option value='N'  <? echo ($data_book=='N'?"SELECTED":""); ?> > N </option>
<option value='S' <? echo ($data_book=='S'?"SELECTED":""); ?> > S </option>
<option value='P' <? echo ($data_book=='P'?"SELECTED":""); ?> > P </option>
<option value='C' <? echo ($data_book=='C'?"SELECTED":""); ?> > C </option>
<option value='E' <? echo ($data_book=='E'?"SELECTED":""); ?> > E </option>
</select>
</span>
</P></TD>

<?	/* certif. balanc  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select name=certif_balanc_novo[<?echo$x;?>] >
<option value='N'  <? echo ($certif_balanc=='N'?"SELECTED":""); ?> > N </option>
<option value='S' <? echo ($certif_balanc=='S'?"SELECTED":""); ?> > S </option>
<option value='P' <? echo ($certif_balanc=='P'?"SELECTED":""); ?> > P </option>
<option value='C' <? echo ($certif_balanc=='C'?"SELECTED":""); ?> > C </option>
<option value='E' <? echo ($certif_balanc=='E'?"SELECTED":""); ?> > E </option>
</select>
</span>
</P></TD>

<?	/* certif materiais */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select name=certif_materiais_novo[<?echo$x;?>] >
<option value='N'  <? echo ($certif_materiais=='N'?"SELECTED":""); ?> > N </option>
<option value='S' <? echo ($certif_materiais=='S'?"SELECTED":""); ?> > S </option>
<option value='P' <? echo ($certif_materiais=='P'?"SELECTED":""); ?> > P </option>
<option value='C' <? echo ($certif_materiais=='C'?"SELECTED":""); ?> > C </option>
<option value='E' <? echo ($certif_materiais=='E'?"SELECTED":""); ?> > E </option>
</select>
</span>
</P></TD>

<?  /* desenho certif */  ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select name=desenho_certif_novo[<?echo$x;?>] >
<option value='N'  <? echo ($desenho_certif=='N'?"SELECTED":""); ?> > N </option>
<option value='S' <? echo ($desenho_certif=='S'?"SELECTED":""); ?> > S </option>
<option value='P' <? echo ($desenho_certif=='P'?"SELECTED":""); ?> > P </option>
<option value='C' <? echo ($desenho_certif=='C'?"SELECTED":""); ?> > C </option>
<option value='E' <? echo ($desenho_certif=='E'?"SELECTED":""); ?> > E </option>
</select>
</span>
</P></TD>

<? } ?>
<?   /*------------	documento	-------------*/  ?>


<? } ?>
<?   /*------------	SETOR PROJETOS	-------------*/  ?>


<?	/*------------- SETOR ALMOX -----------*/   ?>

<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>
<? if ( $lib_almox == "alt" ) {
	if ( $check_almox == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_almox";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select <?echo $class_almox;?> <?echo $readonly_almox;?> <?echo $disabled_almox;?> name=status_almox_novo[<?echo$x;?>] >
<option value='' <? echo ($status_almox==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_almox=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_almox=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_almox=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_almox=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_almox_velho[<?echo$x;?>] value="<?echo $status_almox_db?>" size="11">
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_almox"?>
<input readonly type=hidden name=dt_producao_almox_velho[<?echo$x;?>] value="<?echo $dt_producao_almox?>" size="11">
</span>
</P></TD>

<?   /* DT PREVISAO */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left name=dt_previsao_almox_novo[<?echo$x;?>] maxLength=10 size=11 value="<?echo $dt_previsao_almox?>" onkeyup="Trocando_Data(this,event)"></span> <? $exemplo = "dd/mm/aaaa"; echo "$exemplo" ?>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_almox"?>
<input readonly type=hidden name=dt_exp_almox_velho[<?echo$x;?>] value="<?echo $dt_exp_almox?>" size="11">
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_almox;?> <?echo $readonly_almox;?> <?echo $disabled_almox;?> name=res_almox_novo[<?echo$x;?>] maxLength=20 size=20 value="<?echo $res_almox?>" onchange="this.value = this.value.toUpperCase();"></span>
</P></TD>

<?   /* OBS */  ?>
<?$buscaobs_almox = mysql_query("select distinct obs_almox from pcp order by 'obs_almox'");
$totalobs_almox = mysql_num_rows($buscaobs_almox); $count = $totalobs_almox-1;
for($i=0; $i<$totalobs_almox; $i++) { $nomeobs_almox = mysql_result($buscaobs_almox,$i,"obs_almox"); $palavrasobs_almox.="'$nomeobs_almox'";
if($i<$count) { $palavrasobs_almox.=","; } }
?>
<TD align=middle><P class=bordas> 
<textarea <?echo $class_almox;?> <?echo $readonly_almox;?> <?echo $disabled_almox;?> name=obs_almox_novo[<?echo$x;?>] rows=2 cols=25 id="textbox1" onchange="this.value = this.value.toUpperCase();"><? echo $obs_almox; ?></textarea>
</P></TD>
<? } ?>
<? } ?>
<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>


<? /* -------------------------SOMENTE PARA QUEM VAI VER ----------------------*/?>
<? if ( $lib_almox == "ver" OR $lib_setor_ver == "sim" ) {
	if ( $check_almox == "" OR $check_setor_ver == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_almox";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<?echo "$status_almox";?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_almox"?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_almox"?>
</span>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_almox"?>
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:85px;word-wrap:break-word;"> 
<?echo "$res_almox"?>
</span>

<?   /* OBS */  ?>
<TD align=middle><P class=bordas> 
<span style="width:150px;word-wrap:break-word;"> 
<?echo "$obs_almox"?>
</span>
<? } ?>
<? } ?>

<?	/*------------- SETOR ALMOX -----------*/   ?>




<?	/*------------- SETOR CORTE -----------*/   ?>

<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>
<? if ( $lib_corte == "alt" ) {
	if ( $check_corte == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_corte";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select <?echo $class_corte;?> <?echo $readonly_corte;?> <?echo $disabled_corte;?> name=status_corte_novo[<?echo$x;?>] >
<option value='' <? echo ($status_corte==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_corte=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_corte=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_corte=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_corte=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_corte_velho[<?echo$x;?>] value="<?echo $status_corte_db?>" size="11">
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_corte"?>
<input readonly type=hidden name=dt_producao_corte_velho[<?echo$x;?>] value="<?echo $dt_producao_corte?>" size="11">
</span>
</P></TD>

<?   /* DT PREVISAO */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left name=dt_previsao_corte_novo[<?echo$x;?>] maxLength=10 size=11 value="<?echo $dt_previsao_corte?>" onkeyup="Trocando_Data(this,event)"></span> <? $exemplo = "dd/mm/aaaa"; echo "$exemplo" ?>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_corte"?>
<input readonly type=hidden name=dt_exp_corte_velho[<?echo$x;?>] value="<?echo $dt_exp_corte?>" size="11">
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_corte;?> <?echo $readonly_corte;?> <?echo $disabled_corte;?> name=res_corte_novo[<?echo$x;?>] maxLength=20 size=20 value="<?echo $res_corte?>" onchange="this.value = this.value.toUpperCase();"></span>
</P></TD>

<?   /* OBS */  ?>
<?$buscaobs_corte = mysql_query("select distinct obs_corte from pcp order by 'obs_corte'");
$totalobs_corte = mysql_num_rows($buscaobs_corte); $count = $totalobs_corte-1;
for($i=0; $i<$totalobs_corte; $i++) { $nomeobs_corte = mysql_result($buscaobs_corte,$i,"obs_corte"); $palavrasobs_corte.="'$nomeobs_corte'";
if($i<$count) { $palavrasobs_corte.=","; } }
?>
<TD align=middle><P class=bordas> 
<textarea <?echo $class_corte;?> <?echo $readonly_corte;?> <?echo $disabled_corte;?> name=obs_corte_novo[<?echo$x;?>] rows=2 cols=25 id="textbox1" onchange="this.value = this.value.toUpperCase();"><? echo $obs_corte; ?></textarea>
</P></TD>
<? } ?>
<? } ?>
<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>


<? /* -------------------------SOMENTE PARA QUEM VAI VER ----------------------*/?>
<? if ( $lib_corte == "ver" OR $lib_setor_ver == "sim" ) {
	if ( $check_corte == "" OR $check_setor_ver == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_corte";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<?echo "$status_corte";?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_corte"?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_corte"?>
</span>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_corte"?>
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:85px;word-wrap:break-word;"> 
<?echo "$res_corte"?>
</span>

<?   /* OBS */  ?>
<TD align=middle><P class=bordas> 
<span style="width:150px;word-wrap:break-word;"> 
<?echo "$obs_corte"?>
</span>
<? } ?>
<? } ?>

<?	/*------------- SETOR CORTE -----------*/   ?>


<?	/*------------- SETOR BALANCEAMENTOS -----------*/   ?>

<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>
<? if ( $lib_balanc == "alt" ) {
	if ( $check_balanc == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_balanc";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select <?echo $class_balanc;?> <?echo $readonly_balanc;?> <?echo $disabled_balanc;?> name=status_balanc_novo[<?echo$x;?>] >
<option value='' <? echo ($status_balanc==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_balanc=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_balanc=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_balanc=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_balanc=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_balanc_velho[<?echo$x;?>] value="<?echo $status_balanc_db?>" size="11">
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_balanc"?>
<input readonly type=hidden name=dt_producao_balanc_velho[<?echo$x;?>] value="<?echo $dt_producao_balanc?>" size="11">
</span>
</P></TD>

<?   /* DT PREVISAO */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left name=dt_previsao_balanc_novo[<?echo$x;?>] maxLength=10 size=11 value="<?echo $dt_previsao_balanc?>" onkeyup="Trocando_Data(this,event)"></span> <? $exemplo = "dd/mm/aaaa"; echo "$exemplo" ?>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_balanc"?>
<input readonly type=hidden name=dt_exp_balanc_velho[<?echo$x;?>] value="<?echo $dt_exp_balanc?>" size="11">
</span>
</P></TD>

<?   /* PLANO 1 */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_balanc;?> <?echo $readonly_balanc;?> <?echo $disabled_balanc;?> name=plano1_balanc_novo[<?echo$x;?>] maxLength=10 size=12 value="<?echo $plano1_balanc?>" >

<?   /* PLANO 2 */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_balanc;?> <?echo $readonly_balanc;?> <?echo $disabled_balanc;?> name=plano2_balanc_novo[<?echo$x;?>] maxLength=10 size=12 value="<?echo $plano2_balanc?>" ></span>
</P></TD>

<?   /* RESIDUAL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_balanc;?> <?echo $readonly_balanc;?> <?echo $disabled_balanc;?> name=residual_balanc_novo[<?echo$x;?>] maxLength=10 size=12 value="<?echo $residual_balanc?>">
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_balanc;?> <?echo $readonly_balanc;?> <?echo $disabled_balanc;?> name=res_balanc_novo[<?echo$x;?>] maxLength=20 size=20 value="<?echo $res_balanc?>" onchange="this.value = this.value.toUpperCase();"
>
</span>
</P></TD>

<?   /* OBS */  ?>
<td class=left>
<?
$buscaobs_balanc = mysql_query("select distinct obs_balanc from pcp order by 'obs_balanc'");
$totalobs_balanc = mysql_num_rows($buscaobs_balanc); $count = $totalobs_balanc-1;
for($i=0; $i<$totalobs_balanc; $i++) { $nomeobs_balanc = mysql_result($buscaobs_balanc,$i,"obs_balanc"); $palavrasobs_balanc.="'$nomeobs_balanc'";
if($i<$count) { $palavrasobs_balanc.=","; } }
?>
<textarea <?echo $class_balanc;?> <?echo $readonly_balanc;?> <?echo $disabled_balanc;?> name=obs_balanc_novo[<?echo$x;?>] rows=2 cols=25 id="textbox10" onchange="this.value = this.value.toUpperCase();"><? echo $obs_balanc; ?></textarea>
</td>
<? } ?>
<? } ?>
<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>


<? /* ----------------SOMENTE PARA QUEM VAI VER ------------------------*/?>

<? if ( $lib_balanc == "ver" OR $lib_setor_ver == "sim" ) {
	if ( $check_balanc == "" OR $check_setor_ver == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_balanc";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<?echo "$status_balanc";?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_balanc"?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_balanc"?>
</span>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_balanc"?>
</span>
</P></TD>

<?   /* PLANO 1 */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$plano1_balanc"?>
</span>
</P></TD>

<?   /* PLANO 2 */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$plano2_balanc"?>
</span>
</P></TD>

<?   /* RESIDUAL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$residual_balanc"?>
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:85px;word-wrap:break-word;"> 
<?echo "$res_balanc"?>
</span>

<?   /* OBS */  ?>
<TD align=middle><P class=bordas> 
<span style="width:150px;word-wrap:break-word;"> 
<?echo "$obs_balanc"?>
</span>
<? } ?>
<? } ?>

<?	/*------------- SETOR BALANCEAMENTO -----------*/   ?>


<?	/*------------- SETOR CALDERARIA 1 -----------*/   ?>

<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>
<? if ( $lib_cald1 == "alt" ) {
	if ( $check_cald1 == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_cald1";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select <?echo $class_cald1;?> <?echo $readonly_cald1;?> <?echo $disabled_cald1;?> name=status_cald1_novo[<?echo$x;?>] >
<option value='' <? echo ($status_cald1==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_cald1=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_cald1=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_cald1=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_cald1=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_cald1_velho[<?echo$x;?>] value="<?echo $status_cald1_db?>" size="11">
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_cald1"?>
<input readonly type=hidden name=dt_producao_cald1_velho[<?echo$x;?>] value="<?echo $dt_producao_cald1?>" size="11">
</span>
</P></TD>

<?   /* DT PREVISAO */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left name=dt_previsao_cald1_novo[<?echo$x;?>] maxLength=10 size=11 value="<?echo $dt_previsao_cald1?>" onkeyup="Trocando_Data(this,event)"></span> <? $exemplo = "dd/mm/aaaa"; echo "$exemplo" ?>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_cald1"?>
<input readonly type=hidden name=dt_exp_cald1_velho[<?echo$x;?>] value="<?echo $dt_exp_cald1?>" size="11">
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_cald1;?> <?echo $readonly_cald1;?> <?echo $disabled_cald1;?> name=res_cald1_novo[<?echo$x;?>] maxLength=20 size=20 value="<?echo $res_cald1?>" onchange="this.value = this.value.toUpperCase();">
</span>
</P></TD>

<?   /* OBS */  ?>
<TD align=middle><P class=bordas> 
<textarea <?echo $class_cald1;?> <?echo $readonly_cald1;?> <?echo $disabled_cald1;?> name=obs_cald1_novo[<?echo$x;?>] rows=2 cols=25 id="textbox1" onchange="this.value = this.value.toUpperCase();"><? echo $obs_cald1; ?></textarea>
</P></TD>
<? } ?>
<? } ?>
<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>


<? /* -------------------------SOMENTE PARA QUEM VAI VER ----------------------*/?>
<? if ( $lib_cald1 == "ver" OR $lib_setor_ver == "sim" ) {
	if ( $check_cald1 == "" OR $check_setor_ver == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_cald1";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<?echo "$status_cald1";?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_cald1"?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_cald1"?>
</span>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_cald1"?>
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:85px;word-wrap:break-word;"> 
<?echo "$res_cald1"?>
</span>

<?   /* OBS */  ?>
<TD align=middle><P class=bordas> 
<span style="width:150px;word-wrap:break-word;"> 
<?echo "$obs_cald1"?>
</span>
<? } ?>
<? } ?>

<?	/*------------- SETOR CALDERARIA 1 -----------*/   ?>


<?	/*------------- SETOR CALDERARIA 2 -----------*/   ?>

<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>
<? if ( $lib_cald2 == "alt" ) {
	if ( $check_cald2 == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?
//DATA HOJE
$b = date('d'); $c = date('n'); $d = date('Y'); 
if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; 
$data_hoje = $b."/".$c."/".$d; 

$data_hoje_mktime  = mktime(0,0,0,$c,$b,$d);    
$dt_previsao_cald2_mktime = mktime(0,0,0,$mes_dt_previsao_cald2,$dia_dt_previsao_cald2,$ano_dt_previsao_cald2);

if  ($baixa == "P") {
if ( $data_hoje_mktime > $dt_previsao_cald2_mktime ) {  ?>
<FONT COLOR="#FF0000">
<? } else { ?>
<FONT COLOR="#006400">
<? } } ?>
<?echo "$dt_prog_cald2";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select <?echo $class_cald2;?> <?echo $readonly_cald2;?> <?echo $disabled_cald2;?> name=status_cald2_novo[<?echo$x;?>] >
<option value='' <? echo ($status_cald2==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_cald2=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_cald2=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_cald2=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_cald2=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_cald2_velho[<?echo$x;?>] value="<?echo $status_cald2_db?>" size="11">
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_cald2"?>
<input readonly type=hidden name=dt_producao_cald2_velho[<?echo$x;?>] value="<?echo $dt_producao_cald2?>" size="11">
</span>
</P></TD>

<?   /* DT PREVISAO */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left name=dt_previsao_cald2_novo[<?echo$x;?>] maxLength=10 size=11 value="<?echo $dt_previsao_cald2?>" onkeyup="Trocando_Data(this,event)"> </span> <? $exemplo = "dd/mm/aaaa"; echo "$exemplo" ?>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_cald2"?>
<input readonly type=hidden name=dt_exp_cald2_velho[<?echo$x;?>] value="<?echo $dt_exp_cald2?>" size="11">
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_cald2;?> <?echo $readonly_cald2;?> <?echo $disabled_cald2;?> name=res_cald2_novo[<?echo$x;?>] maxLength=20 size=20 value="<?echo $res_cald2?>" onchange="this.value = this.value.toUpperCase();">
</span>
</P></TD>

<?   /* OBS */  ?>
<TD align=middle><P class=bordas> 
<textarea <?echo $class_cald2;?> <?echo $readonly_cald2;?> <?echo $disabled_cald2;?> name=obs_cald2_novo[<?echo$x;?>] rows=2 cols=25 id="textbox1" onchange="this.value = this.value.toUpperCase();"><? echo $obs_cald2; ?></textarea>
</P></TD>
<? } ?>
<? } ?>
<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>


<? /* -------------------------SOMENTE PARA QUEM VAI VER ----------------------*/?>
<? if ( $lib_cald2 == "ver" OR $lib_setor_ver == "sim" ) {
	if ( $check_cald2 == "" OR $check_setor_ver == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_cald2";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<?echo "$status_cald2";?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_cald2"?>
</span>
</P></TD>

<?   /* DT PREVISAO */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_cald2"?>
</span>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_cald2"?>
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:85px;word-wrap:break-word;"> 
<?echo "$res_cald2"?>
</span>

<?   /* OBS */  ?>
<TD align=middle><P class=bordas> 
<span style="width:150px;word-wrap:break-word;"> 
<?echo "$obs_cald2"?>
</span>
<? } ?>
<? } ?>

<?	/*------------- SETOR CALDERARIA 2 -----------*/   ?>


<?	/*------------- SETOR PINTURA -----------*/   ?>

<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>
<? if ( $lib_pintura_setor == "alt" ) {
	if ( $check_pintura_setor == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_pintura";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select <?echo $class_pintura_setor;?> <?echo $readonly_pintura;?> <?echo $disabled_pintura;?> name=status_pintura_novo[<?echo$x;?>] >
<option value='' <? echo ($status_pintura==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_pintura=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_pintura=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_pintura=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_pintura=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_pintura_velho[<?echo$x;?>] value="<?echo $status_pintura_db?>" size="11">
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_pintura"?>
<input readonly type=hidden name=dt_producao_pintura_velho[<?echo$x;?>] value="<?echo $dt_producao_pintura?>" size="11">
</span>
</P></TD>

<?   /* DT PREVISAO */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left name=dt_previsao_pintura_novo[<?echo$x;?>] maxLength=10 size=11 value="<?echo $dt_previsao_pintura?>" onkeyup="Trocando_Data(this,event)"></span> <? $exemplo = "dd/mm/aaaa"; echo "$exemplo" ?>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_pintura"?>
<input readonly type=hidden name=dt_exp_pintura_velho[<?echo$x;?>] value="<?echo $dt_exp_pintura?>" size="11">
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_pintura;?> <?echo $readonly_pintura;?> <?echo $disabled_pintura;?> name=res_pintura_novo[<?echo$x;?>] maxLength=20 size=20 value="<?echo $res_pintura?>" onchange="this.value = this.value.toUpperCase();">
</span>
</P></TD>

<?   /* OBS */  ?>
<?$buscaobs_pintura = mysql_query("select distinct obs_pintura from pcp order by 'obs_pintura'");
$totalobs_pintura = mysql_num_rows($buscaobs_pintura); $count = $totalobs_pintura-1;
for($i=0; $i<$totalobs_pintura; $i++) { $nomeobs_pintura = mysql_result($buscaobs_pintura,$i,"obs_pintura"); $palavrasobs_pintura.="'$nomeobs_pintura'";
if($i<$count) { $palavrasobs_pintura.=","; } }
?>
<TD align=middle><P class=bordas> 
<textarea <?echo $class_pintura;?> <?echo $readonly_pintura;?> <?echo $disabled_pintura;?> name=obs_pintura_novo[<?echo$x;?>] rows=2 cols=25 id="textbox1" onchange="this.value = this.value.toUpperCase();"><? echo $obs_pintura; ?></textarea>
</P></TD>
<? } ?>
<? } ?>
<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>


<? /* -------------------------SOMENTE PARA QUEM VAI VER ----------------------*/?>
<? if ( $lib_pintura_setor == "ver" OR $lib_setor_ver == "sim" ) {
	if ( $check_pintura_setor == "" OR $check_setor_ver == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_pintura";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<?echo "$status_pintura";?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_pintura"?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_pintura"?>
</span>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_pintura"?>
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:85px;word-wrap:break-word;"> 
<?echo "$res_pintura"?>
</span>

<?   /* OBS */  ?>
<TD align=middle><P class=bordas> 
<span style="width:150px;word-wrap:break-word;"> 
<?echo "$obs_pintura"?>
</span>
<? } ?>
<? } ?>

<?	/*------------- SETOR PINTURA -----------*/   ?>


<?	/*------------- SETOR ROTOR LL -----------*/   ?>

<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>
<? if ( $lib_rotor_ll == "alt" ) {
	if ( $check_rotor_ll == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_rotor_ll";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select <?echo $class_rotor_ll;?> <?echo $readonly_rotor_ll;?> <?echo $disabled_rotor_ll;?> name=status_rotor_ll_novo[<?echo$x;?>] >
<option value='' <? echo ($status_rotor_ll==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_rotor_ll=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_rotor_ll=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_rotor_ll=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_rotor_ll=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_rotor_ll_velho[<?echo$x;?>] value="<?echo $status_rotor_ll_db?>" size="11">
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_rotor_ll"?>
<input readonly type=hidden name=dt_producao_rotor_ll_velho[<?echo$x;?>] value="<?echo $dt_producao_rotor_ll?>" size="11">
</span>
</P></TD>

<?   /* DT PREVISAO */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left name=dt_previsao_rotor_ll_novo[<?echo$x;?>] maxLength=10 size=11 value="<?echo $dt_previsao_rotor_ll?>" onkeyup="Trocando_Data(this,event)">
</span> <? $exemplo = "dd/mm/aaaa"; echo "$exemplo" ?>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_rotor_ll"?>
<input readonly type=hidden name=dt_exp_rotor_ll_velho[<?echo$x;?>] value="<?echo $dt_exp_rotor_ll?>" size="11">
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_rotor_ll;?> <?echo $readonly_rotor_ll;?> <?echo $disabled_rotor_ll;?> name=res_rotor_ll_novo[<?echo$x;?>] maxLength=20 size=20 value="<?echo $res_rotor_ll?>" onchange="this.value = this.value.toUpperCase();">
</span>
</P></TD>

<?   /* OBS */  ?>
<TD align=middle><P class=bordas> 
<textarea <?echo $class_rotor_ll;?> <?echo $readonly_rotor_ll;?> <?echo $disabled_rotor_ll;?> name=obs_rotor_ll_novo[<?echo$x;?>] rows=2 cols=25 id="textbox1" onchange="this.value = this.value.toUpperCase();"><? echo $obs_rotor_ll; ?></textarea>
</P></TD>
<? } ?>
<? } ?>
<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>


<? /* -------------------------SOMENTE PARA QUEM VAI VER ----------------------*/?>
<? if ( $lib_rotor_ll == "ver" OR $lib_setor_ver == "sim" ) {
	if ( $check_rotor_ll == "" OR $check_setor_ver == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_rotor_ll";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<?echo "$status_rotor_ll";?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_rotor_ll"?>
</span>
</P></TD>

<?   /* DT PREVISAO */  ?>
<TD align=middle><P class=bordas> 
<span style="width:85px;word-wrap:break-word;"> 
<?echo "$dt_previsao_rotor_ll"?>
</span>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_rotor_ll"?>
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:85px;word-wrap:break-word;"> 
<?echo "$res_rotor_ll"?>
</span>

<?   /* OBS */  ?>
<TD align=middle><P class=bordas> 
<span style="width:150px;word-wrap:break-word;"> 
<?echo "$obs_rotor_ll"?>
</span>
<? } ?>
<? } ?>

<?	/*------------- SETOR ROTOR LL -----------*/   ?>


<?	/*------------- SETOR ROTOR SIR -----------*/   ?>

<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>
<? if ( $lib_rotor_sir == "alt" ) {
	if ( $check_rotor_sir == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_rotor_sir";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select <?echo $class_rotor_sir;?> <?echo $readonly_rotor_sir;?> <?echo $disabled_rotor_sir;?> name=status_rotor_sir_novo[<?echo$x;?>] >
<option value='' <? echo ($status_rotor_sir==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_rotor_sir=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_rotor_sir=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_rotor_sir=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_rotor_sir=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_rotor_sir_velho[<?echo$x;?>] value="<?echo $status_rotor_sir_db?>" size="11">
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_rotor_sir"?>
<input readonly type=hidden name=dt_producao_rotor_sir_velho[<?echo$x;?>] value="<?echo $dt_producao_rotor_sir?>" size="11">
</span>
</P></TD>

<?   /* DT PREVISAO */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left name=dt_previsao_rotor_sir_novo[<?echo$x;?>] maxLength=10 size=11 value="<?echo $dt_previsao_rotor_sir?>" onkeyup="Trocando_Data(this,event)">
</span> <? $exemplo = "dd/mm/aaaa"; echo "$exemplo" ?>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_rotor_sir"?>
<input readonly type=hidden name=dt_exp_rotor_sir_velho[<?echo$x;?>] value="<?echo $dt_exp_rotor_sir?>" size="11">
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_rotor_sir;?> <?echo $readonly_rotor_sir;?> <?echo $disabled_rotor_sir;?> name=res_rotor_sir_novo[<?echo$x;?>] maxLength=20 size=20 value="<?echo $res_rotor_sir?>" onchange="this.value = this.value.toUpperCase();">
</span>
</P></TD>

<?   /* OBS */  ?>
<TD align=middle><P class=bordas> 
<textarea <?echo $class_rotor_sir;?> <?echo $readonly_rotor_sir;?> <?echo $disabled_rotor_sir;?> name=obs_rotor_sir_novo[<?echo$x;?>] rows=2 cols=25 id="textbox1" onchange="this.value = this.value.toUpperCase();"><? echo $obs_rotor_sir; ?></textarea>
</P></TD>
<? } ?>
<? } ?>
<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>


<? /* -------------------------SOMENTE PARA QUEM VAI VER ----------------------*/?>
<? if ( $lib_rotor_sir == "ver" OR $lib_setor_ver == "sim" ) {
	if ( $check_rotor_sir == "" OR $check_setor_ver == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_rotor_sir";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<?echo "$status_rotor_sir";?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_rotor_sir"?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_rotor_sir"?>
</span>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_rotor_sir"?>
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:85px;word-wrap:break-word;"> 
<?echo "$res_rotor_sir"?>
</span>

<?   /* OBS */  ?>
<TD align=middle><P class=bordas> 
<span style="width:150px;word-wrap:break-word;"> 
<?echo "$obs_rotor_sir"?>
</span>
<? } ?>
<? } ?>

<?	/*------------- SETOR ROTOR SIR -----------*/   ?>



<?	/*------------- SETOR MONTAGEM -----------*/   ?>

<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>
<? if ( $lib_montagem == "alt" ) {
	if ( $check_montagem == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_montagem";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select <?echo $class_montagem;?> <?echo $readonly_montagem;?> <?echo $disabled_montagem;?> name=status_montagem_novo[<?echo$x;?>] >
<option value='' <? echo ($status_montagem==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_montagem=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_montagem=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_montagem=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_montagem=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_montagem_velho[<?echo$x;?>] value="<?echo $status_montagem_db?>" size="11">
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_montagem"?>
<input readonly type=hidden name=dt_producao_montagem_velho[<?echo$x;?>] value="<?echo $dt_producao_montagem?>" size="11">
</span>
</P></TD>

<?   /* DT PREVISAO */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left name=dt_previsao_montagem_novo[<?echo$x;?>] maxLength=10 size=11 value="<?echo $dt_previsao_montagem?>" onkeyup="Trocando_Data(this,event)">
</span> <? $exemplo = "dd/mm/aaaa"; echo "$exemplo" ?>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_montagem"?>
<input readonly type=hidden name=dt_exp_montagem_velho[<?echo$x;?>] value="<?echo $dt_exp_montagem?>" size="11">
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_montagem;?> <?echo $readonly_montagem;?> <?echo $disabled_montagem;?> name=res_montagem_novo[<?echo$x;?>] maxLength=20 size=20 value="<?echo $res_montagem?>" onchange="this.value = this.value.toUpperCase();">
</span>
</P></TD>

<?   /* OBS */  ?>
<TD align=middle><P class=bordas> 
<textarea <?echo $class_montagem;?> <?echo $readonly_montagem;?> <?echo $disabled_montagem;?> name=obs_montagem_novo[<?echo$x;?>] rows=2 cols=25 id="textbox1" onchange="this.value = this.value.toUpperCase();"><? echo $obs_montagem; ?></textarea>
</P></TD>
<? } ?>
<? } ?>
<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>


<? /* -------------------------SOMENTE PARA QUEM VAI VER ----------------------*/?>
<? if ( $lib_montagem == "ver" OR $lib_setor_ver == "sim" ) {
	if ( $check_montagem == "" OR $check_setor_ver == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_montagem";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<?echo "$status_montagem";?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_montagem"?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_montagem"?>
</span>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_montagem"?>
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:85px;word-wrap:break-word;"> 
<?echo "$res_montagem"?>
</span>

<?   /* OBS */  ?>
<TD align=middle><P class=bordas> 
<span style="width:150px;word-wrap:break-word;"> 
<?echo "$obs_montagem"?>
</span>
<? } ?>
<? } ?>

<?	/*------------- SETOR MONTAGEM -----------*/   ?>


<?	/*------------- SETOR GABINETE -----------*/   ?>

<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>
<? if ( $lib_gabinete == "alt" ) {
	if ( $check_gabinete == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_gabinete";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select <?echo $class_gabinete;?> <?echo $readonly_gabinete;?> <?echo $disabled_gabinete;?> name=status_gabinete_novo[<?echo$x;?>] >
<option value='' <? echo ($status_gabinete==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_gabinete=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_gabinete=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_gabinete=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_gabinete=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_gabinete_velho[<?echo$x;?>] value="<?echo $status_gabinete_db?>" size="11">
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_gabinete"?>
<input readonly type=hidden name=dt_producao_gabinete_velho[<?echo$x;?>] value="<?echo $dt_producao_gabinete?>" size="11">
</span>
</P></TD>

<?   /* DT PREVISAO */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left name=dt_previsao_gabinete_novo[<?echo$x;?>] maxLength=10 size=11 value="<?echo $dt_previsao_gabinete?>" onkeyup="Trocando_Data(this,event)">
</span> <? $exemplo = "dd/mm/aaaa"; echo "$exemplo" ?>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_gabinete"?>
<input readonly type=hidden name=dt_exp_gabinete_velho[<?echo$x;?>] value="<?echo $dt_exp_gabinete?>" size="11">
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_gabinete;?> <?echo $readonly_gabinete;?> <?echo $disabled_gabinete;?> name=res_gabinete_novo[<?echo$x;?>] maxLength=20 size=20 value="<?echo $res_gabinete?>" onchange="this.value = this.value.toUpperCase();">
</span>
</P></TD>

<?   /* OBS */  ?>
<TD align=middle><P class=bordas> 
<textarea <?echo $class_gabinete;?> <?echo $readonly_gabinete;?> <?echo $disabled_gabinete;?> name=obs_gabinete_novo[<?echo$x;?>] rows=2 cols=25 id="textbox1" onchange="this.value = this.value.toUpperCase();"><? echo $obs_gabinete; ?></textarea>
</P></TD>
<? } ?>
<? } ?>
<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>


<? /* -------------------------SOMENTE PARA QUEM VAI VER ----------------------*/?>
<? if ( $lib_gabinete == "ver" OR $lib_setor_ver == "sim" ) {
	if ( $check_gabinete == "" OR $check_setor_ver == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_gabinete";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<?echo "$status_gabinete";?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_gabinete"?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_gabinete"?>
</span>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_gabinete"?>
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:85px;word-wrap:break-word;"> 
<?echo "$res_gabinete"?>
</span>

<?   /* OBS */  ?>
<TD align=middle><P class=bordas> 
<span style="width:150px;word-wrap:break-word;"> 
<?echo "$obs_gabinete"?>
</span>
<? } ?>
<? } ?>

<?	/*------------- SETOR GABINETE -----------*/   ?>



<?	/*------------- SETOR USINAGEM -----------*/   ?>

<?/* SETOR EIXO */?>


<? if ( $lib_usinagem_eixo == "alt" ) {
	if ( $check_usinagem_eixo == "" ) { ?>
	
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_usinagem_eixo";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select <?echo $class_usinagem_eixo;?> <?echo $readonly_usinagem_eixo;?> <?echo $disabled_usinagem_eixo;?> name=status_usinagem_eixo_novo[<?echo$x;?>] >
<option value='A' <? echo ($status_usinagem_eixo=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_usinagem_eixo=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_usinagem_eixo=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_usinagem_eixo=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_usinagem_eixo_velho[<?echo$x;?>] value="<?echo $status_usinagem_eixo_db?>" size="11">
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_usinagem_eixo"?>
<input readonly type=hidden name=dt_producao_usinagem_eixo_velho[<?echo$x;?>] value="<?echo $dt_producao_usinagem_eixo?>" size="11">
</span>
</P></TD>

<?   /* DT PREVISAO */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_usinagem_eixo;?> <?echo $readonly_usinagem_eixo;?> <?echo $disabled_usinagem_eixo;?> name=dt_previsao_usinagem_eixo_novo[<?echo$x;?>] maxLength=10 size=11 value="<?echo $dt_previsao_usinagem_eixo?>" onkeyup="Trocando_Data(this,event)">
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_usinagem_eixo"?>
<input readonly type=hidden name=dt_exp_usinagem_eixo_velho[<?echo$x;?>] value="<?echo $dt_exp_usinagem_eixo?>" size="11">
</span>
</P></TD>
<? } ?>
<? } ?>


<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>


<? /* -------------------------SOMENTE PARA QUEM VAI VER ----------------------*/?>

<? if ( $lib_usinagem_eixo == "ver" OR $lib_setor_ver == "sim" ) {
	if ( $check_usinagem_eixo == "" OR $check_setor_ver == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_usinagem_eixo";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<?echo "$status_usinagem_eixo";?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_usinagem_eixo"?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_usinagem_eixo"?>
</span>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_usinagem_eixo"?>
</span>
</P></TD>
<? } ?>
<? } ?>

<?/* SETOR EIXO */?>


<?/* SETOR NUC_CUBO */?>

<? if ( $lib_usinagem_nuc_cubo == "alt" ) {
	if ( $check_usinagem_nuc_cubo == "" ) { ?>
	
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_usinagem_nuc_cubo";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select <?echo $class_usinagem_nuc_cubo;?> <?echo $readonly_usinagem_nuc_cubo;?> <?echo $disabled_usinagem_nuc_cubo;?> name=status_usinagem_nuc_cubo_novo[<?echo$x;?>] >
<option value='A' <? echo ($status_usinagem_nuc_cubo=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_usinagem_nuc_cubo=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_usinagem_nuc_cubo=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_usinagem_nuc_cubo=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_usinagem_nuc_cubo_velho[<?echo$x;?>] value="<?echo $status_usinagem_nuc_cubo_db?>" size="11">
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_usinagem_nuc_cubo"?>
<input readonly type=hidden name=dt_producao_usinagem_nuc_cubo_velho[<?echo$x;?>] value="<?echo $dt_producao_usinagem_nuc_cubo?>" size="11">
</span>
</P></TD>

<?   /* DT PREVISAO */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_usinagem_nuc_cubo;?> <?echo $readonly_usinagem_nuc_cubo;?> <?echo $disabled_usinagem_nuc_cubo;?> name=dt_previsao_usinagem_nuc_cubo_novo[<?echo$x;?>] maxLength=10 size=11 value="<?echo $dt_previsao_usinagem_nuc_cubo?>" onkeyup="Trocando_Data(this,event)">
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_usinagem_nuc_cubo"?>
<input readonly type=hidden name=dt_exp_usinagem_nuc_cubo_velho[<?echo$x;?>] value="<?echo $dt_exp_usinagem_nuc_cubo?>" size="11">
</span>
</P></TD>
<? } ?>
<? } ?>

<? /* -------------------------SOMENTE PARA QUEM VAI VER ----------------------*/?>

<? if ( $lib_usinagem_nuc_cubo == "ver" OR $lib_setor_ver == "sim" ) {
	if ( $check_usinagem_nuc_cubo == "" OR $check_setor_ver == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_usinagem_nuc_cubo";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<?echo "$status_usinagem_nuc_cubo";?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_usinagem_nuc_cubo"?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_usinagem_nuc_cubo"?>
</span>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_usinagem_nuc_cubo"?>
</span>
</P></TD>
<? } ?>
<? } ?>


<?/* SETOR NUC_CUBO */?>


<?/* SETOR POL_MOT */?>

<? if ( $lib_usinagem_pol_mot == "alt" ) {
	if ( $check_usinagem_pol_mot == "" ) { ?>
	
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_usinagem_pol_mot";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select <?echo $class_usinagem_pol_mot;?> <?echo $readonly_usinagem_pol_mot;?> <?echo $disabled_usinagem_pol_mot;?> name=status_usinagem_pol_mot_novo[<?echo$x;?>] >
<option value='A' <? echo ($status_usinagem_pol_mot=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_usinagem_pol_mot=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_usinagem_pol_mot=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_usinagem_pol_mot=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_usinagem_pol_mot_velho[<?echo$x;?>] value="<?echo $status_usinagem_pol_mot_db?>" size="11">
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_usinagem_pol_mot"?>
<input readonly type=hidden name=dt_producao_usinagem_pol_mot_velho[<?echo$x;?>] value="<?echo $dt_producao_usinagem_pol_mot?>" size="11">
</span>
</P></TD>

<?   /* DT PREVISAO */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_usinagem_pol_mot;?> <?echo $readonly_usinagem_pol_mot;?> <?echo $disabled_usinagem_pol_mot;?> name=dt_previsao_usinagem_pol_mot_novo[<?echo$x;?>] maxLength=10 size=11 value="<?echo $dt_previsao_usinagem_pol_mot?>" onkeyup="Trocando_Data(this,event)">
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_usinagem_pol_mot"?>
<input readonly type=hidden name=dt_exp_usinagem_pol_mot_velho[<?echo$x;?>] value="<?echo $dt_exp_usinagem_pol_mot?>" size="11">
</span>
</P></TD>
<? } ?>
<? } ?>

<? /* -------------------------SOMENTE PARA QUEM VAI VER ----------------------*/?>

<? if ( $lib_usinagem_pol_mot == "ver" OR $lib_setor_ver == "sim" ) {
	if ( $check_usinagem_pol_mot == "" OR $check_setor_ver == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_usinagem_pol_mot";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<?echo "$status_usinagem_pol_mot";?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_usinagem_pol_mot"?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_usinagem_pol_mot"?>
</span>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_usinagem_pol_mot"?>
</span>
</P></TD>
<? } ?>
<? } ?>


<?/* SETOR POL_MOT */?>


<?/* SETOR POL_VENT */?>

<? if ( $lib_usinagem_pol_vent == "alt" ) {
	if ( $check_usinagem_pol_vent == "" ) { ?>
	
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_usinagem_pol_vent";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select <?echo $class_usinagem_pol_vent;?> <?echo $readonly_usinagem_pol_vent;?> <?echo $disabled_usinagem_pol_vent;?> name=status_usinagem_pol_vent_novo[<?echo$x;?>] >
<option value='A' <? echo ($status_usinagem_pol_vent=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_usinagem_pol_vent=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_usinagem_pol_vent=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_usinagem_pol_vent=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_usinagem_pol_vent_velho[<?echo$x;?>] value="<?echo $status_usinagem_pol_vent_db?>" size="11">
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_usinagem_pol_vent"?>
<input readonly type=hidden name=dt_producao_usinagem_pol_vent_velho[<?echo$x;?>] value="<?echo $dt_producao_usinagem_pol_vent?>" size="11">
</span>
</P></TD>

<?   /* DT PREVISAO */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_usinagem_pol_vent;?> <?echo $readonly_usinagem_pol_vent;?> <?echo $disabled_usinagem_pol_vent;?> name=dt_previsao_usinagem_pol_vent_novo[<?echo$x;?>] maxLength=10 size=11 value="<?echo $dt_previsao_usinagem_pol_vent?>" onkeyup="Trocando_Data(this,event)">
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_usinagem_pol_vent"?>
<input readonly type=hidden name=dt_exp_usinagem_pol_vent_velho[<?echo$x;?>] value="<?echo $dt_exp_usinagem_pol_vent?>" size="11">
</span>
</P></TD>
<? } ?>
<? } ?>

<? /* -------------------------SOMENTE PARA QUEM VAI VER ----------------------*/?>

<? if ( $lib_usinagem_pol_vent == "ver" OR $lib_setor_ver == "sim" ) {
	if ( $check_usinagem_pol_vent == "" OR $check_setor_ver == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_usinagem_pol_vent";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<?echo "$status_usinagem_pol_vent";?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_usinagem_pol_vent"?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_usinagem_pol_vent"?>
</span>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_usinagem_pol_vent"?>
</span>
</P></TD>
<? } ?>
<? } ?>


<?/* SETOR POL_VENT */?>


<?/* SETOR GAXETA */?>

<? if ( $lib_usinagem_gaxeta == "alt" ) {
	if ( $check_usinagem_gaxeta == "" ) { ?>
	
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_usinagem_gaxeta";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select <?echo $class_usinagem_gaxeta;?> <?echo $readonly_usinagem_gaxeta;?> <?echo $disabled_usinagem_gaxeta;?> name=status_usinagem_gaxeta_novo[<?echo$x;?>] >
<option value='A' <? echo ($status_usinagem_gaxeta=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_usinagem_gaxeta=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_usinagem_gaxeta=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_usinagem_gaxeta=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_usinagem_gaxeta_velho[<?echo$x;?>] value="<?echo $status_usinagem_gaxeta_db?>" size="11">
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_usinagem_gaxeta"?>
<input readonly type=hidden name=dt_producao_usinagem_gaxeta_velho[<?echo$x;?>] value="<?echo $dt_producao_usinagem_gaxeta?>" size="11">
</span>
</P></TD>

<?   /* DT PREVISAO */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_usinagem_gaxeta;?> <?echo $readonly_usinagem_gaxeta;?> <?echo $disabled_usinagem_gaxeta;?> name=dt_previsao_usinagem_gaxeta_novo[<?echo$x;?>] maxLength=10 size=11 value="<?echo $dt_previsao_usinagem_gaxeta?>" onkeyup="Trocando_Data(this,event)">
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_usinagem_gaxeta"?>
<input readonly type=hidden name=dt_exp_usinagem_gaxeta_velho[<?echo$x;?>] value="<?echo $dt_exp_usinagem_gaxeta?>" size="11">
</span>
</P></TD>
<? } ?>
<? } ?>

<? /* -------------------------SOMENTE PARA QUEM VAI VER ----------------------*/?>

<? if ( $lib_usinagem_gaxeta == "ver" OR $lib_setor_ver == "sim" ) {
	if ( $check_usinagem_gaxeta == "" OR $check_setor_ver == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_usinagem_gaxeta";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<?echo "$status_usinagem_gaxeta";?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_usinagem_gaxeta"?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_usinagem_gaxeta"?>
</span>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_usinagem_gaxeta"?>
</span>
</P></TD>
<? } ?>
<? } ?>

<?/* SETOR GAXETA */?>


<?/* RESPONSAVEL E OBS */?>


<? if ( $lib_usinagem == "alt" ) {
	if ( $check_usinagem == "" ) { ?>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_usinagem;?> <?echo $readonly_usinagem;?> <?echo $disabled_usinagem;?> name=res_usinagem_novo[<?echo$x;?>] maxLength=25 size=25 value="<?echo $res_usinagem?>" onchange="this.value = this.value.toUpperCase();"
></P></TD>

<?   /* OBS */  ?>
<td class=left>
<?
$buscaobs_usinagem = mysql_query("select distinct obs_usinagem from pcp order by 'obs_usinagem'");
$totalobs_usinagem = mysql_num_rows($buscaobs_usinagem); $count = $totalobs_usinagem-1;
for($i=0; $i<$totalobs_usinagem; $i++) { $nomeobs_usinagem = mysql_result($buscaobs_usinagem,$i,"obs_usinagem"); $palavrasobs_usinagem.="'$nomeobs_usinagem'";
if($i<$count) { $palavrasobs_usinagem.=","; } }
?>
<textarea <?echo $class_usinagem;?> <?echo $readonly_usinagem;?> <?echo $disabled_usinagem;?> name=obs_usinagem_novo[<?echo$x;?>] rows=2 cols=25 id="textbox10" onchange="this.value = this.value.toUpperCase();"><? echo $obs_usinagem; ?></textarea>
</td>
<? } } ?>

<? if ( $lib_usinagem == "ver" OR $lib_setor_ver == "sim" ) {
	if ( $check_usinagem == "" OR $check_setor_ver == "" ) { ?>

<?	/* RESPONSAVEL */   ?>
<TD align=middle><P class=bordas> 
<span style="width:85px;word-wrap:break-word;"> 
<?echo "$res_usinagem"?>
</span>
</P></TD>

<?   /* OBS */  ?>
<TD align=middle><P class=bordas> 
<span style="width:150px;word-wrap:break-word;"> 
<?echo "$obs_usinagem"?>
</span>
</P></TD>
<? } ?>
<? } ?>
	
<?	/*------------- SETOR USINAGEM -----------*/   ?>


<?	/*------------- SETOR EXPEDICAO -----------*/   ?>

<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>
<? if ( $lib_expedicao == "alt" ) {
	if ( $check_expedicao == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_expedicao";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select <?echo $class_expedicao;?> <?echo $readonly_expedicao;?> <?echo $disabled_expedicao;?> name=status_expedicao_novo[<?echo$x;?>] >
<option value='' <? echo ($status_expedicao==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_expedicao=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_expedicao=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_expedicao=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_expedicao=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_expedicao_velho[<?echo$x;?>] value="<?echo $status_expedicao_db?>" size="11">
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_expedicao"?>
<input readonly type=hidden name=dt_producao_expedicao_velho[<?echo$x;?>] value="<?echo $dt_producao_expedicao?>" size="11">
</span>
</P></TD>

<?   /* DT PREVISAO */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left name=dt_previsao_expedicao_novo[<?echo$x;?>] maxLength=10 size=11 value="<?echo $dt_previsao_expedicao?>" onkeyup="Trocando_Data(this,event)"></span> <? $exemplo = "dd/mm/aaaa"; echo "$exemplo" ?>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_expedicao"?>
<input readonly type=hidden name=dt_exp_expedicao_velho[<?echo$x;?>] value="<?echo $dt_exp_expedicao?>" size="11">
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_expedicao;?> <?echo $readonly_expedicao;?> <?echo $disabled_expedicao;?> name=res_expedicao_novo[<?echo$x;?>] maxLength=20 size=20 value="<?echo $res_expedicao?>" onchange="this.value = this.value.toUpperCase();"></span>
</P></TD>

<?   /* OBS */  ?>
<?$buscaobs_expedicao = mysql_query("select distinct obs_expedicao from pcp order by 'obs_expedicao'");
$totalobs_expedicao = mysql_num_rows($buscaobs_expedicao); $count = $totalobs_expedicao-1;
for($i=0; $i<$totalobs_expedicao; $i++) { $nomeobs_expedicao = mysql_result($buscaobs_expedicao,$i,"obs_expedicao"); $palavrasobs_expedicao.="'$nomeobs_expedicao'";
if($i<$count) { $palavrasobs_expedicao.=","; } }
?>
<TD align=middle><P class=bordas> 
<textarea <?echo $class_expedicao;?> <?echo $readonly_expedicao;?> <?echo $disabled_expedicao;?> name=obs_expedicao_novo[<?echo$x;?>] rows=2 cols=25 id="textbox1" onchange="this.value = this.value.toUpperCase();"><? echo $obs_expedicao; ?></textarea>
</P></TD>
<? } ?>
<? } ?>
<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>


<? /* -------------------------SOMENTE PARA QUEM VAI VER ----------------------*/?>
<? if ( $lib_expedicao == "ver" OR $lib_setor_ver == "sim" ) {
	if ( $check_expedicao == "" OR $check_setor_ver == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_expedicao";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<?echo "$status_expedicao";?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_expedicao"?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_expedicao"?>
</span>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_expedicao"?>
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:85px;word-wrap:break-word;"> 
<?echo "$res_expedicao"?>
</span>

<?   /* OBS */  ?>
<TD align=middle><P class=bordas> 
<span style="width:150px;word-wrap:break-word;"> 
<?echo "$obs_expedicao"?>
</span>
<? } ?>
<? } ?>

<?	/*------------- SETOR EXPEDICAO -----------*/   ?>


<?	/*------------- SETOR FUNILARIA -----------*/   ?>

<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>
<? if ( $lib_funilaria == "alt" ) {
	if ( $check_funilaria == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_funilaria";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<select <?echo $class_funilaria;?> <?echo $readonly_funilaria;?> <?echo $disabled_funilaria;?> name=status_funilaria_novo[<?echo$x;?>] >
<option value='' <? echo ($status_funilaria==''?"SELECTED":""); ?> >  </option>
<option value='A' <? echo ($status_funilaria=='A'?"SELECTED":""); ?> > A </option>
<option value='P' <? echo ($status_funilaria=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($status_funilaria=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($status_funilaria=='N'?"SELECTED":""); ?> > N </option>
</select>
<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=status_funilaria_velho[<?echo$x;?>] value="<?echo $status_funilaria_db?>" size="11">
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_funilaria"?>
<input readonly type=hidden name=dt_producao_funilaria_velho[<?echo$x;?>] value="<?echo $dt_producao_funilaria?>" size="11">
</span>
</P></TD>

<?   /* DT PREVISAO */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left name=dt_previsao_funilaria_novo[<?echo$x;?>] maxLength=10 size=11 value="<?echo $dt_previsao_funilaria?>" onkeyup="Trocando_Data(this,event)"></span> <? $exemplo = "dd/mm/aaaa"; echo "$exemplo" ?>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_funilaria"?>
<input readonly type=hidden name=dt_exp_funilaria_velho[<?echo$x;?>] value="<?echo $dt_exp_funilaria?>" size="11">
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:8px;word-wrap:break-word;"> 
<input class=left <?echo $class_funilaria;?> <?echo $readonly_funilaria;?> <?echo $disabled_funilaria;?> name=res_funilaria_novo[<?echo$x;?>] maxLength=20 size=20 value="<?echo $res_funilaria?>" onchange="this.value = this.value.toUpperCase();"></span>
</P></TD>

<?   /* OBS */  ?>
<?$buscaobs_funilaria = mysql_query("select distinct obs_funilaria from pcp order by 'obs_funilaria'");
$totalobs_funilaria = mysql_num_rows($buscaobs_funilaria); $count = $totalobs_funilaria-1;
for($i=0; $i<$totalobs_funilaria; $i++) { $nomeobs_funilaria = mysql_result($buscaobs_funilaria,$i,"obs_funilaria"); $palavrasobs_funilaria.="'$nomeobs_funilaria'";
if($i<$count) { $palavrasobs_funilaria.=","; } }
?>
<TD align=middle><P class=bordas> 
<textarea <?echo $class_funilaria;?> <?echo $readonly_funilaria;?> <?echo $disabled_funilaria;?> name=obs_funilaria_novo[<?echo$x;?>] rows=2 cols=25 id="textbox1" onchange="this.value = this.value.toUpperCase();"><? echo $obs_funilaria; ?></textarea>
</P></TD>
<? } ?>
<? } ?>
<? /* --------------------------SOMENTE PARA QUEM VAI ALTERAR -----------------*/?>


<? /* -------------------------SOMENTE PARA QUEM VAI VER ----------------------*/?>
<? if ( $lib_funilaria == "ver" OR $lib_setor_ver == "sim" ) {
	if ( $check_funilaria == "" OR $check_setor_ver == "" ) { ?>
	
<TD align=middle><P class=bordas> 	
<?   /* DT PROGRAMADO */  ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_prog_funilaria";?>
</span>
</P></TD>

<?	/* STATUS  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:15px;word-wrap:break-word;"> 
<?echo "$status_funilaria";?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_producao_funilaria"?>
</span>
</P></TD>

<?	/* DT STATUS ENTRADA  */   ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_previsao_funilaria"?>
</span>
</P></TD>

<?   /* DT STATUS SAIDA */  ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$dt_exp_funilaria"?>
</span>
</P></TD>

<?   /* RESPONSAVEL */  ?>
<TD align=middle><P class=bordas> 
<span style="width:85px;word-wrap:break-word;"> 
<?echo "$res_funilaria"?>
</span>

<?   /* OBS */  ?>
<TD align=middle><P class=bordas> 
<span style="width:150px;word-wrap:break-word;"> 
<?echo "$obs_funilaria"?>
</span>
<? } ?>
<? } ?>

<?	/*------------- SETOR FUNILARIA -----------*/   ?>



<?   /* --------	ALTERAR GERAL ---------	*/  ?>	
<? if ( $lib_alterar_geral == "sim" ) { ?>
<TD align=middle><P class=bordas> 
<span style="width:70px;word-wrap:break-word;"> 
<input class="botao1" name="alterar_tudo" type="button" value="Alterar Tudo" Onclick="Alterar_Dados_PCP_Altera();">
</span>
</P></TD>
<? } ?>	
<?   /* --------	ALTERAR GERAL ---------	*/  ?>	

			
		</TR>  
		
		
<? 
$valor_total_os = $valor_total_os + $valor_total; 
$quant_os = $quant_os + 1;  
$qt_total = $qt_total + $qt; 
?>

<?   /* FECHAMENTO DO WHILE */  ?>	
<? } ?>	


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
	
	<? if ( $lib_baixa == "ver" OR $lib_baixa == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_baixa == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_data_baixa == "ver" OR $lib_data_baixa == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_data_baixa == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_data_prog_diaria == "ver" OR $lib_data_prog_diaria == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_data_prog_diaria == "" ) { ?> 
	<? } } ?>
	
<? if ( $lib_data_previsao == "ver" OR $lib_data_previsao == "alt" ) { ?>
<TD align=middle><P class=titulo> 
<?	if ( $check_data_previsao == "" ) { ?> Atraso Fabr. <br>
<?echo ceil($dias_atraso_total_fab); ?> </P></TD>
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
<?	if ( $check_qt == "" ) { ?>
<span style="width:35px;word-wrap:break-word;"> QT <br>
<?echo $qt_total; ?>
</span>
</P></TD>
<?  } } ?>

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
	<TD colspan="4" rowspan="1"><P class=bordas>
	N=Não Solicitado / S=Solicitado / P=Em Produção / C=Concluído / E=Enviado
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_proj == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_almox == "ver" OR $lib_almox == "alt" OR $lib_setor_ver == "ver") { ?>
	<TD colspan="7" rowspan="1"><P class=bordas>
	A=Aguarda Status / P=Em Produção / E=Expedida / N=Não Necessita neste Item
	<?	if ( $check_almox == "" ) { ?>
	<? } } ?>	
	
	<? if ( $lib_corte == "ver" OR $lib_corte == "alt" OR $lib_setor_ver == "ver") { ?>
	<TD colspan="7" rowspan="1"><P class=bordas>
	A=Aguarda Status / P=Em Produção / E=Expedida / N=Não Necessita neste Item
	<?	if ( $check_corte == "" ) { ?>
	<? } } ?>	
	
	<? if ( $lib_balanc == "ver" OR $lib_balanc == "alt" OR $lib_setor_ver == "sim") { ?>
	<TD colspan="10" rowspan="1"><P class=bordas>
	A=Aguarda Status / P=Em Produção / E=Expedida / N=Não Necessita neste Item
	<?	if ( $check_balanc == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_cald1 == "ver" OR $lib_cald1 == "alt" OR $lib_setor_ver == "sim") { ?>
	<TD colspan="7" rowspan="1"><P class=bordas>
	A=Aguarda Status / P=Em Produção / E=Expedida / N=Não Necessita neste Item
	<?	if ( $check_cald1 == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_cald2 == "ver" OR $lib_cald2 == "alt" OR $lib_setor_ver == "sim") { ?>
	<TD colspan="7" rowspan="1"><P class=bordas>
	A=Aguarda Status / P=Em Produção / E=Expedida / N=Não Necessita neste Item
	<?	if ( $check_cald2 == "" ) { ?>
	<? } } ?>
	
	
	<? if ( $lib_montagem == "ver" OR $lib_montagem == "alt" OR $lib_setor_ver == "sim") { ?>
	<TD colspan="7" rowspan="1"><P class=bordas>
	A=Aguarda Status / P=Em Produção / E=Expedida / N=Não Necessita neste Item
	<?	if ( $check_montagem == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_pintura_setor == "ver" OR $lib_pintura_setor == "alt" OR $lib_setor_ver == "sim") { ?>
	<TD colspan="7" rowspan="1"><P class=bordas>
	A=Aguarda Status / P=Em Produção / E=Expedida / N=Não Necessita neste Item
	<?	if ( $check_pintura_setor == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_rotor_ll == "ver" OR $lib_rotor_ll == "alt" OR $lib_setor_ver == "sim") { ?>
	<TD colspan="7" rowspan="1"><P class=bordas>
	A=Aguarda Status / P=Em Produção / E=Expedida / N=Não Necessita neste Item
	<?	if ( $check_rotor_ll == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_rotor_sir == "ver" OR $lib_rotor_sir == "alt" OR $lib_setor_ver == "sim") { ?>
	<TD colspan="7" rowspan="1"><P class=bordas>
	A=Aguarda Status / P=Em Produção / E=Expedida / N=Não Necessita neste Item
	<?	if ( $check_rotor_sir == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_usinagem == "ver" OR $lib_usinagem == "alt" OR $lib_setor_ver == "sim") { ?>
	<TD colspan="27" rowspan="1"><P class=bordas>
	A=Aguarda Status / P=Em Produção / E=Expedida / N=Não Necessita neste Item
	<?	if ( $check_usinagem == "" ) { ?>
	<? } } ?>
	
	
	
		</TR>
		
		
		<TR class=sem_borda>
              
	<? if ( $lib_data_emissao == "ver" OR $lib_data_emissao == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_data_emissao == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_num_os == "" ) { ?>          
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
<?	if ( $check_data_entrega == "" ) { ?>Pontualidade <br>
<?echo number_format($pontualidade,2,',',''); ?>
</P></TD>
<? } } ?>

	<? if ( $lib_reprogramacao == "ver" OR $lib_reprogramacao == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_reprogramacao == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_baixa == "ver" OR $lib_baixa == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_baixa == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_data_baixa == "ver" OR $lib_data_baixa == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_data_baixa == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_data_prog_diaria == "ver" OR $lib_data_prog_diaria == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_data_prog_diaria == "" ) { ?>          
	<? } } ?>
	
<? if ( $lib_data_previsao == "ver" OR $lib_data_previsao == "alt" ) { ?>
<TD align=middle><P class=titulo> 
<?	if ( $check_data_previsao == "" ) { ?>Pont. Fabr. <br>
<?echo number_format($pontualidade_fab,0,',','')."%"; ?> </P></TD>     
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
	<?	if ( $check_proj == "" ) { ?>
	<? } } ?>
					
		</TR>  
			     
			             
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

