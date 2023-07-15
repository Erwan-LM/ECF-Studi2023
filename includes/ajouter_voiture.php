<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter_voiture'])) {
  // Récupérer les valeurs du formulaire
  $marque = isset($_POST['marque']) ? $_POST['marque'] : '';
  $prix = isset($_POST['prix']) ? $_POST['prix'] : '';
  $annee = isset($_POST['annee']) ? $_POST['annee'] : '';
  $kilometrage = isset($_POST['kilometrage']) ? $_POST['kilometrage'] : '';
  $modele = isset($_POST['modele']) ? $_POST['modele'] : '';
  $carburant = isset($_POST['carburant']) ? $_POST['carburant'] : '';
  $couleur = isset($_POST['couleur']) ? $_POST['couleur'] : '';
  $boiteDeVitesse = isset($_POST['boite_de_vitesse']) ? $_POST['boite_de_vitesse'] : '';
  $equipements = isset($_POST['equipements']) ? $_POST['equipements'] : '';

  // Traitement de l'image principale
  $image = $_FILES['image']['tmp_name'];
  $imgContent = file_get_contents($image);

  // Traitement de la galerie d'images
  $gallery1 = $_FILES['gallery']['tmp_name'][0];
  $gallery1Content = file_get_contents($gallery1);

  $gallery2 = $_FILES['gallery']['tmp_name'][1];
  $gallery2Content = file_get_contents($gallery2);

  $gallery3 = $_FILES['gallery']['tmp_name'][2];
  $gallery3Content = file_get_contents($gallery3);

  // Insertion des données dans la table vente_occasion
  $query = "INSERT INTO vente_occasion (marque, modele, prix, annee, kilometrage, carburant, couleur, boite_de_vitesse, liste_equipements, image, gallery1, gallery2, gallery3)
          VALUES (:param1, :param2, :param3, :param4, :param5, :param6, :param7, :param8, :param9, :param10, :param11, :param12, :param13)";
  $stmt = $connection->prepare($query);
  $stmt->bindParam(':param1', $marque, PDO::PARAM_STR);
  $stmt->bindParam(':param2', $modele, PDO::PARAM_STR);
  $stmt->bindParam(':param3', $prix, PDO::PARAM_STR);
  $stmt->bindParam(':param4', $annee, PDO::PARAM_INT);
  $stmt->bindParam(':param5', $kilometrage, PDO::PARAM_INT);
  $stmt->bindParam(':param6', $carburant, PDO::PARAM_STR);
  $stmt->bindParam(':param7', $couleur, PDO::PARAM_STR);
  $stmt->bindParam(':param8', $boiteDeVitesse, PDO::PARAM_STR);
  $stmt->bindParam(':param9', implode(';', $equipements), PDO::PARAM_STR);
  $stmt->bindValue(':param10', base64_encode($imgContent), PDO::PARAM_STR);
  $stmt->bindValue(':param11', base64_encode($gallery1Content), PDO::PARAM_STR);
  $stmt->bindValue(':param12', base64_encode($gallery2Content), PDO::PARAM_STR);
  $stmt->bindValue(':param13', base64_encode($gallery3Content), PDO::PARAM_STR);
  $stmt->execute();
  header("Location: ../employ.php");
}
?>

  <div class="middle-section">
    <h2>Ajouter un véhicule d'occasion</h2>
    <form action="includes/ajouter_voiture.php" method="POST" enctype="multipart/form-data">
      <div>
        <label for="marque">Marque :</label>
        <select id="marque" name="marque" required>
          <?php
          $query = "SELECT DISTINCT marque FROM voitures_occasion";
          $stmt = $connection->prepare($query);
          $stmt->execute();
          $marques = $stmt->fetchAll(PDO::FETCH_COLUMN);

          foreach ($marques as $marque) {
            echo "<option value=\"$marque\">$marque</option>";
          }
          ?>
        </select>
      </div>
      <div>
        <label for="modele">Modèle :</label>
        <input type="text" id="modele" name="modele" required>
      </div>
      <div>
        <label for="prix">Prix :</label>
        <input type="number" id="prix" name="prix" required>
      </div>
      <div>
        <label for="annee">Année :</label>
        <input type="number" id="annee" name="annee" required>
      </div>
      <div>
        <label for="kilometrage">Kilométrage :</label>
        <input type="number" id="kilometrage" name="kilometrage" required>
      </div>
      <div>
        <label for="image">Image :</label>
        <input type="file" id="image" name="image" accept="image/*" >
      </div>
      <div>
        <button type="button" id="btn-detail" onclick="showDetails()">Plus de détails</button>
      </div>
      <div id="details" style="display: none;">
        <h3>Détails de la voiture</h3>
        <div>
          <label for="gallery">Galerie :</label>
          <input type="file" id="gallery" name="gallery[]" accept="image/*" multiple>
        </div>
        <script>
          var input = document.getElementById('gallery');
          input.addEventListener('change', function() {
            if (input.files.length > 3) {
              alert("Vous ne pouvez sélectionner que 3 fichiers maximum.");
              input.value = '';
            }
          });
        </script>
        <div>
          <label for="carburant">Carburant :</label>
          <select id="carburant" name="carburant" required>
            <?php
            $query = "SELECT carburant FROM carburants";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $carburants = $stmt->fetchAll(PDO::FETCH_COLUMN);

            foreach ($carburants as $carburant) {
              echo "<option value=\"$carburant\">$carburant</option>";
            }
            ?>
          </select>
        </div>
        <div>
          <label for="couleur">Couleur :</label>
          <select id="couleur" name="couleur" required>
            <?php
            $query = "SELECT couleur FROM couleurs";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $couleurs = $stmt->fetchAll(PDO::FETCH_COLUMN);

            foreach ($couleurs as $couleur) {
              echo "<option value=\"$couleur\">$couleur</option>";
            }
            ?>
          </select>
        </div>
        <div>
          <label for="boite_de_vitesse">Boîte de vitesse :</label>
          <select id="boite_de_vitesse" name="boite_de_vitesse" required>
            <?php
            $query = "SELECT boite_de_vitesse FROM gearbox";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $boites = $stmt->fetchAll(PDO::FETCH_COLUMN);

            foreach ($boites as $boite) {
              echo "<option value=\"$boite\">$boite</option>";
            }
            ?>
          </select>
        </div>
        <div>
          <label for="equipements">Équipements :</label><br>
          <select id="equipements" name="equipements[]" multiple>
            <?php
            $query = "SELECT equipement FROM equipements";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $equipements = $stmt->fetchAll(PDO::FETCH_COLUMN);

            foreach ($equipements as $equipement) {
              echo "<option value=\"$equipement\">$equipement</option>";
            }
            ?>
          </select>
        </div>
      </div>
        <input type="hidden" name="ajouter_voiture" value="1">
      <button type="submit">Ajouter</button>
    </form>
  </div>


<script src="js/ajouter_voiture.js"></script>
