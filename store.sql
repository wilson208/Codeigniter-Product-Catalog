-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2014 at 09:03 PM
-- Server version: 5.5.25
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `blog` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `blog`, `status`, `user_id`, `date_created`) VALUES
(1, 'Blog Post #1', '<h2>This is a blog post</h2>\r\n<p>Lorem Ipsum Dolar Sit Amet</p>', 1, 1, '2014-02-22 23:10:26'),
(2, 'Blog Post #2', '<h2>This is a blog post</h2>\r\n<p>Lorem Ipsum Dolar Sit Amet</p>', 1, 1, '2014-02-22 23:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `order`) VALUES
(1, 'Washing Machine', 0, 0),
(2, 'Tumble Dryer', 0, 0),
(3, 'Television', 0, 0),
(4, 'Laptop', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `logo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`, `phone`, `email`, `logo`) VALUES
(1, 'Beko', '028 9756 4482', 'beko@service.com', 'manufacturer/1.png'),
(2, 'Zanussi', '028 9756 1234', 'zanussi@service.com', 'manufacturer/2.png');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(50) NOT NULL,
  `menu_title` varchar(25) NOT NULL,
  `show_in_menu` tinyint(1) NOT NULL,
  `content` text NOT NULL,
  `css` text NOT NULL,
  `url` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `page_title`, `menu_title`, `show_in_menu`, `content`, `css`, `url`) VALUES
(1, 'About Us', 'Who We Are', 1, '<p>This is the about us page</p>', 'p{\r\ncolor:red;\r\n}', 'about_us'),
(2, 'Terms & Conditions', 'Terms', 0, '<p>This is our terms and conditions information</p>', '', 'terms');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(25) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `quantity` mediumint(9) NOT NULL DEFAULT '0',
  `image` varchar(40) DEFAULT NULL,
  `price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `sku`, `name`, `description`, `quantity`, `image`, `price`, `status`, `views`) VALUES
(2, 'ABC123', 'Product 1', 'This is the description', 5, 'product/tv/image.png', 4.50, 1, 0),
(3, 'BCD234', 'Product 2', 'This is the description', 5, 'product/tv/image2.png', 4.50, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  PRIMARY KEY (`setting`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting`, `value`) VALUES
('logo', 'the-log'),
('title', 'Ti');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(5) NOT NULL,
  `forename` varchar(15) NOT NULL,
  `surname` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `password` varchar(64) NOT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT '1',
  `address1` varchar(40) NOT NULL,
  `address2` varchar(40) DEFAULT NULL,
  `town` varchar(40) NOT NULL,
  `postcode` varchar(8) DEFAULT NULL,
  `county` varchar(40) NOT NULL,
  `country` varchar(40) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `title`, `forename`, `surname`, `email`, `phone`, `password`, `newsletter`, `address1`, `address2`, `town`, `postcode`, `county`, `country`, `date_created`, `admin`) VALUES
(1, 'Mr', 'Wilson', 'McCoubrey', 'wilson@mccoubreys.co.uk', '07835441951', '29ef2918ac300330ddbe99af502d85e9dcf3c478d50f9ee06514d8164ea5e026', 1, '44 Magherahamlet Road', NULL, 'Ballynahinch', 'BT24 8PZ', 'Down', 'UK', '2014-02-22 18:31:28', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;