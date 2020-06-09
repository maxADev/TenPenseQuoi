<?php
namespace Model;

use \Framework\Manager;
use \Entity\Friends;

// Lié a la class Manager.php, permet de gérer les requête pour les Friends. //
abstract class FriendsManager extends Manager {

    /**
     * Méthode permettant de faire une demande d'amis.
     * @param $friends_request_idFK int, $friends_receive int L'identifiant du users qui envoie la demande et celui qui la reçoit.
     * @return void Rertourne rien.
    */
    abstract public function addFriends($friends_request_idFK, $friends_receive);

    /**
     * Méthode permettant d'obtenire les friends request receive.
     * @param $friends_receive l'identifiant du users.
     * @return array Retourne la liste des friends request receive.
    */
    abstract public function myFriendsRequestReceive($friends_receive);

    /**
     * Méthode permettant d'accepter une friends request receive.
     * @param $friends_request_idFK int, $friends_receive int L'identifiant du users qui envoie la demande et celui qui la reçoit.
     * @return void Retourne rien.
    */
    abstract public function accepteFriendsRequestReceive($friends_receive, $friends_request_idFK);

    /**
     * Méthode permettant d'afficher la liste d'amis.
     * @param $friends_request_idFK int L'identifiant du users.
     * @return array Retourne la liste de friends request.
    */
    abstract public function myFriendsListRequest($friends_request_idFK);

    /**
     * Méthode permettant d'afficher la liste d'amis.
     * @param $friends_receive_idFK int L'identifiant du users.
     * @return array Retourne la liste de friends receive.
    */
    abstract public function myFriendsListReceive($friends_receive_idFK);

    /**
     * Méthode permettant de supprimer un amis de la liste.
     * @param $friends_request_idFK int L'identifiant du users.
     * @return void Retourne rien.
    */
    abstract public function deletedFriends($friends_request_idFK);

}
