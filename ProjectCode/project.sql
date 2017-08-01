/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : project

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-17 17:42:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `allowed_emails`
-- ----------------------------
DROP TABLE IF EXISTS `allowed_emails`;
CREATE TABLE `allowed_emails` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of allowed_emails
-- ----------------------------
INSERT INTO `allowed_emails` VALUES ('2', 'test@testmail.com');
INSERT INTO `allowed_emails` VALUES ('3', 'test2@testmail.com');

-- ----------------------------
-- Table structure for `animals`
-- ----------------------------
DROP TABLE IF EXISTS `animals`;
CREATE TABLE `animals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subspecies_id` int(10) unsigned NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `isFemale` tinyint(1) unsigned NOT NULL,
  `weight` double(8,4) unsigned DEFAULT NULL,
  `race` varchar(32) DEFAULT NULL,
  `age` int(10) unsigned DEFAULT NULL,
  `time_interval` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_animals_subspecies` (`subspecies_id`),
  CONSTRAINT `FK_animals_subspecies` FOREIGN KEY (`subspecies_id`) REFERENCES `species` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of animals
-- ----------------------------
INSERT INTO `animals` VALUES ('26', '1', '2017-06-19 22:31:53', 'test', '1', '2.0000', 'testrace', null, null);
INSERT INTO `animals` VALUES ('27', '1', '2017-06-26 18:15:56', 'da', '1', '3.0000', '', null, null);
INSERT INTO `animals` VALUES ('28', '1', '2017-06-26 18:16:29', 're', '1', '3.0000', '', '0', '0');
INSERT INTO `animals` VALUES ('29', '1', '2017-06-27 00:09:49', 'dasda', '1', '0.0000', '', '0', '0');
INSERT INTO `animals` VALUES ('30', '1', '2017-06-27 02:11:23', 'dasda', '1', '0.0000', '', null, null);
INSERT INTO `animals` VALUES ('31', '1', '2017-06-27 02:14:34', 'sasd', '1', '0.0000', '', '2', null);
INSERT INTO `animals` VALUES ('32', '1', '2017-06-27 02:16:24', 'Dasda', '1', '0.0000', '', '2', null);
INSERT INTO `animals` VALUES ('33', '1', '2017-06-27 02:17:55', 'sadsdas', '0', '0.0000', '', '3', '2');
INSERT INTO `animals` VALUES ('34', '1', '2017-07-03 02:01:28', 'sdasd', '1', '1.0000', '', '3', '1');
INSERT INTO `animals` VALUES ('35', '1', '2017-07-03 02:14:50', 'test5', '0', '0.0000', '', '3', '2');
INSERT INTO `animals` VALUES ('36', '1', '2017-07-03 02:15:28', 'testTHIS', '1', '0.0000', '', '2', '1');
INSERT INTO `animals` VALUES ('37', '1', '2017-07-03 02:20:11', 'thisisTHEtest', '0', '0.0000', 'race', '3', '2');
INSERT INTO `animals` VALUES ('38', '1', '2017-07-03 02:25:34', 'test', '0', '0.0000', '', '2', '1');
INSERT INTO `animals` VALUES ('39', '0', '2017-07-07 03:43:25', 'john', '0', '3.0000', '', '3', '1');
INSERT INTO `animals` VALUES ('40', '0', '2017-07-07 04:19:13', 'dasd', '0', '3.0000', '', '3', '1');
INSERT INTO `animals` VALUES ('41', '0', '2017-07-07 04:20:00', 'test3', '0', '3.0000', '', '2', '2');
INSERT INTO `animals` VALUES ('42', '0', '2017-07-08 03:05:14', 'testing', '0', '2.0000', '', '34', '3');

-- ----------------------------
-- Table structure for `cryptorchidism`
-- ----------------------------
DROP TABLE IF EXISTS `cryptorchidism`;
CREATE TABLE `cryptorchidism` (
  `report_id` int(10) unsigned NOT NULL,
  `right_testicle_location` varchar(30) NOT NULL,
  `left_testicle_location` varchar(30) NOT NULL,
  `left_size_diameter` double(10,4) unsigned NOT NULL,
  `right_size_diameter` double(10,4) unsigned NOT NULL,
  `left_notes` varchar(256) DEFAULT NULL,
  `right_notes` varchar(256) DEFAULT NULL,
  `Visit` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cryptorchidism
-- ----------------------------
INSERT INTO `cryptorchidism` VALUES ('3', 'scrotal', 'scrotal', '22.0000', '23.0000', 'left testicle notes test', 'right testicle notes', '0');
INSERT INTO `cryptorchidism` VALUES ('4', 'ectopic', 'scrotal', '22.0000', '222.0000', 'this is just another test', 'and another test', '0');
INSERT INTO `cryptorchidism` VALUES ('5', 'inguinal', 'scrotal', '2.0000', '4.0000', 'testtest', 'testtest', '0');
INSERT INTO `cryptorchidism` VALUES ('6', 'inguinal', 'inguinal', '22.0000', '23.0000', 'this is the variable test', 'tis is another var test', '0');
INSERT INTO `cryptorchidism` VALUES ('8', 'ectopic', 'scrotal', '22.0000', '222.0000', '222', '222222', '0');
INSERT INTO `cryptorchidism` VALUES ('9', 'scrotal', 'inguinal', '33.0000', '333.0000', '3333', '3333', '0');
INSERT INTO `cryptorchidism` VALUES ('13', 'abdominal', 'inguinal', '22.0000', '22.0000', 'sadsdasdasdasda', 'asdasdasdasd', '0');

-- ----------------------------
-- Table structure for `cystic_ovarian_disease`
-- ----------------------------
DROP TABLE IF EXISTS `cystic_ovarian_disease`;
CREATE TABLE `cystic_ovarian_disease` (
  `report_id` int(10) unsigned NOT NULL,
  `Right_ovary_length` double(10,4) unsigned DEFAULT NULL,
  `Right_ovary_width` double(10,4) unsigned DEFAULT NULL,
  `Right_ovary_height` double(10,4) unsigned DEFAULT NULL,
  `Right_cystic_structures_count` smallint(5) unsigned DEFAULT NULL,
  `Left_ovary_length` double(10,4) unsigned DEFAULT NULL,
  `Left_ovary_width` double(10,4) unsigned DEFAULT NULL,
  `Left_ovary_height` double(10,4) unsigned DEFAULT NULL,
  `Left_cystic_structures_count` smallint(5) unsigned DEFAULT NULL,
  `Left_notes` varchar(512) DEFAULT NULL,
  `Right_notes` varchar(512) DEFAULT NULL,
  `Visit` smallint(6) unsigned DEFAULT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cystic_ovarian_disease
-- ----------------------------
INSERT INTO `cystic_ovarian_disease` VALUES ('7', '20.0000', '21.0000', '22.0000', '23', '31.0000', '32.0000', '33.0000', '34', '2222221111111', '2222221111111', '0');
INSERT INTO `cystic_ovarian_disease` VALUES ('12', '33.0000', '333.0000', '44.0000', '2', '33.0000', '33.0000', '33.0000', '33', '222221111111', '222221111111', '0');

-- ----------------------------
-- Table structure for `induction_of_ovulation`
-- ----------------------------
DROP TABLE IF EXISTS `induction_of_ovulation`;
CREATE TABLE `induction_of_ovulation` (
  `report_id` int(10) unsigned NOT NULL,
  `discharge` bit(1) DEFAULT NULL,
  `quality_discharge` varchar(15) DEFAULT NULL,
  `vaginal_folds` varchar(4) DEFAULT NULL,
  `basal_cells` double(4,2) unsigned DEFAULT NULL,
  `parabasal_cells` double(4,2) DEFAULT NULL,
  `intermediate_cells` double(4,2) DEFAULT NULL,
  `superficial_cells` double(4,2) DEFAULT NULL,
  `potatoe_chips` double(4,2) DEFAULT NULL,
  `WBC` varchar(7) DEFAULT NULL,
  `oestradiol` int(10) unsigned DEFAULT NULL,
  `progesterone` int(10) unsigned DEFAULT NULL,
  `LH` int(10) unsigned DEFAULT NULL,
  `Visit` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of induction_of_ovulation
-- ----------------------------
INSERT INTO `induction_of_ovulation` VALUES ('10', '', 'clear', '+', '90.00', '91.20', '99.10', '99.30', '20.00', 'single', '1', '1', null, '0');
INSERT INTO `induction_of_ovulation` VALUES ('11', '', 'pus', '+', '90.00', '90.00', '9.00', '90.00', '90.00', 'single', '90', '90', null, '0');

-- ----------------------------
-- Table structure for `join_sickness_table`
-- ----------------------------
DROP TABLE IF EXISTS `join_sickness_table`;
CREATE TABLE `join_sickness_table` (
  `sickness_id` int(11) unsigned NOT NULL,
  `table_name` varchar(50) NOT NULL,
  PRIMARY KEY (`sickness_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of join_sickness_table
