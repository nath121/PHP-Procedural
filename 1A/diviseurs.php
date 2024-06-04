<!doctype html>
<html>
<head>
<title>Calcul des diviseurs</title>
</head>
<body>
<h1>Calcul des diviseurs</h1>
<?php
$a = $_GET["a"];
$i = 1;
echo "<p>Voici les diviseurs de $a :</p>";
while ($i <= $a ) {
if ($a % $i ==0) echo "<p>$i</p>";
$i= $i + 1;
}
?>
<p><a href="index.html">Recommencer</a></p>

</body>
</Html> 