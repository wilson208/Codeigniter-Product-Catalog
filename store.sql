-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2014 at 10:05 AM
-- Server version: 5.5.25
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `seo_url` varchar(40) NOT NULL,
  `blog` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `seo_url`, `blog`, `status`, `user_id`, `date_created`) VALUES
(1, 'Blog Post #1', 'blog1', '<h2>This is a blog post</h2>\r\n<p>Lorem Ipsum Dolar Sit Amet</p>', 1, 1, '2014-02-22 23:10:26'),
(2, 'Blog Post #2', 'blog2', '<h2>This is a blog post</h2>\r\n<p>Lorem Ipsum Dolar Sit Amet</p>', 1, 1, '2014-02-22 23:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
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
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `image`, `order`) VALUES
(1, 'This is image 1', 'image2.jpg', 2),
(2, 'This is image 2', 'image7.jpg', 4),
(3, 'This is image bla', 'testimonial1.jpg', 4),
(4, 'This is image 4', 'image4.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

DROP TABLE IF EXISTS `manufacturer`;
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

DROP TABLE IF EXISTS `page`;
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
(1, 'About Us', 'Who We Are', 0, '<p>This is the about us page</p>\n<p>This is extracontent</p>\n<p>This is extra extra content</p>\n<h1>Hello world!!!!</h1>', 'p{\ncolor:red;\n}', 'about_us'),
(2, 'Terms & Conditions', 'Terms', 0, '<p>This is our terms and conditions information</p>', '', 'terms');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(25) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `category` int(11) NOT NULL,
  `manufacturer` int(11) NOT NULL,
  `quantity` mediumint(9) NOT NULL DEFAULT '0',
  `image` varchar(40) DEFAULT NULL,
  `price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `sku`, `name`, `description`, `category`, `manufacturer`, `quantity`, `image`, `price`, `status`, `views`) VALUES
(2, 'ABC123', 'Product 1', '<p>This is the description</p>', 1, 1, 4, '1.jpg', 4.50, 0, 0),
(3, 'BCD234', 'Product 2', '<p>This is the description of the product</p>', 1, 1, 7, '1.jpg', 4.50, 1, 0),
(4, 'QWE321', 'This is my Product', '<p>This is the description</p>', 1, 1, 2, '1.jpg', 64.99, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
CREATE TABLE `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `url`, `order`, `description`) VALUES
(1, 3, '5.jpg', 0, 'This is the description'),
(2, 3, '7.jpg', 1, 'This is a description'),
(5, 4, '', 0, ''),
(6, 4, '', 0, ''),
(7, 4, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `product_special`
--

DROP TABLE IF EXISTS `product_special`;
CREATE TABLE `product_special` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `date_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_stop` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
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

DROP TABLE IF EXISTS `user`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `title`, `forename`, `surname`, `email`, `phone`, `password`, `newsletter`, `address1`, `address2`, `town`, `postcode`, `county`, `country`, `date_created`, `admin`) VALUES
(1, 'Mr', 'Wilson', 'McCoubrey', 'wilson@mccoubreys.co.uk', '07835441951', '29ef2918ac300330ddbe99af502d85e9dcf3c478d50f9ee06514d8164ea5e026', 0, '44 Magherahamlet Road', 'Test2', 'Ballynahinch', 'BT24 8PZ', 'Down', 'UK', '2014-02-22 18:31:28', 1),
(2, 'Mr', 'Wilson', 'McCoubrey', 'wilson@w-mccoubrey.co.uk', '442897564482', '29ef2918ac300330ddbe99af502d85e9dcf3c478d50f9ee06514d8164ea5e026', 0, '44 Magherahamlet Road', 'Belfast Road', 'ballynahinch', 'BT24 8PZ', 'DOWN', '', '2014-03-07 11:10:36', 0);
