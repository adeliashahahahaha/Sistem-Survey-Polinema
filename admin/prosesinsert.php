<?php
require 'model/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kepuasan1 = $_POST['kepuasan1'];
    $kepuasan1 = $_POST['kepuasan1'];
    $kepuasan1 = $_POST['kepuasan1'];
    $kepuasan1 = $_POST['kepuasan1'];
    $kepuasan1 = $_POST['kepuasan1'];
    $kepuasan1 = $_POST['kepuasan1'];
    $kepuasan1 = $_POST['kepuasan1'];
    $kepuasan1 = $_POST['kepuasan1'];
    $kepuasan1 = $_POST['kepuasan1'];
    $kepuasan1 = $_POST['kepuasan1'];
    

    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="POST" action="">
    Name: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    <input type="submit" value="Create">
</form>
