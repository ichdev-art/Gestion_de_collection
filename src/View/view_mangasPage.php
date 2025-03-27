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
                            <img src="avatar.png">
                            <b>pseudonyme</b>
                        </div>
                        <div class="manga-img"
                            style="background:url(https://images.epagine.fr/165/9782820345165_1_75.jpg); background-size:cover; background-position:center">
                        </div>
                        <div class="status">
                            <span>terminé</span>
                        </div>
                    </div>
                    <div class="right">
                        <div class="manga-info">
                            <h1>Titre du manga un peu long</h1>
                            <div class="info-line">
                                <b>Tatsuki Fujimoto</b>
                                <span>genre</span>
                                <span class="note">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </span>
                            </div>
                            <p>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum at sequi hic, magni nam
                                incidunt enim rem unde obcaecati quibusdam esse, distinctio aut harum reiciendis saepe
                                maxime, commodi cupiditate deleniti iure. Cum illum inventore blanditiis, obcaecati
                                assumenda odio quisquam incidunt unde vitae eius, sequi neque repudiandae quia ab
                                voluptas
                                sunt praesentium exercitationem excepturi nam aperiam maxime consequatur dolores? Eum
                                numquam temporibus neque dignissimos repellat minus ea placeat officiis veritatis
                                doloribus
                                labore vel, deleniti atque tenetur accusamus ullam enim eaque et, aliquid nobis mollitia
                                repudiandae? Id illo quae reprehenderit aperiam alias quam nemo velit, maiores incidunt
                                ullam pariatur cum, perferendis recusandae?
                            </p>
                            <div class="manga-post">
                                <button class="second">
                                    <a href=""><i class="fa-solid fa-square-xmark"></i> supprimer</a>
                                </button>
                                <button class="main">
                                    <a href=""><i class="fa-solid fa-pen"></i> éditer</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="manga-comments">
                    <h2>commentaires & notes</h2>
                    <div class="post-comments">
                        <div class="comment">
                            <span class="title">
                                <b>pseudonyme</b>
                                <span>titre du commentaire</span>
                                <button><i class="fa-solid fa-delete-left"></i> supprimer</button>
                            </span>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat dolorem tempora
                                eligendi, praesentium excepturi voluptas facere voluptatem temporibus ullam, ad
                                molestias consequuntur qui! Assumenda suscipit quae exercitationem soluta dolorum
                                deleniti nisi impedit repellendus odit facere dignissimos eum voluptatem placeat
                                accusamus numquam quaerat maiores tenetur.</p>
                        </div>
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
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>