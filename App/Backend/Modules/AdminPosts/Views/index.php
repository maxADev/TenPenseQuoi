<div class="container text-center col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-5 mb-5">
  <h5 class="text-white text-center col-xl-12 col-lg-12 col-md-12 col-sm-12">Administration des articles</h5>
</div>
    <form method="POST" action="" class="text-center col-xl-12 col-lg-12 col-md-12 col-sm-12 m-auto">
    <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-5">
            <button type='submit' class='btn col-xl-12 col-lg-12 col-md-12 col-sm-12' name='ArticleNotVerified'>Article non validé</button>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-5">
            <button type='submit' class='btn col-xl-12 col-lg-12 col-md-12 col-sm-12' name='ArticleDeleted'>Article supprimé</button>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-5">
            <button type='submit' class='btn col-xl-12 col-lg-12 col-md-12 col-sm-12' name='AllPostsList'>Tous les articles</button>
        </div>  
    </div>
    </form>
<?php
foreach($postsList as $post) {
?>
<div class='container col-xl-8 col-lg-8 col-md-12 col-sm-12 bg-white article m-auto p-0 justify-content-center'>
                    <div class='container'>
                        <p>Categorie : <?php htmlspecialchars($post['categories_name']) ?></p>
                    </div>
                        <div class='container'>
                            <p class='card-text'> Titre du sujet : <?= htmlspecialchars($post['posts_name']) ?></p>
                        </div>
                            <div class='container'>
                                <p class='card-text'><em> Posté le <b> <?= $post['posts_creation_date']->format('d/m/Y à H\hi') ?></b></em></p>
                            </div>
                            <?php if($post['users_name'] == 3) { ?>
                                <div class='container'>
                                         <p class='card-text'>Posté par <b> Utilisateur inconnu</b></p>
                                    </div>
                            <?php } else { ?>
                                <div class='container'>
                                    <p class='card-text'>Posté par <b> <?= htmlspecialchars($post['users_name']) ?></b></p>
                                </div>
                           <?php } ?>
                        <div class='container'>
                            <p class='card-text'>Statut du post <b> <?= htmlspecialchars($post['posts_statut']) ?></b></p>
                        </div>
                    <?php if($post['posts_note'] != NULL) { ?>

                    <div class='container'>
                            <p class='card-text'>Note laisser par l'admin : <b> <?= htmlspecialchars($post['posts_note']) ?></b></p>
                        </div>
                    <?php } ?>
        </div>
            <div class='container col-xl-4 col-lg-4 col-md-12 col-sm-12 mt-1 mb-5'>
                <a class='btn col-xl-12 col-lg-12 col-md-12 col-sm-12' href="Admin-Modification-Posts-<?= htmlspecialchars($post['posts_id']) ?>.html">Modifier l'article</a>
                <?php if($post['posts_statut'] != 5) {
                    $posts_name = $post['posts_name'];
                    $posts_name = mb_strtolower($posts_name);
                    $posts_name = utf8_decode($posts_name);
                    $posts_name = strtr($posts_name, utf8_decode('àâäãáåçéèêëíìîïñóòôöõøùúûüýÿ'), 'aaaaaaceeeeiiiinoooooouuuuyy');
                    $posts_name = preg_replace('`[^a-z0-9]+`', '-', $posts_name);
                    $posts_name = trim($posts_name, '-');
                    $posts_name;
                ?>
                    <a class='btn col-xl-12 col-lg-12 col-md-12 col-sm-12' href="../Article-<?= htmlspecialchars($post['posts_id'])?>-<? $posts_name ?>">Voir l'article</a>
                <?php } ?>
            </div>



<?php
}
?>