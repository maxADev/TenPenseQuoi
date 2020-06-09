<?php

namespace Framework;

// Lié a la classe Route.php, permet de stocké en objet les données de la route. //
// La fonction addRoute() permet d'entrer les données du tableau dans la class Route.php, elle est appelée dans la class Application.php ou elle trouve les données. // 
// La fonction getRoute() permet de récupérer une url, elle est appelé dans la Class Application.php ou elle trouve les données. //
class Router
{

    protected $routes = [];

    const NO_ROUTE = 1;

// Permet d'ajouter une route. //
public function addRoute(Route $route)
{
    if (!in_array($route, $this->routes))
    {
        $this->routes[] = $route;
    }
}

// Permet de récupérer la route. //
public function getRoute($url)
{
foreach ($this->routes as $route)
{
    // Vérifie si la route correspond à l'URL. //
    if (($varsValues = $route->match($url)) !== false)
    {
        // Vérifie si elle a des variables. //
        if ($route->hasVars())
        {
            $varsNames = $route->varsNames();
            $listVars = [];

            // Permet de créer un nouveau tableau clé/valeur //
            // (clé = nom de la variable, valeur = sa valeur) //
            foreach ($varsValues as $key => $match)
            {
                // La première valeur contient entièrement la chaine capturée (voir la doc sur preg_match). //
                if ($key !== 0)
                {
                    $listVars[$varsNames[$key - 1]] = $match;
                }
                }

        // On assigne ce tableau de variables � la route. //
        $route->setVars($listVars);
        }
    return $route;
    }
}

throw new \RuntimeException('Aucune route ne correspond à l\'URL', self::NO_ROUTE);

}

}

?>