<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'connect.php';

$year_now = date('Y');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['auteur']) && isset($_POST['titre']) && isset($_POST['annee']) && $_POST['titre'] != '' && $_POST['annee'] <= $year_now) {
    $auteur = $_POST['auteur'];
    $titre = $_POST['titre'];
    $annee = $_POST['annee'];

    $sql = "INSERT INTO livres(auteur, titre, annee) VALUES (:auteur, :titre, :annee)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':auteur', $auteur, PDO::PARAM_STR);
    $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
    $stmt->bindParam(':annee', $annee, PDO::PARAM_INT);

    $result = $stmt->execute();

    if ($result) {
        echo "<p>Données enregistrées</p>";
    } else {
        echo "<p><i>Données non enregistrées</i></p>";
    }
}
?>
<form action="ecrit_db.php" method="post">
    <p>Auteur: <input type="text" name="auteur"></p>
    <p>Titre: <input type="text" name="titre"></p>
    <p>Année: <input type="number" max="<?php echo $year_now; ?>" name="annee"></p>
    <p><input type="submit" value="Envoyer"></p>
</form>
<p><a href="lit_db.php">Lister les données</a></p>
<!-- Bouton de retour à l'accueil -->
<a href="index.php">Retour à l'accueil</a>