-- ----------------------------
INSERT INTO `join_sickness_table` VALUES ('3', 'cryptorchidism');

-- ----------------------------
-- Table structure for `reports`
-- ----------------------------
DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sickness_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `treatment_for_sickness_id` int(10) unsigned DEFAULT NULL,
  `animal_id` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_reports_users` (`user_id`),
  KEY `FK_reports_used_treatment` (`treatment_for_sickness_id`),
  KEY `FK_reports_animal_id` (`animal_id`),
  KEY `FK_reports_sicknesses` (`sickness_id`),
  CONSTRAINT `FK_reports_animal_id` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_reports_sicknesses` FOREIGN KEY (`sickness_id`) REFERENCES `sicknesses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_reports_used_treatment` FOREIGN KEY (`treatment_for_sickness_id`) REFERENCES `treatments_for_sicknesses` (`id`),
  CONSTRAINT `FK_reports_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reports
-- ----------------------------
INSERT INTO `reports` VALUES ('1', '10', '21', '2017-06-26 18:15:56', '2', '27', '1');
INSERT INTO `reports` VALUES ('2', '12', '21', '2017-06-26 18:16:29', '3', '28', '3');
INSERT INTO `reports` VALUES ('3', '12', '21', '2017-06-27 00:09:49', '3', '29', '3');
INSERT INTO `reports` VALUES ('4', '10', '21', '2017-06-27 02:11:23', '2', '30', '1');
INSERT INTO `reports` VALUES ('5', '10', '21', '2017-06-27 02:14:34', '2', '31', '1');
INSERT INTO `reports` VALUES ('6', '11', '21', '2017-06-27 02:16:24', '4', '32', '1');
INSERT INTO `reports` VALUES ('7', '11', '21', '2017-06-27 02:17:55', '9', '33', '1');
INSERT INTO `reports` VALUES ('8', '12', '21', '2017-07-03 02:01:28', '3', '34', '1');
INSERT INTO `reports` VALUES ('9', '12', '21', '2017-07-03 02:14:50', '8', '35', '2');
INSERT INTO `reports` VALUES ('10', '12', '21', '2017-07-03 02:15:28', '8', '36', '2');
INSERT INTO `reports` VALUES ('11', '11', '21', '2017-07-03 02:20:11', '9', '37', '2');
INSERT INTO `reports` VALUES ('12', '12', '21', '2017-07-03 02:25:34', '7', '38', '1');
INSERT INTO `reports` VALUES ('13', '14', '21', '2017-07-08 03:05:14', '13', '42', '1');

-- ----------------------------
-- Table structure for `reports_closure`
-- ----------------------------
DROP TABLE IF EXISTS `reports_closure`;
CREATE TABLE `reports_closure` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `report_id` int(10) unsigned NOT NULL,
  `closing_comment` varchar(256) DEFAULT NULL,
  `success_rating` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_closing_reports` (`report_id`),
  CONSTRAINT `FK_closing_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reports_closure
-- ----------------------------
INSERT INTO `reports_closure` VALUES ('2', '3', 'fsdfsd2', '1');
INSERT INTO `reports_closure` VALUES ('3', '2', 'test2now', '1');

-- ----------------------------
-- Table structure for `report_values`
-- ----------------------------
DROP TABLE IF EXISTS `report_values`;
CREATE TABLE `report_values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `report_id` int(10) unsigned NOT NULL,
  `value` varchar(50) NOT NULL,
  `value_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of report_values
-- ----------------------------
INSERT INTO `report_values` VALUES ('1', '1', '22', '12');
INSERT INTO `report_values` VALUES ('2', '1', 'sada', '13');
INSERT INTO `report_values` VALUES ('3', '1', '23', '14');
INSERT INTO `report_values` VALUES ('4', '1', 'asdasd', '15');
INSERT INTO `report_values` VALUES ('5', '2', '9', '17');
INSERT INTO `report_values` VALUES ('6', '2', 'asda', '18');
INSERT INTO `report_values` VALUES ('7', '2', 'aaas', '19');
INSERT INTO `report_values` VALUES ('8', '3', '9', '17');
INSERT INTO `report_values` VALUES ('9', '3', 'asad', '18');
INSERT INTO `report_values` VALUES ('10', '3', 'asad', '19');
INSERT INTO `report_values` VALUES ('11', '4', '2', '12');
INSERT INTO `report_values` VALUES ('12', '4', 'sdasa', '13');
INSERT INTO `report_values` VALUES ('13', '4', '22', '14');
INSERT INTO `report_values` VALUES ('14', '4', 'asdasd', '15');
INSERT INTO `report_values` VALUES ('15', '5', '1', '12');
INSERT INTO `report_values` VALUES ('16', '5', 'sada', '13');
INSERT INTO `report_values` VALUES ('17', '5', '3', '14');
INSERT INTO `report_values` VALUES ('18', '5', 'dasdasd', '15');
INSERT INTO `report_values` VALUES ('19', '6', '6', '16');
INSERT INTO `report_values` VALUES ('20', '7', '5', '16');
INSERT INTO `report_values` VALUES ('21', '8', '9', '17');
INSERT INTO `report_values` VALUES ('22', '8', 'dsfsdf', '18');
INSERT INTO `report_values` VALUES ('23', '8', 'sdfsdfs', '19');
INSERT INTO `report_values` VALUES ('24', '9', '9', '17');
INSERT INTO `report_values` VALUES ('25', '9', 'asdads', '18');
INSERT INTO `report_values` VALUES ('26', '9', 'asdasd', '19');
INSERT INTO `report_values` VALUES ('27', '10', '8', '17');
INSERT INTO `report_values` VALUES ('28', '10', '222356', '18');
INSERT INTO `report_values` VALUES ('29', '10', 'asdasdaTZ', '19');
INSERT INTO `report_values` VALUES ('30', '11', '0', '16');
INSERT INTO `report_values` VALUES ('31', '12', '9', '17');
INSERT INTO `report_values` VALUES ('32', '12', '2223', '18');
INSERT INTO `report_values` VALUES ('33', '12', '2', '19');
INSERT INTO `report_values` VALUES ('34', '13', '3', '20');
INSERT INTO `report_values` VALUES ('35', '14', '2', '20');
INSERT INTO `report_values` VALUES ('36', '15', '2', '20');
INSERT INTO `report_values` VALUES ('37', '13', '2', '21');
INSERT INTO `report_values` VALUES ('38', '13', '3333', '22');

-- ----------------------------
-- Table structure for `report_visits`
-- ----------------------------
DROP TABLE IF EXISTS `report_visits`;
CREATE TABLE `report_visits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `report_id` int(10) unsigned NOT NULL,
  `visit` tinyint(3) unsigned NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of report_visits
