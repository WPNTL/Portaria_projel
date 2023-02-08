<? 
include "valida_sessao.php" ; include "config_orcamento.php";
$b = date('d'); 
$c = date('n'); 
$d = date('Y'); 
if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; 
$datafinal = $b."/".$c."/".$d; 
$dataperiodo = $c."/".$d; 
?>

<html>
<head>
<title> Cabeçalho de Orçamentos </title>
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
$libinserir = $linha["libinserir"]; $libalterar = $linha["libalterar"]; $libexcluir = $linha["libexcluir"];

$libn_orc = $linha["libn_orc"];
$libcliente = $linha["libcliente"];
$libmercado = $linha["libmercado"];
$libcontato = $linha["libcontato"];
$libreferencia = $linha["libreferencia"];
$libuf = $linha["libuf"];
$libdata = $linha["libdata"]; $libdataalterada = $linha["libdataalterada"];
$libvalor = $linha["libvalor"];
$librepresentante = $linha["librepresentante"];
$libperiodo = $linha["libperiodo"]; $libperiodoalterado = $linha["libperiodoalterado"];
$libusuario = $linha["libusuario"]; $libusuarioalterado = $linha["libusuarioalterado"];

$libtempo = $linha["libtempo"];
$libalteratempo = $linha["libalteratempo"];

$libdatainicio = $linha["libdatainicio"]; 
$libhorainicio = $linha["libhorainicio"];
$libdatafim = $linha["libdatafim"]; 
$libhorafim = $linha["libhorafim"];

}
?>

<form action="" method="post" name="n_orcamento1">

<table class=sem_borda width=100%>
<tr>

<table class=sem_borda width=100% align="center">
<tr>
<td class=center > <input type="hidden" name="libn_orc" value="<?echo $libn_orc;?>" size="7"> </td>

