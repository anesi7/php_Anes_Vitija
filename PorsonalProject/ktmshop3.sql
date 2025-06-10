-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2025 at 08:44 PM
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
-- Database: `ktmshop3`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `motorcycles`
--

CREATE TABLE `motorcycles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `model` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `engine_size` varchar(20) NOT NULL,
  `power` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(500) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `specifications` text DEFAULT NULL,
  `in_stock` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `motorcycles`
--

INSERT INTO `motorcycles` (`id`, `name`, `model`, `category`, `engine_size`, `power`, `price`, `image_url`, `description`, `specifications`, `in_stock`, `created_at`) VALUES
(1, 'KTM 390 Duke', '390 Duke', 'Street', '373cc', '44 HP', 5499.00, '/placeholder.svg?height=300&width=400', 'The KTM 390 DUKE is the embodiment of what we call REAL DUKE. Uncompromising performance and radical design make this bike perfect for urban adventures and weekend rides.', 'Engine: Single-cylinder, 4-stroke\nDisplacement: 373.2 cc\nPower: 32 kW (44 hp)\nTorque: 37 Nm\nWeight: 149 kg\nFuel capacity: 13.4 liters', 1, '2025-06-10 18:34:53'),
(2, 'KTM 790 Duke', '790 Duke', 'Street', '799cc', '105 HP', 9999.00, '/placeholder.svg?height=300&width=400', 'The KTM 790 DUKE is the essence of what we call The Scalpel. Sharp, precise and cuts to the chase with its parallel-twin engine and agile handling.', 'Engine: Parallel-twin, 4-stroke\nDisplacement: 799 cc\nPower: 77 kW (105 hp)\nTorque: 87 Nm\nWeight: 169 kg\nFuel capacity: 14 liters', 1, '2025-06-10 18:34:53'),
(3, 'KTM 890 Duke R', '890 Duke R', 'Street', '889cc', '121 HP', 12999.00, '/placeholder.svg?height=300&width=400', 'The KTM 890 DUKE R is the sharpest tool in the DUKE range with track-focused components and premium suspension setup.', 'Engine: Parallel-twin, 4-stroke\nDisplacement: 889 cc\nPower: 89 kW (121 hp)\nTorque: 99 Nm\nWeight: 166 kg\nFuel capacity: 14 liters', 1, '2025-06-10 18:34:53'),
(4, 'KTM 1290 Super Duke R', '1290 Super Duke R', 'Street', '1301cc', '180 HP', 18999.00, '/placeholder.svg?height=300&width=400', 'The KTM 1290 SUPER DUKE R is THE BEAST. Pure adrenaline in motorcycle form with massive torque and aggressive styling.', 'Engine: V-twin, 4-stroke\nDisplacement: 1301 cc\nPower: 132 kW (180 hp)\nTorque: 140 Nm\nWeight: 189 kg\nFuel capacity: 16 liters', 1, '2025-06-10 18:34:53'),
(5, 'KTM 390 Adventure', '390 Adventure', 'Adventure', '373cc', '44 HP', 6499.00, '/placeholder.svg?height=300&width=400', 'The KTM 390 ADVENTURE is your gateway to adventure riding with accessible performance and versatile capability both on and off-road.', 'Engine: Single-cylinder, 4-stroke\nDisplacement: 373.2 cc\nPower: 32 kW (44 hp)\nTorque: 37 Nm\nWeight: 158 kg\nFuel capacity: 14.5 liters', 1, '2025-06-10 18:34:53'),
(6, 'KTM 890 Adventure', '890 Adventure', 'Adventure', '889cc', '105 HP', 13999.00, '/placeholder.svg?height=300&width=400', 'The KTM 890 ADVENTURE is built for those who want to explore beyond the beaten path with comfort and capability.', 'Engine: Parallel-twin, 4-stroke\nDisplacement: 889 cc\nPower: 77 kW (105 hp)\nTorque: 100 Nm\nWeight: 196 kg\nFuel capacity: 20 liters', 1, '2025-06-10 18:34:53'),
(7, 'KTM 890 Adventure R', '890 Adventure R', 'Adventure', '889cc', '105 HP', 15499.00, '/placeholder.svg?height=300&width=400', 'The KTM 890 ADVENTURE R is designed for serious off-road adventures with enhanced suspension and rugged components.', 'Engine: Parallel-twin, 4-stroke\nDisplacement: 889 cc\nPower: 77 kW (105 hp)\nTorque: 100 Nm\nWeight: 196 kg\nFuel capacity: 20 liters', 1, '2025-06-10 18:34:53'),
(8, 'KTM 1290 Super Adventure S', '1290 Super Adventure S', 'Adventure', '1301cc', '160 HP', 19999.00, '/placeholder.svg?height=300&width=400', 'The ultimate adventure touring machine with premium features, comfort, and technology for long-distance exploration.', 'Engine: V-twin, 4-stroke\nDisplacement: 1301 cc\nPower: 118 kW (160 hp)\nTorque: 138 Nm\nWeight: 228 kg\nFuel capacity: 23 liters', 1, '2025-06-10 18:34:53'),
(9, 'KTM RC 390', 'RC 390', 'Sport', '373cc', '44 HP', 5999.00, '/placeholder.svg?height=300&width=400', 'The KTM RC 390 brings track-focused performance to the street with aggressive ergonomics and sharp handling.', 'Engine: Single-cylinder, 4-stroke\nDisplacement: 373.2 cc\nPower: 32 kW (44 hp)\nTorque: 37 Nm\nWeight: 147 kg\nFuel capacity: 9.5 liters', 1, '2025-06-10 18:34:53'),
(10, 'KTM RC 8C', 'RC 8C', 'Sport', '889cc', '128 HP', 24999.00, '/placeholder.svg?height=300&width=400', 'The KTM RC 8C is a limited edition track weapon with carbon fiber bodywork and race-derived technology.', 'Engine: Parallel-twin, 4-stroke\nDisplacement: 889 cc\nPower: 95 kW (128 hp)\nTorque: 103 Nm\nWeight: 154 kg\nFuel capacity: 10 liters', 1, '2025-06-10 18:34:53'),
(11, 'KTM 300 EXC TPI', '300 EXC TPI', 'Enduro', '293cc', '55 HP', 10999.00, '/placeholder.svg?height=300&width=400', 'The KTM 300 EXC TPI is the ultimate 2-stroke enduro machine with fuel injection and championship-winning DNA.', 'Engine: Single-cylinder, 2-stroke\nDisplacement: 293.2 cc\nPower: 41 kW (55 hp)\nTorque: 54 Nm\nWeight: 103.2 kg\nFuel capacity: 9.25 liters', 1, '2025-06-10 18:34:53'),
(12, 'KTM 450 EXC-F', '450 EXC-F', 'Enduro', '449cc', '63 HP', 11499.00, '/placeholder.svg?height=300&width=400', 'The KTM 450 EXC-F is a championship-winning enduro bike with electric start and premium components.', 'Engine: Single-cylinder, 4-stroke\nDisplacement: 449.3 cc\nPower: 46 kW (63 hp)\nTorque: 54 Nm\nWeight: 109.8 kg\nFuel capacity: 8.5 liters', 1, '2025-06-10 18:34:53'),
(13, 'KTM 500 EXC-F', '500 EXC-F', 'Enduro', '510cc', '63 HP', 11999.00, '/placeholder.svg?height=300&width=400', 'The KTM 500 EXC-F offers maximum torque for challenging terrain with smooth power delivery.', 'Engine: Single-cylinder, 4-stroke\nDisplacement: 510.9 cc\nPower: 46 kW (63 hp)\nTorque: 58.5 Nm\nWeight: 111.7 kg\nFuel capacity: 8.5 liters', 1, '2025-06-10 18:34:53'),
(14, 'KTM 250 SX', '250 SX', 'Motocross', '249cc', '48 HP', 8999.00, '/placeholder.svg?height=300&width=400', 'The KTM 250 SX is a championship-winning 2-stroke motocross bike with explosive power and lightweight chassis.', 'Engine: Single-cylinder, 2-stroke\nDisplacement: 249 cc\nPower: 36 kW (48 hp)\nTorque: 45 Nm\nWeight: 100.6 kg\nFuel capacity: 7.5 liters', 1, '2025-06-10 18:34:53'),
(15, 'KTM 450 SX-F', '450 SX-F', 'Motocross', '449cc', '63 HP', 10499.00, '/placeholder.svg?height=300&width=400', 'The KTM 450 SX-F dominates motocross tracks worldwide with its powerful engine and advanced suspension.', 'Engine: Single-cylinder, 4-stroke\nDisplacement: 449.3 cc\nPower: 46 kW (63 hp)\nTorque: 56.5 Nm\nWeight: 100.2 kg\nFuel capacity: 7.5 liters', 1, '2025-06-10 18:34:53'),
(16, 'KTM 350 SX-F', '350 SX-F', 'Motocross', '349cc', '57 HP', 9999.00, '/placeholder.svg?height=300&width=400', 'The KTM 350 SX-F offers the perfect balance of power and weight for competitive motocross racing.', 'Engine: Single-cylinder, 4-stroke\nDisplacement: 349.7 cc\nPower: 42 kW (57 hp)\nTorque: 42 Nm\nWeight: 99.8 kg\nFuel capacity: 7.5 liters', 1, '2025-06-10 18:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `motorcycle_images`
--

CREATE TABLE `motorcycle_images` (
  `id` int(11) NOT NULL,
  `motorcycle_id` int(11) DEFAULT NULL,
  `image_url` varchar(500) NOT NULL,
  `image_alt` varchar(255) DEFAULT NULL,
  `is_primary` tinyint(1) DEFAULT 0,
  `sort_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `motorcycle_images`
