<?php
namespace Model;

use \Entity\Categories;

// Lié à la class CategoriesManager.php, permet de définir les requête pour la gestion des Categories. //
class CategoriesManagerPDO extends CategoriesManager {

    public function getCategoriesList() {

    $requete = $this->dao->prepare("SELECT * FROM categories ORDER BY categories_id");
    $requete->execute();
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Categories');

    $categoriesList = $requete->fetchAll();

    return $categoriesList;
    }

    public function getCategoriesName($categories_id) {
    
        $requete = $this->dao->prepare('SELECT categories_name FROM categories WHERE categories_id = :categories_id');
        $requete->bindValue(':categories_id', (int) $categories_id, \PDO::PARAM_INT);
        $requete->execute();
    
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Categories');
    
        if ($categories_name = $requete->fetch())
        {
    
          return $categories_name;
        }
    
        return null;
      }
}