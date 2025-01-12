<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include "model/koneksi.php";
include "model/User.php";
include "model/Mahasiswa.php";

$koneksi = new Koneksi();
$db = $koneksi->getConnection();

$username = $_SESSION['username'];

$mahasiswa = new Mahasiswa($db);
$data = $mahasiswa->getMhsProfile($username);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #1a3d7c;
            color: #fff;
            padding: 15px 20px;
            width: 100%;
            box-sizing: border-box;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        header .logo {
            font-size: 1.5em;
            font-weight: bold;
        }

        header .profile {
            display: flex;
            gap: 15px;
        }

        header .profile a,
        header .profile span {
            text-decoration: none;
            color: white;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
        }

        header .profile .active {
            background: #fff;
            color: black;
        }

        header .profile a:hover,
        header .profile span:hover {
            background: #1452a6;
            color: white;
        }

        .profile-name {
            margin-left: auto;
            padding: 0 20px;
        }

        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            box-sizing: border-box;
        }

        main {
            padding: 20px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .profile-border {
            width: 100%;
        }

        .profile-info {
            width: 100%;
            max-width: 400px;
            text-align: left;
            margin: 0 auto;
        }

        .info-item {
            margin-bottom: 20px;
        }

        .info-item label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .info-item p {
            margin: 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
        }

        .logout {
            background: #fe2020;
            color: #fff;
            padding: 11px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .logout:hover {
            background: #c0392b;
        }

        footer {
            background-color: #15253f;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            width: 100%;
            box-sizing: border-box;
        }

        footer .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1000px;
            margin: 0 auto;
        }

        footer .footer-content .logo {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        footer .footer-content .contact {
            text-align: left;
        }

        footer .footer-content .contact p {
            margin: 15px 0;
        }

        footer .footer-bottom {
            margin-top: 20px;
            margin-left: 20px;
            margin-right: 20px;
            border-top: 1px solid #fff;
            padding-top: 25px;
            text-align: left;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">SISPOLIN</div>
        <div class="profile">
            <span class="active">Profil</span>
            <a href="pilihsurvey.php">Isi Survei</a>
        </div>
    </header>
    <div class="container">
        <main>
            <div class="profile-border">
                <div class="profile-info">
                    <div class="info-item">
                        <label>Nama Lengkap</label>
                        <p><?= $data['responden_nama'] !== null ? $data['responden_nama'] : '-' ?></p>
                    </div>
                    <div class="info-item">
                        <label>Nim</label>
                        <p><?= $data['responden_nim'] !== null ? $data['responden_nim'] : '-' ?></p>
                    </div>
                    <div class="info-item">
                        <label>Program Studi</label>
                        <p><?= $data['responden_prodi'] !== null ? $data['responden_prodi'] : '-' ?></p>
                    </div>
                    <div class="info-item">
                        <label>Email</label>
                        <p><?= $data['responden_email'] !== null ? $data['responden_email'] : '-' ?></p>
                    </div>
                    <div class="info-item">
                        <label>No Hp</label>
                        <p><?= $data['responden_hp'] !== null ? $data['responden_hp'] : '-' ?></p>
                    </div>
                    <div class="info-item">
                        <label>Tahun Masuk</label>
                        <p><?= $data['tahun_masuk'] !== null ? $data['tahun_masuk'] : '-' ?></p>
                    </div>

                    <form action="logout.php" method="POST">
                        <button class="logout" type="submit" id="logoutBtn">Logout</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <footer>
        <div class="footer-content">
            <div class="logo">
                <img src="asset/LOGO POLITEKNIK NEGERI MALANG.png" alt="Logo 1" style="width: 80px;">
                <img src="asset/LOGO-BLU_SPEEDCIRCLE-1.png" alt="Logo 2" style="width: 80px;">
            </div>
            <div class="contact">
                <p><strong>KONTAK KAMI</strong></p>
                <p><i class="fa fa-phone"></i> (0341) 404424</p>
                <p><i class="fa fa-map-marker"></i> Jl. Soekarno Hatta Street No.9, Jatimulyo, Kec. Lowokwaru, Malang 65141, Jawa Timur - Indonesia</p>
                <p><i class="fa fa-envelope"></i> polinema@gmail.ac.id</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyright © 2024 Politeknik Negeri Malang</p>
        </div>
    </footer>
</body>

</html>