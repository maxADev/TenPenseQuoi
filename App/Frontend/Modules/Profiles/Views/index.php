<div class="profile-card mt-5">
                <img src="/images/account-image.jpg" class="img img-responsive">
                        <div class="profile-name">Profile de : <?= htmlspecialchars($users_profiles['users_name']) ?></div>
                                <div class="profile-position"><span> Inscrit depuis le : <?php echo(htmlspecialchars($users_profiles['users_inscription_date']->format('d/m/Y à H\hi'))); ?></span></div>
                                        <div class="profile-overview">
                                                <div class="profile-overview">
                                                        <div class="row col-12 text-center">
                                                                <div class="col-4">
                                                                        <h3><?= substr($users_profiles['users_level'], 0, -1) ?></h3>
                                                                        <p>Niveau </p>
                                                                </div>
                                                                <div class="col-4">
                                                                        <h3><?php echo(htmlspecialchars($countPosts)); ?></h3>
                                                                        <p>Articles créés</p>
                                                                </div>
                                                                <div class="col-4">
                                                                        <h3><?php echo(htmlspecialchars($countComments));?></h3>
                                                                        <p>Commentaires</p>
                                                                </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <?php if (!empty($user->user())) { ?>
                            <div class='container text-center col-xl-12 col-lg-12 col-md-12 col-sm-12 m-auto'>
                                <a class='text-white' href='Ajouter-Amis-<?= htmlspecialchars($users_profiles['users_id']) ?>.html'>Envoyer une demande d'amis</a>
                        </div>
                        <?php 
                        }
                        ?>
                </div>