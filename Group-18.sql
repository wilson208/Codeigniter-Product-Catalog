-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2014 at 10:23 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `blog`, `status`, `user_id`, `date_created`) VALUES
(1, 'Lorem Ipsum Dolor Sit Amet', '<h2><span style="font-family: Arial, Helvetica, sans; font-size: 11px; font-weight: normal; line-height: 14px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ornare vulputate enim, sollicitudin interdum turpis imperdiet id. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam ac ante magna. Vestibulum vehicula ullamcorper odio condimentum tempor. Donec vulputate odio in nulla auctor iaculis. Ut id enim congue, congue velit vitae, accumsan dolor. In laoreet nec magna eget faucibus. Cras volutpat mi quam, a convallis quam dictum non. Proin vitae dui ut lectus semper hendrerit quis eget elit. Nam felis tellus, hendrerit eget sagittis sit amet, vestibulum quis orci. Sed condimentum, nunc quis varius elementum, nisl urna elementum magna, quis laoreet neque nisi quis risus. In tincidunt urna vel massa elementum laoreet. Sed tempor vehicula nibh, vitae volutpat tellus iaculis id. Proin a orci dolor. Phasellus ut metus eu sem posuere bibendum convallis vel odio.</span></h2>', 1, 1, '2014-02-22 23:10:26'),
(2, 'Blog Post #2', '<h2>This is a blog post</h2>\n<p>Lorem Ipsum Dolar Sit Amet</p>', 1, 0, '2014-02-22 23:10:26'),
(4, 'Info About XYZ New Line Of Products', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed tempor nibh. Donec mattis lacinia viverra. Pellentesque nec risus in elit dapibus vulputate. Aliquam viverra metus eget ullamcorper egestas. Aliquam et tortor augue. Aliquam id euismod risus. Etiam sit amet velit et nisl tempus tincidunt. Duis nec adipiscing sem, id tincidunt massa. Pellentesque eu est ut turpis accumsan blandit. Duis nec mi et lacus cursus commodo. Integer imperdiet arcu eu augue suscipit, ac egestas tortor rhoncus. Vivamus mollis lobortis malesuada.</p>', 1, 0, '2014-04-05 14:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `order`) VALUES
(3, 'Televisions', 3),
(5, 'Laptops', 1),
(6, 'Cameras', 0),
(7, 'Tablets', 2);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

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
(1, 'This is image 1', 'image1.jpg', 0),
(2, 'This is image 2', 'image2.jpg', 1),
(3, 'This is image 3', 'image3.jpg', 0),
(4, 'This is image 4', 'image4.jpg', 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`, `phone`, `email`, `logo`) VALUES
(4, 'LG', '028 1234 1234', 'info@lg.co.uk', 'lg-logo.gif'),
(5, 'Panasonic', '028 2341 2341', 'info@pana.co.uk', 'Panasonic-logo.jpg'),
(6, 'Sony', '028 3412 3412', 'info@sony.com', 'sony-logo.jpg'),
(7, 'Samsung', '029 4123 4123', 'info@samsung.com', 'Samsung-Logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'pending',
  `payment_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `status`, `payment_confirmed`, `date_created`, `date_modified`) VALUES
