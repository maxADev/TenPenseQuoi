<?php

namespace FormBuilder;

use \Framework\FormBuilder;
use \Framework\StringField;
use \Framework\TextField;
use \Framework\MaxLengthValidator;
use \Framework\NotNullValidator;

// Lié à la class FormBuilder.php, permet de créer un form pour Posts. //
class AdminModificationCommentsFormBuilder extends FormBuilder {

    public function build()
    {
        $this->form->add(new StringField([
        'label' => 'Contenu du commentaire',
        'p_class' => 'field required',
        'name' => 'comments_content',
        'class' => 'text-input col-xl-12 col-lg-12 col-md-12 col-sm-12',
        'maxLength' => 250,
        'validators' => [
        new MaxLengthValidator('Le contenu du commentaire spécifié est trop long (250 caractères maximum)', 250),
        new NotNullValidator('Merci de spécifier un contenu de commentaire'),
        ],
        ]))
        ->add(new StringField([
        'label' => 'Statut du commentaire',
        'p_class' => 'field required',
        'name' => 'comments_statut',
        'class' => 'text-input col-xl-12 col-lg-12 col-md-12 col-sm-12',
        ]))
        ->add(new StringField([
        'label' => 'Note du commentaire',
        'p_class' => 'field required',
        'name' => 'comments_note',
        'class' => 'text-input col-xl-12 col-lg-12 col-md-12 col-sm-12',
        ]));
    }
}
