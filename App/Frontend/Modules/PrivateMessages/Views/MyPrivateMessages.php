<div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-5">
    <h5 class="text-white text-center col-xl-12 col-lg-12 col-md-12 col-sm-12">Message reçu : </h5>
</div>
<?php if(!empty($privateMessagesList)) {
        foreach ($privateMessagesList as $privateMessages) { ?>
            <div class='card border-dark col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 m-auto'>
                <div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <span class="col-xl-12 col-lg-12 col-md-12 col-sm-12"> Message de : <?= htmlspecialchars($privateMessages['users_name']) ?></span>
                    </div>
                    <div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <span class="col-xl-12 col-lg-12 col-md-12 col-sm-12"> <?= nl2br(htmlspecialchars($privateMessages['private_messages_content'])) ?></span>
                    </div>
                </div>
            </div>
    <?php if($privateMessages['private_message_statut'] != 1) { ?>
        <div class='container col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6'>
            <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12'>
                <div class='container col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5'>
                    <a class='btn col-xl-12 col-lg-12 col-md-5 col-sm-5 mt-2' href="Enregistre-messages-<?= $privateMessages['private_messages_id'] ?>.html">Enregistrer le message</a>
                </div>
                <div class='container col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5'>
                    <a class='btn col-xl-12 col-lg-12 col-md-5 col-sm-5 mt-2' href="Supprimer-messages-<?= $privateMessages['private_messages_id'] ?>.html">Supprimer le message</a>
                </div>
            </div>
        </div>
    <?php } ?>
<?php 
}
} else { ?>
    <div class="container text-center col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-5 mb-5">
        <span class="text-white col-xl-12 col-lg-12 col-md-12 col-sm-12"> Vous n'avez pas de message.</span>
    </div>
<?php } ?>
    <div class="container col-xl-6 col-lg-12 col-md-12 col-sm-12 mt-5 mb-5">
        <div class='row col-xl-12 col-lg-12 col-md-12 col-sm-12'>
            <div class='container col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5'>
                <a class='btn col-xl-12 col-lg-12 col-md-12 col-sm-12' href="Messages-enregistre">Voir mes messages enregistré</a>
            </div>
            <div class='container col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5'>
                <a class='btn col-xl-12 col-lg-12 col-md-12 col-sm-12' href="Envoyer-Un-Message-Prive">Envoyer un message privé</a>
            </div>  
        </div>
    </div>