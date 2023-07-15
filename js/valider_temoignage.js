function modifyTemoignage(id, type) {

  const formData = new FormData();
  formData.append('id', id);
  formData.append('type', type);

  fetch('modify_temoignage.php', {
    method: 'POST',
    body: formData
  })
    .then(function (response) {
      if (response.ok) {
        location.reload();
      }
    })
    .catch(function (error) {
      console.error('Erreur lors de la validation du témoignage:', error);
    });
}