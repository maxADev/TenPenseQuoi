<?php
namespace Model;

use \Entity\Votes;

// Lié à la class VotesManager.php, permet de définir les requête pour la gestion des Votes. //
class VotesManagerPDO extends VotesManager {

public function getCountLikes($posts_idFK) {

    $requete = $this->dao->prepare('SELECT COUNT(*) FROM votes WHERE votes_value = 0 && posts_idFK = :posts_idFK');
    $requete->bindValue(':posts_idFK', (int) $posts_idFK, \PDO::PARAM_INT);
    $requete->execute();

    return $requete->fetchColumn();
}

public function getCountDislikes($posts_idFK) {

    $requete = $this->dao->prepare('SELECT COUNT(*) AS nb_dislikes FROM votes WHERE votes_value = 1 && posts_idFK = :posts_idFK');
    $requete->bindValue(':posts_idFK', (int) $posts_idFK, \PDO::PARAM_INT);
    $requete->execute();

    return $requete->fetchColumn();
}

public function addLikes($users_idFK, $posts_idFK) {

    $vote_value = 0;

    $requete = $this->dao->prepare('INSERT INTO votes SET votes_value = :votes_value, users_idFK = :users_idFK, posts_idFK = :posts_idFK');
    $requete->bindValue(':votes_value', (int) $vote_value, \PDO::PARAM_INT);
    $requete->bindValue(':users_idFK', (int) $users_idFK, \PDO::PARAM_INT);
    $requete->bindValue(':posts_idFK', (int) $posts_idFK, \PDO::PARAM_INT);

    $requete->execute();
}

public function addDislikes($users_idFK, $posts_idFK) {

    $vote_value = 1;

    $requete = $this->dao->prepare('INSERT INTO votes SET votes_value = :votes_value, users_idFK = :users_idFK, posts_idFK = :posts_idFK');
    $requete->bindValue(':votes_value', (int) $vote_value, \PDO::PARAM_INT);
    $requete->bindValue(':users_idFK', (int) $users_idFK, \PDO::PARAM_INT);
    $requete->bindValue(':posts_idFK', (int) $posts_idFK, \PDO::PARAM_INT);

    $requete->execute();
}

public function verifiedLikesDislikes($users_idFK, $posts_idFK) {

    $requete = $this->dao->prepare('SELECT * FROM votes WHERE users_idFK = :users_idFK && posts_idFK = :posts_idFK');
    $requete->bindValue(':users_idFK', (int) $users_idFK, \PDO::PARAM_INT);
    $requete->bindValue(':posts_idFK', (int) $posts_idFK, \PDO::PARAM_INT);

    $requete->execute();

    if ($votes = $requete->fetch()) {

      return $votes;
    }

    return null;

}

public function changeVote($votes_value, $users_idFK, $posts_idFK) {

    $requete = $this->dao->prepare('UPDATE votes SET votes_value = :votes_value WHERE users_idFK = :users_idFK && posts_idFK = :posts_idFK');
    $requete->bindValue(':votes_value', (int) $votes_value, \PDO::PARAM_INT);
    $requete->bindValue(':users_idFK', (int) $users_idFK, \PDO::PARAM_INT);
    $requete->bindValue(':posts_idFK', (int) $posts_idFK, \PDO::PARAM_INT);
        
    $requete->execute();
}

}
