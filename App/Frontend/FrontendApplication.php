<?php

namespace App\Frontend;

use \Framework\Application;

// Permet d'utiliser le construct de la page Application.php. //
// Permet de passer en paramètre à la class Application.php le $name. //
class FrontendApplication extends Application
{
    public function __construct()
    {
        parent::__construct();

        $this->name = 'Frontend';
    }

    // Permet de créer la page. //
    public function run()
    {
        // Permet de faire appel a la fonction getController(), qui vas aller chercher les routes dans le fichier xml. //
        $controller = $this->getController();

        // Lié a la class BackController.php permet d'executer les fonctions lié aux page que l'on appelle. //
        $controller->execute();

        // Lié a la class HTTPResponse créer la page et renvoie la page au controller de la class BackController.php pour préparer l'envoie a l'application. //
        $this->httpResponse->setPage($controller->page());
        
        // Lié a la class HTTPResponse permet d'envoyer la page a la class HTTPResponse.php. //
        $this->httpResponse->send();
    }
}

?>