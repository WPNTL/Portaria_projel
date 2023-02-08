<? include "valida_sessao.php" ; include "config_pcp.php"; ?>

<html>
<head>
<title> Cadastrar PCP </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/letras_maiscula.js"></script>
<script language="JavaScript" SRC="funcoes/auto_completar.js"></script>
<script language="JavaScript" SRC="funcoes/enter_cadastro.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
<script language="JavaScript" SRC="funcoes/abrir_fechar.js"></script>
<script language="JavaScript" SRC="funcoes/calendario.js"></script>

</head>
<body>

<form action="" method="post" name="pcp">

<? /* USUARIO */ ?>
<input class=nedita_left readonly type=hidden name=usuario value="<?echo $nome_usuario?>">

<? /* DATA EMISSAO */ 
	$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 
	if(strlen($dia_emissao) == 1){$dia_emissao = "0".$dia_emissao;};
  	if(strlen($mes_emissao) == 1){$mes_emissao = "0".$mes_emissao;};
	$data_emissao = ($dia_emissao."/".$mes_emissao."/".$ano_emissao); 
?>
<input class=nedita_left readonly type=hidden name=data_emissao_novo value="<?echo $data_emissao;?>">

<table class=sem_borda width="750" align="center">
<td>


<? /*-------------------------- INICIO DADOS DO CLIENTE -------------------------------  */?>

<table class=sem_borda width=100% align="center">
<tr>
<td class=titulo height="25" align="center"> DADOS DO CLIENTE ( * = Dados Obrigatórios ) 
</td>
</tr>
</table>

<br>

<table class=sem_borda width=100% align="center">
<tr>

<td class=right width=25%> N° O.S* </td>
<td class=left>
<input class=left name=num_os maxLength=5 size=6 value="<?echo $num_os?>" onFocus="nextfield ='item';" 
onkeyup="saltaCampo(event,this,'money2','0');SaltaCampo('num_os','item',event);" onKeypress="return validaConteudo(event,this);">
</td>

<td class=right width=5%> Item* </td>
<td class=left> <? if ( $item == "" ) { $item = "01";} ?>
<input class=left name=item maxLength=2 size=3 value="<?echo $item?>" onFocus="nextfield ='num_proposta';" onkeyup="saltaCampo(event,this,'money2','0');SaltaCampo('item','num_proposta',event);" onKeypress="return validaConteudo(event,this);">
</td>

<td width=5%> &nbsp; </td>

<td class=right width=15%> N° Prop. </td>
<td class=left> 
<input class=left name=num_proposta maxLength=20 size=12 value="<?echo $num_proposta?>" onFocus="nextfield ='nome_cliente';" onkeyup="saltaCampo(event,this,'money2','0');SaltaCampo('num_proposta','nome_cliente',event);Texto_Maiuscula_Cadastro();">
</td>

<td width=5%> &nbsp; </td>

<?  // AAAA-MM-DD
   $data_1ano = date('Y-m-d', strtotime('-1 year'));
//   $sql = "SELECT * FROM `noticias` WHERE `data` = '" . $data . "'";
?>
<td class=right width=40%> Nome Cliente* </td>
<?
$buscacliente=mysql_query("select distinct nome_cliente from pcp where data_emissao >='".$data_1ano."' order by 'nome_cliente'");
$totalcliente=mysql_num_rows($buscacliente);
$count=$totalcliente-1;
for($i=0;$i<$totalcliente;$i++) {$nomecliente=mysql_result($buscacliente,$i,"nome_cliente");$palavrascliente.="'$nomecliente'";
if($i<$count) { $palavrascliente.=","; }   }
?>
<td class=left>
<input class=left name=nome_cliente maxLength=15 size=18 value="<?echo $nome_cliente?>"
onKeyUp="checkList(this,arvorecliente);SaltaCampo('nome_cliente','oc_obra',event);Texto_Maiuscula_Cadastro();" id="textbox1"  onFocus="nextfield ='oc_obra';">
</td>

<td width=8%> &nbsp;&nbsp; </td>

