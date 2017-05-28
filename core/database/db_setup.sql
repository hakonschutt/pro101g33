-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 28, 2017 at 03:52 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newcampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE IF NOT EXISTS `campus` (
  `id` int(11) unsigned NOT NULL,
  `navn` varchar(50) DEFAULT '',
  `campus_bilde_path` text,
  `latitude` decimal(11,0) DEFAULT NULL,
  `longitude` decimal(11,0) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`id`, `navn`, `campus_bilde_path`, `latitude`, `longitude`) VALUES
(1, 'Fjerdingen', 'img/campus/fjerdingen.png', NULL, NULL),
(2, 'Vulkan', 'img/campus/vulkan.png', NULL, NULL),
(3, 'Brenneriveien', 'img/campus/brenneriveien.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL,
  `campus_id` int(255) unsigned NOT NULL,
  `type_id` int(255) unsigned NOT NULL,
  `navn` varchar(255) NOT NULL,
  `beskrivelse` text,
  `bilde_path` text,
  `adresse` text,
  `reisetid` int(3) DEFAULT NULL,
  `latitude` decimal(11,6) DEFAULT NULL,
  `longitude` decimal(11,6) DEFAULT NULL,
  `x_id` int(11) DEFAULT NULL,
  `aapningstid` text
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `campus_id`, `type_id`, `navn`, `beskrivelse`, `bilde_path`, `adresse`, `reisetid`, `latitude`, `longitude`, `x_id`, `aapningstid`) VALUES
(1, 1, 1, 'Hausmanns gate', 'Vest for akerselva', 'img/data/bysykkel/Fjerdingen/Hausmanns-gate.jpg', 'Hausmanns Gate 7, 0186 Oslo', 2, 59.915412, 10.758343, 295, '06:00 - 24:00'),
(2, 1, 1, 'Legevakten', 'ved storgata', 'img/data/bysykkel/Fjerdingen/Legevakten.jpg', 'Storgata 38, 0182 Oslo', 3, 59.916847, 10.758148, 173, '06:00 - 24:00'),
(3, 1, 1, 'Nylandsveien', 'Mellom Norbygata og Urtegata', 'img/data/bysykkel/Fjerdingen/nylandsveien.jpg', 'Nylandsveien, 0186 Oslo', 5, 59.915620, 10.762248, 157, '06:00 - 24:00'),
(4, 1, 1, 'Jakob Kirke', 'Langs Torggata', 'img/data/bysykkel/Fjerdingen/jakob-kirke.jpg', 'Torggata 53, 0182 Oslo', 7, 59.917879, 10.754906, 191, '06:00 - 24:00'),
(5, 1, 1, 'Schous plass', 'Nærmest rundkjøringen', 'img/data/bysykkel/Fjerdingen/schous-plass.jpg', 'Schous Plass 8, 0552 Oslo', 7, 59.920383, 10.760820, 229, '06:00 - 24:00'),
(6, 1, 1, 'Vaterlandsparken', 'Langs Brugata', 'img/data/bysykkel/Fjerdingen/vaterlandsparken.jpg', 'Brugata 24, 0186 Oslo', 7, 59.913409, 10.757370, 163, '06:00 - 24:00'),
(7, 2, 1, 'Vulkan', 'Ved Maridalsveien', 'img/data/bysykkel/vulkan/vulkan.jpg', 'Maridalsveien 15, 0175 Oslo', 2, 59.922483, 10.751129, 235, '06:00 - 24:00'),
(8, 2, 1, 'AHO', 'Langs Maridalsveien', 'img/data/bysykkel/vulkan/AHO.jpg', 'Maridalsveien 27, 0175 Oslo', 3, 59.925276, 10.750405, 228, '06:00 - 24:00'),
(9, 2, 1, 'Fredensborg', 'Ved rundkjøringen', 'img/data/bysykkel/vulkan/Fredensborg.jpg', 'Fredensborgveien 64, 0177 Oslo', 4, 59.920944, 10.750362, 226, '06:00 - 24:00'),
(10, 2, 1, 'Bjerregaards gate', 'Ovenfor Fredrikke Qvams Gate', 'img/data/bysykkel/vulkan/Bjerregaards-gate.jpg', 'Bjerregaards Gate 32, 0172 Oslo', 6, 59.925502, 10.746069, 296, '06:00 - 24:00'),
(11, 2, 1, 'Olaf Ryes plass', 'Ved Sofienberggata', 'img/data/bysykkel/vulkan/olaf-ryes-plass.jpg', 'Olaf Ryes Plass, 0552 Oslo', 7, 59.922414, 10.758127, 222, '06:00 - 24:00'),
(12, 2, 1, 'Kiellands Plass', 'Ved Maridalsveien', 'img/data/bysykkel/vulkan/Alexander-Kiellands-Plass.jpg', 'Waldemar Thranes Gate 71, 0175 Oslo', 8, 59.928050, 10.751203, 233, '06:00 - 24:00'),
(13, 3, 1, 'Fredensborg', 'Ved rundkjøringen', 'img/data/bysykkel/Brenneriveien/Fredensborg.jpg', 'Fredensborgveien 64, 0177 Oslo', 3, 59.920944, 10.750362, 226, '06:00 - 24:00'),
(14, 3, 1, 'Vulkan', 'Ved Maridalsveien', 'img/data/bysykkel/Brenneriveien/Vulkan.jpg', 'Maridalsveien 15, 0175 Oslo', 4, 59.922483, 10.751129, 235, '06:00 - 24:00'),
(15, 3, 1, 'Olaf Ryes plass', 'Ved Sofienberggata', 'img/data/bysykkel/Brenneriveien/Olaf-Ryes-plass.jpg', 'Olaf Ryes Plass, 0552 Oslo', 5, 59.922414, 10.758127, 222, '06:00 - 24:00'),
(16, 3, 1, 'Bjerregaards gate', 'Ovenfor Fredrikke Qvams Gate', 'img/data/bysykkel/Brenneriveien/Bjerregaards-gate.jpg', 'Bjerregaards Gate 32, 0172 Oslo', 6, 59.925502, 10.746069, 296, '06:00 - 24:00'),
(17, 3, 1, 'Gravlund sør', 'Langs Ullevålsveien', 'img/data/bysykkel/Brenneriveien/Vaar-frelsers.jpg', 'Ullevålsveien 6, 0165 Oslo', 7, 59.919535, 10.743808, 164, '06:00 - 24:00'),
(18, 3, 1, 'Sofienbergparken', 'Langs sofienberggata', 'img/data/bysykkel/Brenneriveien/Sofienbergparken-sor.jpg', 'Sofienberggata 14, 0551 Oslo', 8, 59.922327, 10.761866, 246, '06:00 - 24:00'),
(19, 1, 2, 'Hausmanns gate', NULL, 'img/data/Transport/Fjerdingen/Hausmanns-gate.png', 'Storgata 38, 0182 Oslo', 3, 59.916405, 10.757647, 3010510, 'Sjekk Rutetabell'),
(20, 1, 2, 'Heimdalsgata', NULL, 'img/data/Transport/Fjerdingen/heimdalsgata.png', 'Trondheimsveien 5, 0560 Oslo', 5, 59.918441, 10.761438, 3010531, 'Sjekk Rutetabell'),
(21, 1, 2, 'Grønland [T]', NULL, 'img/data/Transport/Fjerdingen/Gronland.png', 'Smalgangen 8, 0188 Oslo', 6, 59.912801, 10.760186, 3010610, 'Man-Søn\n05:00-01:00'),
(22, 1, 2, 'Vahls gate', NULL, 'img/data/Transport/Fjerdingen/vahls-gate.png', 'Lakkegata 55, 0186 Oslo', 7, 59.916643, 10.765231, 3010535, 'Sjekk Rutetabell'),
(23, 1, 2, 'Jakob kirke', NULL, 'img/data/Transport/Fjerdingen/Jakob-kirke.png', 'Hausmanns gate 12, 0182 Oslo', 7, 59.918165, 10.753644, 3010514, 'Sjekk Rutetabell'),
(24, 1, 2, 'Hammersborg', NULL, 'img/data/Transport/Fjerdingen/hammersborggata.png', 'Hammersborggata 2, 0181 Oslo', 8, 59.914595, 10.752373, 3010066, 'Sjekk Rutetabell'),
(25, 2, 2, 'Birkelunden', NULL, 'img/data/Transport/Vulkan/Birkelunden.png', 'Schleppegrells gate 12, 0556 Oslo', 1, 59.926937, 10.761036, 3010519, 'Sjekk Rutetabell'),
(26, 2, 2, 'Telthusbakken', NULL, 'img/data/Transport/Vulkan/Telthusbakken.png', 'Telthusbakken, 0175 Oslo', 3, 59.924478, 10.750551, 3010331, 'Sjekk Rutetabell'),
(27, 2, 2, 'Møllerveien', NULL, 'img/data/Transport/Vulkan/Mollerveien.png', 'Møllerveien, 0178 Oslo', 4, 59.920588, 10.751391, 3010516, 'Sjekk Rutetabell'),
(28, 2, 2, 'Kiellands plass', NULL, 'img/data/Transport/Vulkan/Alexander-Kiellands-Plass.png', 'Waldemar Thranes gate 70, 0173 Oslo', 5, 59.928332, 10.749310, 3010330, 'Sjekk Rutetabell'),
(29, 2, 2, 'Schous plass', NULL, 'img/data/Transport/Vulkan/Schous-plass.png', 'Thorvald Meyers gate 66, 0552 Oslo', 6, 59.920797, 10.759327, 3010512, 'Sjekk Rutetabell'),
(30, 2, 2, 'Stensberggata', NULL, 'img/data/Transport/Vulkan/stensberggata.png', 'Ullevålsveien 10, 0171 Oslo', 10, 59.922324, 10.742162, 3010323, 'Sjekk Rutetabell'),
(31, 3, 2, 'Møllerveien', NULL, 'img/data/Transport/Brenneriveien/mollerveien.png', 'Møllerveien, 0178 Oslo', 3, 59.920588, 10.751391, 3010516, 'Sjekk Rutetabell'),
(32, 3, 2, 'Jakob Kirke', NULL, 'img/data/Transport/Brenneriveien/Jakob-kirke.png', 'Hausmanns gate 12, 0182 Oslo', 4, 59.918165, 10.753644, 3010515, 'Sjekk Rutetabell'),
(33, 3, 2, 'Nordahl Brun gate', NULL, 'img/data/Transport/Brenneriveien/nordahl-bruns-gate.png', 'Ullevålsveien 7, 0165 Oslo', 4, 59.919205, 10.743640, 3010324, 'Sjekk Rutetabell'),
(34, 3, 2, 'Stensberggata', NULL, 'img/data/Transport/Brenneriveien/stensberggata.png', 'Ullevålsveien 10, 0171 Oslo', 5, 59.922324, 10.742162, 3010323, 'Sjekk Rutetabell'),
(35, 3, 2, 'Schous plass', NULL, 'img/data/Transport/Brenneriveien/Schous-plass.png', 'Thorvald Meyers gate 66, 0552 Oslo', 7, 59.920797, 10.759327, 3010512, 'Sjekk Rutetabell'),
(36, 3, 2, 'St. Hanshaugen', NULL, 'img/data/Transport/Brenneriveien/st-hanshaugen.png', 'Waldemar Thranes gate 9, 0171 Oslo', 13, 59.924216, 10.739838, 3010322, 'Sjekk Rutetabell'),
(37, 1, 3, 'Rema 1000', 'Gå til venstre på Chr. Krohgs gate mot Hausmanns gate Stedet du skal til, er på høyre hånd\r\n260 m', 'img/data/butikker/fjerdingen/rema1000-chr-krogh.jpg', 'Chr. Kroghs Gate 1-11, 0186 Oslo', 3, 59.914287, 10.757001, NULL, 'Man - Fre\n07:00-23:00\n</br>\nLør\n08:00-22:00\n</br>\nSøn\nStengt'),
(38, 1, 3, 'Coop Prix', 'Gå til venstre på Chr. Krohgs gate mot Hausmanns gate 93 m\r\n</br>\r\nSving til høyre og inn på Hausmanns gate\r\n Stedet du skal til, er på venstre hånd 230 m', 'img/data/butikker/fjerdingen/prix-hausmanns.jpg', 'Hausmanns Gate 19, 0182 Oslo', 4, 59.916524, 10.755877, NULL, 'Man - Fre\n07:00-23:00\n</br>\nLør\n08:00-21:00\n</br>\nSøn\nStengt'),
(39, 1, 3, 'Extra', 'Gå til høyre på Chr. Krohgs gate mot Slåmotgangen 200 m\r\n</br>\r\nTa til høyre og inn på TrondheimsveienStedet du skal til, er på høyre hånd 160 m', 'img/data/butikker/fjerdingen/extra-trondheimsveien.jpg', 'Trondheimsveien 5, 0560', 5, 59.918322, 10.761252, NULL, 'Man - Fre\n07:00-23:00\n</br>\nLør\n08:00-23:00\n</br>\nSøn\n14:00-20:00'),
(40, 1, 3, 'Kiwi', 'Gå til venstre ut fra campus til du finner butikken.', 'img/data/butikker/fjerdingen/kiwi-gunerius.jpg', 'Storgata 32, 0184 Oslo', 7, 59.914281, 10.753185, NULL, 'Man - Fre\n06:00-00:00\n</br>\nLør\n08:00-00:00\n</br>\nSøn\nStengt'),
(41, 1, 3, 'Kiwi', 'Gå til venstre ut av campus gå over broen og så til høyre', 'img/data/butikker/fjerdingen/kiwi-gronland.jpg', 'Grønland 18, 0188 Oslo', 7, 59.913017, 10.761312, NULL, 'Man - Fre\n07:00-23:00\n</br>\nLør\n08:00-21:00\n</br>\nSøn\nStengt'),
(42, 1, 3, 'Rema 1000', 'Gå til høyre ut av Campus 200 m </br>\r\nSving til høyre og inn på Trondheimsveien og så til høyre inn på herslebs gate', 'img/data/butikker/fjerdingen/rema1000-herslebs.jpg', 'Herslebs Gate 17, 0561 Oslo', 8, 59.917967, 10.763736, NULL, 'Man - Fre\n07:00-23:00\n</br>\nLør\n08:00-22:00\n</br>\nSøn\nStengt'),
(43, 2, 3, 'Rema 1000', 'Gå til høyre ut av campus\r\n</br>\r\nSving til venstre og inn på Maridalsveien Stedet du skal til, er på venstre hånd 23 m', 'img/data/butikker/vulkan/rema1000-vulkan.jpg', 'Maridalsveien 15, 0178 Oslo', 2, 59.923303, 10.751537, NULL, 'Man - Fre\n07:00-23:00\n</br>\nLør\n08:00-21:00\n</br>\nSøn\nStengt'),
(44, 2, 3, 'Kiwi ', 'Gå til venstre ut av campus\r\n</br>\r\nTa til venstre mot Grünerbrua\r\n</br>\r\nSving til venstre på Nordre gate og inn på Markveien. Stedet du skal til, er på venstre hånd\r\n', 'img/data/butikker/vulkan/kiwi-markveien.jpg', 'Markveien 35b, 0554 Oslo', 7, 59.921623, 10.757222, NULL, 'Man - Lør\n07:00-23:00\n</br>\nSøn\nStengt'),
(45, 2, 3, 'Rema 1000', 'Gå til høyre ut av campus og ta til høyre mot Hauchs gate. Ta trappen</br>Ta til venstre mot Hauchs gate</br>Gå til Darres gate\r\n', 'img/data/butikker/vulkan/Rema1000-darres-gate.jpg', 'Darres Gate 2, 0175 Oslo', 8, 59.927668, 10.752105, NULL, 'Man - Fre\n07:00-23:00\n</br>\nLør\n08:00-21:00\n</br>\nSøn\nStengt'),
(46, 2, 3, 'Rema 1000', 'Gå til høyre ut av campus</br>\r\nSving til venstre og inn på Maridalsveien</br>Sving til høyre og inn på Dops gate. Stedet du skal til, er på venstre hånd', 'img/data/butikker/vulkan/Rema1000-fredenborgsveien.jpg', 'Fredenborgsveien 24, 0177 Oslo', 9, 59.919226, 10.747038, NULL, 'Man - Fre\n07:00-23:00\n</br>\nLør\n08:00-21:00\n</br>\nSøn\nStengt'),
(47, 2, 3, 'Rema 1000', 'Gå til høyre ut av campus</br>\r\nSving til høyre og inn på Maridalsveien</br> Stedet du skal til, er på venstre hånd', 'img/data/butikker/vulkan/Rema1000-waldemar.jpg', 'Waldemar Thranes Gate 25, 0171 Oslo', 10, 59.925721, 10.746049, NULL, 'Man - Fre\n07:00-23:00\n</br>\nLør\n08:00-21:00\n</br>\nSøn\nStengt'),
(48, 2, 3, 'Rema 1000', 'Gå til høyre ut av campus mot Seilduksgata</br>Ta til Seilduksgata\r\nså sving til venstre og inn på Thorvald Meyers gate. Stedet du skal til, er på venstre hånd\r\n', 'img/data/butikker/vulkan/Rema1000-thorvald.jpg', 'Thorvald Meyers Gate 23, 0555 Oslo', 11, 59.927308, 10.758928, NULL, 'Man - Fre\n07:00-23:00\n</br>\nLør\n08:00-21:00\n</br>\nSøn\nStengt'),
(49, 3, 3, 'Kiwi ', 'Gå til venstre ut av campus </br>\r\ngå til venstre inn på Maridalsveien</br>\r\nFortsett på Møllergata. Stedet du skal til, er på venstre hånd', 'img/data/butikker/brenneriveien/kiwi-fredensborg.jpg', 'Møllergata 56-58, 0179 Oslo', 3, 59.918968, 10.751481, NULL, 'Man - Lør\n07:00-23:00\n</br>\nSøn\nStengt'),
(50, 3, 3, 'Rema 1000 ', 'Gå til høyre ut av campus</b>\r\nSving til venstre og så svakt til høyre og inn på Vulkan 190 m\r\n</br>\r\nTa til venstre\r\n', 'img/data/butikker/brenneriveien/Rema1000-Vulkan.jpg', 'Maridalsveien 15, 0178 Oslo', 5, 59.923303, 10.751537, NULL, 'Man - Fre\n07:00-23:00\n</br>\nLør\n08:00-21:00\n</br>\nSøn\nStengt'),
(51, 3, 3, 'Rema 1000 ', 'Gå til venstre ut av campus 90 m </br>\r\nSvakt til venstre og så sving til høyre og inn på Rosteds gate 190 m</br>\r\nStedet du skal til, er til venstre på høyre hån', 'img/data/butikker/brenneriveien/Rema1000-Fredenborgsveien.jpg', 'Fredenborgsveien 24, 0177 Oslo', 6, 59.919226, 10.747038, NULL, 'Man - Fre\n07:00-23:00\n</br>\nLør\n08:00-22:00\n</br>\nSøn\nStengt'),
(52, 3, 3, 'Kiwi ', 'Gå til høyre ut av campus</br>\r\nFortsett på Nordre gate</br>\r\nSving til venstre og inn på Markveien. Stedet du skal til, er på venstre hånd 70 m', 'img/data/butikker/brenneriveien/Kiwi-markveien.jpg', 'Markveien 35b, 0554 Oslo', 6, 59.921623, 10.757222, NULL, 'Man - Lør\n07:00-23:00\n</br>\nSøn\nStengt'),
(53, 3, 3, 'Kiwi ', 'Gå til venstre ut av campus</br>\r\nSving til venstre inn på Bernt Ankers gate</br>\r\nTa til høyre for å holde deg på Storgata. Stedet du skal til, er på venstre hånd 77 m', 'img/data/butikker/brenneriveien/kiwi_gunerius.jpg', 'Storgata 32, 0184 Oslo', 10, 59.914281, 10.753185, NULL, 'Man - Lør\n07:00-23:00\n</br>\nSøn\nStengt'),
(54, 3, 3, 'Rema 1000 ', 'Gå til venstre ut av campus</br>\r\nTa til venstre for å holde deg på Pilestredet Park. Stedet du skal til, er på venstre hånd', 'img/data/butikker/brenneriveien/Rema1000-Pilestredet.jpg', 'Pilestredet Park 31, 0176 Oslo', 14, 59.919981, 10.738695, NULL, 'Man - Fre\n07:00-23:00\n</br>\nLør\n08:00-22:00\n</br>\nSøn\nStengt'),
(55, 1, 4, 'Tehran Kebab', 'Gå til venstre ut av campus</br>\r\nSving til høyre og inn på Hausmanns gate</br>\r\nStedet du skal til, er på høyre hånd', 'img/data/Spisesteder/fjerdingen/Tehran-Kebab-house.jpg', 'Storgata 38, 0182 Oslo', 3, 59.916156, 10.757805, NULL, 'Man - Fre\n10:00-21:00\n</br>\nLør\n12:00-23:00\n</br>\nSøn\nStengt'),
(56, 1, 4, 'Wilberg', 'Gå til venstre ut av campus\r\n</br>\r\nSving til høyre og inn på Hausmanns gate.\r\nStedet du skal til, er på venstre hånd', 'img/data/Spisesteder/fjerdingen/Wilberg.jpg', 'Filipstad brygge, 0182 Oslo', 4, 59.916539, 10.755717, NULL, 'Bestilling'),
(57, 1, 4, 'Trattoria Popolare', 'Gå til høyre ut av campus</br>\r\nSving til høyre og inn på Trondheimsveien 100 m</br>\r\nTa til venstre</br>', 'img/data/Spisesteder/fjerdingen/Trattoria-popolare.jpg', 'Trondheimsveien 2, 0182 Oslo', 5, 59.918232, 10.760001, NULL, 'Man - Tors\n11:00-22:00\n</br>\nFre - Lør\n11:00-23:00\n</br>\nSøn\n12:00-23:00'),
(58, 1, 4, 'Südøst Asian', 'Gå til høyre ut av campus</br>\r\nSving til høyre og inn på Trondheimsveien\r\ner på høyre hånd 110 m', 'img/data/Spisesteder/fjerdingen/sudost-asian-crossover.jpg', 'Trondheimsveien 5, 0182 Oslo', 5, 59.918181, 10.760572, NULL, 'Søn - Tors\n11:00-00:00\n</br>\nFre - Lør\n11:00-01:00'),
(59, 1, 4, 'Delicatessen', 'Gå til høyre ut av campus</br>\r\nSving til høyre og inn på Thorvald Meyers gate</br>\r\nSving til venstre og inn på Søndre gate.\r\n Stedet du skal til, er på høyre hånd', 'img/data/Spisesteder/fjerdingen/Delicatessen-grunerlokka.jpg', 'Søndre gate 8, 0550 Oslo', 5, 59.918701, 10.758267, NULL, 'Man - Tirs\n11:00-00:00\n</br>\nOns - Tors\n11:00-01:00\n</br>\nFre\n11:00-02:00\n</br>\nLør\n12:00-02:00\n</br>\nSøn\n12:00-00:00'),
(60, 1, 4, 'Trancher', 'Gå til høyre ut av campus\r\n</br>\r\nSving til høyre og inn på Thorvald Meyers gate.\r\n Stedet du skal til, er på høyre hånd', 'img/data/Spisesteder/fjerdingen/Trancher-Entrecote.jpg', 'Thorvald Meyers gate 78, 0550 Oslo', 5, 59.918942, 10.759502, NULL, 'Man - Søn\n16:00-23:00'),
(61, 2, 4, 'Lucky Bird', 'Gå til venstre ut av campus\r\n Stedet du skal til, er på venstre hånd\r\n83 m', 'img/data/Spisesteder/Vulkan/lucky-bird.jpg', 'Vulkan 7, 0175 Oslo', 1, 59.922603, 10.752000, NULL, 'Man - Tors\n15:00-23:00\n</br>\nFre - Lør\n12:00-00:00\n</br>\nSøn\n12:00-23:00'),
(62, 2, 4, 'La Crêpe', 'Gå til venstre ut av campus.\r\n Stedet du skal til, er på høyre hånd\r\n89 m', 'img/data/Spisesteder/Vulkan/la-crepe.jpg', 'Vulkan 28, 0178 Oslo', 1, 59.922568, 10.751655, NULL, 'Tirs - Søn\n12:00-21:00'),
(63, 2, 4, 'Mathallen Oslo', 'Gå til venstre ut av campus mot Møllerveien\r\n120 m', 'img/data/Spisesteder/Vulkan/mathallen-oslo.jpg', 'Vulkan 5, 0178 Oslo', 1, 59.922222, 10.751999, NULL, 'Tirs - Ons\n10:00-19:00\n</br>\nTors - Fre\n10:00-20:00\n</br>\nLør\n10:00-19:00\n</br>\nSøn\n11:00-18:00'),
(64, 2, 4, 'Døgnvill Burger', 'Gå til høyre ut av campus mot Maridalsveien</br>\nSving til venstre og inn på Maridalsveien.\n Stedet du skal til, er på venstre hånd\n', 'img/data/Spisesteder/Vulkan/dognvill-burger-vulkan.jpg', 'Vulkan 12, 0178 Oslo', 4, 59.921711, 10.751670, NULL, 'Man - Ons\n12:00-23:00\n</br>\nTors- Lør\n12:00-00:00\n</br>\nSøn\n12:00-23:00'),
(65, 2, 4, 'Foccaceria', 'Gå til høyre ut av campus\r\n</br>\r\nSving til venstre og inn på Grüners gate\r\n</br>\r\nSving til venstre og inn på Markveien.\r\n Stedet du skal til, er på høyre hånd\r\n', 'img/data/Spisesteder/Vulkan/foccaceria.jpg', 'Markveien 34, 0554 Oslo', 6, 59.923700, 10.757363, NULL, 'Tirs - Søn\n12:00-21:00\n'),
(66, 2, 4, 'Noodlepie AS', 'Gå til høyre ut av campus\r\n</br>\r\nSving til venstre og inn på Grüners gate.\r\n Stedet du skal til, er på høyre hånd', 'img/data/Spisesteder/Vulkan/noodlepie.jpg', 'Grüners gate 9, 0552 Oslo', 6, 59.923353, 10.757034, NULL, 'Man - Søn\n12:00-23:00'),
(67, 3, 4, 'Today Grill&Pizza', 'Gå til venstre ut av campus</br>\r\nSving til høyre og inn på Rosteds gate.</br>\r\n Stedet du skal til, er på høyre hånd', 'img/data/Spisesteder/Brenneriveien/today-grill-pizza.jpg', 'Risteds gate 1, 0178 Oslo', 3, 59.919307, 10.750995, NULL, 'Man-Søn\n13:00 - 23:00'),
(68, 3, 4, 'Delhi Tandoori', 'Gå til venstre ut av campus\r\n</br>\r\nSving til høyre og inn på Maridalsveien\r\n Stedet du skal til, er på venstre hånd', 'img/data/Spisesteder/Brenneriveien/delhi-tandoori.jpg', 'Maridalsveien 4, 0178 Oslo', 4, 59.919670, 10.751388, NULL, 'Man - Søn\n13:00-23:00'),
(69, 3, 4, 'Bon Lio', 'Gå til venstre ut av campus</br>\r\nSving til venstre og inn på Iduns gate</b>\r\nSving til Fredensborgveien.</br>\r\n Stedet du skal til, er på høyre hånd\r\n', 'img/data/Spisesteder/Brenneriveien/bon-lio.jpg', 'Fredensborgveien 42, 0177 Oslo', 4, 59.920385, 10.749105, NULL, 'Tirs - Tors\n18:00-01:00\n</br>\nFre-Lør\n17:00-01:00'),
(70, 3, 4, 'Chez Colin', 'Gå vesntre ut av campus</br>\r\nSving til venstre og inn på Iduns gate</br>\r\nSving til høyre.\r\n Stedet du skal til, er på venstre hånd', 'img/data/Spisesteder/Brenneriveien/chez-colin.jpg', 'Fredensborgveien 44, 0177 Oslo', 4, 59.920486, 10.749252, NULL, 'Tirs - Lør\n17:00-23:00\n</br>\nSøn\n15:00-23:00\n'),
(71, 3, 4, 'Filippa Sushi', 'Gå venstre ut av campus</br>\r\nSving til høyre og inn på Rosteds gate</br>\r\nSving til høyre.\r\n Stedet du skal til, er på venstre hånd', 'img/data/Spisesteder/Brenneriveien/filippa-sushi.jpg', 'Deichmans gate 9A, 0178 Oslo', 4, 59.919472, 10.749609, NULL, 'Man - Fre\n11:00-22:00\n</br>\nLør - Søn\n12:00-22:00'),
(72, 3, 4, 'Vegan Loving Hut', 'Gå til venstre ut av campus</br>\r\nSving til høyre og inn på Rosteds gate\r\n</br>\r\nSving til venstre.\r\n Stedet du skal til, er på venstre hånd', 'img/data/Spisesteder/Brenneriveien/vegan-loving-hut.jpg', 'Fredensborgveien 29, 0177 Oslo', 6, 59.919149, 10.748115, NULL, 'Man - Lør\n12:00-20:00\n'),
(73, 1, 5, 'Sjenkestua', 'Stedet du skal til, er i samme bygget', 'img/data/utesteder/Fjerdingen/Sjenkestua-studentbar.jpg', 'Chr. Kroghs Gate 32, 0186 Oslo', 1, 59.916053, 10.760126, NULL, 'Tors\n17:00-00:00\n</br>\nFre\n15:00-00:00\n'),
(74, 1, 5, 'Skuret bar', 'Gå til venstre ut av campus\r\n Stedet du skal til, er på venstre hånd\r\n230 m\r\n</br>', 'img/data/utesteder/Fjerdingen/Skuret-bar.jpg', 'Chr. Kroghs Gate 2, 0186 Oslo', 3, 59.914973, 10.758224, NULL, 'Man - Tors\n16:00-01:00\n</br>\nFre - Lør\n15:00-03:30\n</br>\nSøn\n18:00-01:00'),
(75, 1, 5, 'Cafe Con Bar', 'Gå til venstre ut av campus\r\n</br>\r\nSvakt til høyre og inn på Brugata. Stedet du skal til, er på høyre hånd', 'img/data/utesteder/Fjerdingen/cafe-con-bar.jpg', 'Brugata 11, 0186 Oslo', 4, 59.913836, 10.756544, NULL, 'Man - Tors\n10:00-01:00\n</br>\nFre - Lør\n10:00-03:00\n</br>\nSøn\n12:00-12:00'),
(76, 1, 5, 'Dattera til hagen', 'Gå til venstre ut av campus\r\n</br>\r\nSving til venstre og over broen og ta 4. avkjøring ut på Lakkegata.\r\nStedet du skal til, er på venstre hånd', 'img/data/utesteder/Fjerdingen/dattera-til-hagen.jpg', 'Grønland 10, 0188 Oslo', 6, 59.913254, 10.760122, NULL, 'Man - Tors\n11:00-01:00\n</br>\nFre - Lør\n11:00-03:30\n</br>\nSøn\n12:00-00:00'),
(77, 1, 5, 'Verkstedet bar', 'Gå til venstre ut av campus\r\n</br>\r\nTa til høyre for å holde deg på Hausmanns gate.\r\n Stedet du skal til, er på venstre hånd', 'img/data/utesteder/Fjerdingen/verkstedet-bar.jpg', 'Hausmanns gate 29, 0182 Oslo', 6, 59.917716, 10.754042, NULL, 'Ons - Tors\n17:00-01:00\n</br>\nFre - Lør\n19:00-03:00'),
(78, 1, 5, 'Schouskjelleren', 'Gå til høyre ut av campus\r\n</br>\r\nSving til høyre og inn på Trondheimsveien\r\n</br>\r\nTa til venstre.\r\n Stedet du skal til, er på høyre hånd', 'img/data/utesteder/Fjerdingen/Schouskjeller-mikrobryggeri.jpg', 'Trondheimsveien 2, 0560 Oslo', 8, 59.918411, 10.760267, NULL, 'Man - Tors\n16:00-02:00\n</br>\nFre - Lør\n16:00-03:30\n</br>\nSøn\n16:00-01:00'),
(79, 2, 5, 'Bar Vulkan', 'Gå til venstre ut av campus\r\n46 m', 'img/data/utesteder/Vulkan/bar-vulkan.jpg', 'Vulkan 9, 0178 Oslo', 1, 59.922838, 10.752404, NULL, 'Tirs - Tors\n17:00-00:00\n</br>\nFre\n16:00-03:00\n</br>\nLør\n16:00-00:00'),
(80, 2, 5, 'Vulkan Pub', 'Gå til venstre ut av campus.\r\n Stedet du skal til, er på høyre hånd\r\n110 m\r\n', 'img/data/utesteder/Vulkan/vulkan-pub.jpg', 'Vulkan 26, 0178 Oslo', 1, 59.922476, 10.751246, NULL, 'Tirs - Fre\n18:00-00:00\n</br>\nLør\n18:00-02:00'),
(81, 2, 5, 'Fyrhuset kuba', 'Gå til høyre ut av campus</br>\r\nSving til høyre og inn på Maridalsveien.\r\n Stedet du skal til, er på høyre hånd', 'img/data/utesteder/Vulkan/fyrhuset-kuba.jpg', 'Maridalsveien 19, 0175 Oslo', 1, 59.923592, 10.751851, NULL, 'Man - Tirs\n15:00-00:00\n</br>\nOns-Lør\n15:00-01:00\n'),
(82, 2, 5, 'Hendrix Ibsen', 'Gå til venstre ut av campus\r\n Stedet du skal til, er på høyre hånd\r\n160 m', 'img/data/utesteder/Vulkan/hendrix-ibsen.jpg', 'Vulkan 16, 0178 Oslo', 2, 59.921941, 10.751436, NULL, 'Man - Tors\n08:00-23:00\n</br>\nFre\n08:00-03:30\n</br>\nLør\n09:00-03:00\n</br>\nSøn\n10:00-23:00'),
(83, 2, 5, 'Søvnløs Bar', 'Gå til venstre ut av campus.\r\n Stedet du skal til, er på høyre hånd\r\n180 m', 'img/data/utesteder/Vulkan/sovnlos-bar.jpg', 'Vulkan 12, 0178 Oslo', 2, 59.921741, 10.751641, NULL, 'Ons - Tors\n18:00-00:00\n</br>\nFre\n17:00-01:00\n</br>\nLør\n14:00-01:00\n</br>\nSøn\n14:00-22:00'),
(84, 2, 5, 'Parkteateret bar', 'Gå til høyre ut av campus\r\nTa til høyre mot Grüners gate.\r\n Stedet du skal til, er på venstre hånd', 'img/data/utesteder/Vulkan/parkteateret-bar.jpg', 'Olaf Ryes Plass 11, 0552 Oslo', 7, 59.923466, 10.758322, NULL, 'Ons - Tors\n11:00-02:00\n</br>\nFre - Lør\n11:00-03:00\n</br>\nSøn - Tirs\n11:00-01:00'),
(85, 3, 5, 'Blå', 'Stedet er i samme bygget\r\n</br>', 'img/data/utesteder/Brenneriveien/bla.jpg', 'Brenneriveien 9, 0182 Oslo', 1, 59.920168, 10.752845, NULL, 'Man - Søn\n13:00-03:00'),
(86, 3, 5, 'Bortenfor', 'Gå til venstre ut av campus.\r\n Stedet du skal til, er på venstre hånd', 'img/data/utesteder/Brenneriveien/bortenfor.jpg', 'Brenneriveien 7, 0182 Oslo', 1, 59.919853, 10.752703, NULL, 'Tirs - Tors\n16:00-01:00\n</br>\nFre\n15:00-03:00\n</br>\nLør\n13:00-03:00\n</br>\nSøn\n13:00-01:00'),
(87, 3, 5, 'Taxi Take Away', 'Gå til venstre ut av campus</br>\r\nSvakt til venstre og inn på Maridalsveien.\r\n Stedet du skal til, er på høyre hånd', 'img/data/utesteder/Brenneriveien/taxi-take-away.jpg', 'Maridalsveien 2, 0178 Oslo', 2, 59.919521, 10.751275, NULL, 'Man - Tirs\n20:00-00:30\n</br>\nOns - Søn\n17:00-00:30'),
(88, 3, 5, 'Søvnløs Bar', 'Gå til høyre ut av campus</br>\r\n</br>\r\nSvakt til høyre og inn på Vulkan.\r\n Stedet du skal til, er på venstre hånd', 'img/data/utesteder/Brenneriveien/sovnlos-bar.jpg', 'Vulkan 12, 0178 Oslo', 3, 59.921741, 10.751641, NULL, 'Ons - Tors\n18:00-00:00\n</br>\nFre\n17:00-01:00\n</br>\nLør\n14:00-01:00\n</br>\nSøn\n14:00-22:00\n'),
(89, 3, 5, 'Orlandos pub', 'Gå til venstre ut av campus\r\n</br>\r\nSving til høyre og inn på Rosteds gate.\r\n Stedet du skal til, er på høyre hånd', 'img/data/utesteder/Brenneriveien/orlandos-pub.jpg', 'Rosteds Gate 7, 0178 Oslo', 3, 59.919439, 10.750177, NULL, 'Ons - Tors\n17:00-01:00\n</br>\nFre - Lør\n19:00-03:00'),
(90, 3, 5, 'SYNG', 'Gå til venstre ut av campus\r\n</br>\r\nSving til venstre og inn på Nedre gate\r\n</br>\r\nSving til høyre og inn på Øvre gate.\r\n Stedet du skal til, er på høyre hånd', 'img/data/utesteder/Brenneriveien/SYNG.jpg', 'Nedre Gate 7, 0551 Oslo', 4, 59.919864, 10.754542, NULL, 'Man - Tors\n14:00-01:00\n</br>\nFre\n14:00-03:30\n</br>\nLør\n12:00-03:30\n</br>\nSøn\n12:00-01:00'),
(91, 1, 6, 'Volleyballbane', 'Gå til venstre ut av campus</br>\r\nSving til venstre og inn på Hausmanns gate\r\nog over broen til venstre', 'img/data/Fritidsaktiviteter/Fjerdingen/Volleyballbane.png', 'Nylandsveien, 0186 Oslo', 3, 59.915534, 10.760954, NULL, 'Døgnåpent'),
(92, 1, 6, 'Haralds Gym', 'Gå til venstre ut av campus\r\n</br>\r\nSving til høyre og inn på Hausmanns gate\r\n Stedet du skal til, er på høyre hånd', 'img/data/Fritidsaktiviteter/Fjerdingen/haralds-gym.png', 'Hausmanns gate 6, 0186 Oslo', 3, 59.915788, 10.758701, NULL, 'Man - Fre\n09:00-21:00\n</br>\nLør - Søn\n12:00-18:00'),
(93, 1, 6, 'Anker Gymsal', 'Gå til høyre til venstre ut av campus</br>\r\nSving til venstre og inn på Storgata.</br>\r\nStedet du skal til, er på høyre hånd', 'img/data/Fritidsaktiviteter/Fjerdingen/anker-gymsal.png', 'Storgata 91, 0182 Oslo', 3, 59.917499, 10.756832, NULL, 'Time bestilling'),
(94, 1, 6, 'Internet Cafè', 'Gå til venstre ut av campus</br>\r\nSving til høyre og inn på Hausmanns gate</br>\r\nSving til venstre og inn på Storgata.\r\n Stedet du skal til, er på høyre hånd', 'img/data/Fritidsaktiviteter/Fjerdingen/internet-cafe.png', 'Storgata 51, 0182 Oslo', 3, 59.915914, 10.756482, NULL, 'Man-Søn\n10:00-20:00'),
(95, 1, 6, 'Jødisk museum', 'Gå til venstre ut av campus\r\n</br>\r\nSving til høyre og inn på Hausmanns gate</br>\r\nSving til venstre og inn på Calmeyers gate.\r\n Stedet du skal til, er på venstre hånd', 'img/data/Fritidsaktiviteter/Fjerdingen/jodisk-museum.png', 'Calmeyers gate 15b, 0183 Oslo', 5, 59.916390, 10.755296, NULL, 'Tirs\n10:00-15:00\n</br>\nOns - Tors\n14:00-19:00\n</br>\nSøn\n11:00-16:00'),
(96, 1, 6, 'Botanisk hage', 'Gå til høyre ut av campus</br>\r\nSvakt til høyre og inn på Vahls gate/Rv4</br>\r\nSving til høyre og inn på Jens Bjelkesgate.</br>\r\n Stedet du skal til, er på høyre hånd', 'img/data/Fritidsaktiviteter/Fjerdingen/botanisk-hage.png', 'Monrads Gate, 0562', 9, 59.918409, 10.770372, NULL, 'Man - Søn\n07:00-21:00'),
(97, 2, 6, 'SiO Athletica', 'Gå til venstre ut av campus\r\n21 m', 'img/data/Fritidsaktiviteter/Vulkan/athletica-vulkan.png', 'Vulkan 15, 0178 Oslo', 1, 59.923150, 10.752198, NULL, 'Man - Tors\n06:00-22:00\n</br>\nFre\n06:00-20:00\n</br>\nLør\n09:00-18:00\n</br>\nSøn\n10:00-19:00'),
(98, 2, 6, 'Galleri Vulkan', 'Gå til høyre ut av campus</br>\r\nSving til venstre og inn på Maridalsveien.\r\n Stedet du skal til, er på venstre hånd', 'img/data/Fritidsaktiviteter/Vulkan/galleri-vulkan.png', 'Maridalsveien 13, 0175 Oslo', 3, 59.922396, 10.751264, NULL, 'Ons - Fre\n12:00-19:00\n</br>\nLør - Søn\n12:00-17:00'),
(99, 2, 6, 'Dansens Hus', 'Gå til venstre ut av campus.\r\n Stedet du skal til, er på venstre hånd\r\n220 m', 'img/data/Fritidsaktiviteter/Vulkan/dansens-hus.png', 'Vulkan 1, 0182 Oslo', 3, 59.921540, 10.752268, NULL, 'Arrangement basert'),
(100, 2, 6, 'Ytteborgs ølhall', 'Gå til høyre ut av campus\r\n</br>\r\nSving til venstre og inn på Akersbakken.\r\n Stedet du skal til, er på venstre hånd', 'img/data/Fritidsaktiviteter/Vulkan/ytteborgs-olhall.jpg', 'Akersbakken 28, 0174 Oslo', 8, 59.924461, 10.747488, NULL, 'Døgnåpent'),
(101, 2, 6, 'Sofienbergparken', 'Gå til høyre ut av campus\r\n</br>\r\nSving til venstre og inn på Grüners gate</br>\r\nTa til høyre', 'img/data/Fritidsaktiviteter/Vulkan/sofienbergparken.jpg', 'Sofienberggata 14, 0558 Oslo', 11, 59.923103, 10.763558, NULL, 'Døgnåpent'),
(102, 2, 6, 'Oslo Reptilpark', 'Gå til høyre ut av campus</br>\r\nSving til venstre og inn på Maridalsveien</br>\r\nTa til venstre for å holde deg på Fredensborgveien.\r\n Stedet du skal til, er på venstre hånd', 'img/data/Fritidsaktiviteter/Vulkan/Oslo-reptilpark.jpg', 'St. Olavs Gate 2, 0165 Oslo', 13, 59.918158, 10.743261, NULL, 'Man - Søn\n10:00-18:00'),
(103, 3, 6, 'Paintballparken', 'Gå til venstre ut av campus</br>\r\nFortsett på Møllergata.\r\n Stedet du skal til, er på venstre hånd', 'img/data/Fritidsaktiviteter/Brenneriveien/Megazone-og-paintballparken.jpg', 'Møllergata 24, 0179 Oslo', 7, 59.916278, 10.749361, NULL, 'Man - Fre\n14:00-22:00\n</br>\nLør\n11:00-23:00\n</br>\nSøn\n13:00-21:00'),
(104, 3, 6, 'Dokumentarkino', 'Gå til venstre ut av campus</br>\r\nSving til høyre og inn på Rosteds gate</br>\r\nSving til venstre og inn på Akersveien.\r\n Stedet du skal til, er på venstre hånd', 'img/data/Fritidsaktiviteter/Brenneriveien/oslo-dokumentarkino.jpg', 'Akersveien 20, 0177 Oslo', 7, 59.919860, 10.746358, NULL, 'Arrangement basert'),
(105, 3, 6, 'Bar og Bowling', 'Gå til venstre ut av campus</br>\r\nFortsett på Møllergata</br>\r\nSving til høyre og inn på Torggata.</br>\r\n Stedet du skal til, er på høyre hånd', 'img/data/Fritidsaktiviteter/Brenneriveien/oslo-bar-og-bowling.jpg', 'Torggata 16, 0181 Oslo', 8, 59.915888, 10.750805, NULL, 'Man - Tors\n11:00-00:00\n</br>\nFre - Lør\n11:00-02:00\n</br>\nSøn\n12:00-00:00'),
(106, 3, 6, 'Minigolfpark', 'Gå til venstre ut av campus\r\n</br>\r\nGå til Søndre gate\r\n Stedet du skal til, er på høyre hånd', 'img/data/Fritidsaktiviteter/Brenneriveien/grunerlokka-minigolfpark.jpg', 'Søndre gate 1, 0550 Oslo', 8, 59.918493, 10.758839, NULL, 'Man - Søn\n12:00-21:00'),
(107, 3, 6, 'Rockefeller', 'Gå til venstre ut av campus</br>\r\nFortsett på Møllergata</br>\r\nSving til høyre og inn på Torggata.\r\n Stedet du skal til, er på høyre hånd', 'img/data/Fritidsaktiviteter/Brenneriveien/rockefeller-music-hall.jpg', '0181, Badstugata 2, 0179 Oslo', 8, 59.916166, 10.750757, NULL, 'Arrangement basert'),
(108, 3, 6, 'SATS Schous plass', 'Gå til venstre ut av campus\r\n</br>\r\nSving til høyre og inn på Schouskvartalet</br>\r\nSving til høyre og inn på Trondheimsveien.\r\n Stedet du skal til, er på høyre hånd', 'img/data/Fritidsaktiviteter/Brenneriveien/Sats-Schous-plass.jpg', 'Trondheimsveien 2D, 0560 Oslo', 9, 59.919191, 10.760686, NULL, 'Man - Tors\n06:00-22:30\n</br>\nFre\n06:00-21:00\n</br>\nLør\n08:30-19:00\n</br>\nSøn\n10:00-20:00');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) unsigned NOT NULL,
  `type_navn` varchar(100) NOT NULL DEFAULT '',
  `type_bilde_path` text NOT NULL,
  `type_beskrivelse` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `type_navn`, `type_bilde_path`, `type_beskrivelse`) VALUES
