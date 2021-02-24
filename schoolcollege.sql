-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Mar 08, 2014 at 04:04 PM
-- Server version: 5.0.27
-- PHP Version: 5.2.0
-- 
-- Database: `schoolcollege`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_user`
-- 

CREATE TABLE `tbl_user` (
  `user_id` int(5) NOT NULL auto_increment,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(42) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `zip_code` varchar(4) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- 
-- Dumping data for table `tbl_user`
-- 

INSERT INTO `tbl_user` VALUES (15, 'aw', 'qw', 'somundiva@yahoo.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '425', 'co', 'BS', 'Male', '1222');
