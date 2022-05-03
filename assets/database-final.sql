-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2022 at 10:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magical_locations`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `location_name` varchar(50) DEFAULT NULL,
  `street_address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `short_description` tinytext DEFAULT NULL,
  `detailed_description` mediumtext DEFAULT NULL,
  `photoshoot_id` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location_name`, `street_address`, `city`, `zip_code`, `phone_number`, `short_description`, `detailed_description`, `photoshoot_id`) VALUES
(1, 'Max Patch', 'State Road 1182', 'Hot Springs', 28743, '828-689-9694', 'Beautiful mountaintop backdrop, just a short hike away from the public parking.', 'This is Max Patch, a popular, iconic, almost idyllic bald summit on the Appalachian Trail that’s beloved by hardcore AT thru-hikers, casual day hikers and frisbee-flingers alike. Rising 4629 feet, Max is a rolling, sprawling stretch of mountain meadow that offers plentiful sunshine, incredible views, and an on-top-of-the-world feeling. It’s set under expansive skies and framed in seemingly endless mountains. In a single word, it’s incredible.', 11),
(2, 'Catawba Falls', '3074 Catawba River Rd', 'Old Fort', 28762, '828-668-4831', 'Catawba Falls cascades over a rocky, blocky outcrop, spilling in multiple tiers and tendrils over the moss and plant-covered cliff.', 'The headwaters of the Catawba River are beautifully scenic. Just east of Asheville, the river tumbles through a rolling forest, cascading in a series of waterfalls and flowing over a mossy riverbed set in a shady, scenic stretch of the Pisgah National Forest. This fantastic day hike explores waterfall after waterfall in a sun-dappled valley, hiking just over two miles through a shady forest to the seeping wall of vibrant green moss and tendrils of water known as Catawba Falls.\r\nIn the early 1900s, the river’s turbulent flow was dammed by a small concrete dam and harnessed by a hydroelectric facility. The rustic remnants and ruins of the electrical plant still stand in the quiet, sun-dappled forest today, covered in moss and lichen, and slowly receding into the forest.', 3),
(3, 'Blue Ridge Parkway', '408 Blue Ridge Pkwy', 'Canton', 28716, '828-235-8228', ' Capture the beauty of the Blue Ridge Parkway\'s winding roads and lush greenery.', 'An hour drive from downtown, close to Mount Pisgah trailhead is where you will find beautiful winding roads surrounded with trees and bushes. Local overlooks will provide for multitude of backdrop settings and depending on the season, you may me surrounded by lush greenery or with fall-colored trees.', 2),
(4, 'Biltmore Estate', '1 Lodge St', 'Asheville', 28803, '800-411-3812', 'Stun your clients and models with a photo-shoot on a sprawling estate located just minutes away from downtown.', 'Biltmore Estate offers a multitude of photo-shoot location on it\'s sprawling grounds. Use the largest private-owned house as a castle backdrop or lose yourself in the gardens using all the flowers in bloom as your backdrop. You will never run out of ideas using this location for your next session.', 8);

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `photo_name` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `alt_text` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `photo_name`, `user_id`, `location_id`, `alt_text`) VALUES
(1, 'max_patch.jpg', 4, 1, 'Bald mountain backdrop with people walking down a hiking path.'),
(2, 'max_patch1.jpg', 4, 1, 'A tent set up on the bald mountaintop with a sunset in background.'),
(3, 'max_patch2.jpg', 4, 1, 'A wooden fence along the hiking path.'),
(4, 'max_patch3.jpg', 4, 1, 'Rolling mountains at a sunset with two people sitting on the grass.'),
(5, 'max_patch4.jpg', 4, 1, 'A hiking path with a wooden fence to the right.'),
(6, 'catawba.jpg', 4, 2, 'A close up of the waterfall.'),
(7, 'catawba1.jpg', 4, 2, 'Hiking gear with the waterfall in the background.'),
(8, 'catawba2.jpg', 4, 2, 'Waterfall at its calmer period.'),
(9, 'catawba3.jpg', 4, 2, 'A rock in the first plan with the waterfall in the background.'),
(10, 'blue_ridge.jpg', 4, 3, 'Fall colors surround a winding mountain road.'),
(11, 'blue_ridge1.jpg', 4, 3, 'Sun beams strike through the canopy of the trees and fall onto the winding mountain road.'),
(12, 'blue_ridge2.jpg', 4, 3, 'Coming out of a tunnel onto the foggy mountain road.'),
(13, 'blue_ridge3.jpg', 4, 3, 'Going out of one tunnel and into a second one.'),
(14, 'biltmore.jpg', 4, 4, 'A view of Biltmore Estate House from afar.'),
(15, 'biltmore1.jpg', 4, 4, 'Two chairs in the botanical gardens of Biltmore estate surrounded by lush greenery.'),
(16, 'biltmore2.jpg', 4, 4, 'A view of Biltmore Estate House welcome atrium.'),
(17, 'biltmore3.jpg', 4, 4, 'A view of a chandelier inside Biltmore Estate House with stairs leading to the next floor.'),
(18, 'biltmore4.jpg', 4, 4, 'A view of a sculpture outside the Biltmore Estate House.');

-- --------------------------------------------------------

--
-- Table structure for table `photoshoot_lookup`
--

CREATE TABLE `photoshoot_lookup` (
  `id` int(11) NOT NULL,
  `photoshoot_type` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photoshoot_lookup`
