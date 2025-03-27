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
                            <b><?= $_SESSION['user_pseudo'] ?></b>
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
                                    <?= $note ?>
                                </span>
                            </div>
                            <p>
                                <?= $mangasCard['man_description'] ?>
                            </p>
                            <div class="manga-edit">
                                    <button type="button" class="second" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-square-xmark"></i> supprimer</a>
                                    </button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Voulez vous vraiment supprimer ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="main" data-bs-dismiss="modal">annuler</button>
                                                    <button type="button" class="second"><a href="../Controller/controller_mangasPage.php?mangas=<?= $mangasCard['man_id'] ?>">Supprimer</a></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <button class="main">
                                    <a href="../Controller/controller_editPost.php?manga=<?= $mangasCard['man_id'] ?>"><i class="fa-solid fa-pen"></i> éditer</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>