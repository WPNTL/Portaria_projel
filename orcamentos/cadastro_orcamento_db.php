<? include "valida_sessao.php" ; include "config_orcamento.php"; ?>
<html>
<head>
<title> Cadastro Or�amentos </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
</head>
<body>
<?php

/* verefica de que estado o usuario */
$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("N�o foi poss�vel realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) { $estado = $linha["estado"]; }

/* conecta com o banco de dados */
$query = "SELECT distinct id FROM n_orcamento";
$result = MYSQL_QUERY($query);
while ($linha = mysql_fetch_array($result)) { $n_orcdb = $linha["id"]; };
$n_orcdb1 = $n_orcdb + 1;  $n_orcdb =  $n_orcdb1."-".$estado;

if ($valor == "") {$valor = "0";} else {$valor = $valor;}

/* monta query em SQL para insercao  */
$sql = "INSERT INTO n_orcamento
( n_orc, cliente, mercado, contato, referencia, uf, data, valor, representante, periodo, usuario )
VALUES
( '$n_orcdb', '".$_POST['cliente']."', '".$_POST['mercado']."',
'".$_POST['contato']."', '".$_POST['referencia']."', '".$_POST['uf']."', '".$_POST['data']."',
$valor, '".$_POST['representante']."', '".$_POST['periodo']."', '".$_POST['usuario']."'
)";

$sql = mysql_query($sql) or die ("Houve erro na grava��o dos dados.");  ?>

<?
$query_prioridade = "SELECT distinct nome FROM cliente_prioridade WHERE nome='$cliente'";
$result_prioridade = MYSQL_QUERY($query_prioridade);
while ($linha_prioridade = mysql_fetch_array($result_prioridade)) { 

$nome = $linha_prioridade["nome"]; } ?>

<? if ($cliente == $nome) { ?>
<table class=titulo width=50% align="center" height="25">
<tr><td align="center"> NUMERO DO OR�AMENTO -  <?echo $n_orcdb; ?></tr></td>
<tr><td align="center"> CADASTRADO COM SUCESSO! </tr></td>
<tr><td align="center"><FONT COLOR="#FF0000" size="6">PRIORIDADE!</tr></td></font></table>
<? } else { ?>
<table class=titulo width=50% align="center" height="25">
<tr><td align="center"> NUMERO DO OR�AMENTO -  <?echo $n_orcdb; ?></tr></td>
<tr><td align="center"> CADASTRADO COM SUCESSO! </tr></td></table>
<? } ?>
</body>
</html>
