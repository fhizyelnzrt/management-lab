<?php 

session_start();

//load kelas
spl_autoload_register( function ($class) {
  require_once 'classes/' . $class . '.php';
});

// untuk membuat objek $user dapat dipakai dimana saja
$user = new Users();
$kelola = new Kelola();