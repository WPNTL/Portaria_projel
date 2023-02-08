<? include "valida_sessao.php" ; include "config_portaria.php";
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

<td class=right > Número Registro </td>

<? if ( $fid <> "") {$fiddb = "and id='$fid'";} else {$fiddb = "";}  ?>

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
$buscaid = mysql_query("select distinct id from controle order by 'id'");
$totalid = mysql_num_rows($buscaid); $count = $totalid-1;
for($i=0; $i<$totalid; $i++) { $nomeid = mysql_result($buscaid,$i,"id"); $palavrasid.="'$nomeid'";
if($i<$count) { $palavrasid.=","; } }
?>
<td class=left>
<?  /* <input class=left maxLength=10 size=10 name="fn_orc" onKeyUp="checkList(this,arvoren_orc);" id="textbox1">  */ ?>

<input class=left maxLength=10 size=10 name="fid">


</td>

<td class=left><input class="botao1" name="busca" type="button" value="Buscar" Onclick="Atualizar_Alterar();"></td>

</tr></table></form>
</body>
</html>
<script>
var arvoreid = new Array(<?= $palavrasid ?>);
document.write('<style type="text/css">'+
		'#listHolder{position:absolute;border:0;}'+
		'.list{font-family:verdana;font-size:10;color:#000000;background:;}'+
		'<\/style>')
</script>