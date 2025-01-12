<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$role = $_SESSION['role']; // Get the user's role from the session

switch ($role) {
    case 'mahasiswa':
        $profileUrl = "profilMahasiswa.php";
        break;
    case 'dosen':
        $profileUrl = "profilDosen.php";
        break;
    case 'tendik':
        $profileUrl = "profilTendik.php";
        break;
    case 'alumni':
        $profileUrl = "profilAlumni.php";
        break;
    case 'ortu':
        $profileUrl = "profilOrtu.php";
        break;
    case 'industri':
        $profileUrl = "profilIndustri.php";
        break;
    default:
        $profileUrl = "profil.php";
        break;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISPOLIN Survey</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #ffff;
        }

        .container {
            display: flex;
            flex-direction: column;
            min-height: calc(101vh - 5px);
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #1a3d7c;
            color: #fff;
            padding: 15px 20px;
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

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .survey-section {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1200px;
        }

        .survey-header h2 {
            margin: 0 0 20px;
            font-size: 1.5em;
            color: #1a3d7c;
        }

        .survey-options {
            display: flex;
            justify-content: space-around;
            gap: 20px;
            flex-wrap: nowrap;
            /* Prevent wrapping */
        }

        .survey-options .option {
            background: #f4f4f4;
            border: 1px solid #ccc;
            border-radius: 10px;
            text-decoration: none;
            padding: 20px;
            width: 200px;
            text-align: center;
            transition: background 0.3s, border-color 0.3s;
            flex-shrink: 0;
        }

        .survey-options .option:hover {
            background: #e0e0e0;
            border-color: #1452a6;
        }

        .survey-options .option img {
            width: 50px;
            height: auto;
            margin-bottom: 10px;
        }

        .survey-options .option .title {
            font-size: 1.2em;
            margin-bottom: 10px;
            color: #1a3d7c;
        }

        .survey-options .option .button {
            background: #1a3d7c;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            transition: background 0.3s;
        }

        .survey-options .option .button:hover {
            background: #1452a6;
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
    <div class="container">
        <header>
            <div class="logo">SISPOLIN</div>
            <div class="profile">
                <a href="<?= $profileUrl; ?>">Profil</a>
                <span class="active">Isi Survei</span>
            </div>
        </header>
        <main>
            <div class="survey-section">
                <div class="survey-header">
                    <h2>Pilih Jenis Survei</h2>
                </div>
                <div class="survey-options">
                    <?php if ($role == 'mahasiswa' || $role == 'dosen') : ?>
                    <div class="option">
                        <img src="asset/pendidikan.png" alt="Pendidikan">
                        <div class="title">Pendidikan</div>
                        <a href="formPendidikan.php" class="button">Lakukan Survei</a>
                    </div>
                    <?php endif; ?>
                    <?php if ($role == 'mahasiswa' || $role == 'dosen' || $role == 'tendik' || $role == 'industri') : ?>
                    <div class="option">
                        <img src="asset/fasilitas.png" alt="Fasilitas">
                        <div class="title">Fasilitas</div>
                        <a href="formFasilitas.php" class="button">Lakukan Survei</a>
                    </div>
                    <?php endif; ?>
                    <?php if ($role == 'mahasiswa' || $role == 'dosen' || $role == 'tendik' || $role == 'alumni' || $role == 'ortu' || $role == 'industri') : ?>
                    <div class="option">
                        <img src="asset/pelayanan.png" alt="Pelayanan">
                        <div class="title">Pelayanan</div>
                        <a href="formPelayanan.php" class="button">Lakukan Survei</a>
                    </div>
                    <?php endif; ?>
                    <?php if ($role == 'alumni' || $role == 'ortu') : ?>
                    <div class="option">
                        <img src="asset/lulusan.png" alt="Lulusan">
                        <div class="title">Lulusan</div>
                        <a href="formLulusan.php" class="button">Lakukan Survei</a>
                    </div>
                    <?php endif; ?>
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
