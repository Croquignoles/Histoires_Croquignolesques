-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 04 mai 2022 à 11:04
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
(1, 'Peu à peu, le sombre univers qui jusqu\'alors m\'enveloppait laissait place au une faible puis aveuglante lumière. Je suis sur une surface molle, je flotte ? Ma tête me lance. J\'ai mal, et terriblement soif, je pourrais boire quoi, 2 ou 3 verres d\'eau ! J\'entends un chien aboyer et bien que mon être semble plus lourd que mes cours de philo au lycée, je parviens à me relever et distingue peu à peu les contours d\'un trampoline. Le chien continuant d\'aboyer :\r\n', 1, NULL, 'Début de l\'histoire.'),
(2, 'Je décide d’aboyer aussi, et rapidement, des pas assassins ornés d’affreuses ballerines font trembler le sol, se rapprochant fatalement de moi. Mon rythme cardiaque augmente, j’entends mon cœur battre au niveau de mes tempes, mon pouls se mélange à mon souffle. Le goût métallique du sang rempli ma bouche. Quant à la supposée meurtrière, après de lourdes secondes, elle se met finalement à parler : « Oh je vois que vous utilisez le trampoline de mon fils, on a décidé de le garder avec Marc depuis que… (elle se mit a sangloter) que… François a décidé de partir au Mali en mission humanitaire ». \r\n\r\n', 1, 1, 'Je décide d\'aboyer aussi'),
(3, 'Je sors une friandise Zooplus de ma poche pour tenter de l\'amadouer', 1, 1, 'Je sors une friandise Zooplus de ma poche pour tenter de l\'amadouer'),
(4, 'Je sors tant bien que mal du trampoline et cours dans le champ situé derrrière moi.\r\n', 1, 1, 'Je sors tant bien que mal du trampoline et cours dans le champ situé derrrière moi.'),
(5, 'J’acquiesce sans trop comprendre mais quand la lucidité me revint enfin, je finis par lui demander si elle sait comment je suis arrivé là. Ludivine, puisque c’est comme ça qu’elle s’appelle après s’être présentée à moi à la troisième personne, entama une tirade digne des pires dramaturges, sans rebondissements ni péripéties, plus fade encore que des pâtes sans sel, plus insipide qu’un bain sans mousse. A force de « mhmh » et de « je vois » répétés à ce qui se rapproche de l’infini, je sors du trampoline puis j’avance avec Ludi pour me rapprocher de sa salle de bain pour m’y enfermer. Un miroir immense se dresse devant moi, je focalise d’abord mon regard sur :  \r\n						', 1, 2, 'J\'acquiesce sans trop comprendre.'),
(6, 'Il est mort ? Elle s\'énerve que vous ayez pu une seule seconde penser que son protégé est mort -pdv \r\nElle s\'excuse de sa réaction précipitée mais mal a l\'aise, vous demande de partir. Vous déambulez alors dans la ville à la recherche de réponses. Vous arrivez au centre ville, où allez vous? 	', 1, 2, 'Il est mort ?'),
(8, 'Je remarque après inspection que mes pupilles sont étrangement dilatées. Aussi je me demande ce que j’ai fais hier soir pour atterrir ici, non pas que l’endroit n’est pas confortable, mais plutôt que tout cela manque peut-être un peu de cohérence. Je décide de dégainer mon téléphone pour tenter d’y voir plus clair. Qui donc serait susceptible de plus m’aider ? \r\n', 1, 5, 'Mes yeux'),
(9, 'Vous composez le numéro de votre soeur', 1, 8, 'Je compose le numéro de ma soeur'),
(10, 'Vous composez le numéro de Théotime', 1, 8, 'Je compose le numéro de Théotime'),
(11, 'Je soulève mon t-shirt et la réalité me rattrape, j’oublie tout le temps que je joue à LoL… Enfin peu importe, je ne me suis pas enfermé ici pour me mater mais plutôt pour savoir sur quelle planète j’ai atterri. « Namek »  me chuchota mon esprit. Après avoir soufflé du nez je décide de sortir mon téléphone pour éclaircir toute cette sombre histoire.	', 1, 5, 'Mon corps d\'athlète'),
(12, 'La taille et la couleur de vos vêtements ne correspond pas à ce que j’ai l’habitude de porter, d’autant plus que mon bas et n’est rien d’autre qu’un bermuda. Horrifié je plonge profondément dans mes pensées pour tenter de me rappeler cette maudite soirée, sans succès. Je décidé d’utiliser le joker appel à un ami et je sors mon téléphone brusquement de ma poche si bien qu’il tombe sur le coin de la douche et l’écran si fissure totalement. Au même moment une lettre vient se glisser sous le bas de la porte. Après un juron des plus blasphématoire, je vais chercher la lettre puis l’ouvre :\r\n\r\n		 Avis de décès\r\n     \r\n	         Madame Ludivine ATOIRE \r\n	   Décédée le Lundi 11 février 1986 \r\n		A l’âge de 57 ans \r\n\r\nJe commence à manquer d’air, mon rythme cardiaque s’emporte à nouveau et ma vue retrouve peu à peu le calme sombre dans lequel cette histoire à commencé. Je chois. \r\n	', 1, 5, 'Mes vêtements'),
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
