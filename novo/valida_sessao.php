<?php
session_start();

if(IsSet($_SESSION["nome_setor"]))
    $nome_setor = $_SESSION["nome_setor"];
    
if(IsSet($_SESSION["senha"]))
    $senha = $_SESSION["senha"];


if(!(empty($nome_setor) OR empty($senha)))
{
    include "config.php";
	$resultado = mysql_query("SELECT * FROM setor WHERE nome_setor='$nome_setor'");
	
if(mysql_num_rows($resultado)==1)
	{
	
if($senha != mysql_result($resultado,0,"senha"))
	{
    	unset ($_SESSION['nome_setor']);
    	unset ($_SESSION['senha']);
    
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
        unset ($_SESSION['senha']);

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
