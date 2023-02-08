<? include "config.php"; include "valida_sessao.php"; ?>

<html>
<head>
<title> Cadastro Função </title>
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
<td class=titulo height="25" align="center"> CADASTRO FUNÇÃO ( * = Dados Obrigatórios ) 
</td>
</tr>
</table>

<br>

<table class=sem_borda width=100% align="center">
<tr>

<td class=right width=40%> Nome* </td>
<?
$buscafuncao=mysql_query("select * from funcao order by 'nome_funcao'");
$totalfuncao=mysql_num_rows($buscafuncao);
$count=$totalfuncao-1;
for($i=0;$i<$totalfuncao;$i++) {$nomefuncao=mysql_result($buscafuncao,$i,"nome_funcao");$palavrasfuncao.="'$nomefuncao'";
if($i<$count) { $palavrasfuncao.=","; }   }
?>
<td class=left>
<input class=left name=nome_funcao maxLength=30 size=31 value="<?echo $nome_funcao?>"
onKeyUp="checkList(this,arvorefuncao);" id="textbox1"  onFocus="nextfield ='cadastrar';">
</td>
</tr>

</table>

<BR>



<? /*-------------------------- FIM DADOS DO VENTILADOR -------------------------------  */?>

Desc.Função
<textarea name=Desc.Função rows=2 cols=60
,0 onKeyUp="Desc.Função();" id="textbox10"> <? echo $descricao_funcao; ?></textarea>

<table class=sem_borda width=50% align="center">
<tr>
<td>
<input class="botao1" name="cadastrar" type="button" value="Cadastrar" onClick="Cadastro_Funcao();" onFocus="nextfield ='done';">

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
var arvorefuncao = new Array(<?= $palavrasfuncao ?>);

document.write('<style type="text/css">'+
	  '#listHolder{position:absolute;border:0;}'+
	  '.list{font-family:verdana;font-size:10;color:#000000;background:;}'+
	 '<\/style>')

</script>
