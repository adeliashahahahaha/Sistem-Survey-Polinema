<?php 

include_once('model/form_soal_model.php');

$action = $_GET['act'];

if($action == 'simpan'){
    $data = [
        'soal_id' => $_POST['soal_id'],
        'survey_id' => $_POST['survey_id'],
        'kategori_id' => $_POST['kategori_id'],
        'no_urut' => $_POST['no_urut'],
        'soal_jenis' => $_POST['soal_jenis'],
        'soal_pertanyaan' => $_POST['soal_pertanyaan'],
        'survey_jenis' => $_POST['survey_jenis']
    ];

    $insert = new Soal();
    $insert->insertData($data);
    header('location: soal.php');
}

if ($action == 'edit') {
  $id = $_GET['id'];
  $data = [
      'soal_id' => $_POST['soal_id'],
        'survey_id' => $_POST['survey_id'],
        'kategori_id' => $_POST['kategori_id'],
        'no_urut' => $_POST['no_urut'],
        'soal_jenis' => $_POST['soal_jenis'],
        'soal_pertanyaan' => $_POST['soal_pertanyaan'],
        'survey_jenis' => $_POST['survey_jenis']
  ];
  

  $update = new Soal();
  $update->updateData($id, $data);

  header('location: soal.php');

}


if($action == 'delete'){
  $id = $_GET['id'];

  $delete = new Soal();
  $delete->deleteData($id);
  header('location: soal.php');
}