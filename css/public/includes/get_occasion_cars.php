<?php
include 'includes/config.php';

// Effectuer la requête pour récupérer les voitures d'occasion depuis la base de données
$query = "SELECT * FROM voitures_occasion";
$stmt = $connection->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Renvoyer les données au format JSON
echo json_encode($result);
?>
