<?php 

include_once('model/form_survey_model.php');

$action = $_GET['act'];

if($action == 'simpan'){
    $data = [
        'survey_id' => $_POST['survey_id'],
        'user_id' => $_POST['user_id'],
        'survey_jenis' => $_POST['survey_jenis'],
        'survey_kode' => $_POST['survey_kode'],
        'survey_nama' => $_POST['survey_nama'],
        'survey_deskripsi' => $_POST['survey_deskripsi'],
        'survey_tanggal' => $_POST['survey_tanggal']
    ];

    $insert = new Survey();
    $insert->insertData($data);
    header('location: survey.php');
}

if($action == 'edit'){
  $id = $_GET['id'];
  $data = [
    'survey_id' => $_POST['survey_id'],
    'user_id' => $_POST['user_id'],
    'survey_jenis' => $_POST['survey_jenis'],
    'survey_kode' => $_POST['survey_kode'],
    'survey_nama' => $_POST['survey_nama'],
    'survey_deskripsi' => $_POST['survey_deskripsi'],
    'survey_tanggal' => $_POST['survey_tanggal']
  ];

  $update = new Survey();
  $update->updateData($id, $data);

  header('location: survey.php');

}


if($action == 'delete'){
  $id = $_GET['id'];

  $delete = new Survey();
  $delete->deleteData($id);
  header('location: survey.php');
}