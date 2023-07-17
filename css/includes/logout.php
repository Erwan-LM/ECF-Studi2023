<?php
session_start();
// Détruire toutes les variables de session
$_SESSION = array();

// Détruire la session
session_destroy();

// Rediriger vers la page de connexion avec un message de déconnexion
header("Location: ../index.php?message=Déconnecté%20avec%20succès.");
exit;
?>
