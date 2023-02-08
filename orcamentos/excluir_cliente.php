<? include("config_orcamento.php"); ?> 
<?php

include("config_orcamento.php");
$sql = "DELETE FROM cliente_prioridade WHERE id='$id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a exclusão dos dados.");

?>
<h1>Cliente excluído com Sucesso!</h1>

<form action="emissao_dados.php?userlogin=<?echo$userlogin?>&usuario=<?echo$usuario?>" method="post">
<input class="botao1" type="submit" value="Voltar Emissão de Dados">