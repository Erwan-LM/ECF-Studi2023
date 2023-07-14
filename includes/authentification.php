<?php
require_once __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  try {
    $sql = "SELECT * FROM employ WHERE email = :param1";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':param1', $email, PDO::PARAM_STR);
    $stmt->execute();
   
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
      session_start();
      $_SESSION['user'] = [
        'id' => $user['id'],
        'email' => $user['email'],
        'role' => ($user['role_id'] == 1) ? 'administrateur' : 'employé',
        'loggedin' => true
      ];
    
      if ($user['role_id'] == 1) {
        header("Location: ../admin.php");
        exit;
      } elseif ($user['role_id'] == 2) {
        header("Location: ../employ.php");
        exit;
      }
    } else {
      // Authentification échouée, afficher un message d'erreur
     // header("Location: login.php?error=1");
      exit;
    }
  } catch (PDOException $e) {
    // Affichage de l'erreur PDO pour le débogage
    echo "Erreur PDO : " . $e->getMessage();

    // Redirection vers la page de connexion avec le paramètre d'erreur
    // header("Location: login.php?error=1");
    exit;
  }
}
?>
