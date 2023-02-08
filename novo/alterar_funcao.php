<?  include "config.php";?>

<html>
<head>
<title> Alterar Função </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/alterar.js"></script>
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
<td class=titulo height="25" align="center"> ALTERAR FUNÇÃO ( * = Dados Obrigatórios ) 
</td>
</tr>
</table>

<br>

<table class=sem_borda width=100% align="center">

<tr>
<td class=right width=40%> Nome Anterior* </td>
<td class=left>
<select type="text" size="1" name="nome_funcao_anterior" onChange="Atualizar_Alterar_Funcao();" >
 <?
  $query = "select * from funcao order by 'nome_funcao'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> Selecione.. </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->nome_funcao==$nome_funcao_anterior)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->nome_funcao' $sSelect> $sRow->nome_funcao</option>");   }  ?>
</select>

<? 
// BUSCAR ID ANTERIOR CONFORME O NOME ANTERIOR
$query = "SELECT * FROM funcao WHERE nome_funcao='$nome_funcao_anterior' ORDER BY 'nome_funcao'";
$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) { $id_funcao_anterior = $dados["id"]; }
?>
<input class=nedita_left readonly type=hidden name=id_funcao_anterior value="<?echo $id_funcao_anterior;?>">

</td>
</tr>


<tr>
<td class=right width=40%> Nome Atual* </td>
<?
$buscafuncao=mysql_query("select * from funcao order by 'nome_funcao'");
$totalfuncao=mysql_num_rows($buscafuncao);
$count=$totalfuncao-1;
for($i=0;$i<$totalfuncao;$i++) {$nomefuncao=mysql_result($buscafuncao,$i,"nome_funcao");$palavrasfuncao.="'$nomefuncao'";
if($i<$count) { $palavrasfuncao.=","; }   }
?>
<td class=left>
<input class=left name=nome_funcao_novo maxLength=30 size=31 value="<?echo $nome_funcao_novo;?>"
onKeyUp="checkList(this,arvorefuncao);" id="textbox1"  onFocus="nextfield ='cadastrar';">
</td>
</tr>


</table>

<BR>



<? /*-------------------------- FIM DADOS DO VENTILADOR -------------------------------  */?>


Desc.Função
<textarea name=Desc.Função rows=2 cols=75 onKeyUp="Desc.Função();" id="textbox10"> <? echo $descricao_funcao; ?></textarea>


<table class=sem_borda width=50% align="center">
<tr>
<td>
<input class="botao1" name="alterar" type="button" value="Alterar" onClick="Alterar_Funcao();" onFocus="nextfield ='done';">
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
