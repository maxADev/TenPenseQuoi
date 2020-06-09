<div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12 m-auto">
    <h5 class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center title mt-2">Forum</h5>
</div>
        <div class="container col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-5">
                <div class="dropdown my-menu col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <button onclick="myFunction()" class="dropdown-btn my-menu ml-5">Trier les articles</button>
                        <div id="my-dropdown" class="dropdown-content my-menu col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ml-5">
                            <div class="row col-12">
                            <?php foreach ($categoriesList as $categories){ ?>     
                                <div class="container col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 m-0 p-0">           
                                    <a  class="text-uppercase" href="Forum-Categories-<?= $categories['categories_id'] ?>.html"><?= $categories['categories_name']?></a>
                                </div>              
                            <?php  } ?>  
                            <div class="container col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 m-0 p-0">
                                <a class="text-uppercase" href="../Forum">Afficher tout les articles</a>
                            </div>
                            </div>
                        </div>
                </div>
        </div>
<div class="row justify-content-between col-xl-12 col-lg-12 col-md-12 col-sm-12 m-auto p-0">
<?php foreach($postsList as $post) { ?>
<div class="container apparition col-xl-5 col-lg-8 col-md-8 col-sm-12 m-auto">
<div class="card my-card border-0 text-center col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-5 mb-5 p-0">
        <?php if(empty($post['posts_image'])) { ?>
        <img class="card-img-top image-forum" src='/images/no-image.jpg' alt='Image par défault'>
        <?php } else { ?>
        <img class="card-img-top image-forum" src="<?= $post['posts_image'] ?>" alt='Image ajouté par un utilisateur'>
        <?php } ?>
            <div class="card-img-overlay my-image-overlay col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="row text-center col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class='container col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 m-0 p-0'>
                        <span class='text-white col-xl-12 col-lg-12 col-md-12 col-sm-12'>Statut de l'article :
                            <?php  if($post['posts_statut'] == 0) {
                            echo ' Non verifier';
                            } if($post['posts_statut'] == 1) {
                            echo ' Validé';
                            } ?>
                        </span>
                    </div>
                        <div class='container col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 m-0 p-0'>
                            <span class='text-white col-xl-12 col-lg-12 col-md-12 col-sm-12'>Catégorie : <?= $post['categories_name'] ?></span> 
                        </div>
                </div>
            </div>
    <div class="card-body">
        <div class='container col-xl-12 col-lg-12 col-md-12 col-sm-12'>
            <span class="font-weight-bold"><?= $post['posts_name'] ?></span>
        </div>
        <?php if($post['users_statut'] == 3) { ?>
        <div class='container col-xl-12 col-lg-12 col-md-12 col-sm-12'>
            <span>Posté par : Utilisateur inconnu </span>
        </div>
        <div class='container col-xl-12 col-lg-12 col-md-12 col-sm-12'>
            <span'>Posté le : <?= $post['posts_creation_date']->format('d/m/Y à H\hi') ?></span>
        </div>
        <?php } else { ?>
        <div class='container col-xl-12 col-lg-12 col-md-12 col-sm-12'>
            <span>Posté par : <?= htmlspecialchars($post['users_name']) ?><a href="Profile-<?= htmlspecialchars($post['users_idFK'])?>.html"> Voir le profile</a></span>
        </div>
        <div class='container col-xl-12 col-lg-12 col-md-12 col-sm-12'>
            <span>Posté le : <?= $post['posts_creation_date']->format('d/m/Y à H\hi') ?></span>
        </div>
        <div class='container col-xl-12 col-lg-12 col-md-12 col-sm-12'>
            <span> Membre de niveau : <?= substr($post['users_level'], 0, -1) ?> </span>
        </div>
        <?php } ?>
        <div class='container col-xl-12 col-lg-12 col-md-12 col-sm-12'>
            <span>Extrait : <?= $post['posts_content'] ?></span>
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
        <div class='container col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2'>
            <span><a class="btn col-xl-12 col-lg-12 col-md-12 col-sm-12" href="Article-<?= $post['posts_id'] ?>-<?= $posts_name ?>">Voir l'article</a></span>
        </div>
    </div>
</div>
</div>
<?php
}
?>
</div>
