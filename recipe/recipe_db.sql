-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2025 at 04:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `ingredients` text NOT NULL,
  `instructions` text NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `user_id`, `title`, `ingredients`, `instructions`, `image`) VALUES
(7, 4, 'Pav bhaji', 'For Bhaji:\r\n	•	Boiled: 2 potatoes, ½ cup peas, ½ cup cauliflower, 1 carrot (optional)\r\n	•	1 chopped onion, 2 chopped tomatoes\r\n	•	1 tsp ginger-garlic paste\r\n	•	½ tsp turmeric, 1 tsp red chili powder\r\n	•	1.5 tsp pav bhaji masala\r\n	•	Salt, butter, oil, coriander\r\n\r\nFor Pav:\r\n	•	4 pav buns\r\n	•	Butter\r\n	•	Pav bhaji masala (optional)', '1.	Boil & mash all veggies.\r\n	2.	Sauté onion, ginger-garlic paste, then tomatoes.\r\n	3.	Add spices, then mashed veggies. Simmer 10–15 mins.\r\n	4.	Toast pav with butter and pav bhaji masala.\r\n	5.	Serve bhaji with pav, topped with onions, coriander, and lemon', 'uploads/1750354858_5.jpg'),
(8, 4, 'Boba Drink', '1/4 cup tapioca pearls (boba)\r\n\r\n1/2 cup strong coffee (cooled)\r\n\r\n1/2 cup milk\r\n\r\n1–2 tbsp sugar or syrup\r\n\r\nIce cubes', 'Boil boba for 5–7 mins, then rinse and sweeten.\r\n\r\nBrew coffee and let it cool.\r\n\r\nIn a glass: add boba, ice, coffee, milk, and sugar.\r\n\r\nStir and enjoy with a wide straw!', 'uploads/1750357228_14.jpg'),
(9, 4, 'Mango Drink', '1 cup mango pulp (fresh or canned)\r\n\r\n1/2 cup chilled milk\r\n\r\n2–3 tbsp sugar (adjust to taste)\r\n\r\n2 scoops vanilla or mango ice cream\r\n\r\nChopped mango pieces (for garnish)\r\n\r\nIce cubes (optional)\r\n\r\nMint leaves (for garnish)', 'Blend mango pulp, milk, sugar, and 1 scoop ice cream until smooth.\r\n\r\nPour into a tall glass.\r\n\r\nTop with ice cream scoop, mango pieces, and mint leaves.\r\n\r\nServe chilled!', 'uploads/1750357266_15.jpg'),
(10, 4, 'Caramel Churro Milkshake', '2 cups vanilla ice cream\r\n\r\n1/2 cup milk\r\n\r\n2–3 tbsp caramel sauce (plus extra for drizzling)\r\n\r\nWhipped cream (for topping)\r\n\r\n1–2 churros (cut into pieces)\r\n\r\nDark chocolate (optional, for garnish)\r\n\r\nPinch of cinnamon (optional)', 'Blend ice cream, milk, and caramel sauce until smooth.\r\n\r\nDrizzle caramel inside a glass.\r\n\r\nPour the shake into the glass.\r\n\r\nTop with whipped cream, churro pieces, and chocolate.\r\n\r\nSprinkle a little cinnamon if desired.\r\n\r\n', 'uploads/1750357347_19.jpg'),
(11, 4, 'Virgin Mojito (Lime Mint Cooler)', '1/2 lime (cut into pieces)\r\n\r\n6–8 mint leaves\r\n\r\n1 tbsp sugar\r\n\r\n1/2 cup soda or Sprite\r\n\r\nIce cubes', 'Muddle lime, mint & sugar in a glass.\r\n\r\nAdd ice & top with soda/Sprite.\r\n\r\nStir & serve chilled.', 'uploads/1750358735_16.jpg'),
(12, 4, 'Berry Mojito', '1/2 cup mixed berry juice or hibiscus tea\r\n\r\n1 tbsp lemon juice\r\n\r\nMint leaves\r\n\r\nIce cubes\r\n\r\nSoda or Sprite to top', 'Fill glass with mint, lemon juice & ice.\r\n\r\nAdd berry juice.\r\n\r\nTop with soda/Sprite & garnish with mint.', 'uploads/1750358777_14.jpg'),
(13, 3, ' ffffff', ',mh iu', 'hiiiiiitgy', 'uploads/1750361708_5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'praman_7', 'pramanbhogal13@gmail.com', 'qwerty'),
(3, 'admin', 'usermail@email.com', '123456'),
(4, 'User7', 'user7@gmail.com', 'user7'),
(5, 'wercy', 'wercy123@gmail.com', 'wercy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
