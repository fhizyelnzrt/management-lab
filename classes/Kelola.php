<?php 

class Kelola {

  private $_db;

  public function __construct() {
    $this->_db = Database::getInstance();
    
  }

  public function getKategori( $table ){
    $data = $this->_db->get_fields($table);

    //print_r($data);
    //die();
    
    return $data;
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

  public function nampilKategori( $id ){
    $data = $this->_db->kirimKategori( $id );
    
    return $data;
  }

  public function editKategori( $nama, $keterangan, $id ){
    if ( $this->_db->updateKategori($nama, $keterangan, $id)){
      return true;
    } else {
      return false;
    }

  }

  public function hapus( $tabel, $id ){
    if ( $this->_db->hapusfield( $tabel, $id ) ){
      return true;
    } else {
      return false;
    }
  }


}