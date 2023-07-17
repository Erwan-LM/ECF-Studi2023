<?php
include 'config.php';
// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $selectedTitle = $_POST['selectedTitle'];
    $newTitle = $_POST['newTitle'];
    $newParagraph = $_POST['newParagraph'];

    // Vérifier si un titre existant a été sélectionné
    if ($selectedTitle !== 'new') {
        // Mettre à jour le titre et le paragraphe dans la base de données
        $query = "UPDATE services SET title = :newTitle, paragraphe = :newParagraph WHERE title = :selectedTitle";
        $statement = $connection->prepare($query);
        $statement->bindParam(':newTitle', $newTitle);
        $statement->bindParam(':newParagraph', $newParagraph);
        $statement->bindParam(':selectedTitle', $selectedTitle);
        $statement->execute();
    } else {
        // Ajouter un nouveau titre et un nouveau paragraphe à la base de données
        $query = "INSERT INTO services (title, paragraphe) VALUES (:newTitle, :newParagraph)";
        $statement = $connection->prepare($query);
        $statement->bindParam(':newTitle', $newTitle);
        $statement->bindParam(':newParagraph', $newParagraph);
        $statement->execute();
    }
    header('Location: ../index.php');
    exit;
}

// Récupérer les titres existants depuis la base de données
$query = "SELECT title FROM services";
$statement = $connection->prepare($query);
$statement->execute();
$titles = $statement->fetchAll(PDO::FETCH_COLUMN);
?>

<h2>Modification des services :</h2>
<!-- Formulaire pour modifier les informations -->
<form method="POST" action="includes/admin_services.php">
    <label for="selectedTitle">Titre existant :</label><br>
    <select id="selectedTitle" name="selectedTitle">
        <option value="new">Nouveau titre</option>
        <?php
        foreach ($titles as $title) {
            echo '<option value="' . $title . '">' . $title . '</option>';
        }
        ?>
    </select><br><br>
    <label for="newTitle">Nouveau titre :</label><br>
    <input type="text" id="newTitle" name="newTitle"><br><br>
    <label for="newParagraph">Nouveau paragraphe :</label><br>
    <textarea id="newParagraph" name="newParagraph"></textarea><br><br>
    <input type="submit" value="Valider">
</form>
