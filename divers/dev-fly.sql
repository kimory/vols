-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 23 Mai 2013 à 14:58
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `dev-fly`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `numclient` varchar(5) NOT NULL,
  `civilite` varchar(3) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `codepostal` varchar(10) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `pays` varchar(20) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `telfixe` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `login` varchar(10) NOT NULL,
  `password` varchar(8) NOT NULL,
  PRIMARY KEY (`numclient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `client`
--


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
('LHR', 'Londre', 'Angleterre'),
('MAD', 'Madrid', 'Espagne'),
('MEX', 'Mexico', 'Mexique'),
('MIA', 'Miami', 'USA'),
('NDJ', 'N''Djaména', 'Tchad'),
('NRT', 'Tokyo', 'Japon'),
('ORD', 'O''hare - Chicago', 'USA'),
('PEK', 'Pekin', 'Chine'),
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
('C0001', 'M', 'GENEALOGIE', 'Doria', 'Kongens Nytorv 4 ', 'DK – 1050', 'København K ', 'Danemark', 'Co-pilote'),
('C0002', 'Mme', 'PAHATI', 'Christine', ' AFS-UFE, Tanglin  ', '091249', 'Singapour', 'Singapour', 'Co-pilote'),
('C0003', 'M', 'HAMOUME', 'Slimane', '4, Avenue Tarik Ibn Ziad', ' 6401', ' Abu Thaylah', 'Qatar', 'Co-pilote'),
('C0004', 'Mme', 'CORDERO', 'Adéle', '1701 East 36th Avenue Anchorage', ' AK 99508 ', 'Alaska', 'USA', 'Co-pilote'),
('C0005', 'M', 'BALAGNE', 'Diégo', 'Petit Paris 1 rue Paul Lacavé', '97109', 'Basse terre - Guadel', 'France', 'Co-pilote'),
('C0006', 'M', 'ANDORA', 'Fabio', 'Ronda Universitat 22 bis - 4°', '08007 ', 'Barcelone', 'Espagne', 'Co-pilote'),
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
('H0013', 'Mne', 'HANG', 'Gai', '60 Tianze Lu - Chaoyang district', '100600', 'Beijing', 'Chine', 'Hôtesse'),
('H0014', 'M', 'Walid', 'Hassan', 'Block 1 Rue 13 Villa 24', '13011', 'Safat', 'Koweït', 'Steward'),
('H0015', 'Mme', 'ZUMA', 'Eva', '250 Melk Street, Corner Middel Street', '0181', 'Pretoria', 'Afrique du Sud', 'Hôtesse'),
('H0016', 'Mme', 'ROTH-BERNASCONI', 'Brigite', 'Hochschulstr. 4', '3012 ', 'Bern', 'Suisse', 'Hôtesse'),
('H0017', 'Mme', 'DIALLO', 'Abibatou', '1 rue El Hadji Amadou Assane Ndoye', '11522', 'Dakar Peytavin ', 'Sénégal', 'Hôtesse'),
('H0018', 'Mme', 'LAOUINI', 'Lea', 'Corner Streets 2/21 ', 'P.O. Box 1', 'Sanaa', 'Yémen', 'Hôtesse'),
('P0001', 'M', 'BOUAGILA', 'Ibrahima', '3, rue Hammadi Eljaziri ', ' 1002 ', 'Tunis', 'Tunisie', 'Pilote'),
('P0002', 'M', 'BERNARD', 'Alain', '20 rue du Lac', '69003', 'Lyon', 'France', 'Pilote'),
('P0003', 'M', 'KANJI', 'Yuya', '2 -7-2 Marunouchi , Chiyoda-ku', '100-8799', 'Tokyo', 'Japon', 'Pilote'),
('P0004', 'M', ' BROWN', 'Harold', '226 Northeast 1st Avenue', 'FL 33132', 'Miami', 'USA', 'Pilote'),
('P0005', 'M', '', 'Abel', '', '', 'Milan', 'Italie', 'Pilote'),
('P0006', 'M', 'TRAN', 'Hu', ' 27 Nguyên Thi Minh Khai', '307 - Q. 1', 'Hanoï', 'Vietname', 'Pilote');

-- --------------------------------------------------------

--
-- Structure de la table `passager`
--

CREATE TABLE IF NOT EXISTS `passager` (
  `numpassager` varchar(5) NOT NULL,
  `civilite` varchar(3) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `datenaissance` date NOT NULL,
  PRIMARY KEY (`numpassager`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `passager`
--

INSERT INTO `passager` (`numpassager`, `civilite`, `nom`, `prenom`, `datenaissance`) VALUES
('P0283', 'Mme', 'SYLLA', 'Lala', '1988-03-23'),
('P2837', 'M', 'BAYOL', 'Simon', '1980-01-15'),
('P3610', 'M', 'VENDA', 'Jonah', '1974-05-07'),
('P3793', 'm', 'MOUNA', 'Madani', '1987-10-11'),
('P3794', 'Mme', 'MOUNA', 'Farida', '1978-06-04'),
('P3915', 'M', 'AJAMI', 'Nabil', '1993-08-18'),
('P3916', 'M', 'AJAMI', 'Noha', '2001-10-10'),
('P3918', 'Mme', 'AJAMI', 'Zeyna', '1970-07-15'),
('P4936', 'M', ' Williams', 'Brian', '1966-11-27'),
('P4937', '', ' Williams', 'ABBIE', '2013-02-25'),
('P7393', 'Mme', 'TAYLOR', 'Isabella', '1991-02-22');

-- --------------------------------------------------------

--
-- Structure de la table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
  `numplace` varchar(4) NOT NULL,
  `prix` decimal(6,0) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `numpassager` varchar(5) NOT NULL,
  `numvol` varchar(10) NOT NULL,
  `numreservation` varchar(10) NOT NULL,
  PRIMARY KEY (`numplace`),
  KEY `numreservation` (`numreservation`),
  KEY `numvol` (`numvol`),
  KEY `numpassager` (`numpassager`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `place`
--


-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `numreserv` varchar(10) NOT NULL,
  `datereserv` date NOT NULL,
  `numclient` varchar(5) NOT NULL,
  `numplace` varchar(4) NOT NULL,
  PRIMARY KEY (`numreserv`),
  KEY `numclient` (`numclient`,`numplace`),
  KEY `numplace` (`numplace`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reservation`
--


-- --------------------------------------------------------

--
-- Structure de la table `travailler`
--

CREATE TABLE IF NOT EXISTS `travailler` (
  `vol` varchar(10) NOT NULL,
  `pilote` varchar(50) NOT NULL,
  `co-pilote` varchar(50) NOT NULL,
  `hotesse/steward1` varchar(50) NOT NULL,
  `hotesse/steward2` varchar(50) NOT NULL,
  `hotesse/steward3` varchar(50) NOT NULL,
  `date` date NOT NULL,
  KEY `vol` (`vol`,`pilote`,`co-pilote`,`hotesse/steward1`,`hotesse/steward2`,`hotesse/steward3`),
  KEY `pilote` (`pilote`),
  KEY `co-pilote` (`co-pilote`),
  KEY `hotess/stewart1` (`hotesse/steward1`),
  KEY `hotess/stewart2` (`hotesse/steward2`),
  KEY `hotess/stewart3` (`hotesse/steward3`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `travailler`
--


-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(5) NOT NULL,
  `statut` varchar(10) NOT NULL,
  `login` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `droits` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--


-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

CREATE TABLE IF NOT EXISTS `vol` (
  `numvol` varchar(10) NOT NULL,
  `lieudep` varchar(50) NOT NULL,
  `lieuarriv` varchar(50) NOT NULL,
  `datedep` date NOT NULL,
  `datearrivee` date NOT NULL,
  `heuredep` time NOT NULL,
  `heurearrivee` time NOT NULL,
  `dureetrajet` time NOT NULL,
  PRIMARY KEY (`numvol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vol`
--

INSERT INTO `vol` (`numvol`, `lieudep`, `lieuarriv`, `datedep`, `datearrivee`, `heuredep`, `heurearrivee`, `dureetrajet`) VALUES
('DF0183', 'Paris', 'Guadeloupe', '2013-06-20', '2013-06-21', '10:05:00', '05:59:00', '26:54:00'),
('DF0810', 'Doha - Qatar', 'Tokyo - Japon', '2013-07-14', '2013-07-15', '22:30:00', '11:50:00', '31:20:00'),
('DF1028', 'Casablanca - Maroc', 'Honolulu - Hawaï', '2013-05-24', '2013-05-25', '02:20:00', '18:34:00', '27:14:00'),
('DF4692', 'Berne - Suisse', 'Sydney - Australie', '2013-06-01', '2013-05-02', '06:50:00', '22:05:00', '31:15:00'),
('DF5609', 'Ottawa - Canada', 'Washington', '2013-06-01', '2013-06-01', '12:40:00', '19:34:00', '06:54:00'),
('DF9174', 'Addid Adéba - Djibouti', 'Vienne - Autriche', '2013-05-26', '2013-05-27', '22:40:00', '13:30:00', '13:50:00');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_3` FOREIGN KEY (`numreservation`) REFERENCES `reservation` (`numreserv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`numpassager`) REFERENCES `passager` (`numpassager`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `place_ibfk_2` FOREIGN KEY (`numvol`) REFERENCES `vol` (`numvol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`numplace`) REFERENCES `place` (`numplace`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`numclient`) REFERENCES `client` (`numclient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `travailler`
--
ALTER TABLE `travailler`
  ADD CONSTRAINT `travailler_ibfk_6` FOREIGN KEY (`hotesse/steward3`) REFERENCES `employe` (`numemploye`),
  ADD CONSTRAINT `travailler_ibfk_1` FOREIGN KEY (`vol`) REFERENCES `vol` (`numvol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `travailler_ibfk_2` FOREIGN KEY (`pilote`) REFERENCES `employe` (`numemploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `travailler_ibfk_3` FOREIGN KEY (`co-pilote`) REFERENCES `employe` (`numemploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `travailler_ibfk_4` FOREIGN KEY (`hotesse/steward1`) REFERENCES `employe` (`numemploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `travailler_ibfk_5` FOREIGN KEY (`hotesse/steward2`) REFERENCES `employe` (`numemploye`) ON DELETE CASCADE ON UPDATE CASCADE;
