<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: index.php");
    exit();
}

include_once 'model/Koneksi.php';
include_once 'model/User.php';
include_once 'model/Soal.php';
include_once 'model/SoalFasilitas.php';

$koneksi = new Koneksi();
$db = $koneksi->getConnection();

$username = $_SESSION['username'];
$role = $_SESSION['role'];
$profileTable = '';
$responseTable = '';
$responseColumn = '';

// Determine table and response column based on role
switch ($role) {
    case 'mahasiswa':
        $profileTable = 't_responden_mahasiswa';
        $responseTable = 't_jawaban_mahasiswa';
        $responseColumn = 'responden_mahasiswa_id';
        break;
    case 'dosen':
        $profileTable = 't_responden_dosen';
        $responseTable = 't_jawaban_dosen';
        $responseColumn = 'responden_dosen_id';
        break;
    case 'tendik':
        $profileTable = 't_responden_tendik';
        $responseTable = 't_jawaban_tendik';
        $responseColumn = 'responden_tendik_id';
        break;
    case 'alumni':
        $profileTable = 't_responden_alumni';
        $responseTable = 't_jawaban_alumni';
        $responseColumn = 'responden_alumni_id';
        break;
    case 'industri':
        $profileTable = 't_responden_industri';
        $responseTable = 't_jawaban_industri';
        $responseColumn = 'responden_industri_id';
        break;
    case 'ortu':
        $profileTable = 't_responden_ortu';
        $responseTable = 't_jawaban_ortu';
        $responseColumn = 'responden_ortu_id';
        break;
    default:
        echo "Invalid role.";
        exit();
}

try {
    $user = new User($db, $profileTable, $responseTable, $responseColumn);
    $profileData = $user->getProfile($username);
} catch (mysqli_sql_exception $e) {
    echo "Error: " . $e->getMessage();
    exit();
}

if ($profileData === null) {
    echo "Profile data not found.";
    exit();
}

$responden_id = $profileData[$responseColumn];

$soalFasilitas = new SoalFasilitas($db, $responseTable, $responseColumn);

$soal = $soalFasilitas->getSoalByKategori(2);
$kategori_id = 2;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = array();
    foreach ($soal as $row) {
        $soal_id = $row['soal_id'];
        if (isset($_POST["question$soal_id"])) {
            $jawaban = $_POST["question$soal_id"];
            $data[] = array(
                'soal_id' => $soal_id,
                'jawaban' => $jawaban,
                $responseColumn => $responden_id,
                'kategori_id' => $kategori_id
            );
        }
    }

    $soalFasilitas->postJawaban($data); // Simpan jawaban ke database

    // Calculate and save evaluation scores
    $soalFasilitas->calculateScores();

    // Redirect setelah selesai submit
    header("Location: submitdone.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Kualitas Fasilitas Politeknik Negeri Malang</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px 0 0 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
        }

        .form-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            padding: 20px;
            padding-top: 20px;
            margin-top: 20px;
        }

        .form-header h1 {
            text-align: center;
            background-color: #1a3d7c;
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            margin: 0;
            font-size: 24px;
        }

        .form-header p {
            margin: 5px 0 0;
            color: #757575;
        }

        .pentunjukpengisian {
            color: red;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .radio-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .radio-group label {
            margin-right: 10px;
        }

        button {
            background-color: #4285f4;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #357ae8;
        }

        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }

        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            background-color: #757575;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #555555;
        }

        .wide-input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        .notification {
            display: none;
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <div class="form-header">
            <h1>Survey Kualitas Fasilitas Politeknik Negeri Malang</h1>
        </div>

        <div class="form-description">
            <p><strong>Deskripsi:</strong></p>
            <p>Survei ini bertujuan untuk mengevaluasi kualitas fasilitas yang diberikan oleh Politeknik Negeri Malang.
                Fokus utama dari survei ini mencakup kurikulum, metode pengajaran, kualifikasi dan kompetensi dosen,
                serta materi pembelajaran yang digunakan.</p>

            <p><strong>Tujuan:</strong></p>
            <p>Mengidentifikasi kekuatan dan kelemahan dalam sistem pendidikan, serta memberikan data yang dapat
                digunakan untuk meningkatkan kualitas akademik dan metode pengajaran.</p>
        </div>

        <hr>

        <div class="form-header">
            <p class="pentunjukpengisian"><br>Petunjuk pengisian</p>
            <p>
                Pada bagian jawaban terdapat 5 pilihan dengan keterangan sebagai berikut: <br>
                1. Sangat tidak puas <br>
                2. Tidak puas <br>
                3. Cukup <br>
                4. Puas <br>
                5. Sangat puas <br>
            </p>
        </div>

        <hr>

        <form id="survey-form" action="" method="POST">
        <?php
            if (!empty($soal)) {
                foreach ($soal as $row) {
                    $soal_id = $row["soal_id"];
                    echo '<div class="form-group">';
                    echo '<label for="question' . $soal_id . '"><br>' . $row["soal_pertanyaan"] . ':</label>';
                    echo '<div class="radio-group">';
                    echo '<input type="radio" id="option' . $soal_id . '-1" name="question' . $soal_id . '" value="Sangat Tidak Puas">';
                    echo '<label for="option' . $soal_id . '-1">Sangat tidak puas</label>';
                    echo '<input type="radio" id="option' . $soal_id . '-2" name="question' . $soal_id . '" value="Tidak Puas">';
                    echo '<label for="option' . $soal_id . '-2">Tidak puas</label>';
                    echo '<input type="radio" id="option' . $soal_id . '-3" name="question' . $soal_id . '" value="Cukup">';
                    echo '<label for="option' . $soal_id . '-3">Cukup</label>';
                    echo '<input type="radio" id="option' . $soal_id . '-4" name="question' . $soal_id . '" value="Puas">';
                    echo '<label for="option' . $soal_id . '-4">Puas</label>';
                    echo '<input type="radio" id="option' . $soal_id . '-5" name="question' . $soal_id . '" value="Sangat Puas">';
                    echo '<label for="option' . $soal_id . '-5">Sangat Puas</label>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>Tidak ada pertanyaan yang tersedia.</p>";
            }
            ?>

            <div class="notification" id="notification">Semua pertanyaan harus diisi!</div>
            <button type="submit">Kirim</button>
            <a href="#" class="back-button" onclick="history.back()">Kembali</a>
        </form>
    </div>

    <script>
        document.getElementById('survey-form').addEventListener('submit', function (event) {
            const questions = document.querySelectorAll('[name^="question"]');
            let allFilled = true;

            questions.forEach(question => {
                const radios = document.querySelectorAll(`[name="${question.name}"]`);
                let isChecked = false;

                radios.forEach(radio => {
                    if (radio.checked) {
                        isChecked = true;
                    }
                });

                if (!isChecked) {
                    allFilled = false;
                }
            });

            if (!allFilled) {
                event.preventDefault();
                document.getElementById('notification').style.display = 'block';
            } else {
                document.getElementById('notification').style.display = 'none';
            }
        });
    </script>
</body>

</html>