<td class=right width=10%> OC/Obra </td>
<?
$buscaoc_obra = mysql_query("select distinct oc_obra from pcp order by 'oc_obra'");
$totaloc_obra = mysql_num_rows($buscaoc_obra); $count = $totaloc_obra-1;
for($i=0; $i<$totaloc_obra; $i++) { $nomeoc_obra = mysql_result($buscaoc_obra,$i,"oc_obra"); $palavrasoc_obra.="'$nomeoc_obra'";
if($i<$count) { $palavrasoc_obra.=","; } }
?>
<td class=left>
<input  class=left name=oc_obra maxLength=30 size=31 value="<?echo $oc_obra?>"
onKeyUp="checkList(this,arvoreoc_obra);SaltaCampo('oc_obra','estado',event);Texto_Maiuscula_Cadastro();" id="textbox2" onFocus="nextfield ='mercado';">
</td>
</tr>

</table>

<BR>

<table class=sem_borda width=100% align="center">

<tr>

<td class=right> Estado* </td>
<?
$buscaestado = mysql_query("select distinct estado from pcp order by 'estado'");
$totalestado = mysql_num_rows($buscaestado); $count = $totalestado-1;
for($i=0; $i<$totalestado; $i++) { $nomeestado = mysql_result($buscaestado,$i,"estado"); $palavrasestado.="'$nomeestado'";
if($i<$count) { $palavrasestado.=","; } }
?>
<td class=left>
<input class=left name=estado maxLength=2 size=3 value="<?echo $estado ?>"
onKeyUp="checkList(this,arvoreestado);SaltaCampo('estado','data_entrega',event);Texto_Maiuscula_Cadastro();" id="textbox4" onFocus="nextfield ='data_entrega';">
</td>

<td> &nbsp;</td>

<td class=right> Data Entrega* </td>
<td class=left>
<input name=data_entrega value="<?echo $data_entrega?>" size="11"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pcp.data_entrega);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a>
</td>

<td> &nbsp; </td>

<td class=right> Local Venda* </td>
<td class=left>
<select name="local_venda">
<option value='' <? echo ($local_venda==''?"SELECTED":""); ?> >  </option>
<option value='Matriz' <? echo ($local_venda=='Matriz'?"SELECTED":""); ?> > Matriz </option>
<option value='São Paulo' <? echo ($local_venda=='São Paulo'?"SELECTED":""); ?> > São Paulo </option>
</select>
</td>

<td> &nbsp; </td>

<td class=right> Forn. Motor* </td>
<td class=left>
<select name="fornecimento_motor">
<option value='' <? echo ($fornecimento_motor==''?"SELECTED":""); ?> >  </option>
<option value='C' <? echo ($fornecimento_motor=='C'?"SELECTED":""); ?> > Cliente </option>
<option value='P' <? echo ($fornecimento_motor=='P'?"SELECTED":""); ?> > Projelmec </option>
<option value='S' <? echo ($fornecimento_motor=='S'?"SELECTED":""); ?> > Sem Motor </option>
</select>
</td>
</tr>

</table>

<? /*-------------------------- FIM DADOS DO CLIENTE -------------------------------  */?>

<BR>

<? /*-------------------------- INICIO DADOS DO VENTILADOR -------------------------------  */?>


<table class=sem_borda width=100% align="center">
<tr><td class=titulo height="25" align="center"> DADOS DO VENTILADOR </td></tr></table>
<BR>

<table class=sem_borda width=100% align="center">

<tr>

<td class=left> Mercado* </td>
<td class=left>
<select name="mercado">
<option value='' <? echo ($mercado==''?"SELECTED":""); ?> >  </option>
<option value='Agrícola' <? echo ($mercado=='Agrícola'?"SELECTED":""); ?> > Agrícola </option>
<option value='Cerâmica' <? echo ($mercado=='Cerâmica'?"SELECTED":""); ?> > Cerâmica </option>
<option value='Conforto' <? echo ($mercado=='Conforto'?"SELECTED":""); ?> > Conforto </option>
<option value='HVAC' <? echo ($mercado=='HVAC'?"SELECTED":""); ?> > HVAC </option>
<option value='Industrial' <? echo ($mercado=='Industrial'?"SELECTED":""); ?> > Industrial </option>
</select>
</td>

<td width=10%> &nbsp; </td>

