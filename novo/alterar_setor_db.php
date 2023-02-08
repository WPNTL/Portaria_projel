<? include "config.php"; include "valida_sessao.php"; ?>
<html>
<head>
<title> Alterar Nome do Setor </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
</head>
<body>


<?php
/*
echo "id_setor_anterior - ".$id_setor_anterior;
echo "<br>";
echo "nome_setor_anterior - ".$nome_setor_anterior;
echo "<br>";
echo "senha_setor_anterior - ".$senha_setor_anterior;
echo "<br>"; echo "<br>";

echo "nome_setor_atual - ".$nome_setor_novo;
echo "<br>";
echo "senha_setor_atual - ".$senha_setor_novo;
echo "<br>";
*/

$sql = "UPDATE setor SET nome_setor='$nome_setor_novo', senha='$senha_setor_novo' WHERE id='$id_setor_anterior'"; 
$resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");


?>



<table class=titulo width=50% align="center" height="25">
<tr><td align="center"> ALTERADO COM SUCESSO! </tr></td>
<tr><td align="center"> <input class="botao1" type="button" value="Fechar Janela" onClick="javascript:window.close()"> </tr></td>
</table>

</body>
</html>
