-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jul 2021 pada 04.12
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_nutrisi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_alternatif_topsis`
--

CREATE TABLE `tbl_alternatif_topsis` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL,
  `pagi` varchar(255) NOT NULL,
  `siang` varchar(255) NOT NULL,
  `sore` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_alternatif_topsis`
--

INSERT INTO `tbl_alternatif_topsis` (`id_alternatif`, `nama_alternatif`, `pagi`, `siang`, `sore`) VALUES
(9, 'Paket Menu 1', 'Ayam Kare, Tahu Bali, Sayur Cah wortel', 'Bakso telur puyuh, Tahu isi, Mie goreng ', 'Empal daging, Telur asin, Sate tempe, Rawon + waluh'),
(10, 'Paket Menu 2', 'Telor bali, Sambal goreng tahu, Tumis ', 'Tongkol suwir + telor puyuh, Tempe bacem, Sayur asem', 'Telor cetak, Sambal goreng kentang+bola daging, Bubur '),
(11, 'Paket Menu 3', 'Ayam goreng, Telor rebus ,Tahu bali, Soto', 'Telor puyuh,Bola daging, Cap cay, Sambal goreng kentang', 'Semur bakso, Telor dadar, Sayur sop, Tahu bacem'),
(12, 'Paket Menu 4', 'Telor cetak, Tempe goreng tepung, Cah(wortel+cambah+bakso)', 'Telor asin, Sambal goreng kentang, Capcay + bakso, Tahu fantasi', 'Ayam Kentucky Dadar gulung Oseng/sop(kubis+wortel+waluh) Tempe bali'),
(13, 'Paket Menu 5', 'Daging kare, Sambal goreng tahu, Tumis kacang panjang', 'Tongkol suwir, bumbu merah,Telor cetak, Tempe bumbu kuning, Sayur bening', 'Kuah bakso + telor puyuh+ sawi hijau, Tahu isi ,Mie goreng');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_topsis`
--

CREATE TABLE `tbl_data_topsis` (
  `id_alternatif_data` int(11) NOT NULL,
  `id_kriteria_ahp` int(11) NOT NULL,
  `nilai_data_alternatif` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ir`
--

