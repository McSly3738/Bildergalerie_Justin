-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 30. Mai 2018 um 18:32
-- Server-Version: 10.1.32-MariaDB
-- PHP-Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `bilderdb`
--
CREATE DATABASE IF NOT EXISTS `bilderdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bilderdb`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bilder`
--

CREATE TABLE `bilder` (
  `id` int(11) NOT NULL,
  `beschreibung` text NOT NULL,
  `bildpfad` varchar(255) NOT NULL,
  `global` int(11) NOT NULL,
  `g_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bilder`
--

INSERT INTO `bilder` (`id`, `beschreibung`, `bildpfad`, `global`, `g_id`) VALUES
(28, 'sdfsdf', 'images/mockup1.png', 1, 25),
(29, 'sdfsdfsdf', 'images/pizza-prosciutto.jpg', 1, 25),
(30, 'BESTE CURRY FUCKKKK', 'images/IMG_9350.jpg', 1, 26);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `galerie`
--

CREATE TABLE `galerie` (
  `id` int(11) NOT NULL,
  `galeriename` varchar(55) NOT NULL,
  `beschreibung` text NOT NULL,
  `bildpfad` varchar(255) NOT NULL,
  `global` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `galerie`
--

INSERT INTO `galerie` (`id`, `galeriename`, `beschreibung`, `bildpfad`, `global`, `u_id`) VALUES
(25, 'Justin', 'Test', 'images/pizza-prosciutto.jpg', 0, 7),
(26, 'Curry', 'Feines Tamiler Curry', 'images/Tamil-Nadu-Chicken-Curry-Pachakam-4734.jpg', 0, 29),
(27, 'Test ', 'Öffentlich', 'images/IMG_9350.jpg', 1, 7),
(28, 'Test', 'Nich Öffentlich', 'images/flat-3840x2160-forest-deer-4k-5k-iphone-wallpaper-abstract-11925.jpg', 0, 7);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `mail` varchar(55) NOT NULL,
  `passwort` varchar(255) NOT NULL,
  `username` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `mail`, `passwort`, `username`) VALUES
(7, 'robinmueh@gmail.com', '$2y$14$P//dqVGKQrqEVMdwDMm09uEGzU7Jv3cVCpxxe/0RVjkZIGGmiDpva', 'Hansli'),
(8, 'test@gmail.com', '$2y$14$tKHjkOPj5R.RfxKMiizW1OfoM71f3vKmlzfVucgOmjXWv.HD4ft9G', '&lt;script&gt;alert(&quot;I am an alert box!&quot;);&lt'),
(9, 'test@gmail.com', '$2y$14$8U4/fpnCis5iCLXjpLX5.eeTEobq8QPvDycP.49qB01mA5HQyBLtC', '<script>alert(\"I am an alert box!\");</script>'),
(10, 'test@gmail.com', '$2y$14$1F632Lw/SkLjg4/KFH9iJuEy836QZ.7QQo6OjTg4t0.LXk6Ju4t4C', 'rdfg'),
(11, 'jajajaja@gmail.com', '$2y$14$N1xHJ6d..uW68rf7XHCdB.IwDUyQcaBYv/ezvgiCm8WW6288NvGSS', 'asdfa'),
(12, 'asdfasdfasdfasdfasdfasdfasdf@gmail.com', '$2y$14$bKskEXHIRviFem7BA3WdvOEvYCCH6XgvpZomyH6u.fae2ghK7rWWi', 'Hansli'),
(13, 'robinmueh@gmail.com', '$2y$14$5K/r3sL7Ao0onDZzBdCeNOTJcoRWy0Cm4/2ge19pkOEGQTSukYOQS', 'Hansli'),
(14, 'sdfsdfsdfsdf@gmail.com', '$2y$14$5TNEf7oJNaD7ZMedEPX8.uerHFObD5LKRokqUWPBzF9TeCCKOI/6O', 'Hansli'),
(15, 'robinmueh@gmail.com', '$2y$14$wdWGmGMywu7fqyNR3c5DzuawmQCg1jpK1j9MvBfss3HqiiS0YJf5.', 'asd'),
(16, 'test@gmail.com', '$2y$14$u86IPPTM7t573i9cNh2NlOU7.7f9vUAyKDjnZgT1vvrMA2k1BqUh2', 'Hansli'),
(17, 'test@gmail.com', '$2y$14$zg5sFFc20tVSHFisIlNrNukLg0iJ1IoNDmXhJlQhuIV8Vb.hpkDQW', 'Hansli'),
(18, 'robinmueh@gmail.com', '$2y$14$BjwCNEX5ts13oSaWIUQMj.syPD.le84ycr5eXfTJMySb97rKMq0Ey', 'TEST'),
(19, 'test@gmail.com', '$2y$14$k15ycqqkVS7WnGSHa.3vc.Sm/ZYdDncyTN2vH0VtCL.SKaJi2qfJ.', 'sdf'),
(20, 'test@gmail.com', '$2y$14$9ACwIsygIId0PYGGSChHKer/xqULmJTll15qsamyXrv5N.Atkn652', 'sdf'),
(21, 'sdfsdfsdfsdf@gmail.com', '$2y$14$e8eYOmwuZJ5HCUCWwHRM7.q4wMihb0jfJrw67bJqiQD4/4EIL/ckq', 'sdf'),
(22, 'sdfsdfsdfsdf@gmail.com', '$2y$14$ugIGeY6ZXXfx/vqZDdFq/emrt.JevokYZEt9shRdmuk/7aFFUZ4Ru', 'sdf'),
(23, 'sdfsdfsdfsdf@gmail.com', '$2y$14$c/5328Wx1RCf7ePx5WOnFevbGjPfi7hcI./yDeAb.w4gJymgYGgFS', 'sdf'),
(24, 'sdfsdfsdfsdf@gmail.com', '$2y$14$PbZEQ0cQenW6gztU7q0Q9.Tlmt4TfoGuU494fagQ612i5MYEK/dIa', 'sdf'),
(25, 'sdfsdfsdfsdf@gmail.com', '$2y$14$k74AtJrKYYtuX.wv454Et.9Ljc60e.v.xGLj93D6aGbW4.p8AGuIm', 'sdf'),
(26, 'sdfsdfsdfsdf@gmail.com', '$2y$14$wxE5wQvxb1GiCIibd9qlG.dPscmow7G4EX/h.sAMIiXh997Qb9ELK', 'sdf'),
(27, 'hallo123@gmail.com', '$2y$14$UXdWTACxgcpcnC5//ewEduoif.9fgKazK.m7no06CKcfK492WSCwO', 'asd'),
(28, 'testmail@gmail.com', '$2y$14$IdczMSIaE8IjSDCad8nY.uO78uh.6t8J81q1bky19PcGDWQpt82oW', 'Domi'),
(29, 'Janath@gmail.com', '$2y$14$qj/HHmNxFbmN2o6WGUk7yOdTASjsDJ9UlfvMNfxWAa8OhA7LzrxdC', 'Janath');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bilder`
--
ALTER TABLE `bilder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `g_id` (`g_id`) USING BTREE;

--
-- Indizes für die Tabelle `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bilder`
--
ALTER TABLE `bilder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT für Tabelle `galerie`
--
ALTER TABLE `galerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bilder`
--
ALTER TABLE `bilder`
  ADD CONSTRAINT `bilder_ibfk_1` FOREIGN KEY (`g_id`) REFERENCES `galerie` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `galerie`
--
ALTER TABLE `galerie`
  ADD CONSTRAINT `galerie_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
