<?php

namespace Framework;

// Permet de demander le "DAO" à utiliser. //
abstract class Manager
{
    protected $dao;

public function __construct($dao)
{
    $this->dao = $dao;
}

}

?>