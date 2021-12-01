-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 25 nov. 2021 à 23:39
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `php_auth_api`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'zarrou chaimae ', 'zarrou.chaimae@gmail.com', '123'),
(6, 'test', 'test@test.test', 'Zrfdse8'),
(8, 'tyutyut', 'dsfdsfds@fgdsfsdf.fgfdg', '$2y$10$6pLFbHYWe7.ibcZ/5kCbf.60lY5aCB/T1O2AqsZh0WAJMm.BXzGjG'),
(9, 'izi KAoutar', 'izi@Kaoutar.com', '$2y$10$5YKfACv6HMnvD3.8bPNp7./BExVVgF6TrwgCkQV4PkjUbtORBNumG'),
(10, 'test', 'test1@test1.com', '$2y$10$6FAFWs62y7zn0nR0xHZ0aOsQ8F6/oR28kRnwqLRJOpdwLwEtSAp2O'),
(11, 'fdfsdfsdf', 'f@ff.ff', '$2y$10$I9QrebyBGFN18ypmW/9Th.0mbLKtUcqgEte/7jSBIwqn.TIs1Lmoa'),
(12, 'dsqdqsd', 'test2@test2.tt', '$2y$10$qjZ4wTB3stsQ0d7U6kMX0.nuJwAlru45MJW1EcrvfGmdBaJkIFqA.'),
(16, 'tyutyut', 'test2@test2.com', '$2y$10$vJwofd1i/w6Vjun3jnmRvueHcYBDDXDjWibaiahpO5W23oa74.or2'),
(17, 'tyutyut', 'test3@test3.tt', '$2y$10$XUqlT6kgDSc6B15bheI..u.R3LZi.J9IXWBoVj7rRfpjkbCuoid12'),
(18, 'test4', 'test4@test4.com', '$2y$10$ZhwIc0/8m4GOe18tVsKIkOachvoU3wNRpwLTjTT0QwGud4C.meU86'),
(21, 'test4', 'test4@gmail.com', '$2y$10$FXDmvofzcHBYDd6qn874cOp43zTq5xZpkkOZTmP0zhIVXJrV48HPi'),
(22, 'tyutyut', 'test4@test.com', '$2y$10$G192NJc1noTmv2jf7Q5pUeWzudT2eTzLQsfjmyuMClPJ94KCOeUd6'),
(24, 'dsqdqsd', 'gtgtr@hhfgh.gfg', '$2y$10$aBpqU8X8Oe1uT2GyyifzMePbje7cbn/rAMN7E6lw1amAE0WHf0Fp.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
