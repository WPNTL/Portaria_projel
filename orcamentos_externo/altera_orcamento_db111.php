<? include "valida_sessao.php" ; include "config_orcamento.php"; ?>
<html>
<head>
<title> Alterar Orçamentos </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
</head>
<body>
<?php

$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("Não foi possível usuário");
while ($linha=mysql_fetch_array($resultado)) 
{
$libalteratempo = $linha["libalteratempo"];
}

					
			
			// usuário tiver permissão de alteração nas datas da solicitação
if ( $libalteratempo == "" ) 
{ 
		if ( $tempo_seg_novo == "" ) // se não tiver valor no campo tempo_seg
	{ 	
		echo "altera dados solicitados, altera o resto. ";
	} // se não tiver valor no campo tempo_seg
		else 
	{ 
	echo "não dados solicitados, por que já existem, mas altera o resto. "; 
	}

} // usuário tiver permissão de alteração nas datas da solicitação
	
else
{ 
echo "não dados solicitados, mas altera qualquer outra coisa. "; 
}


?>

<table class=titulo width=50% align="center" height="25">
<tr><td align="center"> NUMERO DO ORÇAMENTO -  <?echo $n_orc; ?></tr></td>
<tr><td align="center">ALTERADO COM SUCESSO!</tr></td></table>

</body>
</html>

