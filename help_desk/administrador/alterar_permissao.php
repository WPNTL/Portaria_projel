<?php

include "../conecta.php";

   $id = $_POST['id'];
   $permissao = $_POST['permissao'];
   $nivel = $_POST['nivel'];

//da a mensagem se algum campo obrigatorio estiver em branco e retorna a pagina de cadastro
if( $permissao == NULL ){
        print "<script> alert('escolha entre autorizar e não autorizar!');
                                        history.back(-1);</script>";
        exit;
}

$sql = "UPDATE `usuarios` SET `status` = '$permissao',`nivel` = '$nivel' WHERE `id` = '$id' ";

$consulta = mysql_query($sql);

     // verifica se o usuario foi cadastrado
if($consulta) {
         print "<script> alert('Confirmacão Feita!');
                                        location.href='autorizar_tecnicos.php';
               </script>";
         exit;
} else {
         print "<script> alert('Não foi possivel fazer a confirmacão!');
                                        location.href='autorizar_tecnicos.php';
               </script>";
         exit;
}
?>

