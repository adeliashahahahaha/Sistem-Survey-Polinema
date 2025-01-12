<?php

    include "user/model/koneksi.php";

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sispolin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            padding-top: 130px;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-image: url('user/asset/bg_AA.jpg');
            background-size: cover;
            background-position: center;
            width: 100vw;
            height: 100vh;
            overflow-x: hidden;
            flex-direction: column;
            align-items: center;
            color: rgb(66, 66, 66);
        }

        .login-choice-container {
            display: flex;
            justify-content: center;
            margin-top: 13rem;
            margin-bottom: 10rem;
        }

        .login-choice-box {
            width: 300px;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 1rem;
            text-align: center;
        }

        .login-choice-box h3 {
            color: #1a3d7c;
            margin-bottom: 1rem;
        }

        .btn-choice {
            background-color: #4CA3B1;
            border: none;
            border-radius: 20px;
            padding: 0.5rem 1rem;
            width: 100%;
            margin-top: 1rem;
            color: white;
            text-decoration: none;
            display: inline-block;
        }

        .btn-choice:hover {
            background-color: #1452a6;
        }

        h6 {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 3rem 0 0 0;
            line-height: 1.5;
            background-color: #fff;
            color: black;
            padding: 20px;
            font-size: 14px;
            width: 100vw;
            height: 27vw;
            box-sizing: border-box;
            text-align: center;
            border: 1px solid #4CA3B1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h4 {
            text-align: center;
            color: #1a3d7c;
            margin-bottom: 1rem;
        }

        .form-control {
            margin-bottom: 1rem;
            border-radius: 20px;
            padding: 0.75rem 1rem;
        }

        .btn-primary {
            background-color: #4CA3B1;
            border: none;
            border-radius: 20px;
            padding: 0.5rem 1rem;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #1452a6;
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
            padding: 1rem;
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
    <header class="header">
        <div class="logo">
            <img src="user/asset/LOGO POLITEKNIK NEGERI MALANG.png" alt="Logo Polinema">
        </div>
        <div class="survey-title">SISPOLIN | Sistem Survey Politeknik Negeri Malang</div>
    </header>
    <div class="login-choice-container">
        <div class="login-choice-box">
            <h4>Masuk sebagai admin</h4>
            <a href="admin/login.php" class="btn-choice">Login</a>
        </div>
        <div class="login-choice-box">
            <h4>Masuk sebagai user</h4>
            <a href="user/index.php" class="btn-choice">Login</a>
        </div>
    </div>

    <h6>SISPOLIN adalah sistem survey Politeknik Negeri Malang yang dikembangkan untuk <br> untuk mengukur dan meningkatkan tingkat kepuasan dari berbagai pihak terkait terhadap aspek<br>layanan pendidikan, fasilitas, dan lulusan yang disediakan. Pihak-pihak terkait yang dimaksud meliputi <br>mahasiswa, dosen, tenaga kependidikan, mitra, orang tua mahasiswa, dan alumni.</h6>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="plugins/jquery-validation/localization/messages_id.js"></script>
    <script>
        $(document).ready(function() {
            $("#login-form").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 3,
                        maxlength: 20
                    },
                    password: {
                        required: true,
                        minlength: 5,
                        maxlength: 255
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
</body>
<footer>
        <div class="footer-content">
            <div class="logo">
                <img src="user/asset/LOGO POLITEKNIK NEGERI MALANG.png" alt="Logo 1" style="width: 80px;">
                <img src="user/asset/LOGO-BLU_SPEEDCIRCLE-1.png" alt="Logo 2" style="width: 80px;">
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

</html>
