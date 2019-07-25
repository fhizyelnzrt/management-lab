<?php 

class Database {

  private static $INSTANCE = null;
  private $mysqli,
          $HOST = 'localhost',
          $USER = 'root',
          $PASS = '',
          $DBNAME = 'manajemenlab';

  /*  
  * method untuk mengisi variable $mysqli ketika class ini dijalankan
  */
  function __construct(){
    $this->mysqli = new mysqli( $this->HOST, $this->USER, $this->PASS, $this->DBNAME);
    if (mysqli_connect_error()){
      die('gagal cuyy' . mysqli_connect_error() . '</br>');
    }
  }

  /* Method Intance
  * berfungsi untuk koneksi tidak terjadi double kedatabase
  */
  public static function getInstance(){
    if( !isset(self::$INSTANCE) ) {
      self::$INSTANCE = new Database();
    }

    return self::$INSTANCE;
  }

  /* Method Insert
  * untuk memasukan kedalam database dengan pemanggilan method ini saja
  * hanya memanggil insert('tabelnya', nilai yang dimasukan kedalam array )
  * contohnya ada di Users.php
  */
  public function insert($table, $fields = array()){

    //mengambil kolom dari key array $fields yang dioper dari Users.php
    $column = implode(", ", array_keys($fields));

    //menggail nilai dari values array %fields
    $valueArrays = array();
    $i = 0;
    foreach($fields as $key=>$values){
      if( is_int($values) ){
        $valueArrays[$i] = $this->escape($values) ;
      } else {
        $valueArrays[$i] = "'" . $this->escape($values) . "'";
      }

      $i++;
    }

    //menggambungkan nilai array $valuesArrays yang tadi baru di ekstra
    //yang hanya saja menggail nilai Values array tersebut
    $values = implode(", ", $valueArrays);

    //query untuk menjalankan insert pada database
    $query = "INSERT INTO $table ($column) VALUES ($values)";
    
    //die($query);

    //mengoper nilai ke method run_query
    return $this->run_query($query, 'Masalah Saat Memasukan Data');
  }

  public function get_info($table, $column, $value) {
    if ( !is_int($value) )
      $value = "'". $value ."'";

    $query = "SELECT * FROM $table WHERE $column = $value";
    $result = $this->mysqli->query($query);

    while($row = $result->fetch_assoc() ){
      return $row;
    }

  }

  public function get_fields($table){
    $query  = "SELECT * FROM $table";
    $result = $this->mysqli->query($query);
    //$hasil = $result->fetch_all();
    while($row = $result->fetch_assoc()  ) {
       $data[] = $row;
    }
    return $data;
  }

  public function dataEdit( $tabel, $id ){
    $query = "SELECT * FROM $tabel WHERE id=$id";
    $result = $this->mysqli->query($query);

    while($row = $result->fetch_assoc() ){
     $data[] = $row;
    }

    return $data;
  }

  public function updateKategori($nama, $keterangan, $id ){

    $query = "UPDATE kategori SET nama = '$nama', keterangan = '$keterangan' WHERE id='$id'";

    //print_r($fields);
    //die($query);
    return $this->run_query($query, 'Udah Masuk tapi boong');
  }

  public function updateBarang($nama, $jmlh, $id_kategori, $keterangan, $id ){

    $query = "UPDATE barang SET nmbarang = '$nama', jmlh = $jmlh, id_ketegori = $id_kategori, keterangan = '$keterangan' WHERE id='$id'";

    //print_r($query);
    //die($query);
    return $this->run_query($query, 'Udah Masuk tapi boong');
  }

  public function hapusfield( $tabel, $id ){
    $query = "DELETE FROM $tabel WHERE id='$id'";

    return $this->run_query($query, 'Data blm kehapus nihh...');
  }

  /**
   * method untuk menjalankan query saja dan menampilkan pesan kesalahan dalam development
   */
  public function run_query($query, $msg){
    //pengecekan query sukes atau tidak
    if( $this->mysqli->query($query)) return true;
    //method error itu hanya digunakan untuk develop karna akan memunculkan pesan error
    //untuk programmer agar mudah dipahami
    else die($msg . $this->mysqli->error);
  }

  /**
   * method yang berfungsi untuk keamaanan ketika ada inject yang dilakukan dari form 
   * mencegah sql injection
   */
  public function escape($name){
    return $this->mysqli->real_escape_string($name);
  }




}
?>