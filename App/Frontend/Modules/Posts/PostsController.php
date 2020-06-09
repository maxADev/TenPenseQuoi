<?php

namespace App\Frontend\Modules\Posts;

use \Framework\BackController;
use \Framework\HTTPRequest;
use \Entity\Posts;
use \Entity\Votes;
use \Entity\Comments;
use \FormBuilder\PostsModificationFormBuilder;
use \FormBuilder\PostsAddFormBuilder;
use \FormBuilder\CommentsFormBuilder;
use \Framework\FormHandler;
use \Framework\FormatUrl;

// Lié a la classe BackController.php. //
class PostsController extends BackController {

    // Permet de passer en requête l'index de la page connexion.php. //
    public function executePostsContent(HTTPRequest $request) {

        if (!empty($request->getData('posts_id'))) { 

            $posts = $this->managers->getManagerOf('Posts')->getUniquePosts($request->getData('posts_id'));

            $posts_name = FormatUrl::formatUrl($posts['posts_name']);

            if($posts['posts_statut'] != 5) {

            $this->page->addVar('title', htmlspecialchars($posts['posts_name']));
            $this->page->addVar('layout', 'connectedLayout');
            
            $users = $this->app->user()->user();

            $users_idFK = $users['users_id'];
            $posts_idFK = $request->getData('posts_id');

            $this->page->addVar('users', $users);

            $countLikes = $this->managers->getManagerOf('Votes')->getCountLikes($request->getData('posts_id'));

            $countDislikes = $this->managers->getManagerOf('Votes')->getCountDislikes($request->getData('posts_id'));

            $commentsList = $this->managers->getManagerOf('Comments')->getCommentsListOf($request->getData('posts_id'));

            $this->page->addVar('posts', $posts);
            $this->page->addVar('countLikes', $countLikes);
            $this->page->addVar('countDislikes', $countDislikes);
            $this->page->addVar('commentsList', $commentsList);

            if(!empty($users)) {

                $this->processAddCommentsForm($request);
            }

        } else {
            
            $this->app->httpResponse()->redirect404();
        }

        }

        // Permet la gestion des Votes. //
        if(!empty($users) && $request->method() == 'POST') {
            
            // Permet de verifier si l'utilisateur a déjà voté. //
            $votes = $this->managers->getManagerOf('Votes')->verifiedLikesDislikes($users_idFK, $posts_idFK);
            if($votes) {

                if($request->postExist('like')) {

                    $votes_values = 0;
                    $this->managers->getManagerOf('Votes')->changeVote($votes_values, $users_idFK, $posts_idFK);
                    $this->app->user()->setFlash('Vous avez changé de vote pour like.');
                }
                if($request->postExist('dislike')) {

                    $votes_values = 1;
                    $this->managers->getManagerOf('Votes')->changeVote($votes_values, $users_idFK, $posts_idFK);
                    $this->app->user()->setFlash('Vous avez changé de vote pour dislike.');
                }

                $this->app->httpResponse()->redirect('/Article-'.$request->getData('posts_id').'-'.$posts_name.'');
            } else {

                if($request->postExist('like')) {
        
                    $this->managers->getManagerOf('Votes')->addLikes($users_idFK, $posts_idFK);
                    $this->app->user()->setFlash('Vous avez like.');
                }
                if($request->postExist('dislike')) {

                    $this->managers->getManagerOf('Votes')->addDislikes($users_idFK, $posts_idFK);
                    $this->app->user()->setFlash('Vous avez dislike.');
                }
        
                $this->app->httpResponse()->redirect('/Article-'.$request->getData('posts_id').'-'.$posts_name.'');
            }

        }

    }

    // Permet de voir les posts créer par l'utilisateur connecté. //
    public function executeMyPosts(HTTPRequest $request) {
        
        $this->page->addVar('title', 'Mes-articles');
        $this->page->addVar('layout', 'connectedLayout');

        $users = $this->app->user()->user();

        $this->page->addVar('users', $users);

        $users_idFK = $users['users_id'];

        // Permet de récupérer le manager des posts. //
        $manager = $this->managers->getManagerOf('Posts');

        $listePosts = $manager->getMyPostsList($users_idFK);

        $nombreMyPostsCaracteres = $this->app->config()->get('nombre_my_posts_caracteres');

        foreach ($listePosts as $posts) {

            if (strlen($posts->posts_content()) > $nombreMyPostsCaracteres) {

                $debut = substr($posts->posts_content(), 0, $nombreMyPostsCaracteres);
                $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
                $posts->setPosts_content($debut);
            }
        }

        // Permet d'ajouter la variable $listePosts à la vue. //
        $this->page->addVar('listePosts', $listePosts);
    }

    // Permet de passer en requête l'index de la page connexion.php. //
    public function executeAddPosts(HTTPRequest $request) {

        if (!empty($this->app->user()->user())) { 

            $this->page->addVar('title', 'Créer-Mon-Article');
            $this->page->addVar('layout', 'connectedLayout');
            
            $users = $this->app->user()->user();

            $this->page->addVar('users', $users);

             // Permet de récupérer le manager des posts. //
            $manager = $this->managers->getManagerOf('Posts');

            $this->processAddPostsForm($request);
        } else {
            
            $this->app->httpResponse()->redirect404();
        }

    }

