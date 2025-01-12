<?php
include('model/session.php');

if(!$session->exist('is_login')){
  header('Location: login.php');
}

$menu = 'beranda';
include('model/koneksi.php'); // pastikan koneksi terhubung sebelum meng-include logic.php
session_start();

// Panggil logicHasil.php untuk mengupdate $_SESSION['AS'] dan $_SESSION['alternatives']
include('sbp/logicHasil.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISPOLIN - Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include_once('layouts/header.php'); ?>
  <?php include_once('layouts/sidebar.php'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <!-- Content header -->
    </section>

    <section class="content">
      <!-- PIE CHART -->
      <div class="card card-danger">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
        <div class="card-body">
          <?php
          if (isset($_SESSION['AS']) && isset($_SESSION['alternatives'])) {
            ?>
            <table class="table table-sm table-bordered">
              <thead>
                <tr>
                  <th>Nama Alternatif</th>
                  <th>Nilai</th>
                  <th>Ranking</th>
                </tr>
              </thead>
              <tbody>
                <?php
                arsort($_SESSION['AS']);
                $rankedAlternatives = array_keys($_SESSION['AS']);
                $rankedValues = array_values($_SESSION['AS']);

                for ($i = 0; $i < count($rankedAlternatives); $i++) {
                  $alternativeId = $rankedAlternatives[$i];
                  $rankValue = number_format($rankedValues[$i], 6);
                  echo "<tr>";
                  echo "<td>{$_SESSION['alternatives'][$alternativeId]}</td>";
                  echo "<td>{$rankValue}</td>";
                  echo "<td>" . ($i + 1) . "</td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
            <?php
          } else {
            echo "Data belum tersedia. Pastikan untuk melakukan perhitungan terlebih dahulu.";
          }
          ?>
        </div>
      </div>
    </section>
  </div>

  <?php include_once('layouts/footer.php'); ?>
  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
