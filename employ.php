<?php
session_start();
include 'includes/authentification.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user']) || ($_SESSION['user']['role'] != 'employé' && $_SESSION['user']['role'] != 'administrateur')) {
  header("Location: index.php");
  exit;
}

include 'includes/config.php';

// Désactiver la mise en cache
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Employés</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/employ.css">
    <link rel="stylesheet" type="text/css" href="css/temoin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
<header>
    <div class="container">
        <a href="index.php">
            <img src="images/logo.png" alt="logo">
        </a>
    </div>
</header>

<section id="employ-page" >
    <h2>Bienvenue, <?php echo $_SESSION['user']['email']; ?>!</h2>
    <p>Vous êtes connecté en tant qu'<?php echo $_SESSION['user']['role']; ?>.</p>
    <!-- Autres contenus spécifiques à l'employé -->
    <a href="includes/logout.php" class="btn btn-dark">Déconnexion</a>
</section>

<?php
// Fonction pour générer l'affichage des étoiles
function generateStarRating($note)
{
    $rating = '';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $note) {
            $rating .= '★';
        } else {
            $rating .= '☆';
        }
    }
    return $rating;
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $commentaire = $_POST['commentaire'];
    $note = $_POST['note'];

    // Insérer le témoignage dans la base de données
    $query = "INSERT INTO temoignages (nom, commentaire, note, valide) VALUES (:param1, :param2, :param3, 1)";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':param1', $nom);
    $stmt->bindParam(':param2', $commentaire);
    $stmt->bindParam(':param3', $note);
    $stmt->execute();

    // Redirection vers l'index.php pour afficher les témoignages validés
    header("Location: employ.php");
    exit;
}
?>
<!-- Témoignages en attente, formulaire d'ajout de témoignage, formulaire d'ajout de véhicule -->
<div class="container">
  <div class="row">
    <div class="col card">
      <div id="liste-temoignages">
        <?php include 'includes/temoin_attente.php'; ?>
      </div>
    </div>
    <div class="col">
      <div id="ajouter-temoignage">
        <form action="employ.php" class="card" method="POST">
          <h2>Ajouter un témoignage</h2>
          <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" placeholder="Nom" name="nom" required>
          </div>
          <div class="form-group">
            <label for="commentaire">Commentaire :</label>
            <textarea id="commentaire" placeholder="Commentaire" name="commentaire" required></textarea>
          </div>
          <div class="form-group">
            <label for="note">Note :</label>
            <div class="rating">
              <input type="radio" id="star5" name="note" value="5" />
              <label for="star5" title="5 étoiles"></label>
              <input type="radio" id="star4" name="note" value="4" />
              <label for="star4" title="4 étoiles"></label>
              <input type="radio" id="star3" name="note" value="3" />
              <label for="star3" title="3 étoiles"></label>
              <input type="radio" id="star2" name="note" value="2" />
              <label for="star2" title="2 étoiles"></label>
              <input type="radio" id="star1" name="note" value="1" />
              <label for="star1" title="1 étoile"></label>
            </div>
          </div>
          <br>
          <button type="submit" class="btn-valider">Ajouter</button>
          <button type="button" class="btn-refuser">Fermer</button>
        </form>
      </div>
    </div>
    <div class="col card">
      <?php include 'includes/ajouter_voiture.php'; ?>
    </div>
  </div>
</div>

<script src="js/employ.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
