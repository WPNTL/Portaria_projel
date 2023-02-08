<? include "valida_sessao.php" ; include "config_orcamento.php";
/*$b = date('d'); 
$c = date('n'); 
$d = date('Y'); 
if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; 
$datafinal = $b."/".$c."/".$d; 
$dataperiodo = $c."/".$d; */?>

<html>
<head>
<title> Consulta de Orçamentos </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" src="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
</head>
<body>

<div id="overDiv" style="position:absolute; visibility:hide; z-index:1;; width: 160px; height: 19px"></div>

<?
$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {
$libinserir = $linha["libinserir"]; 
$libalterar = $linha["libalterar"]; 
$libexcluir = $linha["libexcluir"];

$libn_orc = $linha["libn_orc"]; 
$libcliente = $linha["libcliente"];
$libmercado = $linha["libmercado"]; 
$libcontato = $linha["libcontato"];
$libreferencia = $linha["libreferencia"]; 
$libuf = $linha["libuf"];
$libvalor = $linha["libvalor"]; 
$librepresentante = $linha["librepresentante"];

$libdata = $linha["libdata"]; 
$libdataalterada = $linha["libdataalterada"];

$libperiodo = $linha["libperiodo"]; 
$libperiodoalterado = $linha["libperiodoalterado"];

$libusuario = $linha["libusuario"]; 
$libusuarioalterado = $linha["libusuarioalterado"];

$libtempo = $linha["libtempo"];
$libalteratempo = $linha["libalteratempo"];

$libdatainicio = $linha["libdatainicio"]; 
$libhorainicio = $linha["libhorainicio"];
$libdatafim = $linha["libdatafim"]; 
$libhorafim = $linha["libhorafim"];

}
?>

<form action="" method="post" name="n_orcamento">

<table class=sem_borda width=100% align="center">
<tr>

<td class=right> Tipo Campo
<select name="tipo_busca" OnChange="Atualizar2();">

<option value='' <? echo ($tipo_busca==''?"SELECTED":""); ?> ></option>

<?if ( $libn_orc == "" ) { ?>
<option value='n_orc' <? echo ($tipo_busca=='n_orc'?"SELECTED":""); ?> > Num. Orç. </option>
<? } ?>

<?if ( $libcliente == "" ) { ?>
<option value='cliente' <? echo ($tipo_busca=='cliente'?"SELECTED":""); ?> > Cliente </option>
<? } ?>

<?if ( $libmercado == ""  ) { ?>
<option value='mercado' <? echo ($tipo_busca=='mercado'?"SELECTED":""); ?> > Mercado </option>
<? } ?>

<?if ( $libcontrato == "" ) { ?>
<option value='contato' <? echo ($tipo_busca=='contato'?"SELECTED":""); ?> > Contato </option>
<? } ?>

<?if ( $libreferencia == "" ) { ?>
<option value='referencia' <? echo ($tipo_busca=='referencia'?"SELECTED":""); ?> > Referencia </option>
<? } ?>

<?if ( $libuf == "" ) { ?>
<option value='uf' <? echo ($tipo_busca=='uf'?"SELECTED":""); ?> > UF</option>
<? } ?>

<?if ( $libvalor == "" ) { ?>
<option value='valor' <? echo ($tipo_busca=='valor'?"SELECTED":""); ?> > Valor </option>
<? } ?>

<?if ( $librepresentante == "" ) { ?>
<option value='representante' <? echo ($tipo_busca=='representante'?"SELECTED":""); ?> > Representante </option>
<? } ?>

<?if ( $libdata == "" ) { ?>
<option value='data' <? echo ($tipo_busca=='data'?"SELECTED":""); ?> > Data </option>
<? } ?>

<?if ( $libperiodo == "" ) { ?>
<option value='periodo' <? echo ($tipo_busca=='periodo'?"SELECTED":""); ?> > Período </option>
<? } ?>

<?if ( $libusuario == "" ) { ?>
<option value='usuario' <? echo ($tipo_busca=='usuario'?"SELECTED":""); ?> > Usuário </option>
<? } ?>

</select>
</td>

<?
 /* CONFIGURAÇÃO PARA BUSCAR CAMPO AUTOMÁTICO */
