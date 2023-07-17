<!-- Horaires -->
<section id="horaires" class="container">
  <h2>Nos horaires d'ouverture</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Jour</th>
        <th>Heures d'ouverture</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Exécuter la requête SQL pour récupérer les horaires depuis la table horaires
      $query = "SELECT jours, ouverture, fermeture FROM horaires";
      $statement = $connection->prepare($query);
      $statement->execute();
      $horairesList = $statement->fetchAll(PDO::FETCH_ASSOC);

      // Afficher les horaires dans le tableau
      foreach ($horairesList as $horaire) {
          echo '<tr>';
          echo '<td>' . $horaire['jours'] . '</td>';
          echo '<td>' . $horaire['ouverture'] . ' - ' . $horaire['fermeture'] . '</td>';
          echo '</tr>';
      }
      ?>
    </tbody>
  </table>
</section>