-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014 年 11 月 04 日 06:29
-- 服务器版本: 5.1.73
-- PHP 版本: 5.5.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `me_cms`
--

-- --------------------------------------------------------

--
-- 表的结构 `jb_access`
--

CREATE TABLE IF NOT EXISTS `jb_access` (
  `access_key` varchar(36) NOT NULL COMMENT 'key',
  `access_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `access_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `access_date` datetime NOT NULL COMMENT '创建时间',
  `access_create_by` bigint(20) NOT NULL DEFAULT '0' COMMENT '创建者ID',
  `access_description` varchar(250) NOT NULL,
  PRIMARY KEY (`access_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `jb_access`
--

INSERT INTO `jb_access` (`access_key`, `access_status`, `access_id`, `access_date`, `access_create_by`, `access_description`) VALUES
('ac1f7b0ec5343a092c7f3583b44f1757', 0, 1, '2014-10-01 00:00:00', 1, '默认的access key');

-- --------------------------------------------------------

--
-- 表的结构 `jb_access_log`
--

CREATE TABLE IF NOT EXISTS `jb_access_log` (
  `a_id` bigint(20) NOT NULL,
  `al_date` date NOT NULL,
  `al_count` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `jb_post`
--

CREATE TABLE IF NOT EXISTS `jb_post` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `author_name` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content` longtext NOT NULL,
  `title` text NOT NULL,
  `excerpt` tinytext NOT NULL,
  `cover` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'draft',
  `name` varchar(200) DEFAULT NULL,
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` varchar(20) NOT NULL DEFAULT 'post',
  `comment` bigint(20) NOT NULL DEFAULT '0',
  `view` bigint(13) DEFAULT '0',
  `redirect` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_name` (`name`),
  KEY `type_status_date` (`type`,`status`,`date`,`id`),
  KEY `post_author` (`author`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=109 ;

--
-- 转存表中的数据 `jb_post`
--

INSERT INTO `jb_post` (`id`, `author`, `author_name`, `date`, `content`, `title`, `excerpt`, `cover`, `status`, `name`, `modified`, `type`, `comment`, `view`, `redirect`) VALUES
(26, 1, '建博姓李', '2014-09-27 17:59:41', '', '未命名标题', '', '', 'draft', '4e732ced3463d06de0ca9a15b6153677', '2014-09-27 17:59:41', 'post', 0, 0, NULL),
(27, 1, '建博姓李', '2014-09-27 18:07:58', '', '未命名标题', '', '', 'draft', '02e74f10e0327ad868d138f2b4fdd6f0', '2014-09-27 18:07:58', 'post', 0, 0, NULL),
(28, 1, '建博姓李', '2014-09-27 18:08:10', '', '未命名标题', '', '', 'draft', '33e75ff09dd601bbe69f351039152189', '2014-09-27 18:08:10', 'post', 0, 0, NULL),
(29, 1, '建博姓李', '2014-09-27 18:08:32', '', '未命名标题', '', '', 'draft', '6ea9ab1baa0efb9e19094440c317e21b', '2014-09-27 18:08:32', 'post', 0, 0, NULL),
(30, 1, '建博姓李', '2014-09-27 18:18:15', '', '未命名标题', '', '', 'draft', '34173cb38f07f89ddbebc2ac9128303f', '2014-09-27 18:18:15', 'post', 0, 0, NULL),
(7, 1, '建博姓李', '2014-09-27 17:20:47', '', '标题1', '', '', 'draft', '', '2014-09-27 17:20:47', 'post', 0, 0, NULL),
(8, 1, '建博姓李', '2014-09-27 17:20:48', '', '标题1', '', '', 'draft', '', '2014-09-27 17:20:48', 'post', 0, 0, NULL),
(9, 1, '建博姓李', '2014-09-27 17:20:49', '', '标题1', '', '', 'draft', '', '2014-09-27 17:20:49', 'post', 0, 0, NULL),
(13, 1, '建博姓李', '2014-09-27 17:29:27', '', '未命名标题', '', '', 'draft', '', '2014-09-27 17:29:27', 'post', 0, 24, NULL),
(14, 1, '建博姓李', '2014-09-27 17:31:08', '', '未命名标题', '', '', 'draft', '', '2014-09-27 17:31:08', 'post', 0, 47, NULL),
(15, 1, '建博姓李', '2014-09-27 17:36:42', '', '未命名标题', '', '', 'draft', '9bf31c7ff062936a96d3c8bd1f8f2ff3', '2014-09-27 17:36:42', 'post', 0, 0, NULL),
(16, 1, '建博姓李', '2014-09-27 17:36:43', '', '未命名标题', '', '', 'draft', 'c74d97b01eae257e44aa9d5bade97baf', '2014-09-27 17:36:43', 'post', 0, 0, NULL),
(17, 1, '建博姓李', '2014-09-27 17:36:44', '', '未命名标题', '', '', 'draft', '70efdf2ec9b086079795c442636b55fb', '2014-09-27 17:36:44', 'post', 0, 0, NULL),
(18, 1, '建博姓李', '2014-09-27 17:39:40', '', '未命名标题', '', '', 'draft', '6f4922f45568161a8cdf4ad2299f6d23', '2014-09-27 17:39:40', 'post', 0, 0, NULL),
(19, 1, '建博姓李', '2014-09-27 17:39:42', '', '未命名标题', '', '', 'draft', '1f0e3dad99908345f7439f8ffabdffc4', '2014-09-27 17:39:42', 'post', 0, 6, NULL),
(20, 1, '建博姓李', '2014-09-27 17:39:43', '', '未命名标题', '', '', 'draft', '98f13708210194c475687be6106a3b84', '2014-09-27 17:39:43', 'post', 0, 0, NULL),
(21, 1, '建博姓李', '2014-09-27 17:39:50', '', '未命名标题', '', '', 'draft', '3c59dc048e8850243be8079a5c74d079', '2014-09-27 17:39:50', 'post', 0, 0, NULL),
(22, 1, '建博姓李', '2014-09-27 17:40:01', '', '未命名标题', '', '', 'draft', 'b6d767d2f8ed5d21a44b0e5886680cb9', '2014-09-27 17:40:01', 'post', 0, 0, NULL),
(23, 1, '建博姓李', '2014-09-27 17:40:32', '', '未命名标题', '', '', 'draft', '37693cfc748049e45d87b8c7d8b9aacd', '2014-09-27 17:40:32', 'post', 0, 0, NULL),
(24, 1, '建博姓李', '2014-09-27 17:41:39', '', '未命名标题', '', '', 'draft', '1ff1de774005f8da13f42943881c655f', '2014-09-27 17:41:39', 'post', 0, 0, NULL),
(25, 1, '建博姓李', '2014-09-27 17:43:13', '', '未命名标题', '', '', 'draft', '8e296a067a37563370ded05f5a3bf3ec', '2014-09-27 17:43:13', 'post', 0, 0, NULL),
(31, 0, '', '0000-00-00 00:00:00', '具体内容', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '0000-00-00 00:00:00', 'post', 0, 0, NULL),
(32, 2, '', '0000-00-00 00:00:00', '', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '0000-00-00 00:00:00', 'post', 0, 1, NULL),
(34, 0, '', '0000-00-00 00:00:00', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '34新添加一篇文章试试34', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '2014-10-07 12:29:25', 'post', 0, 0, NULL),
(35, 0, '', '0000-00-00 00:00:00', '', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '0000-00-00 00:00:00', 'post', 0, 0, NULL),
(36, 0, '', '0000-00-00 00:00:00', '', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '0000-00-00 00:00:00', 'post', 0, 0, NULL),
(37, 0, '', '0000-00-00 00:00:00', '', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '0000-00-00 00:00:00', 'post', 0, 0, NULL),
(38, 0, '', '0000-00-00 00:00:00', '', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '0000-00-00 00:00:00', 'post', 0, 0, NULL),
(39, 0, '', '0000-00-00 00:00:00', '', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '0000-00-00 00:00:00', 'post', 0, 0, NULL),
(40, 0, '', '0000-00-00 00:00:00', '', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '0000-00-00 00:00:00', 'post', 0, 0, NULL),
(41, 0, '', '0000-00-00 00:00:00', '', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '0000-00-00 00:00:00', 'post', 0, 0, NULL),
(42, 0, '', '0000-00-00 00:00:00', '', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '0000-00-00 00:00:00', 'post', 0, 0, NULL),
(43, 0, '', '0000-00-00 00:00:00', '', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '0000-00-00 00:00:00', 'post', 0, 0, NULL),
(44, 0, '', '2014-10-02 14:52:20', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试22', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '2014-10-02 14:52:20', 'post', 0, 0, NULL),
(45, 0, '', '2014-10-02 14:52:24', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试22', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '2014-10-02 14:52:24', 'post', 0, 0, NULL),
(46, 0, '', '2014-10-02 14:55:42', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试2233', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '2014-10-02 14:55:42', 'post', 0, 0, NULL),
(47, 0, '', '2014-10-02 14:55:44', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试2233', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '2014-10-02 14:55:44', 'post', 0, 0, NULL),
(48, 0, '', '2014-10-02 14:55:45', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试2233', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '2014-10-02 14:55:45', 'post', 0, 0, NULL),
(49, 0, '', '2014-10-02 14:55:47', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试2233', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '2014-10-02 14:55:47', 'post', 0, 0, NULL),
(50, 0, '', '2014-10-03 16:30:25', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '2014-10-03 16:30:25', 'post', 0, 0, NULL),
(51, 0, '', '2014-10-03 16:30:39', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试23343', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '2014-10-03 16:30:39', 'post', 0, 0, NULL),
(52, 0, '', '2014-10-06 22:19:59', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '2014-10-06 22:19:59', 'post', 0, 0, NULL),
(53, 0, '', '2014-10-06 22:20:12', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '2014-10-06 22:20:12', 'post', 0, 0, NULL),
(54, 0, '', '2014-10-06 22:20:30', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '2014-10-06 22:20:30', 'post', 0, 0, NULL),
(55, 0, '', '2014-10-06 22:20:36', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '2014-10-06 22:20:36', 'post', 0, 0, NULL),
(56, 0, '', '2014-10-06 22:21:58', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '2014-10-06 22:21:58', 'post', 0, 0, NULL),
(57, 0, '', '2014-10-06 22:22:52', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '2014-10-06 22:22:52', 'post', 0, 0, NULL),
(58, 0, '', '2014-10-06 22:22:55', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '2014-10-06 22:22:55', 'post', 0, 0, NULL),
(59, 0, '', '2014-10-06 22:23:05', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '2014-10-06 22:23:05', 'post', 0, 0, NULL),
(60, 0, '', '2014-10-06 22:23:37', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '2014-10-06 22:23:37', 'post', 0, 0, NULL),
(61, 0, '', '2014-10-06 22:23:58', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'draft', '', '2014-10-06 22:23:58', 'post', 0, 0, NULL),
(62, 0, '', '2014-10-06 22:24:44', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'publish', '', '2014-10-06 22:24:44', 'post', 0, 0, NULL),
(63, 0, '', '2014-10-06 22:24:53', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'publish', '', '2014-10-06 22:24:53', 'post', 0, 0, NULL),
(64, 0, '', '2014-10-06 22:25:12', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-06 22:25:12', 'post', 0, 0, NULL),
(65, 0, '', '2014-10-06 22:25:18', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-06 22:25:18', 'post', 0, 0, NULL),
(66, 0, '', '2014-10-06 22:36:05', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-06 22:36:05', 'post', 0, 0, NULL),
(67, 0, '', '2014-10-06 22:36:45', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-06 22:36:45', 'post', 0, 0, NULL),
(68, 0, '', '2014-10-06 22:41:37', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-06 22:41:37', 'post', 0, 0, NULL),
(69, 0, '', '2014-10-06 22:41:56', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-06 22:41:56', 'post', 0, 0, NULL),
(70, 0, '', '2014-10-06 22:42:14', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-06 22:42:14', 'post', 0, 0, NULL),
(71, 0, '', '2014-10-06 22:42:37', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-06 22:42:37', 'post', 0, 0, NULL),
(72, 0, '', '2014-10-06 22:42:50', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-06 22:42:50', 'post', 0, 0, NULL),
(73, 0, '', '2014-10-06 22:43:04', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-06 22:43:04', 'post', 0, 0, NULL),
(74, 0, '', '2014-10-06 22:43:31', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-06 22:43:31', 'post', 0, 0, NULL),
(75, 0, '', '2014-10-06 22:44:44', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-06 22:44:44', 'post', 0, 0, NULL),
(76, 0, '', '2014-10-06 22:45:18', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-06 22:45:18', 'post', 0, 0, NULL),
(77, 0, '', '2014-10-06 22:45:27', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-06 22:45:27', 'post', 0, 0, NULL),
(78, 0, '', '2014-10-06 23:09:32', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-06 23:09:32', 'post', 0, 0, NULL),
(79, 0, '', '2014-10-06 23:09:49', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-06 23:09:49', 'post', 0, 0, NULL),
(80, 0, '', '2014-10-06 23:10:08', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-06 23:10:08', 'post', 0, 0, NULL),
(81, 0, '', '2014-10-06 23:10:12', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-06 23:10:12', 'post', 0, 0, NULL),
(82, 0, '', '2014-10-06 23:10:55', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'publish', '', '2014-10-06 23:10:54', 'post', 0, 0, NULL),
(83, 0, '', '2014-10-06 23:11:49', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'delete', '', '2014-10-06 23:11:49', 'post', 0, 0, NULL),
(84, 0, '', '2014-10-06 23:12:24', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'delete', '', '2014-10-06 23:12:24', 'post', 0, 0, NULL),
(85, 0, '', '2014-10-06 23:12:29', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'publish', '', '2014-10-06 23:12:29', 'post', 0, 0, NULL),
(86, 0, '', '2014-10-06 23:12:32', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'publish', '', '2014-10-06 23:12:32', 'post', 0, 0, NULL),
(87, 0, '', '2014-10-06 23:13:48', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'delete', '', '2014-10-06 23:13:48', 'post', 0, 0, NULL),
(88, 0, '', '2014-10-06 23:14:04', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'publish', '', '2014-10-06 23:14:04', 'post', 0, 0, NULL),
(89, 0, '', '2014-10-06 23:14:28', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'publish', '', '2014-10-06 23:14:28', 'post', 0, 0, NULL),
(90, 0, '', '2014-10-06 23:14:49', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-06 23:14:49', 'post', 0, 0, NULL),
(91, 0, '', '2014-10-06 23:15:50', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'publish', '', '2014-10-06 23:15:50', 'post', 0, 0, NULL),
(92, 0, '', '2014-10-06 23:18:08', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'publish', '', '2014-10-06 23:18:08', 'post', 0, 0, NULL),
(93, 0, '', '2014-10-06 23:18:30', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-06 23:18:30', 'post', 0, 0, NULL),
(94, 0, '', '2014-10-07 00:08:33', '<p>摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化</p>', 'asdfasdf', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '', 'trash', '', '2014-10-08 02:00:02', 'post', 0, 0, NULL),
(95, 0, '', '2014-10-07 00:20:58', '摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化', '新添加一篇文章试试', '这里是摘要', '', 'delete', '', '2014-10-07 00:20:58', 'post', 0, 0, NULL),
(101, 0, '', '2014-10-08 01:39:27', '<p>摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化3</p>', '新添加一篇文章试试22', '这里是摘要2', '', 'publish', '', '2014-10-08 01:39:27', 'post', 0, 0, NULL),
(100, 0, '', '2014-10-08 01:20:24', 'hello<p><br/></p>', '又一片', '阿萨德飞', '', 'publish', '', '2014-10-08 01:20:24', 'post', 0, 0, NULL),
(98, 1, '建博姓李', '2014-10-07 15:28:45', '未命名标题2未命名标题2未命名标题2未命名标题2未命名标题2', '未命名标题2', '好像是空的', '', 'publish', 'ed3d2c21991e3bef5e069713af9fa6ca', '2014-10-08 11:47:45', 'post', 0, 0, ''),
(99, 0, '', '2014-10-08 01:14:37', 'hello<p><br/></p>', '又一片', '阿萨德飞', '', 'publish', '', '2014-10-08 01:14:37', 'post', 0, 0, NULL),
(102, 0, '', '2014-10-08 01:39:49', '<p>摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化22</p>', '新添加一篇文章试试2', '这里是摘要22', '', 'publish', '', '2014-10-08 01:39:49', 'post', 0, 0, NULL),
(103, 0, '', '2014-10-08 01:40:12', '<p>摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化2223</p>', '新添加一篇文章试试23333', '这里是摘要22', '', 'publish', '', '2014-10-08 01:40:12', 'post', 0, 0, NULL),
(104, 0, '', '2014-10-08 01:40:16', '<p>摘要是为了能更好的呈现内容。会用在很多地方，并能够提高用户体验和搜索引擎优化2223asdfafasdfadf</p>', 'asdfasfd', '这里是摘要', 'attachment/2014/10/08/54342d15a1fad.png', 'trash', '', '2014-10-08 02:12:38', 'post', 0, 0, 'asdf'),
(105, 0, '', '2014-10-08 14:53:51', '3个分类<p><br/></p>', '新闻，产品，学生故事', '3个分类\r\n\r\n', '', 'trash', '', '2014-10-08 14:53:51', 'post', 0, 0, ''),
(106, 0, '', '2014-10-08 16:14:24', '联系方式<p><br/></p>', '联系我们', '联系方式\r\n\r\n', '', 'publish', NULL, '2014-10-08 16:14:24', 'post', 0, 0, ''),
(107, 0, '', '2014-10-08 16:16:13', '<p>联系方式</p><p><br/></p>', '联系我们2', '联系方式\r\n2\r\n23', './attachment/2014/10/08/543531a3ce1d4.png', 'publish', NULL, '2014-10-08 20:44:22', 'post', 0, 0, 'http://baidu.com'),
(108, 0, '', '2014-10-08 17:28:34', '<p><img src="http://cms.me.com/attachment/2014/10/08/543507f157546.jpg" _src="http://cms.me.com/attachment/2014/10/08/543507f157546.jpg" height="339" width="506"/>要添加TAG支持<br/></p>', 'TAG支持', '要添加TAG支持', './attachment/2014/10/08/5435082ae38c5.png', 'trash', NULL, '2014-10-08 17:47:24', 'post', 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `jb_post_term`
--

CREATE TABLE IF NOT EXISTS `jb_post_term` (
  `post_id` bigint(20) NOT NULL,
  `term_id` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jb_post_term`
--

INSERT INTO `jb_post_term` (`post_id`, `term_id`) VALUES
(13, 1),
(14, 1),
(12, 1),
(15, 1),
(31, 2),
(32, 2),
(63, 3),
(64, 3),
(65, 3),
(66, 0),
(67, 0),
(76, 1),
(76, 2),
(77, 1),
(77, 2),
(92, 4),
(93, 1),
(93, 5),
(94, 1),
(94, 5),
(33, 0),
(33, 5),
(34, 0),
(34, 0),
(98, 5),
(104, 1),
(105, 1),
(105, 2),
(105, 4),
(107, 3),
(107, 5),
(107, 2),
(108, 6),
(108, 1);

-- --------------------------------------------------------

--
-- 表的结构 `jb_term`
--

CREATE TABLE IF NOT EXISTS `jb_term` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `cover` varchar(500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `parent` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `jb_term`
--

INSERT INTO `jb_term` (`id`, `name`, `slug`, `description`, `cover`, `status`, `parent`) VALUES
(1, '新闻', 'news', '', '', 1, 0),
(2, '产品', 'product', '', '', 1, 0),
(4, '学生故事', 'story', '', '', 1, 2),
(5, '关于', 'about', '', '', 1, 2),
(6, '产品', 'product2', '这里放的是产品描述2', '1.jpg', 1, 2),
(7, '项目', 'program', '项目项目', '', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `jb_user`
--

CREATE TABLE IF NOT EXISTS `jb_user` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(64) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  `user_group` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  KEY `user_login_key` (`user_login`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `jb_user`
--

INSERT INTO `jb_user` (`user_id`, `user_login`, `user_pass`, `user_email`, `user_registered`, `user_activation_key`, `user_status`, `display_name`, `user_group`) VALUES
(1, 'jianboolee', '4e81989bcfd448e2e805585e4566efcc', 'jianboolee@gmail.com', '2013-01-01 00:00:00', '', 0, '建博姓李', 1),
(2, '', '0e50d5c053acaeb566619a74f08e5a32', 'kmdianxing@163.com', '2014-04-21 17:24:54', '', 0, '滇兴教育', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;