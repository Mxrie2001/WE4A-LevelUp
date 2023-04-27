-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 27 avr. 2023 à 16:47
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `beneduci`
--

-- --------------------------------------------------------

--
-- Structure de la table `catégories`
--

CREATE TABLE `catégories` (
  `id` int(11) NOT NULL,
  `nom_theme` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `catégories`
--

INSERT INTO `catégories` (`id`, `nom_theme`) VALUES
(1, 'histoire'),
(2, 'personnages'),
(3, 'jeux'),
(4, 'tips'),
(5, 'film'),
(6, 'nouveautés');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `comment_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_user`, `id_post`, `comment_content`) VALUES
(1, 1, 1, 'Allez allez, on se dépeche !!'),
(4, 1, 2, 'Moi aussi  c\'est Yoshi!!!'),
(5, 1, 3, 'merci !!!'),
(6, 2, 2, 'Yoshii c\'est vraiment le meilleur ^^ je viens de créer mon personnage en mode yoshii :))'),
(7, 1, 5, 'yeeeah !!!'),
(10, 1, 6, 'elle est belle'),
(11, 1, 5, 'test'),
(12, 10, 7, 'non mais le mec s\'est autolike quoi'),
(13, 1, 7, 'woah trop classe la photo.. domage qu\'elle ne soit pas dans le theme x)'),
(14, 10, 7, 'apprends à écrire d\'abord **dommage**'),
(16, 1, 8, 'oh il y a krapix!!!'),
(18, 14, 9, 'Trop bien ce jeu');

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id`, `pseudo`, `content`) VALUES
(1, 'Anonymous', 'premier message :)'),
(2, 'Mxrie', 'deuxieme ;)'),
(3, 'Anonymous', '3 eme (julien)'),
(6, 'Mystere', 'yo'),
(7, 'Anonymous', 'Ok'),
(8, 'Mxrie', 'ok'),
(9, 'Anonymous', 'Test tel'),
(10, 'Anonymous', 'yo'),
(11, 'Mxrie', 'Hello'),
(12, 'Anonymous', 'Coucou'),
(13, 'Anonymous', 'Yo'),
(14, 'Julien ', 'Test'),
(15, 'Anonymous', 'Test');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `id_user`, `id_post`) VALUES
(1, 1, 1),
(6, 2, 1),
(7, 3, 1),
(8, 1, 2),
(9, 2, 2),
(11, 2, 3),
(17, 2, 5),
(19, 1, 3),
(20, 1, 6),
(21, 10, 7),
(23, 12, 2),
(24, 12, 8),
(25, 12, 1),
(26, 1, 8),
(27, 1, 7),
(28, 13, 9),
(29, 14, 9),
(30, 14, 7),
(31, 14, 10),
(32, 1, 11);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `publication_date` datetime NOT NULL,
  `nb_likes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `id_cat`, `title`, `img`, `content`, `publication_date`, `nb_likes`) VALUES
