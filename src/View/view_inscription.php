<?php include_once '../../templates/head.php' ?>
<?php include_once '../../templates/nav.php' ?>

<body>
    <section class="home" style="padding-top:5.5rem;">
        <div class="page">
        <form method="post" novalidate>
            <h1>Insciption</h1>
            <div class="mb-3">
                <label for="avatar" class="form-label">Photo de profil :</label>
                <input type="file" class="form-control" id="avatar" name="avatar" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" class="form-control" id="email" name="email">
<<<<<<< HEAD
              <div class="form-error"><?= $error['email'] ?? '' ?></div>
=======
              <div class="form-error">ce champ est obligatoire</div>
>>>>>>> master
            </div>
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo">
<<<<<<< HEAD
                <div class="form-error"><?= $error['pseudo'] ?? '' ?></div>
=======
>>>>>>> master
              </div>
            <div class="mb-3">
              <label for="password" class="form-label">Mot de passe</label>
              <input type="password" class="form-control" id="password" name="password">
<<<<<<< HEAD
              <div class="form-error"><?= $error['password'] ?? '' ?></div>
=======
>>>>>>> master
            </div>
            <button type="submit">Envoyer</button>
          </form>
        </div>
    </section>
</body>

<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> master
