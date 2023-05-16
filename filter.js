function filtrerVehicules() {
  var priceSlider = document.getElementById('price-slider');
  var priceValues = priceSlider.noUiSlider.get();
  var prixMin = parseFloat(priceValues[0]);
  var prixMax = parseFloat(priceValues[1]);

  var yearSlider = document.getElementById('year-slider');
  var yearValues = yearSlider.noUiSlider.get();
  var anneeMin = parseInt(yearValues[0]);
  var anneeMax = parseInt(yearValues[1]);

  var mileageSlider = document.getElementById('mileage-slider');
  var mileageValues = mileageSlider.noUiSlider.get();
  var kmMin = parseInt(mileageValues[0]);
  var kmMax = parseInt(mileageValues[1]);

  var vehicules = document.getElementsByClassName('card');

  for (var i = 0; i < vehicules.length; i++) {
    var vehicule = vehicules[i];
    var prix = parseFloat(vehicule.querySelector('.prix').textContent.replace(/[^\d.-]/g, ''));
    var kilometres = parseInt(vehicule.querySelector('.kilometrage').textContent.replace(/[^\d.-]/g, ''));
    var annee = parseInt(vehicule.querySelector('.annee').textContent.replace(/[^\d.-]/g, ''));
    if (prix >= prixMin && prix <= prixMax && kilometres >= kmMin && kilometres <= kmMax && annee >= anneeMin && annee <= anneeMax) {
      vehicule.classList.remove('hidden');  // Afficher le véhicule
    } else {
      vehicule.classList.add('hidden');  // Masquer le véhicule
    }
  }
}

function initializeSlider(sliderId, minValue, maxValue, startMinValue, startMaxValue, valueId, valueMaxId) {
  var slider = document.getElementById(sliderId);
  var value = document.getElementById(valueId);
  var valueMax = document.getElementById(valueMaxId);
  noUiSlider.create(slider, {
    start: [startMinValue, startMaxValue],
    connect: true,
    range: {
      'min': minValue,
      'max': maxValue
    },
    step: 1
  });

  slider.noUiSlider.on('update', function (values, handle) {
    if (handle === 0) {
      value.innerHTML = parseFloat(values[0]);
    } else {
      valueMax.innerHTML = parseFloat(values[1]);
    }
  });
}

initializeSlider('price-slider', 1000, 200000, 1000, 200000, 'price-value', 'price-value-max');
initializeSlider('year-slider', 1990, 2023, 1990, 2023, 'year-value', 'year-value-max');
initializeSlider('mileage-slider', 0, 200000, 0, 200000, 'mileage-value', 'mileage-value-max');