-- ----------------------------
INSERT INTO `report_visits` VALUES ('1', '2', '0', '2017-06-26 18:17:05');
INSERT INTO `report_visits` VALUES ('2', '3', '0', '2017-06-27 00:10:03');
INSERT INTO `report_visits` VALUES ('3', '11', '0', '2017-07-05 02:23:41');
INSERT INTO `report_visits` VALUES ('4', '10', '0', '2017-07-05 02:24:33');
INSERT INTO `report_visits` VALUES ('5', '10', '1', '2017-07-05 02:24:53');
INSERT INTO `report_visits` VALUES ('6', '10', '2', '2017-07-05 02:25:11');
INSERT INTO `report_visits` VALUES ('7', '9', '0', '2017-07-05 02:27:47');

-- ----------------------------
-- Table structure for `report_visit_values`
-- ----------------------------
DROP TABLE IF EXISTS `report_visit_values`;
CREATE TABLE `report_visit_values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `visit_id` int(10) unsigned NOT NULL,
  `value` varchar(50) NOT NULL,
  `value_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of report_visit_values
-- ----------------------------
INSERT INTO `report_visit_values` VALUES ('1', '1', '2', '15');
INSERT INTO `report_visit_values` VALUES ('2', '1', 'asdas', '16');
INSERT INTO `report_visit_values` VALUES ('3', '2', '2', '15');
INSERT INTO `report_visit_values` VALUES ('4', '2', 'asdad', '16');
INSERT INTO `report_visit_values` VALUES ('5', '3', '4', '13');
INSERT INTO `report_visit_values` VALUES ('6', '4', '3', '15');
INSERT INTO `report_visit_values` VALUES ('7', '4', 'red2', '16');
INSERT INTO `report_visit_values` VALUES ('8', '5', '5', '15');
INSERT INTO `report_visit_values` VALUES ('9', '5', 'blue2', '16');
INSERT INTO `report_visit_values` VALUES ('10', '6', '6', '15');
INSERT INTO `report_visit_values` VALUES ('11', '6', 'green2', '16');
INSERT INTO `report_visit_values` VALUES ('12', '7', '2', '15');
INSERT INTO `report_visit_values` VALUES ('13', '7', 'r', '16');

