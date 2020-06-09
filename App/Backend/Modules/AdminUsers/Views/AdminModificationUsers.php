<h5> Modification d'utilisateurs </h5>
<div class='col-xl-8 col-lg-8 col-md-12 col-sm-12 text-center m-auto'>
        <div class='container mb-5'>
            <span class='form-control border-dark'>Id du compte : <?= htmlspecialchars($usersModification['users_id']) ?> </span>
        </div>
            <div class='container mb-5'>
                <span class='form-control border-dark'>Nom du compte : <?= htmlspecialchars($usersModification['users_name']) ?></span>
            </div>
            <form action="" method="POST">
            <p>
            <?= $form ?>

            <input type="submit" value="Modifier" />
            </p>
                        <div class='container mb-5'>
                            <span class='card-text form-control border-dark'> Email du compte : <?= htmlspecialchars($usersModification['users_email']) ?> </span>
                        </div>
                    <div class='container mb-5'>
                        <span class='card-text form-control border-dark'> Date d'inscritpion <?= htmlspecialchars($usersModification['users_inscription_date']) ?> </span>
                    </div>
<button class='btn account text-dark mb-5' name='modifUsers' type='submit'>Faire les modifications</button>
</form>
</div>