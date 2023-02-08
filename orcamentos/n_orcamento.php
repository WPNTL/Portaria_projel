<? include "valida_sessao.php" ; include "config_orcamento.php";
$b = date('d'); 
$c = date('n'); 
$d = date('Y'); 
if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; 
$datafinal = $b."/".$c."/".$d; 
$dataperiodo = $c."/".$d; ?>

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

<table class=sem_borda width=100%>
<tr>

<table class=sem_borda width=100% align="center">
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

<? /* DATA ALTERADA */ ?>
<? if ($libdataalterada == "" and $checkdataalterada == "") {?>
<td class=center >  Data Alterada </td> <? } ?>

<td class=center ><? /* PERIODO */ ?>
<? if ($libperiodo == "" and $checkperiodo == "") {?> Período <? } ?>
</td>

<? /* PERIODO ALTERADO */ ?>
<? if ($libperiodoalterado == "" and $checkperiodoalterado == "") {?>
<td class=center >   Período Alterado </td> <? } ?>

<? /* USUARIO */ ?>
<? if ($libusuario == "" and $checkusuario == "") {?>
<td class=center >  Usuário </td> <? } ?>

<? /* USUARIO ALTERADO  */ ?>
<? if ($libusuarioalterado == "" and $checkusuarioalterado == "") {?>
<td class=center > Usuário Alterado </td> <? } ?>


<? /* TEMPO  */ ?>
<? if ($libtempo == "" and $checktempo == "") { ?> 
<td class=center > Tempo retorno </td> <? } ?>


<td class=center ><? /* EXCLUIR */ ?>
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
$valortotal = 0; $QuantOrc = 0;
$query = "SELECT * FROM n_orcamento where id>='0' $fn_orcdb $fclientedb $fmercadodb $fcontatodb $freferenciadb $fufdb $frepresentantedb $fvalordb $fdatadb $dataalteradadb $fperiododb $fperiodoalteradodb $fusuariodb $fusuarioalteradodb $ftempo_totaldb ORDER BY id";
$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) {
$bn_orc = $dados["n_orc"]; 
$bcliente = $dados["cliente"]; 
$bmercado = $dados["mercado"];
$bcontato = $dados["contato"]; 
$breferencia = $dados["referencia"]; $buf = $dados["uf"];

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

</tr></table></form>
</body>
</html>


