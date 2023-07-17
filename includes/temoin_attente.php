<?php 
// Pagination pour les témoignages en attente
$perPageTemoignagesAttente = 1; // Nombre de témoignages par page
$pageTemoignagesAttente = isset($_GET['page_temoignages']) ? $_GET['page_temoignages'] : 1; // Page courante

$queryTemoignagesAttente = "SELECT * FROM temoignages WHERE valide = 0 ORDER BY id DESC";
$stmtTemoignagesAttente = $connection->prepare($queryTemoignagesAttente);
$stmtTemoignagesAttente->execute();
$totalTemoignagesAttente = $stmtTemoignagesAttente->rowCount(); // Total des témoignages en attente
$pagesTemoignagesAttente = ceil($totalTemoignagesAttente / $perPageTemoignagesAttente); // Nombre de pages

$offsetTemoignagesAttente = ($pageTemoignagesAttente - 1) * $perPageTemoignagesAttente; // Offset

$queryTemoignagesAttente .= " LIMIT $offsetTemoignagesAttente, $perPageTemoignagesAttente";
$stmtTemoignagesAttente = $connection->prepare($queryTemoignagesAttente);
$stmtTemoignagesAttente->execute();
$temoignagesAttente = $stmtTemoignagesAttente->fetchAll(PDO::FETCH_ASSOC);

echo "<h2>Témoignages en attente</h2>";

foreach ($temoignagesAttente as $temoignage) {
  echo '<div class="card-body">';
  echo '<h4 class="card-title">' . $temoignage['nom'] . '</h4>';
  echo '<p class="card-text">' . $temoignage['commentaire'] . '</p>';
  echo '<div class="rating">';
  echo generateStarRating($temoignage['note']);
  echo '</div>';
  echo '<button class="btn-valider" data-id="' . $temoignage['id'] . '">Valider</button>';
  echo '<button class="btn-refuser" data-id="' . $temoignage['id'] . '">Refuser</button>';
  echo '</div>';
}
echo '<p id="compteur_temoin">Nombre de témoignages en attente : ' . $totalTemoignagesAttente . '</p>';
?>