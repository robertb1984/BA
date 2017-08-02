/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : project

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-08-02 06:26:07
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of allowed_emails
-- ----------------------------
INSERT INTO `allowed_emails` VALUES ('2', 'test@testmail.com');
INSERT INTO `allowed_emails` VALUES ('3', 'test2@testmail.com');
INSERT INTO `allowed_emails` VALUES ('4', 'testmailLeo@test.com');

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
  CONSTRAINT `FK_animals_species` FOREIGN KEY (`subspecies_id`) REFERENCES `species` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of animals
-- ----------------------------
INSERT INTO `animals` VALUES ('1', '1', '2017-07-26 13:58:25', 'Test', '0', '4.0000', '', '3', '1');
INSERT INTO `animals` VALUES ('2', '2', '2017-07-26 14:55:47', 'test', '0', '2.0000', '', '2', '1');
INSERT INTO `animals` VALUES ('3', '1', '2017-07-26 16:11:58', 'trr', '1', '2.0000', '', '0', '2');
INSERT INTO `animals` VALUES ('4', '2', '2017-07-31 21:11:14', 'test', '1', '1.0000', '', '12', '1');
INSERT INTO `animals` VALUES ('5', '1', '2017-08-02 05:58:43', 'This is a release test', '0', '9000.0000', '', '3', '2');
INSERT INTO `animals` VALUES ('6', '1', '2017-08-02 06:19:43', 'test', '1', '3.0000', '', '2', '3');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reports
-- ----------------------------
INSERT INTO `reports` VALUES ('4', '18', '21', '2017-08-02 05:58:43', '1', '5', '3');

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
INSERT INTO `reports_closure` VALUES ('3', '4', 'yup', '1');

