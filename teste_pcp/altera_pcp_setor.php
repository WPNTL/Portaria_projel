<? 
include "valida_sessao.php" ; include "config_pcp.php"; 

/* ---------	DATA DA EMISSÃO	-------- */
$b = date('d'); $c = date('n'); $d = date('Y'); 
if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; 
$data_emissao = $b."/".$c."/".$d; 
$data_atual_periodo = $c."/".$d; 
?>

<html>
<head>
<title> Alterar Dados do PCP </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/letras_maiscula.js"></script>
<script language="JavaScript" SRC="funcoes/auto_completar.js"></script>
<script language="JavaScript" SRC="funcoes/enter_altera.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
<script language="JavaScript" SRC="funcoes/abrir_fechar.js"></script>
<script language="JavaScript" SRC="funcoes/calendario.js"></script>
</head>
<body>


<?

/* ----------------------- BUSCAR DADOS DE LIBERAÇÃO ------------------------------------*/
$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {
 
/* ----------------------- LIBERACAO PARA VER O CAMPO ----------------------------------*/

$lib_alterar = $linha["lib_alterar"]; 

/* SETOR VENDAS */
$lib_vendas = $linha["lib_vendas"]; 
/* SETOR PCP */
$lib_pcp = $linha["lib_pcp"]; 
/* SETOR PCP PRODUCAO */
$lib_pcp_producao = $linha["lib_pcp_producao"]; 
/* IMPRESSAO */
$lib_imprimir_geral = $linha["lib_imprimir_geral"]; 
$lib_imprimir_geral_sp = $linha["lib_imprimir_geral_sp"];
$lib_imprimir_diaria_dia = $linha["lib_imprimir_diaria_dia"]; 

$lib_data_emissao = $linha["lib_data_emissao"]; 

$lib_num_os = $linha["lib_num_os"]; 
$lib_item = $linha["lib_item"]; 
$lib_num_proposta = $linha["lib_num_proposta"]; 
$lib_nome_cliente = $linha["lib_nome_cliente"]; 
$lib_oc_obra = $linha["lib_oc_obra"]; 
$lib_mercado = $linha["lib_mercado"]; 
$lib_estado = $linha["lib_estado"]; 
$lib_data_entrega = $linha["lib_data_entrega"]; 

$lib_local_venda = $linha["lib_local_venda"]; 

$lib_fornecimento_motor = $linha["lib_fornecimento_motor"];
$lib_data_motor_recebido = $linha["lib_data_motor_recebido"]; 

$lib_descr_vent = $linha["lib_descr_vent"]; 
$lib_modelo = $linha["lib_modelo"]; 
$lib_tamanho = $linha["lib_tamanho"]; 
$lib_arranjo = $linha["lib_arranjo"]; 
$lib_classe = $linha["lib_classe"]; 
$lib_rotacao = $linha["lib_rotacao"]; 
$lib_gab = $linha["lib_gab"]; 
$lib_pintura = $linha["lib_pintura"]; 
$lib_construcao = $linha["lib_construcao"]; 

$lib_qt = $linha["lib_qt"]; 
$lib_valor_uni = $linha["lib_valor_uni"]; 
$lib_valor_total = $linha["lib_valor_total"]; 
$lib_valor_total_os = $linha["lib_valor_total_os"]; 

$lib_obs = $linha["lib_obs"]; 

$lib_reprogramacao = $linha["lib_reprogramacao"]; 

$lib_baixa = $linha["lib_baixa"]; $lib_baixa_tipo = $linha["lib_baixa_tipo"];
$lib_data_baixa = $linha["lib_data_baixa"]; 

$lib_data_prog_diaria = $linha["lib_data_prog_diaria"]; 


/* SETOR PROJETOS */
$lib_proj = $linha["lib_proj"]; 

}

/* ----------------------- LIBERACAO PARA VER O CAMPO ----------------------------------*/

/*------------------------- FILTRO LIBERACAO PARA ALTERAR O CAMPO ---------------------------*/

if ($lib_num_os == "ver"){$class_num_os="class=nedita_left"; $readonly_num_os="readonly"; $disabled_num_os="disabled";}

if ($lib_item == "ver"){$class_item="class=nedita_left"; $readonly_item="readonly"; $disabled_item="disabled";}
if ($lib_num_proposta == "ver"){$class_num_proposta="class=nedita_left"; $readonly_num_proposta="readonly"; $disabled_num_proposta="disabled";}
if ($lib_nome_cliente == "ver"){$class_nome_cliente="class=nedita_left"; $readonly_nome_cliente="readonly"; $disabled_nome_cliente="disabled";}
if ($lib_oc_obra == "ver"){$class_oc_obra="class=nedita_left"; $readonly_oc_obra="readonly"; $disabled_obra="disabled";}

if ($lib_mercado == "ver"){$class_mercado="class=nedita_left"; $readonly_mercado="readonly"; $disabled_mercado="disabled";}
if ($lib_estado == "ver"){$class_estado="class=nedita_left"; $readonly_estado="readonly"; $disabled_estado="disabled";}

if ($lib_data_entrega == "ver"){$class_data_entrega="class=nedita_left"; $readonly_data_entrega="readonly"; $disabled_data_entrega="disabled";}

if ($lib_local_venda == "ver"){$class_local_venda="class=nedita_left"; $readonly_local_venda="readonly"; $disabled_local_venda="disabled";}
if ($lib_fornecimento_motor == "ver"){$class_fornecimento_motor="class=nedita_left"; $readonly_fornecimento_motor="readonly"; $disabled_fornecimento_motor="disabled";}

