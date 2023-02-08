<? include "valida_sessao.php" ; include "config_pcp.php"; ?>

<HTML>
<HEAD>
<TITLE> Frame Consulta Pedido </TITLE>
<script language="javascript">
if(screen.width>="1024") { window.resizeTo(1024,768) } 
else if(screen.width=="800") { window.resizeTo(800,600) } 
else if(screen.width<="800") { window.resizeTo(600,605) } 
</script>
</HEAD>

<FRAMESET ROWS="100%" FRAMEBORDER="no" SCROLLING="yes">
<FRAME SRC="consulta_pedido.php" NAME=principal_pedido NORESIZE SCROLLING="yes">
</FRAMESET>

</HTML>
