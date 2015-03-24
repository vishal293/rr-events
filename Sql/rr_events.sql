-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2015 at 10:17 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rr_events`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` text NOT NULL,
  `category_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_img`) VALUES
(1, 'Entertainment', '\r\nuploads/category/entertainment131-01-15-06-44.jpg'),
(2, 'Technology', '\r\nuploads/category/technology31-01-15-06-57.jpg'),
(3, 'Business', '\r\nuploads/category/business31-01-15-06-59.jpg'),
(5, 'Parties', '\r\nuploads/category/parties31-01-15-07-01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `approved` int(10) NOT NULL,
  `user` int(10) NOT NULL,
  `plan` text NOT NULL,
  `amount` int(11) NOT NULL,
  `notif` text NOT NULL,
  `notif_date` varchar(50) NOT NULL,
  `notif_time` varchar(50) NOT NULL,
  `notif_msg` text NOT NULL,
  `event_name` text NOT NULL,
  `oneline_description` text NOT NULL,
  `event_description` varchar(255) NOT NULL,
  `event_address` varchar(50) NOT NULL,
  `event_longitude` double NOT NULL,
  `event_latitude` double NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `start_time` varchar(50) NOT NULL,
  `end_time` varchar(50) NOT NULL,
  `event_photo` varchar(150) NOT NULL,
  `photo_1` varchar(150) NOT NULL,
  `photo_2` varchar(150) NOT NULL,
  `photo_3` varchar(150) NOT NULL,
  `photo_4` varchar(150) NOT NULL,
  `organizer_name` text NOT NULL,
  `organizer_contact` varchar(20) NOT NULL,
  `organizer_website` varchar(150) NOT NULL,
  `organizer_logo` varchar(150) NOT NULL,
  `organizer_about` varchar(250) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `created` datetime DEFAULT NULL,
  `offer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `approved`, `user`, `plan`, `amount`, `notif`, `notif_date`, `notif_time`, `notif_msg`, `event_name`, `oneline_description`, `event_description`, `event_address`, `event_longitude`, `event_latitude`, `start_date`, `end_date`, `start_time`, `end_time`, `event_photo`, `photo_1`, `photo_2`, `photo_3`, `photo_4`, `organizer_name`, `organizer_contact`, `organizer_website`, `organizer_logo`, `organizer_about`, `category_name`, `created`, `offer`) VALUES
(7, 0, 1, 'diamond', 2000, 'y', '27/03/2015', '12:15 PM', '', 'Startup Weekend Nagpur', 'Ever wondered what it takes to be an entrepreneur?', 'Current event is a general Startup Weekend Edition where participants are required to pitch their raw idea which could be in any vertical/theme like Technology, Education, Health, Disability, Environment, etc. and work on building a Minimum Viable Product', 'Visvesvaraya National Institute of Technology, Nag', 79.0504771, 21.1213484, '27/03/2015', '29/03/2015', '9:00 AM', '11:00 PM', '/uploads/swnewlogo2014102817393229-01-15-06-45.jpg', '', '', '', '', 'Startup Weekend', '', 'http://startupweekend.org/', '', 'Startup Weekend is a global grassroots movement of active and empowered entrepreneurs who are learning the basics of founding startups and launching successful ventures. It is the largest community of passionate entrepreneurs with over 1,000 past eve', '54c1e53ae4b0944ca44fa1e6,54b12095e4b093ef07527a50', '2015-01-29 12:21:26', 'n'),
(9, 0, 1, 'diamond', 1956, 'y', '', '1:00 PM', '', 'test1', 'test', 'testing', 'nagpur', 79.0881546, 21.1458004, '30/01/2015', '30/01/2015', '9:30 AM', '9:30 AM', '', '', '', '', '', 'test', '123', '', '', 'text', '54c23261e4b0944ca4510fcf,54c1e53ae4b0944ca44fa1e6,54b12095e4b093ef07527a50', '2015-01-29 11:54:21', 'n'),
(12, 0, 1, 'diamond', 233, '', '', '8:00 PM', '', 'workshop on android ', 'testing', '\\zsxasc', 'nagpur', 79.0881546, 21.1458004, '29-Jan-2015', '31-Jan-2015', '8:00 PM', '8:00 PM', '/uploads/photo429-01-15-02-24.jpg', '', '', '', '', '', '', '', '', '', '54c1e53ae4b0944ca44fa1e6', '2015-01-29 19:55:33', 'n'),
(13, 0, 1, 'gold', 22, '', '', '8:00 PM', '', 'live concert', 'android development workshop', 'sadf', 'Amity University, Sector 125, Noida, Uttar Pradesh', 77.333139, 28.544587, '29-Jan-2015', '31-Jan-2015', '8:00 PM', '8:00 PM', '/uploads/photo329-01-15-02-29.jpg', '', '', '', '', 'learn flow', '', '', '', '', '54c1e53ae4b0944ca44fa1e6', '2015-01-29 19:59:20', 'n'),
(14, 0, 1, 'diamond', 22, '', '', '8:15 PM', '', '22', 'testing', 'asdsfd', 'nagpur', 79.0881546, 21.1458004, '29-Jan-2015', '31-Jan-2015', '8:15 PM', '8:15 PM', '/uploads/logo29-01-15-02-33.jpg', '', '', '', '', 'Startup Weekend', '1204659156', '', '', 'azsc', '54c1e53ae4b0944ca44fa1e6', '2015-01-29 20:03:28', 'n'),
(15, 0, 1, 'platinum', 1223, '', '', '8:15 PM', '', 'aaditya sir reception', 'musical event', 'adsf', 'Amity University, Sector 125, Noida, Uttar Pradesh', 77.333139, 28.544587, '29-Jan-2015', '31-Jan-2015', '8:15 PM', '8:15 PM', '\r\n/uploads/134140802755929-01-15-02-37.jpg', '', '', '', '', '', '', '', '', '', '54c1e53ae4b0944ca44fa1e6,54b12095e4b093ef07527a50', '2015-01-29 20:07:36', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','manager','basic_user') NOT NULL DEFAULT 'basic_user',
  `added_count` int(11) NOT NULL,
  `added_event` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `added_count`, `added_event`) VALUES
(1, 'Ashwin', 'ashusath@gmail.com', '$2a$10$sv06CrYJHt2sMexpAE6duOAXPuh2G.l5MJ3d.7AkpI8YtUniJloGC', 'admin', 0, ''),
(3, 'basic user', 'basic@basic.com', '$2a$10$hg3gtgJJ5f9jENS769o0C.M3eF8s0nUkqjvcb7o7bNmXpL5VLMZ8a', 'basic_user', 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