if ($lib_descr_vent == "ver"){$class_descr_vent="class=nedita_left"; $readonly_descr_vent="readonly"; $disabled_descr_vent="disabled";}
if ($lib_modelo == "ver"){$class_modelo="class=nedita_left"; $readonly_modelo="readonly"; $disabled_modelo="disabled";}
if ($lib_tamanho == "ver"){$class_tamanho="class=nedita_left"; $readonly_tamanho="readonly"; $disabled_tamanho="disabled";}
if ($lib_arranjo == "ver"){$class_arranjo="class=nedita_left"; $readonly_arranjo="readonly"; $disabled_arranjo="disabled";}
if ($lib_classe == "ver"){$class_classe="class=nedita_left"; $readonly_classe="readonly"; $disabled_classe="disabled";}
if ($lib_rotacao == "ver"){$class_rotacao="class=nedita_left"; $readonly_rotacao="readonly"; $disabled_rotacao="disabled";}
if ($lib_gab == "ver"){$class_gab="class=nedita_left"; $readonly_gab="readonly"; $disabled_gab="disabled";}
if ($lib_qt == "ver"){$class_qt="class=nedita_left"; $readonly_qt="readonly"; $disabled_qt="disabled";}
if ($lib_valor_uni == "ver"){$class_valor_uni="class=nedita_left"; $readonly_valor_uni="readonly"; $disabled_valor_uni="disabled";}

if ($lib_pintura == "ver"){$class_pintura="class=nedita_left"; $readonly_pintura="readonly"; $disabled_pintura="disabled";}
if ($lib_construcao == "ver"){$class_construcao="class=nedita_left"; $readonly_construcao="readonly"; $disabled_construcao="disabled";}
if ($lib_obs == "ver"){$class_obs="class=nedita_left"; $readonly_obs="readonly"; $disabled_obs="disabled";}

if ($lib_data_motor_recebido == "ver"){$class_data_motor_recebido="class=nedita_left"; $readonly_data_motor_recebido="readonly"; $disabled_data_motor_recebido="disabled";}
if ($lib_reprogramacao == "ver"){$class_reprogramacao="class=nedita_left"; $readonly_reprogramacao="readonly"; $disabled_reprogramacao="disabled";}
if ($lib_baixa == "ver"){$class_baixa="class=nedita_left"; $readonly_baixa="readonly"; $disabled_baixa="disabled";}
if ($lib_data_baixa == "ver"){$class_data_baixa="class=nedita_left"; $readonly_data_baixa="readonly"; $disabled_data_baixa="disabled";}
if ($lib_data_prog_diaria == "ver"){$class_data_prog_diaria="class=nedita_left"; $readonly_data_prog_diaria="readonly"; $disabled_data_prog_diaria="disabled";}


/*	SETOR PROJETOS */
/*	OS	*/
if ($lib_proj == "ver"){$class_proj="class=nedita_left"; $readonly_proj="readonly"; $disabled_proj="disabled";}


/*------------------------- FILTRO LIBERACAO PARA ALTERAR O CAMPO ---------------------------*/


/* ----------------------- BUSCAR DADOS CONFORME ID	------------------------------------*/

$sql = "SELECT * FROM pcp WHERE id='$id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($dados=mysql_fetch_array($resultado)) {
	
$id = $dados["id"]; 

$data_emissao = $dados["data_emissao"]; 

$num_os = $dados["num_os"]; 
$item = $dados["item"]; 

$num_proposta = $dados["num_proposta"]; 
$nome_cliente = $dados["nome_cliente"]; 
$oc_obra = $dados["oc_obra"]; 
$mercado = $dados["mercado"]; 
$estado = $dados["estado"]; 
$data_entrega = $dados["data_entrega"]; 
$local_venda = $dados["local_venda"]; 

$fornecimento_motor = $dados["fornecimento_motor"];
$data_motor_recebido = $dados["data_motor_recebido"]; 

$descr_vent = $dados["descr_vent"]; 
$modelo = $dados["modelo"]; 
$tamanho = $dados["tamanho"]; 
$arranjo = $dados["arranjo"];
$classe = $dados["classe"]; 
$rotacao = $dados["rotacao"]; 
$gab = $dados["gab"]; 
$pintura = $dados["pintura"]; 
$construcao = $dados["construcao"]; 
$qt = $dados["qt"]; 
$valor_uni = $dados["valor_uni"]; 
$valor_total = $dados["valor_total"];

$obs = $dados["obs"]; 

$reprogramacao = $dados["reprogramacao"]; 
$baixa = $dados["baixa"]; 
$data_baixa = $dados["data_baixa"]; 

$data_prog_diaria = $dados["data_prog_diaria"]; 



/*		SETOR PROJETOS		*/
$proj_os_dt_prog = $dados["proj_os_dt_prog"]; 
$proj_os_dt_saida = $dados["proj_os_dt_saida"];
$proj_os_status = $dados["proj_os_status"]; 

}

/* ----------------------- CONVERTER DATAS	------------------------------------*/

$dia_data_emissao = substr($data_emissao, -2); 
$mes_data_emissao = substr($data_emissao, -5,2);
$ano_data_emissao = substr($data_emissao, -10,4); 
$data_emissao = ($dia_data_emissao."/".$mes_data_emissao."/".$ano_data_emissao); 


$dia_data_entrega = substr($data_entrega, -2); 
$mes_data_entrega = substr($data_entrega, -5,2);
$ano_data_entrega = substr($data_entrega, -10,4); 
$data_entrega = ($dia_data_entrega."/".$mes_data_entrega."/".$ano_data_entrega); 


$dia_data_prog_diaria = substr($data_prog_diaria, -2); 
$mes_data_prog_diaria = substr($data_prog_diaria, -5,2);
$ano_data_prog_diaria = substr($data_prog_diaria, -10,4); 
if ($dia_data_prog_diaria == "" AND $mes_data_prog_diaria == "" AND $ano_data_prog_diaria == "") 
{$data_prog_diaria = ($dia_data_prog_diaria."".$mes_data_prog_diaria."".$ano_data_prog_diaria);  } 
else {$data_prog_diaria = ($dia_data_prog_diaria."/".$mes_data_prog_diaria."/".$ano_data_prog_diaria);  }



$dia_data_motor_recebido = substr($data_motor_recebido, -2); 
$mes_data_motor_recebido = substr($data_motor_recebido, -5,2);
$ano_data_motor_recebido = substr($data_motor_recebido, -10,4);
if ($dia_data_motor_recebido == "" AND $mes_data_motor_recebido == "" AND $ano_data_motor_recebido == "") 
{$data_motor_recebido = ($dia_data_motor_recebido."".$mes_data_motor_recebido."".$ano_data_motor_recebido); } 
else {$data_motor_recebido = ($dia_data_motor_recebido."/".$mes_data_motor_recebido."/".$ano_data_motor_recebido); }



