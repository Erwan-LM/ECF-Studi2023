<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nom = $_POST["nom"];
  $commentaire = $_POST["commentaire"];
  $note = $_POST["note"];

  // Insérer le témoignage dans la base de données
  $query = "INSERT INTO temoignages (nom, commentaire, note) VALUES (:param1 , :param2, :param3)";
  $statement = $connection->prepare($query);
  $statement->bindParam(':param1', $nom, PDO::PARAM_STR);
  $statement->bindParam(':param2', $commentaire, PDO::PARAM_STR);
  $statement->bindParam(':param3', $note, PDO::PARAM_INT);
  $statement->execute();

  // Rediriger vers la page employ.php
  header("Location: employ.php");
  exit();
}
?>

<div id="form-temoignage" style="display: none;">
  <form id="temoignage-form" method="POST">
    <input type="text" id="nom" placeholder="Nom" required /><br>
    <textarea id="commentaire" placeholder="Commentaire" required></textarea><br>
    <div class="rating">
      <input type="radio" id="star5" name="note" value="5" />
      <label for="star5" title="5 étoile"></label>
      <input type="radio" id="star4" name="note" value="4" />
      <label for="star4" title="4 étoiles"></label>
      <input type="radio" id="star3" name="note" value="3" />
      <label for="star3" title="3 étoiles"></label>
      <input type="radio" id="star2" name="note" value="2" />
      <label for="star2" title="2 étoiles"></label>
      <input type="radio" id="star1" name="note" value="1" />
      <label for="star1" title="1 étoiles"></label>
    </div>
    <br>
    <button type="submit">Ajouter</button>
    <button type="button" class="btn-secondary">Fermer</button>
  </form>
</div>

<div id="temoignages-ajoutes"></div>

<section id="message" class="container">
  <!-- Message de succès -->
</section>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>