<td class=center ><? /* CLIENTE */ ?><input type="hidden" name="libcliente" value="<?echo $libcliente;?>" size="7">
<? if ($libcliente == "") { ?>
<input class=botao2 type="checkbox" name="checkcliente" value="checked" <?echo $checkcliente?> onClick="Atualizar1();"
onMouseOver="drc('','Cliente'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center ><? /* MERCADO */ ?><input type="hidden" name="libmercado" value="<?echo $libmercado;?>" size="7">
<? if ($libmercado == "") { ?>
<input class=botao2 type="checkbox" name="checkmercado" value="checked" <?echo $checkmercado?> onClick="Atualizar1();"
onMouseOver="drc('','Mercado'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center ><? /* CONTATO */ ?><input type="hidden" name="libcontato" value="<?echo $libcontato;?>" size="7">
<? if ($libcontato == "") { ?>
<input class=botao2 type="checkbox" name="checkcontato" value="checked" <?echo $checkcontato?> onClick="Atualizar1();"
onMouseOver="drc('','Contato'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center><? /* REFERENCIA */ ?><input type="hidden" name="libreferencia" value="<?echo $libreferencia;?>" size="7">
<? if ($libreferencia == "") { ?>
<input class=botao2 type="checkbox" name="checkreferencia" value="checked" <?echo $checkreferencia?> onClick="Atualizar1();" onMouseOver="drc('','Referência/Obra'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center ><? /* UF */ ?><input type="hidden" name="libuf" value="<?echo $libuf;?>" size="7">
<? if ($libuf == "") { ?>
<input class=botao2 type="checkbox" name="checkuf" value="checked" <?echo $checkuf?> onClick="Atualizar1();"
onMouseOver="drc('','UF'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center><? /* REPRESENTANTE */ ?><input type="hidden" name="librepresentante" value="<?echo $librepresentante;?>" size="7">
<? if ($librepresentante == "") { ?>
<input class=botao2 type="checkbox" name="checkrepresentante" value="checked" <?echo $checkrepresentante?> onClick="Atualizar1();" onMouseOver="drc('','Representante'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center ><? /* VALOR */ ?><input type="hidden" name="libvalor" value="<?echo $libvalor;?>" size="7">
<? if ($libvalor == "") { ?>
<input class=botao2 type="checkbox" name="checkvalor" value="checked" <?echo $checkvalor?> onClick="Atualizar1();"
onMouseOver="drc('','Valor'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center ><? /* DATA */ ?><input type="hidden" name="libdata" value="<?echo $libdata;?>" size="7">
<? if ($libdata == "") { ?>
<input class=botao2 type="checkbox" name="checkdata" value="checked" <?echo $checkdata?> onClick="Atualizar1();"
onMouseOver="drc('','Data'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center ><? /* DATA ALTERADA*/ ?><input type="hidden" name="libdataalterada" value="<?echo $libdataalterada;?>" size="7">
<? if ($libdataalterada == "") { ?>
<input class=botao2 type="checkbox" name="checkdataalterada" value="checked" <?echo $checkdataalterada?> onClick="Atualizar1();" onMouseOver="drc('','Data Alterada'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center ><? /* PERIODO */ ?><input type="hidden" name="libperiodo" value="<?echo $libperiodo;?>" size="7">
<? if ($libperiodo == "") { ?>
<input class=botao2 type="checkbox" name="checkperiodo" value="checked" <?echo $checkperiodo?> onClick="Atualizar1();"
onMouseOver="drc('','Período'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center ><? /* PERIODO ALTERADO */ ?><input type="hidden" name="libperiodoalterado" value="<?echo $libperiodoalterado;?>" size="7">
<? if ($libperiodoalterado == "") { ?>
<input class=botao2 type="checkbox" name="checkperiodoalterado" value="checked" <?echo $checkperiodoalterado?> onClick="Atualizar1();" onMouseOver="drc('','Período Alterado'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center > <? /* USUARIO */ ?><input type="hidden" name="libusuario" value="<?echo $libusuario;?>" size="7">
<? if ($libusuario == "") { ?>
<input class=botao2 type="checkbox" name="checkusuario" value="checked" <?echo $checkusuario?> onClick="Atualizar1();"
onMouseOver="drc('','Usuário'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center > <? /* USUARIO ALTERADO*/ ?><input type="hidden" name="libusuarioalterado" value="<?echo $libusuarioalterado;?>" size="7">
<? if ($libusuarioalterado == "") { ?>
<input class=botao2 type="checkbox" name="checkusuarioalterado" value="checked" <?echo $checkusuarioalterado?> onClick="Atualizar1();" onMouseOver="drc('','Usuário Alterado'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center ><? /* TEMPO */ ?><input type="hidden" name="libtempo" value="<?echo $libtempo;?>" size="7">
<? if ($libtempo == "") { ?>
<input class=botao2 type="checkbox" name="checktempo" value="checked" <?echo $checktempo?> onClick="Atualizar1();"
onMouseOver="drc('','Tempo Retorno'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>


</tr>

<tr>
<td class=center ><? /* N_ORC */ ?>
<? if ($libn_orc == "" and $checkn_orc == "") { ?> N° Orç <? } ?>
</td>

<td class=center ><? /* CLIENTE */ ?>
<? if ($libcliente == "" and $checkcliente == "") { ?> Cliente <? } ?>
</td>

<td class=center ><? /* MERCADO */ ?>
<? if ($libmercado == "" and $checkmercado == "") { ?> Mercado <? } ?>
</td>

<td class=center ><? /* CONTATO */ ?>
<? if ($libcontato == "" and $checkcontato == "") {?> Contato <? } ?>
</td>

<td class=center ><? /* REFERENCIA */ ?>
<? if ($libreferencia == "" and $checkreferencia == "") {?> Referência / Obra <? } ?>
</td>

<td class=center ><? /* UF */ ?>
<? if ($libuf == "" and $checkuf == "") {?> UF <? } ?>
</td>

<td class=center ><? /* REPRESENTANTE */ ?>
<? if ($librepresentante == "" and $checkrepresentante == "") {?> Representante <? } ?>
</td>

<td class=center ><? /* VALOR */ ?>
<? if ($libvalor == "" and $checkvalor == "") {?> Valor <? } ?>
</td>

<td class=center ><? /* DATA */ ?>
<? if ($libdata == "" and $checkdata == "") {?> Data <? } ?>
</td>

<td class=center >  <? /* DATA ALTERADA*/ ?>
<? if ($libdataalterada == "" and $checkdataalterada == "") {?>   Data Alterada   <? } ?>
</td>

<td class=center ><? /* PERIODO */ ?>
<? if ($libperiodo == "" and $checkperiodo == "") {?> Período <? } ?>
</td>

<td class=center >  <? /* PERIODO ALTERADO */ ?>
<? if ($libperiodoalterado == "" and $checkperiodoalterado == "") {?>  Período Alterado  <? } ?>
</td>

<td class=center > <? /* USUARIO */ ?>
<? if ($libusuario == "" and $checkusuario == "") {?> Usuário <? } ?>
</td>

 <td class=center >  <? /* USUARIO ALTERADO */ ?>
<? if ($libusuarioalterado == "" and $checkusuarioalterado == "") {?> Usuário Alterado  <? } ?>
</td>

<td class=center ><? /* TEMPO RETORNO */ ?>
<? if ($libtempo == "" and $checktempo == "") {?> Tempo retorno <? } ?>
</td>

<td class=center >  <? /* EXCLUIR */ ?>
<? if ($libexcluir == "sim" ) {?>  <? } ?>
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


<tr>



<td><?  /* N_ORÇAMENTO */  ?>
<? if ($libn_orc == "" and $checkn_orc == "") { ?>
<? if ($fn_orc == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="fn_orc" onChange="Atualizar1();" >
<?
  $query = "select distinct n_orc from n_orcamento where id>='0' $fclientedb $fmercadodb $fcontatodb $freferenciadb $fufdb $frepresentantedb $fvalordb $fdatadb $dataalteradadb $fperiododb $fperiodoalteradodb $fusuariodb $fusuarioalteradodb $ftempo_totaldb order by id";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->n_orc==$fn_orc)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->n_orc' $sSelect> $sRow->n_orc</option>");   }  ?>
</select>
<? } ?>
</td>

<td><? /* CLIENTE */ ?>
<? if ($libcliente == "" and $checkcliente == "") { ?>
<? if ($fcliente == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="fcliente" onChange="Atualizar1();" >
 <?
  $query = "select distinct cliente from n_orcamento where id>='0' $fn_orcdb $fmercadodb $fcontatodb $freferenciadb $fufdb $frepresentantedb $fvalordb $fdatadb $dataalteradadb $fperiododb $fperiodoalteradodb $fusuariodb $fusuarioalteradodb $ftempo_totaldb order by cliente";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->cliente==$fcliente)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->cliente' $sSelect> $sRow->cliente</option>");   }  ?>
</select>
<? } ?>
</td>

<td><? /* MERCADO */ ?>
<? if ($libmercado == "" and $checkmercado == "") { ?>
<? if ($fmercado == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="fmercado" onChange="Atualizar1();" >
 <?
  $query = "select distinct mercado from n_orcamento where id>='0' $fn_orcdb $fclientedb $fcontatodb $freferenciadb $fufdb $frepresentantedb $fvalordb $fdatadb $dataalteradadb $fperiododb $fperiodoalteradodb $fusuariodb $fusuarioalteradodb $ftempo_totaldb order by mercado";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->mercado==$fmercado)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->mercado' $sSelect> $sRow->mercado</option>");   }  ?>
</select>
<? } ?>
</td>

<td><? /* CONTATO */ ?>
<? if ($libcontato == "" and $checkcontato == "") { ?>
<? if ($fcontato == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="fcontato" onChange="Atualizar1();" >
 <?
  $query = "select distinct contato from n_orcamento where id>='0' $fn_orcdb $fclientedb $fmercadodb $freferenciadb $fufdb $frepresentantedb $fvalordb $fdatadb $dataalteradadb $fperiododb $fperiodoalteradodb $fusuariodb $fusuarioalteradodb $ftempo_totaldb order by contato";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->contato==$fcontato)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->contato' $sSelect> $sRow->contato</option>");   }  ?>
</select>
<? } ?>
</td>

<td><? /* REFERENCIA */ ?>
<? if ($libreferencia == "" and $checkreferencia == "") { ?>
<? if ($freferencia == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="freferencia" onChange="Atualizar1();" >
 <?
  $query = "select distinct referencia from n_orcamento where id>='0' $fn_orcdb $fclientedb $fmercadodb $fcontatodb $fufdb $frepresentantedb $fvalordb $fdatadb $dataalteradadb $fperiododb $fperiodoalteradodb $fusuariodb $fusuarioalteradodb $ftempo_totaldb order by referencia";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->referencia==$freferencia)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->referencia' $sSelect> $sRow->referencia</option>");   }  ?>
</select>
<? } ?>
</td>

<td><? /* UF */ ?>
<? if ($libuf == "" and $checkuf == "") { ?>
<? if ($fuf == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
 <select <?echo $botao?> size="1" name="fuf" onChange="Atualizar1();" >
 <?
  $query = "select distinct uf from n_orcamento where id>='0' $fn_orcdb $fclientedb $fmercadodb $fcontatodb $freferenciadb $frepresentantedb $fvalordb $fdatadb $dataalteradadb $fperiododb $fperiodoalteradodb $fusuariodb $fusuarioalteradodb $ftempo_totaldb order by uf";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->uf==$fuf)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->uf' $sSelect> $sRow->uf</option>");   }  ?>
</select>
<? } ?>
</td>

<td><? /* REPRESENTANTE */ ?>
<? if ($librepresentante == "" and $checkrepresentante == "") { ?>
<? if ($frepresentante == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="frepresentante" onChange="Atualizar1();" >
 <?
  $query = "select distinct representante from n_orcamento where id>='0' $fn_orcdb $fclientedb $fmercadodb $fcontatodb $freferenciadb $fufdb $fvalordb $fdatadb $dataalteradadb $fperiododb $fperiodoalteradodb $fusuariodb $fusuarioalteradodb $ftempo_totaldb order by representante";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->representante==$frepresentante)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->representante' $sSelect> $sRow->representante</option>");   }  ?>
</select>
<? } ?>
</td>

<td><? /* VALOR */ ?>
<? if ($libvalor == "" and $checkvalor == "") { ?>
<? if ($fvalor == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="fvalor" onChange="Atualizar1();" >
 <?
  $query = "select distinct valor from n_orcamento where id>='0' $fn_orcdb $fclientedb $fmercadodb $fcontatodb $freferenciadb $fufdb $frepresentantedb $fdatadb $dataalteradadb $fperiododb $fperiodoalteradodb $fusuariodb $fusuarioalteradodb $ftempo_totaldb order by valor";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->valor==$fvalor)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->valor' $sSelect> $sRow->valor</option>");   }  ?>
</select>
<? } ?>
</td>

<td><? /* DATA */ ?>
<? if ($libdata == "" and $checkdata == "") { ?>
<? if ($fdata == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="fdata" onChange="Atualizar1();" >
 <?
  $query = "select distinct data from n_orcamento where id>='0' $fn_orcdb $fclientedb $fmercadodb $fcontatodb $freferenciadb $fufdb $frepresentantedb $fvalordb $dataalteradadb $fperiododb $fperiodoalteradodb $fusuariodb $fusuarioalteradodb $ftempo_totaldb order by id";
  $result = MYSQL_QUERY($query);
  print("<option value='TODOS' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->data==$fdata)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->data' $sSelect> $sRow->data</option>");   }  ?>
</select>
<? } ?> 
</td>

<? /* DATA ALTERADA */ ?>
<td><? if ($libdataalterada == "" and $checkdataalterada == "") { ?>
<? if ($fdataalterada == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="fdataalterada" onChange="Atualizar1();" >
 <?
  $query = "select distinct dataalterada from n_orcamento where id>='0' $fn_orcdb $fclientedb $fmercadodb $fcontatodb $freferenciadb $fufdb $frepresentantedb $fvalordb $fdatadb $fperiododb $fperiodoalteradodb $fusuariodb $fusuarioalteradodb $ftempo_totaldb order by id";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->dataalterada==$fdataalterada)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->dataalterada' $sSelect> $sRow->dataalterada</option>");   }  ?>
</select>
<? } ?></td>



<td><? /* PERIODO */ ?>
<? if ($libperiodo == "" and $checkperiodo == "") { ?>
<? if ($fperiodo == "TODOS" or $fperiodo == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="fperiodo" onChange="Atualizar1();" >
 <?
  $query = "select distinct periodo from n_orcamento where id>='0' $fn_orcdb $fclientedb $fmercadodb $fcontatodb $freferenciadb $fufdb $frepresentantedb $fvalordb $fdatadb $dataalteradadb $fperiodoalteradodb $fusuariodb $fusuarioalteradodb $ftempo_totaldb order by periodo";
  $result = MYSQL_QUERY($query);
  print("<option value='TODOS' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->periodo==$fperiodo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->periodo' $sSelect> $sRow->periodo</option>");   }  ?>
</select>
<? } ?>
</td>

<td><? /* PERIODO ALTERADO */ ?>
<? if ($libperiodoalterado == "" and $checkperiodoalterado == "") { ?>
<? if ($fperiodoalterado == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="fperiodoalterado" onChange="Atualizar1();" >
 <?
  $query = "select distinct periodoalterado from n_orcamento where id>='0' $fn_orcdb $fclientedb $fmercadodb $fcontatodb $freferenciadb $fufdb $frepresentantedb $fvalordb $fdatadb $dataalteradadb $fperiododb $fusuariodb $fusuarioalteradodb $ftempo_totaldb order by periodoalterado";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->periodoalterado==$fperiodoalterado)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->periodoalterado' $sSelect> $sRow->periodoalterado</option>");   }  ?>
</select>
</td><? } ?>


<td> <? /* USUARIO */ ?>
<? if ($libusuario == "" and $checkusuario == "") { ?>
<? if ($fusuario == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="fusuario" onChange="Atualizar1();" >
 <?
  $query = "select distinct usuario from n_orcamento where id>='0' $fn_orcdb $fclientedb $fmercadodb $fcontatodb $freferenciadb $fufdb $frepresentantedb $fvalordb $fdatadb $dataalteradadb $fperiododb $fperiodoalteradodb $fusuarioalteradodb $ftempo_totaldb order by usuario";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->usuario==$fusuario)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->usuario' $sSelect> $sRow->usuario</option>");   }  ?>
</select>
<? } ?>
</td>

<td><? /* USUARIO ALTERADO*/ ?>
<? if ($libusuarioalterado == "" and $checkusuarioalterado == "") { ?>
<? if ($fusuarioalterado == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="fusuarioalterado" onChange="Atualizar1();" >
 <?
  $query = "select distinct usuarioalterado from n_orcamento where id>='0' $fn_orcdb $fclientedb $fmercadodb $fcontatodb $freferenciadb $fufdb $frepresentantedb $fvalordb $fdatadb $dataalteradadb $fperiododb $fperiodoalteradodb $fusuariodb $ftempo_totaldb order by usuarioalterado";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->usuarioalterado==$usuarioalterado)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->usuarioalterado' $sSelect> $sRow->usuarioalterado</option>");   }  ?>
</select>
<? } ?></td>


<td> <? /* tempo_total */ ?>
<? if ($libtempo == "" and $checktempo == "") { ?>
<? if ($ftempo_total == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="ftempo_total" onChange="Atualizar1();" >
 <?
  $query = "select distinct tempo_total from n_orcamento where id>='0' $fn_orcdb $fclientedb $fmercadodb $fcontatodb $freferenciadb $fufdb $frepresentantedb $fvalordb $fdatadb $dataalteradadb $fperiododb $fperiodoalteradodb $ftempo_totalalteradodb $ftempo_totaldb order by tempo_total";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->tempo_total==$ftempo_total)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->tempo_total' $sSelect> $sRow->tempo_total</option>");   }  ?>
</select>
<? } ?>
</td>



</tr>
<? /* --------------------  FIM DOS BOTOES DE SELECÃO (FILTROS)  -----------------------------  */  ?>

</tr></table></form>
</body>
</html>
