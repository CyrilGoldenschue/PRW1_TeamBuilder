<?php
namespace TeamBuilder\Model;

use Exception;
use PDO;

class DB
{
    public function __construct()
    {
    }

    private static function getPDO()
    {
        require __DIR__ . "/.env.php";
        return new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $password);
    }

    static function selectMany($req, $array)
    {
        $statement = self::getPDO()->prepare($req);
        $statement->execute($array);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    static function selectOne($req, $array)
    {
        $PDO = self::getPDO();
        $statement = $PDO->prepare($req);
        $statement->execute($array);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    static function insert($req, $array)
    {
        $PDO = self::getPDO();
        $statement = $PDO->prepare($req);
        $statement->execute($array);
        return intval($PDO->lastInsertId());
    }

    static function execute($req, $array)
    {
        $PDO = self::getPDO();
        $statement = $PDO->prepare($req);
        $statement->execute($array);
        return $statement->execute($array);
    }


}