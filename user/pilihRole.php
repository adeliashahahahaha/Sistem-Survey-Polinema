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
            background-image: url('asset/bg_polinema.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: calc(140vh - 5px);
        }

        .header {
            background-color: white;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            z-index: 1000;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .logo img {
            width: 50px;
        }

        .survey-title {
            color: black;
            margin-left: 20px;
            font-size: 24px;
            font-weight: 600;
        }

        .container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .option {
            border-radius: 10px;
            text-decoration: none;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            color: white;
        }

        .option img {
            width: 50px;
            height: auto;
            margin-bottom: 10px;
        }

        .option .title {
            font-size: 1.2em;
            margin-bottom: 10px;
            color: white;
        }

        .option:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .option:nth-child(1) { background: #4A90E2; }
        .option:nth-child(2) { background: #357ABD; }
        .option:nth-child(3) { background: #2C5A9E; }
        .option:nth-child(4) { background: #22427C; }
        .option:nth-child(5) { background: #1A3D7C; }
        .option:nth-child(6) { background: #0D2A5A; }

        .option:nth-child(1):hover { background: #357ABD; }
        .option:nth-child(2):hover { background: #2C5A9E; }
        .option:nth-child(3):hover { background: #22427C; }
        .option:nth-child(4):hover { background: #1A3D7C; }
        .option:nth-child(5):hover { background: #0D2A5A; }
        .option:nth-child(6):hover { background: #081D40; }

        .back-button {
            margin-top: 20px;
            text-align: left;
        }

        .back-button a {
            background: #1a3d7c;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            transition: background 0.3s;
        }

        .back-button a:hover {
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
        <header class="header">
            <div class="logo">
                <img src="asset/LOGO POLITEKNIK NEGERI MALANG.png" alt="Logo Polinema">
            </div>
            <div class="survey-title">SISPOLIN</div>
        </header>
        <main>
            <div class="survey-section">
                <div class="survey-header">
                    <h2>Daftar sebagai</h2>
                </div>
                <div class="survey-options">
                    <a href="daftarMhs.php" class="option">
                        <div class="title">Mahasiswa</div>
                    </a>
                    <a href="daftarDosen.php" class="option">
                        <div class="title">Dosen</div>
                    </a>
                    <a href="daftarTendik.php" class="option">
                        <div class="title">Tendik</div>
                    </a>
                    <a href="daftarOrtu.php" class="option">
                        <div class="title">Orang tua</div>
                    </a>
                    <a href="daftarAlumni.php" class="option">
                        <div class="title">Alumni</div>
                    </a>
                    <a href="daftarIndustri.php" class="option">
                        <div class="title">Industri</div>
                    </a>
                </div>
                <div class="back-button">
                    <a href="index.php">Kembali</a>
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