$busca_valor=mysql_query("select $tipo_busca from n_orcamento order by $tipo_busca ");
$total_valor=@mysql_num_rows($busca_valor);
$count=$total_valor-1;
for($i=0;$i<$total_valor;$i++) {
	$nome_valor=mysql_result($busca_valor,$i,$tipo_busca);
	$palavras_valor.="'$nome_valor'";
if($i<$count) { $palavras_valor.=","; }   }
?>

<? /* DADOS DA BUSCA */ ?>
<td class=left>
<? if ( $tipo_busca == "fn_orc" ) {  ?>
<input class=left name=valor maxLength=25 size=26 value="<?echo $valor?>" > 
<? } else { ?>
<input class=left name=valor maxLength=25 size=26 value="<?echo $valor?>" onKeyUp="checkList(this,arvore_valor)" id="textbox2" > 
<? } ?>


<? /* BOTÃO DE BUSCAR */ ?>
<input class="botao1" name="busca" type="button" value="Buscar" Onclick="Atualizar2();">

<? /* FECHAR JANELA */ ?> 
<td class=left>
<a class="botao1" href="javascript:window.close()" target="_top"> Fecha Janela </a>
</td>

</tr>
</table>

<? /* -------------	CONFIGURAÇÃO PARA BUSCAR OS NUMEROS DA O.S	------------------- */ ?>

<FIELDSET>
<LEGEND> Dados do Orçamento </LEGEND>

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
              
<table class=sem_borda width=100%>
<tr>

<table class=sem_borda width=100% align="center">
<tr>
<td class=titulo ><? /* N_ORC */ ?>
<? if ($libn_orc == "" and $checkn_orc == "") { ?> N° Orç <? } ?>
</td>

<td class=titulo ><? /* CLIENTE */ ?>
<? if ($libcliente == "" and $checkcliente == "") { ?> Cliente <? } ?>
</td>

<td class=titulo ><? /* MERCADO */ ?>
<? if ($libmercado == "" and $checkmercado == "") { ?> Mercado <? } ?>
</td>

<td class=titulo ><? /* CONTATO */ ?>
<? if ($libcontato == "" and $checkcontato == "") {?> Contato <? } ?>
</td>

<td class=titulo ><? /* REFERENCIA */ ?>
<? if ($libreferencia == "" and $checkreferencia == "") {?> Referência / Obra <? } ?>
</td>

<td class=titulo ><? /* UF */ ?>
<? if ($libuf == "" and $checkuf == "") {?> UF <? } ?>
</td>

<td class=titulo ><? /* REPRESENTANTE */ ?>
<? if ($librepresentante == "" and $checkrepresentante == "") {?> Representante <? } ?>
</td>

<td class=titulo ><? /* VALOR */ ?>
<? if ($libvalor == "" and $checkvalor == "") {?> Valor <? } ?>
</td>

<td class=titulo ><? /* DATA */ ?>
<? if ($libdata == "" and $checkdata == "") {?> Data <? } ?>
</td>

<? /* DATA ALTERADA */ ?>
<? if ($libdataalterada == "" and $checkdataalterada == "") {?>
<td class=titulo >  Data Alterada </td> <? } ?>

<td class=titulo ><? /* PERIODO */ ?>
<? if ($libperiodo == "" and $checkperiodo == "") {?> Período <? } ?>
</td>

<? /* PERIODO ALTERADO */ ?>
<? if ($libperiodoalterado == "" and $checkperiodoalterado == "") {?>
<td class=titulo >   Período Alterado </td> <? } ?>

<? /* USUARIO */ ?>
<? if ($libusuario == "" and $checkusuario == "") {?>
<td class=titulo >  Usuário </td> <? } ?>

<? /* USUARIO ALTERADO  */ ?>
<? if ($libusuarioalterado == "" and $checkusuarioalterado == "") {?>
<td class=titulo > Usuário Alterado </td> <? } ?>


<? /* TEMPO  */ ?>
<? if ($libtempo == "" and $checktempo == "") { ?> 
<td class=titulo > Tempo retorno </td> <? } ?>


<td class=titulo ><? /* EXCLUIR */ ?>
<? if ($libexcluir == "sim" ) {?> Excluir <? } ?>
</td>
</tr>

