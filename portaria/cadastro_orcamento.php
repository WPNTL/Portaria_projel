<? 
include "valida_sessao.php" ; include "config_portaria.php";

//data e periodo do cadastro
$b = date('d'); 
$c = date('n'); 
$d = date('Y'); 
if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; 
$datahoje = $b."/".$c."/".$d; 
$dataperiodo = $c."/".$d; 

$hora = date('H:i');
?>

<html>
<head>
<title> Cadastro Registro Portaria </title>
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
<tr><td class=titulo colspan="2" height="25" align="center"> NOVO REGISTRO PORTARIA </td></tr></table>
<br>

<table class=sem_borda width=100% align="center">

<tr>
<td class=right > Data Entrada </td>
<td class=left>
<input class=nedita_left name=data_entrada maxLength=12 size=12 value="<?echo $datahoje?>"
id="textbox1" onFocus="nextfield ='hora_entrada';">
</td>
</tr>

<tr>
<td class=right > Hora Entrada </td>
<td class=left>  
<input class=nedita_left name=hora_entrada maxLength=5 size=5 value="<?echo $hora?>"
id="textbox2" onFocus="nextfield ='destino';">
</td>
</tr>

<tr>
<td class=right > Destino </td>
<td class=left>
<select name=destino onFocus="nextfield ='tipo';">
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
<select name=tipo onFocus="nextfield ='empresa';">
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
<input class=left name=empresa maxLength=50 size=20 value="<?echo $empresa?>"
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
<input class=left name=nome maxLength=50 size=20 value="<?echo $nome?>"
onKeyUp="checkList(this,arvorenome);" id="textbox4" onFocus="nextfield ='mercado';" onchange="this.value = this.value.toUpperCase();">
</td>

<?
$query = "SELECT rg FROM controle WHERE nome='$nome' ORDER BY 'id' LIMIT 1";

$result = mysql_query($query);
while ($dados = @mysql_fetch_array($result)) {
	
$brg = $dados["rg"]; 
} 
/*<td class=left >
<input type=hidden class="botao1" name="buscar" type="button" value="Buscar RG" onClick="javascript:Atualizar3();" onFocus="nextfield ='rg';">
<input type=hidden class=left name=rg maxLength=12 size=12 value="<?echo $brg;?>"
id="textbox5" onFocus="nextfield ='veiculo';" onchange="this.value = this.value.toUpperCase();">
</td>*/
?>
<td class=left>
<input class="botao1" name="buscar" type="button" value="Buscar RG" onClick="javascript:Atualizar3();" onFocus="nextfield ='rg';">
<input class=left name=rg maxLength=12 size=12 value="<?echo $brg;?>"
id="textbox5" onFocus="nextfield ='veiculo';" onchange="this.value = this.value.toUpperCase();">
</td>
</tr>

<tr>
<td class=right > Veiculo </td>
<td class=left>
<select name=veiculo onFocus="nextfield ='placa';">
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
<input  class=left name=placa maxLength=8 size=8 value="<?echo $placa?>"
onKeyUp="checkList(this,arvoreplaca)" id="textbox6" onchange="this.value = this.value.toUpperCase();">
</td>
</tr>

<?
$buscacr = mysql_query("select distinct cr from controle order by 'cr'");
$totalcr = mysql_num_rows($buscacr); $count = $totalcr-1;
for($i=0; $i<$totalcr; $i++) { $nomecr = mysql_result($buscacr,$i,"cr"); $palavrascr.="'$nomecr'";
if($i<$count) { $palavrascr.=","; } }
?>
<tr>
<td class=right > CR </td>
<td class=left> 
<input  class=left name=cr maxLength=8 size=8 value="<?echo $cr?>"
onKeyUp="checkList(this,arvorecr)" id="textbox6" onchange="this.value = this.value.toUpperCase();">
</td>
</tr>

<?/*
<tr>
<td class=right > Período </td>
<td class=left>*/?>
<input class=nedita_center type=hidden readonly name=periodo maxLength=5 size=5 value="<?echo $dataperiodo?>" >
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
var arvorenome = new Array(<?= $palavrasnome ?>);
var arvoreempresa = new Array(<?= $palavrasempresa ?>);
var arvoreplaca = new Array(<?= $palavrasplaca ?>);
var arvorecr = new Array(<?= $palavrascr ?>);

document.write('<style type="text/css">'+
	  '#listHolder{position:absolute;border:0;}'+
	  '.list{font-family:verdana;font-size:10;color:#000000;background:;}'+
	 '<\/style>')
</script>
