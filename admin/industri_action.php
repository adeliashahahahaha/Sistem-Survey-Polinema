<?php 

include_once('model/form_industri_model.php');

$action = $_GET['act'];

if($action == 'delete'){
  $id = $_GET['id'];

  $delete = new Industri();
  $delete->deleteData($id);
  header('location: industri.php');
}

if($action == 'detail'){
  $id = $_GET['id'];

  $show = new jIndustri();
  $show -> getindustriById( $id);
  header('location: industri_detail.php?id=' . $id);
}