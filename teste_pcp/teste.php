<!-- nosso formul�rio com 5 op��es (multiple) //-->
<form action="?envia=ok" method="POST">
<select name="opcoes[]" size="5" multiple>
<option value="valor 1">valor 1</option>
<option value="valor 2">valor 2</option>
<option value="valor 3">valor 3</option>
<option value="valor 4">valor 4</option>
<option value="valor 5">valor 5</option>
</select>
<input type="submit">
</form>


<?php
// pedido enviado do formul�rio
if($envia=="ok") {

// obtemos os valores selecionados
$opcoes = $_POST['opcoes'];
// transformamos as op��es
foreach($opcoes as $selecionadas) {
// imprimimos as op��es selecionadas na tela
// poderia tamb�m executar uma linha para deletar um item de um banco de dados
echo "$selecionadas<br>";
}

}
?>

<form action="?envia=ok2" method="POST">
<input type="checkbox" name="opcoes[]" value="valor 1" >valor 1
<input type="checkbox" name="opcoes[]" value="valor 2" >valor 2
<input type="checkbox" name="opcoes[]" value="valor 3" >valor 3
<input type="checkbox" name="opcoes[]" value="valor 4" >valor 4
<input type="submit">
</form>


<?php
// pedido enviado do formul�rio
if($envia=="ok2") {

// obtemos os valores selecionados
$opcoes = $_POST['opcoes'];
// transformamos as op��es
foreach($opcoes as $selecionadas) {
// imprimimos as op��es selecionadas na tela
// poderia tamb�m executar uma linha para deletar um item de um banco de dados
echo "$selecionadas<br>";
}

}