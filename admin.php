<?php
include 'employ.php';
include 'includes/traitement_creation_compte.php';
if ($_SESSION['user']['role'] != 'administrateur') {
  header("Location: index.php");
  exit;
}
?>
<head>
    <meta charset="UTF-8">
    <title>Administrateur</title>
</head>
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
      <h2>Créer un compte</h2>
        <form action="includes/traitement_creation_compte.php" method="POST">
          <div class="form-group">
            <label for="prénom">Prénom :</label>
            <input type="text" id="prénom" name="prénom" required>
          </div>
          <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
          </div>
          <div class="form-group">
            <label for="email">Adresse e-mail :</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required>
          </div>
          <div class="form-group">
            <input type="submit" value="Créer le compte">
          </div>
        </form>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <?php
        // Pagination pour les contacts
        $perPageContacts = 1;
        $pageContacts = isset($_GET['page_contacts']) ? $_GET['page_contacts'] : 1; // Page courante pour les contacts

        $queryContacts = "SELECT * FROM contacts";
        $stmtContacts = $connection->prepare($queryContacts);
        $stmtContacts->execute();
        $totalContacts = $stmtContacts->rowCount(); // Total des contacts
        $pagesContacts = ceil($totalContacts / $perPageContacts); // Nombre de pages pour les contacts

        $offsetContacts = ($pageContacts - 1) * $perPageContacts; // Offset pour les contacts

        $queryContacts .= " LIMIT $offsetContacts, $perPageContacts";
        $stmtContacts = $connection->prepare($queryContacts);
        $stmtContacts->execute();
        $contacts = $stmtContacts->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($contacts)) {
          echo "<h2>Vos contacts client</h2>";
          echo '<div class="contact-card">';
          echo '<h4 class="card-title">' . $contacts[0]['nom'] . '</h4>';
          echo '<h4 class="card-title">' . $contacts[0]['prenom'] . '</h4>';
          echo '<h5 class="card-text">' . $contacts[0]['created_at'] . '</h5>';
          echo '<p class="card-text">' . $contacts[0]['message'] . '</p>';
          echo '<p class="card-footer">' . $contacts[0]['telephone'] . '</p>';
          echo '<p class="card-footer">' . $contacts[0]['email'] . '</p>';
          echo '</div>';

          // Affichage de la pagination pour les contacts
          echo '<div class="pagination">';
          for ($i = 1; $i <= $pagesContacts; $i++) {
            echo '<a href="admin.php?page_contacts=' . $i . '">' . $i . '</a> ';
          }
          echo '</div>';

        }
        ?>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  $(document).ready(function() {
    $(".pagination a").click(function(e) {
      e.preventDefault();
      var page = $(this).attr("href").split("=")[1];
      var url = "admin.php?page_contacts=" + page;

      $.ajax({
        url: url,
        type: "GET",
        success: function(response) {
          var contactCard = $(response).find(".contact-card");

          if (contactCard.length > 0) {
            $(".contact-card").html(contactCard.html());
          }
        },
        error: function() {
          console.log("Une erreur s'est produite lors de la récupération du contact.");
        }
      });
    });
  });
</script>
</body>
</html>
