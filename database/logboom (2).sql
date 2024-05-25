-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 05:09 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logboom`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelaporan`
--

CREATE TABLE `pelaporan` (
  `id` varchar(6) NOT NULL,
  `n_pelapor` varchar(30) NOT NULL,
  `t_pelapor` varchar(30) NOT NULL,
  `b_pelapor` varchar(30) NOT NULL,
  `n_kegiatan` varchar(30) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `j_kegiatan` varchar(50) NOT NULL,
  `ket` text NOT NULL,
  `foto` blob NOT NULL,
  `status` text NOT NULL,
  `ket_petugas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelaporan`
--

INSERT INTO `pelaporan` (`id`, `n_pelapor`, `t_pelapor`, `b_pelapor`, `n_kegiatan`, `lokasi`, `kecamatan`, `tgl_kegiatan`, `j_kegiatan`, `ket`, `foto`, `status`, `ket_petugas`) VALUES
('NP0001', 'Siska dian', 'Alugoro 2.2', 'Tibum', 'Penghalauan', 'Gubeng Airlangga', 'Kecamatan Gubeng', '2024-05-02', 'Waktu Tiba: 07:13 Waktu Penanganan: 07:19', 'Pengalauan yang terletak di Gubeng Airlangga.', 0x666f746f2f3636333333353233383863323631382e6a7067, 'Sedang diajukan', '-'),
('NP0002', 'Dika Wayu', 'Jolodoro 3.1', 'Tibum', 'Pengondisian Pengamen', 'Pasar Ikan Pabean', 'Kecamatan Pabean Cantian', '2024-05-02', 'Waktu Tiba: 10:50 Waktu Penanganan: 10:57', 'Terdapat pengamen yang ada di Pasar Ikan Pabean', 0x666f746f2f36363333333562653866623162372e6a7067, 'Sedang diajukan', '-'),
('NP0003', 'Bariq', 'Jatisuro', 'Bangsumda', 'Sosialisasi', 'Siola', 'Kecamatan Genteng', '2024-05-03', '08.00', 'Aman jaya', 0x666f746f2f36363334333631633336386336494d475f32303234303433305f3131353931302e6a7067, 'Sedang diajukan', '-'),
('NP0004', 'Joko Tingkir', 'Baskara 2', 'Tibum', 'Penghalauan', 'Gubeng Airlangga', 'Kecamatan Gubeng', '2024-05-03', '08.00', 'sterl.', 0x666f746f2f3636333434323530336333353931352e6a7067, 'Sedang diajukan', '-'),
('NP0005', 'joko', 'Jolodoro 3.3', 'TranTibum', 'Pengondisian Pengamen', 'Kedurus', 'Kecamatan Benowo', '2024-05-06', '21.00', 'haus', 0x666f746f2f36363338363730633262666436554d4c204469616772616d20536174706f6c50504c6f672d5573652043617365204469616772616d2e64726177696f202831292e706e67, 'Sedang diajukan', '-'),
('NP0006', 'Daniel K', 'Jolodoro 1.2', 'Tibum', 'Asuhan Rembulan', 'Ngagel', 'Kecamatan Wonokromo', '2024-05-06', '23:03', 'aman', 0x666f746f2f36363338376166643432656237776576657273655f342d3238373734313339312e6a7067, 'Sedang diajukan', '-'),
('NP0007', 'joko', 'Jolodoro 3.4', 'TranTibum', 'Asuhan Rembulan', 'Pasar Ikan Pabean', 'Kecamatan Tenggilis Mejoyo', '2024-05-07', '13,00', 'yuhu', 0x666f746f2f36363339386164396336643634536865726c6f636b20486f6c6d657320312e6a706567, 'Sedang diajukan', '-'),
('NP0008', 'Hari Ahmad', 'Alugoro 3.2', 'Tibum', 'Pengamanan', 'Gubeng Airlangga', 'Kecamatan Gubeng', '2024-05-07', '17:00', 'pengamanan yang dilakukan di Gubeng Airlangga', 0x666f746f2f36363361333232333736396239312e6a7067, 'Sedang diajukan', '-'),
('NP0009', 'Maria Otets', 'Jolodoro 1.1', 'Tibum', 'App/Apel', 'Balai Kota', 'Kecamatan Gubeng', '2024-05-13', '08.00', 'Apel yang dilakukan di Balai Kota ', 0x666f746f2f36363431376634393839346338536865726c6f636b20486f6c6d657320312e6a706567, 'Sedang diajukan', '-');

-- --------------------------------------------------------

--
-- Table structure for table `pelaporaniko`
--

CREATE TABLE `pelaporaniko` (
  `id` int(6) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `t_lapor` varchar(50) NOT NULL,
  `ket` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `ket_petugas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelaporaniko`
--

INSERT INTO `pelaporaniko` (`id`, `tgl_kegiatan`, `lokasi`, `t_lapor`, `ket`, `foto`, `status`, `ket_petugas`) VALUES
(3, '2024-05-13', 'Jln. Pacar', 'Pancanaka 1', 'aman', 'foto/66417f12d33b4weverse_4-287741391.jpg', 'Sedang diajukan', '-'),
(4, '2024-05-13', 'Ampel', 'Pancanaka 1', 'aman', 'foto/664180e68c6dbSi_Gudang-ERD.drawio.png', 'Sedang diajukan', '-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(16) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `img`, `status`) VALUES
('1', 'admin', '$2y$10$vx9rULGqEcbI1khsJ2su8eRHIhZlpmvQW5sPZu3jmk471MtfaNqrm', 'Admin', '1617430645_admin2.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelaporan`
--
ALTER TABLE `pelaporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelaporaniko`
--
ALTER TABLE `pelaporaniko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelaporaniko`
--
ALTER TABLE `pelaporaniko`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
