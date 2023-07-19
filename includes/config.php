<?php
$host = 'localhost';
$database = 'garage_ecf';
$emailBD = 'root';
$password = 'root';

// Connexion à la base de données
$connection = new PDO("mysql:host=$host;dbname=$database", $emailBD, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
<<<<<<< HEAD

?>
=======
?>

>>>>>>> d3203bb596ba6cb178ed12b4f2ceaef7d151a66c
