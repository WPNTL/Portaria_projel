<? include "valida_sessao.php" ; include "config_orcamento.php"; ?>
<HTML>
<HEAD>
<TITLE> Númeração de Orçamentos </TITLE>
</HEAD>
<FRAMESET ROWS="10%, 25%, 60%" FRAMEBORDER="no" SCROLLING="no">
<FRAME SRC="menu.php" NAME=top NORESIZE SCROLLING="no">

<?
$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) { $libinserir = $linha["libinserir"]; }
?>

<? if ($libinserir <> "sim") { ?>
<FRAME SRC="cabecalho_n_orcamento.php" NAME=menu NORESIZE SCROLLING="yes">
<FRAME SRC="n_orcamento.php" NAME=principal NORESIZE SCROLLING="yes">

<? } else { ?>

<FRAME SRC="centro.php" NAME=menu NORESIZE SCROLLING="yes">
<FRAME SRC="cadastro_orcamento.php" NAME=principal NORESIZE SCROLLING="yes">
<? } ?>

</FRAMESET>
</HTML>
