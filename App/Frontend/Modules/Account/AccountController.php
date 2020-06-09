<?php

namespace App\Frontend\Modules\Account;

use \Framework\BackController;
use \Framework\HTTPRequest;
use \Entity\PrivateMessages;

// Lié a la classe BackController.php. //
class AccountController extends BackController {

    // Permet de passer en requête l'index de la page connexion.php. //
    public function executeIndex(HTTPRequest $request)
    {
        if (!empty($this->app->user()->user())) { 

            $this->page->addVar('title', 'Mon-Compte');
            $this->page->addVar('layout', 'connectedLayout');
            
            $users = $this->app->user()->user();

            $users_messages_receive = $users['users_id'];

            $this->page->addVar('users', $users);

            // Permet de compter les private messages. //
            $countPrivateMessages = $this->managers->getManagerOf('PrivateMessages')->countMyPrivateMessages($users_messages_receive);
            
            $this->app->user()->setAttribute('countPrivateMessages', $countPrivateMessages);

            $countPosts = $this->managers->getManagerOf('Posts')->countMyPosts($users['users_id']);
            $countComments =  $this->managers->getManagerOf('Comments')->countMyComments($users['users_id']);

            $this->page->addVar('countPosts', $countPosts);
            $this->page->addVar('countComments', $countComments);
        } else {
            
            $this->app->httpResponse()->redirect('./Connexion');

        }

    }

}
