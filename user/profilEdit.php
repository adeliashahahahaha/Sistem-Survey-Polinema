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

// Mendapatkan role pengguna dari sesi atau database (tergantung implementasi Anda)
$role = 'mahasiswa'; // Contoh, sesuaikan dengan logika Anda untuk mendapatkan role

$user = new User($db, 'nama_tabel_profil', 'nama_tabel_responden', 'kolom_id_responden');
$mahasiswa = new Mahasiswa($db);

// Logika untuk menyimpan perubahan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang di-post dari form
    $data = array(
        'nama' => $_POST['nama'],
        'nim' => $_POST['nim'],
        'prodi' => $_POST['prodi'],
        'email' => $_POST['email'],
        'hp' => $_POST['hp'],
        'tahun_masuk' => $_POST['tahun_masuk']
    );

    // Lakukan validasi data jika diperlukan

    // Update data profil
    $result = $user->updateProfile($username, $data, $role);

    if ($result) {
        // Redirect kembali ke halaman profil dengan pesan sukses
        header("Location: profil.php?pesan=edit_sukses");
        exit();
    } else {
        // Redirect kembali ke halaman profil dengan pesan error
        header("Location: profil.php?pesan=edit_gagal");
        exit();
    }
}

// Ambil data profil dari database sesuai dengan role
$data = $user->getProfile($username, $role);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <!-- Masukkan stylesheet yang dibutuhkan -->
    <style>
        /* Gaya CSS tetap di sini */
    </style>
</head>
<body>
    <header>
        <!-- Header tetap di sini -->
    </header>
    <div class="container">
        <main>
            <div class="profile-border">
                <div class="profile-info">
                    <!-- Form untuk mengedit profil -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="info-item">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" value="<?= htmlspecialchars($data['responden_nama']) ?>">
                        </div>
                        <div class="info-item">
                            <label>Nim</label>
                            <input type="text" name="nim" value="<?= htmlspecialchars($data['responden_nim']) ?>">
                        </div>
                        <div class="info-item">
                            <label>Program Studi</label>
                            <input type="text" name="prodi" value="<?= htmlspecialchars($data['responden_prodi']) ?>">
                        </div>
                        <div class="info-item">
                            <label>Email</label>
                            <input type="email" name="email" value="<?= htmlspecialchars($data['responden_email']) ?>">
                        </div>
                        <div class="info-item">
                            <label>No Hp</label>
                            <input type="text" name="hp" value="<?= htmlspecialchars($data['responden_hp']) ?>">
                        </div>
                        <div class="info-item">
                            <label>Tahun Masuk</label>
                            <input type="text" name="tahun_masuk" value="<?= htmlspecialchars($data['tahun_masuk']) ?>">
                        </div>
                        <button type="submit" class="edit-profile">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <footer>
        <!-- Footer tetap di sini -->
    </footer>
</body>
</html>
