<?php
namespace Entity;

use \Framework\Entity;

// Lié à la class Entity.php, permet de créer un commentaire composé des attributs corrects. //
class Comments extends Entity
{
    protected   $comments_id,
                $comments_content,
                $comments_statut,
                $comments_note,
                $comments_creation_date,
                $comments_modification_date,
                $users_idFK,
                $posts_idFK,
                $users_name,
                $users_statut;

    const INVALID_COMMENTSID = 1;
    const INVALID_COMMENTSCONTENT = 2;
    const INVALID_COMMENTSSTATUT = 3;
    const INVALID_USERSIDFK = 4;
    const INVALID_POSTSIDFK = 5;

    public function isValid()
    {
        return !(empty($this->comments_content) || empty($this->users_idFK) || empty($this->posts_idFK));
    }

    // LES SETTERS. //
    public function setComments_id($comments_id) {

        if(empty($comments_id)) {

            $this->erreurs[] = self::INVALID_COMMENTSID;
        }

        $this->comments_id = $comments_id;
    }

    public function setComments_content($comments_content) {

        if(empty($comments_content)) {

            $this->erreurs[] = self::INVALID_COMMENTSCONTENT;
        }

        $this->comments_content = $comments_content;
    }

    public function setComments_statut($comments_statut) {

        if(!is_int($comments_statut) || empty($comments_statut)) {

            $this->erreurs[] = self::INVALID_COMMENTSSTATUT;
        }

        $this->comments_statut = $comments_statut;
    }

    public function setComments_note($comments_note) {

        $this->comments_note = $comments_note;
    }

    public function setComments_creation_date(\DateTime $comments_creation_date) {

        $this->comments_creation_date = $comments_creation_date;
    }

    public function setComments_modification_date(\DateTime $comments_modification_date) {

        $this->comments_modification_date = $comments_modification_date;
    }

    public function setUsers_idFK($users_idFK) {

        if(!is_int($users_idFK) || empty($users_idFK)) {

            $this->erreurs[] = self::INVALID_USERSIDFK;
        }

        $this->users_idFK = $users_idFK;
    }

    public function setPosts_idFK($posts_idFK) {

        if(!is_int($posts_idFK) || empty($posts_idFK)) {

            $this->erreurs[] = self::INVALID_POSTSIDFK;
        }

        $this->posts_idFK = $posts_idFK;
    }

    public function setUsersName($users_name)
    {
        if (!is_string($users_name) || empty($users_name) || !preg_match("/^[a-zA-Z0-9]+$/") || strlen($users_name) < 3 || strlen($users_name) > 15)
        {
            $this->erreurs[] = self::INVALID_NAME;
        }

        $this->users_name = $users_name;
    }

    public function setUsersStatut($users_statut)
    {
        $this->users_statut = (int) $users_statut;
    }

    // LES GETTERS. //
    public function comments_id() {

        return $this->comments_id;
    }

    public function comments_content() {

        return $this->comments_content;
    }

    public function comments_statut() {

        return $this->comments_statut;
    }

    public function comments_note() {

        return $this->comments_note;
    }

    public function comments_creation_date() {

        return $this->comments_creation_date;
    }

    public function comments_modification_date() {

        return $this->comments_modification_date;
    }

    public function users_idFK() {

        return $this->users_idFK;
    }

    public function posts_idFK() {

        return $this->posts_idFK;
    }

    public function users_name()
    {
        return $this->users_name;
    }

    public function users_statut()
    {
        return $this->users_statut;
    }

}

?>