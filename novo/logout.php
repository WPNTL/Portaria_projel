<?php
include "valida_sessao.php";
session_start();
$_SESSION = array();  // se voc� n�o estiver usando o array $_SESSION, use session_unset()
session_destroy();
header ("Location: index.php");
?>
