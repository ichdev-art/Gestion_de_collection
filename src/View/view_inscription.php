<?php include_once '../../templates/head.php' ?>
<?php include_once '../../templates/nav.php' ?>

<body>
    <section class="home" style="padding-top:5.5rem;">
        <div class="page">
        <form method="post" enctype="multipart/form-data" novalidate>
            <h1>Inscription</h1>
            <div class="mb-3">
                <label for="avatar" class="form-label">Photo de profil :</label>
                <input type="file" class="form-control" id="avatar" name="avatar" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" value="<?= $_POST['email'] ?? '' ?>">
              <div class="form-error"><?= $error['email'] ?? '' ?></div>
            </div>
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?= $_POST['pseudo'] ?? '' ?>">
                <div class="form-error"><?= $error['pseudo'] ?? '' ?></div>
              </div>
            <div class="mb-3">
              <label for="password" class="form-label">Mot de passe</label>
              <input type="password" class="form-control" id="password" name="password">
              <div class="form-error"><?= $error['password'] ?? '' ?></div>
            </div>
            <button type="submit">Envoyer</button>
            <a class="link" href="../Controller/controller_connexion.php">se connecter</a>
          </form>
        </div>
    </section>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>
