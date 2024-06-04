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

    <!-- Liens pour la mise à jour et la suppression -->
    <?php while ($row = $result->fetch_assoc()) : ?>
        <p>
            Marque: <?php echo htmlentities($row["marque"]); ?><br>
            Modèle: <?php echo htmlentities($row["modele"]); ?><br>
            Quantité: <?php echo htmlentities($row["quantite"]); ?><br>
            Prix: <?php echo htmlentities($row["prix"]); ?><br>
            
            <!-- Lien pour la mise à jour -->
            <a href="update_article.php?id=<?php echo $row['id']; ?>">Modifier</a> 
            
            <!-- Lien pour la suppression -->
            <a href="delete_article.php?id=<?php echo $row['id']; ?>">Supprimer</a>
            
            <br><br>
        </p>
    <?php endwhile; ?>

    <?php
    $conn->close();
    ?>
</body>
</html>
