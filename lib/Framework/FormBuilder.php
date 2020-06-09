<?php

namespace Framework;

// Permet de construire le form, de le stocker et d'utiliser les accesseurs et mutateurs correspondant. //
abstract class FormBuilder
{
    protected $form;

    public function __construct(Entity $entity)
    {
        $this->setForm(new Form($entity));
    }

    abstract public function build();

    public function setForm(Form $form)
    {
        $this->form = $form;
    }

    public function form()
    {
        return $this->form;
    }

}

?>