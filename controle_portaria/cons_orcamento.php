<? include "valida_sessao.php" ; include "config_portaria.php";
/*$b = date('d'); 
$c = date('n'); 
$d = date('Y'); 
if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; 
$datafinal = $b."/".$c."/".$d; 
$dataperiodo = $c."/".$d; */?>

<html>
<head>
<title> Consulta de Orçamentos </title>
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
<tr>

<td class=right> Tipo Campo
<select name="tipo_busca" OnChange="Atualizar2();">

<option value='' <? echo ($tipo_busca==''?"SELECTED":""); ?> ></option>

<?if ( $libid == "" ) { ?>
<option value='id' <? echo ($tipo_busca=='id'?"SELECTED":""); ?> > Num. </option>
<? } ?>

<?if ( $libempresa == "" ) { ?>
<option value='empresa' <? echo ($tipo_busca=='empresa'?"SELECTED":""); ?> > Empresa </option>
<? } ?>

<?if ( $libdestino == ""  ) { ?>
<option value='destino' <? echo ($tipo_busca=='destino'?"SELECTED":""); ?> > Destino </option>
<? } ?>

<?if ( $libtipo == "" ) { ?>
<option value='tipo' <? echo ($tipo_busca=='tipo'?"SELECTED":""); ?> > Tipo </option>
<? } ?>

<?if ( $libnome == "" ) { ?>
<option value='nome' <? echo ($tipo_busca=='nome'?"SELECTED":""); ?> > Nome </option>
<? } ?>

<?if ( $libveiculo == "" ) { ?>
<option value='veiculo' <? echo ($tipo_busca=='veiculo'?"SELECTED":""); ?> > Veículo </option>
<? } ?>

<?if ( $libplaca == "" ) { ?>
<option value='placa' <? echo ($tipo_busca=='placa'?"SELECTED":""); ?> > Placa </option>
<? } ?>

<?if ( $libdata_entrada == "" ) { ?>
<option value='data_entrada' <? echo ($tipo_busca=='data_entrada'?"SELECTED":""); ?> > Data Entrada </option>
<? } ?>

<?if ( $libdata_saida == "" ) { ?>
<option value='data_saida' <? echo ($tipo_busca=='data_saida'?"SELECTED":""); ?> > Data Saída </option>
<? } ?>

<?if ( $libperiodo == "" ) { ?>
<option value='periodo' <? echo ($tipo_busca=='periodo'?"SELECTED":""); ?> > Período </option>
<? } ?>

<?if ( $libusuario == "" ) { ?>
<option value='usuario' <? echo ($tipo_busca=='usuario'?"SELECTED":""); ?> > Usuário </option>
<? } ?>

</select>
</td>

<?
 /* CONFIGURAÇÃO PARA BUSCAR CAMPO AUTOMÁTICO */
$busca_valor=mysql_query("select $tipo_busca from controle order by $tipo_busca");
$total_valor=@mysql_num_rows($busca_valor);
$count=$total_valor-1;
for($i=0;$i<$total_valor;$i++) {
	$nome_valor=mysql_result($busca_valor,$i,$tipo_busca);
	$palavras_valor.="'$nome_valor'";
if($i<$count) { $palavras_valor.=","; }   }
?>

<? /* DADOS DA BUSCA */ ?>
<td class=left>
<? if ( $tipo_busca == "fid" ) {  ?>
<input class=left name=valor maxLength=25 size=26 value="<?echo $valor?>" > 
<? } else { ?>
<input class=left name=valor maxLength=25 size=26 value="<?echo $valor?>" onKeyUp="checkList(this,arvore_valor)" id="textbox2" > 
<? } ?>


<? /* BOTÃO DE BUSCAR */ ?>
<input class="botao1" name="busca" type="button" value="Buscar" Onclick="Atualizar2();">

<? /* FECHAR JANELA */ ?> 
<td class=left>
<a class="botao1" href="javascript:window.close()" target="_top"> Fecha Janela </a>
</td>

</tr>
</table>

<? /* -------------	CONFIGURAÇÃO PARA BUSCAR OS NUMEROS DA O.S	------------------- */ ?>

<FIELDSET>
<LEGEND> Dados do Orçamento </LEGEND>

<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
  
    <TD>
    
      <TABLE class=legenda cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD width="1%">&nbsp;</TD>
          <TD vAlign=top width="48%">
          
            <TABLE height=1 cellSpacing=1 width="100%" border=0>
              <TBODY>
              
