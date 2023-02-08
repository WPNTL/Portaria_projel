<?php
include "status.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Calendar</title>
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
-->
</style>
</head>
<body bgcolor="#F4FFE4">

<?php


if (getenv("REQUEST_METHOD") == "POST") {

   $login = $_POST['usuario'];
   $senha = $_POST['password'];
   if ($login and $senha) {
      $conexao = mysql_connect("localhost","","");
      mysql_select_db("suporte",$conexao);
      $query = "INSERT INTO usuarios VALUES('000','$login','$senha')";
      mysql_query($query,$conexao);
      header("Location: inserir_usuario.php");
   } else {
      $err = "Preencha todos os campos!";
   }
}
      
?>
  
<?php
if ($err) {
?>
</p>
<?php
}
?>
<form method="post" action="inserir_usuario.php">



 <tr>
    <td height="490">&nbsp;
    &nbsp;<br />
    <table width="244" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr> 
          <td height="46" colspan="4" class="pageName"><div align="center"> 
              <table align="center">
                <tr> 
                  <td class="subHeader"><b> <div align="center"></div>
                    <?php echo $err; ?></td>
                </tr>
              </table>
              <p>Registro de Tecnicos</p>
            </div></td>
        </tr>
        <tr> 
          <td height="19" colspan="4" class="bodyText"><p align="center" class="style1">&nbsp;</p></td>
        </tr>
        <tr> 
          <td width="94" class="subHeader" id="monthformat">Usu&aacute;rio</td>
          <td width="181" colspan="3" class="subHeader" id="monthformat"><input name="usuario" type="text" id="usuario" size="30" /></td>
        </tr>
        <tr> 
          <td class="subHeader" id="monthformat">Senha</td>
          <td colspan="3" class="subHeader" id="monthformat"><input name="password" type="password" id="password" value="" size="30" /></td>
        </tr>
        <tr> 
          <td valign="top" class="subHeader" id="monthformat">&nbsp;</td>
          <td colspan="3" class="subHeader" id="monthformat">&nbsp;</td>
        </tr>
      </table>
    <table width="332" border="0" align="center" cellspacing="2">
      <tr>
        <td width="143">
          <div align="right">
            <input name="Submit" type="submit" class="botoes" value="Enviar" />
            </div></td>
        <td width="10">&nbsp;</td>
        <td width="167">
          <div align="left">
            <input name="Submit2" type="reset" class="botoes" value="Limpar" />
            </div></td>
      </tr>
    </table>
    <p>&nbsp;</p>
</form>


<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</html>
