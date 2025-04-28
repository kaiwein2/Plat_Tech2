-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2025 at 04:24 PM
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
-- Database: `men_shoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `thumbnail1` varchar(255) DEFAULT NULL,
  `thumbnail2` varchar(255) DEFAULT NULL,
  `thumbnail3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `stock`, `image`, `category`, `description`, `thumbnail1`, `thumbnail2`, `thumbnail3`) VALUES
(1, 'BioStrides', 8999.00, 5, 'assets/img/men/lifestyle/strides1.png', 'lifestyle', 'BioStrides offers superior comfort and support for all-day wear, perfect for casual outings.', 'assets/img/men/lifestyle/strides2.png', 'assets/img/men/lifestyle/strides1.png', 'assets/img/men/lifestyle/strides4.png'),
(2, 'Cliftons', 1599.00, 0, 'assets/img/men/lifestyle/clifton1.png', 'lifestyle', 'Cliftons provide a lightweight design with excellent ventilation for ultimate comfort during your daily activities.', 'assets/img/men/lifestyle/clifton2.png', 'assets/img/men/lifestyle/clifton3.png', 'assets/img/men/lifestyle/clifton4.png'),
(3, 'ZenithWalk', 1899.00, 10, 'assets/img/men/lifestyle/zenithwalk1.png', 'lifestyle', 'ZenithWalk shoes blend style and functionality for those who demand performance without sacrificing looks.', 'assets/img/men/lifestyle/zenithwalk2.png', 'assets/img/men/lifestyle/zenithwalk3.png', 'assets/img/men/lifestyle/zenithwalk4.png'),
(4, 'EccoSoft', 1999.00, 4, 'assets/img/men/lifestyle/eccosoft1.png', 'lifestyle', 'EccoSoft shoes are designed with plush cushioning and a soft upper for a luxurious feel on your feet.', 'assets/img/men/lifestyle/eccosoft2.png', 'assets/img/men/lifestyle/eccosoft3.png', 'assets/img/men/lifestyle/eccosoft4.png'),
(5, 'FlexFit', 1299.00, 6, 'assets/img/men/lifestyle/flexfit2.png', 'lifestyle', 'FlexFit shoes offer a flexible design that adapts to your foot movement, making them ideal for active lifestyles.', 'assets/img/men/lifestyle/flexfit1.png', 'assets/img/men/lifestyle/flexfit3.png', 'assets/img/men/lifestyle/flexfit4.png'),
(6, 'Threads', 1599.00, 16, 'assets/img/men/lifestyle/threads1.png', 'lifestyle', 'Threads provide a stylish yet comfortable option for everyday use, with a focus on breathability and durability.', 'assets/img/men/lifestyle/threads2.png', 'assets/img/men/lifestyle/threads3.png', 'assets/img/men/lifestyle/threads4.png'),
(7, 'SwiftStride', 5999.00, 15, 'assets/img/men/running/swiftstride1.png', 'running', 'SwiftStride running shoes are engineered for speed, providing lightweight support that helps you go the distance.', 'assets/img/men/running/swiftstride2.png', 'assets/img/men/running/swiftstride3.png', 'assets/img/men/running/swiftstride4.png'),
(8, 'Fleetfoot', 3599.00, 11, 'assets/img/men/running/fleetfoot1.png', 'running', 'Fleetfoot shoes are built for runners who want a responsive feel and excellent traction on any surface.', 'assets/img/men/running/fleetfoot2.png', 'assets/img/men/running/fleetfoot3.png', 'assets/img/men/running/fleetfoot4.png'),
(9, 'GlideRainbow', 7999.00, 18, 'assets/img/men/running/gliderainbow1.png', 'running', 'GlideRainbow offers a unique design with advanced cushioning technology, ensuring a smooth and comfortable run.', 'assets/img/men/running/gliderainbow2.png', 'assets/img/men/running/gliderainbow3.png', 'assets/img/men/running/gliderainbow1.png'),
(10, 'AeroStep', 4899.00, 0, 'assets/img/men/running/aerostep1.png', 'running', 'Aerodynamic and lightweight, AeroStep shoes are perfect for competitive runners seeking to improve their performance.', 'assets/img/men/running/aerostep2.png', 'assets/img/men/running/aerostep3.png', 'assets/img/men/running/aerostep4.png'),
(11, 'EnduroEdge', 5299.00, 4, 'assets/img/men/running/enduroedge1.png', 'running', 'EnduroEdge shoes are designed for endurance athletes, combining durability with exceptional comfort for long runs.', 'assets/img/men/running/enduroedge2.png', 'assets/img/men/running/enduroedge3.png', 'assets/img/men/running/enduroedge4.png'),
(12, 'SprintSpirit', 1999.00, 7, 'assets/img/men/running/sprintspirit1.png', 'running', 'SprintSpirit shoes provide a snug fit and responsive cushioning, making them perfect for sprinters and fast-paced workouts.', 'assets/img/men/running/sprintspirit2.png', 'assets/img/men/running/sprintspirit3.png', 'assets/img/men/running/sprintspirit4.png'),
(13, 'EliteEdge', 5999.00, 13, 'assets/img/men/athletics/eliteedge1.png', 'athletics', 'EliteEdge shoes are engineered for athletes seeking performance and style, offering exceptional grip and support.', 'assets/img/men/athletics/eliteedge2.png', 'assets/img/men/athletics/eliteedge3.png', 'assets/img/men/athletics/eliteedge1.png'),
(14, 'CrimsonThread', 7599.00, 8, 'assets/img/men/athletics/crimsonthread1.png', 'athletics', 'CrimsonThread combines advanced technology with modern design, perfect for serious athletes and fitness enthusiasts.', 'assets/img/men/athletics/crimsonthread1.png', 'assets/img/men/athletics/crimsonthread2.png', 'assets/img/men/athletics/crimsonthread3.png'),
(15, 'PulsePace', 11999.00, 9, 'assets/img/men/athletics/pulsepace1.png', 'athletics', 'PulsePace shoes feature innovative cushioning and stability, designed to enhance your athletic performance and comfort.', 'assets/img/men/athletics/pulsepace1.png', 'assets/img/men/athletics/pulsepace2.png', 'assets/img/men/athletics/pulsepace3.png'),
(16, 'SpeedSprouts', 2499.00, 0, 'assets/img/kids/lifestyle/speedsprouts.png', 'kids', 'SpeedSprouts are designed for active kids, offering lightweight comfort and vibrant designs.', 'assets/img/kids/lifestyle/speedsprouts.png', 'assets/img/kids/lifestyle/speedsprouts1.png\n', 'assets/img/kids/lifestyle/speedsprouts2.png\n'),
(17, 'MiniStrides', 1999.00, 12, 'assets/img/kids/lifestyle/ministrides1.png\n', 'kids', 'MiniStrides provide a snug fit and are perfect for toddlers who love to explore.', 'assets/img/kids/lifestyle/ministrides2.png\n', 'assets/img/kids/lifestyle/ministrides1.png\n', 'assets/img/kids/lifestyle/ministrides2.png\n'),
(18, 'PebblePaths', 2299.00, 11, 'assets/img/kids/lifestyle/pebblepaths.png', 'kids', 'PebblePaths feature rugged soles for adventurous kids who love outdoor activities.', 'assets/img/kids/lifestyle/pebblepaths2.png', 'assets/img/kids/lifestyle/pebblepaths.png', 'assets/img/kids/lifestyle/pebblepaths2.png'),
(19, 'Zoomsters', 2699.00, 18, 'assets/img/kids/lifestyle/zoomsters1.png', 'kids', 'Zoomsters offer unmatched speed and agility for kids on the go, with bold colorways.', 'assets/img/kids/lifestyle/zoomsters2.png\n', 'assets/img/kids/lifestyle/zoomsters1.png\n', 'assets/img/kids/lifestyle/zoomsters1.png\n'),
(20, 'KickCubs', 1899.00, 24, 'assets/img/kids/lifestyle/kickcubs1.png', 'kids', 'KickCubs are made for playtime, combining durability and style in every step.', 'assets/img/kids/lifestyle/kickcubs1.png', 'assets/img/kids/lifestyle/kickcubs2.png', 'assets/img/kids/lifestyle/kickcubs1.png'),
(21, 'TrailTykes', 2999.00, 9, 'assets/img/kids/lifestyle/trailtykes1.png', 'kids', 'TrailTykes are perfect for young explorers, offering grip and comfort on any terrain.', 'assets/img/kids/lifestyle/trailtykes2.png', 'assets/img/kids/lifestyle/trailtykes3.png', 'assets/img/kids/lifestyle/trailtykes4.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
