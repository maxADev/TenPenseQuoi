<?php
namespace Entity;

use \Framework\Entity;

// Lié à la class Entity.php, permet de créer un utilisateurs composé des attributs corrects. //
class Friends extends Entity
{

    protected   $friends_receive,
                $friends_statut,
                $friends_request_idFK,
                $users_name;

    const INVALID_FRIENDSRECEIVE = 1;

    public function isValid() {

        return !(empty($this->friends_receive) || empty($this->friends_statut) ||  empty($this->friends_request_idFK));
    }
    
    // LES SETTERS. //
    public function setFriendsReceive($friends_receive) {

        if(!is_int($friends_receive) || empty($friends_receive)) {

            $this->erreurs[] = self::INVALID_FRIENDSRECEIVE;
        }

        $this->friends_receive = $friends_receive;
    }

    public function setFriends_statut($friends_statut) {

        if(!is_int($friends_statut) || empty($friends_statut)) {

            $this->erreurs[] = self::INVALID_FRIENDSSTATUT;
        }

        $this->friends_statut = $friends_statut;
    }

    public function setFriends_request_idFK($friends_request_idFK) {

        if(!is_int($friends_request_idFK) || empty($friends_request_idFK)) {

            $this->erreurs[] = self::INVALID_FRIENDSREQUESTIDFK;
        }

        $this->friends_request_idFK = $friends_request_idFK;
    }

    public function setUsers_name($users_name) {

        if (!is_string($users_name) || empty($users_name) || !preg_match("/^[a-zA-Z0-9]+$/") || strlen($users_name) < 3 || strlen($users_name) > 15)
        {
            $this->erreurs[] = self::INVALID_NAME;
        }

        $this->users_name = $users_name;
    }

    // LES GETTERS. //
    public function firends_receive() {

        return $this->firends_receive;
    }

    public function friends_statut() {

        return $this->friends_statut;
    }

    public function friends_request_idFK() {

        return $this->friends_request_idFK;
    }

    public function users_name() {
        
        return $this->users_name;
    }
   

}