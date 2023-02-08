<? include "valida_sessao.php" ; include"config_pcp.php"; ?>

<html>
<head>
<title> Alterar Pedidos </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/abrir_fechar.js"></script>
</head>
<body>


<form action="" method="post" name="pcp">

<?

//echo "quant_pedido = ".$quant_pedido; echo "<br>";

 for ($i = 1; $i <= $quant_pedido; $i++) { 

//echo "id = ".
$id_novo = $id[$i] ; 
//echo "<br>";	// pegar id

$pendencias_velho[$i] ;  // STATUS ANTIGO
$pendencias_novo_db = $pendencias_novo[$i] ;  // STATUS NOVO

//echo "data_copia_enviado_db = ".
$data_copia_enviado_db = $data_copia_enviado_novo[$i] ; 
	$dia_data_copia_enviado_db = substr($data_copia_enviado_db, -10,2); 
	$mes_data_copia_enviado_db = substr($data_copia_enviado_db, -7,2); 
	$ano_data_copia_enviado_db = substr($data_copia_enviado_db, -4);
if ( $data_copia_enviado_db == "" ) 
{ $data_copia_enviado_db = ($ano_data_copia_enviado_db."".$mes_data_copia_enviado_db."".$dia_data_copia_enviado_db); }
else
{ $data_copia_enviado_db = ($ano_data_copia_enviado_db."-".$mes_data_copia_enviado_db."-".$dia_data_copia_enviado_db); }
//echo "<br>"; // data_copia_enviado


//echo "data_emissao_pedido_enviado_db = ".
$data_emissao_pedido_enviado_db = $data_emissao_pedido_enviado_novo[$i] ; 
	$dia_data_emissao_pedido_enviado_db = substr($data_emissao_pedido_enviado_db, -10,2); 
	$mes_data_emissao_pedido_enviado_db = substr($data_emissao_pedido_enviado_db, -7,2); 
	$ano_data_emissao_pedido_enviado_db = substr($data_emissao_pedido_enviado_db, -4);
if ( $data_emissao_pedido_enviado_db == "" ) 
{ $data_emissao_pedido_enviado_db = ($ano_data_emissao_pedido_enviado_db."".$mes_data_emissao_pedido_enviado_db."".$dia_data_emissao_pedido_enviado_db); }
else
{ $data_emissao_pedido_enviado_db = ($ano_data_emissao_pedido_enviado_db."-".$mes_data_emissao_pedido_enviado_db."-".$dia_data_emissao_pedido_enviado_db); }
//echo "<br>"; // data_emissao_pedido_enviado



//echo "data_lib_financeiro_enviado_db = ".
$data_lib_financeiro_enviado_db = $data_lib_financeiro_enviado_novo[$i] ; 
	$dia_data_lib_financeiro_enviado_db = substr($data_lib_financeiro_enviado_db, -10,2); 
	$mes_data_lib_financeiro_enviado_db = substr($data_lib_financeiro_enviado_db, -7,2); 
	$ano_data_lib_financeiro_enviado_db = substr($data_lib_financeiro_enviado_db, -4);
if ( $data_lib_financeiro_enviado_db == "" ) 
{ $data_lib_financeiro_enviado_db = ($ano_data_lib_financeiro_enviado_db."".$mes_data_lib_financeiro_enviado_db."".$dia_data_lib_financeiro_enviado_db); }
else
{ $data_lib_financeiro_enviado_db = ($ano_data_lib_financeiro_enviado_db."-".$mes_data_lib_financeiro_enviado_db."-".$dia_data_lib_financeiro_enviado_db); }
//echo "<br>"; // data_lib_financeiro_enviado



//echo "data_analise_critica_enviado_novo_db = ".
$data_analise_critica_enviado_db = $data_analise_critica_enviado_novo[$i] ; 
	$dia_data_analise_critica_enviado_db = substr($data_analise_critica_enviado_db, -10,2); 
	$mes_data_analise_critica_enviado_db = substr($data_analise_critica_enviado_db, -7,2); 
	$ano_data_analise_critica_enviado_db = substr($data_analise_critica_enviado_db, -4);
if ( $data_analise_critica_enviado_db == "" ) 
{ $data_analise_critica_enviado_db = ($ano_data_analise_critica_enviado_db."".$mes_data_analise_critica_enviado_db."".$dia_data_analise_critica_enviado_db); }
else
{ $data_analise_critica_enviado_db = ($ano_data_analise_critica_enviado_db."-".$mes_data_analise_critica_enviado_db."-".$dia_data_analise_critica_enviado_db); }
//echo "<br>"; // data_analise_critica_enviado

//$pendencias = $pendencias_novo;
	 
//echo "pendencias = ".

if ( $data_copia_enviado_db <> "" AND $data_emissao_pedido_enviado_db <> "" AND $data_lib_financeiro_enviado_db <> "" AND $data_analise_critica_enviado_db <> "" ) 
{ $pendencias_novo_db = "OK"; }
else 
{ $pendencias_velho; }
//echo "<br>"; // pendencias


 $sql = "UPDATE pcp_pedido SET data_copia_enviado='$data_copia_enviado_db', data_emissao_pedido_enviado='$data_emissao_pedido_enviado_db', data_lib_financeiro_enviado='$data_lib_financeiro_enviado_db', data_analise_critica_enviado='$data_analise_critica_enviado_db', pendencias='$pendencias_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; 
 $resultado = mysql_query($sql) or die ("Não foi possível!!!"); 

}
?>

		<table class=sem_borda width=30% align="center">
	<tr>
<td class=titulo height="25" align="center"> 
Alterada com Sucesso ! 
</td>
	</tr>
	
	
	<tr>
<td class=titulo height="25" align="center"> 
<input class="botao1" size=1 type="button" value="Cons. Pedido" onClick="Abrir_Consulta_Pedido();">
</td>
	</tr>
	
	
	<tr>
<td class=titulo height="25" align="center">
<a class="botao1" href="javascript:window.close()" target="_top"> Fecha Janela </a>
</td>
	</tr>
		</table>

</form>
</body>
</html>
