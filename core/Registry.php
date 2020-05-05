<?php

class Registry {

  static public function routes(){
    $decoded = (array) json_decode(file_get_contents("core/resources/routes.json"));
    return $decoded;
  }
}