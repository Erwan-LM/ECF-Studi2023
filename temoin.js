// Récupérer le formulaire de témoignage
const formTemoignage = document.getElementById('form-temoignage');

// Écouter l'événement de soumission du formulaire
formTemoignage.addEventListener('submit', function (e) {
  e.preventDefault();

  // Récupérer les valeurs des champs
  const nom = document.getElementById('nom').value;
  const commentaire = document.getElementById('commentaire').value;
  const note = document.querySelector('input[name="note"]:checked').value;

  // Créer un élément de témoignage
  const temoignage = document.createElement('div');
  temoignage.classList.add('card');
  temoignage.innerHTML = `
    <div class="card-body">
      <h3 class="card-title">${nom}</h3>
      <p class="card-text">${commentaire}</p>
      <div class="rating">
        ${generateStars(note)}
      </div>
    </div>
  `;

  // Ajouter le témoignage à la liste des témoignages
  const temoignagesAjoutes = document.getElementById('temoignages-ajoutes');
  temoignagesAjoutes.appendChild(temoignage);

  // Réinitialiser le formulaire
  formTemoignage.reset();

  // Afficher le message de succès
  const message = document.getElementById('message');
  message.textContent = "Merci pour votre témoignage !";
});

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