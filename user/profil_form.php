<?php 
  session_start();
  $menu = 'profil'; 
  include_once('model/form_profil_model.php');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $NIP = $_POST['NIP'];
    $Nama = $_POST['Nama'];
    $Unit = $_POST['Unit'];
    $Tanggal = $_POST['Tanggal'];
    $ID = $_POST['ID'];
    $ID_Survey = $_POST['ID_Survey'];
    
    $_SESSION["NIP"]=$NIP;
    $_SESSION["Nama"]=$Nama;
    $_SESSION["Unit"]=$Unit;
    $_SESSION["Tanggal"]=$Tanggal;
    $_SESSION["ID"]=$ID;
    $_SESSION["ID_Survey"]=$ID_Survey;

    echo $_SESSION["NIP"];
    echo$_SESSION["Nama"];
    echo $_SESSION["Unit"];
    echo $_SESSION["Tanggal"];
    echo $_SESSION["ID"];
    echo $_SESSION["ID_Survey"];}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profil</title>

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
            <h1>Profil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profil</li>
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

        <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Isi Survey</h3>
        </div>
        <!-- /.card-header -->
        <form action="" method="post">
        <div class="card-body">
            <div class="row">
            <div class="col-md-6">
                <h4>NIP</h4>
                <div class="form-group">
                <input type="text" name="NIP" class="form-control rounded-0"  >
                </div>
            </div>
            <div class="col-md-6">
                <h4>Nama</h4>
                <div class="form-group">
                <input type="text" name="Nama" class="form-control rounded-0" id="exampleInputRounded0" >
                </div>
            </div>
            <div class="col-md-6">
                <h4>Unit</h4>
                <div class="form-group">
                <input type="number" name="Unit" class="form-control rounded-0" id="exampleInputRounded0" >
                </div>
            </div>
            <div class="col-md-6">
                <h4>Tanggal</h4>
                <div class="form-group">
                <input type="date" name="Tanggal" class="form-control rounded-0" id="exampleInputRounded0" >
                </div>
            </div>
            <div class="col-md-6">
                <h4>ID</h4>
                <div class="form-group">
                <input type="number" name="ID" class="form-control rounded-0" id="exampleInputRounded0" >
                </div>
            </div>
            <div class="col-md-6">
                <h4>ID Survey</h4>
                <div class="form-group">
                <input type="number" name="ID_Survey" class="form-control rounded-0" id="exampleInputRounded0" >
                </div>
            </div>

            <div class="col-md-6">
                <h4>Custom Select</h4>
                <div class="form-group">
                <select class="custom-select rounded-0" id="exampleSelectRounded0">
                    <option>Value 1</option>
                    <option>Value 2</option>
                    <option>Value 3</option>
                </select>
                </div>
            </div>
            </div>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="form-group">
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="user.php" class="btn btn-warning">Kembali</a>
        </div>
        </form>


        <?php } else if($act == 'edit') { ?>
         
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Pengguna</h3>
            <div class="card-tools"></div>
          </div>
          <div class="card-body">
            
            <?php 
              $id = $_GET['id'];

              $user = new User();
              $data = $user->getDataById($id);
              $data = $data->fetch_assoc();
            ?>

            <form action="user_action.php?act=edit&id=<?php echo $id?>" method="post">
                <div class="form-group">
                  <label for="username">ID User</label>
                  <input required type="text" name="user_id" id="user_id" class="form-control">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input required type="text" name="username" id="username" class="form-control"  value="<?php echo $data['username']?>">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input required type="text" name="nama" id="nama" class="form-control" value="<?php echo $data['nama']?>">
                </div>
                <div class="form-group">
                    <label for="paswword">Password</label>
                    <input required type="text" name="password" id="password" class="form-control" value="<?php echo $data['password']?>">
                </div>
              <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="user.php" class="btn btn-warning">Kembali</a>
              </div>
            </form>
        </div>
   
        </div>
          
        <?php }?>

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

<script>
  $(document).ready(function(){
    $('#form-tambah').validate({
      rules: {
        username: {
          required: true,
          minlength: 5,
          maxlength: 10
        },
        password: {
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
