<?php
$host = $_ENV['DB_HOST'];
$database = $_ENV['DB_NAME'];
$emailBD = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];

// Connexion à la base de données
$connection = new PDO("mysql:host=$host;dbname=$database", $emailBD, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
