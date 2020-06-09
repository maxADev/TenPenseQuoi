<?php

namespace App\Frontend\Modules\Forum;

use \Framework\BackController;
use \Framework\HTTPRequest;
use \Entity\Posts;

// Lié a la classe BackController.php. //
class ForumController extends BackController {

    public function executeIndex(HTTPRequest $request) {

        $users = $this->app->user()->user();
        
        $this->page->addVar('title', 'Forum TenPenseQuoi.com');
        $this->page->addVar('layout', 'connectedLayout');
        $this->page->addVar('users', $users);
        

        $categoriesList = $this->managers->getManagerOf('Categories')->getCategoriesList();
        $this->page->addVar('categoriesList', $categoriesList);

        if(!$request->getExist('categories_idFK')) {

        $postsList = $this->managers->getManagerOf('Posts')->getAllPostsList();

        $nombreMyPostsCaracteres = $this->app->config()->get('nombre_my_posts_caracteres');

        foreach ($postsList as $posts) {

            if (strlen($posts->posts_content()) > $nombreMyPostsCaracteres) {

                $debut = substr($posts->posts_content(), 0, $nombreMyPostsCaracteres);
                $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
                $posts->setPosts_content($debut);
            }
        }

        $this->page->addVar('postsList', $postsList);

        } else {

            $postsList = $this->managers->getManagerOf('Posts')->getPostsListWithCategories($request->getData('categories_idFK'));
            
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
