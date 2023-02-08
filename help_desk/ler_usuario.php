<?php
include "valida_session.php";
?>
<?php
include "status.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Chamados em &quot;Aberto&quot;</title>
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
.style3 {font-size: 12px; font-weight: bold; color: #FF0000; }
.style8 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000066;
	font-weight: bold;
}
-->
</style>
</head>
<body bgcolor="#F4FFE4">
<?php

$begin = $_GET['begin'];
if (!$begin) { $begin = 0; }


$conexao = mysql_connect("localhost","","");
mysql_select_db("suporte",$conexao);


$query = 'SELECT COUNT(*) FROM usuarios';
$query = mysql_query($query,$conexao);
$query = mysql_fetch_array($query);
$total = $query[0];

?>

<?php

if (($begin > 0) and ($begin <= 10)) {
   $anteriores = '<a href="ler_usuario.php?begin=0">Anteriores</a>';
} elseif (($begin > 0) and ($begin > 10)) {
   $anteriores = '<a href="ler_usuario.php?begin=' . ($begin-10) . '">Anteriores</a>';
} else {
   $anteriores = 'Anteriores';
}

if (($begin < $total) and (($begin+10) >= $total)) {
   $proximos = 'Próximos';
} else {
   $proximos = '<a href="ler_usuario.php?begin=' . ($begin+10) . '">Próximos</a>';
}

?>
<tr>
<td height="490">&nbsp;
      <span class="bodyText">

      </span>
    <table width="526" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr> 
        <td height="46" class="pageName"><div align="center"> 
            <p>Usuarios Castrados</p>
          </div></td>
      </tr>
      <tr> 
        <td height="19" class="bodyText"><p align="center" class="style1">TOTAL 
            DE USUARIOS: <span class="style3"><?php echo $total; ?></span></p></td>
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

$query = 'SELECT DISTINCT * FROM usuarios ORDER BY data_aber DESC';
$query = mysql_query($query,$conexao);


while ($linha = mysql_fetch_array($query)) {

   $var = $linha['data_aber'];
   $var = explode(" ",$var);
   $dia = $var[0];
   $hora = $var[1];
   $dia = explode("-",$dia);
   $data = "$dia[2]/$dia[1]/$dia[0] às $hora";

   ?></p>
    <table width="286" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr> 
        <td width="94" class="subHeader" id="monthformat">ID</td>
        <td width="424" class="subHeader" id="monthformat"><span class="style8"><?php echo $linha['id']; ?></span></td>
      </tr>
      <tr> 
        <td class="subHeader" id="monthformat">Username</td>
        <td class="subHeader" id="monthformat"><span class="style8"><?php echo $linha['username']; ?></span></td>
      </tr>
      <tr> 
        <td class="subHeader" id="monthformat">Password</td>
        <td class="subHeader" id="monthformat"><span class="style8"><?php echo $linha['senha']; ?></span></td>
      </tr>
    </table>

    <p>
      <?php
	  }
	  ?>
</p>
    <p>&nbsp;</p>
    <p>&nbsp;    </p>
    <p>&nbsp;</p>

</html>