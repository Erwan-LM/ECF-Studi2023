<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];
  if ($_POST["type"] == 1){
    $query = "UPDATE temoignages SET valide = 1 WHERE id = :param1";
  } elseif ($_POST["type"] == 0){
    $query = "DELETE FROM temoignages WHERE id = :param1";
  }
  $statement = $connection->prepare($query);
  $statement->bindParam(':param1', $id);
  $statement->execute();

  // statut HTTP 200 requête réussie
  http_response_code(200);
} else {
  // statut HTTP 400 requête incorrecte
  http_response_code(400);
}

exit();
?>
