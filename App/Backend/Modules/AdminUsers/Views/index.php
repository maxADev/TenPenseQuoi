<h5> Administration des utilisateurs </h5>
<?php
foreach ($usersList as $usersInformations)
{
?>
<div class='container mb-5'>
<div class='container article bg-white col-xl-8 col-lg-8 col-md-8 col-sm-12  m-auto justify-content-center'>
        <div class='container'>
            <span>Nom du compte : <?= htmlspecialchars($usersInformations['users_name']) ?></span>
        </div>
            <div class='container'>
                <span>Note laisser par un admin : <?= htmlspecialchars($usersInformations['users_note']) ?></span>
            </div>
                <div class='container'>
                    <span class='card-text'>Date d'inscritpion : <?= htmlspecialchars($usersInformations['users_inscription_date']->format('d/m/Y à H\hi')) ?></span>
                </div>
        <div class='container'>
            <span class='card-text'>Statut de l'utilisateur : <?= htmlspecialchars($usersInformations['users_statut']) ?></span>
        </div>
    </div>
        <div class='container col-xl-8 col-lg-8 col-md-8 col-sm-12 mt-3'>
            <button class='btn account'><a class='text-dark' href="./Admin-Modification-Users-<?= htmlspecialchars($usersInformations['users_id']) ?>.html">Gerer cette utilisateur</a></button>
        </div>
</div>
<?php
}
?>
