-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 05:28 PM
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
-- Database: `dbwebinfoloker`
--
DROP Database IF EXISTS dbwebinfoloker;
CREATE Database IF NOT EXISTS dbwebinfoloker;
USE dbwebinfoloker;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `id_pencari_kerja` int(11) DEFAULT NULL,
  `id_loker` int(11) DEFAULT NULL,
  `waktu_melamar` timestamp NOT NULL DEFAULT current_timestamp(),
  `nama_file` varchar(255) DEFAULT NULL,
  `status` enum('diterima','ditolak','pending') DEFAULT 'pending',
  `id_perusahaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `id_pencari_kerja`, `id_loker`, `waktu_melamar`, `nama_file`, `status`, `id_perusahaan`) VALUES
(9, 9, 18, '2024-05-19 13:55:54', '664a04ea38938.pdf', 'ditolak', 8),
(10, 9, 19, '2024-05-19 13:59:23', '664a05bb1d1eb.pdf', 'diterima', 8),
(11, 10, 22, '2024-05-19 13:59:59', '664a05df13831.pdf', 'pending', 7),
(12, 11, 20, '2024-05-19 14:12:31', '664a08cfcfa9b.pdf', 'pending', 8),
(13, 9, 20, '2024-05-19 15:17:49', '664a181d1fdda.pdf', 'ditolak', 8);

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `id` int(11) NOT NULL,
  `profesi` varchar(100) DEFAULT NULL,
  `posisi` varchar(100) DEFAULT NULL,
  `gaji` decimal(10,2) DEFAULT NULL,
  `syaratpendidikan` varchar(100) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `usiamin` int(11) DEFAULT NULL,
  `usiamax` int(11) DEFAULT NULL,
  `prioritasgender` varchar(10) DEFAULT NULL,
  `id_perusahaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`id`, `profesi`, `posisi`, `gaji`, `syaratpendidikan`, `lokasi`, `usiamin`, `usiamax`, `prioritasgender`, `id_perusahaan`) VALUES
