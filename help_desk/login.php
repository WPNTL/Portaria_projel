<?php
// inclui o arquiv o de configuração do sistema
include "conecta.php";
// recebe dados do formulario
$login = $_POST['login'];
$senha = $_POST['senha'];
$permissao= "autorizado";
$nivel_admin = "administrador";
$nivel_usuario = "usuario";

//da a mensagem se algum campo obrigatorio estiver em branco e retorna a pagina de cadastro
if( ($login == "") || ($senha == "")){
        print "<script> alert('Digite Seu Login e senha!');
                                        location.href='index.php';
               </script>";
        exit;
}

// verifica se o usuario existe
$consulta = mysql_query("select * from usuarios where login='$login' and status='$permissao'");
$campos = mysql_num_rows($consulta);
if($campos != 0) {
// se o usuario digitar o login certo mas a senha errada ele da a menssagem abaixo
	if($senha != mysql_result($consulta,0,"senha")) {
       print "<script> alert('Usuario ou Senha Incorreta!');
                                 location.href='index.php';
               </script>";
        exit;
	} else {
		// estiver tudo certo vamos ver se ele é o administrador
		if($nivel_admin == mysql_result($consulta,0,"nivel")) {
			// se for o login do administrador vamos verificar a senha dele
			// se é igual a do administrado
			if($nivel_usuario != mysql_result($consulta,0,"nivel")) {
				// se for o administrador vomos criar a sessão
				session_start();
				$_SESSION['login_usuario'] = $login;
				$_SESSION['senha_usuario'] = $senha;

				// redireciona o link para uma outra pagina
				header("Location: administrador/menu_administrador.php");

   }
		} else {
           	// estiver tudo certo vamos ver se ele é o usuario
		if($nivel_usuario == mysql_result($consulta,0,"nivel")) {
			// se for o login do administrador vamos verificar a senha dele
			// se é igual a do administrado
			if($nivel_admin != mysql_result($consulta,0,"nivel")) {
				// se for o administrador vomos criar a sessão
				session_start();
				$_SESSION['login_usuario'] = $login;
				$_SESSION['senha_usuario'] = $senha;

				// redireciona o link para uma outra pagina
				header("Location: inserir.php");

             }
		  }
       }
     }
} else {
//se o usuario digitar um login que não exista ele da a menssagem abaixo
        print "<script> alert('Usuario ou senha Incorreto!');
                               location.href='index.php';
               </script>";
        exit;
}
?>
