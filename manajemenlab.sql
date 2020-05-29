-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 29 Jul 2019 pada 12.20
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemenlab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(10) NOT NULL,
  `nmbarang` varchar(255) NOT NULL,
  `jmlh` int(100) NOT NULL,
  `id_ketegori` int(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nmbarang`, `jmlh`, `id_ketegori`, `keterangan`) VALUES
(11, 'Obeng Besar', 100, 1, 'ini barang sensitif update keterangan'),
(12, 'resistor', 100, 1, 'ini barang sensitif'),
(14, 'untuk edit up 1  3 4', 12, 30, 'ini barang sensitif update keterangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `keterangan`) VALUES
(1, 'barang Rentan', 'Untuk Barang perangkat keras'),
(30, 'Perkakas', 'Untuk Barang perangkat keras'),
(31, 'Sensitif', 'ini barang sensitif update keterangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'dimas@admin.com', '$2y$10$ZIMiCe7uDlYiOeO/mZzqBukGNJJnQXYSTdyVE0y9uFvGRGEQc6BDm'),
(2, 'admin', 'mdimasradityatama@gmail.com', '$2y$10$A.T3FfYgMJcIQJPi4EHSwOJtJrzNrv1Phejvw1wIXDDLVg48GN4YW'),
(3, 'asdas', '', '$2y$10$soB2OA7yg.VrcI1CxR1L.uXlDb82O6lx56pGpXdhaSuUUaaT0Ddde'),
(4, 'as', '', '$2y$10$W6K4tnWyxn6SEtmK8knIvu1BSq5FYrveXcfh68ubsaf4/fIBNsDKC'),
(5, 'as', '', '$2y$10$Yrcc.XRSLChsSnK25CPhHu33oX7.sEQCqSIr/Ib2EqYja1Nm.bRui'),
(6, '', '', '$2y$10$33VsWd3DlrUY.ypLG0RtSOWqO3jhJdjGhEMWGQRwqzAi0jiQK/PkW'),
(7, '', '', '$2y$10$GpIvIIZRenQbfJ2pC7amveG2gyrMbkb8pXR6H4v3kizSHF32xhtEC'),
(8, '', '', '$2y$10$Msek/XXQqjtF0M.7rYGRMuR7noDv0js7cTk0iqsyCe35uKMk8w92m'),
(9, 'asdqewq', '', '$2y$10$xCPHJS3QcHdtlo8z6WnhwuOueBNrwuHDGPeM/A65T9Gc42AYmdpV.'),
(10, 'asdasd', 'asdas', '$2y$10$P9mXqSf4MEbzt5lBiJVVae7pKSLs3Rfkj5VsAqkG6gL0FC1xNzEBq'),
(11, '', '', '$2y$10$nTncTYB3SHw/DlG12oi56.2c3oe9gi8OhrAvhNjTXutC/JVCO.jeK'),
(12, 'as', '', '$2y$10$J6c.6r5gzw2PdMBXfXNpBuLbUT3UkfI8/UoGVtTS4erRG0pOVQrSK'),
(13, '', '', '$2y$10$pE9T7Zp6zGBGWje4c.4aX.PLeMxHvTxlZZAhcZROQXp/b5DDCJgtS'),
(14, '', '', '$2y$10$HieMC6ddHKqWEnbZAxUo6uRgz4oby/ZGIXunGq/lfzM1yPTd3eSAq'),
(15, '', 'dimas@admin.com', '$2y$10$dCZVi31A7FEk//Iq.RBKBuQEdfB/gDgbgJQJxciPwckhQTygEOi8y'),
(16, '', 'dimas@admin.com', '$2y$10$EkCdlNnf5YiEGRVgjbby4OF5HFwReDw4..F99UU1vKxxlvVWoS4vS'),
(17, 'asd', '', '$2y$10$.SPTIbs37M..S3JLZB5GWeiL1733puWeUsKZZ6TvQUVYO9O03S/bq'),
(18, '', '', '$2y$10$UmbIhDVCwBRtsonxnUQWJuMU5h72XqblI9IZUwMkzop5AwY.So9aK'),
(19, 'test1', 'test@email.com', '$2y$10$VagIfYKlf47ETWeDjnj57OOLD.ntirHb5Iqg9YKJfJZPS/cEBmMNi'),
(20, 'test1', 'test@email.com', '$2y$10$rMfLIdFTwVYWnEOADVOEXu4x0AYDcQZf7cMBw1HtYFkDnOY8Pf1RC'),
(21, 'dimasrt', 'dimas@admin.com', '$2y$10$eN4Kj9bMCDJI.Q.QUeZssOJAzZvBy87mra1gswKOgLqkrIt7AxZrW'),
(22, 'mdradityatama1', 'dimas@admin.com', '$2y$10$oXKf.5JFwkR.xPHkdM5JC.R.fdOoFFxagSKp6aZbYvavSi7VDiQkK');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ketegori` (`id_ketegori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_ketegori`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