<? /* REPRESENTANTE */ ?>
<td class=left> Representante </td>
<td class=left>
<select name="representante">
<option value='' <? echo ($representante==''?"SELECTED":""); ?> >  </option>
<option value='ETICO' <? echo ($representante=='ETICO'?"SELECTED":""); ?> > ETICO </option>
<option value='GN' <? echo ($representante=='GN'?"SELECTED":""); ?> > GN </option>
<option value='IMR' <? echo ($representante=='IMR'?"SELECTED":""); ?> > IMR </option>
<option value='INTERMAX' <? echo ($representante=='INTERMAX'?"SELECTED":""); ?> > INTERMAX </option>
<option value='JPAF' <? echo ($representante=='JPAF'?"SELECTED":""); ?> > JPAF </option>
<option value='SLC' <? echo ($representante=='SLC'?"SELECTED":""); ?> > SLC </option>
<option value='TECNOPRED' <? echo ($representante=='TECNOPRED'?"SELECTED":""); ?> > TECNOPRED </option>
<option value='TR' <? echo ($representante=='TR'?"SELECTED":""); ?> > TR </option>
<option value='SLC' <? echo ($representante=='SLC'?"SELECTED":""); ?> > SLC </option>
<option value='ERONI - SC' <? echo ($representante=='ERONI - SC'?"SELECTED":""); ?> > ERONI - SC </option>
<option value='DUAL CLIMA' <? echo ($representante=='DUAL CLIMA'?"SELECTED":""); ?> > DUAL CLIMA </option>
</select>
</td>
<? /* REPRESENTANTE */ ?>

<td class=left width=8%> Descrição* </td>
<?
$buscadescr_vent = mysql_query("select distinct descr_vent from pcp where baixa='P' order by 'descr_vent'");
$totaldescr_vent = mysql_num_rows($buscadescr_vent); $count = $totaldescr_vent-1;
for($i=0; $i<$totaldescr_vent; $i++) { $nomedescr_vent = mysql_result($buscadescr_vent,$i,"descr_vent"); $palavrasdescr_vent.="'$nomedescr_vent'";
if($i<$count) { $palavrasdescr_vent.=","; } }
?>
<td class=left>
<input class=left name=descr_vent maxLength=25 size=25 value="<?echo $descr_vent?>"
onKeyUp="checkList(this,arvoredescr_vent);SaltaCampo('descr_vent','modelo',event);Texto_Maiuscula_Cadastro();" id="textbox5" onFocus="nextfield ='modelo';">
</td>

<td width=10%> &nbsp; </td>

<td class=left width=5%> Modelo* </td>
<?
$buscamodelo = mysql_query("select distinct modelo from pcp order by 'modelo'");
$totalmodelo = mysql_num_rows($buscamodelo); $count = $totalmodelo-1;
for($i=0; $i<$totalmodelo; $i++) { $nomemodelo = mysql_result($buscamodelo,$i,"modelo"); $palavrasmodelo.="'$nomemodelo'";
if($i<$count) { $palavrasmodelo.=","; } }
?>
<td class=left>
<input class=left name=modelo maxLength=7 size=9 value="<?echo $modelo?>"
onKeyUp="checkList(this,arvoremodelo);SaltaCampo('modelo','tamanho',event);Texto_Maiuscula_Cadastro();" id="textbox6" onFocus="nextfield ='tamanho';">
</td>

<td width=10%> &nbsp; </td>

<td class=left width=8%> Tamanho* </td>
<?
$buscatamanho = mysql_query("select distinct tamanho from pcp order by 'tamanho'");
$totaltamanho = mysql_num_rows($buscatamanho); $count = $totaltamanho-1;
for($i=0; $i<$totaltamanho; $i++) { $nometamanho = mysql_result($buscatamanho,$i,"tamanho"); $palavrastamanho.="'$nometamanho'";
if($i<$count) { $palavrastamanho.=","; } }
?>
<td class=left>
<input class=left name=tamanho maxLength=5 size=7 value="<?echo $tamanho?>"
onKeyUp="checkList(this,arvoretamanho);SaltaCampo('tamanho','arranjo',event);Texto_Maiuscula_Cadastro();" id="textbox7" onFocus="nextfield ='arranjo';">
</td>


</tr>
</table>

<BR>

<table class=sem_borda width=100% align="center">