-- ----------------------------
-- Table structure for `report_values`
-- ----------------------------
DROP TABLE IF EXISTS `report_values`;
CREATE TABLE `report_values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `report_id` int(10) unsigned NOT NULL,
  `value` varchar(50) NOT NULL,
  `value_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_report_values_reports` (`report_id`),
  KEY `FKReport_values_sickness_value_definition` (`value_id`),
  CONSTRAINT `FKReport_values_sickness_value_definition` FOREIGN KEY (`value_id`) REFERENCES `sickness_value_definition` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_report_values_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of report_values
-- ----------------------------
INSERT INTO `report_values` VALUES ('1', '4', '1', '1');
INSERT INTO `report_values` VALUES ('2', '4', '3', '2');
INSERT INTO `report_values` VALUES ('3', '4', '3', '3');
INSERT INTO `report_values` VALUES ('4', '4', 'hope this still works', '4');
INSERT INTO `report_values` VALUES ('5', '4', '5', '5');
INSERT INTO `report_values` VALUES ('6', '4', '4', '6');
INSERT INTO `report_values` VALUES ('7', '4', '4', '7');
INSERT INTO `report_values` VALUES ('8', '4', 'hope this still works2', '8');

-- ----------------------------
-- Table structure for `report_visits`
-- ----------------------------
DROP TABLE IF EXISTS `report_visits`;
CREATE TABLE `report_visits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `report_id` int(10) unsigned NOT NULL,
  `visit` tinyint(3) unsigned NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_report_visits_reports` (`report_id`),
  CONSTRAINT `FK_report_visits_reports` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of report_visits
-- ----------------------------
INSERT INTO `report_visits` VALUES ('1', '4', '0', '2017-08-02 05:59:43');
INSERT INTO `report_visits` VALUES ('2', '4', '1', '2017-08-02 06:00:24');
INSERT INTO `report_visits` VALUES ('4', '4', '2', '2017-08-02 06:20:42');

-- ----------------------------
-- Table structure for `report_visit_values`
-- ----------------------------
DROP TABLE IF EXISTS `report_visit_values`;
CREATE TABLE `report_visit_values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `visit_id` int(10) unsigned NOT NULL,
  `value` varchar(50) NOT NULL,
  `value_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_visit_values_visit` (`visit_id`),
  KEY `FK_visit_values_definition` (`value_id`),
  CONSTRAINT `FK_visit_values_definition` FOREIGN KEY (`value_id`) REFERENCES `visit_value_definition` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_visit_values_visit` FOREIGN KEY (`visit_id`) REFERENCES `report_visits` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of report_visit_values
-- ----------------------------
INSERT INTO `report_visit_values` VALUES ('1', '1', '1', '1');
INSERT INTO `report_visit_values` VALUES ('2', '1', '2', '2');
INSERT INTO `report_visit_values` VALUES ('3', '1', '2', '3');
INSERT INTO `report_visit_values` VALUES ('4', '1', 'grows smaler', '4');
INSERT INTO `report_visit_values` VALUES ('5', '1', '29', '5');
INSERT INTO `report_visit_values` VALUES ('6', '1', '2', '6');
INSERT INTO `report_visit_values` VALUES ('7', '1', '2', '7');
INSERT INTO `report_visit_values` VALUES ('8', '1', 'this one too', '8');
INSERT INTO `report_visit_values` VALUES ('9', '2', '5', '1');
INSERT INTO `report_visit_values` VALUES ('10', '2', '22.0', '2');
INSERT INTO `report_visit_values` VALUES ('11', '2', '23.4', '3');
INSERT INTO `report_visit_values` VALUES ('12', '2', 'bla', '4');
INSERT INTO `report_visit_values` VALUES ('13', '2', '25', '5');
INSERT INTO `report_visit_values` VALUES ('14', '2', '4.44', '6');
INSERT INTO `report_visit_values` VALUES ('15', '2', '3.4', '7');
INSERT INTO `report_visit_values` VALUES ('16', '2', 'this', '8');
INSERT INTO `report_visit_values` VALUES ('28', '4', '5', '1');
INSERT INTO `report_visit_values` VALUES ('29', '4', '2', '2');
INSERT INTO `report_visit_values` VALUES ('30', '4', '2', '3');
INSERT INTO `report_visit_values` VALUES ('31', '4', '2', '4');
INSERT INTO `report_visit_values` VALUES ('32', '4', '25', '5');
INSERT INTO `report_visit_values` VALUES ('33', '4', '2', '6');
INSERT INTO `report_visit_values` VALUES ('34', '4', '2', '7');
INSERT INTO `report_visit_values` VALUES ('35', '4', '2', '8');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sicknesses
-- ----------------------------
INSERT INTO `sicknesses` VALUES ('18', 'Cryptorchidism', 'Cryptorchidism is the absence of one or both testes from the scrotum. It is the most common birth defect of the male genital.[1] About 3% of full-term and 30% of premature infant boys are born with at least one undescended testis. However, about 80% of cryptorchid testes descend by the first year of life (the majority within three months), making the true incidence of cryptorchidism around 1% overall. Cryptorchidism may develop after infancy, sometimes as late as young adulthood, but that is exceptional.', '21', '1');
INSERT INTO `sicknesses` VALUES ('19', 'Induction of Ovulation', 'sry no idea', '21', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sickness_block
-- ----------------------------
INSERT INTO `sickness_block` VALUES ('1', '18', 'Right Testicle');
INSERT INTO `sickness_block` VALUES ('2', '18', 'Left Testicle');
INSERT INTO `sickness_block` VALUES ('3', '19', 'Housing');
INSERT INTO `sickness_block` VALUES ('4', '19', 'Female Reproduction Histo');
INSERT INTO `sickness_block` VALUES ('5', '19', 'Female Medical History');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sickness_value_definition
-- ----------------------------
INSERT INTO `sickness_value_definition` VALUES ('1', '1', '2', 'right_testicle', 'Location', 'trim');
INSERT INTO `sickness_value_definition` VALUES ('2', '1', '1', 'right_testicle_diameter', 'please enter Size(diameter): ', 'trim|required|numeric');
INSERT INTO `sickness_value_definition` VALUES ('3', '1', '1', 'right_testiclelength', 'and length :', 'trim|required|numeric');
INSERT INTO `sickness_value_definition` VALUES ('4', '1', '1', 'right_testicle_notes', 'please enter notes: ', 'trim');
INSERT INTO `sickness_value_definition` VALUES ('5', '2', '2', 'Left_testicle_location', 'Location', 'trim');
INSERT INTO `sickness_value_definition` VALUES ('6', '2', '1', 'Left_testicle_diameter', 'please enter Size(diameter)', 'trim|required|numeric');
INSERT INTO `sickness_value_definition` VALUES ('7', '2', '1', 'Left_testicle_length', 'and length: ', 'trim|required|numeric');
INSERT INTO `sickness_value_definition` VALUES ('8', '2', '1', 'left_testicle_notes', 'please enter notes:', 'trim');
INSERT INTO `sickness_value_definition` VALUES ('9', '3', '2', 'thisHousing', 'Housing', 'trim');
INSERT INTO `sickness_value_definition` VALUES ('10', '4', '1', 'interval_heats', 'Interval of heats(months)', 'trim|required|numeric');
INSERT INTO `sickness_value_definition` VALUES ('11', '4', '1', 'litters', 'Litters', 'trim|required|numeric');
INSERT INTO `sickness_value_definition` VALUES ('12', '5', '2', 'diseases', 'disease', 'trim');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sickness_value_dropdown_values
-- ----------------------------
INSERT INTO `sickness_value_dropdown_values` VALUES ('1', '1', 'scrotal');
INSERT INTO `sickness_value_dropdown_values` VALUES ('2', '1', ' inguinal');
INSERT INTO `sickness_value_dropdown_values` VALUES ('3', '1', ' abdominal');
INSERT INTO `sickness_value_dropdown_values` VALUES ('4', '1', ' ectopic');
INSERT INTO `sickness_value_dropdown_values` VALUES ('5', '5', 'scrotal');
INSERT INTO `sickness_value_dropdown_values` VALUES ('6', '5', ' inguinal');
INSERT INTO `sickness_value_dropdown_values` VALUES ('7', '5', ' abdominal');
INSERT INTO `sickness_value_dropdown_values` VALUES ('8', '5', ' ectopic');
INSERT INTO `sickness_value_dropdown_values` VALUES ('9', '9', 'in house');
INSERT INTO `sickness_value_dropdown_values` VALUES ('10', '9', ' kennel');
INSERT INTO `sickness_value_dropdown_values` VALUES ('11', '12', 'diabetes');
INSERT INTO `sickness_value_dropdown_values` VALUES ('12', '12', ' incontinence');
INSERT INTO `sickness_value_dropdown_values` VALUES ('13', '12', ' pyometra');

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of species
-- ----------------------------
INSERT INTO `species` VALUES ('1', 'Dog', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `species` VALUES ('2', 'Hamster', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of treatments_details
-- ----------------------------
INSERT INTO `treatments_details` VALUES ('1', '1', '230 ng/kg', '4', '', '2');
INSERT INTO `treatments_details` VALUES ('2', '2', '344', '3', '333', '3');

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
  CONSTRAINT `FK_tfs_species` FOREIGN KEY (`subspecies_id`) REFERENCES `species` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_tfs_treatments` FOREIGN KEY (`treatment_id`) REFERENCES `treatments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of treatments_for_sicknesses
-- ----------------------------
INSERT INTO `treatments_for_sicknesses` VALUES ('1', '1', '18', '1', null, null);
INSERT INTO `treatments_for_sicknesses` VALUES ('2', '1', '19', '1', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('21', 'Robert', 'nevermore84@hotmail.com', '$2y$10$qUjlEAUsf2.YjzPDC3Xgz.TaEdyafC9el8m11gD64qqcF2BlVL9FW', '0000-00-00 00:00:00', '');
INSERT INTO `users` VALUES ('22', 'Robert 2', 'robertb1984@gmail.com', '$2y$10$yRoGbeJdqWGXlHgtmxAXp.w.Zky5UsRRNFLxSL0EM8MYNPde7NjI6', '0000-00-00 00:00:00', '');
INSERT INTO `users` VALUES ('23', 'Roberttest1', 'test@testmail.com', '$2y$10$GMBovuqlBSRF5aeolBcgsuh/CNzrWnqElJQPug5UsgI7vMxdKIOby', '2017-06-27 00:13:41', '');
INSERT INTO `users` VALUES ('24', 'Roberttest2', 'test2@testmail.com', '$2y$10$EGFqfkFLB7EV20PZbRxXdO1vQBNpYPtGEmrGcyRBuGudtyy6VUh6.', '2017-06-27 00:14:45', '');
INSERT INTO `users` VALUES ('25', 'Leo', 'testmailLeo@test.com', '$2y$10$/aGzJXFSSqSYfhiefqRUlum/inWEmI8OO.8i/DmtzTRT1/RorIhsy', '2017-07-23 00:22:41', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of visit_block
-- ----------------------------
INSERT INTO `visit_block` VALUES ('1', '18', 'Right Testicle', '1');
INSERT INTO `visit_block` VALUES ('2', '18', 'Left Testicle', '1');
INSERT INTO `visit_block` VALUES ('4', '19', 'Vagina', '1');
INSERT INTO `visit_block` VALUES ('5', '19', 'Vaginal smear', '1');
INSERT INTO `visit_block` VALUES ('6', '19', 'Bloodtestresults', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of visit_value_definition
-- ----------------------------
INSERT INTO `visit_value_definition` VALUES ('1', '1', '2', 'right_testicle', 'Location', 'trim');
INSERT INTO `visit_value_definition` VALUES ('2', '1', '1', 'right_testicle_diameter', 'please enter Size(diameter): ', 'trim|required|numeric');
INSERT INTO `visit_value_definition` VALUES ('3', '1', '1', 'right_testiclelength', 'and length :', 'trim|required|numeric');
INSERT INTO `visit_value_definition` VALUES ('4', '1', '1', 'right_testicle_notes', 'please enter notes: ', 'trim');
INSERT INTO `visit_value_definition` VALUES ('5', '2', '2', 'Left_testicle_location', 'Location', 'trim');
INSERT INTO `visit_value_definition` VALUES ('6', '2', '1', 'Left_testicle_diameter', 'please enter Size(diameter)', 'trim|required|numeric');
INSERT INTO `visit_value_definition` VALUES ('7', '2', '1', 'Left_testicle_length', 'and length: ', 'trim|required|numeric');
INSERT INTO `visit_value_definition` VALUES ('8', '2', '1', 'left_testicle_notes', 'please enter notes:', 'trim');
INSERT INTO `visit_value_definition` VALUES ('16', '4', '2', 'Discharge', 'discharge', 'trim');
INSERT INTO `visit_value_definition` VALUES ('17', '4', '2', 'quality_of_discharge', 'quality', 'trim');
INSERT INTO `visit_value_definition` VALUES ('18', '4', '2', 'folds', 'vaginal folds', 'trim');
INSERT INTO `visit_value_definition` VALUES ('19', '5', '1', 'basalcells', 'basalcells(%)', 'trim|required|numeric');
INSERT INTO `visit_value_definition` VALUES ('20', '5', '1', 'para', 'parabasalcells(%)', 'trim|required|numeric');
INSERT INTO `visit_value_definition` VALUES ('21', '5', '1', 'intermediate', 'intermediatecells(%)', 'trim|required|numeric');
INSERT INTO `visit_value_definition` VALUES ('22', '5', '1', 'super', 'superficialcells(%)', 'trim|required|numeric');
INSERT INTO `visit_value_definition` VALUES ('23', '5', '2', 'WBC', 'WBC?!', 'trim');
INSERT INTO `visit_value_definition` VALUES ('24', '6', '1', 'oeastr', 'Oeastradiol(pmol/L)', 'trim|required|numeric');
INSERT INTO `visit_value_definition` VALUES ('25', '6', '1', 'Progesterone', 'Progesterone(nmol/L)', 'trim|required|numeric');
INSERT INTO `visit_value_definition` VALUES ('26', '6', '1', 'LH', 'LH(nmol/L)', 'trim|required|numeric');

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
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of visit_value_dropdown_values
-- ----------------------------
INSERT INTO `visit_value_dropdown_values` VALUES ('1', '1', 'scrotal');
INSERT INTO `visit_value_dropdown_values` VALUES ('2', '2', 'scrotal');
INSERT INTO `visit_value_dropdown_values` VALUES ('3', '3', 'scrotal');
INSERT INTO `visit_value_dropdown_values` VALUES ('4', '4', 'scrotal');
INSERT INTO `visit_value_dropdown_values` VALUES ('5', '1', ' inguinal');
INSERT INTO `visit_value_dropdown_values` VALUES ('6', '2', ' inguinal');
INSERT INTO `visit_value_dropdown_values` VALUES ('7', '3', ' inguinal');
INSERT INTO `visit_value_dropdown_values` VALUES ('8', '4', ' inguinal');
INSERT INTO `visit_value_dropdown_values` VALUES ('9', '1', ' abdominal');
INSERT INTO `visit_value_dropdown_values` VALUES ('10', '2', ' abdominal');
INSERT INTO `visit_value_dropdown_values` VALUES ('11', '3', ' abdominal');
INSERT INTO `visit_value_dropdown_values` VALUES ('12', '4', ' abdominal');
INSERT INTO `visit_value_dropdown_values` VALUES ('13', '1', ' ectopic');
INSERT INTO `visit_value_dropdown_values` VALUES ('14', '2', ' ectopic');
INSERT INTO `visit_value_dropdown_values` VALUES ('15', '3', ' ectopic');
INSERT INTO `visit_value_dropdown_values` VALUES ('16', '4', ' ectopic');
INSERT INTO `visit_value_dropdown_values` VALUES ('17', '5', 'scrotal');
INSERT INTO `visit_value_dropdown_values` VALUES ('18', '6', 'scrotal');
INSERT INTO `visit_value_dropdown_values` VALUES ('19', '7', 'scrotal');
INSERT INTO `visit_value_dropdown_values` VALUES ('20', '8', 'scrotal');
INSERT INTO `visit_value_dropdown_values` VALUES ('21', '5', ' inguinal');
INSERT INTO `visit_value_dropdown_values` VALUES ('22', '6', ' inguinal');
INSERT INTO `visit_value_dropdown_values` VALUES ('23', '7', ' inguinal');
INSERT INTO `visit_value_dropdown_values` VALUES ('24', '8', ' inguinal');
INSERT INTO `visit_value_dropdown_values` VALUES ('25', '5', ' abdominal');
INSERT INTO `visit_value_dropdown_values` VALUES ('26', '6', ' abdominal');
INSERT INTO `visit_value_dropdown_values` VALUES ('27', '7', ' abdominal');
INSERT INTO `visit_value_dropdown_values` VALUES ('28', '8', ' abdominal');
INSERT INTO `visit_value_dropdown_values` VALUES ('29', '5', ' ectopic');
INSERT INTO `visit_value_dropdown_values` VALUES ('30', '6', ' ectopic');
INSERT INTO `visit_value_dropdown_values` VALUES ('31', '7', ' ectopic');
INSERT INTO `visit_value_dropdown_values` VALUES ('32', '8', ' ectopic');
INSERT INTO `visit_value_dropdown_values` VALUES ('64', '16', 'yes');
INSERT INTO `visit_value_dropdown_values` VALUES ('65', '16', ' no');
INSERT INTO `visit_value_dropdown_values` VALUES ('66', '17', 'none');
INSERT INTO `visit_value_dropdown_values` VALUES ('67', '17', ' clear');
INSERT INTO `visit_value_dropdown_values` VALUES ('68', '17', ' semisanguineous');
INSERT INTO `visit_value_dropdown_values` VALUES ('69', '17', ' sanguineous');
INSERT INTO `visit_value_dropdown_values` VALUES ('70', '17', ' pus');
INSERT INTO `visit_value_dropdown_values` VALUES ('71', '18', '-');
INSERT INTO `visit_value_dropdown_values` VALUES ('72', '18', '+');
INSERT INTO `visit_value_dropdown_values` VALUES ('73', '18', '++');
INSERT INTO `visit_value_dropdown_values` VALUES ('74', '18', '+++');
INSERT INTO `visit_value_dropdown_values` VALUES ('75', '23', 'none');
INSERT INTO `visit_value_dropdown_values` VALUES ('76', '23', ' single');
INSERT INTO `visit_value_dropdown_values` VALUES ('77', '23', ' many');
