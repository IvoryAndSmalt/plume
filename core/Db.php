<?php 
class Db {

    private static $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    protected static function connect(){

        try {
            $dbh = new PDO('mysql:host='.Env::getHost().';dbname='.Env::getDb(),Env::getUser(),Env::getPass(),self::$options);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $dbh;
    }
}