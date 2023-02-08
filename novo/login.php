<?php 
// obtém os valores digitados
$nome_setor = $_POST["nome_setor"];
$senha = $_POST["senha"];

include "config.php";


// acesso ao banco de dados
$resultado = mysql_query("SELECT * FROM setor where nome_setor='$nome_setor'");
$linhas = mysql_num_rows ($resultado);
// testa se a consulta retornou algum registro
if($linhas==0)  
{
	echo "<html><body>";
	echo "<p align=\"center\">Setor não encontrado!</p>";
	echo "<p align=\"center\"><a href=\"index.php\">Voltar</a></p>";
	echo "</body></html>";
}
else
{
if ($senha != mysql_result($resultado, 0, "senha")) // confere senha
{
	echo "<html><body>";
	echo "<p align=\"center\">A senha está incorreta!</p>";
	echo "<p align=\"center\"><a href=\"index.php\">Voltar</a></p>";
	echo "</body></html>";
}
else   // usuário e senha corretos. Vamos criar os cookies
{
	session_start();
        $_SESSION['nome_setor'] = $nome_setor;
        $_SESSION['senha'] = $senha;
        // direciona para a página inicial dos usuários cadastrados
    header ("Location: principal.php");
}
}
mysql_close($con);a
?>

