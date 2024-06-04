<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Traitement du formulaire d'ajout d'article
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marque = $_POST["marque"];
    $modele = $_POST["modele"];
    $quantite = $_POST["quantite"];
    $prix = $_POST["prix"];

    // Requête préparée pour éviter les injections SQL
    $stmt = $conn->prepare("INSERT INTO stock (marque, modele, quantite, prix) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdd", $marque, $modele, $quantite, $prix);

    if ($stmt->execute()) {
        echo "Article ajouté avec succès!";
    } else {
        echo "Erreur lors de l'ajout de l'article: " . $stmt->error;
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
    <title>Ajouter un article</title>
</head>
<body>
    <h2>Ajouter un article</h2>
    <form method="post" action="ajouter_article.php">
        <label for="marque">Marque:</label>
        <input type="text" name="marque" required><br>

        <label for="modele">Modèle:</label>
        <input type="text" name="modele" required><br>

        <label for="quantite">Quantité:</label>
        <input type="number" name="quantite" required><br>

        <label for="prix">Prix:</label>
        <input type="number" step="0.01" name="prix" required><br>

        <input type="submit" value="Ajouter">
    </form>

    <!-- Bouton de retour à l'accueil -->
    <a href="index.php">Retour à l'accueil</a>
    
</body>
</html>