(18, 'Website Developer', 'Frontend', 8000000.00, 'S1 Informatika', 'Surabya', 22, 35, 'Tidak ada', 8),
(19, 'Web Developer', 'Backend', 10000000.00, 'S1 Informatika', 'Surabya', 22, 35, 'Tidak ada', 8),
(20, 'Website Developer', 'Fullstack', 12000000.00, 'S1 Informatika', 'Surabya', 22, 35, 'Tidak ada', 8),
(21, 'Pekerja Kantoran', 'Akuntansi', 10000000.00, 'S1 Akutansi', 'Surabya', 25, 40, 'Wanita', 7),
(22, 'Pekerja Kantoran', 'Asisten CEO', 15000000.00, 'S1 Ekonomi Bisnis', 'Surabya', 22, 308, 'Tidak ada', 7),
(23, 'Manger', 'Manager Gudang', 15000000.00, 'S1 Managemen', 'Surabya', 24, 28, 'Tidak ada', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tipsmencaripekerjaan`
--

CREATE TABLE `tipsmencaripekerjaan` (
  `id` int(11) NOT NULL,
  `tips` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipsmencaripekerjaan`
--

INSERT INTO `tipsmencaripekerjaan` (`id`, `tips`) VALUES
(1, 'Jadilah proaktif dalam mencari pekerjaan.'),
(2, 'Perbarui dan perbaiki CV dan surat lamaran Anda secara teratur.'),
(3, 'Jangan ragu untuk memanfaatkan jaringan Anda.'),
(4, 'Ikuti pelatihan dan kursus untuk meningkatkan keterampilan Anda.'),
(5, 'Gunakan platform pencarian pekerjaan online secara teratur.'),
(6, 'Riset perusahaan yang Anda minati sebelum mengajukan lamaran.'),
(7, 'Siapkan diri Anda dengan baik untuk wawancara.'),
(8, 'Bangun kehadiran online yang profesional.'),
(9, 'Perhatikan detail dalam setiap tahap proses seleksi.'),
(10, 'Jangan malu untuk mengikuti magang atau pekerjaan kontrak.'),
(11, 'Gunakan media sosial untuk memperluas jaringan Anda.'),
(12, 'Menghadiri acara karir dan pameran pekerjaan.'),
(13, 'Kembangkan keterampilan interpersonal Anda.'),
(14, 'Jadilah fleksibel dengan jenis pekerjaan yang Anda cari.'),
(15, 'Perluas pengetahuan Anda tentang industri tertentu.'),
(16, 'Bergabunglah dengan kelompok atau komunitas profesional.'),
(17, 'Buatlah profil LinkedIn yang menarik dan lengkap.'),
(18, 'Praktikkan wawancara kerja dengan teman atau keluarga.'),
(19, 'Jadilah proaktif dalam mencari peluang kerja tersembunyi.'),
(20, 'Ikuti blog atau situs web yang berfokus pada karir.'),
(21, 'Gunakan kata kunci yang relevan dalam pencarian pekerjaan online.'),
(22, 'Jangan lewatkan kesempatan untuk berpartisipasi dalam proyek.'),
(23, 'Perhatikan etika dan profesionalisme dalam setiap interaksi.'),
(24, 'Manfaatkan program referral dari perusahaan.'),
(25, 'Kembangkan keterampilan presentasi Anda.'),
(26, 'Jadilah ahli dalam mengerjakan tes psikometrik.'),
(27, 'Bangun hubungan yang kuat dengan rekruter.'),
(28, 'Perhatikan lingkungan dan budaya perusahaan.'),
(29, 'Gunakan bahasa tubuh yang positif selama wawancara.'),
(30, 'Jadilah terbuka terhadap umpan balik dan saran.'),
(31, 'Perhatikan keseimbangan antara kehidupan kerja dan pribadi.'),
(32, 'Manfaatkan platform freelance untuk mendapatkan pengalaman.'),
(33, 'Buatlah portofolio online yang menarik.'),
(34, 'Perhatikan gaya berpakaian yang sesuai dengan industri.'),
(35, 'Pahami tren dan perkembangan dalam industri Anda.'),
(36, 'Jangan ragu untuk menghubungi perusahaan langsung.'),
(37, 'Pelajari pertanyaan umum dalam wawancara dan siapkan jawaban.'),
(38, 'Gunakan kesempatan magang sebagai pintu masuk ke pekerjaan.'),
(39, 'Kembangkan keterampilan komunikasi Anda.'),
(40, 'Perhatikan keselarasan antara nilai perusahaan dan nilai pribadi Anda.'),
(41, 'Perhatikan cara Anda mengelola waktu.'),
(42, 'Jadilah terbuka terhadap pekerjaan sementara atau kontrak.'),
(43, 'Ikuti kursus online untuk meningkatkan keterampilan Anda.'),
(44, 'Kembangkan jaringan Anda di berbagai platform.'),
(45, 'Jadilah aktif di komunitas terkait industri Anda.'),
(46, 'Manfaatkan kesempatan untuk menghadiri seminar atau lokakarya.'),
(47, 'Jangan lupakan pentingnya kegiatan relawan dalam CV Anda.'),
(48, 'Manfaatkan kesempatan untuk mengembangkan keahlian baru.'),
(49, 'Jadilah kreatif dalam mencari peluang pekerjaan.'),
(50, 'Manfaatkan kesempatan untuk belajar dari pengalaman orang lain.'),
(51, 'Jadilah terbuka terhadap pekerjaan jarak jauh atau remote.'),
(52, 'Perhatikan keseimbangan antara kemampuan dan minat Anda.'),
(53, 'Perbarui profil LinkedIn Anda secara teratur dengan prestasi terbaru.'),
(54, 'Jadilah fasih dalam bahasa Inggris atau bahasa yang relevan dalam industri Anda.'),
(55, 'Perhatikan etika dalam berkomunikasi melalui email atau telepon.'),
(56, 'Bersikaplah optimis dan percaya diri dalam mencari pekerjaan.'),
(57, 'Manfaatkan teknologi untuk memperluas jangkauan pencarian pekerjaan Anda.'),
(58, 'Jangan ragu untuk meminta rekomendasi dari mantan atasan atau rekan kerja.'),
(59, 'Jaga kesehatan fisik dan mental Anda selama proses mencari pekerjaan.'),
(60, 'Bangun hubungan yang positif dengan perusahaan tempat Anda melamar.'),
(61, 'Perhatikan keahlian dan kualifikasi yang diminta dalam iklan lowongan.'),
(62, 'Kembangkan kemampuan untuk menulis laporan atau proposal.'),
(63, 'Perhatikan budaya kerja yang ada di perusahaan yang Anda minati.'),
(64, 'Jadilah terbuka terhadap peluang pekerjaan di luar kota atau negara.'),
(65, 'Bersiaplah untuk menjelaskan gap dalam riwayat pekerjaan Anda secara jelas.'),
(66, 'Perbarui profil profesional Anda di situs web dan platform lainnya.'),
(67, 'Manfaatkan mentor atau coach untuk memberikan arahan dalam karir Anda.'),
(68, 'Jadilah adaptif terhadap perubahan dalam industri atau pasar kerja.'),
(69, 'Perhatikan detail ketika menyiapkan dokumen lamaran dan CV Anda.'),
(70, 'Manfaatkan waktu luang untuk meningkatkan keterampilan Anda.'),
(71, 'Pahami kebutuhan dan harapan Anda dalam pekerjaan yang Anda cari.'),
(72, 'Bersiaplah untuk menjawab pertanyaan tentang kelemahan Anda.'),
(73, 'Jangan lewatkan kesempatan untuk mendapatkan sertifikasi tambahan.'),
(74, 'Jadilah aktif dalam forum atau grup diskusi online terkait karir.'),
(75, 'Manfaatkan waktu untuk merefleksikan pencapaian dan tujuan karir Anda.'),
(76, 'Jalin hubungan dengan alumni perguruan tinggi atau universitas Anda.'),
(77, 'Bersiaplah untuk menjelaskan alasan Anda meninggalkan pekerjaan sebelumnya.'),
(78, 'Perhatikan perkembangan teknologi yang relevan dengan industri Anda.'),
(79, 'Bangun koneksi dengan perusahaan yang mungkin tidak sedang merekrut.'),
(80, 'Jadilah terbuka terhadap kesempatan pekerjaan yang tidak biasa.'),
(81, 'Perhatikan bahasa tubuh Anda saat berkomunikasi secara langsung.'),
(82, 'Manfaatkan kesempatan untuk menjadi relawan dalam acara industri.'),
(83, 'Perhatikan cara Anda merespons pertanyaan tentang gaji dan tunjangan.'),
(84, 'Buatlah rencana karir jangka pendek dan jangka panjang.'),
(85, 'Manfaatkan kesempatan untuk berbicara langsung dengan rekruter.'),
(86, 'Jadilah terbuka terhadap umpan balik dan kritik untuk memperbaiki diri.'),
(87, 'Perhatikan tren pasar kerja dalam industri yang Anda minati.'),
(88, 'Bangun keahlian dalam menggunakan perangkat lunak atau aplikasi yang relevan.'),
(89, 'Jadilah terorganisir dalam mengelola aplikasi dan jadwal wawancara Anda.'),
(90, 'Manfaatkan kesempatan untuk menghadiri workshop atau seminar karir.'),
(91, 'Jangan ragu untuk mencari bantuan dari profesional karir atau konsultan.'),
(92, 'Perhatikan keselarasan antara nilai perusahaan dan visi Anda.'),
(93, 'Jadilah terbuka terhadap kesempatan untuk bekerja secara kontrak.'),
(94, 'Manfaatkan kesempatan untuk menjadi mentor bagi sesama pencari kerja.'),
(95, 'Perhatikan tren kompensasi dan paket tunjangan di industri Anda.'),
(96, 'Bersiaplah untuk menjelaskan bagaimana Anda mengatasi tantangan dalam pekerjaan.'),
(97, 'Manfaatkan kesempatan untuk mengikuti webinar atau konferensi online.'),
(98, 'Jadilah terbuka terhadap peluang karir di luar bidang utama Anda.'),
(99, 'Manfaatkan kesempatan untuk belajar dari pengalaman orang lain.'),
(100, 'Jadilah terbuka terhadap pekerjaan jarak jauh atau remote.'),
(101, 'Perhatikan keseimbangan antara kemampuan dan minat Anda.'),
(102, 'Perbarui profil LinkedIn Anda secara teratur dengan prestasi terbaru.'),
(103, 'Jadilah fasih dalam bahasa Inggris atau bahasa yang relevan dalam industri Anda.'),
(104, 'Perhatikan etika dalam berkomunikasi melalui email atau telepon.'),
(105, 'Bersikaplah optimis dan percaya diri dalam mencari pekerjaan.'),
(106, 'Manfaatkan teknologi untuk memperluas jangkauan pencarian pekerjaan Anda.'),
(107, 'Jangan ragu untuk meminta rekomendasi dari mantan atasan atau rekan kerja.'),
(108, 'Jaga kesehatan fisik dan mental Anda selama proses mencari pekerjaan.'),
(109, 'Bangun hubungan yang positif dengan perusahaan tempat Anda melamar.'),
(110, 'Perhatikan keahlian dan kualifikasi yang diminta dalam iklan lowongan.'),
(111, 'Kembangkan kemampuan untuk menulis laporan atau proposal.'),
(112, 'Perhatikan budaya kerja yang ada di perusahaan yang Anda minati.'),
(113, 'Jadilah terbuka terhadap peluang pekerjaan di luar kota atau negara.'),
(114, 'Bersiaplah untuk menjelaskan gap dalam riwayat pekerjaan Anda secara jelas.'),
(115, 'Perbarui profil profesional Anda di situs web dan platform lainnya.'),
(116, 'Manfaatkan mentor atau coach untuk memberikan arahan dalam karir Anda.'),
(117, 'Jadilah adaptif terhadap perubahan dalam industri atau pasar kerja.'),
(118, 'Perhatikan detail ketika menyiapkan dokumen lamaran dan CV Anda.'),
(119, 'Manfaatkan waktu luang untuk meningkatkan keterampilan Anda.'),
(120, 'Pahami kebutuhan dan harapan Anda dalam pekerjaan yang Anda cari.'),
(121, 'Bersiaplah untuk menjawab pertanyaan tentang kelemahan Anda.'),
(122, 'Jangan lewatkan kesempatan untuk mendapatkan sertifikasi tambahan.'),
(123, 'Jadilah aktif dalam forum atau grup diskusi online terkait karir.'),
(124, 'Manfaatkan waktu untuk merefleksikan pencapaian dan tujuan karir Anda.'),
(125, 'Jalin hubungan dengan alumni perguruan tinggi atau universitas Anda.'),
(126, 'Bersiaplah untuk menjelaskan alasan Anda meninggalkan pekerjaan sebelumnya.'),
(127, 'Perhatikan perkembangan teknologi yang relevan dengan industri Anda.'),
(128, 'Bangun koneksi dengan perusahaan yang mungkin tidak sedang merekrut.'),
(129, 'Jadilah terbuka terhadap kesempatan pekerjaan yang tidak biasa.'),
(130, 'Perhatikan bahasa tubuh Anda saat berkomunikasi secara langsung.'),
(131, 'Manfaatkan kesempatan untuk menjadi relawan dalam acara industri.'),
(132, 'Perhatikan cara Anda merespons pertanyaan tentang gaji dan tunjangan.'),
(133, 'Buatlah rencana karir jangka pendek dan jangka panjang.'),
(134, 'Manfaatkan kesempatan untuk berbicara langsung dengan rekruter.'),
(135, 'Jadilah terbuka terhadap umpan balik dan kritik untuk memperbaiki diri.'),
(136, 'Perhatikan tren pasar kerja dalam industri yang Anda minati.'),
(137, 'Bangun keahlian dalam menggunakan perangkat lunak atau aplikasi yang relevan.'),
(138, 'Jadilah terorganisir dalam mengelola aplikasi dan jadwal wawancara Anda.'),
(139, 'Manfaatkan kesempatan untuk menghadiri workshop atau seminar karir.'),
(140, 'Jangan ragu untuk mencari bantuan dari profesional karir atau konsultan.'),
(141, 'Perhatikan keselarasan antara nilai perusahaan dan visi Anda.'),
(142, 'Jadilah terbuka terhadap kesempatan untuk bekerja secara kontrak.'),
(143, 'Manfaatkan kesempatan untuk menjadi mentor bagi sesama pencari kerja.'),
(144, 'Perhatikan tren kompensasi dan paket tunjangan di industri Anda.'),
(145, 'Bersiaplah untuk menjelaskan bagaimana Anda mengatasi tantangan dalam pekerjaan.'),
(146, 'Manfaatkan kesempatan untuk mengikuti webinar atau konferensi online.'),
(147, 'Jadilah terbuka terhadap peluang karir di luar bidang utama Anda.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('pencari_kerja','perusahaan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`) VALUES
(7, 'PT SUKSES ABADI', 'suksesabadi@gmail.com', '$2y$10$x0P.KrC4RWJ2kliLKNvnXORgVKCDxUjeBnmG5VEjQlIA4cNBH15Zm', 'perusahaan'),
(8, 'PT JAYA MAYA', 'jayamaya@gmail.com', '$2y$10$iXcboDzlSOKx0frXVbglEujUMaoTG91ERjfx9nOHpMGXM11hpC60C', 'perusahaan'),
(9, 'Kalfin Syah', 'kalfinsyah@gmail.com', '$2y$10$0JiV.K5rau1F737g5EicwOMh.ta.RMG82S2WzptKKR/twAOD4eI..', 'pencari_kerja'),
(10, 'Irsyad Fadhil', 'irsyadfadhil@gmail.com', '$2y$10$J5Wy6Rznk8Ba5KE/2v6lkeKLuAu8LXe9iATxsLo37nIg3skNQXlia', 'pencari_kerja'),
(11, 'Joni', 'joni@gmail.com', '$2y$10$2kQ2Kb9rirZLDAZCWrUb7eekKYwKhvvIMsgC2nIwh156nMiM85NgC', 'pencari_kerja');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pencari_kerja` (`id_pencari_kerja`),
  ADD KEY `id_loker` (`id_loker`),
  ADD KEY `fk_history_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_loker_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `tipsmencaripekerjaan`
--
ALTER TABLE `tipsmencaripekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tipsmencaripekerjaan`
--
ALTER TABLE `tipsmencaripekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_history_perusahaan` FOREIGN KEY (`id_perusahaan`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`id_pencari_kerja`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`id_loker`) REFERENCES `loker` (`id`);

--
-- Constraints for table `loker`
--
ALTER TABLE `loker`
  ADD CONSTRAINT `fk_loker_perusahaan` FOREIGN KEY (`id_perusahaan`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
