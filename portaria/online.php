<?
/*
CREATE TABLE useronline (
       timestamp int(15) DEFAULT '0' NOT NULL,
       ip varchar(40) NOT NULL,
      arquivo varchar(100) NOT NULL,
      PRIMARY KEY (timestamp),
      KEY ip (ip),
      KEY file (file)
);
*/
  $db_host = "localhost"; // Endereço do servidor mySQL
  $db_user = "root"; // Seu Login no mySQL
  $db_pass = ""; // Sua Senha no mySQL
  $db_bdad = "projelme"; // Nome do Banco de Dados

  mysql_pconnect($db_host, $db_user, $db_pass) or die (mysql_error());
  $timestamp=time();
  $timeout=time()-300; // valor em segundos
  $result=mysql_db_query($db_bdad, "INSERT INTO usuarios VALUES ('$timestamp','$REMOTE_ADDR','$PHP_SELF')");
  $result=mysql_db_query($db_bdad, "DELETE FROM usuarios WHERE timestamp<$timeout");
  $result=mysql_db_query($db_bdad, "SELECT DISTINCT ip FROM usuarios") or die(mysql_error());
  $usuarios=mysql_num_rows($result);
  mysql_close();

  echo"$usuarios usuários(S) conectados no site";

?>

