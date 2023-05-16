<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Récupérer les valeurs du formulaire
  $nom = $_POST["nom"];
  $commentaire = $_POST["commentaire"];
  $note = $_POST["note"];

  // Valider les données (effectuez les validations appropriées selon vos besoins)

  // Enregistrer le témoignage dans la base de données ou dans un fichier, selon votre configuration

  // Afficher un message de succès
  echo "Merci pour votre témoignage !";

  // Rediriger vers la page d'accueil ou une autre page appropriée
  header("Location: temoin.php");
  exit();
}
?>