<tr>
<td class=right width=5%> Arranjo </td>
<?
$buscaarranjo = mysql_query("select distinct arranjo from pcp order by 'arranjo'");
$totalarranjo = mysql_num_rows($buscaarranjo); $count = $totalarranjo-1;
for($i=0; $i<$totalarranjo; $i++) { $nomearranjo = mysql_result($buscaarranjo,$i,"arranjo"); $palavrasarranjo.="'$nomearranjo'";
if($i<$count) { $palavrasarranjo.=","; } }
?>
<td class=left>
<input class=left name=arranjo maxLength=2 size=3 value="<?echo $arranjo?>"
onKeyUp="checkList(this,arvorearranjo);SaltaCampo('arranjo','classe',event);Texto_Maiuscula_Cadastro();" id="textbox8" onFocus="nextfield ='classe';">
</td>

<td width=5%> &nbsp; </td>

<td class=right width=5%> Classe </td>
<td class=left>
<select name="classe">
<option value='' <? echo ($classe==''?"SELECTED":""); ?> >  </option>
<option value='I' <? echo ($classe=='I'?"SELECTED":""); ?> > I </option>
<option value='II' <? echo ($classe=='II'?"SELECTED":""); ?> > II </option>
<option value='III' <? echo ($classe=='III'?"SELECTED":""); ?> > III </option>
<option value='IV' <? echo ($classe=='IV'?"SELECTED":""); ?> > IV </option>
<option value='SP' <? echo ($classe=='SP'?"SELECTED":""); ?> > SP </option>
<option value='B' <? echo ($classe=='B'?"SELECTED":""); ?> > B </option>
<option value='P' <? echo ($classe=='P'?"SELECTED":""); ?> > P </option>
<option value='Q' <? echo ($classe=='Q'?"SELECTED":""); ?> > Q </option>
</select>
</td>

<td width=5%> &nbsp; </td>

<td class=right width=28%> Sentido Giro/Fluxo </td>
<td class=left>
<select name="rotacao">
<option value='' <? echo ($rotacao==''?"SELECTED":""); ?> >  </option>
<option value='AH' <? echo ($rotacao=='AH'?"SELECTED":""); ?> > A-H </option>
<option value='HA' <? echo ($rotacao=='HA'?"SELECTED":""); ?> > H-A </option>
<option value='R' <? echo ($rotacao=='R'?"SELECTED":""); ?> > R </option>
<option value='CR' <? echo ($rotacao=='CR'?"SELECTED":""); ?> > CR </option>
</select>
</td>

<td width=5%> &nbsp; </td>

<? /* 	posicao motor	 */ ?>
<td class=left_sem_borda width=11%> Posição Motor </td>
<?
$buscapos_motor = mysql_query("select distinct pos_motor from pcp order by 'pos_motor'");
$totalpos_motor = mysql_num_rows($buscapos_motor); $count = $totalpos_motor-1;
for($i=0; $i<$totalpos_motor; $i++) { $nomepos_motor = mysql_result($buscapos_motor,$i,"pos_motor"); $palavraspos_motor.="'$nomepos_motor'";
if($i<$count) { $palavraspos_motor.=","; } }
?>
<td class=left_sem_borda>
<input <?echo $class_pos_motor;?> <?echo $readonly_pos_motor;?> name=pos_motor maxLength=13 size=14 value="<?echo $pos_motor?>"
onKeyUp="checkList(this,arvorepos_motor);Texto_Maiuscula_Cadastro();" id="textbox13" onFocus="nextfield ='gab';">
</td>

<td width=5%> &nbsp; </td>

<td class=right width=5%> Gab. </td>
<td class=left>
<select name="gab">
<option value='' <? echo ($gab==''?"SELECTED":""); ?> >  </option>
<option value='-' <? echo ($gab=='-'?"SELECTED":""); ?> > --- </option>
<option value='I' <? echo ($gab=='I'?"SELECTED":""); ?> > Incluso </option>
</select>
</td>

<td width=5%> &nbsp; </td>

<td class=right width=3%> Qtde* </td>
<td class=left>
<input class=left name=qt maxLength=3 size=4 onKeypress="return validaConteudo(event,'money2');" onkeyup="saltaCampo(event,this,'money2','0');SaltaCampo('qt','valor_uni',event);" onFocus="nextfield ='valor_uni';"  >
</td>

<td width=5%> &nbsp; </td>

