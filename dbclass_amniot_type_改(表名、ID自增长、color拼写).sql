-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 05 月 09 日 10:44
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `iwebshop`
--

-- --------------------------------------------------------

--
-- 表的结构 `dbclass_amniot_type`
--

CREATE TABLE IF NOT EXISTS `dbclass_amniot_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description_en` varchar(200) NOT NULL COMMENT '英文描述',
  `description_ch` varchar(200) NOT NULL COMMENT '中文描述',
  `mnemonics_en` varchar(200) NOT NULL COMMENT '英文简称',
  `mnemonics_ch` varchar(200) NOT NULL COMMENT '中文简称',
  `front_color` varchar(200) NOT NULL COMMENT '前景色',
  `background_color` varchar(200) NOT NULL COMMENT '背景色',
  `is_bold` int(11) NOT NULL COMMENT '粗体',
  `order` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='羊膜类型' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `dbclass_amniot_type`
--

INSERT INTO `dbclass_amniot_type` (`id`, `description_en`, `description_ch`, `mnemonics_en`, `mnemonics_ch`, `front_color`, `background_color`, `is_bold`, `order`) VALUES
(4, 'test', '测试', 'test1', '测试1', '#000000', '#ffffff', 0, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
