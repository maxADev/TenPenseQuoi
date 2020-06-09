<?php
namespace Model;

use \Framework\Manager;
use \Entity\Users;

// Lié a la class Manager.php, permet de gérer les requête pour les Users. //
abstract class VotesManager extends Manager {

  /**
   * Méthode retournant la liste des likes.
   * @param $posts_id int l'identifiant du posts ou il faut compter les likes.
   * @return int Le nombre de likes.
  */
  abstract public function getCountLikes($posts_idFK);

  /**
   * Méthode retournant la liste des dislikes.
   * @param $posts_id int l'identifiant du posts ou il faut compter les dislikes.
   * @return int Le nombre de dislikes.
  */
  abstract public function getCountDislikes($posts_idFK);

  /**
   * Méthode premettant l'ajout de like.
   * @param $users_idFK int, $posts_id int l'identifiant users et l'identifiant du posts ou il faut ajouter le like.
   * @return void Retourne rien.
  */
  abstract public function addLikes($users_idFK, $posts_idFK);

  /**
   * Méthode premettant l'ajout de dislike.
   * @param $users_idFK int, $posts_id int l'identifiant users et l'identifiant du posts ou il faut ajouter le like.
   * @return void Retourne rien.
  */
  abstract public function addDislikes($users_idFK, $posts_idFK);


  /**
   * Méthode permettant de vérifier si un users à déja voté.
   * @param $users_idFK int, $posts_id int l'identifiant users et l'identifiant du posts ou il faut ajouter le like.
   * @return boolean Retourne rien.
  */
  abstract public function verifiedLikesDislikes($users_idFK, $posts_idFK);
  


  /**
   * Méthode premettant de changer le vote du users pour eviter de voter plusieurs fois.
   * @param $votes_values int, $users_idFK int, $posts_id int la valeur du vote, l'identifiant users et l'identifiant du posts ou il faut ajouter le like.
   * @return void Retourne rien.
  */
  abstract public function changeVote($votes_values, $users_idFK, $posts_idFK);

}
