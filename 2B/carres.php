<!DOCTYPE html>
<html>
<head>
    <title>Table des carrés</title>
</head>
<body>

<h1>Table des carrés</h1>

<?php
function carre($nombre) {
    return $nombre * $nombre;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreMaximal = $_POST["nombre"];

    if ($nombreMaximal >= 1 && $nombreMaximal <= 100) {
        echo "<p>Ce programme calcule les carrés de 1 à $nombreMaximal</p>";
        
        for ($i = 1; $i <= $nombreMaximal; $i++) {
            $resultat = carre($i);
            echo "Le carré de $i est : $resultat</p><br>";
        }
    } else {
        echo "<p>Le nombre maximal doit être compris entre 1 et 100.</p>";
    }
} else {
    echo "<p>Le nombre maximal doit être compris entre 1 et 100.</p>";
}
?>

<a href="http://localhost/dev/index.php">Recommencer</a>

</body>
</html>