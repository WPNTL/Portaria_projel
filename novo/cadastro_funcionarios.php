<? include "valida_sessao.php"; ?>
<html>
<head>
<title> Cadastro Funcionários </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/cadastro.js"></script>
<script language="JavaScript" SRC="funcoes/auto_completar.js"></script>
</head>

<body bgcolor="#FFFFFF">
<h2> Cadastrando Funcionário </h2>


<?//EXIBE O FORMULÁRIO?>
<form name="frmFoto" method="post" enctype="multipart/form-data">
<table border="0" cellpading="0" cellspacing="0" width="95%">

<tr>
<td class=right width=40%> Nome* </td>
<?
/*
<input class=left name=nome_funcionarios maxLength=30 size=31 value="<?echo $nome_funcionarios;?>" onFocus="nextfield ='setor_funcionario';">
*/
$conn = mysql_connect("localhost", "root", "")
or die("Erro na conexão com o BD");
mysql_select_db("qualidade", $conn);

$buscafuncionarios=mysql_query("select * from funcionarios order by 'nome_funcionarios'",$conn);
$totalfuncionarios=mysql_num_rows($buscafuncionarios);
$count=$totalfuncionarios-1;
for($i=0;$i<$totalfuncionarios;$i++) {$nomefuncionarios=mysql_result($buscafuncionarios,$i,"nome_funcionarios");$palavrasfuncionarios.="'$nomefuncionarios'";
if($i<$count) { $palavrasfuncionarios.=","; }   }


?>
<td class=left>
<input class=left name=nome_funcionarios maxLength=30 size=31 value="<?echo $nome_funcionarios;?>"
onKeyUp="checkList(this,arvorefuncionarios);" id="textbox1"  onFocus="nextfield ='setor_funcionario';">
</td>
</tr>

<tr>
<td class=right width=40%> Status* </td>
<td class=left>
<select name="status">
<option value='' <? echo ($status==''?"SELECTED":""); ?> > Selecione... </option>
<option value='Ativo' <? echo ($status=='Ativo'?"SELECTED":""); ?> > Ativo </option>
<option value='Acidente' <? echo ($status=='Acidente'?"SELECTED":""); ?> > Acidente </option>
<option value='Doenca' <? echo ($status=='Doenca'?"SELECTED":""); ?> > Doença </option>
<option value='Demitido' <? echo ($status=='Demitido'?"SELECTED":""); ?> > Demitido </option>
</select>
</td>
</tr>

<tr>
<td class=right width=40%> Setor* </td>
<td class=left>
<select type="text" size="1" name="setor_funcionario" onChange="Atualizar_Cadastro_Funcionario();">
 <?
  $query = "select distinct nome_setor from setor order by 'nome_setor'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> Selecione... </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->nome_setor==$setor_funcionario)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->nome_setor' $sSelect> $sRow->nome_setor</option>");   }  ?>
</select>

<? // BUSCAR ID_SETOR CONFORME O NOME DO SETOR
$query = "SELECT * FROM setor WHERE nome_setor='$setor_funcionario' ORDER BY 'nome_setor'";
$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) { $id_setor = $dados["id"]; }
//echo "ID SETOR = ".$id_setor;
?>
<input class=left readonly type=hidden name=id_setor value="<?echo $id_setor;?>">
</td>
</tr>

<tr>
<td class=right width=40%> Função* </td>
<td class=left>
<select type="text" size="1" name="funcao_funcionario" onChange="Atualizar_Cadastro_Funcionario();">
 <?
  $query = "select * from funcao order by 'nome_funcao'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> Selecione... </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->nome_funcao==$funcao_funcionario)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->nome_funcao' $sSelect> $sRow->nome_funcao</option>");   }  ?>
</select>

<? // BUSCAR ID_FUNCAO CONFORME O NOME DA FUNCAO
$query = "SELECT * FROM funcao WHERE nome_funcao='$funcao_funcionario' ORDER BY 'nome_funcao'";
$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) { $id_funcao = $dados["id"]; } 
//echo "ID FUNCAO= ".$id_funcao;
?>
<input class=left readonly type=hidden name=id_funcao value="<?echo $id_funcao;?>">
</td>
</tr>


<tr>
<td class=right width=40%>Foto:</td>
<td class=left><input type="file" name="txtFoto" size="35"></td>
</tr>

<tr>
<td colspan="2">
<input class="botao1" name="cadastrar" type="button" value="Cadastrar" onClick="Cadastro_Funcionario();" onFocus="nextfield ='done';">

<input class="botao1" type="button" value="Voltar" onClick="javascript:void(open('principal.php','_top','scrollbars=yes'))">

<input class="botao1" type="button" value="Fechar Janela" onClick="javascript:window.close()">
</tr>
</table>
</form>
</body>
</html>

<script>
var arvorefuncionarios = new Array(<?= $palavrasfuncionarios ?>);

document.write('<style type="text/css">'+
	  '#listHolder{position:absolute;border:0;}'+
	  '.list{font-family:verdana;font-size:10;color:#000000;background:;}'+
	 '<\/style>')

</script>