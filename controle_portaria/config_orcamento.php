<?php /* configura��es do banco de dados na FTP */
$servidor = "localhost";
$usuario_bd = "root";
$senha_bd = "hpcorexeon";
$banco = "n_orcamentos";
$con = mysql_connect($servidor, $usuario_bd, $senha_bd);
mysql_select_db ($banco);?>