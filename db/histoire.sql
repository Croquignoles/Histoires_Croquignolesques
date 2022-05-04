-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 04 mai 2022 à 10:13
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
  `description_histoire` text DEFAULT NULL,
  `image_histoire` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `histoires`
--

INSERT INTO `histoires` (`id_histoire`, `nom_histoire`, `description_histoire`, `image_histoire`) VALUES
(1, 'Désolé pour hier soir', 'Tu es bourré lol  cest tout', 'defonce.jpg'),
(2, 'Aventures en terre inconnue', 'Singeries et danger                                      ', 'foret.jpg'),
(3, 'Gloubib', 'Blob', ''),
(4, 'atchoum', '                        sniff sniff              ', '');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id_pages` int(11) NOT NULL,
  `text_page` text DEFAULT NULL,
  `id_histoire` int(11) DEFAULT NULL,
  `id_page_depart` int(11) DEFAULT NULL,
  `desc_courte` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id_pages`, `text_page`, `id_histoire`, `id_page_depart`, `desc_courte`) VALUES
(1, 'Mal à la tete plus réveil compliqué dans un trampoline. j\'entends un chien aboyer, qu\'est-ce que je fais : ', 1, NULL, NULL),
(2, 'Je décide d’aboyer aussi, et rapidement, des pas assassins ornés d’affreuses ballerines font trembler le sol, se rapprochant fatalement de moi. Mon rythme cardiaque augmente, j’entends mon cœur battre au niveau de mes tempes, mon pouls se mélange à mon souffle. Le goût métallique du sang rempli ma bouche. Quant à la supposée meurtrière, après de lourdes secondes, elle se met finalement à parler : « Oh je vois que vous utilisez le trampoline de mon fils, on a décidé de le garder avec Marc depuis que… (elle se mit a sangloter) que… François a décidé de partir au Mali en mission humanitaire ». \r\n\r\n', 1, 1, 'Je décide d\'aboyer aussi'),
(3, 'Je sors une friandise Zooplus de votre poche pour tenter de l\'amadouer', 1, 1, 'Je sors une friandise Zooplus de votre poche pour tenter de l\'amadouer'),
(4, 'Je sors tant bien que mal du trampoline et cours dans le champ situé derrrière moi.\r\n', 1, 1, 'Je sors tant bien que mal du trampoline et cours dans le champ situé derrrière moi.'),
(5, 'J\'acquiesce sans trop comprendre mais finit par lui demander si elle sait comment je suis arrivé là, vous faites la conversation et arrivez dans la salle de bain, que regardez vous en premier							', 1, 2, 'J\'acquiesce sans trop comprendre.'),
(6, 'Il est mort ? Elle s\'énerve que vous ayez pu une seule seconde penser que son protégé est mort -pdv \r\nElle s\'excuse de sa réaction précipitée mais mal a l\'aise, vous demande de partir. Vous déambulez alors dans la ville à la recherche de réponses. Vous arrivez au centre ville, où allez vous? 	', 1, 2, 'Il est mort ?'),
(8, 'vos yeux : vos pupilles sont étrangement dilatées. Aussi vous vous demandez ce que vous avez fait hier soir pour atterir ici, vous dégainez votre téléphone pour appeler quelqu\'un qui vous aiderait	', 1, 5, 'Mes yeux'),
(9, 'Vous composez le numéro de votre soeur', 1, 8, 'Je compose le numéro de ma soeur'),
(10, 'Vous composez le numéro de Théotime', 1, 8, 'Je compose le numéro de Théotime'),
(11, 'votre corps d\'athlète : vous soulevez votre t shirt et la réalité vous rattrape, vous êtes un joueur de lol ne l\'oubliez pas		', 1, 5, 'Mon corps d\'athlète'),
(12, 'vos vetements : la taille et la couleur de vos vetement ne correspond pas à ce que vous avez l\'habtiude de porter, d\'autant plus que votre pantalon n\'est en fait rien d\'autre qu\'un bermuda. Horrifié vous plongez dans vos pensez pour tenter de vous rappeler votre soirée d\'hier. 		', 1, 5, 'Mes vêtements'),
(13, 'A la boulangerie', 1, 6, 'A la boulangerie'),
(14, 'Au kiosque à journaux', 1, 6, 'Au kiosque a journaux'),
(15, 'sur un banc dans le parc pour enfant. Une jeune maman s\'assied à côté de vous et commence à vous parler de ses nuits horrible et de la complexité du changement de couche. -pdv', 1, 6, 'Sur un banc dans le parc pour enfant'),
(16, 'En quelle année on est ? bein en 2022 guignol, elle commence a etre suspicieuse de votre etat et décide de vous expulser de chez elle car elle ne veut pas de souci, vous déambulez alors dans la ville de Tourcoing à la reherche de réponses et finissez par arriver au centre ville. Où allez vous ?		', 1, 2, 'En quelle année on est ?'),
(17, 'A la boulangerie', 1, 16, 'A la boulangerie'),
(18, 'Au kiosque à journaux', 1, 16, 'Au kiosque a journaux'),
(19, 'sur un banc dans le parc pour enfant. Une jeune maman s\'assied à côté de vous et commence à vous parler de ses nuits horrible et de la complexité du changement de couche. -pdv', 1, 16, 'Sur un banc dans le parc pour enfant');

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
('correcteur_admin', 'mdp_correcteur_1234', 1),
('Croquignoles', 'G@llardon28%!A', 1);

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
  ADD PRIMARY KEY (`id_pages`),
  ADD KEY `histoire<=>page` (`id_histoire`),
  ADD KEY `page<=>page` (`id_page_depart`);

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
  MODIFY `id_histoire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id_pages` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `histoire<=>page` FOREIGN KEY (`id_histoire`) REFERENCES `histoires` (`id_histoire`),
  ADD CONSTRAINT `page<=>page` FOREIGN KEY (`id_page_depart`) REFERENCES `pages` (`id_pages`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
