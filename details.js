function afficherDetails(num) {
  var carteVoiture = document.getElementById("card-" + num);
  var detailsVoiture = document.querySelector('.details-voiture');

  if (!carteVoiture.classList.contains("card-on-top")) {
    // Mettre la carte au premier plan
    carteVoiture.classList.add("card-on-top");

    // Afficher les détails de la voiture
    if (num === 1) {
      detailsVoiture.innerHTML = `
        <div class="card-details">
          <div class="gallery">
            <img src="images/mercedes1-1.jpg" alt="Voiture 1 - Image 1">
            <img src="images/mercedes1-2.jpeg" alt="Voiture 1 - Image 2">
            <img src="images/mercedes1-3.jpeg" alt="Voiture 1 - Image 3">
          </div>
          <div id="tableau-caracteristiques">
            <table class="table">
              <tr>
                <td>Carburant</td>
                <td>Essence</td>
              </tr>
              <tr>
                <td>Couleur</td>
                <td>Noir</td>
              </tr>
              <tr>
                <td>Boîte de vitesses</td>
                <td>Manuelle</td>
              </tr>
            </table>
          </div>
          <div id="liste-equipements">
            <ul>
              <li>Climatisation</li>
              <li>Régulateur de vitesse</li>
              <li>Bluetooth</li>
            </ul>
          </div>
        </div>
      `;
    } else if (num === 2) {
      detailsVoiture.innerHTML = `
        <div class="card-details">
          <div class="gallery">
            <img src="images/ferrari1-1.jpeg" alt="Voiture 2 - Image 1">
            <img src="images/ferrari1-2.jpeg" alt="Voiture 2 - Image 2">
            <img src="images/ferrari1-3.jpeg" alt="Voiture 2 - Image 3">
          </div>
          <div id="tableau-caracteristiques">
            <table class="table">
              <tr>
                <td>Carburant</td>
                <td>Essence</td>
              </tr>
              <tr>
                <td>Couleur</td>
                <td>Jaune</td>
              </tr>
              <tr>
                <td>Boîte de vitesses</td>
                <td>Manuelle</td>
              </tr>
            </table>
          </div>
          <div id="liste-equipements">
            <ul>
              <li>Climatisation</li>
              <li>Régulateur de vitesse</li>
              <li>Bluetooth</li>
            </ul>
          </div>
        </div>
      `;
    } else if (num === 3) {
      detailsVoiture.innerHTML = `
        <div class="card-details">
          <div class="gallery">
            <img src="images/AlfaRomeo1-1.jpeg" alt="Voiture 3 - Image 1">
            <img src="images/AlfaRomeo1-2.jpeg" alt="Voiture 3 - Image 2">
            <img src="images/AlfaRomeo1-3.jpeg" alt="Voiture 3 - Image 3">
            </div>
            <div id="tableau-caracteristiques">
              <table class="table">
                <tr>
                  <td>Carburant</td>
                  <td>Essence</td>
                </tr>
                <tr>
                  <td>Couleur</td>
                  <td>Gris</td>
                </tr>
                <tr>
                  <td>Boîte de vitesses</td>
                  <td>Manuelle</td>
                </tr>
              </table>
            </div>
            <div id="liste-equipements">
              <ul>
                <li>Climatisation</li>
                <li>Régulateur de vitesse</li>
                <li>Bluetooth</li>
              </ul>
            </div>
          </div>
        `;
    } else if (num === 4) {
      detailsVoiture.innerHTML = `
          <div class="card-details">
            <div class="gallery">
              <img src="images/bmw1-1.jpeg" alt="Voiture 4 - Image 1">
              <img src="images/bmw1-2.jpeg" alt="Voiture 4 - Image 2">
              <img src="images/bmw1-3.jpeg" alt="Voiture 4 - Image 3">
            </div>
            <div id="tableau-caracteristiques">
              <table class="table">
                <tr>
                  <td>Carburant</td>
                  <td>Essence</td>
                </tr>
                <tr>
                  <td>Couleur</td>
                  <td>Orange</td>
                </tr>
                <tr>
                  <td>Boîte de vitesses</td>
                  <td>Manuelle</td>
                </tr>
              </table>
            </div>
            <div id="liste-equipements">
              <ul>
                <li>Climatisation</li>
                <li>Régulateur de vitesse</li>
                <li>Bluetooth</li>
              </ul>
            </div>
          </div>
        `;
    } else if (num === 5) {
      detailsVoiture.innerHTML = `
          <div class="card-details">
            <div class="gallery">
              <img src="images/mclaren1-1.jpg" alt="Voiture 5 - Image 1">
              <img src="images/mclaren1-2.jpeg" alt="Voiture 5 - Image 2">
              <img src="images/mclaren1-3.jpeg" alt="Voiture 5 - Image 3">
            </div>
            <div id="tableau-caracteristiques">
              <table class="table">
                <tr>
                  <td>Carburant</td>
                  <td>Essence</td>
                </tr>
                <tr>
                  <td>Couleur</td>
                  <td>Blanc</td>
                </tr>
                <tr>
                  <td>Boîte de vitesses</td>
                  <td>Manuelle</td>
                </tr>
              </table>
            </div>
            <div id="liste-equipements">
              <ul>
                <li>Climatisation</li>
                <li>Régulateur de vitesse</li>
                <li>Bluetooth</li>
              </ul>
            </div>
          </div>
        `;
    } else if (num === 6) {
      detailsVoiture.innerHTML = `
          <div class="card-details">
            <div class="gallery">
              <img src="images/tesla1-1.jpeg" alt="Voiture 6 - Image 1">
              <img src="images/tesla1-2.jpg" alt="Voiture 6 - Image 2">
              <img src="images/tesla1-3.jpeg" alt="Voiture 6 - Image 3">
            </div>
            <div id="tableau-caracteristiques">
              <table class="table">
                <tr>
                  <td>Carburant</td>
                  <td>Electrique</td>
                </tr>
                <tr>
                  <td>Couleur</td>
                  <td>Rouge</td>
                </tr>
                <tr>
                  <td>Boîte de vitesses</td>
                  <td>Automatique</td>
                </tr>
              </table>
            </div>
            <div id="liste-equipements">
              <ul>
                <li>Climatisation</li>
                <li>Régulateur de vitesse</li>
                <li>Bluetooth</li>
              </ul>
            </div>
          </div>
        `;
    }

    // Appliquer l'effet de flou sur le reste du contenu
    document.body.classList.add("overlay-blur");
  } else {
    // Retirer la carte du premier plan
    carteVoiture.classList.remove("card-on-top");

    // Retirer les détails de la voiture
    detailsVoiture.innerHTML = "";

    // Retirer l'effet de flou du reste du contenu
    document.body.classList.remove("overlay-blur");
  }
}