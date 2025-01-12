<?php
include "model/koneksi.php";

function getDataByRole($role) {
    $koneksi = new Koneksi();
    $db = $koneksi->getConnection();
    $table = "t_jawaban_" . $role;
    $query = "SELECT * FROM $table";
    $result = $db->query($query);
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}

// Fungsi untuk menghitung solusi rata-rata
function calculateAverageSolution($data, $criteria) {
    $averageSolution = [];
    foreach ($criteria as $criterion) {
        $averageSolution[$criterion] = array_sum(array_column($data, $criterion)) / count($data);
    }
    return $averageSolution;
}

// Fungsi untuk menghitung jarak dari solusi rata-rata
function calculateDistances($data, $averageSolution, $criteria) {
    $distances = [];
    foreach ($data as $row) {
        $distanceRow = [];
        foreach ($criteria as $criterion) {
            $distanceRow[$criterion . '_pda'] = max(0, $row[$criterion] - $averageSolution[$criterion]);
            $distanceRow[$criterion . '_nda'] = max(0, $averageSolution[$criterion] - $row[$criterion]);
        }
        $distances[] = $distanceRow;
    }
    return $distances;
}

// Function untuk menghitung nilai ASI dan ANSI
function calculateASIandANSI($distances, $criteria) {
    $asi = [];
    $ansi = [];
    foreach ($distances as $row) {
        $asiRow = 0;
        $ansiRow = 0;
        foreach ($criteria as $criterion) {
            $asiRow += $row[$criterion . '_pda'];
            $ansiRow += $row[$criterion . '_nda'];
        }
        $asi[] = $asiRow;
        $ansi[] = $ansiRow;
    }
    return ['asi' => $asi, 'ansi' => $ansi];
}

// Function menghitung nilai evaluasi (NS)
function calculateNS($asi, $ansi) {
    $ns = [];
    $asiMax = max($asi);
    $ansiMax = max($ansi);
    foreach ($asi as $key => $value) {
        $ns[$key] = 0.5 * ($asi[$key] / $asiMax) + 0.5 * (1 - $ansi[$key] / $ansiMax);
    }
    return $ns;
}

// Function mengurutkan alternatif berdasarkan nilai NS
function rankAlternatives($data, $ns) {
    array_multisort($ns, SORT_DESC, $data);
    return $data;
}

// Mendapatkan data mahasiswa
$mahasiswaData = getDataByRole('mahasiswa');

// Kriteria dan bobot
$criteria = ['criterion1', 'criterion2']; // Sesuaikan dengan kriteria yang digunakan

// Perhitungan menggunakan metode EDAS
$averageSolution = calculateAverageSolution($mahasiswaData, $criteria);
$distances = calculateDistances($mahasiswaData, $averageSolution, $criteria);
$asiAndAnsi = calculateASIandANSI($distances, $criteria);
$ns = calculateNS($asiAndAnsi['asi'], $asiAndAnsi['ansi']);
$rankedData = rankAlternatives($mahasiswaData, $ns);

// Contoh hasil perhitungan yang akan ditampilkan di tabel HTML
$results = [];
foreach ($rankedData as $key => $value) {
    $results[] = [
        'kategori' => $value['kategori'], // Sesuaikan dengan nama kolom yang relevan
        'poin' => $ns[$key],
        'peringkat' => $key + 1
    ];
}
?>
