<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Garage V. Parrot</title>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/temoin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

  
</head>

<body>
  <main>
    <?php
    // Includes
    include 'includes/config.php';
    include 'includes/authentification.php';
    include 'includes/traitement_contact.php';
    include 'includes/header.php';
    ?> 
    <section id="popup-temoignage" class="container" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Laisser un témoignage</h5>
            <button id="fermer-popup-temoignage" type="button" class="close" data-dismiss="modal" aria-label="Fermer">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          </div>
        </div>
      </div>
    </section>
    <?php

    // Récupérer les témoignages validés depuis la base de données
    $query = "SELECT * FROM temoignages WHERE valide = 1";
    $statement = $connection->prepare($query);
    $statement->execute();
    $temoignages = $statement->fetchAll();
    ?>
    <div id="carouselTemoignages" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <?php $chunks = array_chunk($temoignages, 3); ?>
      <?php foreach ($chunks as $chunk): ?>
        <div class="carousel-item <?php if ($chunk === reset($chunks)) echo 'active'; ?>">
          <div class="card-grid">
            <?php foreach ($chunk as $temoignage): ?>
              <div class="card temoin-card">
                <div class="card-body">
                  <h3 class="card-title"><?php echo $temoignage['nom']; ?></h3>
                  <p class="card-text"><?php echo $temoignage['commentaire']; ?></p>
                  <div class="rate<?php echo $temoignage['note']; ?>"></div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    
    <a class="carousel-control-prev" href="#carouselTemoignages" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselTemoignages" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
      
    <?php
session_start();
include 'includes/accueil.html';

// Vérifier si l'utilisateur est administrateur
$isAdministrator = isset($_SESSION['user']) && isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'administrateur';

// Lire le contenu de services.php
$servicesContent = file_get_contents('includes/services.php');

// Lire le contenu de horaires.php
$horairesContent = file_get_contents('includes/horaires.php');
?>

<div class="container">
  <div class="row section-container ">
    <?php if ($isAdministrator): ?>
      <div class="col-md-6 section">
        <div class="services-container">
          <?php include 'includes/admin_services.php'; ?>
        </div>
        <div class="services-container">
          <?php include 'includes/services.php'; ?>
        </div>
      </div>
      <div class="col-md-6 section">
        <div>
          <?php include 'includes/admin_horaires.php'; ?>
        </div>
        <div>
          <?php include 'includes/horaires.php'; ?>
        </div>
      </div>
      <?php else: ?>
  <div class="col-md-6 section">
    <div class="row">
      <div class="col-md-6">
        <div class="services-container" id="services">
          <?php include 'includes/services.php'; ?>
        </div>
      </div>
      <div class="col-md-6">
        <div class="horaires-container" id="horaires">
          <?php include 'includes/horaires.php'; ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>


<div class="row">
        <div class="col-md-6 section">
          <hr class="separator">
          <?php include 'includes/contact.html'; ?>
        </div>
      </div>
    </div>
      </div>
     
    <?php
    include 'includes/filter.php';
    include 'includes/occasion.php';
    include 'includes/footer.html'; 
    ?>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="js/phone.js"></script>
    <script src="js/navigation.js"></script>
    <script src="js/occasion.js"></script>
    <script src="js/filter.js"></script>
  </body>
</html>
