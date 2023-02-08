<? include "valida_sessao.php" ; include("config_portaria.php"); ?>
<html>
<head>
<title> Alterar Registro </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" src="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
<script language="JavaScript" SRC="funcoes/enter.js"></script>
</head>
<body>
<?php

$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {
$libinserir = $linha["libinserir"]; 
$libalterar = $linha["libalterar"]; 
$libexcluir = $linha["libexcluir"];

$libid = $linha["libid"];
$libcliente = $linha["libcliente"];
$libmercado = $linha["libmercado"];
$libcontato = $linha["libcontato"];
$libreferencia = $linha["libreferencia"];
$libuf = $linha["libuf"];
$libdata = $linha["libdata"]; 
$libdataalterada = $linha["libdataalterada"];
$libvalor = $linha["libvalor"];
$librepresentante = $linha["librepresentante"];
$libperiodo = $linha["libperiodo"]; 
$libperiodoalterado = $linha["libperiodoalterado"];
$libusuario = $linha["libusuario"]; 
$libusuarioalterado = $linha["libusuarioalterado"];

$libtempo = $linha["libtempo"];
$libalteratempo = $linha["libalteratempo"];

$libdatainicio = $linha["libdatainicio"]; 
$libhorainicio = $linha["libhorainicio"];
$libdatafim = $linha["libdatafim"]; 
$libhorafim = $linha["libhorafim"];

}

	if ( $libalterar == "sim" ) { 	// se não tiver valor no campo tempo_seg
	
$sql = "UPDATE controle SET
destino='$destino_novo', 
tipo='$tipo_novo', 
empresa='$empresa_novo', 
nome='$nome_novo',
rg='$rg_novo', 
veiculo='$veiculo_novo', 
placa='$placa_novo',
cr='$cr_novo', 

n_nota='$n_nota',
obs='$obs',

periodoalterado='$periodo_novo', 

data_saida='$data_saida',
hora_saida='$hora_saida',

usuarioalterado='$usuario_novo' WHERE id='$id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");  

}


?>

<table class=titulo width=50% align="center" height="25">
<tr><td align="center"> NUMERO DO ORÇAMENTO -  <?echo $id; ?></tr></td>
<tr><td align="center">ALTERADO COM SUCESSO!</tr></td></table>

</body>
</html>

