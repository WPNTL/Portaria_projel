<? include "valida_sessao.php" ; include "config_pcp.php"; ?>

<html>

<head>
<title> Imprimir Etiquetas </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
<script language="JavaScript" SRC="funcoes/abrir_fechar.js"></script>
<script language="JavaScript" SRC="funcoes/calendario.js"></script>
<script language="JavaScript" SRC="funcoes/letras_maiscula.js"></script>
<script language="JavaScript" SRC="funcoes/mascara_data.js"></script>
<script language="JavaScript" SRC="funcoes/auto_completar.js"></script>
<script language="JavaScript" SRC="funcoes/enter_altera.js"></script>
<script language="JavaScript" SRC="funcoes/calendario.js"></script>
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

$lib_data_emissao = $linha["lib_data_emissao"]; 

$lib_num_os = $linha["lib_num_os"]; 
$lib_item = $linha["lib_item"]; 

$lib_nome_cliente = $linha["lib_nome_cliente"]; 
$lib_data_entrega = $linha["lib_data_entrega"]; 

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
$lib_tag = $linha["lib_tag"];

$lib_qt = $linha["lib_qt"]; 

$lib_baixa = $linha["lib_baixa"]; $lib_baixa_tipo = $linha["lib_baixa_tipo"]; 
$lib_baixa_expedicao = $linha["lib_baixa_expedicao"];
/* DATA PROG MONTAGEM */
$lib_dt_prog_montagem = $linha["lib_dt_prog_montagem"];

}

/*  ----------------	BUSCAR DADOS DE LIBERAÇÃO ------------------	*/
?>
<form action="imprimir_etiquetas.php?tipo_busca=<?echo $tipo_busca?>&tipo_busca2=<?echo $tipo_busca2?>&valor=<?echo $valor?>$valor2=<?echo $valor2?>" method="post" name="imprimir_pcp_etiquetas" target="_blank">



<? /* -------------	CONFIGURAÇÃO PARA BUSCAR OS NUMEROS DA O.S	------------------- */ ?>

<table class=sem_borda width=100% align="center">
<tr>

<?
/* LIBERAR USUARIO PARA VER TUDO OU SOMENTE O Q ESTA SENDO PRODUZIDO
if ( $lib_baixa_tipo == "alt" OR $lib_baixa_tipo == "todos" ) 
{ $lib_baixa_tipo_busca = ""; $lib_baixa_tipo_busca_dados = ""; $lib_baixa_tipo_texto = "Mostrar todas Baixas."; } 
else 
{ $lib_baixa_tipo_busca = "WHERE baixa='P'"; $lib_baixa_tipo_busca_dados = "AND baixa='P'"; $lib_baixa_tipo_texto = "Mostrar somente o que está sendo Produzido."; }
/* LIBERAR USUARIO PARA VER TUDO OU SOMENTE O Q ESTA SENDO PRODUZIDO */
?>
<td class=right> Tipo Campo
<select name="tipo_busca" OnChange="Atualizar_Imprimir_PCP_Altera();">
<?if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) { ?>
<option value='num_os' <? echo ($tipo_busca=='num_os'?"SELECTED":""); ?> > Num. O.S </option>
<? } ?>
</select>
</td>


<? /* DADOS DA BUSCA */ ?>
<td class=left>
<input class=left name=valor maxLength=25 size=26 value="<?echo $valor?>" >
</td>

<td class=right> Tipo Campo
<select name="tipo_busca2" OnChange="Atualizar_Imprimir_PCP_Altera();">
<?if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) { ?>
<option value='item' <? echo ($tipo_busca2=='item'?"SELECTED":""); ?> > Item </option>
<? } ?>
</select>
</td>

<td>
<input class=left name=valor2 maxLength=5 size=5 value="<?echo $valor2?>" >
</td>

<td>
<? /* BOTÃO DE BUSCAR */ ?>
<input class="botao1" name="busca" type="button" value="Buscar" Onclick="Atualizar_Imprimir_PCP_Altera();">

<? /* MOSTRAR TEXTO SOBRE O Q VC PODE VER */ ?> 
<b><font color="#FF0000"><? echo $lib_baixa_tipo_texto; ?></b></font>
</td>

<? /* FECHAR JANELA */ ?> 
<td class=left>
<a class="botao1" href="javascript:window.close()" target="_top"> Fecha Janela </a>
</td>

<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>

</tr>
</table>

<? /* -------------	CONFIGURAÇÃO PARA BUSCAR OS NUMEROS DA O.S	------------------- */ ?>

<FIELDSET>
<LEGEND> Dados do PCP 
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
              
<? /* ------------------------------------- ORGANIZAR ---------------------------------------- */ ?>

		<TR class=linha_cabecalho>

<?/*<script language="javascript">
function seleciona(){
var form = document.imprimir_pcp_etiquetas.php;
for(i=1;i<imprimir_pcp_etiquetas.elements.length;i++){
if(imprimir_pcp_etiquetas.elements[i].checked == false){
imprimir_pcp_etiquetas.elements[i].checked = true;
}else{
imprimir_pcp_etiquetas.elements[i].checked = false;
}
}
}
</script>*/?>

