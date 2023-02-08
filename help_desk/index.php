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
    <td colspan="2" bgcolor="#5C743D">
    <img src="imagens/mm_spacer.gif" alt="" width="1" height="2" border="0" />
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
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Úsuario cadastre seu chamado
    </a>
    <a href="index.php" >
    Técnico Logue-se Aqui
    </a>
    <div class="cdateh" id="cdateh"></div>
    </div>
    </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#99CC66" background="imagens/mm_dashed_line.gif">
     </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#99CC66" background="imagens/mm_dashed_line.gif">
     &nbsp;
     </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#5C743D"><img src="imagens/mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
  </tr>
</table>
<form method="post" action="login.php">
 <tr>
    <td height="490">
      <table width="232" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr>
          <td height="46" colspan="4" class="pageName"><div align="center">
              <p><img src="imagens/cadeado.gif" width="24" height="24" /></p>
              <p>Identifique-se</p>
            </div></td>
        </tr>
        <tr>
          <td height="54" colspan="4" class="bodyText">
            <p align="center" class="style1"><span class="style1">Entre
              aqui com o seu Login e Senha para acessar o sistema.</span></p>
            </td>
        </tr>
        <tr>
          <td width="76" class="subHeader" id="monthformat">
          Login
          </td>
          <td width="180" colspan="3" class="subHeader" id="monthformat">
          <input name="login" type="text" size="30" />
          </td>
        </tr>
        <tr>
          <td class="subHeader" id="monthformat">
          Senha
          </td>
          <td colspan="3" class="subHeader" id="monthformat">
          <input name="senha" type="password" size="30" />
          </td>
          </tr>
        <tr>
          <td colspan="4" align="center" class="subHeader" id="monthformat">
          <a href="cadastrar_tecnico.php">cadastre-se aqui</a>
          </td>
        </tr>
      </table>
    <table width="226" border="0" align="center" cellspacing="2">
      <tr>
        <td width="98">
          <div align="right">
            <input name="Submit" type="submit" class="botoes" value="Enviar" />
            </div>
            </td>
        <td width="19">
        &nbsp;
        </td>
        <td width="95">
          <div align="left">
            <input name="Submit2" type="reset" class="botoes" value="Limpar" />
            </div>
            </td>
      </tr>
    </table>
</form>
<table width="645" align="center" cellspacing="2">
  <tr>
    <td><div align="center"><span class="bodyText"><span class="style1">Powered by</span></span></div>      <div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center"><img src="imagens/logos.gif" alt="Logos" width="213" height="33" /></div>
    <div align="center"></div></td>
  </tr>
</table>
</html>

