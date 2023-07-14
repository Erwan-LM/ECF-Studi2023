function afficherDetails(num) {
  var modalId = "modal" + num;
  var detailsModal = document.getElementById("detailsModal");
  var modalContent = document.querySelector("#detailsModal .modal-body");
  if (num === 1) {
    modalContent.innerHTML = `
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
    modalContent.innerHTML = `
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
    modalContent.innerHTML = `
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
  } else if (num === 4) {
    modalContent.innerHTML = `
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
    modalContent.innerHTML = `
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
    modalContent.innerHTML = `
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
    return `
    <div class="card-details">
      // ...
    </div>
  `;
  }
  // Ouvrir la modale
  $("#" + modalId).modal("show");
}

function showPhoneNumberPopup(element) {
  var modalId = element.dataset.modalId;
  var modal = document.getElementById(modalId);
  var modalContent = modal.querySelector("#modal-content");

  var num = parseInt(element.dataset.num); // Récupérer la valeur de "num" depuis l'attribut "data-num"

  if (modal && modalContent) {
    if (!modal.classList.contains("modal-visible")) {
      modal.classList.add("modal-visible"); // Afficher la modale

      // Récupérer le contenu des détails de la voiture
      var detailsContent = afficherDetails(num);

      // Insérer le contenu des détails de la voiture dans la modale
      modalContent.innerHTML = detailsContent;
    } else {
      modal.classList.remove("modal-visible"); // Masquer la modale

      // Retirer le contenu des détails de la voiture de la modale
      modalContent.innerHTML = "";
    }
  }
}
