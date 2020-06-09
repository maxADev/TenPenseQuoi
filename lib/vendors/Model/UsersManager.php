<?php
namespace Model;

use \Framework\Manager;
use \Entity\Users;

// Lié a la class Manager.php, permet de gérer les requête pour les Users. //
abstract class UsersManager extends Manager
{
  /**
   * Méthode retournant une liste de users demandée
   * @return array La liste des users. Chaque entrée est une instance de Users.
  */
  abstract public function getUsersList();

  /**
   * Méthode retournant un Users demandée.
   * @param $users_id int L'identifiant du Users à récupérer.
   * @return Users Le Users demandée.
   */
  abstract public function getUniqueUsers($users_id);

  /**
   * Méthode renvoyant le nombre de Users total.
   * @return int
   */
  abstract public function count();

  /**
   * Méthode permettant de créer un Users.
   * @param $Users Users le Users à créer.
   * @see self::addRegistrationUsers().
   * @return void Retourne rien.
  */
  public function registrationUsers(Users $users) {

    if ($users->isValid()) {

      $this->addRegistrationUsers($users);
    } else {

      throw new \RuntimeException('La Users doit être validée pour être enregistrée');
    }
  }

  /**
   * Méthode permettant de modifier le password users.
   * @param Users $users le users a modifier.
   * @see self::modificationUsersPassword().
   * @return void Retourne rien.
  */
  public function modificationMyUsersPassword(Users $users) {

    if (!empty($users['users_email']) && !empty($users['users_reset_token'])) {

      $this->modificationUsersPassword($users);
    } else {

      throw new \RuntimeException('La Users doit être validée pour être modifier.');
    }
  }

  /**
   * Méthode permettant de modifier le password users.
   * @param Users $users le users a modifier.
   * @see self::newUsersPassword().
   * @return void Retourne rien.
  */
  public function confirmationModificationUsersPassword(Users $users) {

    if (!empty($users['users_id']) && !empty($users['users_password']) && !empty($users['users_reset_token'])) {

      $this->newUsersPassword($users);
    } else {

      throw new \RuntimeException('La Users doit être validée pour être modifier.');
    }
  }

  /**
   * Méthode permettant de modifier un Users.
   * @param $Users Users le Users à modifier.
   * @see self::adminModifUsers().
   * @return void Retourne rien.
  */
  public function adminModificationUsers(Users $users) {

    if (!empty($users['users_id'])) {

      $this->adminModifUsers($users);
    } else {

      throw new \RuntimeException('La Users doit être validée pour être enregistrée');
    }
  }

  /**
   * Méthode permettant de créer un users.
   * @param $users le users à créer.
   * @return void Retourne rien.
  */
  abstract public function addRegistrationUsers(Users $users);

   /**
   * Méthode permettant de modifier le users password.
   * @param $users le users a modifier.
   * @return void Retourne rien.
  */
  abstract public function modificationUsersPassword(Users $users);

  /**
   * Méthode permettant de modifier le users password.
   * @param $users le users a modifier.
   * @return void Retourne rien.
  */
  abstract public function newUsersPassword(Users $users);

  /**
   * Méthode permettant vérifier que le users_name est disponible.
   * @param $users_name le users_name à chercher.
   * @return boolean.
  */
  abstract public function getUsersName($users_name);

  /**
   * Méthode permettant vérifier que le users_email est disponible.
   * @param $users_email le users_email à chercher.
   * @return boolean.
  */
  abstract public function getUsersEmail($users_email);

  /**
   * Méthode permettant la connexion d'un Users.
   * @param $users_name ou $users_email Le nom ou l'adresse mail du Users.
   * @param $users_password Le mot de passe du Users.
  */
  abstract public function login($users_name, $users_password);

  /**
   * Méthode permettant d'actualiser les informations du users pour valdier l'inscription du users.
   * @param $users_id l'identifiant du users.
   * @return boolean.
  */
  abstract public function confirmationRegistration($users_id);

  /**
     * Méthode retournant un users.
     * @param $users_id int L'identifiant du users à récupérer.
     * @return Profiles Le profiles du users demandé.
    */
    abstract public function getUsersProfiles($users_id);

    /**
   * Méthode permettant de modifier le users.
   * @param $users le users a modifier.
   * @return void Retourne rien.
  */
  abstract public function adminModifUsers(Users $users);

}