<? include "valida_sessao.php" ; include"config_pcp.php"; ?>
<html>
<head>
<title> Alterar Dados PCP </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
<script language="JavaScript" SRC="funcoes/abrir_fechar.js"></script>
</head>
<body>


<form action="" method="post" name="pcp">

<?

/*	------------	CHECK AUTORIZAÇÃO DE ALTERAÇÃO POR CAMPO ------------	*/

$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {
$lib_num_os_campo = $linha["lib_num_os_campo"]; $lib_item_campo = $linha["lib_item_campo"]; $lib_num_proposta_campo = $linha["lib_num_proposta_campo"]; 
$lib_nome_cliente_campo = $linha["lib_nome_cliente_campo"]; $lib_oc_obra_campo = $linha["lib_oc_obra_campo"]; $lib_mercado_campo = $linha["lib_mercado_campo"]; $lib_estado_campo = $linha["lib_estado_campo"]; $lib_data_entrega_campo = $linha["lib_data_entrega_campo"]; $lib_local_venda_campo = $linha["lib_local_venda_campo"]; $lib_fornecimento_motor_campo = $linha["lib_fornecimento_motor_campo"]; 

$lib_descr_vent_campo = $linha["lib_descr_vent_campo"]; $lib_modelo_campo = $linha["lib_modelo_campo"]; $lib_tamanho_campo = $linha["lib_tamanho_campo"]; $lib_arranjo_campo = $linha["lib_arranjo_campo"]; $lib_classe_campo = $linha["lib_classe_campo"]; $lib_rotacao_campo = $linha["lib_rotacao_campo"]; $lib_gab_campo = $linha["lib_gab_campo"]; $lib_pintura_campo = $linha["lib_pintura_campo"]; $lib_construcao_campo = $linha["lib_construcao_campo"]; 
$lib_qt_campo = $linha["lib_qt_campo"]; $lib_valor_uni_campo = $linha["lib_valor_uni_campo"]; $lib_valor_total_campo = $linha["lib_valor_total_campo"]; 

$lib_obs_campo = $linha["lib_obs_campo"]; $lib_data_motor_recebido_campo = $linha["lib_data_motor_recebido_campo"]; $lib_reprogramacao_campo = $linha["lib_reprogramacao_campo"]; $lib_baixa_campo = $linha["lib_baixa_campo"]; $lib_data_baixa_campo = $linha["lib_data_baixa_campo"]; $lib_data_prog_diaria_campo = $linha["lib_data_prog_diaria_campo"]; 
}

/*	------------	CHECK AUTORIZAÇÃO DE ALTERAÇÃO POR CAMPO ------------	*/


if ($lib_num_os_campo == "") {
//echo "quant_os ".$quant_os; echo "<br>";	echo "id ".$id; echo "<br>";  echo "num_os ".$num_os; echo "<br>";
 for ($i=1; $i<=$quant_os ; $i++) { //echo "i ".$i;
 $id_novo = $id[$i] ; $num_os_novo = $num_os[$i] ;
 $sql = "UPDATE pcp SET data_emissao_alt=NOW(), num_os='$num_os_novo' ,usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!"); 
 }
}

if ($lib_item_campo == ""){
 for ($i=1; $i<=$quant_os ; $i++) { //echo "i ".$i;
 $id_novo = $id[$i] ; $item_novo = $item[$i] ;
 $sql = "UPDATE pcp SET data_emissao_alt=NOW(), item='$item_novo' ,usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");
 }
}

if ($lib_num_proposta_campo == ""){
 for ($i=1; $i<=$quant_os ; $i++) { //echo "i ".$i;
 $id_novo = $id[$i] ; $num_proposta_novo = $num_proposta[$i] ;
 $sql = "UPDATE pcp SET data_emissao_alt=NOW(), num_proposta='$num_proposta_novo' ,usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");
 }
}

if ($lib_nome_cliente_campo == ""){
  for ($i=1; $i<=$quant_os ; $i++) { //echo "i ".$i;
 $id_novo = $id[$i] ; $nome_cliente_novo = $nome_cliente[$i] ;
 $sql = "UPDATE pcp SET data_emissao_alt=NOW(), nome_cliente='$nome_cliente_novo' ,usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");
 }
}




