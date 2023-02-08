<? include "valida_sessao.php" ; include "config_portaria.php";
$b = date('d'); 
$c = date('n'); 
$d = date('Y'); 
if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; 
$datafinal = $b."/".$c."/".$d; 
$dataperiodo = $c."/".$d;  ?>

<html>
<head>
<title> Excluir Registro Portaria </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
</head>
<body>

<?php
$branco = "";
/* faz a conexao ao banco e seleciona a base de dados  */
$sql = "UPDATE controle SET
destino='$branco', tipo='$branco', empresa='$branco', nome='$branco',
rg='$branco', veiculo='$branco', placa='$branco',
data_entrada='$branco', hora_entrada='$branco',
data_saida='$branco', hora_saida='$branco', obs='$branco', n_nota='$branco',
data_alterada='$datafinal',
periodo='$branco', periodoalterado='$dataperiodo',
usuarioalterado='$nome_usuario' WHERE id='$id'";

$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");

/*$sql = "DELETE FROM n_orcamento WHERE n_orc='$n_orc'";*/
/*$resultado = mysql_query($sql) or die ("Não foi possível realizar a exclusão dos dados.");*/
?>

<table class=titulo width=50% align="center" height="25">
<tr><td align="center">EXCLUIDO COM SUCESSO!</tr></td></table>
</body>
</html>

