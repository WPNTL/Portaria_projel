<? include "valida_sessao.php" ; include "config_pcp.php"; ?>

<html>
<head>
<title> Menu </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/abrir_fechar.js"></script>
</head>
<body>

<?
$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {

/* INSERIR PCP */
$lib_inserir = $linha["lib_inserir"]; 

/* INSERIR CONTROLE PEDIDO */
$lib_inserir_pedido = $linha["lib_inserir_pedido"];

/* CONSULTA */
$lib_consulta = $linha["lib_consulta"];

/* CONSULTAR POR CAMPO */
$lib_consulta_os = $linha["lib_consulta_os"]; 

/* CONSULTAR PLACAR */
$lib_consulta_placar = $linha["lib_consulta_placar"]; 

/* CONSULTAR PEDIDO */
$lib_consulta_pedido = $linha["lib_consulta_pedido"]; 

/* SETOR VENDAS */
$lib_vendas = $linha["lib_vendas"]; 

/* SETOR PCP */
$lib_pcp = $linha["lib_pcp"]; 

/* SETOR PCP PRODUCAO */
$lib_pcp_producao = $linha["lib_pcp_producao"]; 
}
?>

<form action="" method="post" name="pcp">

<table class=titulo width=100% align="center" height="25">
<tr>

<td width=8%>
<? if ($lib_inserir == "sim") { ?>
<input class="botao1" type="button" value="Cadastro PCP" onClick="Abrir_Cadastro_PCP();">
<? } ?>
</td>

<td width=8%>
<? if ($lib_inserir_pedido == "sim") { ?>
<input class="botao1" type="button" value="Cadastro Pedido" onClick="Abrir_Cadastro_Pedido();">
<? } ?>
</td>

<td width=8%>
<? if ($lib_consulta == "sim") { ?>
<input class="botao1" type="button" value="Cons. PCP" onClick="Abrir_Consulta();">
<? } ?>
</td>

<td width=8%>
<? if ($lib_consulta_os == "sim") { ?>
<input class="botao1" size=1 type="button" value="Cons. Campo PCP" onClick="Abrir_PCP();">
</td>
<? } ?>


<? if ($lib_consulta_placar == "sim") { ?>
<td width=8%>
<input class="botao1" size=1 type="button" value="Cons. Placar" onClick="Abrir_Consulta_Placar();">
</td>
<? } ?>


<td width=8%>
<? if ($lib_consulta_pedido == "sim") { ?>
<input class="botao1" size=1 type="button" value="Cons. Pedido" onClick="Abrir_Consulta_Pedido();">
<? } ?>
</td>

<td width=5% align="center"> PCP </td>

<? /* <td width=10% align="left"> Usuário = <?echo $nome_usuario;?> </td> */ ?>

<td width=8% align="left">
<input class="botao1" type="button" value="Logout" onClick="javascript:void(open('logout.php','_top','scrollbars=yes'))">
</td>

<td width=8% align="right">
<a class="botao1" href="javascript:window.close()" target="_top"> Fecha Janela </a>
</td>

</tr>
</table>

<?//DATA HOJE
$b = date('d'); $c = date('n'); $d = date('Y'); 
if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; 
$data_hoje = $b."/".$c."/".$d; 
?>

<table class=bordas width=100% height="25">
<tr>
<td class=right >Usuário  <? echo "$nome_usuario" ?><br>Hoje <? echo "$data_hoje"?></td></tr></table>



</form>
</body>
</html>