<?php 

include_once('model/form_mahasiswa_model.php');

$action = $_GET['act'];

if($action == 'delete'){
  $id = $_GET['id'];

  $delete = new Mahasiswa();
  $delete->deleteData($id);
  header('location: mahasiswa.php');
}

if($action == 'detail'){
  $id = $_GET['id'];

  $show = new jMahasiswa();
  $show -> getmahasiswaById( $id);
  header('location: mahasiswa_detail.php?id=' . $id);
}