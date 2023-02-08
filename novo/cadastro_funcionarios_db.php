<?php 
include "valida_sessao.php";

//VERIFICA SE O FORM FOI ENVIADO

//CONECTA AO MYSQL
$conn = mysql_connect("localhost", "root", "")
or die("Erro na conexão com o BD");
mysql_select_db("qualidade", $conn);

$ano_avaliacao = date('Y');

//RECEBE DADOS DO FORMULÁRIO
$pFoto = $_FILES["txtFoto"]["tmp_name"];
$pTipo = $_FILES["txtFoto"]["type"];


//MOVE
move_uploaded_file($pFoto, "c:\\temp\\latest.img");

//por isso
$pont = fopen($pFoto, "r+"); //abre o arquivo
$dados = fread($pont,filesize($pFoto)); // percorre o arquivo
fclose($pont); // fecha a variável $pont
$dados = addslashes($dados); // percorre o arquivo.

//INSERE NA BASE DE DADOS
$sql = mysql_query("INSERT INTO fotos (foto, tipo) VALUES('".$dados."', '".$pTipo."') ",$conn);

// BUSCA O ID FOTO
$query = "SELECT * FROM fotos ORDER BY 'id'";
$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) { $id_foto = $dados["id"]; }

// GRAVA OS DADOS DOS NOVO FUNCIONARIOS
$sql = "INSERT INTO funcionarios ( nome_funcionarios, status, id_setor, id_funcao, id_foto ) VALUES ( '$nome_funcionarios', '$status', '$id_setor', '$id_funcao', '$id_foto' )";
$sql = mysql_query($sql) or die ("Houve erro na gravação dos dados.");  

// BUSCA O ID FUNCIONARIO CONFORME O NOME
$query = "SELECT * FROM funcionarios WHERE nome_funcionarios='$nome_funcionarios' ORDER BY 'nome_funcionarios'";
$result = MYSQL_QUERY($query);
while ($dados = mysql_fetch_array($result)) { $id_funcionarios = $dados["id"]; }


// GRAVA O ID FUNCIONARIO NA TABELA DA AVALIAÇÃO DESEMPENHO
$sql = "INSERT INTO avaliacao_desempenho ( id_funcionarios, ano_avaliacao ) VALUES ( '$id_funcionarios', '$ano_avaliacao' )";
$sql = mysql_query($sql) or die ("Houve erro na gravação dos dados."); 


echo "<table border='0' cellpading='0' cellspacing='0' width='95%'>";

//LINHAS AFETADAS
$row = mysql_affected_rows($conn);

//TOTAL DE LINHAS AFETADAS PELA INSERÇÃO
if($row) {
echo "<tr>";
echo "<td>Inclusão efetuada com Sucesso!";
echo "</tr>";
}//FECHA IF ( num_rows )
else {
echo "<tr>";
echo "<td>Erro na inclusão do Funcionário!";
echo "</tr>";
}//FECHA ELSE
echo "</table>";
?>

<input class="botao1" type="button" value="Voltar" onClick="javascript:void(open('principal.php','_top','scrollbars=yes'))">

<input class="botao1" type="button" value="Fechar Janela" onClick="javascript:window.close()">