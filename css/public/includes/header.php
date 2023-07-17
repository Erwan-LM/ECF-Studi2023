<?php
// Détection de la taille d'écran pour afficher la version mobile
$isMobile = false;
if (isset($_SERVER['HTTP_USER_AGENT'])) {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $isMobile = preg_match('/mobile|android|iphone|ipad|phone/i', $userAgent);
}
?>

<header>
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">

<?php if ($isMobile) { ?>
  <link rel="stylesheet" href="css/header_mobile.css">
  <script src="js/header_mobile.js"></script>
  <?php include 'includes/header_mobile.html'; ?>
<?php } else { ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img src="images/logo.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav" id="navbarNavList">
        <li class="nav-item active">
          <a class="nav-link" href="#accueil">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#services">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#horaires">Nos horaires d'ouverture</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#occasion">Véhicules d'occasion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
      </ul>
      <div class="custom-button-container">
        <button id="ouvrir-popup-temoignage" class="custom-button popup-trigger">Laisser un témoignage</button>
        <a href="includes/login.php" class="custom-button">Se connecter</a>
      </div>
    </div>
  </nav>
  <?php include 'temoignages.php'; ?>
  <div id="login-form"><?php include 'login.php';?></div>
<?php } ?>
</header>
<script src="js/temoin.js"></script>
