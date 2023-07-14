<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupérer les données du formulaire
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $telephone = $_POST['telephone'];
  $message = $_POST['message'];

  // Valider les données du formulaire
  $errors = [];

  // Validation du nom
  if (empty($nom)) {
    $errors[] = "Le champ 'Nom' est obligatoire.";
  }

  // Validation du prénom
  if (empty($prenom)) {
    $errors[] = "Le champ 'Prénom' est obligatoire.";
  }

  // Validation de l'e-mail
  if (empty($email)) {
    $errors[] = "Le champ 'E-mail' est obligatoire.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "L'e-mail saisi n'est pas valide.";
  }

  // Validation du numéro de téléphone
  if (empty($telephone)) {
    $errors[] = "Le champ 'Numéro de téléphone' est obligatoire.";
  } elseif (!preg_match('/^[0-9]{10}$/', $telephone)) {
    $errors[] = "Le numéro de téléphone saisi n'est pas valide.";
  }

  // Si des erreurs sont présentes, afficher les messages d'erreur
  if (!empty($errors)) {
    foreach ($errors as $error) {
      echo "<p class='error'>$error</p>";
    }
  } else {
    // Les données du formulaire sont valides
    require_once('config.php');

    try {
      // Préparer la requête SQL avec des paramètres
      $sql = "INSERT INTO contacts (nom, prenom, email, telephone, message, created_at) VALUES (?, ?, ?, ?, ?, NOW())";
      $stmt = $connection->prepare($sql);
      $stmt->bindParam(1, $nom);
      $stmt->bindParam(2, $prenom);
      $stmt->bindParam(3, $email);
      $stmt->bindParam(4, $telephone);
      $stmt->bindParam(5, $message);


      // Exécuter la requête préparée
      if ($stmt->execute()) {
        // Redirection vers la page
        header("Location: ../index.php");
        exit;
      } else {
        // Afficher un message d'erreur en cas d'échec de la requête SQL
        echo "Erreur lors de l'exécution de la requête: " . $stmt->errorInfo()[2];
      }

      // Fermer la requête préparée
      $stmt->closeCursor();
    } catch (PDOException $e) {
      // Afficher un message d'erreur en cas d'exception PDO
      echo "Erreur lors de l'exécution de la requête: " . $e->getMessage();
    }
  }
}
?>
