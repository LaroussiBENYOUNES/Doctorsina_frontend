-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 28 juin 2021 à 11:22
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
-- Base de données : `doctorsinadmi`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

CREATE TABLE `activity` (
  `id` int(10) UNSIGNED NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `activity`
--

INSERT INTO `activity` (`id`, `alias`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'activity 1 ', 'activity 1 is about', '2021-06-06 17:10:37', '2021-06-06 17:17:24', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `allergy`
--

CREATE TABLE `allergy` (
  `id` int(10) UNSIGNED NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `allergy`
--

INSERT INTO `allergy` (`id`, `alias`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'a1', 'a1 is a', '2021-06-08 10:29:09', '2021-06-08 11:24:02', NULL);

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
(218, 30, 2, 1, '2021-06-10', '08:30', 1, '2021-06-07 10:34:36', NULL, NULL),
(219, 31, 2, 1, '2021-06-08', '10:00', 1, '2021-06-07 13:27:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `attitude`
--

CREATE TABLE `attitude` (
  `id` int(10) UNSIGNED NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `attitude`
--

INSERT INTO `attitude` (`id`, `alias`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'attitude 1 ', 'attitude 1 is about', '2021-06-06 16:45:18', '2021-06-06 16:58:17', NULL);

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
(1, 1, 'ryehi clinic tunisia - building 1', 'rctb1', 'rctb1 is ..', 1, '2021-05-26 12:37:19', '2021-06-01 20:32:45', '2021-06-01 20:32:45'),
(2, 4, 'b sc 2', '', '', 1, '2021-05-29 11:30:30', '2021-05-29 11:30:30', NULL),
(3, 6, 'bbbbbbbbbbb', '', '', 1, '2021-05-29 11:42:40', '2021-05-29 11:42:40', NULL),
(5, 7, 'building 1 site 1', 'b1', '', 1, '2021-06-02 04:44:25', '2021-06-02 04:54:12', NULL),
(6, 7, 'ssss', 'ss', '', 0, '2021-06-02 04:49:37', '2021-06-02 04:54:21', '2021-06-02 04:54:21'),
(7, 9, 'building 1 ', '', '', 1, '2021-06-07 10:32:40', '2021-06-07 10:32:40', NULL);

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
(7, 44, 'description certificate about ..', 1, '2021-06-07 10:37:54', '2021-06-07 10:38:08', NULL),
(8, 45, 'description', 1, '2021-06-07 13:29:02', '2021-06-07 13:29:02', NULL);

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
(44, 218, NULL, 1, 1, 2, '2021-06-10', '08:30', '2021-06-07 10:36:25', NULL, NULL),
(45, 219, NULL, 1, 1, 2, '2021-06-08', '10:00', '2021-06-07 13:28:04', NULL, NULL);

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
(1, 'Tunisia', 3, 'La Tunisie est un pays d\'Afrique du Nord situé sur la côte méditerranéenne et en bordure du désert du Sahara. Le musée national du Bardo à Tunis, la capitale, expose des pièces archéologiques allant des mosaïques romaines à l\'art islamique. Le quartier de la Médina, avec son souk animé, encercle l\'imposante mosquée Zitouna. À l\'est, sur le site de l\'ancienne cité de Carthage, se trouvent les thermes d\'Antonin et d\'autres ruines, et le musée national de Carthage et ses nombreux objets.', 1, '2021-05-02 21:22:19', '2021-05-31 18:50:37', NULL),
(2, 'Bresil', 2, 'Le Brésil, vaste pays d\'Amérique du Sud, s\'étend du bassin amazonien au nord à des vignobles et aux chutes d\'Iguaçu au sud. La ville de Rio de Janeiro, caractérisée par sa statue du Christ Rédempteur de 38 mètres de haut située au sommet du Corcovado, est réputée pour ses plages très fréquentées de Copacabana et d\'Ipanema, ainsi que pour son énorme carnaval animé, avec défilés de chars, costumes flamboyants, et musique et danse samba.', 1, '2021-05-02 21:23:31', '2021-05-02 21:23:31', NULL),
(3, 'algeria', 1, 'algeria is', 1, '2021-05-05 13:11:08', '2021-05-31 18:51:10', '2021-05-31 18:51:10'),
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
(33, 11, 1, '4', '4', '2021-06-04 16:19:29', '2021-06-04 16:19:51', '2021-06-04 16:19:51'),
(34, 11, 2, '4', '4', '2021-06-04 16:19:29', '2021-06-04 16:19:52', '2021-06-04 16:19:52'),
(35, 11, 1, '4', '4', '2021-06-04 16:19:52', '2021-06-04 16:21:36', '2021-06-04 16:21:36'),
(36, 11, 1, '4', '4', '2021-06-04 16:21:36', '2021-06-04 16:21:36', NULL),
(37, 12, 1, '3', '10', '2021-06-07 10:37:24', NULL, NULL),
(38, 12, 2, '2', '7', '2021-06-07 10:37:24', NULL, NULL),
(39, 13, 1, '2', '7', '2021-06-07 13:28:30', NULL, NULL);

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
(3, 'drug familly 3', 'df3', 'df3 is ....', 1, '2021-05-21 16:53:57', '2021-05-31 18:52:36', NULL);

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
(3, 'drug maker 3', 'dm3 ', 'dm3 is ...', 1, '2021-05-21 16:54:39', '2021-05-31 19:23:38', NULL);

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
(16, '70.00', '1.80', '37.00', 44, 1, '2021-06-07 10:38:58', '2021-06-07 10:38:58', NULL),
(17, '70.00', '1.80', '37.00', 45, 1, '2021-06-07 13:29:24', '2021-06-07 13:29:24', NULL);

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
-- Structure de la table `historyactivity`
--

CREATE TABLE `historyactivity` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `begginningdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `place` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `historyactivity`
--

INSERT INTO `historyactivity` (`id`, `user_id`, `activity_id`, `begginningdate`, `enddate`, `place`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 38, 1, '2021-05-06', '2021-06-25', 'xx 1', '2021-06-07 08:25:22', '2021-06-07 08:27:23', NULL),
(2, 5, 1, '2021-05-07', '2021-05-07', 'bbnn', '2021-06-07 08:37:23', '2021-06-07 08:37:40', '2021-06-07 08:37:40'),
(3, 36, 1, '2021-05-20', '2021-05-15', 'n', '2021-06-07 08:42:57', '2021-06-07 08:42:57', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `historyallergy`
--

CREATE TABLE `historyallergy` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `allergy_id` int(11) NOT NULL,
  `begginningdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `historyallergy`
--

INSERT INTO `historyallergy` (`id`, `user_id`, `allergy_id`, `begginningdate`, `enddate`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 38, 1, '2021-05-14', '2021-06-26', '2021-06-08 10:48:45', '2021-06-08 10:50:22', NULL),
(2, 5, 1, '2021-05-07', '2021-06-28', '2021-06-08 10:50:53', '2021-06-08 10:51:02', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `historyattitude`
--

CREATE TABLE `historyattitude` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `attitude_id` int(11) NOT NULL,
  `begginningdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `historyattitude`
--

INSERT INTO `historyattitude` (`id`, `user_id`, `attitude_id`, `begginningdate`, `enddate`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 1, '2021-05-31', '2021-06-28', '2021-06-06 19:29:31', '2021-06-06 20:07:14', '2021-06-06 20:07:14'),
(2, 38, 1, '2021-05-12', '2021-06-12', '2021-06-06 19:50:22', '2021-06-06 20:07:15', '2021-06-06 20:07:15'),
(3, 5, 1, '2021-05-06', '2021-05-07', '2021-06-06 20:01:09', '2021-06-06 20:07:15', '2021-06-06 20:07:15'),
(4, 5, 1, '2021-05-07', '2021-06-24', '2021-06-06 20:01:30', '2021-06-06 20:07:15', '2021-06-06 20:07:15'),
(6, 5, 1, '2021-05-01', '2021-05-01', '2021-06-06 20:02:42', '2021-06-06 20:02:42', NULL),
(7, 36, 1, '2021-05-28', '2021-06-17', '2021-06-06 20:06:44', '2021-06-06 20:06:55', NULL),
(8, 5, 1, '2021-05-08', '2021-06-29', '2021-06-07 10:39:32', '2021-06-07 10:39:32', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `historystatus`
--

CREATE TABLE `historystatus` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `begginningdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `historystatus`
--

INSERT INTO `historystatus` (`id`, `user_id`, `status_id`, `begginningdate`, `enddate`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 38, 1, '2021-05-07', '2021-05-06', '2021-06-07 09:47:16', '2021-06-07 09:47:16', NULL),
(2, 5, 1, '2021-05-08', '2021-06-30', '2021-06-07 09:49:24', '2021-06-07 09:49:33', '2021-06-07 09:49:33');

-- --------------------------------------------------------

--
-- Structure de la table `historyvaccine`
--

CREATE TABLE `historyvaccine` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `datevaccin` date NOT NULL,
  `nbr` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `historyvaccine`
--

INSERT INTO `historyvaccine` (`id`, `user_id`, `vaccine_id`, `datevaccin`, `nbr`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 38, 2, '2021-06-10', '6', '2021-06-08 12:05:30', '2021-06-08 12:07:55', NULL);

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
(29, 42, 30, NULL, NULL, NULL),
(30, 3, 30, '2021-06-07 10:33:12', '2021-06-07 10:33:12', NULL),
(31, 6, 30, '2021-06-07 10:33:21', '2021-06-07 10:33:21', NULL),
(32, 42, 31, NULL, NULL, NULL),
(33, 3, 31, '2021-06-07 13:26:12', '2021-06-07 13:26:12', NULL);

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
(4, 'salah clinic', 'sc', 'sc is ...', 1, 1, 0, 1, '2021-05-14 12:19:51', '2021-05-14 12:19:51', NULL),
(30, 'mourad medical structure', 'mms', 'mms is ...', 2, 1, 0, 1, '2021-06-07 10:31:42', '2021-06-07 10:31:42', NULL),
(31, 'new structure', '', '', 2, 1, 0, 1, '2021-06-07 13:25:47', '2021-06-07 13:25:47', NULL);

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
(1, 2, 1, '2021-05-02 11:03:45', '2021-06-01 13:20:04', '2021-06-01 13:20:04'),
(2, 1, 1, '2021-05-02 11:04:03', '2021-06-01 13:20:04', '2021-06-01 13:20:04'),
(3, 3, 1, '2021-05-02 19:55:55', '2021-06-01 13:20:04', '2021-06-01 13:20:04'),
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
(46, 2, 27, '2021-05-29 12:12:35', '2021-05-29 12:12:35', NULL),
(47, 1, 1, '2021-06-01 13:20:04', '2021-06-01 13:22:14', '2021-06-01 13:22:14'),
(48, 2, 1, '2021-06-01 13:20:04', '2021-06-01 13:22:14', '2021-06-01 13:22:14'),
(49, 1, 1, '2021-06-01 13:22:14', '2021-06-01 13:22:14', NULL),
(50, 1, 30, '2021-06-07 10:31:42', '2021-06-07 10:31:42', NULL),
(51, 2, 30, '2021-06-07 10:31:42', '2021-06-07 10:31:42', NULL),
(52, 1, 31, '2021-06-07 13:25:48', '2021-06-07 13:25:48', NULL),
(53, 2, 31, '2021-06-07 13:25:48', '2021-06-07 13:25:48', NULL);

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
(4, 30, 1, '2021-05-06', '2021-05-08', 1, '2021-06-07 10:33:43', '2021-06-07 10:33:43', NULL);

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
(13, 0, 2, 'fa-building-o', 'Structure', 'Structure', NULL, '2016-10-11 07:26:14', '2016-10-11 09:52:40'),
(36, 0, 1, 'fa-sitemap', 'Speciality', 'Speciality', 13, '2016-11-21 13:41:12', '2016-11-21 13:41:12'),
(38, 0, 2, 'fa-male', 'Personne', 'Personne', NULL, '2016-11-21 14:42:16', '2016-11-21 14:42:16'),
(80, 0, 2, 'fa-user-o', 'Consultations', 'Consultations', NULL, '2016-11-25 06:33:10', '2016-11-25 06:33:10'),
(106, 0, 2, 'fa-stethoscope', 'Examen&Complément', 'Exam & Complement', NULL, '2016-11-30 07:50:36', '2016-11-30 07:50:36'),
(127, 0, 1, 'fa-history', 'Histoypatient', 'Patient', 124, '2016-12-14 06:53:18', '2016-12-14 06:53:18'),
(150, 0, 1, 'fa-home', 'StructureType', 'Structure Type', 13, '2021-05-02 08:57:19', '2021-05-18 13:17:21'),
(154, 0, 1, 'fa-building-o', 'MedicalStructure', 'Medical Structure', 13, '2021-05-02 10:50:08', '2021-05-02 10:50:08'),
(155, 0, 1, 'fa-flag', 'MedicalStructureSpeciality', 'Structures Specialities', 13, '2021-05-02 11:03:01', '2021-05-18 13:29:42'),
(156, 0, 1, 'fa-globe', 'Zone', 'Zone', 7, '2021-05-02 21:13:27', '2021-05-18 17:08:53'),
(157, 0, 1, 'fa-flag', 'Country', 'Country', 7, '2021-05-02 21:20:20', '2021-05-18 16:50:01'),
(164, 0, 1, 'fa-user-md', 'Doctor', 'Doctor', 38, '2021-05-03 13:57:43', '2021-05-16 19:48:17'),
(165, 0, 1, 'fa-calendar', 'Appoitement', 'Appoitement', 38, '2021-05-03 14:03:01', '2021-05-03 14:03:01'),
(167, 0, 1, 'fa-user-o', 'Consultation', 'Consultation', 80, '2021-05-03 16:08:04', '2021-06-04 16:26:46'),
(170, 0, 1, 'fa-stethoscope', 'Generalexam', 'General Exam', 106, '2021-05-03 23:45:22', '2021-05-16 21:38:24'),
(178, 0, 1, 'fa-male', 'Patient', 'Patient', 38, '2021-05-05 12:13:42', '2021-05-16 20:55:30'),
(217, 0, 1, 'fa-tint', 'Drugfamilly', 'Drug Familly', 7, '2021-05-21 16:22:17', '2021-05-21 16:22:17'),
(218, 0, 1, 'fa-tint', 'Drugmaker', 'Drug Maker', 7, '2021-05-21 16:27:56', '2021-05-21 16:27:56'),
(219, 0, 1, 'fa-tint', 'Drug', 'Drug', 7, '2021-05-21 16:32:12', '2021-05-21 16:32:12'),
(220, 0, 1, 'fa-tint', 'Prescription', 'Prescription', 80, '2021-05-21 16:43:33', '2021-05-21 16:45:21'),
(221, 0, 1, 'fa-info-circle', 'Detailsprescription', 'Details Prescription', 80, '2021-05-21 18:16:06', '2021-06-04 16:27:26'),
(222, 0, 1, 'fa-certificate', 'Certificate', 'Certificate', 80, '2021-05-22 12:30:14', '2021-05-22 12:30:14'),
(223, 0, 1, 'fa-file', 'Report', 'Report', 80, '2021-05-22 13:06:20', '2021-06-04 16:28:27'),
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
(238, 0, 1, 'fa-briefcase', 'Servicecontact', 'Service Contact', 13, '2021-05-26 14:09:44', '2021-06-01 21:11:45'),
(240, 0, 1, 'fa-user-plus', 'medicalstaff', 'Medical Staff', 13, '2021-05-18 18:11:56', '2021-06-01 21:33:27'),
(241, 0, 2, 'fa-history', 'Antecedent', 'Antecedent', NULL, '2021-06-06 16:27:02', '2021-06-06 16:32:18'),
(242, 0, 1, 'fa-eyedropper', 'Attitude', 'Attitude', 241, '2021-06-06 16:29:55', '2021-06-06 16:33:55'),
(243, 0, 1, 'fa-user-md', 'Activity', 'Activity', 241, '2021-06-06 16:59:55', '2021-06-06 17:21:08'),
(244, 0, 1, 'fa-tachometer', 'Status', 'Status', 241, '2021-06-06 17:24:15', '2021-06-06 17:27:00'),
(245, 0, 1, 'fa-history', 'Historyattitude', 'History Attitudes', 241, '2021-06-06 18:22:49', '2021-06-06 18:22:49'),
(246, 0, 1, 'fa-history', 'Historyactivity', 'History Activities', 241, '2021-06-07 07:44:46', '2021-06-07 07:44:46'),
(247, 0, 1, 'fa-history', 'Historystatus', 'History Status', 241, '2021-06-07 09:10:35', '2021-06-07 09:10:35'),
(248, 0, 1, 'fa-stethoscope', 'Allergy', 'Allergy', 241, '2021-06-08 10:17:05', '2021-06-08 10:28:22'),
(249, 0, 1, 'fa-history', 'Historyallergy', 'History Allergy', 241, '2021-06-08 10:33:53', '2021-06-08 10:33:53'),
(250, 0, 1, 'fa-medkit', 'Vaccine', 'Vaccine', 241, '2021-06-08 11:08:59', '2021-06-08 11:08:59'),
(251, 0, 1, 'fa-history', 'Historyvaccine', 'History Vaccine', 241, '2021-06-08 11:35:50', '2021-06-08 11:35:50');

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
(13, 1),
(13, 2),
(13, 10),
(13, 12),
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
(80, 1),
(80, 2),
(80, 10),
(106, 1),
(106, 2),
(106, 10),
(127, 1),
(127, 10),
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
(240, 1),
(240, 2),
(240, 10),
(240, 11),
(240, 12),
(241, 1),
(241, 2),
(241, 10),
(241, 11),
(241, 12),
(242, 1),
(242, 2),
(242, 10),
(242, 12),
(243, 1),
(243, 2),
(243, 10),
(243, 12),
(244, 1),
(244, 2),
(244, 10),
(244, 12),
(245, 1),
(245, 2),
(245, 10),
(245, 12),
(246, 1),
(246, 2),
(246, 10),
(246, 12),
(247, 1),
(247, 2),
(247, 10),
(247, 12),
(248, 1),
(248, 2),
(248, 10),
(248, 12),
(249, 1),
(249, 2),
(249, 10),
(249, 12),
(250, 1),
(250, 10),
(250, 11),
(250, 12),
(251, 1),
(251, 2),
(251, 10),
(251, 12);

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
(57, '2021_05_26_160301_create_sett_table', 41),
(58, '2021_06_06_172955_create_attitude_table', 42),
(59, '2021_06_06_175955_create_activity_table', 43),
(60, '2021_06_06_182415_create_status_table', 44),
(61, '2021_06_06_192249_create_historyattitude_table', 45),
(62, '2021_06_07_084446_create_historyactivity_table', 46),
(63, '2021_06_07_101035_create_historystatus_table', 47),
(64, '2021_06_08_111705_create_allergy_table', 48),
(65, '2021_06_08_113354_create_historyallergy_table', 49),
(66, '2021_06_08_120859_create_vaccine_table', 50),
(67, '2021_06_08_123550_create_historyvaccine_table', 51);

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
(1, 'offer 1', 'o1', 'o1 is ...', 1, '2021-05-25 09:42:09', '2021-05-31 20:12:31', NULL),
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
(5, 38, 'aziz rbii', '2021-05-12', NULL, NULL, NULL, 1, 1, 0, '2021-05-15 14:27:14', NULL, NULL),
(6, 43, 'Laroussi BEN YOUNES', NULL, NULL, NULL, NULL, 1, 1, 0, '2021-06-09 12:20:35', NULL, NULL);

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
(12, 44, 'prescription consultation 44', 'description', 1, '2021-06-07 10:37:24', '2021-06-07 10:37:24', NULL),
(13, 45, 'p', '', 1, '2021-06-07 13:28:30', '2021-06-07 13:28:30', NULL);

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
(21, 2, 44, 'response of patient', '2021-06-07 10:36:25', NULL, NULL),
(22, 2, 45, 'response du patient', '2021-06-07 13:28:04', NULL, NULL);

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
(1, 2, 'service1@gmail.com', 'email', '2021-05-26 14:35:01', '2021-05-26 14:40:47', NULL),
(2, 3, 's1@gmail.com', 'email', '2021-06-02 05:22:28', '2021-06-02 05:22:28', NULL);

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
(9, 30, 2, 'mourad medical structure in bresil', '', '', 1, '2021-06-07 10:32:19', '2021-06-07 10:32:19', NULL);

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
(4, 'newsp', 'nwsp', 'nwsp is ...', 1, '2021-05-18 16:41:31', '2021-06-01 12:52:59', '2021-06-01 12:52:59');

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`id`, `alias`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'status 1', 'status 1 is about', '2021-06-06 17:43:35', '2021-06-06 17:49:25', NULL);

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
(1, 1, 'superadmin', 'admin@etoubib.com', NULL, NULL, NULL, NULL, '$2y$10$jafYmidPfjlppHm3C38fQOcP1C5UEq6ix1XgqcqgI.aLzyInWyhlu', 'sM3PNZk79420TqFL55pQEf5XpF4nA4X0LLHqdpqwFogLjjG0AlwycfcpFL3a', 0, '2016-10-03 08:06:16', '2021-06-08 12:13:44'),
(2, 12, 'test', 'test3@test.com', NULL, NULL, NULL, NULL, '$2y$10$jafYmidPfjlppHm3C38fQOcP1C5UEq6ix1XgqcqgI.aLzyInWyhlu', 'Ht17W04yyhm1ucOIcPvkGPEFSzmBJ49NUmNrduGCvCVNRxGBaWKPGCDwojUf', 0, '2016-12-29 11:55:42', '2021-05-04 13:53:18'),
(3, 10, 'dalibenameur', 'dalibenameur@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$jafYmidPfjlppHm3C38fQOcP1C5UEq6ix1XgqcqgI.aLzyInWyhlu', 'I8MwqDzTaLyCARtSSUAMlN998tgofxSDSMPBG7ztAQaFysiJT9PjaDtWn2ez', 0, '2018-06-16 12:50:40', '2021-06-08 12:10:03'),
(4, 1, 'superadmin', 'admin@etoubib2.com', NULL, NULL, NULL, NULL, '$2y$10$jafYmidPfjlppHm3C38fQOcP1C5UEq6ix1XgqcqgI.aLzyInWyhlu', '2euC1mxWpiSm5PigGrenUdohqoKvaRbfK220WspZyAHeUCwwx1QVQ7cto0UT', 0, '2016-10-03 08:06:16', '2018-06-16 12:50:45'),
(5, 2, 'aziz', 'aziz@patient.com', NULL, NULL, NULL, NULL, '$2y$10$jafYmidPfjlppHm3C38fQOcP1C5UEq6ix1XgqcqgI.aLzyInWyhlu', 'iPzfXpKZIZ1NDjCU083XCjetPbQa2XArqMsEu9QqOK5V3WlZaJNHH7dOGiOZ', 0, '2016-12-29 11:55:42', '2021-06-08 12:14:27'),
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
(38, 2, 'aziz rbii', 'aziz.rbii@gmail.com', '2021-05-15', 'Male', 1, 26753381, '$2y$10$V.5vdod7OcSFgUG/yBFiiuxos4L/TmOxX.DVP9mJXCWcM5Cp3Qm0.', 'T8vcmtzw1yhTCOcfX9wpT2MR1993u1nNVjVTzyPNd3YI30EJMyL5yfPBouDW', 1, '2021-05-15 14:27:14', '2021-06-08 12:15:27'),
(39, 10, 'aziztoubib', 'aziztoubib@gmail.com', '2021-05-16', 'Male', 1, 26753381, '$2y$10$V.2ZNtU9M29SIO7YsGcBo.y29viGCLuBdPGujjvrmI5oqo.dDFiI6', 'Oo2hDspUysvc3QPxjvZjKkj8HdXklHkS2KdMwjU0mY4TnzzASjhpK9m0b9qw', 0, '2021-05-16 19:31:49', '2021-05-16 19:32:33'),
(40, 12, 'salah', 'salah@gmail.com', '2021-05-28', 'Male', 1, 267533891, '$2y$10$AzaJ5LgPpKKExqt.mwMrWuK4//AN3SIs1R4se7sMgAT7.iSIpQJyq', 'PJs9iGNAFZcudZOFDdLaludc8PxQ73ZlflResDbOHsLVR0LrPmPZH3ZDz1uz', 0, '2021-05-28 14:35:48', '2021-05-29 12:01:48'),
(41, 12, 'montassar rbii', 'montassarrbii@gmail.com', '2021-05-28', 'Male', 1, 26778899, '$2y$10$8eeAo6d6vExHwjkVwXqJf.1hhhxdupeQiqBOw42wy6aVqGmg80zVe', 'jxTMRThPTpougcm9B9fdJSpU7bMuz7nBnXOGmdLR57DWvCBypzmbqeN35bFM', 0, '2021-05-28 14:52:18', '2021-05-28 14:53:35'),
(42, 12, 'mourad ', 'mourad@gmail.com', '2021-05-29', 'Male', 1, 22255669, '$2y$10$N44JTtZRbkirR/VN6kdr.OAp7QR/w670x1gUrNRi5UUyB2loFPHI2', 'pBEAQBrHtpBtdvHflENIl1jbELI1Eao6wsAJ3e1Z6uNEBmWMrwoaKaUOs84t', 0, '2021-05-29 12:11:39', '2021-06-08 10:51:24'),
(43, 1, 'Laroussi BEN YOUNES', 'l.benyounes@gmail.com', '1976-07-25', 'Male', 1, 58784641, '$2y$10$.ItiPoPFiBuatg0P.z0mSeFUtxt7.7GoOjPTj4cGmwUz81s0qFfIq', 'S0X46llAgwINYE0xFsVfUxAco5mHTNw7Wx2zQ1hb', 1, '2021-06-09 12:20:34', '2021-06-09 12:20:34');

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
(843, 42, 'created', 'medicastructureoffer', 2, '2021-05-29 12:40:45', '2021-05-29 12:40:45'),
(844, 42, 'updated', 'users', 42, '2021-05-31 14:05:26', '2021-05-31 14:05:26'),
(845, 1, 'updated', 'users', 1, '2021-05-31 14:21:26', '2021-05-31 14:21:26'),
(846, 42, 'updated', 'users', 42, '2021-05-31 14:30:20', '2021-05-31 14:30:20'),
(847, 1, 'updated', 'users', 1, '2021-05-31 14:31:17', '2021-05-31 14:31:17'),
(848, 42, 'updated', 'users', 42, '2021-05-31 15:08:55', '2021-05-31 15:08:55'),
(849, 1, 'updated', 'users', 1, '2021-05-31 17:24:22', '2021-05-31 17:24:22'),
(850, 1, 'updated', 'users', 1, '2021-05-31 17:27:30', '2021-05-31 17:27:30'),
(851, 42, 'updated', 'users', 42, '2021-05-31 17:29:17', '2021-05-31 17:29:17'),
(852, 5, 'updated', 'users', 5, '2021-05-31 17:30:14', '2021-05-31 17:30:14'),
(853, 3, 'updated', 'users', 3, '2021-05-31 17:32:02', '2021-05-31 17:32:02'),
(854, 1, 'deleted', 'zone', 1, '2021-05-31 18:45:26', '2021-05-31 18:45:26'),
(855, 1, 'updated', 'zone', 4, '2021-05-31 18:46:44', '2021-05-31 18:46:44'),
(856, 1, 'updated', 'country', 1, '2021-05-31 18:50:37', '2021-05-31 18:50:37'),
(857, 1, 'deleted', 'country', 3, '2021-05-31 18:51:10', '2021-05-31 18:51:10'),
(858, 1, 'deleted', 'drugfamilly', 3, '2021-05-31 18:52:36', '2021-05-31 18:52:36'),
(859, 1, 'deleted', 'drugmaker', 3, '2021-05-31 19:23:38', '2021-05-31 19:23:38'),
(860, 1, 'created', 'visitnature', 3, '2021-05-31 19:36:28', '2021-05-31 19:36:28'),
(861, 1, 'updated', 'visitnature', 1, '2021-05-31 19:43:05', '2021-05-31 19:43:05'),
(862, 1, 'deleted', 'visitstatus', 1, '2021-05-31 19:46:38', '2021-05-31 19:46:38'),
(863, 1, 'updated', 'offertype', 1, '2021-05-31 20:12:01', '2021-05-31 20:12:01'),
(864, 1, 'updated', 'offertype', 1, '2021-05-31 20:12:31', '2021-05-31 20:12:31'),
(865, 1, 'updated', 'users', 1, '2021-05-31 20:13:50', '2021-05-31 20:13:50'),
(866, 5, 'updated', 'users', 5, '2021-06-01 11:12:55', '2021-06-01 11:12:55'),
(867, 1, 'updated', 'users', 1, '2021-06-01 11:15:30', '2021-06-01 11:15:30'),
(868, 5, 'updated', 'users', 5, '2021-06-01 11:38:49', '2021-06-01 11:38:49'),
(869, 3, 'updated', 'users', 3, '2021-06-01 11:45:05', '2021-06-01 11:45:05'),
(870, 42, 'updated', 'users', 42, '2021-06-01 12:43:33', '2021-06-01 12:43:33'),
(871, 1, 'deleted', 'speciality', 4, '2021-06-01 12:52:59', '2021-06-01 12:52:59'),
(872, 1, 'created', 'medicalstructure', 28, '2021-06-01 13:16:25', '2021-06-01 13:16:25'),
(873, 1, 'deleted', 'medicalstructurespeciality', 1, '2021-06-01 13:20:04', '2021-06-01 13:20:04'),
(874, 1, 'deleted', 'medicalstructurespeciality', 2, '2021-06-01 13:20:04', '2021-06-01 13:20:04'),
(875, 1, 'deleted', 'medicalstructurespeciality', 3, '2021-06-01 13:20:04', '2021-06-01 13:20:04'),
(876, 1, 'created', 'medicalstructurespeciality', 47, '2021-06-01 13:20:04', '2021-06-01 13:20:04'),
(877, 1, 'created', 'medicalstructurespeciality', 48, '2021-06-01 13:20:04', '2021-06-01 13:20:04'),
(878, 1, 'updated', 'medicalstructure', 1, '2021-06-01 13:20:04', '2021-06-01 13:20:04'),
(879, 1, 'created', 'medicalstructure', 29, '2021-06-01 13:20:54', '2021-06-01 13:20:54'),
(880, 1, 'deleted', 'medicalstructurespeciality', 47, '2021-06-01 13:22:14', '2021-06-01 13:22:14'),
(881, 1, 'deleted', 'medicalstructurespeciality', 48, '2021-06-01 13:22:14', '2021-06-01 13:22:14'),
(882, 1, 'created', 'medicalstructurespeciality', 49, '2021-06-01 13:22:14', '2021-06-01 13:22:14'),
(883, 1, 'updated', 'medicalstructure', 1, '2021-06-01 13:22:14', '2021-06-01 13:22:14'),
(884, 1, 'deleted', 'site', 5, '2021-06-01 20:21:52', '2021-06-01 20:21:52'),
(885, 1, 'deleted', 'building', 1, '2021-06-01 20:32:45', '2021-06-01 20:32:45'),
(886, 42, 'updated', 'users', 42, '2021-06-02 04:06:00', '2021-06-02 04:06:00'),
(887, 1, 'updated', 'users', 1, '2021-06-02 04:06:30', '2021-06-02 04:06:30'),
(888, 42, 'created', 'medicastructureoffer', 3, '2021-06-02 04:28:14', '2021-06-02 04:28:14'),
(889, 42, 'updated', 'medicastructureoffer', 2, '2021-06-02 04:35:48', '2021-06-02 04:35:48'),
(890, 42, 'updated', 'medicastructureoffer', 3, '2021-06-02 04:37:28', '2021-06-02 04:37:28'),
(891, 42, 'updated', 'users', 42, '2021-06-02 04:37:52', '2021-06-02 04:37:52'),
(892, 1, 'updated', 'medicastructureoffer', 2, '2021-06-02 04:38:12', '2021-06-02 04:38:12'),
(893, 1, 'updated', 'medicastructureoffer', 3, '2021-06-02 04:38:19', '2021-06-02 04:38:19'),
(894, 1, 'updated', 'users', 1, '2021-06-02 04:38:23', '2021-06-02 04:38:23'),
(895, 42, 'updated', 'medicastructureoffer', 2, '2021-06-02 04:38:44', '2021-06-02 04:38:44'),
(896, 42, 'created', 'site', 8, '2021-06-02 04:39:34', '2021-06-02 04:39:34'),
(897, 42, 'updated', 'site', 8, '2021-06-02 04:40:04', '2021-06-02 04:40:04'),
(898, 42, 'updated', 'site', 7, '2021-06-02 04:42:18', '2021-06-02 04:42:18'),
(899, 42, 'deleted', 'building', 4, '2021-06-02 04:42:36', '2021-06-02 04:42:36'),
(900, 42, 'created', 'building', 5, '2021-06-02 04:44:25', '2021-06-02 04:44:25'),
(901, 42, 'deleted', 'building', 5, '2021-06-02 04:44:35', '2021-06-02 04:44:35'),
(902, 42, 'created', 'building', 6, '2021-06-02 04:49:37', '2021-06-02 04:49:37'),
(903, 42, 'updated', 'building', 6, '2021-06-02 04:52:58', '2021-06-02 04:52:58'),
(904, 42, 'updated', 'building', 5, '2021-06-02 04:54:12', '2021-06-02 04:54:12'),
(905, 42, 'deleted', 'building', 6, '2021-06-02 04:54:21', '2021-06-02 04:54:21'),
(906, 42, 'updated', 'schedule', 1, '2021-06-02 04:58:05', '2021-06-02 04:58:05'),
(907, 42, 'updated', 'service', 3, '2021-06-02 05:05:30', '2021-06-02 05:05:30'),
(908, 42, 'created', 'servicecontact', 2, '2021-06-02 05:22:28', '2021-06-02 05:22:28'),
(909, 42, 'updated', 'users', 42, '2021-06-02 05:23:27', '2021-06-02 05:23:27'),
(910, 3, 'updated', 'users', 3, '2021-06-02 15:13:24', '2021-06-02 15:13:24'),
(911, 5, 'updated', 'users', 5, '2021-06-02 15:17:12', '2021-06-02 15:17:12'),
(912, 1, 'updated', 'users', 1, '2021-06-02 15:17:29', '2021-06-02 15:17:29'),
(913, 3, 'updated', 'users', 3, '2021-06-02 15:18:55', '2021-06-02 15:18:55'),
(914, 5, 'updated', 'users', 5, '2021-06-02 15:21:45', '2021-06-02 15:21:45'),
(915, 1, 'updated', 'users', 1, '2021-06-02 15:22:01', '2021-06-02 15:22:01'),
(916, 1, 'updated', 'users', 1, '2021-06-02 15:22:32', '2021-06-02 15:22:32'),
(917, 5, 'updated', 'users', 5, '2021-06-02 16:52:39', '2021-06-02 16:52:39'),
(918, 1, 'deleted', 'appoitement', 142, '2021-06-02 16:56:20', '2021-06-02 16:56:20'),
(919, 1, 'updated', 'users', 1, '2021-06-02 17:07:56', '2021-06-02 17:07:56'),
(920, 5, 'updated', 'users', 5, '2021-06-02 17:09:25', '2021-06-02 17:09:25'),
(921, 1, 'updated', 'users', 1, '2021-06-02 17:31:34', '2021-06-02 17:31:34'),
(922, 42, 'updated', 'users', 42, '2021-06-02 17:33:20', '2021-06-02 17:33:20'),
(923, 5, 'deleted', 'appoitement', 141, '2021-06-02 17:34:02', '2021-06-02 17:34:02'),
(924, 5, 'deleted', 'appoitement', 140, '2021-06-02 17:34:10', '2021-06-02 17:34:10'),
(925, 5, 'updated', 'users', 5, '2021-06-04 13:09:05', '2021-06-04 13:09:05'),
(926, 3, 'updated', 'appoitement', 131, '2021-06-04 13:17:52', '2021-06-04 13:17:52'),
(927, 3, 'updated', 'appoitement', 131, '2021-06-04 13:17:59', '2021-06-04 13:17:59'),
(928, 3, 'updated', 'users', 3, '2021-06-04 13:24:57', '2021-06-04 13:24:57'),
(929, 42, 'updated', 'users', 42, '2021-06-04 13:31:44', '2021-06-04 13:31:44'),
(930, 1, 'deleted', 'consultation', 29, '2021-06-04 14:46:04', '2021-06-04 14:46:04'),
(931, 1, 'updated', 'users', 1, '2021-06-04 14:46:13', '2021-06-04 14:46:13'),
(932, 5, 'updated', 'users', 5, '2021-06-04 14:52:53', '2021-06-04 14:52:53'),
(933, 42, 'updated', 'users', 42, '2021-06-04 14:53:19', '2021-06-04 14:53:19'),
(934, 1, 'updated', 'users', 1, '2021-06-04 15:00:41', '2021-06-04 15:00:41'),
(935, 3, 'deleted', 'response', 11, '2021-06-04 15:17:19', '2021-06-04 15:17:19'),
(936, 3, 'created', 'response', 14, '2021-06-04 15:17:19', '2021-06-04 15:17:19'),
(937, 3, 'updated', 'consultation', 30, '2021-06-04 15:17:19', '2021-06-04 15:17:19'),
(938, 3, 'updated', 'users', 3, '2021-06-04 15:17:30', '2021-06-04 15:17:30'),
(939, 1, 'deleted', 'prescription', 3, '2021-06-04 16:05:44', '2021-06-04 16:05:44'),
(940, 1, 'updated', 'users', 1, '2021-06-04 16:05:57', '2021-06-04 16:05:57'),
(941, 3, 'created', 'prescription', 11, '2021-06-04 16:19:29', '2021-06-04 16:19:29'),
(942, 3, 'deleted', 'detailsprescription', 33, '2021-06-04 16:19:51', '2021-06-04 16:19:51'),
(943, 3, 'deleted', 'detailsprescription', 34, '2021-06-04 16:19:52', '2021-06-04 16:19:52'),
(944, 3, 'created', 'detailsprescription', 35, '2021-06-04 16:19:52', '2021-06-04 16:19:52'),
(945, 3, 'updated', 'prescription', 11, '2021-06-04 16:19:52', '2021-06-04 16:19:52'),
(946, 3, 'deleted', 'detailsprescription', 35, '2021-06-04 16:21:36', '2021-06-04 16:21:36'),
(947, 3, 'created', 'detailsprescription', 36, '2021-06-04 16:21:36', '2021-06-04 16:21:36'),
(948, 3, 'updated', 'prescription', 11, '2021-06-04 16:21:36', '2021-06-04 16:21:36'),
(949, 3, 'deleted', 'prescription', 11, '2021-06-04 16:21:44', '2021-06-04 16:21:44'),
(950, 3, 'updated', 'users', 3, '2021-06-04 16:21:48', '2021-06-04 16:21:48'),
(951, 5, 'updated', 'users', 5, '2021-06-04 16:25:21', '2021-06-04 16:25:21'),
(952, 1, 'updated', 'users', 1, '2021-06-04 16:53:46', '2021-06-04 16:53:46'),
(953, 3, 'updated', 'users', 3, '2021-06-04 16:55:33', '2021-06-04 16:55:33'),
(954, 5, 'updated', 'users', 5, '2021-06-04 16:56:01', '2021-06-04 16:56:01'),
(955, 1, 'deleted', 'certificate', 2, '2021-06-04 17:08:05', '2021-06-04 17:08:05'),
(956, 1, 'updated', 'users', 1, '2021-06-04 17:24:09', '2021-06-04 17:24:09'),
(957, 3, 'created', 'certificate', 5, '2021-06-04 17:32:57', '2021-06-04 17:32:57'),
(958, 3, 'updated', 'certificate', 4, '2021-06-04 17:33:21', '2021-06-04 17:33:21'),
(959, 3, 'updated', 'users', 3, '2021-06-04 17:38:39', '2021-06-04 17:38:39'),
(960, 5, 'updated', 'users', 5, '2021-06-04 17:39:35', '2021-06-04 17:39:35'),
(961, 3, 'updated', 'appoitement', 217, '2021-06-04 17:40:05', '2021-06-04 17:40:05'),
(962, 3, 'created', 'certificate', 6, '2021-06-04 17:41:06', '2021-06-04 17:41:06'),
(963, 3, 'updated', 'users', 3, '2021-06-04 17:41:18', '2021-06-04 17:41:18'),
(964, 5, 'updated', 'users', 5, '2021-06-04 17:43:46', '2021-06-04 17:43:46'),
(965, 1, 'updated', 'users', 1, '2021-06-04 17:52:32', '2021-06-04 17:52:32'),
(966, 3, 'deleted', 'consultation', 35, '2021-06-04 17:54:21', '2021-06-04 17:54:21'),
(967, 3, 'deleted', 'consultation', 33, '2021-06-04 17:54:27', '2021-06-04 17:54:27'),
(968, 3, 'deleted', 'consultation', 30, '2021-06-04 17:54:30', '2021-06-04 17:54:30'),
(969, 3, 'deleted', 'consultation', 36, '2021-06-04 18:08:18', '2021-06-04 18:08:18'),
(970, 3, 'deleted', 'consultation', 37, '2021-06-04 18:08:18', '2021-06-04 18:08:18'),
(971, 3, 'deleted', 'consultation', 38, '2021-06-04 18:08:18', '2021-06-04 18:08:18'),
(972, 3, 'deleted', 'consultation', 39, '2021-06-04 18:08:18', '2021-06-04 18:08:18'),
(973, 3, 'deleted', 'consultation', 40, '2021-06-04 18:08:19', '2021-06-04 18:08:19'),
(974, 3, 'deleted', 'consultation', 41, '2021-06-04 18:08:19', '2021-06-04 18:08:19'),
(975, 3, 'deleted', 'consultation', 42, '2021-06-04 18:08:19', '2021-06-04 18:08:19'),
(976, 3, 'deleted', 'response', 19, '2021-06-04 18:08:53', '2021-06-04 18:08:53'),
(977, 3, 'created', 'response', 20, '2021-06-04 18:08:53', '2021-06-04 18:08:53'),
(978, 3, 'updated', 'consultation', 43, '2021-06-04 18:08:53', '2021-06-04 18:08:53'),
(979, 3, 'updated', 'users', 3, '2021-06-04 18:11:17', '2021-06-04 18:11:17'),
(980, 1, 'updated', 'users', 1, '2021-06-04 18:32:53', '2021-06-04 18:32:53'),
(981, 3, 'updated', 'users', 3, '2021-06-04 18:33:21', '2021-06-04 18:33:21'),
(982, 1, 'updated', 'users', 1, '2021-06-04 18:43:27', '2021-06-04 18:43:27'),
(983, 3, 'updated', 'users', 3, '2021-06-04 18:56:35', '2021-06-04 18:56:35'),
(984, 1, 'updated', 'users', 1, '2021-06-04 18:56:56', '2021-06-04 18:56:56'),
(985, 1, 'updated', 'users', 1, '2021-06-05 06:00:53', '2021-06-05 06:00:53'),
(986, 1, 'deleted', 'generalexam', 12, '2021-06-05 06:18:47', '2021-06-05 06:18:47'),
(987, 1, 'updated', 'users', 1, '2021-06-05 06:18:52', '2021-06-05 06:18:52'),
(988, 3, 'created', 'generalexam', 15, '2021-06-05 06:32:14', '2021-06-05 06:32:14'),
(989, 3, 'updated', 'generalexam', 15, '2021-06-05 06:32:36', '2021-06-05 06:32:36'),
(990, 3, 'updated', 'users', 3, '2021-06-05 06:33:35', '2021-06-05 06:33:35'),
(991, 5, 'updated', 'users', 5, '2021-06-05 06:33:52', '2021-06-05 06:33:52'),
(992, 38, 'updated', 'users', 38, '2021-06-05 06:34:08', '2021-06-05 06:34:08'),
(993, 5, 'updated', 'users', 5, '2021-06-05 06:34:42', '2021-06-05 06:34:42'),
(994, 1, 'created', 'attitude', 1, '2021-06-06 16:45:18', '2021-06-06 16:45:18'),
(995, 1, 'updated', 'attitude', 1, '2021-06-06 16:58:17', '2021-06-06 16:58:17'),
(996, 1, 'created', 'activity', 1, '2021-06-06 17:10:37', '2021-06-06 17:10:37'),
(997, 1, 'updated', 'activity', 1, '2021-06-06 17:17:24', '2021-06-06 17:17:24'),
(998, 1, 'created', 'status', 1, '2021-06-06 17:43:35', '2021-06-06 17:43:35'),
(999, 1, 'updated', 'status', 1, '2021-06-06 17:49:25', '2021-06-06 17:49:25'),
(1000, 1, 'updated', 'users', 1, '2021-06-06 17:49:33', '2021-06-06 17:49:33'),
(1001, 5, 'updated', 'users', 5, '2021-06-06 17:49:49', '2021-06-06 17:49:49'),
(1002, 1, 'updated', 'users', 1, '2021-06-06 17:50:12', '2021-06-06 17:50:12'),
(1003, 5, 'updated', 'users', 5, '2021-06-06 17:51:23', '2021-06-06 17:51:23'),
(1004, 3, 'updated', 'users', 3, '2021-06-06 17:51:35', '2021-06-06 17:51:35'),
(1005, 5, 'updated', 'users', 5, '2021-06-06 17:52:49', '2021-06-06 17:52:49'),
(1006, 5, 'updated', 'users', 5, '2021-06-06 17:53:57', '2021-06-06 17:53:57'),
(1007, 3, 'updated', 'users', 3, '2021-06-06 17:54:52', '2021-06-06 17:54:52'),
(1008, 42, 'updated', 'users', 42, '2021-06-06 18:19:44', '2021-06-06 18:19:44'),
(1009, 1, 'updated', 'users', 1, '2021-06-06 19:09:16', '2021-06-06 19:09:16'),
(1010, 3, 'created', 'historyattitude', 1, '2021-06-06 19:29:31', '2021-06-06 19:29:31'),
(1011, 3, 'updated', 'historyattitude', 1, '2021-06-06 19:46:31', '2021-06-06 19:46:31'),
(1012, 3, 'updated', 'users', 3, '2021-06-06 19:47:04', '2021-06-06 19:47:04'),
(1013, 5, 'updated', 'users', 5, '2021-06-06 19:47:24', '2021-06-06 19:47:24'),
(1014, 1, 'updated', 'users', 1, '2021-06-06 19:47:52', '2021-06-06 19:47:52'),
(1015, 5, 'updated', 'users', 5, '2021-06-06 19:49:44', '2021-06-06 19:49:44'),
(1016, 3, 'created', 'historyattitude', 2, '2021-06-06 19:50:22', '2021-06-06 19:50:22'),
(1017, 3, 'updated', 'users', 3, '2021-06-06 19:50:27', '2021-06-06 19:50:27'),
(1018, 5, 'created', 'historyattitude', 3, '2021-06-06 20:01:09', '2021-06-06 20:01:09'),
(1019, 5, 'created', 'historyattitude', 4, '2021-06-06 20:01:31', '2021-06-06 20:01:31'),
(1020, 5, 'created', 'historyattitude', 5, '2021-06-06 20:01:59', '2021-06-06 20:01:59'),
(1021, 5, 'created', 'historyattitude', 6, '2021-06-06 20:02:43', '2021-06-06 20:02:43'),
(1022, 5, 'updated', 'historyattitude', 1, '2021-06-06 20:05:51', '2021-06-06 20:05:51'),
(1023, 5, 'updated', 'users', 5, '2021-06-06 20:06:09', '2021-06-06 20:06:09'),
(1024, 3, 'created', 'historyattitude', 7, '2021-06-06 20:06:44', '2021-06-06 20:06:44'),
(1025, 3, 'updated', 'historyattitude', 7, '2021-06-06 20:06:55', '2021-06-06 20:06:55'),
(1026, 3, 'deleted', 'historyattitude', 1, '2021-06-06 20:07:14', '2021-06-06 20:07:14'),
(1027, 3, 'deleted', 'historyattitude', 2, '2021-06-06 20:07:15', '2021-06-06 20:07:15'),
(1028, 3, 'deleted', 'historyattitude', 3, '2021-06-06 20:07:15', '2021-06-06 20:07:15'),
(1029, 3, 'deleted', 'historyattitude', 4, '2021-06-06 20:07:15', '2021-06-06 20:07:15'),
(1030, 3, 'updated', 'users', 3, '2021-06-06 20:07:20', '2021-06-06 20:07:20'),
(1031, 1, 'updated', 'users', 1, '2021-06-06 20:07:47', '2021-06-06 20:07:47'),
(1032, 42, 'updated', 'users', 42, '2021-06-06 20:10:07', '2021-06-06 20:10:07'),
(1033, 1, 'updated', 'users', 1, '2021-06-06 20:10:28', '2021-06-06 20:10:28'),
(1034, 3, 'updated', 'users', 3, '2021-06-06 20:10:52', '2021-06-06 20:10:52'),
(1035, 1, 'updated', 'users', 1, '2021-06-07 08:23:52', '2021-06-07 08:23:52'),
(1036, 3, 'created', 'historyactivity', 1, '2021-06-07 08:25:22', '2021-06-07 08:25:22'),
(1037, 3, 'updated', 'historyactivity', 1, '2021-06-07 08:27:23', '2021-06-07 08:27:23'),
(1038, 3, 'updated', 'users', 3, '2021-06-07 08:27:32', '2021-06-07 08:27:32'),
(1039, 5, 'created', 'historyactivity', 2, '2021-06-07 08:37:23', '2021-06-07 08:37:23'),
(1040, 5, 'updated', 'historyactivity', 2, '2021-06-07 08:37:34', '2021-06-07 08:37:34'),
(1041, 5, 'deleted', 'historyactivity', 2, '2021-06-07 08:37:40', '2021-06-07 08:37:40'),
(1042, 5, 'updated', 'users', 5, '2021-06-07 08:41:51', '2021-06-07 08:41:51'),
(1043, 3, 'created', 'historyactivity', 3, '2021-06-07 08:42:57', '2021-06-07 08:42:57'),
(1044, 3, 'updated', 'users', 3, '2021-06-07 08:43:07', '2021-06-07 08:43:07'),
(1045, 42, 'updated', 'users', 42, '2021-06-07 08:56:08', '2021-06-07 08:56:08'),
(1046, 42, 'updated', 'users', 42, '2021-06-07 08:56:29', '2021-06-07 08:56:29'),
(1047, 1, 'updated', 'users', 1, '2021-06-07 09:39:46', '2021-06-07 09:39:46'),
(1048, 1, 'updated', 'users', 1, '2021-06-07 09:43:23', '2021-06-07 09:43:23'),
(1049, 3, 'created', 'historystatus', 1, '2021-06-07 09:47:16', '2021-06-07 09:47:16'),
(1050, 3, 'updated', 'users', 3, '2021-06-07 09:48:59', '2021-06-07 09:48:59'),
(1051, 5, 'created', 'historystatus', 2, '2021-06-07 09:49:24', '2021-06-07 09:49:24'),
(1052, 5, 'deleted', 'historystatus', 2, '2021-06-07 09:49:32', '2021-06-07 09:49:32'),
(1053, 5, 'updated', 'users', 5, '2021-06-07 09:49:37', '2021-06-07 09:49:37'),
(1054, 42, 'updated', 'users', 42, '2021-06-07 10:22:54', '2021-06-07 10:22:54'),
(1055, 42, 'created', 'medicalstructure', 30, '2021-06-07 10:31:42', '2021-06-07 10:31:42'),
(1056, 42, 'created', 'medicalstructurespeciality', 50, '2021-06-07 10:31:42', '2021-06-07 10:31:42'),
(1057, 42, 'created', 'medicalstructurespeciality', 51, '2021-06-07 10:31:42', '2021-06-07 10:31:42'),
(1058, 42, 'created', 'site', 9, '2021-06-07 10:32:19', '2021-06-07 10:32:19'),
(1059, 42, 'created', 'building', 7, '2021-06-07 10:32:40', '2021-06-07 10:32:40'),
(1060, 42, 'created', 'medicalstaff', 30, '2021-06-07 10:33:12', '2021-06-07 10:33:12'),
(1061, 42, 'created', 'medicalstaff', 31, '2021-06-07 10:33:21', '2021-06-07 10:33:21'),
(1062, 42, 'created', 'medicastructureoffer', 4, '2021-06-07 10:33:43', '2021-06-07 10:33:43'),
(1063, 42, 'updated', 'users', 42, '2021-06-07 10:33:47', '2021-06-07 10:33:47'),
(1064, 5, 'updated', 'users', 5, '2021-06-07 10:34:52', '2021-06-07 10:34:52'),
(1065, 3, 'updated', 'appoitement', 218, '2021-06-07 10:35:57', '2021-06-07 10:35:57'),
(1066, 3, 'created', 'prescription', 12, '2021-06-07 10:37:24', '2021-06-07 10:37:24'),
(1067, 3, 'created', 'certificate', 7, '2021-06-07 10:37:54', '2021-06-07 10:37:54'),
(1068, 3, 'updated', 'certificate', 7, '2021-06-07 10:38:08', '2021-06-07 10:38:08'),
(1069, 3, 'created', 'generalexam', 16, '2021-06-07 10:38:58', '2021-06-07 10:38:58'),
(1070, 3, 'created', 'historyattitude', 8, '2021-06-07 10:39:32', '2021-06-07 10:39:32'),
(1071, 3, 'updated', 'users', 3, '2021-06-07 10:39:39', '2021-06-07 10:39:39'),
(1072, 42, 'created', 'medicalstructure', 31, '2021-06-07 13:25:47', '2021-06-07 13:25:47'),
(1073, 42, 'created', 'medicalstructurespeciality', 52, '2021-06-07 13:25:48', '2021-06-07 13:25:48'),
(1074, 42, 'created', 'medicalstructurespeciality', 53, '2021-06-07 13:25:48', '2021-06-07 13:25:48'),
(1075, 42, 'created', 'medicalstaff', 33, '2021-06-07 13:26:12', '2021-06-07 13:26:12'),
(1076, 42, 'updated', 'users', 42, '2021-06-07 13:26:18', '2021-06-07 13:26:18'),
(1077, 5, 'updated', 'users', 5, '2021-06-07 13:27:12', '2021-06-07 13:27:12'),
(1078, 3, 'updated', 'appoitement', 219, '2021-06-07 13:27:38', '2021-06-07 13:27:38'),
(1079, 3, 'created', 'prescription', 13, '2021-06-07 13:28:30', '2021-06-07 13:28:30'),
(1080, 3, 'created', 'certificate', 8, '2021-06-07 13:29:02', '2021-06-07 13:29:02'),
(1081, 3, 'created', 'generalexam', 17, '2021-06-07 13:29:24', '2021-06-07 13:29:24'),
(1082, 3, 'updated', 'users', 3, '2021-06-07 13:29:46', '2021-06-07 13:29:46'),
(1083, 1, 'created', 'allergy', 1, '2021-06-08 10:29:09', '2021-06-08 10:29:09'),
(1084, 1, 'updated', 'allergy', 1, '2021-06-08 10:29:19', '2021-06-08 10:29:19'),
(1085, 1, 'updated', 'users', 1, '2021-06-08 10:29:35', '2021-06-08 10:29:35'),
(1086, 3, 'updated', 'users', 3, '2021-06-08 10:30:02', '2021-06-08 10:30:02'),
(1087, 5, 'updated', 'users', 5, '2021-06-08 10:30:22', '2021-06-08 10:30:22'),
(1088, 42, 'updated', 'users', 42, '2021-06-08 10:30:45', '2021-06-08 10:30:45'),
(1089, 42, 'updated', 'users', 42, '2021-06-08 10:31:25', '2021-06-08 10:31:25'),
(1090, 1, 'updated', 'users', 1, '2021-06-08 10:47:04', '2021-06-08 10:47:04'),
(1091, 3, 'created', 'historyallergy', 1, '2021-06-08 10:48:45', '2021-06-08 10:48:45'),
(1092, 3, 'updated', 'historyallergy', 1, '2021-06-08 10:50:22', '2021-06-08 10:50:22'),
(1093, 3, 'updated', 'users', 3, '2021-06-08 10:50:27', '2021-06-08 10:50:27'),
(1094, 5, 'created', 'historyallergy', 2, '2021-06-08 10:50:54', '2021-06-08 10:50:54'),
(1095, 5, 'updated', 'historyallergy', 2, '2021-06-08 10:51:02', '2021-06-08 10:51:02'),
(1096, 5, 'updated', 'users', 5, '2021-06-08 10:51:06', '2021-06-08 10:51:06'),
(1097, 42, 'updated', 'users', 42, '2021-06-08 10:51:24', '2021-06-08 10:51:24'),
(1098, 1, 'created', 'vaccine', 1, '2021-06-08 11:23:29', '2021-06-08 11:23:29'),
(1099, 1, 'updated', 'vaccine', 1, '2021-06-08 11:23:37', '2021-06-08 11:23:37'),
(1100, 1, 'deleted', 'allergy', 1, '2021-06-08 11:24:02', '2021-06-08 11:24:02'),
(1101, 1, 'deleted', 'vaccine', 1, '2021-06-08 11:24:42', '2021-06-08 11:24:42'),
(1102, 1, 'updated', 'users', 1, '2021-06-08 11:24:46', '2021-06-08 11:24:46'),
(1103, 3, 'updated', 'users', 3, '2021-06-08 11:27:21', '2021-06-08 11:27:21'),
(1104, 1, 'updated', 'users', 1, '2021-06-08 11:27:44', '2021-06-08 11:27:44'),
(1105, 3, 'updated', 'users', 3, '2021-06-08 11:28:01', '2021-06-08 11:28:01'),
(1106, 1, 'created', 'vaccine', 2, '2021-06-08 11:28:30', '2021-06-08 11:28:30'),
(1107, 1, 'updated', 'users', 1, '2021-06-08 11:28:40', '2021-06-08 11:28:40'),
(1108, 3, 'updated', 'users', 3, '2021-06-08 11:31:08', '2021-06-08 11:31:08'),
(1109, 1, 'updated', 'users', 1, '2021-06-08 11:59:06', '2021-06-08 11:59:06'),
(1110, 3, 'created', 'historyvaccine', 1, '2021-06-08 12:05:30', '2021-06-08 12:05:30'),
(1111, 3, 'updated', 'historyvaccine', 1, '2021-06-08 12:07:55', '2021-06-08 12:07:55'),
(1112, 3, 'updated', 'users', 3, '2021-06-08 12:08:00', '2021-06-08 12:08:00'),
(1113, 1, 'updated', 'users', 1, '2021-06-08 12:09:30', '2021-06-08 12:09:30'),
(1114, 3, 'updated', 'users', 3, '2021-06-08 12:10:03', '2021-06-08 12:10:03'),
(1115, 1, 'updated', 'users', 1, '2021-06-08 12:13:44', '2021-06-08 12:13:44'),
(1116, 5, 'updated', 'users', 5, '2021-06-08 12:14:27', '2021-06-08 12:14:27'),
(1117, 38, 'updated', 'users', 38, '2021-06-08 12:15:27', '2021-06-08 12:15:27');

-- --------------------------------------------------------

--
-- Structure de la table `vaccine`
--

CREATE TABLE `vaccine` (
  `id` int(10) UNSIGNED NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `vaccine`
--

INSERT INTO `vaccine` (`id`, `alias`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'v1', 'v1 is a', '2021-06-08 11:23:29', '2021-06-08 11:24:42', '2021-06-08 11:24:42'),
(2, 'v11', 'v11 is ', '2021-06-08 11:28:30', '2021-06-08 11:28:30', NULL);

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
(1, 'visit nature 1', 'vn1 is ....', 1, '2021-05-24 08:52:32', '2021-05-31 19:43:05', NULL),
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
(1, 'visit status 1', 'vs1 is ...', 1, '2021-05-24 08:53:16', '2021-05-31 19:46:38', NULL),
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
(1, 'HCNN', 'La région Afrique & Océan indien regroupe les CCE en Afrique subsaharienne et dans l’Océan indien ainsi que les CCE opérant sur la zone à partir de la France.', 1, '2021-05-02 21:16:30', '2021-05-31 18:45:26', '2021-05-31 18:45:26'),
(2, 'AMÉRIQUE LATINE & CARAÏBES', 'La région Amérique latine et Caraïbes regroupe à la fois les CCE de la zone (Mexique, Amérique centrale, Caraïbes et Amérique du Sud) et ceux en France, tous spécialistes de l’Amérique latine et des Caraïbes.', 1, '2021-05-02 21:17:10', '2021-05-26 19:33:30', NULL),
(3, 'newzone', 'new zone is ...', 1, '2021-05-06 18:44:20', '2021-05-26 19:40:12', NULL),
(4, 'HCN', 'kkk1', 0, '2021-05-18 17:14:50', '2021-05-31 18:46:44', NULL),
(5, 'zone 123', 'it is a ...', 1, '2021-05-26 19:40:49', '2021-05-26 19:41:18', '2021-05-26 19:41:18');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `allergy`
--
ALTER TABLE `allergy`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `appoitement`
--
ALTER TABLE `appoitement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `attitude`
--
ALTER TABLE `attitude`
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
-- Index pour la table `historyactivity`
--
ALTER TABLE `historyactivity`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `historyallergy`
--
ALTER TABLE `historyallergy`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `historyattitude`
--
ALTER TABLE `historyattitude`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `historystatus`
--
ALTER TABLE `historystatus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `historyvaccine`
--
ALTER TABLE `historyvaccine`
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
-- Index pour la table `status`
--
ALTER TABLE `status`
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
-- Index pour la table `vaccine`
--
ALTER TABLE `vaccine`
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
-- AUTO_INCREMENT pour la table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `allergy`
--
ALTER TABLE `allergy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `appoitement`
--
ALTER TABLE `appoitement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT pour la table `attitude`
--
ALTER TABLE `attitude`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `detailsprescription`
--
ALTER TABLE `detailsprescription`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `historyactivity`
--
ALTER TABLE `historyactivity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `historyallergy`
--
ALTER TABLE `historyallergy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `historyattitude`
--
ALTER TABLE `historyattitude`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `historystatus`
--
ALTER TABLE `historystatus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `historyvaccine`
--
ALTER TABLE `historyvaccine`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `medicalstaff`
--
ALTER TABLE `medicalstaff`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `medicalstructure`
--
ALTER TABLE `medicalstructure`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `medicalstructurespeciality`
--
ALTER TABLE `medicalstructurespeciality`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `medicastructureoffer`
--
ALTER TABLE `medicastructureoffer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT pour la table `menutype`
--
ALTER TABLE `menutype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `sett`
--
ALTER TABLE `sett`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `speciality`
--
ALTER TABLE `speciality`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `users_logs`
--
ALTER TABLE `users_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1118;

--
-- AUTO_INCREMENT pour la table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `visitnature`
--
ALTER TABLE `visitnature`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
