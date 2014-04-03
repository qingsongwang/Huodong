-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.24-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             8.1.0.4545
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for db_activity
CREATE DATABASE IF NOT EXISTS `db_activity` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_activity`;


-- Dumping structure for table db_activity.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `tb_admins_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员编号',
  `tb_admins_userId` int(11) NOT NULL COMMENT '用户名id',
  `tb_admins_groupId` int(11) NOT NULL COMMENT '所属组id',
  `tb_admins_createTime` time NOT NULL,
  `tb_admins_updateTime` time NOT NULL,
  PRIMARY KEY (`tb_admins_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- Data exporting was unselected.


-- Dumping structure for table db_activity.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table db_activity.users
CREATE TABLE IF NOT EXISTS `users` (
  `tb_users_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `tb_users_name` varchar(128) NOT NULL COMMENT '姓名',
  `tb_users_stuId` varchar(10) DEFAULT NULL COMMENT '学号',
  `tb_users_password` char(32) NOT NULL COMMENT '密码',
  `tb_users_sex` enum('M','F') NOT NULL COMMENT '性别',
  `tb_users_province` varchar(30) DEFAULT NULL COMMENT '省份',
  `tb_users_birthdate` date DEFAULT NULL COMMENT '出生日期',
  `tb_users_age` int(4) DEFAULT NULL COMMENT '年龄',
  `tb_users_idcard` varchar(128) DEFAULT NULL COMMENT '身份证',
  `tb_users_photoUrl` varchar(128) DEFAULT NULL COMMENT '图片地址',
  `tb_users_politicStatus` varchar(32) DEFAULT NULL COMMENT '政治面貌',
  `tb_users_telphone` varchar(32) NOT NULL COMMENT '电话',
  `tb_users_email` varchar(32) NOT NULL COMMENT '电子邮件',
  `tb_users_department` varchar(32) DEFAULT NULL COMMENT '系部',
  `tb_users_address` varchar(32) DEFAULT NULL COMMENT '邮寄地址/宿舍号',
  `tb_users_skills` varchar(32) DEFAULT NULL COMMENT '特长',
  `tb_users_signature` varchar(32) DEFAULT NULL COMMENT '个人签名',
  `tb_users_createTime` time NOT NULL COMMENT '加入时间',
  `tb_users_updateTime` time NOT NULL COMMENT '更新日期',
  `tb_users_check` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tb_users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
