<? include "valida_sessao.php"; ?>
<html>
<head>
<title> Alterar Funcionários </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
</head>
<body>


<?
//CONECTA AO MYSQL
$conn = mysql_connect("localhost", "root", "")
or die("Erro na conexão com o BD");
mysql_select_db("qualidade", $conn);


//RECEBE DADOS DO FORMULÁRIO
$pFoto = $_FILES["txtFoto_novo"]["tmp_name"];
$pTipo = $_FILES["txtFoto_novo"]["type"];

//MOVE
move_uploaded_file($pFoto, "c:\\temp\\latest.img");

//por isso
$pont = fopen($pFoto, "r+"); //abre o arquivo
$dados = fread($pont,filesize($pFoto)); // percorre o arquivo
fclose($pont); // fecha a variável $pont
$dados = addslashes($dados); // percorre o arquivo.
//INSERE NA BASE DE DADOS
$sql = mysql_query("UPDATE fotos (foto, tipo) VALUES('".$dados."', '".$pTipo."') ",$conn);

/* BUSCA O ID FOTO
$query = "SELECT * FROM fotos ORDER BY 'id'";
$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) { $id_foto = $dados["id"]; }*/



// BUSCAR ID_SETOR CONFORME NOME DO SETOR
$query = "SELECT * FROM setor WHERE nome_setor='$nome_setor_novo' ORDER BY 'nome_setor'";
$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) { $id_setor_novo = $dados["id"]; }

?>
<input class=nedita_left readonly type=hidden name=id_setor_novo value="<?echo $id_setor_novo;?>">


<? 

// BUSCAR ID_FUNCAO CONFORME FUNCAO
$query = "SELECT * FROM funcao WHERE nome_funcao='$nome_funcao_novo' ORDER BY 'nome_funcao'";
$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) { $id_funcao_novo = $dados["id"]; }

?>
<input class=nedita_left readonly type=hidden name=id_funcao_novo value="<?echo $id_funcao_novo;?>">


<?

$sql = "UPDATE funcionarios SET status='$status_novo', id_setor='$id_setor_novo', id_funcao='$id_funcao_novo' WHERE id='$id_funcionarios'"; 
$resultado = mysql_query($sql) or die ("Não foi possível Alterar!!!");

?>



<table class=titulo width=50% align="center" height="25">
<tr><td align="center"> ALTERADO COM SUCESSO! </tr></td>
<tr><td align="center"> <input class="botao1" type="button" value="Fechar Janela" onClick="javascript:window.close()"> </tr></td>
</table>

</body>
</html>
