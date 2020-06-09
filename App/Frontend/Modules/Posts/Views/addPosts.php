<div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12">
  <h5 class="text-white text-center col-xl-12 col-lg-12 col-md-12 col-sm-12">Créer mon article</h5>
</div>
  <form method="POST" action="" class="form mb-5 pb-5">
    <p class='field required'>
      <label class="label required mb-0 pb-0" for="categories_idFK">Catégorie de l'article</label>
    </p>
      <select id="select" class="select mb-3" name="categories_idFK">
        <?php foreach ($categoriesList as $categories){ ?>
          <option value="<?= $categories['categories_id'] ?>"><?= $categories['categories_name']?></option>
        <?php  } ?>  
      </select>
    <?= $form ?>
    <p class='field required'>
      <label class="label required mb-0 pb-0">Obligation de remplire : </label>
    </p>
      <input type="submit" class="btn col-xl-12 col-lg-12 col-md-12 col-sm-12" value="CreerMonArticle" />
  </form>