    // Permet de passer en requête l'index de la page connexion.php. //
    public function executeModificationPosts(HTTPRequest $request) {

        $posts = $this->managers->getManagerOf('Posts')->getUniquePosts($request->getData('posts_id'));
        $users = $this->app->user()->user();

        if (!empty($users) && !empty($request->getData('posts_id')) && !empty($posts['users_idFK']) && $posts['users_idFK'] == $users['users_id']) {
    
            $this->page->addVar('title', 'Modification d\'article');
            $this->page->addVar('layout', 'connectedLayout');
            $this->page->addVar('users', $users);

            if($request->postExist('deletedMyPosts')) {

                $this->managers->getManagerOf('Posts')->deletedMyPosts($request->getData('posts_id'));
                $this->app->user()->setFlash('L\'article a bien été supprimé.');
                $this->app->httpResponse()->redirect('/Mon-Compte');
            } else {

                $this->processModificationPostsForm($request);
            }
            
        } else {

            $this->app->user()->setFlash('Vous ne pouvez pas modifier un article qui n\'est pas à vous');
            $this->app->httpResponse()->redirect404();
        }

    }

    // Permet d'executer le form de l'insertion de Posts. //
    public function processAddPostsForm(HTTPRequest $request) {
   
        $users = $this->app->user()->user();
        $users_id = $users['users_id'];

        if(!empty($users)) {

            $categoriesList = $this->managers->getManagerOf('Categories')->getCategoriesList();
            $this->page->addVar('categoriesList', $categoriesList);

            $categories_idFK = $request->postData('categories_idFK');

            $posts = new Posts([
            'posts_name' => $request->postData('posts_name'),
            'posts_content' => $request->postData('posts_content'),
            'posts_image' => $request->postData('posts_image'),
            'posts_video' => $request->postData('posts_video'),
            'users_idFK' => $users_id,
            'categories_idFK' => $categories_idFK,
            ]);

            $formBuilder = new PostsAddFormBuilder($posts);
            $formBuilder->build();

            $form = $formBuilder->form();

            $this->page->addVar('form', $form->createView());
        
            if ($request->method() == 'POST') {

                $post = $this->managers->getManagerOf('Posts')->getPostsName($request->postData('posts_name'));
                if($post) {
                    
                    $this->app->user()->setFlash('Titre de l\'article indisponible ou déjà utilisé');
                } else {

                    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Posts'), $request);
                    if ($formHandler->processAddPosts()) {

                        $this->app->user()->setFlash('L\'article a bien été créé ');
                        $this->app->httpResponse()->redirect('/Mon-Compte');
                    } else {

                        $this->page->addVar('form', $form->createView());
                    }
                }
            }

        } else {

            $this->app->user()->setFlash('Vous devez être connecter pour ajouter un article.');
            $this->app->httpResponse()->redirect404();
        }

    }

    // Permet d'executer le form d'actualisation des Posts. //
    public function processModificationPostsForm(HTTPRequest $request) {

        $post = $this->managers->getManagerOf('Posts')->getPostsName($request->getData('posts_id'));

        $this->page->addVar('post', $post);

        if(!empty($this->app->user()->user())) {

            if ($request->method() == 'POST') {

                $users = $this->app->user()->user();
                $users_id = $users['users_id'];
                
                $posts_name = $post['posts_name'];

                $posts = new Posts([
                'posts_name' => $posts_name,
                'posts_content' => $request->postData('posts_content'),
                'posts_image' => $request->postData('posts_image'),
                'posts_video' => $request->postData('posts_video'),
                'users_idFK' => $users_id,
                ]);

                if ($request->getExist('posts_id')) {

                    $posts->setPosts_id($request->getData('posts_id'));
                }

            } else {

                // Permet de transmettre l'indentifiant du posts et le transmé si on veut la modifier. //
                if ($request->getExist('posts_id')) {
                    
                    $posts = $this->managers->getManagerOf('Posts')->getUniquePosts($request->getData('posts_id'));
                } else {

                    $posts = new Posts;
                }
        }

            $formBuilder = new PostsModificationFormBuilder($posts);
            $formBuilder->build();

            $form = $formBuilder->form();

            $formHandler = new FormHandler($form, $this->managers->getManagerOf('Posts'), $request);

            if ($formHandler->processModificationPosts()) {

                $this->app->user()->setFlash('L\'article a bien été modifiée ');
                $this->app->httpResponse()->redirect('/Mon-Compte');
            }

            $this->page->addVar('form', $form->createView());
        } else {

            $this->app->user()->setFlash('Vous devez être connecter pour modifier un article.');
            $this->app->httpResponse()->redirect404();
        }

}

    public function processAddCommentsForm(HTTPRequest $request) {

        $users = $this->app->user()->user();
        $users_idFK = $users['users_id'];

        if(!empty($request->getData('posts_id'))) {

            $posts_idFK = $request->getData('posts_id');

            $posts = $this->managers->getManagerOf('Posts')->getUniquePosts($request->getData('posts_id'));

            $posts_name = FormatUrl::formatUrl($posts['posts_name']);

            $comments = new Comments([
                'comments_content' => $request->postData('comments_content'),
                'posts_idFK' => $posts_idFK,
                'users_idFK' => $users_idFK,
                ]);

            $formBuilder = new CommentsFormBuilder($comments);
            $formBuilder->build();

            $commentsForm = $formBuilder->form();

            $this->page->addVar('commentsForm', $commentsForm->createView());

            $formHandler = new FormHandler($commentsForm, $this->managers->getManagerOf('Comments'), $request);

            if ($formHandler->processAddComments()) {

                $this->app->user()->setFlash('Le commentaire à bien était ajouté. ');
                $this->app->httpResponse()->redirect('/Article-'.$request->getData('posts_id').'-'.$posts_name.'');
            } else {

                $this->page->addVar('commentsForm', $commentsForm->createView());
            }

        }      

    }

}
