<?php

namespace FormBuilder;

use \Framework\FormBuilder;
use \Framework\StringField;
use \Framework\TextField;
use \Framework\MaxLengthValidator;
use \Framework\NotNullValidator;

// Lié à la class FormBuilder.php, permet de créer un form pour News. //
class UsersModificationPasswordFormBuilder extends FormBuilder {

    public function build() {

        $this->form->add(new StringField([
        'label' => 'Adresse mail du compte',
        'p_class' => 'field required',
        'name' => 'users_email',
        'class' => 'text-input col-xl-12 col-lg-12 col-md-12 col-sm-12',
        'validators' => [
        new NotNullValidator('Merci de spécifier l\'adresse mail de votre compte.'),
        ],
        ]));
    }




}
