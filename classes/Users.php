<?php 

class Users {

  private $_db;

  /**
   * method yang otomatis jalan ketika class ini dipanggil
   * kemudian akan mengisi variabel private class $_db yang tadinya kosong
   * agar bisa digunakan oleh method lain
   */
  public function __construct(){
    $this->_db = Database::getInstance();
  }

  /**
   * method untuk memaskan data
   */
  public function reqister_user($fields = array()){
    if( $this->_db->insert('users', $fields)) {
      return true;
    } else {
      return false;
    }
  }
}
?>