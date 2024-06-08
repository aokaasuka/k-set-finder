-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 02:05 AM
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
(27, 'Goblin', 'Jumunjin Beach, Gangneung', 'The scene when Eun Tak accidentally calls Kim Shin while blowing out the candles on the beach', '8-35 Hyangho-ri, Jumunjin-eup, Gangneung-si, Gangwon-do, South Korea', '37.90929707740763', '128.82150658170912', 'https://www.google.com/maps/@37.9099931,128.8199307,3a,75y,66.53h,86t/data=!3m7!1e1!3m5!1scA9RVZYOL9SnmJzUyq1tmw!2e0!6shttps://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=cA9RVZYOL9SnmJzUyq1tmw&amp;cb_client=maps_sv.tactile.gps&amp;w=203&amp;h=100&amp;yaw=30.407286&amp;pitch=0&amp;thumbfov=100!7i13312!8i6656?coh=205409&amp;entry=ttu', 'pantai_jumunjin.jpg'),
(29, 'Goblin', 'Borinara Hagwon Farm', 'Kim Shin\'s scene after he was stabbed by a sword. It was in this place that Eun Tak first tried to remove the sword stuck in Kim Shin\'s chest.', '산119-1 Seondong-ri, Gongeum-myeon, Gochang-gun, Jeollabuk-do, South Korea', '35.37665836431707', '126.54188816634128', '', 'borinara_hagwon_fram.jpg'),
(30, 'Fight for My Way', 'Hansung Apartment Buildings', 'This is where Choi Ae Ra, Ko Dong Man, Baek Seol Hee, and Kim Joo Man live', '38 Suyeong-ro 49beonna-gil, Nam-gu, Busan, South Korea', '35.136960001984306', '129.07607106860266', 'https://www.google.com/maps/@35.1374418,129.0763443,3a,75y,153.9h,81.41t/data=!3m7!1e1!3m5!1smLCkzLEW4NWHtoBmKMHFtw!2e0!6shttps://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=mLCkzLEW4NWHtoBmKMHFtw&amp;cb_client=maps_sv.tactile.gps&amp;w=203&amp;h=100&amp;yaw=208.93045&amp;pitch=0&amp;thumbfov=100!7i13312!8i6656?coh=205409&amp;entry=ttu', 'hansung_apato.jpg'),
(31, 'Fight for My Way', 'Rooftop Beomcheong-dong ', 'This is where Choi Ae Ra, Ko Dong Man, Baek Seol Hee, and Kim Joo Man often spend time together while eating, drinking, and relaxing from everyday life.', '35.156722864369925, 129.054014821044', '35.156722864369925', '129.054014821044', 'https://www.google.com/maps/@35.1567748,129.0540342,3a,75y,277.24h,90t/data=!3m7!1e1!3m5!1skOSCGW_EtMYLLYdEH3tbxQ!2e0!6shttps://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=kOSCGW_EtMYLLYdEH3tbxQ&amp;cb_client=maps_sv.tactile.gps&amp;w=203&amp;h=100&amp;yaw=278.83142&amp;pitch=0&amp;thumbfov=100!7i13312!8i6656?coh=205409&amp;entry=ttu', 'namil_bar.jpg'),
(32, 'Fight for My Way', 'Beyond Garage ', 'The place where Ko Dong Man practices martial arts with his trainer, Hwang Jang Ho (Kim Sung Oh). This place is very important in every episode because this is where Dong Man re-knits the dreams he had buried in the last few years.', '135 Daegyo-ro, Jung-gu, Busan, South Korea', '35.1022242554955', '129.03738131961023', 'https://www.google.com/maps/@35.1021859,129.0375932,3a,75y,271.41h,94.67t/data=!3m7!1e1!3m5!1svkK8tTpZEP2CppMbxcUcKQ!2e0!6shttps://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=vkK8tTpZEP2CppMbxcUcKQ&amp;cb_client=maps_sv.tactile.gps&amp;w=203&amp;h=100&amp;yaw=276.04492&amp;pitch=0&amp;thumbfov=100!7i13312!8i6656?coh=205409&amp;entry=ttu', 'jangho.PNG'),
(33, 'Fight for My Way', 'Shinsegae Department Store Main Branch', 'Choi Ae Ra\'s workplace. He works at the information desk and helps customers find information regarding merchants', '63 Sogong-ro, Jung District, Seoul, South Korea', '37.56094220077225', '126.98113014944904', 'https://www.google.com/maps/@37.5609223,126.9811389,3a,75y,172.93h,90t/data=!3m8!1e1!3m6!1sAF1QipOf2ByfWd3B03y0DSaTuyaLeHuWxVwn5ghvk6-c!2e10!3e11!6shttps://lh5.googleusercontent.com/p/AF1QipOf2ByfWd3B03y0DSaTuyaLeHuWxVwn5ghvk6-c=w203-h100-k-no-pi-0-ya174.3865-ro-0-fo100!7i7776!8i3888?coh=205409&amp;entry=ttu', 'shinsegae_department_store.png'),
(34, 'Fight for My Way', 'Orangdae Park', 'At the beginning of episode 2, the child versions of them run around on the rocks by the beach and play roles according to their respective dreams: Ae Ra becomes an announcer, Seol Hee becomes a housewife, and Dong Man becomes a taekwondo athlete.', 'Gijang-eup, Gijang-gun, Busan, South Korea', '35.20584960138416', '129.2277252816776', 'https://www.google.com/maps/@35.2057591,129.2278071,3a,75y,262.12h,90t/data=!3m8!1e1!3m6!1sAF1QipNJYxkOZ5tNfZetPfUTkPbipVwJHBQmFUoR1MA!2e10!3e11!6shttps://lh5.googleusercontent.com/p/AF1QipNJYxkOZ5tNfZetPfUTkPbipVwJHBQmFUoR1MA=w203-h100-k-no-pi-0-ya234.4418-ro0-fo100!7i7776!8i3888?coh=205409&amp;entry=ttu', 'orangdae.png'),
(35, 'Fight for My Way', 'Luka 511', 'In episode 2, Choi Ae Ra attended the wedding reception of her friend, Park Chan Sook (Hwang Bo Ra). Suddenly the presenter couldn\'t attend. Chan Sook, who panicked, then asked Ae Ra to be a substitute host and lent her a very beautiful dress. Ae Ra also successfully hosted the party and amazed many people.', '40 Dosan-daero 81-gil, Gangnam District, Seoul, South Korea', '37.52708384144342', '127.04684100879209', 'https://www.google.com/maps/@37.5269063,127.0466988,3a,75y,256.67h,90.84t/data=!3m7!1e1!3m5!1s7Rv5j2mGNfj0df3dYRBRIg!2e0!6shttps://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=7Rv5j2mGNfj0df3dYRBRIg&amp;cb_client=maps_sv.tactile.gps&amp;w=203&amp;h=100&amp;yaw=111.987656&amp;pitch=0&amp;thumbfov=100!7i13312!8i6656?coh=205409&amp;entry=ttu', 'luka.jpg'),
(36, 'Fight for My Way', 'Seoullo 7017 Skygarden ', 'In episode 3, Moo Bin gave Ae Ra a gift of sneakers secretly, resulting in a misunderstanding. They also finished it at Seoullo 7017 Skygarden. Moo Bin also said that he likes Ae Ra.', '432 Cheongpa-ro, Jung District, Seoul, South Korea', '37.557845086606186', '126.9697804872056', 'https://www.google.com/maps/@37.5565934,126.9749755,3a,75y,117.08h,90t/data=!3m8!1e1!3m6!1sAF1QipOkHYUehp9p8tglM3XXR9ysurIIks7hPR37e-dE!2e10!3e11!6shttps://lh5.googleusercontent.com/p/AF1QipOkHYUehp9p8tglM3XXR9ysurIIks7hPR37e-dE=w203-h100-k-no-pi-0-ya159.82378-ro0-fo100!7i8000!8i4000?coh=205409&amp;entry=ttu', 'sky_garden.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
