-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 15 avr. 2022 à 16:17
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `histoire`
--

-- --------------------------------------------------------

--
-- Structure de la table `histoires`
--

CREATE TABLE `histoires` (
  `id_histoire` int(11) NOT NULL,
  `nom_histoire` varchar(100) DEFAULT NULL,
  `nb_pages` int(11) DEFAULT NULL,
  `description_histoire` text DEFAULT NULL,
  `image_histoire` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `histoires`
--

INSERT INTO `histoires` (`id_histoire`, `nom_histoire`, `nb_pages`, `description_histoire`, `image_histoire`) VALUES
(1, 'Désolé pour hier soir', 15, 'Tu es bourré lol  cest tout', 'defonce.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id_page` int(11) NOT NULL,
  `option_1_page` int(5) DEFAULT NULL,
  `option_2_page` int(5) DEFAULT NULL,
  `option_3_page` int(5) DEFAULT NULL,
  `texte_page` text DEFAULT NULL,
  `id_histoire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` varchar(50) NOT NULL,
  `mdp_user` varchar(30) NOT NULL,
  `admin_user` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `mdp_user`, `admin_user`) VALUES
('correcteur ', 'mdp_correcteur_1234', 0),
('correcteur_admin', 'mdp_correcteur_1234', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `histoires`
--
ALTER TABLE `histoires`
  ADD PRIMARY KEY (`id_histoire`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id_page`),
  ADD KEY `lien_histoire_page` (`id_histoire`),
  ADD KEY `lien_pages_1` (`option_1_page`),
  ADD KEY `lien_pages_2` (`option_2_page`),
  ADD KEY `lien_pages_3` (`option_3_page`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`,`mdp_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `histoires`
--
ALTER TABLE `histoires`
  MODIFY `id_histoire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `lien_pages_1` FOREIGN KEY (`option_1_page`) REFERENCES `pages` (`id_page`),
  ADD CONSTRAINT `lien_pages_2` FOREIGN KEY (`option_2_page`) REFERENCES `pages` (`id_page`),
  ADD CONSTRAINT `lien_pages_3` FOREIGN KEY (`option_3_page`) REFERENCES `pages` (`id_page`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