<td class=right width=30%> Valor Unitário* </td>
<td class=left>
<input class=left name=valor_uni maxLength=8 size=11 onKeypress="return validaConteudo(event,this,'money2');" onBlur="formatCamp(this,'money2');" onkeyup="saltaCampo(event,this,'money2','0');SaltaCampo('valor_uni','tag',event);" onFocus="return removeCaracs(this,'money2');" >
</td>

</tr>
</table>

<BR>

<table class=sem_borda width=100% align="center">

<tr>

<td class=left_sem_borda width=4%> TAG </td>
<?
$buscatag = mysql_query("select distinct tag from pcp order by 'tag'");
$totaltag = mysql_num_rows($buscatag); $count = $totaltag-1;
for($i=0; $i<$totaltag; $i++) { $nometag = mysql_result($buscatag,$i,"tag"); $palavrastag.="'$nometag'";
if($i<$count) { $palavrastag.=","; } }
?>
<td class=left_sem_borda width=20%>
<input class=left name=tag maxLength=15 size=16 value="<?echo $tag?>"
onKeyUp="SaltaCampo('tag','pintura',event);Texto_Maiuscula_Cadastro();" onFocus="nextfield ='pintura';">
</td>


<td class=left_sem_borda width=6%> Pintura </td>
<?
$buscapintura = mysql_query("select distinct pintura from pcp order by 'pintura'");
$totalpintura = mysql_num_rows($buscapintura); $count = $totalpintura-1;
for($i=0; $i<$totalpintura; $i++) { $nomepintura = mysql_result($buscapintura,$i,"pintura"); $palavraspintura.="'$nomepintura'";
if($i<$count) { $palavraspintura.=","; } }
?>
<td class=left_sem_borda width=20%>
<input class=left name=pintura maxLength=15 size=16 value="<?echo $pintura?>"
onKeyUp="checkList(this,arvorepintura);SaltaCampo('pintura','construcao',event);Texto_Maiuscula_Cadastro();" id="textbox11" onFocus="nextfield ='construcao';">
</td>

<td width=5%> &nbsp; </td>

<td class=left_sem_borda width=5%> Construção </td>
<td class=left_sem_borda>
<select name="construcao">
<option value='' <? echo ($construcao==''?"SELECTED":""); ?> >  </option>
<option value='CP' <? echo ($construcao=='CP'?"SELECTED":""); ?> > Chapa Preta </option>
<option value='AL' <? echo ($construcao=='AL'?"SELECTED":""); ?> > Alumínio </option>
<option value='PP' <? echo ($construcao=='PP'?"SELECTED":""); ?> > Polipropileno </option>
<option value='GF' <? echo ($construcao=='GF'?"SELECTED":""); ?> > Galv. Fogo </option>
<option value='CG' <? echo ($construcao=='CG'?"SELECTED":""); ?> > Chapa Galvanizada </option>
<option value='IN' <? echo ($construcao=='IN'?"SELECTED":""); ?> > Inox </option>
</select>
</td>

<td class=sem_borda> &nbsp; </td>
<td width=5%> &nbsp; </td>
<td class=left_sem_borda width=10%> Carc. Mot  </td>
<?
$buscacarc_mot = mysql_query("select distinct carc_mot from pcp order by 'carc_mot'");
$totalcarc_mot = mysql_num_rows($buscacarc_mot); $count = $totalcarc_mot-1;
for($i=0; $i<$totalcarc_mot; $i++) { $nomecarc_mot = mysql_result($buscacarc_mot,$i,"carc_mot"); $palavrascarc_mot.="'$nomecarc_mot'";
if($i<$count) { $palavrascarc_mot.=","; } }
?>
<td class=left_sem_borda>
<input <?echo $class_carc_mot;?> <?echo $readonly_carc_mot;?> name=carc_mot maxLength=13 size=14 value="<?echo $carc_mot?>"
onKeyUp="checkList(this,arvorecarc_mot);Texto_Maiuscula_Cadastro();" id="textbox13" onFocus="nextfield ='obs';" onchange="this.value = this.value.toUpperCase();">
</td>


<td class=sem_borda> &nbsp; </td>
<td class=sem_borda> &nbsp; </td>
<td class=sem_borda> &nbsp; </td>
<td class=sem_borda> &nbsp; </td>
<td class=sem_borda> &nbsp; </td>

</tr>
</table>

<BR>

<table class=sem_borda width=100% align="center">

