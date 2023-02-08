<? include "valida_sessao.php" ; include "config_portaria.php";
$b = date('d'); 
$c = date('n'); 
$d = date('Y'); 
if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; 
$datahoje = $b."/".$c."/".$d; 
$dataperiodo = $c."/".$d; ?>

<html>
<head>
<title> Consulta de Or�amentos </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" src="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
</head>
<body>

<div id="overDiv" style="position:absolute; visibility:hide; z-index:1;; width: 160px; height: 19px"></div>

<?
$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("N�o foi poss�vel realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {
$libinserir = $linha["libinserir"]; 
$libalterar = $linha["libalterar"]; 
$libexcluir = $linha["libexcluir"];

$libid = $linha["libid"];
$libdestino = $linha["libdestino"];
$libtipo = $linha["libtipo"]; 
$libempresa = $linha["libempresa"];
$libnome = $linha["libnome"]; 
$librg = $linha["librg"];
$libveiculo = $linha["libveiculo"]; 
$libplaca = $linha["libplaca"];
$libcr = $linha["libcr"];

$libn_nota = $linha["libn_nota"]; 
$libobs = $linha["libobs"];

$libperiodo = $linha["libperiodo"]; 
$libperiodoalterado = $linha["libperiodoalterado"];

$libusuario = $linha["libusuario"]; 
$libusuarioalterado = $linha["libusuarioalterado"];

$libdata_entrada = $linha["libdata_entrada"]; 
$libhora_entrada = $linha["libhora_entrada"];
$libdata_saida = $linha["libdata_saida"]; 
$libhora_saida = $linha["libhora_saida"];

}
?>

<form action="" method="post" name="n_orcamento">


<table class=sem_borda width=100% align="center">
<TR> 

<? /* ID */ ?>
<? if ($libid == "" and $checkid == "") { ?>
<td class=titulo > Numero </td>
<? } ?>

<? /* DATA ENTRADA */ ?>
<? if ($libdata_entrada == "" and $checkdata_entrada == "") { ?>
<td class=titulo > Data Entr. </td>
<? } ?>

<? /* HORA ENTRADA */ ?>
<? if ($libhora_entrada == "" and $checkhora_entrada == "") { ?>
<td class=titulo > Hora Entr. </td>
<? } ?>

<? /* DESTINO */ ?>
<? if ($libdestino == "" and $checkdestino == "") { ?>
<td class=titulo > Destino  </td>
<? } ?>

<? /* TIPO */ ?>
<? if ($libtipo == "" and $checktipo == "") {?>
<td class=titulo > Tipo </td>
<? } ?>

<? /* EMPRESA */ ?>
<? if ($libempresa == "" and $checkempresa == "") {?>
<td class=titulo > Empresa </td>
<? } ?>

<? /* NOME */ ?>
<? if ($libnome == "" and $checknome == "") {?>
<td class=titulo > Nome </td>
<? } ?>

<? /* RG */ ?>
<? if ($librg == "" and $checkrg == "") {?>
<td class=titulo > RG </td>
<? } ?>

<? /* VEICULO */ ?>
<? if ($libveiculo == "" and $checkveiculo == "") {?>
<td class=titulo > Veiculo </td>
<? } ?>

<? /* PLACA */ ?>
<? if ($libplaca == "" and $checkplaca == "") {?>
<td class=titulo > Placa </td>
<? } ?>

<? /* CR */ ?>
<? if ($libcr == "" and $checkcr == "") {?>
<td class=titulo > Crachá </td>
<? } ?>

<? /* N� NOTA */ ?>
<? if ($libn_nota == "" and $checkn_nota == "") {?>
<td class=titulo >  Num. Nota </td> 
<? } ?>

<? /* DATA SAIDA */ ?>
<? if ($libdata_saida == "" and $checkdata_saida == "") { ?>
<td class=titulo > Data de Saída </td>
<? } ?>

<? /* HORA SAIDA */ ?>
<? if ($libhora_saida == "" and $checkhora_saida == "") { ?>
<td class=titulo > Hora de Saída </td>
<? } ?>

<? /* OBS */ ?>
<? if ($libobs == "" and $checkobs == "") { ?>
<td class=titulo > Obs. </td>
<? } ?>

<? /* PERIODO */ ?>
<? if ($libperiodo == "" and $checkperiodo == "") { ?>
<td class=titulo > Periodo </td>
<? } ?>

<? /* EXCLUIR */ ?>
<? if ($libexcluir == "sim" ) {?>
<td class=titulo > Excluir </td>
<? } ?>

</tr>