$dia_reprogramacao = substr($reprogramacao, -2); 
$mes_reprogramacao = substr($reprogramacao, -5,2); 
$ano_reprogramacao = substr($reprogramacao, -10,4);
if ($dia_reprogramacao == "" AND $mes_reprogramacao == "" AND $ano_reprogramacao == "") 
{$reprogramacao = ($dia_reprogramacao."".$mes_reprogramacao."".$ano_reprogramacao); } 
else {$reprogramacao = ($dia_reprogramacao."/".$mes_reprogramacao."/".$ano_reprogramacao); }



$dia_data_baixa = substr($data_baixa, -2); 
$mes_data_baixa = substr($data_baixa, -5,2); 
$ano_data_baixa = substr($data_baixa, -10,4);
if ($dia_data_baixa == "" AND $mes_data_baixa == "" AND $ano_data_baixa == "") 
{$data_baixa = ($dia_data_baixa."".$mes_data_baixa."".$ano_data_baixa); } 
else {$data_baixa = ($dia_data_baixa."/".$mes_data_baixa."/".$ano_data_baixa); }



/*		SETOR PROJETOS		*/
$dia_proj_os_dt_prog = substr($proj_os_dt_prog, -2); 
$mes_proj_os_dt_prog = substr($proj_os_dt_prog, -5,2);
$ano_proj_os_dt_prog = substr($proj_os_dt_prog, -10,4); 
if ($dia_proj_os_dt_prog == "" AND $mes_proj_os_dt_prog == "" AND $ano_proj_os_dt_prog == "") 
{$proj_os_dt_prog = ($dia_proj_os_dt_prog."".$mes_proj_os_dt_prog."".$ano_proj_os_dt_prog); } 
else {$proj_os_dt_prog = ($dia_proj_os_dt_prog."/".$mes_proj_os_dt_prog."/".$ano_proj_os_dt_prog); }



$dia_proj_os_dt_saida = substr($proj_os_dt_saida, -2); 
$mes_proj_os_dt_saida = substr($proj_os_dt_saida, -5,2);
$ano_proj_os_dt_saida = substr($proj_os_dt_saida, -10,4); 
if ($dia_proj_os_dt_saida == "" AND $mes_proj_os_dt_saida == "" AND $ano_proj_os_dt_saida == "") 
{$proj_os_dt_saida = ($dia_proj_os_dt_saida."".$mes_proj_os_dt_saida."".$ano_proj_os_dt_saida); } 
else {$proj_os_dt_saida = ($dia_proj_os_dt_saida."/".$mes_proj_os_dt_saida."/".$ano_proj_os_dt_saida); }


/* ----------------------- FIM CONVERTER DATAS	------------------------------------*/

?>

<form action="" method="post" name="pcp">



<? /* ----------------------- DADOS OCULTOS PARA FAZER A VERIFICACAO NA ALTERACAO------------------------------*/ ?>

<? /* ID  */ ?>
<input class=nedita_left readonly type=hidden name=id value="<?echo $id?>">
<? /* 
DATA DE EMISSAO 
<input class=nedita_left readonly type=hidden name=data_emissao_novo value="<?echo $data_emissao?>">
 USUARIO 
<input class=nedita_left readonly type=hidden name=usuario_alt value="<?echo $nome_usuario?>">
*/ ?>
<? /* BAIXA */ ?>
<input class=nedita_left readonly type=hidden name=baixa value="<?echo $baixa?>">
<? /* LIB_ALTERAR */ ?>
<input class=nedita_left readonly type=hidden name=lib_alterar value="<?echo $lib_alterar?>">

<? /* ----------------------- DADOS OCULTOS PARA FAZER A VERIFICACAO NA ALTERACAO------------------------------*/ ?>



<table class=sem_borda width="750" align="center">
<td>


<? /*-------------------------- SETOR VENDAS -------------------------------  */ ?>

<? if ( $lib_vendas == "ver" OR $lib_vendas == "alt" OR $lib_vendas == "sim" ) { ?>



<? /*-------------------------- INICIO DADOS DO CLIENTE -------------------------------  */ ?>


<table class=sem_borda width=100% align="center">
<tr><td class=titulo height="25" align="center"> DADOS DO CLIENTE ( * = Dados Obrigatórios ) </td></tr></table>

<br>
<table class=sem_borda width=100% align="center">

<tr>


<? /* 	NUMERO OS 	*/  ?>
<? if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) { ?>
<td class=right width=25%> N° O.S* </td>
<td class=left> 
<input <?echo $class_num_os;?> <?echo $readonly_num_os;?> name=num_os_novo maxLength=5 size=6 value="<?echo $num_os?>" onFocus="nextfield ='item_novo';" onkeyup="saltaCampo(event,this,'money2','0')" onKeypress="return validaConteudo(event,this);">
</td>
<? } else { ?>
<input type=hidden name=num_os_novo value="<?echo $num_os?>" >
<? } ?>


<? /* 	ITEM	 */ ?>
<? if ( $lib_item == "ver" OR $lib_item == "alt" ) { ?>
<td class=right width=5%> Item* </td>
<td class=left>
<input <?echo $class_item;?> <?echo $readonly_item;?> name=item_novo maxLength=2 size=3 value="<?echo $item?>" onFocus="nextfield ='num_proposta_novo';" onkeyup="saltaCampo(event,this,'money2','0')" onKeypress="return validaConteudo(event,this);">
</td>
<? } else { ?>
<input type=hidden name=item_novo value="<?echo $item?>" >
<? } ?>


<td width=5%> &nbsp; </td>


<? /* 	NUMERO PROPOSTA	 */ ?>
<? if ( $lib_num_proposta == "ver" OR $lib_num_proposta == "alt" ) { ?>
<td class=right width=15%> N° Prop. </td>
<td class=left> 
<input <?echo $class_num_proposta;?> <?echo $readonly_num_proposta;?> name=num_proposta_novo maxLength=11 size=12 value="<?echo $num_proposta?>" onFocus="nextfield ='nome_cliente_novo';" onkeyup="saltaCampo(event,this,'money2','0');Texto_Maiuscula_Altera();">
</td>
<? } else { ?>
<input type=hidden name=num_proposta_novo value="<?echo $num_proposta?>" >
<? } ?>


