<?php 

include_once('model/form_alumni_model.php');

$action = $_GET['act'];

if($action == 'delete'){
  $id = $_GET['id'];

  $delete = new Alumni();
  $delete->deleteData($id);
  header('location: alumni.php');
}

if($action == 'detail'){
  $id = $_GET['id'];

  $show = new jAlumni();
  $show -> getalumniById( $id);
  header('location: alumni_detail.php?id=' . $id);
}