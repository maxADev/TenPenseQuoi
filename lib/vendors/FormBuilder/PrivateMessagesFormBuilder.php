<?php

namespace FormBuilder;

use \Framework\FormBuilder;
use \Framework\StringField;
use \Framework\TextField;
use \Framework\MaxLengthValidator;
use \Framework\NotNullValidator;

// Lié à la class FormBuilder.php, permet de créer un form pour Posts. //
class PrivateMessagesFormBuilder extends FormBuilder
{
    public function build()
    {
        $this->form->add(new TextField([
        'label' => 'Contenu du message privé.',
        'p_class' => 'field required',
        'name' => 'private_messages_content',
        'class' => 'text-input col-xl-12 col-lg-12 col-md-12 col-sm-12',
        'validators' => [
        new NotNullValidator('Merci de spécifier un contenu à votre message privé.'),
        ],
        ]));
    }

}