<?php
@session_start();

// inclui o arquivo de configuração do sistema
include "conecta.php";

// verifica se a variavel existir
if(isset($_SESSION['login_usuario']) and isset($_SESSION['senha_usuario'])) {
	// se existir as sessões coloca os valores em uma varivel
	$login_usuario = $_SESSION['login_usuario'];
	$senha_usuario = $_SESSION['senha_usuario'];
} else {
    // caso o usuario tente acessa pagina protegida sem se logar da essa menssagem abaixo
     print "<script> alert('Pagina Protegida Logue-se!');
                            location.href='index.php';
            </script>";
     exit;
}

// verifica se as variaveis estão atribuidas
if(!(empty($login_usuario) or empty($senha_usuario))) {
	// se estiverem atribuidos vamos ver se exist o login
	$consulta = mysql_query("select * from usuarios where login = '$login_usuario'");
	if(mysql_num_rows($consulta) == 1) {
		// se o usuario existir vamos verificar a senha
		if($senha_usuario != mysql_result($consulta,0,"senha")) {
			// se a senha está correta vamos apagar a
			// sessão que existia mas era a errada
			unset($_SESSION['login_usuario']);
			unset($_SESSION['senha_usuario']);

           // caso o usuario tente acessa pagina protegida sem se logar da essa menssagem abaixo
           print "<script> alert('Pagina Protegida Logue-se!');
                            location.href='index.php';
                  </script>";
            exit;
		}
	} else {
		unset($_SESSION['login_usuario']);
		unset($_SESSION['senha_usuario']);

           // caso o usuario tente acessa pagina protegida sem se logar da essa menssagem abaixo
     print "<script> alert('Pagina Protegida Logue-se!');
                            location.href='index.php';
            </script>";
     exit;
	}
}

?>
