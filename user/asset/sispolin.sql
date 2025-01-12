-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2024 at 10:09 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
-- Table structure for table `m_kategori`
--

CREATE TABLE `m_kategori` (
  `kategori_id` int NOT NULL,
  `kategori_nama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_kategori`
--

INSERT INTO `m_kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Mahasiswa'),
(2, 'Dosen'),
(3, 'Tenaga Pendidik'),
(4, 'Orang Tua / Wali'),
(5, 'Alumni'),
(6, 'Industri');

-- --------------------------------------------------------

--
-- Table structure for table `m_survey`
--

CREATE TABLE `m_survey` (
  `survey_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `survey_jenis` enum('Mahasiswa','Dosen','Tenaga Pendidik','Orang Tua / Wali','Alumni','Industri') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `survey_kode` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `survey_nama` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `survey_deskripsi` text COLLATE utf8mb4_general_ci,
  `survey_tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_survey_soal`
--

CREATE TABLE `m_survey_soal` (
  `soal_id` int NOT NULL,
  `survey_id` int DEFAULT NULL,
  `kategori_id` int DEFAULT NULL,
  `no_urut` int DEFAULT NULL,
  `soal_jenis` enum('rating','uraian') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `soal_nama` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `user_id` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`user_id`, `username`, `nama`, `password`) VALUES
(1, 'admin', 'Administrator', '$2y$10$CauvHy0gNpWUVHjtEV/USemS94TrDpov/4.jbm2qHoBtfBohjfXk6');

-- --------------------------------------------------------

--
-- Table structure for table `t_jawaban_alumni`
--

CREATE TABLE `t_jawaban_alumni` (
  `jawaban_alumni_id` int NOT NULL,
  `responden_alumni_id` int DEFAULT NULL,
  `soal_id` int DEFAULT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_jawaban_dosen`
--

CREATE TABLE `t_jawaban_dosen` (
  `jawaban_dosen_id` int NOT NULL,
  `responden_dosen_id` int DEFAULT NULL,
  `soal_id` int DEFAULT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_jawaban_industri`
--

CREATE TABLE `t_jawaban_industri` (
  `jawaban_industri_id` int NOT NULL,
  `responden_industri_id` int DEFAULT NULL,
  `soal_id` int DEFAULT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_jawaban_mahasiswa`
--

CREATE TABLE `t_jawaban_mahasiswa` (
  `jawaban_mahasiswa_id` int NOT NULL,
  `responden_mahasiswa_id` int DEFAULT NULL,
  `soal_id` int DEFAULT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_jawaban_ortu`
--

CREATE TABLE `t_jawaban_ortu` (
  `jawaban_ortu_id` int NOT NULL,
  `responden_ortu_id` int DEFAULT NULL,
  `soal_id` int DEFAULT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_jawaban_tendik`
--

CREATE TABLE `t_jawaban_tendik` (
  `jawaban_tendik_id` int NOT NULL,
  `responden_tendik_id` int DEFAULT NULL,
  `soal_id` int DEFAULT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_responden_alumni`
--

CREATE TABLE `t_responden_alumni` (
  `responden_alumni_id` int NOT NULL,
  `survey_id` int DEFAULT NULL,
  `responden_tanggal` datetime DEFAULT NULL,
  `responden_nim` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_nama` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_prodi` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_hp` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tahun_lulus` year DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_responden_dosen`
--

CREATE TABLE `t_responden_dosen` (
  `responden_dosen_id` int NOT NULL,
  `survey_id` int DEFAULT NULL,
  `responden_tanggal` datetime DEFAULT NULL,
  `responden_nip` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_nama` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_unit` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_responden_industri`
--

CREATE TABLE `t_responden_industri` (
  `responden_industri_id` int NOT NULL,
  `survey_id` int DEFAULT NULL,
  `responden_tanggal` datetime DEFAULT NULL,
  `responden_nama` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_jabatan` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_perusahaan` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_hp` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_kota` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_responden_mahasiswa`
--

CREATE TABLE `t_responden_mahasiswa` (
  `responden_mahasiswa_id` int NOT NULL,
  `survey_id` int DEFAULT NULL,
  `responden_tanggal` datetime DEFAULT NULL,
  `responden_nim` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_nama` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_prodi` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_hp` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tahun_masuk` year DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_responden_ortu`
--

CREATE TABLE `t_responden_ortu` (
  `responden_ortu_id` int NOT NULL,
  `survey_id` int DEFAULT NULL,
  `responden_tanggal` datetime DEFAULT NULL,
  `responden_nama` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_jk` enum('laki-laki','perempuan') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_umur` tinyint DEFAULT NULL,
  `responden_hp` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_pendidikan` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_pekerjaan` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_penghasilan` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mahasiswa_nim` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mahasiswa_nama` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mahasiswa_prodi` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_responden_tendik`
--

CREATE TABLE `t_responden_tendik` (
  `responden_tendik_id` int NOT NULL,
  `survey_id` int DEFAULT NULL,
  `responden_tanggal` datetime DEFAULT NULL,
  `responden_nopeg` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_nama` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `responden_unit` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

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
  MODIFY `kategori_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `m_survey`
--
ALTER TABLE `m_survey`
  MODIFY `survey_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_survey_soal`
--
ALTER TABLE `m_survey_soal`
  MODIFY `soal_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `t_jawaban_alumni`
--
ALTER TABLE `t_jawaban_alumni`
  MODIFY `jawaban_alumni_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_jawaban_dosen`
--
ALTER TABLE `t_jawaban_dosen`
  MODIFY `jawaban_dosen_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_jawaban_industri`
--
ALTER TABLE `t_jawaban_industri`
  MODIFY `jawaban_industri_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_jawaban_mahasiswa`
--
ALTER TABLE `t_jawaban_mahasiswa`
  MODIFY `jawaban_mahasiswa_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_jawaban_ortu`
--
ALTER TABLE `t_jawaban_ortu`
  MODIFY `jawaban_ortu_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_jawaban_tendik`
--
ALTER TABLE `t_jawaban_tendik`
  MODIFY `jawaban_tendik_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_responden_alumni`
--
ALTER TABLE `t_responden_alumni`
  MODIFY `responden_alumni_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_responden_dosen`
--
ALTER TABLE `t_responden_dosen`
  MODIFY `responden_dosen_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_responden_industri`
--
ALTER TABLE `t_responden_industri`
  MODIFY `responden_industri_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_responden_mahasiswa`
--
ALTER TABLE `t_responden_mahasiswa`
  MODIFY `responden_mahasiswa_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_responden_ortu`
--
ALTER TABLE `t_responden_ortu`
  MODIFY `responden_ortu_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_responden_tendik`
--
ALTER TABLE `t_responden_tendik`
  MODIFY `responden_tendik_id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `fk_2_survey_id` FOREIGN KEY (`survey_id`) REFERENCES `m_survey` (`survey_id`),
  ADD CONSTRAINT `fk_regist` FOREIGN KEY (`responden_mahasiswa_id`) REFERENCES `m_user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
