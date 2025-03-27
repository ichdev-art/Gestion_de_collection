<?php include_once '../../templates/head.php' ?>
<?php include_once '../../templates/nav.php' ?>

<body>
    <section class="home" style="padding-top:5.5rem;">
        <div class="page">
            <form method="post" enctype="multipart/form-data" novalidate>
                <h1>Ajouter un manga</h1>
                <div class="mb-3">
                    <label for="cover" class="form-label">Photo du manga :</label>
                    <input type="file" class="form-control" id="cover" name="cover" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Titre du manga</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $_POST['name'] ?? '' ?>">
                    <div class="form-error"><?= $error['name'] ?? '' ?></div>
                </div>
                <div class="mb-3">
                    <label for="auteur" class="form-label">Auteur-ice</label>
                    <input type="text" class="form-control" id="auteur" name="auteur" value="<?= $_POST['auteur'] ?? '' ?>">
                    <div class="form-error"><?= $error[''] ?? '' ?></div>
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Genre(s)</label>
                    <input type="text" class="form-control" id="genre" name="genre" value="<?= $_POST['genre'] ?? '' ?>">
                    <div class="form-error"><?= $error[''] ?? '' ?></div>
                </div>
                <div class="mb-3">
                    <label for="pseudo" class="form-label">Description</label>
                    <textarea class="form-control" rows="3" id="desc" name="desc" value="<?= $_POST['desc'] ?? '' ?>"></textarea>
                    <div class="form-error"><?= $error[''] ?? '' ?></div>
                </div>
                <div class="mb-3 review">
                <label for="note">Note</label>
                <span class="required"><?= $errors['note'] ?? '' ?></span>
                <select name="note" id="note">
                    <option value="" selected disabled></option>
                    <option value="1" <?= isset($_POST['note']) && $_POST['note'] == 'one' ? 'selected' : '' ?>>1</option>
                    <option value="2" <?= isset($_POST['note']) && $_POST['note'] == 'two' ? 'selected' : '' ?>>2</option>
                    <option value="3" <?= isset($_POST['note']) && $_POST['note'] == 'autre' ? 'selected' : '' ?>>3</option>
                    <option value="4" <?= isset($_POST['note']) && $_POST['note'] == 'autre' ? 'selected' : '' ?>>4</option>
                    <option value="5" <?= isset($_POST['note']) && $_POST['note'] == 'autre' ? 'selected' : '' ?>>5</option>
                </select>

                <label for="status">Statut</label>
                <span class="required"><?= $errors['status'] ?? '' ?></span>
                <select name="status" id="status">
                    <option value="" selected disabled></option>
                    <option value="à lire" <?= isset($_POST['note']) && $_POST['status'] == 'one' ? 'selected' : '' ?>>à lire</option>
                    <option value="en cours" <?= isset($_POST['note']) && $_POST['status'] == 'two' ? 'selected' : '' ?>>en cours</option>
                    <option value="terminé" <?= isset($_POST['note']) && $_POST['status'] == 'autre' ? 'selected' : '' ?>>terminé</option>
                </select>
                </div>
                <button type="submit">Envoyer</button>
                <a class="link" href="../Controller/controller_profil.php">annuler</a>
            </form>
        </div>
    </section>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>