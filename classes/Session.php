<?php 

class Session {

  public static function exists($name){
    return (isset($_SESSION[$name])) ? true : false ;
  }

  public static function set($name, $nilai) {
    return $_SESSION[$name] = $nilai;
  }

  public static function get($name) {
    return $_SESSION[$name];
  }


}