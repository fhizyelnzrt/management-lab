<?php 

require_once 'core/init.php';


//object untuk menambung error agar bisa dikeluarkan
$errors = array();

if ( Input::get('submit') ){

  $validation = new Validation(); //memanggil object validasi
  /**
   * Objeck untuk mengecek validasi username, email, password
   * dan kebutuhan yang harus diisikan dalam form
   */
  $validation = $validation->check(array(
    'username' => array( 'required' => true ),
    //'email'    => array( 'required' => true ),
    'password' => array( 'required' => true )
  ));

  /**
   * pengecekan apakah ada submit atau tidak
   * jika ada makana akan menjalankan syntax ini 
   * yang berfungsi untuk mendaftarkan user baru untuk diinputkan ke database
   * jika tidak sesuai dengan validasi di atas makan akan diinformasikan errornya
   */
  if ( $validation->passed() ){
    
    if ( $user->login_user( Input::get('username'), Input::get('password') ) ) { 
      Session::set('username', Input::get('username'));
      header('Location: index.php');
    } else {
      $errors[] = 'login gagal';
    }
      
  } else {
    $errors = $validation->errors();
  }
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

  <title>Management Lab - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Masuk Duls cuyy!</h1>
                  </div>
                  <form class="user" method="POST" action="login.php">
                    <?php if( !empty($errors) ) {?>
                      <div class="alert alert-danger" role="alert">
                        <?php 
                        foreach ($errors as $error) { ?>
                          <li> <?= $error ?></li>
                        <?php } ?>
                      </div>
                    <?php } ?>
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Login"/>
                  </form>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>
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