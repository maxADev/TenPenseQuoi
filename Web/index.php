<?php

const DEFAULT_APP = 'Frontend';

// Permet si l'application n'est pas valide, on va charger l'application par défaut qui se chargera de générer une 404 code erreur. //
if (!isset($_GET['app']) || !file_exists(__DIR__.'/../App/'.$_GET['app'])) $_GET['app'] = DEFAULT_APP;

// Permet d'inclure la classe nous permettant d'enregistrer nos autoload. //
require __DIR__.'/../lib/Framework/SplClassLoader.php';

// Permet d'enregistrer les autoloads correspondant à chaque vendor (OCFram, App, Model). //
$OCFramLoader = new SplClassLoader('Framework', __DIR__.'/../lib');
$OCFramLoader->register();

$appLoader = new SplClassLoader('App', __DIR__.'/..');
$appLoader->register();

$modelLoader = new SplClassLoader('Model', __DIR__.'/../lib/vendors');
$modelLoader->register();

$entityLoader = new SplClassLoader('Entity', __DIR__.'/../lib/vendors');
$entityLoader->register();

$formBuilderLoader = new SplClassLoader('FormBuilder', __DIR__.'/../lib/vendors');
$formBuilderLoader->register();

// Permet de déduire le nom de la classe et à l'instancier. //
$appClass = 'App\\'.$_GET['app'].'\\'.$_GET['app'].'Application';

$app = new $appClass;
$app->run();

?>