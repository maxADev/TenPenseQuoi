<div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <h5 class="text-white text-center col-xl-12 col-lg-12 col-md-12 col-sm-12">Article</h5>
</div>
        <div class="card articleComplet border-0 text-center col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10 m-auto p-0">
                <?php if(empty($posts['posts_image'])) { ?>
                        <img class="card-img-top image-article" src='/images/no-image.jpg' alt='Image par défault'>
                <?php } else { ?>
                        <img class="card-img-top image-article" src="<?= $posts['posts_image'] ?>" alt='Image ajouté par un utilisateur'>
                <?php } ?>
                        <div class="card-body">
                                <h1 class='text-uppercase my-title font-weight-bold'><?= htmlspecialchars($posts['posts_name']) ?></h1>
                        <?php if($users['users_statut'] == 3) { ?>
                                <span>Posté par : Utilisateur inconnu </span>
                        <?php } else { ?>
                                <span>Posté par : <?= $users['users_name'] ?> le <?= $posts['posts_creation_date']->format('d/m/Y à H\hi') ?></span>
                                <a href='Profile-<?= htmlspecialchars($posts['users_idFK']) ?>.html'> Voir le profile</a>
                        <?php } ?>
                <div class="container">
                        <span>Categorie : <?= $posts['categories_name'] ?></p>
                </div>
                <div class="container font-weight-bold text-justif col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <span> <?= nl2br(htmlspecialchars($posts['posts_content'])) ?></span>
                </div>
        <div class='container m-auto text-center'>
                <?php if(empty($posts['posts_video'])) { ?>
                        <span>aucune video associé</span>
        </div>
                <?php } else {
$videos_url = $posts['posts_video'];
$videos_url = str_replace(array('https://youtu.be/'),'', $videos_url);
echo "<div class='container col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-5 text-center '>
<iframe width='100%' height='350' src='https://www.youtube.com/embed/".htmlspecialchars($videos_url)."' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>
</div>
</div>";
}
?>
        </div>
<div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-5">
        <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="container col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <span class="font-weight-bold">J'AIME : <span class='text-success likes'><?php echo(htmlspecialchars($countLikes)); ?></span></span>
                </div>
                <div class="container col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <span class="font-weight-bold"> J'AIME PAS : <span class='text-danger dislikes'><?php echo(htmlspecialchars($countDislikes)); ?></span></span>
                </div>
        </div>
                <?php if(!empty($user->user())) { ?>
                        <div class='container col-xl-12 col-lg-12 col-md-12 col-sm-12'>
                                <form method="POST" action="" class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <div class="container col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12 mt-5">
                                                        <button type='submit' class='btn likes font-weight-bold col-xl-12 col-lg-12 col-md-12 col-sm-12 m-0 p-0' name='like'>J'AIME</button>
                                                </div>
                                                <div class="container col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12 mt-5">
                                                        <button type='submit' class='btn dislikes font-weight-bold col-xl-12 col-lg-12 col-md-12 col-sm-12 m-0 p-0' name='dislike'>J'AIME PAS</button>
                                                </div>
                                        </div>
                                </form>
                        </div>
                <?php } ?>
</div>
        </div>
<div class="container my-margin mt-5">
        <?php foreach ($commentsList as $comments) { ?>
                <div class="container col-xl-8 col-sm-12 col-md-8 col-lg-8 mb-3 comments">
                        <div class="card-title text-center">
                                <?= nl2br(htmlspecialchars($comments['comments_content'])) ?>
                        </div>
                                <div class="row">
                                        <div class="container">
                                                <span class="littleText">Posté le <?= $comments['comments_creation_date']->format('d/m/Y à H\hi') ?></span>
                                        </div>
                                        <?php if($comments['comments_modification_date'] != $comments['comments_creation_date']) { ?>
                                        <div class="container">
                                                <span class="littleText">Modifié le <?= $comments['comments_modification_date']->format('d/m/Y à H\hi') ?></span>
                                        </div>
                                        <?php } ?>
                                        <div class="container">
                                                <?php if($comments['comments_note'] != NULL && $comments['comments_statut'] == 5) { ?>
                                                        <span class='littleText'> Note laissé par un admin : <?= htmlspecialchars($comments['comments_note']); ?></span>
                                                <?php } ?>
                                        </div>
                                <div class="container mb-3">
                                        <?php if($comments['users_statut'] == 3) { ?>
                                                <span class="card-text littleText">Posté par <b>Utilisateurs Annonyme</b></span>
                                        <?php } else { ?>
                                                <span class='card-text littleText'>Posté par : <?= $comments['users_name'] ?></span>
                                        <?php } ?>
                                </div>
                                </div>
                </div>
        <?php if(!empty($user->user()) && $comments['users_idFK'] == $users['users_id']) { ?>
                <div class="container text-center">
                        <div class="container  col-xl-8 col-lg-12 col-md-12 col-sm-12  mb-2">
                                <a class="btn" href="modification-commentaire-<?= $comments['comments_id'] ?>.html">Modifier mon commentaire</a>
                        </div>
                        <div class="container  col-xl-8 col-lg-12 col-md-12 col-sm-12  mb-5">
                                <a class="btn" href="deleted-comments-<?= $comments['comments_id'] ?>.html">Supprimer mon commentaire (Suppression irréverssible).</a>
                        </div>
                </div>
        <?php } ?>
        <?php }?>
</div>
        <?php if(!empty($user->user())) { ?>
                <div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <h5 class="text-white text-center col-xl-12 col-lg-12 col-md-12 col-sm-12">Poster un commentaire</h5>
                </div>
                        <form method="POST" action="" class="form col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-5 mb-5 pb-5">
                                <?= $commentsForm ?>
                                <button type="submit" class="btn col-xl-12 col-lg-12 col-md-12 col-sm-12" value="CreerMonCommentaire">Créer mon commentaire </button>
                        </form>
        <?php } ?>