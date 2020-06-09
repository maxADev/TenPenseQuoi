<?php
namespace Entity;

use \Framework\Entity;

// Lié à la class Entity.php, permet de créer un utilisateurs composé des attributs corrects. //
class Profiles extends Entity {

    protected   $users_id,
                $users_name,
                $users_level,
                $users_inscription_date;
               
                
    public function isValid() {

        return !(empty($this->users_id) || empty($this->users_name) || empty($users_level) || empty($this->$users_inscription_date));
    }

    // LES SETTERS. //
    public function setUsersId($users_id){

        if(!is_int($users_id) || empty($users_id)) {
            
            $this->erreurs[] = self::INVALID_USERSID;
        }

        $this->users_id;
    }

    public function setUsers_name($users_name) {

        if (!is_string($users_name) || empty($users_name) || !preg_match("/^[a-zA-Z0-9]+$/") || strlen($users_name) < 3 || strlen($users_name) > 15) {
            
            $this->erreurs[] = self::INVALID_NAME;
        }

        $this->users_name = $users_name;
    }

    public function setUsers_level($users_level) {

        $this->users_level = (int) $users_level;
    }

    public function setUsers_inscription_date(\DateTime $users_inscription_date) {

        $this->users_inscription_date = $users_inscription_date;
    }

    // LES GETTERS. //
    public function users_id() {

        return $this->users_id;
    }

    public function users_name() {

        return $this->users_name;
    }

    public function users_level() {

        return $this->users_level;
    }

    public function users_inscription_date() {

        return $this->users_inscription_date;
    }

}