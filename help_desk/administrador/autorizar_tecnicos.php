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

function confirma(){
        if(confirm('Deseja realmente confirmar a autorizão?'))
                return true;
        else
                return false;
}
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
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <strong>&nbsp;::</strong>
    <a href="../logout.php"><b>Logout</b></a>
    <strong>&nbsp;::</strong>
    <a href="menu_administrador.php"> CADASTRAR CHAMADA</a>
    <strong>&nbsp;::</strong>
    <a href="autorizar_tecnicos.php">AUTORIZAR TÉCNICOS</a>
    <strong>&nbsp;::</strong>
    <a href="todos_chamados.php">TODOS CHAMADOS</a>
    <strong>&nbsp;::</strong>
    <a href="meus_chamados.php">MEUS CHAMADOS</a>
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

$permissao="invalido";

$begin = $_GET['begin'];
if (!$begin) { $begin = 0; }

$query = "SELECT COUNT(*) FROM usuarios WHERE status = '$permissao'";
$query = mysql_query($query);
$query = mysql_fetch_array($query);
$total = $query[0];

if($total==0){
     $anteriores ='Anteriores';
     $proximos = 'Próximos';
}
else {
if (($begin > 0) and ($begin <= 10)) {
   $anteriores = '<a href="autorizar_tecnicos.php?begin=0">Anteriores</a>';
} elseif (($begin > 0) and ($begin > 10)) {
   $anteriores = '<a href="autorizar_tecnicos.php?begin=' . ($begin-10) . '">Anteriores</a>';
} else {
   $anteriores = 'Anteriores';
}

if (($begin < $total) and (($begin+10) >= $total)) {
   $proximos = 'Próximos';
} else {
   $proximos = '<a href="autorizar_tecnicos.php?begin=' . ($begin+10) . '">Próximos</a>';
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
              <p>AUTORIZAR TÉCNICOS </p>
          </div></td>
        </tr>
        <tr>
          <td height="19" class="bodyText"><p align="center" class="style1">TOTAL DE TÉCNICOS AGUARDANDO APROVACÃO: <span class="style3"><font color="#00FF40"><?php echo $total; ?></font></span></p>            </td>
        </tr>
        <tr>
          <td height="20" align="center" class="bodyText"><span class="style1">Clique em &quot;Confirmar&quot; para autorizar o técnico</span></td>
        </tr>
        <tr>
          <td height="20" align="center" class="bodyText"><span class="style1">10 técnicos por página.</span></td>
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

$query = 'SELECT DISTINCT * FROM usuarios WHERE status = "invalido" ORDER BY id  ASC LIMIT '.$begin.' , 10 ';
$query = mysql_query($query);

while ($linha = mysql_fetch_array($query)) {

   ?>
   </p>
    <table width="526" border="0" align="center" cellpadding="2" cellspacing="0">
    <form  method="post" action="alterar_permissao.php">
        <tr>
          <td class="subHeader" id="monthformat">Código</td>
          <td colspan="5" class="subHeader" id="monthformat"><span class="style8"><?php echo $linha['id']; ?></span></td>
        </tr>
        <tr>
          <td class="subHeader" id="monthformat">Nome</td>
          <td colspan="5" class="subHeader" id="monthformat"><span class="style8"><?php echo $linha['nome']; ?></span></td>
      </tr>
        <tr>
          <td valign="top" class="subHeader" id="monthformat">Permissão</td>
          <td colspan="5" class="subHeader" id="monthformat"><span class="style8"><?php echo $linha['permissao'] ?></span></td>
      </tr>
      <tr>
          <td valign="top" class="subHeader" id="monthformat">Nível</td>
          <td colspan="5" class="subHeader" id="monthformat">
          <span class="style8">
          <select name="nivel">
          <option value="usuario">Usuario</option>
          <option value="administrador">Administrador</option>
          </select>
          </span>
          </td>
      </tr>
        <tr valign="top">
          <td height="32" class="subHeader" id="monthformat">
          <input   type ="radio"  name="permissao"   value ="autorizado" >Autorizar
          </td>
          <td class="subHeader" id="monthformat">
          <input   type ="radio"  name="permissao"   value ="invalido" >Não Autorizar
          </td>
          <td class="subHeader" id="monthformat">&nbsp;</td>
          <td colspan="3" align="right" class="subHeader" id="monthformat">
            <label>
            <input name="id" type="hidden" id="id" value="<?php echo $linha['id']; ?>" />
            </label>
            <label>
            <input name="Submit" type="submit" class="botoes" value="CONFIRMAR" onClick="return confirma()" />
            </label>
            &nbsp;
           </td>
           </tr>
        <tr align="right">
          <td colspan="6" valign="top" class="subHeader" id="monthformat"></td>
        </tr>
        <tr>
          <td height="21" colspan="6" align="right" valign="top" class="subHeader" id="monthformat">&nbsp;</td>
        </tr>
    </table>
    </form>
    <p>
      <?php
	   }
	  ?>
</p>
    <p>&nbsp;</p>
    <p>&nbsp;    </p>
    <p>&nbsp;</p>
</html>
