<?  include "config.php";  ?>
<html>
<head>
<title> Alterar Função </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
</head>
<body>


<?php
$sql = "UPDATE funcao SET nome_funcao='$nome_funcao_novo' WHERE id='$id_funcao_anterior'"; 
$resultado = mysql_query($sql) or die ("Não foi possível Alterar Função!!!");
?>


<table class=titulo width=50% align="center" height="25">
<tr><td align="center"> ALTERADO COM SUCESSO! </tr></td>
<tr><td align="center"> <input class="botao1" type="button" value="Fechar Janela" onClick="javascript:window.close()"> </tr></td>
</table>

</body>
</html>
