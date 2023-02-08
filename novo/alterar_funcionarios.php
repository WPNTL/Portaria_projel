<? include "valida_sessao.php"; include "config.php"; ?>
<html>
<head>
<title> Alterar de Funcionários </title>
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
<td class=titulo height="25" align="center"> ALTERAR DE FUNCIONÁRIOS ( * = Dados Obrigatórios ) 
</td>
</tr>
</table>

<br>

<table class=sem_borda width=100% align="center">

<tr>
<td class=right width=40%> Nome </td>
<td class=left>
<select type="text" size="1" name="nome_funcionarios" onChange="Atualizar_Alterar_Funcionarios();" >
 <?
  $query = "select * from funcionarios order by 'nome_funcionarios'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> Selecione... </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->nome_funcionarios==$nome_funcionarios)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->nome_funcionarios' $sSelect> $sRow->nome_funcionarios</option>");   }  ?>
</select>

<? // BUSCAR ID_FUNCIONARIOS, STATUS, ID_SETOR, ID_FUNCAO CONFORME O NOME DO FUNCIONARIO
$query = "SELECT * FROM funcionarios WHERE nome_funcionarios='$nome_funcionarios' ORDER BY 'nome_funcionarios'";
$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) { 	$id_funcionarios = $dados["id"]; $status = $dados["status"]; $id_setor = $dados["id_setor"]; $id_funcao = $dados["id_funcao"]; $id_foto = $dados["id_foto"]; }
//echo "id_funcionarios = ".$id_funcionarios;
?>
<input class=nedita_left readonly type=hidden name=id_funcionarios value="<?echo $id_funcionarios;?>">
</td>
</tr>

<tr>
<td class=right width=40%> Status </td>
<td class=left>
<select name="status_novo" >
<option value='' <? echo ($status==''?"SELECTED":""); ?> > Selecione... </option>
<option value='Ativo' <? echo ($status=='Ativo'?"SELECTED":""); ?> > Ativo </option>
<option value='Acidente' <? echo ($status=='Acidente'?"SELECTED":""); ?> > Acidente </option>
<option value='Doenca' <? echo ($status=='Doenca'?"SELECTED":""); ?> > Doença </option>
</select>
</td>
</tr>

<tr>
<td class=right width=40%> Setor </td>
<td class=left>
<? // BUSCAR NOME DO SETOR
$query = "SELECT * FROM setor WHERE id='$id_setor' ORDER BY 'id'";
$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) { $nome_setor = $dados["nome_setor"]; }

 // MOSTRA TODOS OS SETORES
$buscasetor=mysql_query("select * from setor order by 'nome_setor'");
$totalsetor=mysql_num_rows($buscasetor);
$count=$totalsetor-1;
for($i=0;$i<$totalsetor;$i++) {$nomesetor=mysql_result($buscasetor,$i,"nome_setor");$palavrassetor.="'$nomesetor'";
if($i<$count) { $palavrassetor.=","; }   }
?>
<input class=left name=nome_setor_novo maxLength=30 size=31 value="<?echo $nome_setor;?>"
onKeyUp="checkList(this,arvoresetor);" id="textbox1"  onFocus="nextfield ='nome_funcao_novo';">

</td>
</tr>

<tr>
<td class=right width=40%> Função </td>
<td class=left>

<? // BUSCAR NOME DA FUNCAO
$query = "SELECT * FROM funcao WHERE id='$id_funcao' ORDER BY 'id'";
$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) { $nome_funcao = $dados["nome_funcao"]; }

 // MOSTRA TODAS AS FUNCOES
$buscafuncao=mysql_query("select * from funcao order by 'nome_funcao'");
$totalfuncao=mysql_num_rows($buscafuncao);
$count=$totalfuncao-1;
for($i=0;$i<$totalfuncao;$i++) {$nomefuncao=mysql_result($buscafuncao,$i,"nome_funcao");$palavrasfuncao.="'$nomefuncao'";
if($i<$count) { $palavrasfuncao.=","; }   }
?>
<input class=left name=nome_funcao_novo maxLength=30 size=31 value="<?echo $nome_funcao;?>"
onKeyUp="checkList(this,arvorefuncao);" id="textbox2"  onFocus="nextfield ='alterar';">

</td>
</tr>


<tr>
<td class=right width=40%></td>
<td class=left>
<? echo "<img src='gera.php?nome_funcionarios=".$nome_funcionarios."' width='150' height='200' border='0'>"?>
</td>
</tr>

<tr>
<td class=right width=40%> Nova Foto:</td>
<td class=left><input type="file" name=txtFoto_novo size="35"></td>
</tr>

</table>
<BR>

<? /*-------------------------- FIM DADOS DO VENTILADOR -------------------------------  */?>

<table class=sem_borda width=50% align="center">
<tr>
<td>
<input class="botao1" name="alterar" type="button" value="Alterar" onClick="Alterar_Funcionarios();" onFocus="nextfield ='done';">
<input class="botao1" type="Voltar" value="Voltar" onClick="javascript:void(open('principal.php','_top','scrollbars=yes'))">
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
var arvorefuncao = new Array(<?= $palavrasfuncao ?>);
document.write('<style type="text/css">'+
	  '#listHolder{position:absolute;border:0;}'+
	  '.list{font-family:verdana;font-size:10;color:#000000;background:;}'+
	 '<\/style>')

</script>
