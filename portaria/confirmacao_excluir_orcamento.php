<? include "valida_sessao.php" ; ?>
<html>
<head>
<title> Confirma��o de Exclus�o Or�amentos </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" src="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
</head>
<body>
<form action="" method="post" name="n_orcamento">

<table class=titulo width=50% align="center" height="25">
<tr><td align="center">

Excluir Registro Portaria - <?echo$id?>
<br><br>
<input class="botao1" type="button" value="Sim" onClick="javascript:void(open('excluir_orcamento_db.php?id=<?echo$id?>','principal','scrollbars=yes'))">

<input class="botao1" type="button" value="N�o" onClick="Abrir_N_Orcamento();">

</tr></td></table></form>
</body>
</html>

