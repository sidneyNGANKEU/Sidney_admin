-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 25 oct. 2022 à 06:33
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `formationplus`
--

-- --------------------------------------------------------

--
-- Structure de la table `attestation`
--

CREATE TABLE `attestation` (
  `idAttestation` int(45) NOT NULL,
  `idEtudiant` int(45) NOT NULL,
  `idConvention` int(45) NOT NULL,
  `message` text NOT NULL DEFAULT 'Bonjour NOM_ETUDIANT PRENOM_ETUDIANT, Vous avez suivi nbHeur de formation chez FormationPlus. Pouvez-vous nous retourner ce mail avec la pièce jointe signée. Cordialement, FormationPlus'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `convention`
--

CREATE TABLE `convention` (
  `idConvention` int(45) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `nbHeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `convention`
--

INSERT INTO `convention` (`idConvention`, `nom`, `nbHeur`) VALUES
(3, 'COMMERCE\r\n', 30),
(4, 'DESSIN-GRAPHISME', 25),
(5, 'MODE', 35),
(2, 'RESTAURATION', 45),
(1, 'RH', 10);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `idEtudiant` int(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `idConvention` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`idEtudiant`, `prenom`, `nom`, `mail`, `idConvention`) VALUES
(3, 'Janaye', 'Kondratovich', 'jkondratovich0@va.gov\r\n', 1),
(4, 'Wat', 'Wat', 'wyankov1@twitpic.com', 1),
(5, 'Claudio', 'Sutherden', 'csutherden2@fastcompany.com\r\n', 5),
(6, 'Angy', 'Ashpole', 'aashpole3@icq.com', 4),
(7, 'Lukas', 'Giggs', 'lgiggs5@ca.gov', 3),
(8, 'Fredelia', 'Blitzer', 'fblitzer9@dion.ne.fr', 2),
(9, 'Charisse', 'Woollacott', 'cwoollacott7@spiegel.org', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attestation`
--
ALTER TABLE `attestation`
  ADD PRIMARY KEY (`idAttestation`),
  ADD KEY `idAttestation` (`idAttestation`),
  ADD KEY `idEtudiantkey` (`idEtudiant`),
  ADD KEY `idConventionkey` (`idConvention`);

--
-- Index pour la table `convention`
--
ALTER TABLE `convention`
  ADD PRIMARY KEY (`nom`),
  ADD UNIQUE KEY `idConvention` (`idConvention`),
  ADD KEY `nom` (`nom`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD UNIQUE KEY `idEtudiant` (`idEtudiant`),
  ADD KEY `idConvention` (`idConvention`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `attestation`
--
ALTER TABLE `attestation`
  MODIFY `idAttestation` int(45) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `convention`
--
ALTER TABLE `convention`
  MODIFY `idConvention` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `idEtudiant` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `attestation`
--
ALTER TABLE `attestation`
  ADD CONSTRAINT `idConventionkey` FOREIGN KEY (`idConvention`) REFERENCES `convention` (`idConvention`),
  ADD CONSTRAINT `idEtudiantkey` FOREIGN KEY (`idEtudiant`) REFERENCES `etudiant` (`idEtudiant`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`idConvention`) REFERENCES `convention` (`idConvention`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
