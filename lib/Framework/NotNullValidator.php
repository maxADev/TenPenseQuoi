<?php

namespace Framework;

// Lié à la class Validator.php permet de vérifier que la valeur n'est pas NULL. //
class NotNullValidator extends Validator
{
    public function isValid($value)
    {
        return $value != '';
    }

}

?>