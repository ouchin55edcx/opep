-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 29 nov. 2023 à 17:54
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
-- Base de données : `test1`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `ctg_name` varchar(100) DEFAULT NULL,
  `ctg_img_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `comment_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plante`
--

CREATE TABLE `plante` (
  `id` int(11) NOT NULL,
  `plt_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `categorieID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Client');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstName`, `lastName`, `role_id`) VALUES
(9, 'ouchinmustapha82@gmail.com', '$2y$10$vGEn3lUGZCaCZL1GjsSKWOc9rqApdM/5lLZ9xE3VXhmXfzojxOB6e', 'mustapha', 'ouchen', NULL),
(10, 'uanemaro216@gmail.com', '$2y$10$LJg2iMIiz2Bfe.0/iH6FFuT4zHpalR3N436EOKQVxY.cvlAs.HN5a', 'marouane', 'bouchettoy', NULL),
(12, 'uanemaro2216@gmail.com', '$2y$10$.RxbsxaKg/r5jDp3ys5CN.jtNRlYgmcfa/WluFvjlYJO3D8ZH2NvK', 'marouane', 'bouchettoy', NULL),
(13, 'uanemaro22516@gmail.com', '$2y$10$pq11cgKHO72Hggv9SlYlZ.Wzf.GQHIYjoM/gMy5IwyKXfK57HltUS', 'marouane', 'bouchettoy', 2),
(14, 'laminhamza@gmail.com', '$2y$10$8TzzPQiV.evrIAfaq50/cOelyL5aRXEWM2msbjjYgsbnz/U3W/yTu', 'hamza ', 'lamin', 2),
(15, 'ouchinmustapha@gmail.com', '$2y$10$sAli65nZmNTrloHdMklaleIXZHpGDxKfg5/qqVBBqmNYOegXHLFru', 'ali ', 'baba', 1),
(16, 'ouchinmustapha1@gmail.com', '$2y$10$NeD7NAurXDTTntqEW9hCpeGBrj6FHJB8bzvWACsxSiDSiaXLi5Tw6', 'ali ', 'baba', 1),
(17, 'mohamed@gmail.com', '$2y$10$6j6pol8JWfyJZ8cHnyqYKuxJx1zJXJ83nSv/vA/KBLLCkcgG9/wa6', 'mohamed', 'baba', 2),
(18, 'hjklm@drftgyhuj.oo', '$2y$10$0DN5y/bqt4odn7sFCcEl.OrXc5jczEvGWmCF7isuJPgogKAAcKnLK', 'nn', 'kjh', 1),
(19, 'a@a.a', '$2y$10$9IsaW2FsbgMx1NFyCMziauT5ixa87fWBFyHD26S0UQPcXcRyF0Rvm', 'tesdt', 'ufkj', 1),
(20, 'b@b.b', 'b', 'ed', 'dd', 2),
(21, 'douaa@dou.com', '$2y$10$mwki6aw/cPcZ6OWmi6mcHe7ZdqOVcIX.hTebfcmVRlqI7Zwp9uBki', 'douaaaaaaaaaaaaa', 'chemnane', 2),
(22, 'admin@gmail.com', '$2y$10$gzjIfnnrLBZq6v6mqOfdXu1KcgbuZ2VcXfq.TXyL7hRMgeKI2BJ7y', 'admin', 'mustapha', 1),
(23, 'CSDCD@CSD', '$2y$10$eBujG5SFwzQg8ipaH9maeepORC9v9OxUaIOd.2czp.4YCzX5.NdHy', 'vfsd', 'dsds', 1),
(24, 'ad@ad', '$2y$10$VoZWouxKdL5TkRHYe1qfiumrrrNXTfNtCeYzL4sUMslYXJHlb8mTS', 'ouch', 'fdezr', 1),
(25, 'alibaba@gmail.COM', '$2y$10$P3.4ZajH/Uhw2Uw8a2U60eZuAK6ggPIYZnD33pH9LeAaLVH/5fW0.', 'ali ', 'baba', 2),
(26, 'rokai@gmail.com', '$2y$10$el5zsIIgPfgNSjQpZ9i1U.IB8HZhbKBcrEdH6j6hdy6Q0whqggxA2', 'rokaia ', 'ofkir', 1),
(27, '', '$2y$10$6OG0a89dvAuOCv8hTlVS0O9GkvYaxjd0tHLtx0vQW1ceJF38uhFJC', '', '', NULL),
(33, 'test@testing.com', '$2y$10$44HKhrgpVsnEJdqOG3.tlOEXyVObkap97M5YcJJBG1SMQFDQlj1ES', 'test', 'test', 1),
(35, 'EZQ@EQRFS', '$2y$10$/GE4LNtKtyGKG504bEk2A.DpToAVzaQd094NOCLxG0FZqKvCrf8/y', 'zedz', 'ezcz', 2),
(36, 'amin@amin.com', '$2y$10$MLPI55cyORZWhjwKIRdtFOJ0Sm6f2yYvlqEgk9uvjrsw17FVsUtLW', 'amin', 'amin', 1),
(37, 'dfgvdwxf@fgb', '$2y$10$BSDQE/x9fH//PXVN5/sz5uqrILMKraCnxRw8UCGPMDDE/yv5ACrQC', 'qfsw', 'gdvdwf', 1),
(38, 'yassinehanach@gmail.com', '$2y$10$ZuXzAnqCC0fhxBgVcf6o5.bsfLvw4SYcN4DW1AiPdFzW0aJJwlwXm', 'yassine', 'hanach', 1),
(39, 'a@gmail.com', '$2y$10$xn7lAp2s3ld4LfvES6VAV.jWlEIRiBHDGIzjnZtC/3nIGKq0JySbO', 'test', 'test', 2),
(40, 'test1@gamil.com', '$2y$10$IAkP9hF9af0fM0gr7SX5Tu/YRpSy78V3l2CQAKMloT27gSoClMB8O', 'test', 'test1@gamil.com', 2),
(41, 'bsfgsfg@gmail.com', '$2y$10$T.bmKWYZtPCzmWaxMAR3UuIgui3ZtHR6Qv4oQdEqnEspsA5ttppaO', 'fdd', 'dfbd', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `fk_userId` (`userId`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Index pour la table `plante`
--
ALTER TABLE `plante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorieID` (`categorieID`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `plante`
--
ALTER TABLE `plante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `plante` (`id`),
  ADD CONSTRAINT `fk_userId` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`);

--
-- Contraintes pour la table `plante`
--
ALTER TABLE `plante`
  ADD CONSTRAINT `plante_ibfk_1` FOREIGN KEY (`categorieID`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
