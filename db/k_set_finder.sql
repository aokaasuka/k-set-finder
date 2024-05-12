-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 02:39 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k_set_finder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(3, 'admin@mail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `drama_title` text DEFAULT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  `scene` text DEFAULT NULL,
  `location_address` text DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `street_view` text NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `drama_title`, `location_name`, `scene`, `location_address`, `latitude`, `longitude`, `street_view`, `image`) VALUES
(19, 'Twenty Five Twenty One', 'Omokdae-gil, Jeonju', 'Na Hee Do\'s house', 'Near Omokdae-gil, Jeonju, precisely at 5-19, Omokdae-gil, Wansan-gu, Jeonju-si, South Korea', '35.81317905931985', '127.15538603070912', 'https://www.google.com/maps/@35.8131275,127.1552127,3a,75y,87.37h,95.46t/data=!3m6!1e1!3m4!1sMCXexc-UACDy_BCPz6aaqg!2e0!7i13312!8i6656?entry=ttu', 'na_hee_do_house2.jpg'),
(20, 'Twenty Five Twenty One', 'Music studio at Jeonju Seohak-dong Arts Village', 'Baek Yi Jin\'s part-time workplace', '63, Seohak 3-gil, Wansan-gu, Jeonju, South Korea', '35.808340826421166', '127.15175349926324', 'https://www.google.com/maps/@35.8083115,127.151886,3a,75y,93.91h,89.57t/data=!3m8!1e1!3m6!1sAF1QipNMtLaGrvVAAipOYe93ND3zdhLgLzQxmepsdmtP!2e10!3e11!6shttps:%2F%2Flh5.googleusercontent.com%2Fp%2FAF1QipNMtLaGrvVAAipOYe93ND3zdhLgLzQxmepsdmtP%3Dw203-h100-k-no-pi-0-ya240.43422-ro0-fo100!7i6080!8i3040?entry=ttu', 'baek_yi_jin_part_time_workpalce.jpg'),
(21, 'Twenty Five Twenty One', 'Hanbyeokgul Tunnel', 'The scene when Na Hee Do and Baek Yi Jin catch their breath after running from the school guard in the second episode', '산7-3 Gyo-dong, Wansan-gu, Jeonju-si, Jeollabuk-do, South Korea', '35.81197954833575', '127.161121107201', 'https://www.google.com/maps/place/Hanbyeokgul+Tunnel/@35.8119594,127.1610828,3a,75y,291.65h,90.71t/data=!3m6!1e1!3m4!1ssZIRLPicNUwL-nO4ROM1_w!2e0!7i13312!8i6656!4m9!3m8!1s0x35702374907305e1:0x61c74d778820d829!8m2!3d35.8119577!4d127.1611144!10e5!14m1!1BCgIgARICCAI!16s%2Fg%2F11rvgfxn7p?entry=ttu#', 'hanbyeokgul_tunnel.jpg'),
(23, 'Goblin', 'Parc du Bastion de la Reine', 'Kim Shin and Eun Tak\'s first meeting after reincarnation.', '1 Côte de la Citadelle, Québec, QC G1R 3N9, Canada', '46.80963375309526', '-71.20529611633643', 'https://www.google.com/maps/@46.8096302,-71.2051474,3a,75y,358.3h,84.32t/data=!3m7!1e1!3m5!1sT7c1TbQk7nfsMWRJUb0G2A!2e0!6shttps://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=T7c1TbQk7nfsMWRJUb0G2A&cb_client=maps_sv.tactile.gps&w=203&h=100&yaw=184.62314&pitch=0&thumbfov=100!7i13312!8i6656?entry=ttu', 'parc_du_bastion_de_la_reine.jpg'),
(26, 'Extraordinary You', 'Yonsei University', 'Sipal', '50 Yonsei-ro, Seodaemun-gu, Seoul, South Korea', '37.565759307109275', '126.93852899231014', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
