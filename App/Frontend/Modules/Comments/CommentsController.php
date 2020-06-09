<?php

namespace App\Frontend\Modules\Comments;

use \Framework\BackController;
use \Framework\HTTPRequest;
use \Entity\Comments;
use \FormBuilder\CommentsFormBuilder;
use \Framework\FormHandler;

// Lié a la classe BackController.php. //
class CommentsController extends BackController {

    public function executeModificationComments(HTTPRequest $request) {

        $comments = $this->managers->getManagerOf('Comments')->getUniqueComments($request->getData('comments_id'));
        $users = $this->app->user()->user();

        if (!empty($users) && $comments['users_idFK'] == $users['users_id']) {

            $this->page->addVar('title', 'Modification de commentaire');
            $this->page->addVar('layout', 'connectedLayout');
            $this->page->addVar('users', $users);

            $this->processModificationCommentsForm($request);
        } else {

            $this->app->user()->setFlash('Vous ne pouvez pas modifier un commentaire qui n\'est pas à vous');
            $this->app->httpResponse()->redirect404();
        }
    }

    public function executeDeletedComments(HTTPRequest $request) {

        $posts = $this->managers->getManagerOf('Comments')->getUniqueComments($request->getData('comments_id'));
        $posts_idFK = $posts['posts_idFK'];

        $users = $this->app->user()->user();

        if (!empty($users) && !empty($request->getData('comments_id'))) {

            $this->managers->getManagerOf('Comments')->deletedComments($request->getData('comments_id'));
            $this->app->user()->setFlash('Commentaire supprimé');
            $this->app->httpResponse()->redirect('/Article-'.$posts_idFK.'.html');

        } else {

            $this->app->user()->setFlash('Vous ne pouvez pas supprimer un commentaire qui n\'est pas à vous');
            $this->app->httpResponse()->redirect404();
        }
    }

    public function processModificationCommentsForm(HTTPRequest $request) {

        $users = $this->app->user()->user();
        $users_idFK = $users['users_id'];

        if (!empty($users)) {

            $posts = $this->managers->getManagerOf('Comments')->getUniqueComments($request->getData('comments_id'));
            $posts_idFK = $posts['posts_idFK'];

            if ($request->method() == 'POST') {

                $comments = new Comments([
                    'comments_content' => $request->postData('comments_content'),
                    'users_idFK' => $users_idFK,
                    'posts_idFK' => $posts_idFK,
                    ]);

                if ($request->getExist('comments_id')) {

                    $comments->setComments_id($request->getData('comments_id'));
                }

            } else {
    
                $comments = $this->managers->getManagerOf('Comments')->getUniqueComments($request->getData('comments_id'));
            }

            $formBuilder = new CommentsFormBuilder($comments);
            $formBuilder->build();

            $commentsForm = $formBuilder->form();

            $this->page->addVar('commentsForm', $commentsForm->createView());

            $formHandler = new FormHandler($commentsForm, $this->managers->getManagerOf('Comments'), $request);

            if ($formHandler->processModificationComments()) {

                $this->app->user()->setFlash('Le commentaire à bien était modifié. ');
                $this->app->httpResponse()->redirect('/Article-'.$posts_idFK.'.html');
            
            } else {

                $this->page->addVar('commentsForm', $commentsForm->createView());
            }

        } else {

            $this->app->user()->setFlash('Vous ne pouvez pas modifier un commentaire qui n\'est pas à vous');
            $this->app->httpResponse()->redirect404();
        }
    }

}
