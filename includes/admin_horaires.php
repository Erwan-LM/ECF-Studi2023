<?php
include 'config.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $jours = $_POST['jours'];
    $ouverture = $_POST['ouverture'];
    $fermeture = $_POST['fermeture'];

    // Préparer et exécuter la requête SQL pour mettre à jour les horaires
    $query = "UPDATE horaires SET ouverture = :ouverture, fermeture = :fermeture WHERE jours = :jours";
    $statement = $connection->prepare($query);
    $statement->bindParam(':ouverture', $ouverture);
    $statement->bindParam(':fermeture', $fermeture);
    $statement->bindParam(':jours', $jours);
    $statement->execute();

    // Rediriger vers la page index.php après la modification
    header('Location: ../index.php');
    exit;
}
?>

<h2>Modification des horaires :</h2>

<!-- Formulaire pour modifier les horaires -->
<form method="POST" action="includes/admin_horaires.php">
    <label for="jours">Jours d'ouverture :</label><br>
    <select id="jours" name="jours">
        <?php
        // Exécuter la requête SQL pour récupérer les jours existants depuis la table horaires
        $query = "SELECT jours FROM horaires";
        $statement = $connection->prepare($query);
        $statement->execute();
        $joursList = $statement->fetchAll(PDO::FETCH_COLUMN);

        // Afficher les options du menu déroulant
        foreach ($joursList as $jour) {
            echo '<option value="' . $jour . '">' . $jour . '</option>';
        }
        ?>
    </select><br><br>
    <label for="ouverture">Heure d'ouverture :</label><br>
    <input type="text" id="ouverture" name="ouverture" placeholder="Format: HH:MM"><br><br>
    <label for="fermeture">Heure de fermeture :</label><br>
    <input type="text" id="fermeture" name="fermeture" placeholder="Format: HH:MM"><br><br>
    <input type="submit" value="Valider">
</form>
