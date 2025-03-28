<?php include_once '../../templates/head.php' ?>
<?php include_once '../../templates/nav.php' ?>

<body>
    <section class="home" style="padding-top:5.5rem;">
        <div class="page">
        <form method="post" novalidate>
            <h1>Inscription validée !</h1>
            <p>
                Votre inscription sur la Mangathèque est validée.
                Pour accéder à votre profil, veuillez vous connecter. 
            </p>
            <button class="main"><a href="../Controller/controller_connexion.php">Connexion</a></button>
          </form>
        </div>
    </section>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>