<? /* NUM_OS */ ?>             
<? if ( $lib_num_os == "ver" Or $lib_num_os == "alt" ) { ?>
<TH align=middle  rowspan="1"><P class=bordas>
<?	if (  $check_num_os == "" ) { ?> 
N° O.S <? } } ?></P></TH>

<? /* BAIXA */ ?>
<? if ( $lib_baixa_expedicao == "ver" ) { ?>
<TH align=middle  rowspan="1"><P class=bordas>	
<? if ( $check_baixa == "") {?> 
Baixa <? } } ?></P></TH>

<? /* BAIXA */ ?>
<? if ( $lib_baixa == "ver" Or $lib_baixa == "alt" ) { ?>
<TH align=middle  rowspan="1"><P class=bordas>	
<? if ( $check_baixa == "") {?> 
Baixa <? } } ?></P></TH>

<? /* DATA BAIXA */ ?>

<? if ( $lib_data_baixa == "ver" Or $lib_data_baixa == "alt" ) { ?>
<TH align=middle  rowspan="1"><P class=bordas>	
<? if ( $check_data_baixa == "") {?> 
Dt. da Baixa <? } } ?></P></TH>

<? /* FORNECIMENTO MOTOR */ ?>
<? if ( $lib_fornecimento_motor == "ver" Or $lib_fornecimento_motor == "alt" ) { ?>
<TH align=middle  rowspan="2"><P class=bordas>
<?	if ( $check_fornecimento_motor == "") {?> 
Forn. Mot. <? } } ?></P></TH>

<? /* DESCRICAO VENT */ ?>
<? if ( $lib_descr_vent == "ver" Or $lib_descr_vent == "alt" ) { ?>
<TH align=middle  rowspan="1"><P class=bordas>	
<? if ( $check_descr_vent == "") {?> 
Descr. Vent. <? } } ?></P></TH>

<? /* QT */ ?>
<? if ( $lib_qt == "ver" Or $lib_qt == "alt" ) { ?>
<TH align=middle  rowspan="1"><P class=bordas>
<?	if ( $check_qt == "") {?> 
QT <? } } ?></P></TH>

<? /* MODELO */ ?>
<? if ( $lib_modelo == "ver" Or $lib_modelo == "alt" ) { ?>
<TH align=middle  rowspan="1"><P class=bordas>
<?	if ( $check_modelo == "") {?> 
Mod. <? } } ?></P></TH>

<? /* TAMANHO */ ?>
<? if ( $lib_tamanho == "ver" Or $lib_tamanho == "alt" ) { ?>
<TH align=middle  rowspan="1"><P class=bordas>
<?	if ( $check_tamanho == "") {?> 
Tam. <? } } ?></P></TH>

<? /* ARRANJO */ ?>
<? if ( $lib_arranjo == "ver" Or $lib_arranjo == "alt" ) { ?>
<TH align=middle  rowspan="1"><P class=bordas>
<?	if ( $check_arranjo == "") {?> 
Arr. <? } } ?></P></TH>

<? /* CLASSE */ ?>
<? if ( $lib_classe == "ver" Or $lib_classe == "alt" ) { ?>
<TH align=middle  rowspan="1"><P class=bordas>
<?	if ( $check_classe == "") {?> 
Cl. <? } } ?></P></TH>

<? /* ROTACAO */ ?>
<? if ( $lib_rotacao == "ver" Or $lib_rotacao == "alt" ) { ?>
<TH align=middle  rowspan="1"><P class=bordas>
<?	if ( $check_rotacao == "") {?> 
Rot. <? } } ?></P></TH>

<? /* GABINETE */ ?>
<? if ( $lib_gab == "ver" Or $lib_gab == "alt" ) { ?>
<TH align=middle  rowspan="1"><P class=bordas>
<?	if ( $check_gab == "") {?>
Gab. <? } } ?></P></TH>

<? /* PINTURA */ ?>
<? if ( $lib_pintura == "ver" Or $lib_pintura == "alt" ) { ?>
<TH align=middle  rowspan="1"><P class=bordas>
<?	if ( $check_pintura == "") {?> 
Pint. <? } } ?></P></TH>

<? /* CONSTRUÇÃO */ ?>
<? if ( $lib_construcao == "ver" Or $lib_construcao == "alt" ) { ?>
<TH align=middle  rowspan="1"><P class=bordas>
<?	if ( $check_construcao == "") {?> 
Const. <? } } ?></P></TH>

<? /* TAG */ ?>
<? if ( $lib_num_os == "ver" Or $lib_num_os == "alt" ) { ?>
<TH align=middle  rowspan="1"><P class=bordas>
<?	if ( $check_num_os == "") {?>
TAG <? } } ?></P></TH>

<? /* SUBITEM */ ?>
<? if ( $lib_num_os == "ver" Or $lib_num_os == "alt" ) { ?>
<TH align=middle  rowspan="1"><P class=bordas>
<?	if ( $check_num_os == "") {?>
SUB ITEM <? } } ?></P></TH>
	</TR>
	
	
