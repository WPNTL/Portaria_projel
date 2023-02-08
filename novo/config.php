<?php
/* configurações do banco de dados na INTRANET */

$servidor = "localhost";
$usuario_bd = "root";
$senha_bd = "";
$banco = "qualidade";
$con = mysql_connect($servidor, $usuario_bd, $senha_bd);
mysql_select_db ($banco);

?>
