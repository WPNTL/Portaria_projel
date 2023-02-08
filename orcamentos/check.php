<?
include("config_orcamento.php");
include("codes.php");

$url_cmd = mysql_query("SELECT * FROM funcionarios WHERE nome='$nome' and setor='$setor' and pass='$userpass'");

if( $row = mysql_fetch_array($url_cmd))
{
  $url_db = $row['url'];
/*  $setor = $row['setor']; usar para servidor windows */
  
$url_db1 = $url_db."?userlogin=$setor"."&usuario=$nome";

/* echo "$setor";  */
header("Location: $url_db1");
}
else {
print("<script language='javascript'>window.alert('Login ou Senha inválido, tente novamente!')</script>");
print("<br><br><br><center><h3>Volte e tente efetuar o login novamente</h3><center>");
?>
<center><form action="/testenc" method="post">
<input class="botao1" type="submit" value="Voltar Login"><center></form>
<? } ?>
