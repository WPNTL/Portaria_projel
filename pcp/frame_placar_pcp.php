<? include "valida_sessao.php" ; include "config_pcp.php"; include "config_usuario.php";?>

<HTML>
<HEAD>
<TITLE> Frame Consulta Placar </TITLE>
</HEAD>
<SCRIPT language=VBScript>
Dim Bar, Line, SP
Bar = 0
Line = "|"
sP = 250
Function Window_onLoad()
Bar = 95
sP = 10
END Function
Function Count()
If Bar < 100 Then
Bar = Bar + 1
Document.title = " " & Bar & "%" & " " & String(Bar, Line) & " - carregando... "
Window.Status = "Programa de PCP - Placar" & Bar & "%" & " " & String(Bar, Line)
setTimeout "Count()", SP
Else
document.title = "Programa de PCP - Placar"
Window.Status = "Programa de PCP - Placar"
Document.Body.Style.Display = ""
End If
End Function
Call Count()
</SCRIPT>
<script language="javascript">
if(screen.width>="1280") 
{ 
window.resizeTo(1280,1024)
} 
else if(screen.width>="1024") 
{ 
window.resizeTo(1024,768)
} 
else if(screen.width=="800") 
{ 
window.resizeTo(800,600) 
} 
else if(screen.width<="800") 
{ 
window.resizeTo(600,605) 
} 
</script>


<FRAMESET ROWS="20%, 80%" FRAMEBORDER="no" SCROLLING="no">
<FRAME SRC="cabecalho_placar_pcp.php" NAME=principal_consulta NORESIZE SCROLLING="yes">
<FRAME SRC="consulta_placar_pcp.php" NAME=principal_dados NORESIZE SCROLLING="yes">
</FRAMESET>
		

</HTML>
