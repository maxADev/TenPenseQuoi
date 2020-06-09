<?php

namespace FormBuilder;

use \Framework\FormBuilder;
use \Framework\StringField;
use \Framework\TextField;
use \Framework\MaxLengthValidator;
use \Framework\NotNullValidator;

// Lié à la class FormBuilder.php, permet de créer un form pour News. //
class UsersNewPasswordFormBuilder extends FormBuilder {

    public function build() {

        $this->form->add(new StringField([
        'label' => 'Nouveau mot de passe',
        'p_class' => 'field required',
        'name' => 'users_password',
        'class' => 'text-input col-xl-12 col-lg-12 col-md-12 col-sm-12',
        'validators' => [
        new NotNullValidator('Merci de spécifier le mot de passe'),
        ],
        ]))
        ->add(new StringField([
        'label' => 'Nouveau mot de passe confirmation',
        'p_class' => 'field required',
        'name' => 'users_password_confirmation',
        'class' => 'text-input col-xl-12 col-lg-12 col-md-12 col-sm-12',
        'validators' => [
        new NotNullValidator('Merci de spécifier le mot de passe'),
        ],
        ]));
    }

}
