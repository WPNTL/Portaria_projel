<?php
// inicializa a sessão
session_start();
// limpa a sessão
$_SESSION = array(); // colocando a session com um array vazio faz com ela
					 // fique vazia sem nenhuma variavel nela, liberando o espaço

// destroy a sessão
session_destroy();

// caso o usuario faca logout da a menssagem abaixo
     print "<script> alert('Logout Concluido');
                            location.href='index.php';
            </script>";
     exit;
?>
