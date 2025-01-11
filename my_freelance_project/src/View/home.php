<!-- src/View/home.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page d'Accueil</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ENjdO4Dr2bkBIFxQpeo0l7MdA9EgihC8qFQw4wV+6z9U8Au78+PzFt/8WjG1a6A+" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php require __DIR__ . '/partials/navbar.php'; ?>

<!-- Hero Section Start -->
<div class="container-fluid py-6 bg-light">
    <div class="row flex-lg-row-reverse align-items-center g-5">
        <div class="col-10 mx-auto col-sm-8 col-lg-6">
            <img src="https://images.unsplash.com/photo-1530435460869-d13625c69bbf?crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8MTB8fHdlYnNpdGV8ZW58MHwwfHx8MTYyMTQ0NjkyNg&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080&amp;h=768" class="d-block mx-lg-auto img-fluid" alt="Freelance Collaboration" loading="lazy">
        </div>
        <div class="col-lg-6">
            <div class="lc-block mb-3">
                <div editable="rich">
                    <h2 class="fw-bold display-5">Connectez-vous avec les meilleurs freelances</h2>
                </div>
            </div>

            <div class="lc-block mb-3">
                <div editable="rich">
                    <p class="lead">Découvrez et collaborez avec des professionnels qualifiés pour donner vie à vos projets. Notre plateforme facilite la mise en relation et la gestion de vos collaborations.</p>
                </div>
            </div>
            <br></br>

            <div class="lc-block d-grid gap-2 d-md-flex justify-content-md-start">
    <a class="btn btn-primary btn-register px-4 me-md-2" href="index.php?controller=user&action=register" role="button">
        Créer un compte
    </a>
    <a class="btn btn-outline-secondary btn-login px-4" href="index.php?controller=user&action=login" role="button">
        Se connecter
    </a>
</div>

        </div>
    </div>
</div>
<!-- Hero Section End -->

<!-- Main Content Start -->
<div class="main-container">
    <h1>C'est trés simple </h1>
    <p>
        Sur ce site, vous pouvez facilement publier ou découvrir des projets, envoyer des offres et collaborer avec des professionnels.
    </p>
       
    <h2>Comment ça marche&nbsp;?</h2>
    <p>
        Pour démarrer sur notre plateforme, commencez par <strong>vous inscrire</strong> en tant que recruteur ou freelance. Une fois inscrit, <strong>connectez-vous</strong> pour accéder à votre espace personnel. Les <strong>recruteurs</strong> peuvent créer de nouveaux projets et recevoir des offres, tandis que les <strong>freelances</strong> peuvent explorer les projets ouverts et soumettre leurs propositions. Enfin, <strong>collaborez</strong> avec les professionnels pour finaliser vos projets en toute simplicité.
    </p>

   

    <section style="margin-top: 20px;">
        <h3>Fonctionnalités principales</h3>
        <p>
            Notre plateforme offre une <strong>gestion complète des projets</strong>, incluant le budget, les délais et le statut. Vous bénéficierez d'une <strong>messagerie intégrée</strong> facilitant la communication entre freelances et recruteurs, ainsi que de <strong>notifications en temps réel</strong> pour rester informé des dernières activités. De plus, notre <strong>système d’offres et d’embauche</strong> simplifie le processus de sélection et de collaboration.
        </p>
    </section>

    
</div>
<!-- Main Content End -->


    <div class="footer">
        <p>&copy; 2023 - Votre Plateforme Freelance</p>
    </div>
</div>
<!-- Main Content End -->

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+7Kz6aTqXK6hRV3Kncjv9KAXQ7rP5" crossorigin="anonymous"></script>
</body>
</html>
