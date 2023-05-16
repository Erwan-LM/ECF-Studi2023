$(document).ready(function () {
  $('#navbarNav').on('show.bs.collapse', function () {
    $('#navbarNavList').addClass('show');
  });

  $('#navbarNav').on('hide.bs.collapse', function () {
    $('#navbarNavList').removeClass('show');
  });
});