<td width=5%> &nbsp; </td>


<? /* 	NOME CLIENTE	 */ ?>
<? if ( $lib_nome_cliente == "ver" OR $lib_nome_cliente == "alt" ) { ?>
<td class=right width=40%> Nome Cliente* </td>
<?
$buscacliente=mysql_query("select distinct nome_cliente from pcp order by 'nome_cliente'");
$totalcliente=mysql_num_rows($buscacliente);
$count=$totalcliente-1;
for($i=0;$i<$totalcliente;$i++) {$nomecliente=mysql_result($buscacliente,$i,"nome_cliente");$palavrascliente.="'$nomecliente'";
if($i<$count) { $palavrascliente.=","; }   }
?>
<td class=left>
<input <?echo $class_nome_cliente;?> <?echo $readonly_nome_cliente;?> name=nome_cliente_novo maxLength=30 size=31 value="<?echo $nome_cliente?>" onKeyUp="checkList(this,arvorecliente);Texto_Maiuscula_Altera();" id="textbox1"  onFocus="nextfield ='oc_obra_novo';">
</td>
<? } else { ?>
<input type=hidden name=nome_cliente_novo value="<?echo $nome_cliente?>" >
<? } ?>


<td width=8%> &nbsp; </td>


<? /* 	OC / OBRA	 */ ?>
<? if ( $lib_oc_obra == "ver" OR $lib_oc_obra == "alt" ) { ?>
<td class=right width=10%> OC/Obra </td>
<?
$buscaoc_obra = mysql_query("select distinct oc_obra from pcp order by 'oc_obra'");
$totaloc_obra = mysql_num_rows($buscaoc_obra); $count = $totaloc_obra-1;
for($i=0; $i<$totaloc_obra; $i++) { $nomeoc_obra = mysql_result($buscaoc_obra,$i,"oc_obra"); $palavrasoc_obra.="'$nomeoc_obra'";
if($i<$count) { $palavrasoc_obra.=","; } }
?>
<td class=left>
<input <?echo $class_oc_obra;?> <?echo $readonly_oc_obra;?> name=oc_obra_novo maxLength=30 size=31 value="<?echo $oc_obra?>"
onKeyUp="checkList(this,arvoreoc_obra);Texto_Maiuscula_Altera();" id="textbox2" onFocus="nextfield ='estado_novo';">
</td>
<? } else { ?>
<input type=hidden name=oc_obra_novo  value="<?echo $oc_obra?>">
<? } ?>


</tr>
</table>

<BR>

<table class=sem_borda width=100% align="center">

<tr>

<? /* 	ESTADO	 */ ?>
<? if ( $lib_estado == "ver" OR $lib_estado == "alt" ) { ?>
<td class=right> Estado* </td>
<?
$buscaestado = mysql_query("select distinct estado from pcp order by 'estado'");
$totalestado = mysql_num_rows($buscaestado); $count = $totalestado-1;
for($i=0; $i<$totalestado; $i++) { $nomeestado = mysql_result($buscaestado,$i,"estado"); $palavrasestado.="'$nomeestado'";
if($i<$count) { $palavrasestado.=","; } }
?>
<td class=left>
<input <?echo $class_estado;?> <?echo $readonly_estado;?> name=estado_novo maxLength=2 size=3 value="<?echo $estado ?>"
onKeyUp="checkList(this,arvoreestado);Texto_Maiuscula_Altera();" id="textbox4" onFocus="nextfield ='data_entrega_novo';">
</td>
<? } else { ?>
<input type=hidden name=estado_novo value="<?echo $estado?>">
<? } ?>


<td> &nbsp;</td>

<? /* 	DATA ENTREGA	 */ ?>
<? if ( $lib_data_entrega == "ver" OR $lib_data_entrega == "alt") { ?>
<td class=right> Data Entrega* </td>
<td class=left>
<input <?echo $class_data_entrega;?> <?echo $readonly_data_entrega;?> name=data_entrega_novo value="<?echo $data_entrega?>" size="11">
<? if ($lib_data_entrega == "alt" ){ ?>
<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pcp.data_entrega_novo);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a>
<? } ?>
</td>
<? } else { ?>
<input type=hidden name=data_entrega value="<?echo $data_entrega?>">
<? } ?>


<td> &nbsp; </td>


<? /* 	LOCAL VENDA	 */ ?>
<? if ( $lib_local_venda == "ver" OR $lib_local_venda == "alt" ) { ?>
<td class=right> Local Venda* </td>
<td class=left>
<select <?echo $class_local_venda;?> <?echo $readonly_local_venda;?> <?echo $disabled_local_venda;?> name=local_venda_novo>
<option value='' <? echo ($local_venda==''?"SELECTED":""); ?> >  </option>
<option value='Matriz' <? echo ($local_venda=='Matriz'?"SELECTED":""); ?> > Matriz </option>
<option value='São Paulo' <? echo ($local_venda=='São Paulo'?"SELECTED":""); ?> > São Paulo </option>
</select>
</td>
<? } else { ?>
<input type=hidden name=local_venda_novo value="<?echo $local_venda?>">
<? } ?>


<td> &nbsp; </td>


<? /* 	FRONECIMENTO MOTOR	 */ ?>
<? if ( $lib_fornecimento_motor == "ver" OR $lib_fornecimento_motor == "alt" ) { ?>
<td class=right> Forn. Motor* </td>
<td class=left>
<select <?echo $class_fornecimento_motor;?> <?echo $readonly_fornecimento_motor;?> <?echo $disabled_fornecimento_motor;?> name=fornecimento_motor_novo>
<option value='' <? echo ($fornecimento_motor==''?"SELECTED":""); ?> >  </option>
<option value='Cli' <? echo ($fornecimento_motor=='Cli'?"SELECTED":""); ?> > Cliente </option>
<option value='Pro' <? echo ($fornecimento_motor=='Pro'?"SELECTED":""); ?> > Projelmec </option>
<option value='Sem' <? echo ($fornecimento_motor=='Sem'?"SELECTED":""); ?> > Sem Motor </option>
</select>
</td>
<? } else { ?>
<input type=hidden name=fornecimento_motor_novo value="<?echo $fornecimento_motor?>">
<? } ?>

