<? include "config.php"; include "valida_sessao.php"; ?>
<html>
<head>
<title> Cadastrar Setor </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
</head>
<body>


<?php
/*
echo "nome_setor - ".$nome_setor;
*/

$sql = "INSERT INTO setor ( nome_setor, senha ) VALUES ( '$nome_setor', '$senha' )";
$sql = mysql_query($sql) or die ("Houve erro na gravação dos dados.");  


?>



<table class=titulo width=50% align="center" height="25">
<tr><td align="center"> CADASTRADO COM SUCESSO! </tr></td>
<tr><td align="center">  <input class="botao1" type="button" value="Fechar Janela" onClick="javascript:window.close()"> </tr></td></table>

</body>
</html>
