<?php 

include_once('model/form_user_model.php');

$action = $_GET['act'];

if($action == 'simpan'){
    $data = [
        'user_id' => $_POST['user_id'],
        'username' => $_POST['username'],
        'nama' => $_POST['nama'],
        'password' => $_POST['password']
    ];

    $insert = new User();
    $insert->insertData($data);
    header('location: user.php');
}

if($action == 'edit'){
  $id = $_GET['id'];
  $data = [
    'user_id' => $_POST['user_id'],
    'username' => $_POST['username'],
    'nama' => $_POST['nama'],
    'password' => $_POST['password']
  ];

  $update = new User();
  $update->updateData($id, $data);

  header('location: user.php');

}


if($action == 'delete'){
  $id = $_GET['id'];

  $delete = new User();
  $delete->deleteData($id);
  header('location: user.php');
}