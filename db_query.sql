SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;



DROP DATABASE IF EXISTS `quantox`;
CREATE DATABASE quantox;

USE quantox;


-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;