

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
function confirma(){
        if(confirm('Deseja realmente efetuar a chamada?'))
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
    <a href="index.php" >
    Técnico Logue-se Aqui
    </a>
    <div class="cdateh" id="cdateh">
    </div>
    </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#99CC66" background="imagens/mm_dashed_line.gif">
     &nbsp;
     </td>
  </tr>
</table>
<form method="post" action="cadastra_chamada_usuario.php">
 <tr>
    <td height="490">
    &nbsp;&nbsp;<BR>
    <table width="526" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr>
          <td height="46" colspan="4" class="pageName"><div align="center">
          <p>Controle de Atendimentos </p>
          </div>
          </td>
        </tr>
        <tr>
          <td height="20" colspan="4" class="bodyText"><span class="style1">Entre aqui com os dados do chamado, o preenchimento de todos os campos &eacute; obrigat&oacute;rio.</span></td>
        </tr>
        <tr>
          <td class="subHeader" id="monthformat">Setor</td>
          <td colspan="3" class="subHeader" id="monthformat">
          <select name="setor">
                <option value="">  </option>
				<option value="Administracao">Administracao</option>
                <option value="Contabilidade">Contabilidade</option>
                <option value="RH">RH</option>
                <option value="TI">TI</option>
                <option value="CPD">CPD</option>
          </select>
          </td>
        </tr>
        <tr>
          <td width="94" class="subHeader" id="monthformat">Andar</td>
          <td width="58" class="subHeader" id="monthformat">
          <select name="andar">
            <option value="">  </option>
				<option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
        </select>
          </select></td>
          <td width="50" class="subHeader" id="monthformat"><div align="left">Ramal</div></td>
          <td width="308" class="subHeader" id="monthformat"><div align="left">
            <input name="ramal" type="text" id="ramal" size="37" />
          </div></td>
        </tr>
        <tr>
          <td class="subHeader" id="monthformat">Contato</td>
          <td colspan="3" class="subHeader" id="monthformat"><input name="contato" type="text" id="contato" size="60" /></td>
        </tr>
        <tr>
          <td class="subHeader" id="monthformat">Equipamento</td>
          <td colspan="3" class="subHeader" id="monthformat"><input name="equipamento" type="text" id="equip" value="" size="60" /></td>
        </tr>
        <tr>
          <td valign="top" class="subHeader" id="monthformat">          Problema</td>
          <td colspan="3" class="subHeader" id="monthformat"><textarea name="prob_usuario" cols="46" wrap="physical" id="prob_rep"></textarea></td>
        </tr>
        <tr>
          <td colspan="4" valign="top" class="subHeader" id="monthformat">&nbsp;</td>
        </tr>
      </table>
    <table width="332" border="0" align="center" cellspacing="2">
      <tr>
        <td width="143">
          <div align="right">
            <input name="Submit" type="submit" class="botoes" value="Enviar" onClick="return confirma()"/>
            </div></td>
        <td width="10">&nbsp;</td>
        <td width="167">
          <div align="left">
            <input name="Submit2" type="reset" class="botoes" value="Limpar" />
            </div></td>
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
