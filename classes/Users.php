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

  public function login_user($username, $password) {

    $data = $this->_db->get_info('users', 'username', $username);
    // print_r($data);
    // die();

    if( password_verify($password, $data['password']) )
      return true;
    else return false;
  }

  public function cek_nama($username) {
    $data = $this->_db->get_info('users', 'username', $username);
     
    // print_r($data);
    // die();

    if($data){
     return true;
    } else {
      return false;
    }
  }
}
?>