</tr>
</table>
<? /*-------------------------- FIM DADOS DO CLIENTE -------------------------------  */?>

<BR>

<? /*-------------------------- INICIO DADOS DO VENTILADOR ----------------------------  */?>

<table class=sem_borda width=100% align="center">
<tr><td class=titulo height="25" align="center"> DADOS DO VENTILADOR </td></tr></table>
<BR>

<table class=sem_borda width=100% align="center">

<tr>

<? /* 	MERCADO	 */ ?>
<? if ( $lib_mercado == "ver" OR $lib_mercado == "alt") { ?>
<td class=left> Mercado* </td>
<td class=left>
<select <?echo $class_mercado;?> <?echo $readonly_mercado;?> <?echo $disabled_mercado;?> name=mercado_novo >
<option value='' <? echo ($mercado==''?"SELECTED":""); ?> >  </option>
<option value='Agrícola' <? echo ($mercado=='Agrícola'?"SELECTED":""); ?> > Agrícola </option>
<option value='Cerâmica' <? echo ($mercado=='Cerâmica'?"SELECTED":""); ?> > Cerâmica </option>
<option value='Conforto' <? echo ($mercado=='Conforto'?"SELECTED":""); ?> > Conforto </option>
<option value='Industrial' <? echo ($mercado=='Industrial'?"SELECTED":""); ?> > Industrial </option>
</select>
</td>
<? } else { ?>
<input type=hidden name=mercado_novo value="<?echo $mercado?>">
<? } ?>


<td width=10%> &nbsp; </td>


<? /* 	DESCRICAO VENT	 */ ?>
<? if ( $lib_descr_vent == "ver" OR $lib_descr_vent == "alt" ) { ?>
<td class=left width=8%> Descrição* </td>
<?
$buscadescr_vent = mysql_query("select distinct descr_vent from pcp order by 'descr_vent'");
$totaldescr_vent = mysql_num_rows($buscadescr_vent); $count = $totaldescr_vent-1;
for($i=0; $i<$totaldescr_vent; $i++) { $nomedescr_vent = mysql_result($buscadescr_vent,$i,"descr_vent"); $palavrasdescr_vent.="'$nomedescr_vent'";
if($i<$count) { $palavrasdescr_vent.=","; } }
?>
<td class=left>
<input <?echo $class_descr_vent;?> <?echo $readonly_descr_vent;?> name=descr_vent_novo maxLength=25 size=25 value="<?echo $descr_vent?>"
onKeyUp="checkList(this,arvoredescr_vent);Texto_Maiuscula_Altera();" id="textbox5" onFocus="nextfield ='modelo_novo';">
</td>
<? } else { ?>
<input type=hidden name=descr_vent_novo value="<?echo $descr_vent?>">
<? } ?>


<td width=10%> &nbsp; </td>


<? /* 	MODELO	 */ ?>
<? if ( $lib_modelo == "ver" OR $lib_modelo == "alt") { ?>
<td class=left width=5%> Modelo* </td>
<?
$buscamodelo = mysql_query("select distinct modelo from pcp order by 'modelo'");
$totalmodelo = mysql_num_rows($buscamodelo); $count = $totalmodelo-1;
for($i=0; $i<$totalmodelo; $i++) { $nomemodelo = mysql_result($buscamodelo,$i,"modelo"); $palavrasmodelo.="'$nomemodelo'";
if($i<$count) { $palavrasmodelo.=","; } }
?>
<td class=left>
<input <?echo $class_modelo;?> <?echo $readonly_modelo;?> name=modelo_novo maxLength=5 size=7 value="<?echo $modelo?>"
onKeyUp="checkList(this,arvoremodelo);Texto_Maiuscula_Altera();" id="textbox6" onFocus="nextfield ='tamanho_novo';">
</td>
<? } else { ?>
<input type=hidden name=modelo_novo value="<?echo $modelo?>">
<? } ?>


<td width=10%> &nbsp; </td>


<? /* 	TAMANHO	 */ ?>
<? if ( $lib_tamanho == "ver" OR $lib_tamanho == "alt" ) { ?>
<td class=left width=8%> Tamanho* </td>
<?
$buscatamanho = mysql_query("select distinct tamanho from pcp order by 'tamanho'");
$totaltamanho = mysql_num_rows($buscatamanho); $count = $totaltamanho-1;
for($i=0; $i<$totaltamanho; $i++) { $nometamanho = mysql_result($buscatamanho,$i,"tamanho"); $palavrastamanho.="'$nometamanho'";
if($i<$count) { $palavrastamanho.=","; } }
?>
<td class=left>
<input <?echo $class_tamanho;?> <?echo $readonly_tamanho;?> name=tamanho_novo maxLength=5 size=7 value="<?echo $tamanho?>" onKeyUp="checkList(this,arvoretamanho);Texto_Maiuscula_Altera();" id="textbox7" onFocus="nextfield ='arranjo_novo';">
</td>
<? } else { ?>
<input type=hidden name=tamanho_novo value="<?echo $tamanho?>">
<? } ?>


</tr>
</table>

<BR>

<table class=sem_borda width=100% align="center">

<tr>

<? /* 	ARRANJO	 */ ?>
<? if ( $lib_arranjo == "ver" OR $lib_arranjo == "alt" ) { ?>
<td class=right width=5%> Arranjo </td>
<?
$buscaarranjo = mysql_query("select distinct arranjo from pcp order by 'arranjo'");
$totalarranjo = mysql_num_rows($buscaarranjo); $count = $totalarranjo-1;
for($i=0; $i<$totalarranjo; $i++) { $nomearranjo = mysql_result($buscaarranjo,$i,"arranjo"); $palavrasarranjo.="'$nomearranjo'";
if($i<$count) { $palavrasarranjo.=","; } }
?>
<td class=left>
<input <?echo $class_arranjo;?> <?echo $readonly_arranjo;?> name=arranjo_novo maxLength=2 size=3 value="<?echo $arranjo?>" onKeyUp="checkList(this,arvorearranjo);Texto_Maiuscula_Altera();" id="textbox8" onFocus="nextfield ='classe_novo';" >
</td>
<? } else { ?>
<input type=hidden name=arranjo_novo value="<?echo $arranjo?>">
<? } ?>


