<? include "valida_sessao.php" ; include "config_orcamento.php"; ?>
<html>
<head>
<title> Alterar Or�amentos </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
</head>
<body>
<?php

$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("N�o foi poss�vel usu�rio");
while ($linha=mysql_fetch_array($resultado)) 
{
$libalteratempo = $linha["libalteratempo"];
}

					
			
			// usu�rio tiver permiss�o de altera��o nas datas da solicita��o
if ( $libalteratempo == "" ) 
{ 
		if ( $tempo_seg_novo == "" ) // se n�o tiver valor no campo tempo_seg
	{ 	
		echo "altera dados solicitados, altera o resto. ";
	} // se n�o tiver valor no campo tempo_seg
		else 
	{ 
	echo "n�o dados solicitados, por que j� existem, mas altera o resto. "; 
	}

} // usu�rio tiver permiss�o de altera��o nas datas da solicita��o
	
else
{ 
echo "n�o dados solicitados, mas altera qualquer outra coisa. "; 
}


?>

<table class=titulo width=50% align="center" height="25">
<tr><td align="center"> NUMERO DO OR�AMENTO -  <?echo $n_orc; ?></tr></td>
<tr><td align="center">ALTERADO COM SUCESSO!</tr></td></table>

</body>
</html>

