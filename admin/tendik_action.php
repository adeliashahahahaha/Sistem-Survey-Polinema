<?php 

include_once('model/form_tendik_model.php');

$action = $_GET['act'];

if($action == 'delete'){
  $id = $_GET['id'];

  $delete = new tendik();
  $delete->deleteData($id);
  header('location: tendik.php');
}

if($action == 'detail'){
  $id = $_GET['id'];

  $show = new jTendik();
  $show -> gettendikById( $id);
  header('location: tendik_detail.php?id=' . $id);
}