<td width=5%> &nbsp; </td>


<? /* 	CLASSE	 */ ?>
<? if ( $lib_classe == "ver" OR $lib_classe == "alt" ) { ?>
<td class=right width=5%> Classe </td>
<?
$buscaclasse = mysql_query("select distinct classe from pcp order by 'classe'");
$totalclasse = mysql_num_rows($buscaclasse); $count = $totalclasse-1;
for($i=0; $i<$totalclasse; $i++) { $nomeclasse = mysql_result($buscaclasse,$i,"classe"); $palavrasclasse.="'$nomeclasse'";
if($i<$count) { $palavrasclasse.=","; } }
?>
<td class=left>
<input <?echo $class_classe;?> <?echo $readonly_classe;?> name=classe_novo maxLength=3 size=4 value="<?echo $classe?>"
onKeyUp="checkList(this,arvoreclasse);Texto_Maiuscula_Altera();" id="textbox9" onFocus="nextfield ='rotacao_novo';">
</td>
<? } else { ?>
<input type=hidden name=classe_novo value="<?echo $classe?>">
<? } ?>


<td width=5%> &nbsp; </td>


<? /* 	ROTACAO	 */ ?>
<? if ( $lib_rotacao == "ver" OR $lib_rotacao == "alt" ) { ?>
<td class=right width=28%> Sentido Giro/Fluxo </td>
<td class=left>
<select <?echo $class_rotacao;?> <?echo $readonly_rotacao;?> <?echo $disabled_rotacao;?> name=rotacao_novo>
<option value='' <? echo ($rotacao==''?"SELECTED":""); ?> >  </option>
<option value='A-H' <? echo ($rotacao=='A-H'?"SELECTED":""); ?> > A-H </option>
<option value='H-A' <? echo ($rotacao=='H-A'?"SELECTED":""); ?> > H-A </option>
<option value='R' <? echo ($rotacao=='R'?"SELECTED":""); ?> > R </option>
<option value='CR' <? echo ($rotacao=='CR'?"SELECTED":""); ?> > CR </option>
</select>
</td>
<? } else { ?>
<input type=hidden name=rotacao_novo value="<?echo $rotacao?>">
<? } ?>


<td width=5%> &nbsp; </td>


<? /* 	GABINETE	 */ ?>
<? if ( $lib_gab == "ver" OR $lib_gab == "alt" ) { ?>
<td class=right width=5%> Gabinete </td>
<td class=left>
<select <?echo $class_gab;?> <?echo $readonly_gab;?> <?echo $disabled_gab;?> name=gab_novo>
<option value='' <? echo ($gab==''?"SELECTED":""); ?> >  </option>
<option value='Não' <? echo ($gab=='Não'?"SELECTED":""); ?> > Não </option>
<option value='Sim' <? echo ($gab=='Sim'?"SELECTED":""); ?> > Sim </option>
</select>
</td>
<? } else { ?>
<input type=hidden name=gab_novo value="<?echo $gab?>">
<? } ?>


<td width=5%> &nbsp; </td>


<? /* 	QT	 */ ?>
<? if ( $lib_qt == "ver" OR $lib_qt == "alt" ) { ?>
<td class=right width=3%> Qtde* </td>
<td class=left>
<input <?echo $class_qt;?> <?echo $readonly_qt;?> name=qt_novo maxLength=3 size=4 onKeypress="return validaConteudo(event,this,'money2');" onkeyup="saltaCampo(event,this,'money2','0')" onFocus="nextfield ='valor_uni_novo';" value=<? echo $qt;?> >
</td>
<? } else { ?>
<input type=hidden name=qt_novo value="<?echo $qt?>">
<? } ?>


<td width=5%> &nbsp; </td>


<? /* 	VALOR UNITARIO	 */ ?>
<? if ( $lib_valor_uni == "ver" OR $lib_valor_uni == "alt" ) { ?>
<td class=right width=20%> Valor Unitário* </td>
<td class=left>
<input <?echo $class_valor_uni;?> <?echo $readonly_valor_uni;?> name=valor_uni_novo maxLength=8 size=11 onKeypress="return validaConteudo(event,this,'money2');" onBlur="formatCamp(this,'money2');" onkeyup="saltaCampo(event,this,'money2','0')" onFocus="return removeCaracs(this,'money2');" value=<? echo $valor_uni; ?> >
</td>
<? } else { ?>
<input type=hidden name=valor_uni_novo value="<?echo $valor_uni?>">
<? } ?>

</tr>
</table>

<BR>

<table class=sem_borda width=100% align="center">

<tr>

<? /* 	PINTURA	 */ ?>
<? if ( $lib_pintura == "ver" OR $lib_pintura == "alt" ) { ?>
<td class=left_sem_borda width=6%> Pintura </td>
<?
$buscapintura = mysql_query("select distinct pintura from pcp order by 'pintura'");
$totalpintura = mysql_num_rows($buscapintura); $count = $totalpintura-1;
for($i=0; $i<$totalpintura; $i++) { $nomepintura = mysql_result($buscapintura,$i,"pintura"); $palavraspintura.="'$nomepintura'";
if($i<$count) { $palavraspintura.=","; } }
?>
<td class=left_sem_borda width=20%>
<input <?echo $class_pintura;?> <?echo $readonly_pintura;?> name=pintura_novo maxLength=15 size=16 value="<?echo $pintura?>"
onKeyUp="checkList(this,arvorepintura);Texto_Maiuscula_Altera();" id="textbox11" onFocus="nextfield ='construcao_novo';">
</td>
<? } else { ?>
<input type=hidden name=pintura_novo value="<?echo $pintura?>">
<? } ?>