<? /* ------------------------------------- ORGANIZAR ---------------------------------------- */?>

	
<? /* --------------------  INICIO DA CONSULTA  -----------------------------  */  ?>

<?
if ($organizar == "") { $organizar = "num_os"; } else { $organizar = $organizar; }

$valor_total_os = 0; $quant_os = 0; $x = 0;
		
$query = "SELECT * FROM pcp WHERE $tipo_busca<>'' AND $tipo_busca='$valor' AND $tipo_busca2='$valor2' ORDER BY '$organizar'";

//$query = "SELECT * FROM pcp WHERE num_os='$valor' $lib_baixa_tipo_busca_dados ORDER BY '$organizar'";

//echo "query - ".$query;

$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) { 

//$x = $x + 1;

$id = $dados["id"]; 

$data_emissao = $dados["data_emissao"]; 

$num_os = $dados["num_os"]; 
$item = $dados["item"]; 
 
$nome_cliente = $dados["nome_cliente"]; 
$data_entrega = $dados["data_entrega"]; 
$fornecimento_motor = $dados["fornecimento_motor"];

$baixa = $dados["baixa"];
$descr_vent = $dados["descr_vent"]; 
$modelo = $dados["modelo"]; 
$tamanho = $dados["tamanho"]; 
$arranjo = $dados["arranjo"];
$classe = $dados["classe"]; 
$rotacao = $dados["rotacao"]; 
$gab = $dados["gab"]; 
$pintura = $dados["pintura"]; 
$construcao = $dados["construcao"]; 

$tag = $dados["tag"];

$qt = $dados["qt"]; 



/* ----------------------- CONVERTER DATAS	------------------------------------*/

$dia_data_emissao = substr($data_emissao, -2); 
$mes_data_emissao = substr($data_emissao, -5,2);
$ano_data_emissao = substr($data_emissao, -10,4); 
$data_emissao = ($dia_data_emissao."/".$mes_data_emissao."/".$ano_data_emissao); 


$dia_data_entrega = substr($data_entrega, -2); 
$mes_data_entrega = substr($data_entrega, -5,2);
$ano_data_entrega = substr($data_entrega, -10,4); 
$data_entrega = ($dia_data_entrega."/".$mes_data_entrega."/".$ano_data_entrega); 


$dia_data_baixa = substr($data_baixa, -2); 
$mes_data_baixa = substr($data_baixa, -5,2); 
$ano_data_baixa = substr($data_baixa, -10,4);
if ($dia_data_baixa == "" AND $mes_data_baixa == "" AND $ano_data_baixa == "") 
{$data_baixa = ($dia_data_baixa."".$mes_data_baixa."".$ano_data_baixa); } 
else 
{$data_baixa = ($dia_data_baixa."/".$mes_data_baixa."/".$ano_data_baixa); }


/* ----------------------- FIM CONVERTER DATAS	------------------------------------*/
?>	

		<TR class=linha0 border-style: solid; border-width: 1; >


			
<? /* ------- ID  ------- */ ?>
<input class=nedita_left readonly type=hidden name="id[<?echo$x;?>]" value="<?echo $id?>" size="2">	


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

<?	/* MOSTRAR BAIXA EXPEDICAO */   ?>
<? if ( $lib_baixa_expedicao == "ver" ) { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_baixa == "" ) { ?>
<span style="width:15px;word-wrap:break-word;"> 
<?echo "$baixa";?> 
</span>
<? } } ?>
</P></TD>
	
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
<? if ( $lib_pintura == "ver" OR $lib_pintura == "alt") { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_pintura == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$pintura";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR CONSTRUÇÃO  */   ?>
<? if ( $lib_construcao == "ver" OR $lib_construcao == "alt") { ?>
<TD align=middle onMouseOver="this.style.background='#99CCEA'; drc('','Abrir N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 
 onClick="javascript:void(open('altera_pcp.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))" ><P class=bordas>
<?	if ( $check_construcao == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$construcao";?> 
</span>
<? } } ?>
</P></TD>

<?	/* TAG  */   ?>
<? if ( $lib_num_os == "alt" OR $lib_num_os == "ver") { ?>
<TD align=middle ><P class=bordas>
<?	if ( $check_num_os == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
   <input type="text" name=tag_novo value="<?echo $tag?>" onchange="this.value = this.value.toUpperCase();">
</span>
<? } } ?>
</P></TD>

<?	/* SUBITEM  */   ?>
<? if ( $lib_num_os == "alt" OR $lib_num_os == "ver") { ?>
<TD align=middle ><P class=bordas>
<?	if ( $check_num_os == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
   <input type="text" name=sub_item value="" onchange="this.value = this.value.toUpperCase();">
</span>
<? } } ?>
</P></TD>



  <? } ?>			
		
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
	  <? if ($valor == "" OR $valor2 == "" OR $id == "") {} else { ?>
	  <input class="botao1" type="submit" value="Imprimir Etiqueta">
	  <? } ?>
</FIELDSET>
</form>
</body>
</html>