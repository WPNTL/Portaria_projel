<? 
include "valida_sessao.php" ; include "config_portaria.php";


// data e periodo do cadastro
$b = date('d'); 
$c = date('n'); 
$d = date('Y'); 
if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; 
$datahoje = $b."/".$c."/".$d; 
$data_periodo = $c."/".$d;

$hora = date('H:i');
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
$libinserir = $linha["libinserir"]; 
$libalterar = $linha["libalterar"]; 
$libexcluir = $linha["libexcluir"];

$libid = $linha["libid"];

$libperiodo = $linha["libperiodo"]; 
$libperiodoalterado = $linha["libperiodoalterado"];
$libusuario = $linha["libusuario"]; 
$libusuarioalterado = $linha["libusuarioalterado"];

}


$sql = "SELECT * FROM controle WHERE id='$id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {

$id = $linha["id"];
 
$data_entrada = $linha["data_entrada"]; 
$hora_entrada = $linha["hora_entrada"];

$destino = $linha["destino"];
$tipo = $linha["tipo"]; 
$empresa = $linha["empresa"];
$nome = $linha["nome"];
$rg = $linha["rg"]; 

$veiculo = $linha["veiculo"];
$placa = $linha["placa"]; 
$cr = $linha["cr"];
$n_nota = $linha["n_nota"];

$bperiodo = $linha["periodo"]; 
$bperiodoalterado = $linha["periodoalterado"];

$data_saida = $linha["data_saida"]; 
$hora_saida = $linha["hora_saida"];

$obs = $linha["obs"];

$busuario = $linha["usuario"]; 
$busuarioalterado = $linha["usuarioalterado"];



}
?>

<form action="" method="post" name="n_orcamento">

<table class=sem_borda width="500" align="center">
<td>

<table class=titulo width=100% align="center" height="25"><tr><td> ALTERAR REGISTRO PORTARIA </td></tr></table>
<br>

<table class=sem_borda width=100% align="center">

<tr>
<td class=right > N° </td>
<td class=left><input class=nedita_left type=text readonly name=id maxLength=10 size=10 value="<?echo $id?>" >
</td></tr>

<tr>
<td class=right > Data Entrada </td>
<td class=left>
<input class=nedita_left name=data_entrada maxLength=12 size=12 value="<?echo $data_entrada?>"
id="textbox1" onFocus="nextfield ='hora_entrada';">
</td>
</tr>

<tr>
<td class=right > Hora Entrada </td>
<td class=left>  
<input class=nedita_left name=hora_entrada maxLength=5 size=5 value="<?echo $hora_entrada?>"
id="textbox2" onFocus="nextfield ='destino';">
</td>
</tr>

<tr>
<td class=right > Destino </td>
<td class=left>
<select name=destino_novo onFocus="nextfield ='tipo';">
<option value='' <? echo ($destino==''?"SELECTED":""); ?> >  </option>
<option value='ALMOX' <? echo ($destino=='ALMOX'?"SELECTED":""); ?> > ALMOX </option>
<option value='BALANC' <? echo ($destino=='BALANC'?"SELECTED":""); ?> > BALANC </option>
<option value='CALD.1' <? echo ($destino=='CALD.1'?"SELECTED":""); ?> > CALD.1 </option>
<option value='CALD.2' <? echo ($destino=='CALD.2'?"SELECTED":""); ?> > CALD.2 </option>
<option value='COMPRAS' <? echo ($destino=='COMPRAS'?"SELECTED":""); ?> > COMPRAS </option>
<option value='CORTE' <? echo ($destino=='CORTE'?"SELECTED":""); ?> > CORTE </option>
<option value='CUSTOS' <? echo ($destino=='CUSTOS'?"SELECTED":""); ?> > CUSTOS </option>
<option value='DIREÇÃO' <? echo ($destino=='DIREÇÃO'?"SELECTED":""); ?> > DIREÇÃO </option>
<option value='ENGENHARIA' <? echo ($destino=='ENGENHARIA'?"SELECTED":""); ?> > ENGENHARIA </option>
<option value='EXPEDIÇÃO' <? echo ($destino=='EXPEDIÇÃO'?"SELECTED":""); ?> > EXPEDIÇÃO </option>
<option value='FERRAMENTARIA' <? echo ($destino=='FERRAMENTARIA'?"SELECTED":""); ?> > FERRAMENTARIA </option>
<option value='FINANCEIRO' <? echo ($destino=='FINANCEIRO'?"SELECTED":""); ?> > FINANCEIRO </option>
<option value='GERENTE' <? echo ($destino=='GERENTE'?"SELECTED":""); ?> > GERENTE </option>
<option value='LAB.' <? echo ($destino=='LAB.'?"SELECTED":""); ?> > LAB. </option>
<option value='MONTAGEM' <? echo ($destino=='MONTAGEM'?"SELECTED":""); ?> > MONTAGEM </option>
<option value='PATIO' <? echo ($destino=='PATIO'?"SELECTED":""); ?> > PATIO </option>
<option value='PCP' <? echo ($destino=='PCP'?"SELECTED":""); ?> > PCP </option>
<option value='QUALIDADE' <? echo ($destino=='QUALIDADE'?"SELECTED":""); ?> > QUALIDADE </option>
<option value='REFEITÓRIO' <? echo ($destino=='REFEITÓRIO'?"SELECTED":""); ?> > REFEITÓRIO </option>
<option value='RH' <? echo ($destino=='RH'?"SELECTED":""); ?> > RH </option>
<option value='ROTOR LL' <? echo ($destino=='ROTOR LL'?"SELECTED":""); ?> > ROTOR LL </option>
<option value='ROTOR SIR' <? echo ($destino=='ROTOR SIR'?"SELECTED":""); ?> > ROTOR SIR </option>
<option value='VENDAS' <? echo ($destino=='VENDAS'?"SELECTED":""); ?> > VENDAS </option>
</select>
</td>
</tr>

