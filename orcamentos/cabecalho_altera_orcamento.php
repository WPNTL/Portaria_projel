<? include "valida_sessao.php" ; include "config_orcamento.php";
$b = date('d'); $c = date('n'); $d = date('Y'); if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; $datafinal = $b."/".$c."/".$d; $dataperiodo = $c."/".$d; ?>

<html>
<head>
<title> Cabeçalho de Busca Alteração de Orçamentos </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
</head>
<body>

<form action="" method="post" name="n_orcamento1">

<table class=sem_borda width=30% align="center">
<tr>

<td class=right > Número Orçamento </td>

<? if ( $fn_orc <> "") {$fn_orcdb = "and n_orc='$fn_orc'";} else {$fn_orcdb = "";}  ?>

<?/*
<td class=borda>
<select <?echo $botao?> size="1" name="fn_orc">
<?
  $query = "select distinct n_orc from n_orcamento order by 'id'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->n_orc==$fn_orc)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->n_orc' $sSelect> $sRow->n_orc</option>");   }  ?>
</select>
</td>*/?>

<?
$buscan_orc = mysql_query("select distinct n_orc from n_orcamento order by 'n_orc'");
$totaln_orc = mysql_num_rows($buscan_orc); $count = $totaln_orc-1;
for($i=0; $i<$totaln_orc; $i++) { $nomen_orc = mysql_result($buscan_orc,$i,"n_orc"); $palavrasn_orc.="'$nomen_orc'";
if($i<$count) { $palavrasn_orc.=","; } }
?>
<td class=left>
<?  /* <input class=left maxLength=10 size=10 name="fn_orc" onKeyUp="checkList(this,arvoren_orc);" id="textbox1">  */ ?>

<input class=left maxLength=10 size=10 name="fn_orc">


</td>

<td class=left><input class="botao1" name="busca" type="button" value="Buscar" Onclick="Atualizar_Alterar();"></td>

</tr></table></form>
</body>
</html>
<script>
var arvoren_orc = new Array(<?= $palavrasn_orc ?>);
document.write('<style type="text/css">'+
		'#listHolder{position:absolute;border:0;}'+
		'.list{font-family:verdana;font-size:10;color:#000000;background:;}'+
		'<\/style>')
</script>
