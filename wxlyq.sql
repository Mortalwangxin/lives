-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2023-01-11 15:45:10
-- 服务器版本： 5.7.40-log
-- PHP 版本： 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `music_wxword_cn`
--

-- --------------------------------------------------------

--
-- 表的结构 `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `title` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '网站标题',
  `logo` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '网站logo',
  `icp` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '网站备案号',
  `copyright` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '网站版权',
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `keywords` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '关键词'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `config`
--

INSERT INTO `config` (`id`, `title`, `logo`, `icp`, `copyright`, `description`, `keywords`) VALUES
(1, '忘心留言箱', 'images/logo.png', '备案号', 'Copyright © 忘心博客2020-2022', '忘心留言箱', '忘心博客,忘心,忘心个人主页,源码博客,源码大全,免费源码');

-- --------------------------------------------------------

--
-- 表的结构 `fanall`
--

CREATE TABLE `fanall` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `time` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `fanall`
--

INSERT INTO `fanall` (`id`, `name`, `text`, `time`) VALUES
(1, '7654', '8765', '2023-01-10'),
(2, '测试', '测试', '2023-01-10'),
(3, 'cs', 'cs', '2023-01-10 21:53:13'),
(4, '测试', '测试', '2023-01-10 21:53:40'),
(5, '好的就到家', '哈哈哈哈', '2023-01-11 10:46:05'),
(6, '反馈', '1', '2023-01-11 12:07:25');

-- --------------------------------------------------------

--
-- 表的结构 `wx_admin`
--

CREATE TABLE `wx_admin` (
  `id` int(11) NOT NULL COMMENT '主键id',
  `adminname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '管理员用户名',
  `adminpass` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '管理员密码',
  `adminqq` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'qq'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `wx_admin`
--

INSERT INTO `wx_admin` (`id`, `adminname`, `adminpass`, `adminqq`) VALUES
(1, 'admin', '123456', '951961505');

--
-- 转储表的索引
--

--
-- 表的索引 `fanall`
--
ALTER TABLE `fanall`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `wx_admin`
--
ALTER TABLE `wx_admin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `fanall`
--
ALTER TABLE `fanall`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
