-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 05 déc. 2022 à 14:43
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ma_bd`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE `agent` (
  `id_agent` int(5) NOT NULL,
  `user_name` varchar(25) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`id_agent`, `user_name`, `password`) VALUES
(1, 'noella', '7220d65820839700b6c9ae74f87b48e0');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(5) NOT NULL,
  `poster_commentaire` varchar(255) DEFAULT NULL,
  `date_commentaire` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_publication` int(5) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `poster_commentaire`, `date_commentaire`, `id_publication`, `email`) VALUES
(1, 'wow une bonne initiative', '2022-09-29 16:07:08', 4, 'divinbadidi@gmail.com'),
(2, 'BRAVO', '2022-10-22 14:54:43', 6, 'noe@gmail.com'),
(3, 'test', '2022-10-31 14:21:35', 6, 'DJIKANGA()'),
(4, 'tete', '2022-10-31 14:23:01', 4, 'DJIKANGA(noe@gmail.com)');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `num_evenement` int(5) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `annee_scolaire` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `parent`
--

CREATE TABLE `parent` (
  `code_parent` int(5) NOT NULL,
  `nom_de_famille` varchar(25) DEFAULT NULL,
  `noms_eleves` varchar(25) DEFAULT NULL,
  `classes_eleve` varchar(50) DEFAULT NULL,
  `adresse_residence` varchar(50) DEFAULT NULL,
  `telephone_parent` varchar(15) DEFAULT NULL,
  `email_parent` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `parent`
--

INSERT INTO `parent` (`code_parent`, `nom_de_famille`, `noms_eleves`, `classes_eleve`, `adresse_residence`, `telephone_parent`, `email_parent`) VALUES
(1, 'nkanhga', NULL, NULL, NULL, '2438956436', 'Patricenkanga@gmail.com'),
(2, 'NKANGA', NULL, NULL, NULL, '789', 'NOELLAKALOLI@GMAIL.COM'),
(3, 'NKANGA', NULL, NULL, NULL, '5678', 'het@gmail.com'),
(4, 'NKANGA', NULL, NULL, NULL, '243823353166', 'MERVEILLENKANGA@GMAIL.COM'),
(5, 'DJIKANGA', NULL, NULL, NULL, '0850625454', 'noe@gmail.com'),
(6, 'DLOLI', 'GEORLINE GUYLAINE', '5 ET 1', NULL, NULL, 'DLOLIMERVEILLE@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `id_publication` int(5) NOT NULL,
  `id_evenement` varchar(255) DEFAULT NULL,
  `description` varchar(550) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `id_agent` int(5) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`id_publication`, `id_evenement`, `description`, `image`, `id_agent`, `dates`) VALUES
(4, 'LA RENTREE SCOLAIRE', '						Chers parents, la rentrÃ©e scolaire pour l\'annÃ©e scolairre 2022-2023 est prevue pour le 03 Septembre 2022 Ã  07h 00\'. Tout retard est justifiÃ© Ã  la direction		\r\n										', '631a2e7606b9e2.92740098.jpeg', NULL, '2022-10-31 14:26:59'),
(5, 'reunion de parent', 'chers parents	\r\n					', '633305101ff535.27183186.jpg', NULL, '2022-10-31 14:26:59'),
(6, 'Avis aux parents', '																																										             Chers parents,\r\n              La direction du collÃ¨ge des gÃ©nies Ruta remercie tous les parents qui nous font confiance pour la qualitÃ© de la formation de leurs enfants. A cet effet, pour le bon fonctionnement, nous vous invitons Ã  rÃ©pondre prÃ©sent Ã  l\'assemblÃ©e gÃ©nÃ©rale des parents, ce samedi 05 novembre 2022 Ã  11h30\'. La prÃ©sence de tous est vivement souhaitÃ©e.\r\n\r\n                                                     Franche co', '6342958da45171.10390562.jpeg', NULL, '2022-10-31 14:26:59'),
(7, 'COMMUNIQUE AUX PARENTS', '                    Chers parents,\r\n                     La direction du collÃ¨ge des GÃ©nies Ruta vous informe , le congÃ© de dÃ©tente du premier trimrstre dÃ©bute ce mardi 29/11/2022 et prend fin le samedi 03/11/2022. La reprise des cours est prÃ©vu le lundi 05/11/2022 Ã  07h00\' pour ceux de l\'avant midi. 						\r\n					', '637bd23fbcf595.69115549.jpeg', NULL, '2022-11-21 19:32:15'),
(8, 'avis aux parents', 'chers parents, la direction du collÃ¨ge des gÃ©nies Ruta organise un match de football ce lundi 12 dÃ©cembre 2022 Ã  10h00\' la prÃ©sence de tous nos Ã©lÃ¨ves est souhaitÃ©e. 				', '638cc82a0f93f5.92931899.jpeg', NULL, '2022-12-04 16:17:46'),
(9, 'avis aux parents', 'frg					\r\n					', '638df237d810e3.63843992.jpg', NULL, '2022-12-05 13:29:27');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id_reponse` int(5) NOT NULL,
  `reponse` varchar(500) DEFAULT NULL,
  `date_reponse` date DEFAULT NULL,
  `id_commentaire` int(5) DEFAULT NULL,
  `code_patent` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id_agent`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `id_publication` (`id_publication`),
  ADD KEY `code_parent` (`email`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`num_evenement`);

--
-- Index pour la table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`code_parent`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id_publication`),
  ADD KEY `id_agent` (`id_agent`),
  ADD KEY `id_evenement` (`id_evenement`),
  ADD KEY `id_evenement_2` (`id_evenement`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id_reponse`),
  ADD KEY `id_commentaire` (`id_commentaire`,`code_patent`),
  ADD KEY `code_patent` (`code_patent`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agent`
--
ALTER TABLE `agent`
  MODIFY `id_agent` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `parent`
--
ALTER TABLE `parent`
  MODIFY `code_parent` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id_publication` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id_reponse` int(5) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id_publication`);

--
-- Contraintes pour la table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`id_agent`) REFERENCES `agent` (`id_agent`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_2` FOREIGN KEY (`id_commentaire`) REFERENCES `commentaire` (`id_commentaire`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
