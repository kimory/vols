-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 20 Septembre 2013 à 00:15
-- Version du serveur: 5.5.32-0ubuntu0.13.04.1
-- Version de PHP: 5.4.9-4ubuntu2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `DEVFLY`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `numclient` int(15) NOT NULL AUTO_INCREMENT,
  `civilite` varchar(3) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `codepostal` varchar(10) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `pays` varchar(20) DEFAULT NULL,
  `mail` varchar(80) DEFAULT NULL,
  `telfixe` varchar(15) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`numclient`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`numclient`, `civilite`, `nom`, `prenom`, `adresse`, `codepostal`, `ville`, `pays`, `mail`, `telfixe`, `mobile`, `login`, `password`) VALUES
(1, 'Mme', 'TAYLOR', 'Isabella', '13-657 Hinalo Street  Pāhoa', 'HI 96778', 'Hawaï', 'USA', 'taylorisa@live.com', '+18089656153', '+18084674486', 'isabella', '$5$ABCDEFGHIJKLM$jA5FTXZMzxcvhS9y0clN4/0te.a6Z2Q8JkKMEi6VqV2'),
(2, 'Mme', 'SYLLA', 'Lala', '33 route de Nouasser', ' 20190', 'Rabat', 'Maroc', 'lalasylla@yahoo.fr', '+21252297797', '+21261149425', 'lalasylla', '$5$ABCDEFGHIJKLM$4nKJqz1VZoX9MCxevwUn5KO9EDStKX.tOLBLetjw2/D'),
(3, 'M', 'WILLIAMS', 'Brian', '109 Burwood Road', '3122 ', 'Hawthorn V', 'Australie', 'willamsbrian@gmail.com', '+61735642342', '+61123456789', 'brian', '$5$ABCDEFGHIJKLM$wgsoKFKpU9Jfs3AC0XXadaY6isBfq5ad1n8U593Ghc5'),
(4, 'M', 'VENDA', 'Jonah', '37  Barotanyi. Liechtensteinstrasse', '21 1090 ', 'Wien', 'Autriche', 'jonah@venda.com', '+4392067130', '+4362503253', 'jonah', '$5$ABCDEFGHIJKLM$wSPbAjoERBols/WGlsC/bTP0NaqEdR4ST8sm68zlQz5'),
(5, 'M', 'MOUNA', 'Karim', '448  rue Radhia Haddad Standard ', '1023', ' Montplaisir', 'Tunisie', 'mounakarim@live.com', ' +216156960', '+216988122244', 'mouna', '$5$ABCDEFGHIJKLM$dM/.SZT6IL9zQkQsu1KCoc/RYxuCno5O/8iH5IxtAV8'),
(6, 'M', 'AJAMI', 'Abdel', '384 West day', 'PO Box 266', 'Al khawr', 'Qatar', 'abdel.ajami@gmail.com', '+9748232133', '+9746541243', 'ajami', '$5$ABCDEFGHIJKLM$/mrDy8fKmmgz.59.u4iQjdvkqwqH0BXctfrhvlq9tU1'),
(7, 'M', 'Durand', 'Simon', '105 rue Boileau', '93000', 'Saint-Denis', 'France', 'simondurand@yahoo.fr', '+33136786141', '+33625734641', 'simon', '$5$ABCDEFGHIJKLM$vjtNnZBkjiXUbpM/FMJn6xTw4.dC5BalH.3la9oWiYA'),
(8, 'm', 'Touma', 'Patrick', '24 rue de la Tour', '38000', 'Grenoble', 'France', 'ptouma@gmail.com', '0403958473', '0637485939', 'pat', '$5$ABCDEFGHIJKLM$hoO0rXJIA5MMdymjFLshqK9xSQk0x2p9TeWrVLDEfS7'),
(9, 'm', 'Duchemin', 'Raymond', '10 rue de la Tour', '38000', 'Grenoble', 'France', 'rduchemin@gmail.com', '0405897474', '0648759216', 'duchemin', '$5$ABCDEFGHIJKLM$HzNLAS5E00DVNQBQjyW5/RLeXETCZbZR.BVm3.8TQH3');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(80) NOT NULL,
  `sujet` varchar(100) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `mail`, `sujet`, `telephone`, `message`) VALUES
