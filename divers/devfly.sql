-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 17 Juin 2013 à 11:39
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `devfly`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `numclient` int(11) NOT NULL AUTO_INCREMENT,
  `civilite` varchar(3) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `codepostal` varchar(10) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `pays` varchar(20) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `telfixe` varchar(15) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `login` varchar(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`numclient`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=525 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`numclient`, `civilite`, `nom`, `prenom`, `adresse`, `codepostal`, `ville`, `pays`, `mail`, `telfixe`, `mobile`, `login`, `password`) VALUES
(25, 'Mme', 'TAYLOR', 'Isabella', '13-657 Hinalo Street  Pāhoa', 'HI 96778', 'Hawaï', 'USA', 'taylorisa@live.com', '+18089656153', '+18084674486', 'isabella', 'taylor'),
(59, 'Mme', 'SYLLA', 'Lala', '33 route de Nouasser', ' 20190', 'Rabat', 'Maroc', 'lalasylla@yahoo.fr', '+21252297797', '+21261149425', 'lalasylla', 'rabat'),
(198, 'M', 'WILLIAMS', 'Brian', '109 Burwood Road', '3122 ', 'Hawthorn V', 'Australie', 'willamsbrian@gmail.com', '+61735642342', '+61123456789', 'brian', 'williams'),
(247, 'M', 'VENDA', 'Jonah', '37  Barotanyi. Liechtensteinstrasse', '21 1090 ', 'Wien', 'Autriche', 'jonah@venda.com', '+4392067130', '+4362503253', 'jonah', 'venda'),
(375, 'M', 'MOUNA', 'Karim', '448  rue Radhia Haddad Standard ', '1023', ' Montplaisir', 'Tunisie', 'mounakarim@live.com', ' +216156960', '+216988122244', 'mouna', 'karim'),
(397, 'M', 'AJAMI', 'Abdel', '384 West day', 'PO Box 266', 'Al khawr', 'Qatar', 'abdel.ajami@gmail.com', '+9748232133', '+9746541243', 'ajami', 'qatar'),
(524, 'M', 'BAYOL', 'Simon', '105 rue Boileau', '93000', 'Saint-Denis', 'France', 'simonbayol@yahoo.fr', '+33136786141', '+33625734641', 'simon', 'bayol');

-- --------------------------------------------------------

--
-- Structure de la table `destination`
--

