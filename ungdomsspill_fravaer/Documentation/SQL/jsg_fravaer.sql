-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 05. Jan 2023 um 16:28
-- Server-Version: 10.4.24-MariaDB
-- PHP-Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `jsg_fravaer`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `abwesenheiten`
--

CREATE TABLE `abwesenheiten` (
  `id` int(11) NOT NULL,
  `Datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `abwesenheiten`
--

INSERT INTO `abwesenheiten` (`id`, `Datum`) VALUES
(12, '2023-01-03'),
(13, '2015-01-07'),
(24, '2023-01-05');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `abwesenheiten_daten`
--

CREATE TABLE `abwesenheiten_daten` (
  `id` int(11) NOT NULL,
  `Abwesenheiten_id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `abwesenheiten_daten`
--

INSERT INTO `abwesenheiten_daten` (`id`, `Abwesenheiten_id`, `Name`, `Status`) VALUES
(33, 24, 'Yannick Wernle', '0');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `login`
--

INSERT INTO `login` (`id`, `login`, `password`, `active`) VALUES
(1, 'wernle_y', '123', 1),
(2, 'wernle_l', '1234', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mitglieder`
--

CREATE TABLE `mitglieder` (
  `Mitglieder_id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Instrument` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `mitglieder`
--

INSERT INTO `mitglieder` (`Mitglieder_id`, `Name`, `Instrument`) VALUES
(5, 'Yannick Wernle', 'Test');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `abwesenheiten`
--
ALTER TABLE `abwesenheiten`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `abwesenheiten_daten`
--
ALTER TABLE `abwesenheiten_daten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_abwesenheiten_for` (`Abwesenheiten_id`);

--
-- Indizes für die Tabelle `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `mitglieder`
--
ALTER TABLE `mitglieder`
  ADD PRIMARY KEY (`Mitglieder_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `abwesenheiten`
--
ALTER TABLE `abwesenheiten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT für Tabelle `abwesenheiten_daten`
--
ALTER TABLE `abwesenheiten_daten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT für Tabelle `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `mitglieder`
--
ALTER TABLE `mitglieder`
  MODIFY `Mitglieder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `abwesenheiten_daten`
--
ALTER TABLE `abwesenheiten_daten`
  ADD CONSTRAINT `id_abwesenheiten_for` FOREIGN KEY (`Abwesenheiten_id`) REFERENCES `abwesenheiten` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
