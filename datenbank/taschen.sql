-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3307
-- Generation Time: Feb 13, 2017 at 12:34 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taschen`
--

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `IDDesign` int(11) NOT NULL,
  `NameDesign` varchar(50) DEFAULT NULL,
  `BezeichnungDesign` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `design`
--

INSERT INTO `design` (`IDDesign`, `NameDesign`, `BezeichnungDesign`) VALUES
(1, 'Handtasche', 'Das ist eine Handtasche'),
(2, 'Kleine Tasche', 'Das ist eine kleine Tasche');

-- --------------------------------------------------------

--
-- Table structure for table `hatkategorie`
--

CREATE TABLE `hatkategorie` (
  `IDTasche` int(11) NOT NULL,
  `IDKategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hattype`
--

CREATE TABLE `hattype` (
  `IDTasche` int(11) NOT NULL,
  `IDType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kategorie`
--

CREATE TABLE `kategorie` (
  `IDKategorie` int(11) NOT NULL,
  `NameKategorie` varchar(50) DEFAULT NULL,
  `BezeichnungKategorie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategorie`
--

INSERT INTO `kategorie` (`IDKategorie`, `NameKategorie`, `BezeichnungKategorie`) VALUES
(1, 'Frauen', 'Tasche für Frauen'),
(2, 'Männer', 'Tasche für Männer'),
(3, 'Kinder', 'Tasche für Kinder');

-- --------------------------------------------------------

--
-- Table structure for table `kauft`
--

CREATE TABLE `kauft` (
  `Datum` datetime DEFAULT NULL,
  `IBANKauft` varchar(22) DEFAULT NULL,
  `IDKunde` int(11) NOT NULL,
  `IDTasche` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kunde`
--