(6, 1, 'shipped', 1, '2014-04-05 19:50:45', '2014-04-05 19:59:09'),
(7, 1, 'confirmed', 1, '2014-04-05 19:51:16', '2014-04-05 19:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `quantity` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `price`, `quantity`) VALUES
(6, 16, 329.99, 1),
(6, 9, 399.00, 1),
(7, 12, 349.99, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `page_title`, `menu_title`, `show_in_menu`, `content`, `css`, `url`) VALUES
(1, 'About Us', 'Who We Are', 1, '<p>We are a London based company, selling a small range of consumer electrical goods for over 30 years. Our staff know our products like the back of their hand.</p>\n<p>Our customers buy from us for our competitive price and our incredible after sale service.</p>', '', 'about_us'),
(2, 'Terms & Conditions', 'Terms', 0, '<p style="margin: 10px 0px 0px; white-space: pre-wrap; color: #333333; font-family: Helvetica, Arial, ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 17.940000534057617px;">This website is operated by ''Company Name''. Throughout the site, the terms &ldquo;we&rdquo;, &ldquo;us&rdquo; and &ldquo;our&rdquo; refer to ''Company Name''. ''Company Name'' offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.</p>\n<p style="margin: 10px 0px 0px; white-space: pre-wrap; color: #333333; font-family: Helvetica, Arial, ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 17.940000534057617px;">By visiting our site and/ or purchasing something from us, you engage in our &ldquo;Service&rdquo; and agree to be bound by the following terms and conditions (&ldquo;Terms of Service&rdquo;, &ldquo;Terms&rdquo;), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.</p>\n<p style="margin: 10px 0px 0px; white-space: pre-wrap; color: #333333; font-family: Helvetica, Arial, ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 17.940000534057617px;">Please read these Terms of Service carefully before accessing or using our website. By accessing or using any part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services. If these Terms of Service are considered an offer, acceptance is expressly limited to these Terms of Service.</p>\n<p style="margin: 10px 0px 0px; white-space: pre-wrap; color: #333333; font-family: Helvetica, Arial, ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 17.940000534057617px;">Any new features or tools which are added to the current store shall also be subject to the Terms of Service. You can review the most current version of the Terms of Service at any time on this page. We reserve the right to update, change or replace any part of these Terms of Service by posting updates and/or changes to our website. It is your responsibility to check this page periodically for changes. Your continued use of or access to the website following the posting of any changes constitutes acceptance of those changes.</p>\n<p style="margin: 10px 0px 0px; white-space: pre-wrap; color: #333333; font-family: Helvetica, Arial, ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 17.940000534057617px;">Our store is hosted on Shopify Inc. They provide us with the online e-commerce platform that allows us to sell our products and services to you.</p>\n<p style="margin: 10px 0px 0px; white-space: pre-wrap; color: #333333; font-family: Helvetica, Arial, ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 17.940000534057617px;">SECTION 1 - ONLINE STORE TERMS</p>\n<p style="margin: 10px 0px 0px; white-space: pre-wrap; color: #333333; font-family: Helvetica, Arial, ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 17.940000534057617px;">By agreeing to these Terms of Service, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.</p>\n<p style="margin: 10px 0px 0px; white-space: pre-wrap; color: #333333; font-family: Helvetica, Arial, ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 17.940000534057617px;">You may not use our products for any illegal or unauthorized purpose nor may you, in the use of the Service, violate any laws in your jurisdiction (including but not limited to copyright laws).</p>\n<p style="margin: 10px 0px 0px; white-space: pre-wrap; color: #333333; font-family: Helvetica, Arial, ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 17.940000534057617px;">You must not transmit any worms or viruses or any code of a destructive nature.</p>\n<p style="margin: 10px 0px 0px; white-space: pre-wrap; color: #333333; font-family: Helvetica, Arial, ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 17.940000534057617px;">A breach or violation of any of the Terms will result in an immediate termination of your Services.</p>\n<p style="margin: 10px 0px 0px; white-space: pre-wrap; color: #333333; font-family: Helvetica, Arial, ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 17.940000534057617px;">SECTION 2 - GENERAL CONDITIONS</p>\n<p style="margin: 10px 0px 0px; white-space: pre-wrap; color: #333333; font-family: Helvetica, Arial, ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 17.940000534057617px;">We reserve the right to refuse service to anyone for any reason at any time.</p>\n<p style="margin: 10px 0px 0px; white-space: pre-wrap; color: #333333; font-family: Helvetica, Arial, ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 17.940000534057617px;">You understand that your content (not including credit card information), may be transferred unencrypted and involve (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices. Credit card information is always encrypted during transfer over networks.</p>\n<p style="margin: 10px 0px 0px; white-space: pre-wrap; color: #333333; font-family: Helvetica, Arial, ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 17.940000534057617px;">You agree not to reproduce, duplicate, copy, sell, resell or exploit any portion of the Service, use of the Service, or access to the Service or any contact on the website through which the service is provided, without express written permission by us.</p>\n<p style="margin: 10px 0px 0px; white-space: pre-wrap; color: #333333; font-family: Helvetica, Arial, ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 17.940000534057617px;">The headings used in this agreement are included for convenience only and will not limit or otherwise affect these Terms.</p>', '', 'terms'),
(3, 'Privacy Policy', '', 0, '<p><span style="color: #3e454c; font-family: Helvetica, Arial, ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 12px; line-height: 15.359999656677246px; white-space: pre-wrap;" data-measureme="1"><span class="null">This Privacy Policy governs the manner in which ''Comapny Name'' collects, uses, maintains and discloses information collected from users (each, a "User") of the <a class="_553k" style="color: #3b5998; cursor: pointer; text-decoration: none; padding: 1px 0px;" href="http://www.companyname.com/" target="_blank" rel="nofollow">www.companyname.com</a> website ("Site"). This privacy policy applies to the Site and all products and services offered by ''Comapny Name''. Personal identification information We may collect personal identification information from Users in a variety of ways, including, but not limited to, when Users visit our site, register on the site, place an order, subscribe to the newsletter, fill out a form, and in connection with other activities, services, features or resources we make available on our Site. Users may be asked for, as appropriate, name, email address, mailing address, phone number. Users may, however, visit our Site anonymously. We will collect personal identification information from Users only if they voluntarily submit such information to us. Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain Site related activities. Non-personal identification information We may collect non-personal identification information about Users whenever they interact with our Site. Non-personal identification information may include the browser name, the type of computer and technical information about Users means of connection to our Site, such as the operating system and the Internet service providers utilized and other similar information. Web browser cookies Our Site may use "cookies" to enhance User experience. User''s web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. User may choose to set their web browser to refuse cookies, or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly. How we use collected information ''Comapny Name'' may collect and use Users personal information for the following purposes: - To improve customer service Information you provide helps us respond to your customer service requests and support needs more efficiently. - To personalize user experience We may use information in the aggregate to understand how our Users as a group use the services and resources provided on our Site. - To improve our Site We may use feedback you provide to improve our products and services. - To process payments We may use the information Users provide about themselves when placing an order only to provide service to that order. We do not share this information with outside parties except to the extent necessary to provide the service. - To send periodic emails We may use the email address to send User information and updates pertaining to their order. It may also be used to respond to their inquiries, questions, and/or other requests. If User decides to opt-in to our mailing list, they will receive emails that may include company news, updates, related product or service information, etc. If at any time the User would like to unsubscribe from receiving future emails, we include detailed unsubscribe instructions at the bottom of each email. How we protect your information We adopt appropriate data collection, storage and processing practices and security measures to protect against unauthorized access, alteration, disclosure or destruction of your personal information, username, password, transaction information and data stored on our Site. Sharing your personal information We do not sell, trade, or rent Users personal identification information to others. We may share generic aggregated demographic information not linked to any personal identification information regarding visitors and users with our business partners, trusted affiliates and advertisers for the purposes outlined above.We may use third party service providers to help us operate our business and the Site or administer activities on our behalf, such as sending out newsletters or surveys. We may share your information with these third parties for those limited purposes provided that you have given us your permission. Third party websites Users may find advertising or other content on our Site that link to the sites and services of our partners, suppliers, advertisers, sponsors, licensors and other third parties. We do not control the content or links that appear on these sites and are not responsible for the practices employed by websites linked to or from our Site. In addition, these sites or services, including their content and links, may be constantly changing. These sites and services may have their own privacy policies and customer service policies. Browsing and interaction on any other website, including websites which have a link to our Site, is subject to that website''s own terms and policies. Advertising Ads appearing on our site may be delivered to Users by advertising partners, who may set cookies. These cookies allow the ad server to recognize your computer each time they send you an online advertisement to compile non personal identification information about you or others who use your computer. This information allows ad networks to, among other things, deliver targeted advertisements that they believe will be of most interest to you. This privacy policy does not cover the use of cookies by any advertisers. Changes to this privacy policy ''Comapny Name'' has the discretion to update this privacy policy at any time. When we do, we will post a notification on the main page of our Site, revise the updated date at the bottom of this page and send you an email. We encourage Users to frequently check this page for any changes to stay informed about how we are helping to protect the personal information we collect. You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications. Your acceptance of these terms By using this Site, you signify your acceptance of this policy. If you do not agree to this policy, please do not use our Site. Your continued use of the Site following the posting of changes to this policy will be deemed your acceptance of those changes. Contacting us If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us at: ''Comapny Name'' <a class="_553k" style="color: #3b5998; cursor: pointer; text-decoration: none; padding: 1px 0px;" href="http://www.companyname.com/" target="_blank" rel="nofollow">www.companyname.com</a> 123 Black Road, Atown, Acounty, Apostcode (028) 1234 1234 info@test.com This document was last updated on April 05, 2014 Privacy policy created by Generate Privacy Policy</span></span></p>\n<div class="_59go noMedia" style="color: #3e454c; font-family: Helvetica, Arial, ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 12px; line-height: 15.359999656677246px; white-space: pre-wrap;">\n<div class="clearfix MercuryExternalLink" style="zoom: 1; margin-bottom: 3px;">\n<div class="MercuryLinkRight rfloat _ohf" style="float: none; clear: both; margin-left: 4px; max-width: 100%;">\n<div class="MercuryLinkTitle"><a class="linkTitle" style="color: #333333; cursor: pointer; text-decoration: none; font-weight: bold;" href="http://www.companyname.com/" target="_blank" rel="ignore">http://www.companyname.com/</a></div>\n<div class="fsm fwn fcg" style="font-size: 12px; color: gray;">www.companyname.com</div>\n</div>\n</div>\n</div>', '', 'privacy');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `sku`, `name`, `description`, `category`, `manufacturer`, `quantity`, `image`, `price`, `status`, `views`) VALUES
(6, 'LG-42LN575V', 'LG 42 Inch Television', '<p><span style="color: #222222; font-family: arial, sans-serif; font-size: 13px; line-height: 18px;">LG Smart TV''s smart home comes with an improved design, offering greater simplicity and more room for customization. Communicate to your TV and enjoy interactive entertainment with voice mate. The TV can understand your words and respond as you wish, enabling you to conveniently control and enjoy your TV.</span></p>', 3, 4, 4, 'lg-42-1.jpg', 399.99, 1, 0),
(7, 'SNY-AB123C', 'Sony 40 Inch TV', '<p><span style="color: #666666; font-family: arial, sans-serif; font-size: 13px; line-height: 15.600000381469727px;">&nbsp;<span class="psae-at">Sony</span></span><span style="color: #666666; font-family: arial, sans-serif; font-size: 13px; line-height: 15.600000381469727px;">&nbsp;&middot;&nbsp;<span class="psae-at">LED Backlit</span></span><span style="color: #666666; font-family: arial, sans-serif; font-size: 13px; line-height: 15.600000381469727px;">&nbsp;&middot;&nbsp;<span class="psae-at">32 inch</span></span><span style="color: #666666; font-family: arial, sans-serif; font-size: 13px; line-height: 15.600000381469727px;">&nbsp;&middot;&nbsp;<span class="psae-at">High Definition</span></span><span style="color: #666666; font-family: arial, sans-serif; font-size: 13px; line-height: 15.600000381469727px;">&nbsp;&middot;&nbsp;<span class="psae-at">720p</span></span><span style="color: #666666; font-family: arial, sans-serif; font-size: 13px; line-height: 15.600000381469727px;">&nbsp;&middot;&nbsp;<span class="psae-at">1366 x 768</span></span><span style="color: #666666; font-family: arial, sans-serif; font-size: 13px; line-height: 15.600000381469727px;">&nbsp;&middot;&nbsp;<span class="psae-at">2 HDMI port</span></span><span style="color: #666666; font-family: arial, sans-serif; font-size: 13px; line-height: 15.600000381469727px;">&nbsp;&middot;&nbsp;<span class="psae-at">178&deg; viewing angle</span></span><span style="color: #666666; font-family: arial, sans-serif; font-size: 13px; line-height: 15.600000381469727px;">&nbsp;&middot;&nbsp;<span class="psae-at">CEC Enabled</span></span></p>', 3, 6, 0, 'sony-40-1.jpg', 249.99, 1, 0),
(8, 'SAM-UE4030A', 'Samsung 40 Inch LED Television', '<p><span style="color: #222222; font-family: arial, sans-serif; font-size: 13px; line-height: 18px;">Discover an exciting new world of content with a Samsung LED TV Series 6. You can enjoy a wide range of apps, catch-up TV and more thanks to Samsung''s Smart Hub. S-Recommendation even recommends content based on your viewing preferences, so you can always easily find something you''ll like. You can enjoy movies, TV programmers and more with incredible Full HD picture quality.</span></p>', 3, 7, 4, 'samsung-40.jpg', 349.99, 1, 0),
(9, 'PAN-TU2131DS', 'Panasonic 32 Inch Television', '<p><span style="color: #222222; font-family: arial, sans-serif; font-size: 13px; line-height: 18px;">The portal screen menu leads you to a wide variety of content in addition to TV, including Internet videos and photos. You have complete access to it all as soon as you turn on the TV. By linking a smartphone or tablet device to the TV, you can freely share content and achieve easy operation. Images are analyzed with a high degree of accuracy so their reproduction is faithful to the original. VIERA Connect is an Internet service for TVs based on the use of cloud servers. It brings you video-on-demand (VOD), catch-up TV, games, educational content, and lots more, through a wide range of apps.</span></p>', 3, 5, 4, 'panasonic-tv-1.jpg', 399.00, 1, 0),
(10, 'PAN-LM14WSA', 'Panasonic Lumix 14MP Camera', '<p><span style="color: #222222; font-family: arial, sans-serif; font-size: 13px; line-height: 18px;">The DMC-TZ35 incorporates 24mm ultra wide-angle 20x optical zoom LEICA DC VARIO-ELMAR lens, which is outstanding in class for its quality and versatility. Thanks to the Intelligent Resolution technology, the Intelligent 40x zoom is available with minimum deterioration of picture quality even combining the digital zoom.&nbsp;</span></p>', 6, 5, 2, 'panasonic-camera-1.jpg', 179.99, 1, 0),
(11, 'SAM-CAM1', 'Samsung Camera', '<p><span style="color: #222222; font-family: arial, sans-serif; font-size: 13px; line-height: 18px;">The Samsung WB250F, an elegantly designed SMART camera with built-in Wi-Fi connectivity and an intuitive touch user interface. The WB250F Samsung SMART camera uses a powerful 18x optical zoom to take brilliant photos that you will want to share instantly with family and friends. Using the camera''s DIRECT LINK hot key quickly enables built-in wireless functionality-letting you upload high quality photos to social networking sites and seamlessly sync your camera to other SMART devices. Plus you can easily transfer all of your memories to your computer, smartphone, or Microsoft SkyDrive with the touch of a button.</span></p>', 6, 7, 4, 'samsung-camera-1.jpg', 499.99, 1, 0),
(12, 'SNY-AC2131', 'Sony Camera', '<p><span style="color: #222222; font-family: arial, sans-serif; font-size: 13px; line-height: 18px;">The Sony Cyber-shot DSC-RX100 II Digital Camera is a compact point-and-shoot camera that features a large 20. 2 megapixel 1" Exmor R CMOS sensor to produce high resolution still imagery and full HD 1080i/p video. This sensor''s design utilizes backside-illuminated technology to improve clarity and image quality when working in dimly-lit conditions as well as increase the sensitivity to an expandable ISO 12800. Full-resolution continuous shooting up to 10 fps is possible as well as a quick autofocus speed of just 0. 13 seconds. The built-in Carl Zeiss Vario-Sonnar T 10. 4-37.</span></p>', 6, 6, 2, 'sony-camera-1.jpg', 349.99, 1, 0),
(13, 'SAM-GTAB2', 'Samsung Galaxy Tab 2 ', '<p><span style="color: #222222; font-family: arial, sans-serif; font-size: 13px; line-height: 18px;">Galaxy Tab 2 7.0 has Samsung''s own TouchWiz. That means you''ll have even more ways to customize your Tab and get to your favorite content. TouchWiz live panels gives you the live content you want right on your magazine-like home screen, including email, websites and your social networks.</span></p>', 7, 7, 4, 'samsung-gtab2.jpeg', 239.99, 1, 0),
(14, 'SAM-GTAB3', 'Samsung Galaxy Tab 3', '<p><span style="color: #222222; font-family: arial, sans-serif; font-size: 13px; line-height: 18px;">The Samsung Galaxy Tab 3 is packed with features designed to give you a chance to relax, to connect and engage with family, to keep you entertained and to offer new conveniences in everyday life. The Tab 3 makes it easy to do all your favorite activities Carrier: Wi-Fi only and Bluetooth 3.0 plus HS Display: 7-inch WSVGA TFT capacitive touchscreen with LED backlight and 1024 x 600 pixel Operating system: Android 4.1 Jellybean Camera: Front 1.3 megapixel and Rear 3.0 megapixel Features: Geo tagging, HD playback, HD recording, online image uploading (share via), photo editing; sharing capabilities: buddy photo share, share shot and Shot modes.</span></p>', 7, 7, 0, 'samsung-gtab3-1.jpg', 349.99, 1, 0),
(15, 'LG-NXS72', 'LG Google Nexus 7 (2013)', '<p><span style="color: #222222; font-family: arial, sans-serif; font-size: 13px; line-height: 18px;">Now thinner, lighter, and faster - Nexus 7 brings you the perfect mix of power and portability and features the world''s sharpest 7-inch tablet screen. The clean, simple design features a slim body, a thin bezel and a soft-touch, matte back cover. It sits comfortably in the palm of your hand while the bright, beautiful 7-inch display brings entertainment to life.</span></p>', 7, 4, 5, 'lg-nexus7-1.jpg', 209.99, 1, 0),
(16, 'SNY-TAB1', 'Sony Tablet Z', '<p><span style="color: #222222; font-family: arial, sans-serif; font-size: 13px; line-height: 18px;">Think about the sharpest, most vivid TV picture. Now imagine it on a tablet. Xperia Tablet Z delivers the kind of immersive viewing you''d normally only get with an HDTV. Created by the people behind BRAVIA TVs, Xperia Tablet Z brings Sony''s expertise to an Android tablet. The brilliant 10.1" Reality Display is powered by Mobile BRAVIA Engine 2, which enhances the clarity and richness of every image. This HD tablet boasts the fullest color display, too.</span></p>', 7, 6, 3, 'sony-tab1.jpg', 329.99, 1, 0),
(17, 'SNY-VAIO-FIT', 'Sony Vaio Fit', '<p><span style="color: #222222; font-family: arial, sans-serif; font-size: 13px; line-height: 18px;">Work, play or do a little of both with the laptop that''s flexible enough for everyone. The VAIO Fit 14E laptop is creatively designed so you get a stylish laptop featuring a full size backlit keyboard and a large touch pad designed for a comfortable computing experience while still keeping the laptop thin and light enough to carry with you. Developed by the same people you trust to engineer amazing flat-panel HDTVs, this laptop has an HD plus resolution screen that gives you exceptional picture quality with great detail making your photos and movies more enjoyable.&nbsp;</span></p>', 5, 6, 0, 'sony-vaio.jpg', 499.99, 1, 0),
(18, 'LG-XFIT-2', 'LG XFit Laptop', '<p><span style="color: #666666; font-family: arial, helvetica, sans-serif; font-size: 16px; line-height: 19.200000762939453px;">The X110 is a stylish new netbook from LG, which offers stylish portability and optional 3G wireless for internet access anywhere you might venture. It is offered in three color schemes, including pink, white, and black to best fit your wardrobe or personality. LG claims the wide keyboard on the X110 reduces errors and gives the user a more enjoyable typing experience.&nbsp;</span></p>', 5, 4, 4, 'lg-lpt-1.png', 379.99, 1, 0),
(19, 'SAM-CHRM-X123', 'Samsung Chromebook', '<p><span style="color: #222222; font-family: arial, sans-serif; font-size: 13px; line-height: 18px;">Chromebooks are fast to use, and don''t slow down over time. They have built-in security, so you''re protected against viruses and malware. They come with apps for all your everyday needs, and keep your files safely backed up on the cloud. And with free, automatic updates, your Chromebook keeps getting better and better.</span></p>', 5, 7, 6, 'samsung-chromebook-1.jpg', 289.99, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `url`, `order`, `description`) VALUES
(2, 6, 'lg-42-2.jpg', 0, 'Side View'),
(3, 8, 'samsung-40-1.jpg', 0, 'Rear Image'),
(4, 9, 'panasonic-tv2.jpg', 0, 'Panasonic TV Pic 2'),
(5, 10, 'panasonic-camera-2.png', 0, 'Camera Image 2'),
(6, 11, 'samsung-camera-2.jpg', 0, 'Rear Image'),
(7, 12, 'sont-camera-2.jpg', 0, 'Rear Image'),
(8, 14, 'samsung-gtab3-2.jpg', 0, 'Galaxy Tab 3'),
(9, 17, 'sony-vaio-2.jpg', 0, 'VAIO Pic 2'),
(10, 18, 'lg-lpt-2.gif', 0, 'LG Laptop'),
(11, 19, 'samsung-chromebook-2.jpg', 0, 'Samsun Chromebook');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `score` int(1) NOT NULL,
  `review` varchar(500) NOT NULL,
  `productId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `name`, `date`, `score`, `review`, `productId`) VALUES
(7, 'Wilson', '2014-04-05 19:51:58', 4, 'I have bought this camera and it is a fabulous camera. Really light and good battery life.', 10),
(8, 'Wilson', '2014-04-05 19:52:26', 2, 'Not entirely happy with picture quality of this camera.', 10),
(9, 'Wilson', '2014-04-05 19:53:29', 4, 'I bought this camera to use for amateur sport photography and it suits me perfectly. Easy to use and long battery life.', 12),
(10, 'Wilson', '2014-04-05 19:53:55', 1, 'Very bad picture quality and sound quality.', 6),
(11, 'Wilson', '2014-04-05 19:54:53', 5, 'I own this laptop and so does my friend. We both love this laptop.', 18),
(12, 'Wilson', '2014-04-05 19:55:58', 3, 'Very limited functionality with this chromebook. Perfect for browsing and google products but for anything else, this product is not well suited.', 19),
(13, 'Wilson', '2014-04-05 19:56:29', 3, 'Quite outdated and slow and marginally overpriced for the specifiction.', 13);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `title`, `forename`, `surname`, `email`, `phone`, `password`, `newsletter`, `address1`, `address2`, `town`, `postcode`, `county`, `country`, `date_created`, `admin`) VALUES
(1, 'Mr', 'Wilson', 'McCoubrey', 'wilson@mccoubreys.co.uk', '07835441951', '29ef2918ac300330ddbe99af502d85e9dcf3c478d50f9ee06514d8164ea5e026', 0, '44 Magherahamlet Road', 'Address 2', 'Ballynahinch', 'BT24 8PZ', 'Down', 'UK', '2014-02-22 18:31:28', 1),
(4, 'Mr', 'Mark', 'Wilson', 'mark94wilson@aol.com', '442894439036', 'fa669f95dc83ccd9400fc939a68666720033d5859860f76edcd892e95afb9cc7', 0, '7 The Village', 'Templepatrick', 'Ballyclare', 'BT39 0AA', 'Co Antrim', '', '2014-03-13 19:53:51', 1),
(5, 'Mr', 'Wilson', 'McCoubrey', 'wilson@w-mccoubrey.co.uk', '07835441951', '29ef2918ac300330ddbe99af502d85e9dcf3c478d50f9ee06514d8164ea5e026', 0, '44 Magherahamlet Road', '', 'Ballynahinch', 'BT248PZ', 'Down', '', '2014-04-05 08:55:23', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
