<?php
session_start();
if (isset($_POST['submit'])) {
    include "model/koneksi.php";

    $e = $_POST['username'];
    $p = $_POST['password'];

    $koneksi = new Koneksi();
    $db = $koneksi->getConnection();

    $tables = [
        'mahasiswa' => 't_responden_mahasiswa',
        'dosen' => 't_responden_dosen',
        'tendik' => 't_responden_tendik',
        'ortu' => 't_responden_ortu',
        'alumni' => 't_responden_alumni',
        'industri' => 't_responden_industri'
    ];

    $loginSuccess = false;

    foreach ($tables as $role => $table) {
        $stmt = $db->prepare("SELECT * FROM $table WHERE BINARY username=? AND password=?");
        $stmt->bind_param("ss", $e, $p);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        if ($data) {
            $_SESSION["responden_{$role}_id"] = $data["responden_{$role}_id"];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $role;
            $stmt->close();

            $redirectPage = "profil" . ucfirst($role) . ".php";
            header("Location: $redirectPage");
            exit();
        }

        $stmt->close();
    }

    $error = "Login gagal. Username atau password salah.";
}

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
            background-image: url('asset/bg_polinema.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            width: 100vw;
            height: 100vh;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: rgb(66, 66, 66);
        }

        .login-container {
            max-width: 400px;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 1.5rem;
            margin-bottom: 2rem;
        }

        h1 {
            text-align: center;
            color: #253F67;
            margin-bottom: 1.5rem;
            font-weight: bold;
        }

        h3 {
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
            /* Fixed position */
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
            <img src="asset/LOGO POLITEKNIK NEGERI MALANG.png" alt="Logo Polinema">
        </div>
        <div class="survey-title">SISPOLIN</div>
    </header>
    <h1>SISTEM SURVEY<br>POLITEKNIK NEGERI MALANG</h1>
    <div class="login-container">
        <div class="survey-info">
            <h3>Log in</h3>
        </div>
        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="" method="post" id="login-form">
            <div class="form-group">
                <label for="username"><b>Username</b></label>
                <input type="text" class="form-control" placeholder="Username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password"><b>Password</b></label>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember Me</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
            <a href="pilihRole.php" class="d-block text-center mt-3">Register a new account</a>
        </form>
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

</html>
