-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le : jeu. 18 mai 2023 à 17:28
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
-- Base de données : `influencerconnect`
--

-- --------------------------------------------------------

--
-- Structure de la table `demande_suppr`
--

CREATE TABLE `demande_suppr` (
  `id` int(11) NOT NULL,
  `outgoing_id` int(11) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande_suppr`
--

INSERT INTO `demande_suppr` (`id`, `outgoing_id`, `contenu`) VALUES
(4, 752938996, 'supprimer mon compte');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 752938996, 1294469189, 'Hi Rose, would uou like to collaborate with us?'),
(2, 1294469189, 752938996, 'Sure!! I would like to work with you'),
(3, 656855023, 1041419703, 'Hi! we want to collaborate'),
(4, 1041419703, 656855023, 'Of course!! I would love to'),
(5, 1500655450, 1059107167, 'Hello Sasha, would you like a collaboration with us ?'),
(6, 1059107167, 1500655450, 'Oh hi CocaCola !'),
(7, 1059107167, 1500655450, 'Yes, of course I do'),
(8, 230325028, 1347759615, 'Hello Sephora, I looove your make-up '),
(9, 382019826, 1041419703, 'hello'),
(10, 1347759615, 1041419703, 'hi');

-- --------------------------------------------------------

--
-- Structure de la table `partenariat`
--

CREATE TABLE `partenariat` (
  `id` int(11) NOT NULL,
  `marque` text NOT NULL,
  `influenceur` text NOT NULL,
  `terme` text NOT NULL,
  `montant` text NOT NULL,
  `duree` text NOT NULL,
  `datei` date NOT NULL,
  `datef` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `partenariat`
--

INSERT INTO `partenariat` (`id`, `marque`, `influenceur`, `terme`, `montant`, `duree`, `datei`, `datef`) VALUES
(1, 'Red Bull', 'Catherine', '3 stories sur Instagram', '5000dh', '1mois', '2023-05-16', '2023-06-16'),
(2, 'Apple', 'Jack', 'video publicitaire', '9900dh', '6mois', '2023-05-16', '2023-11-16'),
(3, 'CocaCola', 'Sasha', '4 videos sur tiktok', '6500dh', '1mois', '2023-05-14', '2023-06-14');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `type` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `age_chiffre` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `ig_acc` varchar(255) NOT NULL,
  `fb_acc` varchar(255) NOT NULL,
  `tiktok_acc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `type`, `status`, `age_chiffre`, `website`, `ig_acc`, `fb_acc`, `tiktok_acc`) VALUES
