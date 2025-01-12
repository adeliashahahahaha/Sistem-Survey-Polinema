<?php
include_once('model/form_user_model.php');

$act = $_GET['act'];
$user = new User();

if ($act == 'simpan') {
    $data = [
        'role' => $_POST['role'],
        'username' => $_POST['username'],
        'responden_nama' => $_POST['responden_nama'],
        'password' => $_POST['password']
    ];

    switch ($_POST['role']) {
        case 'mahasiswa':
            $data['responden_nim'] = $_POST['responden_nim'];
            $data['responden_prodi'] = $_POST['responden_prodi'];
            $data['responden_email'] = $_POST['responden_email'];
            $data['responden_hp'] = $_POST['responden_hp'];
            $data['tahun_masuk'] = $_POST['tahun_masuk'];
            break;
        case 'dosen':
            $data['responden_nip'] = $_POST['responden_nip'];
            $data['responden_unit'] = $_POST['responden_unit'];
            break;
        case 'ortu':
            $data['responden_umur'] = $_POST['responden_umur'];
            $data['responden_jk'] = $_POST['responden_jk'];
            $data['responden_hp'] = $_POST['responden_hp'];
            $data['responden_pendidikan'] = $_POST['responden_pendidikan'];
            $data['responden_pekerjaan'] = $_POST['responden_pekerjaan'];
            $data['responden_penghasilan'] = $_POST['responden_penghasilan'];
            $data['mahasiswa_nim'] = $_POST['mahasiswa_nim'];
            $data['mahasiswa_nama'] = $_POST['mahasiswa_nama'];
            $data['mahasiswa_prodi'] = $_POST['mahasiswa_prodi'];
            break;
        case 'tendik':
            $data['responden_nopeg'] = $_POST['responden_nopeg'];
            $data['responden_unit'] = $_POST['responden_unit'];
            break;
        case 'industri':
            $data['responden_jabatan'] = $_POST['responden_jabatan'];
            $data['responden_perusahaan'] = $_POST['responden_perusahaan'];
            $data['responden_email'] = $_POST['responden_email'];
            $data['responden_hp'] = $_POST['responden_hp'];
            $data['responden_kota'] = $_POST['responden_kota'];
            break;
        case 'alumni':
            $data['responden_nim'] = $_POST['responden_nim'];
            $data['responden_prodi'] = $_POST['responden_prodi'];
            $data['responden_email'] = $_POST['responden_email'];
            $data['responden_hp'] = $_POST['responden_hp'];
            $data['tahun_lulus'] = $_POST['tahun_lulus'];
            break;
    }

    $user->insertData($data);
    header('Location: user.php');
    exit();
} elseif ($act == 'edit') {
    $id = $_GET['id'];
    $data = [
        'role' => $_POST['role'],
        'username' => $_POST['username'],
        'responden_nama' => $_POST['responden_nama'],
        'password' => $_POST['password']
    ];

    switch ($_POST['role']) {
        case 'mahasiswa':
            $data['responden_nim'] = $_POST['responden_nim'];
            $data['responden_prodi'] = $_POST['responden_prodi'];
            $data['responden_email'] = $_POST['responden_email'];
            $data['responden_hp'] = $_POST['responden_hp'];
            $data['tahun_masuk'] = $_POST['tahun_masuk'];
            break;
        case 'dosen':
            $data['responden_nip'] = $_POST['responden_nip'];
            $data['responden_unit'] = $_POST['responden_unit'];
            break;
        case 'ortu':
            $data['responden_umur'] = $_POST['responden_umur'];
            $data['responden_jk'] = $_POST['responden_jk'];
            $data['responden_hp'] = $_POST['responden_hp'];
            $data['responden_pendidikan'] = $_POST['responden_pendidikan'];
            $data['responden_pekerjaan'] = $_POST['responden_pekerjaan'];
            $data['responden_penghasilan'] = $_POST['responden_penghasilan'];
            $data['mahasiswa_nim'] = $_POST['mahasiswa_nim'];
            $data['mahasiswa_nama'] = $_POST['mahasiswa_nama'];
            $data['mahasiswa_prodi'] = $_POST['mahasiswa_prodi'];
            break;
        case 'tendik':
            $data['responden_nopeg'] = $_POST['responden_nopeg'];
            $data['responden_unit'] = $_POST['responden_unit'];
            break;
        case 'industri':
            $data['responden_jabatan'] = $_POST['responden_jabatan'];
            $data['responden_perusahaan'] = $_POST['responden_perusahaan'];
            $data['responden_email'] = $_POST['responden_email'];
            $data['responden_hp'] = $_POST['responden_hp'];
            $data['responden_kota'] = $_POST['responden_kota'];
            break;
        case 'alumni':
            $data['responden_nim'] = $_POST['responden_nim'];
            $data['responden_prodi'] = $_POST['responden_prodi'];
            $data['responden_email'] = $_POST['responden_email'];
            $data['responden_hp'] = $_POST['responden_hp'];
            $data['tahun_lulus'] = $_POST['tahun_lulus'];
            break;
    }

    $user->updateData($id, $data);
    header('Location: user.php');
    exit();
} elseif ($act == 'delete') {
    $id = $_GET['id'];
    $role = $_GET['role'];
    $user->deleteData($id, $role);
    header('Location: user.php');
    exit();
} else {
    // Handle case where $act is not recognized
    header('Location: user.php'); // Redirect to user.php if $act is not recognized
    exit();
}
?>