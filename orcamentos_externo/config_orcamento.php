<?php
/* configurações do banco de dados na FTP */

$servidor = "localhost";
$usuario_bd = "projelme_root";
$senha_bd = "400654";
$banco = "projelme_norcamentos";
$con = mysql_connect($servidor, $usuario_bd, $senha_bd);
mysql_select_db ($banco); 







?>
