<? 
include "valida_sessao.php" ; include "config_orcamento.php";


// data e periodo do cadastro
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
<title> Alterar Orçamentos </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" src="funcoes/geral.js"></script>
<script language="JavaScript" src="funcoes/enter.js"></script>
<script language="JavaScript" src="funcoes/moeda.js"></script>

<script language="JavaScript" src="funcoes/calendario.js"></script>

<script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
	documento.value += texto.substring(0,1);
  }
  
}
</script>
</head>
<body>

<?

$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {
$libinserir = $linha["libinserir"]; $libalterar = $linha["libalterar"]; $libexcluir = $linha["libexcluir"];

$libn_orc = $linha["libn_orc"];
$libcliente = $linha["libcliente"];
$libmercado = $linha["libmercado"];
$libcontato = $linha["libcontato"];
$libreferencia = $linha["libreferencia"];
$libuf = $linha["libuf"];
$libdata = $linha["libdata"]; 
$libdataalterada = $linha["libdataalterada"];
$libvalor = $linha["libvalor"];
$librepresentante = $linha["librepresentante"];
$libperiodo = $linha["libperiodo"]; 
$libperiodoalterado = $linha["libperiodoalterado"];
$libusuario = $linha["libusuario"]; 
$libusuarioalterado = $linha["libusuarioalterado"];

$libtempo = $linha["libtempo"];
$libalteratempo = $linha["libalteratempo"];

$libdatainicio = $linha["libdatainicio"]; 
$libhorainicio = $linha["libhorainicio"];
$libdatafim = $linha["libdatafim"]; 
$libhorafim = $linha["libhorafim"];
}


$sql = "SELECT * FROM n_orcamento WHERE n_orc='$fn_orc'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {
$n_orc = $linha["n_orc"]; 
$cliente = $linha["cliente"]; 
$mercado = $linha["mercado"];
$contato = $linha["contato"]; 
$referencia = $linha["referencia"]; 
$uf = $linha["uf"];
$representante = $linha["representante"]; 
$valor = $linha["valor"];

$datainicio = $linha["datainicio"]; 
$horainicio = $linha["horainicio"];

$tempo_seg = $linha["tempo_seg"]; 

}
?>

<form action="" method="post" name="n_orcamento">

<table class=sem_borda width="500" align="center">
<td>

<table class=titulo width=100% align="center" height="25"><tr><td> ALTERAR ORÇAMENTO </td></tr></table>
<br>

<table class=sem_borda width=100% align="center">
<tr>
<td class=right > N° Orç </td>
<td class=left><input class=nedita_left type=text readonly name=n_orc maxLength=10 size=10 value="<?echo $n_orc?>" >
</td></tr>

<?
$buscacliente = mysql_query("select distinct cliente from n_orcamento order by 'cliente'");
$totalcliente = mysql_num_rows($buscacliente); $count = $totalcliente-1;
for($i=0; $i<$totalcliente; $i++) { $nomecliente = mysql_result($buscacliente,$i,"cliente"); $palavrascliente_novo.="'$nomecliente'";
if($i<$count) { $palavrascliente_novo.=","; } }
?>
<td class=right > Cliente </td>
<td class=left>
<input class=left name=cliente_novo maxLength=40 size=40 value="<?echo $cliente?>"
onKeyUp="checkList(this,arvorecliente_novo);" id="textbox1" onFocus="nextfield ='mercado';">
</td>
</tr>

<?
$buscamercado = mysql_query("select distinct mercado from n_orcamento order by 'mercado'");
$totalmercado = mysql_num_rows($buscamercado); $count = $totalmercado-1;
for($i=0; $i<$totalmercado; $i++) { $nomemercado = mysql_result($buscamercado,$i,"mercado"); $palavrasmercado_novo.="'$nomemercado'";
if($i<$count) { $palavrasmercado_novo.=","; } }
?>
<tr>
<td class=right > Mercado </td>
<td class=left>
<input class=left name=mercado_novo maxLength=10 size=10 value="<?echo $mercado?>"
onKeyUp="checkList(this,arvoremercado_novo)" id="textbox2" onFocus="nextfield ='contato';">
</td>
</tr>

<?
$buscacontato = mysql_query("select distinct contato from n_orcamento order by 'contato'");
$totalcontato = mysql_num_rows($buscacontato); $count = $totalcontato-1;
for($i=0; $i<$totalcontato; $i++) { $nomecontato = mysql_result($buscacontato,$i,"contato"); $palavrascontato_novo.="'$nomecontato'";
if($i<$count) { $palavrascontato_novo.=","; } }
?>
<tr>
<td class=right > Contato </td>
<td class=left>
<input  class=left name=contato_novo maxLength=30 size=30 value="<?echo $contato?>"
onKeyUp="checkList(this,arvorecontato_novo)" id="textbox3" onFocus="nextfield ='referencia';" >
</td></tr>

<?
$buscareferencia = mysql_query("select distinct referencia from n_orcamento order by 'referencia'");
$totalreferencia = mysql_num_rows($buscareferencia); $count = $totalreferencia-1;
for($i=0; $i<$totalreferencia; $i++) { $nomereferencia = mysql_result($buscareferencia,$i,"referencia"); $palavrasreferencia_novo.="'$nomereferencia'";
if($i<$count) { $palavrasreferencia_novo.=","; } }
?>
<tr>
<td class=right > Referência / Obra </td>
<td class=left>
<input class=left name=referencia_novo maxLength=40 size=40 value="<?echo $referencia ?>"
onKeyUp="checkList(this,arvorereferencia_novo)" id="textbox4" onFocus="nextfield ='uf';" >
</td></tr>

