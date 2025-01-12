<?php 

include_once('model/form_kategori_model.php');

$action = $_GET['act'];

if($action == 'simpan'){
    $data = [
        'kategori_id' => $_POST['kategori_id'],
        'kategori_nama' => $_POST['kategori_nama']
    ];

    $insert = new kategori();
    $insert->insertData($data);
    header('location: kategori.php');
}

if($action == 'edit'){
  $id = $_GET['id'];
  $data = [
    'kategori_id' => $_POST['kategori_id'],
    'kategori_nama' => $_POST['kategori_nama']
  ];

  $update = new Kategori();
  $update->updateData($id, $data);

  header('location: kategori.php');

}


if($action == 'delete'){
  $id = $_GET['id'];

  $delete = new Kategori();
  $delete->deleteData($id);
  header('location: kategori.php');
}