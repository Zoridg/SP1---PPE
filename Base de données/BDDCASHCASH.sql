-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Jeu 12 Avril 2018 à 20:56
-- Version du serveur: 5.5.54
-- Version de PHP: 5.3.10-1ubuntu3.26

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bergamini_nathan`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE IF NOT EXISTS `agence` (
  `numAgence` int(11) NOT NULL,
  `nomAgence` varchar(25) DEFAULT NULL,
  `adresseAgence` varchar(25) DEFAULT NULL,
  `numTelAgence` int(11) DEFAULT NULL,
  `mailAgence` varchar(25) DEFAULT NULL,
  `numTelecopieAgence` int(11) DEFAULT NULL,
  `codeRegion` int(11) DEFAULT NULL,
  PRIMARY KEY (`numAgence`),
  KEY `FK_Agence_codeRegion` (`codeRegion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `assistant_telephonique`
--

CREATE TABLE IF NOT EXISTS `assistant_telephonique` (
  `matricule` varchar(25) NOT NULL,
  `codeRegion` int(11) DEFAULT NULL,
  PRIMARY KEY (`matricule`),
  KEY `FK_Assistant_telephonique_codeRegion` (`codeRegion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `Numero` varchar(25) NOT NULL,
  `RaisonSa` varchar(25) DEFAULT NULL,
  `NumSiren` varchar(25) DEFAULT NULL,
  `codeAPE` varchar(25) DEFAULT NULL,
  `AdressePost` varchar(25) DEFAULT NULL,
  `numTelephone` int(11) DEFAULT NULL,
  `numTelecopie` varchar(25) DEFAULT NULL,
  `AdresseElectronique` varchar(25) DEFAULT NULL,
  `numAgence` int(11) DEFAULT NULL,
  PRIMARY KEY (`Numero`),
  KEY `FK_CLIENT_numAgence` (`numAgence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE IF NOT EXISTS `contrat` (
  `NumContrat` varchar(25) NOT NULL,
  `DateSignature` date DEFAULT NULL,
  `DateEcheance` date DEFAULT NULL,
  `Numero` varchar(25) DEFAULT NULL,
  `refTypeContrat` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`NumContrat`),
  KEY `FK_CONTRAT_refTypeContrat` (`refTypeContrat`),
  KEY `FK_CONTRAT_Numero` (`Numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `controler`
--

CREATE TABLE IF NOT EXISTS `controler` (
  `temps_passe` int(11) DEFAULT NULL,
  `commentaire` varchar(25) DEFAULT NULL,
  `NumSerie` varchar(25) NOT NULL,
  `nomTech` varchar(25) NOT NULL,
  PRIMARY KEY (`NumSerie`,`nomTech`),
  KEY `FK_Contruler_nomTech` (`nomTech`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE IF NOT EXISTS `employe` (
  `matricule` varchar(25) NOT NULL,
  `nom_employe` varchar(25) DEFAULT NULL,
  `prenom_employe` varchar(25) DEFAULT NULL,
  `adresse_employe` varchar(25) DEFAULT NULL,
  `date_Embauche` date DEFAULT NULL,
  PRIMARY KEY (`matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `familleproduit`
--

CREATE TABLE IF NOT EXISTS `familleproduit` (
  `CodeFam` varchar(25) NOT NULL,
  `libelle` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`CodeFam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fiche`
--

CREATE TABLE IF NOT EXISTS `fiche` (
  `numFiche` int(11) NOT NULL,
  `matriculeTech` varchar(25) DEFAULT NULL,
  `numClient` int(11) DEFAULT NULL,
  `nomClient` varchar(25) DEFAULT NULL,
  `adresseClient` varchar(25) DEFAULT NULL,
  `dateVisite` date DEFAULT NULL,
  `heureVisite` int(11) DEFAULT NULL,
  `numSerieMateriel` int(11) DEFAULT NULL,
  `libelleMateriel` varchar(25) DEFAULT NULL,
  `tempsVerif` int(11) DEFAULT NULL,
  `commentaire` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`numFiche`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

CREATE TABLE IF NOT EXISTS `intervention` (
  `nomTech` varchar(25) NOT NULL,
  `heureIntervention` int(11) DEFAULT NULL,
  `Numero` varchar(25) DEFAULT NULL,
  `matricule` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`nomTech`),
  KEY `FK_Intervention_matricule` (`matricule`),
  KEY `FK_Intervention_Numero` (`Numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE IF NOT EXISTS `materiel` (
  `NumSerie` varchar(25) NOT NULL,
  `DateVente` date DEFAULT NULL,
  `DateInstallation` date DEFAULT NULL,
  `PrixVente` int(11) DEFAULT NULL,
  `Emplacement` varchar(25) DEFAULT NULL,
  `RefInterne` varchar(25) DEFAULT NULL,
  `NumContrat` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`NumSerie`),
  KEY `FK_MATERIEL_NumContrat` (`NumContrat`),
  KEY `FK_MATERIEL_RefInterne` (`RefInterne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `codeRegion` int(11) NOT NULL,
  `nomRegion` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`codeRegion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `technicien`
--

CREATE TABLE IF NOT EXISTS `technicien` (
  `qualification` varchar(25) DEFAULT NULL,
  `dateObtentionQualification` date DEFAULT NULL,
  `mailTech` varchar(25) DEFAULT NULL,
  `numTelTech` int(11) DEFAULT NULL,
  `matricule` varchar(25) NOT NULL,
  `numAgence` int(11) DEFAULT NULL,
  PRIMARY KEY (`matricule`),
  KEY `FK_Technicien_numAgence` (`numAgence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `RefInterne` varchar(25) NOT NULL,
  `Libelle` varchar(25) DEFAULT NULL,
  `CodeFam` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`RefInterne`),
  KEY `FK_TYPE_CodeFam` (`CodeFam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_contrat`
--

CREATE TABLE IF NOT EXISTS `type_contrat` (
  `refTypeContrat` varchar(25) NOT NULL,
  `delaiIntervention` date DEFAULT NULL,
  `tauxApplicable` int(11) DEFAULT NULL,
  PRIMARY KEY (`refTypeContrat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `agence`
--
ALTER TABLE `agence`
  ADD CONSTRAINT `FK_Agence_codeRegion` FOREIGN KEY (`codeRegion`) REFERENCES `region` (`codeRegion`);

--
-- Contraintes pour la table `assistant_telephonique`
--
ALTER TABLE `assistant_telephonique`
  ADD CONSTRAINT `FK_Assistant_telephonique_codeRegion` FOREIGN KEY (`codeRegion`) REFERENCES `region` (`codeRegion`),
  ADD CONSTRAINT `FK_Assistant_telephonique_matricule` FOREIGN KEY (`matricule`) REFERENCES `employe` (`matricule`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_CLIENT_numAgence` FOREIGN KEY (`numAgence`) REFERENCES `agence` (`numAgence`);

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `FK_CONTRAT_refTypeContrat` FOREIGN KEY (`refTypeContrat`) REFERENCES `type_contrat` (`refTypeContrat`),
  ADD CONSTRAINT `FK_CONTRAT_Numero` FOREIGN KEY (`Numero`) REFERENCES `client` (`Numero`);

--
-- Contraintes pour la table `controler`
--
ALTER TABLE `controler`
  ADD CONSTRAINT `FK_Contruler_nomTech` FOREIGN KEY (`nomTech`) REFERENCES `intervention` (`nomTech`),
  ADD CONSTRAINT `FK_Contruler_NumSerie` FOREIGN KEY (`NumSerie`) REFERENCES `materiel` (`NumSerie`);

--
-- Contraintes pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD CONSTRAINT `FK_Intervention_matricule` FOREIGN KEY (`matricule`) REFERENCES `employe` (`matricule`),
  ADD CONSTRAINT `FK_Intervention_Numero` FOREIGN KEY (`Numero`) REFERENCES `client` (`Numero`);

--
-- Contraintes pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD CONSTRAINT `FK_MATERIEL_NumContrat` FOREIGN KEY (`NumContrat`) REFERENCES `contrat` (`NumContrat`),
  ADD CONSTRAINT `FK_MATERIEL_RefInterne` FOREIGN KEY (`RefInterne`) REFERENCES `type` (`RefInterne`);

--
-- Contraintes pour la table `technicien`
--
ALTER TABLE `technicien`
  ADD CONSTRAINT `FK_Technicien_numAgence` FOREIGN KEY (`numAgence`) REFERENCES `agence` (`numAgence`),
  ADD CONSTRAINT `FK_Technicien_matricule` FOREIGN KEY (`matricule`) REFERENCES `employe` (`matricule`);

--
-- Contraintes pour la table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `FK_TYPE_CodeFam` FOREIGN KEY (`CodeFam`) REFERENCES `familleproduit` (`CodeFam`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
