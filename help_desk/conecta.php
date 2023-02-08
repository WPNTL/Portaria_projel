<?php
// faz conexão com o servidor MySQL
$local_serve = "localhost"; 	 // local do servidor
$usuario_serve = "root";		 // nome do usuario
$senha_serve = "hpcorexeon";			 	 // senha
$banco_de_dados = "suporte"; 	 // nome do banco de dados

$conn = @mysql_connect($local_serve,$usuario_serve,$senha_serve) or die ("O servidor não responde!");

// conecta-se ao banco de dados
$db = @mysql_select_db($banco_de_dados,$conn)
	or die ("Não foi possivel conectar-se ao banco de dados!");


?>