/*
if ($lib_oc_obra_campo == ""){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), oc_obra='$oc_obra_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

if ($lib_mercado_campo == ""){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), mercado='$mercado_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

if ($lib_estado_campo == ""){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), estado='$estado_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

if ($lib_data_entrega_campo == ""){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), data_entrega='$data_entrega_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

if ($lib_local_venda_campo == ""){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), local_venda='$local_venda_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

if ($lib_fornecimento_motor_campo == ""){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), fornecimento_motor='$fornecimento_motor_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

if ($lib_descr_vent_campo == ""){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), descr_vent='$descr_vent_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

if ($lib_modelo_campo == ""){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), modelo='$modelo_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

if ($lib_tamanho_campo == ""){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), tamanho='$tamanho_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

if ($lib_arranjo_campo == ""){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), arranjo='$arranjo_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

if ($lib_classe_campo == ""){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), classe='$classe_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

if ($lib_rotacao_campo == ""){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), rotacao='$rotacao_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

if ($lib_gab_campo == ""){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), gab='$gab_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}


if ($lib_qt_campo == ""){
  if ($tipo_baixa == "item" AND $baixa_novo == "C") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), qt='$qt_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  }
  if ($tipo_baixa == "os" AND $baixa_novo == "C") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), qt='$qt_novo' ,usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");   }
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), qt='$qt_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");
}


if ($lib_valor_uni_campo == ""){
  if ($tipo_baixa == "item" AND $baixa_novo == "C") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), valor_uni='$valor_uni_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  }
  if ($tipo_baixa == "os" AND $baixa_novo == "C") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), valor_uni='$valor_uni_novo' ,usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");   }
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), valor_uni='$valor_uni_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");
} else {
 if ($tipo_baixa == "item" AND $baixa_novo == "C") { $valor_uni_novo = 0;
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), valor_uni='$valor_uni_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  }
  if ($tipo_baixa == "os" AND $baixa_novo == "C") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), valor_uni='$valor_uni_novo' ,usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");   }
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), valor_uni='$valor_uni_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");	
}

if ($lib_valor_total_campo == ""){
  if ($tipo_baixa == "item" AND $baixa_novo == "C") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), valor_total='$sub_total3' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  }
  if ($tipo_baixa == "os" AND $baixa_novo == "C") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), valor_total='$sub_total3' ,usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");   }
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), valor_total='$sub_total3' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");
}


if ($lib_pintura_campo == ""){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), pintura='$pintura_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}
if ($lib_construcao_campo == ""){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), construcao='$construcao_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

if ($lib_obs_campo == ""){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), obs='$obs_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

if ($lib_data_motor_recebido_campo == ""){$sql = "UPDATE pcp SET data_emissao_alt=NOW(), data_motor_recebido='$data_motor_recebido_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}



if ($lib_reprogramacao_campo == ""){
	if ($tipo_reprogramacao == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), reprogramacao='$reprogramacao_novo' ,usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 
	if ($tipo_reprogramacao == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), reprogramacao='$reprogramacao_novo' ,usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!"); } 
}


//echo "antes baixa =". $baixa; echo "<br>";

//echo "antes baixa_novo =". $baixa_novo; echo "<br>"; 

if  ( $baixa_novo == "E" ) { $baixa_novo = "E"; } 
if  ( $baixa_novo == "" ) { $baixa_novo = "P"; } 

//echo "depois baixa =". $baixa_novo; echo "<br>";

if ($lib_baixa_campo == "E" or $lib_baixa_campo == "e") {
	if ($tipo_baixa == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), baixa='$baixa_novo', data_baixa='$data_baixa_novo', usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 
	
	if ($tipo_baixa == "os" AND $baixa == "P" OR $baixa == "E") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), baixa='$baixa_novo', data_baixa='$data_baixa_novo', usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo' AND baixa='$baixa'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}

	elseif ($tipo_baixa == "os" AND $baixa == "S" OR $baixa == "C") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), baixa='$baixa_novo', data_baixa='$data_baixa_novo', usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}
} 

if ($lib_baixa_campo == "") {
	if ($tipo_baixa == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), baixa='$baixa_novo', data_baixa='$data_baixa_novo', usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 
	
	if ($tipo_baixa == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), baixa='$baixa_novo', data_baixa='$data_baixa_novo', usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");}
}


if ($lib_data_prog_diaria_campo == ""){
	if ($tipo_data_prog_diaria == "item") { 
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), data_prog_diaria='$data_prog_diaria_novo', usuario_alt='$usuario_alt' WHERE id='$id'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");  } 
	if ($tipo_data_prog_diaria == "os") {
$sql = "UPDATE pcp SET data_emissao_alt=NOW(), data_prog_diaria='$data_prog_diaria_novo', usuario_alt='$usuario_alt' WHERE num_os='$num_os_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!"); } 

*/

?>

<tr><td class=titulo height="25" align="center"> Alterada com Sucesso ! </td></tr>

<tr>
<td class=titulo height="25" align="center">
<input class="botao1" type="button" value="Atualizar" onClick="Abrir_Consulta();">
</td>

</tr>
</td>
</table>

</body>
</html>