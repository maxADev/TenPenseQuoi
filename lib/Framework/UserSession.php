<?php

namespace Framework;

session_start();

// Permet de gérer les fonctionalités utilisateur. //
class UserSession
{

    public function user(){
        if(!self::getAttribute('auth')) {
            return false;
        }   return self::getAttribute('auth');
    }

    public function countMyPrivateMessages(){
        if(!self::getAttribute('countPrivateMessages')) {
            return false;
        }   return self::getAttribute('countPrivateMessages');
    }

    public function getAttribute($attr)
    {
        return isset($_SESSION[$attr]) ? $_SESSION[$attr] : null;
    }

    public function getFlash()
    {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);

        return $flash;
    }

    public function hasFlash()
    {
        return isset($_SESSION['flash']);
    }

    public function setAttribute($attr, $value)
    {
        $_SESSION[$attr] = $value;

    }

    public function setFlash($value)
    {
        $_SESSION['flash'] = $value;
    }

    public function isAuthenticated() {

        return isset($_SESSION['auth']);
    }

}

?>