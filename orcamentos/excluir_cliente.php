<? include("config_orcamento.php"); ?> 
<?php

include("config_orcamento.php");
$sql = "DELETE FROM cliente_prioridade WHERE id='$id'";
$resultado = mysql_query($sql) or die ("N�o foi poss�vel realizar a exclus�o dos dados.");

?>
<h1>Cliente exclu�do com Sucesso!</h1>

<form action="emissao_dados.php?userlogin=<?echo$userlogin?>&usuario=<?echo$usuario?>" method="post">
<input class="botao1" type="submit" value="Voltar Emiss�o de Dados">