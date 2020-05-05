<?php

abstract class Env {

    private const ENV_FILE = "./core/resources/env.json";
    private const LOCAL_ENV_FILE = "./core/resources/env.local.json";

    private static function getEnv(){
      if(file_exists(self::LOCAL_ENV_FILE)){
        return json_decode(file_get_contents(self::LOCAL_ENV_FILE));
      }
      else{
        return json_decode(file_get_contents(self::ENV_FILE));
      }
    }

    public static function getHost(){
        return self::getEnv()->host;
    }
    public static function getDb(){
        return self::getEnv()->dbname . ";" . self::getEnv()->charset;
    }
    public static function getUser(){
        return self::getEnv()->user;
    }
    public static function getPass(){
        return self::getEnv()->pass;
    }
    
    public static function baseUrl(){
      return self::getEnv()->base_url;
    }
}