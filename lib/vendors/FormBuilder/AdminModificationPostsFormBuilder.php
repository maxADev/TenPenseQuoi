<?php

namespace FormBuilder;

use \Framework\FormBuilder;
use \Framework\StringField;
use \Framework\TextField;
use \Framework\MaxLengthValidator;
use \Framework\NotNullValidator;

// Lié à la class FormBuilder.php, permet de créer un form pour Posts. //
class AdminModificationPostsFormBuilder extends FormBuilder
{
    public function build()
    {
        $this->form->add(new StringField([
        'label' => 'Nom de l\'article',
        'p_class' => 'field required',
        'name' => 'posts_name',
        'class' => 'text-input col-xl-12 col-lg-12 col-md-12 col-sm-12',
        'validators' => [
        new NotNullValidator('Merci de spécifier un titre à l\'article'),
        ],
        ]))
        ->add(new TextField([
        'label' => 'Contenu de l\'Article',
        'p_class' => 'field required',
        'name' => 'posts_content',
        'class' => 'text-input article-text col-xl-12 col-lg-12 col-md-12 col-sm-12',
        'validators' => [
        new NotNullValidator('Merci de spécifier un contenu à votre article'),
        ],
        ]))
        ->add(new StringField([
        'label' => 'Image d\'illustration pour l\'Article',
        'p_class' => 'field no-required',
        'name' => 'posts_image',
        'class' => 'text-input col-xl-12 col-lg-12 col-md-12 col-sm-12',
        ]))
        ->add(new StringField([
        'label' => 'Vidéo d\'illustration pour l\'Article',
        'p_class' => 'field no-required',
        'name' => 'posts_video',
        'class' => 'text-input col-xl-12 col-lg-12 col-md-12 col-sm-12',
        ]))
        ->add(new StringField([
        'label' => 'Statut de l\'article ',
        'p_class' => 'field required',
        'name' => 'posts_statut',
        'class' => 'text-input col-xl-12 col-lg-12 col-md-12 col-sm-12',
        ]))
        ->add(new StringField([
        'label' => 'Note de l\'article ',
        'p_class' => 'field required',
        'name' => 'posts_note',
        'class' => 'text-input col-xl-12 col-lg-12 col-md-12 col-sm-12',
        ]))
        ->add(new StringField([
        'label' => 'Categories de l\'article',
        'p_class' => 'field required',
        'name' => 'categories_idFK',
        'class' => 'text-input col-xl-12 col-lg-12 col-md-12 col-sm-12',
        ]));
    }

}

?>