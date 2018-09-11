-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 �?09 �?05 �?23:52
-- 服务器版本: 5.5.53
-- PHP 版本: 5.6.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `mybbs`
--

-- --------------------------------------------------------

--
-- 表的结构 `forums`
--

CREATE TABLE IF NOT EXISTS `forums` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `forum_name` varchar(50) NOT NULL,
  `forum_description` varchar(200) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `last_post_time` datetime NOT NULL,
  `F` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `forums`
--

INSERT INTO `forums` (`id`, `forum_name`, `forum_description`, `subject`, `last_post_time`, `F`) VALUES
(1, 'C语言帖子', '这是一个介绍', 'C语言', '2018-07-29 00:25:42', 1),
(2, 'PHP帖子', '这是一个介绍', 'PHP', '2018-07-29 00:25:42', 2),
(3, 'linux', '这是一个介绍', 'liunx', '2018-07-29 00:25:42', 3);

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `log_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `email`, `log_time`) VALUES
(1, '123', '123', '123@123.com', '0000-00-00 00:00:00'),
(2, '789', '789', '789@789.com', '2018-08-30 13:34:27'),
(3, '小明', '123', '123@123.com', '2018-08-30 13:35:45');

-- --------------------------------------------------------

--
-- 表的结构 `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `id` int(11) NOT NULL,
  `author` varchar(6) NOT NULL DEFAULT '0',
  `reply_author` varchar(300) NOT NULL DEFAULT '0',
  `F` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `reply`
--

INSERT INTO `reply` (`id`, `author`, `reply_author`, `F`) VALUES
(1, '123', '0', 0);

-- --------------------------------------------------------

--
-- 表的结构 `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `last_post_time` datetime NOT NULL,
  `reply_author` varchar(50) DEFAULT NULL,
  `reply` text,
  `reply_time` datetime DEFAULT NULL,
  `F` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `topic`
--

INSERT INTO `topic` (`id`, `author`, `title`, `content`, `last_post_time`, `reply_author`, `reply`, `reply_time`, `F`) VALUES
(1, '小明', '这是一个帖子', '这是帖子的介绍的介绍   2333333', '2018-08-03 08:44:57', '123', '这是一个回复', '2018-08-12 05:57:02', 1),
(2, '小张', 'C语言的问题', '啦啦啦啦啦   ', '2018-08-03 09:34:12', NULL, NULL, NULL, 1),
(3, '小王', '我试试能不能发帖', '咳咳', '2018-08-03 09:37:44', NULL, NULL, NULL, 1),
(4, '小李', 'php问题', '这是一个PHP问题', '2018-08-03 09:43:26', '123', '这是一个回复     ', '2018-08-12 05:25:18', 2),
(5, '小强', '啦啦啦啦啦啦啦啦啦啦啦啦啦', '红红火火', '2018-08-03 09:43:47', NULL, NULL, NULL, 2),
(6, '123', '123', '        123    ', '2018-08-03 11:27:30', '123', '        123', '2018-08-12 06:56:01', 1),
(7, '222', 'C语言很很简单', '          222  ', '2018-08-03 11:31:10', NULL, NULL, NULL, 2),
(10, '123', 'C语言是世界上最好的语言', '', '2018-08-19 05:39:21', NULL, NULL, NULL, 0),
(11, '123', '红红火火红红火火C语言O(∩_∩)O~', '', '2018-08-19 05:51:33', NULL, NULL, NULL, 0),
(12, '12389', '232323', '', '2018-08-19 05:52:23', NULL, NULL, NULL, 0),
(13, '123456', '123', '', '2018-08-19 05:58:03', NULL, NULL, NULL, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
