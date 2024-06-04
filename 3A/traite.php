<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = strtoupper($_POST["nom"]);
    $prenom = ucfirst(strtolower($_POST["prenom"]));
    $date = $_POST["date"];

    $anneeNaissance = date("Y", strtotime($date));
    $anneeActuelle = date("Y");
    $age = $anneeActuelle - $anneeNaissance;

    echo "Bonjour, $prenom $nom. Vous avez $age ans ou " . ($age + 1) . " ans.";
} else {
    echo "Aucune donnée reçue.";
}
?>

</body>
</html>