--

INSERT INTO `photoshoot_lookup` (`id`, `photoshoot_type`) VALUES
(1, 'Mountain Backdrop'),
(2, 'Forest Backdrop'),
(3, 'Waterfall Backdrop'),
(4, 'Urban Backdrop'),
(5, 'Flower-bush backdrop'),
(6, 'Industrial Backdrop'),
(7, 'Rustic House'),
(8, 'Modern House'),
(9, 'Colonial House'),
(10, 'Cabin'),
(11, 'Mountaintop'),
(12, 'Studio');

-- --------------------------------------------------------

--
-- Table structure for table `rating_lookup`
--

CREATE TABLE `rating_lookup` (
  `id` int(11) NOT NULL,
  `rating` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating_lookup`
--

INSERT INTO `rating_lookup` (`id`, `rating`) VALUES
(1, 'Highly Recommended'),
(2, 'Recommended'),
(3, 'Satisfactory'),
(4, 'Unsatisfactory'),
(5, 'Not Recommended');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `review_text` mediumtext DEFAULT NULL,
  `rating_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `review_text`, `rating_id`, `location_id`, `user_id`) VALUES
(1, 'Max Patch is the best backdrop around if you are looking for stunning mountaintop views.', 1, 1, 4),
(2, 'It is quite a difficult hike to the location, but it is worth once you get there, stunning waterfalls.', 2, 2, 4),
(16, ' Great Location', 1, 2, 20),
(17, ' Stunning sunset views!', 1, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_level_id` int(11) DEFAULT 3,
  `hashed_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `user_level_id`, `hashed_password`) VALUES
(4, 'aleks.admin', 'aleksandarmarjanovic@students.abtech.edu', 'Super.admin1234', 1, '$2y$10$/T9KcW14AwsFgxuwkXycyOvvENanbTgnj21.0dPvFC7wS/dXVtxYW'),
(20, 'test.member', 'member@member.com', 'member1234', 3, '$2y$10$a3wU/H0bd5kTMGm3RJfPre5xOcEq0fZHQjbaotjlG4TFZRHm397Du'),
(21, 'test.admin', 'admin@admin.com', 'admin1234', 2, '$2y$10$0t7bTcA2BnCVulz/qsco..mUlOMYE/66NvJ5NcF1DvwfdGex3x2GW');

-- --------------------------------------------------------

--
-- Table structure for table `user_level_lookup`
--

CREATE TABLE `user_level_lookup` (
  `id` int(11) NOT NULL,
  `user_level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level_lookup`
--

INSERT INTO `user_level_lookup` (`id`, `user_level`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photoshoot_id` (`photoshoot_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `photoshoot_lookup`
--
ALTER TABLE `photoshoot_lookup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_lookup`
--
ALTER TABLE `rating_lookup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_id` (`rating_id`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_level_id` (`user_level_id`);

--
-- Indexes for table `user_level_lookup`
--
ALTER TABLE `user_level_lookup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `photoshoot_lookup`
--
ALTER TABLE `photoshoot_lookup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rating_lookup`
--
ALTER TABLE `rating_lookup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_level_lookup`
--
ALTER TABLE `user_level_lookup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`photoshoot_id`) REFERENCES `photoshoot_lookup` (`id`);

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `photo_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`rating_id`) REFERENCES `rating_lookup` (`id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_level_id`) REFERENCES `user_level_lookup` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
