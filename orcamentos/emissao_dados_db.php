<? include("config_orcamento.php"); ?>
<?php
/* faz a conexao ao banco e seleciona a base de dados  */
include("config_orcamento.php");

/*
 * monta query em SQL para insercao
 */
$sql = "INSERT INTO cliente_prioridade ( nome ) VALUES ( '".$_POST['nome']."' )";

/*  * executa a query  */
$sql = mysql_query($sql) or die ("Houve erro na gravação dos dados.");  ?>

<table class=titulo width=50% align="center" height="25">
<tr><td align="center"><h2>CADASTRADO EFETUADO COM SUCESSO! - <?echo $nome; ?></h2> </tr></td></table>