<? 
include "valida_sessao.php" ; include "config_orcamento.php";

//data e periodo do cadastro
$b = date('d'); 
$c = date('n'); 
$d = date('Y'); 
if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; 
$datafinal = $b."/".$c."/".$d; 
$dataperiodo = $c."/".$d; 
?>

<html>
<head>
<title> Cadastro Orçamentos </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" src="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
</head>
<body>

<form action="" method="post" name="n_orcamento">

<table class=sem_borda width="500" align="center">
<td>

<table class=sem_borda width=100% align="center">
<tr><td class=titulo colspan="2" height="25" align="center"> NOVO ORÇAMENTO </td></tr></table>
<br>

<table class=sem_borda width=100% align="center">
<tr>

<?
$buscacliente=mysql_query("select distinct cliente from n_orcamento order by 'cliente'");
$totalcliente=mysql_num_rows($buscacliente);
$count=$totalcliente-1;
for($i=0;$i<$totalcliente;$i++) {$nomecliente=mysql_result($buscacliente,$i,"cliente");$palavrascliente.="'$nomecliente'";
if($i<$count) { $palavrascliente.=","; }   }
?>
<td class=right > Cliente </td>
<td class=left>
<input class=left name=cliente maxLength=40 size=40 value="<?echo $cliente?>"
onKeyUp="checkList(this,arvorecliente);" id="textbox1" onFocus="nextfield ='mercado';">
</td>
</tr>

<?
$buscamercado = mysql_query("select distinct mercado from n_orcamento order by 'mercado'");
$totalmercado = mysql_num_rows($buscamercado); $count = $totalmercado-1;
for($i=0; $i<$totalmercado; $i++) { $nomemercado = mysql_result($buscamercado,$i,"mercado"); $palavrasmercado.="'$nomemercado'";
if($i<$count) { $palavrasmercado.=","; } }
?>
<tr>
<td class=right > Mercado </td>
<td class=left>
<input class=left name=mercado maxLength=10 size=10 value="<?echo $mercado?>"
onKeyUp="checkList(this,arvoremercado)" id="textbox2" onFocus="nextfield ='contato';">
<?/*Agrícola / Cerâmica / Conforto / Hvac / Industrial*/?>
</td>
</tr>

<?
$buscacontato = mysql_query("select distinct contato from n_orcamento order by 'contato'");
$totalcontato = mysql_num_rows($buscacontato); $count = $totalcontato-1;
for($i=0; $i<$totalcontato; $i++) { $nomecontato = mysql_result($buscacontato,$i,"contato"); $palavrascontato.="'$nomecontato'";
if($i<$count) { $palavrascontato.=","; } }
?>
<tr>
<td class=right > Contato </td>
<td class=left>
<input  class=left name=contato maxLength=30 size=30 value="<?echo $contato?>"
onKeyUp="checkList(this,arvorecontato)" id="textbox3" onFocus="nextfield ='referencia';" >
</td></tr>

<?
$buscareferencia = mysql_query("select distinct referencia from n_orcamento order by 'referencia'");
$totalreferencia = mysql_num_rows($buscareferencia); $count = $totalreferencia-1;
for($i=0; $i<$totalreferencia; $i++) { $nomereferencia = mysql_result($buscareferencia,$i,"referencia"); $palavrasreferencia.="'$nomereferencia'";
if($i<$count) { $palavrasreferencia.=","; } }
?>
<tr>
<td class=right > Referencia / Obra </td>
<td class=left>
<input  class=left name=referencia maxLength=30 size=30 value="<?echo $referencia?>"
onKeyUp="checkList(this,arvorereferencia)" id="textbox4" onFocus="nextfield ='uf';" >
</td></tr>

<?
$buscauf = mysql_query("select distinct uf from n_orcamento order by 'uf'");
$totaluf = mysql_num_rows($buscauf); $count = $totaluf-1;
for($i=0; $i<$totaluf; $i++) { $nomeuf = mysql_result($buscauf,$i,"uf"); $palavrasuf.="'$nomeuf'";
if($i<$count) { $palavrasuf.=","; } }
?>
<tr>
<td class=right > UF </td>
<td class=left>
<input class=left name=uf maxLength=2 size=2 value="<?echo $uf ?>"
onKeyUp="checkList(this,arvoreuf)" id="textbox5" onFocus="nextfield ='representante';" >
</td></tr>

<?
$buscarepresentante = mysql_query("select distinct representante from n_orcamento order by 'representante'");
$totalrepresentante = mysql_num_rows($buscarepresentante); $count = $totalrepresentante-1;
for($i=0; $i<$totalrepresentante; $i++) { $nomerepresentante = mysql_result($buscarepresentante,$i,"representante"); $palavrasrepresentante.="'$nomerepresentante'";
if($i<$count) { $palavrasrepresentante.=","; } }
?>
<tr>
<td class=right > Representante </td>
<td class=left><input class=left name=representante maxLength=40 size=40 value="<?echo $representante ?>"
onKeyUp="checkList(this,arvorerepresentante)" id="textbox6"  onFocus="nextfield ='valor';" ></td></tr>

<tr>
<td class=right > Valor </td>
<td class=left><input class=left name=valor maxLength=6 size=6 value="<?echo $valor ?>"
onkeypress="return validaConteudo(event,this);" onFocus="nextfield ='insere';"></td></tr>

<?/*
<tr>
<td class=right > Data </td>
<td class=left>*/?>
<input class=nedita_center type=hidden readonly name=data maxLength=12 size=12 value=<?echo $datafinal ?> >
<?/*</td></tr>*/?>

<?/*
<tr>
<td class=right > Período </td>
<td class=left>*/?>
<input class=nedita_center type=hidden readonly name=periodo maxLength=5 size=5 value=<?echo $dataperiodo ?> >
<?/*</td></tr>*/?>

<?/*
<tr>
<td class=right > Usuário </td>
<td class=left>*/?>
<input class=nedita_center type=hidden readonly name=usuario maxLength=10 size=10 value="<?echo $nome_usuario?>">
<?/*</td></tr>*/?>
</td></table>

<br>
<br>
<table class=sem_borda width=100% align="center">
<tr><td>
<input class="botao1" name="insere" type="button" value="Insere" onclick="javascript:Inserir()" onFocus="nextfield ='done';">
</td></tr></table>

</td></table></form>
</body>
</html>

<script>
var arvorecliente = new Array(<?= $palavrascliente ?>);
var arvorecontato = new Array(<?= $palavrascontato ?>);

var arvorereferencia = new Array(<?= $palavrasreferencia ?>);

var arvorerepresentante = new Array(<?= $palavrasrepresentante ?>);
var arvoremercado = new Array(<?= $palavrasmercado ?>);
var arvoreuf = new Array(<?= $palavrasuf ?>);

document.write('<style type="text/css">'+
	  '#listHolder{position:absolute;border:0;}'+
	  '.list{font-family:verdana;font-size:10;color:#000000;background:;}'+
	 '<\/style>')
</script>
