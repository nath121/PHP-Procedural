<?php
require 'connect.php';

$sql = "SELECT * FROM livres";
$result = $pdo->query($sql);

if ($result->rowCount()) {
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
    echo "<p>La table est vide</p>";
}
?>
<p><a href="ecrit_db.php">Ajouter des données</a></p>
<!-- Bouton de retour à l'accueil -->
<a href="index.php">Retour à l'accueil</a>
