<?php

include "conecta.php";

   $andar = $_POST['andar'];
   $setor = $_POST['setor'];
   $contato = $_POST['contato'];
   $ramal = $_POST['ramal'];
   $equipamento = $_POST['equipamento'];
   $prob_usuario = $_POST['prob_usuario'];

//da a mensagem se algum campo obrigatorio estiver em branco e retorna a pagina de cadastro
if( ($andar == NULL) ||
    ($setor == NULL) ||
    ($contato == NULL) ||
    ($ramal == NULL) ||
    ($equipamento == NULL) ||
    ($prob_usuario == NULL)){
        print "<script> alert('Os campos obrigatorios encontram-se em branco!');
                                        history.back(-1);</script>";
        exit;
}

      $sql = "INSERT INTO registros VALUES('','$andar','$setor','$contato','$ramal','$prob_usuario',NULL,NULL,'ABERTO',NOW(),NULL,NULL,'$tecnico','$equipamento')";
     $consulta = mysql_query($sql);

     // verifica se o usuario foi cadastrado
if($consulta) {
         print "<script> alert('chamada Cadastrada com sucesso!');
                                        location.href='index.php';
               </script>";
         exit;
} else {
         print "<script> alert('Não foi possivel cadastrar a chamada!');
                                        location.href='index.php';
               </script>";
         exit;
}
?>

