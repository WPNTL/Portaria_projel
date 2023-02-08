<?php
session_start();

if(IsSet($_SESSION["nome_usuario"]))
    $nome_usuario = $_SESSION["nome_usuario"];
if(IsSet($_SESSION["senha_usuario"]))
    $senha_usuario = $_SESSION["senha_usuario"];
if(IsSet($_SESSION["ip_projelmec"]))
    $ip_projelmec = $_SESSION["ip_projelmec"];

if(!(empty($nome_usuario) OR empty($senha_usuario) OR empty($ip_projelmec)))
{
    include "config_pcp.php";
	$resultado = mysql_query("SELECT * FROM usuarios WHERE username='$nome_usuario'");
	if(mysql_num_rows($resultado)==1)
	{
	if($senha_usuario != mysql_result($resultado,0,"senha"))
	{
        unset ($_SESSION['nome_usuario']);
        unset ($_SESSION['senha_usuario']);
        unset ($_SESSION['ip_projelmec']);
        echo "<html><body>";
	echo "<p align=\"center\">Você não efetuou o LOGIN!</p>";
	echo "<p align=\"center\"><a href=\"index.php\">Voltar</a></p>";
	echo "</body></html>";
        exit;
        }
        }
    else
        {
        unset ($_SESSION['nome_usuario']);
        unset ($_SESSION['senha_usuario']);
        unset ($_SESSION['ip_projelmec']);
        echo "<html><body>";
	echo "<p align=\"center\">Você não efetuou o LOGIN!</p>";
	echo "<p align=\"center\"><a href=\"index.php\">Voltar</a></p>";
	echo "</body></html>";
        exit;
        }
        }
    else
        {
        echo "<html><body>";
	echo "<p align=\"center\">Você não efetuou o LOGIN!</p>";
	echo "<p align=\"center\"><a href=\"index.php\">Voltar</a></p>";
	echo "</body></html>";
        exit;
        }
mysql_close($con);

?>
