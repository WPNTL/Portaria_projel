<? include "valida_sessao.php" ; include "config_portaria.php"; ?>
<html>
<head>
<title> Cadastro Registro </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" src="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
</head>
<body>
<?php

/* conecta com o banco de dados */
$query = "SELECT distinct id FROM controle";
$result = MYSQL_QUERY($query);
while ($linha = mysql_fetch_array($result)) { 
$n_orcdb = $linha["id"]; };

/* monta query em SQL para insercao  */
$sql = "INSERT INTO controle
( data_entrada, hora_entrada, destino, tipo, empresa, nome, rg, veiculo, placa, cr, periodo, usuario )
VALUES
( '".$_POST['data_entrada']."', '".$_POST['hora_entrada']."',
'".$_POST['destino']."', '".$_POST['tipo']."', '".$_POST['empresa']."', '".$_POST['nome']."',
'".$_POST['rg']."', '".$_POST['veiculo']."', '".$_POST['placa']."', '".$_POST['cr']."', '".$_POST['periodo']."', '".$_POST['usuario']."'
)";

$sql = mysql_query($sql) or die ("Houve erro na gravação dos dados.");  ?>

<table class=titulo width=50% align="center" height="25">
<tr><td align="center"> CADASTRADO COM SUCESSO! </tr></td></table>
<tr><td><? /* BOTÃO VOLTAR CONSULTA */ ?>

</body>
</html>
