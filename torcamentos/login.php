<?php
// obt�m os valores digitados
$username = $_POST["username"];
$senha = $_POST["senha"];
$ip_rede = $_SERVER["REMOTE_ADDR"];
include "config_orcamento.php";

$sql = "SELECT * FROM usuarios where username='$username'";
$resultado = mysql_query($sql) or die ("N�o foi poss�vel realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) { $bip = $linha["ip"]; }

if($bip == "livre") { $ip = $bip; } else { $ip = $ip_rede; }


// acesso ao banco de dados
$resultado = mysql_query("SELECT * FROM usuarios where username='$username'");
$linhas = mysql_num_rows ($resultado);
if($linhas==0)  // testa se a consulta retornou algum registro
{
	echo "<html><body>";
	echo "<p align=\"center\">Usu�rio n�o encontrado!</p>";
	echo "<p align=\"center\"><a href=\"index.php\">Voltar</a></p>";
	echo "</body></html>";
}
else
{
if ($senha != mysql_result($resultado, 0, "senha")) // confere senha
{
	echo "<html><body>";
	echo "<p align=\"center\">A senha est� incorreta!</p>";
	echo "<p align=\"center\"><a href=\"index.php\">Voltar</a></p>";
	echo "</body></html>";
}
else
{
if ($ip != mysql_result($resultado, 0, "ip")) // confere ip
{
	echo "<html><body>";
	echo "<p align=\"center\">O ip est� incorreto!</p>";
	echo "<p align=\"center\"><a href=\"index.php\">Voltar</a></p>";
	echo "</body></html>";
}
else   // usu�rio e senha corretos. Vamos criar os cookies
{
	session_start();
        $_SESSION['nome_usuario'] = $username;
        $_SESSION['senha_usuario'] = $senha;
        $_SESSION['ip_projelmec'] = $ip;
        // direciona para a p�gina inicial dos usu�rios cadastrados
        header ("Location: frame.php");
}
}
}
mysql_close($con);
// echo $username;   echo $senha;  echo $ip;
?>

