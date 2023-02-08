<?php
include "config.php";
//RECEBE PARÂMETRO
//$id = $id_foto;

//CONECTA AO MYSQL
//$conn = mysql_connect("localhost", "root", "");
//mysql_select_db("julio", $conn);
//EXIBE IMAGEM

// BUSCAR ID_FUNCIONARIOS, STATUS, ID_SETOR, ID_FUNCAO CONFORME O NOME DO FUNCIONARIO
$query = "SELECT * FROM funcionarios WHERE nome_funcionarios='$nome_funcionarios' ORDER BY 'nome_funcionarios'";
$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) { 	$id_funcionarios = $dados["id"]; $status = $dados["status"]; $id_setor = $dados["id_setor"]; $id_funcao = $dados["id_funcao"]; $id_foto = $dados["id_foto"]; }
//echo "id_funcionarios = ".$id_funcionarios;


// BUSCAR ID_FUNCIONARIOS, STATUS, ID_SETOR, ID_FUNCAO CONFORME O NOME DO FUNCIONARIO
$query = "SELECT foto,tipo FROM fotos WHERE id='$id_foto' ORDER BY 'id'";
$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) { 	
$id = $dados["id"]; 
$tipo = $dados["tipo"]; 
$bytes = $dados["foto"]; 

/*
$query = mysql_query("SELECT id,foto,tipo FROM fotos WHERE $id_foto='id' ");
//$sql = mysql_query("SELECT foto,tipo FROM fotos WHERE id = ".$id."",$conn);

$row = mysql_fetch_array($sql);
$id = $row["id"];
$tipo = $row["tipo"];
$bytes = $row["foto"];*/

//EXIBE IMAGEM
header("Content-type: ".$tipo.""); 
echo $bytes;
}
?>