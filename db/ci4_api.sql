/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.1.34-MariaDB : Database - ci4_api
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ci4_api` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ci4_api`;

/*Table structure for table `books` */

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `authors` text,
  `number_of_pages` int(11) DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `release_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `books` */

insert  into `books`(`id`,`name`,`isbn`,`authors`,`number_of_pages`,`publisher`,`country`,`release_date`,`created_at`,`updated_at`,`deleted_at`,`deleted`) values 
(1,'Game of Thrones','978-0553103540','George R. R. Martin',690,'Bantam Books','United States',NULL,'2020-07-24 15:05:41','2020-07-24 15:05:41',NULL,0),
(2,'My First Bookss','5768383-632','Ade Testing',537,'Acme Books Publishing','India','30th jule 2020','2020-07-24 09:55:06','2020-07-25 03:41:30',NULL,0),
(3,'A Clash of Kings','978-0553108033','George R. R. Martin',768,'Bantam Books','United States','1999-02-02','2020-07-24 10:03:09','2020-07-24 10:03:09',NULL,0),
(4,'A Storm of Swords','978-0553106633','George R. R. Martin',981,'Bantam Books','United States','2010-02-02','2020-07-24 10:07:38','2020-07-24 10:07:38',NULL,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
