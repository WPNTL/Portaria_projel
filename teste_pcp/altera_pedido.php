<? include "valida_sessao.php" ; include "config_pcp.php"; ?>

<html>
<head>
<title> Alterar Pedido </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/letras_maiscula.js"></script>
<script language="JavaScript" SRC="funcoes/auto_completar.js"></script>
<script language="JavaScript" SRC="funcoes/enter_altera.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
<script language="JavaScript" SRC="funcoes/abrir_fechar.js"></script>
<script language="JavaScript" SRC="funcoes/calendario.js"></script>
<script language="javascript">
if(screen.width>="1024") 
{ 
window.resizeTo(1024,768)
} 
else if(screen.width=="800") 
{ 
window.resizeTo(800,600) 
} 
else if(screen.width<="800") 
{ 
window.resizeTo(600,605) 
} 
</script>

</head>
<body>

<form action="" method="post" name="pcp">

<?

/* ----------------------- BUSCAR DADOS CONFORME ID	------------------------------------*/

$sql = "SELECT * FROM pcp_pedido WHERE id='$id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($dados=mysql_fetch_array($resultado)) {
	
$id = $dados["id"]; 

$data_emissao = $dados["data_emissao"]; 

$nome_cliente = $dados["nome_cliente"]; 
$oc_obra = $dados["oc_obra"]; 

$prazo_entrega_data = $dados["prazo_entrega_data"]; 
$prazo_entrega_dias = $dados["prazo_entrega_dias"]; 
$data_rec_pedido = $dados["data_rec_pedido"]; 

$pendencias = $dados["pendencias"];

}

/* ----------------------- BUSCAR DADOS CONFORME ID	------------------------------------*/


$dia_data_rec_pedido = substr($data_rec_pedido, -2); 
$mes_data_rec_pedido = substr($data_rec_pedido, -5,2);
$ano_data_rec_pedido = substr($data_rec_pedido, -10,4); 
$data_rec_pedido = ($dia_data_rec_pedido."/".$mes_data_rec_pedido."/".$ano_data_rec_pedido); 

$dia_prazo_entrega_data = substr($prazo_entrega_data, -2); 
$mes_prazo_entrega_data = substr($prazo_entrega_data, -5,2);
$ano_prazo_entrega_data = substr($prazo_entrega_data, -10,4); 
if ( $prazo_entrega_data == "" ) { $prazo_entrega_data = ""; }
else
{ $prazo_entrega_data = ($dia_prazo_entrega_data."/".$mes_prazo_entrega_data."/".$ano_prazo_entrega_data); }

if ( $pendencias == "OK" ) {$class_pendencias="class=nedita_left"; $readonly_pendencias="readonly"; $disabled_pendencias="disabled";}

?>

<? /* ID */ ?>
<input class=nedita_left readonly type=hidden name=id_novo value="<?echo $id?>">
<? /* ID */ ?>

<? /* USUARIO */ ?>
<input class=nedita_left readonly type=hidden name=usuario_alt value="<?echo $nome_usuario?>">
<? /* USUARIO */ ?>

<? /* DATA EMISSAO */ 
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
<input class=left name=nome_cliente_novo maxLength=30 size=35 value="<?echo $nome_cliente?>"
onKeyUp="checkList(this,arvorecliente);SaltaCampo('nome_cliente_novo','oc_obra_novo',event);Texto_Maiuscula_Altera_Pedido();" id="textbox1"  onFocus="nextfield ='oc_obra_novo';">
</td>

<td class=right width=10%> OC/Referência* </td>
<?
$buscaoc_obra = mysql_query("select distinct oc_obra from pcp order by 'oc_obra'");
$totaloc_obra = mysql_num_rows($buscaoc_obra); $count = $totaloc_obra-1;
for($i=0; $i<$totaloc_obra; $i++) { $nomeoc_obra = mysql_result($buscaoc_obra,$i,"oc_obra"); $palavrasoc_obra.="'$nomeoc_obra'";
if($i<$count) { $palavrasoc_obra.=","; } }
?>
<td class=left>
<input  class=left name=oc_obra_novo maxLength=30 size=35 value="<?echo $oc_obra?>"
onKeyUp="checkList(this,arvoreoc_obra);SaltaCampo('oc_obra_novo','data_rec_pedido_novo',event);Texto_Maiuscula_Altera_Pedido();" id="textbox2" onFocus="nextfield ='data_rec_pedido_novo';">
</td>
</tr>

<td class=right width=10%> Data Rec. Pedido* </td>
<td class=left>
<input name=data_rec_pedido_novo value="<?echo $data_rec_pedido?>" size="11"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pcp.data_rec_pedido_novo);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a>
</td>

<td class=right width=25%> Prazo Entrega </td>
<td class=left>
<input name=prazo_entrega_data_novo value="<?echo $prazo_entrega_data?>" size="11"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pcp.prazo_entrega_data_novo);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a> Data

<input class=left name=prazo_entrega_dias_novo maxLength=2 size=3 value="<?echo $prazo_entrega_dias?>" onFocus="nextfield ='alterar';" 
onkeyup="saltaCampo(event,this,'money2','0');SaltaCampo('prazo_entrega_dias_novo','alterar',event);" onKeypress="return validaConteudo(event,this);"> Dias
</td>

</table>

<br>

<table class=sem_borda width=100% align="center">

<td class=center> Pendências
<textarea <?echo $class_pendencias;?> <?echo $readonly_pendencias;?> <?echo $disabled_pendencias;?> name=pendencias_novo rows=2 cols=20 onchange="this.value = this.value.toUpperCase();" id="textbox10"><? echo $pendencias; ?></textarea>
</td>

</table>

<BR>

<table class=sem_borda width=30% align="center">
<tr>
<td>
<input class="botao1" name="alterar" type="button" value="Alterar Pedido" onClick="Altera_Pedido();" onFocus="nextfield ='done';">
</td>

<td>
<a class="botao1" href="javascript:window.close()" target="_top"> Fecha Janela </a>
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
