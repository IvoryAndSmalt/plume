<?php

class HomeModel extends Db {

    private $dbh;

    public function __construct(){
        $this->dbh = Db::connect();
    }
}