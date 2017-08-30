-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `call_data`;
CREATE TABLE `call_data` (
  `trx_id` varchar(50) NOT NULL,
  `msisdn` varchar(17) NOT NULL,
  `via` varchar(10) NOT NULL,
  `token` varchar(17) NOT NULL,
  `dial_code` int(10) NOT NULL,
  `dial_status` varchar(30) NOT NULL,
  `call_status` varchar(30) NOT NULL,
  `result` varchar(20) NOT NULL,
  `is_done` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2017-08-30 09:15:50
