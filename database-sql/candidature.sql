-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 22 oct. 2022 à 12:21
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `candidature`
--

-- --------------------------------------------------------

--
-- Structure de la table `bulletin`
--

CREATE TABLE `bulletin` (
  `id_bulletin` int(11) NOT NULL,
  `bulletin` varchar(250) NOT NULL,
  `semestre` int(11) NOT NULL,
  `id_cursus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bulletin`
--

INSERT INTO `bulletin` (`id_bulletin`, `bulletin`, `semestre`, `id_cursus`) VALUES
(16, 'bulletin_Seconde S0H1_Daro_Mbengue.png', 1, 4),
(17, 'bulletin_Seconde S0H2_Daro_Mbengue.png', 2, 4),
(18, 'bulletin_Première 1S11_Daro_Mbengue.png', 1, 5),
(19, 'bulletin_Terminale S11_Daro_Mbengue.png', 1, 6),
(20, 'bulletin_Terminale S12_Daro_Mbengue.png', 2, 6),
(21, 'bulletin_Seconde S0H1_Michel_Nassalang.png', 1, 1),
(22, 'bulletin_Seconde S0H1_Malick_Diop.png', 1, 13),
(23, 'bulletin_Seconde S0H2_Malick_Diop.png', 2, 13);

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

CREATE TABLE `candidat` (
  `id_candidat` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `statut` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `age` int(11) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `cni` varchar(50) NOT NULL,
  `pseudo` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`id_candidat`, `prenom`, `nom`, `statut`, `email`, `age`, `genre`, `cni`, `pseudo`, `password`) VALUES
(1, 'Michel', 'Nassalang', 'Etudiant', 'nassalang.michel@golf.dik.sn', 5, 'Homme', '334116680828', 'Michel_Nassalang', '$2y$10$hz79f0bxIXSosanHF99pkO7pOXCRRPWhmBFPChvgs0aJYkN4oc9GC'),
(3, 'Daro', 'Mbengue', 'Etudiant', 'mbengue.daro@gmail.com', 23, 'Femme', '3302433423434', 'Daro_Mbengue', '$2y$10$6JflYvl6L4PzJdvBJoEUnextcEZegdeKLFM.H2Lht1uNYfVlzmkCC'),
(4, 'Malick', 'Diop', 'Etudiant', 'diop.malick@belf.gal.sn', 25, 'Homme', '', 'Malick_Diop', '$2y$10$UuR/6YI2HJxGM5vIAfiFCugh6bBXcs/mTbxo2BVAMkZpVVs9djunK');

-- --------------------------------------------------------

--
-- Structure de la table `cursus`
--

CREATE TABLE `cursus` (
  `id_cursus` int(11) NOT NULL,
  `classe` varchar(250) NOT NULL,
  `serie` varchar(50) NOT NULL,
  `etablissement` varchar(100) NOT NULL,
  `annee` varchar(250) NOT NULL,
  `id_candidat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cursus`
--

INSERT INTO `cursus` (`id_cursus`, `classe`, `serie`, `etablissement`, `annee`, `id_candidat`) VALUES
(1, 'Seconde S0H', 'Scientifique', 'Lycée Demba Diop', '2015-2016', 1),
(2, 'Première  1S1', 'Scientifique', 'Lycée Demba Diop', '2016-2017', 1),
(3, ' Terminale TS1', 'Scientifique', 'Lycée Demba Diop', '2017-2018', 1),
(4, 'Seconde S0H', 'Scientifique', 'Lycée Demba Diop', '2015-2016', 3),
(5, 'Première 1S1', 'Scientifique', 'Lycée Demba Diop', '2016-2017', 3),
(6, 'Terminale S1', 'Scientifique', 'Lycée Demba Diop', '2017-2018', 3),
(8, 'Terminale S1', 'Scientifique', 'Lycée Demba Diop', '2017-2018', 3),
(9, 'Terminale S1', 'Scientifique', 'Lycée Demba Diop', '2017-2018', 3),
(10, 'Terminale S1', 'Scientifique', 'Lycée Demba Diop', '2017-2018', 3),
(11, 'Terminale S1', 'Scientifique', 'Lycée Demba Diop', '2016-2017', 3),
(13, 'Seconde S0H', 'Scientifique', 'Lycée Demba Diop', '2016-2017', 4);

-- --------------------------------------------------------

--
-- Structure de la table `dossier`
--

CREATE TABLE `dossier` (
  `id_dossier` int(11) NOT NULL,
  `centre_examen` varchar(50) NOT NULL,
  `extrait_naissance` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(250) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `id_candidat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `dossier`
--

INSERT INTO `dossier` (`id_dossier`, `centre_examen`, `extrait_naissance`, `email`, `telephone`, `adresse`, `id_candidat`) VALUES
(1, 'Lycée Demba Diop', 'extrait_Michel_Nassalang.jpg', 'nassalang.michel@ugb.edu.sn', '+221771112236', 'Saly Carrefour', 1),
(2, 'Lycée Demba Diop', '', 'mbengue.daro@gmail.com', '773461265', 'Mbour, Santessou', 3);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id_inscription` int(11) NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `id_candidat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id_inscription`, `lieu`, `date`, `id_candidat`) VALUES
(2, 'Thiès', '2022-09-09', 1),
(3, 'Saint Louis', '2022-10-21', 3),
(4, 'Kolda', '2022-10-22', 4);

-- --------------------------------------------------------

--
-- Structure de la table `payement`
--

CREATE TABLE `payement` (
  `id_payement` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `id_candidat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bulletin`
--
ALTER TABLE `bulletin`
  ADD PRIMARY KEY (`id_bulletin`),
  ADD KEY `FK_bulletin_c` (`id_cursus`);

--
-- Index pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`id_candidat`);

--
-- Index pour la table `cursus`
--
ALTER TABLE `cursus`
  ADD PRIMARY KEY (`id_cursus`),
  ADD KEY `FK_cursus_c` (`id_candidat`);

--
-- Index pour la table `dossier`
--
ALTER TABLE `dossier`
  ADD PRIMARY KEY (`id_dossier`),
  ADD KEY `FK_dossier_c` (`id_candidat`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id_inscription`),
  ADD KEY `FK_inscription_c` (`id_candidat`);

--
-- Index pour la table `payement`
--
ALTER TABLE `payement`
  ADD PRIMARY KEY (`id_payement`),
  ADD KEY `FK_payement_c` (`id_candidat`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bulletin`
--
ALTER TABLE `bulletin`
  MODIFY `id_bulletin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `candidat`
--
ALTER TABLE `candidat`
  MODIFY `id_candidat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `cursus`
--
ALTER TABLE `cursus`
  MODIFY `id_cursus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `dossier`
--
ALTER TABLE `dossier`
  MODIFY `id_dossier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id_inscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `payement`
--
ALTER TABLE `payement`
  MODIFY `id_payement` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bulletin`
--
ALTER TABLE `bulletin`
  ADD CONSTRAINT `FK_bulletin_c` FOREIGN KEY (`id_cursus`) REFERENCES `cursus` (`id_cursus`);

--
-- Contraintes pour la table `cursus`
--
ALTER TABLE `cursus`
  ADD CONSTRAINT `FK_cursus_c` FOREIGN KEY (`id_candidat`) REFERENCES `candidat` (`id_candidat`);

--
-- Contraintes pour la table `dossier`
--
ALTER TABLE `dossier`
  ADD CONSTRAINT `FK_dossier_c` FOREIGN KEY (`id_candidat`) REFERENCES `candidat` (`id_candidat`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `FK_inscription_c` FOREIGN KEY (`id_candidat`) REFERENCES `candidat` (`id_candidat`);

--
-- Contraintes pour la table `payement`
--
ALTER TABLE `payement`
  ADD CONSTRAINT `FK_payement_c` FOREIGN KEY (`id_candidat`) REFERENCES `candidat` (`id_candidat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
