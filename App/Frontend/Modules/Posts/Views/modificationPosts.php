<div class="container text-center col-xl-12 col-lg-12 col-md-12 col-sm-12 m-auto">
  <h5 class="text-white text-center col-xl-12 col-lg-12 col-md-12 col-sm-12">Modifier un Article</h5>
</div>
  <div class="container text-center col-xl-12 col-lg-12 col-md-12 col-sm-12 m-auto">
    <h5 class="text-white">Titre de l'article en cours de modification : <?= $post['posts_name'] ?></h5>
  </div>
<form method="POST" action="" class="form mb-5 pb-5">
    <?= $form ?>
    <input type="submit" class="btn col-xl-12 col-lg-12 col-md-12 col-sm-12" value="Modifier l'article" />
    <p class='field no-required mt-5 mb-0'>
      <label class="label required mb-0 pb-0">La suppression d'un article est irreverssible. </label>
    </p>
  <button type='submit' class='btn col-xl-12 col-lg-12 col-md-12 col-sm-12' name='deletedMyPosts'>Supprimer mon article</button>
</form>