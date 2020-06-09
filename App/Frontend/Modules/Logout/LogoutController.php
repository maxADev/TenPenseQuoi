<?php

namespace App\Frontend\Modules\Logout;

use \Framework\BackController;
use \Framework\HTTPRequest;

// Lié a la classe BackController.php. //
class LogoutController extends BackController {

    // Permet de passer en requête l'index de la page connexion.php. //
    public function executeIndex(HTTPRequest $request) {

        // Lié a la classe Page.php permet d'ajouter des variable a la Page en passant par la fonction(). //
        // Permet de passer le titre de la page, Accueil. //
        $this->page->addVar('title', 'Deconnexion');

        session_destroy();
        $this->app->user()->setFlash('Vous etes bien déconnecté.');
        $this->app->httpResponse()->redirect('./');
    }
}
