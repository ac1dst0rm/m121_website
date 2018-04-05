-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`product_orgin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`product_orgin` (
  `orgin_id` INT(11) NOT NULL,
  `country_name` VARCHAR(50) NOT NULL,
  `country_shortcut` VARCHAR(3) NOT NULL,
  PRIMARY KEY (`orgin_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`product_producer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`product_producer` (
  `idproduct_producer_id` INT(11) NOT NULL AUTO_INCREMENT,
  `product_producer_name` VARCHAR(75) NOT NULL,
  `product_producer_phone` VARCHAR(20) NOT NULL,
  `product_producer_address` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idproduct_producer_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`product_variety`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`product_variety` (
  `product_variety_id` INT NOT NULL AUTO_INCREMENT,
  `product_name` VARCHAR(75) NOT NULL,
  `product_price` FLOAT(8,2) NOT NULL,
  `product_description` MEDIUMTEXT CHARACTER SET 'big5' COLLATE 'big5_chinese_ci' NOT NULL,
  `product_orgin_orgin_id` INT(11) NOT NULL,
  `product_img_path` VARCHAR(255) NOT NULL,
  `product_producer_idproduct_producer_id` INT(11) NOT NULL,
  PRIMARY KEY (`product_variety_id`),
  INDEX `fk_product_variety_product_orgin1_idx` (`product_orgin_orgin_id` ASC),
  INDEX `fk_product_variety_product_producer1_idx` (`product_producer_idproduct_producer_id` ASC),
  CONSTRAINT `fk_product_variety_product_orgin1`
    FOREIGN KEY (`product_orgin_orgin_id`)
    REFERENCES `mydb`.`product_orgin` (`orgin_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_variety_product_producer1`
    FOREIGN KEY (`product_producer_idproduct_producer_id`)
    REFERENCES `mydb`.`product_producer` (`idproduct_producer_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`client` (
  `client_id` INT NOT NULL,
  `client_prename` VARCHAR(45) NOT NULL,
  `client_name` VARCHAR(45) NOT NULL,
  `client_gender` ENUM('male', 'female', 'other') NOT NULL,
  `client_address` VARCHAR(45) NOT NULL,
  `client_type` ENUM('single', 'family', 'married') NOT NULL,
  `client_email` VARCHAR(75) NULL,
  PRIMARY KEY (`client_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`purchase`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`purchase` (
  `purchase_id` INT NOT NULL AUTO_INCREMENT,
  `client_client_id` INT NOT NULL,
  PRIMARY KEY (`purchase_id`),
  INDEX `fk_purchase_client1_idx` (`client_client_id` ASC),
  CONSTRAINT `fk_purchase_client1`
    FOREIGN KEY (`client_client_id`)
    REFERENCES `mydb`.`client` (`client_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`product` (
  `product_id` INT(11) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_number` INT(11) NOT NULL,
  `product_rfid` VARCHAR(12) NOT NULL,
  `product_variety_product_variety_id` INT NOT NULL,
  `purchase_purchase_id` INT NOT NULL,
  PRIMARY KEY (`product_id`),
  INDEX `fk_product_product_variety1_idx` (`product_variety_product_variety_id` ASC),
  INDEX `fk_product_purchase1_idx` (`purchase_purchase_id` ASC),
  CONSTRAINT `fk_product_product_variety1`
    FOREIGN KEY (`product_variety_product_variety_id`)
    REFERENCES `mydb`.`product_variety` (`product_variety_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_purchase1`
    FOREIGN KEY (`purchase_purchase_id`)
    REFERENCES `mydb`.`purchase` (`purchase_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`product_log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`product_log` (
  `product_log_id` INT(11) NOT NULL,
  `product_log_ts` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_product_id` INT(11) NOT NULL,
  PRIMARY KEY (`product_log_id`),
  INDEX `fk_product_log_product1_idx` (`product_product_id` ASC),
  CONSTRAINT `fk_product_log_product1`
    FOREIGN KEY (`product_product_id`)
    REFERENCES `mydb`.`product` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`product_analysis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`product_analysis` (
  `idproduct_analysis_id` INT NOT NULL AUTO_INCREMENT,
  `purchase_purchase_id` INT NOT NULL,
  PRIMARY KEY (`idproduct_analysis_id`, `purchase_purchase_id`),
  INDEX `fk_product_analysis_purchase1_idx` (`purchase_purchase_id` ASC),
  CONSTRAINT `fk_product_analysis_purchase1`
    FOREIGN KEY (`purchase_purchase_id`)
    REFERENCES `mydb`.`purchase` (`purchase_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
