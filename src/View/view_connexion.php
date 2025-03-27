<?php include_once '../../templates/head.php' ?>
<?php include_once '../../templates/nav.php' ?>


<body>
  <section class="home" style="padding-top:5.5rem;">
    <div class="page">
      <form method="post" novalidate>
        <h1>Connexion</h1>
        <div class="mb-3">
          <label for="pseudo" class="form-label">Pseudo</label>
          <input type="text" class="form-control" id="pseudo" name="email">
          <div class="form-error"><?= $error['email'] ?? '' ?></div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Mot de passe</label>
          <input type="password" class="form-control" id="password" name="password">
          <div class="form-error"><?= $error['password'] ?? '' ?></div>
        </div>
        <div class="links">
          <button type="submit">se connecter</button>
          <div class="form-error"><?= $error['connexion'] ?? '' ?></div>
          <button class="main"><a href="../Controller/controller_inscription.php">Inscription</a></button>
          <div>
      </form>
    </div>
  </section>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>