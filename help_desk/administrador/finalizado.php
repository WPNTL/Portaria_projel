<?php
include "../valida_session.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Calendar</title>
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
          <td width="100"><img src="../imagens/logos.gif" width="213" height="33" border="0"></td>
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
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <strong>&nbsp;::</strong>
    <a href="menu_administrador.php"> VOLTAR</a>
    <strong>&nbsp;::</strong>
    <a href="em_andamento.php">EM ANDAMENTO</a>
    <strong>&nbsp;::</strong>
    <a href="finalizado.php">FINALIZADOS</a>
    <strong>&nbsp;::</strong>
    </div>
    </td>
  </tr>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#99CC66" background="imagens/mm_dashed_line.gif">
     &nbsp;
     </td>
  </tr>
</table>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Chamados  &quot;Finalizados&quot;</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="style/mm_health_nutr.css" type="text/css" />
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
.style3 {font-size: 12px; font-weight: bold; color: #00CC00; }
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

<?php
include "../conecta.php";

$begin = $_GET['begin'];
if (!$begin) { $begin = 0; }

$query = "SELECT COUNT(*) FROM registros WHERE estado = 'FINALIZADO' AND  tecnico = '$login_usuario'";
$query = mysql_query($query);
$query = mysql_fetch_array($query);
$total = $query[0];


if($total==0){
     $anteriores = 'Anteriores';
     $proximos = 'Próximos';
}
else {
if (($begin > 0) and ($begin <= 10)) {
   $anteriores = '<a href="painel_finalizados.php?begin=0">Anteriores</a>';
} elseif (($begin > 0) and ($begin > 10)) {
   $anteriores = '<a href="painel_finalizados.php?begin=' . ($begin-10) . '">Anteriores</a>';
} else {
   $anteriores = 'Anteriores';
}

if (($begin < $total) and (($begin+10) >= $total)) {
   $proximos = 'Próximos';
} else {
   $proximos = '<a href="painel_finalizados.php?begin=' . ($begin+10) . '">Próximos</a>';
}
}
?>
<tr>
<td height="490">&nbsp;
      <span class="bodyText">

      </span>
    <table width="526" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr>
          <td height="46" class="pageName"><div align="center">
              <p>Meus Chamados Finalizados </p>
          </div></td>
        </tr>
        <tr>
          <td height="19" class="bodyText"><p align="center" class="style1">TOTAL DE MEUS CHAMADOS EM FINALIZADOS: <span class="style3"><font color="#00FF40"><?php echo $total; ?></font></span></p>            </td>
        </tr>
        <tr>
          <td height="20" align="center" class="bodyText"><span class="style1">Ordenado por data de finaliza&ccedil;&atilde;o  .</span></td>
        </tr>
        <tr>
          <td height="20" align="center" class="bodyText"><span class="style1">10 Chamados por página.</span></td>
        </tr>
    </table>
      <table width="526" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr>
          <td height="20" class="bodyText">&nbsp;
          <div align="center"><strong><?php echo $anteriores . " | " . $proximos; ?></strong></div></td>
        </tr>
      </table>
	
    <p align="center" class="pageName">
    <?php


$query = 'SELECT DISTINCT * FROM registros WHERE estado = "FINALIZADO" AND  tecnico = "'.$login_usuario.'" ORDER BY data_andamento  ASC LIMIT '.$begin.' , 10 ';
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
          <td colspan="3" class="style8" id="monthformat"><span class="style8"><?php echo $linha['setor']; ?></span></td>
          <td width="190" class="style8" id="monthformat"><div align="right" class="subHeader">ID</div></td>
          <td width="28" class="style8" id="monthformat"><div align="right"><span class="style8"><?php echo $linha['id']; ?></span></div></td>
      </tr>
        <tr>
          <td width="182" class="subHeader" id="monthformat">Andar</td>
          <td width="18" class="style8" id="monthformat"><span class="style8"><?php echo $linha['andar']; ?></span></td>
          <td colspan="3" class="style8" id="monthformat"><div align="left" class="subHeader">
            <div align="right">Ramal</div>
            </div></td>
          <td class="style8" id="monthformat"><div align="right"><?php echo $linha['ramal']; ?></div></td>
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
          <td valign="top" class="subHeader" id="monthformat">Problema Encontrado  </td>
          <td colspan="5" class="style8" id="monthformat"><span class="style8"><?php echo $linha['prob_encontrado']; ?></span></td>
        </tr>
        <tr>
          <td valign="top" class="subHeader" id="monthformat">Assumido em</td>
          <td colspan="5" class="style8" id="monthformat"><span class="style8"><?php echo $data2; ?></span></td>
        </tr>
        <tr>
          <td valign="top" class="subHeader" id="monthformat"><p>Solu&ccedil;&atilde;o </p>          </td>
          <td colspan="5" class="style8" id="monthformat"><span class="style8"><?php echo $linha['solucao']; ?></span></td>
        </tr>
        <tr>
          <td valign="top" class="subHeader" id="monthformat">Finalizado em  </td>
          <td colspan="5" class="style8" id="monthformat"><label><span class="style8"><?php echo $data3; ?></span></label></td>
        </tr>
        <tr>
          <td valign="top" class="subHeader" id="monthformat">T&eacute;cnico</td>
          <td colspan="5" class="style8" id="monthformat"><span class="style8"><?php echo $linha['tecnico']; ?></span></td>
      </tr>
        <tr valign="top">
          <td height="27" class="subHeader" id="monthformat">STATUS</td>
          <td class="style8" id="monthformat"><span class="style3"><?php echo $linha['estado']; ?></span></td>
          <td width="144" class="style8" id="monthformat">&nbsp;</td>
          <td colspan="3" align="right" class="style8" id="monthformat">
            <label></label>
  <label></label>
  <form id="atender" name="atender" method="post" action="painel_imprimir2.php">
            <label>
  <input name="id" type="hidden" id="id" value="<?php echo $linha['id']; ?>" />
            </label>
  <label>
            <input name="Imprimir" type="submit" class="botoes" value="Imprimir" />
  </label>
</form>
          </td>
      </tr>
        <tr align="right">
          <td colspan="6" valign="top" class="subHeader" id="monthformat"></td>
        </tr>
        <tr>
          <td height="27" colspan="6" align="right" valign="top" class="subHeader" id="monthformat">&nbsp;</td>
        </tr>
    </table>
      <?php
	  }
	  ?>

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
document.write('<form><input type=button value="Imprimir esta pagina" name="Print" onClick="printit()"></form>'); 
} 
</script>
</html>
