<?php

namespace Framework;

// Lié a la class ApplicationComponent.php, permet de récupérer les variables et les métohdes d'envoie. //
class HTTPRequest extends ApplicationComponent
{

// Permet de récupérer les cookies. //
public function cookieData($key)
{
    return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
}

// Permet de vérifier l'existence de cookie. //
public function cookieExist($key)
{
    return isset($_COOKIE[$key]);
}

// Permet de récupérer les données passé en $_GET. //
public function getData($key)
{
    return isset($_GET[$key]) ? $_GET[$key] : null;
}

// Permet de vérifier l'existence de données envoyées en $_GET. //
public function getExist($key)
{
    return isset($_GET[$key]);
}

// Permet de récupérer les method à exécuter. //
public function method()
{
    return $_SERVER['REQUEST_METHOD'];
}

// Permet de récupérer les données passé en $_POST. //
public function postData($key)
{
    return isset($_POST[$key]) ? $_POST[$key] : null;
}

// Permet de vérifier l'existence de données envoyées en $_POST. //
public function postExist($key)
{
    return isset($_POST[$key]);
}

// Permet de récupérer l'url à excuter. //
public function requestURI()
{
    return $_SERVER['REQUEST_URI'];
}



}























?>