CREATE TABLE IF NOT EXISTS `destination` (
  `codeaeroport` varchar(3) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `pays` varchar(20) NOT NULL,
  PRIMARY KEY (`codeaeroport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `destination`
--

INSERT INTO `destination` (`codeaeroport`, `ville`, `pays`) VALUES
('ADD', 'Bole - Addis Adéba', 'Djibouti'),
('AKL', 'Auckland', 'Nouvelle Zélande'),
('ALG', 'Alger', 'Algérie'),
('ANI', 'Aniak', 'Iles Salomon'),
('ARN', 'Stockholm', 'Suède'),
('BEY', 'Beyrouth', 'Liban'),
('BRN', 'Berne-Belp', 'Suisse'),
('CDG', 'Paris', 'France'),
('CMN', 'Casablanca', 'Maroc'),
('CPH', 'Copenhague', 'Danemark'),
('DKR', 'Dakar', 'Sénégal'),
('DOH', 'Doha', 'Qatar'),
('ESB', 'Ankara', 'Turquie'),
('FCO', 'Rome', 'Italie'),
('HNL', 'Honolulu - Hawaï', 'USA'),
('IAD', 'Washington-Dulles', 'USA'),
('JFK', 'New-York', 'USA'),
('JNU', 'Juneau', 'Alaska'),
('KUL', 'Kuala Lumpur', 'Malaisie'),
('KWI', 'Koweït', 'Koweït'),
('LAX', 'Los Angeles-Californ', 'USA'),
('LHR', 'Londres', 'Angleterre'),
('MAD', 'Madrid', 'Espagne'),
('MEX', 'Mexico', 'Mexique'),
('MIA', 'Miami', 'USA'),
('NDJ', 'N''Djaména', 'Tchad'),
('NRT', 'Tokyo', 'Japon'),
('ORD', 'O''hare - Chicago', 'USA'),
('PEK', 'Pékin', 'Chine'),
('PPT', 'Tahiti', 'Polynésie'),
('PRY', 'Prétoria', 'Afrique du Sud'),
('PTP', 'Pôle Caraïbes - Guad', 'France'),
('RAR', 'Rarotonga - Iles Coo', 'USA'),
('SAH', 'Sanaa', 'Yémen'),
('SGM', 'Tân So''n Nhât', 'Vietnam'),
('SIN', 'Singapour', 'Singapour'),
('SYD', 'Sydney', 'Australie'),
('TNR', 'Ivato - Antananarivo', 'Madagascar'),
('TUN', 'Tunis', 'Tunisie'),
('TXL', 'Berlin', 'Allemagne'),
('VIE', 'Vienne', 'Autriche'),
('YOW', 'Ottawa', 'Canada');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE IF NOT EXISTS `employe` (
  `numemploye` varchar(5) NOT NULL,
  `civilite` varchar(3) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `codepostal` varchar(10) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `pays` varchar(20) NOT NULL,
  `fonction` varchar(10) NOT NULL,
  PRIMARY KEY (`numemploye`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `employe`
--

INSERT INTO `employe` (`numemploye`, `civilite`, `nom`, `prenom`, `adresse`, `codepostal`, `ville`, `pays`, `fonction`) VALUES
('C0001', 'M', 'GENEALOGIE', 'Doria', 'Kongens Nytorv 4 ', 'DK – 1050', 'København K ', 'Danemark', 'Copilote'),
('C0002', 'Mme', 'PAHATI', 'Christine', ' AFS-UFE, Tanglin  ', '091249', 'Singapour', 'Singapour', 'Copilote'),
('C0003', 'M', 'HAMOUM', 'Slimane', '4, Avenue Tarik Ibn Ziad', ' 6401', ' Abu Thaylah', 'Qatar', 'Copilote'),
('C0004', 'Mme', 'CORDERO', 'Adéle', '1701 East 36th Avenue Anchorage', ' AK 99508 ', 'Alaska', 'USA', 'Copilote'),
('C0005', 'M', 'BALAGNE', 'Diégo', 'Petit Paris 1 rue Paul Lacavé', '97109', 'Basse terre - Guadel', 'France', 'Copilote'),
('C0006', 'M', 'ANDORA', 'Fabio', 'Ronda Universitat 22 bis - 4°', '08007 ', 'Barcelone', 'Espagne', 'Copilote'),
('H0001', 'M', 'FERNANDEZ', 'Barthelemy', 'Calle Velàzquez 50 6°', '28001', 'Madrid', 'Espagne', 'Steward'),
('H0002', 'M', 'RAMONTA', 'Faly', ' 17  avenue de l''Indépendance', '101', 'Antananarivo', 'Madagascar', 'Steward'),
('H0003', 'Mme', 'PERANI', 'Aela', ' Piazza Farnese 67', '00186', 'Rome', 'Italie', 'Hôtesse'),
('H0004', 'Mme', 'JOHNSON', 'Victoria', ' 6922 Hollywood Blvd', 'CA 90028', 'Californie', 'USA', 'Hôtesse'),
('H0005', 'Mme', 'CRUZ', 'Shaday', '4101 Reservoir Road', 'D.C. 20007', 'Washington', 'USA', 'Hôtesse'),
('H0006', 'Mme', ' SABRA', 'Raven', ' 972 rue Saint-Jean', ' G1R 1R5', 'Québec', 'Canada', 'Hôtesse'),
('H0007', 'Mme', 'LINDBERGH', 'Randiana', ' Kommendörsgatan 13. Box 5135', ' 102 43 ', 'Stockholm', 'Suéde', 'Hôtesse'),
('H0008', 'M', 'PENA-RUIZ', 'Thomas', '5 rue Edouard-Ahnne ', '60056 - 98', ' TAHITI ', 'Polynésie Francçaise', 'Steward'),
('H0009', 'Mme', 'NUGUET', 'Juliette', '18 rue Robert', '75012', 'Papris', 'France', 'Hôtesse'),
('H0010', 'Mme', 'KAYA', 'Yesmina', '22 chemin Youcef Tayebi', '16030', 'El Biar', 'Algérie', 'Hôtesse'),
('H0011', 'M', 'THANI', 'Hakim', ' P.O. Box 6401', ' 6401', 'Doha', 'Qatar', 'Steward'),
('H0012', 'Mme', 'ALVAREZ', 'Valentina', 'Tower Hill', 'EC3N 4AB', 'Londre', 'Angleterre', 'Hôtesse'),
('H0013', 'Mme', 'HANG', 'Gai', '60 Tianze Lu - Chaoyang district', '100600', 'Beijing', 'Chine', 'Hôtesse'),
('H0014', 'M', 'Walid', 'Hassan', 'Block 1 Rue 13 Villa 24', '13011', 'Safat', 'Koweït', 'Steward'),
('H0015', 'Mme', 'ZUMA', 'Eva', '250 Melk Street, Corner Middel Street', '0181', 'Pretoria', 'Afrique du Sud', 'Hôtesse'),
('H0016', 'Mme', 'ROTH-BERNASCONI', 'Brigite', 'Hochschulstr. 4', '3012 ', 'Bern', 'Suisse', 'Hôtesse'),
('H0017', 'Mme', 'DIALLO', 'Abibatou', '1 rue El Hadji Amadou Assane Ndoye', '11522', 'Dakar Peytavin ', 'Sénégal', 'Hôtesse'),
('H0018', 'Mme', 'LAOUINI', 'Lea', 'Corner Streets 2/21 ', 'P.O. Box 1', 'Sanaa', 'Yémen', 'Hôtesse'),
('P0001', 'M', 'BOUAGILA', 'Ibrahima', '3, rue Hammadi Eljaziri ', ' 1002 ', 'Tunis', 'Tunisie', 'Pilote'),
('P0002', 'M', 'BERNARD', 'Alain', '20 rue du Lac', '69003', 'Lyon', 'France', 'Pilote'),
('P0003', 'M', 'KANJI', 'Yuya', '2 -7-2 Marunouchi , Chiyoda-ku', '100-8799', 'Tokyo', 'Japon', 'Pilote'),
('P0004', 'M', ' BROWN', 'Harold', '226 Northeast 1st Avenue', 'FL 33132', 'Miami', 'USA', 'Pilote'),
('P0005', 'M', 'BELLIO', 'Abel', 'via Bergo 3', '20100', 'Milan', 'Italie', 'Pilote'),
('P0006', 'M', 'TRAN', 'Hu', ' 27 Nguyên Thi Minh Khai', '307 - Q. 1', 'Hanoï', 'Vietnam', 'Pilote');

-- --------------------------------------------------------

--
-- Structure de la table `passager`
--

CREATE TABLE IF NOT EXISTS `passager` (
  `numpassager` int(11) NOT NULL AUTO_INCREMENT,
  `civilite` varchar(3) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `datenaissance` date NOT NULL,
  PRIMARY KEY (`numpassager`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7394 ;

--
-- Contenu de la table `passager`
--

INSERT INTO `passager` (`numpassager`, `civilite`, `nom`, `prenom`, `datenaissance`) VALUES
(283, 'Mme', 'SYLLA', 'Lala', '1988-03-23'),
(2837, 'M', 'BAYOL', 'Simon', '1980-01-15'),
(3794, 'Mme', 'MOUNA', 'Farida', '1978-06-04'),
(3849, 'M', 'MOUNA', 'Madani', '1987-10-11'),
(3915, 'M', 'AJAMI', 'Nabil', '1993-08-18'),
(3916, 'M', 'AJAMI', 'Noha', '2001-10-10'),
(3917, 'Mme', 'AJAMI', 'Zeyna', '1970-07-15'),
(4936, 'M', ' WILLIAMS', 'Brian', '1966-11-27'),
(4937, 'Mme', ' WILLIAMS', 'Abbie', '2013-02-25'),
(7393, 'Mme', 'TAYLOR', 'Isabella', '1991-02-22');

-- --------------------------------------------------------

--
-- Structure de la table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
  `numplace` int(11) NOT NULL AUTO_INCREMENT,
  `numpassager` int(11) NOT NULL,
  `numvol` varchar(10) NOT NULL,
  `numreservation` int(11) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`numplace`),
  KEY `numreservation` (`numreservation`),
  KEY `numvol` (`numvol`),
  KEY `numpassager` (`numpassager`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=190 ;

--
-- Contenu de la table `place`
--

INSERT INTO `place` (`numplace`, `numpassager`, `numvol`, `numreservation`, `prix`) VALUES
(1, 283, 'DF1028', 71526, 1524),
(12, 3917, 'DF5609', 14561, 600),
(13, 3915, 'DF5609', 14561, 600),
(14, 3916, 'DF5609', 14561, 600),
(23, 2837, 'DF0183', 258014, 617),
(57, 4936, 'DF4693', 923735, 1472),
(58, 4937, 'DF4693', 923735, 50),
(93, 3849, 'DF1028', 476292, 1472),
(165, 3794, 'DF0810', 783920, 799),
(189, 7393, 'DF1028', 745860, 617);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `numreserv` int(11) NOT NULL AUTO_INCREMENT,
  `datereserv` date NOT NULL,
  `numclient` int(11) NOT NULL,
  PRIMARY KEY (`numreserv`),
  KEY `numclient` (`numclient`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=923736 ;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`numreserv`, `datereserv`, `numclient`) VALUES
(14561, '2013-04-01', 397),
(71526, '2013-04-22', 59),
(258014, '2013-05-17', 524),
(476292, '2013-04-09', 247),
(745860, '2013-03-23', 25),
(783920, '2013-04-26', 247),
(923735, '2013-03-31', 198);

-- --------------------------------------------------------

--
-- Structure de la table `travailler`
--

CREATE TABLE IF NOT EXISTS `travailler` (
  `vol` varchar(10) NOT NULL,
  `pilote` varchar(50) NOT NULL,
  `copilote` varchar(50) NOT NULL,
  `hotesse_steward1` varchar(50) NOT NULL,
  `hotesse_steward2` varchar(50) NOT NULL,
  `hotesse_steward3` varchar(50) NOT NULL,
  `date` date NOT NULL,
  KEY `vol` (`vol`,`pilote`,`copilote`,`hotesse_steward1`,`hotesse_steward2`,`hotesse_steward3`),
  KEY `pilote` (`pilote`),
  KEY `co-pilote` (`copilote`),
  KEY `hotess/stewart1` (`hotesse_steward1`),
  KEY `hotess/stewart2` (`hotesse_steward2`),
  KEY `hotess/stewart3` (`hotesse_steward3`),
  KEY `co-pilote_2` (`copilote`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `travailler`
--

INSERT INTO `travailler` (`vol`, `pilote`, `copilote`, `hotesse_steward1`, `hotesse_steward2`, `hotesse_steward3`, `date`) VALUES
('DF0183', 'P0003', 'C0004', 'H0006', 'H0011', 'H0016', '2013-06-20'),
('DF0810', 'P0006', 'C0003', 'H0001', 'H0012', 'H0017', '2013-07-14'),
('DF1028', 'P0001', 'C0006', 'H0002', 'H0007', 'H0006', '2013-05-24'),
('DF4693', 'P0005', 'C0002', 'H0004', 'H0008', 'H0013', '2013-06-30'),
('DF5609', 'P0004', 'C0005', 'H0003', 'H0009', 'H0014', '2013-06-01'),
('DF9174', 'P0002', 'C0001', 'H0005', 'H0010', 'H0015', '2013-05-26'),
('DF4694', 'P0005', 'C0002', 'H0004', 'H0008', 'H0013', '2013-07-07'),
('DF4695', 'P0005', 'C0002', 'H0004', 'H0008', 'H0013', '2013-07-14');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(5) NOT NULL,
  `statut` varchar(20) NOT NULL,
  `login` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `droits` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `statut`, `login`, `password`, `droits`) VALUES
('AD129', 'administrateur', 'admin', '$5$ABCDEFGHIJKLM$ssnQ4OwPltNcbxGU21HYZn8e4WJ7f1p6wzo2Rv0Chk0', 1),
('CM674', 'commercial', 'vendeur', '$5$ABCDEFGHIJKLM$sgRMncN.BKUnzMiB0hkzLR1QWBbgCrLZpCntMpxdq94', 0),
('DR346', 'directeur', 'general', '$5$ABCDEFGHIJKLM$adncOKnWKzpcxGlZrX0JrkqJdPTYhpXcb0GYgLp/hLD', 0);

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

CREATE TABLE IF NOT EXISTS `vol` (
  `numvol` varchar(10) NOT NULL,
  `lieudep` varchar(50) NOT NULL,
  `lieuarriv` varchar(50) NOT NULL,
  `dateheuredep` datetime NOT NULL,
  `dateheurearrivee` datetime NOT NULL,
  `tarif` float NOT NULL,
  PRIMARY KEY (`numvol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vol`
--

INSERT INTO `vol` (`numvol`, `lieudep`, `lieuarriv`, `dateheuredep`, `dateheurearrivee`, `tarif`) VALUES
('DF0183', 'Paris', 'Saint-Martin', '2013-06-20 10:30:00', '2013-06-21 13:20:00', 617),
('DF0810', 'Doha', 'Tokyo', '2013-07-14 22:30:00', '2013-07-15 10:50:00', 799),
('DF1028', 'Casablanca', 'Honolulu', '2013-05-24 02:20:00', '2013-05-25 18:34:00', 1524),
('DF4693', 'Berne', 'Sydney', '2013-06-30 06:50:00', '2013-06-30 22:05:00', 1472),
('DF4694', 'Berne', 'Sydney', '2013-07-07 06:50:00', '2013-07-07 22:05:00', 1472),
('DF4695', 'Berne', 'Sydney', '2013-07-14 06:50:00', '2013-07-14 22:05:00', 1472),
('DF5609', 'Ottawa', 'Washington', '2013-06-01 12:40:00', '2013-06-01 19:34:00', 600),
('DF9174', 'Addids Adéba', 'Vienne', '2013-05-26 22:40:00', '2013-05-27 13:30:00', 893);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`numpassager`) REFERENCES `passager` (`numpassager`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `place_ibfk_2` FOREIGN KEY (`numvol`) REFERENCES `vol` (`numvol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `place_ibfk_3` FOREIGN KEY (`numreservation`) REFERENCES `reservation` (`numreserv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`numclient`) REFERENCES `client` (`numclient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `travailler`
--
ALTER TABLE `travailler`
  ADD CONSTRAINT `travailler_ibfk_1` FOREIGN KEY (`vol`) REFERENCES `vol` (`numvol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `travailler_ibfk_10` FOREIGN KEY (`hotesse_steward3`) REFERENCES `employe` (`numemploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `travailler_ibfk_2` FOREIGN KEY (`pilote`) REFERENCES `employe` (`numemploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `travailler_ibfk_7` FOREIGN KEY (`copilote`) REFERENCES `employe` (`numemploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `travailler_ibfk_8` FOREIGN KEY (`hotesse_steward1`) REFERENCES `employe` (`numemploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `travailler_ibfk_9` FOREIGN KEY (`hotesse_steward2`) REFERENCES `employe` (`numemploye`) ON DELETE CASCADE ON UPDATE CASCADE;
