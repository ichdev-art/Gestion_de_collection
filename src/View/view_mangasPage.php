<?php
include_once '../../templates/head.php';
include_once '../../templates/nav.php';

?>

<body>
    <section class="manga" style="padding-top:5.5rem;">
        <div class="page">
            <div class="manga-post">
                <div class="manga-both">
                    <div class="left">
                        <div class="user-manga">
                            <img src="../../assets/img/users/<?= $mangasCard['user_id'] ?>/avatar/<?= $mangasCard['user_avatar'] ?>">
                            <b><?= $mangasCard['user_pseudo'] ?></b>
                        </div>
                        <div class="manga-img"
                            style="background:url(../../assets/img/users/<?= $mangasCard['user_id'] ?>/<?= $mangasCard['man_image'] ?>); background-size:cover; background-position:center">
                        </div>
                        <div class="status">
                            <span><?= $mangasCard['man_status'] ?></span>
                        </div>
                    </div>
                    <div class="right">
                        <div class="manga-info">
                            <h1><?= $mangasCard['man_name'] ?></h1>
                            <div class="info-line">
                                <b><?= $mangasCard['man_auteur'] ?></b>
                                <span><?= $mangasCard['man_genre'] ?></span>
                                <span class="note">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </span>
                            </div>
                            <p>
                                <?= $mangasCard['man_description'] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="manga-comments">
                    <h2>commentaires & notes</h2>
                    <div class="post-comments">
                        <?php foreach ($mangasCard as $value) { ?>
                            <div class="comment">
                                <span class="title">
                                    <b><?= $value['user_pseudo'] ?></b>
                                    <span>titre du commentaire</span>
                                </span>
                                <p><?= $value['com_text'] ?></p>
                            </div>
                        <?php } ?>
                        <div class="comment">
                            <span class="title">
                                <b>pseudonyme</b>
                                <span>ARC du grand tournois</span>
                            </span>
                            <p>
                                Meilleur arc de tous les temps
                            </p>
                        </div>
                        <form class="add-comment" method="post" novalidate>
                            <div class="coms">
                                <div class="com-input" style="width:30%;">
                                    <label for="title" class="form-label">Titre du commentaire</label>
                                    <input type="text" id="title" title="title" name="title" class="form-control"
                                        placeholder="">
                                </div>
                                <div class="com-input" style="width:70%;">
                                    <label for="comment" class="form-label">commentaire(s)</label>
                                    <input type="text" id="comment" title="comment" name="comment" class="form-control"
                                        placeholder="<?= $errors['comment'] ?? 'écrire un commentaire...' ?>">
                                </div>
                                <button type="submit">commenter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="node_modules@‌popperjs\core\dist\umd\popper.js"></script>
    <script src="node_modules\bootstrap\dist\js\bootstrap.js"></script>
</body>

</html>