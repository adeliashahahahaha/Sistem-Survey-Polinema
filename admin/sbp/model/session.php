<?php
    include(__DIR__.'/../vendor/autoload.php');

    use Ghostff\Session\Session;
    $session = new Session();

    $act = isset($_GET['act'])? $_GET['act'] : '';

    if($act == 'login'){
        include_once('koneksi.php');

        $username = $_POST['username'];
        $password = $_POST['password'];

        // digunakan untuk query user
        $query = $db->prepare('select * from m_user where username = ?');
        $query->bind_param('s', $username);
        $query->execute();

        // untuk ambil datanya
        $data = $query->get_result()->fetch_assoc();

        // jika password sesuai
        if(password_verify($password, $data['password'])){
            $session->set('is_login', true);
            $session->set('username', $data['username']);
            $session->set('name', $data['nama']);
            $session -> commit();

            header('Location: ../index.php');
        }else{
            header('Location: ../login.php?status=gagal&message=Username dan password salah.');
        }
    } else if ($act == 'logout') {
        $session->clear();
        $session->destroy();
        $session->commit();
 
        header('Location: ../login.php');
    }
?>