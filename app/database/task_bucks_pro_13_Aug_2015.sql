/*
SQLyog Community v12.12 (64 bit)
MySQL - 5.6.25-0ubuntu0.15.04.1 : Database - task_bucks_pro
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`task_bucks_pro` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `task_bucks_pro`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `admins` */

insert  into `admins`(`id`,`username`,`email`,`password`,`created`,`modified`) values (1,'admin','admin@taskbucksapp.co.in','tbp','0000-00-00 00:00:00','2015-08-11 10:48:27');

/*Table structure for table `apps_on_device` */

DROP TABLE IF EXISTS `apps_on_device`;

CREATE TABLE `apps_on_device` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `campaign_id` int(11) DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `app_name` varchar(255) DEFAULT NULL,
  `package_name` varchar(255) DEFAULT NULL,
  `data_earned` decimal(10,2) DEFAULT '0.00' COMMENT 'Total Data Used by App',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `apps_on_device` */

/*Table structure for table `campaign_track_info` */

DROP TABLE IF EXISTS `campaign_track_info`;

CREATE TABLE `campaign_track_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_id` int(11) NOT NULL,
  `t1` int(11) DEFAULT '0',
  `t2` int(11) DEFAULT '0',
  `installs` int(11) DEFAULT '0',
  `post_back` int(11) DEFAULT NULL,
  `campaign_data` decimal(10,2) DEFAULT '0.00',
  `data_earned` decimal(10,2) DEFAULT '0.00',
  `tracked_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `campaign_track_info` */

/*Table structure for table `campaigns` */

DROP TABLE IF EXISTS `campaigns`;

CREATE TABLE `campaigns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 NOT NULL,
  `package_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `campaign_data` decimal(10,2) NOT NULL COMMENT 'Data Allowed for this Campaign Only',
  `total_data` decimal(10,2) NOT NULL COMMENT 'Total Data Allowed to User',
  `daily_data_limit` decimal(10,2) NOT NULL COMMENT 'Data Limit for this Campaign per Day',
  `campaign_priority` int(11) DEFAULT NULL,
  `os_start_version` decimal(10,2) DEFAULT NULL,
  `os_end_version` decimal(10,2) DEFAULT NULL,
  `app_download_link` varchar(255) CHARACTER SET latin1 NOT NULL,
  `app_logo_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `type` tinyint(1) DEFAULT '0' COMMENT '''0''=>''Regular'',''1''=>''For New Users''',
  `status` int(1) DEFAULT '0' COMMENT '''0''=>''Inactive'',''1''=>''Active'',''2''=>''Pause''',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  CONSTRAINT `campaigns_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `campaigns` */

insert  into `campaigns`(`id`,`client_id`,`title`,`package_name`,`campaign_data`,`total_data`,`daily_data_limit`,`campaign_priority`,`os_start_version`,`os_end_version`,`app_download_link`,`app_logo_name`,`start_date`,`end_date`,`type`,`status`,`created`,`modified`) values (1,1,'Snapdeal','com.snapdeal.com.org','0.00','500.00','100.00',1,'4.10','5.00','http://play.google.com/snapdeal','snaplogo','2015-08-10','2015-08-10',0,NULL,'2015-08-10 13:46:01','2015-08-10 13:46:01'),(2,1,'Flipkart-22MB','abcd.com','0.00','100.00','20.00',2,'4.10','5.00','asdklj',NULL,NULL,NULL,0,0,'2015-08-12 14:52:40','2015-08-12 14:52:40');

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `clients` */

insert  into `clients`(`id`,`client_name`) values (1,'Flipkart');

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mobile_no` varchar(20) DEFAULT NULL,
  `email_id` varchar(128) DEFAULT NULL,
  `android_id` varchar(255) DEFAULT NULL,
  `device_id` varchar(255) DEFAULT NULL,
  `google_ad_id` varchar(255) DEFAULT NULL,
  `my_earning` decimal(10,2) DEFAULT NULL,
  `referral_code` varchar(10) DEFAULT NULL,
  `referrer` varchar(10) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '''0''=>''Inactive'',''1''=>''Active''',
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `customers` */

/*Table structure for table `data_balance` */

DROP TABLE IF EXISTS `data_balance`;

CREATE TABLE `data_balance` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) NOT NULL,
  `data_earned` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Total Data Earned',
  `data_redemeed` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Total Data Used',
  `balance_data` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Total Data Remaining',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `data_balance` */

/*Table structure for table `earning_history` */

DROP TABLE IF EXISTS `earning_history`;

CREATE TABLE `earning_history` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) NOT NULL,
  `app_on_device_id` bigint(20) DEFAULT NULL,
  `data_earned` decimal(10,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `earning_history` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
