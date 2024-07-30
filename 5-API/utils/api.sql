-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 06 juil. 2024 à 17:34
-- Version du serveur : 11.3.2-MariaDB
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `api`
--
CREATE DATABASE IF NOT EXISTS `api` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `api`;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `author`, `created_at`, `updated_at`) VALUES
(1, '', '', '', '2024-07-03 19:14:44', '2024-07-05 20:00:49'),
(2, 'test title', 'test body', 'test author', '2024-07-03 19:16:39', '2024-07-05 20:42:23'),
(3, 'Consequuntur et maxime in.', 'In dolor saepe asperiores. Expedita sed eos aut nam sed. Ut rerum delectus consequatur ut reprehenderit incidunt.', 'Marilou Littel III', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(4, 'Enim velit aut iusto nemo blanditiis.', 'Dolor quo ut quidem totam provident. Error explicabo in magni. Dignissimos nostrum est sunt. Commodi repellat dolorem a et sed itaque ea. Beatae corporis itaque illo. Quod in qui qui omnis ut ut.', 'Mr. Ari Weimann MD', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(5, 'Perferendis voluptatibus voluptas id.', 'Maiores facilis et quisquam accusantium nostrum dignissimos dolorum. Aut et error praesentium voluptatem. Porro consequuntur totam facilis. Sint minima cumque consequatur dolorem vel eum.', 'Ara Denesik II', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(6, 'Dolor ut cupiditate tempore enim rem molestiae.', 'Incidunt enim optio molestiae libero autem. Et iusto minus officiis et provident ad architecto. Quam at rerum pariatur facere velit sunt et. Quisquam autem nam debitis ab a et alias assumenda.', 'Mrs. Clara Jakubowski II', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(7, 'Qui dolorum accusamus accusantium fugit repellendus harum.', 'Adipisci dolorem sed libero veritatis dolore est voluptates. Dolores non sit similique natus neque voluptates. Sequi ut et ut rerum harum.', 'Kim Gusikowski V', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(8, 'Dolores qui nulla sint.', 'Doloribus vero fugiat numquam et aut quos a. Eveniet non vero quidem temporibus aut. Aliquam nobis velit eum odio a. Et ad expedita tempora velit.', 'Krista Mayer', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(9, 'Temporibus expedita sunt et neque illo excepturi.', 'Eum magnam est ut. Voluptatum in officia similique et. Velit quibusdam sed et ipsam quia aperiam in voluptatibus.', 'Ethyl Kozey Sr.', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(10, 'Velit deleniti itaque architecto neque maxime consequatur.', 'Maxime atque sunt quo voluptatum sapiente dolor voluptatum. Quis labore quod nobis consequatur unde et aut animi. Libero sunt distinctio autem.', 'Arely Haag', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(11, 'Non reiciendis nisi deleniti consequatur placeat.', 'Nulla nobis vel deleniti perspiciatis maxime illum rem nemo. Nihil est est maxime et consequuntur minus eveniet. Quas ducimus odit consequatur maxime molestias.', 'Danyka Sanford', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(12, '', '', '', '2024-07-03 19:16:39', '2024-07-05 19:46:35'),
(13, 'Enim fugit doloribus earum odit.', 'Rerum est ratione ea rerum at culpa enim. Quo voluptatem voluptatem molestiae ratione ut est molestias. Quas iste est et dolorum. Mollitia consectetur libero eum eum enim.', 'Gerson Welch', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(14, 'Ut aut est non.', 'Consectetur adipisci cumque doloremque animi ea in. Veniam sit qui asperiores mollitia odio porro. Quos unde aut et esse quia numquam ea. Officiis eius distinctio distinctio omnis laboriosam.', 'Prof. Daphnee Klocko V', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(15, 'Iste sapiente sed totam quia et ad.', 'Tempore deserunt perferendis nisi reprehenderit occaecati quia vitae. Nulla animi adipisci ad rerum velit voluptas repellendus. Et corrupti perferendis quo eligendi tempore.', 'Mara Pacocha', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(16, 'Sit consequuntur libero delectus et.', 'Expedita ut suscipit deleniti architecto id. Architecto hic quia quidem illum debitis dolorem sit. Corrupti repudiandae doloribus aspernatur soluta distinctio. Similique qui magni repudiandae.', 'Kelli Weissnat', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(17, 'Doloribus voluptatibus deleniti aut asperiores quae numquam.', 'Laboriosam aut similique necessitatibus totam aspernatur perferendis. Est ipsam sed cum quia. Aliquid id et rerum deserunt.', 'Prof. Emerson Boyle', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(18, 'Corrupti dolorum vel repudiandae qui nisi.', 'Quibusdam repudiandae possimus quod natus dolorum. Voluptatem fugiat voluptate dolorem repellat et. Repellat tempore facere quam eos tempore. Totam enim accusantium dolorem repudiandae sunt.', 'Sarah Sanford II', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(19, 'Dolor incidunt quibusdam iste nam.', 'Rerum dolorem perferendis numquam beatae illum asperiores. Libero molestias consequatur et consequatur consequatur. Ea quo quidem explicabo commodi vel et.', 'Mrs. Hortense Ortiz DVM', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(20, 'Autem earum tempore omnis quod nulla autem.', 'Sunt ut corporis accusamus pariatur repellat. Amet aut modi voluptas amet et dolore inventore.', 'Jarrell Kautzer', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(21, 'Rerum inventore sunt quod quia.', 'Adipisci voluptas dignissimos nihil fuga et aliquam consequatur similique. Ab hic repellat est labore perspiciatis. Maiores recusandae sit et.', 'Destiney Zboncak', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(22, 'Dolores rem itaque doloribus ab suscipit.', 'Et voluptatem nihil eveniet accusamus fugiat. Corrupti adipisci quo tempore impedit. Earum explicabo quis odit non error aspernatur quia. Quam et ut velit neque. Enim adipisci veritatis ea et.', 'Dr. Sasha Raynor II', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(23, 'Labore libero sit ex animi.', 'Necessitatibus quia quos placeat maxime modi debitis est. Animi nobis cupiditate nisi ea quia doloremque adipisci. Veniam enim possimus iste sed qui ea.', 'Shawna Wehner PhD', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(24, 'Natus ipsam tempore molestias ut id.', 'Cumque cum eum vel similique quos minima. Error similique hic voluptas velit. Sit in alias minima consectetur consequatur. Sint nihil maxime fugiat ut eveniet.', 'Karli Bernhard', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(25, 'Mollitia modi illo et enim.', 'Aliquam possimus possimus maiores. Fugit quia qui et vel qui odit. Voluptatem eligendi quia rerum ullam. Est minus suscipit ipsa porro ut cum.', 'Bill Blanda MD', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(26, 'Placeat consequuntur est animi est mollitia.', 'Dolores rem dolor natus id. Fuga ipsam commodi consequatur iure in. Sint quo labore eum. Magnam quia enim non est impedit vero.', 'Cali Stark', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(27, 'Voluptas blanditiis ipsa velit.', 'Quod ex a minima beatae tempora minima minus non. Sit rerum placeat neque laborum eos sapiente. Ut aperiam in atque saepe voluptatibus quaerat facilis eos. Autem quaerat provident facilis ut magnam.', 'Antwon Weimann', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(28, 'Perferendis nesciunt ipsa neque.', 'Deleniti velit earum enim ullam. Illum autem dolores fugiat aut molestiae et nulla. Molestias minima voluptatum eligendi. Reprehenderit omnis aliquam quis consequatur sed delectus.', 'Lionel Hilpert', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(29, 'Quis aliquam veritatis animi rerum velit accusamus.', 'Voluptas iste quo repudiandae amet. Laudantium eum iusto est explicabo sequi. Sit itaque vitae et laborum facere consequatur. Harum non perferendis ducimus maiores voluptatum non et.', 'Mr. Kameron Weimann', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(30, 'Iure occaecati natus nihil in in.', 'Et consequuntur quidem et perferendis. Ab accusantium quia ut quibusdam. Veniam aut molestias error.', 'Winona Sanford', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(31, 'Recusandae voluptatum autem non.', 'Quisquam aut qui culpa est voluptatum quia blanditiis. Quis et voluptatem impedit sed a eos. Ipsa et velit quasi eaque est.', 'Arely Sanford', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(32, 'Autem occaecati delectus non nam debitis aut.', 'Qui consectetur sunt fugit voluptatum voluptatem sed et saepe. Placeat a excepturi est. Dolorem quaerat saepe molestiae voluptatibus.', 'Miss Providenci Durgan MD', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(33, 'Sapiente voluptas delectus sint dolorem eos quae.', 'Non qui qui maiores numquam est quia praesentium. Possimus sed recusandae modi. Accusamus et saepe ut libero magnam.', 'Alessandro Shanahan PhD', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(34, 'Hic enim et a.', 'Voluptatibus eos vel est dolores ut porro ipsa. Autem quia aliquid quisquam sed et et ducimus. Dolorem adipisci hic qui. Ut et voluptatibus dolores et unde repudiandae omnis.', 'Rachael Tillman', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(35, 'Quis impedit ea ex voluptatum et consequuntur.', 'Aut dolor velit porro dolores velit sint voluptatem. Ut iste natus eaque nobis sit aut. Quia a natus illo doloribus itaque iste voluptatem illo. Consequatur ipsum eum nihil doloremque exercitationem.', 'Madison Mueller', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(36, 'Voluptatem et libero in.', 'Ut et qui provident quaerat aut in sunt. Dolorum voluptatem fuga tenetur. Sed libero amet expedita occaecati dolor animi.', 'Nathan Runolfsson', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(37, 'Enim amet magnam veniam.', 'Et ullam aut facilis tempore praesentium quos cum. Quia aperiam consectetur nam rerum quos. Qui et veniam qui in repellat nobis. Mollitia et aut sequi aliquam natus.', 'Glenna Satterfield', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(38, 'Odio officiis ipsum est quos doloribus.', 'Qui nihil neque laborum omnis. Est illum aut consequatur quis et quaerat perspiciatis non. Aut architecto tempore qui aut. Qui laboriosam incidunt nihil magni tempora quam id et.', 'Mr. Lester Pollich I', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(39, 'Magnam officia iure sit.', 'Porro perspiciatis voluptas tempora provident rerum minima velit. Quo quos deleniti perspiciatis laudantium molestiae qui iste. Ab quod iure eveniet ut est veniam autem.', 'Heaven Crona', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(40, 'Quidem aut est rerum deserunt.', 'Architecto veritatis aperiam ut ut. Quia alias laudantium quia non. Accusamus veniam labore in aspernatur consequatur rerum. Atque necessitatibus autem exercitationem cum velit.', 'Dr. Magdalen Torp Sr.', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(41, 'Quis totam laboriosam dolorum et modi.', 'Et harum voluptatem excepturi amet corporis est. Consequatur est illum sit quasi voluptates. Autem voluptatem id non ipsa voluptates officiis nihil.', 'Allan Strosin', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(42, 'Sed quos dolore hic.', 'Nulla sequi in animi laudantium incidunt. Iusto fuga et aut et et et assumenda. Ullam doloremque reiciendis totam est provident nihil. Ut non ad eum et qui voluptatem molestiae.', 'Ottis Frami', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(43, 'Aut repellendus quos laudantium delectus eveniet.', 'Velit aut molestiae ea doloremque consequuntur. Dignissimos aliquam fugiat accusantium odit sequi ad dicta. Aut quibusdam cumque ullam voluptatem.', 'Rosamond Conn DDS', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(44, 'Repellendus cupiditate distinctio cumque aut molestiae.', 'Qui quis voluptatem doloremque dolorem. Praesentium assumenda doloremque a nemo rerum. Aliquid esse voluptatem repellendus facere.', 'Leon Kautzer', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(45, '', '', '', '2024-07-03 19:16:39', '2024-07-05 19:53:11'),
(46, 'Ut eligendi voluptas voluptatem ex mollitia.', 'Velit voluptas fugiat eos similique dolores. Illo sequi non veniam beatae quas alias. Quisquam consequuntur ullam est et quasi. Et temporibus dolorem et provident placeat dolore.', 'Delilah Greenfelder IV', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(47, 'Aperiam ex eligendi libero et iste corrupti.', 'Sunt nemo ea reprehenderit et. Dolore ratione id ea. Aperiam magnam architecto hic dolor voluptatibus nulla. Accusantium quas tempore temporibus consectetur ut adipisci quia.', 'Oma Fadel', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(48, 'Aperiam pariatur consequuntur consequatur nostrum repellendus.', 'Et deserunt iure officia sunt aspernatur. Qui est inventore pariatur excepturi quo explicabo. Voluptas ad commodi a et explicabo. Distinctio neque harum repellat doloribus.', 'Eula Trantow', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(49, 'Dolorem aut eligendi tempora debitis sit.', 'Aut quam dolore fugiat neque. Distinctio officia nulla porro vel ab voluptas nobis. Magni voluptatem iusto iste eos earum quia.', 'Augusta Schimmel', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(50, 'Voluptate nemo error est.', 'Dolorem sint dolor magni facere. Voluptatum voluptatum iure autem aut. Commodi est omnis excepturi aut. Iure hic libero est exercitationem in qui aut cumque.', 'Lexus Dietrich', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(51, 'Quia officia officia nesciunt dolor amet.', 'Consectetur rerum nam beatae aut cumque placeat omnis. Veniam at velit inventore saepe quae.', 'Francesca Fahey', '2024-07-03 19:16:39', '2024-07-03 19:16:39'),
(54, 'test title create', 'test body', 'test author', '2024-07-05 20:43:14', '2024-07-05 20:43:14');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(3, 'Justine', 'test@test.com', '$2y$10$PwQqIA5bIeqIM2rImMAkVuLodawz2c4HuGifSmVg59iMjKXg7Ztge');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
