<? include "config.php";  include "valida_sessao.php";?>

<html>
<head>
<title> Cadastrar Setor </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/cadastro.js"></script>
<script language="JavaScript" SRC="funcoes/auto_completar.js"></script>
</head>
<body>

<form action="" method="post" name="avaliacao_desempenho">


<table class=sem_borda width=100% align="center">
<td>

<table class=titulo width=100% align="center" height="25">
<tr><td><b><font size="5" color="#000000"> Avaliação de Desempenho </font></b></td></tr></table>
<br>


<? /*-------------------------- INICIO DADOS DO CLIENTE -------------------------------  */?>

<table class=sem_borda width=100% align="center">
<tr>
<td class=titulo height="25" align="center"> CADASTRAR SETOR ( * = Dados Obrigatórios ) 
</td>
</tr>
</table>

<br>

<table class=sem_borda width=100% align="center">
<tr>

<td class=right width=40%> Nome* </td>
<?
$buscasetor=mysql_query("select * from setor order by 'nome_setor'");
$totalsetor=mysql_num_rows($buscasetor);
$count=$totalsetor-1;
for($i=0;$i<$totalsetor;$i++) {$nomesetor=mysql_result($buscasetor,$i,"nome_setor");$palavrassetor.="'$nomesetor'";
if($i<$count) { $palavrassetor.=","; }   }
?>
<td class=left>
<input class=left name=nome_setor maxLength=30 size=31 value="<?echo $nome_setor1?>"
onKeyUp="checkList(this,arvoresetor);" id="textbox1"  onFocus="nextfield ='cadastrar';">
</td>
</tr>

<tr>
<td class=right width=40%> Senha* </td>
<td class=left><input type="password" name="senha" size="6" maxLength="6">( No máximo 6 digitos )
</td>

</tr>
</table>

<BR>



<? /*-------------------------- FIM DADOS DO VENTILADOR -------------------------------  */?>

<table class=sem_borda width=50% align="center">
<tr>
<td>
<input class="botao1" name="cadastrar" type="button" value="Cadastrar" onClick="Cadastro_Setor();" onFocus="nextfield ='done';">

<input class="botao1" type="button" value="Voltar" onClick="javascript:void(open('principal.php','_top','scrollbars=yes'))">

<input class="botao1" type="button" value="Fechar Janela" onClick="javascript:window.close()">
</td>
</tr>
</table>


</td>
</table>

</form>

</body>
</html>

<script>
var arvoresetor = new Array(<?= $palavrassetor ?>);

document.write('<style type="text/css">'+
	  '#listHolder{position:absolute;border:0;}'+
	  '.list{font-family:verdana;font-size:10;color:#000000;background:;}'+
	 '<\/style>')

</script>
