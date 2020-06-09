<?php

namespace Model;

use \Entity\Comments;

// Lié à la class CommentsManager.php, permet la gestion des requête pour les Comments. //
class CommentsManagerPDO extends CommentsManager
{
    protected function addComments(Comments $comments) {

        $requete = $this->dao->prepare('INSERT INTO comments SET comments_content = :comments_content, users_idFK = :users_idFK,  posts_idFK = :posts_idFK, comments_statut = 0, comments_creation_date = NOW(), comments_modification_date = NOW()');
        $requete->bindValue(':comments_content', $comments->comments_content());
        $requete->bindValue(':users_idFK', $comments->users_idFK(), \PDO::PARAM_INT);
        $requete->bindValue(':posts_idFK', $comments->posts_idFK(), \PDO::PARAM_INT);

        $requete->execute();

        $comments->setId($this->dao->lastInsertId());
    }

    public function getCommentsListOf($posts_idFK) {

        if (!ctype_digit($posts_idFK)) {

            throw new \InvalidArgumentException('L\'identifiant du posts passé doit être un nombre entier valide');
        }

        $requete = $this->dao->prepare('SELECT * FROM comments LEFT JOIN users ON comments.users_idFK  = users_id WHERE posts_idFK = :posts_idFK && comments_statut != 5 ORDER BY comments_creation_date ASC');
        $requete->bindValue(':posts_idFK', $posts_idFK, \PDO::PARAM_INT);
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comments');

        $commentsList = $requete->fetchAll();

        foreach ($commentsList as $comments) {

            $comments->setComments_creation_date(new \DateTime($comments->comments_creation_date()));
            $comments->setComments_modification_date(new \DateTime($comments->comments_modification_date()));
        }
        return $commentsList;
    }

    protected function modificationComments(Comments $comments) {

        $requete = $this->dao->prepare('UPDATE comments SET comments_content = :comments_content, users_idFK = :users_idFK, posts_idFK = :posts_idFK, comments_modification_date = NOW() WHERE comments_id = :comments_id');
        $requete->bindValue(':comments_content', $comments->comments_content());
        $requete->bindValue(':users_idFK', $comments->users_idFK());
        $requete->bindValue(':posts_idFK', $comments->posts_idFK());
        $requete->bindValue(':comments_id', (int) $comments->comments_id(), \PDO::PARAM_INT);

        $requete->execute();
    }

    protected function adminModifComments(Comments $comments) {

        $requete = $this->dao->prepare('UPDATE comments SET  comments_content = :comments_content, comments_statut = :comments_statut, comments_note = :comments_note, comments_modification_date = NOW() WHERE comments_id = :comments_id');

        $requete->bindValue(':comments_content', $comments->comments_content());
        $requete->bindValue(':comments_statut', $comments->comments_statut());
        $requete->bindValue(':comments_note', $comments->comments_note());
        $requete->bindValue(':users_idFK', $comments->users_idFK());
        $requete->bindValue(':posts_idFK', $comments->posts_idFK());
        $requete->bindValue(':comments_id', (int) $comments->comments_id(), \PDO::PARAM_INT);

        $requete->execute();
    }

    public function getUniqueComments($comments_id)
    {
        $requete = $this->dao->prepare('SELECT * FROM comments WHERE comments_id = :comments_id');
        $requete->bindValue(':comments_id', (int) $comments_id, \PDO::PARAM_INT);
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comments');

        return $requete->fetch();
    }

    public function deletedComments($comments_id) {

        $this->dao->exec('DELETE FROM comments WHERE comments_id = '.(int) $comments_id);
    }

    public function deleteFromNews($news)
    {
        $this->dao->exec('DELETE FROM comments WHERE news = '.(int) $news);
    }

    public function countMyComments($users_id) {
    
        $requete = $this->dao->prepare('SELECT COUNT(comments_id) FROM comments WHERE users_idFK = :users_id');
        $requete->bindValue(':users_id', $users_id);
        $requete->execute();

        return $requete->fetchColumn();
    }

}

?>