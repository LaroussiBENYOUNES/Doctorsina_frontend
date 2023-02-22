-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 29 mai 2021 à 16:40
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `doctorsinadmi`
--

-- --------------------------------------------------------

--
-- Structure de la table `appoitement`
--

CREATE TABLE `appoitement` (
  `id` int(10) UNSIGNED NOT NULL,
  `medicalstructure_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `appoitement`
--

INSERT INTO `appoitement` (`id`, `medicalstructure_id`, `patient_id`, `doctor_id`, `date`, `time`, `confirmed`, `created_at`, `updated_at`, `deleted_at`) VALUES
(131, 20, 2, 1, '2021-05-28', '8:30', 1, '2021-05-27 20:28:33', '2021-05-27 20:29:09', NULL),
(132, 25, 2, 1, '2021-05-29', '8:30', 1, '2021-05-28 14:39:10', '2021-05-28 14:39:52', NULL),
(133, 26, 2, 2, '2021-05-29', '10:00', 1, '2021-05-28 14:54:29', '2021-05-28 14:55:13', NULL),
(136, 27, 2, 1, '2021-05-30', '8:30', 1, '2021-05-29 12:21:06', '2021-05-29 12:24:13', '2021-05-29 12:24:13'),
(137, 27, 5, 1, '2021-05-30', '10:00', 1, '2021-05-29 12:22:14', NULL, NULL),
(138, 27, 2, 1, '2021-05-30', '14:30', 1, '2021-05-29 12:25:09', '2021-05-29 12:33:06', NULL),
(139, 27, 2, 2, '2021-05-30', '8:30', 1, '2021-05-29 12:27:04', NULL, NULL),
(140, 27, 2, 2, '2021-05-30', '10:00', 1, '2021-05-29 12:27:23', NULL, NULL),
(141, 27, 2, 1, '2021-05-30', '11:30', 1, '2021-05-29 12:27:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `branch`
--

CREATE TABLE `branch` (
  `id` int(10) UNSIGNED NOT NULL,
  `git` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `branch`
--

INSERT INTO `branch` (`id`, `git`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'newgit', '2021-05-21 09:55:18', '2021-05-21 09:55:18', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `building`
--

CREATE TABLE `building` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_id` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `building`
--

INSERT INTO `building` (`id`, `site_id`, `label`, `alias`, `description`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'ryehi clinic tunisia - building 1', 'rctb1', 'rctb1 is ..', 1, '2021-05-26 12:37:19', '2021-05-26 12:49:39', NULL),
(2, 4, 'b sc 2', '', '', 1, '2021-05-29 11:30:30', '2021-05-29 11:30:30', NULL),
(3, 6, 'bbbbbbbbbbb', '', '', 1, '2021-05-29 11:42:40', '2021-05-29 11:42:40', NULL),
(4, 7, 'bulding 1', '', '', 1, '2021-05-29 12:14:32', '2021-05-29 12:14:32', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `certificate`
--

CREATE TABLE `certificate` (
  `id` int(10) UNSIGNED NOT NULL,
  `consultation_id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `certificate`
--

INSERT INTO `certificate` (`id`, `consultation_id`, `description`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 31, 'afoulhajefoihalfiohalf', 1, '2021-05-29 09:18:13', '2021-05-29 09:18:13', NULL),
(3, 29, 'qdgfsgsgzrg', 1, '2021-05-29 09:18:50', '2021-05-29 09:18:50', NULL),
(4, 32, 'description certificat', 1, '2021-05-29 12:37:25', '2021-05-29 12:37:25', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE `consultation` (
  `id` int(10) UNSIGNED NOT NULL,
  `appoitement_id` int(11) NOT NULL,
  `report_id` int(11) UNSIGNED DEFAULT NULL,
  `visitnature_id` int(10) UNSIGNED NOT NULL,
  `visitstatus_id` int(10) UNSIGNED NOT NULL,
  `visittype_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `consultation`
--

INSERT INTO `consultation` (`id`, `appoitement_id`, `report_id`, `visitnature_id`, `visitstatus_id`, `visittype_id`, `date`, `time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(28, 117, 1, 1, 1, 1, '2021-05-16', '8:30', '2021-05-25 08:10:46', NULL, NULL),
(29, 131, 1, 1, 2, 1, '2021-05-28', '8:30', '2021-05-27 20:29:33', NULL, NULL),
(30, 132, 1, 1, 1, 1, '2021-05-29', '8:30', '2021-05-28 14:41:05', NULL, NULL),
(31, 133, 1, 2, 1, 2, '2021-05-29', '10:00', '2021-05-28 14:55:52', NULL, NULL),
(32, 141, NULL, 1, 2, 1, '2021-05-30', '11:30', '2021-05-29 12:34:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE `country` (
  `id` int(10) UNSIGNED NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zone_id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `country`
--

INSERT INTO `country` (`id`, `alias`, `zone_id`, `description`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tunisia', 1, 'La Tunisie est un pays d\'Afrique du Nord situé sur la côte méditerranéenne et en bordure du désert du Sahara. Le musée national du Bardo à Tunis, la capitale, expose des pièces archéologiques allant des mosaïques romaines à l\'art islamique. Le quartier de la Médina, avec son souk animé, encercle l\'imposante mosquée Zitouna. À l\'est, sur le site de l\'ancienne cité de Carthage, se trouvent les thermes d\'Antonin et d\'autres ruines, et le musée national de Carthage et ses nombreux objets.', 1, '2021-05-02 21:22:19', '2021-05-02 21:22:19', NULL),
(2, 'Bresil', 2, 'Le Brésil, vaste pays d\'Amérique du Sud, s\'étend du bassin amazonien au nord à des vignobles et aux chutes d\'Iguaçu au sud. La ville de Rio de Janeiro, caractérisée par sa statue du Christ Rédempteur de 38 mètres de haut située au sommet du Corcovado, est réputée pour ses plages très fréquentées de Copacabana et d\'Ipanema, ainsi que pour son énorme carnaval animé, avec défilés de chars, costumes flamboyants, et musique et danse samba.', 1, '2021-05-02 21:23:31', '2021-05-02 21:23:31', NULL),
(3, 'algeria', 1, 'algeria is', 1, '2021-05-05 13:11:08', '2021-05-05 13:11:08', NULL),
(4, 'new country', 3, 'new country is', 1, '2021-05-06 18:44:56', '2021-05-27 08:59:21', '2021-05-27 08:59:21'),
(5, 'kk', 1, 'k', 1, '2021-05-18 17:02:48', '2021-05-27 08:59:13', '2021-05-27 08:59:13'),
(6, 'country 123', 2, 'country 123 is a ...', 1, '2021-05-27 08:52:38', '2021-05-27 08:59:13', '2021-05-27 08:59:13');

-- --------------------------------------------------------

--
-- Structure de la table `detailsprescription`
--

CREATE TABLE `detailsprescription` (
  `id` int(10) UNSIGNED NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL,
  `dose` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `detailsprescription`
--

INSERT INTO `detailsprescription` (`id`, `prescription_id`, `drug_id`, `dose`, `duration`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, '1', '1', NULL, NULL, NULL),
(2, 3, 2, '1', '1', NULL, NULL, NULL),
(3, 4, 3, '1', '1', NULL, NULL, NULL),
(4, 4, 2, '1', '1', NULL, NULL, NULL),
(5, 6, 1, '1', '1', '2021-05-21 18:50:02', NULL, NULL),
(6, 6, 2, '2', '2', '2021-05-21 18:50:02', NULL, NULL),
(7, 6, 3, '3', '3', '2021-05-21 18:50:02', NULL, NULL),
(8, 7, 1, '5', '6', '2021-05-21 18:53:00', '2021-05-21 21:01:29', '2021-05-21 21:01:29'),
(9, 7, 2, '7', '8', '2021-05-21 18:53:00', '2021-05-21 21:01:29', '2021-05-21 21:01:29'),
(17, 7, 1, '5', '6', '2021-05-21 21:01:29', '2021-05-21 21:01:50', '2021-05-21 21:01:50'),
(18, 7, 2, '7', '8', '2021-05-21 21:01:29', '2021-05-21 21:01:50', '2021-05-21 21:01:50'),
(19, 7, 3, '14', '14', '2021-05-21 21:01:29', '2021-05-21 21:01:50', '2021-05-21 21:01:50'),
(20, 7, 1, '5', '6', '2021-05-21 21:02:10', '2021-05-21 21:02:37', '2021-05-21 21:02:37'),
(21, 7, 1, '5', '6', '2021-05-21 21:02:37', '2021-05-21 21:02:51', '2021-05-21 21:02:51'),
(22, 7, 1, '5', '6', '2021-05-21 21:02:51', '2021-05-21 21:04:50', '2021-05-21 21:04:50'),
(23, 7, 1, '5', '6', '2021-05-21 21:05:26', '2021-05-21 21:05:45', '2021-05-21 21:05:45'),
(24, 7, 2, '15', '15', '2021-05-21 21:05:26', '2021-05-21 21:05:45', '2021-05-21 21:05:45'),
(25, 7, 1, '5', '6', '2021-05-21 21:05:45', '2021-05-21 21:06:12', '2021-05-21 21:06:12'),
(26, 7, 1, '5', '6', '2021-05-21 21:06:12', '2021-05-21 21:06:12', NULL),
(27, 7, 2, '10', '10', '2021-05-21 21:06:13', '2021-05-21 21:06:13', NULL),
(28, 7, 3, '11', '11', '2021-05-21 21:06:13', '2021-05-21 21:06:13', NULL),
(29, 8, 1, '5', '5', '2021-05-22 12:13:25', NULL, NULL),
(30, 9, 1, '2', '5', '2021-05-29 10:49:32', NULL, NULL),
(31, 10, 1, '2', '5', '2021-05-29 12:39:18', NULL, NULL),
(32, 10, 2, '2', '7', '2021-05-29 12:39:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `speciality_id` int(11) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codecnam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matricule` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `with_administrator_option` int(11) NOT NULL,
  `activated` tinyint(4) DEFAULT 1,
  `signaled` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctor`
--

INSERT INTO `doctor` (`id`, `fullname`, `user_id`, `country_id`, `speciality_id`, `birthday`, `gender`, `codecnam`, `matricule`, `with_administrator_option`, `activated`, `signaled`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dali ben ameur', 3, 1, 1, '2021-05-12', 'Male', '123', '456', 0, 1, 0, NULL, NULL, NULL),
(2, 'jack toubib jack', 6, 2, 1, '2021-05-19', 'Male', '44', '555', 0, 1, 0, '2021-05-18 00:04:50', NULL, NULL),
(3, 'aziz@patient.comvvv1', 32, 1, 1, '2021-05-14', 'Male', '32', '32', 1, 1, 0, '2021-05-14 11:03:26', NULL, NULL),
(4, 'aziztoubib@gmail.com', 39, 1, 1, '2021-05-16', 'Male', '39', '39', 1, 1, 0, '2021-05-16 19:31:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `drug`
--

CREATE TABLE `drug` (
  `id` int(10) UNSIGNED NOT NULL,
  `drugfamilly_id` int(11) NOT NULL,
  `drugmaker_id` int(11) NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `drug`
--

INSERT INTO `drug` (`id`, `drugfamilly_id`, `drugmaker_id`, `alias`, `description`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'drug 1', 'drug 1 is ..', 1, '2021-05-21 16:32:59', '2021-05-21 16:32:59', NULL),
(2, 1, 2, 'drug 2', 'drug 2 is ..', 1, '2021-05-21 16:55:15', '2021-05-21 16:55:15', NULL),
(3, 3, 3, 'drug 3 ', 'drug 3 is ...', 1, '2021-05-21 16:55:31', '2021-05-21 16:55:31', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `drugfamilly`
--

CREATE TABLE `drugfamilly` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `drugfamilly`
--

INSERT INTO `drugfamilly` (`id`, `name`, `alias`, `description`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'drug familly 1', 'df1', 'df1 is ...', 1, '2021-05-21 16:23:15', '2021-05-21 16:23:15', NULL),
(2, 'drug familly 2', 'df2', 'df2 is ...', 1, '2021-05-21 16:53:38', '2021-05-21 16:53:38', NULL),
(3, 'drug familly 3', 'df3', 'df3 is ....', 1, '2021-05-21 16:53:57', '2021-05-21 16:53:57', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `drugmaker`
--

CREATE TABLE `drugmaker` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `drugmaker`
--

INSERT INTO `drugmaker` (`id`, `name`, `alias`, `description`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'drug maker1', 'dm1', 'dm1', 1, '2021-05-21 16:28:42', '2021-05-21 16:28:42', NULL),
(2, 'drug maker 2', 'dm 2', 'dm 2 is ....', 1, '2021-05-21 16:54:21', '2021-05-21 16:54:21', NULL),
(3, 'drug maker 3', 'dm3 ', 'dm3 is ...', 1, '2021-05-21 16:54:39', '2021-05-21 16:54:39', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `generalexam`
--

CREATE TABLE `generalexam` (
  `id` int(10) UNSIGNED NOT NULL,
  `weight` decimal(15,2) DEFAULT NULL,
  `size` decimal(15,2) DEFAULT NULL,
  `fever` decimal(15,2) DEFAULT NULL,
  `consultation_id` int(11) NOT NULL,
  `speciality_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `generalexam`
--

INSERT INTO `generalexam` (`id`, `weight`, `size`, `fever`, `consultation_id`, `speciality_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, '12.60', '1.70', '37.00', 14, 1, '2021-05-15 15:09:11', '2021-05-15 15:09:24', NULL),
(12, '70.00', '1.80', '37.00', 30, 1, '2021-05-28 14:41:49', '2021-05-29 08:42:59', NULL),
(13, '70.00', '1.80', '37.00', 31, 1, '2021-05-28 14:56:27', '2021-05-29 08:42:31', NULL),
(14, '37.00', '1.80', '37.00', 32, 1, '2021-05-29 12:34:51', '2021-05-29 12:34:51', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `general_log`
--

CREATE TABLE `general_log` (
  `event_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_host` mediumtext NOT NULL,
  `thread_id` bigint(21) UNSIGNED NOT NULL,
  `server_id` int(10) UNSIGNED NOT NULL,
  `command_type` varchar(64) NOT NULL,
  `argument` mediumtext NOT NULL
) ENGINE=CSV DEFAULT CHARSET=utf8 COMMENT='General log';

-- --------------------------------------------------------

--
-- Structure de la table `medicalstaff`
--

CREATE TABLE `medicalstaff` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `medicalstructure_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `medicalstaff`
--

INSERT INTO `medicalstaff` (`id`, `user_id`, `medicalstructure_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, '2021-05-10 14:31:12', NULL, NULL),
(2, 6, 1, '2021-05-14 17:36:31', '2021-05-14 16:20:51', NULL),
(4, 35, 1, '2021-05-14 16:53:24', NULL, NULL),
(10, 35, 20, '2021-05-15 04:30:10', '2021-05-14 16:38:31', NULL),
(11, 6, 20, '2021-05-14 21:05:00', '2021-05-14 20:01:05', NULL),
(12, 3, 20, '2021-05-15 04:01:00', '2021-05-15 04:01:00', NULL),
(13, 37, 22, '2021-05-15 14:23:36', NULL, NULL),
(14, 3, 22, '2021-05-15 13:25:52', '2021-05-15 13:25:52', NULL),
(15, 6, 22, '2021-05-15 13:26:27', '2021-05-27 17:26:35', '2021-05-27 17:26:35'),
(16, 37, 23, NULL, NULL, NULL),
(17, 37, 24, NULL, NULL, NULL),
(18, 9, 22, '2021-05-27 18:56:02', '2021-05-27 18:56:02', NULL),
(19, 40, 25, NULL, NULL, NULL),
(20, 3, 25, '2021-05-28 14:37:17', '2021-05-28 14:37:17', NULL),
(21, 41, 26, NULL, NULL, NULL),
(22, 6, 26, '2021-05-28 14:53:30', '2021-05-28 14:53:30', NULL),
(23, 6, 25, '2021-05-29 11:11:25', '2021-05-29 11:11:25', NULL),
(24, 42, 27, NULL, NULL, NULL),
(25, 3, 27, '2021-05-29 12:15:37', '2021-05-29 12:15:37', NULL),
(26, 6, 27, '2021-05-29 12:16:10', '2021-05-29 12:16:10', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `medicalstructure`
--

CREATE TABLE `medicalstructure` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `structuretype_id` int(11) NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `signaled` tinyint(4) DEFAULT 0,
  `activated` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `medicalstructure`
--

INSERT INTO `medicalstructure` (`id`, `label`, `alias`, `description`, `structuretype_id`, `country_id`, `signaled`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hôpital Charles-Nicolle', 'HCN', 'L\'hôpital Charles-Nicolle (arabe : مستشفى شارل نيكول) est un établissement de santé publique situé sur le boulevard du 9-Avril 1938 dans le quartier de Bab Saadoun à Tunis. Il assure des soins et des services dans les différentes spécialités médicales.', 1, 1, 0, 1, '2021-05-02 10:51:27', '2021-05-02 10:53:09', NULL),
(2, 'medical structure 1', ';,', '', 1, 1, 0, 1, '2021-05-02 19:44:43', '2021-05-27 09:29:36', '2021-05-27 09:29:36'),
(3, 'clinique saint augustin', 'csa', 'csa', 1, 2, 0, 1, '2021-05-04 15:52:56', '2021-05-04 15:52:56', NULL),
(4, 'salah clinic', 'sc', 'sc is ...', 1, 1, 0, 1, '2021-05-14 12:19:51', '2021-05-14 12:19:51', NULL),
(20, 'majid clinic', 'mc mc ', 'mc is ...', 2, 1, 0, 1, '2021-05-14 14:54:37', '2021-05-14 16:30:20', NULL),
(22, 'ryehi clinin', 'rc', 'rc is a ....', 2, 1, 0, 0, '2021-05-15 14:23:36', '2021-05-15 14:23:54', NULL),
(23, 'aaazzzz', '', '', 1, 2, 0, 0, '2021-05-27 10:46:51', '2021-05-27 10:46:51', NULL),
(24, 'eeee', 'o^,m', 'pkn:omk,', 1, 1, 0, 1, '2021-05-27 10:48:39', '2021-05-27 11:01:12', NULL),
(25, 'salah clinic 1', 'sc', 'sc is ....', 2, 1, 0, 1, '2021-05-28 14:36:55', '2021-05-28 14:36:55', NULL),
(26, 'montassar clinic', 'mc', 'mc is ...', 2, 1, 0, 1, '2021-05-28 14:53:05', '2021-05-28 14:53:05', NULL),
(27, 'mourad clinic', 'mc', 'mc is ..', 2, 1, 0, 1, '2021-05-29 12:12:34', '2021-05-29 12:12:34', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `medicalstructurespeciality`
--

CREATE TABLE `medicalstructurespeciality` (
  `id` int(10) UNSIGNED NOT NULL,
  `speciality_id` int(11) NOT NULL,
  `medicalstructure_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `medicalstructurespeciality`
--

INSERT INTO `medicalstructurespeciality` (`id`, `speciality_id`, `medicalstructure_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, '2021-05-02 11:03:45', '2021-05-02 11:03:45', NULL),
(2, 1, 1, '2021-05-02 11:04:03', '2021-05-02 11:04:03', NULL),
(3, 3, 1, '2021-05-02 19:55:55', '2021-05-02 19:55:55', NULL),
(4, 1, 9, '2021-05-02 19:58:22', '2021-05-02 19:58:22', NULL),
(5, 3, 9, '2021-05-02 19:58:22', '2021-05-02 19:58:22', NULL),
(6, 2, 9, '2021-05-02 19:58:22', '2021-05-02 19:58:22', NULL),
(7, 1, 10, '2021-05-04 15:52:56', '2021-05-04 15:52:56', NULL),
(8, 2, 10, '2021-05-04 15:52:56', '2021-05-04 15:52:56', NULL),
(9, 1, 11, '2021-05-05 13:25:54', '2021-05-05 13:25:54', NULL),
(10, 2, 11, '2021-05-05 13:25:54', '2021-05-05 13:25:54', NULL),
(11, 2, 12, '2021-05-06 18:08:37', '2021-05-06 18:08:37', NULL),
(12, 3, 12, '2021-05-06 18:08:37', '2021-05-06 18:08:37', NULL),
(13, 1, 13, '2021-05-06 18:11:16', '2021-05-06 18:11:16', NULL),
(14, 3, 13, '2021-05-06 18:11:16', '2021-05-06 18:11:16', NULL),
(15, 2, 14, '2021-05-06 18:41:00', '2021-05-06 18:41:00', NULL),
(16, 3, 14, '2021-05-06 18:41:01', '2021-05-06 18:41:01', NULL),
(17, 2, 15, '2021-05-06 20:22:47', '2021-05-06 20:22:47', NULL),
(18, 3, 15, '2021-05-06 20:22:47', '2021-05-06 20:22:47', NULL),
(19, 2, 16, '2021-05-14 12:12:44', '2021-05-14 12:12:44', NULL),
(20, 1, 17, '2021-05-14 12:16:57', '2021-05-14 16:16:57', '2021-05-14 16:16:57'),
(21, 1, 18, '2021-05-14 12:19:51', '2021-05-14 12:19:51', NULL),
(22, 1, 19, '2021-05-14 14:51:25', '2021-05-14 14:51:25', NULL),
(23, 2, 19, '2021-05-14 14:51:25', '2021-05-14 14:51:25', NULL),
(24, 1, 20, '2021-05-14 14:54:38', '2021-05-14 16:28:27', '2021-05-14 16:28:27'),
(25, 2, 20, '2021-05-14 14:54:38', '2021-05-14 16:28:27', '2021-05-14 16:28:27'),
(29, 1, 20, '2021-05-14 16:30:20', '2021-05-14 16:30:40', '2021-05-14 16:30:40'),
(30, 2, 20, '2021-05-14 16:30:20', '2021-05-14 16:30:40', '2021-05-14 16:30:40'),
(31, 3, 20, '2021-05-14 16:30:20', '2021-05-14 16:30:40', '2021-05-14 16:30:40'),
(32, 1, 20, '2021-05-14 16:30:40', '2021-05-14 16:30:40', NULL),
(33, 3, 20, '2021-05-14 16:30:40', '2021-05-14 16:30:40', NULL),
(34, 1, 22, '2021-05-15 14:23:36', '2021-05-15 14:23:54', '2021-05-15 14:23:54'),
(35, 2, 22, '2021-05-15 14:23:36', '2021-05-15 14:23:54', '2021-05-15 14:23:54'),
(36, 1, 22, '2021-05-15 14:23:54', '2021-05-15 14:24:04', '2021-05-15 14:24:04'),
(37, 2, 22, '2021-05-15 14:23:54', '2021-05-15 14:24:04', '2021-05-15 14:24:04'),
(38, 1, 22, '2021-05-15 14:24:04', '2021-05-15 14:24:04', NULL),
(39, 2, 22, '2021-05-15 14:24:04', '2021-05-15 14:24:04', NULL),
(40, 3, 22, '2021-05-15 14:24:04', '2021-05-15 14:24:04', NULL),
(41, 2, 25, '2021-05-28 14:36:55', '2021-05-28 14:36:55', NULL),
(42, 1, 25, '2021-05-28 14:36:55', '2021-05-28 14:36:55', NULL),
(43, 1, 26, '2021-05-28 14:53:05', '2021-05-28 14:53:05', NULL),
(44, 2, 26, '2021-05-28 14:53:05', '2021-05-28 14:53:05', NULL),
(45, 1, 27, '2021-05-29 12:12:35', '2021-05-29 12:12:35', NULL),
(46, 2, 27, '2021-05-29 12:12:35', '2021-05-29 12:12:35', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `medicastructureoffer`
--

CREATE TABLE `medicastructureoffer` (
  `id` int(10) UNSIGNED NOT NULL,
  `medicalstructure_id` int(11) NOT NULL,
  `offertype_id` int(11) NOT NULL,
  `begginningdate` date NOT NULL,
  `enddate` date NOT NULL,
  `activated` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `medicastructureoffer`
--

INSERT INTO `medicastructureoffer` (`id`, `medicalstructure_id`, `offertype_id`, `begginningdate`, `enddate`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 22, 1, '2021-05-05', '2021-05-26', 1, '2021-05-25 10:25:16', '2021-05-25 10:35:42', NULL),
(2, 27, 1, '2021-05-19', '2021-05-29', 1, '2021-05-29 12:40:45', '2021-05-29 12:40:45', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `position` int(11) DEFAULT NULL,
  `menu_type` int(11) NOT NULL DEFAULT 1,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `menus`
--

INSERT INTO `menus` (`id`, `position`, `menu_type`, `icon`, `name`, `title`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, NULL, 'User', 'User', NULL, NULL, NULL),
(2, NULL, 0, NULL, 'Role', 'Role', NULL, NULL, NULL),
(7, 0, 2, 'fa-cogs', 'Settings', 'Settings', NULL, '2016-10-10 11:28:19', '2016-10-10 11:28:19'),
(11, 0, 1, 'fa-globe', 'T1blelanguage', 'Language', 7, '2016-10-10 11:54:00', '2016-10-10 11:54:00'),
(13, 0, 2, 'fa-building-o', 'Structure', 'Structure', NULL, '2016-10-11 07:26:14', '2016-10-11 09:52:40'),
(14, 0, 2, 'fa-building', 'Comptabilité', 'Comptabilité', NULL, '2016-11-07 06:49:57', '2016-11-07 08:17:22'),
(15, 0, 1, 'fa-star-o', 'TVA', 'TVA', 7, '2016-11-07 06:54:40', '2016-11-07 06:54:40'),
(19, 0, 1, 'fa-phone', 'Typecontact', 'Type Contact', 7, '2016-11-07 07:14:33', '2016-11-07 07:14:33'),
(20, 0, 1, 'fa-usd', 'Devise', 'Devise', 7, '2016-11-07 07:26:32', '2016-11-07 07:26:32'),
(21, 0, 1, 'fa-database', 'Bureaucomptable', 'Bureau Comptable', 14, '2016-11-07 08:16:25', '2016-11-07 08:16:25'),
(24, 0, 1, 'fa-briefcase', 'Contactbureau', 'Contact Bureau', 14, '2016-11-07 08:48:28', '2016-11-08 09:03:16'),
(25, 0, 1, 'fa-briefcase', 'Contactsociety', 'Contact Société', 14, '2016-11-07 08:51:22', '2016-11-08 09:03:04'),
(26, 0, 1, 'fa-calendar', 'Exercicecomptable', 'Exercice Comptable', 14, '2016-11-07 08:54:39', '2016-11-08 09:02:30'),
(27, 0, 1, 'fa-paperclip', 'Journaux', 'Journale', 14, '2016-11-07 09:40:15', '2016-11-08 09:02:12'),
(28, 0, 1, 'fa-bars', 'Mouvements', 'Mouvements', 14, '2016-11-07 09:44:38', '2016-11-07 09:45:52'),
(29, 0, 1, 'fa-plus-square-o', 'Comptescomptables', 'Comptes Comptables', 7, '2016-11-07 09:50:47', '2016-11-08 09:03:28'),
(30, 0, 1, 'fa-exchange', 'Transaction', 'Transaction', 14, '2016-11-07 10:05:18', '2016-11-08 09:02:00'),
(31, 0, 1, 'fa-building', 'Society', 'Société', 14, '2016-11-07 10:16:56', '2016-11-08 09:01:48'),
(36, 0, 1, 'fa-sitemap', 'Speciality', 'Speciality', 13, '2016-11-21 13:41:12', '2016-11-21 13:41:12'),
(38, 0, 2, 'fa-male', 'Personne', 'Personne', NULL, '2016-11-21 14:42:16', '2016-11-21 14:42:16'),
(39, 0, 1, 'fa-male', 'Staffmedicaltype', 'Type du Staff Médicale', 7, '2016-11-21 14:43:55', '2016-11-24 12:21:02'),
(46, 0, 1, 'fa-phone', 'Contactpatient', 'Contact des Patients', 38, '2016-11-23 10:54:04', '2016-11-24 12:21:36'),
(47, 0, 1, 'fa-phone', 'Contactstaffmedical', 'Contact staff Médical', 38, '2016-11-23 11:01:37', '2016-11-24 12:21:48'),
(48, 0, 1, 'fa-phone', 'Contactdocteur', 'Contact Docteurs', 38, '2016-11-23 11:03:41', '2016-11-24 12:21:59'),
(53, 0, 1, 'fa-building-o', 'Etage', 'Etages', 13, '2016-11-23 13:14:54', '2016-11-23 13:14:54'),
(55, 0, 1, 'fa-building', 'Office', 'Bureau', 13, '2016-11-23 13:22:03', '2016-11-23 13:22:03'),
(56, 0, 1, 'fa-clock-o', 'Emploitemps', 'Emploi de Temps', 7, '2016-11-23 13:47:21', '2016-11-23 13:47:21'),
(57, 0, 1, 'fa-male', 'Staffmedicallaffectation', 'Affectation Staff Médical', 38, '2016-11-23 13:55:46', '2016-11-23 14:44:46'),
(58, 0, 1, 'fa-building-o', 'Structureoffer', 'Offre par Structure', 13, '2016-11-23 14:44:07', '2016-11-23 14:44:07'),
(59, 0, 1, 'fa-heart-o', 'Insurance', 'Assurance', 38, '2016-11-23 15:05:48', '2016-11-23 15:05:48'),
(60, 0, 1, 'fa-heart', 'Typeinsurrance', 'Type Assurance', 7, '2016-11-23 15:10:59', '2016-11-24 12:21:23'),
(61, 0, 1, 'fa-heart', 'Insured', 'Assuré', 38, '2016-11-23 15:14:07', '2016-11-23 15:14:07'),
(62, 0, 1, 'fa-phone', 'Contactoffice', 'Contact Bureau', 13, '2016-11-24 12:29:29', '2016-11-24 12:29:29'),
(63, 0, 1, 'fa-phone', 'Contactservice', 'Contact Services', 13, '2016-11-24 12:31:21', '2016-11-24 12:31:21'),
(64, 0, 1, 'fa-venus-mars', 'Martialstatus', 'Etat Conjugale', 7, '2016-11-24 12:33:24', '2016-11-24 12:33:24'),
(65, 0, 1, 'fa-venus-mars', 'Martialstatushistory', 'Historique conjugale', 38, '2016-11-24 12:35:12', '2016-11-24 12:35:12'),
(66, 0, 1, 'fa-medkit', 'Vaccinetype', 'Type Des Vaccins', 7, '2016-11-24 12:45:00', '2016-11-24 12:45:00'),
(67, 0, 1, 'fa-stethoscope', 'Historyvaccin', 'Historique des Vaccins', 38, '2016-11-24 12:48:11', '2016-11-24 12:48:11'),
(68, 0, 1, 'fa-stethoscope', 'Allergytype', 'Type des Allergies', 7, '2016-11-24 12:49:30', '2016-11-24 12:49:30'),
(69, 0, 1, 'fa-stethoscope', 'Historyallergy', 'Historique des Allergies', 38, '2016-11-24 12:51:36', '2016-11-24 12:51:36'),
(70, 0, 1, 'fa-arrows', 'Activitytype', 'Types Des Activités', 7, '2016-11-24 12:55:26', '2016-11-24 12:55:59'),
(71, 0, 1, 'fa-code-fork', 'Historyactivity', 'Historique des Activitées', 38, '2016-11-24 13:01:45', '2016-11-24 13:01:45'),
(72, 0, 1, 'fa-code-fork', 'Typefunction', 'Type des Fonctions', 7, '2016-11-24 13:05:24', '2016-11-24 13:05:24'),
(73, 0, 1, 'fa-code-fork', 'Historyfunction', 'Historique des Fonctions', 38, '2016-11-24 13:09:20', '2016-11-24 13:09:20'),
(74, 0, 1, 'fa-glass', 'Aptitudetype', 'Type des Aptitudes', 7, '2016-11-24 13:11:22', '2016-11-24 13:11:22'),
(75, 0, 1, 'fa-glass', 'Historyaptitude', 'Historique des Aptitudes', 38, '2016-11-24 13:14:35', '2016-11-24 13:14:35'),
(80, 0, 2, 'fa-user-o', 'Consultations', 'Consultations', NULL, '2016-11-25 06:33:10', '2016-11-25 06:33:10'),
(81, 0, 1, 'fa-user-o', 'Typeacte', 'Type des Actes Médicaux', 7, '2016-11-25 06:39:30', '2016-11-25 06:39:30'),
(84, 0, 1, 'fa-pied-piper', 'Ordonance', 'Ordonnance', 80, '2016-11-25 08:09:23', '2016-11-25 08:09:23'),
(86, 0, 1, 'fa-paperclip', 'Paperclip', 'Rapport Médicale', 80, '2016-11-25 08:24:30', '2016-11-25 08:24:30'),
(88, 0, 1, 'fa-list', 'Historyactemedical', 'Actes Médicaux', 80, '2016-11-25 08:41:27', '2016-11-25 08:42:10'),
(89, 0, 2, 'fa-desktop', 'GestionInterface', 'Gestion Interface', NULL, '2016-11-25 11:44:34', '2016-11-25 11:44:34'),
(90, 0, 1, 'fa-commenting-o', 'Messagetype', 'Type des Messages', 89, '2016-11-26 09:00:02', '2016-11-26 09:00:02'),
(91, 0, 1, 'fa-commenting', 'Message', 'Message', 89, '2016-11-26 09:02:12', '2016-11-26 09:02:12'),
(92, 0, 1, 'fa-commenting-o', 'Messagelanguage', 'Translation Messages', 89, '2016-11-26 09:04:53', '2016-11-26 09:05:15'),
(93, 0, 1, 'fa-bars', 'Menutype', 'Type des Menus', 89, '2016-11-26 09:09:14', '2016-11-26 09:09:14'),
(96, 0, 1, 'fa-bars', 'Usermenu', 'Menu utilisateur', 89, '2016-11-26 11:40:47', '2016-11-26 11:40:47'),
(97, 0, 1, 'fa-bars', 'Translatmenu', 'Translation Menu', 89, '2016-11-26 11:43:23', '2016-11-26 11:43:23'),
(98, 0, 1, 'fa-tags', 'Tag', 'Tag', 89, '2016-11-26 11:45:32', '2016-11-26 11:45:53'),
(99, 0, 1, 'fa-tag', 'Translationtag', 'Translation Tags', 89, '2016-11-26 11:47:33', '2016-11-26 11:47:33'),
(100, 0, 1, 'fa-bookmark-o', 'Bannertype', 'Type des Bannières', 89, '2016-11-28 10:24:19', '2016-11-28 10:24:19'),
(101, 0, 1, 'fa-bookmark-o', 'Banner', 'Bannières', 89, '2016-11-28 10:36:47', '2016-11-28 10:36:47'),
(102, 0, 1, 'fa-newspaper-o', 'Actuality', 'actualité', 89, '2016-11-28 11:04:58', '2016-11-28 11:04:58'),
(103, 0, 1, 'fa-newspaper-o', 'Actualitylangage', 'Actualité par Langue', 89, '2016-11-28 11:10:29', '2016-11-28 11:10:29'),
(104, 0, 1, 'fa-tablet', 'Tab', 'Tab', 89, '2016-11-28 11:11:59', '2016-11-28 11:11:59'),
(105, 0, 1, 'fa-tablet', 'Tablangue', 'Tab par Langue', 89, '2016-11-28 11:16:45', '2016-11-28 11:16:45'),
(106, 0, 2, 'fa-stethoscope', 'Examen&Complément', 'Examen & Complément', NULL, '2016-11-30 07:50:36', '2016-11-30 07:50:36'),
(108, 0, 1, 'fa-stethoscope', 'Examencardio', 'Examen Cardiologie', 106, '2016-11-30 12:52:50', '2016-11-30 12:52:50'),
(109, 0, 1, 'fa-stethoscope', 'Examendentist', 'Examen Dentist', 106, '2016-11-30 13:13:05', '2016-11-30 13:13:05'),
(110, 0, 1, 'fa-stethoscope', 'Examendermatology', 'Examen Dermatologie', 106, '2016-11-30 13:27:54', '2016-11-30 13:27:54'),
(111, 0, 1, 'fa-stethoscope', 'Examengastrology', 'Examen Gastrologie', 106, '2016-11-30 13:37:31', '2016-11-30 13:37:31'),
(112, 0, 1, 'fa-stethoscope', 'Examengynecology', 'Examen Gynécologique', 106, '2016-11-30 13:46:24', '2016-11-30 13:46:24'),
(113, 0, 1, 'fa-stethoscope', 'Examenophtamology', 'Examen Ophtamologie', 106, '2016-12-01 15:43:00', '2016-12-01 15:43:00'),
(114, 0, 1, 'fa-stethoscope', 'Examenpediatry', 'Examen Pédiatre', 106, '2016-12-01 16:44:10', '2016-12-01 16:44:10'),
(115, 0, 1, 'fa-stethoscope', 'Examenpneumology', 'Examen Pneumologie', 106, '2016-12-01 16:57:13', '2016-12-01 16:57:13'),
(116, 0, 1, 'fa-stethoscope', 'Examcomplementgynecology', 'Cpl Gynecologique', 106, '2016-12-01 17:07:43', '2016-12-13 06:52:46'),
(117, 0, 1, 'fa-stethoscope', 'Examcomplementophtalmology', 'Cpl Ophtalmologie', 106, '2016-12-13 07:24:25', '2016-12-13 07:24:25'),
(118, 0, 1, 'fa-stethoscope', 'Examcomplementpneumology', 'Cpl Pneumologie', 106, '2016-12-13 07:38:37', '2016-12-13 07:39:07'),
(124, 0, 2, 'fa-history', 'Antécédents', 'Antécédents', NULL, '2016-12-14 06:08:00', '2016-12-14 06:08:00'),
(125, 0, 1, 'fa-history', 'Historymedical', 'Médicaux', 124, '2016-12-14 06:33:02', '2016-12-14 08:58:20'),
(126, 0, 1, 'fa-history', 'Historychirurgical', 'Chirurgicaux', 124, '2016-12-14 06:36:32', '2016-12-14 08:58:36'),
(127, 0, 1, 'fa-history', 'Histoypatient', 'Patient', 124, '2016-12-14 06:53:18', '2016-12-14 06:53:18'),
(128, 0, 1, 'fa-history', 'Historyepoux', 'Époux Epouse', 124, '2016-12-14 06:55:26', '2016-12-14 06:55:26'),
(129, 0, 1, 'fa-history', 'Historyenfant', 'Descendants', 124, '2016-12-14 06:57:11', '2016-12-14 06:57:11'),
(130, 0, 1, 'fa-history', 'Historypere', 'Père', 124, '2016-12-14 08:44:57', '2016-12-14 08:44:57'),
(131, 0, 1, 'fa-history', 'Historymere', 'Mère', 124, '2016-12-14 08:46:14', '2016-12-14 08:46:14'),
(133, 0, 1, 'fa-history', 'Historygpere', 'Grand Père', 124, '2016-12-14 08:51:35', '2016-12-14 08:51:35'),
(134, 0, 1, 'fa-history', 'Historygmere', 'Grande Mère', 124, '2016-12-14 08:53:41', '2016-12-14 08:53:41'),
(135, 0, 1, 'fa-history', 'Historyfrere', 'Frère  et Soeur', 124, '2016-12-14 08:55:18', '2016-12-14 08:55:18'),
(136, 0, 1, 'fa-history', 'Historyoncle', 'Oncles', 124, '2016-12-14 08:56:24', '2016-12-14 08:56:24'),
(137, 0, 1, 'fa-history', 'Historyautre', 'Autres', 124, '2016-12-14 08:57:27', '2016-12-14 08:57:27'),
(138, 0, 1, 'fa-female', 'Historygyneco', 'Gynécologiques', 124, '2016-12-14 09:02:23', '2016-12-14 09:02:56'),
(139, 0, 1, 'fa-bolt', 'Historyallergical', 'Allergiques', 124, '2016-12-14 09:05:32', '2016-12-14 09:05:32'),
(140, 0, 1, 'fa-eyedropper', 'Historyvaccine', 'Vaccinaux', 124, '2016-12-14 09:08:11', '2016-12-14 09:08:11'),
(141, 0, 2, 'fa-tachometer', 'Diagnostiques', 'Diagnostiques', NULL, '2016-12-14 10:14:56', '2016-12-14 10:14:56'),
(142, 0, 1, 'fa-tachometer', 'Suspected', 'Suspectés', 141, '2016-12-14 10:19:36', '2016-12-14 10:19:36'),
(143, 0, 1, 'fa-tachometer', 'Diagnosticdiffirentiel', 'Différentielle', 141, '2016-12-14 10:24:48', '2016-12-14 10:24:48'),
(144, 0, 1, 'fa-tachometer', 'Diagnosticdefinitif', 'Définitif', 141, '2016-12-14 10:30:05', '2016-12-14 10:30:05'),
(147, 0, 1, 'fa-handshake-o', 'Consultationhistory', 'Historiques Consultations', 80, '2016-12-16 06:03:26', '2016-12-16 06:03:26'),
(148, 0, 2, 'fa-database', 'TestWafa', 'test-Wafa', NULL, '2018-05-05 09:07:34', '2018-05-05 09:07:34'),
(149, 0, 1, 'fa-database', 'Wafa1', 'wafa', 148, '2018-05-05 09:11:46', '2018-05-05 09:11:46'),
(150, 0, 1, 'fa-home', 'StructureType', 'Structure Type', 13, '2021-05-02 08:57:19', '2021-05-18 13:17:21'),
(154, 0, 1, 'fa-building-o', 'MedicalStructure', 'Medical Structure', 13, '2021-05-02 10:50:08', '2021-05-02 10:50:08'),
(155, 0, 1, 'fa-flag', 'MedicalStructureSpeciality', 'Structures Specialities', 13, '2021-05-02 11:03:01', '2021-05-18 13:29:42'),
(156, 0, 1, 'fa-globe', 'Zone', 'Zone', 7, '2021-05-02 21:13:27', '2021-05-18 17:08:53'),
(157, 0, 1, 'fa-flag', 'Country', 'Country', 7, '2021-05-02 21:20:20', '2021-05-18 16:50:01'),
(164, 0, 1, 'fa-user-md', 'Doctor', 'Doctor', 38, '2021-05-03 13:57:43', '2021-05-16 19:48:17'),
(165, 0, 1, 'fa-calendar', 'Appoitement', 'Appoitement', 38, '2021-05-03 14:03:01', '2021-05-03 14:03:01'),
(167, 0, 1, 'fa-database', 'Consultation', 'Consultation', 80, '2021-05-03 16:08:04', '2021-05-03 16:08:04'),
(170, 0, 1, 'fa-stethoscope', 'Generalexam', 'General Exam', 106, '2021-05-03 23:45:22', '2021-05-16 21:38:24'),
(178, 0, 1, 'fa-male', 'Patient', 'Patient', 38, '2021-05-05 12:13:42', '2021-05-16 20:55:30'),
(179, 0, 1, 'fa-database', 'Testtime', 'testtime', 38, '2021-05-10 14:08:08', '2021-05-10 14:08:08'),
(180, 0, 1, 'fa-database', 'Testtimes', 'testtimes', 38, '2021-05-10 14:14:16', '2021-05-10 14:14:16'),
(181, 0, 1, 'fa-database', 'Ggg', 'ggg', 38, '2021-05-10 14:15:45', '2021-05-10 14:15:45'),
(182, 0, 1, 'fa-database', 'Om', 'om', NULL, '2021-05-10 14:17:18', '2021-05-10 14:17:18'),
(183, 0, 1, 'fa-database', 'Okol', 'okol', NULL, '2021-05-10 14:22:02', '2021-05-10 14:22:02'),
(184, 0, 1, 'fa-database', 'Hi', 'hii', 38, '2021-05-10 14:23:51', '2021-05-10 14:23:51'),
(185, 0, 1, 'fa-database', 'Ca', 'ca', 38, '2021-05-10 14:31:42', '2021-05-10 14:31:42'),
(187, 0, 1, 'fa-database', 'Testtab', 'testtab', 7, '2021-05-19 20:19:55', '2021-05-19 20:19:55'),
(188, 0, 1, 'fa-database', 'Test1', 'test1', 7, '2021-05-19 20:24:21', '2021-05-19 20:24:21'),
(189, 0, 1, 'fa-database', 'Test2', 'test2', 7, '2021-05-19 20:31:31', '2021-05-19 20:31:31'),
(190, 0, 1, 'fa-database', 'Tab22', 'tab22', NULL, '2021-05-19 20:37:38', '2021-05-19 20:37:38'),
(191, 0, 1, 'fa-database', 'Tabg2', 'tabg2', 7, '2021-05-19 20:40:12', '2021-05-19 20:40:12'),
(192, 0, 1, 'fa-database', 'Tabg21', 'tabg21', 7, '2021-05-19 20:46:19', '2021-05-19 20:46:19'),
(193, 0, 1, 'fa-database', 'Newtabb', 'newtabb', 7, '2021-05-19 20:52:23', '2021-05-19 20:52:23'),
(194, 0, 1, 'fa-database', 'Ggtest', 'ggtest', 7, '2021-05-19 21:02:45', '2021-05-19 21:02:45'),
(195, 0, 1, 'fa-database', 'Heyk', 'heyk', 7, '2021-05-21 07:26:46', '2021-05-21 07:26:46'),
(196, 0, 1, 'fa-database', 'Heykb', 'heykb', 7, '2021-05-21 07:29:32', '2021-05-21 07:29:32'),
(199, 0, 1, 'fa-database', 'Vvvvvv', 'vvvvv', 7, '2021-05-21 07:35:01', '2021-05-21 07:35:01'),
(203, 0, 1, 'fa-database', 'Vvvvvvv', 'vvvvvv', 7, '2021-05-21 07:42:04', '2021-05-21 07:42:04'),
(207, 0, 1, 'fa-database', 'MedicalStructurenn', 'nknknnk', NULL, '2021-05-21 07:47:28', '2021-05-21 07:47:28'),
(208, 0, 1, 'fa-database', 'Ffff', 'rf', 14, '2021-05-21 08:42:01', '2021-05-21 08:42:01'),
(209, 0, 1, 'fa-database', 'Tt1', 'tt1', 7, '2021-05-21 09:04:05', '2021-05-21 09:04:05'),
(210, 0, 1, 'fa-database', 'Dd1', 'dd1', 13, '2021-05-21 09:08:24', '2021-05-21 09:08:24'),
(211, 0, 1, 'fa-database', 'Te11', 'te11', 13, '2021-05-21 09:16:09', '2021-05-21 09:16:09'),
(212, 0, 1, 'fa-database', 'Dd', 'dd', 13, '2021-05-21 09:24:23', '2021-05-21 09:24:23'),
(213, 0, 1, 'fa-database', 'Testtt', 'testttt', 13, '2021-05-21 09:38:19', '2021-05-21 09:38:19'),
(214, 0, 1, 'fa-database', 'Tabmedical', 'tabmedical', 7, '2021-05-21 09:49:16', '2021-05-21 09:49:16'),
(215, 0, 1, 'fa-database', 'Branch', 'branch', 7, '2021-05-21 09:54:05', '2021-05-21 09:54:05'),
(216, 0, 1, 'fa-database', 'Newcmp', 'newcmp', 14, '2021-05-21 09:57:28', '2021-05-21 09:57:28'),
(217, 0, 1, 'fa-tint', 'Drugfamilly', 'Drug Familly', 7, '2021-05-21 16:22:17', '2021-05-21 16:22:17'),
(218, 0, 1, 'fa-tint', 'Drugmaker', 'Drug Maker', 7, '2021-05-21 16:27:56', '2021-05-21 16:27:56'),
(219, 0, 1, 'fa-tint', 'Drug', 'Drug', 7, '2021-05-21 16:32:12', '2021-05-21 16:32:12'),
(220, 0, 1, 'fa-tint', 'Prescription', 'Prescription', 80, '2021-05-21 16:43:33', '2021-05-21 16:45:21'),
(221, 0, 1, 'fa-database', 'Detailsprescription', 'Details Prescription', 80, '2021-05-21 18:16:06', '2021-05-21 18:16:06'),
(222, 0, 1, 'fa-certificate', 'Certificate', 'Certificate', 80, '2021-05-22 12:30:14', '2021-05-22 12:30:14'),
(223, 0, 1, 'fa-database', 'Report', 'Report', 80, '2021-05-22 13:06:20', '2021-05-22 13:06:20'),
(224, 0, 1, 'fa-compress', 'Visitnature', 'Visit Nature', 7, '2021-05-24 08:47:41', '2021-05-24 08:47:41'),
(225, 0, 1, 'fa-compress', 'Visitstatus', 'Visit Status', 7, '2021-05-24 08:49:46', '2021-05-24 08:49:46'),
(226, 0, 1, 'fa-compress', 'Visittype', 'Visit Type', 7, '2021-05-24 08:51:31', '2021-05-24 08:51:31'),
(227, 0, 1, 'fa-question', 'Question', 'Question', 80, '2021-05-24 11:19:48', '2021-05-24 11:19:48'),
(228, 0, 1, 'fa-commenting-o', 'Response', 'Response', 80, '2021-05-24 11:37:55', '2021-05-24 11:37:55'),
(229, 0, 1, 'fa-first-order', 'Offertype', 'Offer Type', 7, '2021-05-25 09:18:50', '2021-05-25 09:18:50'),
(230, 0, 1, 'fa-usd', 'Medicastructureoffer', 'Structures Offers', 13, '2021-05-25 10:08:24', '2021-05-25 10:08:24'),
(231, 0, 1, 'fa-sitemap', 'Site', 'Site', 13, '2021-05-26 04:52:59', '2021-05-26 04:52:59'),
(232, 0, 1, 'fa-building-o', 'Building', 'Building', 13, '2021-05-26 04:55:58', '2021-05-26 04:55:58'),
(233, 0, 1, 'fa-clock-o', 'Schedule', 'Schedule', 13, '2021-05-26 05:02:35', '2021-05-26 05:02:35'),
(234, 0, 1, 'fa-server', 'Service', 'Service', 13, '2021-05-26 05:05:41', '2021-05-26 05:05:41'),
(238, 0, 1, 'fa-database', 'Servicecontact', 'Service Contact', 13, '2021-05-26 14:09:44', '2021-05-26 14:09:44'),
(239, 0, 1, 'fa-database', 'Sett', 'sett', 7, '2021-05-26 15:03:01', '2021-05-26 15:03:01'),
(240, 0, 1, 'fa-database', 'medicalstaff', 'Medical Staff', 13, '2021-05-18 18:11:56', '2021-05-18 18:15:35');

-- --------------------------------------------------------

--
-- Structure de la table `menutype`
--

CREATE TABLE `menutype` (
  `id` int(10) UNSIGNED NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menu_role`
--

CREATE TABLE `menu_role` (
  `menu_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `menu_role`
--

INSERT INTO `menu_role` (`menu_id`, `role_id`) VALUES
(7, 1),
(7, 2),
(7, 10),
(7, 12),
(11, 1),
(13, 1),
(13, 2),
(13, 10),
(13, 12),
(14, 1),
(15, 1),
(19, 1),
(20, 1),
(21, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(36, 1),
(36, 2),
(36, 10),
(36, 11),
(36, 12),
(38, 1),
(38, 2),
(38, 10),
(38, 11),
(38, 12),
(38, 13),
(39, 1),
(46, 1),
(46, 10),
(46, 11),
(46, 12),
(46, 13),
(47, 1),
(47, 10),
(47, 11),
(47, 12),
(47, 13),
(48, 1),
(48, 10),
(48, 11),
(48, 12),
(48, 13),
(53, 1),
(53, 12),
(53, 13),
(55, 1),
(55, 12),
(55, 13),
(56, 1),
(56, 10),
(56, 12),
(56, 13),
(57, 1),
(57, 12),
(57, 13),
(58, 1),
(58, 10),
(58, 12),
(58, 13),
(59, 1),
(59, 12),
(59, 13),
(60, 1),
(60, 12),
(60, 13),
(61, 1),
(61, 10),
(61, 12),
(61, 13),
(62, 1),
(62, 10),
(62, 11),
(62, 12),
(62, 13),
(63, 1),
(63, 10),
(63, 11),
(63, 12),
(63, 13),
(64, 1),
(65, 1),
(65, 10),
(65, 11),
(66, 1),
(67, 1),
(67, 10),
(67, 12),
(67, 13),
(68, 1),
(69, 1),
(69, 10),
(70, 1),
(71, 1),
(71, 10),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(75, 10),
(80, 1),
(80, 2),
(80, 10),
(81, 1),
(84, 1),
(84, 10),
(84, 11),
(86, 1),
(86, 10),
(86, 11),
(88, 1),
(88, 10),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(96, 1),
(97, 1),
(98, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(106, 2),
(106, 10),
(108, 1),
(108, 10),
(109, 1),
(109, 10),
(110, 1),
(110, 10),
(111, 1),
(111, 10),
(112, 1),
(112, 10),
(113, 1),
(113, 10),
(114, 1),
(114, 10),
(115, 1),
(115, 10),
(116, 1),
(116, 10),
(117, 1),
(117, 10),
(118, 1),
(118, 10),
(124, 1),
(124, 10),
(125, 1),
(125, 10),
(126, 1),
(126, 10),
(127, 1),
(127, 10),
(128, 1),
(128, 10),
(129, 1),
(129, 10),
(130, 1),
(130, 10),
(131, 1),
(131, 10),
(133, 1),
(133, 10),
(134, 1),
(134, 10),
(135, 1),
(135, 10),
(136, 1),
(136, 10),
(137, 1),
(137, 10),
(138, 1),
(138, 10),
(139, 1),
(139, 10),
(140, 1),
(140, 10),
(141, 1),
(141, 10),
(142, 1),
(142, 10),
(143, 1),
(143, 10),
(144, 1),
(144, 10),
(147, 1),
(147, 10),
(148, 1),
(149, 1),
(150, 1),
(154, 1),
(154, 2),
(154, 10),
(154, 11),
(154, 12),
(154, 13),
(155, 1),
(155, 2),
(155, 10),
(155, 11),
(155, 12),
(156, 1),
(156, 2),
(156, 10),
(156, 11),
(156, 12),
(157, 1),
(157, 2),
(157, 10),
(157, 11),
(157, 12),
(164, 1),
(164, 2),
(164, 10),
(164, 11),
(164, 12),
(165, 1),
(165, 2),
(165, 10),
(165, 11),
(165, 12),
(167, 1),
(167, 2),
(167, 10),
(170, 1),
(170, 2),
(170, 10),
(178, 1),
(178, 10),
(178, 11),
(178, 12),
(179, 1),
(180, 1),
(181, 1),
(182, 1),
(183, 1),
(184, 1),
(185, 1),
(187, 1),
(188, 1),
(189, 1),
(190, 1),
(191, 1),
(192, 1),
(193, 1),
(194, 1),
(195, 1),
(196, 1),
(199, 1),
(203, 1),
(207, 1),
(208, 1),
(209, 1),
(210, 1),
(211, 1),
(212, 1),
(213, 1),
(214, 1),
(215, 1),
(216, 1),
(217, 1),
(217, 2),
(217, 10),
(217, 11),
(217, 12),
(218, 1),
(218, 2),
(218, 10),
(218, 11),
(218, 12),
(219, 1),
(219, 2),
(219, 10),
(219, 11),
(219, 12),
(220, 1),
(220, 2),
(220, 10),
(221, 1),
(221, 2),
(221, 10),
(222, 1),
(222, 2),
(222, 10),
(223, 1),
(223, 2),
(223, 10),
(224, 1),
(224, 2),
(224, 10),
(224, 11),
(224, 12),
(225, 1),
(225, 2),
(225, 10),
(225, 11),
(225, 12),
(226, 1),
(226, 2),
(226, 10),
(226, 11),
(226, 12),
(227, 1),
(227, 10),
(228, 1),
(228, 2),
(228, 10),
(229, 1),
(229, 2),
(229, 10),
(229, 11),
(229, 12),
(230, 1),
(230, 2),
(230, 10),
(230, 12),
(231, 1),
(231, 2),
(231, 10),
(231, 11),
(231, 12),
(232, 1),
(232, 2),
(232, 10),
(232, 11),
(232, 12),
(233, 1),
(233, 2),
(233, 10),
(233, 11),
(233, 12),
(234, 1),
(234, 2),
(234, 10),
(234, 11),
(234, 12),
(238, 1),
(238, 2),
(238, 10),
(238, 11),
(238, 12),
(239, 1),
(240, 1),
(240, 10),
(240, 11),
(240, 12);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2021_04_29_183630_create_drug_table', 1),
(10, '2021_04_29_184009_create_hh_table', 1),
(11, '2021_05_02_095719_create_structuretype_table', 1),
(12, '2021_05_02_101359_create_medicalstructure_table', 1),
(13, '2021_05_02_105922_create_medicalstructure_table', 2),
(14, '2021_05_02_111014_create_medicalstructure_table', 3),
(15, '2021_05_02_115008_create_medicalstructure_table', 4),
(16, '2021_05_02_120301_create_medicalstructurespeciality_table', 5),
(17, '2021_05_02_221328_create_zone_table', 6),
(18, '2021_05_02_222020_create_country_table', 7),
(19, '2021_05_02_223246_create_doctor_table', 8),
(20, '2021_05_02_223809_create_tt_table', 9),
(21, '2021_05_02_223921_create_kkk_table', 10),
(22, '2021_05_03_102920_create_dc_table', 11),
(23, '2021_05_03_130855_create_patient_table', 12),
(24, '2021_05_03_145743_create_doctor_table', 13),
(25, '2021_05_03_150301_create_appoitement_table', 14),
(26, '2021_05_03_163019_create_consultation_table', 15),
(27, '2021_05_03_170805_create_consultation_table', 16),
(28, '2021_05_03_233118_create_generalexam_table', 17),
(29, '2021_05_04_003608_create_generalexam_table', 18),
(30, '2021_05_04_004522_create_generalexam_table', 19),
(34, '2021_05_21_105405_create_branch_table', 20),
(35, '2021_05_21_105729_create_newcmp_table', 21),
(36, '2021_05_10_152351_create_medicalstaff_table', 22),
(37, '2021_05_21_172217_create_drugfamilly_table', 22),
(38, '2021_05_21_172756_create_drugmaker_table', 23),
(39, '2021_05_21_173213_create_drug_table', 24),
(40, '2021_05_21_174333_create_prescription_table', 25),
(41, '2021_05_21_191606_create_detailsprescription_table', 26),
(42, '2021_05_22_133014_create_certificate_table', 27),
(43, '2021_05_22_140620_create_report_table', 28),
(44, '2021_05_24_094742_create_visitnature_table', 29),
(45, '2021_05_24_094946_create_visitstatus_table', 30),
(46, '2021_05_24_095131_create_visittype_table', 31),
(47, '2021_05_24_121949_create_question_table', 32),
(48, '2021_05_24_123755_create_response_table', 33),
(49, '2021_05_25_101851_create_offertype_table', 34),
(50, '2021_05_25_110825_create_medicastructureoffer_table', 35),
(51, '2021_05_26_055300_create_site_table', 36),
(52, '2021_05_26_055559_create_building_table', 37),
(53, '2021_05_26_060235_create_schedule_table', 38),
(54, '2021_05_26_060541_create_service_table', 39),
(56, '2021_05_26_150944_create_servicecontact_table', 40),
(57, '2021_05_26_160301_create_sett_table', 41);

-- --------------------------------------------------------

--
-- Structure de la table `newcmp`
--

CREATE TABLE `newcmp` (
  `id` int(10) UNSIGNED NOT NULL,
  `ncmp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `offertype`
--

CREATE TABLE `offertype` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `offertype`
--

INSERT INTO `offertype` (`id`, `name`, `alias`, `description`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'offer1', 'o1', 'o1 is ...', 1, '2021-05-25 09:42:09', '2021-05-25 09:59:21', NULL),
(2, 'offre 2 ', 'o2', 'o2 is ...', 1, '2021-05-25 09:56:39', '2021-05-25 09:56:39', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identitymatricule` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `othorize` tinyint(4) DEFAULT 1,
  `activated` tinyint(4) DEFAULT 1,
  `signaled` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id`, `user_id`, `fullname`, `birthday`, `gender`, `identitymatricule`, `passport`, `othorize`, `activated`, `signaled`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 5, 'aziz rbii', '2021-05-12', '', '', '', 1, 1, 0, '2021-05-04 22:01:13', '2021-05-16 21:23:31', NULL),
(3, 25, 'jhjhjh', '2021-05-04', NULL, NULL, NULL, 1, 1, 0, '2021-05-14 10:10:54', NULL, NULL),
(4, 36, 'aziz rbii', '2021-05-12', NULL, NULL, NULL, 1, 1, 0, '2021-05-14 20:39:58', NULL, NULL),
(5, 38, 'aziz rbii', '2021-05-12', NULL, NULL, NULL, 1, 1, 0, '2021-05-15 14:27:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `piledoctorappoitement`
--

CREATE TABLE `piledoctorappoitement` (
  `id` int(11) DEFAULT NULL,
  `medicalstructure_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `piledoctorappoitement`
--

INSERT INTO `piledoctorappoitement` (`id`, `medicalstructure_id`, `doctor_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(10) UNSIGNED NOT NULL,
  `consultation_id` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `prescription`
--

INSERT INTO `prescription` (`id`, `consultation_id`, `label`, `description`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 'prescripion 1 ', 'p1 is ...', 1, '2021-05-21 18:27:22', '2021-05-21 18:27:22', NULL),
(4, 1, 'p2 ', 'p2 is ...', 1, '2021-05-21 18:28:25', '2021-05-21 18:28:25', NULL),
(6, 0, '', '', 1, '2021-05-21 18:50:02', '2021-05-29 10:38:30', '2021-05-29 10:38:30'),
(7, 14, 'ipjmk', 'hioplkn', 1, '2021-05-21 18:53:00', '2021-05-21 18:53:00', NULL),
(8, 15, 'ppp', 'pp is ..', 1, '2021-05-22 12:13:25', '2021-05-22 12:13:25', NULL),
(9, 29, 'p 29 ', 'p 29 is ...', 1, '2021-05-29 10:49:32', '2021-05-29 10:49:32', NULL),
(10, 32, 'p 1', 'p1 is ..', 1, '2021-05-29 12:39:18', '2021-05-29 12:39:18', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id` int(10) UNSIGNED NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `alias`, `description`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'q2 ? ', 'q2 is about ...', 1, '2021-05-24 11:55:01', '2021-05-24 11:55:01', NULL),
(3, 'q1 q1 ?', 'q1 is about ...', 1, '2021-05-24 11:30:26', '2021-05-24 11:34:15', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `report`
--

CREATE TABLE `report` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `datereport` date NOT NULL,
  `activated` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `report`
--

INSERT INTO `report` (`id`, `description`, `datereport`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'report des', '2021-05-14', 1, '2021-05-22 13:18:45', '2021-05-29 09:05:17', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `response`
--

CREATE TABLE `response` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(11) NOT NULL,
  `consultation_id` int(11) NOT NULL,
  `patient_response` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `response`
--

INSERT INTO `response` (`id`, `question_id`, `consultation_id`, `patient_response`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 2, 28, 'q222', '2021-05-25 08:10:46', '2021-05-25 08:28:30', '2021-05-25 08:28:30'),
(6, 3, 28, 'q111', '2021-05-25 08:10:46', '2021-05-25 08:28:30', '2021-05-25 08:28:30'),
(7, 2, 28, 'q222', '2021-05-25 08:28:30', '2021-05-25 08:31:08', '2021-05-25 08:31:08'),
(8, 2, 28, 'ggg123', '2021-05-25 08:31:08', '2021-05-25 09:40:10', NULL),
(9, 3, 28, 'ggg', '2021-05-25 08:31:08', '2021-05-25 08:31:08', NULL),
(10, 2, 29, 'qq222', '2021-05-27 20:29:33', NULL, NULL),
(11, 2, 30, 'response+for+q2+..', '2021-05-28 14:41:05', NULL, NULL),
(12, 2, 31, 'response+for+question+...', '2021-05-28 14:55:52', NULL, NULL),
(13, 2, 32, 'reponse+2', '2021-05-29 12:34:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2016-10-03 08:05:42', '2016-10-03 08:05:42'),
(2, 'Surfer', '2016-10-03 08:05:42', '2016-10-10 11:04:00'),
(10, 'Doctor', '2016-11-21 13:42:21', '2016-11-21 13:42:21'),
(11, 'Secretary', '2016-11-21 13:42:37', '2016-11-21 13:42:37'),
(12, 'Administrator Clinic', '2016-11-21 13:43:10', '2016-11-21 13:43:10'),
(13, 'Administrator group', '2016-11-21 13:43:18', '2016-11-21 13:43:18'),
(14, 'Administrator Blog', '2016-11-21 13:43:31', '2016-11-21 13:43:31');

-- --------------------------------------------------------

--
-- Structure de la table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(10) UNSIGNED NOT NULL,
  `monday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tuesday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wednesday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thursday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `friday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `saturday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sunday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `schedule`
--

INSERT INTO `schedule` (`id`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `label`, `alias`, `description`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '8H => 17H', '15H => 21H', '8H => 16H', '18H => 00H', '15H => 21H', '8H => 16H', '8H => 17H', 'schedule 1', 's1', 's1 is a ...', 1, '2021-05-26 13:00:21', '2021-05-26 13:14:16', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `site_id`, `schedule_id`, `label`, `alias`, `description`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 3, 1, 'service 1', 's1', 's1 is ..', 1, '2021-05-26 14:27:41', '2021-05-26 14:27:41', NULL),
(3, 7, 1, 'srvice 1', '', '', 1, '2021-05-29 12:17:34', '2021-05-29 12:17:34', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `servicecontact`
--

CREATE TABLE `servicecontact` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contacttype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `servicecontact`
--

INSERT INTO `servicecontact` (`id`, `service_id`, `contact`, `contacttype`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'service1@gmail.com', 'email', '2021-05-26 14:35:01', '2021-05-26 14:40:47', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sett`
--

CREATE TABLE `sett` (
  `id` int(10) UNSIGNED NOT NULL,
  `fff` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sett`
--

INSERT INTO `sett` (`id`, `fff`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'pmjk,;', '2021-05-26 15:03:49', '2021-05-26 15:03:49', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

CREATE TABLE `site` (
  `id` int(10) UNSIGNED NOT NULL,
  `medicalstructure_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `site`
--

INSERT INTO `site` (`id`, `medicalstructure_id`, `country_id`, `label`, `alias`, `description`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 22, 1, 'ryehi clinic tunisia', 'rct', 'rct is ...', 1, '2021-05-26 14:27:11', '2021-05-26 14:27:11', NULL),
(4, 25, 2, 'sc 2', '', '', 1, '2021-05-29 11:30:10', '2021-05-29 11:30:10', NULL),
(5, 25, 3, 'sc3', '', '', 0, '2021-05-29 11:40:02', '2021-05-29 11:40:02', NULL),
(6, 25, 1, 'sssss', '', '', 1, '2021-05-29 11:40:59', '2021-05-29 11:40:59', NULL),
(7, 27, 2, 'site 1 mourad clinic', '', '', 1, '2021-05-29 12:13:43', '2021-05-29 12:13:43', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `speciality`
--

CREATE TABLE `speciality` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `speciality`
--

INSERT INTO `speciality` (`id`, `name`, `alias`, `description`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Generalist', 'Généraliste', 'Généraliste', 1, '2017-02-16 11:49:40', '2021-05-26 17:53:49', NULL),
(2, 'Ophtalmologie', 'Ophtalmologie', 'Ophtalmologie', 1, '2017-02-16 11:49:56', '2017-02-16 11:49:56', NULL),
(3, 'Pédiatrie', 'Pédiatrie', 'La pédiatrie est une branche spécialisée de la médecine qui étudie le développement neuro-sensori-moteur ', 1, '2021-05-02 11:05:50', '2021-05-02 11:05:50', NULL),
(4, 'newsp', 'nwsp', 'nwsp is ...', 1, '2021-05-18 16:41:31', '2021-05-18 16:46:35', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `structuretype`
--

CREATE TABLE `structuretype` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `structuretype`
--

INSERT INTO `structuretype` (`id`, `name`, `alias`, `description`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Doctor\'s office', '', '', 1, '2021-05-02 10:03:08', '2021-05-02 10:03:08', NULL),
(2, 'Clinic', '', '', 1, '2021-05-02 10:03:49', '2021-05-02 10:03:49', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `usermenu`
--

CREATE TABLE `usermenu` (
  `id` int(10) UNSIGNED NOT NULL,
  `menutype_id` int(11) DEFAULT NULL,
  `parentid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` int(10) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `birthday`, `gender`, `country`, `phone`, `password`, `remember_token`, `confirmed`, `created_at`, `updated_at`) VALUES
(1, 1, 'superadmin', 'admin@etoubib.com', NULL, NULL, NULL, NULL, '$2y$10$jafYmidPfjlppHm3C38fQOcP1C5UEq6ix1XgqcqgI.aLzyInWyhlu', 'wfjQZqevj18GspmrOLx9hHEXZyKRpyrW6FToFnJdtGXfDCJx3xQfvU9AcX6J', 0, '2016-10-03 08:06:16', '2021-05-29 12:36:04'),
(2, 12, 'test', 'test3@test.com', NULL, NULL, NULL, NULL, '$2y$10$jafYmidPfjlppHm3C38fQOcP1C5UEq6ix1XgqcqgI.aLzyInWyhlu', 'Ht17W04yyhm1ucOIcPvkGPEFSzmBJ49NUmNrduGCvCVNRxGBaWKPGCDwojUf', 0, '2016-12-29 11:55:42', '2021-05-04 13:53:18'),
(3, 10, 'dalibenameur', 'dalibenameur@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$jafYmidPfjlppHm3C38fQOcP1C5UEq6ix1XgqcqgI.aLzyInWyhlu', '3KqRifPpsUTFT9If6KnT8dYXdRioNWvEBgQohi2JbHIrA3EUvSolvGZoYCMh', 0, '2018-06-16 12:50:40', '2021-05-29 12:40:15'),
(4, 1, 'superadmin', 'admin@etoubib2.com', NULL, NULL, NULL, NULL, '$2y$10$jafYmidPfjlppHm3C38fQOcP1C5UEq6ix1XgqcqgI.aLzyInWyhlu', '2euC1mxWpiSm5PigGrenUdohqoKvaRbfK220WspZyAHeUCwwx1QVQ7cto0UT', 0, '2016-10-03 08:06:16', '2018-06-16 12:50:45'),
(5, 2, 'aziz', 'aziz@patient.com', NULL, NULL, NULL, NULL, '$2y$10$jafYmidPfjlppHm3C38fQOcP1C5UEq6ix1XgqcqgI.aLzyInWyhlu', 'UB2UPkyKJtMLd3Lk2l2mgtqajHfe7oIP8YLWyWhTrCTJAFSWOKO5MlL4hl6D', 0, '2016-12-29 11:55:42', '2021-05-29 12:29:31'),
(6, 10, 'jacktoubib', 'jack@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$jafYmidPfjlppHm3C38fQOcP1C5UEq6ix1XgqcqgI.aLzyInWyhlu', 'fvwuFiSSRWr3Tdvah5ymGmQPSNRI023UVrQrWXuepWDmaBtvI2OWNA9bpVKG', 0, '2018-06-16 12:50:40', '2021-05-29 10:22:57'),
(7, 2, 'aziz toubib', 'rbiiaziz900@gmail.com', '2021-05-05', '0', 1, 26753381, '$2y$10$fh86w4EqGJltsDie2s0nyu.2oIbfD6edREhX6ymwT2qORydz6Bhku', 'ZrWJUmqZmQ6ZCEHEU6a8AW5t3AvsrZPe0ZM7YUDA', 0, '2021-05-03 12:20:37', '2021-05-03 12:20:37'),
(8, 12, 'mourad', 'mourad@cliniquesaintaugustin.com', NULL, NULL, NULL, NULL, '$2y$10$jafYmidPfjlppHm3C38fQOcP1C5UEq6ix1XgqcqgI.aLzyInWyhlu', 'OIrZJECMhvJyapRzJOTb3wQtyqRg4LoY4Y0rdval0Zl1zxyDYA6xDSjOfmg9', 0, '2021-05-04 14:13:57', '2021-05-04 20:23:30'),
(9, 11, 'nahla', 'nahla@cliniquesaintaugustin.com', NULL, NULL, NULL, NULL, '$2y$10$jafYmidPfjlppHm3C38fQOcP1C5UEq6ix1XgqcqgI.aLzyInWyhlu', 'EoBhaPzJalr02oBJwoMePDgoBxB1UJsTsJulrCm0TPerEMskuv39oXAVn4oU', 0, '2016-10-03 08:06:16', '2021-05-27 19:45:50'),
(10, 13, 'nn', 'admin@ettoubib.com', '2021-05-05', '0', 1, 26753381, '$2y$10$1XhT2OYegnKvRqor9galtuc2X68rEoUA/d4VnjtRMd5ZtdFiz8WDO', 'n1mLGxMCMTsdZS6At16q9vewONF34IlS1k8vOfsm', 0, '2021-05-05 10:09:37', '2021-05-05 10:09:37'),
(11, 13, 'Mohamed Selmi', 'medselmi@gmail.com', '1990-06-05', '0', 1, 26753381, '$2y$10$R7bmcxy1GUvFmjRdZvpbveGyCXFGtwQjP8wuzvTMdE3lds/8WVfiq', 'n1mLGxMCMTsdZS6At16q9vewONF34IlS1k8vOfsm', 0, '2021-05-05 10:12:06', '2021-05-05 10:12:06'),
(12, 2, 'hey', 'p123@etoubib.com', '2021-05-05', '0', 1, 4444, '$2y$10$jafYmidPfjlppHm3C38fQOcP1C5UEq6ix1XgqcqgI.aLzyInWyhlu', 'q5G2I9MWOl35wBqQwuJj7qSLjmep38IdH8u8u9J8UZTzzElSCdJbl30OGyCr', 1, '2021-05-05 10:24:01', '2021-05-05 10:36:05'),
(13, 2, 'newp', 'bewp@gmail.com', '2021-05-05', 'Female', 1, 5555, '$2y$10$5lih0oDTRDr4FhSLL5epz.JO5TGJ3y7JWpDhI0NaKq4D53t2ZgWu.', 'SvRHFRwRVqRR35VInmGhLfADGw5AVD7ruULeK1dv', 1, '2021-05-05 10:39:52', '2021-05-05 10:39:52'),
(14, 2, 'gg', 'gg@gmail.com', '2021-05-05', 'Female', 1, 22222, '$2y$10$WudIHNtP0f.9BsHehHSX0.vrKj5HZ2C/YNYBRTj4PIHyX538Pa0tO', 'SvRHFRwRVqRR35VInmGhLfADGw5AVD7ruULeK1dv', 1, '2021-05-05 10:40:53', '2021-05-05 10:40:53'),
(15, 2, 'ok', 'ok@gmail.com', '2021-05-05', 'Female', 1, 5555, '$2y$10$kpjtRfeNjT3udeXDYsreFuMdrtqyrcCUKs/ZXXQ3A.eWEaveBnhre', 'SvRHFRwRVqRR35VInmGhLfADGw5AVD7ruULeK1dv', 1, '2021-05-05 10:41:59', '2021-05-05 10:41:59'),
(16, 2, 'test', 'ttt@gmail.com', '2021-05-05', 'Female', 1, 55555, '$2y$10$RjUrazgVKWJufLGxVQ6Mzu6jlXDTQGewy0C5/zuZ3jSukQkTH.XrG', 'SvRHFRwRVqRR35VInmGhLfADGw5AVD7ruULeK1dv', 1, '2021-05-05 10:44:18', '2021-05-05 10:44:18'),
(17, 2, 'hh', 'hh@gmail.com', '2021-05-05', 'Female', 1, 55555, '$2y$10$u7JUX6VxtlG7fsi1egx4rOdKxe3ODEYoX6nML1oO8l0.QyjPC0NMS', 'SvRHFRwRVqRR35VInmGhLfADGw5AVD7ruULeK1dv', 1, '2021-05-05 10:46:25', '2021-05-05 10:46:25'),
(18, 2, 'hhk', 'hhk@gmail.com', '2021-05-05', 'Female', 1, 55555, '$2y$10$W6pIwl/v9sUEzn0uV5KaW.Swwjib6JJqjh/mrNVAhyqWs7x7UuT1S', 'SvRHFRwRVqRR35VInmGhLfADGw5AVD7ruULeK1dv', 1, '2021-05-05 10:48:02', '2021-05-05 10:48:02'),
(19, 12, 'mohamed ali wesleti', 'mohamedaliweslety@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$wGU8c2yX9nFC2MkKsjqET.SbV0C97SEUeVTzRtyTeU59Srh3iM7mC', 'dJGtNpYyubvsV9xYTTMBazINFkJi79E4BURYO5kGN1iYI5I2QxxBBQYdwR1f', 0, '2021-05-06 18:04:58', '2021-05-06 18:08:59'),
(21, 2, 'hhh', 'aziz@patient.commm', '2021-05-14', '0', 1, 55, '$2y$10$9GJmbz296O/.3wIvpET4gelqNh9ilQ0GTncQ4iAs4d686mVWnPgQq', 'd1COjAeVSrp8EtzF8amYCqYlo3q1Z7YY7JwPoYUW', 0, '2021-05-14 09:53:24', '2021-05-14 09:53:24'),
(25, 2, '77ll', 'aziz@patient.com0', '2021-05-14', 'Female', 1, 99, '$2y$10$C/1K/Wvnod1jZIIydGbDdupw0PK.A/QqFhojqdzmyVcS6es0pwsly', 'd1COjAeVSrp8EtzF8amYCqYlo3q1Z7YY7JwPoYUW', 1, '2021-05-14 10:10:54', '2021-05-14 10:10:54'),
(26, 10, 'hjj', 'aziz@patient.comcv', '2021-05-14', 'Male', 1, 555, '$2y$10$D767QJkoQm3vgeun5PVWBOO8SKpoYHJ3d9dR/0aLsDTEfs39etGyC', 'd1COjAeVSrp8EtzF8amYCqYlo3q1Z7YY7JwPoYUW', 0, '2021-05-14 10:53:56', '2021-05-14 10:53:56'),
(27, 10, 'bh', 'aziz@patient.combh', '2021-05-14', 'Male', 1, 1111, '$2y$10$i5aon18rkUCwsh.ersotCOovs4aqwS6TFsjqv3CgqDTA5n3Bhl8Vm', 'd1COjAeVSrp8EtzF8amYCqYlo3q1Z7YY7JwPoYUW', 0, '2021-05-14 10:56:42', '2021-05-14 10:56:42'),
(28, 10, 'hhhhh', 'aziz@patient.comx', '2021-05-14', 'Male', 1, 4, '$2y$10$jKjjCpaRropH/wqIOEFpBOgqTI4fxIXipGTuIyjOFoMbn19Vq0h3q', 'd1COjAeVSrp8EtzF8amYCqYlo3q1Z7YY7JwPoYUW', 0, '2021-05-14 10:58:46', '2021-05-14 10:58:46'),
(29, 10, 'vvv', 'aziz@patient.comvv', '2021-05-14', 'Male', 1, 5, '$2y$10$c/J37SyfDBGbBGxw20ADAeRZlXq/dbknSiAo4R.heXkiYo36VTmpS', 'd1COjAeVSrp8EtzF8amYCqYlo3q1Z7YY7JwPoYUW', 0, '2021-05-14 11:00:28', '2021-05-14 11:00:28'),
(31, 10, 'vvv', 'aziz@patient.comvvv', '2021-05-14', 'Male', 1, 5, '$2y$10$KNv43UleVFXfX6ZY1NVJVuBNdNMaHs0Hr/xh4RCqgm.QvSC0j1ACC', 'd1COjAeVSrp8EtzF8amYCqYlo3q1Z7YY7JwPoYUW', 0, '2021-05-14 11:02:43', '2021-05-14 11:02:43'),
(32, 10, 'vvv', 'aziz@patient.comvvv1', '2021-05-14', 'Male', 1, 5, '$2y$10$cCrABYikAn5D6o.nwoAsPeS.8iv5DkGes9MglgzF7XtjItP46N.vW', 'd1COjAeVSrp8EtzF8amYCqYlo3q1Z7YY7JwPoYUW', 0, '2021-05-14 11:03:26', '2021-05-14 11:03:26'),
(33, 13, 'yh', 'groupadmin@group.com', '2021-05-14', 'Male', 1, 123, '$2y$10$jafYmidPfjlppHm3C38fQOcP1C5UEq6ix1XgqcqgI.aLzyInWyhlu', 'd1COjAeVSrp8EtzF8amYCqYlo3q1Z7YY7JwPoYUW', 0, '2021-05-14 11:09:48', '2021-05-14 11:09:48'),
(34, 12, 'salah ben salah', 'salahbensalah@gmail.com', '2021-05-14', 'Male', 1, 26753381, '$2y$10$jafYmidPfjlppHm3C38fQOcP1C5UEq6ix1XgqcqgI.aLzyInWyhlu', 'V8PPkXaahTgSVuFic6wRpwIBkOYfApLp1uKmxGR6ws66qlZeWGAXkDlAHqx8', 0, '2021-05-14 11:42:44', '2021-05-14 13:50:18'),
(35, 12, 'majid ayari ', 'majidayari@gmail.com', '1978-11-15', 'Male', 1, 26753381, '$2y$10$GwB3pFsJKUAzCZLQsDAbK.drfBuALj34gdpYEDN8OZPXbdA86H5xe', 'r8SGUiL9L0xyth73JUCG2CEKndhVukvqcZYaMZ8ODYONM1QnZfes0O4Vffcj', 0, '2021-05-14 14:00:26', '2021-05-26 14:25:02'),
(36, 2, 'mohamed ben ali', 'mohamedbenali@gmail.com', '2021-05-14', 'Male', 1, 26753381, '$2y$10$BiLQkzRM95hxvZWExg6tSOBcTvP8hq5kc2FpvgAqZoAdKC/DcMSAC', '28suheCRsSTD7AdlAvaQhZ93B3UtiRsIbsVyDTgLTJbXfek1bHQqIsxH0Yau', 1, '2021-05-14 20:39:58', '2021-05-15 12:36:15'),
(37, 12, 'ali ryehi', 'aliryehi@gmail.com', '2021-05-15', 'Male', 1, 26753381, '$2y$10$PhdrAscwPPOvSCci.Atub.iFDzXkMxdNrBnP6R1iuKdqYPIlGOxlC', 'IlFDXyciEfMYD8peSx0ORUBZyCg2B0gQ2Xa4fuWAK5fN9npsXMxuYmMluDOS', 0, '2021-05-15 14:22:17', '2021-05-27 19:15:09'),
(38, 2, 'aziz rbii', 'aziz.rbii@gmail.com', '2021-05-15', 'Male', 1, 26753381, '$2y$10$V.5vdod7OcSFgUG/yBFiiuxos4L/TmOxX.DVP9mJXCWcM5Cp3Qm0.', 'I5v4gA2MMUy6Jpqh2ean3JBfU66K6s21AR099b6Wn0JMazshwXACGUR4jz1j', 1, '2021-05-15 14:27:14', '2021-05-29 12:23:35'),
(39, 10, 'aziztoubib', 'aziztoubib@gmail.com', '2021-05-16', 'Male', 1, 26753381, '$2y$10$V.2ZNtU9M29SIO7YsGcBo.y29viGCLuBdPGujjvrmI5oqo.dDFiI6', 'Oo2hDspUysvc3QPxjvZjKkj8HdXklHkS2KdMwjU0mY4TnzzASjhpK9m0b9qw', 0, '2021-05-16 19:31:49', '2021-05-16 19:32:33'),
(40, 12, 'salah', 'salah@gmail.com', '2021-05-28', 'Male', 1, 267533891, '$2y$10$AzaJ5LgPpKKExqt.mwMrWuK4//AN3SIs1R4se7sMgAT7.iSIpQJyq', 'PJs9iGNAFZcudZOFDdLaludc8PxQ73ZlflResDbOHsLVR0LrPmPZH3ZDz1uz', 0, '2021-05-28 14:35:48', '2021-05-29 12:01:48'),
(41, 12, 'montassar rbii', 'montassarrbii@gmail.com', '2021-05-28', 'Male', 1, 26778899, '$2y$10$8eeAo6d6vExHwjkVwXqJf.1hhhxdupeQiqBOw42wy6aVqGmg80zVe', 'jxTMRThPTpougcm9B9fdJSpU7bMuz7nBnXOGmdLR57DWvCBypzmbqeN35bFM', 0, '2021-05-28 14:52:18', '2021-05-28 14:53:35'),
(42, 12, 'mourad ', 'mourad@gmail.com', '2021-05-29', 'Male', 1, 22255669, '$2y$10$N44JTtZRbkirR/VN6kdr.OAp7QR/w670x1gUrNRi5UUyB2loFPHI2', 'OZSTi7KEt85mRA4zeBAbgh8HulgKMbIUOzivxiWANDvkfohnhhYmXaW8y8uc', 0, '2021-05-29 12:11:39', '2021-05-29 12:17:41');

-- --------------------------------------------------------

--
-- Structure de la table `users_logs`
--

CREATE TABLE `users_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action_model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users_logs`
--

INSERT INTO `users_logs` (`id`, `user_id`, `action`, `action_model`, `action_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'updated', 'users', 1, '2016-10-03 08:08:40', '2016-10-03 08:08:40'),
(2, 1, 'updated', 'users', 1, '2016-10-03 08:27:02', '2016-10-03 08:27:02'),
(3, 1, 'updated', 'users', 1, '2016-10-03 11:29:21', '2016-10-03 11:29:21'),
(4, 1, 'updated', 'users', 1, '2016-10-03 11:47:55', '2016-10-03 11:47:55'),
(5, 1, 'updated', 'users', 1, '2016-10-04 07:31:44', '2016-10-04 07:31:44'),
(6, 1, 'updated', 'users', 1, '2016-10-04 08:11:53', '2016-10-04 08:11:53'),
(7, 1, 'updated', 'users', 1, '2016-10-06 08:41:53', '2016-10-06 08:41:53'),
(9, 1, 'updated', 'users', 1, '2016-10-06 13:48:29', '2016-10-06 13:48:29'),
(10, 1, 'updated', 'users', 1, '2016-10-07 04:21:33', '2016-10-07 04:21:33'),
(11, 1, 'updated', 'users', 1, '2016-10-07 04:40:34', '2016-10-07 04:40:34'),
(12, 1, 'updated', 'users', 1, '2016-10-07 05:55:14', '2016-10-07 05:55:14'),
(16, 1, 'updated', 'users', 1, '2016-10-07 07:51:55', '2016-10-07 07:51:55'),
(17, 1, 'updated', 'users', 1, '2016-10-07 07:58:34', '2016-10-07 07:58:34'),
(18, 1, 'updated', 'users', 1, '2016-10-07 08:56:36', '2016-10-07 08:56:36'),
(19, 1, 'updated', 'users', 1, '2016-10-07 09:20:19', '2016-10-07 09:20:19'),
(20, 1, 'updated', 'users', 1, '2016-10-07 09:20:40', '2016-10-07 09:20:40'),
(21, 1, 'updated', 'users', 1, '2016-10-10 05:00:50', '2016-10-10 05:00:50'),
(22, 1, 'updated', 'users', 1, '2016-10-10 05:06:01', '2016-10-10 05:06:01'),
(23, 1, 'updated', 'users', 1, '2016-10-10 05:10:53', '2016-10-10 05:10:53'),
(24, 1, 'updated', 'users', 1, '2016-10-10 05:11:17', '2016-10-10 05:11:17'),
(25, 1, 'updated', 'users', 1, '2016-10-10 05:12:08', '2016-10-10 05:12:08'),
(26, 1, 'updated', 'users', 1, '2016-10-10 05:13:21', '2016-10-10 05:13:21'),
(27, 1, 'updated', 'users', 1, '2016-10-10 06:30:00', '2016-10-10 06:30:00'),
(28, 1, 'updated', 'users', 1, '2016-10-10 06:49:59', '2016-10-10 06:49:59'),
(29, 1, 'updated', 'users', 1, '2016-10-10 07:52:58', '2016-10-10 07:52:58'),
(36, 1, 'created', 't1blelanguage', 1, '2016-10-10 11:54:38', '2016-10-10 11:54:38'),
(37, 1, 'created', 't1blelanguage', 2, '2016-10-10 11:55:01', '2016-10-10 11:55:01'),
(38, 1, 'created', 't1blelanguage', 3, '2016-10-10 11:55:14', '2016-10-10 11:55:14'),
(40, 1, 'created', 'users', 2, '2016-10-11 05:00:43', '2016-10-11 05:00:43'),
(41, 1, 'created', 'users', 3, '2016-10-11 05:01:02', '2016-10-11 05:01:02'),
(42, 1, 'updated', 'users', 1, '2016-10-11 05:01:05', '2016-10-11 05:01:05'),
(43, 1, 'updated', 'users', 2, '2016-10-11 05:01:27', '2016-10-11 05:01:27'),
(44, 1, 'updated', 'users', 3, '2016-10-11 05:38:55', '2016-10-11 05:38:55'),
(45, 1, 'updated', 't1blelanguage', 1, '2016-10-11 11:11:55', '2016-10-11 11:11:55'),
(46, 1, 'updated', 't1blelanguage', 1, '2016-10-11 11:13:04', '2016-10-11 11:13:04'),
(58, 1, 'created', 't1blelanguage', 4, '2016-10-12 06:09:21', '2016-10-12 06:09:21'),
(59, 1, 'deleted', 't1blelanguage', 4, '2016-10-12 06:09:32', '2016-10-12 06:09:32'),
(60, 1, 'updated', 'users', 1, '2016-10-12 10:07:12', '2016-10-12 10:07:12'),
(61, 1, 'deleted', 'users', 2, '2016-11-07 06:35:48', '2016-11-07 06:35:48'),
(62, 1, 'deleted', 'users', 3, '2016-11-07 06:35:51', '2016-11-07 06:35:51'),
(63, 1, 'updated', 'users', 1, '2016-11-07 06:47:59', '2016-11-07 06:47:59'),
(64, 1, 'updated', 'users', 1, '2016-11-07 06:48:15', '2016-11-07 06:48:15'),
(65, 1, 'updated', 'users', 1, '2016-11-07 08:29:22', '2016-11-07 08:29:22'),
(66, 1, 'updated', 'users', 1, '2016-11-07 10:35:04', '2016-11-07 10:35:04'),
(67, 1, 'created', 'offertype', 1, '2016-11-21 12:35:33', '2016-11-21 12:35:33'),
(68, 1, 'created', 'offertype', 2, '2016-11-21 12:37:04', '2016-11-21 12:37:04'),
(69, 1, 'created', 'offertype', 3, '2016-11-21 12:37:53', '2016-11-21 12:37:53'),
(70, 1, 'created', 'offertype', 4, '2016-11-21 12:38:55', '2016-11-21 12:38:55'),
(71, 1, 'created', 'structuretype', 1, '2016-11-21 12:52:35', '2016-11-21 12:52:35'),
(72, 1, 'created', 'structuretype', 2, '2016-11-21 12:53:03', '2016-11-21 12:53:03'),
(73, 1, 'created', 'structuretype', 3, '2016-11-21 12:53:16', '2016-11-21 12:53:16'),
(74, 1, 'created', 'structuretype', 4, '2016-11-21 12:53:31', '2016-11-21 12:53:31'),
(75, 1, 'updated', 'users', 1, '2016-11-28 10:40:51', '2016-11-28 10:40:51'),
(76, 1, 'updated', 'users', 1, '2016-12-13 11:45:19', '2016-12-13 11:45:19'),
(77, 1, 'created', 'users', 2, '2016-12-29 11:55:42', '2016-12-29 11:55:42'),
(78, 1, 'updated', 'users', 1, '2016-12-30 06:26:11', '2016-12-30 06:26:11'),
(79, 1, 'updated', 'users', 1, '2017-01-17 06:56:08', '2017-01-17 06:56:08'),
(80, 1, 'created', 'question', 1, '2017-01-19 07:01:40', '2017-01-19 07:01:40'),
(81, 1, 'deleted', 'question', 1, '2017-01-19 07:01:51', '2017-01-19 07:01:51'),
(82, 1, 'updated', 't1blelanguage', 2, '2017-01-19 10:08:53', '2017-01-19 10:08:53'),
(83, 1, 'updated', 't1blelanguage', 1, '2017-01-19 10:09:09', '2017-01-19 10:09:09'),
(84, 1, 'updated', 't1blelanguage', 3, '2017-01-19 10:09:17', '2017-01-19 10:09:17'),
(85, 1, 'created', 't1blelanguage', 5, '2017-01-19 10:10:25', '2017-01-19 10:10:25'),
(86, 1, 'updated', 't1blelanguage', 1, '2017-01-19 10:10:49', '2017-01-19 10:10:49'),
(87, 1, 'created', 't1blelanguage', 6, '2017-01-19 10:11:37', '2017-01-19 10:11:37'),
(88, 1, 'created', 't1blelanguage', 7, '2017-01-19 10:12:14', '2017-01-19 10:12:14'),
(89, 1, 'created', 'typecontact', 1, '2017-01-23 04:08:04', '2017-01-23 04:08:04'),
(90, 1, 'updated', 'typecontact', 1, '2017-01-23 04:08:53', '2017-01-23 04:08:53'),
(91, 1, 'updated', 'typecontact', 1, '2017-01-23 04:08:59', '2017-01-23 04:08:59'),
(92, 1, 'updated', 'typecontact', 1, '2017-01-23 05:55:08', '2017-01-23 05:55:08'),
(93, 1, 'updated', 'typecontact', 1, '2017-01-23 05:55:13', '2017-01-23 05:55:13'),
(94, 1, 'updated', 'typecontact', 1, '2017-01-23 06:00:17', '2017-01-23 06:00:17'),
(95, 1, 'updated', 'typecontact', 1, '2017-01-23 06:00:22', '2017-01-23 06:00:22'),
(96, 1, 'updated', 'typecontact', 1, '2017-01-23 06:02:54', '2017-01-23 06:02:54'),
(97, 1, 'updated', 'typecontact', 1, '2017-01-23 06:02:59', '2017-01-23 06:02:59'),
(98, 1, 'updated', 'typecontact', 1, '2017-01-23 06:03:55', '2017-01-23 06:03:55'),
(99, 1, 'created', 'activitytype', 1, '2017-01-23 07:23:55', '2017-01-23 07:23:55'),
(100, 1, 'updated', 'activitytype', 1, '2017-01-23 07:24:08', '2017-01-23 07:24:08'),
(101, 1, 'updated', 'activitytype', 1, '2017-01-23 07:24:28', '2017-01-23 07:24:28'),
(102, 1, 'updated', 'activitytype', 1, '2017-01-23 09:11:02', '2017-01-23 09:11:02'),
(103, 1, 'updated', 'activitytype', 1, '2017-01-23 09:11:10', '2017-01-23 09:11:10'),
(104, 1, 'created', 'activitytype', 2, '2017-01-23 09:11:21', '2017-01-23 09:11:21'),
(105, 1, 'updated', 'activitytype', 2, '2017-01-23 09:11:28', '2017-01-23 09:11:28'),
(106, 1, 'updated', 'activitytype', 2, '2017-01-23 09:11:33', '2017-01-23 09:11:33'),
(107, 1, 'updated', 'activitytype', 2, '2017-01-23 09:11:56', '2017-01-23 09:11:56'),
(108, 1, 'updated', 'activitytype', 2, '2017-01-23 09:12:00', '2017-01-23 09:12:00'),
(109, 1, 'updated', 'activitytype', 2, '2017-01-23 09:12:31', '2017-01-23 09:12:31'),
(110, 1, 'created', 'actuality', 1, '2017-01-23 10:32:23', '2017-01-23 10:32:23'),
(111, 1, 'updated', 'actuality', 1, '2017-01-23 10:33:17', '2017-01-23 10:33:17'),
(112, 1, 'updated', 'actuality', 1, '2017-01-23 10:33:22', '2017-01-23 10:33:22'),
(113, 1, 'deleted', 'actuality', 1, '2017-01-23 10:33:35', '2017-01-23 10:33:35'),
(114, 1, 'created', 'zone', 1, '2017-02-06 06:48:54', '2017-02-06 06:48:54'),
(115, 1, 'created', 'pays', 1, '2017-02-06 06:49:13', '2017-02-06 06:49:13'),
(116, 1, 'created', 'patient', 1, '2017-02-06 06:53:43', '2017-02-06 06:53:43'),
(117, 1, 'created', 'allergytype', 1, '2017-02-06 07:11:39', '2017-02-06 07:11:39'),
(118, 1, 'updated', 'allergytype', 1, '2017-02-06 07:11:46', '2017-02-06 07:11:46'),
(119, 1, 'updated', 'allergytype', 1, '2017-02-06 07:11:50', '2017-02-06 07:11:50'),
(120, 1, 'created', 'historyallergy', 1, '2017-02-06 07:12:19', '2017-02-06 07:12:19'),
(121, 1, 'updated', 'users', 1, '2017-02-16 06:15:13', '2017-02-16 06:15:13'),
(122, 1, 'updated', 'users', 1, '2017-02-16 07:07:26', '2017-02-16 07:07:26'),
(123, 1, 'created', 'typeinsurrance', 1, '2017-02-16 08:49:11', '2017-02-16 08:49:11'),
(124, 1, 'created', 'typeinsurrance', 2, '2017-02-16 08:49:32', '2017-02-16 08:49:32'),
(125, 1, 'created', 'typeinsurrance', 3, '2017-02-16 08:49:47', '2017-02-16 08:49:47'),
(126, 1, 'created', 'staffmedicaltype', 1, '2017-02-16 11:44:53', '2017-02-16 11:44:53'),
(127, 1, 'created', 'staffmedicaltype', 2, '2017-02-16 11:45:41', '2017-02-16 11:45:41'),
(128, 1, 'created', 'staffmedicaltype', 3, '2017-02-16 11:46:23', '2017-02-16 11:46:23'),
(129, 1, 'updated', 'staffmedicaltype', 2, '2017-02-16 11:46:34', '2017-02-16 11:46:34'),
(130, 1, 'updated', 'staffmedicaltype', 1, '2017-02-16 11:46:44', '2017-02-16 11:46:44'),
(131, 1, 'created', 'speciality', 1, '2017-02-16 11:49:40', '2017-02-16 11:49:40'),
(132, 1, 'created', 'speciality', 2, '2017-02-16 11:49:56', '2017-02-16 11:49:56'),
(133, 1, 'updated', 'users', 1, '2017-02-27 06:37:43', '2017-02-27 06:37:43'),
(134, 1, 'updated', 'users', 1, '2017-04-19 06:27:12', '2017-04-19 06:27:12'),
(135, 2, 'updated', 'users', 2, '2017-05-23 04:41:35', '2017-05-23 04:41:35'),
(136, 2, 'updated', 'users', 2, '2017-09-22 18:09:38', '2017-09-22 18:09:38'),
(137, 1, 'updated', 'users', 1, '2017-09-22 18:10:24', '2017-09-22 18:10:24'),
(138, 1, 'updated', 'users', 1, '2017-09-22 18:10:28', '2017-09-22 18:10:28'),
(139, 1, 'updated', 'users', 1, '2017-09-22 18:12:57', '2017-09-22 18:12:57'),
(140, 1, 'updated', 'users', 1, '2018-04-28 11:29:27', '2018-04-28 11:29:27'),
(141, 1, 'updated', 'users', 1, '2018-05-05 09:00:02', '2018-05-05 09:00:02'),
(142, 1, 'created', 'wafa1', 1, '2018-05-05 09:12:25', '2018-05-05 09:12:25'),
(143, 1, 'deleted', 'zone', 1, '2018-05-05 09:14:03', '2018-05-05 09:14:03'),
(144, 1, 'updated', 'users', 1, '2018-05-27 12:11:26', '2018-05-27 12:11:26'),
(145, 1, 'updated', 'users', 1, '2018-06-01 15:36:45', '2018-06-01 15:36:45'),
(146, 1, 'updated', 't1blelanguage', 7, '2018-06-01 15:38:26', '2018-06-01 15:38:26'),
(147, 1, 'updated', 't1blelanguage', 6, '2018-06-01 15:38:42', '2018-06-01 15:38:42'),
(148, 1, 'created', 'tva', 1, '2018-06-01 15:41:12', '2018-06-01 15:41:12'),
(149, 1, 'updated', 'tva', 1, '2018-06-01 15:41:18', '2018-06-01 15:41:18'),
(150, 1, 'updated', 'users', 1, '2018-06-02 14:21:21', '2018-06-02 14:21:21'),
(151, 1, 'updated', 'users', 1, '2018-06-02 14:29:04', '2018-06-02 14:29:04'),
(152, 1, 'created', 'users', 3, '2018-06-16 12:50:40', '2018-06-16 12:50:40'),
(153, 1, 'updated', 'users', 1, '2018-06-16 12:50:45', '2018-06-16 12:50:45'),
(154, 1, 'created', 'structuretype', 1, '2021-05-02 09:01:24', '2021-05-02 09:01:24'),
(155, 1, 'created', 'structuretype', 2, '2021-05-02 09:02:04', '2021-05-02 09:02:04'),
(156, 1, 'created', 'structuretype', 3, '2021-05-02 09:02:41', '2021-05-02 09:02:41'),
(157, 1, 'created', 'medicalstructure', 1, '2021-05-02 09:27:58', '2021-05-02 09:27:58'),
(158, 1, 'created', 'medicalstructure', 2, '2021-05-02 09:30:48', '2021-05-02 09:30:48'),
(159, 1, 'created', 'medicalstructure', 1, '2021-05-02 09:51:10', '2021-05-02 09:51:10'),
(160, 1, 'created', 'structuretype', 1, '2021-05-02 10:03:09', '2021-05-02 10:03:09'),
(161, 1, 'created', 'structuretype', 2, '2021-05-02 10:03:49', '2021-05-02 10:03:49'),
(162, 1, 'created', 'medicalstructure', 1, '2021-05-02 10:04:33', '2021-05-02 10:04:33'),
(163, 1, 'created', 'medicalstructure', 1, '2021-05-02 10:12:20', '2021-05-02 10:12:20'),
(164, 1, 'updated', 'medicalstructure', 1, '2021-05-02 10:13:09', '2021-05-02 10:13:09'),
(165, 1, 'updated', 'medicalstructure', 1, '2021-05-02 10:15:29', '2021-05-02 10:15:29'),
(166, 1, 'updated', 'medicalstructure', 1, '2021-05-02 10:15:56', '2021-05-02 10:15:56'),
(167, 1, 'updated', 'medicalstructure', 1, '2021-05-02 10:29:45', '2021-05-02 10:29:45'),
(168, 1, 'updated', 'medicalstructure', 1, '2021-05-02 10:30:15', '2021-05-02 10:30:15'),
(169, 1, 'updated', 'medicalstructure', 1, '2021-05-02 10:43:55', '2021-05-02 10:43:55'),
(170, 1, 'created', 'medicalstructure', 1, '2021-05-02 10:51:27', '2021-05-02 10:51:27'),
(171, 1, 'updated', 'medicalstructure', 1, '2021-05-02 10:53:09', '2021-05-02 10:53:09'),
(172, 1, 'created', 'medicalstructurespeciality', 1, '2021-05-02 11:03:45', '2021-05-02 11:03:45'),
(173, 1, 'created', 'medicalstructurespeciality', 2, '2021-05-02 11:04:03', '2021-05-02 11:04:03'),
(174, 1, 'created', 'speciality', 3, '2021-05-02 11:05:50', '2021-05-02 11:05:50'),
(175, 1, 'updated', 'users', 1, '2021-05-02 15:19:48', '2021-05-02 15:19:48'),
(176, 1, 'created', 'medicalstructure', 2, '2021-05-02 19:44:43', '2021-05-02 19:44:43'),
(177, 1, 'created', 'medicalstructure', 3, '2021-05-02 19:48:56', '2021-05-02 19:48:56'),
(178, 1, 'created', 'medicalstructure', 4, '2021-05-02 19:49:22', '2021-05-02 19:49:22'),
(179, 1, 'created', 'medicalstructure', 5, '2021-05-02 19:50:03', '2021-05-02 19:50:03'),
(180, 1, 'created', 'medicalstructure', 6, '2021-05-02 19:50:27', '2021-05-02 19:50:27'),
(181, 1, 'created', 'medicalstructure', 7, '2021-05-02 19:54:11', '2021-05-02 19:54:11'),
(182, 1, 'created', 'medicalstructure', 8, '2021-05-02 19:55:55', '2021-05-02 19:55:55'),
(183, 1, 'created', 'medicalstructurespeciality', 3, '2021-05-02 19:55:55', '2021-05-02 19:55:55'),
(184, 1, 'created', 'medicalstructure', 9, '2021-05-02 19:58:22', '2021-05-02 19:58:22'),
(185, 1, 'created', 'medicalstructurespeciality', 4, '2021-05-02 19:58:22', '2021-05-02 19:58:22'),
(186, 1, 'created', 'medicalstructurespeciality', 5, '2021-05-02 19:58:22', '2021-05-02 19:58:22'),
(187, 1, 'created', 'medicalstructurespeciality', 6, '2021-05-02 19:58:22', '2021-05-02 19:58:22'),
(188, 1, 'created', 'zone', 1, '2021-05-02 21:16:31', '2021-05-02 21:16:31'),
(189, 1, 'created', 'zone', 2, '2021-05-02 21:17:10', '2021-05-02 21:17:10'),
(190, 1, 'created', 'country', 1, '2021-05-02 21:22:19', '2021-05-02 21:22:19'),
(191, 1, 'created', 'country', 2, '2021-05-02 21:23:31', '2021-05-02 21:23:31'),
(192, 1, 'updated', 'users', 1, '2021-05-02 22:30:56', '2021-05-02 22:30:56'),
(193, 1, 'updated', 'users', 1, '2021-05-02 22:34:03', '2021-05-02 22:34:03'),
(194, 1, 'updated', 'users', 1, '2021-05-03 10:16:38', '2021-05-03 10:16:38'),
(195, 1, 'created', 'patient', 1, '2021-05-03 12:12:45', '2021-05-03 12:12:45'),
(196, 1, 'updated', 'users', 1, '2021-05-03 12:13:07', '2021-05-03 12:13:07'),
(197, 1, 'updated', 'users', 1, '2021-05-03 12:27:58', '2021-05-03 12:27:58'),
(198, 1, 'updated', 'users', 1, '2021-05-03 13:33:32', '2021-05-03 13:33:32'),
(199, 1, 'created', 'appoitement', 1, '2021-05-03 14:06:05', '2021-05-03 14:06:05'),
(200, 1, 'updated', 'users', 1, '2021-05-03 14:06:52', '2021-05-03 14:06:52'),
(201, 6, 'updated', 'users', 6, '2021-05-03 14:20:13', '2021-05-03 14:20:13'),
(202, 3, 'updated', 'users', 3, '2021-05-03 14:45:50', '2021-05-03 14:45:50'),
(203, 3, 'updated', 'users', 3, '2021-05-03 14:47:47', '2021-05-03 14:47:47'),
(204, 5, 'updated', 'users', 5, '2021-05-03 14:50:43', '2021-05-03 14:50:43'),
(205, 1, 'updated', 'users', 1, '2021-05-03 14:51:39', '2021-05-03 14:51:39'),
(206, 5, 'updated', 'users', 5, '2021-05-03 14:52:21', '2021-05-03 14:52:21'),
(207, 2, 'updated', 'users', 2, '2021-05-03 14:56:47', '2021-05-03 14:56:47'),
(208, 2, 'updated', 'users', 2, '2021-05-03 14:59:34', '2021-05-03 14:59:34'),
(209, 6, 'updated', 'users', 6, '2021-05-03 15:01:48', '2021-05-03 15:01:48'),
(210, 3, 'updated', 'users', 3, '2021-05-03 15:03:59', '2021-05-03 15:03:59'),
(211, 5, 'created', 'appoitement', 2, '2021-05-03 15:10:18', '2021-05-03 15:10:18'),
(212, 5, 'updated', 'users', 5, '2021-05-03 15:10:42', '2021-05-03 15:10:42'),
(213, 5, 'updated', 'users', 5, '2021-05-03 15:11:00', '2021-05-03 15:11:00'),
(214, 3, 'updated', 'users', 3, '2021-05-03 15:17:07', '2021-05-03 15:17:07'),
(215, 3, 'updated', 'appoitement', 2, '2021-05-03 15:18:02', '2021-05-03 15:18:02'),
(216, 3, 'updated', 'users', 3, '2021-05-03 15:22:48', '2021-05-03 15:22:48'),
(217, 1, 'updated', 'users', 1, '2021-05-03 15:31:02', '2021-05-03 15:31:02'),
(218, 3, 'updated', 'users', 3, '2021-05-03 15:36:19', '2021-05-03 15:36:19'),
(219, 3, 'updated', 'users', 3, '2021-05-03 16:04:48', '2021-05-03 16:04:48'),
(220, 1, 'updated', 'users', 1, '2021-05-03 16:08:15', '2021-05-03 16:08:15'),
(221, 3, 'created', 'consultation', 1, '2021-05-03 16:09:14', '2021-05-03 16:09:14'),
(222, 3, 'created', 'consultation', 2, '2021-05-03 16:10:23', '2021-05-03 16:10:23'),
(223, 3, 'created', 'consultation', 3, '2021-05-03 16:24:17', '2021-05-03 16:24:17'),
(224, 3, 'updated', 'users', 3, '2021-05-03 22:22:57', '2021-05-03 22:22:57'),
(225, 1, 'updated', 'users', 1, '2021-05-03 22:54:41', '2021-05-03 22:54:41'),
(226, 3, 'updated', 'users', 3, '2021-05-03 23:02:44', '2021-05-03 23:02:44'),
(227, 6, 'updated', 'users', 6, '2021-05-03 23:08:08', '2021-05-03 23:08:08'),
(228, 3, 'updated', 'users', 3, '2021-05-03 23:10:05', '2021-05-03 23:10:05'),
(229, 6, 'updated', 'users', 6, '2021-05-03 23:12:49', '2021-05-03 23:12:49'),
(230, 5, 'updated', 'users', 5, '2021-05-03 23:13:07', '2021-05-03 23:13:07'),
(231, 1, 'updated', 'users', 1, '2021-05-03 23:14:19', '2021-05-03 23:14:19'),
(232, 5, 'updated', 'users', 5, '2021-05-03 23:15:39', '2021-05-03 23:15:39'),
(233, 2, 'updated', 'users', 2, '2021-05-03 23:16:04', '2021-05-03 23:16:04'),
(234, 3, 'updated', 'users', 3, '2021-05-03 23:26:42', '2021-05-03 23:26:42'),
(235, 3, 'created', 'generalexam', 1, '2021-05-03 23:30:01', '2021-05-03 23:30:01'),
(236, 3, 'updated', 'users', 3, '2021-05-03 23:32:47', '2021-05-03 23:32:47'),
(237, 1, 'updated', 'users', 1, '2021-05-03 23:36:16', '2021-05-03 23:36:16'),
(238, 3, 'updated', 'users', 3, '2021-05-03 23:39:39', '2021-05-03 23:39:39'),
(239, 1, 'updated', 'users', 1, '2021-05-03 23:45:33', '2021-05-03 23:45:33'),
(240, 3, 'created', 'generalexam', 1, '2021-05-03 23:49:24', '2021-05-03 23:49:24'),
(241, 3, 'created', 'generalexam', 2, '2021-05-03 23:53:30', '2021-05-03 23:53:30'),
(242, 3, 'updated', 'users', 3, '2021-05-04 00:19:24', '2021-05-04 00:19:24'),
(243, 3, 'created', 'generalexam', 3, '2021-05-04 00:25:15', '2021-05-04 00:25:15'),
(244, 2, 'updated', 'users', 2, '2021-05-04 13:53:18', '2021-05-04 13:53:18'),
(245, 1, 'created', 'users', 8, '2021-05-04 14:13:57', '2021-05-04 14:13:57'),
(246, 1, 'updated', 'users', 1, '2021-05-04 14:30:50', '2021-05-04 14:30:50'),
(247, 1, 'created', 'medicalstructure', 10, '2021-05-04 15:52:56', '2021-05-04 15:52:56'),
(248, 1, 'created', 'medicalstructurespeciality', 7, '2021-05-04 15:52:56', '2021-05-04 15:52:56'),
(249, 1, 'created', 'medicalstructurespeciality', 8, '2021-05-04 15:52:56', '2021-05-04 15:52:56'),
(250, 1, 'created', 'medicalstaff', 0, '2021-05-04 15:55:22', '2021-05-04 15:55:22'),
(251, 1, 'created', 'medicalstaff', 0, '2021-05-04 16:01:47', '2021-05-04 16:01:47'),
(252, 1, 'created', 'medicalstaff', 1, '2021-05-04 16:14:43', '2021-05-04 16:14:43'),
(253, 1, 'created', 'medicalstaff', 2, '2021-05-04 16:24:42', '2021-05-04 16:24:42'),
(254, 1, 'updated', 'users', 1, '2021-05-04 16:25:02', '2021-05-04 16:25:02'),
(255, 8, 'updated', 'users', 8, '2021-05-04 16:31:09', '2021-05-04 16:31:09'),
(256, 1, 'created', 'medicalstaff', 3, '2021-05-04 16:32:06', '2021-05-04 16:32:06'),
(257, 1, 'created', 'medicalstaff', 4, '2021-05-04 16:34:02', '2021-05-04 16:34:02'),
(258, 1, 'updated', 'users', 1, '2021-05-04 16:34:16', '2021-05-04 16:34:16'),
(259, 1, 'updated', 'users', 1, '2021-05-04 20:00:48', '2021-05-04 20:00:48'),
(260, 8, 'updated', 'users', 8, '2021-05-04 20:12:14', '2021-05-04 20:12:14'),
(261, 1, 'created', 'medicalstaff', 5, '2021-05-04 20:14:26', '2021-05-04 20:14:26'),
(262, 1, 'updated', 'users', 1, '2021-05-04 20:14:41', '2021-05-04 20:14:41'),
(263, 8, 'created', 'medicalstaff', 6, '2021-05-04 20:23:01', '2021-05-04 20:23:01'),
(264, 8, 'updated', 'users', 8, '2021-05-04 20:23:30', '2021-05-04 20:23:30'),
(265, 9, 'updated', 'users', 9, '2021-05-04 20:36:28', '2021-05-04 20:36:28'),
(266, 5, 'created', 'appoitement', 3, '2021-05-04 20:46:27', '2021-05-04 20:46:27'),
(267, 5, 'created', 'appoitement', 4, '2021-05-04 20:51:14', '2021-05-04 20:51:14'),
(268, 5, 'created', 'appoitement', 5, '2021-05-04 20:51:37', '2021-05-04 20:51:37'),
(269, 5, 'updated', 'users', 5, '2021-05-04 20:52:14', '2021-05-04 20:52:14'),
(270, 5, 'created', 'appoitement', 6, '2021-05-04 20:53:34', '2021-05-04 20:53:34'),
(271, 5, 'created', 'appoitement', 7, '2021-05-04 20:53:34', '2021-05-04 20:53:34'),
(272, 5, 'created', 'appoitement', 8, '2021-05-04 21:04:33', '2021-05-04 21:04:33'),
(273, 5, 'updated', 'users', 5, '2021-05-04 21:05:44', '2021-05-04 21:05:44'),
(274, 5, 'deleted', 'appoitement', 1, '2021-05-04 21:06:17', '2021-05-04 21:06:17'),
(275, 5, 'updated', 'users', 5, '2021-05-04 21:06:58', '2021-05-04 21:06:58'),
(276, 5, 'updated', 'users', 5, '2021-05-04 21:09:25', '2021-05-04 21:09:25'),
(277, 1, 'created', 'appoitement', 9, '2021-05-04 21:16:37', '2021-05-04 21:16:37'),
(278, 1, 'created', 'appoitement', 10, '2021-05-04 21:19:17', '2021-05-04 21:19:17'),
(279, 1, 'updated', 'users', 1, '2021-05-04 21:20:43', '2021-05-04 21:20:43'),
(280, 5, 'created', 'appoitement', 11, '2021-05-04 21:21:44', '2021-05-04 21:21:44'),
(281, 5, 'updated', 'users', 5, '2021-05-04 21:24:47', '2021-05-04 21:24:47'),
(282, 9, 'updated', 'appoitement', 11, '2021-05-04 21:26:19', '2021-05-04 21:26:19'),
(283, 9, 'updated', 'users', 9, '2021-05-04 21:26:38', '2021-05-04 21:26:38'),
(284, 5, 'created', 'appoitement', 12, '2021-05-04 21:27:12', '2021-05-04 21:27:12'),
(285, 5, 'updated', 'users', 5, '2021-05-04 21:27:23', '2021-05-04 21:27:23'),
(286, 9, 'updated', 'users', 9, '2021-05-04 21:27:56', '2021-05-04 21:27:56'),
(287, 1, 'updated', 'appoitement', 12, '2021-05-04 21:30:15', '2021-05-04 21:30:15'),
(288, 1, 'updated', 'users', 1, '2021-05-04 21:30:20', '2021-05-04 21:30:20'),
(289, 3, 'updated', 'users', 3, '2021-05-04 21:46:18', '2021-05-04 21:46:18'),
(290, 3, 'updated', 'users', 3, '2021-05-04 21:50:37', '2021-05-04 21:50:37'),
(291, 3, 'updated', 'appoitement', 11, '2021-05-04 21:52:02', '2021-05-04 21:52:02'),
(292, 3, 'updated', 'appoitement', 12, '2021-05-04 21:59:33', '2021-05-04 21:59:33'),
(293, 3, 'updated', 'users', 3, '2021-05-04 22:15:26', '2021-05-04 22:15:26'),
(294, 1, 'updated', 'users', 1, '2021-05-04 22:15:56', '2021-05-04 22:15:56'),
(295, 3, 'created', 'consultation', 4, '2021-05-04 22:36:19', '2021-05-04 22:36:19'),
(296, 3, 'deleted', 'consultation', 4, '2021-05-04 22:37:19', '2021-05-04 22:37:19'),
(297, 3, 'created', 'consultation', 5, '2021-05-04 22:37:54', '2021-05-04 22:37:54'),
(298, 3, 'created', 'consultation', 6, '2021-05-04 22:38:36', '2021-05-04 22:38:36'),
(299, 3, 'created', 'consultation', 7, '2021-05-05 09:24:25', '2021-05-05 09:24:25'),
(300, 3, 'created', 'generalexam', 4, '2021-05-05 09:25:49', '2021-05-05 09:25:49'),
(301, 3, 'updated', 'users', 3, '2021-05-05 09:32:22', '2021-05-05 09:32:22'),
(302, 1, 'updated', 'users', 1, '2021-05-05 09:42:36', '2021-05-05 09:42:36'),
(303, 12, 'updated', 'users', 12, '2021-05-05 10:36:05', '2021-05-05 10:36:05'),
(304, 1, 'updated', 'users', 1, '2021-05-05 13:03:49', '2021-05-05 13:03:49'),
(305, 5, 'created', 'appoitement', 13, '2021-05-05 13:05:51', '2021-05-05 13:05:51'),
(306, 5, 'created', 'appoitement', 14, '2021-05-05 13:06:19', '2021-05-05 13:06:19'),
(307, 5, 'updated', 'users', 5, '2021-05-05 13:06:31', '2021-05-05 13:06:31'),
(308, 9, 'updated', 'appoitement', 14, '2021-05-05 13:07:20', '2021-05-05 13:07:20'),
(309, 9, 'updated', 'users', 9, '2021-05-05 13:07:32', '2021-05-05 13:07:32'),
(310, 6, 'updated', 'appoitement', 14, '2021-05-05 13:08:24', '2021-05-05 13:08:24'),
(311, 6, 'created', 'consultation', 8, '2021-05-05 13:08:56', '2021-05-05 13:08:56'),
(312, 6, 'updated', 'users', 6, '2021-05-05 13:09:26', '2021-05-05 13:09:26'),
(313, 1, 'created', 'country', 3, '2021-05-05 13:11:08', '2021-05-05 13:11:08'),
(314, 1, 'created', 'medicalstructure', 11, '2021-05-05 13:25:54', '2021-05-05 13:25:54'),
(315, 1, 'created', 'medicalstructurespeciality', 9, '2021-05-05 13:25:54', '2021-05-05 13:25:54'),
(316, 1, 'created', 'medicalstructurespeciality', 10, '2021-05-05 13:25:54', '2021-05-05 13:25:54'),
(317, 1, 'created', 'users', 19, '2021-05-06 18:04:59', '2021-05-06 18:04:59'),
(318, 1, 'updated', 'users', 1, '2021-05-06 18:05:58', '2021-05-06 18:05:58'),
(319, 1, 'updated', 'users', 1, '2021-05-06 18:06:19', '2021-05-06 18:06:19'),
(320, 19, 'updated', 'users', 19, '2021-05-06 18:06:39', '2021-05-06 18:06:39'),
(321, 1, 'updated', 'users', 1, '2021-05-06 18:07:23', '2021-05-06 18:07:23'),
(322, 19, 'created', 'medicalstructure', 12, '2021-05-06 18:08:37', '2021-05-06 18:08:37'),
(323, 19, 'created', 'medicalstructurespeciality', 11, '2021-05-06 18:08:37', '2021-05-06 18:08:37'),
(324, 19, 'created', 'medicalstructurespeciality', 12, '2021-05-06 18:08:37', '2021-05-06 18:08:37'),
(325, 19, 'updated', 'users', 19, '2021-05-06 18:09:00', '2021-05-06 18:09:00'),
(326, 1, 'updated', 'users', 1, '2021-05-06 18:10:00', '2021-05-06 18:10:00'),
(327, 1, 'created', 'medicalstructure', 13, '2021-05-06 18:11:16', '2021-05-06 18:11:16'),
(328, 1, 'created', 'medicalstructurespeciality', 13, '2021-05-06 18:11:16', '2021-05-06 18:11:16'),
(329, 1, 'created', 'medicalstructurespeciality', 14, '2021-05-06 18:11:16', '2021-05-06 18:11:16'),
(330, 1, 'updated', 'users', 1, '2021-05-06 18:13:17', '2021-05-06 18:13:17'),
(331, 1, 'deleted', 'medicalstaff', 6, '2021-05-06 18:16:31', '2021-05-06 18:16:31'),
(332, 1, 'created', 'medicalstaff', 7, '2021-05-06 18:18:19', '2021-05-06 18:18:19'),
(333, 1, 'updated', 'users', 1, '2021-05-06 18:18:33', '2021-05-06 18:18:33'),
(334, 5, 'created', 'appoitement', 15, '2021-05-06 18:19:12', '2021-05-06 18:19:12'),
(335, 5, 'updated', 'users', 5, '2021-05-06 18:19:38', '2021-05-06 18:19:38'),
(336, 9, 'updated', 'users', 9, '2021-05-06 18:24:24', '2021-05-06 18:24:24'),
(337, 1, 'created', 'medicalstaff', 8, '2021-05-06 18:25:11', '2021-05-06 18:25:11'),
(338, 1, 'created', 'medicalstaff', 9, '2021-05-06 18:26:22', '2021-05-06 18:26:22'),
(339, 1, 'updated', 'users', 1, '2021-05-06 18:26:34', '2021-05-06 18:26:34'),
(340, 5, 'created', 'appoitement', 16, '2021-05-06 18:27:12', '2021-05-06 18:27:12'),
(341, 5, 'updated', 'users', 5, '2021-05-06 18:27:42', '2021-05-06 18:27:42'),
(342, 9, 'updated', 'appoitement', 16, '2021-05-06 18:28:15', '2021-05-06 18:28:15'),
(343, 9, 'updated', 'users', 9, '2021-05-06 18:28:23', '2021-05-06 18:28:23'),
(344, 3, 'updated', 'appoitement', 16, '2021-05-06 18:29:05', '2021-05-06 18:29:05'),
(345, 3, 'created', 'consultation', 9, '2021-05-06 18:29:39', '2021-05-06 18:29:39'),
(346, 3, 'created', 'generalexam', 5, '2021-05-06 18:31:14', '2021-05-06 18:31:14'),
(347, 3, 'updated', 'users', 3, '2021-05-06 18:34:43', '2021-05-06 18:34:43'),
(348, 1, 'created', 'users', 20, '2021-05-06 18:39:37', '2021-05-06 18:39:37'),
(349, 1, 'created', 'medicalstructure', 14, '2021-05-06 18:41:00', '2021-05-06 18:41:00'),
(350, 1, 'created', 'medicalstructurespeciality', 15, '2021-05-06 18:41:01', '2021-05-06 18:41:01'),
(351, 1, 'created', 'medicalstructurespeciality', 16, '2021-05-06 18:41:01', '2021-05-06 18:41:01'),
(352, 1, 'created', 'medicalstaff', 10, '2021-05-06 18:42:13', '2021-05-06 18:42:13'),
(353, 1, 'created', 'medicalstaff', 11, '2021-05-06 18:42:39', '2021-05-06 18:42:39'),
(354, 1, 'created', 'medicalstaff', 12, '2021-05-06 18:43:04', '2021-05-06 18:43:04'),
(355, 1, 'deleted', 'medicalstaff', 7, '2021-05-06 18:43:23', '2021-05-06 18:43:23'),
(356, 1, 'created', 'medicalstaff', 13, '2021-05-06 18:43:44', '2021-05-06 18:43:44'),
(357, 1, 'created', 'zone', 3, '2021-05-06 18:44:20', '2021-05-06 18:44:20'),
(358, 1, 'created', 'country', 4, '2021-05-06 18:44:56', '2021-05-06 18:44:56'),
(359, 1, 'updated', 'users', 1, '2021-05-06 18:45:23', '2021-05-06 18:45:23'),
(360, 5, 'created', 'appoitement', 17, '2021-05-06 18:46:03', '2021-05-06 18:46:03'),
(361, 5, 'updated', 'users', 5, '2021-05-06 18:46:19', '2021-05-06 18:46:19'),
(362, 9, 'updated', 'appoitement', 17, '2021-05-06 18:46:58', '2021-05-06 18:46:58'),
(363, 9, 'updated', 'users', 9, '2021-05-06 18:47:03', '2021-05-06 18:47:03'),
(364, 6, 'updated', 'users', 6, '2021-05-06 18:48:04', '2021-05-06 18:48:04'),
(365, 3, 'updated', 'appoitement', 17, '2021-05-06 18:48:41', '2021-05-06 18:48:41'),
(366, 3, 'created', 'consultation', 10, '2021-05-06 18:50:01', '2021-05-06 18:50:01'),
(367, 3, 'created', 'generalexam', 6, '2021-05-06 18:50:52', '2021-05-06 18:50:52'),
(368, 3, 'updated', 'users', 3, '2021-05-06 18:51:03', '2021-05-06 18:51:03'),
(369, 1, 'deleted', 'medicalstaff', 13, '2021-05-06 19:53:31', '2021-05-06 19:53:31'),
(370, 1, 'created', 'medicalstructure', 15, '2021-05-06 20:22:47', '2021-05-06 20:22:47'),
(371, 1, 'created', 'medicalstructurespeciality', 17, '2021-05-06 20:22:47', '2021-05-06 20:22:47'),
(372, 1, 'created', 'medicalstructurespeciality', 18, '2021-05-06 20:22:47', '2021-05-06 20:22:47'),
(373, 1, 'created', 'medicalstaff', 14, '2021-05-06 20:36:54', '2021-05-06 20:36:54'),
(374, 1, 'created', 'medicalstaff', 15, '2021-05-06 20:37:10', '2021-05-06 20:37:10'),
(375, 1, 'created', 'medicalstaff', 16, '2021-05-06 20:37:24', '2021-05-06 20:37:24'),
(376, 1, 'updated', 'users', 1, '2021-05-06 20:37:30', '2021-05-06 20:37:30'),
(377, 5, 'created', 'appoitement', 18, '2021-05-06 20:39:12', '2021-05-06 20:39:12'),
(378, 5, 'updated', 'users', 5, '2021-05-06 20:39:37', '2021-05-06 20:39:37'),
(379, 9, 'updated', 'appoitement', 18, '2021-05-06 20:41:27', '2021-05-06 20:41:27'),
(380, 9, 'updated', 'users', 9, '2021-05-06 20:41:32', '2021-05-06 20:41:32'),
(381, 6, 'updated', 'users', 6, '2021-05-06 20:41:55', '2021-05-06 20:41:55'),
(382, 3, 'updated', 'appoitement', 18, '2021-05-06 20:42:26', '2021-05-06 20:42:26'),
(383, 3, 'created', 'consultation', 11, '2021-05-06 20:43:50', '2021-05-06 20:43:50'),
(384, 3, 'created', 'generalexam', 7, '2021-05-06 20:44:54', '2021-05-06 20:44:54'),
(385, 3, 'updated', 'users', 3, '2021-05-06 20:46:22', '2021-05-06 20:46:22'),
(386, 1, 'updated', 'users', 1, '2021-05-06 20:56:55', '2021-05-06 20:56:55'),
(387, 9, 'updated', 'users', 9, '2021-05-06 21:00:51', '2021-05-06 21:00:51'),
(388, 5, 'updated', 'users', 5, '2021-05-10 14:06:54', '2021-05-10 14:06:54'),
(389, 1, 'updated', 'users', 1, '2021-05-10 14:37:13', '2021-05-10 14:37:13'),
(390, 5, 'updated', 'users', 5, '2021-05-12 13:44:22', '2021-05-12 13:44:22'),
(391, 34, 'created', 'medicalstructure', 16, '2021-05-14 12:12:44', '2021-05-14 12:12:44'),
(392, 34, 'created', 'medicalstructurespeciality', 19, '2021-05-14 12:12:44', '2021-05-14 12:12:44'),
(393, 34, 'created', 'medicalstructure', 17, '2021-05-14 12:16:57', '2021-05-14 12:16:57'),
(394, 34, 'created', 'medicalstaff', 3, '2021-05-14 12:16:57', '2021-05-14 12:16:57'),
(395, 34, 'created', 'medicalstructurespeciality', 20, '2021-05-14 12:16:57', '2021-05-14 12:16:57'),
(396, 34, 'created', 'medicalstructure', 18, '2021-05-14 12:19:51', '2021-05-14 12:19:51'),
(397, 34, 'created', 'medicalstructurespeciality', 21, '2021-05-14 12:19:51', '2021-05-14 12:19:51'),
(398, 34, 'updated', 'users', 34, '2021-05-14 12:42:03', '2021-05-14 12:42:03'),
(399, 5, 'updated', 'users', 5, '2021-05-14 12:42:22', '2021-05-14 12:42:22'),
(400, 1, 'updated', 'users', 1, '2021-05-14 12:43:05', '2021-05-14 12:43:05'),
(401, 5, 'updated', 'users', 5, '2021-05-14 13:25:13', '2021-05-14 13:25:13'),
(402, 34, 'updated', 'users', 34, '2021-05-14 13:27:05', '2021-05-14 13:27:05'),
(403, 3, 'updated', 'users', 3, '2021-05-14 13:27:24', '2021-05-14 13:27:24'),
(404, 1, 'updated', 'users', 1, '2021-05-14 13:28:51', '2021-05-14 13:28:51'),
(405, 3, 'updated', 'users', 3, '2021-05-14 13:44:16', '2021-05-14 13:44:16'),
(406, 5, 'updated', 'users', 5, '2021-05-14 13:45:15', '2021-05-14 13:45:15'),
(407, 34, 'updated', 'users', 34, '2021-05-14 13:50:18', '2021-05-14 13:50:18'),
(408, 35, 'created', 'medicalstructure', 19, '2021-05-14 14:51:25', '2021-05-14 14:51:25'),
(409, 35, 'created', 'medicalstructurespeciality', 22, '2021-05-14 14:51:25', '2021-05-14 14:51:25'),
(410, 35, 'created', 'medicalstructurespeciality', 23, '2021-05-14 14:51:25', '2021-05-14 14:51:25'),
(411, 35, 'created', 'medicalstructure', 20, '2021-05-14 14:54:37', '2021-05-14 14:54:37'),
(412, 35, 'created', 'medicalstructurespeciality', 24, '2021-05-14 14:54:38', '2021-05-14 14:54:38'),
(413, 35, 'created', 'medicalstructurespeciality', 25, '2021-05-14 14:54:38', '2021-05-14 14:54:38'),
(414, 35, 'deleted', 'medicalstructurespeciality', 20, '2021-05-14 16:16:57', '2021-05-14 16:16:57'),
(415, 35, 'created', 'medicalstructurespeciality', 26, '2021-05-14 16:21:38', '2021-05-14 16:21:38'),
(416, 35, 'created', 'medicalstructurespeciality', 27, '2021-05-14 16:21:38', '2021-05-14 16:21:38'),
(417, 35, 'created', 'medicalstructurespeciality', 28, '2021-05-14 16:21:38', '2021-05-14 16:21:38'),
(418, 35, 'updated', 'medicalstructure', 3, '2021-05-14 16:21:38', '2021-05-14 16:21:38'),
(419, 35, 'deleted', 'medicalstructurespeciality', 24, '2021-05-14 16:28:27', '2021-05-14 16:28:27'),
(420, 35, 'deleted', 'medicalstructurespeciality', 25, '2021-05-14 16:28:27', '2021-05-14 16:28:27'),
(421, 35, 'created', 'medicalstructurespeciality', 29, '2021-05-14 16:30:20', '2021-05-14 16:30:20'),
(422, 35, 'created', 'medicalstructurespeciality', 30, '2021-05-14 16:30:20', '2021-05-14 16:30:20'),
(423, 35, 'created', 'medicalstructurespeciality', 31, '2021-05-14 16:30:20', '2021-05-14 16:30:20'),
(424, 35, 'updated', 'medicalstructure', 20, '2021-05-14 16:30:20', '2021-05-14 16:30:20'),
(425, 35, 'deleted', 'medicalstructurespeciality', 29, '2021-05-14 16:30:40', '2021-05-14 16:30:40'),
(426, 35, 'deleted', 'medicalstructurespeciality', 30, '2021-05-14 16:30:40', '2021-05-14 16:30:40'),
(427, 35, 'deleted', 'medicalstructurespeciality', 31, '2021-05-14 16:30:40', '2021-05-14 16:30:40'),
(428, 35, 'created', 'medicalstructurespeciality', 32, '2021-05-14 16:30:40', '2021-05-14 16:30:40'),
(429, 35, 'created', 'medicalstructurespeciality', 33, '2021-05-14 16:30:40', '2021-05-14 16:30:40'),
(430, 35, 'updated', 'medicalstructure', 20, '2021-05-14 16:30:40', '2021-05-14 16:30:40'),
(431, 35, 'updated', 'users', 35, '2021-05-14 16:34:17', '2021-05-14 16:34:17'),
(432, 1, 'updated', 'users', 1, '2021-05-14 16:35:17', '2021-05-14 16:35:17'),
(433, 35, 'updated', 'users', 35, '2021-05-14 17:01:02', '2021-05-14 17:01:02'),
(434, 3, 'updated', 'users', 3, '2021-05-14 17:01:39', '2021-05-14 17:01:39'),
(435, 35, 'updated', 'users', 35, '2021-05-14 17:12:44', '2021-05-14 17:12:44'),
(436, 6, 'updated', 'users', 6, '2021-05-14 17:14:45', '2021-05-14 17:14:45'),
(437, 6, 'updated', 'users', 6, '2021-05-14 17:18:12', '2021-05-14 17:18:12'),
(438, 35, 'deleted', 'medicalstaff', 2, '2021-05-14 17:20:51', '2021-05-14 17:20:51'),
(439, 35, 'created', 'medicalstaff', 8, '2021-05-14 17:32:20', '2021-05-14 17:32:20'),
(440, 35, 'deleted', 'medicalstaff', 8, '2021-05-14 17:32:52', '2021-05-14 17:32:52'),
(441, 35, 'created', 'medicalstaff', 9, '2021-05-14 17:33:14', '2021-05-14 17:33:14'),
(442, 35, 'created', 'medicalstaff', 10, '2021-05-14 17:38:31', '2021-05-14 17:38:31'),
(443, 35, 'updated', 'users', 35, '2021-05-14 17:39:03', '2021-05-14 17:39:03'),
(444, 3, 'updated', 'users', 3, '2021-05-14 20:22:41', '2021-05-14 20:22:41'),
(445, 5, 'updated', 'users', 5, '2021-05-14 20:33:57', '2021-05-14 20:33:57'),
(446, 5, 'updated', 'users', 5, '2021-05-14 20:39:11', '2021-05-14 20:39:11'),
(447, 36, 'updated', 'users', 36, '2021-05-14 21:00:36', '2021-05-14 21:00:36'),
(448, 35, 'created', 'medicalstaff', 11, '2021-05-14 21:01:05', '2021-05-14 21:01:05'),
(449, 35, 'updated', 'users', 35, '2021-05-14 21:01:22', '2021-05-14 21:01:22'),
(450, 36, 'updated', 'users', 36, '2021-05-14 21:03:51', '2021-05-14 21:03:51'),
(451, 36, 'updated', 'users', 36, '2021-05-15 04:27:59', '2021-05-15 04:27:59'),
(452, 35, 'created', 'medicalstaff', 12, '2021-05-15 05:01:00', '2021-05-15 05:01:00'),
(453, 35, 'updated', 'users', 35, '2021-05-15 05:01:22', '2021-05-15 05:01:22'),
(454, 5, 'updated', 'users', 5, '2021-05-15 05:06:04', '2021-05-15 05:06:04'),
(455, 36, 'updated', 'appoitement', 115, '2021-05-15 06:50:34', '2021-05-15 06:50:34'),
(456, 36, 'updated', 'appoitement', 115, '2021-05-15 06:51:12', '2021-05-15 06:51:12'),
(457, 36, 'updated', 'appoitement', 115, '2021-05-15 07:14:09', '2021-05-15 07:14:09'),
(458, 36, 'updated', 'users', 36, '2021-05-15 07:14:21', '2021-05-15 07:14:21'),
(459, 3, 'updated', 'appoitement', 115, '2021-05-15 07:32:40', '2021-05-15 07:32:40'),
(460, 3, 'updated', 'users', 3, '2021-05-15 07:32:48', '2021-05-15 07:32:48'),
(461, 35, 'updated', 'users', 35, '2021-05-15 07:33:25', '2021-05-15 07:33:25'),
(462, 36, 'updated', 'users', 36, '2021-05-15 08:51:38', '2021-05-15 08:51:38'),
(463, 3, 'updated', 'users', 3, '2021-05-15 09:15:52', '2021-05-15 09:15:52'),
(464, 35, 'updated', 'users', 35, '2021-05-15 09:16:24', '2021-05-15 09:16:24'),
(465, 36, 'updated', 'users', 36, '2021-05-15 09:17:54', '2021-05-15 09:17:54'),
(466, 3, 'created', 'consultation', 12, '2021-05-15 09:52:46', '2021-05-15 09:52:46'),
(467, 3, 'updated', 'users', 3, '2021-05-15 11:43:23', '2021-05-15 11:43:23'),
(468, 36, 'updated', 'users', 36, '2021-05-15 11:44:49', '2021-05-15 11:44:49'),
(469, 3, 'updated', 'users', 3, '2021-05-15 11:51:41', '2021-05-15 11:51:41'),
(470, 36, 'updated', 'users', 36, '2021-05-15 11:52:33', '2021-05-15 11:52:33'),
(471, 3, 'updated', 'users', 3, '2021-05-15 12:34:17', '2021-05-15 12:34:17'),
(472, 36, 'updated', 'users', 36, '2021-05-15 12:34:45', '2021-05-15 12:34:45'),
(473, 1, 'updated', 'users', 1, '2021-05-15 12:35:37', '2021-05-15 12:35:37'),
(474, 36, 'updated', 'users', 36, '2021-05-15 12:36:15', '2021-05-15 12:36:15'),
(475, 3, 'created', 'generalexam', 8, '2021-05-15 13:17:50', '2021-05-15 13:17:50'),
(476, 3, 'created', 'generalexam', 9, '2021-05-15 13:22:26', '2021-05-15 13:22:26'),
(477, 3, 'updated', 'generalexam', 7, '2021-05-15 13:42:50', '2021-05-15 13:42:50'),
(478, 3, 'created', 'generalexam', 10, '2021-05-15 13:45:48', '2021-05-15 13:45:48'),
(479, 3, 'updated', 'generalexam', 10, '2021-05-15 13:49:36', '2021-05-15 13:49:36'),
(480, 3, 'updated', 'users', 3, '2021-05-15 13:49:50', '2021-05-15 13:49:50'),
(481, 37, 'created', 'medicalstructure', 22, '2021-05-15 14:23:36', '2021-05-15 14:23:36'),
(482, 37, 'created', 'medicalstructurespeciality', 34, '2021-05-15 14:23:36', '2021-05-15 14:23:36'),
(483, 37, 'created', 'medicalstructurespeciality', 35, '2021-05-15 14:23:36', '2021-05-15 14:23:36'),
(484, 37, 'deleted', 'medicalstructurespeciality', 34, '2021-05-15 14:23:54', '2021-05-15 14:23:54'),
(485, 37, 'deleted', 'medicalstructurespeciality', 35, '2021-05-15 14:23:54', '2021-05-15 14:23:54'),
(486, 37, 'created', 'medicalstructurespeciality', 36, '2021-05-15 14:23:54', '2021-05-15 14:23:54'),
(487, 37, 'created', 'medicalstructurespeciality', 37, '2021-05-15 14:23:54', '2021-05-15 14:23:54'),
(488, 37, 'updated', 'medicalstructure', 22, '2021-05-15 14:23:54', '2021-05-15 14:23:54'),
(489, 37, 'deleted', 'medicalstructurespeciality', 36, '2021-05-15 14:24:04', '2021-05-15 14:24:04'),
(490, 37, 'deleted', 'medicalstructurespeciality', 37, '2021-05-15 14:24:04', '2021-05-15 14:24:04'),
(491, 37, 'created', 'medicalstructurespeciality', 38, '2021-05-15 14:24:04', '2021-05-15 14:24:04'),
(492, 37, 'created', 'medicalstructurespeciality', 39, '2021-05-15 14:24:04', '2021-05-15 14:24:04'),
(493, 37, 'created', 'medicalstructurespeciality', 40, '2021-05-15 14:24:05', '2021-05-15 14:24:05'),
(494, 37, 'updated', 'medicalstructure', 22, '2021-05-15 14:24:05', '2021-05-15 14:24:05'),
(495, 37, 'updated', 'users', 37, '2021-05-15 14:24:19', '2021-05-15 14:24:19'),
(496, 1, 'updated', 'users', 1, '2021-05-15 14:24:54', '2021-05-15 14:24:54'),
(497, 37, 'created', 'medicalstaff', 14, '2021-05-15 14:25:52', '2021-05-15 14:25:52'),
(498, 37, 'created', 'medicalstaff', 15, '2021-05-15 14:26:27', '2021-05-15 14:26:27'),
(499, 37, 'updated', 'users', 37, '2021-05-15 14:26:34', '2021-05-15 14:26:34'),
(500, 3, 'updated', 'appoitement', 117, '2021-05-15 14:32:08', '2021-05-15 14:32:08'),
(501, 38, 'updated', 'users', 38, '2021-05-15 14:33:09', '2021-05-15 14:33:09'),
(502, 3, 'updated', 'appoitement', 118, '2021-05-15 14:35:34', '2021-05-15 14:35:34'),
(503, 5, 'updated', 'users', 5, '2021-05-15 14:38:04', '2021-05-15 14:38:04'),
(504, 38, 'updated', 'users', 38, '2021-05-15 15:01:46', '2021-05-15 15:01:46'),
(505, 3, 'created', 'generalexam', 11, '2021-05-15 15:09:11', '2021-05-15 15:09:11'),
(506, 3, 'updated', 'generalexam', 11, '2021-05-15 15:09:24', '2021-05-15 15:09:24'),
(507, 3, 'updated', 'appoitement', 118, '2021-05-15 18:01:50', '2021-05-15 18:01:50'),
(508, 3, 'updated', 'appoitement', 117, '2021-05-15 18:02:03', '2021-05-15 18:02:03'),
(509, 39, 'updated', 'users', 39, '2021-05-16 19:32:33', '2021-05-16 19:32:33'),
(510, 1, 'updated', 'users', 1, '2021-05-16 19:36:02', '2021-05-16 19:36:02'),
(511, 1, 'updated', 'users', 1, '2021-05-16 19:46:46', '2021-05-16 19:46:46'),
(512, 5, 'updated', 'users', 5, '2021-05-16 19:47:27', '2021-05-16 19:47:27'),
(513, 1, 'updated', 'users', 1, '2021-05-16 19:48:36', '2021-05-16 19:48:36'),
(514, 5, 'updated', 'users', 5, '2021-05-16 19:54:40', '2021-05-16 19:54:40'),
(515, 1, 'updated', 'patient', 2, '2021-05-16 21:23:18', '2021-05-16 21:23:18'),
(516, 1, 'updated', 'patient', 2, '2021-05-16 21:23:31', '2021-05-16 21:23:31'),
(517, 1, 'updated', 'users', 1, '2021-05-16 21:46:59', '2021-05-16 21:46:59'),
(518, 1, 'updated', 'users', 1, '2021-05-18 13:20:42', '2021-05-18 13:20:42'),
(519, 1, 'created', 'speciality', 4, '2021-05-18 16:41:31', '2021-05-18 16:41:31'),
(520, 1, 'updated', 'speciality', 4, '2021-05-18 16:46:24', '2021-05-18 16:46:24'),
(521, 1, 'updated', 'speciality', 4, '2021-05-18 16:46:35', '2021-05-18 16:46:35'),
(522, 1, 'updated', 'users', 1, '2021-05-18 16:48:53', '2021-05-18 16:48:53'),
(523, 1, 'updated', 'users', 1, '2021-05-18 16:53:39', '2021-05-18 16:53:39'),
(524, 3, 'updated', 'users', 3, '2021-05-18 16:53:59', '2021-05-18 16:53:59'),
(525, 1, 'created', 'country', 5, '2021-05-18 17:02:48', '2021-05-18 17:02:48'),
(526, 1, 'created', 'zone', 4, '2021-05-18 17:14:50', '2021-05-18 17:14:50'),
(527, 1, 'updated', 'zone', 4, '2021-05-18 17:17:32', '2021-05-18 17:17:32'),
(528, 1, 'updated', 'users', 1, '2021-05-18 17:28:57', '2021-05-18 17:28:57'),
(529, 37, 'updated', 'users', 37, '2021-05-18 17:34:51', '2021-05-18 17:34:51'),
(530, 37, 'updated', 'users', 37, '2021-05-19 20:06:12', '2021-05-19 20:06:12'),
(531, 1, 'created', 'branch', 1, '2021-05-21 09:55:18', '2021-05-21 09:55:18'),
(532, 1, 'created', 'drugfamilly', 1, '2021-05-21 16:23:15', '2021-05-21 16:23:15'),
(533, 1, 'created', 'drugmaker', 1, '2021-05-21 16:28:42', '2021-05-21 16:28:42'),
(534, 1, 'created', 'drug', 1, '2021-05-21 16:32:59', '2021-05-21 16:32:59'),
(535, 1, 'updated', 'users', 1, '2021-05-21 16:45:26', '2021-05-21 16:45:26'),
(536, 3, 'updated', 'users', 3, '2021-05-21 16:52:56', '2021-05-21 16:52:56'),
(537, 1, 'created', 'drugfamilly', 2, '2021-05-21 16:53:38', '2021-05-21 16:53:38'),
(538, 1, 'created', 'drugfamilly', 3, '2021-05-21 16:53:57', '2021-05-21 16:53:57'),
(539, 1, 'created', 'drugmaker', 2, '2021-05-21 16:54:21', '2021-05-21 16:54:21'),
(540, 1, 'created', 'drugmaker', 3, '2021-05-21 16:54:39', '2021-05-21 16:54:39'),
(541, 1, 'created', 'drug', 2, '2021-05-21 16:55:15', '2021-05-21 16:55:15'),
(542, 1, 'created', 'drug', 3, '2021-05-21 16:55:31', '2021-05-21 16:55:31'),
(543, 1, 'updated', 'users', 1, '2021-05-21 16:55:36', '2021-05-21 16:55:36'),
(544, 3, 'created', 'prescription', 1, '2021-05-21 18:00:59', '2021-05-21 18:00:59'),
(545, 3, 'updated', 'users', 3, '2021-05-21 18:12:33', '2021-05-21 18:12:33'),
(546, 1, 'updated', 'users', 1, '2021-05-21 18:25:42', '2021-05-21 18:25:42'),
(547, 3, 'created', 'prescription', 2, '2021-05-21 18:26:32', '2021-05-21 18:26:32'),
(548, 3, 'created', 'prescription', 3, '2021-05-21 18:27:22', '2021-05-21 18:27:22'),
(549, 3, 'created', 'prescription', 4, '2021-05-21 18:28:25', '2021-05-21 18:28:25'),
(550, 3, 'created', 'prescription', 5, '2021-05-21 18:39:45', '2021-05-21 18:39:45'),
(551, 3, 'created', 'prescription', 6, '2021-05-21 18:50:02', '2021-05-21 18:50:02'),
(552, 3, 'created', 'prescription', 7, '2021-05-21 18:53:00', '2021-05-21 18:53:00'),
(553, 3, 'deleted', 'detailsprescription', 8, '2021-05-21 20:41:50', '2021-05-21 20:41:50'),
(554, 3, 'deleted', 'detailsprescription', 9, '2021-05-21 20:41:50', '2021-05-21 20:41:50'),
(555, 3, 'deleted', 'detailsprescription', 8, '2021-05-21 20:43:33', '2021-05-21 20:43:33'),
(556, 3, 'deleted', 'detailsprescription', 9, '2021-05-21 20:43:33', '2021-05-21 20:43:33'),
(557, 3, 'created', 'detailsprescription', 10, '2021-05-21 20:43:33', '2021-05-21 20:43:33'),
(558, 3, 'deleted', 'detailsprescription', 8, '2021-05-21 20:44:38', '2021-05-21 20:44:38'),
(559, 3, 'deleted', 'detailsprescription', 9, '2021-05-21 20:44:38', '2021-05-21 20:44:38'),
(560, 3, 'deleted', 'detailsprescription', 8, '2021-05-21 20:53:02', '2021-05-21 20:53:02'),
(561, 3, 'deleted', 'detailsprescription', 9, '2021-05-21 20:53:02', '2021-05-21 20:53:02'),
(562, 3, 'created', 'detailsprescription', 11, '2021-05-21 20:53:22', '2021-05-21 20:53:22'),
(563, 3, 'created', 'detailsprescription', 12, '2021-05-21 20:53:22', '2021-05-21 20:53:22'),
(564, 3, 'created', 'detailsprescription', 13, '2021-05-21 20:53:22', '2021-05-21 20:53:22'),
(565, 3, 'updated', 'prescription', 7, '2021-05-21 20:53:22', '2021-05-21 20:53:22'),
(566, 3, 'deleted', 'detailsprescription', 8, '2021-05-21 20:57:50', '2021-05-21 20:57:50'),
(567, 3, 'deleted', 'detailsprescription', 9, '2021-05-21 20:57:50', '2021-05-21 20:57:50'),
(568, 3, 'created', 'detailsprescription', 14, '2021-05-21 20:57:50', '2021-05-21 20:57:50'),
(569, 3, 'created', 'detailsprescription', 15, '2021-05-21 20:57:50', '2021-05-21 20:57:50'),
(570, 3, 'created', 'detailsprescription', 16, '2021-05-21 20:57:50', '2021-05-21 20:57:50'),
(571, 3, 'updated', 'prescription', 7, '2021-05-21 20:57:50', '2021-05-21 20:57:50'),
(572, 3, 'deleted', 'detailsprescription', 8, '2021-05-21 21:01:29', '2021-05-21 21:01:29'),
(573, 3, 'deleted', 'detailsprescription', 9, '2021-05-21 21:01:29', '2021-05-21 21:01:29'),
(574, 3, 'created', 'detailsprescription', 17, '2021-05-21 21:01:29', '2021-05-21 21:01:29'),
(575, 3, 'created', 'detailsprescription', 18, '2021-05-21 21:01:29', '2021-05-21 21:01:29'),
(576, 3, 'created', 'detailsprescription', 19, '2021-05-21 21:01:29', '2021-05-21 21:01:29'),
(577, 3, 'updated', 'prescription', 7, '2021-05-21 21:01:29', '2021-05-21 21:01:29'),
(578, 3, 'deleted', 'detailsprescription', 17, '2021-05-21 21:01:49', '2021-05-21 21:01:49'),
(579, 3, 'deleted', 'detailsprescription', 18, '2021-05-21 21:01:50', '2021-05-21 21:01:50'),
(580, 3, 'deleted', 'detailsprescription', 19, '2021-05-21 21:01:50', '2021-05-21 21:01:50'),
(581, 3, 'created', 'detailsprescription', 20, '2021-05-21 21:02:11', '2021-05-21 21:02:11'),
(582, 3, 'updated', 'prescription', 7, '2021-05-21 21:02:11', '2021-05-21 21:02:11'),
(583, 3, 'deleted', 'detailsprescription', 20, '2021-05-21 21:02:36', '2021-05-21 21:02:36'),
(584, 3, 'created', 'detailsprescription', 21, '2021-05-21 21:02:37', '2021-05-21 21:02:37'),
(585, 3, 'deleted', 'detailsprescription', 21, '2021-05-21 21:02:51', '2021-05-21 21:02:51'),
(586, 3, 'created', 'detailsprescription', 22, '2021-05-21 21:02:51', '2021-05-21 21:02:51'),
(587, 3, 'deleted', 'detailsprescription', 22, '2021-05-21 21:04:50', '2021-05-21 21:04:50'),
(588, 3, 'created', 'detailsprescription', 23, '2021-05-21 21:05:26', '2021-05-21 21:05:26'),
(589, 3, 'created', 'detailsprescription', 24, '2021-05-21 21:05:26', '2021-05-21 21:05:26'),
(590, 3, 'updated', 'prescription', 7, '2021-05-21 21:05:26', '2021-05-21 21:05:26'),
(591, 3, 'deleted', 'detailsprescription', 23, '2021-05-21 21:05:45', '2021-05-21 21:05:45'),
(592, 3, 'deleted', 'detailsprescription', 24, '2021-05-21 21:05:45', '2021-05-21 21:05:45'),
(593, 3, 'created', 'detailsprescription', 25, '2021-05-21 21:05:45', '2021-05-21 21:05:45'),
(594, 3, 'updated', 'prescription', 7, '2021-05-21 21:05:45', '2021-05-21 21:05:45'),
(595, 3, 'deleted', 'detailsprescription', 25, '2021-05-21 21:06:12', '2021-05-21 21:06:12'),
(596, 3, 'created', 'detailsprescription', 26, '2021-05-21 21:06:13', '2021-05-21 21:06:13'),
(597, 3, 'created', 'detailsprescription', 27, '2021-05-21 21:06:13', '2021-05-21 21:06:13'),
(598, 3, 'created', 'detailsprescription', 28, '2021-05-21 21:06:13', '2021-05-21 21:06:13'),
(599, 3, 'updated', 'prescription', 7, '2021-05-21 21:06:13', '2021-05-21 21:06:13'),
(600, 3, 'updated', 'users', 3, '2021-05-21 22:21:18', '2021-05-21 22:21:18'),
(601, 3, 'updated', 'users', 3, '2021-05-21 22:21:43', '2021-05-21 22:21:43'),
(602, 3, 'updated', 'users', 3, '2021-05-21 22:22:06', '2021-05-21 22:22:06'),
(603, 1, 'updated', 'users', 1, '2021-05-21 22:22:36', '2021-05-21 22:22:36'),
(604, 3, 'updated', 'users', 3, '2021-05-21 22:22:55', '2021-05-21 22:22:55'),
(605, 1, 'updated', 'users', 1, '2021-05-21 22:23:48', '2021-05-21 22:23:48'),
(606, 3, 'updated', 'users', 3, '2021-05-21 22:34:19', '2021-05-21 22:34:19'),
(607, 1, 'updated', 'users', 1, '2021-05-21 22:47:21', '2021-05-21 22:47:21'),
(608, 3, 'updated', 'users', 3, '2021-05-21 22:48:15', '2021-05-21 22:48:15'),
(609, 1, 'updated', 'users', 1, '2021-05-21 23:04:44', '2021-05-21 23:04:44'),
(610, 3, 'updated', 'users', 3, '2021-05-21 23:11:58', '2021-05-21 23:11:58'),
(611, 6, 'updated', 'users', 6, '2021-05-21 23:14:11', '2021-05-21 23:14:11'),
(612, 3, 'updated', 'users', 3, '2021-05-22 12:03:25', '2021-05-22 12:03:25'),
(613, 6, 'created', 'prescription', 8, '2021-05-22 12:13:25', '2021-05-22 12:13:25'),
(614, 6, 'updated', 'users', 6, '2021-05-22 12:25:57', '2021-05-22 12:25:57'),
(615, 1, 'updated', 'users', 1, '2021-05-22 12:34:44', '2021-05-22 12:34:44'),
(616, 3, 'created', 'certificate', 1, '2021-05-22 12:36:07', '2021-05-22 12:36:07'),
(617, 3, 'updated', 'users', 3, '2021-05-22 12:42:27', '2021-05-22 12:42:27'),
(618, 6, 'updated', 'users', 6, '2021-05-22 12:42:48', '2021-05-22 12:42:48'),
(619, 3, 'updated', 'users', 3, '2021-05-22 12:57:19', '2021-05-22 12:57:19'),
(620, 1, 'updated', 'users', 1, '2021-05-22 13:07:38', '2021-05-22 13:07:38'),
(621, 3, 'created', 'report', 1, '2021-05-22 13:18:45', '2021-05-22 13:18:45'),
(622, 3, 'updated', 'report', 1, '2021-05-22 13:32:50', '2021-05-22 13:32:50'),
(623, 3, 'updated', 'consultation', 17, '2021-05-22 14:02:32', '2021-05-22 14:02:32'),
(624, 1, 'created', 'visitnature', 1, '2021-05-24 08:52:32', '2021-05-24 08:52:32');
INSERT INTO `users_logs` (`id`, `user_id`, `action`, `action_model`, `action_id`, `created_at`, `updated_at`) VALUES
(625, 1, 'created', 'visitnature', 2, '2021-05-24 08:52:50', '2021-05-24 08:52:50'),
(626, 1, 'created', 'visitstatus', 1, '2021-05-24 08:53:16', '2021-05-24 08:53:16'),
(627, 1, 'created', 'visitstatus', 2, '2021-05-24 08:53:33', '2021-05-24 08:53:33'),
(628, 1, 'created', 'visittype', 1, '2021-05-24 08:54:01', '2021-05-24 08:54:01'),
(629, 1, 'created', 'visittype', 2, '2021-05-24 08:54:17', '2021-05-24 08:54:17'),
(630, 1, 'updated', 'users', 1, '2021-05-24 09:32:18', '2021-05-24 09:32:18'),
(631, 3, 'updated', 'consultation', 14, '2021-05-24 09:50:59', '2021-05-24 09:50:59'),
(632, 3, 'updated', 'consultation', 14, '2021-05-24 10:22:27', '2021-05-24 10:22:27'),
(633, 3, 'updated', 'consultation', 14, '2021-05-24 10:22:47', '2021-05-24 10:22:47'),
(634, 3, 'updated', 'users', 3, '2021-05-24 11:14:53', '2021-05-24 11:14:53'),
(635, 1, 'created', 'question', 1, '2021-05-24 11:30:26', '2021-05-24 11:30:26'),
(636, 1, 'updated', 'question', 1, '2021-05-24 11:34:15', '2021-05-24 11:34:15'),
(637, 1, 'updated', 'users', 1, '2021-05-24 11:38:11', '2021-05-24 11:38:11'),
(638, 3, 'created', 'question', 2, '2021-05-24 11:55:01', '2021-05-24 11:55:01'),
(639, 3, 'deleted', 'consultation', 19, '2021-05-25 08:08:03', '2021-05-25 08:08:03'),
(640, 3, 'deleted', 'response', 5, '2021-05-25 08:28:29', '2021-05-25 08:28:29'),
(641, 3, 'deleted', 'response', 6, '2021-05-25 08:28:30', '2021-05-25 08:28:30'),
(642, 3, 'created', 'response', 7, '2021-05-25 08:28:30', '2021-05-25 08:28:30'),
(643, 3, 'updated', 'consultation', 28, '2021-05-25 08:28:30', '2021-05-25 08:28:30'),
(644, 3, 'deleted', 'response', 7, '2021-05-25 08:31:08', '2021-05-25 08:31:08'),
(645, 3, 'created', 'response', 8, '2021-05-25 08:31:08', '2021-05-25 08:31:08'),
(646, 3, 'created', 'response', 9, '2021-05-25 08:31:08', '2021-05-25 08:31:08'),
(647, 3, 'updated', 'consultation', 28, '2021-05-25 08:31:08', '2021-05-25 08:31:08'),
(648, 3, 'updated', 'users', 3, '2021-05-25 08:49:46', '2021-05-25 08:49:46'),
(649, 1, 'updated', 'response', 8, '2021-05-25 09:40:10', '2021-05-25 09:40:10'),
(650, 1, 'created', 'offertype', 1, '2021-05-25 09:42:09', '2021-05-25 09:42:09'),
(651, 1, 'updated', 'users', 1, '2021-05-25 09:49:42', '2021-05-25 09:49:42'),
(652, 37, 'updated', 'users', 37, '2021-05-25 09:50:02', '2021-05-25 09:50:02'),
(653, 1, 'updated', 'users', 1, '2021-05-25 09:50:41', '2021-05-25 09:50:41'),
(654, 37, 'created', 'offertype', 2, '2021-05-25 09:56:39', '2021-05-25 09:56:39'),
(655, 37, 'updated', 'offertype', 1, '2021-05-25 09:59:12', '2021-05-25 09:59:12'),
(656, 37, 'updated', 'offertype', 1, '2021-05-25 09:59:21', '2021-05-25 09:59:21'),
(657, 37, 'updated', 'users', 37, '2021-05-25 10:01:25', '2021-05-25 10:01:25'),
(658, 1, 'updated', 'users', 1, '2021-05-25 10:21:08', '2021-05-25 10:21:08'),
(659, 37, 'created', 'medicastructureoffer', 1, '2021-05-25 10:25:16', '2021-05-25 10:25:16'),
(660, 37, 'updated', 'medicastructureoffer', 1, '2021-05-25 10:32:12', '2021-05-25 10:32:12'),
(661, 37, 'updated', 'medicastructureoffer', 1, '2021-05-25 10:32:44', '2021-05-25 10:32:44'),
(662, 37, 'updated', 'medicastructureoffer', 1, '2021-05-25 10:33:44', '2021-05-25 10:33:44'),
(663, 37, 'updated', 'medicastructureoffer', 1, '2021-05-25 10:34:27', '2021-05-25 10:34:27'),
(664, 37, 'deleted', 'medicastructureoffer', 1, '2021-05-25 10:35:42', '2021-05-25 10:35:42'),
(665, 1, 'updated', 'users', 1, '2021-05-26 11:51:51', '2021-05-26 11:51:51'),
(666, 37, 'created', 'site', 1, '2021-05-26 12:01:15', '2021-05-26 12:01:15'),
(667, 37, 'updated', 'site', 1, '2021-05-26 12:12:21', '2021-05-26 12:12:21'),
(668, 37, 'updated', 'users', 37, '2021-05-26 12:28:53', '2021-05-26 12:28:53'),
(669, 35, 'created', 'site', 2, '2021-05-26 12:30:37', '2021-05-26 12:30:37'),
(670, 35, 'updated', 'users', 35, '2021-05-26 12:30:42', '2021-05-26 12:30:42'),
(671, 37, 'created', 'building', 1, '2021-05-26 12:37:19', '2021-05-26 12:37:19'),
(672, 37, 'updated', 'building', 1, '2021-05-26 12:48:48', '2021-05-26 12:48:48'),
(673, 37, 'updated', 'building', 1, '2021-05-26 12:49:39', '2021-05-26 12:49:39'),
(674, 37, 'created', 'schedule', 1, '2021-05-26 13:00:21', '2021-05-26 13:00:21'),
(675, 37, 'updated', 'schedule', 1, '2021-05-26 13:09:18', '2021-05-26 13:09:18'),
(676, 37, 'updated', 'schedule', 1, '2021-05-26 13:14:16', '2021-05-26 13:14:16'),
(677, 37, 'created', 'service', 1, '2021-05-26 13:20:26', '2021-05-26 13:20:26'),
(678, 37, 'updated', 'service', 1, '2021-05-26 13:27:37', '2021-05-26 13:27:37'),
(679, 37, 'updated', 'users', 37, '2021-05-26 13:52:06', '2021-05-26 13:52:06'),
(680, 37, 'updated', 'users', 37, '2021-05-26 13:53:01', '2021-05-26 13:53:01'),
(681, 1, 'updated', 'users', 1, '2021-05-26 14:09:55', '2021-05-26 14:09:55'),
(682, 37, 'updated', 'users', 37, '2021-05-26 14:24:29', '2021-05-26 14:24:29'),
(683, 35, 'updated', 'users', 35, '2021-05-26 14:25:02', '2021-05-26 14:25:02'),
(684, 37, 'created', 'site', 3, '2021-05-26 14:27:11', '2021-05-26 14:27:11'),
(685, 37, 'created', 'service', 2, '2021-05-26 14:27:41', '2021-05-26 14:27:41'),
(686, 37, 'updated', 'users', 37, '2021-05-26 14:28:21', '2021-05-26 14:28:21'),
(687, 37, 'created', 'servicecontact', 1, '2021-05-26 14:35:02', '2021-05-26 14:35:02'),
(688, 37, 'updated', 'servicecontact', 1, '2021-05-26 14:40:47', '2021-05-26 14:40:47'),
(689, 37, 'updated', 'users', 37, '2021-05-26 14:42:18', '2021-05-26 14:42:18'),
(690, 1, 'updated', 'users', 1, '2021-05-26 14:43:53', '2021-05-26 14:43:53'),
(691, 5, 'updated', 'users', 5, '2021-05-26 14:44:45', '2021-05-26 14:44:45'),
(692, 5, 'updated', 'users', 5, '2021-05-26 14:45:00', '2021-05-26 14:45:00'),
(693, 1, 'updated', 'users', 1, '2021-05-26 14:59:25', '2021-05-26 14:59:25'),
(694, 5, 'updated', 'users', 5, '2021-05-26 15:02:28', '2021-05-26 15:02:28'),
(695, 1, 'created', 'sett', 1, '2021-05-26 15:03:49', '2021-05-26 15:03:49'),
(696, 1, 'updated', 'speciality', 1, '2021-05-26 17:53:40', '2021-05-26 17:53:40'),
(697, 1, 'updated', 'speciality', 1, '2021-05-26 17:53:49', '2021-05-26 17:53:49'),
(698, 1, 'updated', 'zone', 1, '2021-05-26 18:15:26', '2021-05-26 18:15:26'),
(699, 1, 'updated', 'zone', 1, '2021-05-26 18:17:48', '2021-05-26 18:17:48'),
(700, 1, 'updated', 'zone', 1, '2021-05-26 18:18:01', '2021-05-26 18:18:01'),
(701, 1, 'updated', 'zone', 1, '2021-05-26 18:18:07', '2021-05-26 18:18:07'),
(702, 1, 'updated', 'zone', 1, '2021-05-26 18:18:58', '2021-05-26 18:18:58'),
(703, 1, 'deleted', 'zone', 1, '2021-05-26 18:37:13', '2021-05-26 18:37:13'),
(704, 1, 'deleted', 'zone', 2, '2021-05-26 18:37:17', '2021-05-26 18:37:17'),
(705, 1, 'deleted', 'zone', 1, '2021-05-26 18:44:04', '2021-05-26 18:44:04'),
(706, 1, 'deleted', 'zone', 1, '2021-05-26 18:47:09', '2021-05-26 18:47:09'),
(707, 1, 'deleted', 'zone', 2, '2021-05-26 18:47:24', '2021-05-26 18:47:24'),
(708, 1, 'deleted', 'zone', 3, '2021-05-26 18:47:24', '2021-05-26 18:47:24'),
(709, 1, 'deleted', 'zone', 4, '2021-05-26 18:47:24', '2021-05-26 18:47:24'),
(710, 1, 'deleted', 'zone', 1, '2021-05-26 19:07:11', '2021-05-26 19:07:11'),
(711, 1, 'deleted', 'zone', 2, '2021-05-26 19:33:30', '2021-05-26 19:33:30'),
(712, 1, 'deleted', 'zone', 4, '2021-05-26 19:33:37', '2021-05-26 19:33:37'),
(713, 1, 'deleted', 'zone', 1, '2021-05-26 19:36:51', '2021-05-26 19:36:51'),
(714, 1, 'deleted', 'zone', 3, '2021-05-26 19:40:12', '2021-05-26 19:40:12'),
(715, 1, 'created', 'zone', 5, '2021-05-26 19:40:49', '2021-05-26 19:40:49'),
(716, 1, 'updated', 'zone', 5, '2021-05-26 19:41:05', '2021-05-26 19:41:05'),
(717, 1, 'deleted', 'zone', 5, '2021-05-26 19:41:18', '2021-05-26 19:41:18'),
(718, 1, 'updated', 'users', 1, '2021-05-26 19:41:28', '2021-05-26 19:41:28'),
(719, 1, 'created', 'country', 6, '2021-05-27 08:52:38', '2021-05-27 08:52:38'),
(720, 1, 'updated', 'country', 6, '2021-05-27 08:57:41', '2021-05-27 08:57:41'),
(721, 1, 'deleted', 'country', 5, '2021-05-27 08:59:13', '2021-05-27 08:59:13'),
(722, 1, 'deleted', 'country', 6, '2021-05-27 08:59:13', '2021-05-27 08:59:13'),
(723, 1, 'deleted', 'country', 4, '2021-05-27 08:59:21', '2021-05-27 08:59:21'),
(724, 1, 'updated', 'users', 1, '2021-05-27 08:59:41', '2021-05-27 08:59:41'),
(725, 5, 'updated', 'users', 5, '2021-05-27 09:11:15', '2021-05-27 09:11:15'),
(726, 1, 'updated', 'users', 1, '2021-05-27 09:14:15', '2021-05-27 09:14:15'),
(727, 1, 'deleted', 'medicalstructure', 2, '2021-05-27 09:29:36', '2021-05-27 09:29:36'),
(728, 1, 'updated', 'users', 1, '2021-05-27 10:45:24', '2021-05-27 10:45:24'),
(729, 37, 'created', 'medicalstructure', 23, '2021-05-27 10:46:51', '2021-05-27 10:46:51'),
(730, 37, 'created', 'medicalstructure', 24, '2021-05-27 10:48:39', '2021-05-27 10:48:39'),
(731, 37, 'updated', 'users', 37, '2021-05-27 10:49:55', '2021-05-27 10:49:55'),
(732, 1, 'updated', 'medicalstructure', 24, '2021-05-27 10:53:32', '2021-05-27 10:53:32'),
(733, 1, 'updated', 'users', 1, '2021-05-27 10:59:31', '2021-05-27 10:59:31'),
(734, 37, 'updated', 'medicalstructure', 24, '2021-05-27 11:00:29', '2021-05-27 11:00:29'),
(735, 37, 'updated', 'medicalstructure', 24, '2021-05-27 11:01:12', '2021-05-27 11:01:12'),
(736, 1, 'updated', 'users', 1, '2021-05-27 17:09:02', '2021-05-27 17:09:02'),
(737, 37, 'deleted', 'medicalstaff', 15, '2021-05-27 17:26:35', '2021-05-27 17:26:35'),
(738, 37, 'updated', 'users', 37, '2021-05-27 17:32:46', '2021-05-27 17:32:46'),
(739, 5, 'updated', 'users', 5, '2021-05-27 17:41:20', '2021-05-27 17:41:20'),
(740, 37, 'updated', 'users', 37, '2021-05-27 17:42:00', '2021-05-27 17:42:00'),
(741, 5, 'updated', 'users', 5, '2021-05-27 18:44:33', '2021-05-27 18:44:33'),
(742, 37, 'updated', 'users', 37, '2021-05-27 18:44:53', '2021-05-27 18:44:53'),
(743, 1, 'updated', 'users', 1, '2021-05-27 18:45:44', '2021-05-27 18:45:44'),
(744, 37, 'updated', 'users', 37, '2021-05-27 18:51:22', '2021-05-27 18:51:22'),
(745, 3, 'updated', 'users', 3, '2021-05-27 18:52:18', '2021-05-27 18:52:18'),
(746, 37, 'updated', 'users', 37, '2021-05-27 18:52:39', '2021-05-27 18:52:39'),
(747, 3, 'updated', 'users', 3, '2021-05-27 18:54:52', '2021-05-27 18:54:52'),
(748, 5, 'updated', 'users', 5, '2021-05-27 18:55:14', '2021-05-27 18:55:14'),
(749, 9, 'updated', 'users', 9, '2021-05-27 18:55:39', '2021-05-27 18:55:39'),
(750, 37, 'created', 'medicalstaff', 18, '2021-05-27 18:56:02', '2021-05-27 18:56:02'),
(751, 37, 'updated', 'users', 37, '2021-05-27 18:56:05', '2021-05-27 18:56:05'),
(752, 9, 'updated', 'users', 9, '2021-05-27 18:56:35', '2021-05-27 18:56:35'),
(753, 3, 'updated', 'users', 3, '2021-05-27 18:57:37', '2021-05-27 18:57:37'),
(754, 5, 'deleted', 'appoitement', 130, '2021-05-27 19:02:49', '2021-05-27 19:02:49'),
(755, 5, 'deleted', 'appoitement', 119, '2021-05-27 19:02:57', '2021-05-27 19:02:57'),
(756, 5, 'updated', 'users', 5, '2021-05-27 19:03:11', '2021-05-27 19:03:11'),
(757, 5, 'deleted', 'appoitement', 130, '2021-05-27 19:07:02', '2021-05-27 19:07:02'),
(758, 5, 'updated', 'users', 5, '2021-05-27 19:10:58', '2021-05-27 19:10:58'),
(759, 3, 'updated', 'users', 3, '2021-05-27 19:12:46', '2021-05-27 19:12:46'),
(760, 37, 'updated', 'users', 37, '2021-05-27 19:15:09', '2021-05-27 19:15:09'),
(761, 3, 'updated', 'appoitement', 117, '2021-05-27 19:40:37', '2021-05-27 19:40:37'),
(762, 3, 'updated', 'appoitement', 117, '2021-05-27 19:40:50', '2021-05-27 19:40:50'),
(763, 3, 'updated', 'users', 3, '2021-05-27 19:42:31', '2021-05-27 19:42:31'),
(764, 9, 'updated', 'users', 9, '2021-05-27 19:45:51', '2021-05-27 19:45:51'),
(765, 5, 'updated', 'users', 5, '2021-05-27 19:46:13', '2021-05-27 19:46:13'),
(766, 3, 'updated', 'users', 3, '2021-05-27 20:24:55', '2021-05-27 20:24:55'),
(767, 5, 'updated', 'users', 5, '2021-05-27 20:27:36', '2021-05-27 20:27:36'),
(768, 5, 'updated', 'users', 5, '2021-05-27 20:28:36', '2021-05-27 20:28:36'),
(769, 3, 'updated', 'appoitement', 131, '2021-05-27 20:29:09', '2021-05-27 20:29:09'),
(770, 3, 'updated', 'users', 3, '2021-05-27 20:29:39', '2021-05-27 20:29:39'),
(771, 5, 'updated', 'users', 5, '2021-05-27 20:31:37', '2021-05-27 20:31:37'),
(772, 40, 'created', 'medicalstructure', 25, '2021-05-28 14:36:55', '2021-05-28 14:36:55'),
(773, 40, 'created', 'medicalstructurespeciality', 41, '2021-05-28 14:36:55', '2021-05-28 14:36:55'),
(774, 40, 'created', 'medicalstructurespeciality', 42, '2021-05-28 14:36:55', '2021-05-28 14:36:55'),
(775, 40, 'created', 'medicalstaff', 20, '2021-05-28 14:37:17', '2021-05-28 14:37:17'),
(776, 40, 'updated', 'users', 40, '2021-05-28 14:37:24', '2021-05-28 14:37:24'),
(777, 5, 'updated', 'users', 5, '2021-05-28 14:39:21', '2021-05-28 14:39:21'),
(778, 3, 'updated', 'appoitement', 132, '2021-05-28 14:39:52', '2021-05-28 14:39:52'),
(779, 3, 'created', 'generalexam', 12, '2021-05-28 14:41:49', '2021-05-28 14:41:49'),
(780, 3, 'updated', 'users', 3, '2021-05-28 14:49:28', '2021-05-28 14:49:28'),
(781, 41, 'created', 'medicalstructure', 26, '2021-05-28 14:53:05', '2021-05-28 14:53:05'),
(782, 41, 'created', 'medicalstructurespeciality', 43, '2021-05-28 14:53:05', '2021-05-28 14:53:05'),
(783, 41, 'created', 'medicalstructurespeciality', 44, '2021-05-28 14:53:05', '2021-05-28 14:53:05'),
(784, 41, 'created', 'medicalstaff', 22, '2021-05-28 14:53:30', '2021-05-28 14:53:30'),
(785, 41, 'updated', 'users', 41, '2021-05-28 14:53:35', '2021-05-28 14:53:35'),
(786, 5, 'updated', 'users', 5, '2021-05-28 14:54:43', '2021-05-28 14:54:43'),
(787, 6, 'updated', 'appoitement', 133, '2021-05-28 14:55:13', '2021-05-28 14:55:13'),
(788, 6, 'created', 'generalexam', 13, '2021-05-28 14:56:27', '2021-05-28 14:56:27'),
(789, 1, 'updated', 'users', 1, '2021-05-29 08:35:17', '2021-05-29 08:35:17'),
(790, 6, 'deleted', 'generalexam', 12, '2021-05-29 08:42:19', '2021-05-29 08:42:19'),
(791, 6, 'deleted', 'generalexam', 13, '2021-05-29 08:42:31', '2021-05-29 08:42:31'),
(792, 6, 'deleted', 'generalexam', 12, '2021-05-29 08:42:59', '2021-05-29 08:42:59'),
(793, 6, 'updated', 'users', 6, '2021-05-29 08:47:14', '2021-05-29 08:47:14'),
(794, 5, 'updated', 'users', 5, '2021-05-29 08:57:08', '2021-05-29 08:57:08'),
(795, 1, 'deleted', 'report', 1, '2021-05-29 09:05:17', '2021-05-29 09:05:17'),
(796, 1, 'updated', 'users', 1, '2021-05-29 09:13:04', '2021-05-29 09:13:04'),
(797, 1, 'updated', 'users', 1, '2021-05-29 09:16:51', '2021-05-29 09:16:51'),
(798, 6, 'created', 'certificate', 2, '2021-05-29 09:18:13', '2021-05-29 09:18:13'),
(799, 6, 'updated', 'users', 6, '2021-05-29 09:18:20', '2021-05-29 09:18:20'),
(800, 3, 'created', 'certificate', 3, '2021-05-29 09:18:50', '2021-05-29 09:18:50'),
(801, 3, 'updated', 'users', 3, '2021-05-29 09:18:54', '2021-05-29 09:18:54'),
(802, 1, 'updated', 'users', 1, '2021-05-29 09:57:45', '2021-05-29 09:57:45'),
(803, 1, 'updated', 'users', 1, '2021-05-29 10:01:43', '2021-05-29 10:01:43'),
(804, 6, 'updated', 'certificate', 2, '2021-05-29 10:22:16', '2021-05-29 10:22:16'),
(805, 6, 'updated', 'users', 6, '2021-05-29 10:22:58', '2021-05-29 10:22:58'),
(806, 1, 'deleted', 'prescription', 6, '2021-05-29 10:38:30', '2021-05-29 10:38:30'),
(807, 1, 'updated', 'users', 1, '2021-05-29 10:38:45', '2021-05-29 10:38:45'),
(808, 3, 'created', 'prescription', 9, '2021-05-29 10:49:32', '2021-05-29 10:49:32'),
(809, 3, 'updated', 'users', 3, '2021-05-29 11:01:39', '2021-05-29 11:01:39'),
(810, 5, 'updated', 'users', 5, '2021-05-29 11:02:02', '2021-05-29 11:02:02'),
(811, 1, 'updated', 'users', 1, '2021-05-29 11:09:56', '2021-05-29 11:09:56'),
(812, 5, 'updated', 'users', 5, '2021-05-29 11:10:22', '2021-05-29 11:10:22'),
(813, 40, 'created', 'medicalstaff', 23, '2021-05-29 11:11:25', '2021-05-29 11:11:25'),
(814, 40, 'updated', 'users', 40, '2021-05-29 11:11:32', '2021-05-29 11:11:32'),
(815, 5, 'updated', 'users', 5, '2021-05-29 11:15:09', '2021-05-29 11:15:09'),
(816, 38, 'updated', 'users', 38, '2021-05-29 11:17:56', '2021-05-29 11:17:56'),
(817, 40, 'created', 'site', 4, '2021-05-29 11:30:10', '2021-05-29 11:30:10'),
(818, 40, 'created', 'building', 2, '2021-05-29 11:30:30', '2021-05-29 11:30:30'),
(819, 40, 'created', 'site', 5, '2021-05-29 11:40:02', '2021-05-29 11:40:02'),
(820, 40, 'created', 'site', 6, '2021-05-29 11:40:59', '2021-05-29 11:40:59'),
(821, 40, 'created', 'building', 3, '2021-05-29 11:42:40', '2021-05-29 11:42:40'),
(822, 40, 'updated', 'users', 40, '2021-05-29 12:01:48', '2021-05-29 12:01:48'),
(823, 42, 'created', 'medicalstructure', 27, '2021-05-29 12:12:34', '2021-05-29 12:12:34'),
(824, 42, 'created', 'medicalstructurespeciality', 45, '2021-05-29 12:12:35', '2021-05-29 12:12:35'),
(825, 42, 'created', 'medicalstructurespeciality', 46, '2021-05-29 12:12:35', '2021-05-29 12:12:35'),
(826, 42, 'created', 'site', 7, '2021-05-29 12:13:43', '2021-05-29 12:13:43'),
(827, 42, 'created', 'building', 4, '2021-05-29 12:14:32', '2021-05-29 12:14:32'),
(828, 42, 'created', 'medicalstaff', 25, '2021-05-29 12:15:37', '2021-05-29 12:15:37'),
(829, 42, 'created', 'medicalstaff', 26, '2021-05-29 12:16:10', '2021-05-29 12:16:10'),
(830, 42, 'created', 'service', 3, '2021-05-29 12:17:34', '2021-05-29 12:17:34'),
(831, 42, 'updated', 'users', 42, '2021-05-29 12:17:41', '2021-05-29 12:17:41'),
(832, 5, 'updated', 'users', 5, '2021-05-29 12:21:21', '2021-05-29 12:21:21'),
(833, 38, 'updated', 'users', 38, '2021-05-29 12:23:35', '2021-05-29 12:23:35'),
(834, 5, 'deleted', 'appoitement', 136, '2021-05-29 12:24:13', '2021-05-29 12:24:13'),
(835, 5, 'updated', 'users', 5, '2021-05-29 12:29:31', '2021-05-29 12:29:31'),
(836, 3, 'updated', 'appoitement', 138, '2021-05-29 12:33:06', '2021-05-29 12:33:06'),
(837, 3, 'created', 'generalexam', 14, '2021-05-29 12:34:51', '2021-05-29 12:34:51'),
(838, 3, 'updated', 'users', 3, '2021-05-29 12:35:18', '2021-05-29 12:35:18'),
(839, 1, 'updated', 'users', 1, '2021-05-29 12:36:04', '2021-05-29 12:36:04'),
(840, 3, 'created', 'certificate', 4, '2021-05-29 12:37:26', '2021-05-29 12:37:26'),
(841, 3, 'created', 'prescription', 10, '2021-05-29 12:39:18', '2021-05-29 12:39:18'),
(842, 3, 'updated', 'users', 3, '2021-05-29 12:40:16', '2021-05-29 12:40:16'),
(843, 42, 'created', 'medicastructureoffer', 2, '2021-05-29 12:40:45', '2021-05-29 12:40:45');

-- --------------------------------------------------------

--
-- Structure de la table `visitnature`
--

CREATE TABLE `visitnature` (
  `id` int(10) UNSIGNED NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `visitnature`
--

INSERT INTO `visitnature` (`id`, `alias`, `description`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'visit nature 1', 'vn1 is ...', 1, '2021-05-24 08:52:32', '2021-05-24 08:52:32', NULL),
(2, 'visit nature 2', 'vn2 is ...', 1, '2021-05-24 08:52:50', '2021-05-24 08:52:50', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `visitstatus`
--

CREATE TABLE `visitstatus` (
  `id` int(10) UNSIGNED NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `visitstatus`
--

INSERT INTO `visitstatus` (`id`, `alias`, `description`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'visit status 1', 'vs1 is ...', 1, '2021-05-24 08:53:16', '2021-05-24 08:53:16', NULL),
(2, 'visit status 2 ', 'vs2 is ...', 1, '2021-05-24 08:53:33', '2021-05-24 08:53:33', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `visittype`
--

CREATE TABLE `visittype` (
  `id` int(10) UNSIGNED NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `visittype`
--

INSERT INTO `visittype` (`id`, `alias`, `description`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'visit type 1 ', 'vt1 is ...', 1, '2021-05-24 08:54:01', '2021-05-24 08:54:01', NULL),
(2, 'visit type 2 ', 'vt2 is ...', 1, '2021-05-24 08:54:17', '2021-05-24 08:54:17', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `zone`
--

CREATE TABLE `zone` (
  `id` int(10) UNSIGNED NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `zone`
--

INSERT INTO `zone` (`id`, `alias`, `description`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HCNN', 'La région Afrique & Océan indien regroupe les CCE en Afrique subsaharienne et dans l’Océan indien ainsi que les CCE opérant sur la zone à partir de la France.', 1, '2021-05-02 21:16:30', '2021-05-26 19:36:51', NULL),
(2, 'AMÉRIQUE LATINE & CARAÏBES', 'La région Amérique latine et Caraïbes regroupe à la fois les CCE de la zone (Mexique, Amérique centrale, Caraïbes et Amérique du Sud) et ceux en France, tous spécialistes de l’Amérique latine et des Caraïbes.', 1, '2021-05-02 21:17:10', '2021-05-26 19:33:30', NULL),
(3, 'newzone', 'new zone is ...', 1, '2021-05-06 18:44:20', '2021-05-26 19:40:12', NULL),
(4, 'HCN', 'kkk1', 1, '2021-05-18 17:14:50', '2021-05-26 19:33:37', NULL),
(5, 'zone 123', 'it is a ...', 1, '2021-05-26 19:40:49', '2021-05-26 19:41:18', '2021-05-26 19:41:18');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appoitement`
--
ALTER TABLE `appoitement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultation_report_id_foreign` (`report_id`),
  ADD KEY `consultation_visitnature_id_foreign` (`visitnature_id`),
  ADD KEY `consultation_visitstatus_id_foreign` (`visitstatus_id`),
  ADD KEY `consultation_visittype_id_foreign` (`visittype_id`);

--
-- Index pour la table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `detailsprescription`
--
ALTER TABLE `detailsprescription`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `drugfamilly`
--
ALTER TABLE `drugfamilly`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `drugmaker`
--
ALTER TABLE `drugmaker`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `generalexam`
--
ALTER TABLE `generalexam`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `medicalstaff`
--
ALTER TABLE `medicalstaff`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `medicalstructure`
--
ALTER TABLE `medicalstructure`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medcountry_id_foreign` (`country_id`);

--
-- Index pour la table `medicalstructurespeciality`
--
ALTER TABLE `medicalstructurespeciality`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `medicastructureoffer`
--
ALTER TABLE `medicastructureoffer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Index pour la table `menutype`
--
ALTER TABLE `menutype`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu_role`
--
ALTER TABLE `menu_role`
  ADD UNIQUE KEY `menu_role_menu_id_role_id_unique` (`menu_id`,`role_id`),
  ADD KEY `menu_role_menu_id_index` (`menu_id`),
  ADD KEY `menu_role_role_id_index` (`role_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `newcmp`
--
ALTER TABLE `newcmp`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `offertype`
--
ALTER TABLE `offertype`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_user_id_foreign` (`user_id`);

--
-- Index pour la table `piledoctorappoitement`
--
ALTER TABLE `piledoctorappoitement`
  ADD KEY `piledoctorappoitement_medicalstructure_id_foreign` (`medicalstructure_id`),
  ADD KEY `piledoctorappoitement_doctor_id_foreign` (`doctor_id`);

--
-- Index pour la table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `servicecontact`
--
ALTER TABLE `servicecontact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sett`
--
ALTER TABLE `sett`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `structuretype`
--
ALTER TABLE `structuretype`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `usermenu`
--
ALTER TABLE `usermenu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Index pour la table `users_logs`
--
ALTER TABLE `users_logs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visitnature`
--
ALTER TABLE `visitnature`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visitstatus`
--
ALTER TABLE `visitstatus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visittype`
--
ALTER TABLE `visittype`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `appoitement`
--
ALTER TABLE `appoitement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT pour la table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `detailsprescription`
--
ALTER TABLE `detailsprescription`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `drug`
--
ALTER TABLE `drug`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `drugfamilly`
--
ALTER TABLE `drugfamilly`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `drugmaker`
--
ALTER TABLE `drugmaker`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `generalexam`
--
ALTER TABLE `generalexam`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `medicalstaff`
--
ALTER TABLE `medicalstaff`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `medicalstructure`
--
ALTER TABLE `medicalstructure`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `medicalstructurespeciality`
--
ALTER TABLE `medicalstructurespeciality`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `medicastructureoffer`
--
ALTER TABLE `medicastructureoffer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT pour la table `menutype`
--
ALTER TABLE `menutype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `newcmp`
--
ALTER TABLE `newcmp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `offertype`
--
ALTER TABLE `offertype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `response`
--
ALTER TABLE `response`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `servicecontact`
--
ALTER TABLE `servicecontact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sett`
--
ALTER TABLE `sett`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `speciality`
--
ALTER TABLE `speciality`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `structuretype`
--
ALTER TABLE `structuretype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `usermenu`
--
ALTER TABLE `usermenu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `users_logs`
--
ALTER TABLE `users_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=844;

--
-- AUTO_INCREMENT pour la table `visitnature`
--
ALTER TABLE `visitnature`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `visitstatus`
--
ALTER TABLE `visitstatus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `visittype`
--
ALTER TABLE `visittype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `zone`
--
ALTER TABLE `zone`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `consultation_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultation_visitnature_id_foreign` FOREIGN KEY (`visitnature_id`) REFERENCES `visitnature` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultation_visitstatus_id_foreign` FOREIGN KEY (`visitstatus_id`) REFERENCES `visitstatus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultation_visittype_id_foreign` FOREIGN KEY (`visittype_id`) REFERENCES `visittype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `medicalstructure`
--
ALTER TABLE `medicalstructure`
  ADD CONSTRAINT `medcountry_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `menu_role`
--
ALTER TABLE `menu_role`
  ADD CONSTRAINT `menu_role_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `piledoctorappoitement`
--
ALTER TABLE `piledoctorappoitement`
  ADD CONSTRAINT `piledoctorappoitement_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `piledoctorappoitement_medicalstructure_id_foreign` FOREIGN KEY (`medicalstructure_id`) REFERENCES `medicalstructure` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
