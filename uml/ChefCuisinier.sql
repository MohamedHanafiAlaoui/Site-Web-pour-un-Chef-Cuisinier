-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 22 déc. 2024 à 15:39
-- Version du serveur : 8.0.40-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ChefCuisinier`
--

-- --------------------------------------------------------

--
-- Structure de la table `Menu`
--

CREATE TABLE `Menu` (
  `id` int NOT NULL,
  `NAME` varchar(250) DEFAULT NULL,
  `id_ROLES` int DEFAULT NULL,
  `image_menu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Menu`
--

INSERT INTO `Menu` (`id`, `NAME`, `id_ROLES`, `image_menu`) VALUES
(3, 'food marocaine', 1, 'Cuisine-marocaine-5-recettes-pour-s-y-mettre.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Plats`
--

CREATE TABLE `Plats` (
  `id` int NOT NULL,
  `Name` varchar(250) NOT NULL,
  `description` text,
  `Plats_img` blob,
  `id_Menu` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Plats`
--

INSERT INTO `Plats` (`id`, `Name`, `description`, `Plats_img`, `id_Menu`) VALUES
(11, 'Jared Nieves', 'Omnis tempora molest', '', 3),
(12, 'Jared ,', 'Omnis tempora molest', '', 3);

-- --------------------------------------------------------

--
-- Structure de la table `Reservation`
--

CREATE TABLE `Reservation` (
  `id` int NOT NULL,
  `id_ROLES` int DEFAULT NULL,
  `First_Date` date DEFAULT (curdate()),
  `Time` time NOT NULL,
  `id_menu` int DEFAULT NULL,
  `statut` enum('en attente','approuvée','refusée') DEFAULT 'en attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ROLES`
--

CREATE TABLE `ROLES` (
  `id` int NOT NULL,
  `cin` varchar(10) NOT NULL,
  `TYPE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ROLES`
--

INSERT INTO `ROLES` (`id`, `cin`, `TYPE`) VALUES
(1, 'Er23456', 'admin'),
(2, 'Et123456', 'user'),
(3, 'S23567', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `id` int NOT NULL,
  `FristName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `cin` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `FirstDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Users`
--

INSERT INTO `Users` (`id`, `FristName`, `LastName`, `Password`, `cin`, `Email`, `FirstDate`) VALUES
(1, 'Vitae do reprehender', 'Kim', 'Pa$$w0rd!', 'Er23456', 'wuqo@mailinator.com', '2014-07-03'),
(2, 'Atque et culpa minim', 'Bryan', 'Pa$$w0rd!', 'Et123456', 'vyhopo@mailinator.com', '1971-03-24'),
(3, 'Duis labore corporis', 'Adkins', 'Pa$$w0rd!', 'S23567', 'kuryxegaz@mailinator.com', '1980-02-28');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Menu`
--
ALTER TABLE `Menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ROLES` (`id_ROLES`);

--
-- Index pour la table `Plats`
--
ALTER TABLE `Plats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Menu` (`id_Menu`);

--
-- Index pour la table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_ROLES` (`id_ROLES`);

--
-- Index pour la table `ROLES`
--
ALTER TABLE `ROLES`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cin` (`cin`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cin` (`cin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Menu`
--
ALTER TABLE `Menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `Plats`
--
ALTER TABLE `Plats`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ROLES`
--
ALTER TABLE `ROLES`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Menu`
--
ALTER TABLE `Menu`
  ADD CONSTRAINT `Menu_ibfk_1` FOREIGN KEY (`id_ROLES`) REFERENCES `ROLES` (`id`);

--
-- Contraintes pour la table `Plats`
--
ALTER TABLE `Plats`
  ADD CONSTRAINT `Plats_ibfk_1` FOREIGN KEY (`id_Menu`) REFERENCES `Menu` (`id`);

--
-- Contraintes pour la table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `Reservation_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `Menu` (`id`),
  ADD CONSTRAINT `Reservation_ibfk_2` FOREIGN KEY (`id_ROLES`) REFERENCES `ROLES` (`id`);

--
-- Contraintes pour la table `ROLES`
--
ALTER TABLE `ROLES`
  ADD CONSTRAINT `ROLES_ibfk_1` FOREIGN KEY (`cin`) REFERENCES `Users` (`cin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