CREATE TABLE `kunde` (
  `IDKunde` int(11) NOT NULL,
  `Namekunde` varchar(50) DEFAULT NULL,
  `Stadt` varchar(100) DEFAULT NULL,
  `PLZ` int(11) DEFAULT NULL,
  `Strasse` varchar(100) DEFAULT NULL,
  `Vorname` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `IBANKunde` varchar(22) DEFAULT NULL,
  `TypeKunde` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kunde`
--

INSERT INTO `kunde` (`IDKunde`, `Namekunde`, `Stadt`, `PLZ`, `Strasse`, `Vorname`, `Username`, `Email`, `Password`, `IBANKunde`, `TypeKunde`) VALUES
(7, 'Nganya Nana', 'Brandenburg', 14770, 'Zanderstr. 10A', 'Herval', 'herval', 'hervalnganya@yahoo.fr', '11111111', '', 0),
(8, 'Behengue', 'Brandenburg', 14770, 'Zanderstr. 10D', 'Ines', 'inesbeh', 'inesbehengue@yahoo.fr', '11111111', '', 0),
(9, 'Behengue', 'Brandenburg', 14770, 'Zanderstr. 10D', 'Ines', 'inesbehw', 'inesbeheng4ue@yahoo.fr', '11111111', '', 0),
(10, 'Behengue', 'Brandenburg', 14770, 'Zanderstr. 10D', 'Ines', 'inesbehwd', 'inesbehedng4ue@yahoo.fr', '11111111', '', 0),
(11, 'Behengue', 'Brandenburg', 14770, 'Zanderstr. 10D', 'Ines', 'inesbehwde', 'inesbehedng4tue@yahoo.fr', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', '', 0),
(12, 'Evina', 'berlin', 10627, 'Kantstrasse 102', 'Giselle Prudence', 'Prudence', 'prudence@gmail.com', '82dcc67b5c0f0d363a2da84613613bf94de1f014', '', 0),
(13, 'Marie', 'berlin', 10627, 'Kantstrasse 104', 'Crescence', 'Marie', 'marie@gmail.com', '790c8625cae5371b6221381b41550671605ca9f2', '', 0),
(14, 'forlondon', 'London', 12789, 'londonerstr. 13', 'londonfor', 'forlon', 'for@london.com', 'a2d3cc283e233f50b45383fd8c09c2e7a54ea6d3', '', 0),
(15, 'Usertest', 'stadttest', 12345, 'strassetest 10', 'Usertest', 'usertest', 'testemail@test.de', '7c222fb2927d828af22f592134e8932480637c0d', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `marke`
--

CREATE TABLE `marke` (
  `IDMarke` int(11) NOT NULL,
  `NameMarke` varchar(50) DEFAULT NULL,
  `BezeichnungMarke` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marke`
--

INSERT INTO `marke` (`IDMarke`, `NameMarke`, `BezeichnungMarke`) VALUES
(1, 'Gucci', 'Das ist eine Marke'),
(4, 'Louis Vuitton', 'Das ist noch eine Marke'),
(5, 'Samsung', 'Computer Tasche'),
(6, 'Cucci', 'Abend Tasche'),
(7, 'Nike', 'Schule Tasche');

-- --------------------------------------------------------

--
-- Table structure for table `tasche`
--

CREATE TABLE `tasche` (
  `IDTasche` int(11) NOT NULL,
  `NameTasche` varchar(100) DEFAULT NULL,
  `Menge` int(11) DEFAULT NULL,
  `Preis` int(11) DEFAULT NULL,
  `PATH` varchar(255) DEFAULT NULL,
  `IDDesign` int(11) DEFAULT NULL,
  `IDMarke` int(11) DEFAULT NULL,
  `BeschreibungTasche` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `valeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `valeur`) VALUES
(1, 5),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `IDType` int(11) NOT NULL,
  `NameType` varchar(50) DEFAULT NULL,
  `BezeichnungType` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`IDType`, `NameType`, `BezeichnungType`) VALUES
(1, 'Leder', 'Leder mit Blumen'),
(2, 'Stoffe', 'für einkauft');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`IDDesign`);

--
-- Indexes for table `hatkategorie`
--
ALTER TABLE `hatkategorie`
  ADD PRIMARY KEY (`IDTasche`,`IDKategorie`),
  ADD KEY `FK_hatkategorie_IDKategorie` (`IDKategorie`);

--
-- Indexes for table `hattype`
--
ALTER TABLE `hattype`
  ADD PRIMARY KEY (`IDTasche`,`IDType`),
  ADD KEY `FK_hattype_IDType` (`IDType`);

--
-- Indexes for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`IDKategorie`);

--
-- Indexes for table `kauft`
--
ALTER TABLE `kauft`
  ADD PRIMARY KEY (`IDKunde`,`IDTasche`),
  ADD KEY `FK_kauft_IDTasche` (`IDTasche`);

--
-- Indexes for table `kunde`
--
ALTER TABLE `kunde`
  ADD PRIMARY KEY (`IDKunde`);

--
-- Indexes for table `marke`
--
ALTER TABLE `marke`
  ADD PRIMARY KEY (`IDMarke`);

--
-- Indexes for table `tasche`
--
ALTER TABLE `tasche`
  ADD PRIMARY KEY (`IDTasche`),
  ADD KEY `FK_Tasche_IDDesign` (`IDDesign`),
  ADD KEY `FK_Tasche_IDMarke` (`IDMarke`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`IDType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `design`
--
ALTER TABLE `design`
  MODIFY `IDDesign` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `IDKategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kunde`
--
ALTER TABLE `kunde`
  MODIFY `IDKunde` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `marke`
--
ALTER TABLE `marke`
  MODIFY `IDMarke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tasche`
--
ALTER TABLE `tasche`
  MODIFY `IDTasche` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `IDType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hatkategorie`
--
ALTER TABLE `hatkategorie`
  ADD CONSTRAINT `FK_hatkategorie_IDKategorie` FOREIGN KEY (`IDKategorie`) REFERENCES `kategorie` (`IDKategorie`),
  ADD CONSTRAINT `FK_hatkategorie_IDTasche` FOREIGN KEY (`IDTasche`) REFERENCES `tasche` (`IDTasche`);

--
-- Constraints for table `hattype`
--
ALTER TABLE `hattype`
  ADD CONSTRAINT `FK_hattype_IDTasche` FOREIGN KEY (`IDTasche`) REFERENCES `tasche` (`IDTasche`),
  ADD CONSTRAINT `FK_hattype_IDType` FOREIGN KEY (`IDType`) REFERENCES `type` (`IDType`);

--
-- Constraints for table `kauft`
--
ALTER TABLE `kauft`
  ADD CONSTRAINT `FK_kauft_IDKunde` FOREIGN KEY (`IDKunde`) REFERENCES `kunde` (`IDKunde`),
  ADD CONSTRAINT `FK_kauft_IDTasche` FOREIGN KEY (`IDTasche`) REFERENCES `tasche` (`IDTasche`);

--
-- Constraints for table `tasche`
--
ALTER TABLE `tasche`
  ADD CONSTRAINT `FK_Tasche_IDDesign` FOREIGN KEY (`IDDesign`) REFERENCES `design` (`IDDesign`),
  ADD CONSTRAINT `FK_Tasche_IDMarke` FOREIGN KEY (`IDMarke`) REFERENCES `marke` (`IDMarke`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
