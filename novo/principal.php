<? include "valida_sessao.php"; ?>

<html>
<head>
<title> Menu </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/abrir_fechar_atualizar.js"></script>
</head>
<body>

<form action="" method="post" name="menu_principal">

<?//DATA HOJE
$b = date('d'); $c = date('n'); $d = date('Y'); 
if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; 
$data_hoje = $b."/".$c."/".$d; 
?>

<?include "config.php"; 
$sql = "SELECT * FROM setor WHERE nome_setor='$nome_setor'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {


}
?>

<table class=titulo width=100% align="center" height="25">
<tr>


<td class=center >Usuário <? echo "$nome_setor" ?><br>Hoje <? echo "$data_hoje"?></td>
</tr>
</table>

<br>
<br>

<table class=titulo width=100% align="center" height="100">
<tr>


<tr>
<? /*  ----------------	BUSCAR DADOS DE LIBERAÇÃO ------------------	*/
include "config.php"; 
$sql = "SELECT * FROM setor WHERE nome_setor='$nome_setor'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {
	
$lib_cadastro = $linha["lib_cadastro"];
$lib_alterar = $linha["lib_alterar"];
$lib_controle = $linha["lib_controle"];

}
?>
</tr>


<td width=8%>
<? if ($lib_cadastro == "sim") { ?>
<input class="botao1" type="button" value="Cadastro Setor" onClick="javascript:void(open('cadastro_setor.php','_top','scrollbars=yes'))">
</td>

<td width=8%>
<input class="botao1" type="button" value="Cadastro Função" onClick="javascript:void(open('cadastro_funcao.php','_top','scrollbars=yes'))">
</td>

<td width=8%>
<input class="botao1" type="button" value="Cadastro Funcionario" onClick="javascript:void(open('cadastro_funcionarios.php','_top','scrollbars=yes'))">
</td>



<td width=8% align="left">
<input class="botao1" type="button" value="Logout" onClick="javascript:void(open('logout.php','_top','scrollbars=yes'))">
</td>
<? } ?>





</tr>

<br>

<tr>

<td width=8%>
<? if ($lib_alterar == "sim") { ?>
<input class="botao2" size=1 type="button" value="Alterar Setor" onClick="javascript:void(open('alterar_setor.php','_top','scrollbars=yes'))">

<td width=8%>
<input class="botao2" size=1 type="button" value="Alterar Função" onClick="javascript:void(open('alterar_funcao.php','_top','scrollbars=yes'))">

<td width=8%>
<input class="botao2" size=1 type="button" value="Alterar Funcionario" onClick="javascript:void(open('alterar_funcionarios.php','_top','scrollbars=yes'))">
</td>
<? } ?>



<td width=8% align="right">
<a class="botao1" href="javascript:window.close()" target="_top"> Fecha Janela </a>
</td>

</tr>

<br>

<tr>
<? if ($lib_controle == "sim") {?>
<td width=8% align="left">
<input class="botao1" type="button" value="Controle Total" onClick="javascript:void(open('frame.php','_top','scrollbars=yes'))">
</td>
<? } ?>



<? if ($lib_controle == "sim") {?> 
<td width=8% align="left">
<input class="botao3" type="button" value="Controle Setor" onClick="javascript:void(open('http://intranet.projelmec.com.br/qualidade/avaliacao_desempenho/controle.php','_top','scrollbars=yes'))">
</td>
<? } ?>

</tr>



</table>

</form>
</body>
</html>