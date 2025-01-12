<?php 

include_once('model/form_ortu_model.php');

$action = $_GET['act'];

if($action == 'delete'){
  $id = $_GET['id'];

  $delete = new Ortu();
  $delete->deleteData($id);
  header('location: ortu.php');
}

if($action == 'detail'){
  $id = $_GET['id'];

  $show = new jOrtu();
  $show -> getortuById( $id);
  header('location: ortu_detail.php?id=' . $id);
}