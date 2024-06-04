<!DOCTYPE html>
<html>
<head>
    <title>Résultat de la Table de Multiplication</title>
</head>
<body>

<h1>Résultat de la Table de Multiplication</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreMaximal = $_POST["nombre"];

    if ($nombreMaximal >= 2 && $nombreMaximal <= 20) {
        echo "<p>Tables de multiplication :</p>";
        
        for ($i = 1; $i <= $nombreMaximal; $i++) {
            echo "<p><u>Table de $i</u></p>";
            echo "<p>";
            for ($j = 1; $j <= $nombreMaximal; $j++) {
                $resultat = $i * $j;
                echo "<span class='underline'>$i</span> &times; $j = $resultat";
                if ($j < $nombreMaximal) {
                    echo "<br>";
                }
            }
            echo "</p>";
        }
    } else {
        echo "<p>Le nombre maximal doit être compris entre 2 et 20.</p>";
    }
} else {
    echo "<p>Le nombre maximal doit être compris entre 2 et 20.</p>";
}
?>
<a href="http://localhost/dev/index.php">Recommencer</a>

</body>
</html>