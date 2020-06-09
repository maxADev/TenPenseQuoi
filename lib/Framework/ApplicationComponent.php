<?php

namespace Framework;

// Permet de renvoyer l'application a la class Application.php, permet avec la variable $app ou est stocké les composants de l'application en cours d'utilisation. //
abstract class ApplicationComponent
{

    protected $app;
  
    public function __construct(Application $app)
    {
      $this->app = $app;
    }
    
    public function app()
    {
      return $this->app;
    }

}

?>