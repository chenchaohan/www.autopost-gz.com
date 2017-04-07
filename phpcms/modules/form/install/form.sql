-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 09 月 22 日 09:20
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `isle`
--

-- --------------------------------------------------------

--
-- 表的结构 `led_caigou`
--

CREATE TABLE IF NOT EXISTS `led_caigou` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '单位名称',
  `address` varchar(50) NOT NULL COMMENT '单位地址',
  `agency` varchar(10) NOT NULL COMMENT '机构分类',
  `industry` varchar(50) NOT NULL COMMENT '主要行业',
  `show_ad` varchar(50) NOT NULL COMMENT '关注展会_广告',
  `show_led` varchar(50) NOT NULL COMMENT '关注展会_LED',
  `item` varchar(200) NOT NULL COMMENT '主营项目',
  `leader` varchar(10) NOT NULL COMMENT '负责人',
  `sex` varchar(6) NOT NULL COMMENT '性别',
  `duty` varchar(20) NOT NULL COMMENT '职务',
  `phone` varchar(14) NOT NULL COMMENT '移动电话',
  `email` varchar(30) NOT NULL COMMENT '邮箱',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
