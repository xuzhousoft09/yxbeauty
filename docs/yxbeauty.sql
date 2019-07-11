-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2019 at 06:35 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yxbeauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', '10', 'return isset($params["project"]) &&$params["project"]->isUserInRole("admin");', 'N;'),
('admin', '12', NULL, 'N;'),
('admin', '13', 'return isset($params["project"]) &&$params["project"]->isUserInRole("admin");', 'N;'),
('admin', '14', 'return isset($params["project"]) &&$params["project"]->isUserInRole("admin");', 'N;'),
('admin', '15', 'return isset($params["project"]) &&$params["project"]->isUserInRole("admin");', 'N;'),
('admin', '2', 'return isset($params["project"]) &&$params["project"]->isUserInRole("admin");', 'N;'),
('admin', '5', 'return isset($params["project"]) &&$params["project"]->isUserInRole("admin");', 'N;'),
('admin', '7', 'return isset($params["project"]) &&$params["project"]->isUserInRole("admin");', 'N;'),
('admin', '8', 'return isset($params["project"]) &&$params["project"]->isUserInRole("admin");', 'N;'),
('admin', '9', 'return isset($params["project"]) &&$params["project"]->isUserInRole("admin");', 'N;'),
('member', '10', 'return isset($params["project"]) &&$params["project"]->isUserInRole("member");', 'N;'),
('member', '13', 'return isset($params["project"]) &&$params["project"]->isUserInRole("member");', 'N;'),
('member', '7', 'return isset($params["project"]) &&$params["project"]->isUserInRole("member");', 'N;'),
('member', '8', 'return isset($params["project"]) &&$params["project"]->isUserInRole("member");', 'N;'),
('reader', '5', 'return isset($params["project"]) &&$params["project"]->isUserInRole("admin");', 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 2, '', NULL, 'N;'),
('adminManagement', 1, 'access to the application administration functionality', NULL, 'N;'),
('createIssue', 0, 'create a new issue', NULL, 'N;'),
('createProject', 0, 'create a new project', NULL, 'N;'),
('createUser', 0, 'create a new user', NULL, 'N;'),
('deleteIssue', 0, 'delete an issue from a project', NULL, 'N;'),
('deleteProject', 0, 'delete a project', NULL, 'N;'),
('deleteUser', 0, 'remove a user from a project', NULL, 'N;'),
('member', 2, '', NULL, 'N;'),
('owner', 2, '', NULL, 'N;'),
('reader', 2, '', NULL, 'N;'),
('readIssue', 0, 'read issue information', NULL, 'N;'),
('readProject', 0, 'read project information', NULL, 'N;'),
('readUser', 0, 'read user profile information', NULL, 'N;'),
('updateIssue', 0, 'update issue information', NULL, 'N;'),
('updateProject', 0, 'up date project information', NULL, 'N;'),
('updateUser', 0, 'update a users information', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('admin', 'adminManagement'),
('member', 'createIssue'),
('owner', 'createProject'),
('owner', 'createUser'),
('member', 'deleteIssue'),
('owner', 'deleteProject'),
('owner', 'deleteUser'),
('admin', 'member'),
('owner', 'member'),
('admin', 'owner'),
('admin', 'reader'),
('member', 'reader'),
('owner', 'reader'),
('reader', 'readIssue'),
('reader', 'readProject'),
('reader', 'readUser'),
('member', 'updateIssue'),
('owner', 'updateProject'),
('owner', 'updateUser');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_issue`
--

CREATE TABLE `tbl_issue` (
  `id` int(11) NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `consumption_date` varchar(255) DEFAULT NULL,
  `description` varchar(2000) CHARACTER SET utf8 DEFAULT NULL,
  `consumption` int(255) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `requester_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_issue`
--

INSERT INTO `tbl_issue` (`id`, `name`, `consumption_date`, `description`, `consumption`, `project_id`, `type_id`, `status_id`, `owner_id`, `requester_id`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(15, 'issue belong to project1', '2019-07-05', '', 1, 1, 0, 4, 5, 1, NULL, NULL, '2019-07-04 17:42:23', 12),
(16, 'test issue belong to project1', NULL, '', 0, 1, 0, 4, 1, 1, NULL, NULL, '2018-12-09 23:01:19', 0),
(18, 'test issue belong to project1', NULL, '', 0, 1, 0, 5, 1, 1, NULL, NULL, NULL, NULL),
(19, 'test issue belong to project1', NULL, 'test', 0, 1, 0, 3, 1, 1, '2018-12-16 12:05:11', 5, '2018-12-16 12:06:08', 5),
(20, '测试交易for客户2', NULL, 'Test', 1, 2, 0, 3, 5, NULL, '2019-04-24 15:34:05', 12, '2019-07-01 17:35:17', 12),
(21, '交易', NULL, '111', 0, 1, 0, 3, 1, 1, '2019-06-26 16:26:15', 12, '2019-06-26 16:26:15', 12),
(22, '耿天天', NULL, '', 0, 1, 0, 3, 1, NULL, '2019-06-26 16:37:14', 12, '2019-06-26 16:37:14', 12),
(23, '1', NULL, '1', 0, 1, 0, 3, 5, NULL, '2019-06-27 14:41:31', 12, '2019-06-27 14:41:31', 12),
(24, '测试2', NULL, '111', 0, 1, 0, 3, 1, NULL, '2019-06-27 14:48:40', 12, '2019-06-27 14:48:40', 12),
(26, '小甜甜', NULL, '1', 0, 1, 0, 3, 7, NULL, '2019-06-27 15:06:52', 12, '2019-06-27 15:06:52', 12),
(27, '测试2', NULL, '1', 0, 1, 0, 3, 1, NULL, '2019-06-27 15:46:29', 12, '2019-06-27 15:46:29', 12),
(28, 'consumption', NULL, '111', 1, 1, 0, 3, 1, NULL, '2019-07-01 14:55:19', 12, '2019-07-01 14:55:19', 12),
(29, '1', NULL, '1', 1, 1, 0, 3, 1, NULL, '2019-07-01 15:36:56', 12, '2019-07-01 15:51:23', 12),
(30, '1', NULL, '1', 1, 1, 0, 3, 1, NULL, '2019-07-01 15:52:25', 12, '2019-07-01 16:07:58', 12),
(31, '测试2', NULL, '111', 1, 1, 0, 3, 1, NULL, '2019-07-01 16:08:24', 12, '2019-07-01 16:29:21', 12),
(32, 'test issue belong to project1', '2019-07-01', 'テスト', 1, 1, 0, 3, 1, NULL, '2019-07-01 16:30:45', 12, '2019-07-01 17:33:55', 12),
(34, '1', '2019-07-05', '11', 2, 2, 0, 3, 5, NULL, '2019-07-01 17:36:06', 12, '2019-07-09 17:01:02', 12),
(35, '1', NULL, '1', 1, 2, 0, 3, 5, NULL, '2019-07-01 17:42:53', 12, '2019-07-01 17:42:53', 12),
(36, 'test issue belong to project1', '2019-07-10', '1', 1, 2, 0, 3, 5, NULL, '2019-07-01 17:55:21', 12, '2019-07-09 17:00:29', 12),
(37, '1', NULL, '1', 1, 2, 0, 3, 5, NULL, '2019-07-01 18:05:58', 12, '2019-07-01 18:06:19', 12),
(38, '1', '2', '1', 1, 2, 0, 3, 5, NULL, '2019-07-01 18:17:19', 12, '2019-07-01 18:17:26', 12),
(44, '1', '2019-07-06', '1', 24, 3, 2, 3, 5, NULL, '2019-07-04 13:59:27', 12, '2019-07-09 16:54:43', 12),
(45, '1', '2019-07-10', '1', 1, 3, 0, 4, 5, NULL, '2019-07-04 14:00:31', 12, '2019-07-09 16:58:28', 12),
(46, '1', '2019-07-05', '', 1, 4, 0, 3, 5, NULL, '2019-07-05 16:33:40', 12, '2019-07-05 16:33:40', 12),
(47, '1', '2019-07-20', '', 24, 8, 0, 3, 8, NULL, '2019-07-05 16:35:14', 12, '2019-07-05 16:35:14', 12),
(48, '做指甲', '2019-07-01', '', 100, 9, 1, 3, 14, NULL, '2019-07-05 20:29:13', 12, '2019-07-05 20:29:13', 12),
(51, '美睫', '2019-07-05', '', 100, 11, 0, 3, 8, NULL, '2019-07-08 17:02:28', 12, '2019-07-08 17:02:28', 12),
(52, '1', '', '', 1, 12, 0, 3, 8, NULL, '2019-07-08 17:30:18', 12, '2019-07-08 17:30:18', 12),
(56, '1', '2019-07-12', '', 1, 15, 0, 3, 5, NULL, '2019-07-10 18:31:41', 12, '2019-07-10 18:31:41', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `telephone` int(255) DEFAULT NULL,
  `deposit` int(255) DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`id`, `name`, `telephone`, `deposit`, `description`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(1, '饼子脸', 11, 122, '测试', NULL, 1, '2019-07-10 18:34:09', 12),
(2, 'Test Project15', 1111, 11, '测试', '2018-12-16 13:56:34', 5, '2019-07-09 15:57:37', 12),
(3, '天天华盛顿', 0, 100, '天天华盛顿', '2019-06-27 15:42:56', 12, '2019-07-04 15:18:33', 12),
(4, 'Test Project15', 0, 10, '1', '2019-06-28 17:07:39', 12, '2019-07-09 17:02:32', 12),
(5, 'Test Project15', 0, 0, '1', '2019-06-28 17:11:20', 12, '2019-06-28 17:11:20', 12),
(6, '1', 1, 1, '1', '2019-07-01 16:43:16', 12, '2019-07-01 16:43:16', 12),
(7, '郭美美', NULL, 100, '', '2019-07-04 15:38:37', 12, '2019-07-04 15:40:19', 12),
(8, '范冰冰', NULL, 100000, '', '2019-07-04 15:41:29', 12, '2019-07-04 15:42:44', 12),
(9, '黄小明', 2147483647, 10000000, 'big star', '2019-07-05 20:26:23', 12, '2019-07-05 20:26:23', 12),
(10, '吕小强', 2147483647, 1000, '', '2019-07-05 20:30:49', 12, '2019-07-05 20:30:49', 12),
(11, '杰克逊', NULL, 1000, '', '2019-07-08 17:01:29', 12, '2019-07-08 17:01:29', 12),
(12, '1', 1, NULL, '', '2019-07-08 17:29:02', 12, '2019-07-10 16:33:48', 12),
(15, '吕天天', 1, 100, '11', '2019-07-10 18:28:07', 12, '2019-07-10 18:32:00', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_user_assignment`
--

CREATE TABLE `tbl_project_user_assignment` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project_user_assignment`
--

INSERT INTO `tbl_project_user_assignment` (`project_id`, `user_id`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(1, 1, NULL, NULL, NULL, NULL),
(1, 2, NULL, NULL, NULL, NULL),
(1, 5, NULL, NULL, NULL, NULL),
(1, 7, NULL, NULL, NULL, NULL),
(1, 8, NULL, NULL, NULL, NULL),
(1, 10, NULL, NULL, NULL, NULL),
(1, 11, NULL, NULL, NULL, NULL),
(1, 13, NULL, NULL, NULL, NULL),
(2, 5, NULL, NULL, NULL, NULL),
(2, 13, NULL, NULL, NULL, NULL),
(3, 5, NULL, NULL, NULL, NULL),
(3, 8, NULL, NULL, NULL, NULL),
(4, 5, NULL, NULL, NULL, NULL),
(4, 7, NULL, NULL, NULL, NULL),
(4, 8, NULL, NULL, NULL, NULL),
(4, 9, NULL, NULL, NULL, NULL),
(4, 13, NULL, NULL, NULL, NULL),
(8, 5, NULL, NULL, NULL, NULL),
(9, 5, NULL, NULL, NULL, NULL),
(9, 7, NULL, NULL, NULL, NULL),
(9, 8, NULL, NULL, NULL, NULL),
(9, 13, NULL, NULL, NULL, NULL),
(9, 14, NULL, NULL, NULL, NULL),
(9, 15, NULL, NULL, NULL, NULL),
(10, 5, NULL, NULL, NULL, NULL),
(10, 7, NULL, NULL, NULL, NULL),
(11, 5, NULL, NULL, NULL, NULL),
(11, 7, NULL, NULL, NULL, NULL),
(11, 8, NULL, NULL, NULL, NULL),
(11, 10, NULL, NULL, NULL, NULL),
(11, 13, NULL, NULL, NULL, NULL),
(11, 15, NULL, NULL, NULL, NULL),
(12, 8, NULL, NULL, NULL, NULL),
(15, 5, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_user_role`
--

CREATE TABLE `tbl_project_user_role` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project_user_role`
--

INSERT INTO `tbl_project_user_role` (`project_id`, `user_id`, `role`) VALUES
(10, 2, 'admin'),
(2, 5, 'admin'),
(3, 5, 'admin'),
(4, 5, 'admin'),
(8, 5, 'admin'),
(9, 5, 'admin'),
(10, 5, 'admin'),
(11, 5, 'admin'),
(15, 5, 'admin'),
(4, 7, 'admin'),
(8, 7, 'admin'),
(8, 7, 'member'),
(9, 7, 'admin'),
(10, 7, 'admin'),
(11, 7, 'admin'),
(1, 8, 'reader'),
(3, 8, 'admin'),
(4, 8, 'admin'),
(8, 8, 'admin'),
(9, 8, 'member'),
(10, 8, 'admin'),
(11, 8, 'admin'),
(12, 8, 'admin'),
(4, 9, 'admin'),
(1, 10, 'admin'),
(8, 10, 'member'),
(9, 10, 'member'),
(10, 10, 'admin'),
(11, 10, 'admin'),
(1, 11, 'owner'),
(8, 12, 'admin'),
(4, 13, 'admin'),
(8, 13, 'admin'),
(9, 13, 'member'),
(10, 13, 'admin'),
(11, 13, 'admin'),
(9, 14, 'admin'),
(10, 14, 'admin'),
(8, 15, 'admin'),
(9, 15, 'admin'),
(10, 15, 'admin'),
(11, 15, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sys_message`
--

CREATE TABLE `tbl_sys_message` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sys_message`
--

INSERT INTO `tbl_sys_message` (`id`, `message`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(1, '今天上班', '2018-12-15 18:08:43', 12, '2019-06-26 14:46:58', 12),
(2, 'test', '2018-12-16 16:35:24', 5, '2018-12-16 16:35:24', 5),
(3, 'testhttps://stackoverflow.com/questions/43902485/php-mailer-warning-trim-expects-parameter-1-to-be-string', '2018-12-16 17:32:48', 5, '2018-12-16 17:32:59', 5),
(4, 'test123', '2018-12-16 17:56:17', 5, '2018-12-16 17:56:26', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `username` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `username`, `password`, `last_login_time`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(1, 'test1@notanaddress.com', 'Test_User_One', '5a105e8b9d40e1329780d62ea2265d8a', '2018-12-16 15:32:05', NULL, NULL, '2018-12-09 23:11:14', 0),
(2, 'test2@notanaddress.com', 'Test_User_Two', 'ad0234829205b9033196ba818f7a872b', NULL, NULL, NULL, NULL, NULL),
(5, '7777@123.com', '777', 'f1c1592588411002af340cbaedd6fc33', '2019-06-27 15:59:36', '2018-12-09 14:00:33', 0, '2018-12-09 23:08:30', 0),
(7, '999@1923.com', '999', 'b706835de79a2b4e80506f582af3676a', '2018-12-17 16:00:21', '2018-12-10 10:14:50', 0, '2018-12-10 10:16:24', 0),
(8, '123@123.com', '000', 'c6f057b86584942e415435ffb1fa93d4', '2019-06-27 15:58:46', '2018-12-10 10:40:50', 0, '2018-12-10 10:40:50', 0),
(9, '123@1238.com', 'Test_for_project1', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2018-12-13 15:15:03', 1, '2018-12-13 15:15:03', 1),
(10, '123@12388888.com', '1010', '1e48c4420b7073bc11916c6c1de226bb', '2018-12-13 16:02:02', '2018-12-13 16:00:54', 1, '2018-12-13 16:00:54', 1),
(11, '7777@1288888888883.com', 'project1_owner', '628efa8405a560c875b75f35058c49ba', '2018-12-13 17:31:58', '2018-12-13 16:16:37', 1, '2018-12-13 16:16:37', 1),
(12, '123@823.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2019-07-11 14:31:33', '2018-12-14 00:17:47', 1, '2018-12-14 00:17:47', 1),
(13, '13@123.com', 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', NULL, '2019-06-27 16:10:08', 12, '2019-06-27 16:10:08', 12),
(14, '1511586916@qq.com', '小妹No1', '098f6bcd4621d373cade4e832627b4f6', NULL, '2019-07-05 20:27:47', 12, '2019-07-05 20:27:47', 12),
(15, '151158916@qq.com', '豆豆', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '2019-07-05 20:31:56', 12, '2019-07-05 20:31:56', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD PRIMARY KEY (`itemname`,`userid`);

--
-- Indexes for table `authitem`
--
ALTER TABLE `authitem`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `tbl_issue`
--
ALTER TABLE `tbl_issue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_issue_project` (`project_id`),
  ADD KEY `FK_issue_owner` (`owner_id`),
  ADD KEY `FK_issue_requester` (`requester_id`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_project_user_assignment`
--
ALTER TABLE `tbl_project_user_assignment`
  ADD PRIMARY KEY (`project_id`,`user_id`),
  ADD KEY `FK_user_project` (`user_id`);

--
-- Indexes for table `tbl_project_user_role`
--
ALTER TABLE `tbl_project_user_role`
  ADD PRIMARY KEY (`project_id`,`user_id`,`role`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `tbl_sys_message`
--
ALTER TABLE `tbl_sys_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_issue`
--
ALTER TABLE `tbl_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_sys_message`
--
ALTER TABLE `tbl_sys_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_issue`
--
ALTER TABLE `tbl_issue`
  ADD CONSTRAINT `FK_issue_owner` FOREIGN KEY (`owner_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_issue_project` FOREIGN KEY (`project_id`) REFERENCES `tbl_project` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_issue_requester` FOREIGN KEY (`requester_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_project_user_assignment`
--
ALTER TABLE `tbl_project_user_assignment`
  ADD CONSTRAINT `FK_project_user` FOREIGN KEY (`project_id`) REFERENCES `tbl_project` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_user_project` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_project_user_role`
--
ALTER TABLE `tbl_project_user_role`
  ADD CONSTRAINT `tbl_project_user_role_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `tbl_project` (`id`),
  ADD CONSTRAINT `tbl_project_user_role_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `tbl_project_user_role_ibfk_3` FOREIGN KEY (`role`) REFERENCES `authitem` (`name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
