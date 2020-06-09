<?php
namespace Framework;

// Permet de générer un form. //
class Form
{
    protected $entity;
    protected $fields = [];

    public function __construct(Entity $entity)
    {
        $this->setEntity($entity);
    }

    public function add(Field $field)
    {
        // Permet de récupérer le nom du champ. //
        $attr = $field->name(); 

        // Permet d'assigner la valeur correspondante au champ. //
        $field->setValue($this->entity->$attr()); 

        // Permet d'ajouter le champ passé en argument à la liste des champs. //
        $this->fields[] = $field; 
        return $this;
    }

    public function createView()
    {
        $view = '';

        // Permert de générer un par un les champs du formulaire. //
        foreach ($this->fields as $field)
        {
            $view .= $field->buildWidget().'<br />';
        }

        return $view;
    }

    public function isValid()
    {
        $valid = true;

        // Permet de vérifier que tous les champs sont valides. //
        foreach ($this->fields as $field)
        {
            if (!$field->isValid())
            {
                $valid = false;
            }
        }

        return $valid;
    }

    public function entity()
    {
        return $this->entity;
    }

    public function setEntity(Entity $entity)
    {
        $this->entity = $entity;
    }

}

?>