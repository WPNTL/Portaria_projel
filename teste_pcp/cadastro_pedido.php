<? include "valida_sessao.php" ; include "config_pcp.php"; ?>

<html>
<head>
<title> Cadastrar Pedido </title>
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
<? /* USUARIO */ ?>

<?  /* DATA EMISSAO */ 
	$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 
	if(strlen($dia_emissao) == 1){$dia_emissao = "0".$dia_emissao;};
  	if(strlen($mes_emissao) == 1){$mes_emissao = "0".$mes_emissao;};
	$data_emissao = ($dia_emissao."/".$mes_emissao."/".$ano_emissao); 
	/* DATA EMISSAO */ 
?>
<input class=nedita_left readonly type=hidden name=data_emissao_novo value="<?echo $data_emissao;?>">

<table class=sem_borda width="750" align="center">
<td>


<? /*-------------------------- INICIO DADOS DO CLIENTE -------------------------------  */?>

<table class=sem_borda width=100% align="center">
<tr>
<td class=titulo height="25" align="center"> 
DADOS DO CLIENTE ( * = Dados Obrigatórios ) 
</td>
</tr>
</table>

<BR>

<table class=sem_borda width=100% align="center">
<tr>

<td class=right width=40%> Nome Cliente* </td>
<?
$buscacliente=mysql_query("select distinct nome_cliente from pcp order by 'nome_cliente'");
$totalcliente=mysql_num_rows($buscacliente);
$count=$totalcliente-1;
for($i=0;$i<$totalcliente;$i++) {$nomecliente=mysql_result($buscacliente,$i,"nome_cliente");$palavrascliente.="'$nomecliente'";
if($i<$count) { $palavrascliente.=","; }   }
?>
<td class=left>
<input class=left name=nome_cliente maxLength=30 size=35 value="<?echo $nome_cliente?>"
onKeyUp="checkList(this,arvorecliente);SaltaCampo('nome_cliente','oc_obra',event);Texto_Maiuscula_Cadastro_Pedido();" id="textbox1"  onFocus="nextfield ='oc_obra';">
</td>

<td class=right width=10%> OC/Referência* </td>
<?
$buscaoc_obra = mysql_query("select distinct oc_obra from pcp order by 'oc_obra'");
$totaloc_obra = mysql_num_rows($buscaoc_obra); $count = $totaloc_obra-1;
for($i=0; $i<$totaloc_obra; $i++) { $nomeoc_obra = mysql_result($buscaoc_obra,$i,"oc_obra"); $palavrasoc_obra.="'$nomeoc_obra'";
if($i<$count) { $palavrasoc_obra.=","; } }
?>
<td class=left>
<input  class=left name=oc_obra maxLength=30 size=35 value="<?echo $oc_obra?>"
onKeyUp="checkList(this,arvoreoc_obra);SaltaCampo('oc_obra','data_rec_pedido',event);Texto_Maiuscula_Cadastro_Pedido();" id="textbox2" onFocus="nextfield ='data_rec_pedido';">
</td>
</tr>

<td class=right width=10%> Data Rec. Pedido* </td>
<td class=left>
<input name=data_rec_pedido value="<?echo $data_rec_pedido?>" size="11"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pcp.data_rec_pedido);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a>
</td>

<td class=right width=25%> Prazo Entrega </td>
<td class=left>
<input name=prazo_entrega_data value="<?echo $prazo_entrega_data?>" size="11"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pcp.prazo_entrega_data);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a> Data

<input class=left name=prazo_entrega_dias maxLength=2 size=3 value="<?echo $prazo_entrega_dias?>" onFocus="nextfield ='cadastrar';" 
onkeyup="saltaCampo(event,this,'money2','0');SaltaCampo('prazo_entrega_dias','pendencias',event);" onKeypress="return validaConteudo(event,this);"> Dias
</td>



</table>


<BR>

<table class=sem_borda width=30% align="center">
<tr>
<td>
<input class="botao1" name="cadastrar" type="button" value="Cadastrar Pedido" onClick="Cadastro_Pedido();" onFocus="nextfield ='done';">
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
