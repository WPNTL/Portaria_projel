<html>
<head>
<title> Login PCP </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
</head>
<body class=body>

<br><br><br><br>
<table width="30%" border="0" cellpading="15" cellspacing="1" align="center" BGColor="black">
<tr><td align="center" BGColor="white"><font font size="3" face="Hevetica, Arial">
<small><h3> Login do PCP </h3></small>

<small><h3> Digite Usuário e Senha: </h3></small>
</font>

<form method="post" action="login_pcp.php">

<p align="center"> Usuário: 
<select type="text" size="1" name="username">
 <?
  include "config_pcp.php";
  $query = "select distinct username from usuarios order by username";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> Selecione o Usuário </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->username==$username)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->username' $sSelect> $sRow->username</option>");   }  ?>
  </select></p>

<p align="center"> Senha: <input type="password" name="senha" size="10" maxLength="10" tabindex="2"></p>

<p align="center"><input class="botao1" type="submit" value="Entrar" tabindex="3"></p>
</form>
<input class="botao1" type="button" value="Fechar Janela" onClick="javascript:window.close()">
</td></tr></table>

</font>
</body>
</html>

