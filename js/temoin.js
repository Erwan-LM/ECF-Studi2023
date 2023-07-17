document.addEventListener('DOMContentLoaded', function () {
  // Récupérer le bouton pour ouvrir le formulaire
  const boutonOuvrirPopup = document.getElementById('ouvrir-popup-temoignage');
  // Récupérer le bouton pour fermer le formulaire
  const boutonFermerPopup = document.getElementById('form-temoignage').querySelector('.btn-secondary');
  // Récupérer le formulaire de témoignage
  const formPopupTemoignage = document.getElementById('temoignage-form');

  // Écouter l'événement de clic sur le bouton pour fermer le formulaire
  boutonFermerPopup.addEventListener('click', function () {
    // Masquer le formulaire de témoignage
    formPopupTemoignage.parentNode.style.display = 'none';
  });

  // Écouter l'événement de clic sur le bouton pour ouvrir le formulaire
  boutonOuvrirPopup.addEventListener('click', function () {
    // Afficher le formulaire de témoignage en tant que popup
    formPopupTemoignage.parentNode.style.display = 'block';
  });

  // Écouter l'événement de soumission du formulaire
  formPopupTemoignage.addEventListener('submit', function (e) {
    e.preventDefault();

    // Récupérer les valeurs des champs
    const nom = document.getElementById('nom').value;
    const commentaire = document.getElementById('commentaire').value;
    const note = getSelectedRating();

    // Créer un élément de témoignage
    // const temoignage = document.createElement('div');
    // temoignage.classList.add('card');
    // temoignage.innerHTML = `
    //       <div class="card-body">
    //           <h3 class="card-title">${nom}</h3>
    //           <p class="card-text">${commentaire}</p>
    //           <div class="rating">
    //               ${generateStars(note)}
    //           </div>
    //       </div>
    //   `;

    // Envoyer les données du formulaire au serveur
    const formData = new FormData();
    formData.append('nom', nom);
    formData.append('commentaire', commentaire);
    formData.append('note', note);

    fetch('includes/temoignages.php', {
      method: 'POST',
      body: formData
    })
      .then(response => response.text())
      .then(data => {
        // Réinitialiser le formulaire
        formPopupTemoignage.reset();

        // Afficher le message de succès
        const message = document.getElementById('message');
        message.textContent = "Merci pour votre témoignage !";

        // Ajouter le témoignage à la liste des témoignages
        const temoignagesAjoutes = document.getElementById('temoignages-ajoutes');
        temoignagesAjoutes.appendChild(temoignage);
      })
      .catch(error => {
        console.error('Erreur:', error);
        // Gérer l'erreur d'envoi du formulaire
      });
  });

  // Récupérer les étoiles de notation
  const ratingStars = document.querySelectorAll('.rating input');

  // Ajouter des écouteurs d'événements aux étoiles de notation
  ratingStars.forEach(function (star) {
    star.addEventListener('change', function () {
      highlightStars();
    });
  });

  // Mettre en surbrillance les étoiles de notation
  function highlightStars() {
    ratingStars.forEach(function (star) {
      const label = star.nextElementSibling;
      if (star.checked) {
        label.style.color = '#f7d000';
      } else {
        label.style.color = '#ddd';
      }
    });
  }

  // Récupérer la note sélectionnée
  function getSelectedRating() {
    let rating = 0;
    ratingStars.forEach(function (star, index) {
      if (star.checked) {
        rating = star.value;
      }
    });
    return rating;
  }

  // Fonction pour générer les étoiles en fonction de la note
  function generateStars(note) {
    let stars = '';
    for (let i = 1; i <= 5; i++) {
      if (i <= note) {
        stars += '<i class="bi bi-star-fill text-warning"></i>';
      } else {
        stars += '<i class="bi bi-star"></i>';
      }
    }
    return stars;
  }
});
