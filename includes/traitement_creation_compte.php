<?php
require_once __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $FirstName = $_POST['prénom'];
  $LastName = $_POST['nom'];
  $email = $_POST['email'];
  $password = $_POST['mot_de_passe'];

  try {
    // Vérifier si l'e-mail existe déjà dans la base de données
    $existingUserQuery = "SELECT COUNT(*) FROM employ WHERE email = :email";
    $existingUserStmt = $connection->prepare($existingUserQuery);
    $existingUserStmt->bindParam(':email', $email);
    $existingUserStmt->execute();

    if ($existingUserStmt->fetchColumn() > 0) {
      // L'utilisateur existe déjà, rediriger avec un message d'erreur
      header('Location: ../admin.php?message=Adresse%20e-mail%20déjà%20utilisée.');
      exit;
    }

    // Hachage du mot de passe avec le sel
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insérer l'utilisateur dans la base de données
    $insertUserQuery = "INSERT INTO employ (FirstName, LastName, email, password, role_id)
                        VALUES (:param1, :param2, :param3, :param4, 2)";
    $insertUserStmt = $connection->prepare($insertUserQuery);
    $insertUserStmt->bindParam(':param1', $FirstName, PDO::PARAM_STR);
    $insertUserStmt->bindParam(':param2', $LastName, PDO::PARAM_STR);
    $insertUserStmt->bindParam(':param3', $email, PDO::PARAM_STR);
    $insertUserStmt->bindParam(':param4', $hashedPassword, PDO::PARAM_STR);
    $insertUserStmt->execute();

    // Rediriger vers une page de confirmation ou de succès
    header('Location: ../admin.php?message=Compte%20créé%20avec%20succès.');
    exit;
  } catch (PDOException $e) {
    // Gérer les erreurs de connexion à la base de données
    echo "Erreur de connexion à la base de données: " . $e->getMessage();
    exit;
  }
}
?>
