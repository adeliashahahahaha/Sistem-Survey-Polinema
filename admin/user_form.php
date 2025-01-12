<?php
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
        <?php
        $act = (isset($_GET['act'])) ? $_GET['act'] : '';

        if ($act == 'tambah') {
        ?>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Pengguna</h3>
              <div class="card-tools"></div>
            </div>
            <div class="card-body">
              <form action="user_action.php?act=simpan" method="post" id="form-tambah">
                <div class="form-group">
                  <label for="role">Role</label>
                  <select required name="role" id="role" class="form-control" onchange="showAdditionalFields()">
                    <option value="">Pilih Role</option>
                    <option value="mahasiswa">Mahasiswa</option>
                    <option value="dosen">Dosen</option>
                    <option value="ortu">Ortu</option>
                    <option value="tendik">Tendik</option>
                    <option value="industri">Industri</option>
                    <option value="alumni">Alumni</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input required type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_nama">Nama</label>
                  <input required type="text" name="responden_nama" id="responden_nama" class="form-control">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input required type="text" name="password" id="password" class="form-control">
                </div>
                <!-- Kolom tambahan akan dimasukkan di sini -->
                <div id="additional-fields"></div>
                <div class="form-group">
                  <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                  <a href="user.php" class="btn btn-warning">Kembali</a>
                </div>
              </form>
            </div>
          </div>

        <?php } else if ($act == 'edit') { ?>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Pengguna</h3>
              <div class="card-tools"></div>
            </div>
            <div class="card-body">

              <?php
              $id = $_GET['id'];
              $role = $_GET['role'];

              $user = new User();
              $data = $user->getDataById($id, $role);
              $data = $data->fetch_assoc();

              $username = $data['username'] ?? '';
              $password = $data['password'] ?? '';
              $responden_nama = $data['responden_nama'] ?? '';

              $responden_nim = $data['responden_nim'] ?? '';
              $responden_prodi = $data['responden_prodi'] ?? '';
              $responden_email = $data['responden_email'] ?? '';
              $responden_hp = $data['responden_hp'] ?? '';
              $tahun_masuk = $data['tahun_masuk'] ?? '';
              $responden_nip = $data['responden_nip'] ?? '';
              $responden_unit = $data['responden_unit'] ?? '';
              $responden_umur = $data['responden_umur'] ?? '';
              $responden_jk = $data['responden_jk'] ?? '';
              $responden_pendidikan = $data['responden_pendidikan'] ?? '';
              $responden_pekerjaan = $data['responden_pekerjaan'] ?? '';
              $responden_penghasilan = $data['responden_penghasilan'] ?? '';
              $mahasiswa_nim = $data['mahasiswa_nim'] ?? '';
              $mahasiswa_nama = $data['mahasiswa_nama'] ?? '';
              $mahasiswa_prodi = $data['mahasiswa_prodi'] ?? '';
              $responden_nopeg = $data['responden_nopeg'] ?? '';
              $responden_jabatan = $data['responden_jabatan'] ?? '';
              $responden_perusahaan = $data['responden_perusahaan'] ?? '';
              $responden_kota = $data['responden_kota'] ?? '';
              $tahun_lulus = $data['tahun_lulus'] ?? '';

              if (!isset($data['role'])) {
                $data['role'] = $role;
              }
              ?>

              <!-- Form Edit -->
              <form action="user_action.php?act=edit&id=<?php echo $id; ?>" method="POST">
                <div class="form-group">
                  <label for="role"><b>Role</b></label>
                  <input type="text" class="form-control" name="role" value="<?php echo $role; ?>" readonly>
                </div>

                <div class="form-group">
                  <label for="username"><b>Username</b></label>
                  <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" required>
                </div>

                <div class="form-group">
                  <label for="responden_nama"><b>Nama</b></label>
                  <input type="text" class="form-control" name="responden_nama" value="<?php echo $data['responden_nama']; ?>" required>
                </div>


                <!-- Tampilkan field sesuai dengan role -->
                <?php if ($role === 'mahasiswa') : ?>
                  <div class="form-group">
                    <label for="responden_nim"><b>NIM</b></label>
                    <input type="text" class="form-control" name="responden_nim" value="<?php echo $responden_nim; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="responden_prodi"><b>Program Studi</b></label>
                    <input type="text" class="form-control" name="responden_prodi" value="<?php echo $responden_prodi; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="responden_email"><b>Email</b></label>
                    <input type="email" class="form-control" name="responden_email" value="<?php echo $responden_email; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="responden_hp"><b>No. Handphone</b></label>
                    <input type="text" class="form-control" name="responden_hp" value="<?php echo $responden_hp; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="tahun_masuk"><b>Tahun Masuk</b></label>
                    <input type="text" class="form-control" name="tahun_masuk" value="<?php echo $tahun_masuk; ?>" required>
                  </div>
                <?php elseif ($role === 'dosen') : ?>
                  <div class="form-group">
                    <label for="responden_nip"><b>NIP</b></label>
                    <input type="text" class="form-control" name="responden_nip" value="<?php echo $responden_nip; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="responden_unit"><b>Unit</b></label>
                    <input type="text" class="form-control" name="responden_unit" value="<?php echo $responden_unit; ?>" required>
                  </div>
                <?php elseif ($role === 'ortu') : ?>
                  <div class="form-group">
                    <label for="responden_nama"><b>Nama</b></label>
                    <input type="text" class="form-control" name="responden_nama" value="<?php echo $responden_nama; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="responden_umur"><b>Umur</b></label>
                    <input type="text" class="form-control" name="responden_umur" value="<?php echo $responden_umur; ?>" required>
                  </div>
                  <div class="form-group">
                    <label><b>Jenis Kelamin</b></label><br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="responden_jk" id="jk_laki" value="laki-laki" <?php if ($responden_jk === 'laki-laki') echo 'checked'; ?> required>
                      <label class="form-check-label" for="jk_laki">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="responden_jk" id="jk_perempuan" value="perempuan" <?php if ($responden_jk === 'perempuan') echo 'checked'; ?> required>
                      <label class="form-check-label" for="jk_perempuan">Perempuan</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="responden_hp"><b>No. Handphone</b></label>
                    <input type="text" class="form-control" name="responden_hp" value="<?php echo $responden_hp; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="responden_pendidikan"><b>Pendidikan Terakhir</b></label>
                    <input type="text" class="form-control" name="responden_pendidikan" value="<?php echo $responden_pendidikan; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="responden_pekerjaan"><b>Pekerjaan</b></label>
                    <input type="text" class="form-control" name="responden_pekerjaan" value="<?php echo $responden_pekerjaan; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="responden_penghasilan"><b>Penghasilan</b></label>
                    <input type="text" class="form-control" name="responden_penghasilan" value="<?php echo $responden_penghasilan; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="mahasiswa_nim"><b>NIM Mahasiswa</b></label>
                    <input type="text" class="form-control" name="mahasiswa_nim" value="<?php echo $mahasiswa_nim; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="mahasiswa_nama"><b>Nama Mahasiswa</b></label>
                    <input type="text" class="form-control" name="mahasiswa_nama" value="<?php echo $mahasiswa_nama; ?>" required>
                  </div>
                  <label for="mahasiswa_prodi"><b>Program Studi Mahasiswa</b></label>
                  <input type="text" class="form-control" name="mahasiswa_prodi" value="<?php echo $mahasiswa_prodi; ?>" required>
            </div>
          <?php elseif ($role === 'tendik') : ?>
            <div class="form-group">
              <label for="responden_nopeg"><b>Nomor Pegawai</b></label>
              <input type="text" class="form-control" name="responden_nopeg" value="<?php echo $responden_nopeg; ?>" required>
            </div>
            <div class="form-group">
              <label for="responden_unit"><b>Unit</b></label>
              <input type="text" class="form-control" name="responden_unit" value="<?php echo $responden_unit; ?>" required>
            </div>
          <?php elseif ($role === 'industri') : ?>
            <div class="form-group">
              <label for="responden_jabatan"><b>Jabatan</b></label>
              <input type="text" class="form-control" name="responden_jabatan" value="<?php echo $responden_jabatan; ?>" required>
            </div>
            <div class="form-group">
              <label for="responden_perusahaan"><b>Perusahaan</b></label>
              <input type="text" class="form-control" name="responden_perusahaan" value="<?php echo $responden_perusahaan; ?>" required>
            </div>
            <div class="form-group">
              <label for="responden_email"><b>Email</b></label>
              <input type="email" class="form-control" name="responden_email" value="<?php echo $responden_email; ?>" required>
            </div>
            <div class="form-group">
              <label for="responden_hp"><b>No. Handphone</b></label>
              <input type="text" class="form-control" name="responden_hp" value="<?php echo $responden_hp; ?>" required>
            </div>
            <div class="form-group">
              <label for="responden_kota"><b>Kota</b></label>
              <input type="text" class="form-control" name="responden_kota" value="<?php echo $responden_kota; ?>" required>
            </div>
          <?php elseif ($role === 'alumni') : ?>
            <div class="form-group">
              <label for="responden_nim"><b>NIM</b></label>
              <input type="text" class="form-control" name="responden_nim" value="<?php echo $responden_nim; ?>" required>
            </div>
            <div class="form-group">
              <label for="responden_nama"><b>Nama</b></label>
              <input type="text" class="form-control" name="responden_nama" value="<?php echo $responden_nama; ?>" required>
            </div>
            <div class="form-group">
              <label for="responden_prodi"><b>Program Studi</b></label>
              <input type="text" class="form-control" name="responden_prodi" value="<?php echo $responden_prodi; ?>" required>
            </div>
            <div class="form-group">
              <label for="responden_email"><b>Email</b></label>
              <input type="email" class="form-control" name="responden_email" value="<?php echo $responden_email; ?>" required>
            </div>
            <div class="form-group">
              <label for="responden_hp"><b>No. Handphone</b></label>
              <input type="text" class="form-control" name="responden_hp" value="<?php echo $responden_hp; ?>" required>
            </div>
            <div class="form-group">
              <label for="tahun_lulus"><b>Tahun Lulus</b></label>
              <input type="text" class="form-control" name="tahun_lulus" value="<?php echo $tahun_lulus; ?>" required>
            </div>
          <?php endif; ?>

          <div class="form-group">
            <label for="password">Password:</label>
            <div class="password-toggle">
              <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($data['password']); ?>" required>
              <span class="toggle-password"><i class="far fa-eye"></i></span>
            </div>
          </div>


          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="user.php" class="btn btn-secondary">Batal</a>
          </form>
          </div>
    </div>

  <?php } ?>
  </section>
  </div>

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

  <script>
    $(document).ready(function() {
      $('.toggle-password').click(function() {
        $(this).find('i').toggleClass('fa-eye fa-eye-slash');
        var input = $(this).siblings('input');
        if (input.attr('type') === 'password') {
          input.attr('type', 'text');
        } else {
          input.attr('type', 'password');
        }
      });
    });
  </script>

  <!-- Notification Script -->
  <script>
    // Function to show notification
  //   function showNotification(type, message) {
  //     var notification = $('<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' + 
  //                           '<strong>' + message + '</strong>' +
  //                           '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
  //                             '<span aria-hidden="true">&times;</span>' +
  //                           '</button>' +
  //                         '</div>');
  //     $('body').append(notification);
  //     setTimeout(function() {
  //       notification.alert('close');
  //     }, 5000);
  //   }

  //   // Example of how to use the notification function
  //   $(document).ready(function() {
  //     // For success notification
  //     showNotification('success', 'Operation was successful.');

  //     // For error notification
  //     // showNotification('danger', 'There was an error processing your request.');
  //   });
  // </script>

  <!-- JavaScript untuk menampilkan kolom tambahan berdasarkan role -->
  <script>
    document.querySelector('.toggle-password').addEventListener('click', function() {
      var passwordField = document.getElementById('password');
      var fieldType = passwordField.getAttribute('type');

      if (fieldType === 'password') {
        passwordField.setAttribute('type', 'text');
        this.innerHTML = '<i class="far fa-eye-slash"></i>'; // Ganti ikon ke mata terbakar
      } else {
        passwordField.setAttribute('type', 'password');
        this.innerHTML = '<i class="far fa-eye"></i>'; // Ganti ikon ke mata biasa
      }
    });

    function showAdditionalFields() {
      var role = document.getElementById('role').value;
      var additionalFields = document.getElementById('additional-fields');
      additionalFields.innerHTML = '';

      if (role === 'mahasiswa') {
        additionalFields.innerHTML = `
          <div class="form-group">
            <label for="responden_nim"><b>NIM</b></label>
            <input type="text" class="form-control" name="responden_nim" required>
          </div>
          <div class="form-group">
            <label for="responden_prodi"><b>Program Studi</b></label>
            <input type="text" class="form-control" name="responden_prodi" required>
          </div>
          <div class="form-group">
            <label for="responden_email"><b>Email</b></label>
            <input type="email" class="form-control" name="responden_email" required>
          </div>
          <div class="form-group">
            <label for="responden_hp"><b>No. Handphone</b></label>
            <input type="text" class="form-control" name="responden_hp" required>
          </div>
          <div class="form-group">
            <label for="tahun_masuk"><b>Tahun Masuk</b></label>
            <input type="text" class="form-control" name="tahun_masuk" required>
          </div>
        `;
      } else if (role === 'dosen') {
        additionalFields.innerHTML = `
          <div class="form-group">
            <label for="responden_nip"><b>NIP</b></label>
            <input type="text" class="form-control" name="responden_nip" required>
          </div>
          <div class="form-group">
            <label for="responden_unit"><b>Unit</b></label>
            <input type="text" class="form-control" name="responden_unit" required>
          </div>
        `;
      } else if (role === 'ortu') {
        additionalFields.innerHTML = `
          <div class="form-group">
            <label for="responden_umur"><b>Umur</b></label>
            <input type="text" class="form-control" name="responden_umur" required>
          </div>
          <div class="form-group">
            <label><b>Jenis Kelamin</b></label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="responden_jk" id="jk_laki" value="laki-laki" required>
              <label class="form-check-label" for="jk_laki">Laki-laki</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="responden_jk" id="jk_perempuan" value="perempuan" required>
              <label class="form-check-label" for="jk_perempuan">Perempuan</label>
            </div>
          </div>
          <div class="form-group">
            <label for="responden_hp"><b>No. Handphone</b></label>
            <input type="text" class="form-control" name="responden_hp" required>
          </div>
          <div class="form-group">
            <label for="responden_pendidikan"><b>Pendidikan Terakhir</b></label>
            <input type="text" class="form-control" name="responden_pendidikan" required>
          </div>
          <div class="form-group">
            <label for="responden_pekerjaan"><b>Pekerjaan</b></label>
            <input type="text" class="form-control" name="responden_pekerjaan" required>
          </div>
          <div class="form-group">
            <label for="responden_penghasilan"><b>Penghasilan</b></label>
            <input type="text" class="form-control" name="responden_penghasilan" required>
          </div>
          <div class="form-group">
            <label for="mahasiswa_nim"><b>NIM Mahasiswa</b></label>
            <input type="text" class="form-control" name="mahasiswa_nim" required>
          </div>
          <div class="form-group">
            <label for="mahasiswa_nama"><b>Nama Mahasiswa</b></label>
            <input type="text" class="form-control" name="mahasiswa_nama" required>
          </div>
          <div class="form-group">
            <label for="mahasiswa_prodi"><b>Program Studi Mahasiswa</b></label>
            <input type="text" class="form-control" name="mahasiswa_prodi" required>
          </div>
        `;
      } else if (role === 'tendik') {
        additionalFields.innerHTML = `
          <div class="form-group">
            <label for="responden_nopeg"><b>Nomor Pegawai</b></label>
            <input type="text" class="form-control" name="responden_nopeg" required>
          </div>
          <div class="form-group">
            <label for="responden_unit"><b>Unit</b></label>
            <input type="text" class="form-control" name="responden_unit" required>
          </div>
        `;
      } else if (role === 'industri') {
        additionalFields.innerHTML = `
          <div class="form-group">
            <label for="responden_jabatan"><b>Jabatan</b></label>
            <input type="text" class="form-control" name="responden_jabatan" required>
          </div>
          <div class="form-group">
            <label for="responden_perusahaan"><b>Perusahaan</b></label>
            <input type="text" class="form-control" name="responden_perusahaan" required>
          </div>
          <div class="form-group">
            <label for="responden_email"><b>Email</b></label>
            <input type="email" class="form-control" name="responden_email" required>
          </div>
          <div class="form-group">
            <label for="responden_hp"><b>No. Handphone</b></label>
            <input type="text" class="form-control" name="responden_hp" required>
          </div>
          <div class="form-group">
            <label for="responden_kota"><b>Kota</b></label>
            <input type="text" class="form-control" name="responden_kota" required>
          </div>
        `;
      } else if (role === 'alumni') {
        additionalFields.innerHTML = `
          <div class="form-group">
            <label for="responden_nim"><b>NIM</b></label>
            <input type="text" class="form-control" name="responden_nim" required>
          </div>
          <div class="form-group">
            <label for="responden_prodi"><b>Program Studi</b></label>
            <input type="text" class="form-control" name="responden_prodi" required>
          </div>
          <div class="form-group">
            <label for="responden_email"><b>Email</b></label>
            <input type="email" class="form-control" name="responden_email" required>
          </div>
          <div class="form-group">
            <label for="responden_hp"><b>No. Handphone</b></label>
            <input type="text" class="form-control" name="responden_hp" required>
          </div>
          <div class="form-group">
            <label for="tahun_lulus"><b>Tahun Lulus</b></label>
            <input type="text" class="form-control" name="tahun_lulus" required>
          </div>
        `;
      }
    }

  </script>

</body>

</html>