(21, 752938996, 'Catherine', 'Rose', 'Crose@gmail.com', '99a48e1f47a81b70908edeb472e7874c', '168418963416840778271683237551WhatsApp Image 2023-05-04 at 14.44.32.jpeg', 'influenceur', 'Hors ligne', '23', '', 'www.instagram.com/User/Rose', 'www.facebook.com/User/Rose', 'www.tiktok.com/User/Rose'),
(22, 656855023, 'Jack', 'Holland', 'JackHolland@gmail.com', '09c92cb9c3cc1987d6d4ea059bebb761', '16841895231683904009WhatsApp Image 2023-05-04 at 14.44.31.jpeg', 'influenceur', 'Hors ligne', '30', '', 'www.instagram.com/User/Jackey', 'www.facebook.com/User/Jackey', 'www.tiktok.com/User/Jackey'),
(23, 540414770, 'Amelia', 'Harper', 'Amelia_Harper@gmail.com', '2483f4a4a5a2ac820c5099818ff3007b', '16841897351683905242WhatsApp Image 2023-05-04 at 14.44.31 (1).jpeg', 'influenceur', 'Hors ligne', '26', '', 'www.instagram.com/User/Amelia', 'www.facebook.com/User/Amelia', 'www.tiktok.com/User/Amelia'),
(25, 1500655450, 'Sasha', 'Sloan', 'Sasha@gmail.com', '7967ba8669ea85a744f2c4339efaca96', '16841899291684104381Capture d’écran 2023-05-14 234559.jpg', 'influenceur', 'Hors ligne', '22', '', 'www.instagram.com/User/Sasha', 'www.facebook.com/User/Jeremiah', 'www.tiktok.com/User/Jeremiah'),
(26, 1347759615, 'Luna', 'Miller', 'Lunaa@gmail.com', 'cf0d7da3a149bf79f24f75b9bc548a46', '16841903401684103933istockphoto-1323990985-612x612.jpg', 'influenceur', 'Hors ligne', '24', '', 'www.instagram.com/User/Luna', 'www.facebook.com/User/Luna', 'www.tiktok.com/User/Luna'),
(27, 382019826, 'Liam', 'Lincoln', 'Liam@gmail.com', '9d8b01cbaa29728ddb5959c32adcf12b', '16841905981684104810Capture d’écran 2023-05-14 235214.jpg', 'influenceur', 'Hors ligne', '24', '', 'www.instagram.com/User/Liam', 'www.facebook.com/User/Liam', 'www.tiktok.com/User/Liam'),
(28, 230325028, 'Sephora', ' ', 'Sephora@gmail.com', '7f0746fc89d8e0f899b48911e7cee9ec', '16841907261683905995Sephora-Symbole.jpg', 'marque', 'Hors ligne', '100000dh', 'www.Sephora.com', 'www.instagram.com/User/Sephora', 'www.facebook.com/User/Sephora', 'www.tiktok.com/User/Sephora'),
(29, 1059107167, 'CocaCola', ' ', 'CocaCola@gmail.com', '12abfb4e81a7c23ce7a923c0e71819fd', '16841908431683905528WhatsApp Image 2023-05-03 at 15.42.22.jpeg', 'marque', 'Hors ligne', '600000dh', 'www.CocaCola.com', 'www.instagram.com/User/CocaCola', 'www.facebook.com/User/CocaCola', 'www.tiktok.com/User/CocaCola'),
(31, 758856514, 'Spotify', ' ', 'Spotify@gmail.com', '6cb75f652a9b52798eb6cf2201057c73', '16841910341684106072Spotify_icon.svg.png', 'marque', 'Hors ligne', '503300dh', 'www.Spotify.com', 'www.instagram.com/User/Spotify', 'www.facebook.com/User/Spotify', 'www.tiktok.com/User/Spotify'),
(32, 931873748, 'Nike', ' ', 'Nike@gmail.com', 'f17ef78286f66f30b94b0e74a4863094', '1684191127168410574010994412-logo-nike-noir-avec-icone-de-conception-de-vetements-nom-abstrait-illustrationle-de-football-avec-fond-blanc-gratuit-vectoriel.jpg', 'marque', 'Hors ligne', '760000dh', 'www.Nike.com', 'www.instagram.com/User/Nike', 'www.facebook.com/User/Nike', 'www.tiktok.com/User/Nike'),
(33, 1041419703, 'Apple', ' ', 'Mac@gmail.com', 'c1a34fffd9f07ff62c4dc757db9dedfb', '168419128816840785541683835276images.png', 'marque', 'Hors ligne', '109000dh', 'www.Mac.com', 'www.instagram.com/User/Mac', 'www.facebook.com/User/Mac', 'www.tiktok.com/User/Mac'),
(34, 1294469189, 'Red Bull', ' ', 'REdBull@gmail.com', '9964af4f96b445da55e048ba0e3f8205', '16841913691683832764download.jpg', 'marque', 'Hors ligne', '259000dh', 'www.Red_Bull.com', 'www.instagram.com/User/RedBull', 'www.facebook.com/User/RedBull', 'www.tiktok.com/User/RedBull'),
(35, 284902098, 'Jeremiah', 'Carter', 'Jeremiah25@gmail.com', '1169f6466a52324458fa6099e93bcbcc', '16841968151683916568WhatsApp Image 2023-05-04 at 14.44.32 (1).jpeg', 'influenceur', 'Hors ligne', '24', '', 'www.instagram.com/User/Jerry', 'www.facebook.com/User/Jerry', 'www.tiktok.com/User/Jerry'),
(36, 954216564, 'Oreo', ' ', 'Oreo@gmail.com', '3efa995124f5f0a5d1c906395c0b48a8', '16841969491684105308Capture d’écran 2023-05-15 000134.jpg', 'marque', 'Hors ligne', '46000dh', 'www.Oreo.com', 'www.instagram.com/User/Oreo', 'www.facebook.com/User/Oreo', 'www.tiktok.com/User/Oreo');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `demande_suppr`
--
ALTER TABLE `demande_suppr`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Index pour la table `partenariat`
--
ALTER TABLE `partenariat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `demande_suppr`
--
ALTER TABLE `demande_suppr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `partenariat`
--
ALTER TABLE `partenariat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