<tr>
<td class=left> Obs </td>
<?
$buscaobs = mysql_query("select distinct obs from pcp order by 'obs'");
$totalobs = mysql_num_rows($buscaobs); $count = $totalobs-1;
for($i=0; $i<$totalobs; $i++) { $nomeobs = mysql_result($buscaobs,$i,"obs"); $palavrasobs.="'$nomeobs'";
if($i<$count) { $palavrasobs.=","; } }
?>
<td class=left>
<textarea name=obs rows=2 cols=87 onKeyUp="Texto_Maiuscula_Cadastro();" id="textbox10"><? echo $obs; ?></textarea>
</td>
</tr>
</table>

<? /*-------------------------- FIM DADOS DO VENTILADOR -------------------------------  */?>

<BR>

<? /*-------------------------- INICIO DADOS DO PROJETOS ------------------------  */?>


<table class=sem_borda width=100% align="center">
<tr><td class=titulo height="25" align="center"> DADOS DO PROJETOS </td></tr></table>
<BR>


<table class=sem_borda width=100% align="center"> 

<tr>

<? /* 	potencia motor cv */ ?>
<td class=right_sem_borda width=12%> Potencia Motor </td>
<?
/* pot. motor cv */
$buscapot_motor_cv = mysql_query("select distinct pot_motor_cv from pcp order by 'pot_motor_cv'");
$totalpot_motor_cv = mysql_num_rows($buscapot_motor_cv); $count = $totalpot_motor_cv-1;
for($i=0; $i<$totalpot_motor_cv; $i++) { $nomepot_motor_cv = mysql_result($buscapot_motor_cv,$i,"pot_motor_cv"); $palavraspot_motor_cv.="'$nomepot_motor_cv'";
if($i<$count) { $palavraspot_motor_cv.=","; } }
/* pot. motor polos */
$buscapot_motor_polos = mysql_query("select distinct pot_motor_polos from pcp order by 'pot_motor_polos'");
$totalpot_motor_polos = mysql_num_rows($buscapot_motor_polos); $count = $totalpot_motor_polos-1;
for($i=0; $i<$totalpot_motor_polos; $i++) { $nomepot_motor_polos = mysql_result($buscapot_motor_polos,$i,"pot_motor_polos"); $palavraspot_motor_polos.="'$nomepot_motor_polos'";
if($i<$count) { $palavraspot_motor_polos.=","; } }
?>
<td class=left_sem_borda>
<input <?echo $class_pot_motor_cv;?> <?echo $readonly_pot_motor_cv;?> name=pot_motor_cv maxLength=7 size=7 value="<?echo $pot_motor_cv?>"
onKeyUp="checkList(this,arvorepot_motor_cv);Texto_Maiuscula_Cadastro();" id="textbox14" onFocus="nextfield ='pot_motor_polos';"> CV
<input <?echo $class_pot_motor_polos;?> <?echo $readonly_pot_motor_polos;?> name=pot_motor_polos maxLength=7 size=7 value="<?echo $pot_motor_polos?>"
onKeyUp="checkList(this,arvorepot_motor_polos);Texto_Maiuscula_Cadastro();" id="textbox15" onFocus="nextfield ='tensao_motor';"> Polos
</td>


<? /* 	tensao motor	 */ ?>
<td class=rigth_sem_borda width=11%> Tensão Motor </td>
<?
$buscatensao_motor = mysql_query("select distinct tensao_motor from pcp order by 'tensao_motor'");
$totaltensao_motor = mysql_num_rows($buscatensao_motor); $count = $totaltensao_motor-1;
for($i=0; $i<$totaltensao_motor; $i++) { $nometensao_motor = mysql_result($buscatensao_motor,$i,"tensao_motor"); $palavrastensao_motor.="'$nometensao_motor'";
if($i<$count) { $palavrastensao_motor.=","; } }
?>
<td class=left_sem_borda>
<input <?echo $class_tensao_motor;?> <?echo $readonly_tensao_motor;?> name=tensao_motor maxLength=13 size=14 value="<?echo $tensao_motor?>"
onKeyUp="checkList(this,arvoretensao_motor);Texto_Maiuscula_Cadastro();" id="textbox16" onFocus="nextfield ='vazao';">
</td>

