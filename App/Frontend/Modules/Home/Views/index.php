<head>
<meta name="description" content="Forum de discussions, Tenpensequoi.com est un forum de discussions et de partage, creez et commentez les sujet des utilisateur." />
</head>
<!-- Div container start -->
<div class="container my-bg0 mb-5 mt-5">
    <!--Info Card beginning -->
            <div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2">
                <div class="card col-xl-12 col-lg-12 col-md-12 col-sm-12 cardHome text-center">
                <div class="card-body">
                <h5 class="card-title text-danger">T'en pense quoi ?</h5>
                <p class="card-text">T'en pense quoi se veut être un forum de discussion et de partage, l'inscription gratuite vous permet de créer vos articles et de partager votre pensée sur les articles des autres membres, le site est disponile sur mobile et tablette. Le site est en développement constant n'hésistez pas à rapporter tout bug ou problème via la page contact.</p>
                </div>
                </div>
            </div>
    <!-- Info Card end -->

<!-- Div row -->
<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 m-auto p-0">
        
<!-- Inscription Card beginning -->
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mt-2">
                <div class="card col-xl-12 col-lg-12 col-md-12 col-sm-12 cardHome text-center">
                    <div class="card-body">
                    <h5 class="card-title text-danger">Inscription</h5>
                    <p class="card-text">Inscrivez vous.</p>
                    <a href="./Inscriptions" class="btn text-uppercase home col-12 mt-2">S'inscrire</a>
                    </div>
                </div>
            </div>
<!-- Inscription Card end -->

<!-- Connexion Card beginning -->
<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mt-2">
    <div class="card col-xl-12 col-lg-12 col-md-12 col-sm-12 cardHome text-center">
        <div class="card-body">
        <h5 class="card-title text-danger">Connexion</h5>
        <p class="card-text">Vous avez déjà un compte ?</p>
        <a href="./Connexion" class="btn text-uppercase home col-12 mt-2">Connexion</a>
        </div>
    </div>
</div>
<!-- Connexion Card end -->

<!-- Go forum Card beginning -->
<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mt-2">
    <div class="card col-xl-12 col-lg-12 col-md-12 col-sm-12 cardHome text-center">
        <div class="card-body">
        <h5 class="card-title text-danger">Le forum</h5>
        <p class="card-text">Retrouver tous les sujets</p>
        <a href="./Forum" class="btn text-uppercase home col-12 mt-2">Forum</a>
        </div>
    </div>
</div>
<!-- Go forum Card end -->
</div>
<!-- Div row end -->

<div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12 m-auto">
    <h5 class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center text-danger title mt-5 mb-5">Les derniers articles du forum : </h5>
</div>
<div class="row justify-content-between col-xl-12 col-lg-12 col-md-12 col-sm-12 m-auto p-0">
<?php
foreach($postsList as $post) {
?>
    <div class="container col-xl-5 col-lg-8 col-md-8 col-sm-12 m-auto">
    <div class="card my-card border-0 text-center mt-5 p-0">
        <?php if(empty($post['posts_image'])) { ?>
            <img class="card-img-top image-forum" src='/images/no-image.jpg' alt='Image par défault'>
        <?php } else { ?>
            <img class="card-img-top image-forum" src="<?= $post['posts_image'] ?>" alt='Image ajouté par un utilisateur'>
        <?php } ?>
            <div class="card-body">
                <div class='container col-xl-12 col-lg-12 col-md-12 col-sm-12'>
                    <span>Titre : <?= $post['posts_name'] ?></span>
                </div>
                <div class='container col-xl-12 col-lg-12 col-md-12 col-sm-12'>
                    <span>Date : <?= $post['posts_creation_date']->format('d/m/Y à H\hi') ?><br></span>
                </div>
                <div class='container col-xl-12 col-lg-12 col-md-12 col-sm-12'>
                    <span>Extrait : <?= nl2br($post['posts_content']) ?><br></span>
                </div>
                <?php 
                    $posts_name = $post['posts_name'];
                    $posts_name = mb_strtolower($posts_name);
                    $posts_name = utf8_decode($posts_name);
                    $posts_name = strtr($posts_name, utf8_decode('àâäãáåçéèêëíìîïñóòôöõøùúûüýÿ'), 'aaaaaaceeeeiiiinoooooouuuuyy');
                    $posts_name = preg_replace('`[^a-z0-9]+`', '-', $posts_name);
                    $posts_name = trim($posts_name, '-');
                    $posts_name;
                ?>
                <div class='container col-xl-12 col-lg-12 col-md-12 col-sm-12'>
                    <span><a href="Article-<?= $post['posts_id'] ?>-<?= $posts_name?>">Voir l'article</a></span>
                </div>
            </div>
    </div>
    </div>
    <?php
}
?>
</div>
</div>
<!-- Div container end -->
<div class="parallax0 col-12"></div>