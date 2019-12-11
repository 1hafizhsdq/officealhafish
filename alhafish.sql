-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 03:55 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alhafish`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_NIP` varchar(14) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `user_dateofbirth` date NOT NULL,
  `user_address` varchar(128) NOT NULL,
  `user_telp` char(14) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_photos` varchar(128) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_activated` int(1) NOT NULL COMMENT '0=belum aktif,1=aktif,2=non aktif',
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_NIP`, `user_name`, `user_dateofbirth`, `user_address`, `user_telp`, `user_email`, `user_photos`, `user_password`, `role_id`, `user_activated`, `date_created`) VALUES
(1, '151611513047', 'Muhammad Hafizh Assidiq', '1998-09-12', 'Kahuripan Nirwana AA6/No.6 Sidoarjo', '081938884890', 'Hafizhasidiq48@gmail.com', '151611513047.jpg', '$2y$10$6Bf9bwA3CoJrz/d/WFPMZex9lzlZbFrJC/3Ay9ia1.0D1wM1ft21C', 1, 1, 1569553345),
(3, '', 'Shodikin', '1969-03-21', 'Kahuripan Nirwana AA6/No.6 Sidoarjo', '081233530434', 'Ach.shodikin@gmail.com', 'default.jpg', '$2y$10$W936Dv6t43dwQUOU13ozgea6tkfStaGsERSui3smZV8t4BYv9BVG2', 2, 1, 1569754450);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id_user_menu` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id_user_menu`, `menu`) VALUES
(1, 'Administrator'),
(2, 'Manajemen'),
(3, 'Layanan');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `role_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`role_id`, `role`) VALUES
(1, 'admin'),
(2, 'top management'),
(3, 'nurse');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_user_submenu` int(11) NOT NULL,
  `user_menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_activated` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_user_submenu`, `user_menu_id`, `title`, `url`, `icon`, `is_activated`) VALUES
(1, 1, 'Dashboard', '', 'fa fa-dashboard', 0),
(2, 1, 'Manajemen Menu', '', 'fa fa-cube', 1),
(3, 2, 'Surat Menyurat', '', 'fa fa-envelope-o', 1),
(4, 2, 'Keuangan', '', 'fa fa-money', 1),
(68, 1, 'Baru2', '', 'fa fa-mouse-pointer', 1),
(69, 2, 'test30', '', 'fa fa-mouse-pointer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu2`
--

CREATE TABLE `user_sub_menu2` (
  `id_user_submenu2` int(11) NOT NULL,
  `id_user_submenu` int(11) NOT NULL,
  `title2` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `is_activated` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu2`
--

INSERT INTO `user_sub_menu2` (`id_user_submenu2`, `id_user_submenu`, `title2`, `url`, `is_activated`) VALUES
(1, 2, 'Menu', '../Menu/index', 1),
(2, 2, 'Sub Menu', '../Menu/indexsub', 1),
(3, 3, 'Surat Masuk', '', 1),
(4, 3, 'Surat Keluar', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_user_menu`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_user_submenu`),
  ADD KEY `user_menu_id` (`user_menu_id`);

--
-- Indexes for table `user_sub_menu2`
--
ALTER TABLE `user_sub_menu2`
  ADD PRIMARY KEY (`id_user_submenu2`),
  ADD KEY `id_user_submenu` (`id_user_submenu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_user_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_user_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user_sub_menu2`
--
ALTER TABLE `user_sub_menu2`
  MODIFY `id_user_submenu2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`role_id`);

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id_user_menu`),
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`role_id`);

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`user_menu_id`) REFERENCES `user_menu` (`id_user_menu`);

--
-- Constraints for table `user_sub_menu2`
--
ALTER TABLE `user_sub_menu2`
  ADD CONSTRAINT `user_sub_menu2_ibfk_1` FOREIGN KEY (`id_user_submenu`) REFERENCES `user_sub_menu` (`id_user_submenu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