<table class=sem_borda width=100%>
<tr>

<table class=sem_borda width=100% align="center">
<tr>

<? /* ID */ ?>
<? if ($libid == "" and $checkid == "") { ?>
<td class=titulo > Nº </td>
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

<? /* Nº NOTA */ ?>
<? if ($libn_nota == "" and $checkn_nota == "") {?>
<td class=titulo >  Nº Nota </td> 
<? } ?>

<? /* DATA SAIDA */ ?>
<? if ($libdata_entrada == "" and $checkdata_entrada == "") { ?>
<td class=titulo > Data Saída </td>
<? } ?>

<? /* HORA SAIDA */ ?>
<? if ($libhora_saida == "" and $checkhora_saida == "") { ?>
<td class=titulo > Hora Saída </td>
<? } ?>

<? /* OBS */ ?>
<? if ($libobs == "" and $checkobs == "") { ?>
<td class=titulo > Obs. </td>
<? } ?>

<? /* EXCLUIR */ ?>
<? if ($libexcluir == "sim" ) {?>
<td class=titulo > Excluir </td>
<? } ?>

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

if ( $fn_nota <> "" ) {$fn_notadb = "and n_nota='$fn_nota'";} else {$fn_notadb = "";}

/*if ( $fdata <> "" ) {$fdatadb = "and data='$fdata'";} else {$fdatadb = "";}*/
if ( $fdata_entrada == "" ) {$fdata_entradadb = "and data_entrada='$datahoje'"; $fdata_entrada = $datahoje; }
elseif ( $fdata_entrada <> "TODOS" ) {$fdata_entradadb = "and data_entrada='$fdata_entrada'";}
else {$fdata_entradadb = ""; }

/*if ( $fperiodo == "" ) {$fperiododb = "and periodo='$dataperiodo'"; $fperiodo = $dataperiodo; }
elseif ( $fperiodo <> "TODOS" ) {$fperiododb = "and periodo='$fperiodo'";}
else { $fperiododb = ""; }*/

if ( $fdata_saida <> "" ) {$fdata_saidadb = "and data_saida='$fdata_saida'";} else {$fdata_saidadb = "";}
if ( $fhora_saida <> "" ) {$fhora_saidadb = "and hora_saida='$fhora_saida'";} else {$fhora_saidadb = "";}

if ( $fobs <> "" ) {$fobsdb = "and obs='$fobs'";} else {$fobsdb = "";}

/*if ( $fperiodoalterado <> "" ) {$fperiodoalteradodb = "and periodoalterado='$fperiodoalterado'";} else {$fperiodoalteradodb = "";}

if ( $fusuario <> "" ) {$fusuariodb = "and usuario='$fusuario'";} else {$fusuariodb = "";}

if ( $fusuarioalterado <> "" ) {$fusuarioalteradodb = "and usuarioalterado='$fusuarioalterado'";} else {$fusuarioalteradodb = "";}

if ( $ftempo_total <> "" ) {$ftempo_totaldb = "and tempo_total='$ftempo_total'";} else {$ftempo_totaldb = "";}
*/
?>

<? /* --------------------  FIM DOS BOTOES DE SELECÃO (FILTROS)  -----------------------------  */  ?>

<? /* --------------------  INICIO DA CONSULTA  -----------------------------  */  ?>
<?
$QuantOrc = 0; $dados = 0;

$query = "SELECT * FROM controle WHERE $tipo_busca<>'' AND $tipo_busca='$valor' ORDER BY 'id'";

$result = mysql_query($query);
while ($dados = @mysql_fetch_array($result)) {
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
$n_nota = $dados["n_nota"];

$bperiodo = $dados["periodo"]; 
$bperiodoalterado = $dados["periodoalterado"];

$data_saida = $dados["data_saida"]; 
$hora_saida = $dados["hora_saida"];

$obs = $dados["obs"];

$busuario = $dados["usuario"]; 
$busuarioalterado = $dados["usuarioalterado"];

?>
<tr>
<? if ($libid == "" and $checkid == "") { ?>
<? if ($libalterar == "sim") { ?>
<td class=center_borda>
<input class="botao_inserir" type="button" name="altera" value="<?echo $id?>" onClick="javascript:void(open('altera_orcamento.php?id=<?echo$id?>','principal','scrollbars=yes'))"
onMouseOver="drc('',' Alterar - N°  <?echo"$id"?> '); return true;" onMouseOut="nd(); return true;">
<? } else { ?>
<input class="botao_inserir1" type="button" name="altera" value="<?echo $id?>" onMouseOver="drc('',' N° <?echo"$id"?> '); return true;" onMouseOut="nd(); return true;">
</td>
<? } } ?>

<? if ($libdata_entrada == "" and $checkdata_entrada == "") { ?>
<td class=center_borda> 
<? echo "$data_entrada"; ?>
</td>
<? } ?>

<? if ($libhora_entrada == "" and $checkhora_entrada == "") { ?>
<td class=center_borda> 
<? echo "$hora_entrada"; ?>
</td>
<? } ?>

<? if ($libdestino == "" and $checkdestino == "") { ?>
<td class=center_borda> 
<? echo "$destino"; ?>
</td>
<? } ?>

<? if ($libtipo == "" and $checktipo == "") { ?>
<td class=center_borda> 
<? echo "$tipo"; ?>
</td>
<? } ?>

<? if ($libempresa == "" and $checkempresa == "") { ?>
<td class=center_borda> 
<? echo "$empresa"; ?>
</td>
<? } ?>

<? if ($libnome == "" and $checknome == "") { ?>
<td class=center_borda> 
<? echo "$nome"; ?>
</td>
<? } ?>

<? if ($librg == "" and $checkrg == "") { ?>
<td class=center_borda> 
<? echo "$rg"; ?>
</td>
<? } ?>

<? if ($libveiculo == "" and $checkveiculo == "") { ?>
<td class=center_borda> 
<? echo "$veiculo"; ?>
</td>
<? } ?>

<? if ($libplaca == "" and $checkplaca == "") { ?>
<td class=center_borda> 
<? echo "$placa"; ?>
</td> 
<? } ?>

<? if ($libn_nota == "" and $checkn_nota == "") { ?>
<td class=center_borda> 
<? echo "$n_nota"; ?>
</td> 
<? } ?>

<? /*<td class=center_borda> <? if ($libperiodo == "" and $checkperiodo == "") {echo "$bperiodo";} ?></td> */?>
<? if ($libdata_saida == "" and $checkdata_saida == "") { ?>
<td class=center_borda> 
<? echo "$data_saida"; ?>
</td>
<? } ?>

<? if ($libhora_saida == "" and $checkhora_saida == "") { ?>
<td class=center_borda> 
<? echo "$hora_saida"; ?>
</td>
<? } ?>

<? if ($libobs == "" and $checkobs== "") { ?>
<td class=center_borda> 
<? echo "$obs"; ?>
</td> 
<? } ?>

<? if ($libexcluir == "sim") { ?>
<td class=center_borda>
<input class="botao_excluir" type="button" value="<?echo $id?>"  onClick="javascript:void(open('confirmacao_excluir_orcamento.php?id=<?echo$id?>','principal','scrollbars=yes'))"
onMouseOver="drc('',' Excluir - N° <?echo"$id"?> '); return true;" onMouseOut="nd(); return true;">
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

</tr></table>
			             
			</TBODY>
			</TABLE>
			</TD>
				  
          <TD width="2%">&nbsp;</TD>
          <TD vAlign=top width="48%">
          
            </TD>
				  
          <TD width="1%">&nbsp;</TD>
		  </TR>
		  </TBODY>
		  </TABLE>
		  
      <DIV class=espaco>&nbsp;</DIV>
	  
	  </TR>
	  </TBODY>
	  </TABLE>
              
</TABLE>

</FIELDSET>

</form>
</body>
</html>

<script>
var arvore_id = new Array(<?= $palavrasid ?>);
var arvore_valor = new Array(<?= $palavras_valor ?>);
document.write('<style type="text/css">'+
	  '#listHolder{position:absolute;border:0;}'+
	  '.list{font-family:verdana;font-size:10;color:#000000;background:;}'+
	 '<\/style>')
	 
function SaltaCampo(campo,prox,teclapres){
    var tecla = teclapres.keyCode ? teclapres.keyCode : teclapres.which ? teclapres.which : teclapres.charCode;
    if (tecla == 13){
  document.cons_orcamento[prox].select(); //se não quiser o foco, desabilite!
  document.cons_orcamento[prox].focus();
    }
}
</script>
