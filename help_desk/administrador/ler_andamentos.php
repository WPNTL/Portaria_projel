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
    <strong>&nbsp;::</strong>
    <a href="../logout.php"><b>Logout</b></a>
    <strong>&nbsp;::</strong>
    <a href="menu_administrador.php"> VOLTAR</a>
    <strong>&nbsp;::</strong>
    <a href="ler_abertos.php">ABERTOS</a>
    <strong>&nbsp;::</strong>
    <a href="ler_andamentos.php">EM ANDAMENTO</a>
    <strong>&nbsp;::</strong>
    <a href="painel_finalizados.php">FINALIZADOS</a>
    <strong>&nbsp;::</strong>
    </div>
    </td>
  </tr>
 <tr>
    <td colspan="2" bgcolor="#99CC66" background="imagens/mm_dashed_line.gif">
     &nbsp;
     </td>
  </tr>
</table>

<?php
include "../conecta.php";

$begin = $_GET['begin'];
if (!$begin) { $begin = 0; }

$query = 'SELECT COUNT(*) FROM registros WHERE (estado = "ANDAMENTO")';
$query = mysql_query($query);
$query = mysql_fetch_array($query);
$total = $query[0];


if($total==0){
     $anteriores = 'Anteriores';
     $proximos = 'Próximos';
}
else {
if (($begin > 0) and ($begin <= 10)) {
   $anteriores = '<a href="ler_andamentos.php?begin=0">Anteriores</a>';
} elseif (($begin > 0) and ($begin > 10)) {
   $anteriores = '<a href="ler_andamentos.php?begin=' . ($begin-10) . '">Anteriores</a>';
} else {
   $anteriores = 'Anteriores';
}

if (($begin < $total) and (($begin+10) >= $total)) {
   $proximos = 'Próximos';
} else {
   $proximos = '<a href="ler_andamentos.php?begin=' . ($begin+10) . '">Próximos</a>';
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
              <p>Chamados em Andamento </p>
          </div></td>
        </tr>
       <tr>
          <td height="19" class="bodyText"><p align="center" class="style1">TOTAL DE MEUS CHAMADOS EM FINALIZADOS: <span class="style3"><font color="#00FF40"><?php echo $total; ?></font></span></p>            </td>
        </tr>
        <tr>
          <td height="20" align="center" class="bodyText"><span class="style1">Ordenado por data de registro  .</span></td>
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

$query = 'SELECT DISTINCT * FROM registros WHERE estado = "ANDAMENTO" ORDER BY `data_abertura` ASC LIMIT '.$begin.' , 10';
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
   ?></p>
    <table width="526" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr>
          <td class="subHeader" id="monthformat">Setor</td>
          <td colspan="3" class="subHeader" id="monthformat"><span class="style8"><?php echo $linha['setor']; ?></span></td>
          <td width="102" class="subHeader" id="monthformat"><div align="right">ID</div></td>
          <td width="61" class="subHeader" id="monthformat"><div align="right"><span class="style8"><?php echo $linha['id']; ?></span></div></td>
      </tr>
        <tr>
          <td width="154" class="subHeader" id="monthformat">Andar</td>
          <td width="44" class="subHeader" id="monthformat"><span class="style8"><?php echo $linha['andar']; ?></span></td>
          <td width="43" class="subHeader" id="monthformat"><div align="center">Ramal</div></td>
          <td colspan="3" class="subHeader" id="monthformat"><span class="style8"><?php echo $linha['ramal']; ?></span></td>
      </tr>
        <tr>
          <td class="subHeader" id="monthformat">Contato</td>
          <td colspan="5" class="subHeader" id="monthformat"><span class="style8"><?php echo $linha['contato']; ?></span></td>
      </tr>
        <tr>
          <td class="subHeader" id="monthformat">Equipamento</td>
          <td colspan="5" class="subHeader" id="monthformat"><span class="style8"><?php echo $linha['equipamento']; ?></span></td>
      </tr>
        <tr>
          <td valign="top" class="subHeader" id="monthformat">Problema</td>
          <td colspan="5" class="subHeader" id="monthformat"><span class="style8"><?php echo $linha['prob_usuario']; ?></span></td>
        </tr>
        <tr>
          <td valign="top" class="subHeader" id="monthformat">Registrado em </td>
          <td colspan="5" class="subHeader" id="monthformat"><span class="style8"><?php echo $data; ?></span></td>
        </tr>
        <tr>
          <td valign="top" class="subHeader" id="monthformat"><p>Assumido em </p>          </td>
          <td colspan="5" class="subHeader" id="monthformat"><span class="style8"><?php echo $data2; ?></span></td>
        </tr>
        <tr>
          <td valign="top" class="subHeader" id="monthformat">T&eacute;cnico</td>
          <td colspan="5" class="subHeader" id="monthformat"><span class="style8"><?php echo $linha['tecnico']; ?></span></td>
      </tr>
        <tr valign="top">
          <td height="32" class="subHeader" id="monthformat">STATUS</td>
          <td class="subHeader" id="monthformat"><span class="style3"><?php echo $linha['estado']; ?></span></td>
          <td class="subHeader" id="monthformat">&nbsp;</td>
          <td colspan="3" align="right" class="subHeader" id="monthformat"><form id="form1" name="form1" method="get" action="busca_resultado.php">
            <label></label>
  <label></label>
  &nbsp;</form></td>
      </tr>
        <tr align="right">
          <td colspan="6" valign="top" class="subHeader" id="monthformat"></td>
        </tr>
        <tr>
          <td height="42" colspan="6" align="right" valign="top" class="subHeader" id="monthformat">&nbsp;</td>
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