(1, 'Manceau', 'Edouard', 'edouard@gmail.fr', 'remboursement', '0645364758', 'Mon vol Berne - Sydney du 10/05/2013 avait plus de 10h de retard...\r\nJe souhaite le remboursement de mon billet, merci de m''indiquer la procédure à suivre !\r\nCordialement,\r\nE. Manceau'),
(2, 'Plima', 'Roger', 'rplima@monmail.fr', 'Merci !', '0154896527', 'Merci pour votre accueil à l''aéroport de Berne, je suis agréablement surpris !');

-- --------------------------------------------------------

--
-- Structure de la table `destination`
--

CREATE TABLE IF NOT EXISTS `destination` (
  `codeaeroport` varchar(3) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  PRIMARY KEY (`codeaeroport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `destination`
--

INSERT INTO `destination` (`codeaeroport`, `ville`, `pays`) VALUES
('ADD', 'Addis-Abeba', 'Éthiopie'),
('AKL', 'Auckland', 'Nouvelle-Zélande'),
('ALG', 'Alger', 'Algérie'),
('ANI', 'Aniak', 'États-Unis'),
('ARN', 'Stockholm', 'Suède'),
('BEY', 'Beyrouth', 'Liban'),
('BRN', 'Berne', 'Suisse'),
('CDG', 'Paris', 'France'),
('CMN', 'Casablanca', 'Maroc'),
('CPH', 'Copenhague', 'Danemark'),
('DKR', 'Dakar', 'Sénégal'),
('DOH', 'Doha', 'Qatar'),
('ESB', 'Ankara', 'Turquie'),
('FCO', 'Rome', 'Italie'),
('HNL', 'Honolulu', 'États-Unis'),
('IAD', 'Washington', 'États-Unis'),
('JFK', 'New-York', 'États-Unis'),
('KUL', 'Kuala Lumpur', 'Malaisie'),
('KWI', 'Koweït', 'Koweït'),
('LAX', 'Los Angeles', 'États-Unis'),
('LHR', 'Londres', 'Angleterre'),
('MAD', 'Madrid', 'Espagne'),
('MEX', 'Mexico', 'Mexique'),
('MIA', 'Miami', 'États-Unis'),
('NDJ', 'Ndjamena', 'Tchad'),
('NRT', 'Tokyo', 'Japon'),
('ORD', 'Chicago', 'États-Unis'),
('PEK', 'Pékin', 'Chine'),
('PPT', 'Tahiti', 'Polynésie'),
('PRY', 'Prétoria', 'Afrique du Sud'),
('SAH', 'Sanaa', 'Yémen'),
('SFG', 'Saint-Martin', 'France'),
('SGM', 'Tân So''n Nhât', 'Vietnam'),
('SIN', 'Singapour', 'Singapour'),
('SYD', 'Sydney', 'Australie'),
('TNR', 'Ivato', 'Madagascar'),
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
  `adresse` varchar(100) NOT NULL,
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
  `numpassager` int(15) NOT NULL AUTO_INCREMENT,
  `civilite` varchar(3) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `datenaissance` date NOT NULL,
  PRIMARY KEY (`numpassager`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `passager`
--

INSERT INTO `passager` (`numpassager`, `civilite`, `nom`, `prenom`, `datenaissance`) VALUES
(1, 'Mme', 'SYLLA', 'Lala', '1988-03-23'),
(2, 'M', 'BAYOL', 'Simon', '1980-01-15'),
(3, 'Mme', 'MOUNA', 'Farida', '1978-06-04'),
(4, 'M', 'MOUNA', 'Madani', '1987-10-11'),
(5, 'M', 'AJAMI', 'Nabil', '1993-08-18'),
(6, 'M', 'AJAMI', 'Noha', '2001-10-10'),
(7, 'Mme', 'AJAMI', 'Zeyna', '1970-07-15'),
(8, 'M', ' WILLIAMS', 'Brian', '1966-11-27'),
(9, 'Mme', ' WILLIAMS', 'Abbie', '2013-02-25'),
(10, 'Mme', 'TAYLOR', 'Isabella', '1991-02-22'),
(11, 'm', 'bernard', 'toto', '1985-06-01'),
(12, 'm', 'lolo', 'toto', '1985-06-01');

-- --------------------------------------------------------

--
-- Structure de la table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
  `numplace` int(15) NOT NULL AUTO_INCREMENT,
  `numpassager` int(15) NOT NULL,
  `numvol` varchar(15) NOT NULL,
  `numreservation` int(15) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`numplace`),
  KEY `numreservation` (`numreservation`),
  KEY `numvol` (`numvol`),
  KEY `numpassager` (`numpassager`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `place`
--

INSERT INTO `place` (`numplace`, `numpassager`, `numvol`, `numreservation`, `prix`) VALUES
(1, 1, 'DF3', 2, 1524),
(2, 2, 'DF1', 3, 617),
(3, 8, 'DF4', 7, 1472),
(4, 4, 'DF3', 4, 1472),
(5, 9, 'DF4', 7, 50),
(6, 7, 'DF7', 1, 600),
(7, 3, 'DF2', 6, 799),
(8, 5, 'DF7', 1, 600),
(9, 6, 'DF7', 1, 600),
(10, 7, 'DF3', 5, 617),
(11, 11, 'DF8', 8, 617),
(12, 12, 'DF8', 9, 617);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `numreserv` int(15) NOT NULL AUTO_INCREMENT,
  `datereserv` date NOT NULL,
  `numclient` int(15) NOT NULL,
  PRIMARY KEY (`numreserv`),
  KEY `numclient` (`numclient`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`numreserv`, `datereserv`, `numclient`) VALUES
(1, '2013-04-01', 6),
(2, '2013-04-22', 2),
(3, '2013-05-17', 7),
(4, '2013-04-09', 4),
(5, '2013-03-23', 1),
(6, '2013-04-26', 4),
(7, '2013-03-31', 3),
(8, '2013-06-19', 9),
(9, '2013-06-19', 1);

-- --------------------------------------------------------

--
-- Structure de la table `travailler`
--

CREATE TABLE IF NOT EXISTS `travailler` (
  `vol` varchar(15) NOT NULL,
  `pilote` varchar(5) NOT NULL,
  `copilote` varchar(5) NOT NULL,
  `hotesse_steward1` varchar(5) NOT NULL,
  `hotesse_steward2` varchar(5) NOT NULL,
  `hotesse_steward3` varchar(5) NOT NULL,
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
('DF1', 'P0003', 'C0004', 'H0006', 'H0011', 'H0016', '2013-12-20'),
('DF2', 'P0006', 'C0003', 'H0001', 'H0012', 'H0017', '2013-12-14'),
('DF3', 'P0001', 'C0006', 'H0002', 'H0007', 'H0006', '2013-12-24'),
('DF4', 'P0005', 'C0002', 'H0004', 'H0008', 'H0013', '2013-12-30'),
('DF7', 'P0004', 'C0005', 'H0003', 'H0009', 'H0014', '2014-01-01'),
('DF9', 'P0002', 'C0001', 'H0005', 'H0010', 'H0015', '2013-12-26'),
('DF5', 'P0005', 'C0002', 'H0004', 'H0008', 'H0013', '2013-12-07'),
('DF6', 'P0005', 'C0002', 'H0004', 'H0008', 'H0013', '2013-12-14'),
('DF8', 'P0003', 'C0004', 'H0018', 'H0006', 'H0011', '2013-12-30'),
('DF10', 'P0001', 'C0001', 'H0001', 'H0002', 'H0003', '2013-09-18');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(5) NOT NULL,
  `statut` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
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
-- Structure de la table `userjava`
--

CREATE TABLE IF NOT EXISTS `userjava` (
  `id` varchar(5) NOT NULL,
  `statut` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `userjava`
--

INSERT INTO `userjava` (`id`, `statut`, `login`, `password`) VALUES
('AD14', 'administrateur', 'admin', 'admin'),
('CM22', 'commercial', 'vendeur', 'vendeur'),
('DR04', 'directeur', 'general', 'general');

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

CREATE TABLE IF NOT EXISTS `vol` (
  `numvol` varchar(15) NOT NULL,
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
('DF1', 'Paris', 'Saint-Martin', '2013-12-20 10:30:00', '2013-12-20 13:20:00', 617),
('DF10', 'Rome', 'Madrid', '2013-09-18 14:05:00', '2013-09-18 18:05:00', 573),
('DF2', 'Doha', 'Tokyo', '2013-12-14 22:30:00', '2013-12-15 10:50:00', 799),
('DF3', 'Casablanca', 'Honolulu', '2013-12-24 02:20:00', '2013-12-24 18:34:00', 1524),
('DF4', 'Berne', 'Sydney', '2013-12-30 06:50:00', '2013-12-30 20:05:00', 1472),
('DF5', 'Berne', 'Sydney', '2013-12-07 06:50:00', '2013-12-07 20:05:00', 1472),
('DF6', 'Berne', 'Sydney', '2013-12-14 06:50:00', '2013-12-14 20:05:00', 1472),
('DF7', 'Ottawa', 'Washington', '2014-01-01 12:40:00', '2014-01-01 19:34:00', 600),
('DF8', 'Paris', 'Saint-Martin', '2013-12-30 10:30:00', '2013-12-30 13:20:00', 617),
('DF9', 'Addis-Abeba', 'Vienne', '2013-12-26 10:40:00', '2013-12-26 16:30:00', 893);

--
-- Déclencheurs `vol`
--
DROP TRIGGER IF EXISTS `suppr_vol_tmp`;
DELIMITER //
CREATE TRIGGER `suppr_vol_tmp` BEFORE INSERT ON `vol`
 FOR EACH ROW BEGIN
		-- on supprime de la table vol_tmp un vol qui a exactement les mêmes critères que le nouveau vol inséré dans la table vol
		DELETE FROM vol_tmp WHERE lieudep = NEW.lieudep AND lieuarriv = NEW.lieuarriv AND dateheuredep = NEW.dateheuredep
		AND dateheurearrivee = NEW.dateheurearrivee AND tarif = NEW.tarif;
  	END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `vol_tmp`
--

CREATE TABLE IF NOT EXISTS `vol_tmp` (
  `numvol` varchar(15) NOT NULL,
  `lieudep` varchar(50) NOT NULL,
  `lieuarriv` varchar(50) NOT NULL,
  `dateheuredep` datetime NOT NULL,
  `dateheurearrivee` datetime NOT NULL,
  `tarif` float NOT NULL,
  `pilote` varchar(5) NOT NULL,
  `copilote` varchar(5) NOT NULL,
  `hotesse_steward1` varchar(5) NOT NULL,
  `hotesse_steward2` varchar(5) NOT NULL,
  `hotesse_steward3` varchar(5) NOT NULL,
  PRIMARY KEY (`numvol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vol_tmp`
--

INSERT INTO `vol_tmp` (`numvol`, `lieudep`, `lieuarriv`, `dateheuredep`, `dateheurearrivee`, `tarif`, `pilote`, `copilote`, `hotesse_steward1`, `hotesse_steward2`, `hotesse_steward3`) VALUES
('TMP1', 'Sydney', 'Berne', '2014-01-30 02:00:00', '2014-01-30 15:15:00', 1480, 'P0001', 'C0001', '', '', ''),
('TMP2', 'Sydney', 'Berne', '2014-02-06 02:00:00', '2014-02-06 15:15:00', 1480, '', '', '', '', ''),
('TMP3', 'Tokyo', 'Doha', '2014-01-15 08:10:00', '2014-01-15 20:30:00', 810, '', '', 'H0004', '', ''),
('TMP4', 'Tokyo', 'Doha', '2014-01-22 08:10:00', '2014-01-22 20:30:00', 810, '', '', '', '', '');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_4` FOREIGN KEY (`numpassager`) REFERENCES `passager` (`numpassager`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `place_ibfk_5` FOREIGN KEY (`numvol`) REFERENCES `vol` (`numvol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `place_ibfk_6` FOREIGN KEY (`numreservation`) REFERENCES `reservation` (`numreserv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`numclient`) REFERENCES `client` (`numclient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `travailler`
--
ALTER TABLE `travailler`
  ADD CONSTRAINT `travailler_ibfk_10` FOREIGN KEY (`hotesse_steward3`) REFERENCES `employe` (`numemploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `travailler_ibfk_11` FOREIGN KEY (`vol`) REFERENCES `vol` (`numvol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `travailler_ibfk_2` FOREIGN KEY (`pilote`) REFERENCES `employe` (`numemploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `travailler_ibfk_7` FOREIGN KEY (`copilote`) REFERENCES `employe` (`numemploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `travailler_ibfk_8` FOREIGN KEY (`hotesse_steward1`) REFERENCES `employe` (`numemploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `travailler_ibfk_9` FOREIGN KEY (`hotesse_steward2`) REFERENCES `employe` (`numemploye`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
