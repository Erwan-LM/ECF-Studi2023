function showPhoneNumberPopup(link) {
  var card = link.closest('.card');
  var phoneNumber = card.getAttribute('data-phone-number');
  var phoneNumberPopup = card.querySelector('.phone-number-popup');

  phoneNumberPopup.textContent = 'Numéro de téléphone du garage : ' + phoneNumber;
  phoneNumberPopup.style.display = "block";
}