<?php 

class Kelola {

  private $_db;

  public function __construct() {
    $this->_db = Database::getInstance();
    
  }

  public function inKategori( $fields = array() ) {
    if ( $this->_db->insert('kategori', $fields)){

      // print_r($fields);
      // die();
      return true;
    } else {
      return false;
    }


  }

  public function getKategori( $table ){
    $data = $this->_db->get_fields($table);

    //print_r($data);
    //die();
    
    return $data;
    
    // while($row = $data){
    //   return $row;
    // }
  }


}