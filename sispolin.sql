-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 05:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispolin`
--

-- --------------------------------------------------------

--
-- Table structure for table `eda_alternatives`
--

CREATE TABLE `eda_alternatives` (
  `id_alternative` smallint(5) UNSIGNED NOT NULL,
  `fk_kategori_id` int(11) DEFAULT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eda_alternatives`
--

INSERT INTO `eda_alternatives` (`id_alternative`, `fk_kategori_id`, `name`) VALUES
(1, NULL, 'Kualitas Pendidikan'),
(2, NULL, 'Kualitas Fasilitas'),
(3, NULL, 'Kualitas Pelayanan'),
(4, NULL, 'Kualitas Lulusan');

-- --------------------------------------------------------

--
-- Table structure for table `eda_criterias`
--

CREATE TABLE `eda_criterias` (
  `id_criteria` tinyint(3) UNSIGNED NOT NULL,
  `code` varchar(10) NOT NULL,
  `criteria` varchar(255) NOT NULL,
  `weight` float NOT NULL,
  `attribute` set('benefit','cost') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eda_criterias`
--

INSERT INTO `eda_criterias` (`id_criteria`, `code`, `criteria`, `weight`, `attribute`) VALUES
(1, 'C1', 'Tangibles', 0.1, 'benefit'),
(2, 'C2', 'Reliability', 0.2, 'benefit'),
(3, 'C3', 'Responsiveness', 0.3, 'benefit'),
(4, 'C4', 'Assurance', 0.25, 'benefit'),
(5, 'C5', 'Empathy', 0.15, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `eda_evaluations`
--

CREATE TABLE `eda_evaluations` (
  `id_alternative` smallint(5) UNSIGNED NOT NULL,
  `id_criteria` tinyint(3) UNSIGNED NOT NULL,
  `value` float NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eda_evaluations`
--

INSERT INTO `eda_evaluations` (`id_alternative`, `id_criteria`, `value`, `updated_at`) VALUES
(1, 1, 0.222222, '2024-06-22 21:40:36'),
(1, 2, 0.666667, '2024-06-22 21:40:36'),
(1, 3, 0.666667, '2024-06-22 21:40:36'),
(1, 4, 0.777778, '2024-06-22 21:40:36'),
(1, 5, 0.722222, '2024-06-22 21:40:36'),
(2, 1, 0.5, '2024-06-22 21:40:36'),
(2, 2, 0.722222, '2024-06-22 21:40:36'),
(2, 3, 0.611111, '2024-06-22 21:40:36'),
(2, 4, 0.666667, '2024-06-22 21:40:36'),
(2, 5, 0.444444, '2024-06-22 21:40:36'),
(3, 1, 0.722222, '2024-06-22 21:40:36'),
(3, 2, 0.777778, '2024-06-22 21:40:36'),
(3, 3, 0.611111, '2024-06-22 21:40:36'),
(3, 4, 0.666667, '2024-06-22 21:40:36'),
(3, 5, 0.666667, '2024-06-22 21:40:36'),
(4, 1, 0.555556, '2024-06-22 21:40:36'),
(4, 2, 0.666667, '2024-06-22 21:40:36'),
(4, 3, 0.666667, '2024-06-22 21:40:36'),
(4, 4, 0.5, '2024-06-22 21:40:36'),
(4, 5, 0.722222, '2024-06-22 21:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori`
--

CREATE TABLE `m_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_kategori`
--

INSERT INTO `m_kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Kualitas Pendidikan'),
(2, 'Kualitas Fasilitas'),
(3, 'Kualitas Pelayanan'),
(4, 'Kualitas Lulusan');

-- --------------------------------------------------------

--
-- Table structure for table `m_survey`
--

CREATE TABLE `m_survey` (
  `survey_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `survey_kode` varchar(20) DEFAULT NULL,
  `survey_nama` varchar(50) DEFAULT NULL,
  `survey_deskripsi` text DEFAULT NULL,
  `survey_tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_survey`
--

INSERT INTO `m_survey` (`survey_id`, `user_id`, `survey_kode`, `survey_nama`, `survey_deskripsi`, `survey_tanggal`) VALUES
(1, 1, 'M', 'K.Pendidikan', 'Survei ini bertujuan untuk mengevaluasi kualitas pendidikan yang diberikan oleh Politeknik Negeri Malang. ', '2024-06-17 15:41:00'),
(2, 1, 'M', 'K.Fasilitas', 'Survei ini bertujuan untuk mengevaluasi kualitas fasilitas yang diberikan oleh Politeknik Negeri Malang.', '2024-06-17 15:38:00'),
(3, 1, 'M', 'K.Pelayanan', 'Survei ini bertujuan untuk mengevaluasi kualitas pelayanan yang diberikan oleh Politeknik Negeri Malang. ', '2024-06-17 15:42:00'),
(4, 1, 'M', 'K.Lulusan', 'Survei ini bertujuan untuk mengevaluasi kualitas lulusan yang diberikan oleh Politeknik Negeri Malang.', '2024-06-17 15:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `m_survey_soal`
--

CREATE TABLE `m_survey_soal` (
  `soal_id` int(11) NOT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `soal_jenis` enum('pilihan_ganda','isian') DEFAULT NULL,
  `soal_pertanyaan` varchar(500) DEFAULT NULL,
  `survey_jenis` enum('tangible','reability','assurance','responsiveness','empathy') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_survey_soal`
--

INSERT INTO `m_survey_soal` (`soal_id`, `survey_id`, `kategori_id`, `no_urut`, `soal_jenis`, `soal_pertanyaan`, `survey_jenis`) VALUES
(1, 1, 1, 1, 'pilihan_ganda', 'Kualitas lingkungan POLINEMA selalu menjaga kebersihan dan kerapihan?', 'tangible'),
(2, 1, 1, 2, 'pilihan_ganda', 'Fasilitas yang disediakan memberi kenyamanan?', 'tangible'),
(3, 1, 1, 3, 'pilihan_ganda', 'Kualitas peralatan dan perlengkapan yang digunakan hari ini nyaman?', 'tangible'),
(4, 1, 1, 4, 'pilihan_ganda', 'Pelayanan yang diberikan dapat diandalkan.', 'reability'),
(5, 1, 1, 5, 'pilihan_ganda', 'Kualitas layanan yang diberikan selalu konsistensi.', 'reability'),
(6, 1, 1, 6, 'pilihan_ganda', 'Layanan yang diberikan selalu tepat waktu.', 'reability'),
(7, 1, 1, 7, 'pilihan_ganda', 'Staf selalu profesional dalam memberikan layanan.', 'assurance'),
(8, 1, 1, 8, 'pilihan_ganda', 'Staf mampu memberikan layanan terhadap mahasiswa/dosen/dan lainnya dengan baik.', 'assurance'),
(9, 1, 1, 9, 'pilihan_ganda', 'Staf memberikan keamanan dan kenyamanan dalam menangani masalah?', 'assurance'),
(10, 1, 1, 10, 'pilihan_ganda', 'Staf selalu bersedia dalam mendengarkan keluhan atau masalah hari ini?', 'empathy'),
(11, 1, 1, 11, 'pilihan_ganda', 'Staf selalu memberikan perhatian terhadap kebutuhan hari ini', 'empathy'),
(12, 1, 1, 12, 'pilihan_ganda', 'Staf selalu ramah dalam melayani kebutuhan hari ini', 'empathy'),
(13, 1, 1, 13, 'pilihan_ganda', 'Kecepatan respon staf terhadap permintaan Anda cepat tanggap?', 'responsiveness'),
(14, 1, 1, 14, 'pilihan_ganda', 'Staf mampu menangani masalah dengan segera?', 'responsiveness'),
(15, 1, 1, 15, 'pilihan_ganda', 'Staf selalu sigap dalam memberikan bantuan?', 'responsiveness'),
(16, 2, 2, 1, 'pilihan_ganda', 'Fasilitas gedung dan ruang kelas dapat dipergunakan sangat baik ', 'tangible'),
(17, 2, 2, 2, 'pilihan_ganda', 'Fasilitas laboratorium yang disediakam memadai untuk kebutuhan belajar?', 'tangible'),
(18, 2, 2, 3, 'pilihan_ganda', 'Fasilitas parkir yang disediakan sudah cukup dan aman?', 'reability'),
(19, 2, 2, 4, 'pilihan_ganda', 'Fasilitas umum seperti toilet dan ruang istirahat sering dibersihkan?', 'reability'),
(20, 2, 2, 5, 'pilihan_ganda', 'Fasilitas jaringan internet yang disediakan dapat diandalkan?', 'reability'),
(21, 2, 2, 6, 'pilihan_ganda', 'Layanan perawatan fasilitas dapat dilakukan secara berkala?', 'reability'),
(22, 2, 2, 7, 'pilihan_ganda', 'Terdapat jaminan keamanan dan keselamatan dalam penggunaan fasilitas?', 'assurance'),
(23, 2, 2, 8, 'pilihan_ganda', 'Fasilitas selalu siap digunakan?', 'assurance'),
(24, 2, 2, 9, 'pilihan_ganda', 'Sistem keamanan berjalan dengan baik dan efektif?', 'assurance'),
(25, 2, 2, 10, 'pilihan_ganda', 'Kampus menyediakan beasiswa bagi mahasiswa yang tidak mampu?', 'empathy'),
(26, 2, 2, 11, 'pilihan_ganda', 'Kampus selalu memberikan reward kepada mahasiswa yang berprestasi?', 'empathy'),
(27, 2, 2, 12, 'pilihan_ganda', 'Kepedulian dalam menyediakan fasilitas untuk kegiatan non-akademik?', 'empathy'),
(28, 2, 2, 13, 'pilihan_ganda', 'Apakah layanan perawatan fasilitas dapat dilakukan secara berkala?', 'responsiveness'),
(29, 2, 2, 14, 'pilihan_ganda', 'Respon teknisi IT dalam menangani masalah sangat baik?', 'responsiveness'),
(30, 2, 2, 15, 'pilihan_ganda', 'Layanan peminjaman peralatan dilakukan dengan cepat dan efisien?', 'responsiveness'),
(31, 3, 3, 1, 'pilihan_ganda', 'Fasilitas layanan administrasi seperti loket pelayanan nyaman dan memadai?', 'tangible'),
(32, 3, 3, 2, 'pilihan_ganda', 'Kondisi ruangan layanan mahasiswa seperti biro akademik dan kemahasiswaan bersih dan nyaman?', 'tangible'),
(33, 3, 3, 3, 'pilihan_ganda', 'Fasilitas pelayanan kesehatan sangat lengkap dan memadai?', 'tangible'),
(34, 3, 3, 4, 'pilihan_ganda', 'Pelayanan administrasi akademik dilakukan dengan tepat waktu dan akurat?', 'reability'),
(35, 3, 3, 5, 'pilihan_ganda', 'Layanan informasi akademik yang diberikan dapat diandalkan?', 'reability'),
(36, 3, 3, 6, 'pilihan_ganda', 'Staf pelayanan selalu siap membantu ketika dibutuhkan?', 'reability'),
(37, 3, 3, 7, 'pilihan_ganda', 'Staf administrasi selalu profesional dalam memberikan layanan?', 'assurance'),
(38, 3, 3, 8, 'pilihan_ganda', 'Kemampuan pengetahuan staf dalam menjawab pertanyaan terkait administrasi?', 'assurance'),
(39, 3, 3, 9, 'pilihan_ganda', 'Anda merasa aman dan nyaman dalam berkomunikasi dengan staf administrasi?', 'assurance'),
(40, 3, 3, 10, 'pilihan_ganda', 'Staf administrasi memahami dan memberikan solusi yang sesuai dengan masalah Anda?', 'empathy'),
(41, 3, 3, 11, 'pilihan_ganda', 'Staf administrasi memperhatikan kebutuhan dan keinginan Anda sebagai mahasiswa dengan baik?', 'empathy'),
(42, 3, 3, 12, 'pilihan_ganda', 'Kepuasan Anda terhadap sikap ramah dan perhatian staf administrasi?', 'empathy'),
(43, 3, 3, 13, 'pilihan_ganda', 'Staf administrasi merespon pertanyaan atau keluhan Anda dengan cepat tanggap?', 'responsiveness'),
(44, 3, 3, 14, 'pilihan_ganda', 'Respon biro kemahasiswaan terhadap permintaan Anda terkait kegiatan mahasiswa cepat tanggap?', 'responsiveness'),
(45, 3, 3, 15, 'pilihan_ganda', 'Komunikasi pada layanan pelanggan dapat dihubungi setiap saat?', 'responsiveness'),
(46, 4, 4, 1, 'pilihan_ganda', 'Fasilitas fisik yang disediakam mendukung persiapan kerja bagi lulusan?', 'tangible'),
(47, 4, 4, 2, 'pilihan_ganda', 'Sarana penunjang kegiatan alumni memadai?', 'tangible'),
(48, 4, 4, 3, 'pilihan_ganda', 'Fasilitas ruang pertemuan untuk kegiatan alumni sangat baik?', 'tangible'),
(49, 4, 4, 4, 'pilihan_ganda', 'Sistem informasi untuk alumni dan mencari pekerjaan dapat diandalkan?', 'reability'),
(50, 4, 4, 5, 'pilihan_ganda', 'Dukungan terhadap lulusan selalu konsisten dan dapat diandalkan?', 'reability'),
(51, 4, 4, 6, 'pilihan_ganda', 'Sistem informasi untuk alumni dan mencari pekerjaan dapat diandalkan?', 'reability'),
(52, 4, 4, 7, 'pilihan_ganda', 'Kampus memberikan dukungan yang memadai dalam membantu lulusan mencari pekerjaan?', 'assurance'),
(53, 4, 4, 8, 'pilihan_ganda', 'Data alumni di sistem POLINEMA aman dan terjaga?', 'assurance'),
(54, 4, 4, 9, 'pilihan_ganda', 'Pelatihan yang diberikan kepada lulusan relevan dengan kebutuhan industri?', 'assurance'),
(55, 4, 4, 10, 'pilihan_ganda', 'Kampus sangat memperhatikan kebutuhan karir para lulusan?', 'empathy'),
(56, 4, 4, 11, 'pilihan_ganda', 'Menunjukkan kepedulian terhadap perkembangan karir alumni?', 'empathy'),
(57, 4, 4, 12, 'pilihan_ganda', 'Kampus sangat empati dalam mendukung alumni yang menghadapi kesulitan dalam dunia kerja?', 'empathy'),
(58, 4, 4, 13, 'pilihan_ganda', 'Bantuan informasi yang dibutuhkan alumni cepat tanggap?', 'responsiveness'),
(59, 4, 4, 14, 'pilihan_ganda', 'Layanan konsultasi karir cepat tanggap terhadap permintaan Anda?', 'responsiveness'),
(60, 4, 4, 15, 'pilihan_ganda', 'Kampus merespon terhadap permintaan dukungan dari para alumni?', 'responsiveness');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `keterangan` enum('admin','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`user_id`, `username`, `nama`, `password`, `level`, `keterangan`) VALUES
(1, 'admin', 'Administrator', '$2y$10$CauvHy0gNpWUVHjtEV/USemS94TrDpov/4.jbm2qHoBtfBohjfXk6', NULL, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `t_jawaban_alumni`
--

CREATE TABLE `t_jawaban_alumni` (
  `jawaban_alumni_id` int(11) NOT NULL,
  `responden_alumni_id` int(11) DEFAULT NULL,
  `soal_id` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `skor` decimal(10,2) DEFAULT 0.00,
  `responden_tanggal` datetime DEFAULT current_timestamp(),
  `kategori_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_jawaban_alumni`
--

INSERT INTO `t_jawaban_alumni` (`jawaban_alumni_id`, `responden_alumni_id`, `soal_id`, `jawaban`, `skor`, `responden_tanggal`, `kategori_id`) VALUES
(1, 1, 31, 'Sangat Puas', '5.00', '2024-06-23 03:42:22', 3),
(2, 1, 32, 'Puas', '4.00', '2024-06-23 03:42:22', 3),
(3, 1, 33, 'Puas', '4.00', '2024-06-23 03:42:22', 3),
(4, 1, 34, 'Sangat Puas', '5.00', '2024-06-23 03:42:22', 3),
(5, 1, 35, 'Sangat Puas', '5.00', '2024-06-23 03:42:22', 3),
(6, 1, 36, 'Puas', '4.00', '2024-06-23 03:42:22', 3),
(7, 1, 37, 'Puas', '4.00', '2024-06-23 03:42:22', 3),
(8, 1, 38, 'Cukup', '3.00', '2024-06-23 03:42:22', 3),
(9, 1, 39, 'Sangat Puas', '5.00', '2024-06-23 03:42:22', 3),
(10, 1, 40, 'Puas', '4.00', '2024-06-23 03:42:22', 3),
(11, 1, 41, 'Sangat Puas', '5.00', '2024-06-23 03:42:23', 3),
(12, 1, 42, 'Cukup', '3.00', '2024-06-23 03:42:23', 3),
(13, 1, 43, 'Puas', '4.00', '2024-06-23 03:42:23', 3),
(14, 1, 44, 'Sangat Puas', '5.00', '2024-06-23 03:42:23', 3),
(15, 1, 45, 'Tidak Puas', '2.00', '2024-06-23 03:42:23', 3),
(16, 1, 46, 'Tidak Puas', '2.00', '2024-06-23 03:42:39', 4),
(17, 1, 47, 'Cukup', '3.00', '2024-06-23 03:42:39', 4),
(18, 1, 48, 'Sangat Puas', '5.00', '2024-06-23 03:42:39', 4),
(19, 1, 49, 'Sangat Puas', '5.00', '2024-06-23 03:42:39', 4),
(20, 1, 50, 'Puas', '4.00', '2024-06-23 03:42:39', 4),
(21, 1, 51, 'Cukup', '3.00', '2024-06-23 03:42:39', 4),
(22, 1, 52, 'Tidak Puas', '2.00', '2024-06-23 03:42:39', 4),
(23, 1, 53, 'Cukup', '3.00', '2024-06-23 03:42:39', 4),
(24, 1, 54, 'Puas', '4.00', '2024-06-23 03:42:39', 4),
(25, 1, 55, 'Sangat Puas', '5.00', '2024-06-23 03:42:39', 4),
(26, 1, 56, 'Puas', '4.00', '2024-06-23 03:42:39', 4),
(27, 1, 57, 'Puas', '4.00', '2024-06-23 03:42:39', 4),
(28, 1, 58, 'Cukup', '3.00', '2024-06-23 03:42:39', 4),
(29, 1, 59, 'Sangat Puas', '5.00', '2024-06-23 03:42:39', 4),
(30, 1, 60, 'Puas', '4.00', '2024-06-23 03:42:39', 4);

-- --------------------------------------------------------

--
-- Table structure for table `t_jawaban_dosen`
--

CREATE TABLE `t_jawaban_dosen` (
  `jawaban_dosen_id` int(11) NOT NULL,
  `responden_dosen_id` int(11) DEFAULT NULL,
  `soal_id` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `skor` decimal(10,2) DEFAULT 0.00,
  `responden_tanggal` datetime DEFAULT current_timestamp(),
  `kategori_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_jawaban_industri`
--

CREATE TABLE `t_jawaban_industri` (
  `jawaban_industri_id` int(11) NOT NULL,
  `responden_industri_id` int(11) DEFAULT NULL,
  `soal_id` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `skor` decimal(10,2) DEFAULT 0.00,
  `responden_tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `kategori_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_jawaban_mahasiswa`
--

CREATE TABLE `t_jawaban_mahasiswa` (
  `jawaban_mahasiswa_id` int(11) NOT NULL,
  `responden_mahasiswa_id` int(11) DEFAULT NULL,
  `soal_id` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `skor` decimal(10,2) DEFAULT 0.00,
  `responden_tanggal` datetime DEFAULT current_timestamp(),
  `kategori_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_jawaban_mahasiswa`
--

INSERT INTO `t_jawaban_mahasiswa` (`jawaban_mahasiswa_id`, `responden_mahasiswa_id`, `soal_id`, `jawaban`, `skor`, `responden_tanggal`, `kategori_id`) VALUES
(1, 1, 1, 'Sangat Tidak Puas', '1.00', '2024-06-23 04:40:20', 1),
(2, 1, 2, 'Sangat Tidak Puas', '1.00', '2024-06-23 04:40:20', 1),
(3, 1, 3, 'Tidak Puas', '2.00', '2024-06-23 04:40:20', 1),
(4, 1, 4, 'Cukup', '3.00', '2024-06-23 04:40:20', 1),
(5, 1, 5, 'Puas', '4.00', '2024-06-23 04:40:20', 1),
(6, 1, 6, 'Sangat Puas', '5.00', '2024-06-23 04:40:20', 1),
(7, 1, 7, 'Puas', '4.00', '2024-06-23 04:40:20', 1),
(8, 1, 8, 'Sangat Puas', '5.00', '2024-06-23 04:40:20', 1),
(9, 1, 9, 'Sangat Puas', '5.00', '2024-06-23 04:40:20', 1),
(10, 1, 10, 'Puas', '4.00', '2024-06-23 04:40:20', 1),
(11, 1, 11, 'Puas', '4.00', '2024-06-23 04:40:20', 1),
(12, 1, 12, 'Sangat Puas', '5.00', '2024-06-23 04:40:20', 1),
(13, 1, 13, 'Puas', '4.00', '2024-06-23 04:40:20', 1),
(14, 1, 14, 'Sangat Puas', '5.00', '2024-06-23 04:40:20', 1),
(15, 1, 15, 'Cukup', '3.00', '2024-06-23 04:40:20', 1),
(16, 1, 16, 'Sangat Puas', '5.00', '2024-06-23 04:40:36', 2),
(17, 1, 17, 'Puas', '4.00', '2024-06-23 04:40:36', 2),
(18, 1, 18, 'Cukup', '3.00', '2024-06-23 04:40:36', 2),
(19, 1, 19, 'Cukup', '3.00', '2024-06-23 04:40:36', 2),
(20, 1, 20, 'Puas', '4.00', '2024-06-23 04:40:36', 2),
(21, 1, 21, 'Cukup', '3.00', '2024-06-23 04:40:36', 2),
(22, 1, 22, 'Puas', '4.00', '2024-06-23 04:40:36', 2),
(23, 1, 23, 'Sangat Puas', '5.00', '2024-06-23 04:40:36', 2),
(24, 1, 24, 'Cukup', '3.00', '2024-06-23 04:40:36', 2),
(25, 1, 25, 'Cukup', '3.00', '2024-06-23 04:40:36', 2),
(26, 1, 26, 'Cukup', '3.00', '2024-06-23 04:40:36', 2),
(27, 1, 27, 'Tidak Puas', '2.00', '2024-06-23 04:40:36', 2),
(28, 1, 28, 'Puas', '4.00', '2024-06-23 04:40:36', 2),
(29, 1, 29, 'Puas', '4.00', '2024-06-23 04:40:36', 2),
(30, 1, 30, 'Cukup', '3.00', '2024-06-23 04:40:36', 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_jawaban_ortu`
--

CREATE TABLE `t_jawaban_ortu` (
  `jawaban_ortu_id` int(11) NOT NULL,
  `responden_ortu_id` int(11) DEFAULT NULL,
  `soal_id` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `skor` decimal(10,2) DEFAULT 0.00,
  `responden_tanggal` datetime DEFAULT current_timestamp(),
  `kategori_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_jawaban_tendik`
--

CREATE TABLE `t_jawaban_tendik` (
  `jawaban_tendik_id` int(11) NOT NULL,
  `responden_tendik_id` int(11) DEFAULT NULL,
  `soal_id` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `skor` decimal(10,2) DEFAULT 0.00,
  `responden_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `kategori_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_responden_alumni`
--

CREATE TABLE `t_responden_alumni` (
  `responden_alumni_id` int(11) NOT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `responden_nim` varchar(20) DEFAULT NULL,
  `responden_nama` varchar(50) DEFAULT NULL,
  `responden_prodi` varchar(100) DEFAULT NULL,
  `responden_email` varchar(100) DEFAULT NULL,
  `responden_hp` varchar(20) DEFAULT NULL,
  `tahun_lulus` year(4) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_responden_alumni`
--

INSERT INTO `t_responden_alumni` (`responden_alumni_id`, `survey_id`, `responden_nim`, `responden_nama`, `responden_prodi`, `responden_email`, `responden_hp`, `tahun_lulus`, `username`, `password`) VALUES
(1, NULL, '2241760066', 'Afiqur rahman', 'D4 SIB', 'rahman.fiq@gmail.com', '089668133439', 2024, 'alumni1', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `t_responden_dosen`
--

CREATE TABLE `t_responden_dosen` (
  `responden_dosen_id` int(11) NOT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `responden_nip` varchar(20) DEFAULT NULL,
  `responden_nama` varchar(50) DEFAULT NULL,
  `responden_unit` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_responden_industri`
--

CREATE TABLE `t_responden_industri` (
  `responden_industri_id` int(11) NOT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `responden_nama` varchar(50) DEFAULT NULL,
  `responden_jabatan` varchar(50) DEFAULT NULL,
  `responden_perusahaan` varchar(50) DEFAULT NULL,
  `responden_email` varchar(100) DEFAULT NULL,
  `responden_hp` varchar(20) DEFAULT NULL,
  `responden_kota` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_responden_mahasiswa`
--

CREATE TABLE `t_responden_mahasiswa` (
  `responden_mahasiswa_id` int(11) NOT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `responden_nim` varchar(20) DEFAULT NULL,
  `responden_nama` varchar(50) DEFAULT NULL,
  `responden_prodi` varchar(100) DEFAULT NULL,
  `responden_email` varchar(100) DEFAULT NULL,
  `responden_hp` varchar(20) DEFAULT NULL,
  `tahun_masuk` year(4) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_responden_mahasiswa`
--

INSERT INTO `t_responden_mahasiswa` (`responden_mahasiswa_id`, `survey_id`, `responden_nim`, `responden_nama`, `responden_prodi`, `responden_email`, `responden_hp`, `tahun_masuk`, `username`, `password`) VALUES
(1, NULL, '2241760066', 'Adelia Syaharani', 'D4 SIB', 'adeliash.smansa@gmail.com', '081331421359', 2022, 'adelia', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `t_responden_ortu`
--

CREATE TABLE `t_responden_ortu` (
  `responden_ortu_id` int(11) NOT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `responden_nama` varchar(50) DEFAULT NULL,
  `responden_jk` enum('laki-laki','perempuan') DEFAULT NULL,
  `responden_umur` tinyint(4) DEFAULT NULL,
  `responden_hp` varchar(20) DEFAULT NULL,
  `responden_pendidikan` varchar(30) DEFAULT NULL,
  `responden_pekerjaan` varchar(50) DEFAULT NULL,
  `responden_penghasilan` varchar(20) DEFAULT NULL,
  `mahasiswa_nim` varchar(20) DEFAULT NULL,
  `mahasiswa_nama` varchar(50) DEFAULT NULL,
  `mahasiswa_prodi` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_responden_tendik`
--

CREATE TABLE `t_responden_tendik` (
  `responden_tendik_id` int(11) NOT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `responden_nopeg` varchar(20) DEFAULT NULL,
  `responden_nama` varchar(50) DEFAULT NULL,
  `responden_unit` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eda_alternatives`
--
ALTER TABLE `eda_alternatives`
  ADD KEY `fk_kategori_id` (`fk_kategori_id`);

--
-- Indexes for table `eda_evaluations`
--
ALTER TABLE `eda_evaluations`
  ADD PRIMARY KEY (`id_alternative`,`id_criteria`);

--
-- Indexes for table `m_kategori`
--
ALTER TABLE `m_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `m_survey`
--
ALTER TABLE `m_survey`
  ADD PRIMARY KEY (`survey_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `m_survey_soal`
--
ALTER TABLE `m_survey_soal`
  ADD PRIMARY KEY (`soal_id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `survey_id` (`survey_id`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `t_jawaban_alumni`
--
ALTER TABLE `t_jawaban_alumni`
  ADD PRIMARY KEY (`jawaban_alumni_id`),
  ADD KEY `fk_responden_alumni_id` (`responden_alumni_id`),
  ADD KEY `fk_3_soal_id` (`soal_id`);

--
-- Indexes for table `t_jawaban_dosen`
--
ALTER TABLE `t_jawaban_dosen`
  ADD PRIMARY KEY (`jawaban_dosen_id`),
  ADD KEY `fk_responden_dosen_id` (`responden_dosen_id`),
  ADD KEY `fk_soal_id` (`soal_id`);

--
-- Indexes for table `t_jawaban_industri`
--
ALTER TABLE `t_jawaban_industri`
  ADD PRIMARY KEY (`jawaban_industri_id`),
  ADD KEY `fk_responden_industri_id` (`responden_industri_id`),
  ADD KEY `fk_5_soal_id` (`soal_id`);

--
-- Indexes for table `t_jawaban_mahasiswa`
--
ALTER TABLE `t_jawaban_mahasiswa`
  ADD PRIMARY KEY (`jawaban_mahasiswa_id`),
  ADD KEY `fk_responden_mahasiswa_id` (`responden_mahasiswa_id`),
  ADD KEY `fk_2_soal_id` (`soal_id`);

--
-- Indexes for table `t_jawaban_ortu`
--
ALTER TABLE `t_jawaban_ortu`
  ADD PRIMARY KEY (`jawaban_ortu_id`),
  ADD KEY `fk_responden_ortu_id` (`responden_ortu_id`),
  ADD KEY `fk_4_soal_id` (`soal_id`);

--
-- Indexes for table `t_jawaban_tendik`
--
ALTER TABLE `t_jawaban_tendik`
  ADD PRIMARY KEY (`jawaban_tendik_id`),
  ADD KEY `fk_1_responden_tendik_id` (`responden_tendik_id`),
  ADD KEY `fk_1_soal_id` (`soal_id`);

--
-- Indexes for table `t_responden_alumni`
--
ALTER TABLE `t_responden_alumni`
  ADD PRIMARY KEY (`responden_alumni_id`),
  ADD KEY `fk_3_survey_id` (`survey_id`);

--
-- Indexes for table `t_responden_dosen`
--
ALTER TABLE `t_responden_dosen`
  ADD PRIMARY KEY (`responden_dosen_id`),
  ADD KEY `fk_survey_id` (`survey_id`);

--
-- Indexes for table `t_responden_industri`
--
ALTER TABLE `t_responden_industri`
  ADD PRIMARY KEY (`responden_industri_id`),
  ADD KEY `fk_5_survey_id` (`survey_id`);

--
-- Indexes for table `t_responden_mahasiswa`
--
ALTER TABLE `t_responden_mahasiswa`
  ADD PRIMARY KEY (`responden_mahasiswa_id`),
  ADD KEY `fk_2_survey_id` (`survey_id`);

--
-- Indexes for table `t_responden_ortu`
--
ALTER TABLE `t_responden_ortu`
  ADD PRIMARY KEY (`responden_ortu_id`),
  ADD KEY `fk_4_survey_id` (`survey_id`);

--
-- Indexes for table `t_responden_tendik`
--
ALTER TABLE `t_responden_tendik`
  ADD PRIMARY KEY (`responden_tendik_id`),
  ADD KEY `fk_1_survey_id` (`survey_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_kategori`
--
ALTER TABLE `m_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_survey`
--
ALTER TABLE `m_survey`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_survey_soal`
--
ALTER TABLE `m_survey_soal`
  MODIFY `soal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `t_jawaban_alumni`
--
ALTER TABLE `t_jawaban_alumni`
  MODIFY `jawaban_alumni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `t_jawaban_dosen`
--
ALTER TABLE `t_jawaban_dosen`
  MODIFY `jawaban_dosen_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_jawaban_industri`
--
ALTER TABLE `t_jawaban_industri`
  MODIFY `jawaban_industri_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_jawaban_mahasiswa`
--
ALTER TABLE `t_jawaban_mahasiswa`
  MODIFY `jawaban_mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `t_jawaban_ortu`
--
ALTER TABLE `t_jawaban_ortu`
  MODIFY `jawaban_ortu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_jawaban_tendik`
--
ALTER TABLE `t_jawaban_tendik`
  MODIFY `jawaban_tendik_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_responden_alumni`
--
ALTER TABLE `t_responden_alumni`
  MODIFY `responden_alumni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_responden_dosen`
--
ALTER TABLE `t_responden_dosen`
  MODIFY `responden_dosen_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_responden_industri`
--
ALTER TABLE `t_responden_industri`
  MODIFY `responden_industri_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_responden_mahasiswa`
--
ALTER TABLE `t_responden_mahasiswa`
  MODIFY `responden_mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_responden_ortu`
--
ALTER TABLE `t_responden_ortu`
  MODIFY `responden_ortu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_responden_tendik`
--
ALTER TABLE `t_responden_tendik`
  MODIFY `responden_tendik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eda_alternatives`
--
ALTER TABLE `eda_alternatives`
  ADD CONSTRAINT `fk_kategori_id` FOREIGN KEY (`fk_kategori_id`) REFERENCES `m_kategori` (`kategori_id`);

--
-- Constraints for table `m_survey`
--
ALTER TABLE `m_survey`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`);

--
-- Constraints for table `m_survey_soal`
--
ALTER TABLE `m_survey_soal`
  ADD CONSTRAINT `kategori_id` FOREIGN KEY (`kategori_id`) REFERENCES `m_kategori` (`kategori_id`),
  ADD CONSTRAINT `survey_id` FOREIGN KEY (`survey_id`) REFERENCES `m_survey` (`survey_id`);

--
-- Constraints for table `t_jawaban_alumni`
--
ALTER TABLE `t_jawaban_alumni`
  ADD CONSTRAINT `fk_3_soal_id` FOREIGN KEY (`soal_id`) REFERENCES `m_survey_soal` (`soal_id`),
  ADD CONSTRAINT `fk_responden_alumni_id` FOREIGN KEY (`responden_alumni_id`) REFERENCES `t_responden_alumni` (`responden_alumni_id`);

--
-- Constraints for table `t_jawaban_dosen`
--
ALTER TABLE `t_jawaban_dosen`
  ADD CONSTRAINT `fk_responden_dosen_id` FOREIGN KEY (`responden_dosen_id`) REFERENCES `t_responden_dosen` (`responden_dosen_id`),
  ADD CONSTRAINT `fk_soal_id` FOREIGN KEY (`soal_id`) REFERENCES `m_survey_soal` (`soal_id`);

--
-- Constraints for table `t_jawaban_industri`
--
ALTER TABLE `t_jawaban_industri`
  ADD CONSTRAINT `fk_5_soal_id` FOREIGN KEY (`soal_id`) REFERENCES `m_survey_soal` (`soal_id`),
  ADD CONSTRAINT `fk_responden_industri_id` FOREIGN KEY (`responden_industri_id`) REFERENCES `t_responden_industri` (`responden_industri_id`);

--
-- Constraints for table `t_jawaban_mahasiswa`
--
ALTER TABLE `t_jawaban_mahasiswa`
  ADD CONSTRAINT `fk_2_soal_id` FOREIGN KEY (`soal_id`) REFERENCES `m_survey_soal` (`soal_id`),
  ADD CONSTRAINT `fk_responden_mahasiswa_id` FOREIGN KEY (`responden_mahasiswa_id`) REFERENCES `t_responden_mahasiswa` (`responden_mahasiswa_id`);

--
-- Constraints for table `t_jawaban_ortu`
--
ALTER TABLE `t_jawaban_ortu`
  ADD CONSTRAINT `fk_4_soal_id` FOREIGN KEY (`soal_id`) REFERENCES `m_survey_soal` (`soal_id`),
  ADD CONSTRAINT `fk_responden_ortu_id` FOREIGN KEY (`responden_ortu_id`) REFERENCES `t_responden_ortu` (`responden_ortu_id`);

--
-- Constraints for table `t_jawaban_tendik`
--
ALTER TABLE `t_jawaban_tendik`
  ADD CONSTRAINT `fk_1_responden_tendik_id` FOREIGN KEY (`responden_tendik_id`) REFERENCES `t_responden_tendik` (`responden_tendik_id`),
  ADD CONSTRAINT `fk_1_soal_id` FOREIGN KEY (`soal_id`) REFERENCES `m_survey_soal` (`soal_id`);

--
-- Constraints for table `t_responden_alumni`
--
ALTER TABLE `t_responden_alumni`
  ADD CONSTRAINT `fk_3_survey_id` FOREIGN KEY (`survey_id`) REFERENCES `m_survey` (`survey_id`);

--
-- Constraints for table `t_responden_dosen`
--
ALTER TABLE `t_responden_dosen`
  ADD CONSTRAINT `fk_survey_id` FOREIGN KEY (`survey_id`) REFERENCES `m_survey` (`survey_id`);

--
-- Constraints for table `t_responden_industri`
--
ALTER TABLE `t_responden_industri`
  ADD CONSTRAINT `fk_5_survey_id` FOREIGN KEY (`survey_id`) REFERENCES `m_survey` (`survey_id`);

--
-- Constraints for table `t_responden_mahasiswa`
--
ALTER TABLE `t_responden_mahasiswa`
  ADD CONSTRAINT `fk_2_survey_id` FOREIGN KEY (`survey_id`) REFERENCES `m_survey` (`survey_id`);

--
-- Constraints for table `t_responden_ortu`
--
ALTER TABLE `t_responden_ortu`
  ADD CONSTRAINT `fk_4_survey_id` FOREIGN KEY (`survey_id`) REFERENCES `m_survey` (`survey_id`);

--
-- Constraints for table `t_responden_tendik`
--
ALTER TABLE `t_responden_tendik`
  ADD CONSTRAINT `fk_1_survey_id` FOREIGN KEY (`survey_id`) REFERENCES `m_survey` (`survey_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
