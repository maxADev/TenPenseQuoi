<?php

namespace App\Frontend\Modules\PrivateMessages;

use \Framework\BackController;
use \Framework\HTTPRequest;
use \Entity\PrivateMessages;
use \FormBuilder\PrivateMessagesFormBuilder;
use \Framework\FormHandler;

// Lié a la classe BackController.php. //
class PrivateMessagesController extends BackController {

    public function executeMyPrivateMessages(HTTPRequest $request) {

        if (!empty($this->app->user()->user())) { 

            $this->page->addVar('title', 'Mon-Compte');
            $this->page->addVar('layout', 'connectedLayout');
            
            $users = $this->app->user()->user();

            $users_messages_receive = $users['users_id'];

            $this->page->addVar('users', $users);

            $privateMessagesList =  $this->managers->getManagerOf('PrivateMessages')->getMyPrivateMessagesList($users_messages_receive);
            
            $this->page->addVar('privateMessagesList', $privateMessagesList);
        } else {

            $this->app->user()->setFlash('Vous devez être connecter pour afficher vos messages privé.');
            $this->app->httpResponse()->redirect404();
        }

    }

    public function executeMyPrivateMessagesSave(HTTPRequest $request) {

        if(!empty($this->app->user()->user()) && $request->getExist('private_messages_id')) {

            $users = $this->app->user()->user();
            $users_messages_receive = $users['users_id'];
            $private_messages_id = $request->getData('private_messages_id');

            $this->managers->getManagerOf('PrivateMessages')->privateMessagesSave($users_messages_receive, $private_messages_id);
            $this->app->user()->setFlash('Message enregistré.');
            $this->app->httpResponse()->redirect('./Mes-Messages');
        } else {

            $this->app->user()->setFlash('Vous devez être connecter pour enregistrer un message privé.');
            $this->app->httpResponse()->redirect404();
        }
    }

    public function executeMySavePrivateMessages(HTTPRequest $request) {

        if (!empty($this->app->user()->user())) { 

        $this->page->addVar('title', 'Mon-Compte');
        $this->page->addVar('layout', 'connectedLayout');
        
        $users = $this->app->user()->user();

        $users_messages_receive = $users['users_id'];

        $this->page->addVar('users', $users);

        $privateMessagesList =  $this->managers->getManagerOf('PrivateMessages')->getMySavePrivateMessagesList($users_messages_receive);

        $this->page->addVar('privateMessagesList', $privateMessagesList);
    } else {
            
        $this->app->user()->setFlash('Vous devez être connecter pour afficher vos messages privé.');
        $this->app->httpResponse()->redirect404();
    }
      
    }

    public function executeMyPrivateMessagesDeleted(HTTPRequest $request) {

        if(!empty($this->app->user()->user()) && $request->getExist('private_messages_id')) {

            $users = $this->app->user()->user();
            $users_messages_receive = $users['users_id'];
            $private_messages_id = $request->getData('private_messages_id');

            $this->managers->getManagerOf('PrivateMessages')->privateMessagesDeleted($users_messages_receive, $private_messages_id);
            $this->app->user()->setFlash('Message supprimé');
            $this->app->httpResponse()->redirect('./Mes-enregistre');
        } else {

            $this->app->user()->setFlash('Vous devez être connecter pour supprimer un messages privé.');
            $this->app->httpResponse()->redirect404();
        }
    }

    public function executeAddPrivateMessages(HTTPRequest $request)
    {
        if (!empty($this->app->user()->user())) { 

            $this->page->addVar('title', 'Envoyez en message privé');
            $this->page->addVar('layout', 'connectedLayout');
            
            $users = $this->app->user()->user();

            $this->page->addVar('users', $users);

            $this->processAddPrivateMessagesForm($request);

        } else {
            
            $this->app->user()->setFlash('Vous devez être connecter pour envoyer un messages privé.');
            $this->app->httpResponse()->redirect404();
        }

    }

    public function processAddPrivateMessagesForm(HTTPRequest $request) {
        
        $users = $this->app->user()->user();
        $users_id = $users['users_id'];

        if(!empty($users)) {

            $users_receive =  $this->managers->getManagerOf('PrivateMessages')->privateMessagesReceive($request->postData('users_messages_receive'));
            
            $users_messages_receive = $users_receive['users_id'];

            if($users_messages_receive != $users_id) {

                $privateMessages = new PrivateMessages([
                'users_messages_receive' => $users_messages_receive,
                'private_messages_content' => $request->postData('private_messages_content'),
                'users_sender_idFK' => $users_id,
                ]);

                $formBuilder = new PrivateMessagesFormBuilder($privateMessages);
                $formBuilder->build();

                $privateMessagesForm = $formBuilder->form();

                $this->page->addVar('privateMessagesForm', $privateMessagesForm->createView());
        
                if ($request->method() == 'POST') {

                    $formHandler = new FormHandler($privateMessagesForm, $this->managers->getManagerOf('PrivateMessages'), $request);
                    if ($formHandler->processAddPrivateMessages()) {

                        $this->app->user()->setFlash('Votre messages à bien été envoyé.');
                        $this->app->httpResponse()->redirect('/Mes-Messages');
                    } else {

                        $this->page->addVar('privateMessagesForm', $privateMessagesForm->createView());
                    }
                }

            } else {

                $this->app->user()->setFlash('Vous ne pouvez pas vous envoyer un message.');
                $this->app->httpResponse()->redirect('/Mes-Messages');
            }

        } else {

            $this->app->user()->setFlash('Vous devez être connecter pour envoyer un messages privé.');
            $this->app->httpResponse()->redirect404();
        }

}

}
