<!DOCTYPE html>
<html>
<head>
    <title>Suite de Fibonacci</title>
</head>
<body>
<h1>Suite de Fibonacci</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreElements = $_POST["nombre"];
    $a = 0;
    $b = 1;
    $i = 0;

    while ($i < $nombreElements) {
        if ($a > $nombreElements) {
            break;
        }

        echo "F<sub>$i</sub> : $a<br>";

        $c = $a;
        $a = $b;
        $b = $c + $b;
        $i++;
    }
} else {
    echo "Recommencer";
}
?>
<a href="http://localhost/dev/index.php">Recommencer</a>

</body>
</html>