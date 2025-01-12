<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: profil.php"); 
    exit();
}

include "model/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $responden_nip = $_POST['responden_nip'];
    $responden_nama = $_POST['responden_nama'];
    $responden_unit = $_POST['responden_unit'];

    $koneksi = new Koneksi();
    $db = $koneksi->getConnection();

    $insert1 = $db->query("INSERT INTO t_responden_dosen (username, password, responden_nip, responden_nama, responden_unit) VALUES ('$username', '$password', '$responden_nip', '$responden_nama', '$responden_unit')");

    if ($insert1) {
        // Redirect atau tampilkan pesan sukses
        header("Location: index.php");
        exit();
    } else {
        // Tampilkan pesan error
        die("Error: " . $db->error);
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            color: #1a3d7c;
        }

        .bg-img {
            min-height: 100vh;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 400px;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: left;
            color: #1a3d7c;
            margin-bottom: 1.5rem;
        }

        .form-control {
            margin-bottom: 1rem;
        }

        .btn-primary {
            background-color: #1a3d7c;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1452a6;
        }

        .btn-secondary {
            background-color: white;
            color: black;
        }

        .btn-secondary:hover {
            background-color: darkgray;
        }

        .header {
            position: sticky;
            top: 0;
            left: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #1a3d7c;
            z-index: 1000;
            color: white;
        }

        .logo img {
            width: 50px;
        }

        .survey-title {
            color: white;
            margin-left: 0;
            font-size: 24px;
            font-weight: 600;
        }

    </style>
</head>

<body>
<header class="header">
        <div class="logo">
            <img src="asset/LOGO POLITEKNIK NEGERI MALANG.png" alt="Logo Polinema">
        </div>
        <div class="survey-title">SISPOLIN</div>
    </header>
    <div class="bg-img">
        <form class="container" id="register-form" action="" method="POST">
            <h2>Daftar Akun Dosen</h2>

            <div class="form-group">
                <label for="username"><b>Username</b></label>
                <input type="text" class="form-control" placeholder="Enter your username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password"><b>Password</b></label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password" required>
            </div>

            <div class="form-group">
                <label for="responden_nip"><b>NIP</b></label>
                <input type="text" class="form-control" placeholder="Enter your Nip" name="responden_nip" required>
            </div>

            <div class="form-group">
                <label for="responden_nama"><b>Nama</b></label>
                <input type="text" class="form-control" placeholder="Enter your name" name="responden_nama" required>
            </div>

            <div class="form-group">
                <label for="responden_unit"><b>Unit</b></label>
                <input type="text" class="form-control" placeholder="Enter your unit" name="responden_unit" required>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block" name="submit">Sign In</button>
            <a href="index.php" class="d-block text-center">Back to login</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>

</html>