<?php

namespace App\Frontend\Modules\PasswordReset;

use \Framework\BackController;
use \Framework\HTTPRequest;
use \Entity\Users;
use \FormBuilder\UsersModificationPasswordFormBuilder;
use \FormBuilder\UsersNewPasswordFormBuilder;
use \Framework\FormHandler;

// Lié a la classe BackController.php. //
class PasswordResetController extends BackController {

    // Permet de passer en requête l'index de la page connexion.php. //
    public function executeIndex(HTTPRequest $request) {

        $this->page->addVar('title', 'Renitialiser Mon Mot De Passe');
        $this->page->addVar('layout', 'connectedLayout');

        $this->processModificationUsersPasswordForm($request);
    }

    public function processModificationUsersPasswordForm(HTTPRequest $request) {

        $users_reset_token = self::random(50);

        $users = new Users([
            'users_email' => $request->postData('users_email'),
            'users_reset_token' => $users_reset_token,
            ]);

        $formBuilder = new UsersModificationPasswordFormBuilder($users);
        $formBuilder->build();

        $usersEmailForm = $formBuilder->form();

        $this->page->addVar('usersPasswordForm', $usersEmailForm->createView());

        $formHandler = new FormHandler($usersEmailForm, $this->managers->getManagerOf('Users'), $request);

        if ($formHandler->processModificationUsersPassword()) {

            $this->app->user()->setFlash('Un email pour modifier votre mot de passe vous a été envoyé');
            $this->app->httpResponse()->redirect('./');
        } else {

            $this->page->addVar('usersEmailForm', $usersEmailForm->createView());
        }

    }

    public function executeResetMyPassword(HTTPRequest $request) {

        $this->page->addVar('title', 'Renitialiser Mon Mot De Passe');
        $this->page->addVar('layout', 'connectedLayout');

        $this->processNewUsersPasswordForm($request);
    }

    public function processNewUsersPasswordForm(HTTPRequest $request) {

        if($request->getExist('users_id') && $request->getExist('users_reset_token')) {

             $users = $this->managers->getManagerOf('Users')->getUniqueUsers($request->getData('users_id'));
            if($users && $request->getData('users_reset_token') == $users['users_reset_token']) {

                $users_reset_token = $request->getData('users_reset_token');
                $users_id = $request->getData('users_id');

                $users = new Users([
                    'users_password' => $request->postData('users_password'),
                    'users_password_confirmation' => $request->postData('users_password_confirmation'),
                    'users_reset_token' => $users_reset_token,
                    'users_id' => $users_id,
                    ]);

                $formBuilder = new UsersNewPasswordFormBuilder($users);
                $formBuilder->build();

                $usersPasswordForm = $formBuilder->form();

                $this->page->addVar('usersPasswordForm', $usersPasswordForm->createView());

        
                if($request->postData('users_password') == $request->postData('users_password_confirmation')) {

                $formHandler = new FormHandler($usersPasswordForm, $this->managers->getManagerOf('Users'), $request);
                }

                if ($formHandler->processNewUsersPassword()) {

                    $this->app->user()->setFlash('Votre mot de passe a bien été modifier');
                    $this->app->httpResponse()->redirect('./Connexion');
                } else {

                    $this->page->addVar('usersPasswordForm', $usersPasswordForm->createView());
                }

            }

        }

    }

    public function random($length) {

        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }

}
