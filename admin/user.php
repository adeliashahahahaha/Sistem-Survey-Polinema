<?php 
  $menu = 'user'; 
  include_once('model/form_user_model.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pengguna</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="plugins/jquery-validation/additional-methods.min.js"></script>

<script>
  // Function to show notification
  function showNotification(type, message) {
    var notification = $('<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' + 
                          '<strong>' + message + '</strong>' +
                          '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                          '</button>' +
                        '</div>');
    $('body').append(notification);
    setTimeout(function() {
      notification.alert('close');
    }, 5000);
  }

  // Example of how to use the notification function
  $(document).ready(function() {
    // For success notification
    showNotification('success', 'Operation was successful.');

    // For error notification
    // showNotification('danger', 'There was an error processing your request.');
  });
</script>


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
            <h1>Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pengguna</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Pengguna</h3>

          <div class="card-tools">
           <a href="user_form.php?act=tambah" class="btn btn-sm btn-primary">Tambah Pengguna</a>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>ID User</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

              <?php 
                $user = new User();
                $data = $user->getData();

                foreach($data as $row){
                    if (!isset($row['role'])) {
                      continue; // Skip if role is not set
                    }
                    $responden_id = '';
                    if ($row['role'] == 'mahasiswa') {
                        $responden_id = $row['responden_mahasiswa_id'];
                    } elseif ($row['role'] == 'dosen') {
                        $responden_id = $row['responden_dosen_id'];
                    } elseif ($row['role'] == 'ortu') {
                        $responden_id = $row['responden_ortu_id'];
                    } elseif ($row['role'] == 'tendik') {
                        $responden_id = $row['responden_tendik_id'];
                    } elseif ($row['role'] == 'industri') {
                        $responden_id = $row['responden_industri_id'];
                    } elseif ($row['role'] == 'alumni') {
                        $responden_id = $row['responden_alumni_id'];
                    }
                    echo '<tr>
                      <td>'.$responden_id.'</td>
                      <td>'.$row['username'].'</td>
                      <td>'.$row['responden_nama'].'</td>
                      <td>'.$row['role'].'</td>
                      <td>
                        <a title="Edit Data" href="user_form.php?act=edit&id='.$responden_id.'&role='.$row['role'].'" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm(\'Menghapus data ini akan menghapus seluruh rekaman jawaban yang telah dilakukan User. Apakah anda yakin menghapus data ini?\')" title="Hapus Data" href="user_action.php?act=delete&id='.$responden_id.'&role='.$row['role'].'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                    </tr>';
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
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
<!-- <script src="plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<!-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- AdminLTE App -->
<!-- <script src="dist/js/adminlte.min.js"></script>

<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script> -->


</body>
</html>
