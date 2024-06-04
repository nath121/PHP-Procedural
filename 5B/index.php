<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requête pour récupérer tous les articles
$sql = "SELECT * FROM stock";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <h1>Bienvenue sur mon site de gestion de stock</h1>

    <ul>
        <li><a href="ajouter_article.php">Ajouter un article</a></li>
        <li><a href="rechercher-articles.php">Rechercher des articles</a></li>
    </ul>

    <h2>Liste de tous les articles</h2>

    <?php
    // Afficher les articles
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>";
            echo "Marque: " . htmlentities($row["marque"]) . "<br>";
            echo "Modèle: " . htmlentities($row["modele"]) . "<br>";
            echo "Quantité: " . htmlentities($row["quantite"]) . "<br>";
            echo "Prix: " . htmlentities($row["prix"]) . "<br>";
            echo "</p>";
        }
    } else {
        echo "Aucun article trouvé.";
    }

    $conn->close();
    ?>
</body>
</html>
