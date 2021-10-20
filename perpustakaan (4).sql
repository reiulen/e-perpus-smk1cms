-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2021 at 04:37 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('Admin','Petugas') DEFAULT 'Petugas',
  `status` enum('Aktif','NonAktif') NOT NULL DEFAULT 'NonAktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `level`, `status`) VALUES
(27, 'Reihan Andika AM', 'reiandika10', '$2y$10$R9SmNciN9vE9MtDovVZHAOuyWTlYZstlHVtLxGbMoZOPGR6qYTElq', 'Petugas', 'Aktif'),
(29, 'admin', 'admin', '$2y$10$1r68SyW8M.9Ik7go52oDWOr0kGpzs57RsBSlwM6YNdxp2/ciZH4f.', 'Admin', 'Aktif'),
(30, 'Reihan Andika AM', 'reihan10', '$2y$10$T6zEk/mKil8Jt18OuLPNBO7bAxEs1VfOFg/0wsCkGTfH2NBtYzp3O', 'Petugas', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `tahun_terbit` varchar(10) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `jumlah_buku` varchar(50) NOT NULL,
  `gambar_buku` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul_buku`, `pengarang`, `tahun_terbit`, `penerbit`, `isbn`, `kategori`, `jumlah_buku`, `gambar_buku`, `deskripsi`) VALUES
(34, 'Pendidikan Agama Islam', 'Reihan Andika AM', '2021', 'Sri Sinar Alhamdi', '192010568KK', 'Pendidikan', '120', '1634215742_449eba062c453fff977e.jpg', '<p><strong>Buku</strong> adalah kumpulan/himpunan <a href=\"https://id.wikipedia.org/wiki/Kertas\">kertas</a> atau bahan lainnya yang dijilid menjadi satu pada salah satu ujungnya dan berisi <a href=\"https://id.wikipedia.org/wiki/Tulisan\">tulisan</a>, <a href=\"https://id.wikipedia.org/wiki/Gambar\">gambar</a> atau tempelan. Setiap sisi dari sebuah lembaran <a href=\"https://id.wikipedia.org/wiki/Kertas\">kertas</a> pada buku disebut sebuah halaman.</p><p>Seiring dengan perkembangan dalam bidang dunia informatika, kini dikenal pula istilah <i>e-book</i> atau <a href=\"https://id.wikipedia.org/wiki/Buku-e\">buku-e</a> (buku elektronik) yang mengandalkan perangkat seperti <a href=\"https://id.wikipedia.org/wiki/Komputer_meja\">komputer meja</a>, <a href=\"https://id.wikipedia.org/wiki/Komputer_jinjing\">komputer jinjing</a>, <a href=\"https://id.wikipedia.org/wiki/Komputer_tablet\">komputer tablet</a>, <a href=\"https://id.wikipedia.org/wiki/Telepon_seluler\">telepon seluler</a> dan lainnya, serta menggunakan <a href=\"https://id.wikipedia.org/wiki/Perangkat_lunak\">perangkat lunak</a> tertentu untuk membacanya.</p><p>Dalam <a href=\"https://id.wikipedia.org/wiki/Bahasa_Indonesia\">bahasa Indonesia</a> terdapat kata \"<i>kitab\"</i> yang diserap dari <a href=\"https://id.wikipedia.org/wiki/Bahasa_Arab\">bahasa Arab</a> (كتاب) yang memiliki arti \"buku\". Kemudian pada penggunaan kata tersebut, kata kitab ditujukan hanya kepada sebuah <a href=\"https://id.wikipedia.org/wiki/Teks\">teks</a> atau <a href=\"https://id.wikipedia.org/wiki/Tulisan\">tulisan</a> yang dijilid menjadi satu. Biasanya kitab merujuk kepada jenis tulisan kuno yang mempunyai ketetapan <a href=\"https://id.wikipedia.org/wiki/Hukum\">hukum</a> atau dengan kata lain merupakan <a href=\"https://id.wikipedia.org/wiki/Undang-undang\">undang-undang</a> yang mengatur. Istilah kitab biasanya digunakan untuk menyebut karya sastra para pujangga pada masa lampau yang dapat dijadikan sebagai bukti sejarah untuk mengungkapkan suatu peristiwa masa lampau seperti halnya <a href=\"https://id.wikipedia.org/wiki/Kitab_suci\">kitab suci</a>. Kerajaan-kerajaan di <a href=\"https://id.wikipedia.org/wiki/Nusantara\">Nusantara</a> pada masa lampau memberi kedudukan yang penting bagi para <a href=\"https://id.wikipedia.org/wiki/Pujangga\">pujangga</a> untuk menceritakan kehidupan dan kekuasaan raja-raja pada waktu itu untuk diriwayatkan dengan cara tertulis.</p>'),
(161, 'Gina Haryanti', '', '', '', '', 'Pengetahuan', '', '1634562061_c872bec85cb212b98e46.jpg', '<p>Ds. Cikutra Timur No. 425, Banjar 32375, Jatim</p>'),
(162, 'Ratna Alika Purnawati', '', '', '', '', 'Pengetahuan', '', '1634562190_9869e45c51a202610352.jpg', '<p>Ds. Badak No. 429, Gunungsitoli 50559, Jabar</p>'),
(168, 'Hendra Firgantoro', '', '', '', '', 'Pengetahuan', '', '1634563050_8c9042c106c4c3abd816.jpg', '<p>Dk. Basoka No. 820, Sukabumi 36510, Gorontalo</p>'),
(169, 'Gatot Carub Pratama', '', '', '', '', 'Pengetahuan', '', '1634570195_f1b07c4a348c9a03df48.png', '<p>Jln. Ters. Pasir Koja No. 391, Samarinda 43526, NTT</p>'),
(170, 'Mitra Jumadi Setiawan M.M.', '', '', '', '', 'Pengetahuan', '', '1634570212_e86655f776192ef634dd.jpg', '<p>Kpg. Sudiarto No. 399, Tangerang 46547, Pabar</p>'),
(171, 'Dalima Pudjiastuti', '', '', '', '', 'Pengetahuan', '', '1634570344_1f4a85154933474a6870.jpg', '<p>Jr. Pacuan Kuda No. 705, Sawahlunto 14479, Kepri</p>'),
(173, 'Vino Prasetyo S.H.', '', '', '', '', 'Pengetahuan', '', '1634570111_89b92fc6b252186935f7.jpg', '<p>Ds. Ekonomi No. 558, Sungai Penuh 73922, Riau</p>'),
(174, 'Capa Warta Maryadi', '', '', '', '', 'Pengetahuan', '', '1634563533_216d8dff927736f51878.jpg', '<p>Kpg. Halim No. 414, Ambon 34385, Sulut</p>'),
(175, 'Tomi Halim M.TI.', '', '', '', '', 'Pengetahuan', '', '1634563473_7757ce7ed52b9d25945e.jpg', '<p>Gg. Gotong Royong No. 758, Pariaman 40345, NTB</p>'),
(176, 'Malika Yuniar', '', '', '', '', 'Pengetahuan', '', '1634563565_17e56e82d75ea91980c4.jpg', '<p>Dk. Baan No. 911, Pontianak 15902, Bali</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id` int(11) NOT NULL,
  `nama_peminjam` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `gambar_buku` varchar(200) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tanggal_dibuat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id`, `nama_peminjam`, `email`, `kelas`, `judul_buku`, `gambar_buku`, `tgl_pinjam`, `tgl_kembali`, `tanggal_dibuat`) VALUES
(56, 'Reihan', 'reiandika10@gmail.com', 'X-Akutansi', 'Pendidikan Agama Islam', '1634215742_449eba062c453fff977e.jpg', '2021-10-18', '2021-10-20', '1634550261'),
(60, 'Reihan', 'reiandika10@gmail.com', 'X-Akutansi', 'Kembang Gadis Desa', 'default.jpg', '2021-10-18', '2021-10-20', '1634550539'),
(61, 'Reihan', 'reiandika10@gmail.com', 'X-Akutansi', 'Hendra Firgantoro', '1634563050_8c9042c106c4c3abd816.jpg', '2021-10-18', '2021-10-19', '1634570499'),
(62, 'Reihan', 'reiandika10@gmail.com', 'X-Akutansi', 'Pendidikan Agama Islam', '1634215742_449eba062c453fff977e.jpg', '2021-10-19', '2021-10-20', '1634601321');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nis` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Nonaktif',
  `level` enum('User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nis`, `nama`, `password`, `email`, `status`, `level`) VALUES
(63, 192010568, 'Reihan', '$2y$10$lA4zUEc70fJYqS.g3O2oZO.S6uV7x8NUzxZaesPaNusfzmLB1MoqG', 'reiandika10@gmail.com', 'Aktif', 'User'),
(64, 192010556, 'Reihan Andika AM', '$2y$10$JXCpaUyKJh9nbqgDw6PMdeL.oABVKAICwzLj6nfoxzcHt23rHfF8a', 'reihan.tdn@gmail.com', 'Aktif', 'User'),
(65, 192010657, 'Sri JIhan Akmaliyah', '$2y$10$jRgVfft1x.K67FWhfK.c1OUyqnRmp8NS0MBGzdoDtx8NWJBkfmCnK', 'akmaliyahj@gmail.com', 'Nonaktif', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(59, 'akmaliyahj@gmail.com', 'jOGvo9aW3iC+hfbP8GT15qhaxRwQDwfHP+TQLRqHSDU=', 1634601264);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD UNIQUE KEY `judul_buku` (`judul_buku`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nis`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
