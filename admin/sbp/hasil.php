<?php 
$menu = 'hasil'; 

include('logicHasil.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hasil Perankingan</title>

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
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Hasil Perankingan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Perankingan</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-header"><b>Hasil ranking digunakan untuk memberikan rekomendasi sebagai prioritas perbaikan utama pada alternatif yang ada </b></div>
        <div class="card-header">Data terakhir update pada: <?php echo $lastUpdate; ?></div>
    
        <div class="card-body">
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
              arsort($AS);
              $rankedAlternatives = array_keys($AS);
              $rankedValues = array_values($AS);

              for ($i = 0; $i < count($rankedAlternatives); $i++) {
                $alternativeId = $rankedAlternatives[$i];
                $rankValue = number_format($rankedValues[$i], 6);
                echo "<tr>";
                echo "<td>{$alternatives[$alternativeId]}</td>";
                echo "<td>{$rankValue}</td>";
                echo "<td>" . ($i + 1) . "</td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
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
