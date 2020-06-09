<?php

namespace Framework;

// La class Config permet d'aller dans le fichier app.xml, le fichier permet de configuer l'application. //
// La class Config est un extends de la classe ApplicationComponent.php, qui elle est un extends de la classe Application.php. //
// C'est pour cela que je peux utiliser les fonctions de la class Application. //
class Config extends ApplicationComponent
{
    protected $vars = [];

    // Permet de récupérer les noms et valeurs de la route. //
    public function get($var)
    {
        if (!$this->vars)
        {
            $xml = new \DOMDocument;
            $xml->load(__DIR__.'/../../App/'.$this->app->name().'/Config/app.xml');

            $elements = $xml->getElementsByTagName('define');

            foreach ($elements as $element)
            {
                $this->vars[$element->getAttribute('var')] = $element->getAttribute('value');
            }
        }

        if (isset($this->vars[$var]))
        {
            return $this->vars[$var];
        }

            return null;
        }
}

?>