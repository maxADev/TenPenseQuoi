<?php

namespace App\Backend;

use \Framework\Application;

// Lié a la class Application.php. //
class BackendApplication extends Application
{
    // Permet de passer en paramètre du constructeur de la class Application, le name "Backend" pour lancer l'application. //
    public function __construct()
    {
        parent::__construct();

        $this->name = 'Backend';
    }

    // Permet de lancer l'application. //
    public function run()
    {
        // Lié a la class Application.php et User.php permet de vérifier si l'utilisateur est connecté. //
        if ($this->user->isAuthenticated())
        {
            // Lié a la class Application.php, lance la fonction getController(), permetant d'aller chercher la route lié au name avec lequel l'application est lancé. //
            $controller = $this->getController();
        }
        else
        {
            
            $controller = new Modules\AdminConnexion\AdminConnexionController($this, 'AdminConnexion', 'index');
        }
        
        // Lié a la class BackController.php permet d'executer les fonctions lié aux page que l'on appelle. //
        $controller->execute();

        // Lié a la class HTTPResponse créer la page et renvoie la page au controller de la class BackController.php pour préparer l'envoie a l'application. //
        $this->httpResponse->setPage($controller->page());

        // Lié a la class HTTPResponse permet d'envoyer la page a la class HTTPResponse.php. //
        $this->httpResponse->send();
    }
}

?>