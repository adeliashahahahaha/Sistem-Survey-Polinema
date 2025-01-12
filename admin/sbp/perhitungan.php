<?php 
$menu = 'perhitungan'; 

include('model/koneksi.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Perhitungan</title>

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
            <h1>Perhitungan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Perhitungan</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-header"><b>Matriks Keputusan (X)</b></div>
        <div class="card-body">
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Alternatif</th>
                <?php for ($i = 1; $i <= 5; $i++) { echo "<th>C$i</th>"; } ?>
              </tr>
            </thead>
            <tbody>
              <?php
                $X = array();
                $alternatives = array();
                $sql = 'SELECT * FROM eda_evaluations';
                $data = $db->query($sql);

                if ($data->num_rows > 0) {
                  while($row = $data->fetch_assoc()) {
                    $X[$row['id_alternative']][$row['id_criteria']] = $row['value'];
                  }
                }

                $sql = 'SELECT id_alternative, name FROM eda_alternatives';
                $result = $db->query($sql);
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    $alternatives[$row['id_alternative']] = $row['name'];
                  }
                }

                foreach ($X as $i => $criteria) {
                  echo "<tr><td>$i</td><td>{$alternatives[$i]}</td>";
                  foreach ($criteria as $j => $value) {
                    echo "<td>$value</td>";
                  }
                  echo "</tr>";
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="card">
        <div class="card-header"><b>Bobot Kriteria</b></div>
        <div class="card-body">
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <?php for ($i = 1; $i <= 5; $i++) { echo "<th>C$i</th>"; } ?>
              </tr>
            </thead>
            <tbody>
              <?php
                $weights = array();
                $kriteria = array();
                $sql = 'SELECT id_criteria, weight, attribute FROM eda_criterias ORDER BY id_criteria';
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                  echo "<tr>";
                  while($row = $result->fetch_assoc()) {
                    $weights[$row['id_criteria']] = $row['weight'];
                    $kriteria[$row['id_criteria']] = $row['attribute'];
                    echo "<td>{$row['weight']}</td>";
                  }
                  echo "</tr>";
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="card">
        <div class="card-header"><b>Nilai Solusi Rata-Rata (AV)</b></div>
        <div class="card-body">
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <?php for ($i = 1; $i <= 5; $i++) { echo "<th>C$i</th>"; } ?>
              </tr>
            </thead>
            <tbody>
              <?php
                $AV = array();
                $jml_alternative = count($X);

                foreach($X as $criteria) {
                  foreach($criteria as $j => $value) {
                    if (!isset($AV[$j])) {
                      $AV[$j] = 0;
                    }
                    $AV[$j] += $value / $jml_alternative;
                  }
                }

                echo "<tr>";
                foreach ($AV as $value) {
                  echo "<td>$value</td>";
                }
                echo "</tr>";
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="card">
        <div class="card-header"><b>Jarak Positif dari Solusi Rata-Rata (PDA)</b></div>
        <div class="card-body">
            <table class="table table-sm table-bordered">
            <thead>
                <tr>
                <th>No</th>
                <th>Nama Alternatif</th>
                <?php for ($i = 1; $i <= 5; $i++) { echo "<th>C$i</th>"; } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $PDA = array();

                foreach($X as $i => $xi) {
                    $PDA[$i] = array();
                    foreach($xi as $j => $xij) {
                    if (isset($kriteria[$j]) && $kriteria[$j] == 'benefit') {
                        $PDA[$i][$j] = max(0, ($xij - $AV[$j]) / $AV[$j]);
                    } else {
                        $PDA[$i][$j] = max(0, ($AV[$j] - $xij) / $AV[$j]);
                    }
                    }
                }

                foreach ($PDA as $i => $criteria) {
                    echo "<tr><td>$i</td><td>{$alternatives[$i]}</td>";
                    foreach ($criteria as $value) {
                    if ($value == 0) {
                        echo "<td>0</td>";
                    } else {
                        echo "<td>" . number_format($value, 3) . "</td>";
                    }
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
            </table>
        </div>
        </div>

        <div class="card">
        <div class="card-header"><b>Jarak Negatif dari Solusi Rata-Rata (NDA)</b></div>
        <div class="card-body">
            <table class="table table-sm table-bordered">
            <thead>
                <tr>
                <th>No</th>
                <th>Nama Alternatif</th>
                <?php for ($i = 1; $i <= 5; $i++) { echo "<th>C$i</th>"; } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $NDA = array();

                foreach($X as $i => $xi) {
                    $NDA[$i] = array();
                    foreach($xi as $j => $xij) {
                    if (isset($kriteria[$j]) && $kriteria[$j] == 'benefit') {
                        $NDA[$i][$j] = max(0, ($AV[$j] - $xij) / $AV[$j]);
                    } else {
                        $NDA[$i][$j] = max(0, ($xij - $AV[$j]) / $AV[$j]);
                    }
                    }
                }

                foreach ($NDA as $i => $criteria) {
                    echo "<tr><td>$i</td><td>{$alternatives[$i]}</td>";
                    foreach ($criteria as $value) {
                    if ($value == 0) {
                        echo "<td>0</td>";
                    } else {
                        echo "<td>" . number_format($value, 3) . "</td>";
                    }
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
            </table>
        </div>
        </div>


        <div class="card">
            <div class="card-header"><b>Jumlah Terbobot PDA/NDA (SP/SN)</b></div>
            <div class="card-body">
                <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama Alternatif</th>
                    <th>SP</th>
                    <th>SN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $SP = array();
                    $SN = array();

                    foreach($X as $i => $xi) {
                        $SP[$i] = 0;
                        $SN[$i] = 0;
                        foreach($xi as $j => $xij) {
                        $SP[$i] += $weights[$j] * $PDA[$i][$j];
                        $SN[$i] += $weights[$j] * $NDA[$i][$j];
                        }
                    }

                    foreach ($SP as $i => $spValue) {
                        $spValueFormatted = $spValue == 0 ? '0' : number_format($spValue, 6);
                        $snValueFormatted = $SN[$i] == 0 ? '0' : number_format($SN[$i], 6);
                        echo "<tr><td>$i</td><td>{$alternatives[$i]}</td><td>$spValueFormatted</td><td>$snValueFormatted</td></tr>";
                    }
                    ?>
                </tbody>
                </table>
            </div>
            </div>


            <div class="card">
                <div class="card-header"><b>Nilai Normalisasi SP/SN (NSP/NSN)</b></div>
                <div class="card-body">
                    <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Alternatif</th>
                        <th>NSP</th>
                        <th>NSN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $NSP = array();
                        $NSN = array();
                        $maxSP = max($SP);
                        $maxSN = max($SN);

                        foreach($SP as $i => $spValue) {
                            $NSP[$i] = $spValue / $maxSP;
                            $NSN[$i] = 1 - ($SN[$i] / $maxSN);
                            $nspValueFormatted = $NSP[$i] == 0 ? '0' : number_format($NSP[$i], 6);
                            $nsnValueFormatted = $NSN[$i] == 0 ? '0' : number_format($NSN[$i], 6);
                            echo "<tr><td>$i</td><td>{$alternatives[$i]}</td><td>$nspValueFormatted</td><td>$nsnValueFormatted</td></tr>";
                        }
                        ?>
                    </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><b>Nilai Skor Penilaian (AS)</b></div>
                <div class="card-body">
                    <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Alternatif</th>
                        <th>AS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $AS = array();

                        foreach($alternatives as $i => $name) {
                            $AS[$i] = ($NSP[$i] + $NSN[$i]) / 2;
                            $asValueFormatted = $AS[$i] == 0 ? '0' : number_format($AS[$i], 6);
                            echo "<tr><td>$i</td><td>$name</td><td>$asValueFormatted</td></tr>";
                        }
                        // Menyimpan hasil perhitungan ke dalam sesi
                        $_SESSION['AS'] = $AS;
                        $_SESSION['alternatives'] = $alternatives;
                        ?>
                    </tbody>
                    </table>
                </div>
                </div>

    </section>
  </div>

  <?php include_once('layouts/footer.php'); ?>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>

</body>
</html>
