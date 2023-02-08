<? include "valida_sessao.php" ; include "config_orcamento.php"; ?>
<html>
<head>
<title> Emissão de Dados </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" src="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
</head>
<body>

<table class=sem_borda width="760" align="center">
<td>

<table width=100% height="25" align="center">
<tr>
<td class=titulo align="center">INSERIR CLIENTES PRIORIDADE</td></tr></table>
<form action="emissao_dados_db.php" method="post" name="n_orcamento">
<table class=borda width=100%>
<tr>
<?
$buscacliente=mysql_query("select distinct cliente from n_orcamento order by 'cliente'");
$totalcliente=mysql_num_rows($buscacliente);
$count=$totalcliente-1;
for($i=0;$i<$totalcliente;$i++) {$nomecliente=mysql_result($buscacliente,$i,"cliente");$palavrascliente.="'$nomecliente'";
if($i<$count) { $palavrascliente.=","; }   }
?>
<td class=center> Nome </td>
<td class=left><input name=nome maxLength=40 size=40 onKeyUp="checkList(this,arvorecliente);" id="textbox1" onchange="this.value = this.value.toUpperCase();"></td>
<td class=left><input class="botao1" type="submit" value="Cadastrar"></td></form></tr></table>


<?/* EXCLUSAO DOS FUNCIONARIOS  */?>
<BR>

<BR>

<BR>
<table width=100% height="25" align="center">
<tr><td class=titulo align="center">EXCLUSÃO DOS CLIENTES PRIORIDADE</td></tr></table>

<table class=borda width=100%><tr>
<td class=center> Nome do Cliente
<form method="post" action="">
 <select type="text" size="1" name="nome" onchange=submit()>
 <?
  $query = "select distinct nome from cliente_prioridade order by nome";
  $result = MYSQL_QUERY($query);
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->nome==$nome)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->nome' $sSelect> $sRow->nome</option>");   }  ?>
  </select> </td> </form>
  <br>
</tr>
</table>

<br>

<table class=borda width=100%><tr>
<form method="post" action="check.php?setor=<?echo "$nome";?>">
<?
$sql = "SELECT * FROM cliente_prioridade WHERE nome='$nome' ORDER BY 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {
$id = $linha["id"]; 
$nome = $linha["nome"]; 
?>
<tr>
<? if ($nome == "0 - SELECIONE CLIENTE") { ?>
<? } else {  ?>
<td class=borda>
<? echo "$nome" ?>
</td>

<td class=borda><a href="excluir_cliente.php?userlogin=<?echo$userlogin?>&usuario=<?echo$usuario?>&id=<?echo$id?>">
<font color="#FF0000">
<? echo "EXCLUIR"?> </font></a>
</td>
<? } ?>
</tr>

<? } ?></tr></table>
<?/* EXCLUSAO DOS FUNCIONARIOS  */?>



</td></table>
</body>
</html>
<script>
var arvorecliente = new Array(<?= $palavrascliente ?>);

document.write('<style type="text/css">'+
	  '#listHolder{position:absolute;border:0;}'+
	  '.list{font-family:verdana;font-size:10;color:#000000;background:;}'+
	 '<\/style>')
</script>