<? /* --------------------  INICIO DOS BOTOES DE SELECÃO (FILTROS)  -----------------------------  */  ?>
<?
if ( $fn_orc <> "") {$fn_orcdb = "and n_orc='$fn_orc'";} else {$fn_orcdb = "";}
if ( $fcliente <> "" ) {$fclientedb = "and cliente='$fcliente'";} else {$fclientedb = "";}
if ( $fmercado <> "" ) {$fmercadodb = "and mercado='$fmercado'";} else {$fmercadodb = "";}
if ( $fcontato <> "" ) {$fcontatodb = "and contato='$fcontato'";} else {$fcontatodb = "";}
if ( $freferencia <> "" ) {$freferenciadb = "and referencia='$freferencia'";} else {$freferenciadb = "";}
if ( $fuf <> "" ) {$fufdb = "and uf='$fuf'";} else {$fufdb = "";}
if ( $frepresentante <> "" ) {$frepresentantedb = "and representante='$frepresentante'";} else {$frepresentantedb = "";}
if ( $fvalor <> "" ) {$fvalordb = "and valor='$fvalor'";} else {$fvalordb = "";}

/*if ( $fdata <> "" ) {$fdatadb = "and data='$fdata'";} else {$fdatadb = "";}*/
if ( $fdata == "" ) {$fdatadb = "and data='$datafinal'"; $fdata = $datafinal; }
elseif ( $fdata <> "TODOS" ) {$fdatadb = "and data='$fdata'";}
else {$fdatadb = ""; }
if ( $fdataalterada <> "" ) {$dataalteradadb = "and dataalterada='$fdataalterada'";} else {$dataalteradadb = "";}

if ( $fperiodo == "" ) {$fperiododb = "and periodo='$dataperiodo'"; $fperiodo = $dataperiodo; }
elseif ( $fperiodo <> "TODOS" ) {$fperiododb = "and periodo='$fperiodo'";}
else { $fperiododb = ""; }

if ( $fperiodoalterado <> "" ) {$fperiodoalteradodb = "and periodoalterado='$fperiodoalterado'";} else {$fperiodoalteradodb = "";}

if ( $fusuario <> "" ) {$fusuariodb = "and usuario='$fusuario'";} else {$fusuariodb = "";}

if ( $fusuarioalterado <> "" ) {$fusuarioalteradodb = "and usuarioalterado='$fusuarioalterado'";} else {$fusuarioalteradodb = "";}

if ( $ftempo_total <> "" ) {$ftempo_totaldb = "and tempo_total='$ftempo_total'";} else {$ftempo_totaldb = "";}


?>

<? /* --------------------  FIM DOS BOTOES DE SELECÃO (FILTROS)  -----------------------------  */  ?>

<? /* --------------------  INICIO DA CONSULTA  -----------------------------  */  ?>
<?
$valortotal = 0; $QuantOrc = 0; $dados = 0;

$query = "SELECT * FROM n_orcamento WHERE $tipo_busca<>'' AND $tipo_busca='$valor' ORDER BY 'id'";

