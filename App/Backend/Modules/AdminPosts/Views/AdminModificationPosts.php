<h5>Modification d'articles</h5>
<form action="" method="POST">
  <p>
    <?= $form ?>
   <span>Nom de la categories <?= $categories_name ?></span>
    
    <input type="submit" value="Modifier l'article" />
  </p>
</form>
<div class="container my-margin">
        <?php foreach ($commentsList as $comments) { ?>
        <div class="container col-xl-8 col-sm-12 col-md-8 col-lg-8 mb-3 comments">
                <div class="card-title text-center">
                        <?= htmlspecialchars($comments['comments_content']) ?>
                </div>
        <div class="row">
                <div class="container">
                        <span class="littleText">Posté le <?= $comments['comments_creation_date']->format('d/m/Y à H\hi') ?></span>
                </div>
                <div class="container">
                        <?php if($comments['comments_note'] != NULL && $comments['comments_statut'] == 5) { ?>
                                <span class='littleText'> Note laissé par un admin : <?= htmlspecialchars($comments['comments_note']); ?></span>
                        <?php } ?>
                </div>
                <div class="container mb-3">
                        <?php if($comments['users_statut'] == 3) { ?>
                                <span class="card-text littleText">Posté par <b>Annonyme</b></span>
                        <?php } else { ?>
                                <span class='card-text littleText'>Posté par : <?= $comments['users_name'] ?></span>
                        <?php } ?>
                </div>
        </div>
        </div>
          <div class="container text-center">
                  <div class="container  col-xl-8 col-lg-12 col-md-12 col-sm-12  mb-5">
                          <a class="btn text-dark" href="Admin-Modification-Comments-<?= $comments['comments_id'] ?>.html">Modifier le commentaire</a>
                  </div>
          </div>
          <?php }?>
</div>