--

INSERT INTO `motorcycle_images` (`id`, `motorcycle_id`, `image_url`, `image_alt`, `is_primary`, `sort_order`) VALUES
(1, 1, '/placeholder.svg?height=300&width=400', 'KTM 390 Duke Front View', 1, 1),
(2, 1, '/placeholder.svg?height=300&width=400', 'KTM 390 Duke Side View', 0, 2),
(3, 1, '/placeholder.svg?height=300&width=400', 'KTM 390 Duke Engine Detail', 0, 3),
(4, 2, '/placeholder.svg?height=300&width=400', 'KTM 790 Duke Front View', 1, 1),
(5, 2, '/placeholder.svg?height=300&width=400', 'KTM 790 Duke Side View', 0, 2),
(6, 3, '/placeholder.svg?height=300&width=400', 'KTM 890 Duke R Front View', 1, 1),
(7, 3, '/placeholder.svg?height=300&width=400', 'KTM 890 Duke R Side View', 0, 2),
(8, 4, '/placeholder.svg?height=300&width=400', 'KTM 1290 Super Duke R Front View', 1, 1),
(9, 5, '/placeholder.svg?height=300&width=400', 'KTM 390 Adventure Front View', 1, 1),
(10, 6, '/placeholder.svg?height=300&width=400', 'KTM 890 Adventure Front View', 1, 1),
(11, 7, '/placeholder.svg?height=300&width=400', 'KTM 890 Adventure R Front View', 1, 1),
(12, 8, '/placeholder.svg?height=300&width=400', 'KTM 1290 Super Adventure S Front View', 1, 1),
(13, 9, '/placeholder.svg?height=300&width=400', 'KTM RC 390 Front View', 1, 1),
(14, 10, '/placeholder.svg?height=300&width=400', 'KTM RC 8C Front View', 1, 1),
(15, 11, '/placeholder.svg?height=300&width=400', 'KTM 300 EXC TPI Front View', 1, 1),
(16, 12, '/placeholder.svg?height=300&width=400', 'KTM 450 EXC-F Front View', 1, 1),
(17, 13, '/placeholder.svg?height=300&width=400', 'KTM 500 EXC-F Front View', 1, 1),
(18, 14, '/placeholder.svg?height=300&width=400', 'KTM 250 SX Front View', 1, 1),
(19, 15, '/placeholder.svg?height=300&width=400', 'KTM 450 SX-F Front View', 1, 1),
(20, 16, '/placeholder.svg?height=300&width=400', 'KTM 350 SX-F Front View', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(20) DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('pending','confirmed','shipped','delivered') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `motorcycle_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `full_name`, `phone`, `address`, `created_at`) VALUES
(1, 'anes11', 'anesvitija7@gmail.com', '$2y$10$WX1mPvuaa5lOH6VR.HqcgO8cGvlHJQU1TZs1.ifu2QLIDIIW78W4.', 'Anes Vitija', '0393939', '3432432', '2025-06-10 18:40:45'),
(2, 'donjeta', 'donjeta1@gmail.com', '$2y$10$m4C.BjagGQG8ixNDgbWfguuOV31pwd/MDmSJTrH.1J0wESNf2O0wK', 'Donjeta1', '23480740723', 'wedh2eoqhdpi2e', '2025-06-10 18:43:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motorcycles`
--
ALTER TABLE `motorcycles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motorcycle_images`
--
ALTER TABLE `motorcycle_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `motorcycle_id` (`motorcycle_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `motorcycle_id` (`motorcycle_id`);

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
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `motorcycles`
--
ALTER TABLE `motorcycles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `motorcycle_images`
--
ALTER TABLE `motorcycle_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `motorcycle_images`
--
ALTER TABLE `motorcycle_images`
  ADD CONSTRAINT `motorcycle_images_ibfk_1` FOREIGN KEY (`motorcycle_id`) REFERENCES `motorcycles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`motorcycle_id`) REFERENCES `motorcycles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