(1, 'Bysykkel', 'img/aktivitet/bicycle.png', 'Bysykkelstativer finnes overalt i byen, og her får du en oversikt over de nærmeste stativene. Om det er plass til en ny sykkel, og om det er noen ledige sykler tilgjengelig. '),
(2, 'Transport', 'img/aktivitet/front-of-bus.png', 'Her finner du veibeskrivelse og kart til de nærmeste trikk/ busstoppene til campus. Det er også en oversikt over hvilke busser/ trikker som går fra stoppet og når/ hvor de går.'),
(3, 'Matbutikker', 'img/aktivitet/shopping-cart.png', 'Her finner du matbutikker i henhold til gåavstand fra campus, med kart og veibeskrivelse til valgte destinasjon.'),
(4, 'Spisesteder', 'img/aktivitet/2food.png', 'Her finner du spisesteder i henhold til gåavstand fra campus, med kart og veibeskrivelse til valgte destinasjon.'),
(5, 'Utesteder', 'img/aktivitet/food.png', 'Her finner du utesteder i henhold til gåavstand fra campus, med kart og veibeskrivelse til valgte destinasjon.'),
(6, 'Fritidsaktivitet', 'img/aktivitet/puzzle.png', 'Her finner du aktiviteter i henhold til gåavstand fra campus, med kart og veibeskrivelse til valgte destinasjon.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campus_id` (`campus_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