<? /* 	vazao	 */ ?>
<td class=left_sem_borda width=5%> Vazão </td>
<?
$buscavazao = mysql_query("select distinct vazao from pcp order by 'vazao'");
$totalvazao = mysql_num_rows($buscavazao); $count = $totalvazao-1;
for($i=0; $i<$totalvazao; $i++) { $nomevazao = mysql_result($buscavazao,$i,"vazao"); $palavrasvazao.="'$nomevazao'";
if($i<$count) { $palavrasvazao.=","; } }
?>
<td class=left_sem_borda>
<input <?echo $class_vazao;?> <?echo $readonly_vazao;?> name=vazao maxLength=10 size=11 value="<?echo $vazao?>"
onKeyUp="checkList(this,arvorevazao);Texto_Maiuscula_Cadastro();" id="textbox17" onFocus="nextfield ='rotacao_rpm';">
m3/h
</td>


</tr>
</table>


<table class=sem_borda width=100% align="center"> 

<tr>

<? /* 	rotacao rpm	 */ ?>
<td class=left_sem_borda width=5%> Rotação </td>
<?
$buscarotacao_rpm = mysql_query("select distinct rotacao_rpm from pcp order by 'rotacao_rpm'");
$totalrotacao_rpm = mysql_num_rows($buscarotacao_rpm); $count = $totalrotacao_rpm-1;
for($i=0; $i<$totalrotacao_rpm; $i++) { $nomerotacao_rpm = mysql_result($buscarotacao_rpm,$i,"rotacao_rpm"); $palavrasrotacao_rpm.="'$nomerotacao_rpm'";
if($i<$count) { $palavrasrotacao_rpm.=","; } }
?>
<td class=left_sem_borda>
<input <?echo $class_rotacao_rpm;?> <?echo $readonly_rotacao_rpm;?> name=rotacao_rpm maxLength=5 size=6 value="<?echo $rotacao_rpm?>"
onKeyUp="checkList(this,arvorerotacao_rpm);Texto_Maiuscula_Cadastro();" id="textbox18" onFocus="nextfield ='p_estatica_op';">
rpm
</td>


<? /* 	pressao estatica (op) */ ?>
<td class=left_sem_borda width=12%> P. Estática (op) </td>
<?
$buscap_estatica_op = mysql_query("select distinct p_estatica_op from pcp order by 'p_estatica_op'");
$totalp_estatica_op = mysql_num_rows($buscap_estatica_op); $count = $totalp_estatica_op-1;
for($i=0; $i<$totalp_estatica_op; $i++) { $nomep_estatica_op = mysql_result($buscap_estatica_op,$i,"p_estatica_op"); $palavrasp_estatica_op.="'$nomep_estatica_op'";
if($i<$count) { $palavrasp_estatica_op.=","; } }
?>
<td class=left_sem_borda>
<input <?echo $class_p_estatica_op;?> <?echo $readonly_p_estatica_op;?> name=p_estatica_op maxLength=5 size=6 value="<?echo $p_estatica_op?>"
onKeyUp="checkList(this,arvorep_estatica_op);Texto_Maiuscula_Cadastro();" id="textbox19" onFocus="nextfield ='int_lub';">
mmCA
</td>


<? /* 	int. lubrificacao */ ?>
<td class=left_sem_borda width=7%> Int. Lub. </td>
<?
$buscaint_lub = mysql_query("select distinct int_lub from pcp order by 'int_lub'");
$totalint_lub = mysql_num_rows($buscaint_lub); $count = $totalint_lub-1;
for($i=0; $i<$totalint_lub; $i++) { $nomeint_lub = mysql_result($buscaint_lub,$i,"int_lub"); $palavrasint_lub.="'$nomeint_lub'";
if($i<$count) { $palavrasint_lub.=","; } }
?>
<td class=left_sem_borda>
<input <?echo $class_int_lub;?> <?echo $readonly_int_lub;?> name=int_lub maxLength=5 size=6 value="<?echo $int_lub?>"
onKeyUp="checkList(this,arvoreint_lub);Texto_Maiuscula_Cadastro();" id="textbox20" onFocus="nextfield ='data_book';">
hs
</td>


</tr>
</table>


<BR>


<table class=sem_borda width=100% align="center">
<tr><td class=titulo height="25" align="center"> DOCUMENTAÇÃO PARA PROJETOS <font color="#FF0000">( OBS: As seleções serão repetidas para os outros itens. )</font> </td></tr></table>


