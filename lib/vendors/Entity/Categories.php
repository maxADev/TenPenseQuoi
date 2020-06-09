<?php

namespace Entity;

use \Framework\Entity;

// Lié à la class Entity.php, permert de créer une Categories avec les attributs corrects. //
class Categories extends Entity {

    protected   $categories_id,
                $categories_name;

    const INVALID_CATEGORIESID = 1;
    const INVALID_CATEGORIESNAME = 2;

    public function isValid() {

        return !(empty($this->categories_id) || empty($this->categories_name));
    }

    // LES SETTERS. //
    public function setCategories_id($categories_id) {

        if(!is_int($categories_id) || empty($categories_id)) {

            $this->erreurs[] = self::ID_ERROR;
        }

        $this->$categories_id = $categories_id;
    }

    public function setCategoires_name($categories_name) {

        if(!is_int($categories_id) || empty($categories_id)) {

            $this->erreurs[] = self::INVALID_CATEGORIESNAME;
        }

        $this->$categories_name = $categories_name;
    }

    // LES GETTERS. //
    public function categories_id() {

        return $this->categories_id;
    }

    public function categories_name() {

        return $this->categories_name;
    }

}
