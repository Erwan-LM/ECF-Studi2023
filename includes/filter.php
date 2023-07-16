<?php
include 'includes/config.php';
// Récupérer les valeurs des filtres
$marque = isset($_GET['marque']) ? $_GET['marque'] : 'Toutes';
$prixMin = isset($_GET['prixMin']) ? $_GET['prixMin'] : '';
$prixMax = isset($_GET['prixMax']) ? $_GET['prixMax'] : '';
$kilometrageMin = isset($_GET['kilometrageMin']) ? $_GET['kilometrageMin'] : '';
$kilometrageMax = isset($_GET['kilometrageMax']) ? $_GET['kilometrageMax'] : '';
$anneeMin = isset($_GET['anneeMin']) ? $_GET['anneeMin'] : '';
$anneeMax = isset($_GET['anneeMax']) ? $_GET['anneeMax'] : '';

// Préparer la requête SQL avec les filtres
$query = "SELECT * FROM vente_occasion WHERE 1=1";
$params = [];

if ($marque !== 'Toutes') {
    $query .= " AND marque = ?";
    $params[] = $marque;
}

if (!empty($prixMin)) {
    $query .= " AND prix >= ?";
    $params[] = $prixMin;
}

if (!empty($prixMax)) {
    $query .= " AND prix <= ?";
    $params[] = $prixMax;
}

if (!empty($kilometrageMin)) {
    $query .= " AND kilometrage >= ?";
    $params[] = $kilometrageMin;
}

if (!empty($kilometrageMax)) {
    $query .= " AND kilometrage <= ?";
    $params[] = $kilometrageMax;
}

if (!empty($anneeMin)) {
    $query .= " AND annee >= ?";
    $params[] = $anneeMin;
}

if (!empty($anneeMax)) {
    $query .= " AND annee <= ?";
    $params[] = $anneeMax;
}

// Exécuter la requête SQL avec les filtres
$statement = $connection->prepare($query);
$statement->execute($params);
$occasions = $statement->fetchAll();

// Récupérer les marques existantes dans la base de données
$queryMarques = "SELECT DISTINCT marque FROM voitures_occasion";
$statementMarques = $connection->prepare($queryMarques);
$statementMarques->execute();
$marques = $statementMarques->fetchAll(PDO::FETCH_COLUMN);
?>

<link rel="stylesheet" href="css/filter.css">

<div id="occasion">
  <nav class="filter-navbar">
    <div class="filter-nav">
      <div class="row">
        <div class="col">
          <div class="select-column">
            <select id="marque-select">
              <option value="Toutes">Toutes les marques</option>
              <?php foreach ($marques as $marqueOption): ?>
                <option value="<?php echo $marqueOption; ?>" <?php if ($marque === $marqueOption) echo 'selected'; ?>><?php echo $marqueOption; ?></option>
              <?php endforeach; ?>
            </select>
            <div class="input-column">
              <button id="filtre-btn">Filtrer</button>
              </div>
            </div>
          </div>
        <div class="col">
          <div class="input-column">
            <input type="number" id="prix-min-input" placeholder="Prix min">
            <input type="number" id="prix-max-input" placeholder="Prix max">
            </div>
          </div>
        </div>
      <div class="col">
          <div class="input-column">
            <input type="number" id="kilometrage-min-input" placeholder="Kilométrage min">
            <input type="number" id="kilometrage-max-input" placeholder="Kilométrage max">
          </div>
        </div>


        <div class="col">
          <div class="input-column">
            <input type="number" id="annee-min-input" placeholder="Année min">
            <input type="number" id="annee-max-input" placeholder="Année max">
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </nav>

  </script>
  <div id="vehicules-container"></div>
</div>
