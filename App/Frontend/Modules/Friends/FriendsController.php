<?php

namespace App\Frontend\Modules\Friends;

use \Framework\BackController;
use \Framework\HTTPRequest;

// Lié a la classe BackController.php. //
class FriendsController extends BackController {

    public function executeMyFriendsManager(HTTPRequest $request) {

        $users = $this->app->user()->user();

        if(!empty($users)) {

            $this->page->addVar('layout', 'connectedLayout');
            
            $friends_receive = $users['users_id'];

            $friendsRequestReceiveList = $this->managers->getManagerOf('Friends')->myFriendsRequestReceive($friends_receive);

            $this->page->addVar('friendsRequestReceiveList', $friendsRequestReceiveList);
            $this->page->addVar('users', $users);

            // Permet d'envoyer une demande d'amis. //
            if($request->getExist('friends_receive')) {

                $users = $this->app->user()->user();
                $friends_request_idFK = $users['users_id'];
                $friends_receive = $request->getData('friends_receive');

                if($friends_request_idFK != $friends_receive) {

                    $this->managers->getManagerOf('Friends')->addFriends($friends_request_idFK, $friends_receive);
                    $this->app->user()->setFlash('Demande d\'amis envoyé.');
                    $this->app->httpResponse()->redirect('./Mon-Compte');
                } else {

                    $this->app->user()->setFlash('Vous ne pouvez pas vous ajouter vous même en amis.');
                    $this->app->httpResponse()->redirect('./Mon-Compte');
                }

            }

            // Permet d'afficher les demandes d'amis en attentes. //
            if($request->getExist('friends_request_idFK')) {

                $users = $this->app->user()->user();
                $friends_receive = $users['users_id'];

                $friends_request_idFK = $request->getData('friends_request_idFK');
                $friendsRequestReceiveList = $this->managers->getManagerOf('Friends')->accepteFriendsRequestReceive($friends_receive, $friends_request_idFK);

                $this->app->user()->setFlash('Demande d\'amis acceptée.');
                $this->app->httpResponse()->redirect('./Mes-Amis');
            }

            // Permet d'afficher ma liste d'amis. //
            if($request->postExist('myFriendsList')) {

                $users = $this->app->user()->user();
                $users_id = $users['users_id'];

                $myFriendsListRequest = $this->managers->getManagerOf('Friends')->myFriendsListRequest($users_id);
                $myFriendsListReceive = $this->managers->getManagerOf('Friends')->myFriendsListReceive($users_id);

                $this->page->addVar('myFriendsListRequest', $myFriendsListRequest);
                $this->page->addVar('myFriendsListReceive', $myFriendsListReceive);
            }

            // Permet de supprimer un amis de la liste. //
            if($request->getExist('friends_id')) {

                $users_id = $request->getData('friends_id');

                $myFriendsListRequest = $this->managers->getManagerOf('Friends')->deletedFriends($users_id);

                $this->app->user()->setFlash('Amis retiré de la liste.');
                $this->app->httpResponse()->redirect('./Mes-Amis');
            }
        } else {

            $this->app->user()->setFlash('Vous devez être connecté.');
            $this->app->httpResponse()->redirect404();
        }

    }   

}
