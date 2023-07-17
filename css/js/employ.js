// Écouter les clics sur les boutons de validation/refus
const btnValider = document.querySelectorAll('.btn-valider');
const btnRefuser = document.querySelectorAll('.btn-refuser');

btnValider.forEach(function (btn) {
  btn.addEventListener('click', function () {
    const id = btn.getAttribute('data-id');
    modifyTemoignage(id, 1);
  });
});

btnRefuser.forEach(function (btn) {
  btn.addEventListener('click', function () {
    const id = btn.getAttribute('data-id');
    modifyTemoignage(id, 0);
  });
});

// Fonction pour modifier un témoignage (valider ou supprimer)
function modifyTemoignage(id, type) {
  fetch('includes/modify_temoignage.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: 'id=' + encodeURIComponent(id) + '&type=' + encodeURIComponent(type),
  })
    .then(function (response) {
      if (response.ok) {
        // Rafraîchir la page après 1 seconde
        setTimeout(function () {
          location.reload();
        }, 1000);
      } else {
        console.error('Erreur lors de la modification du témoignage:', response.status);
      }
    })
    .catch(function (error) {
      console.error('Erreur lors de la modification du témoignage:', error);
    });
}
