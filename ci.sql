SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

--- DROP SCHEMA IF EXISTS `ci` ;
CREATE SCHEMA IF NOT EXISTS `ci` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `ci` ;

-- -----------------------------------------------------
-- Table `ci`.`seeker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ci`.`seeker` ;

CREATE  TABLE IF NOT EXISTS `ci`.`seeker` (
  `seeker_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(40) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `gender` VARCHAR(45) NOT NULL ,
  `date_of_birth` DATE NOT NULL ,
  `nationality` VARCHAR(45) NOT NULL ,
  `mobile_number` VARCHAR(45) NULL ,
  `role` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`seeker_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ci`.`value`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ci`.`value` ;

CREATE  TABLE IF NOT EXISTS `ci`.`value` (
  `value_id` INT(11) NOT NULL ,
  `value_name` VARCHAR(45) NOT NULL ,
  `value_symbol` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`value_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ci`.`seeker_value`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ci`.`seeker_value` ;

CREATE  TABLE IF NOT EXISTS `ci`.`seeker_value` (
  `value_id` INT(11) NOT NULL ,
  `seeker_id` INT(11) NOT NULL ,
  PRIMARY KEY (`value_id`, `seeker_id`) ,
  INDEX `fk_seeker_value_value` (`value_id` ASC) ,
  INDEX `fk_seeker_value_seeker1` (`seeker_id` ASC) ,
  CONSTRAINT `fk_seeker_value_value`
    FOREIGN KEY (`value_id` )
    REFERENCES `ci`.`value` (`value_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_seeker_value_seeker1`
    FOREIGN KEY (`seeker_id` )
    REFERENCES `ci`.`seeker` (`seeker_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ci`.`goal_category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ci`.`goal_category` ;

CREATE  TABLE IF NOT EXISTS `ci`.`goal_category` (
  `goal_cat_id` INT(11) NOT NULL ,
  `goal_category` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`goal_cat_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ci`.`goal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ci`.`goal` ;

CREATE  TABLE IF NOT EXISTS `ci`.`goal` (
  `seeker_goal_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `goal_desc` VARCHAR(45) NOT NULL ,
  `seeker_id` INT(11) NOT NULL ,
  `goal_cat_id` INT(11) NOT NULL ,
  `goal_set_date` DATE NULL ,
  `achievement_criteria` VARCHAR(100) NOT NULL ,
  `actual_end_date` DATE NULL ,
  `goal_completion_status` VARCHAR(30) NOT NULL ,
  PRIMARY KEY (`seeker_goal_id`) ,
  INDEX `fk_seeker_goal_seeker1` (`seeker_id` ASC) ,
  INDEX `fk_seeker_goal_goal_category1` (`goal_cat_id` ASC) ,
  CONSTRAINT `fk_seeker_goal_seeker1`
    FOREIGN KEY (`seeker_id` )
    REFERENCES `ci`.`seeker` (`seeker_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_seeker_goal_goal_category1`
    FOREIGN KEY (`goal_cat_id` )
    REFERENCES `ci`.`goal_category` (`goal_cat_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ci`.`activity`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ci`.`activity` ;

CREATE  TABLE IF NOT EXISTS `ci`.`activity` (
  `activity_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `start_date` DATE NOT NULL ,
  `end_date` DATE NULL ,
  `activity_name` VARCHAR(45) NOT NULL ,
  `activity_desc` VARCHAR(255) NOT NULL ,
  `seeker_goal_id` INT(11) NOT NULL ,
  `activity_status` VARCHAR(15) NOT NULL DEFAULT 'new' ,
  PRIMARY KEY (`activity_id`) ,
  INDEX `fk_activity_seeker_goal1` (`seeker_goal_id` ASC) ,
  CONSTRAINT `fk_activity_seeker_goal1`
    FOREIGN KEY (`seeker_goal_id` )
    REFERENCES `ci`.`goal` (`seeker_goal_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ci`.`mission`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ci`.`mission` ;

CREATE  TABLE IF NOT EXISTS `ci`.`mission` (
  `mission_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `mission_statement` VARCHAR(255) NOT NULL ,
  `seeker_id` INT(11) NOT NULL ,
  PRIMARY KEY (`mission_id`) ,
  INDEX `fk_mission_statement_seeker1` (`seeker_id` ASC) ,
  CONSTRAINT `fk_mission_statement_seeker1`
    FOREIGN KEY (`seeker_id` )
    REFERENCES `ci`.`seeker` (`seeker_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ci`.`code_of_arm`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ci`.`code_of_arm` ;

CREATE  TABLE IF NOT EXISTS `ci`.`code_of_arm` (
  `code_of_arm_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `shield` VARCHAR(255) NOT NULL ,
  `seeker_id` INT(11) NOT NULL ,
  `banner` VARCHAR(255) NOT NULL ,
  `crest` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`code_of_arm_id`) ,
  INDEX `fk_code_of_arm_seeker1` (`seeker_id` ASC) ,
  CONSTRAINT `fk_code_of_arm_seeker1`
    FOREIGN KEY (`seeker_id` )
    REFERENCES `ci`.`seeker` (`seeker_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ci`.`reminder`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ci`.`reminder` ;

CREATE  TABLE IF NOT EXISTS `ci`.`reminder` (
  `reminder_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `reminder_frequency` VARCHAR(45) NOT NULL ,
  `reminder_email` INT(11) NOT NULL ,
  `seeker_id` INT(11) NOT NULL ,
  PRIMARY KEY (`reminder_id`) ,
  INDEX `fk_reminder_seeker1` (`seeker_id` ASC) ,
  CONSTRAINT `fk_reminder_seeker1`
    FOREIGN KEY (`seeker_id` )
    REFERENCES `ci`.`seeker` (`seeker_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ci`.`test_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ci`.`test_type` ;

CREATE  TABLE IF NOT EXISTS `ci`.`test_type` (
  `test_type_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `test_type_desc` VARCHAR(255) NULL ,
  PRIMARY KEY (`test_type_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ci`.`test_result`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ci`.`test_result` ;

CREATE  TABLE IF NOT EXISTS `ci`.`test_result` (
  `result_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `PmB_score` INT(2) NOT NULL ,
  `PmG_score` INT(2) NOT NULL ,
  `PvB_score` INT(2) NOT NULL ,
  `PvG_score` INT(2) NOT NULL ,
  `PsB_score` INT(2) NOT NULL ,
  `PsG_score` INT(2) NOT NULL ,
  `test_type_id` INT(11) NOT NULL ,
  `seeker_id` INT(11) NOT NULL ,
  PRIMARY KEY (`result_id`) ,
  INDEX `fk_test_result_test_type1` (`test_type_id` ASC) ,
  INDEX `fk_test_result_seeker1` (`seeker_id` ASC) ,
  CONSTRAINT `fk_test_result_test_type1`
    FOREIGN KEY (`test_type_id` )
    REFERENCES `ci`.`test_type` (`test_type_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_test_result_seeker1`
    FOREIGN KEY (`seeker_id` )
    REFERENCES `ci`.`seeker` (`seeker_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ci`.`question`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ci`.`question` ;

CREATE  TABLE IF NOT EXISTS `ci`.`question` (
  `test_question_num` INT(11) NOT NULL AUTO_INCREMENT ,
  `question` VARCHAR(255) NOT NULL ,
  `test_type_id` INT(11) NOT NULL ,
  PRIMARY KEY (`test_question_num`) ,
  INDEX `fk_question_test_type1` (`test_type_id` ASC) ,
  CONSTRAINT `fk_question_test_type1`
    FOREIGN KEY (`test_type_id` )
    REFERENCES `ci`.`test_type` (`test_type_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ci`.`options`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ci`.`options` ;

CREATE  TABLE IF NOT EXISTS `ci`.`options` (
  `test_question_num` INT(11) NOT NULL ,
  `option` VARCHAR(255) NOT NULL ,
  `option_score` INT(1) NOT NULL ,
  PRIMARY KEY (`test_question_num`, `option`) ,
  INDEX `fk_options_question1` (`test_question_num` ASC) ,
  CONSTRAINT `fk_options_question1`
    FOREIGN KEY (`test_question_num` )
    REFERENCES `ci`.`question` (`test_question_num` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ci`.`motto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ci`.`motto` ;

CREATE  TABLE IF NOT EXISTS `ci`.`motto` (
  `motto_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `motto` VARCHAR(255) NOT NULL ,
  `seeker_id` INT(255) NOT NULL ,
  PRIMARY KEY (`motto_id`) ,
  INDEX `fk_motto_seeker1` (`seeker_id` ASC) ,
  CONSTRAINT `fk_motto_seeker1`
    FOREIGN KEY (`seeker_id` )
    REFERENCES `ci`.`seeker` (`seeker_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ci`.`article`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ci`.`article` ;

CREATE  TABLE IF NOT EXISTS `ci`.`article` (
  `article_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(45) NOT NULL ,
  `article` TEXT NOT NULL ,
  `date` DATE NOT NULL ,
  `admin_id` INT(11) NOT NULL ,
  PRIMARY KEY (`article_id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `ci`.`seeker`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ci`;
INSERT INTO `ci`.`seeker` (`seeker_id`, `email`, `password`, `name`, `gender`, `date_of_birth`, `nationality`, `mobile_number`, `role`) VALUES ('1', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'male', '2000-12-12', 'Singaporean', NULL, 'admin');
INSERT INTO `ci`.`seeker` (`seeker_id`, `email`, `password`, `name`, `gender`, `date_of_birth`, `nationality`, `mobile_number`, `role`) VALUES ('2', '92865@myrp.edu.sg', 'bdf2b5886415bd454aed575d9b8fb5fb6eb73a1e', 'wenjie', 'male', '2002-11-11', 'Singaporean', NULL, 'member');
INSERT INTO `ci`.`seeker` (`seeker_id`, `email`, `password`, `name`, `gender`, `date_of_birth`, `nationality`, `mobile_number`, `role`) VALUES ('3', '91149@myrp.edu.sg', 'bdf2b5886415bd454aed575d9b8fb5fb6eb73a1e', 'bowen', 'male', '2001-11-11', 'Singaporean', NULL, 'member');
INSERT INTO `ci`.`seeker` (`seeker_id`, `email`, `password`, `name`, `gender`, `date_of_birth`, `nationality`, `mobile_number`, `role`) VALUES ('4', '91348@myrp.edu.sg', 'bdf2b5886415bd454aed575d9b8fb5fb6eb73a1e', 'robin', 'male', '1999-11-11', 'Singaporean', NULL, 'member');
INSERT INTO `ci`.`seeker` (`seeker_id`, `email`, `password`, `name`, `gender`, `date_of_birth`, `nationality`, `mobile_number`, `role`) VALUES ('5', '91150@myrp.edu.sg', 'bdf2b5886415bd454aed575d9b8fb5fb6eb73a1e', 'ariansah', 'male', '2000-11-11', 'Singaporean', NULL, 'member');

COMMIT;

-- -----------------------------------------------------
-- Data for table `ci`.`value`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ci`;
INSERT INTO `ci`.`value` (`value_id`, `value_name`, `value_symbol`) VALUES ('1', 'Alert', 'web_images/value_symbol/Alert.jpg');
INSERT INTO `ci`.`value` (`value_id`, `value_name`, `value_symbol`) VALUES ('2', 'Cooperative', 'web_images/value_symbol/Cooperative.jpg');
INSERT INTO `ci`.`value` (`value_id`, `value_name`, `value_symbol`) VALUES ('3', 'Courage', 'web_images/value_symbol/Courage.jpg');
INSERT INTO `ci`.`value` (`value_id`, `value_name`, `value_symbol`) VALUES ('4', 'Farsighted', 'web_images/value_symbol/Farsighted.jpg');
INSERT INTO `ci`.`value` (`value_id`, `value_name`, `value_symbol`) VALUES ('5', 'Hardworking', 'web_images/value_symbol/Hardworking.jpg');
INSERT INTO `ci`.`value` (`value_id`, `value_name`, `value_symbol`) VALUES ('6', 'Loyalty', 'web_images/value_symbol/Loyalty.jpg');
INSERT INTO `ci`.`value` (`value_id`, `value_name`, `value_symbol`) VALUES ('7', 'Persistence', 'web_images/value_symbol/Persistence.jpg');
INSERT INTO `ci`.`value` (`value_id`, `value_name`, `value_symbol`) VALUES ('8', 'Smart', 'web_images/value_symbol/Smart.jpg');
INSERT INTO `ci`.`value` (`value_id`, `value_name`, `value_symbol`) VALUES ('9', 'Strong', 'web_images/value_symbol/Strong.jpg');

COMMIT;

-- -----------------------------------------------------
-- Data for table `ci`.`seeker_value`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ci`;
INSERT INTO `ci`.`seeker_value` (`value_id`, `seeker_id`) VALUES ('1', '1');
INSERT INTO `ci`.`seeker_value` (`value_id`, `seeker_id`) VALUES ('2', '1');
INSERT INTO `ci`.`seeker_value` (`value_id`, `seeker_id`) VALUES ('3', '1');
INSERT INTO `ci`.`seeker_value` (`value_id`, `seeker_id`) VALUES ('4', '1');
INSERT INTO `ci`.`seeker_value` (`value_id`, `seeker_id`) VALUES ('4', '2');
INSERT INTO `ci`.`seeker_value` (`value_id`, `seeker_id`) VALUES ('5', '2');
INSERT INTO `ci`.`seeker_value` (`value_id`, `seeker_id`) VALUES ('6', '2');
INSERT INTO `ci`.`seeker_value` (`value_id`, `seeker_id`) VALUES ('7', '2');

COMMIT;

-- -----------------------------------------------------
-- Data for table `ci`.`goal_category`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ci`;
INSERT INTO `ci`.`goal_category` (`goal_cat_id`, `goal_category`) VALUES ('1', 'Family');
INSERT INTO `ci`.`goal_category` (`goal_cat_id`, `goal_category`) VALUES ('2', 'Career');
INSERT INTO `ci`.`goal_category` (`goal_cat_id`, `goal_category`) VALUES ('3', 'Educational');
INSERT INTO `ci`.`goal_category` (`goal_cat_id`, `goal_category`) VALUES ('4', 'Spiritual');
INSERT INTO `ci`.`goal_category` (`goal_cat_id`, `goal_category`) VALUES ('5', 'Financial');
INSERT INTO `ci`.`goal_category` (`goal_cat_id`, `goal_category`) VALUES ('6', 'Social');
INSERT INTO `ci`.`goal_category` (`goal_cat_id`, `goal_category`) VALUES ('7', 'Physical');

COMMIT;

-- -----------------------------------------------------
-- Data for table `ci`.`goal`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ci`;
INSERT INTO `ci`.`goal` (`seeker_goal_id`, `goal_desc`, `seeker_id`, `goal_cat_id`, `goal_set_date`, `achievement_criteria`, `actual_end_date`, `goal_completion_status`) VALUES ('1', 'Family Goal Desc', '2', '1', '2011-07-25', 'No criteria', NULL, 'Active');

COMMIT;

-- -----------------------------------------------------
-- Data for table `ci`.`activity`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ci`;
INSERT INTO `ci`.`activity` (`activity_id`, `start_date`, `end_date`, `activity_name`, `activity_desc`, `seeker_goal_id`, `activity_status`) VALUES ('1', '2011-07-25', NULL, 'Family Goal Activity Name', 'Family Goal Activity Desc', '1', 'new');

COMMIT;

-- -----------------------------------------------------
-- Data for table `ci`.`mission`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ci`;
INSERT INTO `ci`.`mission` (`mission_id`, `mission_statement`, `seeker_id`) VALUES ('1', 'My mission statement', '1');
INSERT INTO `ci`.`mission` (`mission_id`, `mission_statement`, `seeker_id`) VALUES ('2', 'Wenjie mission statement', '2');

COMMIT;

-- -----------------------------------------------------
-- Data for table `ci`.`code_of_arm`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ci`;
INSERT INTO `ci`.`code_of_arm` (`code_of_arm_id`, `shield`, `seeker_id`, `banner`, `crest`) VALUES ('1', 'web_images/coa_image/shield/coa12.jpg', '1', 'web_images/coa_image/banner/banner1.png', 'web_images/coa_image/crest/crest6.jpg');
INSERT INTO `ci`.`code_of_arm` (`code_of_arm_id`, `shield`, `seeker_id`, `banner`, `crest`) VALUES ('2', 'web_images/coa_image/shield/coa12.jpg', '2', 'web_images/coa_image/banner/banner1.png', 'web_images/coa_image/crest/crest6.jpg');

COMMIT;

-- -----------------------------------------------------
-- Data for table `ci`.`reminder`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ci`;
INSERT INTO `ci`.`reminder` (`reminder_id`, `reminder_frequency`, `reminder_email`, `seeker_id`) VALUES ('1', 'daily', '1', '1');
INSERT INTO `ci`.`reminder` (`reminder_id`, `reminder_frequency`, `reminder_email`, `seeker_id`) VALUES ('2', 'daily', '1', '2');

COMMIT;

-- -----------------------------------------------------
-- Data for table `ci`.`test_type`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ci`;
INSERT INTO `ci`.`test_type` (`test_type_id`, `test_type_desc`) VALUES ('1', 'There is evidence that the ASQ is a predictor of depression, physical health, and achievement in various domains including academics, work, and sports.  The test was designed by eminent psychologist Dr Martin Seligman who is a pioneer n the field of positive psychology.  Dr Martin Seligman is an author as well as director of the Positive Psychology Center at the University of Pennsylvania. ');

COMMIT;

-- -----------------------------------------------------
-- Data for table `ci`.`test_result`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ci`;
INSERT INTO `ci`.`test_result` (`result_id`, `PmB_score`, `PmG_score`, `PvB_score`, `PvG_score`, `PsB_score`, `PsG_score`, `test_type_id`, `seeker_id`) VALUES ('1', '5', '5', '5', '5', '5', '5', '1', '2');

COMMIT;

-- -----------------------------------------------------
-- Data for table `ci`.`question`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ci`;
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('1', 'The project you are in charge of is a great success.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('2', 'You and your spouse (boyfriend/girlfriend) make up after a fight.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('3', 'You get lost driving to a friend\'s house.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('4', 'Your spouse (boyfriend/girlfriend) surprises you with a gift.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('5', 'You forget your spouse\'s (boyfriend\'\'s/girlfriend\'s) birthday.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('6', 'You get a flower from a secret admirer.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('7', 'You run for a community office position and you win.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('8', 'You miss an important engagement.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('9', 'You run for a community office position and you lose.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('10', 'You host a successful dinner.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('11', 'You stop a crime by calling the police.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('12', 'You were extremely healthy all year.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('13', 'You owe the library ten dollars for an overdue book.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('14', 'Your stocks made you a lot of money.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('15', 'You win an athletic contest.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('16', 'You fail an important examination.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('17', 'You prepared a special meal for a friend and he/she barely touched the food.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('18', 'You lose a sporting event for which you have been training for a long time.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('19', 'Your car runs out of gas on a dark street late at night.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('20', 'You lose your temper with a friend.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('21', 'You are penalized for not returning your income-tax forms on time.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('22', 'You ask a person out on a date and he/she says no.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('23', 'A game-show host picks you out on the audience to participate in the show.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('24', 'You are frequently asked to dance at a party.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('25', 'You buy your spouse (boyfriend/girlfriend) a gift and he/she doesn\'t like it.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('26', 'You do exceptionally well in a job interview.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('27', 'You tell a joke and everyone laughs.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('28', 'Your boss gives you too little time in which to inish a project, but you get it finished anyway.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('29', 'You\'ve been feeling run-down lately.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('30', 'You ask someone to dance and he/she says no.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('31', 'You save a person from choking to death.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('32', 'Your romantic partner wants to cool things off for a while.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('33', 'A friend says something that hurts your feelings.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('34', 'Your employer comes to you for advice.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('35', 'A friend thanks you for helping him/her get through a bad time.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('36', 'You have a wonderful time at a party.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('37', 'Your doctor tells you that you are in good physical shape.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('38', 'Your spouse (boyfriend/girlfriend) takes you away for a romantic weekend.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('39', 'Your doctors tell you that you eat too much sugar.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('40', 'You are asked to head an important project.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('41', 'You and your spouse (boyfriend/girlfriend) have been fighting a great deal.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('42', 'You fall down a great deal while skiing.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('43', 'You win a prestigious award.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('44', 'Your stocks are at an all-time low.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('45', 'You win the lottery.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('46', 'You gain weight over the holidays and you can\'t lose it.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('47', 'You are in the hospital and few people come to visit.', '1');
INSERT INTO `ci`.`question` (`test_question_num`, `question`, `test_type_id`) VALUES ('48', 'They won\'t honor your credit card at a store.', '1');

COMMIT;

-- -----------------------------------------------------
-- Data for table `ci`.`options`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ci`;
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('1', 'Everyone devoted a lot of time and energy to it.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('1', 'I kept a close watch over everyone\'s work.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('2', 'I forgave him/her.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('2', 'I\'m usually forgiving.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('3', 'I missed a turn.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('3', 'My friend gave me bad directions.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('4', 'He/she just got a raise at work.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('4', 'I took him/her out to a special dinner the night before.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('5', 'I was preoccupied with other things.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('5', 'I\'m not good at remembering birthdays.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('6', 'I am a popular person.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('6', 'I am attractive to him/her.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('7', 'I devote a lot of time and energy to campaigning.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('7', 'I work very hard at everything I do.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('8', 'I sometimes forget to check my appointment book.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('8', 'Sometimes my memory fails me.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('9', 'I didn\'t campaign hard enough.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('9', 'The person who won knew more people.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('10', 'I am a good host.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('10', 'I was particularly charming that night.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('11', 'A strange noise caught my attention.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('11', 'I was alert that day.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('12', 'Few people around me were sick, so I wasn\'t exposed.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('12', 'I made sure I ate well and got enough rest.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('13', 'I was so involved in writing the report that I forgot to return the book.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('13', 'When I am really involved in what I am reading, I often forget when it\'s due.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('14', 'My broker decided to take on something new.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('14', 'My broker is a top-notch investor.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('15', 'I train hard.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('15', 'I was feeling unbeatable.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('16', 'I didn\'\'t prepare for it well.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('16', 'I wasn\'t as smart as other people taking the exam.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('17', 'I made the meal in a rush.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('17', 'I wasn\'t a good cook.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('18', 'I\'m not good at that sport.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('18', 'I\'m not very athletic.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('19', 'I didn\'t check to see how much gas was in the tank.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('19', 'The gas gauge was broken.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('20', 'He/she is always nagging at me.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('20', 'He/she was in a hostile mood.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('21', 'I always put off doing my taxes.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('21', 'I was lazy about getting my taxes done this year.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('22', 'I got tongue-tied when I asked him/her on the date.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('22', 'I was a wreck that day.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('23', 'I looked the most enthusiastic.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('23', 'I was sitting in the right seat.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('24', 'I am outgoing at parties.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('24', 'I was in perfect form that night.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('25', 'He/she has very picky tastes.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('25', 'I don\'t put enough thought into things like that.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('26', 'I felt extremely confident during the interview.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('26', 'I interview well.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('27', 'My timing was perfect.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('27', 'The joke was funny.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('28', 'I am an efficient person.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('28', 'I am good at my job.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('29', 'I never get a chance to relax.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('29', 'I was exceptionally busy this week.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('30', 'He/she doesn\'t like to dance.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('30', 'I am not a good enough dancer.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('31', 'I know a technique to stop someone from choking.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('31', 'I know what to do in crisis situations.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('32', 'I don\'t spend enough time with him/her.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('32', 'I\'m too self-centered.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('33', 'My friend was in a bad mood and took it out on me.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('33', 'She always blurts things out without thinking of others.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('34', 'I am an expert in the area about which I was asked.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('34', 'I am good at giving useful advice.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('35', 'I care about people.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('35', 'I enjoy helping him/her through tough times.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('36', 'Everyone was friendly.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('36', 'I was friendly.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('37', 'I am very health-conscious.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('37', 'I make sure I exercise frequently.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('38', 'He/she likes to explore new areas.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('38', 'He/she needed to get away for a few days.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('39', 'I don\'t pay much attention to my diet.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('39', 'You can\'t avoid sugar, it\'s in everything.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('40', 'I am a good supervisor.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('40', 'I just successfully completed a similar project.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('41', 'He/she has been hostile lately.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('41', 'I have been feeling cranky and pressured lately.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('42', 'Skiing is difficult.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('42', 'The trails were icy.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('43', 'I solved an important problem.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('43', 'I was the best employee.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('44', 'I didn\'\'t know much about the business climate at that time.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('44', 'I made a poor choice of stocks.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('45', 'I picked the right numbers.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('45', 'It was pure chance.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('46', 'Diets don\'t work in the long run.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('46', 'The diet I tried didn\'t work.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('47', 'I\'m irritable when I am sick.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('47', 'My friends are negligent about things like that.', '0');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('48', 'I sometimes forget to pay my credit-card bill.', '1');
INSERT INTO `ci`.`options` (`test_question_num`, `option`, `option_score`) VALUES ('48', 'I sometimes overestimate how much money I have.', '0');

COMMIT;

-- -----------------------------------------------------
-- Data for table `ci`.`motto`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ci`;
INSERT INTO `ci`.`motto` (`motto_id`, `motto`, `seeker_id`) VALUES ('1', 'This is my motto', '1');
INSERT INTO `ci`.`motto` (`motto_id`, `motto`, `seeker_id`) VALUES ('2', 'Wenjie motto', '2');

COMMIT;

-- -----------------------------------------------------
-- Data for table `ci`.`article`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ci`;
INSERT INTO `ci`.`article` (`article_id`, `title`, `article`, `date`, `admin_id`) VALUES ('1', 'Article title', 'Article article data', '2011-07-25', '1');

COMMIT;
