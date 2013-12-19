-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2013 at 05:44 AM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `wingsthi_p4_wingsthings_biz`
--

-- --------------------------------------------------------

--
-- Table structure for table `postcard`
--

CREATE TABLE `postcard` (
  `postcard_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image_name` varchar(50) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `recipient` varchar(50) NOT NULL,
  `message` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` int(11) NOT NULL,
  PRIMARY KEY (`postcard_id`),
  KEY `user_id` (`user_id`,`contact_id`),
  KEY `contact_id` (`contact_id`),
  KEY `contact_id_2` (`contact_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `postcard`
--

INSERT INTO `postcard` (`postcard_id`, `user_id`, `image_name`, `contact_id`, `created`, `modified`, `recipient`, `message`, `name`, `address`, `city`, `state`, `zip`) VALUES
(24, 6, 'BcCmx0zT9y.jpg', 0, 1387412312, 1387412312, '', '', '', '0', '0', '0', 0),
(25, 6, 'e57oXEVPea.JPG', 0, 1387420724, 1387420724, '', '', '', '0', '0', '0', 0),
(26, 6, 'rDXhYxVAgb.jpg', 0, 1387420861, 1387420861, '', '', '', '0', '0', '0', 0),
(27, 6, 'f73k0Epwfj.JPG', 0, 1387420892, 1387420892, '', '', '', '0', '0', '0', 0),
(28, 6, 'rRdo6wWiUi.JPG', 0, 1387421975, 1387421975, '', '', '', '0', '0', '0', 0),
(29, 6, 'P5TqKSuihx.JPG', 0, 1387422019, 1387422019, '', '', '', '0', '0', '0', 0),
(30, 6, 'rRdo6wWiUi.JPG', 0, 1387427045, 1387427045, 'Derek Thurston', 'Being a great programmer!', '', '6314 John Charles Landing', 'Centreville', 'Vi', 20121),
(31, 6, 'P5TqKSuihx.JPG', 0, 1387427296, 1387427296, 'Derek Thurston', 'Being a great programmer!', '', '6314 John Charles Landing', 'Centreville', 'Vi', 20121),
(32, 6, 'P5TqKSuihx.JPG', 0, 1387427485, 1387427485, 'Johnny Depp', 'Capt Jack sharing his port', '', '555 Happy Way', 'Key West', 'FL', 33040),
(33, 6, 'rRdo6wWiUi.JPG', 0, 1387427585, 1387427585, 'Fred Flinstone', 'I caught you staring', '', '555 Happy Way', 'Key West', 'FL', 33040),
(34, 6, 'P5TqKSuihx.JPG', 0, 1387427638, 1387427638, 'Johnny Depp', 'drinking', '', '666 Happy Day Way', 'Key West', 'FL', 33040),
(35, 6, 'CwtnSHMwMt.JPG', 0, 1387427798, 1387427798, '', '', '', '', '', '', 0),
(36, 6, 'lw0UE89osf.JPG', 0, 1387427910, 1387427910, '', '', '', '', '', '', 0),
(37, 6, 'lw0UE89osf.JPG', 0, 1387427946, 1387427946, 'Derek Thurston', 'Drinking in the cabana', '', '6314 John Charles Landing', 'Centreville', 'Vi', 20121);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `created`, `modified`, `token`, `password`, `last_login`, `timezone`, `first_name`, `last_name`, `email`, `image`) VALUES
(5, 1387396223, 1387396223, 'f7271c9d98e92cedf24d729b4b049a57782ba496', 'fd76444df32f2f9d78c280d08d5b1c47b9b762db', 0, '', 'Derek', 'Thurston', 'thegrit@gmail.com', ''),
(6, 1387412284, 1387412284, 'b92229ecf171a070587a276a50ab5d199726e425', 'fd76444df32f2f9d78c280d08d5b1c47b9b762db', 0, '', 'Erin', 'Thurston', 'erin@sikesscience.com', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `postcard`
--
ALTER TABLE `postcard`
  ADD CONSTRAINT `postcard_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `users_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
