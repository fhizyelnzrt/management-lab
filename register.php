<?php 
require_once 'core/init.php';

  if ( Session::exists('username') ) {
    header('Location: index.php');
  }

//object untuk menambung error agar bisa dikeluarkan
$errors = array();

if ( Input::get('submit') ){

  $validation = new Validation(); //memanggil object validasi
  /**
   * Objeck untuk mengecek validasi username, email, password
   * dan kebutuhan yang harus diisikan dalam form
   */
  $validation = $validation->check(array(
    'username' => array(
                    'required' => true,
                    'min'      => 3,
                    'max'      => 50,
                  ),
    'email'    => array(
                    'required' => true,
                    'min'      => 10,
                  ),
    'password' => array(
                    'required' => true,
                    'min'      => 4,
                  ),
  ));

  /**
   * pengecekan apakah ada submit atau tidak
   * jika ada makana akan menjalankan syntax ini 
   * yang berfungsi untuk mendaftarkan user baru untuk diinputkan ke database
   * jika tidak sesuai dengan validasi di atas makan akan diinformasikan errornya
   */
  if ( $validation->passed() ){
    $user->reqister_user(array(
      'username' => Input::get('username'),
      'email' => Input::get('email'),
      'password' => password_hash(Input::get('password'), PASSWORD_DEFAULT)
    ));

    Session::set('username', Input::get('username'));
    header('Location: index.php');

  } else {
    $errors = $validation->errors();
  }
  //var_dump(Input::get('username'));
  //die();
  // echo "masuk";
}

  ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Lab Management - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row justify-content-center">
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="POST" action="register.php">
                <?php if( !empty($errors) ) {?>
                  <div class="alert alert-danger" role="alert">
                    <?php 
                    foreach ($errors as $error) { ?>
                      <li> <?= $error ?></li>
                    <?php } ?>
                  </div>
                <?php } ?>
                <div class="form-group row">
                  <div class="col-sm">
                    <input type="text" name="username" class="form-control form-control-user" placeholder="Username">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm">
                    <input type="text" name="email" class="form-control form-control-user" placeholder="Email">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                  </div>
                  <!-- <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" placeholder="Repeat Password">
                  </div> -->
                </div>
                <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="submit">
              </form>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