<BR>


<table class=sem_borda width=100% align="center"> 

<tr>

<? /* 	data book	 */ ?>
<td class=left_sem_borda width=9%> Data Book </td>
<td class=left_sem_borda>
<? if ( $data_book == "DATA_BOOK" ) { $check_data_book = "checked"; } ?>
<input type="checkbox" name=data_book <?echo $check_data_book;?> value="data_book" >
</td>

<? /* 	certificado balanceamento	 */ ?>
<td class=left_sem_borda width=11%> Certif. Balanc. </td>
<td class=left_sem_borda>
<? if ( $certif_balanc == "CERTIF_BALANC" ) { $check_certif_balanc = "checked"; } ?>
<input type="checkbox" name=certif_balanc <?echo $check_certif_balanc;?> value="certif_balanc" >
</td>

<? /* 	certificado materiais	 */ ?>
<td class=left_sem_borda width=13%> Certif. Materiais </td>
<td class=left_sem_borda>
<? if ( $certif_materiais == "CERTIF_MATERIAIS" ) { $check_certif_materiais = "checked"; } ?>
<input type="checkbox" name=certif_materiais <?echo $check_certif_materiais;?> value="certif_materiais" >
</td>

<? /*  desenhos	certificado  */ ?>
<td class=left_sem_borda width=13%> Desenho	Certif. </td>
<td class=left_sem_borda>
<? if ( $desenho_certif== "DESENHO_CERTIF" ) { $check_desenho_certif = "checked"; } ?>
<input type="checkbox" name=desenho_certif <?echo $check_desenho_certif;?> value="desenho_certif" >
</td>


</tr>
</table>

<? /*-------------------------- FIM DADOS DO PROJETOS ------------------------  */?>

<BR>

<table class=sem_borda width=30% align="center">
<tr>
<td>
<input class="botao1" name="cadastrarpcp" type="button" value="Cadastrar PCP" onClick="Cadastro_PCP();" onFocus="nextfield ='done';">
</td>

</tr>
</table>


</td>
</table>
</form>

<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="calendario/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>

</body>
</html>

<script>
var arvorecliente = new Array(<?= $palavrascliente ?>);

var arvoreoc_obra = new Array(<?= $palavrasoc_obra ?>);
var arvoremercado = new Array(<?= $palavrasmercado ?>);
var arvoreestado = new Array(<?= $palavrasestado ?>);
var arvoredescr_vent = new Array(<?= $palavrasdescr_vent ?>);
var arvoremodelo = new Array(<?= $palavrasmodelo ?>);
var arvoretamanho = new Array(<?= $palavrastamanho ?>);
var arvorearranjo = new Array(<?= $palavrasarranjo ?>);
var arvoreclasse = new Array(<?= $palavrasclasse ?>);
var arvorepintura = new Array(<?= $palavraspintura ?>);
var arvoreconstrucao = new Array(<?= $palavrasconstrucao ?>);

var arvoretag = new Array(<?= $palavrastag ?>);
var arvorepos_motor = new Array(<?= $palavraspos_motor ?>);
var arvorepot_motor_cv = new Array(<?= $palavraspot_motor_cv ?>);
var arvorepot_motor_polos = new Array(<?= $palavraspot_motor_polos ?>);
var arvoretensao_motor = new Array(<?= $palavrastensao_motor ?>);
var arvorevazao = new Array(<?= $palavrasvazao ?>);
var arvorerotacao_rpm = new Array(<?= $palavrasrotacao_rpm ?>);
var arvorep_estatica_op = new Array(<?= $palavrasp_estatica_op ?>);
var arvoreint_lub = new Array(<?= $palavrasint_lub ?>);

document.write('<style type="text/css">'+
	  '#listHolder{position:absolute;border:0;}'+
	  '.list{font-family:verdana;font-size:10;color:#000000;background:;}'+
	 '<\/style>')

function SaltaCampo(campo,prox,teclapres){
    var tecla = teclapres.keyCode ? teclapres.keyCode : teclapres.which ? teclapres.which : teclapres.charCode;
    if (tecla == 13){ 
	document.pcp[prox].select(); //se não quiser o foco, desabilite!
	document.pcp[prox].focus();   
  }
}
</script>
