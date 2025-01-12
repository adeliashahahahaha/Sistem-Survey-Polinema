<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sispolin";
  
    // Membuat koneksi
    $db = new mysqli($servername, $username, $password, $dbname);
  
    // Memeriksa koneksi
    if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
    }
?>
