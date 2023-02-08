<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="style/mm_health_nutr.css" type="text/css" />
<script language=JavaScript>
<!--

function blockError()

{return true;}

window.onerror = blockError;

var dayarray=new Array("Domingo","Segunda-Feira","Terça-Feira","Quarta-Feira","Quinta-Feira","Sexta-Feira","Sábado")
var montharray=new Array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro")

function getthedate(){
var mydate=new Date()
var year=mydate.getYear()
if (year < 1000)
year+=1900
var day=mydate.getDay()
var month=mydate.getMonth()
var daym=mydate.getDate()
if (daym<10)
daym="0"+daym
var hours=mydate.getHours()
var minutes=mydate.getMinutes()
var seconds=mydate.getSeconds()
if (hours>=24)
hours=0
if (minutes<=9)
minutes="0"+minutes
if (seconds<=9)
seconds="0"+seconds
var cdate = dayarray[day]+", "+daym+" de "+montharray[month]+" de "+year
var cdateh = hours+":"+minutes+":"+seconds
if (document.all)
document.all.relogio.className = "relogio";
document.all.relogio.innerHTML=cdate
document.all.rhora.className = "rhora";
document.all.rhora.innerHTML=cdateh
}
if (!document.all)
getthedate()
function goforit(){
if (document.all)
setInterval("getthedate()",1000)
}
goforit()
function art(url, name)
{
    artWin = window.open(url, name,'menubar=yes,location=yes,resizable=yes,scrollbars=yes,status=yes,width=700,height=450,top=0,left=5');
	artWin.focus();
}

function link(url, name)
{
    lWin = window.open(url, name,'menubar=no,location=no,resizable=no,scrollbars=no,status=no,width=600,height=370,top=10,left=5');
	lWin.focus();
}
-->
</script>
<script language="JavaScript" type="text/javascript">
//--------------- LOCALIZEABLE GLOBALS ---------------
var d=new Date();
var monthname=new Array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
//Ensure correct for language. English is "January 1, 2004"
var TODAY = monthname[d.getMonth()] + " "  + d.getDate() + ", " + d.getFullYear();
var HOJE = d.getDate() + " de "  + monthname[d.getMonth()] + " de " + d.getFullYear();
//---------------   END LOCALIZEABLE   ---------------
</script>
<style type="text/css">
<!--
.style1 {color: #99CC66}
-->
</style>
</head>
<body bgcolor="#F4FFE4">

<table width="100" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC66">
  <tr bgcolor="#D5EDB3">
    <td valign="top">
    <div align="center">
      <table width="1100" border="0" align="left" cellspacing="2">
        <tr>
          <td width="100"><img src="imagens/logos.gif" width="213" height="33" border="0"></td>
          <td height="20" bgcolor="#D5EDB3"><div align="left">
          <font color="#B90000"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <h1>
          <b> Sistema Help Desk
         <script language="JavaScript" type="text/javascript"> document.write(HOJE);	</script>
         </b>
         </h1>
         </font>
         </td>
        </td>
        </tr>
      </table>
      </div>
      </td>
  </tr>
<tr>
    <td colspan="2" bgcolor="#99CC66" background="imagens/mm_dashed_line.gif">
    <img src="style/mm_dashed_line.gif" width="4" height="3" border="0" />
    </td>
  </tr>
  <tr bgcolor="#99CC66">
    <td height="20" bgcolor="#99CC66" id="dateformat">
    <div align="left">
    <span class="style1"></span>
    <a href="usuario_cadastra_chamada.php">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Úsuario cadastre seu chamado
    </a>
    <a href="index.php" >Técnico Logue-se Aqui </a>
        <div class="cdateh" id="cdateh"></div>
    </div>
    </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#99CC66" background="imagens/mm_dashed_line.gif">
     &nbsp;
     </td>
  </tr>
</table>

</body>
</html>
