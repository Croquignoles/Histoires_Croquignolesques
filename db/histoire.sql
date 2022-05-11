-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 11, 2022 at 04:30 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `histoire`
--

-- --------------------------------------------------------

--
-- Table structure for table `histoires`
--

CREATE TABLE `histoires` (
  `id_histoire` int(11) NOT NULL,
  `nom_histoire` varchar(100) DEFAULT NULL,
  `description_histoire` text,
  `image_histoire` varchar(100) DEFAULT NULL,
  `nb_parties` int(11) DEFAULT '0',
  `nb_victoires` int(11) NOT NULL DEFAULT '0',
  `nb_echecs` int(11) NOT NULL DEFAULT '0',
  `isHidden` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `histoires`
--

INSERT INTO `histoires` (`id_histoire`, `nom_histoire`, `description_histoire`, `image_histoire`, `nb_parties`, `nb_victoires`, `nb_echecs`, `isHidden`) VALUES
(1, 'Désolé pour hier soir', 'Tu es bourré lol  cest tout', 'defonce.jpg', 187, 11, 117, 0),
(2, 'Aventures en terre inconnue', 'Singeries et danger                                      ', 'foret.jpg', 7, 0, 0, 0),
(3, 'Gloubib', 'Blob', '', 7, 0, 0, 0),
(4, 'atchoum', '                        sniff sniff              ', '', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `liens_pages`
--

CREATE TABLE `liens_pages` (
  `id_lien` int(11) NOT NULL,
  `id_page_depart` int(11) DEFAULT NULL,
  `id_page_arrivee` int(11) NOT NULL,
  `id_histoire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `liens_pages`
--

INSERT INTO `liens_pages` (`id_lien`, `id_page_depart`, `id_page_arrivee`, `id_histoire`) VALUES
(1, 1, 2, 1),
(2, 1, 3, 1),
(3, 2, 4, 1),
(4, 2, 5, 1),
(5, 4, 6, 1),
(6, 4, 9, 1),
(7, 4, 8, 1),
(8, 6, 7, 1),
(9, 6, 12, 1),
(12, 8, 7, 1),
(13, 8, 12, 1),
(14, 7, 10, 1),
(15, 7, 11, 1),
(16, 5, 13, 1),
(17, 5, 14, 1),
(18, 13, 6, 1),
(19, 13, 9, 1),
(20, 13, 8, 1),
(21, 15, 16, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id_pages` int(11) NOT NULL,
  `text_page` text,
  `id_histoire` int(11) DEFAULT NULL,
  `desc_courte` text,
  `est_victoire_echec` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 pour echec, 1 pour ni victoire ni defaite, 2 pour victoire',
  `is_first_page` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id_pages`, `text_page`, `id_histoire`, `desc_courte`, `est_victoire_echec`, `is_first_page`) VALUES
(1, 'Peu à peu, le sombre univers qui jusqu\'alors m\'enveloppait laissait place au une faible puis aveuglante lumière. Je suis sur une surface molle, je flotte ? Ma tête me lance. J\'ai mal, et terriblement soif, je pourrais boire quoi, 2 ou 3 verres d\'eau ! J\'entends un chien aboyer et bien que mon être semble plus lourd que mes cours de philo au lycée, je parviens à me relever et distingue peu à peu les contours d\'un trampoline. Le chien continuant d\'aboyer :\r\n', 1, 'Début de l\'histoire.', 1, 1),
(2, 'Je décide d’aboyer aussi, et rapidement, des pas assassins ornés d’affreuses ballerines font trembler le sol, se rapprochant fatalement de moi. Mon rythme cardiaque augmente, j’entends mon cœur battre au niveau de mes tempes, mon pouls se mélange à mon souffle. Le goût métallique du sang rempli ma bouche. Quant à la supposée meurtrière, après de lourdes secondes, elle se met finalement à parler : « Oh je vois que vous utilisez le trampoline de mon fils, on a décidé de le garder avec Marc depuis que… (elle se mit a sangloter) que… François a décidé de partir au Mali en mission humanitaire ». \r\n\r\n', 1, 'Je décide d\'aboyer aussi', 1, 0),
(3, 'Grâce à ma force surhumaine et à ce trou que j’ai pu faire dans le filet du trampoline, je cours aussi vite que mes jambes me le permettent, mais c’est sans compter les séquelles de la soirée d’hier. Ma tête tourne encore, et pas qu’un peu ! Le sentier n’est pas des plus lisse et tel Malthaël (mais en bien moins classe), me voilà déchu, à même le sol. Je ne peux plus avancer, cependant, ce n’est pas le cas du chien. J’entends ses aboiements qui se font de plus en plus fort, jusqu’à ce qu’une vive douleur se fait ressentir sur ma jambe gauche. Le canidé m’a mordu !!! Peut-être que ce n’était pas la meilleure des idées de courir alors qu’un chien m’aboyait dessus…\r\n\r\n', 1, 'Je sors tant bien que mal du trampoline et cours dans le champ situé derrrière moi.', 0, 0),
(4, 'J’acquiesce sans trop comprendre mais quand la lucidité me revint enfin, je finis par lui demander si elle sait comment je suis arrivé là. Ludivine, puisque c’est comme ça qu’elle s’appelle après s’être présentée à moi à la troisième personne, entama une tirade digne des pires dramaturges, sans rebondissements ni péripéties, plus fade encore que des pâtes sans sel, plus insipide qu’un bain sans mousse. A force de « mhmh » et de « je vois » répétés à ce qui se rapproche de l’infini, je sors du trampoline puis j’avance avec Ludi pour me rapprocher de sa salle de bain pour m’y enfermer. Un miroir immense se dresse devant moi, je focalise d’abord mon regard sur :  \r\n						', 1, 'J\'acquiesce sans trop comprendre.', 1, 0),
(5, 'Peu à peu que les mots sortent de ma bouche pour vérifier l’était de santé de François, les traits de visage de la femme se raidissent. La tristesse laissa place à la colère qui fut exprimée à l’aide d’une de ses ballerines assassines qu’elle s’empressa de m’envoyer. Après une esquive douteuse de ma part et des excuses pitoyablement improvisées. Elle sanglota : « Vous êtes un monstre, comment osez vous penser que mon fils est mort ? Déjà que je ne l’ai pas vu depuis des mois… »\r\nJe ne sais pas comment lui répondre, mais peut-être devrais-je réfléchir un peu cette fois ci :\r\n 	', 1, 'Je demande si François est mort', 1, 0),
(6, 'Je remarque après inspection que mes pupilles sont étrangement dilatées. Aussi je me demande ce que j’ai fais hier soir pour atterrir ici, non pas que l’endroit n’est pas confortable, mais plutôt que tout cela manque peut-être un peu de cohérence. Je décide de dégainer mon téléphone pour tenter d’y voir plus clair. Qui donc serait susceptible de plus m’aider ? \r\n', 1, 'Mes yeux', 1, 0),
(7, 'Je décide d’appeler donc Théotime, mon acolyte de soirée. Pas de réponse. Je réessaye, toujours rien, je décide donc de laisser un message dans sa boîte vocale. Évidemment, j’entends son répondeur, et à ma grande surprise se dernier me parut étrangement familier : « Théotime Building, je suis indisponible pour une durée indéterminée, ne rappelez pas je ne répondrai pas avant de mettre la lumière sur les zones d’ombres ». Tout se bouscule dans ma tête, je dois le retrouver. Je sors : \r\n', 1, 'Je compose le numéro de Théotime', 1, 0),
(8, 'Je soulève mon t-shirt et la réalité me rattrape, j’oublie tout le temps que je joue à LoL… Enfin peu importe, je ne me suis pas enfermé ici pour me mater mais plutôt pour savoir sur quelle planète j’ai atterri. « Namek »  me chuchota mon esprit. Après avoir soufflé du nez je décide de sortir mon téléphone pour éclaircir toute cette sombre histoire.	', 1, 'Mon corps d\'athlète', 1, 0),
(9, 'La taille et la couleur de mes vêtements ne correspond pas à ce que j’ai l’habitude de porter, d’autant plus que mon bas et n’est rien d’autre qu’un bermuda. Horrifié je plonge profondément dans mes pensées pour tenter de me rappeler cette maudite soirée, sans succès. Je décidé d’utiliser le joker appel à un ami et je sors mon téléphone brusquement de ma poche si bien qu’il tombe sur le coin de la douche et l’écran si fissure totalement. Au même moment une lettre vient se glisser sous le bas de la porte. Après un juron des plus blasphématoire, je vais chercher la lettre puis l’ouvre :\r\n\r\n		 Avis de décès\r\n     \r\n	         Madame Ludivine ATOIRE \r\n	   Décédée le Lundi 11 février 1986 \r\n		A l’âge de 57 ans \r\n\r\nJe commence à manquer d’air, mon rythme cardiaque s’emporte à nouveau et ma vue retrouve peu à peu le calme sombre dans lequel cette histoire à commencé. Je chois. \r\n	', 1, 'Mes vêtements', 0, 0),
(10, 'Je sors par la porte de la salle de bain par laquelle je suis entré. En sortant de la maison de Ludivine, je me rends compte que ses murs sont remplis de tag en tout genres, et que le jardin est franchement mal entretenu. Des herbes irrégulières et certaines presque menaçantes viennent chatouiller sans mon consentement mes mollets. Au loin je vois un panneau mais ce qu’il y a écrit dessus se trouve de l’autre côté de la rue, et de toute façon je n’aurais pas pu voir d’ici. Je presse un peu le pas, je souhaite la mort à quelques orties pour finalement m’arrêter devant le panneau : « Maison hantée de La Tombe (Commune de Seine-et-Marne) ». Cette maison est extrêmement connue ici, chez moi.  Je commence peu à peu à comprendre ce qu’il se passe, autant avec soulagement qu’avec effroi. Ludivine n’était alors pas réelle ? Un frisson parcours mon corps. Décidément, les soirées avec Théotime devront être plus raisonnable les prochaines fois, quelle idée de finir dans une maison hantée !\r\n', 1, 'Par la porte de la salle de bain', 2, 0),
(11, 'J’ouvre la fenêtre et commence a m’y insérer dedans. Je dois forcer un peu pour passer mon buste, ce dernier frotte d’un coup sur les côtés de la fenêtre et je sens que passer par là était peut être une erreur. Je suis coincé. Coincé coincé coincé, pas moyen de me libérer, je pousse de toutes mes forces mais c’est impossible, d’autant plus que mes bras dans cette position ne sont pas libres de tout mouvement. Je commence a fatiguer et à avoir mal au dessous des côtes. Ma vision se trouble, peut-être n’était-ce pas le meilleur choix… \r\n', 1, 'Par la fenêtre de la salle de bain', 0, 0),
(12, 'Je décide d’appeler ma sœur : « Allô ? \r\n-Oui c’est ton frère, j’suis dans une galère sans nom, je t’expliquerai à la maison, t’as une idée de ce que j’ai pu faire hier soir ? Demandais-je \r\n-Je crois que tu es parti en soirée avec Théotime et d’après ce que tu m’avais dit, t’allais te mettre une grosse caisse. \r\n-Oui nan mais tu me connais, je respecte toujours mes limites, puis je suis relativement lucide même alcoolisé !\r\n-Si tu le dis, enfin rentre vite, on a les partiels à réviser, le projet de comme web, l’ontologie, le projet sur R, le projet MASK et transD ! Dit-elle.\r\n-Mais je sais même pas où je suis !!! Rétorquais-je.\r\n-Ah mais attends je peux regarder sur l’appli de géolocalisation. Euh quoi ? Tu fous dans la maison hantée par le fantôme de Ludivine ? \r\n-Hein ? Mais qu’est-ce que je –\r\n-Allô ? ALLÔ ? »\r\nUne lettre vint se glisser sous le bas de la porte. Je décide de l’ouvrir :\r\n\r\n                           Avis de décès\r\n     \r\n	         Madame Ludivine ATOIRE \r\n	   Décédée le Lundi 11 février 1986 \r\n		A l’âge de 57 ans \r\n\r\nJe commence à manquer d’air, mon rythme cardiaque s’emporte à nouveau et ma vue retrouve peu à peu le calme sombre dans lequel cette histoire à commencé. Je chois. \r\n', 1, 'Je compose le numéro de ma soeur', 0, 0),
(13, 'Lorsque la mère de François entend « Skype », je vois dans ses yeux une lumière s’allumer. J’apprends alors qu’elle a des problèmes de connexion et que c’est ce qui l’empêche de voir son fils. Sur le trajet jusqu’à sa maison, je finis par lui demander si elle sait comment je suis arrivé là. Ludivine, puisque c’est comme ça qu’elle s’appelle après s’être présentée à moi à la troisième personne, entama une tirade digne des pires dramaturges, sans rebondissements ni péripéties, plus fade encore que des pâtes sans sel, plus insipide qu’un bain sans mousse. A force de « mhmh » et de « je vois » répétés à ce qui se rapproche de l’infini, je sors du trampoline puis j’avance avec Ludi pour me rapprocher de sa salle de bain pour m’y enfermer. Un miroir immense se dresse devant moi, je focalise d’abord mon regard sur : \r\n', 1, 'Je lui demande si elle a Skype pour voir son fils en appel', 1, 0),
(14, 'A mesure que je termine mon histoire le visage de la haine se dessine peu à peu devant moi. Cette femme, elle semble… flotter ? Décidemment il faut que je me calme sur les soirées. Elle s’approche de moi, les frissons parcourent mon corps. Il fait froid. Elle traverse le filet du trampoline et se place devant moi. Elle murmure « Vous n’auriez pas dû venir ici, François est vivant ! ». Mon souffle ralenti, tout devient sombre, le calme se présente alors à moi. Peut-être n’était-ce pas le meilleur choix…\r\n', 1, 'Je lui parle de la guerre au Mali et de mon oncle mort en mission', 0, 0),
(15, '  Elles sont vraiment succulentes en même temps', 3, 'J\'adore les macaronis', 1, 1),
(16, ' En fait j\'adore vraiment les coquilettes', 3, 'Et les coquilettes', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `partie_en_cours`
--

CREATE TABLE `partie_en_cours` (
  `id_partie` int(11) NOT NULL,
  `id_histoire` int(11) DEFAULT NULL,
  `nb_pdv` int(11) NOT NULL DEFAULT '3',
  `id_page_arret` int(11) DEFAULT NULL,
  `resume_partie` text,
  `matricule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partie_en_cours`
--

INSERT INTO `partie_en_cours` (`id_partie`, `id_histoire`, `nb_pdv`, `id_page_arret`, `resume_partie`, `matricule`) VALUES
(3, 1, 3, 2, 'Peu à peu, le sombre univers qui jusqu\'alors m\'enveloppait laissait place au une faible puis aveuglante lumière. Je suis sur une surface molle, je flotte ? Ma tête me lance. J\'ai mal, et terriblement soif, je pourrais boire quoi, 2 ou 3 verres d\'eau ! J\'entends un chien aboyer et bien que mon être semble plus lourd que mes cours de philo au lycée, je parviens à me relever et distingue peu à peu les contours d\'un trampoline. Le chien continuant d\'aboyer :\r\n', 3),
(4, 1, 3, 10, 'Peu à peu, le sombre univers qui jusqu\'alors m\'enveloppait laissait place au une faible puis aveuglante lumière. Je suis sur une surface molle, je flotte ? Ma tête me lance. J\'ai mal, et terriblement soif, je pourrais boire quoi, 2 ou 3 verres d\'eau ! J\'entends un chien aboyer et bien que mon être semble plus lourd que mes cours de philo au lycée, je parviens à me relever et distingue peu à peu les contours d\'un trampoline. Le chien continuant d\'aboyer :\r\n', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `matricule` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `mdp_user` varchar(30) NOT NULL,
  `admin_user` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`matricule`, `id_user`, `mdp_user`, `admin_user`) VALUES
(1, 'correcteur ', 'mdp_correcteur_1234', 0),
(2, 'correcteur_admin', 'mdp_correcteur_1234', 1),
(3, 'Croquignoles', 'G@llardon28%!A', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `histoires`
--
ALTER TABLE `histoires`
  ADD PRIMARY KEY (`id_histoire`);

--
-- Indexes for table `liens_pages`
--
ALTER TABLE `liens_pages`
  ADD PRIMARY KEY (`id_lien`),
  ADD KEY `depart` (`id_page_depart`),
  ADD KEY `arrivee` (`id_page_arrivee`),
  ADD KEY `histoire_attachee` (`id_histoire`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id_pages`),
  ADD KEY `histoire<=>page` (`id_histoire`);

--
-- Indexes for table `partie_en_cours`
--
ALTER TABLE `partie_en_cours`
  ADD PRIMARY KEY (`id_partie`),
  ADD KEY `histoire` (`id_histoire`),
  ADD KEY `marque_page` (`id_page_arret`),
  ADD KEY `id_user` (`matricule`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`matricule`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `histoires`
--
ALTER TABLE `histoires`
  MODIFY `id_histoire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `liens_pages`
--
ALTER TABLE `liens_pages`
  MODIFY `id_lien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id_pages` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `partie_en_cours`
--
ALTER TABLE `partie_en_cours`
  MODIFY `id_partie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `matricule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `liens_pages`
--
ALTER TABLE `liens_pages`
  ADD CONSTRAINT `arrivee` FOREIGN KEY (`id_page_arrivee`) REFERENCES `pages` (`id_pages`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `depart` FOREIGN KEY (`id_page_depart`) REFERENCES `pages` (`id_pages`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `histoire_attachee` FOREIGN KEY (`id_histoire`) REFERENCES `histoires` (`id_histoire`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `histoire<=>page` FOREIGN KEY (`id_histoire`) REFERENCES `histoires` (`id_histoire`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `partie_en_cours`
--
ALTER TABLE `partie_en_cours`
  ADD CONSTRAINT `histoire` FOREIGN KEY (`id_histoire`) REFERENCES `histoires` (`id_histoire`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`matricule`) REFERENCES `users` (`matricule`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `marque_page` FOREIGN KEY (`id_page_arret`) REFERENCES `pages` (`id_pages`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