<?
$buscauf = mysql_query("select distinct uf from n_orcamento order by 'uf'");
$totaluf = mysql_num_rows($buscauf); $count = $totaluf-1;
for($i=0; $i<$totaluf; $i++) { $nomeuf = mysql_result($buscauf,$i,"uf"); $palavrasuf_novo.="'$nomeuf'";
if($i<$count) { $palavrasuf_novo.=","; } }
?>
<tr>
<td class=right > UF </td>
<td class=left>
<input class=left name=uf_novo maxLength=2 size=2 value="<?echo $uf ?>"
onKeyUp="checkList(this,arvoreuf_novo)" id="textbox5" onFocus="nextfield ='representante';" >
</td></tr>

<?
$buscarepresentante = mysql_query("select distinct representante from n_orcamento order by 'representante'");
$totalrepresentante = mysql_num_rows($buscarepresentante); $count = $totalrepresentante-1;
for($i=0; $i<$totalrepresentante; $i++) { $nomerepresentante = mysql_result($buscarepresentante,$i,"representante"); $palavrasrepresentante_novo.="'$nomerepresentante'";
if($i<$count) { $palavrasrepresentante_novo.=","; } }
?>
<tr>
<td class=right > Representante </td>
<td class=left><input class=left name=representante_novo maxLength=40 size=40 value="<?echo $representante ?>"
onKeyUp="checkList(this,arvorerepresentante_novo)" id="textbox6"  onFocus="nextfield ='valor';" ></td></tr>

<tr>
<td class=right > Valor </td>
<td class=left>
<input class=left name=valor_novo maxLength=10 size=10 value="<? echo number_format($valor,2,',','.'); ?>"
onkeypress="return validaConteudo(event,this);" onFocus="nextfield ='data_inicio_novo';"></td></tr>


<? 

// -----------------------------    data inicio -------------------------------------------   
$dia_inicio = substr($datainicio, -2); 
$mes_inicio = substr($datainicio, -5,2); 
$ano_inicio = substr($datainicio, -10,4);
$datainicio = ($dia_inicio."/".$mes_inicio."/".$ano_inicio);
// -----------------------------    data inicio ------------------------------------------- 

		if ( $libalteratempo == "" ) 
	{ // permissão para alterar a data inicio e hora 

?>
<tr>
<td class=right > Data Inicial </td>
<td class=left>
<input name=datainicio_novo maxLength=10 size=11 value=<?echo $datainicio ?> OnKeyPress="formatar('##/##/####', this)" onFocus="nextfield ='hora_inicio_novo';"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.n_orcamento.datainicio_novo);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a>

Hora Inicial
<input class=left type=text name=horainicio_novo maxLength=8 size=8 value=<?echo $horainicio ?> OnKeyPress="formatar('##:##:##', this)" onFocus="nextfield ='alterar';">
</td></tr>

<? 
	} 
		else 

	{ 
?>
<input class=left type=hidden name=datainicio_novo readonly maxLength=10 size=11 value=<?echo $datainicio ?> >
<input class=left type=hidden name=horainicio_novo readonly maxLength=8 size=8 value=<?echo $horainicio ?> >
 
 
<? } // permissão para alterar a data inicio e hora ?>

<input class=left type=hidden name=tempo_seg_novo readonly maxLength=8 size=8 value=<?echo $tempo_seg ?> >

<?/*
<tr>
<td class=right > Data Alterada </td>
<td class=left>*/?>
<input class=nedita_center type=hidden readonly name=data_novo maxLength=12 size=12 value=<?echo $datafinal ?> >
<?/*</td></tr>*/?>

<?/*
<tr>
<td class=right > Período Alterado</td>
<td class=left>*/?>
<input class=nedita_center type=hidden readonly name=periodo_novo maxLength=5 size=5 value=<?echo $dataperiodo ?> >
<?/*</td></tr>*/?>

<?/*
<tr>
<td class=right > Usuário Alterado </td>
<td class=left>*/?>
<input class=nedita_center type=hidden readonly name=usuario_novo maxLength=10 size=10 value="<?echo $nome_usuario?>">
<?/*</td></tr>*/?>
</td></table>

<br>
<br>
<table class=sem_borda width=100% align="center">
<tr><td><? /* BOTÃO ALTERAR */ ?>
<input class="botao1" name="alterar" type="button" value="Alterar" onclick="Alterar();" onFocus="nextfield ='done';">
</td></tr></table>

</td>
</table>
</form>

<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="calendario/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>


</body>
</html>

<script>
var arvorecliente_novo = new Array(<?= $palavrascliente_novo ?>);
var arvorereferencia_novo = new Array(<?= $palavrasreferencia_novo ?>);
var arvorerepresentante_novo = new Array(<?= $palavrasrepresentante_novo ?>);
var arvoremercado_novo = new Array(<?= $palavrasmercado_novo ?>);
var arvoreuf_novo = new Array(<?= $palavrasuf_novo ?>);
var arvorecontato_novo = new Array(<?= $palavrascontato_novo ?>);

document.write('<style type="text/css">'+
					  '#listHolder{position:absolute;border:0;}'+
					  '.list{font-family:verdana;font-size:10;color:#000000;background:;}'+
			 '<\/style>')
</script>
