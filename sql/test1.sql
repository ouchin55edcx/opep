
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `userId` int(11) NOT NULL
);


CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `ctg_name` varchar(100) DEFAULT NULL,
  `ctg_img_path` varchar(255) DEFAULT NULL
);



CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `comment_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
);



CREATE TABLE `plante` (
  `id` int(11) NOT NULL,
  `plt_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `categorieID` int(11) DEFAULT NULL
);



CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
);


INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Client');


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL
) ;


