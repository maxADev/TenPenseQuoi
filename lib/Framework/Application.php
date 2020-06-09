<?php

namespace Framework;

// Permet de lancer les applications en utilisant le nom. //
abstract class Application
{

    protected $httpRequest;
    protected $httpResponse;
    protected $user;
    protected $name;
    protected $config;

// Permet d'instancier les class HTTPRequest et HTTPResponse. //
// La variable $name correspond au nom du fichier ou il faut chercher. //
public function __construct()
{
    $this->httpRequest = new HTTPRequest($this);
    $this->httpResponse = new HTTPResponse($this);
    $this->user = new UserSession($this);
    $this->config = new Config($this);

    $this->name = '';
}

// Permet la gestion des URL. //
public function getController()
{
    $router = new Router;

    // Permet d'aller lire le fichier XML. //
    // Le $this->name correspond au nom du fichier, donc de l'application. //
    $xml = new \DOMDocument;
    $xml->load(__DIR__.'/../../App/'.$this->name.'/Config/routes.xml');

    $routes = $xml->getElementsByTagName('route');
    
    // Permet de parcourir les routes du fichier XML. //
    foreach ($routes as $route)
    {
        $vars = [];

        // Permet de regarder si des variables sont présentes dans l'URL. //
        if ($route->hasAttribute('vars'))
        {
        $vars = explode(',', $route->getAttribute('vars'));
        }

        // Permet d'ajouter la route au routeur. //
        // La class Router permet la construction de la class Route. //
        $router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
    }

    try
    {
        // Permet de récupèrer la route correspondante à l'URL. //
        $matchedRoute = $router->getRoute($this->httpRequest->requestURI());
    }
    catch (\RuntimeException $e)
    {
        if ($e->getCode() == Router::NO_ROUTE)
        {
            // Permet de faire une redirection si aucune route ne correspond, c'est que la page demandée n'existe pas. //
            $this->httpResponse->redirect404();
        }
    }

// Permet d'ajouter les variables de l'URL au tableau $_GET. //
$_GET = array_merge($_GET, $matchedRoute->vars());

// Permet d'instancier le contrôleur. //
$controllerClass = 'App\\'.$this->name.'\\Modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'Controller';
return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());
}

abstract function run();

// Les GETTEURS. //
public function httpRequest()
{
    return $this->httpRequest;
}

public function httpResponse()
{
    return $this->httpResponse;
}
 
public function user()
{
    return $this->user;
}

public function name()
{
    return $this->name;
}

public function config()
{
    return $this->config;
}


}

?>