-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2026 at 05:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kelompok`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `nim`, `email`, `foto`, `bio`) VALUES
(1, 'Taskia Ramadhani', 'V066231011', 'taskiaramadhani@gmail.com', 'taskiaramadhani.jpeg', 'Pada masa SMA saya pernah menjabat sebagai Sekretaris Bidang Dana dan Usaha di organisasi Ikramullah, kemudian di masa perkuliahan ini saya hanya berfokus meningkatkan prestasi akademik dengan mengikuti berbagai lomba di bidang kesehatan gigi dan mulut.'),
(2, 'Rezki Amalia', 'V066241027', 'rezkiamaliaaa12@gmail.com', 'rezkiamalia.jpeg', '“Semasa SMA, saya aktif berorganisasi menjabat sebagai Sekretaris Sanggar Seni serta dipercaya menjadi Bendahara Angkatan dan Bendahara Kelas.”'),
(3, 'Nur Nabila', 'V066241007', 'nurnabila@gmail.com', 'nurnabila.jpeg', '\"Saya pernah dipercayai menjadi ketua eskul Volly,Bendahara kelas dan anggota PMR selama menempuh pendidikan di SMA\"'),
(4, 'Asyrafil Abrar', 'V066241010', 'asyrafilab@gmail.com', 'asyrafilabrar.jpeg', '“Saya Menempuh Pendidikan di SMA 1 Barru dan Pernah Mengikuti berbagai organisasi Seperti Osis dan Vosma,dan Menjuarai Berbagi Lomba Nyanyi Solo.”'),
(5, 'Syilah Sazkiah A.Yani', 'V066241050', 'Syilahsazkia@gmail.com', 'syilahsazkiah.jpeg', '\"Saya pernah menjadi bendahara OSIS dan bertanggung jawab mengelola serta mencatat keuangan organisasi dengan teliti dan jujur.\"'),
(6, 'Fitri Amalia Thalib', 'V066241008', 'ftriammmm30@gmail.com', 'fitriamalia.jpeg', '“Selama menempuh pendidikan dibangku SMA sya dipercaya sebagai ketua ROHIS dan saya juga pernah juara tartil Qur’an dan pidato bahasa arab”'),
(7, 'Haerunnisah', 'V066241042', 'haerunnisah6@gmail.com', 'haerunnisah.jpeg', '“Saya pernah menjadi anggota osis dan menajdi bendahara angkatan di bangku SMA”'),
(8, 'Farhani Aidil', 'V066241065', 'varhaniaidil@gmail.com', 'farhaniaidil.jpeg', '\"Selama menempuh pendidikan di SMA, saya pernah dipercaya menjabat sebagai Sekretaris pada ekstrakurikuler Basket serta Sekretaris kelas selama tiga tahun.\"');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
