<div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-5 mb-5">
    <h5 class="text-white text-center col-xl-12 col-lg-12 col-md-12 col-sm-12">Envoyez votre message : </h5>
</div>
<form method="POST" action="" class="form">
      <p class="field required">
    <label class="label required mb-0 pb-0" for="users_messages_receive">Nom du déstinataire</label>
    <input type="text" class="text-input col-xl-12 col-lg-12 col-md-12 col-sm-12" name="users_messages_receive" required />
    </p>
    <?= $privateMessagesForm ?>
    <div class="container text-center mb-5">
      <button type="submit" class="btn col-xl-12 col-lg-12 col-md-12 col-sm-12" value="EnvoyerMonMessagesPrive">Envoyez</button>
    </div>
</form>