/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : project

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-24 22:03:08
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of allowed_emails
-- ----------------------------
INSERT INTO `allowed_emails` VALUES ('2', 'test@testmail.com');

-- ----------------------------
-- Table structure for `animals`
-- ----------------------------
DROP TABLE IF EXISTS `animals`;
CREATE TABLE `animals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subspecies_id` int(10) unsigned NOT NULL,
  `birthdate` datetime DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `isFemale` bit(1) NOT NULL,
  `weight` double(8,4) unsigned DEFAULT NULL,
  `race` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_animals_subspecies` (`subspecies_id`),
  CONSTRAINT `FK_animals_subspecies` FOREIGN KEY (`subspecies_id`) REFERENCES `species` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of animals
-- ----------------------------
INSERT INTO `animals` VALUES ('26', '1', null, '2017-06-19 22:31:53', 'test', '', '2.0000', 'testrace');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reports
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of report_values
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of report_visits
-- ----------------------------

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

-- ----------------------------
-- Table structure for `sicknesses`
-- ----------------------------
DROP TABLE IF EXISTS `sicknesses`;
CREATE TABLE `sicknesses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sicknesses
-- ----------------------------
INSERT INTO `sicknesses` VALUES ('10', 'Test2', 'this is a boring test');
INSERT INTO `sicknesses` VALUES ('11', 'test3', 'droptest');
INSERT INTO `sicknesses` VALUES ('12', 'Droptest', 'A test for droptest');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sickness_block
-- ----------------------------
INSERT INTO `sickness_block` VALUES ('4', '10', 'Block 1');
INSERT INTO `sickness_block` VALUES ('5', '10', 'Block2');
INSERT INTO `sickness_block` VALUES ('6', '11', 'dda');
INSERT INTO `sickness_block` VALUES ('7', '12', 'Droptest');
INSERT INTO `sickness_block` VALUES ('8', '12', 'textblock');

-- ----------------------------
-- Table structure for `sickness_value_definition`
-- ----------------------------
DROP TABLE IF EXISTS `sickness_value_definition`;
CREATE TABLE `sickness_value_definition` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `block_id` int(10) unsigned NOT NULL,
  `type_id` smallint(4) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `validation` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_vd_type` (`type_id`),
  KEY `FK_value_block` (`block_id`),
  CONSTRAINT `FK_value_block` FOREIGN KEY (`block_id`) REFERENCES `sickness_block` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_vd_type` FOREIGN KEY (`type_id`) REFERENCES `sickness_value_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

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
  `count_each` smallint(6) NOT NULL,
  `note` varchar(1024) DEFAULT NULL,
  `each_period` varchar(20) NOT NULL,
  `for_count` smallint(6) NOT NULL,
  `for_period` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_td_treatments_for_sicknesses` (`treatments_for_sickness_id`),
  CONSTRAINT `FK_td_treatments_for_sicknesses` FOREIGN KEY (`treatments_for_sickness_id`) REFERENCES `treatments_for_sicknesses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of treatments_details
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of treatments_for_sicknesses
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('21', 'Robert', 'nevermore84@hotmail.com', '$2y$10$qUjlEAUsf2.YjzPDC3Xgz.TaEdyafC9el8m11gD64qqcF2BlVL9FW', '0000-00-00 00:00:00', '');
INSERT INTO `users` VALUES ('22', 'Robert 2', 'robertb1984@gmail.com', '$2y$10$yRoGbeJdqWGXlHgtmxAXp.w.Zky5UsRRNFLxSL0EM8MYNPde7NjI6', '0000-00-00 00:00:00', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of visit_block
-- ----------------------------
INSERT INTO `visit_block` VALUES ('1', '10', 'Visit', '1');
INSERT INTO `visit_block` VALUES ('5', '10', 'Block 1', '1');
INSERT INTO `visit_block` VALUES ('6', '10', 'Block2', '1');
INSERT INTO `visit_block` VALUES ('12', '11', 'dda', '1');
INSERT INTO `visit_block` VALUES ('14', '12', 'sadas', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

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
