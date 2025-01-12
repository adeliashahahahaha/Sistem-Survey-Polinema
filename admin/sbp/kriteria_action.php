<?php 
include('model/koneksi.php');

$act = $_GET['act'];

if($act == 'simpan') {
    $code = $_POST['code'];
    $criteria = $_POST['criteria'];
    $weight = $_POST['weight'];
    $attribute = $_POST['attribute'];

    $sql = "INSERT INTO eda_criterias (code, criteria, weight, attribute) VALUES ('$code', '$criteria', '$weight', '$attribute')";
    if($db->query($sql) === TRUE) {
        header('Location: kriteria.php');
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

} else if($act == 'update') {
    $id = $_GET['id'];
    $code = $_POST['code'];
    $criteria = $_POST['criteria'];
    $weight = $_POST['weight'];
    $attribute = $_POST['attribute'];

    $sql = "UPDATE eda_criterias SET code='$code', criteria='$criteria', weight='$weight', attribute='$attribute' WHERE id_criteria=$id";
    if($db->query($sql) === TRUE) {
        header('Location: kriteria.php');
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}
?>
