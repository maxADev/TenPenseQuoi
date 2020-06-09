<?php

namespace FormBuilder;

use \Framework\FormBuilder;
use \Framework\StringField;
use \Framework\TextField;
use \Framework\MaxLengthValidator;
use \Framework\NotNullValidator;

// Lié à la class FormBuilder.php, permet de créer un form pour Posts. //
class AdminModificationUsersFormBuilder extends FormBuilder
{
    public function build()
    {
        $this->form->add(new StringField([
        'label' => 'Note laisser par un admin.',
        'p_class' => 'field required',
        'name' => 'users_note',
        'class' => 'text-input col-xl-12 col-lg-12 col-md-12 col-sm-12',
        ]))
        ->add(new StringField([
        'label' => 'Statut de l\'utilisateur',
        'p_class' => 'field required',
        'name' => 'users_statut',
        'class' => 'text-input col-xl-12 col-lg-12 col-md-12 col-sm-12',
        'validators' => [
        new NotNullValidator('Merci de spécifier un statut à l\'utilisateur.'),
        ],
        ]));
    }

}

?>