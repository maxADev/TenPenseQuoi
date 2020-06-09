<?php

namespace Framework;

// Permet de gérer les Field pour les Form et d'appliquer des vérifications. //
abstract class Field
{
    use Hydrator;

    protected $errorMessage;
    protected $label;
    protected $p_class;
    protected $name;
    protected $class;
    protected $validators = [];
    protected $value;

    public function __construct(array $options = [])
    {
        if (!empty($options))
        {
            $this->hydrate($options);
        }
    }

    abstract public function buildWidget();

    public function isValid()
    {
        foreach ($this->validators as $validator)
        {
            if (!$validator->isValid($this->value))
            {
                $this->errorMessage = $validator->errorMessage();
                return false;
            }
        }

        return true;
    }

    public function label()
    {
        return $this->label;
    }
    public function p_class() {

        return $this->p_class;
    }

    public function length()
    {
        return $this->length;
    }

    public function name()
    {
        return $this->name;
    }

    public function class()
    {
        return $this->class;
    }

    public function validators()
    {
        return $this->validators;
    }

    public function value()
    {
        return $this->value;
    }

    public function setLabel($label) {

        if (is_string($label)) {

            $this->label = $label;
        }
    }

    public function setP_class($p_class) {

        if (is_string($p_class)) {
            
            $this->p_class = $p_class;
        }
    }

    public function setLength($length)
    {
        $length = (int) $length;

        if ($length > 0)
        {
            $this->length = $length;
        }
    }

    public function setName($name)
    {
        if (is_string($name))
        {
            $this->name = $name;
        }
    }

    public function setClass($class) {
        
        $this->class = $class;
    }

    public function setValidators(array $validators)
    {
        foreach ($validators as $validator)
        {
            if ($validator instanceof Validator && !in_array($validator, $this->validators))
            {
                $this->validators[] = $validator;
            }
        }
    }

    public function setValue($value)
    {
        if (is_string($value))
        {
            $this->value = $value;
        }
    }

}

?>