<?php
namespace Entity;

use \Framework\Entity;

// Lié à la class Entity.php, permet de créer un utilisateurs composé des attributs corrects. //
class PrivateMessages extends Entity
{

    protected   $private_messages_id,
                $users_messages_receive,
                $private_messages_content,
                $private_messages_statut,
                $private_messages_creation_date,
                $private_messages_modification_date,
                $users_sender_idFK,
                $users_name;

    const INVALID_PRIVATEMESSAGESID = 1;
    const INVALID_USERSMESSAGEsRECEIVE = 2;
    const INVALID_PRIVATEMESSAGEsCONTENT = 3;
    const INVALID_PRIVATEMESSAGEsCREATIONDATE = 4;
    const INVALID_USERSSENDERIDFK = 5;

    public function isValid() {

        return !(empty($this->users_messages_receive) || empty($this->private_messages_content) ||  empty($this->private_messages_statut) || empty($this->private_messages_creation_date) || empty($this->users_sender_idFK));
    }

    // LES SETTERS. //
    public function setPrivate_messages_id($private_messages_id) {

        if(!is_int($private_messages_id) || empty($private_messages_id)) {

            $this->erreurs[] = self::INVALID_PRIVATEMESSAGESID;
        }

        $this->private_messages_id = $private_messages_id;
    }

    public function setUsers_messages_receive($users_messages_receive) {

        if(!is_int($users_messages_receive) || empty($users_messages_receive)) {

            $this->erreurs[] = self::INVALID_USERSMESSAGEsRECEIVE;
        }

        $this->users_messages_receive = $users_messages_receive;
    }

    public function setPrivate_messages_content($private_messages_content) {

        if(empty($private_messages_content)) {

            $this->erreur[] = self::INVALID_PRIVATEMESSAGEsCONTENT;
        }

        $this->private_messages_content = $private_messages_content;
    }

    public function setPrivate_messages_creation_date($private_messages_creation_date) {

        $this->private_messages_creation_date = $private_messages_creation_date;
    }

    public function setPrivate_messages_modification_date($private_messages_modification_date) {

        $this->private_messages_modification_date = $private_messages_modification_date;
    }

    public function setUsers_sender_idFK($users_sender_idFK) {

        if(is_int($users_sender_idFK) || empty($users_sender_idFK)) {

            $this->erreur[] = self::INVALID_USERSSENDERIDFK;
        }

        $this->users_sender_idFK = $users_sender_idFK;
    }

    public function setUsersName($users_name)
    {
        if (!is_string($users_name) || empty($users_name) || !preg_match("/^[a-zA-Z0-9]+$/") || strlen($users_name) < 3 || strlen($users_name) > 15)
        {
            $this->erreurs[] = self::INVALID_NAME;
        }

        $this->users_name = $users_name;
    }

    // LES GETTERS. //
    public function private_messages_id() {

        return $this->private_messages_id;
    }

    public function users_messages_receive() {

        return $this->users_messages_receive;
    }

    public function private_messages_content() {

        return $this->private_messages_content;
    }

    public function private_messages_statut() {

        return $this->private_messages_statut;
    }

    public function private_messages_creation_date() {

        return $this->private_messages_creation_date;
    }

    public function private_messages_modification_date() {

        return $this->private_messages_modification_date;
    }

    public function users_sender_idFK() {

        return $this->users_sender_idFK;
    }

    public function users_name() {
        
        return $this->users_name;
    }

}