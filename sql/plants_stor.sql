

CREATE TABLE `category` (
  `category_ID` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) 




CREATE TABLE `panier` (
  `panier_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `plant_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) 



CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_ID` int(11) DEFAULT NULL
) 



CREATE TABLE `roles` (
  `roleID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) 

INSERT INTO `roles` (`roleID`, `name`) VALUES
(1, 'Admin'),
(2, 'Client');



CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roleID` int(11) DEFAULT NULL
) 


ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`plant_id`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_ID`) REFERENCES `category` (`category_ID`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `roles` (`roleID`);
COMMIT;

