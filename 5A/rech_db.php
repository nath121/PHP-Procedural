<?php
require 'connect.php';

$pagename = basename($_SERVER['PHP_SELF']);

if (isset($_GET['mot_cle'])) {
    $mot_cle = strtolower($_GET['mot_cle']); // Convertir le mot-clé en minuscules

    $sql = "SELECT titre, auteur, annee FROM livres WHERE LOWER(titre) LIKE :recherche ORDER BY titre";
    $stmt = $pdo->prepare($sql);

    // Utilisation de bindParam
    $stmt->bindValue(":recherche", "%$mot_cle%", PDO::PARAM_STR);

    $stmt->execute();
    $error = $stmt->errorInfo()[2];

    if (!$error) {
        $stmt->bindColumn('titre', $titre);
        $stmt->bindColumn('auteur', $auteur);
        $stmt->bindColumn('annee', $annee);

        $nombre_lignes = $stmt->rowCount();

        if ($nombre_lignes) {
            echo "<table border=1 cellpadding=8><tr><td>Titre</td><td>Auteur</td><td>Année</td></tr>";

            while ($stmt->fetch()) {
                echo "<tr><td>" . htmlentities($titre) . "</td><td>" . htmlentities($auteur) . "</td><td>$annee</td></tr>";
            }

            echo "</table>";
        } else {
            echo "<p>Aucun livre ne correspond à votre recherche</p>";
        }
    } else {
        
        echo "Une erreur s'est produite. Veuillez réessayer plus tard.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher des livres</title>
</head>
<body>
    <h2>Rechercher des livres</h2>
    <form action="<?= $pagename ?>" method="get">
        <label for="mot_cle">Mot clé:</label>
        <input type="text" name="mot_cle" required>
        <input type="submit" value="Rechercher">
    </form>

    <!-- Bouton de retour à l'accueil -->
    <a href="index.php">Retour à l'accueil</a>
</body>
</html>