<td width=5%> &nbsp; </td>


<? /* 	CONSTRUCAO	 */ ?>
<? if ( $lib_construcao == "ver" OR $lib_construcao == "alt" ) { ?>
<td class=left_sem_borda width=5%> Construção </td>
<?
$buscaconstrucao = mysql_query("select distinct construcao from pcp order by 'construcao'");
$totalconstrucao = mysql_num_rows($buscaconstrucao); $count = $totalconstrucao-1;
for($i=0; $i<$totalconstrucao; $i++) { $nomeconstrucao = mysql_result($buscaconstrucao,$i,"construcao"); $palavrasconstrucao.="'$nomeconstrucao'";
if($i<$count) { $palavrasconstrucao.=","; } }
?>
<td class=left_sem_borda>
<input <?echo $class_construcao;?> <?echo $readonly_construcao;?> name=construcao_novo maxLength=15 size=16 value="<?echo $construcao?>"
onKeyUp="checkList(this,arvoreconstrucao);Texto_Maiuscula_Altera();" id="textbox12" onFocus="nextfield ='obs_novo';">
</td>
<? } else { ?>
<input type=hidden name=construcao_novo value="<?echo $construcao?>">
<? } ?>


<td class=sem_borda> &nbsp; </td>
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

<? /* 	OBS	 */ ?>
<? if ( $lib_obs == "ver" OR $lib_obs == "alt" ) { ?>
<td class=left> Obs </td>
<?
$buscaobs = mysql_query("select distinct obs from pcp order by 'obs'");
$totalobs = mysql_num_rows($buscaobs); $count = $totalobs-1;
for($i=0; $i<$totalobs; $i++) { $nomeobs = mysql_result($buscaobs,$i,"obs"); $palavrasobs.="'$nomeobs'";
if($i<$count) { $palavrasobs.=","; } }
?>
<td class=left>
<textarea <?echo $class_obs;?> <?echo $readonly_obs;?> name=obs_novo rows=2 cols=87 id="textbox10"><? echo $obs; ?></textarea>
</td>
<? } else { ?>
<input type=hidden name=obs_novo value="<?echo $obs?>">
<? } ?>

</tr>
</table>
<? /*-------------------------- FIM DADOS DO VENTILADOR -------------------------------  */?>

<? } ?>
<? /*-------------------------- SETOR VENDAS -------------------------------  */ ?>

<BR>

<? /*-------------------------- INICIO DADOS DO PCP -------------------------------  */?>
<? if ( $lib_pcp == "ver" OR $lib_pcp == "alt" OR $lib_pcp == "sim" ) { ?>

<table class=sem_borda width=100% align="center">
<tr><td class=titulo height="25" align="center"> DADOS DO PCP </td></tr></table>
<BR>


<table class=sem_borda width=100% align="center">

<tr>

<td width=3%> &nbsp; </td>


<? /* 	REPROGRAMACAO	 */ ?>
<? if ( $lib_reprogramacao == "ver" OR $lib_reprogramacao == "alt" ) { ?>
<td class=left width=6%> Reprog. </td>
<td class=left>
<input <?echo $class_reprogramacao;?> <?echo $readonly_reprogramacao;?> name=reprogramacao_novo value="<?echo $reprogramacao?>" size="11">
<? if ( $lib_reprogramacao == "alt" ) { ?>
<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pcp.reprogramacao_novo);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a>

<? /* TIPO DE ALTERAÇÃ0 NA REPROGRAMAÇÃO */ ?>
Altera: 
<INPUT TYPE="radio" NAME=tipo_reprogramacao VALUE="item" checked <?echo $class_reprogramacao;?> <?echo $readonly_reprogramacao;?> <?echo $disabled_reprogramacao;?> > Item
<INPUT TYPE="radio" NAME=tipo_reprogramacao VALUE="os" <?echo $class_reprogramacao;?> <?echo $readonly_reprogramacao;?> <?echo $disabled_reprogramacao;?> > OS
</td>
<? } } else { ?>
<input type=hidden name=reprogramacao_novo value="<?echo $reprogramacao?>">
<? } ?>
 
 
<td width=3%> &nbsp; </td>


<? /* 	BAIXA	------ USUARIOS LIBERADOS PARA BAIXAR --------- */  ?>

<? if ( $lib_baixa == "ver" OR $lib_baixa == "alt" ) {
	if ( $lib_baixa_tipo == "alt" OR $lib_baixa_tipo == "todos" ) {  ?>
<td class=left width=5%> Baixa </td>
<td class=left>
<select <?echo $class_baixa;?> <?echo $readonly_baixa;?> <?echo $disabled_baixa;?> name=baixa_novo OnChange="Baixa()">
<option value='P' <? echo ($baixa=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($baixa=='E'?"SELECTED":""); ?> > E </option>
<option value='S' <? echo ($baixa=='S'?"SELECTED":""); ?> > S </option>
<option value='C' <? echo ($baixa=='C'?"SELECTED":""); ?> > C </option>
</select>
<? }

/* ------ USUARIOS LIBERADOS PARA SOMENTE PROCESSO DE EXPEDIÇÃO --------- */
elseif ( $lib_baixa == "alt" AND $lib_baixa_tipo == "E" OR $lib_baixa_tipo == "e" ) {  ?>
<td class=left width=5%> Baixa </td>
<td class=left>
<input type="checkbox" name=baixa_novo <?echo $class_baixa;?> <?echo $readonly_baixa;?> <?echo $check_baixa;?> value="E" > 
</td>
<? } 
/*  -------- USUARIOS LIBERADOS PARA SOMENTE VISUALIZAÇÃO ----------- */
elseif ( $lib_baixa == "n_ver" ) {  {  
if ( $baixa == "E" ) { $check_baixa = "checked"; }
?>
<td class=left width=5%> Baixa </td>
<td class=left>
<input type="checkbox" name=baixa_novo <?echo $class_baixa;?> <?echo $readonly_baixa;?> <?echo $check_baixa;?> >
</td>
<? } } ?>

<? /* 	DATA BAIXA	 */  ?>
<? if ( $lib_data_baixa == "ver" OR $lib_data_baixa == "alt" ) { ?>
<td class=left width=5%> Data Baixa </td>
<td class=left>
<input <?echo $class_data_baixa;?> <?echo $readonly_data_baixa;?> name=data_baixa_novo value="<?echo $data_baixa?>" size="11">
<? if ( $lib_data_baixa == "alt" ) { ?>
<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pcp.data_baixa_novo);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a>

<? /* TIPO DE ALTERAÇÃ0 NA BAIXA */ ?>
Altera: 
<INPUT TYPE="radio" NAME="tipo_baixa" VALUE="item" checked  <?echo $class_baixa;?> <?echo $readonly_baixa;?> <?echo $disabled_baixa;?> > Item
<INPUT TYPE="radio" NAME="tipo_baixa" VALUE="os"  <?echo $class_baixa;?> <?echo $readonly_baixa;?> <?echo $disabled_baixa;?> > OS
</td>
<? } } } else { ?>
<input type=hidden name=data_baixa_novo value="<?echo $data_baixa?>">
<? } ?>