(1, 1, 1, 'Premier post !!!', './assets/img/posts/998eecb96611f76db45e03ef3e351f17.jpg', ' A vous de remplir ma BDD mtn! Je compte sur vous ;)', '2023-03-17 08:26:12', 4),
(2, 3, 2, 'Ton perso préféré ???', './assets/img/posts/d0182eb3d2f496047514daaa3b0589d7.jpg', 'Quel est le personnage que tu utilises quand tu joues ? Moi c\'est toujours Yoshi 😉', '2023-03-18 11:33:27', 6),
(3, 4, 1, 'Bonjour à tous', './assets/img/posts/hi-anime-hello.gif', ' Bonjour à tous ! Ce site est super !! Beau travail !', '2023-03-19 02:02:20', 2),
(5, 2, 1, 'Ajout de Yoshii', './assets/img/posts/tenor-650022013 (1).gif', ' Je suis trop content, yoshii vient d\'être ajouté :))', '2023-03-19 09:22:50', 4),
(6, 8, 2, 'Browsette', './assets/img/posts/950231.png', ' Version féminine de l\'antagoniste de Mario', '2023-03-29 10:02:23', 1),
(7, 10, 5, 'film qui bombarde', './assets/img/posts/Monster.png', 'J\'ai vu le dernier film qui est tout simplement incroyable. Par contre 10 euros la place. Je recommande ce film qui m\'a fait retourner en enfance dans mes plus beaux souvenirs. Tout d\'abord sur ma DS, puis sur ma console WII pour enfin finir sur une nintendo switch. J\'ai déjà hâte de jouer au nouveau mario qui va sortir pour l\'occasion du film', '2023-04-12 07:00:00', 3),
(8, 12, 6, '(ಥ⌣ಥ)', './assets/img/posts/Krapix.png', ' Aucun post pour le moment (ಥ⌣ಥ)', '2023-04-13 05:18:50', 2),
(9, 13, 3, 'Minecraft c\'est cool', './assets/img/posts/decouvrez-ce-que-recele-la-surface-du-monde-de-minecraft-legends-627x376.jpg', ' vive minecraft', '2023-04-19 06:55:00', 4),
(10, 14, 3, 'Rocket League', './assets/img/posts/q83tcwb7har0kh5h (1).jpg', ' Je passe pas mal de temps sur ce jeu', '2023-04-20 09:43:23', 2),
(11, 15, 3, 'Zelda TotK', './assets/img/posts/image_2023-04-26_171715803.png', ' Une dinguerie !!', '2023-04-26 03:17:51', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `perso` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `perso`, `color`) VALUES
(1, 'Mxrie', 'ma.beneduci@orange.fr', '$2y$10$DpZoI3ceEueYfLK0jEUbW./T4fnkqAjOVDGdwOZkVOutiu1PbbdXy', 'roi-boo.png', 'purple'),
(2, 'chadow4', 'chadow.video@gmail.com', '$2y$10$H4WF2KooFLAjL69c7mhJJeTt4QszGvmFjUrV9SohzlS1aZDcGwhwa', 'yoshi.png', 'red'),
(3, 'QueenR', 'rak.bernardi@gmail.com', '$2y$10$2R5GVZsDu4HAcdzPaAv3CeXc.Z7sisgAKUsb9pdQ7Ktj6910Ln7MC', 'skelerex.png', 'blue'),
(4, 'Sk8Zen', 'marius@mail.com', '$2y$10$Uscyg51edzaNTyGdcmnxXu/gCsbKdqOkUExf1w5qkzSNBj4BAwAzi', 'fantomeB.png', 'blue'),
(5, 'Zelda 90', 'zebonzebon39@gmail.com', '$2y$10$dxj08s6ryvizoP8kxtbLr.KPMKm3fBJmuTPxwDB.KIxZk96QzWCsG', 'mario.png', 'red'),
(6, 'DC90', 'david.chevenement@gmail.com', '$2y$10$ZBtACYTIzDxf5YlKOzKFyOz20ZSM69KOmnwNBnATYiIp81evkCw8C', 'yoshi.png', 'blue'),
(7, 'julien21', 'julien.sanchez74@orange.fr', '$2y$10$v3ca6w1w/dFW.LSmWr4u4uJwx/weIuU6gg8BVTiTTDFBaoeL/tBE6', 'fantomeB.png', 'red'),
(8, 'SweetHoney25', 'celia@gmail.com', '$2y$10$Yl1vXawYapnjQL6f7lqhm.3FzTp5Dtqr2M5vaxW9t7csWKgSg73/C', 'peach.png', 'green'),
(9, 'maxime', 'maximelebg@gmail.com', '$2y$10$IPqivVjvdU6b.pMgidmpXOIgRl6eKdiF3lxKtwiHlgIRpq8crD1Om', 'fantomeB.png', 'red'),
(10, 'eminem', 'eminem@free.fr', '$2y$10$lwn9YFiXDBYtbkv2Wzp6L.usx3Eqq7yAsdDuDERhe2dd4VUx0.tyu', 'skelerex.png', 'red'),
(11, 'Etoiles', 'nicolasder76@orange.com', '$2y$10$pO7vy5swriLcN/bgPRZOK.GT/mzv6TG4CfEDBRt8ccYiip6ZmchL.', 'luigi.png', 'green'),
(12, 'Etoiles', 'nicolasder76@orange.fr', '$2y$10$Jooo0Jofv0cXOhxcmtLYTuSk/4h938u92wgZS9WePmor7Y4OaOfD6', 'luigi.png', 'green'),
(13, 'Julien ', 'mystere@gmail.com', '$2y$10$/90VEXnhSe8/vllKkvu90.r9XU1aEsePk3fCCOczj.rhHdwyxnDPW', 'fantomeB.png', 'red'),
(14, 'Victrolles', 'vi.goudal@gmail.com', '$2y$10$/khJwDL/pQo4iQOzqyop9uKWRLcJaqBPFV1lcLfAHxvgm.G2jZ4y.', 'mario.png', 'blue'),
(15, 'Nono', 'coucou@wow.fr', '$2y$10$7RyMMP2Gy0jJti.ue9mlM.pJQICtlaG5Vw5uIfSv2ZxFE8L4NdL3W', 'yoshi.png', 'purple'),
(16, 'test', 'test@orange.fr', '$2y$10$nJuuB.RUGxPafg7YYaAqA.N8pJAge3WIQX7/WG3FPX.xoE2122K36', 'peach.png', 'purple');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `catégories`
--
ALTER TABLE `catégories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_user` (`id_user`),
  ADD KEY `fk_id_post` (`id_post`);

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `fk_postid` (`id_post`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idUser` (`id_user`),
  ADD KEY `fk_idCat` (`id_cat`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `catégories`
--
ALTER TABLE `catégories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `fk_id_post` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_postid` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userid` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_idCat` FOREIGN KEY (`id_cat`) REFERENCES `catégories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idUser` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
