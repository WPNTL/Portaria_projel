<? include "valida_sessao.php" ; include "config_pcp.php"; ?>

<HTML>
<HEAD>
<TITLE> Programa de PCP </TITLE>
</HEAD>

<FRAMESET ROWS="15%,85%" FRAMEBORDER="no" SCROLLING="no">
<FRAME SRC="menu_geral_pcp.php" NAME=top NORESIZE SCROLLING="no">

<?
$username = $_POST["username"];
$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) { $lib_inserir = $linha["lib_inserir"]; }
?>

<? if ( $lib_inserir == "sim" ) { ?>
<FRAME SRC="frame_cadastro_pcp.php" NAME=principal NORESIZE SCROLLING="yes">
<? } else { ?>
<FRAME SRC="frame_consulta_pcp.php" NAME=principal NORESIZE SCROLLING="yes">
<? } ?>

</FRAMESET>
</HTML>
