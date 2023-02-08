<?  include "valida_sessao.php"; ?>

<html>
<head>
<title> Alterar Setor </title>
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
<td class=titulo height="25" align="center"> ALTERAR SETOR ( * = Dados Obrigatórios ) 
</td>
</tr>
</table>

<br>

<table class=sem_borda width=100% align="center">

<tr>
<td class=right width=40%> Nome Anterior* </td>
<td class=left>
<select type="text" size="1" name="nome_setor_anterior" onChange="Atualizar_Alterar_Setor();" >
 <? include "config.php";
  $query = "select * from setor order by 'nome_setor'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> Selecione.. </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->nome_setor==$nome_setor_anterior)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->nome_setor' $sSelect> $sRow->nome_setor</option>");   }  ?>
</select>
<? // BUSCAR ID_SETOR_ANTERIOR
$query = "SELECT * FROM setor WHERE nome_setor='$nome_setor_anterior' ORDER BY 'nome_setor'";
$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) { $id_setor_anterior = $dados["id"]; }
//echo "ID SETOR ANTERIOR = ".$id_setor_anterior;
?>
<input class=nedita_left readonly type=hidden name=id_setor_anterior value="<?echo $id_setor_anterior;?>">
</td>
</tr>


<tr>
<td class=right width=40%> Nome Atual* </td>
<?
$buscasetor=mysql_query("select * from setor order by 'nome_setor'");
$totalsetor=mysql_num_rows($buscasetor);
$count=$totalsetor-1;
for($i=0;$i<$totalsetor;$i++) {$nomesetor=mysql_result($buscasetor,$i,"nome_setor");$palavrassetor.="'$nomesetor'";
if($i<$count) { $palavrassetor.=","; }   }
?>
<td class=left>
<input class=left name=nome_setor_novo maxLength=30 size=31 value="<?echo $nome_setor_novo;?>"
onKeyUp="checkList(this,arvoresetor);" id="textbox1"  onFocus="nextfield ='cadastrar';">
</td>
</tr>

<tr>
<td class=right width=40%> Senha Atual* </td>
<td class=left>
<? // BUSCAR SENHA ANTERIOR
$query = "SELECT * FROM setor WHERE id='$id_setor_anterior' ORDER BY 'id'";
$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) { $senha_setor_anterior = $dados["senha"]; }
//echo "ID SENHA ANTERIOR = ".$id_senha_anterior;
?>
<input class=left type=password name=senha_setor_novo maxLength=6 size=6 value="<?echo $senha_setor_anterior;?>"> Para alterar a senha, digite aqui.( No máximo 6 digitos )
</td>
</tr>

</table>

<BR>



<? /*-------------------------- FIM DADOS DO VENTILADOR -------------------------------  */?>

<table class=sem_borda width=50% align="center">
<tr>
<td>
<input class="botao1" name="alterar" type="button" value="Alterar" onClick="Alterar_Setor();" onFocus="nextfield ='done';">
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
