<?php
session_start();
$_SESSION = array();  // se você não estiver usando o array $_SESSION, use session_unset()
session_destroy();
header ("Location: index.php");
?>