<tr>
<td class=right > Tipo </td>
<td class=left> 
<select name=tipo_novo onFocus="nextfield ='empresa';">
<option value='' <? echo ($tipo==''?"SELECTED":""); ?> >  </option>
<option value='COLETA' <? echo ($tipo=='COLETA'?"SELECTED":""); ?> > COLETA </option>
<option value='ENTREGA' <? echo ($tipo=='ENTREGA'?"SELECTED":""); ?> > ENTREGA </option>
<option value='VISITA' <? echo ($tipo=='VISITA'?"SELECTED":""); ?> > VISITA </option>
<option value='PRES. SERV.' <? echo ($tipo=='PRES. SERV.'?"SELECTED":""); ?> > PRES. SERV. </option>
</select>
</td>
</tr>

<tr>
<?
$buscaempresa=mysql_query("select distinct empresa from controle order by 'empresa'");
$totalempresa=mysql_num_rows($buscaempresa);
$count=$totalempresa-1;
for($i=0;$i<$totalempresa;$i++) {$nomeempresa=mysql_result($buscaempresa,$i,"empresa");$palavrasempresa.="'$nomeempresa'";
if($i<$count) { $palavrasempresa.=","; }   }
?>
<td class=right > Empresa </td>
<td class=left>
<input class=left name=empresa_novo maxLength=50 size=20 value="<?echo $empresa?>"
onKeyUp="checkList(this,arvoreempresa);" id="textbox3" onFocus="nextfield ='nome';" onchange="this.value = this.value.toUpperCase();">
</td>
</tr>


<tr>
<?
$buscanome=mysql_query("select distinct nome from controle order by 'nome'");
$totalnome=mysql_num_rows($buscanome);
$count=$totalnome-1;
for($i=0;$i<$totalnome;$i++) {$nomenome=mysql_result($buscanome,$i,"nome");$palavrasnome.="'$nomenome'";
if($i<$count) { $palavrasnome.=","; }   }
?>
<td class=right > Nome </td>
<td class=left>
<input class=left name=nome_novo maxLength=20 size=20 value="<?echo $nome?>" 
onKeyUp="checkList(this,arvorenome);" id="textbox4" onFocus="nextfield ='rg';" onchange="this.value = this.value.toUpperCase(); retornadado( this.value );">
</td>

<tr>
<td class=right > RG </td>
<td class=left> 
<input class=left name=rg_novo maxLength=12 size=12 value="<?echo $rg?>"
id="textbox5" onFocus="nextfield ='veiculo';" onchange="this.value = this.value.toUpperCase();">
</td>
</tr>

<tr>
<td class=right > Veiculo </td>
<td class=left>
<select name=veiculo_novo onFocus="nextfield ='placa';">
<option value='' <? echo ($veiculo==''?"SELECTED":""); ?> >  </option>
<option value='CAMINHÃO' <? echo ($veiculo=='CAMINHÃO'?"SELECTED":""); ?> > CAMINHÃO </option>
<option value='CARRO' <? echo ($veiculo=='CARRO'?"SELECTED":""); ?> > CARRO </option>
<option value='MOTO' <? echo ($veiculo=='MOTO'?"SELECTED":""); ?> > MOTO </option>
<option value='TRAÇÃO ANIMAL' <? echo ($veiculo=='TRAÇÃO ANIMAL'?"SELECTED":""); ?> > TRAÇÃO ANIMAL </option>
<option value='A PÉ' <? echo ($veiculo=='A PÉ'?"SELECTED":""); ?> > A PÉ </option>
</select>
</td>
</tr>

