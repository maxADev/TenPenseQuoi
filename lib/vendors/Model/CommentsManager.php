<?php

namespace Model;

use \Framework\Manager;
use \Entity\Comments;

// Lié à la class Manager.php, permet de gérer les Comments. //
abstract class CommentsManager extends Manager
{
    /**
     * Méthode permettant d'ajouter un commentaire.
     * @param $comments Le commentaire à ajouter.
     * @return void
     */
    abstract protected function addComments(Comments $comments);

    /**
     * Méthode permettant d'enregistrer un commentaire.
     * @param $comments Le commentaire à enregistrer
     * @return void
     */
    public function addMyComments(Comments $comments)
    {
        if ($comments->isValid())
        {
            $this->addComments($comments);
        }
        else
        {
            throw new \RuntimeException('Le commentaire doit être validé pour être enregistré');
        }
    }

    /**
     * Méthode permettant de modifier un commentaire.
     * @param $comments Le commentaire à enregistrer.
     * @return void
     */
    public function modificationMyComments(Comments $comments)
    {
        if ($comments->isValid())
        {
            $this->modificationComments($comments);
        }
        else
        {
            throw new \RuntimeException('Le commentaire doit être validé pour être enregistré');
        }
    }

    /**
     * Méthode permettant de modifier un commentaire.
     * @param $comments Le commentaire à enregistrer.
     * @return void
     */
    protected function adminModificationComments(Comments $comments)
    {
        if ($comments->isValid())
        {
            $this->adminModifComments($comments);
        }
        else
        {
            throw new \RuntimeException('Le commentaire doit être validé pour être enregistré');
        }
    }

    /**
     * Méthode permettant de récupérer une liste de commentaires.
     * @param $posts_idFK Le posts sur laquelle on veut récupérer les commentaires.
     * @return array
     */
    abstract public function getCommentsListOf($posts_idFK);

    /**
     * Méthode permettant de modifier un commentaire.
     * @param $comments Le commentaire à modifier.
     * @return void
    */
    abstract protected function modificationComments(Comments $comments);

    /**
     * Méthode permettant a un admin de  modifier un commentaire.
     * @param $comments Le commentaire à modifier.
     * @return void
    */
    abstract protected function adminModifComments(Comments $comments);

    /**
     * Méthode permettant d'obtenir un commentaire spécifique.
     * @param $comments_id L'identifiant du commentaire.
     * @return Comments
    */
    abstract public function getUniqueComments($comments_id);

    /**
     * Méthode renvoyant le nombre de comments créé par le users.
     * @param $users_id l'indentifiant du users.
     * @return int
    */
    abstract public function countMyComments($users_id);

    /**
     * Méthode permettant de supprimer un commentaire.
     * @param $comments_id L'identifiant du commentaire à supprimer.
     * @return void
    */
    abstract public function deletedComments($comments_id);

    /**
     * Méthode permettant de supprimer tous les commentaires liés à une news.
     * @param $comments L'identifiant de au posts dont les commentaires doivent être supprimés.
     * @return void
    */
    abstract public function deleteFromNews($comments);

}

?>