document.addEventListener('DOMContentLoaded', function () {
  const filterBtn = document.getElementById('filtre-btn');
  const vehiculesContainer = document.getElementById('vehicules-container');

  function filtrerVehicules() {
    const marque = document.getElementById('marque-select').value;
    const prixMin = parseInt(document.getElementById('prix-min-input').value);
    const prixMax = parseInt(document.getElementById('prix-max-input').value);
    const kilometrageMin = parseInt(document.getElementById('kilometrage-min-input').value);
    const kilometrageMax = parseInt(document.getElementById('kilometrage-max-input').value);
    const anneeMin = parseInt(document.getElementById('annee-min-input').value);
    const anneeMax = parseInt(document.getElementById('annee-max-input').value);

    const vehicules = Array.from(document.getElementsByClassName('card'));

    vehicules.forEach(function (vehicule) {
      const vehiculeMarque = vehicule.getAttribute('data-marque');
      const vehiculePrix = parseInt(vehicule.getAttribute('data-prix'));
      const vehiculeKilometrage = parseInt(vehicule.getAttribute('data-kilometrage'));
      const vehiculeAnnee = parseInt(vehicule.getAttribute('data-annee'));

      const marqueMatch = marque === 'Toutes' || vehiculeMarque === marque;
      const prixMatch =
        (isNaN(prixMin) || vehiculePrix >= prixMin) && (isNaN(prixMax) || vehiculePrix <= prixMax);
      const kilometrageMatch =
        (isNaN(kilometrageMin) || vehiculeKilometrage >= kilometrageMin) &&
        (isNaN(kilometrageMax) || vehiculeKilometrage <= kilometrageMax);
      const anneeMatch =
        (isNaN(anneeMin) || vehiculeAnnee >= anneeMin) && (isNaN(anneeMax) || vehiculeAnnee <= anneeMax);

      if (marqueMatch && prixMatch && kilometrageMatch && anneeMatch) {
        vehicule.style.display = 'block';
      } else {
        vehicule.style.display = 'none';
      }
    });
  }
  filterBtn.addEventListener('click', filtrerVehicules);
});
