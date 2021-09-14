<?php

class DB
{
    private static function getPDO()
    {
        require "../.env.php";
        return new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $user, $password);
    }

    static function selectMany($req, $array){
        $statement = self::getPDO()->prepare($req);
        return $statement->execute($array);
    }

    static function selectOne($req, $array){
        $PDO = self::getPDO();
        $statement = $PDO->prepare($req);
        $statement->execute($array);
        return $statement->fetchColumn(PDO::FETCH_ASSOC);
    }

    static function insert($req, $array){
        $PDO = self::getPDO();
        $statement = $PDO->prepare($req);
        $statement->execute($array);
        return intval($PDO->lastInsertId());
    }

    static function execute($req, $array){
        $PDO = self::getPDO();
        $statement = $PDO->prepare($req);
        $statement->execute($array);
    }

    static function delete($req, $array){
        $PDO = self::getPDO();
        $statement = $PDO->prepare($req);
        $statement->execute($array);
        return DB::selectMany("SELECT * FROM roles", []);
    }





}