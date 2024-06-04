
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'connect.php';

// Récupération de tous les livres
$sql = "SELECT * FROM livres";
$result = $pdo->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            display: inline;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>Bibliothèque</h1>

    <!-- Menu -->
    <ul>
        <li><a href="ecrit_db.php">Ajouter un livre</a></li>
        <li><a href="rech_db.php">Rechercher par titre</a></li>
    </ul>

    <!-- Liste de tous les livres -->
    <?php
    if ($result->rowCount()) {
        echo "<h2>Liste de tous les livres</h2>";
        echo "<table border=1 cellpadding=8>";
        echo "<tr><td>id</td><td>Auteur</td><td>Titre</td><td>Année</td></tr>";

        while ($ligne = $result->fetch()) {
            echo "<tr>";
            echo "<td>" . htmlentities($ligne['id']) . "</td>";
            echo "<td>" . htmlentities($ligne['auteur']) . "</td>";
            echo "<td>" . htmlentities($ligne['titre']) . "</td>";
            echo "<td>" . htmlentities($ligne['annee']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>La bibliothèque est vide.</p>";
    }
    ?>

</body>
</html>
