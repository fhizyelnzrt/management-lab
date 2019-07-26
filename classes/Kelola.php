<?php 

class Kelola {

  private $_db;

  public function __construct() {
    $this->_db = Database::getInstance();
    
  }

  public function getTBarang(){
    $data = $this->_db->get_fieldsBarang();

    //print_r($data);
    //die();
    
    return $data;
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

  public function nampilData( $tabel, $id ){
    $data = $this->_db->dataEdit( $tabel, $id );
    
    return $data;
  }

  public function editKategori( $nama, $keterangan, $id ){
    if ( $this->_db->updateKategori($nama, $keterangan, $id)){
      return true;
    } else {
      return false;
    }
  }

  public function inBarang( $fields = array() ) {
    if ( $this->_db->insert('barang', $fields)){

      // print_r($fields);
      // die();
      return true;
    } else {
      return false;
    }
  }

  public function editBarang($nama, $jmlh, $id_kategori, $keterangan, $id ){
    if ( $this->_db->updateBarang($nama, $jmlh, $id_kategori, $keterangan, $id )){
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