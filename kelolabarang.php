<?php 

require_once 'core/init.php';

  /**
   * Dokuemntasi tidak jauh berbeda pada file register.php
   * hanya saja ini di cocokan untuk inputan kategori
   */
  $errors = array();

  if ( Input::get('hapus') ){
    $kelola->hapus('barang', Input::get('hapus'));
  }

  if ( Input::get('submit') ) {

    $validation = new Validation();
    $validation = $validation->check( array(
      'nmbarang'    => array(
                        'required' => true,
                        'min'      => 3,
                        ),
      'jmlh'        => array(
                          'required' => true,
                          'min'      => 1,
                        ),
      'id_kategori'    => array(
                          'required' => true,
                        ),
      'keterangan'  => array(
                        'required' => true,
                        'min'      => 5,
                        ),
    ));
    if( $validation->passed() ) {

      $kelola->inBarang( array(
        'nmbarang'   => Input::get('nmbarang'),
        'jmlh'   => Input::get('jmlh'),
        'id_ketegori'   => Input::get('id_kategori'),
        'keterangan' => Input::get('keterangan')
      ));
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
          <h1 class="h3 mb-4 text-gray-800">Kelola Barang</h1>

          <div class="row">
            <div class="col-lg-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"> Input</h6>
                </div>
                <div class="card-body">
                <form method="POST" action="kelolabarang.php" >
                <?php if( !empty($errors) ) {?>
                    <div class="alert alert-danger" role="alert">
                      <?php 
                      foreach ($errors as $error) { ?>
                        <li> <?= $error ?></li>
                      <?php } ?>
                    </div>
                  <?php } ?>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nmbarang" class="form-control" placeholder="Nama Barang">
                  </div>
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="text" name="jmlh" class="form-control" placeholder="Jumlah Barang">
                  </div>
                  <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="id_kategori">
                    <?php 
                      $fields = $kelola->getKategori('kategori');
                      foreach($fields as $index => $data) {
                    ?>
                    <option value="<?php echo $data['id']; ?>" ><?= $data['nama'] ?></option>
                    <?php 
                      }
                    ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan" placeholder="Keterangan" rows="3"></textarea>
                  </div>
                  <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                </form>

                </div>
              </div>

            </div>
            <div class="col">
              <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Barang</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                  <div class="col-sm-12">
                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                      <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 40px;">No.</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 180px;">Nama</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 50px;">Jumlah</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 100px;">Kategori</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 163px;">Keterangan</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 80px;">Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th rowspan="1" colspan="1">No.</th>
                        <th rowspan="1" colspan="1">Nama</th>
                        <th rowspan="1" colspan="1">Jumlat</th>
                        <th rowspan="1" colspan="1">Kategori</th>
                        <th rowspan="1" colspan="1">Keterangan</th>
                        <th rowspan="1" colspan="1">Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php 
                      $no = 1;
                      $fields = $kelola->getTBarang();
                      //$nol = array();
                      $banyak = count($fields);
                      // echo "<pre>";
                      // print_r($fields);
                      // echo "</pre>";
                      // die();
                      if ( $banyak != 0 ){
                        foreach($fields as $index => $data) {
                            ?>
                            <tr role="row" class="odd">
                              <td class="sorting_1"><?= $no++ ?></td>
                              <td><?= $data['nmbarang'] ?></td>
                              <td><?= $data['jmlh'] ?></td>
                              <td><?= $data['nama'] ?></td>
                              <td><?= $data['keterangan'] ?></td>
                              <td>
                                <a href="editbarang.php?id=<?php echo $data['id']; ?>" class="btn btn-outline-warning btn-sm"> Edit</a>
                                <a href="kelolabarang.php?hapus=<?php echo $data['id']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                              </td>
                            </tr>
                        <?php
                        }
                      } else {
                        ?>
                        <tr role="row" class="odd">
                              <td class="sorting_1 text-center p-5" colspan="6"> Hah ? Kosong ?</td>
                            </tr>
                      <?php 
                      }
                      ?>
                    </tbody>
                  </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
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
