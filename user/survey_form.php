<?php 
  $menu = 'survey'; 
  include_once('model/form_survey_model.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Survey</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include_once('layouts/header.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once('layouts/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Survey</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Survey</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->          
      <?php 
        $act = (isset($_GET['act']))? $_GET['act'] : '';

        if($act == 'tambah'){
      ?>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Data Survey</h3>
          <div class="card-tools"></div>
        </div>
        <div class="card-body">
          <form action="soal_action.php?act=simpan" method="post" id="form-tambah">
            <div class="form-group">
              <label for="survey_id">ID Survey</label>
              <input required type="text" name="survey_id" id="survey_id" class="form-control">
            </div>
            <div class="form-group">
              <label for="user_id">ID User</label>
              <input required type="text" name="user_id" id="user_id" class="form-control">
            </div>
            <div class="form-group">
                <label for="survey_jenis">Jenis Soal</label>
                <select id="survey_jenis" class="form-control custom-select">
                  <option selected disabled>Pilih Salah Satu</option>
                  <option>Mahasiswa</option>
                    <option>Dosen</option>
                    <option>Tenaga Pendidik</option>
                    <option>Orang Tua / Wali</option>
                    <option>Alumni</option>
                    <option>Industri</option>
                </select>
            </div>
            <div class="form-group">
              <label for="survey_kode">Kode</label>
              <input required type="text" name="survey_kode" id="survey_kode" class="form-control">
            </div>
            <div class="form-group">
              <label for="survey_nama">Nama</label>
              <input required type="text" name="survey_nama" id="survey_nama" class="form-control">
            </div>
            <div class="form-group">
              <label for="survey_deskripsi">Deskripsi</label>
              <textarea name="survey_deskripsi" class="form-control" id="survey_deskripsi"></textarea>
            </div>
            <div class="form-group">
                    <label for="survey_tanggal">Tanggal</label>
                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                            <input type="text" name="survey_tanggal" id="survey_tanggal" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                            <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
            <div class="form-group">
              <button type="submit" name="simpan" class="btn btn-primary" >Simpan</button>
              <a href="soal.php" class="btn btn-warning">Kembali</a>
            </div>
          </form>
        </div>
      </div>

        <?php } else if($act == 'edit') { ?>
         
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Data Survey</h3>
            <div class="card-tools"></div>
          </div>
          <div class="card-body">
            
            <?php 
              $id = $_GET['id'];

              $survey = new Survey();
              $data = $survey->getDataById($id);
              $data = $data->fetch_assoc();
            ?>

            <form action="soal_action.php?act=edit&id=<?php echo $id?>" method="post">
              <div class="form-group">
                <label for="survey_id">ID Survey</label>
                <input required type="text" name="survey_id" id="survey_id" class="form-control">
              </div>
              <div class="form-group">
                <label for="user_id">ID User</label>
                <input required type="text" name="user_id" id="user_id" class="form-control">
              </div>
              <div class="form-group">
                  <label for="survey_jenis">Jenis Soal</label>
                  <select id="survey_jenis" class="form-control custom-select">
                    <option selected disabled>Pilih Salah Satu</option>
                    <option>Mahasiswa</option>
                    <option>Dosen</option>
                    <option>Tenaga Pendidik</option>
                    <option>Orang Tua / Wali</option>
                    <option>Alumni</option>
                    <option>Industri</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="survey_kode">Kode</label>
                <input required type="text" name="survey_kode" id="survey_kode" class="form-control">
              </div>
              <div class="form-group">
                <label for="survey_nama">Nama</label>
                <input required type="text" name="survey_nama" id="survey_nama" class="form-control">
              </div>
              <div class="form-group">
                <label for="survey_deskripsi">Deskripsi</label>
                <textarea name="survey_deskripsi" class="form-control" id="survey_deskripsi"></textarea>
              </div>
              <div class="form-group">
                    <label for="survey_tanggal">Tanggal</label>
                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                            <input type="text" name="survey_tanggal" id="survey_tanggal" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                            <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
              <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary" >Simpan</button>
                <a href="survey.php" class="btn btn-warning">Kembali</a>
              </div>
            </form>
        </div>
      </div>
          
        <?php }?>

        </div>
      </div>
      <!-- /.card -->

      <?php include_once('layouts/footer.php'); ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<script src="plugins/jquery-validation/localization/messages_id.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>

<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>


<!-- Page specific script -->
<script>
  $(function () {

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

  });

  $(document).ready(function() {
    
    const data = $('#main').data('loading');

    $('.select2').select2();

    // memilih id user kemudian muncul nama di input text
    $('#user_id').on('change', function() {
        var selectedUserId = $(this).find('option:selected').data('id');
        var selectedUsername = $(this).find('option:selected').data('username');
        $('#username').val(selectedUsername);
    });

    $('#survey_jenis').on('change', function() {
        var selectedJenis = $(this).find('option:selected').data('survey_jenis');
        $('#survey_jenis').val(selectedJenis);
    });
});
 
</script>
</body>
</html>