CREATE TABLE `tbl_ir` (
  `id_ir` int(11) NOT NULL,
  `ukuran_matrik` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ir`
--

INSERT INTO `tbl_ir` (`id_ir`, `ukuran_matrik`, `nilai`) VALUES
(2, 1, 0),
(3, 2, 0),
(4, 3, 0.58),
(5, 4, 0.9),
(6, 5, 1.12),
(7, 6, 1.24),
(8, 7, 1.32),
(9, 8, 1.41),
(10, 9, 1.45),
(11, 10, 1.49);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kriteria_ahp`
--

CREATE TABLE `tbl_kriteria_ahp` (
  `id_kriteria_ahp` int(11) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kriteria_ahp`
--

INSERT INTO `tbl_kriteria_ahp` (`id_kriteria_ahp`, `nama_kriteria`) VALUES
(6, 'Karbohidrat'),
(7, 'Lemak'),
(8, 'Protein'),
(9, 'Vitamin'),
(11, 'Mineral');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kriteria_pasien`
--

CREATE TABLE `tbl_kriteria_pasien` (
  `id_kriteria_pasien` int(11) NOT NULL,
  `nama_kriteria_pasien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kriteria_pasien`
--

INSERT INTO `tbl_kriteria_pasien` (`id_kriteria_pasien`, `nama_kriteria_pasien`) VALUES
(7, 'Kurus'),
(9, 'Overweight'),
(10, 'Normal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kriteria_topsis`
--

CREATE TABLE `tbl_kriteria_topsis` (
  `id_kriteria_topsis` int(11) NOT NULL,
  `id_kriteria_ahp` int(11) NOT NULL,
  `nilai_eigen` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_login`
--

INSERT INTO `tbl_login` (`id_login`, `username`, `password`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(2, 'yusuf', 'dd2eb170076a5dec97cdbbbbff9a4405', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pasanganalternatif_topsis`
--

CREATE TABLE `tbl_pasanganalternatif_topsis` (
  `id_alternatif_kriteria` int(11) NOT NULL,
  `id_alternatif_baris` int(11) NOT NULL,
  `id_alternatif_kolom` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pasanganalternatif_topsis`
--

INSERT INTO `tbl_pasanganalternatif_topsis` (`id_alternatif_kriteria`, `id_alternatif_baris`, `id_alternatif_kolom`, `nilai`) VALUES
(4, 9, 6, 128.76),
(5, 9, 7, 79.23),
(6, 9, 8, 107.62),
(7, 9, 9, 1.546),
(8, 9, 11, 14.34),
(9, 10, 6, 108.74),
(10, 10, 7, 101.9),
(11, 10, 8, 141.35),
(12, 10, 9, 16.93),
(13, 10, 11, 3),
(14, 11, 6, 75.26),
(15, 11, 7, 90.02),
(16, 11, 8, 126.64),
(17, 11, 9, 46.32),
(18, 11, 11, 6.63),
(19, 12, 6, 140.6),
(20, 12, 7, 116.86),
(21, 12, 8, 124.93),
(22, 12, 9, 5.142),
(23, 12, 11, 7.72),
(24, 13, 6, 103.42),
(25, 13, 7, 94.75),
(26, 13, 8, 116.07),
(27, 13, 9, 2.103),
(28, 13, 11, 7.302);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pasangankriteria_ahp`
--

CREATE TABLE `tbl_pasangankriteria_ahp` (
  `id_pasangan_kriteria` int(11) NOT NULL,
  `id_kriteria_pasien` int(11) NOT NULL,
  `id_kriteria_baris` int(11) NOT NULL,
  `id_kriteria_kolom` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pasangankriteria_ahp`
--

INSERT INTO `tbl_pasangankriteria_ahp` (`id_pasangan_kriteria`, `id_kriteria_pasien`, `id_kriteria_baris`, `id_kriteria_kolom`, `nilai`) VALUES
(25, 10, 6, 6, 1),
(26, 10, 6, 7, 0.33),
(27, 10, 6, 8, 1),
(28, 10, 6, 9, 0.33),
(29, 10, 6, 11, 0.2),
(30, 10, 7, 6, 3),
(31, 10, 7, 7, 1),
(32, 10, 7, 8, 3),
(33, 10, 7, 9, 3),
(34, 10, 7, 11, 0.5),
(35, 10, 8, 6, 1),
(36, 10, 8, 7, 0.33),
(37, 10, 8, 8, 1),
(38, 10, 8, 9, 1),
(39, 10, 8, 11, 0.2),
(40, 10, 9, 6, 3),
(41, 10, 9, 7, 0.33),
(42, 10, 9, 8, 1),
(43, 10, 9, 9, 1),
(44, 10, 9, 11, 0.2),
(45, 10, 11, 6, 5),
(46, 10, 11, 7, 2),
(47, 10, 11, 8, 5),
(48, 10, 11, 9, 5),
(49, 10, 11, 11, 1),
(51, 7, 6, 6, 1),
(52, 7, 6, 7, 0.33),
(53, 7, 6, 8, 1),
(54, 7, 6, 9, 0.2),
(55, 7, 6, 11, 0.2),
(56, 7, 7, 6, 3),
(57, 7, 7, 7, 1),
(58, 7, 7, 8, 3),
(59, 7, 7, 9, 3),
(60, 7, 7, 11, 0.5),
(61, 7, 8, 6, 1),
(62, 7, 8, 7, 0.33),
(63, 7, 8, 8, 1),
(64, 7, 8, 9, 0.2),
(65, 7, 8, 11, 0.2),
(66, 7, 9, 6, 5),
(67, 7, 9, 7, 0.33),
(68, 7, 9, 8, 5),
(69, 7, 9, 9, 1),
(70, 7, 9, 11, 0.2),
(71, 7, 11, 6, 5),
(72, 7, 11, 7, 2),
(73, 7, 11, 8, 5),
(74, 7, 11, 9, 5),
(75, 7, 11, 11, 1),
(76, 9, 6, 6, 1),
(77, 9, 6, 7, 0.5),
(78, 9, 6, 8, 0.5),
(79, 9, 6, 9, 0.2),
(80, 9, 6, 11, 0.2),
(81, 9, 7, 6, 2),
(82, 9, 7, 7, 1),
(83, 9, 7, 8, 3),
(84, 9, 7, 9, 0.2),
(85, 9, 7, 11, 0.5),
(86, 9, 8, 6, 2),
(87, 9, 8, 7, 0.33),
(88, 9, 8, 8, 1),
(89, 9, 8, 9, 0.2),
(90, 9, 8, 11, 0.2),
(91, 9, 9, 6, 5),
(92, 9, 9, 7, 0.33),
(93, 9, 9, 8, 5),
(94, 9, 9, 9, 1),
(95, 9, 9, 11, 0.2),
(96, 9, 11, 6, 5),
(97, 9, 11, 7, 2),
(98, 9, 11, 8, 5),
(99, 9, 11, 9, 5),
(100, 9, 11, 11, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_record`
--

CREATE TABLE `tbl_record` (
  `id_record` int(11) NOT NULL,
  `nama_kriteria` varchar(20) NOT NULL,
  `paket_menu` text NOT NULL,
  `urutan_menu` text NOT NULL,
  `pagi` text NOT NULL,
  `siang` text NOT NULL,
  `sore` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_record`
--

INSERT INTO `tbl_record` (`id_record`, `nama_kriteria`, `paket_menu`, `urutan_menu`, `pagi`, `siang`, `sore`) VALUES
(3, 'Overweight', 'Paket Menu 1, Paket Menu 2, Paket Menu 3, Paket Menu 4, Paket Menu 5', 'Paket Menu 2, Paket Menu 5, Paket Menu 4, Paket Menu 3, Paket Menu 1', 'Telor bali, Sambal goreng tahu, Tumis ', 'Tongkol suwir + telor puyuh, Tempe bacem, Sayur asem', 'Telor cetak, Sambal goreng kentang+bola daging, Bubur ');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_alternatif_topsis`
--
ALTER TABLE `tbl_alternatif_topsis`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `tbl_data_topsis`
--
ALTER TABLE `tbl_data_topsis`
  ADD PRIMARY KEY (`id_alternatif_data`),
  ADD KEY `id_kriteria_ahp` (`id_kriteria_ahp`);

--
-- Indeks untuk tabel `tbl_ir`
--
ALTER TABLE `tbl_ir`
  ADD PRIMARY KEY (`id_ir`);

--
-- Indeks untuk tabel `tbl_kriteria_ahp`
--
ALTER TABLE `tbl_kriteria_ahp`
  ADD PRIMARY KEY (`id_kriteria_ahp`);

--
-- Indeks untuk tabel `tbl_kriteria_pasien`
--
ALTER TABLE `tbl_kriteria_pasien`
  ADD PRIMARY KEY (`id_kriteria_pasien`);

--
-- Indeks untuk tabel `tbl_kriteria_topsis`
--
ALTER TABLE `tbl_kriteria_topsis`
  ADD PRIMARY KEY (`id_kriteria_topsis`),
  ADD KEY `id_kriteria_ahp` (`id_kriteria_ahp`);

--
-- Indeks untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `tbl_pasanganalternatif_topsis`
--
ALTER TABLE `tbl_pasanganalternatif_topsis`
  ADD PRIMARY KEY (`id_alternatif_kriteria`);

--
-- Indeks untuk tabel `tbl_pasangankriteria_ahp`
--
ALTER TABLE `tbl_pasangankriteria_ahp`
  ADD PRIMARY KEY (`id_pasangan_kriteria`),
  ADD KEY `id_kriteria_pasien` (`id_kriteria_pasien`),
  ADD KEY `id_kriteria_baris` (`id_kriteria_baris`),
  ADD KEY `id_kriteria_kolom` (`id_kriteria_kolom`);

--
-- Indeks untuk tabel `tbl_record`
--
ALTER TABLE `tbl_record`
  ADD PRIMARY KEY (`id_record`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_alternatif_topsis`
--
ALTER TABLE `tbl_alternatif_topsis`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_data_topsis`
--
ALTER TABLE `tbl_data_topsis`
  MODIFY `id_alternatif_data` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_ir`
--
ALTER TABLE `tbl_ir`
  MODIFY `id_ir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_kriteria_ahp`
--
ALTER TABLE `tbl_kriteria_ahp`
  MODIFY `id_kriteria_ahp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_kriteria_pasien`
--
ALTER TABLE `tbl_kriteria_pasien`
  MODIFY `id_kriteria_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_kriteria_topsis`
--
ALTER TABLE `tbl_kriteria_topsis`
  MODIFY `id_kriteria_topsis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_pasanganalternatif_topsis`
--
ALTER TABLE `tbl_pasanganalternatif_topsis`
  MODIFY `id_alternatif_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tbl_pasangankriteria_ahp`
--
ALTER TABLE `tbl_pasangankriteria_ahp`
  MODIFY `id_pasangan_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `tbl_record`
--
ALTER TABLE `tbl_record`
  MODIFY `id_record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_data_topsis`
--
ALTER TABLE `tbl_data_topsis`
  ADD CONSTRAINT `tbl_data_topsis_ibfk_1` FOREIGN KEY (`id_kriteria_ahp`) REFERENCES `tbl_kriteria_ahp` (`id_kriteria_ahp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_kriteria_topsis`
--
ALTER TABLE `tbl_kriteria_topsis`
  ADD CONSTRAINT `tbl_kriteria_topsis_ibfk_1` FOREIGN KEY (`id_kriteria_ahp`) REFERENCES `tbl_kriteria_ahp` (`id_kriteria_ahp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pasangankriteria_ahp`
--
ALTER TABLE `tbl_pasangankriteria_ahp`
  ADD CONSTRAINT `tbl_pasangankriteria_ahp_ibfk_1` FOREIGN KEY (`id_kriteria_pasien`) REFERENCES `tbl_kriteria_pasien` (`id_kriteria_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pasangankriteria_ahp_ibfk_2` FOREIGN KEY (`id_kriteria_baris`) REFERENCES `tbl_kriteria_ahp` (`id_kriteria_ahp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pasangankriteria_ahp_ibfk_3` FOREIGN KEY (`id_kriteria_kolom`) REFERENCES `tbl_kriteria_ahp` (`id_kriteria_ahp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
