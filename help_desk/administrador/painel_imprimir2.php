<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>P&aacute;gina de Impress&atilde;o</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="../style/mm_health_nutr.css" type="text/css" />
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
.style1 {
	font-size: 12px;
	font-weight: bold;
}
.botoes {
	background-color: #F4FFE4;
	text-align: center;
	list-style-type: square;
	font-weight: bold;
	color: #993300;
}
.style3 {font-size: 12px; font-weight: bold; color: #000066; }
.style8 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000066;
	font-weight: bold;
	letter-spacing: 0.2em;
}
-->
</style>
</head>
<body bgcolor="#F4FFE4">
<tr>
<td height="490">&nbsp;
      <span class="bodyText">
       <div align="left">
       <span class="style1">
      </span>
    <table width="526" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr>
        <td height="46" class="pageName"><div align="center">
            <p>RECIBO</p>
          </div></td>
      </tr>
      <tr>
        <td height="19" class="bodyText"><p align="center" class="style1">RECIBO
            DE ATENDIMENTO REALIZADO</p></td>
      </tr>
    </table>
      <table width="526" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr>
          <td height="20" class="bodyText">&nbsp;
          <div align="center"></div></td>
        </tr>
      </table>

    <p align="center" class="pageName">
    <?php

include "../conecta.php";

$id = $_POST['id'];

$query = "SELECT DISTINCT * FROM registros WHERE estado = 'FINALIZADO' AND  id = '$id'";
$query = mysql_query($query);


while ($linha = mysql_fetch_array($query)) {

   $var = $linha['data_abertura'];
   $var = explode(" ",$var);
   $dia = $var[0];
   $hora = $var[1];
   $dia = explode("-",$dia);
   $data = "$dia[2]/$dia[1]/$dia[0] às $hora";
   $zar = $linha['data_andamento'];
   $zar = explode(" ",$zar);
   $dia2 = $zar[0];
   $hora2 = $zar[1];
   $dia2 = explode("-",$dia2);
   $data2 = "$dia2[2]/$dia2[1]/$dia2[0] às $hora2";
   $yar = $linha['data_finalizada'];
   $yar = explode(" ",$yar);
   $dia3 = $yar[0];
   $hora3 = $yar[1];
   $dia3 = explode("-",$dia3);
   $data3= "$dia3[2]/$dia3[1]/$dia3[0] às $hora3";
   ?></p>
    <table width="694" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr>
        <td class="subHeader" id="monthformat">Setor</td>
        <td colspan="2" class="style8" id="monthformat"><span class="style8"><?php echo $linha['setor']; ?></span></td>
        <td width="66" class="style8" id="monthformat"><font color="#993300">Ramal</font></td>
        <td width="138" class="style8" id="monthformat"><?php echo $linha['ramal']; ?></td>
        <td width="28" class="style8" id="monthformat">&nbsp;</td>
      </tr>
      <tr>
        <td width="182" class="subHeader" id="monthformat">Andar</td>
        <td colspan="5" class="style8" id="monthformat"><span class="style8"><?php echo $linha['andar']; ?></span>
          <div align="left" class="subHeader">
            <div align="right"></div>
          </div>
          <div align="right"></div></td>
      </tr>
      <tr>
        <td class="subHeader" id="monthformat">Contato</td>
        <td colspan="5" class="style8" id="monthformat"><span class="style8"><?php echo $linha['contato']; ?></span></td>
      </tr>
      <tr>
        <td class="subHeader" id="monthformat">Equipamento</td>
        <td colspan="5" class="style8" id="monthformat"><span class="style8"><?php echo $linha['equipamento']; ?></span></td>
      </tr>
      <tr>
        <td valign="top" class="subHeader" id="monthformat">Problema Reportado</td>
        <td colspan="5" class="style8" id="monthformat"><span class="style8"><?php echo $linha['prob_usuario']; ?></span></td>
      </tr>
      <tr>
        <td valign="top" class="subHeader" id="monthformat">Registrado em </td>
        <td colspan="5" class="style8" id="monthformat"><span class="style8"><?php echo $data; ?></span></td>
      </tr>
      <tr>
        <td valign="top" class="subHeader" id="monthformat">Problema Encontrado
        </td>
        <td colspan="5" class="style8" id="monthformat"><span class="style3"><?php echo $linha['prob_encontrado']; ?></span></td>
      </tr>
      <tr>
        <td valign="top" class="subHeader" id="monthformat">Assumido em</td>
        <td colspan="5" class="style8" id="monthformat"><span class="style8"><?php echo $data2; ?></span></td>
      </tr>
      <tr>
        <td valign="top" class="subHeader" id="monthformat"><p>Solu&ccedil;&atilde;o
          </p></td>
        <td colspan="5" class="style8" id="monthformat"><span class="style8"><?php echo $linha['solucao']; ?></span></td>
      </tr>
      <tr>
        <td valign="top" class="subHeader" id="monthformat">Finalizado em </td>
        <td colspan="5" class="style8" id="monthformat"><label><span class="style8"><?php echo $data3; ?></span></label></td>
      </tr>
      <tr>
        <td valign="top" class="subHeader" id="monthformat">T&eacute;cnico</td>
        <td colspan="5" class="style8" id="monthformat"><span class="style3"><?php echo $linha['tecnico']; ?></span></td>
      </tr>
      <tr valign="top">
        <td height="27" class="subHeader" id="monthformat">STATUS</td>
        <td width="18" class="style8" id="monthformat"><span class="style3"><?php echo $linha['estado']; ?></span></td>
        <td width="238" class="style8" id="monthformat">&nbsp;</td>
        <td colspan="3" align="right" class="style8" id="monthformat"> <label></label>
          <label></label> &nbsp;</td>
      </tr>
      <tr align="right">
        <td colspan="6" valign="top" class="subHeader" id="monthformat"></td>
      </tr>
      <tr valign="bottom">
        <td height="27" colspan="6" align="right" class="subHeader" id="monthformat">
          <div align="left">ASSINATURA DO USU&Aacute;RIO:</div></td>
      </tr>
    </table>
      <?php
	  }
	  ?>
    <div align="center">
      <SCRIPT Language="Javascript">
function printit(){
if (NS) {
window.print() ;
} else {
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
document.body.insertAdjacentHTML('beforeEnd', WebBrowser);
WebBrowser1.ExecWB(6,11);//Use a 1 vs. a 2 for a prompting dialog box WebBrowser1.outerHTML = "";
}
}
</script>
<SCRIPT Language="Javascript">
var NS = (navigator.appName == "Netscape");
var VERSION = parseInt(navigator.appVersion);
if (VERSION > 3) {
document.write('<form><input type=button value="Emitir Recibo" name="Print" onClick="printit()"></form>');
}
</script>
<form method="POST" action="finalizado.php">
<input type="submit" value="Voltar">
</form>

</div>
</html>
