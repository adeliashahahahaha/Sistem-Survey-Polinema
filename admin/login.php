<?php
include('model/session.php');

if ($session->exist('is_login')) {
    header('Location: user.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Sispolin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-image: url('asset/bg_polinema.png');
            background-size: cover;
            background-position: center;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column; 
            align-items: center; 
            justify-content: center; 
            height: 100vh;
            color: rgb(66, 66, 66);
        }

        .login-container {
            max-width: 400px;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 1.5rem; 
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
            position: absolute;
            top: 0;
            left: 0; 
            display: flex;
            align-items: center;
            z-index: 1000;
            padding: 1rem;
            border-radius: 4px;
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
    </style>
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="asset/LOGO POLITEKNIK NEGERI MALANG.png" alt="Logo Polinema"></a>
        </div>
        <div class="survey-title">SISPOLIN</div>
    </header>
    <h1>SISTEM SURVEY<br>POLITEKNIK NEGERI MALANG</h1> 
    <div class="login-container">
        <div class="survey-info">
            <h3>ADMINISTRATOR</h3>
        </div>

        <?php
        $status = isset($_GET['status']) ? strtolower($_GET['status']) : null;
        $message = isset($_GET['message']) ? strtolower($_GET['message']) : null;

        if ($status == 'gagal') {
            echo '<div class="alert alert-danger">
                  ' . $message . '
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        }
        ?>

        <form action="model/session.php?act=login" method="post" id="login-form">
            <div class="form-group">
                <label for="username"><b>Username</b></label>
                <input type="text" class="form-control" placeholder="Username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password"><b>Password</b></label>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <p>Username: Admin | Password: 12345</p>
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

</html>