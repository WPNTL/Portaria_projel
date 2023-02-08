<? include "config_pesquisa.php"; ?> 
<html>
<head>
<title> Relatório Pesquisa Satisfação de Cliente </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" src="funcoes/geral.js"></script>
</head>
<body>

<table class=sem_borda width="800" align="center">
<tr><td>

<table class=titulo width=100% align="center" height="25">
<tr><td><b><font size="5" color="#000000"> Relatório Pesquisa Satisfação de Cliente </font></b></td></tr></table>
<br>

<table class=center width=100% align="center" height="15">
<tr><td><b><font size="2" color="#000000"> 23) Fique a vontade para fazer suas críticas ou sugestões no espaço ao lado </font></b></td></tr></table>

<FORM NAME="pesquisa" method="post">

<table class=sem_borda width="800" align="center">
<td>

<?
$query = "SELECT * FROM pesquisa_satisfacao ORDER BY id";
$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) {
$criticas_sugestoes = $dados["criticas_sugestoes"]; $razao_social = $dados["razao_social"]; $nome = $dados["nome"]; $cargo = $dados["cargo"];
$telefone = $dados["telefone"]; $preenchido = $dados["preenchido"]; $estado = $dados["estado"];
?>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_borda colspan="2"> 
Razão Social: <font color="#FF0000"> <?echo $razao_social; ?> </font><br>
Nome: <font color="#FF0000"> <?echo $nome; ?> </font><br>
Cargo: <font color="#FF0000"> <?echo $cargo; ?> </font><br>
Telefone: <font color="#FF0000"> <?echo $telefone; ?> </font><br>
Preenchido: <font color="#FF0000"> <?echo $preenchido; ?> </font><br>
Estado: <font color="#FF0000"> <?echo $estado; ?> </font><br>
</td>
<td class=left_borda colspan="10">
<textarea name="criticas_sugestoes" rows=3 cols=80> <?echo $criticas_sugestoes; ?></textarea></td>
</tr>
<? } ?>
</td></table>


<BR>
<INPUT class="botao1" TYPE="button" NAME="fechar" VALUE="Fechar Janela" OnClick="javascript:window.close()">
</FORM>
<BR>
</td></tr></table>
</body>
</html>