<? /* --------------------  INICIO DOS BOTOES DE SELEC�O (FILTROS)  -----------------------------  */  ?>
<?
if ( $fid <> "") {$fiddb = "and id='$fid'";} else {$fiddb = "";}
/*if ( $fdata_entrada <> "" ) {$fdata_entradadb = "and data_entrada='$fdata_entrada'";} else {$fdata_entradadb = "";}*/
if ( $fhora_entrada <> "" ) {$fhora_entradadb = "and hora_entrada='$fhora_entrada'";} else {$fhora_entradadb = "";}
if ( $fdestino <> "" ) {$fdestinodb = "and destino='$fdestino'";} else {$fdestinodb = "";}
if ( $ftipo <> "" ) {$ftipodb = "and tipo='$ftipo'";} else {$ftipodb = "";}
if ( $fempresa <> "" ) {$fempresadb = "and empresa='$fempresa'";} else {$fempresadb = "";}
if ( $fnome <> "" ) {$fnomedb = "and nome='$fnome'";} else {$fnomedb = "";}
if ( $frg <> "" ) {$frgdb = "and rg='$frg'";} else {$frgdb = "";}

if ( $fveiculo <> "" ) {$fveiculodb = "and veiculo='$fveiculo'";} else {$fveiculodb = "";}
if ( $fplaca <> "" ) {$fplacadb = "and placa='$fplaca'";} else {$fplacadb = "";}

if ( $fcr <> "" ) {$fcrdb = "and cr='$fcr'";} else {$fcrdb = "";}

if ( $fn_nota <> "" ) {$fn_notadb = "and n_nota='$fn_nota'";} else {$fn_notadb = "";}

/*if ( $fdata <> "" ) {$fdatadb = "and data='$fdata'";} else {$fdatadb = "";}*/
if ( $fdata_entrada == "" ) {$fdata_entradadb = "and data_entrada='$datahoje'"; $fdata_entrada = $datahoje; }
elseif ( $fdata_entrada <> "TODOS" ) {$fdata_entradadb = "and data_entrada='$fdata_entrada'";}
else {$fdata_entradadb = ""; }

if ( $fperiodo == "" ) {$fperiododb = "and periodo='$dataperiodo'"; $fperiodo = $dataperiodo; }
elseif ( $fperiodo <> "TODOS" ) {$fperiododb = "and periodo='$fperiodo'";}
else { $fperiododb = ""; }

if ( $fdata_saida <> "" ) {$fdata_saidadb = "and data_saida='$fdata_saida'";} else {$fdata_saidadb = "";}
if ( $fhora_saida <> "" ) {$fhora_saidadb = "and hora_saida='$fhora_saida'";} else {$fhora_saidadb = "";}

if ( $fobs <> "" ) {$fobsdb = "and obs='$fobs'";} else {$fobsdb = "";}

/*if ( $fperiodoalterado <> "" ) {$fperiodoalteradodb = "and periodoalterado='$fperiodoalterado'";} else {$fperiodoalteradodb = "";}

if ( $fusuario <> "" ) {$fusuariodb = "and usuario='$fusuario'";} else {$fusuariodb = "";}

if ( $fusuarioalterado <> "" ) {$fusuarioalteradodb = "and usuarioalterado='$fusuarioalterado'";} else {$fusuarioalteradodb = "";}

if ( $ftempo_total <> "" ) {$ftempo_totaldb = "and tempo_total='$ftempo_total'";} else {$ftempo_totaldb = "";}
*/
?>

<? /* --------------------  FIM DOS BOTOES DE SELEC�O (FILTROS)  -----------------------------  */  ?>

