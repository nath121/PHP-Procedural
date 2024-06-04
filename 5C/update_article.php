<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $marque = $_POST["marque"];
    $modele = $_POST["modele"];
    $quantite = $_POST["quantite"];
    $prix = $_POST["prix"];

    $stmt = $conn->prepare("UPDATE stock SET marque = ?, modele = ?, quantite = ?, prix = ? WHERE id = ?");
    $stmt->bind_param("ssdsi", $marque, $modele, $quantite, $prix, $id);
    $stmt->execute();

    echo "Article mis à jour avec succès!";
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $conn->query("SELECT * FROM stock WHERE id = $id");
    $row = $result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mettre à jour un article</title>
</head>
<body>
    <h2>Mettre à jour un article</h2>
    <form method="post" action="update_article.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="marque">Marque:</label>
        <input type="text" name="marque" value="<?php echo $row['marque']; ?>" required><br>

        <label for="modele">Modèle:</label>
        <input type="text" name="modele" value="<?php echo $row['modele']; ?>" required><br>

        <label for="quantite">Quantité:</label>
        <input type="number" name="quantite" value="<?php echo $row['quantite']; ?>" required><br>

        <label for="prix">Prix:</label>
        <input type="number" step="0.01" name="prix" value="<?php echo $row['prix']; ?>" required><br>

        <input type="submit" value="Mettre à jour">
    </form>

    <!-- Bouton de retour à l'accueil -->
    <a href="index.php">Retour à l'accueil</a>
</body>
</html>
