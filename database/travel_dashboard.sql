-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2024 pada 08.01
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_dashboard`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location_from` varchar(255) DEFAULT NULL,
  `location_to` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `packages`
--

INSERT INTO `packages` (`id`, `name`, `location_from`, `location_to`, `date`, `price`, `status`, `type`, `image`) VALUES
(1, 'Umrah Milad Yang ke-8 Jakarta', 'Le Meridien Towers Makkah', 'Nusk Al Madinah Hotel', '2025-10-28', 33500000.00, 'Active', 'Umrah', NULL),
(2, 'Promo Umrah Milad Ke-9 Sulawesi-Maluku-Papua 9D', 'Le Meridien Towers Makkah', 'Le Meridien Towers Makkah', '2025-10-15', 33900000.00, 'Active', 'Umrah', NULL),
(3, 'Promo Umrah Milad Ke-8 Sulawesi-Maluku-Papua 12D', 'Le Meridien Towers Makkah', 'Nusk Al Madinah Hotel', '2025-10-28', 36900000.00, 'Active', 'Umrah', NULL),
(4, 'Umrah Hasanah 12 Hari Yang Terdaftar', 'Le Meridien Towers Makkah', 'Nusk Al Madinah Hotel', '2024-12-17', 0.00, 'Inactive', 'Umrah', NULL),
(5, 'Umrah Berkah 9 Hari Yang Terdaftar', 'Le Meridien Towers Makkah', 'Nusk Al Madinah Hotel', '2024-12-17', 0.00, 'Inactive', 'Umrah', NULL),
(6, 'Trip Al-Aqsa', '-', '-', '2024-12-17', 0.00, 'Inactive', 'Travel', NULL),
(7, 'Trip Dubai', '-', '-', '2024-12-17', 0.00, 'Inactive', 'Travel', NULL),
(8, 'Trip Mesir', '-', '-', '2024-12-17', 0.00, 'Inactive', 'Travel', NULL),
(9, 'Trip Turkey', '-', '-', '2024-12-17', 0.00, 'Inactive', 'Travel', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