</tr>
</table>

<? } ?>
<? /*-------------------------- FIM DADOS DO PCP -------------------------------  */?>

<BR>

<? /*-------------------------- INICIO DADOS DO PCP PRODUÇÃO ------------------------  */?>
<? if ( $lib_pcp_producao == "ver" OR $lib_pcp_producao == "alt" OR $lib_pcp_producao == "sim" ) { ?>

<table class=sem_borda width=100% align="center">
<tr><td class=titulo height="25" align="center"> DADOS DO PCP PRODUÇÃO </td></tr></table>
<BR>

<table class=sem_borda width=100% align="center"> 

<tr>

<? if ( $lib_data_prog_diaria == "ver" OR $lib_data_prog_diaria == "alt" ) { ?>
<td class=left width=14%> Data Prog. Diária </td>
<td class=left width=40%>
<input <?echo $class_data_prog_diaria;?> <?echo $readonly_data_prog_diaria;?> name=data_prog_diaria_novo value="<?echo $data_prog_diaria?>" size="11">
<? if ( $lib_data_prog_diaria == "alt" ) { ?>
<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pcp.data_prog_diaria_novo);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a>

<? /* TIPO DE ALTERAÇÃ0 NA DATA PROG. DIARIA */ ?>
 Altera: 
<INPUT TYPE="radio" NAME="tipo_data_prog_diaria" VALUE="item" checked <?echo $class_data_prog_diaria;?> <?echo $readonly_data_prog_diaria;?> <?echo $disabled_data_prog_diaria;?> > Item

<INPUT TYPE="radio" NAME="tipo_data_prog_diaria" VALUE="os" <?echo $class_data_prog_diaria;?> <?echo $readonly_data_prog_diaria;?> <?echo $disabled_data_prog_diaria;?> > OS</td>

<? } } else { ?>
<input type=hidden name=data_prog_diaria value="<?echo $data_prog_diaria?>">
<? } ?>

<td class=left> &nbsp; </td>
<td class=left> &nbsp; </td>

</tr>
</table>

<? } ?>
<? /*-------------------------- FIM DADOS DO PCP PRODUÇÃO ------------------------  */?>

<BR>

<? /*	-------------------------- INICIO DADOS SETOR PROJETOS ------------------------  */?>
<? if ( $lib_proj == "ver" OR $lib_proj == "alt" ) { ?>

<table class=sem_borda width=100% align="center">
<tr><td class=titulo height="25" align="center"> DADOS DO SETOR PROJETOS </td></tr></table>

<BR>

<table class=sem_borda width=100% align="center"> 

<tr>

<? /* O.S DATA PROGRAMADA */ ?>
<td class=left width=14%> Data O.S Prog. </td>
<td class=left width=20%>
<input <?echo $class_proj;?> <?echo $readonly_proj;?> name=proj_os_dt_prog_novo value="<?echo $proj_os_dt_prog?>" size="11">
<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pcp.proj_os_dt_prog_novo);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a>
</td>

<?	/*  O.S  STATUS	*/ ?>
<td class=left width=9%> O.S Status </td>
<td class=left width=8%>
<select <?echo $class_proj;?> <?echo $readonly_proj;?>  <?echo $disabled_proj;?> name=proj_os_status_novo >
<option value='' <? echo ($proj_os_status==''?"SELECTED":""); ?> >  </option>
<option value='P' <? echo ($proj_os_status=='P'?"SELECTED":""); ?> > P </option>
<option value='E' <? echo ($proj_os_status=='E'?"SELECTED":""); ?> > E </option>
<option value='N' <? echo ($proj_os_status=='N'?"SELECTED":""); ?> > N </option>
</select>
</td>


<td class=left> &nbsp; </td>
<td class=left> &nbsp; </td>
<td class=left> &nbsp; </td>
<td class=left> &nbsp; </td>
<td class=left> &nbsp; </td>
<td class=left> &nbsp; </td>
<td class=left> &nbsp; </td>

</tr>
</table>

<? } else { ?>
<input type=hidden name=proj_os_dt_prog_novo value="<?echo $proj_os_dt_prog?>">
<input type=hidden name=proj_os_status_novo value="<?echo $proj_os_status?>">
<? } ?>
<? /*-------------------------- FIM DADOS DO SETOR PROJETOS ------------------------  */?>


<BR>


<? /*-------------------------- BOTOES ------------------------  */?>

<table class=sem_borda width=40% align="center">
<tr>
<? if ( $lib_alterar == "sim" ) { ?>
<td>
<input class="botao1" name="Atualizar_Cadastro" type="button" value="Atualizar_Cadastro" OnClick="Alterar_DB();" onFocus="nextfield ='done';">
</td>
<? } ?>
<td>
<input class="botao1" type="submit" value="Fechar Janela" OnClick="javascript:window.close();">
</td>
</tr>
</table>



</td>
</table>

<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="calendario/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>

</form>
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

document.write('<style type="text/css">'+
	  '#listHolder{position:absolute;border:0;}'+
	  '.list{font-family:verdana;font-size:10;color:#000000;background:;}'+
	 '<\/style>')
</script>
