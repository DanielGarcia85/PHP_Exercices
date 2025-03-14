-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 26 fév. 2024 à 15:38
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `BasesCC`
--

-- --------------------------------------------------------

--
-- Structure de la table `sommets`
--

CREATE TABLE `sommets` (
  `som_id` int(11) NOT NULL,
  `som_nom` varchar(255) NOT NULL,
  `som_region` varchar(255) NOT NULL,
  `som_altitude` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sommets`
--

INSERT INTO `sommets` (`som_id`, `som_nom`, `som_region`, `som_altitude`) VALUES
(1, 'Everest', 'Mahalangur Himal, Himalaya', 8848),
(2, 'K2', 'Baltoro Muztagh, Karakoram', 8611),
(3, 'Kangchenjunga', 'Kangchenjunga, Himalaya', 8586),
(4, 'Lhotse', 'Mahalangur Himal, Himalaya', 8516),
(5, 'Makalu', 'Mahalangur Himal, Himalaya', 8485),
(6, 'Cho Oyu', 'Mahalangur Himal, Himalaya', 8188),
(7, 'Dhaulagiri I', 'Dhaulagiri, Himalaya', 8167),
(8, 'Manaslu', 'Manaslu, Himalaya', 8163),
(9, 'Nanga Parbat', 'Nanga Parbat, Himalaya', 8126),
(10, 'Annapurna I', 'Annapurna, Himalaya', 8091),
(11, 'Gasherbrum I', 'Baltoro Muztagh, Karakoram', 8080),
(12, 'Broad Peak', 'Baltoro Muztagh, Karakoram', 8051),
(13, 'Gasherbrum II', 'Baltoro Muztagh, Karakoram', 8034),
(14, 'Shishapangma', 'Langtang, Himalaya', 8027),
(15, 'Gyachung Kang', 'Mahalangur Himal, Himalaya', 7952),
(16, 'Gasherbrum III', 'Baltoro Muztagh, Karakoram', 7946),
(17, 'Annapurna II', 'Annapurna, Himalaya', 7937),
(18, 'Gasherbrum IV', 'Baltoro Muztagh, Karakoram', 7932),
(19, 'Himalchuli', 'Manaslu, Himalaya', 7893),
(20, 'Distaghil Sar', 'Hispar Muztagh, Karakoram', 7884),
(21, 'Ngadi Chuli', 'Manaslu, Himalaya', 7871),
(22, 'Nuptse', 'Mahalangur Himal, Himalaya', 7864),
(23, 'Khunyang Chhish', 'Hispar Muztagh, Karakoram', 7823),
(24, 'Masherbrum', 'Masherbrum, Karakoram', 7821),
(25, 'Nanda Devi', 'Kumaon Himalaya', 7816),
(26, 'Chomo Lonzo', 'Mahalangur Himal, Himalaya', 7804),
(27, 'Batura Sar', 'Batura Muztagh, Karakoram', 7795),
(28, 'Kanjut Sar', 'Hispar Muztagh, Karakoram', 7790),
(29, 'Rakaposhi', 'Rakaposhi-Haramosh, Karakoram', 7788),
(30, 'Namcha Barwa', 'Assam, Himalaya', 7782),
(31, 'Kamet', 'Garhwal Himalaya, Himalaya', 7756),
(32, 'Dhaulagiri II', 'Dhaulagiri, Himalaya', 7751),
(33, 'Saltoro Kangri', 'Saltoro Muztagh, Karakoram', 7742),
(34, 'Jannu', 'Kangchenjunga, Himalaya', 7711),
(35, 'Tirich Mir', 'Hindou Kouch', 7708),
(36, 'Molamenqing', 'Langtang, Himalaya', 7703),
(37, 'Gurla Mandhata', 'Nalakankar Himal, Himalaya', 7694),
(38, 'Saser Kangri I', 'Saser Muztagh, Karakoram', 7672),
(39, 'Chogolisa', 'Masherbrum, Karakoram', 7665),
(40, 'Dhaulagiri IV', 'Dhaulagiri, Himalaya', 7661),
(41, 'Kongur Tagh', 'Chaînon Kashgar, Cordillère du Kunlun', 7649),
(42, 'Dhaulagiri V', 'Dhaulagiri, Himalaya', 7618),
(43, 'Shispare', 'Batura Muztagh, Karakoram', 7611),
(44, 'Trivor', 'Hispar Muztagh, Karakoram', 7577),
(45, 'Gangkhar Puensum', 'Kula Kangri, Himalaya', 7570),
(46, 'Minya Konka', 'Daxue Shan', 7556),
(47, 'Annapurna III', 'Annapurna, Himalaya', 7555),
(48, 'Mustagh Ata', 'Chaînon Kashgar, Cordillère du Kunlun', 7546),
(49, 'Skyang Kangri', 'Baltoro Muztagh, Karakoram', 7545),
(50, 'Changtse', 'Mahalangur Himal, Himalaya', 7543),
(51, 'Kula Kangri', 'Kula Kangri, Himalaya', 7538),
(52, 'Kongur Tiube', 'Chaînon Kashgar, Cordillère du Kunlun', 7530),
(53, 'Mamostong Kangri', 'Rimo Muztagh, Karakoram', 7516),
(54, 'Saser Kangri II E', 'Saser Muztagh, Karakoram', 7513),
(55, 'Saser Kangri III', 'Saser Muztagh, Karakoram', 7495),
(56, 'Pic Ismail Samani', 'Chaînon de l\'Académie des Sciences, Pamir', 7495),
(57, 'Pumari Chhish', 'Hispar Muztagh, Karakoram', 7492),
(58, 'Noshaq', 'Hindou Kouch', 7492),
(59, 'Pasu Sar', 'Batura Muztagh, Karakoram', 7476),
(60, 'Yukshin Gardan Sar', 'Hispar Muztagh, Karakoram', 7469),
(61, 'Teram Kangri I', 'Siachen Muztagh, Karakoram', 7462),
(62, 'Pic Jongsong', 'Kangchenjunga, Himalaya', 7462),
(63, 'Malubiting', 'Rakaposhi-Haramosh, Karakoram', 7458),
(64, 'Gangapurna', 'Annapurna, Himalaya', 7455),
(65, 'Jengish Chokusu', 'Tian Shan', 7439),
(66, 'K12', 'Saltoro Muztagh, Karakoram', 7428),
(67, 'Sia Kangri', 'Siachen Muztagh, Karakoram', 7422),
(68, 'Yangra (Ganesh I)', 'Ganesh Himal, Himalaya', 7422),
(69, 'Momhil Sar', 'Hispar Muztagh, Karakoram', 7414),
(70, 'Kabru N', 'Kangchenjunga, Himalaya', 7412),
(71, 'Skil Brum', 'Baltoro Muztagh, Karakoram', 7410),
(72, 'Haramosh', 'Rakaposhi-Haramosh, Karakoram', 7409),
(73, 'Istor-o-Nal', 'Hindou Kouch', 7403),
(74, 'Ghent Kangri', 'Saltoro Muztagh, Karakoram', 7401),
(75, 'Ultar Sar', 'Batura Muztagh, Karakoram', 7388),
(76, 'Rimo I', 'Rimo Muztagh, Karakoram', 7385),
(77, 'Churen Himal', 'Dhaulagiri, Himalaya', 7385),
(78, 'Teram Kangri III', 'Siachen Muztagh, Karakoram', 7382),
(79, 'Sherpi Kangri', 'Saltoro Muztagh, Karakoram', 7380),
(80, 'Labuche Kang', 'Labuche, Himalaya', 7367),
(81, 'Kirat Chuli', 'Kangchenjunga, Himalaya', 7362),
(82, 'Abi Gamin', 'Garhwal Himalaya, Himalaya', 7355),
(83, 'Nangpai Gosum', 'Mahalangur Himal, Himalaya', 7350),
(84, 'Gimmigela', 'Kangchenjunga, Himalaya', 7350),
(85, 'Saraghrar', 'Hindou Kouch', 7349),
(86, 'Chamlang', 'Mahalangur Himal, Himalaya', 7321),
(87, 'Chomolhari4', 'Chomolhari, Himalaya', 7315),
(88, 'Chongtar', 'Baltoro Muztagh, Karakoram', 7315),
(89, 'Baltoro Kangri', 'Masherbrum, Karakoram', 7312),
(90, 'Siguang Ri', 'Mahalangur Himal, Himalaya', 7309),
(91, 'The Crown', 'Yengisogat, Karakoram', 7295),
(92, 'Gyala Peri', 'Assam, Himalaya', 7294),
(93, 'Porong Ri', 'Langtang, Himalaya', 7292),
(94, 'Baintha Brakk (l\'Ogre)', 'Panmah Muztagh, Karakoram', 7285),
(95, 'Yutmaru Sar', 'Hispar Muztagh, Karakoram', 7283),
(96, 'Baltistan Peak (K6)', 'Masherbrum, Karakoram', 7282),
(97, 'Kangpenqing', 'Baiku, Himalaya', 7281),
(98, 'Muztagh Tower', 'Baltoro Muztagh, Karakoram', 7276),
(99, 'Mana', 'Garhwal Himalaya, Himalaya', 7272),
(100, 'Dhaulagiri VI', 'Dhaulagiri, Himalaya', 7268),
(101, 'Diran', 'Rakaposhi-Haramosh, Karakoram', 7266),
(102, 'Labuche Kang III / E5', 'Labuche, Himalaya', 7250),
(103, 'Putha Hiunchuli', 'Dhaulagiri, Himalaya', 7246),
(104, 'Apsarasas Kangri', 'Siachen Muztagh, Karakoram', 7245),
(105, 'Mukut Parbat', 'Garhwal Himalaya, Himalaya', 7242),
(106, 'Rimo III', 'Rimo Muztagh, Karakoram', 7233),
(107, 'Langtang Lirung', 'Langtang, Himalaya', 7227),
(108, 'Karjiang', 'Kula Kangri, Himalaya', 7221),
(109, 'Annapurna Dakshin', 'Annapurna, Himalaya', 7219),
(110, 'Khartaphu', 'Mahalangur Himal, Himalaya', 7213),
(111, 'Tongshanjiabu', 'Lunana, Himalaya', 7207),
(112, 'Malangutti Sar', 'Hispar Muztagh, Karakoram', 7207),
(113, 'Noijin Kangsang / Norin Kang', 'Nagarze, Himalaya', 7206),
(114, 'Langtang Ri', 'Langtang, Himalaya', 7205),
(115, 'Kangphu Kang', 'Lunana, Himalaya', 7204),
(116, 'Singhi Kangri', 'Siachen Muztagh, Karakoram', 7202),
(117, 'Lupghar Sar', 'Hispar Muztagh, Karakoram', 7200),
(118, 'Mont Blanc', 'France', 4809),
(119, 'Grossglockner', 'Autriche', 3798),
(120, 'Finsteraarhorn', 'Suisse', 4274),
(121, 'Wildspitze', 'Autriche', 3768),
(122, 'Piz Bernina', 'Suisse', 4049),
(123, 'Hochkönig', 'Autriche', 2941),
(124, 'Pointe Dufour', 'Suisse', 4634),
(125, 'Hoher Dachstein', 'Autriche', 2995),
(126, 'Marmolada', 'Italie', 3343),
(127, 'Mont Viso', 'Italie', 3841),
(128, 'Triglav', 'Slovénie', 2864),
(129, 'Barre des Écrins', 'France', 4102),
(130, 'Säntis', 'Suisse', 2503),
(131, 'Ortles', 'Italie', 3905),
(132, 'Monte Baldo', 'Italie', 2218),
(133, 'Grand Paradis', 'Italie', 4061),
(134, 'Pizzo di Coca', 'Italie', 3050),
(135, 'Cima Dodici', 'Italie', 2336),
(136, 'Dents du Midi', 'Suisse', 3257),
(137, 'Chamechaude', 'France', 2082),
(138, 'Zugspitze', 'Allemagne / Autriche', 2962),
(139, 'Antelao', 'Italie', 3263),
(140, 'Arcalod', 'France', 2217),
(141, 'Grintovec', 'Slovénie', 2558),
(142, 'Grosser Priel', 'Autriche', 2515),
(143, 'Grigna Settentrionale', 'Italie', 2410),
(144, 'Monte Bondone', 'Italie', 2180),
(145, 'Cima Presanella', 'Italie', 3558),
(146, 'Birnhorn', 'Autriche', 2634),
(147, 'Col Nudo', 'Italie', 2472),
(148, 'Pointe Percée', 'France', 2753),
(149, 'Montasch', 'Italie', 2752),
(150, 'Polinik', 'Autriche', 2784),
(151, 'Tödi', 'Suisse', 3614),
(152, 'Birkkarspitze', 'Autriche', 2749),
(153, 'Ellmauer Halt', 'Autriche', 2344),
(154, 'Grande Tête de l\'Obiou', 'France', 2790),
(155, 'Cima Tosa', 'Italie', 3173),
(156, 'Hochtor', 'Autriche', 2369),
(157, 'Grimming', 'Autriche', 2351),
(158, 'Grand Combin', 'Suisse', 4314),
(159, 'La Tournette', 'France', 2351),
(160, 'Piz Kesch', 'Suisse', 3418),
(161, 'Zirbitzkogel', 'Autriche', 2396);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `sommets`
--
ALTER TABLE `sommets`
  ADD PRIMARY KEY (`som_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `sommets`
--
ALTER TABLE `sommets`
  MODIFY `som_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
