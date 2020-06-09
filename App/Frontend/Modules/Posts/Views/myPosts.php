<div class="row justify-content-between col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-5 p-5">
<div class="container text-center col-xl-12 col-lg-12 col-md-12 col-sm-12 m-auto">
  <h5 class="text-white text-center col-xl-12 col-lg-12 col-md-12 col-sm-12">Mes articles</h5>
</div>
<?php
foreach ($listePosts as $posts)
{
?>
<div class="card my-card border-0 text-center col-xl-5 col-lg-12 col-md-12 col-sm-12 mt-5 p-0">
        <?php if(empty($posts['posts_image'])) { ?>
            <img class="card-img-top" src='/images/no-image.jpg' alt='Image par défault'>
        <?php } else { ?>
            <img class="card-img-top" src="<?= $posts['posts_image'] ?>" alt='Image ajouté par un utilisateur'>
        <?php } ?>
            <div class="card-body">
            <div class="container">
                        <h5>Statut de votre article :
                       <?php  if($posts['posts_statut'] == 0) {
                                echo ' Non verifier';
                        } else if($posts['posts_statut'] == 1) {
                                echo ' Validé';
                        } else {
                                echo ' Supprimé';
                       } ?>
                        </h5>
                  </div>
                        <?php if(!empty($posts['posts_note'])){ ?>
                      <div class='container'>  
                                <span class='card-text'>Note laisser par l'admin <?= htmlspecialchars($posts['posts_note']) ?></span>
                        </div>
                        <?php } ?>
                             <div class="container">
                                    <span>Categorie : <?= $posts['categories_name'] ?></p>
                                </div>
                                <div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <span>Titre :<?= $posts['posts_name'] ?></span>
                        </div>
                        <div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <span>Date : <?= $posts['posts_creation_date']->format('d/m/Y à H\hi') ?></span>
                        </div>
                        <div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <span>Extrait : <?= $posts['posts_content'] ?></span>
                        </div>
    <div class='container'>
        <?php if($posts['posts_statut'] != 5) {
                $posts_name = $posts['posts_name'];
                $posts_name = mb_strtolower($posts_name);
                $posts_name = utf8_decode($posts_name);
                $posts_name = strtr($posts_name, utf8_decode('àâäãáåçéèêëíìîïñóòôöõøùúûüýÿ'), 'aaaaaaceeeeiiiinoooooouuuuyy');
                $posts_name = preg_replace('`[^a-z0-9]+`', '-', $posts_name);
                $posts_name = trim($posts_name, '-');
                $posts_name;
        ?>
        <div class='container'>
        <a class='btn col-xl-12 col-lg-12 col-md-12 col-sm-12' href="Article-<?= htmlspecialchars($posts['posts_id'])?>-<?= $posts_name ?>">Voir l'article</a>
        </div>
        <?php } ?>
        <?php if($users['users_id'] == $posts['users_idFK'] && $posts['posts_statut'] != 5) {  ?>
                <div class='container mb-3'>
                        <a class='btn col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-2' href="modification-article-<?= htmlspecialchars($posts['posts_id']) ?>.html">Modifier ou Supprimer mon article</a>
                </div>
        <?php } ?>
          </div>
    </div>
    </div>
<?php
}
?>
</div>
