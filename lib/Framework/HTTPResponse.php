<?php

namespace Framework;

// Lié a la class ApplicationComponent.php, permet de générér les pages en réponse a la requête utilisateurs. //
class HTTPResponse extends ApplicationComponent
{

protected $page;

// Permet d'envoyer le header a la page. //
public function addHeader($header)
{
    header($header);
}

// Permet de faire une rédirection. //
public function redirect($location)
{
    header('Location: '.$location);
    exit;
}

// Permet une redirection404 code erreur, envoie a la page. //
public function redirect404()
{
    // Permet de créer une instance de page ou je vais stocker les données. //
    $this->page = new Page($this->app);
    $this->page->setContentFile(__DIR__.'/../../Errors/404.php');

    $this->addHeader('HTTP/1.0 404 Not Found');

    // La fonction send() permert de lancer la fonction getGeneratedPage(). //
    $this->send();

}

// Permet de générer la page. //
// La fonction getGeneratedPage() est dans la class Page. //
public function send()
{
    exit($this->page->getGeneratedPage());
}

// Permet d'assigner une page à la réponse. //
public function setPage(Page $page)
{
    $this->page = $page;
}

// Permet d'écrire le cookie. //
public function setCookie($name, $value = '', $expire = 0, $path = null, $domain = null, $secure = false, $httpOnly = true)
{
    setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
}

}















?>