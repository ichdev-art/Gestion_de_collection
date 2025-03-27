<?php
include_once '../../templates/head.php';
include_once '../../templates/nav.php';


?>

<body>
    <section class="profile" style="padding-top:5.5rem;">
        <div class="page">
            <div class="profile-main">
                <div class="top">
                    <img src="../../assets/img/users/<?= $_SESSION['user_id'] ?>/avatar/<?= $_SESSION['user_avatar'] ?>">
                    <span><?= $_SESSION['user_pseudo'] ?></span>
                <button class="main"><a href="../Controller/controller_creation.php"><i class="fa-solid fa-square-plus"></i> ajouter un manga</a></button>
                </div>
                <div class="collection">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                            aria-selected="true"><i class="fa-solid fa-book-open"></i>Ma collection</button>
                        <button class="nav-link" id="nav-favoris-tab" data-bs-toggle="tab" data-bs-target="#nav-favoris"
                            type="button" role="tab" aria-controls="nav-favoris" aria-selected="false">
                            <i class="fa-solid fa-bookmark"></i> Mes
                            favoris
                        </button>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab" tabindex="0">
                            <div class="content">
                                <?php foreach ($mangasCard as $value) { ?>
                                    <div class="manga-card"><a href="../Controller/controller_mangasPage.php?manga=<?= $value['man_id'] ?>">
                                            <div class="manga-top"
                                                style="background:url(../../assets/img/users/<?= $_SESSION['user_id'] ?>/<?= $value['man_image'] ?>); background-size:cover; background-position:center">
                                                <span class="status"><?= $value["man_status"] ?></span>
                                            </div>
                                            <div class="manga-body">
                                                <b><?= $value['man_name'] ?></b>
                                                <p><?= $value['man_auteur'] ?></p>
                                                <span class="genre"><?= $value['man_genre'] ?></span>
                                            </div>
                                        </a></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-favoris" role="tabpanel" aria-labelledby="nav-favoris-tab"
                            tabindex="0">
                            <div class="content">
                                <?php foreach ($favorisCard as $value) { ?>
                                    <div class="manga-card">
                                        <a href="../Controller/controller_mangasPage.php?manga=<?= $value['man_id'] ?>">
                                            <div class="manga-top"
                                                style="background:url(../../assets/img/users/<?= $_SESSION['user_id'] ?>/<?= $value['man_image'] ?>); background-size:cover; background-position:center">
                                                <span class="status"><?= $value["man_status"] ?></span>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="manga-body">
                                                <b><?= $value['man_name'] ?></b>
                                                <p><?= $value['man_auteur'] ?></p>
                                                <span class="genre">Shonen</span>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>

</body>

</html>