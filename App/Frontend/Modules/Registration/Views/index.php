<div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-5 mb-5">
  <h5 class="text-white text-center col-xl-12 col-lg-12 col-md-12 col-sm-112">Inscription</h5>
</div>
<div class="container apparitionTopFast col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-5 pb-5">
<form method="POST" action="" onkeydown="if(event.keyCode==13) return false" class="form col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <?= $usersRegistrationForm ?>
    <div class='container text-justify col-xl-12 col-lg-12 col-md-12 col-sm-12 m-auto'>
    <span class="article-text col-xl-12 col-lg-12 col-md-12 col-sm-12 m-auto">Nous vous informons que votre adresse mail sera stockée dans notre base de données, vous bénéficiez d’un droit d’effacement de celles-ci.
          Vous pouvez vous opposer au traitement des données vous concernant et disposez du droit de retirer votre consentement à tout moment en vous adressant à un admin ou via la page contact.</span>
    </div>
    <div class='container col-xl-12 col-lg-12 col-md-12 col-sm-12 m-auto'>
      <p class='field required text-center col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-5'>
        <label class="label required col-xl-12 col-lg-12 col-md-12 col-sm-12 m-auto" for="AccpeterCondition">Pour finaliser votre inscription veuillez accepter les conditions</label>
        <input type="checkbox" id="condition" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 m-auto" onclick='conditionActivate()' name="AccpeterCondition"/>
      </p>
  </div>
    <input type="submit" id="displayCondition" class="btn condition col-xl-12 col-lg-12 col-md-12 col-sm-12 m-auto" value="Inscription" />
</form>
</div>
