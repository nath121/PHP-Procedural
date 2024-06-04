<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$successMessage = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $conn->query("SELECT * FROM stock WHERE id = $id");
    $row = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm_delete"])) {
        $stmt = $conn->prepare("DELETE FROM stock WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        // Vérifiez si la suppression a réussi
        if ($stmt->affected_rows > 0) {
            $successMessage = "Article supprimé avec succès!";
            // Réinitialisez $row pour éviter l'affichage du formulaire après la suppression
            $row = null;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un article</title>
</head>
<body>
    <h2>Supprimer un article</h2>
    <?php if (isset($row) && empty($successMessage)) : ?>
        <p>Êtes-vous sûr de vouloir supprimer l'article :</p>
        <p>Marque: <?php echo htmlentities($row["marque"]); ?></p>
        <p>Modèle: <?php echo htmlentities($row["modele"]); ?></p>
        <p>Quantité: <?php echo htmlentities($row["quantite"]); ?></p>
        <p>Prix: <?php echo htmlentities($row["prix"]); ?></p>

        <form method="post" action="delete_article.php?id=<?php echo $id; ?>">
            <input type="hidden" name="confirm_delete" value="true">
            <input type="submit" value="Confirmer la suppression">
        </form>
    <?php elseif (!empty($successMessage)) : ?>
        <p><?php echo $successMessage; ?></p>
    <?php else : ?>
        <p>Aucun article trouvé.</p>
    <?php endif; ?>

    <!-- Bouton de retour à l'accueil -->
    <a href="index.php">Retour à l'accueil</a>
</body>
</html>
