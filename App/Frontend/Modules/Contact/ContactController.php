<?php

namespace App\Frontend\Modules\Contact;

use \Framework\BackController;
use \Framework\HTTPRequest;

// Lié a la classe BackController.php. //
class ContactController extends BackController {

    public function executeIndex(HTTPRequest $request) {

        $this->page->addVar('title', 'Contact');
        $this->page->addVar('layout', 'connectedLayout');

        if($request->method() == 'POST') {
            
        if(!empty($request->postData('users_email')) && !empty($request->postData('sujet')) && !empty($request->postData('contenu'))) {
           
            $adresse = "tenpensequeoi@gmail.com";
            $who = $request->postData('users_email');
            $subject = $request->postData('sujet');
            $content = $request->postData('contenu');
            mail ($adresse , "A propos de $subject", "Contenu du message : $content", "de $who" );
            echo "<div class='container bg-success'><span>Message envoyé</span></div>";
        } else {

            echo "<div class='container bg-success'><span>Merci de remplire tout les champs</span></div>";
        }
    }

    }

}
