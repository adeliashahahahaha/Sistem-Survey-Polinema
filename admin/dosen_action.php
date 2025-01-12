<?php 

include_once('model/form_dosen_model.php');

$action = $_GET['act'];

if($action == 'delete'){
  $id = $_GET['id'];

  $delete = new Dosen();
  $delete->deleteData($id);
  header('location: dosen.php');
}

if($action == 'detail'){
  $id = $_GET['id'];

  $show = new jDosen();
  $show -> getDosenById( $id);
  header('location: dosen_detail.php?id=' . $id);
}