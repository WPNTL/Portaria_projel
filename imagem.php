<?
$qr = "SELECT * FROM imagens ORDER BY codigo DESC";
$sql = mysql_query($qr);
$l = mysql_fetch_array($sql);
header("Content-type: image/".$l[formato]);
echo stripslashes($l[imagem]);
?>