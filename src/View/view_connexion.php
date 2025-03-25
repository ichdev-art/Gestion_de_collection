<?php include_once '../../templates/head.php' ?>
<?php include_once '../../templates/nav.php' ?>


<body>
    <section class="home" style="padding-top:5.5rem;">
        <div class="page">
        <form method="post">
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
            <button type="submit">se connecter</button>
            <div class="form-error"><?= $error['connexion'] ?? '' ?></div>
            <a href=""><button class="second">Inscription</button></a>
          </form>
        </div>
    </section>
</body>

</html>