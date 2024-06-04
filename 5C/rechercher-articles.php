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

// Initialiser la variable pour stocker les résultats
$results = [];

// Traitement du formulaire de recherche
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $keyword = $_POST["keyword"];

    // Requête préparée avec CONCAT pour la recherche
    $stmt = $conn->prepare("SELECT * FROM stock WHERE CONCAT(marque, ' ', modele) LIKE ? ORDER BY prix ASC");
    $keyword = '%' . $keyword . '%';
    $stmt->bind_param("s", $keyword);
    $stmt->execute();

    $result = $stmt->get_result();

    // Stocker les résultats dans la variable
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
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

    <!-- Afficher les résultats dans la section HTML -->
    <?php if (!empty($results)) : ?>
        <h3>Résultats de la recherche</h3>
        <?php foreach ($results as $row) : ?>
            <p>
                Marque: <?php echo htmlentities($row["marque"]); ?><br>
                Modèle: <?php echo htmlentities($row["modele"]); ?><br>
                Quantité: <?php echo htmlentities($row["quantite"]); ?><br>
                Prix: <?php echo htmlentities($row["prix"]); ?><br>
                
                <!-- Lien pour la mise à jour -->
                <a href="update_article.php?id=<?php echo $row['id']; ?>">Modifier</a> 
                
                <!-- Lien pour la suppression -->
                <a href="delete_article.php?id=<?php echo $row['id']; ?>">Supprimer</a>
                
            </p>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Bouton de retour à l'accueil -->
    <a href="index.php">Retour à l'accueil</a>
</body>
</html>