<?
$buscaplaca = mysql_query("select distinct placa from controle order by 'placa'");
$totalplaca = mysql_num_rows($buscaplaca); $count = $totalplaca-1;
for($i=0; $i<$totalplaca; $i++) { $nomeplaca = mysql_result($buscaplaca,$i,"placa"); $palavrasplaca.="'$nomeplaca'";
if($i<$count) { $palavrasplaca.=","; } }
?>
<tr>
<td class=right > Placa </td>
<td class=left> 
<input  class=left name=placa_novo maxLength=8 size=8 value="<?echo $placa?>"
onKeyUp="checkList(this,arvoreplaca)" id="textbox6" onFocus="nextfield ='referencia';" onchange="this.value = this.value.toUpperCase();">
</td>
</tr>

<tr>
<td class=right > CR </td>
<td class=left> 
<input  class=left name=cr_novo maxLength=8 size=8 value="<?echo $cr?>"
onKeyUp="checkList(this,arvorecr)" id="textbox6" onFocus="nextfield ='referencia';" onchange="this.value = this.value.toUpperCase();">
</td>
</tr>

<?
$buscan_nota = mysql_query("select distinct n_nota from controle order by 'n_nota'");
$totaln_nota = mysql_num_rows($buscan_nota); $count = $totaln_nota-1;
for($i=0; $i<$totaln_nota; $i++) { $nomen_nota = mysql_result($buscan_nota,$i,"n_nota"); $palavrasn_nota.="'$nomen_nota'";
if($i<$count) { $palavrasn_nota.=","; } }
?>
<tr>
<td class=right > Nº Nota </td>
<td class=left> 
<input  class=left name=n_nota maxLength=40 size=8 value="<?echo $n_nota?>"
onKeyUp="checkList(this,arvoren_nota)" id="textbox7" onFocus="nextfield ='obs';" onchange="this.value = this.value.toUpperCase();">
</td>
</tr>

<?
$buscaobs = mysql_query("select distinct obs from controle order by 'obs'");
$totalobs = mysql_num_rows($buscaobs); $count = $totalobs-1;
for($i=0; $i<$totalobs; $i++) { $nomeobs = mysql_result($buscaobs,$i,"obs"); $palavrasobs.="'$nomeobs'";
if($i<$count) { $palavrasobs.=","; } }
?>
<tr>
<td class=right > Obs </td>
<td class=left> 
<textarea name=obs rows=2 cols=25 id="textbox8" onchange="this.value = this.value.toUpperCase();"><?echo $obs;?></textarea>
</td>
</tr>


<tr>
<td class=right > Data Saída </td>
<td class=left>
<? if ($data_saida == "") { ?> 
<input name=data_saida maxLength=10 size=11 value="<?echo $datahoje?>" OnKeyPress="formatar('##/##/####', this)" onFocus="nextfield ='hora_saida';"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.n_orcamento.data_saida);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a>
<? } else { ?>
<input name=data_saida maxLength=10 size=11 value="<?echo $data_saida?>" OnKeyPress="formatar('##/##/####', this)" onFocus="nextfield ='hora_saida';"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.n_orcamento.data_saida);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a> 
<? } ?>
</td>
</tr>

<tr>
<td class=right > Hora Saída </td>
<td class=left>  
<? if ($hora_saida == "") { ?> 
<input class=left type=text name=hora_saida maxLength=8 size=8 value="<?echo $hora?>" OnKeyPress="formatar('##:##:##', this)" onFocus="nextfield ='alterar';">
<? } else { ?>
<input class=left type=text name=hora_saida maxLength=8 size=8 value="<?echo $hora_saida?>" OnKeyPress="formatar('##:##:##', this)" onFocus="nextfield ='alterar';">
<? } ?>
</td>
</tr>

<?/*
<tr>
<td class=right > Período Alterado</td>
<td class=left>*/?>
<input class=nedita_center type=hidden readonly name=periodo_novo maxLength=5 size=5 value="<?echo $periodo_novo ?>">
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
var arvorenome = new Array(<?= $palavrasnome ?>);
var arvoreempresa = new Array(<?= $palavrasempresa ?>);
var arvoreplaca = new Array(<?= $palavrasplaca ?>);
var arvoreobs = new Array(<?= $palavrasobs ?>);

document.write('<style type="text/css">'+
					  '#listHolder{position:absolute;border:0;}'+
					  '.list{font-family:verdana;font-size:10;color:#000000;background:;}'+
			 '<\/style>')
</script>
