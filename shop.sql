-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 22, 2024 at 04:38 PM
-- Server version: 8.0.40-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `picture` text NOT NULL,
  `id_categorie` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `name`, `description`, `price`, `picture`, `id_categorie`) VALUES
(6, 'Bague', 'Bague de fiançailles - Or rose 18 carats - Cluster de diamants naturels ', 350000, 'https://img.edenly.com/produit/packshot/071A1552-ID3170-z.jpg', 1),
(8, 'Jupe', 'Jupe en cuir de couleur noire tail:M   ', 10000, 'https://openmoise.ci/web/image/product.template/71450/image_1024?unique=51ac2b8', 1),
(9, 'moccassin homme', 'moccassin homme a gland', 24999, 'https://style-old-money.com/cdn/shop/files/Mocassin-Homme-A-Gland-Old-Money-3.webp?v=1718921688', 2),
(10, 'Chaine de cheville', 'Chaine De Cheville Argent Blanc 925/1000 Double Chaine Infini Pavage Oxydes De Zirconium Maille Forcat 23+2cm ', 1000, 'https://www.marc-orian.com/dw/image/v2/BCQS_PRD/on/demandware.static/-/Sites-THOM_CATALOG/default/dw635489e1/images/FAZFBZW027-master.jpg?sw=474&sh=474', 3),
(11, 'purple', 'Chemise dame couleur violet', 21000, 'https://www.cache-cache.fr/on/demandware.static/-/Sites-Cache_cache_master/default/dw29775255/chemise-manches-longues-violet-femme-vue8-36125394201164880.jpg', 1),
(13, 'gourmette-femme', 'gourmette fashion en acier inoxydable', 3000, 'https://ci.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/89/924662/1.jpg?7325', 3),
(14, 'campus', 'adidas campus violet', 24000, 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/ffe5632b00304bdd9299bc35ebafe794_9366/IF9616_01_standard.jpg', 2),
(15, 'essential', 't-shirt blanc homme', 4000, 'https://essentialcolors.fr/cdn/shop/files/ec-jordanretouches4-3-2-min_1080x.jpg?v=1711730600', 1),
(16, 'veste-homme', 'veste pour les grandes occasions', 530000, 'https://media.gqmagazine.fr/photos/5e0a176426e5bd000828529d/master/pass/multiveste%202.jpg', 1),
(17, 'verte iris', 'robe veste courte en crêpe lourd avec des manches en voile ', 13000, 'https://www.fadiwax-canada.ca/cdn/shop/files/Captured_ecran2023-04-09093751_05dd4d7e-88c9-410b-a9e1-869469640d3f.jpg?v=1691449045', 1),
(18, 'le tanneur', 'sac femme autonne hiver', 35000, 'https://www.letanneur.de/cdn/shop/files/emilie_63ecf5e2-e8f2-4f00-9eaa-b2770797b748.jpg?v=1723475124', 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `categorie_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categorie_name`) VALUES
(1, 'Vêtements'),
(2, 'Chaussures'),
(3, 'Accessoires');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `roles` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles`) VALUES
(1, 'superAdmin'),
(2, 'Admin'),
(3, 'Users');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_role` int NOT NULL DEFAULT '3',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `id_role`, `created_at`) VALUES
(15, 'AnneMarie', 'marie@gmail.com', '$2y$10$KTFMXNJBd6FLLY/BdlXyNOgD4zkLr3Rrazc8CNNCGZ9DNSgf60lsq', 1, '2024-12-20 08:12:47'),
(16, 'Kadidja', 'kadi@gmail.com', '$2y$10$32AjBlNlAx/soaRTCXpj7uB/gU6tT5QqyAgV1U9kgmRR/i68L68ia', 2, '2024-12-21 17:09:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`password`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
