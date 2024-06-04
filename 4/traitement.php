<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats des notes</title>
</head>
<body>

    <h1>Résultats des notes</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Récupérer les données du formulaire
        $noms = $_POST['noms'];
        $math = $_POST['math'];
        $geo = $_POST['geo'];
        $musique = $_POST['musique'];

        // Afficher les résultats
        echo "<table border='1'>";
        echo "<tr><th>Élève</th><th>Math</th><th>Géo</th><th>Musique</th><th>Moyenne</th></tr>";

        $totalMath = $totalGeo = $totalMusique = $moyennemoyenne = 0;

        for ($i = 0; $i < count($noms); $i++) {
            echo "<tr>";
            echo "<td>" . $noms[$i] . "</td>";
            echo "<td>" . $math[$i] . "</td>";
            echo "<td>" . $geo[$i] . "</td>";
            echo "<td>" . $musique[$i] . "</td>";

            // Calculer et afficher la moyenne par élève
            $moyenneEleve = ($math[$i] + $geo[$i] + $musique[$i]) / 3; // changer 3 par le nombre d'éléments à gauche
            echo "<th>" . number_format($moyenneEleve, 1) . "</th>";

            // Ajouter les notes pour le calcul de la moyenne par cours
            $totalMath += $math[$i];
            $totalGeo += $geo[$i];
            $totalMusique += $musique[$i];
            $moyennemoyenne += $moyenneEleve;

            echo "</tr>";
        }

        // Calculer les moyennes par cours
        $moyenneMath = $totalMath / count($noms);
        $moyenneGeo = $totalGeo / count($noms);
        $moyenneMusique = $totalMusique / count($noms);

        // Calculer la moyenne générale
        $moyennemoyenne = $moyennemoyenne / count($noms);

        // Afficher les moyennes par cours
        echo "<tr><td><b>Moyenne</b></td>";
        echo "<td><b>" . number_format($moyenneMath, 1) . "</b></td>";
        echo "<td><b>" . number_format($moyenneGeo, 1) . "</b></td>";
        echo "<td><b>" . number_format($moyenneMusique, 1) . "</b></td>";
        echo "<th><b>" . number_format($moyennemoyenne, 1) . "</b></th></tr>";

        echo "</table>";

    } else {
        // Redirection si la page n'est pas appelée via une requête POST
        header("Location: formulaire.php");
        exit();
    }
    // Retour en arrière
    echo "<a href='./index.php'>Recommencer</a>";
    ?>

</body>
</html>
