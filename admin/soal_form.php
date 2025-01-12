<?php 
  $menu = 'form'; 
  include_once('model/form_soal_model.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Soal</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
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
            <h1>Form Soal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Form Soal</li>
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
          <h3 class="card-title">Tambah Soal Survey</h3>
          <div class="card-tools"></div>
        </div>
        <div class="card-body">
          <form action="soal_action.php?act=simpan" method="post" id="form-tambah">
            <div class="form-group">
              <label for="soal_id">ID Soal</label>
              <input required type="text" name="soal_id" id="soal_id" class="form-control">
            </div>
            <div class="form-group">
              <label for="survey_id">ID Survey</label>
              <input required type="text" name="survey_id" id="survey_id" class="form-control">
            </div>
            <div class="form-group">
              <label for="kategori_id">ID Kategori</label>
              <input required type="text" name="kategori_id" id="kategori_id" class="form-control">
            </div>
            <div class="form-group">
              <label for="no_urut">No Urut</label>
              <input required type="text" name="no_urut" id="no_urut" class="form-control">
            </div>
            <div class="form-group">
              <label for="soal_jenis">Jenis Soal</label>
              <select name="soal_jenis" id="soal_jenis" class="form-control custom-select">
                <option selected disabled>Pilih Salah Satu</option>
                <?php
                  $soal = new Soal();
                  $enumValues = $soal->getEnumValues();
        
                  foreach($enumValues as $value) { ?>
                  <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
                <label for="survey_jenis">Jenis Survey</label>
                <select name="survey_jenis" id="survey_jenis" class="form-control custom-select">
                  <option selected disabled>Pilih Salah Satu</option>
                  <?php
                    $enumValues = $soal->getEnumSurveyJenis();
                    foreach($enumValues as $value) {
                      $selected = ($value == $data['survey_jenis']) ? 'selected' : '';
                      echo "<option value='$value' $selected>$value</option>";
                    }
                  ?>
                </select>
            </div>
            <div class="form-group">
              <label for="soal_pertanyaan">Soal</label>
              <input required type="text" name="soal_pertanyaan" id="soal_pertanyaan" class="form-control">
            </div>
            <div class="form-group">
              <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
              <a href="soal.php" class="btn btn-warning">Kembali</a>
            </div>
          </form>
        </div>
      </div>

      <?php } else if($act == 'edit') { ?>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Soal Survey</h3>
          <div class="card-tools"></div>
        </div>
        <div class="card-body">
          
          <?php 
            $id = $_GET['id'];
            $soal = new Soal();
            $data = $soal->getDataById($id);
            $data = $data->fetch_assoc();
          ?>

          <form action="soal_action.php?act=edit&id=<?php echo $id?>" method="post">
            <div class="form-group">
              <label for="soal_id">ID Soal</label>
              <input required type="text" name="soal_id" id="soal_id" class="form-control" value="<?php echo $data['soal_id']; ?>">
            </div>
            <div class="form-group">
              <label for="survey_id">ID Survey</label>
              <input required type="text" name="survey_id" id="survey_id" class="form-control" value="<?php echo $data['survey_id']; ?>">
            </div>
            <div class="form-group">
              <label for="kategori_id">ID Kategori</label>
              <input required type="text" name="kategori_id" id="kategori_id" class="form-control" value="<?php echo $data['kategori_id']; ?>">
            </div>
            <div class="form-group">
              <label for="no_urut">No. Urut</label>
              <input required type="text" name="no_urut" id="no_urut" class="form-control" value="<?php echo $data['no_urut']; ?>">
            </div>
            <div class="form-group">
              <label for="soal_jenis">Jenis Soal</label>
              <select name="soal_jenis" id="soal_jenis" class="form-control custom-select">
                <option selected disabled>Pilih Salah Satu</option>
                <?php
                  $enumValues = $soal->getEnumValues(); 
                  foreach($enumValues as $value) {
                    $selected = ($value == $data['soal_jenis']) ? 'selected' : ''; ?>
                    <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
                <label for="survey_jenis">Jenis Survey</label>
                <select name="survey_jenis" id="survey_jenis" class="form-control custom-select">
                  <option selected disabled>Pilih Salah Satu</option>
                  <?php
                    $enumValues = $soal->getEnumSurveyJenis();
                    foreach($enumValues as $value) {
                      $selected = ($value == $data['survey_jenis']) ? 'selected' : '';
                      echo "<option value='$value' $selected>$value</option>";
                    }
                  ?>
                </select>
            </div>
            <div class="form-group">
              <label for="soal_pertanyaan">Nama Soal</label>
              <input required type="text" name="soal_pertanyaan" id="soal_pertanyaan" class="form-control" value="<?php echo $data['soal_pertanyaan']; ?>">
            </div>
            <div class="form-group">
              <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
              <a href="soal.php" class="btn btn-warning">Kembali</a>
            </div>
          </form>
        </div>
      </div>

      <?php }
      ?>

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

<script>
  $(document).ready(function(){
    $('#form-tambah').validate({
      rules: {
        kode_soal: {
          required: true,
          minlength: 3,
          maxlength: 10
        },
        nama_soal: {
          required: true,
          minlength: 5,
          maxlength: 255
        }
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });     
  });
</script>

</body>
</html>
