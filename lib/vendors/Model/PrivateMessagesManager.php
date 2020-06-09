<?php
namespace Model;

use \Framework\Manager;
use \Entity\PrivateMessages;

// Lié a la class Manager.php, permet de gérer les requête pour les Posts. //
abstract class PrivateMessagesManager extends Manager
{
  /**
   * Méthode retournant une liste de privates messages demandée.
   * @param $users_messages_receive L'indentifiant du users pour obtenire la liste des private messages.
   * @return array La liste des private messages. Chaque entrée est une instance de PrivateMessages.
  */
  abstract public function getMyPrivateMessagesList($users_messages_receive);

  /**
   * Méthode permettant d'enregistrer un private messages.
   * @param $users_messages_receive int, $private_message_id int L'indentifiant du users et du private messages pour actualiser le private messages.
   * @return void Retourne rien.
  */
  abstract public function privateMessagesSave($users_messages_receive, $private_message_id);

  /**
   * Méthode retournant une liste de privates messages enregistré.
   * @param $users_messages_receive int L'indentifiant du users pour obtenire la liste des private messages.
   * @return array La liste des private messages. Chaque entrée est une instance de PrivateMessages.
  */
  abstract public function getMySavePrivateMessagesList($users_messages_receive);

  /**
   * Méthode permettant de supprimer un private messages.
   * @param $users_messages_receive int, $private_message_id int L'indentifiant du users et du private messages pour le supprimer.
   * @return void Retourne rien.
  */
  abstract public function privateMessagesDeleted($users_messages_receive, $private_message_id);

  /**
   * Méthode permettant de compter le nombre de private messages.
   * @param $users_messages_receive int, L'indentifiant du users pour compter les private messages.
   * @return int Le nombre de private messages.
  */
  abstract public function countMyPrivateMessages($users_messages_receive);

  /**
   * Méthode permettant d'obtenire l'identifiant du users à qui envoyer le private messages.
   * @param $users_name le nom du users.
   * @return int Retourne l'indentifiant.
  */
  abstract public function privateMessagesReceive($users_name);

  /**
   * Méthode permettant d'envoyer un private messages.
   * @param $private_messages le private messages à envoyer.
   * @return void Retourne rien.
  */
  abstract public function addMyPrivateMessages(PrivateMessages $private_messages);

}
