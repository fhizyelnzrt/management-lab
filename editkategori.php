<?php 

require_once 'core/init.php';

  /**
   * Dokuemntasi tidak jauh berbeda pada file register.php
   * hanya saja ini di cocokan untuk inputan kategori
   */
  $errors = array();

  if ( Input::get('id') ){
    $kelola->nampilKategori( Input::get('id') );
  } 

  if ( Input::get('submit') ) {

    $validation = new Validation();
    $validation = $validation->check( array(
      'nmbarang'        => array(
                        'required' => true,
                        'min'      => 3,
                      ),
      'keterangan'  => array(
                        'required' => true,
                        'min'      => 5,
                      ),
    ));
    if( $validation->passed() ) {

      $kelola->editKategori( 
        Input::get('nmbarang'),
        Input::get('keterangan'),
        Input::get('id')
      );
    } else {
      $errors = $validation->errors();
    }
  }

include 'template/header.php';
?>

  <!-- Page Wrapper -->
  <div id="wrapper">

<?php include 'template/menu.php' ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include 'template/nav-atas.php' ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Kelola Ketegori</h1>

          <div class="row">
            <div class="col-lg-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                <?php 
                    if ( Input::get('id') ){
                      $hasil = $kelola->nampilKategori( Input::get('id') );
                      // echo "<pre>";
                      // print_r($hasil);
                      // echo "</pre>";
                      //die();
                      foreach($hasil as $index => $data) {
                  ?>
                  <h6 class="m-0 font-weight-bold text-primary"> Edit Kategori <?= $data['nama'] ?></h6>
                </div>
                <div class="card-body">
                <form method="POST" action="editkategori.php">
                  <?php if( !empty($errors) ) {?>
                    <div class="alert alert-danger" role="alert">
                      <?php 
                      foreach ($errors as $error) { ?>
                        <li> <?= $error ?></li>
                      <?php } ?>
                    </div>
                  <?php } ?>
                  
                  
                  <div class="form-group" >
                    <label>Nama Kategori</label>
                    <input type="hidden" name="id" class="form-control" placeholder="id" value="<?= $data['id'] ?>">
                    <input type="text" name="nmbarang" class="form-control" placeholder="Nama Barang" value="<?= $data['nama'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan" placeholder="Keterangan" rows="3" ><?= $data['keterangan'] ?></textarea>
                  </div>
                  <?php 
                      }
                    }
                  ?>
                  <input type="submit" name="submit" class="btn btn-primary" value="Update">
                  <a href="kelolakategori.php"><button type="button" class="btn btn-primary">Kembali</button></a>
                </form>
                </div>
              </div>
            </div>
                </div>
              </div>
              </div>
            </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<?php 
include 'template/footer.php';
?>
