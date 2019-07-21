<?php 

class Input {

  /**
   * Method untuk mengecek POST atau GET
   * jadi ketika yang dikirimkan POST maka akan mengembalikan nilai POST
   * sebaliknya jika mengirimkan GET makan akan dikembalikan dengan GET
   */
  public static function get($name){
    if( isset($_POST[$name]) ){
      return $_POST[$name];
    } else if ( isset($_GET[$name]) ){
      return $_GET[$name];
    }
  }
}

?>