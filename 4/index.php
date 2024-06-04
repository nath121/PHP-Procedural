<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes des élèves</title>
</head>
<body>

    <form action="traitement.php" method="post">
        <?php
        // Boucle pour demander les informations pour 5 élèves
        for ($i = 1; $i <= 5; $i++) {
            echo "<h2>Personne $i</h2>";
            echo "<label for='nom_$i'>Nom :</label>";
            echo "<input type='text' id='nom_$i' name='noms[]' required><br><br>";

            echo "<label for='math_$i'>Math :</label>";
            echo "<input type='number' id='math_$i' name='math[]' min='0' max='20' required><br><br>";

            echo "<label for='geo_$i'>Géo :</label>";
            echo "<input type='number' id='geo_$i' name='geo[]' min='0' max='20' required><br><br>";

            echo "<label for='musique_$i'>Musique :</label>";
            echo "<input type='number' id='musique_$i' name='musique[]' min='0' max='20' required><br><br>";
        }

        ?>

        <input type="submit" value="Envoyer">
    </form>

</body>
</html>
