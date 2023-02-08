<? include "config.php"; include "valida_sessao.php"; ?>
<html>
<head>
<title> Cadastro Função </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
</head>
<body>


<?php
/*
echo "nome_funcao - ".$nome_funcao;
*/

$sql = "INSERT INTO funcao ( nome_funcao ) VALUES ( '$nome_funcao' )";
$sql = mysql_query($sql) or die ("Houve erro na gravação dos dados.");  


?>



<table class=titulo width=50% align="center" height="25">
<tr><td align="center"> CADASTRADO COM SUCESSO! </tr></td>
<tr><td align="center">  <input class="botao1" type="button" value="Fechar Janela" onClick="javascript:window.close()"> </tr></td></table>

</body>
</html>
