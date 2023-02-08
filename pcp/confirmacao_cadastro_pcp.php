<? include "valida_sessao.php" ; include "config_pcp.php"; $num_os = $_POST["num_os"]; ?>
<html>
<head>
<title> Confirmação do Cadastro PCP </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
<script language="JavaScript" SRC="funcoes/abrir_fechar.js"></script>
<script language="JavaScript" SRC="funcoes/calendario.js"></script>
</head>
<body>

<form action="" method="post" name="pcp">

<table class=sem_borda width="750" align="center">
<td>

<table class=sem_borda width=30% align="center">
<tr><td class=titulo height="25" align="center"> O.S = <?echo $num_os?> </td></tr>
<tr><td class=titulo height="25" align="center"> Sub Total = <?echo "R$". number_format($valor_total,2,',',''); ?> </td></tr>
<?
$query = "SELECT SUM(valor_total) as valor_total FROM pcp WHERE num_os='$num_os' order by 'id'";
$sql = mysql_query($query);
$valor_total_os = mysql_fetch_array($sql);
?>
<tr><td class=titulo height="25" align="center"> Total O.S = <? echo "R$". number_format($valor_total_os['valor_total'], 2, ",", ".");?> </td></tr>
<tr><td class=titulo height="25" align="center"> Cadastrada com Sucesso. </td></tr>
</table>

<BR>

<table class=sem_borda width=100% align="center">
<tr>
<td class=titulo height="25" align="center"> Deseja Cadastrar Novo Item na O.S = <?echo $num_os?> ?
<input class="botao1" type="button" value="Sim" onClick="Cadastro_Novo_Item();">
<input class="botao1" type="button" value="Não" onClick="Cadastro_Nova_Os();"></td>
</tr></table>


<?/* DADOS DO CLIENTE*/ ?>
<input class=nedita_left readonly type=hidden name="num_os" value="<?echo $num_os?>"><BR>
<input class=nedita_left readonly type=hidden name="nome_cliente" value="<?echo $nome_cliente?>"><BR>
<input class=nedita_left readonly type=hidden name="oc_obra" value="<?echo $oc_obra?>"><BR>
<input class=nedita_left readonly type=hidden name="mercado" value="<?echo $mercado?>"><BR>
<input class=nedita_left readonly type=hidden name="representante" value="<?echo $representante?>"><BR>
<input class=nedita_left readonly type=hidden name="estado" value="<?echo $estado ?>"><BR>
<input class=nedita_left readonly type=hidden name="data_entrega" value="<?echo $data_entrega ?>" size="11"><BR>
<input class=nedita_left readonly type=hidden name="local_venda" value="<?echo $local_venda ?>" size="11"><BR>
<input class=nedita_left readonly type=hidden name="fornecimento_motor" value="<?echo $fornecimento_motor ?>" size="11"><BR> 

<?/* DADOS DO VENTILADOR */ ?>
<input class=nedita_left readonly type=hidden name="descr_vent" value="<?echo $descr_vent?>"><BR>
<input class=nedita_left readonly type=hidden name="modelo" value="<?echo $modelo?>"><BR>
<input class=nedita_left readonly type=hidden name="tamanho" value="<?echo $tamanho?>"><BR>
<input class=nedita_left readonly type=hidden name="arranjo" value="<?echo $arranjo?>"><BR>
<input class=nedita_left readonly type=hidden name="classe" value="<?echo $classe?>"><BR>
<input class=nedita_left readonly type=hidden name="rotacao" value="<?echo $rotacao?>"><BR>
<input class=nedita_left readonly type=hidden name="gab" value="<?echo $gab?>"><BR>
<input class=nedita_left readonly type=hidden name="qt" value="<?echo $qt?>"><BR>
<input class=nedita_left readonly type=hidden name="valor_uni" value="<?echo $valor_uni;?>"><BR>
<input class=nedita_left readonly type=hidden name="obs" value="<?echo $obs;?>"><BR>

</form>
</td>
</table>
</body>
</html>

