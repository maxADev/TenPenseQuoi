<?php
namespace Model;

use \Framework\Manager;
use \Entity\Categories;

// Lié a la class Manager.php, permet de gérer les requête pour les Categories. //
abstract class CategoriesManager extends Manager {

    /**
   * Méthode retournant la liste des categories.
   * @return array La liste des categories. Chaque entrée est une instance de Categories.
   */
  abstract public function getCategoriesList();

  /**
   * Méthode retournant le nom de la categories.
   * @return array Le nom de la categories.
  */
  abstract public function getCategoriesName($categories_id);

}