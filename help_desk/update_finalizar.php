
  <?php
include "conecta.php";

   $id = $_POST['id'];
   $prob_encontrado = $_POST['prob_encontrado'];
   $solucao = $_POST['solucao'];

//da a mensagem se algum campo obrigatorio estiver em branco e retorna a pagina de cadastro
if( ($prob_encontrado == NULL) ||
    ($solucao == NULL)){
        print "<script> alert('digite problema e a solucao encontrada!');
                                        history.back(-1);</script>";
        exit;
}

      $sql = "UPDATE registros SET estado='FINALIZADO', solucao='$solucao', prob_encontrado='$prob_encontrado', data_finalizada = NOW() WHERE id='$id'";
      $consulta = mysql_query($sql);

     // verifica se o usuario foi cadastrado
if($consulta) {
         print "<script> alert('chamada finalizada!');
                                        location.href='painel_andamentos.php';
               </script>";
         exit;
} else {
         print "<script> alert('Não foi possivel finalizar a chamada!');
                                        location.href='painel_andamentos.php';
               </script>";
         exit;
}
?>