-- ----------------------------
-- Table structure for `sicknesses`
-- ----------------------------
DROP TABLE IF EXISTS `sicknesses`;
CREATE TABLE `sicknesses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `creator` int(10) unsigned NOT NULL,
  `release_status` tinyint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_sicknesses_users` (`creator`),
  CONSTRAINT `FK_sicknesses_users` FOREIGN KEY (`creator`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sicknesses
-- ----------------------------
INSERT INTO `sicknesses` VALUES ('10', 'Test2', 'this is a boring test', '21', '1');
INSERT INTO `sicknesses` VALUES ('11', 'test3', 'droptest', '21', '1');
INSERT INTO `sicknesses` VALUES ('12', 'Droptest', 'A test for droptest', '21', '1');
INSERT INTO `sicknesses` VALUES ('13', 'sasda', 'dddd', '21', '1');
INSERT INTO `sicknesses` VALUES ('14', 'another Test', 'testing', '21', '0');

-- ----------------------------
-- Table structure for `sickness_block`
-- ----------------------------
DROP TABLE IF EXISTS `sickness_block`;
CREATE TABLE `sickness_block` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sickness_id` int(10) unsigned NOT NULL,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_block_sickness` (`sickness_id`),
  CONSTRAINT `FK_block_sickness` FOREIGN KEY (`sickness_id`) REFERENCES `sicknesses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sickness_block
-- ----------------------------
INSERT INTO `sickness_block` VALUES ('4', '10', 'Block 1');
INSERT INTO `sickness_block` VALUES ('5', '10', 'Block2');
INSERT INTO `sickness_block` VALUES ('6', '11', 'dda');
INSERT INTO `sickness_block` VALUES ('7', '12', 'Droptest');
INSERT INTO `sickness_block` VALUES ('8', '12', 'textblock');
INSERT INTO `sickness_block` VALUES ('9', '13', 'testz');
INSERT INTO `sickness_block` VALUES ('10', '14', 'Left side');

-- ----------------------------
-- Table structure for `sickness_value_definition`
-- ----------------------------
DROP TABLE IF EXISTS `sickness_value_definition`;
CREATE TABLE `sickness_value_definition` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `block_id` int(10) unsigned NOT NULL,
  `type_id` smallint(4) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `validation` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_vd_type` (`type_id`),
  KEY `FK_value_block` (`block_id`),
  CONSTRAINT `FK_value_block` FOREIGN KEY (`block_id`) REFERENCES `sickness_block` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_vd_type` FOREIGN KEY (`type_id`) REFERENCES `sickness_value_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sickness_value_definition
-- ----------------------------
INSERT INTO `sickness_value_definition` VALUES ('12', '4', '1', 'block1_number', 'how many:', 'trim|required|numeric');
INSERT INTO `sickness_value_definition` VALUES ('13', '4', '1', 'block1_notes', 'please enter notes:', 'trim');
INSERT INTO `sickness_value_definition` VALUES ('14', '5', '1', 'Block2_number', 'how many this time', 'trim|required|numeric');
INSERT INTO `sickness_value_definition` VALUES ('15', '5', '1', 'text2', 'please enter text :', 'trim');
INSERT INTO `sickness_value_definition` VALUES ('16', '6', '2', 'ssaaad', '', 'trim');
INSERT INTO `sickness_value_definition` VALUES ('17', '7', '2', 'dropdownone', 'Chose drop', 'trim');
INSERT INTO `sickness_value_definition` VALUES ('18', '8', '1', 'textthis', 'enter notes', 'trim');
INSERT INTO `sickness_value_definition` VALUES ('19', '8', '1', 'notestwo', 'notes 2', 'trim');
INSERT INTO `sickness_value_definition` VALUES ('20', '9', '1', 'dddd', 'please enter number', 'trim|required|numeric');
INSERT INTO `sickness_value_definition` VALUES ('21', '10', '1', 'left_length', 'please enter number: ', 'trim|required|numeric');
INSERT INTO `sickness_value_definition` VALUES ('22', '10', '1', 'note', 'please enter text : ', 'trim');

-- ----------------------------
-- Table structure for `sickness_value_dropdown_values`
-- ----------------------------
DROP TABLE IF EXISTS `sickness_value_dropdown_values`;
CREATE TABLE `sickness_value_dropdown_values` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value_id` int(10) unsigned NOT NULL,
  `text` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_drop_value` (`value_id`),
  CONSTRAINT `FK_drop_value` FOREIGN KEY (`value_id`) REFERENCES `sickness_value_definition` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sickness_value_dropdown_values
-- ----------------------------
INSERT INTO `sickness_value_dropdown_values` VALUES ('5', '16', 'please ');
INSERT INTO `sickness_value_dropdown_values` VALUES ('6', '16', 'enter dropdowns');
INSERT INTO `sickness_value_dropdown_values` VALUES ('7', '16', ' comma separated');
INSERT INTO `sickness_value_dropdown_values` VALUES ('8', '17', 'please ');
INSERT INTO `sickness_value_dropdown_values` VALUES ('9', '17', 'enter dropdowns');
INSERT INTO `sickness_value_dropdown_values` VALUES ('10', '17', ' comma separated');

-- ----------------------------
-- Table structure for `sickness_value_types`
-- ----------------------------
DROP TABLE IF EXISTS `sickness_value_types`;
CREATE TABLE `sickness_value_types` (
  `id` smallint(4) unsigned NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sickness_value_types
-- ----------------------------
INSERT INTO `sickness_value_types` VALUES ('1', 'text');
INSERT INTO `sickness_value_types` VALUES ('2', 'drop');

-- ----------------------------
-- Table structure for `species`
-- ----------------------------
DROP TABLE IF EXISTS `species`;
CREATE TABLE `species` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of species
-- ----------------------------
INSERT INTO `species` VALUES ('0', 'Hamster', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `species` VALUES ('1', 'Dog', '2017-03-20 16:33:45', '2017-03-20 16:33:49');

-- ----------------------------
-- Table structure for `symptoms`
-- ----------------------------
DROP TABLE IF EXISTS `symptoms`;
CREATE TABLE `symptoms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `report_id` int(10) unsigned NOT NULL,
  `note` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_symptoms_reports` (`report_id`),
  CONSTRAINT `FK_symptoms_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of symptoms
-- ----------------------------

-- ----------------------------
-- Table structure for `test`
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `test` varchar(32) DEFAULT NULL,
  `test2` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of test
-- ----------------------------
INSERT INTO `test` VALUES ('1', '1', 'bla');
INSERT INTO `test` VALUES ('2', '1', 'bla');
INSERT INTO `test` VALUES ('3', null, 'bla');
INSERT INTO `test` VALUES ('4', null, 'bla');
INSERT INTO `test` VALUES ('5', 'sssdddd', 'bla');
INSERT INTO `test` VALUES ('6', 'aaaassss', 'bla');
INSERT INTO `test` VALUES ('7', 'sssdddd', 'bla');
INSERT INTO `test` VALUES ('8', 'aaaassss', 'bla');
INSERT INTO `test` VALUES ('9', 'sssdddd', null);
INSERT INTO `test` VALUES ('10', 'aaaassss', null);
INSERT INTO `test` VALUES ('11', 'sssdddd', 'please enter text');
INSERT INTO `test` VALUES ('12', 'aaaassss', 'please enter text');
INSERT INTO `test` VALUES ('13', 'daasssa', 'please enter text');
INSERT INTO `test` VALUES ('14', 'thi', 'please enter text44');

-- ----------------------------
-- Table structure for `treatments`
-- ----------------------------
DROP TABLE IF EXISTS `treatments`;
CREATE TABLE `treatments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `note` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of treatments
-- ----------------------------
INSERT INTO `treatments` VALUES ('1', 'Buserelin', ' Is a gonadotropin-releasing hormone agonist (GnRH agonist). The drug\'s effects are dependent on the frequency and time course of administration. GnRH is released in a pulsatile fashion in the postpubertal adult. Initial interaction of any GnRH agonist, such as buserelin, with the GnRH receptor induces release of follicle-stimulating hormone (FSH) and luteinizing hormone (LH) by gonadotrophes. Long-term exposure to constant levels of buserelin, rather than endogenous pulses, leads to downregulation of the GnRH receptors and subsequent suppression of the pituitary release of LH and FSH.[1][2][3]\r\n\r\nLike other GnRH agonists, buserelin may be used in the treatment of hormone-responsive cancers such as prostate cancer or breast cancer, estrogen-dependent conditions (such as endometriosis or uterine fibroids), and in assisted reproduction.');
INSERT INTO `treatments` VALUES ('8', 'hCG', ' is a hormone produced by the placenta after implantation.[1][2] The presence of hCG is detected in some pregnancy tests (HCG pregnancy strip tests). Some cancerous tumors produce this hormone; therefore, elevated levels measured when the patient is not pregnant can lead to a cancer diagnosis and, if high enough, paraneoplastic syndromes. However, it is not known whether this production is a contributing cause or an effect of carcinogenesis. The pituitary analog of hCG, known as luteinizing hormone (LH), is produced in the pituitary gland of males and females of all ages.');
INSERT INTO `treatments` VALUES ('9', 'Massage', 'seems to help sometimes. 2');
INSERT INTO `treatments` VALUES ('10', 'no treatment', 'sometimes doing nothing is enough.');

-- ----------------------------
-- Table structure for `treatments_details`
-- ----------------------------
DROP TABLE IF EXISTS `treatments_details`;
CREATE TABLE `treatments_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `treatments_for_sickness_id` int(10) unsigned NOT NULL,
  `dosage` varchar(30) NOT NULL,
  `count` smallint(6) NOT NULL,
  `note` varchar(1024) DEFAULT NULL,
  `for_days` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_td_treatments_for_sicknesses` (`treatments_for_sickness_id`),
  CONSTRAINT `FK_td_treatments_for_sicknesses` FOREIGN KEY (`treatments_for_sickness_id`) REFERENCES `treatments_for_sicknesses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of treatments_details
-- ----------------------------
INSERT INTO `treatments_details` VALUES ('1', '2', '230 ng/kg', '2', '', '2');
INSERT INTO `treatments_details` VALUES ('2', '3', '230 ng/kg', '2', '', '2');
INSERT INTO `treatments_details` VALUES ('3', '4', '230 ng/kg', '2', '', '2');
INSERT INTO `treatments_details` VALUES ('4', '7', '220ng', '2', '', '200');
INSERT INTO `treatments_details` VALUES ('5', '8', 'none', '4', '', '3');
INSERT INTO `treatments_details` VALUES ('6', '9', 'none', '2', '', '100');
INSERT INTO `treatments_details` VALUES ('7', '10', 'none', '2', '', '2');
INSERT INTO `treatments_details` VALUES ('8', '11', 'none', '2', '', '2');
INSERT INTO `treatments_details` VALUES ('9', '12', '2', '10', '', '3');
INSERT INTO `treatments_details` VALUES ('10', '13', '230 ng/kg', '2', '', '30');

-- ----------------------------
-- Table structure for `treatments_for_sicknesses`
-- ----------------------------
DROP TABLE IF EXISTS `treatments_for_sicknesses`;
CREATE TABLE `treatments_for_sicknesses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `treatment_id` int(10) unsigned NOT NULL,
  `sickness_id` int(10) unsigned NOT NULL,
  `subspecies_id` int(10) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tfs_treatments` (`treatment_id`),
  KEY `FK_tfs_sickness` (`sickness_id`),
  KEY `FK_tfs_subspecies` (`subspecies_id`),
  CONSTRAINT `FK_tfs_sickness` FOREIGN KEY (`sickness_id`) REFERENCES `sicknesses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_tfs_subspecies` FOREIGN KEY (`subspecies_id`) REFERENCES `species` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_tfs_treatments` FOREIGN KEY (`treatment_id`) REFERENCES `treatments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of treatments_for_sicknesses
-- ----------------------------
INSERT INTO `treatments_for_sicknesses` VALUES ('2', '1', '10', '1', null, null);
INSERT INTO `treatments_for_sicknesses` VALUES ('3', '1', '12', '1', null, null);
INSERT INTO `treatments_for_sicknesses` VALUES ('4', '1', '11', '1', null, null);
INSERT INTO `treatments_for_sicknesses` VALUES ('7', '1', '12', '1', null, null);
INSERT INTO `treatments_for_sicknesses` VALUES ('8', '9', '12', '1', null, null);
INSERT INTO `treatments_for_sicknesses` VALUES ('9', '9', '11', '1', null, null);
INSERT INTO `treatments_for_sicknesses` VALUES ('10', '9', '13', '0', null, null);
INSERT INTO `treatments_for_sicknesses` VALUES ('11', '9', '13', '0', null, null);
INSERT INTO `treatments_for_sicknesses` VALUES ('12', '8', '13', '0', null, null);
INSERT INTO `treatments_for_sicknesses` VALUES ('13', '1', '14', '0', null, null);

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(512) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adminstatus` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('21', 'Robert', 'nevermore84@hotmail.com', '$2y$10$qUjlEAUsf2.YjzPDC3Xgz.TaEdyafC9el8m11gD64qqcF2BlVL9FW', '0000-00-00 00:00:00', '');
INSERT INTO `users` VALUES ('22', 'Robert 2', 'robertb1984@gmail.com', '$2y$10$yRoGbeJdqWGXlHgtmxAXp.w.Zky5UsRRNFLxSL0EM8MYNPde7NjI6', '0000-00-00 00:00:00', '');
INSERT INTO `users` VALUES ('23', 'Roberttest1', 'test@testmail.com', '$2y$10$GMBovuqlBSRF5aeolBcgsuh/CNzrWnqElJQPug5UsgI7vMxdKIOby', '2017-06-27 00:13:41', '');
INSERT INTO `users` VALUES ('24', 'Roberttest2', 'test2@testmail.com', '$2y$10$EGFqfkFLB7EV20PZbRxXdO1vQBNpYPtGEmrGcyRBuGudtyy6VUh6.', '2017-06-27 00:14:45', '');

-- ----------------------------
-- Table structure for `visit_block`
-- ----------------------------
DROP TABLE IF EXISTS `visit_block`;
CREATE TABLE `visit_block` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sickness_id` int(10) unsigned NOT NULL,
  `name` varchar(25) NOT NULL,
  `block_type` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_block_sickness` (`sickness_id`),
  CONSTRAINT `visit_block_ibfk_1` FOREIGN KEY (`sickness_id`) REFERENCES `sicknesses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of visit_block
-- ----------------------------
INSERT INTO `visit_block` VALUES ('1', '10', 'Visit', '1');
INSERT INTO `visit_block` VALUES ('5', '10', 'Block 1', '1');
INSERT INTO `visit_block` VALUES ('6', '10', 'Block2', '1');
INSERT INTO `visit_block` VALUES ('12', '11', 'dda', '1');
INSERT INTO `visit_block` VALUES ('14', '12', 'sadas', '1');
INSERT INTO `visit_block` VALUES ('15', '14', 'Left side', '1');

-- ----------------------------
-- Table structure for `visit_value_definition`
-- ----------------------------
DROP TABLE IF EXISTS `visit_value_definition`;
CREATE TABLE `visit_value_definition` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `block_id` int(10) unsigned NOT NULL,
  `type_id` smallint(4) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `validation` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_vd_type` (`type_id`),
  KEY `FK_value_block` (`block_id`),
  CONSTRAINT `FK_def_block` FOREIGN KEY (`block_id`) REFERENCES `visit_block` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of visit_value_definition
-- ----------------------------
INSERT INTO `visit_value_definition` VALUES ('1', '1', '1', 'test_2', 'blablabla : ', 'trim');
INSERT INTO `visit_value_definition` VALUES ('2', '1', '1', 'test_3', 'bla2 :', 'trim');
INSERT INTO `visit_value_definition` VALUES ('3', '5', '1', 'block1_number', 'how many:', 'trim|required|numeric');
INSERT INTO `visit_value_definition` VALUES ('4', '5', '1', 'block1_notes', 'please enter notes:', 'trim');
INSERT INTO `visit_value_definition` VALUES ('5', '6', '1', 'Block2_number', 'how many this time', 'trim|required|numeric');
INSERT INTO `visit_value_definition` VALUES ('6', '6', '1', 'text2', 'please enter text :', 'trim');
INSERT INTO `visit_value_definition` VALUES ('13', '12', '2', 'ssaaad', '', 'trim');
INSERT INTO `visit_value_definition` VALUES ('15', '14', '1', 'aaassss', 'please enter text:', 'trim|required|numeric');
INSERT INTO `visit_value_definition` VALUES ('16', '14', '1', 'asasdasdasdasd', 'please enter text2:', 'trim');
INSERT INTO `visit_value_definition` VALUES ('17', '15', '1', 'left_length', 'please enter number: ', 'trim|required|numeric');
INSERT INTO `visit_value_definition` VALUES ('18', '15', '1', 'note', 'please enter text : ', 'trim');

-- ----------------------------
-- Table structure for `visit_value_dropdown_values`
-- ----------------------------
DROP TABLE IF EXISTS `visit_value_dropdown_values`;
CREATE TABLE `visit_value_dropdown_values` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value_id` int(10) unsigned NOT NULL,
  `text` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_drop_value` (`value_id`),
  CONSTRAINT `FK_drop_def` FOREIGN KEY (`value_id`) REFERENCES `visit_value_definition` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of visit_value_dropdown_values
-- ----------------------------
INSERT INTO `visit_value_dropdown_values` VALUES ('4', '13', 'please ');
INSERT INTO `visit_value_dropdown_values` VALUES ('5', '13', 'enter dropdowns');
INSERT INTO `visit_value_dropdown_values` VALUES ('6', '13', ' comma separated');