$result = mysql_query($query);
while ($dados = @mysql_fetch_array($result)) {
	
$bn_orc = $dados["n_orc"]; 
$bcliente = $dados["cliente"]; 
$bmercado = $dados["mercado"];
$bcontato = $dados["contato"]; 
$breferencia = $dados["referencia"]; 
$buf = $dados["uf"];

$bdata = $dados["data"]; 
$bdataalterada = $dados["dataalterada"];

$bvalor = $dados["valor"]; 
$brepresentante = $dados["representante"];

$bperiodo = $dados["periodo"]; 
$bperiodoalterado = $dados["periodoalterado"];

$busuario = $dados["usuario"]; 
$busuarioalterado = $dados["usuarioalterado"];

$btempo_total = $dados["tempo_total"];

?>
<tr>
<td class=center_borda>
<? if ($libn_orc == "" and $checkn_orc == "") { ?>
<? if ($libalterar == "sim") { ?>
<input class="botao_inserir" type="button" name="altera" value="<?echo $bn_orc?>" onClick="javascript:void(open('altera_orcamento.php?n_orc=<?echo$bn_orc?>','principal','scrollbars=yes'))"
onMouseOver="drc('',' Alterar - N° Orc.  <?echo"$bn_orc"?> '); return true;" onMouseOut="nd(); return true;">
<? } else { ?>
<input class="botao_inserir1" type="button" name="altera" value="<?echo $bn_orc?>" onMouseOver="drc('',' N° Orc.  <?echo"$bn_orc"?> '); return true;" onMouseOut="nd(); return true;">
<? } } ?>
</td>
<td class=center_borda> <? if ($libcliente == "" and $checkcliente == "") {echo "$bcliente";} ?></td>
<td class=center_borda> <? if ($libmercado == "" and $checkmercado == "") {echo "$bmercado";} ?></td>
<td class=center_borda> <? if ($libcontato == "" and $checkcontato == "") {echo "$bcontato";} ?></td>
<td class=center_borda> <? if ($libreferencia == "" and $checkreferencia == "") {echo "$breferencia";} ?></td>
<td class=center_borda> <? if ($libuf == "" and $checkuf == "") {echo "$buf";} ?></td>
<td class=center_borda> <? if ($librepresentante == "" and $checkrepresentante == "") {echo "$brepresentante";} ?></td>
<td class=center_borda> <? if ($libvalor == "" and $checkvalor == "") {echo number_format($bvalor,2,',','.');} ?></td>
<td class=center_borda> <? if ($libdata == "" and $checkdata == "") {echo "$bdata";} ?></td>

<? if ($libdataalterada == "" and $checkdataalterada == "") { ?>
<td class=center_borda> <? echo "$bdataalterada"; ?></td> <? } ?>

<td class=center_borda> <? if ($libperiodo == "" and $checkperiodo == "") {echo "$bperiodo";} ?></td>

<? if ($libperiodoalterado == "" and $checkperiodoalterado == "") { ?>
<td class=center_borda> <? echo "$bperiodoalterado"; ?></td> <? } ?>

<? if ($libusuario == "" and $checkusuario == "") { ?>
<td class=center_borda> <? echo "$busuario"; ?></td><? } ?>

<? if ($libusuarioalterado == "" and $checkusuarioalterado == "") { ?>
<td class=center_borda> <? echo "$busuarioalterado"; ?></td> <? } ?>

<? if ($libtempo == "" and $checktempo == "") { ?> 
<td class=center_borda> <? echo "$btempo_total"; ?></td> <? } ?>

<td class=center_borda>
<? if ($libexcluir == "sim") { ?>
<input class="botao_excluir" type="button" value="<?echo $bn_orc?>"  onClick="javascript:void(open('confirmacao_excluir_orcamento.php?n_orc=<?echo$bn_orc?>','principal','scrollbars=yes'))"
onMouseOver="drc('',' Excluir - N° Orc.  <?echo"$bn_orc"?> '); return true;" onMouseOut="nd(); return true;">
<? } ?>
</td></tr>
<? $valortotal = $valortotal + $bvalor; $QuantOrc = $QuantOrc + 1 ;?>
<? } ?>
<? /* --------------------  FIM DA CONSULTA  -----------------------------  */  ?>
<tr class=sem_borda>
<td class=titulo>Total</td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
<td class=titulo>Total</td>
</tr>
<tr class=sem_borda>
<td class=titulo> <? echo $QuantOrc; ?></td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
<td class=titulo> <?if ($libvalor == "" and $checkvalor == "") {echo number_format($valortotal,2,',','.');} ?> </td>
</tr>

</tr></table>
			             
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
              
</TABLE>

</FIELDSET>

</form>
</body>
</html>

<script>
var arvoren_orc = new Array(<?= $palavrasn_orc ?>);
var arvore_valor = new Array(<?= $palavras_valor ?>);
document.write('<style type="text/css">'+
	  '#listHolder{position:absolute;border:0;}'+
	  '.list{font-family:verdana;font-size:10;color:#000000;background:;}'+
	 '<\/style>')
	 
function SaltaCampo(campo,prox,teclapres){
    var tecla = teclapres.keyCode ? teclapres.keyCode : teclapres.which ? teclapres.which : teclapres.charCode;
    if (tecla == 13){
  document.cons_orcamento[prox].select(); //se não quiser o foco, desabilite!
  document.cons_orcamento[prox].focus();
    }
}
</script>
