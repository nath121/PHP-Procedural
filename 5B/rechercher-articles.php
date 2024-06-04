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

// Traitement du formulaire de recherche
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $keyword = $_POST["keyword"];

    // Requête préparée avec CONCAT pour la recherche
    $stmt = $conn->prepare("SELECT * FROM stock WHERE CONCAT(marque, ' ', modele) LIKE ? ORDER BY prix ASC");
    $keyword = '%' . $keyword . '%';
    $stmt->bind_param("s", $keyword);
    $stmt->execute();

    $result = $stmt->get_result();

    echo "<h2>Résultats de la recherche</h2>";

    // Affichage des résultats
    while ($row = $result->fetch_assoc()) {
        echo "Marque: " . htmlentities($row["marque"]) . "<br>";
        echo "Modèle: " . htmlentities($row["modele"]) . "<br>";
        echo "Quantité: " . htmlentities($row["quantite"]) . "<br>";
        echo "Prix: " . htmlentities($row["prix"]) . "<br><br>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher des articles</title>
</head>
<body>
    <h2>Rechercher des articles</h2>
    <form method="post" action="rechercher-articles.php">
        <label for="keyword">Mot clé:</label>
        <input type="text" name="keyword" required><br>

        <input type="submit" value="Rechercher">
    </form>

    <!-- Bouton de retour à l'accueil -->
    <a href="index.php">Retour à l'accueil</a>
    
</body>
</html>
