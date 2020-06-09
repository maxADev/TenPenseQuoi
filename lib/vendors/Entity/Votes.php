<?php
namespace Entity;

use \Framework\Entity;

// Lié à la class Entity.php, permet de créer un vote composé des attributs corrects. //
class Votes extends Entity
{

    protected   $votes_value,
                $users_idFK,
                $posts_idFK;

    const INVALID_VOTESVALUE = 1;
    const INVALID_USERSIDFK = 2;
    const INVALID_POSTSIDFK = 3;

    public function isValid()
    {
        return !(empty($this->votes_value) || empty($this->users_idFK) ||  empty($this->posts_idFK));
    }

    // LES SETTERS. //
    public function setVotesValue() {

        if(!is_int($votes_value) || empty($votes_value)) {

            $this->erreurs[] = self::INVALID_VOTESVALUE;
        }

        $this->votes_value = $votes_value;
    }

    public function setUsersIdFK() {

        if(!is_int($users_idFK) || empty($users_idFK)) {

            $this->erreurs[] = self::INVALID_USERSIDFK;
        }

        $this->users_idFK = $users_idFK;
    }

    public function setPostsIdFK() {

        if(!is_int($posts_idFK) || empty($posts_idFK)) {

            $this->erreurs[] = self::INVALID_POSTSIDFK;
        }

        $this->posts_idFK = $posts_idFK;
    }

    // LES GETTERS. //
    public function votes_value() {

        return $this->votes_value;
    }

    public function users_idFK() {

        return $this->users_idFK;
    }

    public function posts_idFK() {
        
        return $this->posts_idFK;
    }

}
