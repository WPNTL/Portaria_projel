<? include "config.php";
$caminho = "/var/www/html/vendas/image"; // Coloque o caminho do servidor para a pasta onde as imagens vao ficar.
if(empty($file)) {
?>
<form method="POST">
Imagem: <input type="file" name="file"><br>
Formato: <select name="formato">
<option value="gif">Gif</option>
<option value="jpeg">Jpg</option>
</select><br>
<input type="submit" value="Enviar">
</form>
<?
} elseif(!empty($file)) {
$arq = $file_name;
if(move_uploaded_file($file."/".$arq, $caminho."/".$arq)) {
$abre = fopen($caminho."/".$arq, "r");
$le = fread($abre, filesize($caminho."/".$arq));
fclose($abre);
$qr = "INSERT INTO imagens (formato,imagem) VALUES('".$formato."','".addslashes($le)."')" ;
mysql_query($qr) or die(mysql_error());
} else {
echo "Nao foi possivel enviar a imagem!";
}
}
?>