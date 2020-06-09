<?php

namespace FormBuilder;

use \Framework\FormBuilder;
use \Framework\StringField;
use \Framework\TextField;
use \Framework\MaxLengthValidator;
use \Framework\NotNullValidator;

// Lié à la class FormBuilder.php, permet de créer un form pour News. //
class UsersRegistrationFormBuilder extends FormBuilder
{
    public function build()
    {
        $this->form->add(new StringField([
        'label' => 'Nom d\'utilisateur, Pseudonyme',
        'p_class' => 'field required',
        'name' => 'users_name',
        'class' => 'text-input col-xl-12 col-lg-12 col-md-12 col-sm-12',
        'maxLength' => 15,
        'validators' => [
        new MaxLengthValidator('Le nom d\'utilisateur spécifié est trop long (15 caractères maximum).', 15),
        new NotNullValidator('Merci de spécifier le nom d\'utilisateur.'),
        ],
        ]))
        ->add(new StringField([
        'label' => 'Mot de passe',
        'p_class' => 'field required',
        'name' => 'users_password',
        'class' => 'text-input col-xl-12 col-lg-12 col-md-12 col-sm-12',
        'maxLength' => 25,
        'validators' => [
        new MaxLengthValidator('Le mot de passe spécifié est trop long (25 caractères maximum).', 25),
        new NotNullValidator('Merci de spécifier un mot de passe.'),
        ],
        ]))
         ->add(new StringField([
        'label' => 'Confiramtion du mot de passe',
        'p_class' => 'field required',
        'name' => 'users_password_confirmation',
        'class' => 'text-input col-xl-12 col-lg-12 col-md-12 col-sm-12',
        'maxLength' => 25,
        'validators' => [
        new MaxLengthValidator('Le mot de passe spécifié est trop long (25 caractères maximum).', 25),
        new NotNullValidator('Merci de spécifier le mot de passe de confiramtion.'),
        ],
        ]))
        ->add(new StringField([
        'label' => 'Adresse mail',
        'p_class' => 'field required',
        'name' => 'users_email',
        'class' => 'text-input col-xl-12 col-lg-12 col-md-12 col-sm-12',
        'validators' => [
        new NotNullValidator('Merci de spécifier une adresse mail.'),
        ],
        ]));
    }


}