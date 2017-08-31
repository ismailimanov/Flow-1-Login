-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 31. 08 2017 kl. 02:56:33
-- Serverversion: 10.1.21-MariaDB
-- PHP-version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `bruger`
--

CREATE TABLE `bruger` (
  `id` int(11) NOT NULL,
  `brugernavn` varchar(15) NOT NULL,
  `kodeord` varchar(255) NOT NULL,
  `fornavn` varchar(25) NOT NULL,
  `efternavn` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telefon` varchar(8) NOT NULL,
  `onlineStatus` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `bruger`
--

INSERT INTO `bruger` (`id`, `brugernavn`, `kodeord`, `fornavn`, `efternavn`, `email`, `telefon`, `onlineStatus`) VALUES
(16, 'ismail', '$2y$10$yLZnLBnY3fUlHN9DjPjisefOd091tnTrgP3WAcOgPO3hWJ6DuFmQ.', 'Ismail', 'Imanov', 'ismail@imanov.dk', '12345678', 0);

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `bruger`
--
ALTER TABLE `bruger`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `brugernavn` (`brugernavn`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `bruger`
--
ALTER TABLE `bruger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
