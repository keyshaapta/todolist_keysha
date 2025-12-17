-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Des 2025 pada 06.52
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist_keysha`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id_category`, `category`) VALUES
(1, 'work'),
(2, 'personal'),
(3, 'other');

-- --------------------------------------------------------

--
-- Struktur dari tabel `todo`
--

CREATE TABLE `todo` (
  `id_todo` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('pending','done') DEFAULT 'pending',
  `favorit` tinyint(1) DEFAULT 0,
  `id_category` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `todo`
--

INSERT INTO `todo` (`id_todo`, `title`, `description`, `created_at`, `updated_at`, `status`, `favorit`, `id_category`, `id_user`) VALUES
(43, 'gift ', 'anything', '2025-12-17 02:51:38', '2025-12-17 02:51:38', 'pending', 0, 3, 1),
(44, 'frf', 'frf', '2025-12-17 03:48:20', '2025-12-17 03:48:20', 'pending', 0, 1, 1),
(45, 'sdfs', 'sdfs', '2025-12-17 03:52:31', '2025-12-17 03:52:31', 'pending', 0, 2, 1),
(46, 'eeeee', 'wqwq', '2025-12-17 04:16:01', '2025-12-17 04:16:24', 'pending', 0, 1, 1),
(47, 'pp', 'pp', '2025-12-17 04:25:48', '2025-12-17 04:31:12', 'done', 0, 2, 3),
(48, 'ge9ii', 'klo', '2025-12-17 04:34:33', '2025-12-17 04:34:33', 'pending', 0, 1, 3),
(49, 'kikikik', 'kikikik', '2025-12-17 04:34:41', '2025-12-17 04:34:48', 'pending', 0, 3, 3),
(50, 'kikikiloil', 'ykyuyuy', '2025-12-17 04:34:54', '2025-12-17 04:34:54', 'pending', 0, 1, 3),
(51, 'wddasa', 'sadadwed', '2025-12-17 04:35:03', '2025-12-17 04:35:03', 'pending', 0, 2, 3),
(52, 'ngerjain tugas', 'tugas mtk', '2025-12-17 04:42:26', '2025-12-17 04:42:26', 'pending', 0, 1, 4),
(53, 'beli baju baru', 'buat main', '2025-12-17 04:42:40', '2025-12-17 04:42:40', 'pending', 0, 2, 4),
(54, 'beliin kado', 'kado ultah ', '2025-12-17 04:43:14', '2025-12-17 04:43:14', 'pending', 0, 3, 4),
(55, 'nitip makanan', 'dimsum mentai sama matcha', '2025-12-17 04:43:39', '2025-12-17 04:43:39', 'pending', 0, 3, 4),
(56, 'a', 'a', '2025-12-17 04:47:37', '2025-12-17 04:47:37', 'pending', 0, 2, 4),
(57, 'b', 'b', '2025-12-17 04:47:50', '2025-12-17 05:09:23', 'done', 0, 1, 4),
(58, 'c', 'c', '2025-12-17 04:47:59', '2025-12-17 04:47:59', 'pending', 0, 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `email`, `birth_date`) VALUES
(1, 'miyata', '202cb962ac59075b964b07152d234b70', 'miya atala', 'miya@gmail.com', '2005-12-17'),
(2, 'fenora', '202cb962ac59075b964b07152d234b70', 'fenora mizuya', 'fenora@gmail.com', '2006-12-15'),
(3, 'fadwa', '04d2adba5c2e11dc35021705f053d6f9', 'fadwaa', 'fadwa@gmail.com', '2025-12-17'),
(4, 'keysha', '202cb962ac59075b964b07152d234b70', 'keysha apta widya dhari', 'keysha@gmail.com', '2008-02-01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id_todo`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `todo`
--
ALTER TABLE `todo`
  MODIFY `id_todo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `todo`
--
ALTER TABLE `todo`
  ADD CONSTRAINT `todo_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `todo_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
