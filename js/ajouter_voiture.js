// Fonction pour charger les voitures d'occasion depuis la base de données
function loadOccasionCars() {
  // Effectuer une requête AJAX pour obtenir les données des voitures d'occasion
  fetch('includes/get_occasion_cars.php')
    .then(response => response.json())
    .then(data => {
      // Parcourir les données et générer le contenu HTML correspondant
      data.forEach(car => {
        const cardDiv = document.createElement('div');
        cardDiv.classList.add('col-md-2');
        cardDiv.innerHTML = `
          <div class="card" id="card-${car.id}" data-marque="${car.marque}" data-modele="${car.modele}" data-annee="${car.annee}" data-prix="${car.prix}" data-kilometrage="${car.kilometrage}"data-details="${car.details}">
            <img src="${car.image}" alt="${car.marque}" class="card-img-top">
            <div class="card-body">
              <h3 class="card-title">${car.marque}</h3>
              <p class="card-text prix">Prix : ${car.modele} €</p>
              <p class="card-text prix">Prix : ${car.prix} €</p>
              <p class="card-text annee">Année : ${car.annee}</p>
              <p class="card-text kilometrage">Kilométrage : ${car.kilometrage} km</p>
              <button class="btn-details dark" data-modal-id="modal${car.id}" onclick="afficherDetails(${car.id})" data-num="${car.id}"data-details="${car.details}">Plus de détails</button>
              <div class="icons-container">
                <a href="#" onclick="showPhoneNumberPopup(this)"><i class="bi bi-telephone-fill"></i></a>
                <a href="#formulaire"><i class="bi bi-card-heading"></i></a>
              </div>
            </div>
          </div>
        `;
        document.getElementById('occasion-cars').appendChild(cardDiv);
      });
    })
}
function showDetails() {
  var detailsSection = document.getElementById('details');
  var equipementsSelect = document.getElementById('equipements');

  if (detailsSection.style.display === 'none') {
    detailsSection.style.display = 'block';
    equipementsSelect.setAttribute('required', 'required');
  } else {
    detailsSection.style.display = 'none';
    equipementsSelect.removeAttribute('required');
  }
}
// Appeler la fonction pour charger les voitures d'occasion au chargement de la page
window.addEventListener('DOMContentLoaded', loadOccasionCars);
