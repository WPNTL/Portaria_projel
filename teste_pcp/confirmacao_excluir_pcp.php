<? include "valida_sessao.php" ; ?>
<html>
<head>
<title> Confirmação de Exclusão Orçamentos </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" src="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
<script language="JavaScript" SRC="funcoes/abrir_fechar.js"></script>
</head>
<body>
<form action="" method="post" name="pcp">

<table class=titulo width=50% align="center" height="25">
<tr><td align="center">

Excluir PCP - <?echo$n_orc?>
<br><br>
<input class="botao1" type="button" value="Sim" onClick="javascript:void(open('excluir_pcp_db.php?n_orc=<?echo$n_orc?>','principal','scrollbars=yes'))">

<input class="botao1" type="button" value="Não" onClick="Abrir_PCP();">

</tr></td></table></form>
</body>
</html>

