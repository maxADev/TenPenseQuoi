<?php
namespace Model;

use \Framework\Manager;
use \Entity\Posts;

// Lié a la class Manager.php, permet de gérer les requête pour les Posts. //
abstract class PostsManager extends Manager
{
  /**
   * Méthode retournant une liste de posts demandée.
   * @param $nombre_posts int Le nombre de posts a afficher.
   * @return array La liste des posts. Chaque entrée est une instance de Posts.
   */
  abstract public function getPostsList($nombre_posts);

  /**
   * Méthode retournant une liste des posts.
   * @return array La liste des posts. Chaque entrée est une instance de Posts.
   */
  abstract public function getAllPostsList();

  /**
   * Méthode retournant une liste des posts non verifier pour la publication.
   * @return array La liste des posts. Chaque entrée est une instance de Posts.
   */
  abstract public function getNotVerifiedPostsList();

  /**
   * Méthode retournant une liste des posts supprimé par les utilisateurs.
   * @return array La liste des posts. Chaque entrée est une instance de Posts.
   */
  abstract public function getDeletedPostsList();

  /**
   * Méthode retournant une liste des posts trié par categories.
   * @return array La liste des posts. Chaque entrée est une instance de Posts.
   */
  abstract public function getPostsListWithCategories($categories_idFK);

  /**
   * Méthode retournant un posts précise.
   * @param $id int L'identifiant de la news à récupérer
   * @return Posts La posts demandée
   */
  abstract public function getUniquePosts($posts_id);

  /** Méthode retournant un le nom du posts.
   * @param $posts_id L'indentifiant du posts à récupérer.
   * @return $posts_name Le nom du posts.
  */
  abstract public function getPostsName($posts_id);

  /**
   * Méthode renvoyant le nombre de posts total.
   * $users_id l'indentifiant du users.
   * @return int
  */
  abstract public function countPosts();

  /**
   * Méthode renvoyant le nombre de posts créé par le users.
   * @param $users_id l'indentifiant du users.
   * @return int
  */
  abstract public function countMyPosts($users_id);

  /**
   * Méthode retournant une liste de posts demandée.
   * @param $users_idFK L'indentifiant du users pour obtenire la liste des posts.
   * @return array La liste des posts. Chaque entrée est une instance de Posts.
   */
  abstract public function getMyPostsList($users_idFK);

  /**
   * Méthode permettant d'ajouter une news.
   * @param $posts Posts La news à ajouter
   * @return void
   */
  abstract protected function addPosts(Posts $posts);
  
  /**
   * Méthode permettant d'enregistrer un posts.
   * @param $posts Posts le posts à enregistrer
   * @see self::modificationPOsts()
   * @return void
   */
  public function modificationMyPosts(Posts $posts)
  {
    if ($posts->isValid())
    {
      $this->modificationPosts($posts);
    }
    else
    {
      throw new \RuntimeException('La news doit être validée pour être enregistrée');
    }
  }

  public function addMyPosts(Posts $posts)
  {
    if ($posts->isValid())
    {
      $this->addPosts($posts);
    }
    else
    {
      throw new \RuntimeException('La news doit être validée pour être enregistrée');
    }
  }

  /**
   * Méthode permettant d'enregistrer un posts.
   * @param $posts Posts le posts à enregistrer
   * @see self::modificationPOsts()
   * @return void
   */
  public function adminModificationPosts(Posts $posts)
  {
    if ($posts->isValid())
    {
      $this->adminModifPosts($posts);
    }
    else
    {
      throw new \RuntimeException('Le posts doit être validée pour être enregistrée');
    }
  }

  /**
   * Méthode permettant de modifier un posts.
   * @param $posts posts à modifier.
   * @return void
   */
  abstract protected function modificationPosts(Posts $posts);

  /**
   * Méthode permettant a un admin de modifier un posts.
   * @param $posts posts à modifier.
   * @return void
   */
  abstract protected function adminModifPosts(Posts $posts);

  /**
   * Méthode permettant a l'utilsiteurs de supprimer un posts.
   * @param $psots_id int L'identifiant du posts à supprimer.
   * @return void
   */
  abstract public function deletedMyPosts($posts_id);

}

?>