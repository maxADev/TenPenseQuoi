<?php

namespace Framework;

// Lié a la class ApplicationComponent.php. //
// Permet de récupérer les informations utilie a la création de la variable $contentFile de la class Page.php et d'utiliser les fonctions() lié à la page, c'est un controlleur. //
abstract class BackController extends ApplicationComponent
{
    protected $action = '';
    protected $module = '';
    protected $page = null;
    protected $view = '';
    protected $managers = null;
 
    // Permet de récupérer les routes et les actions a effectuer sur l'application en cours d'utilisation, permet aussi de créer le vues. //
    public function __construct(Application $app, $module, $action)
    {
        parent::__construct($app);

        $this->managers = new Managers('PDO', PDOFactory::getMysqlConnexion());
        $this->page = new Page($app);

        $this->setModule($module);
        $this->setAction($action);
        $this->setView($action);
    }
 
    // Permet d'executer les fonctions. //
    public function execute()
    {
        // Permet d'appeler les fonctions des controllers. //
        $method = 'execute'.ucfirst($this->action);

        if (!is_callable([$this, $method]))
        {
            throw new \RuntimeException('L\'action "'.$this->action.'" n\'est pas définie sur ce module');
        }

        $this->$method($this->app->httpRequest());
    }
 
    public function page()
    {
        return $this->page;
    }
 
    public function setModule($module)
    {
        if (!is_string($module) || empty($module))
        {
            throw new \InvalidArgumentException('Le module doit être une chaine de caractères valide');
        }

        $this->module = $module;
    }
 
    public function setAction($action)
    {
        if (!is_string($action) || empty($action))
        {
            throw new \InvalidArgumentException('L\'action doit être une chaine de caractères valide');
        }

        $this->action = $action;
    }
 
    public function setView($view)
    {
        if (!is_string($view) || empty($view))
        {
            throw new \InvalidArgumentException('La vue doit être une chaine de caractères valide');
        }

        $this->view = $view;

        // Permet d'écrire le lien du fichier a aller chercher, la fonction setContentFile() est lié a la classe Page. //
        $this->page->setContentFile(__DIR__.'/../../App/'.$this->app->name().'/Modules/'.$this->module.'/Views/'.$this->view.'.php');
    }

}

?>