<? /* --------------------  INICIO DA CONSULTA  -----------------------------  */  ?>
<?
$QuantOrc = 0;
$query = "SELECT * FROM controle WHERE id>='0' $fiddb $fdata_entradadb $fhora_entradadb $fdestinodb $ftipodb $fempresadb $fnomedb $frgdb $fveiculodb $fplacadb $fcrdb $fn_notadb $fdata_saidadb $fhora_saidadb $fobsdb ORDER BY id";
$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) {
$id = $dados["id"];

$data_entrada = $dados["data_entrada"]; 
$hora_entrada = $dados["hora_entrada"];

$destino = $dados["destino"];
$tipo = $dados["tipo"]; 
$empresa = $dados["empresa"];
$nome = $dados["nome"];
$rg = $dados["rg"]; 

$veiculo = $dados["veiculo"];
$placa = $dados["placa"]; 
$cr = $dados["cr"];
$n_nota = $dados["n_nota"];

$bperiodo = $dados["periodo"]; 
$bperiodoalterado = $dados["periodoalterado"];

$data_saida = $dados["data_saida"]; 
$hora_saida = $dados["hora_saida"];

$obs = $dados["obs"];

$busuario = $dados["usuario"]; 
$busuarioalterado = $dados["usuarioalterado"];

?>
			<tr class=linha0 border-style: solid; border-width: 1;  
			onMouseOver="this.style.background='#99CCEA'; return true;" onMouseOut="this.style.background='#FFFFFF'; nd(); return true; nd();" >


<? /* NUMERO */ ?>
<? if ($libid == "" and $checkid == "") { ?>
<? if ($libalterar == "sim") { ?>
<td class=center_borda>
<input class="botao_inserir" type="button" name="altera" value="<?echo $id?>" onClick="javascript:void(open('altera_orcamento.php?id=<?echo$id?>','principal','scrollbars=yes'))"
onMouseOver="drc('',' Alterar - N�  <?echo"$id"?> '); return true;" onMouseOut="nd(); return true;">
<? } else { ?>
<input class="botao_inserir1" type="button" name="altera" value="<?echo $id?>" onMouseOver="drc('',' N� <?echo"$id"?> '); return true;" onMouseOut="nd(); return true;">
</td>
<? } } ?>

<? /* DATA ENTRADA */ ?>
<? if ($libdata_entrada == "" and $checkdata_entrada == "") { ?>
<td class=center_borda> 
<? echo "$data_entrada"; ?>
</td>
<? } ?>

<? /* HORA ENTRADA */ ?>
<? if ($libhora_entrada == "" and $checkhora_entrada == "") { ?>
<td class=center_borda> 
<? echo "$hora_entrada"; ?>
</td>
<? } ?>

<? /* DESTINO */ ?>
<? if ($libdestino == "" and $checkdestino == "") { ?>
<td class=center_borda> 
<? echo "$destino"; ?>
</td>
<? } ?>

<? /* TIPO */ ?>
<? if ($libtipo == "" and $checktipo == "") { ?>
<td class=center_borda> 
<? echo "$tipo"; ?>
</td>
<? } ?>

<? /* EMPRESA */ ?>
<? if ($libempresa == "" and $checkempresa == "") { ?>
<td class=center_borda> 
<? echo "$empresa"; ?>
</td>
<? } ?>

<? /* NOME */ ?>
<? if ($libnome == "" and $checknome == "") { ?>
<td class=center_borda> 
<? echo "$nome"; ?>
</td>
<? } ?>

<? /* RG */ ?>
<? if ($librg == "" and $checkrg == "") { ?>
<td class=center_borda> 
<? echo "$rg"; ?>
</td>
<? } ?>

<? /* VEICULO */ ?>
<? if ($libveiculo == "" and $checkveiculo == "") { ?>
<td class=center_borda> 
<? echo "$veiculo"; ?>
</td>
<? } ?>

<? /* PLACA */ ?>
<? if ($libplaca == "" and $checkplaca == "") { ?>
<td class=center_borda> 
<? echo "$placa"; ?>
</td> 
<? } ?>

<? /* CR */ ?>
<? if ($libcr == "" and $checkcr == "") { ?>
<td class=center_borda> 
<? echo "$cr"; ?>
</td> 
<? } ?>

<? /* N_NOTA */ ?>
<? if ($libn_nota == "" and $checkn_nota == "") { ?>
<td class=center_borda> 
<? echo "$n_nota"; ?>
</td> 
<? } ?>

<? /* DATA SAIDA */ ?>
<? if ($libdata_saida == "" and $checkdata_saida == "") { ?>
<td class=center_borda> 
<? echo "$data_saida"; ?>
</td>
<? } ?>

<? /* HORA SAIDA */ ?>
<? if ($libhora_saida == "" and $checkhora_saida == "") { ?>
<td class=center_borda> 
<? echo "$hora_saida"; ?>
</td>
<? } ?>

<? /* OBS */ ?>
<? if ($libobs == "" and $checkobs == "") { ?>
<td class=center_borda> 
<? echo "$obs"; ?>
</td> 
<? } ?>

<? /* PERIODO */ ?>
<? if ($libperiodo == "" and $checkperiodo == "") { ?>
<td class=center_borda> 
<? echo "$bperiodo"; ?>
</td> 
<? } ?>

<? /* EXCLUIR */ ?>
<? if ($libexcluir == "sim") { ?>
<td class=center_borda>
<input class="botao_excluir" type="button" value="<?echo $id?>"  onClick="javascript:void(open('confirmacao_excluir_orcamento.php?id=<?echo$id?>','principal','scrollbars=yes'))"
onMouseOver="drc('',' Excluir - N� <?echo"$id"?> '); return true;" onMouseOut="nd(); return true;">
</td>
<? } ?>

</tr>
<? $valortotal = $valortotal + $bvalor; $QuantOrc = $QuantOrc + 1 ;?>

<? } ?>
<? /* --------------------  FIM DA CONSULTA  -----------------------------  */  ?>
<tr class=sem_borda>
<td class=titulo>Total</td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
</tr>
<tr class=sem_borda>
<td class=titulo> <? echo $QuantOrc; ?></td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
<td class=sem_borda> </td>
</tr>

</tr></table></form>
</body>
</html>


