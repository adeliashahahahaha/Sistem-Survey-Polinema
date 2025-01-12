<?php 
include('model/koneksi.php');
session_start();

if (!isset($_SESSION['AS']) || !isset($_SESSION['alternatives'])) {
  die('Data tidak tersedia. Pastikan untuk melakukan perhitungan terlebih dahulu.');
}

$AS = $_SESSION['AS'];
$alternatives = $_SESSION['alternatives'];

$queryUpdate = "SELECT DATE_FORMAT(updated_at, '%d-%m-%Y %H:%i:%s') AS last_update FROM eda_evaluations;";
$resultUpdate = $db->query($queryUpdate);
$rowUpdate = $resultUpdate->fetch_assoc();
$lastUpdate = $rowUpdate['last_update'];
?>
