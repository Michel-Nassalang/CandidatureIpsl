-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 09 jan. 2023 à 01:32
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
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `email`, `nom`, `prenom`, `pseudo`, `password`) VALUES
(1, 'nassalang.michel@ugb.edu.sn', 'Nassalang', 'Michel', 'Mike', '$2y$10$hz79f0bxIXSosanHF99pkO7pOXCRRPWhmBFPChvgs0aJYkN4oc9GC');

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
(23, 'bulletin_Seconde S0H2_Malick_Diop.png', 2, 13),
(24, 'bulletin_Première 1S11_Mike.png', 1, 2),
(25, 'bulletin_Première 1S12_Mike.png', 2, 2),
(26, 'bulletin_Seconde L0F1_Hervalio.png', 1, 3);

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
(1, 'Michel', 'Nassalang', 'Etudiant', 'nassalang.michel@gmail.com', 24, 'Homme', '335119980828', 'Mike', '$2y$10$hz79f0bxIXSosanHF99pkO7pOXCRRPWhmBFPChvgs0aJYkN4oc9GC'),
(2, 'Daro', 'Mbengue', 'Etudiant', 'mbengue.daro@gmail.com', 23, 'Femme', '', 'Dora', '$2y$10$4kxft1F1.HCHW0UullayY.ExODhT0rfV.oq0YH5r7Oo14UcU2EUuq'),
(3, 'Hervé', 'Sanka', 'Elève de terminale', 'nassalang.herve@gmail.com', 18, 'Homme', '', 'Hervalio', '$2y$10$uSaxOg7gOTHZcQV.kM8sR.ZogPFpcISGYQxzfcSG/sc6JeLWsL5nu');

-- --------------------------------------------------------

--
-- Structure de la table `centre`
--

CREATE TABLE `centre` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `lieu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `centre`
--

INSERT INTO `centre` (`id`, `libelle`, `lieu`) VALUES
(1, 'Lycée Demba Diop de Mbour', 'Thiès'),
(2, 'Lycée Limamoulaye', 'Dakar'),
(3, 'Lycée technique Cheick Ahmadou Bamba', 'Diourbel'),
(4, 'Lycée Malick Sy', 'Thiès');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sujet` varchar(100) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `nom`, `email`, `sujet`, `tel`, `message`) VALUES
(1, 'Michel Nassalang', 'nassalang.michel@ugb.edu.sn', 'Eligibilité', '+221771112236', 'Salut l\'ami :)'),
(2, 'Michel Nassalang', 'nassalang.michel@ugb.edu.sn', 'Eligibilité', '+221771112236', 'Salut l\'ami :)'),
(3, 'Michel Nassalang', 'nassalang.michel@ugb.edu.sn', 'Conditions d\'admission', '+221771112236', 'Pouvez vous me passer les infos');

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
(1, 'Seconde S0 H', 'Scientifique', 'Lycée Demba Diop', '2015-2026', 1),
(2, 'Première 1S1', 'Scientifique', 'Lycée Demba Diop', '2016-2017', 1),
(3, 'Seconde L0F', 'Littéraire', 'Lycée Demba Diop', '2014-2015', 3);

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
(1, 'Lycée Demba Diop', 'extrait_Mike.jpg', 'nassalang.michel@ugb.edu.sn', '+221771112236', 'Mbour, Saly', 1),
(2, '', 'extrait_Hervalio.jpg', '', '', '', 3);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id_inscription` int(11) NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `id_candidat` int(11) NOT NULL,
  `val_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id_inscription`, `lieu`, `date`, `id_candidat`, `val_admin`) VALUES
(1, 'Thiès', '2022-09-08', 2, 0),
(2, 'Thiès', '2022-09-09', 1, 0),
(3, 'Thiès', '2023-01-08', 3, 0);

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
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `email` (`email`);

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
  ADD PRIMARY KEY (`id_candidat`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- Index pour la table `centre`
--
ALTER TABLE `centre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

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
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `bulletin`
--
ALTER TABLE `bulletin`
  MODIFY `id_bulletin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `candidat`
--
ALTER TABLE `candidat`
  MODIFY `id_candidat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `centre`
--
ALTER TABLE `centre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `cursus`
--
ALTER TABLE `cursus`
  MODIFY `id_cursus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `dossier`
--
ALTER TABLE `dossier`
  MODIFY `id_dossier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id_inscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
