<? include "valida_sessao.php" ; include "config_orcamento.php"; ?>
<html>
<head>
<title> Menu </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" src="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
</head>
<body>

<?
$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {
$libinserir = $linha["libinserir"]; 
$libalterar = $linha["libalterar"];
}
?>

<form action="" method="post" name="n_orcamento">

<table class=titulo width=100% align="center" height="25">
<tr>
<? if ($libinserir == "sim") { ?>
<td width=10%>
<input class="botao1" type="button" value="Novo Orçamento" onClick="Abrir_Cadastro_Orcamento();"></td>
<? } else { ?>
<td width=10%> </td>
<? } ?>

<td width=10%><input class="botao1" type="button" value="Consulta Orçamento" onClick="Abrir_N_Orcamento();"></td>

<td width=10%><input class="botao1" type="button" value="Cons. Campo Orç." onClick="Abrir_Cons_Orcamento();"></td>

<? if ($libalterar == "sim") { ?>
<td width=10%>
<input class="botao1" type="button" value="Alterar Orçamento" onClick="Abrir_Alterar_Orcamento();"></td>
<? } else { ?>
<td width=10%> </td>
<? } ?>

<? if ($nome_usuario == "LEANDRO" or $nome_usuario == "leandro") {  ?>
<td width=10%>
<input class="botao2" type="button" value="Cliente Prioridade" onClick="Abrir_Cliente_Orcamento();"></td>
<? } ?>

<td width=35% align="center"> CADASTRO ORÇAMENTOS - GERAL  / USUÁRIO = <?echo $nome_usuario?> </td>

<td><input class="botao1" type="button" value="Voltar Login" onClick="javascript:void(open('logout.php','_top','scrollbars=yes'))"></td>

<td><a class="botao1" href="javascript:window.close()" target="_top"> Fecha Janela </a></td>

</tr></table>

<form>
</body>
</html>




