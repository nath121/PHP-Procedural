<?php
$host = "localhost";
$username = "";
$password = "";
$dbname = "";
$chrs = "utf8mb4";
$attr = "mysql:host=$host;dbname=$dbname;charset=$chrs";
$opts = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
?>
