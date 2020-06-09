<?php

namespace Framework;

// Lié a la class ApplicationComponent.php //
class Page extends ApplicationComponent
{
    protected $contentFile;
    protected $vars = [];

// Permet d'ajouter des variable a la page, le nom de la variable $var et la valeur $value. //
public function addVar($var, $value)
{
    if (!is_string($var) || is_numeric($var) || empty($var))
    {
        throw new \InvalidArgumentException('Le nom de la variable doit être une chaine de caractères non nulle');
    }

    $this->vars[$var] = $value;
}

// Permet de générer la page avec les variables, le layout et le contenu. //
public function getGeneratedPage()
{
    if (!file_exists($this->contentFile))
    {
        throw new \RuntimeException('La vue spécifiée n\'existe pas');
    }

    $user = $this->app->user();

    extract($this->vars);
    if(!isset($this->vars['layout']))
    {
        $layout = 'layout';
    } else {
        $layout = $this->vars['layout'];
    }

    ob_start();
    require $this->contentFile;
    $content = ob_get_clean();

    ob_start();
    require __DIR__.'/../../App/'.$this->app->name().'/Templates/'.$layout.'.php';
    return ob_get_clean();
}

// Permet de définir la vue. //
public function setContentFile($contentFile)
{
    if (!is_string($contentFile) || empty($contentFile))
    {
        throw new \InvalidArgumentException('La vue spécifiée est invalide');
    }

    $this->contentFile = $contentFile;
}

}

?>