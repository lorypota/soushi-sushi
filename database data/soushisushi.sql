-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 20, 2021 alle 04:13
-- Versione del server: 10.4.18-MariaDB
-- Versione PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soushisushi`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cart`
--

CREATE TABLE `cart` (
  `id_carrello` int(11) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `is_ordered` tinyint(1) NOT NULL DEFAULT 0,
  `date_order` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `cart_sushi`
--

CREATE TABLE `cart_sushi` (
  `sushi_name` varchar(32) NOT NULL,
  `id_carrello` int(11) NOT NULL,
  `pieces_number` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredient` varchar(32) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  `is_glutenfree` tinyint(1) NOT NULL,
  `is_spicy` tinyint(1) NOT NULL,
  `id_diet` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ingredients`
--

INSERT INTO `ingredients` (`ingredient`, `description`, `is_glutenfree`, `is_spicy`, `id_diet`) VALUES
('apple', 'Type of fruit.', 1, 0, 'vegan'),
('asparagus', 'Type of vegetable.', 1, 0, 'vegan'),
('avocado', 'Type of vegetable.', 1, 0, 'vegan'),
('cabbage', 'Type of vegetable.', 1, 0, 'vegan'),
('carrot', 'Type of vegetable.', 1, 0, 'vegan'),
('cooked eel', 'Type of fish.', 1, 0, 'null'),
('cooked octopus', 'Type of fish.', 1, 0, 'null'),
('cooked salmon', 'Type of fish.', 1, 0, 'null'),
('cooked shrimp', 'Type of fish.', 1, 0, 'null'),
('cooked squid', 'Type of fish.', 1, 0, 'null'),
('cooked tuna', 'Type of fish.', 1, 0, 'null'),
('cucumber', 'Type of vegetable.', 1, 0, 'vegan'),
('egg', 'Just a normal egg.', 1, 0, 'vegetarian'),
('flour', 'Plain flour.', 0, 0, 'vegan'),
('jalapeno', 'A very hot green chilli pepper.', 1, 1, 'vegan'),
('lettuce', 'Type of vegetable.', 1, 0, 'vegan'),
('mango', 'Type of fruit.', 1, 0, 'vegan'),
('mayonnaise', 'Widely spread sauce around the world, it\'s famous for its eggy taste.', 0, 0, 'vegetarian'),
('miso', 'Fermented paste made by soybeans.', 1, 0, 'vegan'),
('noodles', 'Thin and long strip of pasta, usually eaten in a soup or a sauce.', 0, 0, 'vegan'),
('onion', 'Type of vegetable.', 1, 0, 'vegan'),
('philadelphia', 'Cream cheese invented in New York.', 1, 0, 'vegetarian'),
('pineapple', 'Type of fruit.', 1, 0, 'vegan'),
('radish', 'An edible root vegetable of the family Brassicaceae that was domesticated in Asia prior to Roma times.', 1, 0, 'vegan'),
('raw crab', 'Type of crustacean.', 1, 0, 'null'),
('raw eel', 'Type of fish.', 1, 0, 'null'),
('raw octopus', 'Type of fish.', 1, 0, 'null'),
('raw salmon', 'Type of fish.', 1, 0, 'null'),
('raw shrimp', 'Type of fish.', 1, 0, 'null'),
('raw squid', 'Type of fish.', 1, 0, 'null'),
('raw tuna', 'Type of fish.', 1, 0, 'null'),
('rice', 'Known as Sushi-meshi, it\'s the typical Japanese rice used for sushi.', 1, 0, 'vegan'),
('seasame seeds', 'Small white seeds from the Sesame plant.', 1, 0, 'vegan'),
('seaweed wrapper', 'Known as Nori, it\'s the typical Japanese algae used for sushi.', 1, 0, 'vegan'),
('soy sauce', 'Just soy sauce.', 1, 0, 'vegan'),
('Spicy mayonnaise', 'Sauce famous for its eggy taste, spice included.', 0, 1, 'vegetarian'),
('spicy sauce', 'Spicy sauce chosen from our best collection.', 1, 1, 'vegan'),
('surimi', 'Minced fish paste, similar to crab meat.', 0, 0, 'vegetarian'),
('sweet potatoes', 'Type of vegetable.', 1, 0, 'vegan'),
('tempura', 'Typical dish of Japanese cuisine usually consisting of seafood, meat and vegetables that have been battered and deep fried.', 0, 0, 'vegan'),
('teriyaki sauce', 'Typical sauce from hawaii. Widely used in the Japanese cuisine.', 0, 0, 'vegetarian'),
('tobiko', 'Tobiko is the Japanese word for flying fish.', 1, 0, 'null'),
('wasabi', 'Spice traditionally prepared from a plant from the cabbage family. Widely used in the Japanese cuisine.', 1, 1, 'vegetarian');

-- --------------------------------------------------------

--
-- Struttura della tabella `sushi`
--

CREATE TABLE `sushi` (
  `sushi_name` varchar(32) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `is_special` tinyint(1) NOT NULL,
  `is_drink` tinyint(1) NOT NULL,
  `description` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `sushi`
--

INSERT INTO `sushi` (`sushi_name`, `price`, `is_special`, `is_drink`, `description`) VALUES
('chirashi fish mix', '12.00', 0, 0, '0'),
('chirashi salmon', '12.00', 0, 0, '0'),
('chirashi soushi', '14.00', 0, 0, '0'),
('cooked salmon', '8.00', 0, 1, '0'),
('cooked shrimp', '8.00', 0, 1, '0'),
('dumplings', '4.00', 0, 1, '0'),
('Fremo Mango Aloe Vera Drink', '2.00', 0, 0, '1'),
('french fries', '3.75', 0, 1, '0'),
('fried bread', '3.00', 0, 1, '0'),
('fried maki', '12.00', 0, 0, '0'),
('futomaki mix', '13.00', 0, 0, '0'),
('futomaki salmon', '10.00', 0, 0, '0'),
('green tea', '3.00', 0, 0, '1'),
('gunkan philadelphia', '4.00', 0, 0, '0'),
('gunkan spicy salmon', '4.00', 0, 0, '0'),
('gunkan spicy tuna', '4.25', 0, 0, '0'),
('Hatakosen Pineapple Soda', '2.00', 0, 0, '1'),
('Hatakosen ramune soda', '2.00', 0, 0, '1'),
('hosomaki avocado', '4.50', 0, 1, '0'),
('hosomaki california', '4.50', 0, 0, '0'),
('hosomaki cooked shrimp', '5.00', 0, 0, '0'),
('hosomaki eel', '7.00', 0, 0, '0'),
('hosomaki fried shrimp', '5.00', 0, 0, '0'),
('hosomaki salmon', '3.00', 0, 0, '0'),
('hosomaki special', '8.00', 0, 1, '0'),
('hosomaki tuna', '6.00', 0, 0, '0'),
('Japanese tea', '2.00', 0, 0, '1'),
('mango roll', '13.00', 0, 1, '0'),
('miso soup', '3.25', 0, 1, '0'),
('nigiri eel', '5.00', 0, 0, '0'),
('nigiri mango', '3.00', 0, 1, '0'),
('nigiri salmon', '3.00', 0, 0, '0'),
('nigiri tuna', '4.00', 0, 0, '0'),
('octopus salad', '7.00', 0, 1, '0'),
('Otsuka Oronamin C Energy Drink', '5.00', 0, 0, '1'),
('Otsuka Pocari Sweat Ion', '2.00', 0, 0, '1'),
('rainbow roll', '13.00', 0, 0, '0'),
('ramen', '5.00', 0, 1, '0'),
('ramen with fish', '5.00', 0, 1, '0'),
('ramen with vegetables', '4.00', 0, 1, '0'),
('salmon tartare', '8.00', 0, 1, '0'),
('Sangaria Melon Soda', '3.25', 0, 0, '1'),
('sashimi mix', '15.00', 0, 0, '0'),
('sashimi salad', '8.00', 0, 1, '0'),
('sashimi salmon', '13.00', 0, 0, '0'),
('shao mai', '4.50', 0, 1, '0'),
('shrimp and pineapple rice', '4.00', 0, 1, '0'),
('shrimp dumplings', '4.50', 0, 1, '0'),
('shrimp roll', '4.50', 0, 1, '0'),
('shrimp skewers', '8.00', 0, 1, '0'),
('soy sauce', '0.50', 0, 1, '0'),
('spicy miso soup', '3.00', 0, 1, '0'),
('spicy ramen', '5.50', 0, 1, '0'),
('spring roll', '3.00', 0, 1, '0'),
('steamed bread', '3.00', 0, 1, '0'),
('Suntory C.C. Lemon Soda', '4.00', 0, 0, '1'),
('super roll', '12.00', 0, 0, '0'),
('surimi salad', '6.00', 0, 1, '0'),
('sushi mix', '8.00', 0, 0, '0'),
('Tarami White and Golden Peach', '4.00', 0, 0, '1'),
('tartar tris', '10.00', 0, 1, '0'),
('temaki avocado', '4.00', 0, 1, '0'),
('temaki salmon avocado mayo', '5.00', 0, 0, '0'),
('temaki shrimp fried mayo', '5.00', 0, 0, '0'),
('temaki spicy salmon mayo', '6.00', 0, 0, '0'),
('temaki spicy tuna mayo', '6.00', 0, 0, '0'),
('temaki tuna avocado mayo', '5.00', 0, 0, '0'),
('tempura mixed fish', '12.00', 0, 1, '0'),
('tempura shrimp', '9.00', 0, 1, '0'),
('tempura vegetables', '4.50', 0, 1, '0'),
('tiger roll', '12.00', 0, 0, '0'),
('tuna skewers', '8.00', 0, 1, '0'),
('uramaki california', '8.00', 0, 0, '0'),
('uramaki salmon', '5.00', 0, 0, '0'),
('uramaki shrimp tuna', '8.00', 0, 0, '0'),
('uramaki tuna', '10.00', 0, 0, '0'),
('vegetables rice', '3.00', 0, 1, '0'),
('wasabi', '0.50', 0, 1, '0');

-- --------------------------------------------------------

--
-- Struttura della tabella `sushi_ingredients`
--

CREATE TABLE `sushi_ingredients` (
  `sushi_name` varchar(32) NOT NULL,
  `ingredient` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `sushi_ingredients`
--

INSERT INTO `sushi_ingredients` (`sushi_name`, `ingredient`) VALUES
('chirashi fish mix', 'raw salmon'),
('chirashi fish mix', 'raw shrimp'),
('chirashi fish mix', 'raw tuna'),
('chirashi fish mix', 'rice'),
('chirashi salmon', 'raw salmon'),
('chirashi salmon', 'rice'),
('chirashi soushi', 'avocado'),
('chirashi soushi', 'mango'),
('chirashi soushi', 'mayonnaise'),
('chirashi soushi', 'raw salmon'),
('chirashi soushi', 'raw shrimp'),
('chirashi soushi', 'raw tuna'),
('chirashi soushi', 'rice'),
('chirashi soushi', 'spicy sauce'),
('cooked salmon', 'cooked salmon'),
('cooked shrimp', 'cooked shrimp'),
('dumplings', 'cabbage'),
('dumplings', 'carrot'),
('dumplings', 'onion'),
('dumplings', 'soy sauce'),
('french fries', 'sweet potatoes'),
('french fries', 'tempura'),
('fried bread', 'egg'),
('fried bread', 'flour'),
('fried bread', 'tempura'),
('fried maki', 'raw salmon'),
('fried maki', 'raw shrimp'),
('fried maki', 'raw tuna'),
('fried maki', 'rice'),
('fried maki', 'seaweed wrapper'),
('fried maki', 'tempura'),
('futomaki mix', 'raw salmon'),
('futomaki mix', 'raw shrimp'),
('futomaki mix', 'raw tuna'),
('futomaki mix', 'rice'),
('futomaki mix', 'seaweed wrapper'),
('futomaki salmon', 'raw salmon'),
('futomaki salmon', 'raw shrimp'),
('futomaki salmon', 'rice'),
('gunkan philadelphia', 'philadelphia'),
('gunkan philadelphia', 'raw salmon'),
('gunkan philadelphia', 'rice'),
('gunkan philadelphia', 'tobiko'),
('gunkan spicy salmon', 'philadelphia'),
('gunkan spicy salmon', 'raw salmon'),
('gunkan spicy salmon', 'rice'),
('gunkan spicy salmon', 'spicy sauce'),
('gunkan spicy salmon', 'tobiko'),
('gunkan spicy tuna', 'philadelphia'),
('gunkan spicy tuna', 'raw tuna'),
('gunkan spicy tuna', 'rice'),
('gunkan spicy tuna', 'spicy sauce'),
('gunkan spicy tuna', 'tobiko'),
('hosomaki avocado', 'avocado'),
('hosomaki avocado', 'rice'),
('hosomaki avocado', 'seaweed wrapper'),
('hosomaki california', 'philadelphia'),
('hosomaki california', 'raw salmon'),
('hosomaki california', 'rice'),
('hosomaki california', 'seaweed wrapper'),
('hosomaki cooked shrimp', 'cooked shrimp'),
('hosomaki cooked shrimp', 'rice'),
('hosomaki cooked shrimp', 'seaweed wrapper'),
('hosomaki eel', 'raw eel'),
('hosomaki eel', 'rice'),
('hosomaki eel', 'seaweed wrapper'),
('hosomaki fried shrimp', 'cooked shrimp'),
('hosomaki fried shrimp', 'rice'),
('hosomaki fried shrimp', 'seaweed wrapper'),
('hosomaki fried shrimp', 'tempura'),
('hosomaki salmon', 'raw salmon'),
('hosomaki salmon', 'rice'),
('hosomaki salmon', 'seaweed wrapper'),
('hosomaki special', 'mango'),
('hosomaki special', 'mayonnaise'),
('hosomaki special', 'raw salmon'),
('hosomaki special', 'rice'),
('hosomaki special', 'seaweed wrapper'),
('hosomaki special', 'spicy sauce'),
('hosomaki tuna', 'raw tuna'),
('hosomaki tuna', 'rice'),
('hosomaki tuna', 'seaweed wrapper'),
('mango roll', 'mango'),
('mango roll', 'raw salmon'),
('mango roll', 'rice'),
('mango roll', 'seaweed wrapper'),
('miso soup', 'miso'),
('nigiri eel', 'raw eel'),
('nigiri eel', 'rice'),
('nigiri mango', 'mango'),
('nigiri mango', 'rice'),
('nigiri salmon', 'raw salmon'),
('nigiri salmon', 'rice'),
('nigiri tuna', 'raw tuna'),
('nigiri tuna', 'rice'),
('octopus salad', 'lettuce'),
('octopus salad', 'raw octopus'),
('rainbow roll', 'mango'),
('rainbow roll', 'raw salmon'),
('rainbow roll', 'raw tuna'),
('rainbow roll', 'rice'),
('rainbow roll', 'seaweed wrapper'),
('ramen', 'egg'),
('ramen', 'noodles'),
('ramen', 'soy sauce'),
('ramen with fish', 'asparagus'),
('ramen with fish', 'avocado'),
('ramen with fish', 'carrot'),
('ramen with fish', 'cooked salmon'),
('ramen with fish', 'cooked tuna'),
('ramen with fish', 'cucumber'),
('ramen with fish', 'egg'),
('ramen with fish', 'lettuce'),
('ramen with fish', 'noodles'),
('ramen with fish', 'onion'),
('ramen with fish', 'radish'),
('ramen with fish', 'rice'),
('ramen with fish', 'seasame seeds'),
('ramen with vegetables', 'asparagus'),
('ramen with vegetables', 'avocado'),
('ramen with vegetables', 'carrot'),
('ramen with vegetables', 'cucumber'),
('ramen with vegetables', 'egg'),
('ramen with vegetables', 'lettuce'),
('ramen with vegetables', 'noodles'),
('ramen with vegetables', 'onion'),
('ramen with vegetables', 'radish'),
('ramen with vegetables', 'seasame seeds'),
('salmon tartare', 'raw salmon'),
('sashimi mix', 'raw salmon'),
('sashimi mix', 'raw shrimp'),
('sashimi mix', 'raw tuna'),
('sashimi salad', 'lettuce'),
('sashimi salad', 'raw salmon'),
('sashimi salad', 'raw tuna'),
('sashimi salmon', 'raw salmon'),
('shao mai', 'raw shrimp'),
('shao mai', 'rice'),
('shao mai', 'soy sauce'),
('shrimp and pineapple rice', 'pineapple'),
('shrimp and pineapple rice', 'raw shrimp'),
('shrimp and pineapple rice', 'rice'),
('shrimp dumplings', 'cabbage'),
('shrimp dumplings', 'carrot'),
('shrimp dumplings', 'onion'),
('shrimp dumplings', 'raw shrimp'),
('shrimp dumplings', 'soy sauce'),
('shrimp roll', 'cabbage'),
('shrimp roll', 'carrot'),
('shrimp roll', 'cucumber'),
('shrimp roll', 'jalapeno'),
('shrimp roll', 'lettuce'),
('shrimp roll', 'onion'),
('shrimp roll', 'raw shrimp'),
('shrimp roll', 'rice'),
('shrimp skewers', 'cooked shrimp'),
('soy sauce', 'soy sauce'),
('spicy miso soup', 'miso'),
('spicy miso soup', 'spicy sauce'),
('spicy ramen', 'egg'),
('spicy ramen', 'soy sauce'),
('spicy ramen', 'spicy sauce'),
('spring roll', 'cabbage'),
('spring roll', 'carrot'),
('spring roll', 'cucumber'),
('spring roll', 'jalapeno'),
('spring roll', 'lettuce'),
('spring roll', 'onion'),
('spring roll', 'rice'),
('steamed bread', 'egg'),
('steamed bread', 'flour'),
('super roll', 'raw salmon'),
('super roll', 'raw shrimp'),
('super roll', 'raw tuna'),
('super roll', 'rice'),
('super roll', 'seaweed wrapper'),
('super roll', 'tempura'),
('surimi salad', 'lettuce'),
('surimi salad', 'surimi'),
('sushi mix', 'avocado'),
('sushi mix', 'mango'),
('sushi mix', 'mayonnaise'),
('sushi mix', 'raw salmon'),
('sushi mix', 'raw shrimp'),
('sushi mix', 'raw tuna'),
('sushi mix', 'rice'),
('sushi mix', 'seaweed wrapper'),
('sushi mix', 'spicy sauce'),
('tartar tris', 'raw salmon'),
('tartar tris', 'raw shrimp'),
('tartar tris', 'raw tuna'),
('temaki avocado', 'avocado'),
('temaki avocado', 'rice'),
('temaki avocado', 'seaweed wrapper'),
('temaki salmon avocado mayo', 'avocado'),
('temaki salmon avocado mayo', 'mayonnaise'),
('temaki salmon avocado mayo', 'raw salmon'),
('temaki salmon avocado mayo', 'rice'),
('temaki salmon avocado mayo', 'seaweed wrapper'),
('temaki shrimp fried mayo', 'mayonnaise'),
('temaki shrimp fried mayo', 'raw shrimp'),
('temaki shrimp fried mayo', 'rice'),
('temaki shrimp fried mayo', 'seaweed wrapper'),
('temaki shrimp fried mayo', 'tempura'),
('temaki spicy salmon mayo', 'mayonnaise'),
('temaki spicy salmon mayo', 'raw salmon'),
('temaki spicy salmon mayo', 'rice'),
('temaki spicy salmon mayo', 'seaweed wrapper'),
('temaki spicy salmon mayo', 'spicy sauce'),
('temaki spicy tuna mayo', 'mayonnaise'),
('temaki spicy tuna mayo', 'raw tuna'),
('temaki spicy tuna mayo', 'rice'),
('temaki spicy tuna mayo', 'seaweed wrapper'),
('temaki spicy tuna mayo', 'spicy sauce'),
('temaki tuna avocado mayo', 'avocado'),
('temaki tuna avocado mayo', 'mayonnaise'),
('temaki tuna avocado mayo', 'raw tuna'),
('temaki tuna avocado mayo', 'rice'),
('temaki tuna avocado mayo', 'seaweed wrapper'),
('tempura mixed fish', 'cooked eel'),
('tempura mixed fish', 'cooked octopus'),
('tempura mixed fish', 'cooked shrimp'),
('tempura mixed fish', 'cooked squid'),
('tempura mixed fish', 'cooked tuna'),
('tempura mixed fish', 'tempura'),
('tempura shrimp', 'cooked shrimp'),
('tempura shrimp', 'tempura'),
('tempura vegetables', 'asparagus'),
('tempura vegetables', 'avocado'),
('tempura vegetables', 'carrot'),
('tempura vegetables', 'cucumber'),
('tempura vegetables', 'lettuce'),
('tempura vegetables', 'onion'),
('tempura vegetables', 'radish'),
('tempura vegetables', 'seasame seeds'),
('tempura vegetables', 'tempura'),
('tiger roll', 'apple'),
('tiger roll', 'raw salmon'),
('tiger roll', 'raw tuna'),
('tiger roll', 'rice'),
('tiger roll', 'seaweed wrapper'),
('tuna skewers', 'cooked tuna'),
('uramaki california', 'mayonnaise'),
('uramaki california', 'raw salmon'),
('uramaki california', 'rice'),
('uramaki california', 'seaweed wrapper'),
('uramaki salmon', 'raw salmon'),
('uramaki salmon', 'rice'),
('uramaki salmon', 'seaweed wrapper'),
('uramaki shrimp tuna', 'raw shrimp'),
('uramaki shrimp tuna', 'raw tuna'),
('uramaki shrimp tuna', 'rice'),
('uramaki shrimp tuna', 'seaweed wrapper'),
('uramaki tuna', 'raw tuna'),
('uramaki tuna', 'rice'),
('uramaki tuna', 'seaweed wrapper'),
('vegetables rice', 'asparagus'),
('vegetables rice', 'avocado'),
('vegetables rice', 'carrot'),
('vegetables rice', 'cucumber'),
('vegetables rice', 'lettuce'),
('vegetables rice', 'onion'),
('vegetables rice', 'radish'),
('vegetables rice', 'rice'),
('vegetables rice', 'seasame seeds'),
('wasabi', 'wasabi');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(16) NOT NULL,
  `last_name` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_carrello`),
  ADD KEY `username` (`username`);

--
-- Indici per le tabelle `cart_sushi`
--
ALTER TABLE `cart_sushi`
  ADD PRIMARY KEY (`sushi_name`,`id_carrello`),
  ADD KEY `id_carrello` (`id_carrello`);

--
-- Indici per le tabelle `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredient`);

--
-- Indici per le tabelle `sushi`
--
ALTER TABLE `sushi`
  ADD PRIMARY KEY (`sushi_name`);

--
-- Indici per le tabelle `sushi_ingredients`
--
ALTER TABLE `sushi_ingredients`
  ADD PRIMARY KEY (`sushi_name`,`ingredient`),
  ADD KEY `ingredient` (`ingredient`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cart`
--
ALTER TABLE `cart`
  MODIFY `id_carrello` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `cart_sushi`
--
ALTER TABLE `cart_sushi`
  ADD CONSTRAINT `cart_sushi_ibfk_1` FOREIGN KEY (`sushi_name`) REFERENCES `sushi` (`sushi_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_sushi_ibfk_2` FOREIGN KEY (`id_carrello`) REFERENCES `cart` (`id_carrello`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `sushi_ingredients`
--
ALTER TABLE `sushi_ingredients`
  ADD CONSTRAINT `sushi_ingredients_ibfk_1` FOREIGN KEY (`sushi_name`) REFERENCES `sushi` (`sushi_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sushi_ingredients_ibfk_2` FOREIGN KEY (`ingredient`) REFERENCES `ingredients` (`ingredient`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
