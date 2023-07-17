<!-- Services -->
<section id="services">
  <h2>Nos services</h2>
  <div id="services-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php
      // Récupérer les données des services depuis la base de données
      $sql = "SELECT * FROM services";
      $stmt = $connection->query($sql);
      
      $index = 0;
      if ($stmt) {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $activeClass = $index === 0 ? 'active' : '';
              echo '<div class="carousel-item ' . $activeClass . '">';
              echo '<div class="col-md-4">';
              echo '<div class="card shadow services-card">';
              echo '<div class="card-body">';
              echo '<h5 class="card-title">' . $row['title'] . '</h5>';
              echo '<p class="card-text">' . $row['paragraphe'] . '</p>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              $index++;
          }
      }
      ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#services-carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#services-carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>
