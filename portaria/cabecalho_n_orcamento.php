<? 
include "valida_sessao.php" ; include "config_portaria.php";
$b = date('d'); 
$c = date('n'); 
$d = date('Y'); 
if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; 
$datahoje = $b."/".$c."/".$d; 
$dataperiodo = $c."/".$d; 
?>

<html>
<head>
<title> Cabeçalho de Controle Portaria </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" src="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
</head>
<body>

<div id="overDiv" style="position:absolute; visibility:hide; z-index:1;; width: 160px; height: 19px"></div>

<?
$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
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

<form action="" method="post" name="n_orcamento1">

<table class=sem_borda width=100%>
<tr>

<table class=sem_borda width=100% align="center">
<tr>
<td class=center > <input type="hidden" name="libid" value="<?echo $libid;?>" size="7"> </td>

<td class=center ><? /* DATA ENTRADA */ ?><input type="hidden" name="libdata_entrada" value="<?echo $libdata_entrada;?>" size="7">
<? if ($libdata_entrada == "") { ?>
<input class=botao2 type="checkbox" name="checkdata_entrada" value="checked" <?echo $checkdata_entrada?> onClick="Atualizar1();"
onMouseOver="drc('','Data Entrada'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center ><? /* HORA ENTRADA */ ?><input type="hidden" name="libhora_entrada" value="<?echo $libhora_entrada;?>" size="7">
<? if ($libhora_entrada == "") { ?>
<input class=botao2 type="checkbox" name="checkhora_entrada" value="checked" <?echo $checkhora_entrada?> onClick="Atualizar1();"
onMouseOver="drc('','Hora Entrada'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center ><? /* DESTINO */ ?><input type="hidden" name="libdestino" value="<?echo $libdestino;?>" size="7">
<? if ($libdestino == "") { ?>
<input class=botao2 type="checkbox" name="checkdestino" value="checked" <?echo $checkdestino?> onClick="Atualizar1();"
onMouseOver="drc('','Destino'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center><? /* TIPO */ ?><input type="hidden" name="libtipo" value="<?echo $libtipo;?>" size="7">
<? if ($libtipo == "") { ?>
<input class=botao2 type="checkbox" name="checktipo" value="checked" <?echo $checktipo?> onClick="Atualizar1();" onMouseOver="drc('','Tipo'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center ><? /* EMPRESA */ ?><input type="hidden" name="libempresa" value="<?echo $libempresa;?>" size="7">
<? if ($libempresa == "") { ?>
<input class=botao2 type="checkbox" name="checkempresa" value="checked" <?echo $checkempresa?> onClick="Atualizar1();"
onMouseOver="drc('','Empresa'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center><? /* NOME */ ?><input type="hidden" name="libnome" value="<?echo $libnome;?>" size="7">
<? if ($libnome == "") { ?>
<input class=botao2 type="checkbox" name="checknome" value="checked" <?echo $checknome?> onClick="Atualizar1();" onMouseOver="drc('','Nome'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center ><? /* RG */ ?><input type="hidden" name="librg" value="<?echo $librg;?>" size="7">
<? if ($librg == "") { ?>
<input class=botao2 type="checkbox" name="checkrg" value="checked" <?echo $checkrg?> onClick="Atualizar1();"
onMouseOver="drc('','Rg'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center ><? /* VEICULO */ ?><input type="hidden" name="libveiculo" value="<?echo $libveiculo;?>" size="7">
<? if ($libveiculo == "") { ?>
<input class=botao2 type="checkbox" name="checkveiculo" value="checked" <?echo $checkveiculo?> onClick="Atualizar1();"
onMouseOver="drc('','Veículo'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center ><? /* PLACA*/ ?><input type="hidden" name="libplaca" value="<?echo $libplaca;?>" size="7">
<? if ($libplaca == "") { ?>
<input class=botao2 type="checkbox" name="checkplaca" value="checked" <?echo $checkplaca?> onClick="Atualizar1();" onMouseOver="drc('','Placa'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center ><? /* CR */ ?><input type="hidden" name="libcr" value="<?echo $libcr;?>" size="7">
<? if ($libcr == "") { ?>
<input class=botao2 type="checkbox" name="checkcr" value="checked" <?echo $checkcr?> onClick="Atualizar1();" onMouseOver="drc('','cr'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center ><? /* N_NOTA */ ?><input type="hidden" name="libn_nota" value="<?echo $libn_nota;?>" size="7">
<? if ($libn_bota == "") { ?>
<input class=botao2 type="checkbox" name="checkn_nota" value="checked" <?echo $checkn_nota?> onClick="Atualizar1();"
onMouseOver="drc('','Nº Nota'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<?/* <td class=center ><? /* PERIODO  ?><input type="hidden" name="libperiodo" value="<?echo $libperiodo;?>" size="7">
<? if ($libperiodo == "") { ?>
<input class=botao2 type="checkbox" name="checkperiodo" value="checked" <?echo $checkperiodo?> onClick="Atualizar1();"
onMouseOver="drc('','Período'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>*/?>

<td class=center ><? /* DATA SAIDA */ ?><input type="hidden" name="libdata_saida" value="<?echo $libdata_saida;?>" size="7">
<? if ($libdata_saida == "") { ?>
<input class=botao2 type="checkbox" name="checkdata_saida" value="checked" <?echo $checkdata_saida?> onClick="Atualizar1();"
onMouseOver="drc('','Data Saída'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center ><? /* HORA SAIDA */ ?><input type="hidden" name="libhora_saida" value="<?echo $libhora_saida;?>" size="7">
<? if ($libhora_saida == "") { ?>
<input class=botao2 type="checkbox" name="checkhora_saida" value="checked" <?echo $checkhora_saida?> onClick="Atualizar1();"
onMouseOver="drc('','Hora Saída'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center ><? /* OBS */ ?><input type="hidden" name="libobs" value="<?echo $libobs;?>" size="7">
<? if ($libobs == "") { ?>
<input class=botao2 type="checkbox" name="checkobs" value="checked" <?echo $checkobs?> onClick="Atualizar1();"
onMouseOver="drc('','Obs.'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<td class=center ><? /* OBS */ ?><input type="hidden" name="libperiodo" value="<?echo $libperiodo;?>" size="7">
<? if ($libperiodo == "") { ?>
<input class=botao2 type="checkbox" name="checkperiodo" value="checked" <?echo $checkperiodo?> onClick="Atualizar1();"
onMouseOver="drc('','Periodo'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td>

<?/*
<td class=center ><? /* PERIODO ALTERADO  ?><input type="hidden" name="libperiodoalterado" value="<?echo $libperiodoalterado;?>" size="7">
<? if ($libperiodoalterado == "") { ?>
<input class=botao2 type="checkbox" name="checkperiodoalterado" value="checked" <?echo $checkperiodoalterado?> onClick="Atualizar1();" onMouseOver="drc('','Período Alterado'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td> 

<td class=center > <? /* USUARIO  ?><input type="hidden" name="libusuario" value="<?echo $libusuario;?>" size="7">
<? if ($libusuario == "") { ?>
<input class=botao2 type="checkbox" name="checkusuario" value="checked" <?echo $checkusuario?> onClick="Atualizar1();"
onMouseOver="drc('','Usuário'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td> 

<td class=center > <? /* USUARIO ALTERADO ?><input type="hidden" name="libusuarioalterado" value="<?echo $libusuarioalterado;?>" size="7">
<? if ($libusuarioalterado == "") { ?>
<input class=botao2 type="checkbox" name="checkusuarioalterado" value="checked" <?echo $checkusuarioalterado?> onClick="Atualizar1();" onMouseOver="drc('','Usuário Alterado'); return true;" onMouseOut="nd(); return true;" >
<? } ?>
</td> */?>

</tr>

<tr>
<td class=center ><? /* N_ORC */ ?>
<? if ($libid == "" and $checkid == "") { ?> N° <? } ?>
</td>

<td class=center ><? /* data_entrada */ ?>
<? if ($libdata_entrada == "" and $checkdata_entrada == "") { ?> Data Entrada <? } ?>
</td>

<td class=center ><? /* HORA ENTRADA */ ?>
<? if ($libhora_entrada == "" and $checkhora_entrada == "") { ?> Hora Entrada <? } ?>
</td>

<td class=center ><? /* DESTINO */ ?>
<? if ($libdestino == "" and $checkdestino == "") {?> Destino <? } ?>
</td>

<td class=center ><? /* TIPO */ ?>
<? if ($libtipo == "" and $checktipo == "") {?> Tipo <? } ?>
</td>

<td class=center ><? /* EMPRESA */ ?>
<? if ($libempresa == "" and $checkempresa == "") {?> Empresa <? } ?>
</td>

<td class=center ><? /* NOME */ ?>
<? if ($libnome == "" and $checknome == "") {?> Nome <? } ?>
</td>

<td class=center ><? /* RG */ ?>
<? if ($librg == "" and $checkrg == "") {?> Rg <? } ?>
</td>

<td class=center ><? /* VEICULO */ ?>
<? if ($libveiculo == "" and $checkveiculo == "") {?> Veículo <? } ?>
</td>

<td class=center >  <? /* PLACA */ ?>
<? if ($libplaca == "" and $checkplaca == "") {?> Placa <? } ?>
</td>

<td class=center >  <? /* CR */ ?>
<? if ($libcr == "" and $checkcr == "") {?> CR <? } ?>
</td>

<td class=center >  <? /* N NOTA */ ?>
<? if ($libn_nota == "" and $checkn_nota == "") {?> Nº Nota <? } ?>
</td>

<? /*
<td class=center > PERIODO 
<? if ($libperiodo == "" and $checkperiodo == "") {?> Período <? } ?>
</td>*/ ?>

<td class=center > <? /* DATA SAIDA */ ?>
<? if ($libdata_saida == "" and $checkdata_saida == "") {?> Data Saída <? } ?>
</td>

 <td class=center >  <? /* HORA SAIDA */ ?>
<? if ($libhora_saida == "" and $checkhora_saida == "") {?> Hora Saída <? } ?>
</td>

<td class=center ><? /* OBS */ ?>
<? if ($libobs == "" and $checkobs == "") { ?> Obs. <? } ?>
</td>

<td class=center ><? /* PERIODO */ ?>
<? if ($libperiodo == "" and $checkperiodo == "") { ?> Periodo <? } ?>
</td>

<td class=center >  <? /* EXCLUIR */ ?>
<? if ($libexcluir == "sim" ) {?>  <? } ?>
</td>

</tr>

<? /* --------------------  INICIO DOS BOTOES DE SELECÃO (FILTROS)  -----------------------------  */  ?>

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
?>

<? /* --------------------  FIM DOS BOTOES DE SELECÃO (FILTROS)  -----------------------------  */  ?>


<tr>



<td><?  /* N_CONTROLE*/  ?>
<? if ($libid == "" and $checkid == "") { ?>
<? if ($fid == "" ) {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="fid" onChange="Atualizar1();" >
<?
  $query = "select distinct id from controle where id>='0' $fdata_entradadb $fhora_entradadb $fdestinodb $ftipodb $fempresadb $fnomedb $frgdb $fveiculodb $fplacadb $fn_notadb $fdata_saidadb $fhora_saidadb $fobsdb order by id";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->id==$fid)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->id' $sSelect> $sRow->id</option>");   }  ?>
</select>
<? } ?>
</td>

<td><? /* DATA ENTRADA */ ?>
<? if ($libdata_entrada == "" and $checkdata_entrada == "") { ?>
<? if ($fdata_entrada == "TODOS" OR $fdata_entrada == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="fdata_entrada" onChange="Atualizar1();" >
 <?
  $query = "select distinct data_entrada from controle where id>='0' $fiddb $fhora_entradadb $fdestinodb $ftipodb $fempresadb $fnomedb $frgdb $fveiculodb $fplacadb $fn_notadb $fdata_saidadb $fhora_saidadb $fobsdb order by data_entrada";
  $result = MYSQL_QUERY($query);
  print("<option value='TODOS' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->data_entrada==$fdata_entrada)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->data_entrada' $sSelect> $sRow->data_entrada</option>");   }  ?>
</select>
<? } ?>
</td>

<td><? /* HORA ENTRADA */ ?>
<? if ($libhora_entrada == "" and $checkhora_entrada == "") { ?>
<? if ($fhora_entrada == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="fhora_entrada" onChange="Atualizar1();" >
 <?
  $query = "select distinct hora_entrada from controle where id>='0' $fiddb $fdata_entradadb $fdestinodb $ftipodb $fempresadb $fnomedb $frgdb $fveiculodb $fplacadb $fn_notadb $fdata_saidadb $fhora_saidadb $fobsdb order by hora_entrada";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->hora_entrada==$fhora_entrada)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->hora_entrada' $sSelect> $sRow->hora_entrada</option>");   }  ?>
</select>
<? } ?>
</td>

<td><? /* DESTINO */ ?>
<? if ($libdestino == "" and $checkdestino == "") { ?>
<? if ($fdestino == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="fdestino" onChange="Atualizar1();" >
 <?
  $query = "select distinct destino from controle where id>='0' $fiddb $fdata_entradadb $fhora_entradadb $ftipodb $fempresadb $fnomedb $frgdb $fveiculodb $fplacadb $fperiododb $fperiodoalteradodb $fn_notadb $fdata_saidadb $fhora_saidadb $fobsdb order by destino";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->destino==$fdestino)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->destino' $sSelect> $sRow->destino</option>");   }  ?>
</select>
<? } ?>
</td>

<td><? /* TIPO */ ?>
<? if ($libtipo == "" and $checktipo == "") { ?>
<? if ($ftipo == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="ftipo" onChange="Atualizar1();" >
 <?
  $query = "select distinct tipo from controle where id>='0' $fiddb $fdata_entradadb $fhora_entradadb $fdestinodb $fempresadb $fnomedb $frgdb $fveiculodb $fplacadb $fperiododb $fperiodoalteradodb $fn_notadb $fdata_saidadb $fhora_saidadb $fobsdb order by tipo";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->tipo==$ftipo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->tipo' $sSelect> $sRow->tipo</option>");   }  ?>
</select>
<? } ?>
</td>

<td><? /* EMPRESA */ ?>
<? if ($libempresa == "" and $checkempresa == "") { ?>
<? if ($fempresa == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
 <select <?echo $botao?> size="1" name="fempresa" onChange="Atualizar1();" >
 <?
  $query = "select distinct empresa from controle where id>='0' $fiddb $fdata_entradadb $fhora_entradadb $fdestinodb $ftipodb $fnomedb $frgdb $fveiculodb $fplacadb $fperiododb $fperiodoalteradodb $fn_notadb $fdata_saidadb $fhora_saidadb $fobsdb order by empresa";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->empresa==$fempresa)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->empresa' $sSelect> $sRow->empresa</option>");   }  ?>
</select>
<? } ?>
</td>

<td><? /* NOME*/ ?>
<? if ($libnome == "" and $checknome == "") { ?>
<? if ($fnome == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="fnome" onChange="Atualizar1();" >
 <?
  $query = "select distinct nome from controle where id>='0' $fiddb $fdata_entradadb $fhora_entradadb $fdestinodb $ftipodb $fempresadb $frgdb $fveiculodb $fplacadb $fperiododb $fperiodoalteradodb $fn_notadb $fdata_saidadb $fhora_saidadb $fobsdb order by nome";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->nome==$fnome)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->nome' $sSelect> $sRow->nome</option>");   }  ?>
</select>
<? } ?>
</td>

<td><? /* RG */ ?>
<? if ($librg == "" and $checkrg == "") { ?>
<? if ($frg == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="frg" onChange="Atualizar1();" >
 <?
  $query = "select distinct rg from controle where id>='0' $fiddb $fdata_entradadb $fhora_entradadb $fdestinodb $ftipodb $fempresadb $fnomedb $fveiculodb $fplacadb $fperiododb $fperiodoalteradodb $fn_notadb $fdata_saidadb $fhora_saidadb $fobsdb order by rg";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->rg==$frg)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->rg' $sSelect> $sRow->rg</option>");   }  ?>
</select>
<? } ?>
</td>

<td><? /* VEICULO */ ?>
<? if ($libveiculo == "" and $checkveiculo == "") { ?>
<? if ($fveiculo == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="fveiculo" onChange="Atualizar1();" >
 <?
  $query = "select distinct veiculo from controle where id>='0' $fiddb $fdata_entradadb $fhora_entradadb $fdestinodb $ftipodb $fempresadb $fnomedb $frgdb  $fplacadb $fn_notadb $fdata_saidadb $fhora_saidadb $fobsdb order by veiculo";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->veiculo==$fveiculo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->veiculo' $sSelect> $sRow->veiculo</option>");   }  ?>
</select>
<? } ?> 
</td>

<? /* PLACA */ ?>
<td><? if ($libplaca == "" and $checkplaca == "") { ?>
<? if ($fplaca == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="fplaca" onChange="Atualizar1();" >
 <?
  $query = "select distinct placa from controle where id>='0' $fiddb $fdata_entradadb $fhora_entradadb $fdestinodb $ftipodb $fempresadb $fnomedb $frgdb $fveiculodb $fperiododb $fperiodoalteradodb $fn_notadb $fdata_saidadb $fhora_saidadb $fobsdb order by placa";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->placa==$fplaca)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->placa' $sSelect> $sRow->placa</option>");   }  ?>
</select>
<? } ?></td>

<? /* CR */ ?>
<td><? if ($libcr == "" and $checkcr == "") { ?>
<? if ($fcr == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="fcr" onChange="Atualizar1();" >
 <?
  $query = "select distinct cr from controle where id>='0' $fiddb $fdata_entradadb $fhora_entradadb $fdestinodb $ftipodb $fempresadb $fnomedb $frgdb $fveiculodb $fperiododb $fperiodoalteradodb $fn_notadb $fdata_saidadb $fhora_saidadb $fobsdb order by cr";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->cr==$fcr)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->cr' $sSelect> $sRow->cr</option>");   }  ?>
</select>
<? } ?></td>


<? /* N NOTA */ ?>
<td><? if ($libn_nota == "" and $checkn_nota == "") { ?>
<? if ($fn_nota == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>

<select <?echo $botao?> size="1" name="fn_nota" onChange="Atualizar1();" >
 <?
  $query = "select distinct n_nota from controle where id>='0' $fiddb $fdata_entradadb $fhora_entradadb $fdestinodb $ftipodb $fempresadb $fnomedb $frgdb $fveiculodb $fplacadb $fperiododb $fperiodoalteradodb $fdata_saidadb $fhora_saidadb $fobsdb order by n_nota";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->n_nota==$fn_nota)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->n_nota' $sSelect> $sRow->n_nota</option>");   }  ?>
</select>
<? } ?></td>

<td><? /* DATA SAIDA */ ?>
<? if ($libdata_saida == "" and $checkdata_saida == "") { ?>
<? if ($fdata_saida == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="fdata_saida" onChange="Atualizar1();" >
 <?
  $query = "select distinct data_saida from controle where id>='0' $fiddb $fdata_entradadb $fhora_entradadb $fdestinodb $ftipodb $fempresadb $fnomedb $frgdb $fveiculodb $fplacadb $fperiododb $fperiodoalteradodb $fn_notadb $fhora_saidadb $fobsdb order by data_saida";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->data_saida==$fdata_saida)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->data_saida' $sSelect> $sRow->data_saida</option>");   }  ?>
</select>
</td><? } ?>


<td><? /* HORA SAIDA */ ?>
<? if ($libhora_saida == "" and $checkhora_saida == "") { ?>
<? if ($fhora_saida == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="fhora_saida" onChange="Atualizar1();" >
 <?
  $query = "select distinct hora_saida from controle where id>='0' $fiddb $fdata_entradadb $fhora_entradadb $fdestinodb $ftipodb $fempresadb $fnomedb $frgdb $fveiculodb $fplacadb $fperiododb $fperiodoalteradodb $fn_notadb $fdata_saidadb $fobsdb order by hora_saida";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->hora_saida==$fhora_saida)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->hora_saida' $sSelect> $sRow->hora_saida</option>");   }  ?>
</select>
</td><? } ?>


<td> <? /* OBS */ ?>
<? if ($libobs == "" and $checkobs== "") { ?>
<? if ($fobs == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="fobs" onChange="Atualizar1();" >
 <?
  $query = "select distinct obs from controle where id>='0' $fiddb $fdata_entradadb $fhora_entradadb $fdestinodb $ftipodb $fempresadb $fnomedb $frgdb $fveiculodb $fplacadb $fperiododb $fperiodoalteradodb $fn_notadb $fdata_saidadb $fhora_saidadb order by obs";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->obs==$fobs)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->obs' $sSelect> $sRow->obs</option>");   }  ?>
</select>
<? } ?>
</td>

<? /* PERIODO */ ?>
<td><? if ($libperiodo == "" and $checkperiodo == "") { ?>
<? if ($fperiodo == "TODOS" or $fperiodo == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select <?echo $botao?> size="1" name="fperiodo" onChange="Atualizar1();" >
 <?
  $query = "select distinct periodo from controle where id>='0' $fiddb $fdata_entradadb $fhora_entradadb $fdestinodb $ftipodb $fempresadb $fnomedb $frgdb $fveiculodb $fplacadb $fobsdb $fperiodoalteradodb $fn_notadb $fdata_saidadb $fhora_saidadb  order by periodo";
  $result = MYSQL_QUERY($query);
  print("<option value='TODOS' $sSelect>TODOS</option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->periodo==$fperiodo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->periodo' $sSelect> $sRow->periodo</option>");   }  ?>
</select>
<? } ?>
</td>


</tr>
<? /* --------------------  FIM DOS BOTOES DE SELECÃO (FILTROS)  -----------------------------  */  ?>

</tr></table></form>
</body>
</html>
