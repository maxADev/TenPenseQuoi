<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 rounded my-border-primary my-bg pt-2 pb-2 text-center m-auto">
        <div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <h5 class="text-center col-xl-12 col-lg-12 col-md-12 col-sm-12">Mon Compte Admin</h5>
        </div>
        <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="container col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="profile-card"><img src="/images/account-image.jpg" class="img img-responsive">
                        <div class="profile-name">Profile de : <?= htmlspecialchars($users['users_name']) ?></div>
                                <div class="profile-position"><span> Inscrit depuis le : <?php echo(htmlspecialchars($users['users_inscription_date'])); ?></span></div>
                                        <div class="profile-overview">
                                                <div class="profile-overview">
                                        </div>
                                </div>
                        </div>
                </div>
        <div class="container col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <span>Vous êtes connectez avec un compte admin, vous avez accés aux différents fonctionalités dans le menu en haut a droite de votre l'écran.</span>
        </div>
        </div>
</div>