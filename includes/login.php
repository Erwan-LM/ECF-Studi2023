<link rel="stylesheet" href="/css/login.css">
<!-- Formulaire de connexion -->
<div class="modal-body" style="display: none;">
  <form action="includes/authentification.php" method="POST">
    <div class="form-group">
      <label for="email">Adresse e-mail</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="password">Mot de passe</label>
      <input type="password" id="password" name="password" required>
    </div>
    <button type="submit" class="custom-button custom-button-login popup-trigger">Se connecter</button>
    <button id="login-cancel" class="custom-button custom-button-cancel">Annuler</button>
  </form>
</div>
<script src="/js/login.js"></script>
