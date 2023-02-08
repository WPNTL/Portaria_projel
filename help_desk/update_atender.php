
  <?php
include "conecta.php";
include "valida_session.php";

$login_usuario = $_SESSION['login_usuario'];
$id = $_POST['id'];

$sql = "UPDATE registros SET estado='ANDAMENTO', tecnico ='".$login_usuario."', data_andamento = NOW() WHERE id='$id'";
$consulta = mysql_query($sql);

     // verifica se o usuario foi cadastrado
if($consulta) {
         print "<script> alert('Chamado sob sua responsabilidade!');
                                        location.href='ler_abertos.php';
               </script>";
         exit;
} else {
         print "<script> alert('Não foi possivel atender a chamada!');
                                        location.href='ler_abertos.php';
               </script>";
         exit;
}


?>

