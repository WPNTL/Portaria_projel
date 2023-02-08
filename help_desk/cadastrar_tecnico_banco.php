<?php

include "conecta.php";

   $nome = $_POST['nome'];
   $login = $_POST['login'];
   $senha = $_POST['senha'];
   $confirmar = $_POST['confirmar'];
   $permissao= "invalido";
   $nivel= "usuario";

//da a mensagem se algum campo obrigatorio estiver em branco e retorna a pagina de cadastro
if( ($nome == NULL) ||
    ($login == NULL) ||
    ($senha == NULL) ||
    ($confirmar == NULL)){
        print "<script> alert('Os campos obrigatorios encontram-se em branco!');
                                        history.back(-1);</script>";
        exit;
}


//se a senha e a confirmar senha não forem iguais da a menssagem abaixo
if($senha != $confirmar){
        print "<script> alert('as senhas não conferem digite novamente!');
                                        history.back(-1);</script>";
        exit;
}


// verifica se o login já existe
$consulta = mysql_query("select * from usuarios where login='$login'");
$campos = mysql_num_rows($consulta);
if($campos != 0) {
// se o login já existir da a menssagem de erro abaixo
	if($login == mysql_result($consulta,0,"login")) {
        print "<script> alert('login já cadastrado tente outro!');
                                        history.back(-1);
               </script>";
        exit;
	}
}

//cadastra no banco o usuario com a senha criptografada  com a funcao password('$senha')
      $sql = "INSERT INTO usuarios VALUES('','$nome','$login','$senha','$permissao','$nivel')";
      $consulta = mysql_query($sql);

     // verifica se o usuario foi cadastrado
if($consulta) {
         print "<script> alert('cadastro aguardando aprovacao do administrador!');
                                        location.href='index.php';
               </script>";
         exit;
} else {
         print "<script> alert('Não foi possivel efetuar cadastro!');
                                        location.href='index.php';
               </script>";
         exit;
}
?>

