<?php 
  $menu = 'kriteria'; 
  include('model/koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Kriteria</title>

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
            <h1>Edit Kriteria</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Kriteria</li>
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
          <h3 class="card-title">Tambah Kriteria</h3>
          <div class="card-tools"></div>
        </div>
        <div class="card-body">
          <form action="kriteria_action.php?act=simpan" method="post" id="form-tambah">
            <div class="form-group">
              <label for="code">Kode Kriteria</label>
              <input required type="text" name="code" id="code" class="form-control">
            </div>
            <div class="form-group">
              <label for="criteria">Nama Kriteria</label>
              <input required type="text" name="criteria" id="criteria" class="form-control">
            </div>
            <div class="form-group">
              <label for="weight">Bobot</label>
              <input required type="text" name="weight" id="weight" class="form-control">
            </div>
            <div class="form-group">
              <label for="attribute">Jenis</label>
              <select required name="attribute" id="attribute" class="form-control">
                <option value="benefit">Benefit</option>
                <option value="cost">Cost</option>
              </select>
            </div>
            <div class="form-group">
              <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
              <a href="kriteria.php" class="btn btn-warning">Kembali</a>
            </div>
          </form>
        </div>
      </div>

      <?php } else if($act == 'edit') { ?>
         
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Kriteria</h3>
            <div class="card-tools"></div>
          </div>
          <div class="card-body">
            
            <?php 
              $id = $_GET['id'];
              $sql = "SELECT * FROM eda_criterias WHERE id_criteria = $id";
              $result = $db->query($sql);
              $data = $result->fetch_assoc();
            ?>

            <form action="kriteria_action.php?act=update&id=<?= $id ?>" method="post" id="form-edit">
              <div class="form-group">
                <label for="code">Kode Kriteria</label>
                <input required type="text" name="code" id="code" class="form-control" value="<?= $data['code'] ?>">
              </div>
              <div class="form-group">
                <label for="criteria">Nama Kriteria</label>
                <input required type="text" name="criteria" id="criteria" class="form-control" value="<?= $data['criteria'] ?>">
              </div>
              <div class="form-group">
                <label for="weight">Bobot</label>
                <input required type="text" name="weight" id="weight" class="form-control" value="<?= $data['weight'] ?>">
              </div>
              <div class="form-group">
                <label for="attribute">Jenis</label>
                <select required name="attribute" id="attribute" class="form-control">
                  <option value="benefit" <?= ($data['attribute'] == 'benefit') ? 'selected' : '' ?>>Benefit</option>
                  <option value="cost" <?= ($data['attribute'] == 'cost') ? 'selected' : '' ?>>Cost</option>
                </select>
              </div>
              <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="kriteria.php" class="btn btn-warning">Kembali</a>
              </div>
            </form>

          </div>
        </div>

      <?php } ?>

      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include_once('layouts/footer.php'); ?>
  
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

</body>
</html>
