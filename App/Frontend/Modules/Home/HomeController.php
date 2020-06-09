<?php

namespace App\Frontend\Modules\Home;

use \Framework\BackController;
use \Framework\HTTPRequest;

// Lié a la classe BackController.php. //
class HomeController extends BackController {

    // Permet de passer en requête l'index de la page connexion.php. //
    public function executeIndex(HTTPRequest $request) {

        $users = $this->app->user()->user();

        if(!empty($users)) {

            $this->app->httpResponse()->redirect('../Mon-Compte');
        } else {

            // Lié a la classe Page.php permet d'ajouter des variable a la Page en passant par la fonction(). //
            // Permet de passer le titre de la page, Accueil. //
            $this->page->addVar('title', 'Forum de discussions : TenPenseQuoi.com ?');
            $this->page->addVar('layout', 'myLayout');

            $nombrePosts = $this->app->config()->get('nombre_posts');
            
            $postsList = $this->managers->getManagerOf('Posts')->getPostsList($nombrePosts);

            $nombreMyPostsCaracteres = $this->app->config()->get('nombre_my_posts_caracteres');
    
            foreach ($postsList as $posts) {
    
                if (strlen($posts->posts_content()) > $nombreMyPostsCaracteres) {
    
                    $debut = substr($posts->posts_content(), 0, $nombreMyPostsCaracteres);
                    $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
                    $posts->setPosts_content($debut);
                }
            }
    
            $this->page->addVar('postsList', $postsList);
        }

    }
    
}
