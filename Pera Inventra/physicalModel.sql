-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema photodb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema photodb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `photodb` DEFAULT CHARACTER SET utf8 ;
USE `photodb` ;

-- -----------------------------------------------------
-- Table `photodb`.`People`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `photodb`.`People` (
  `NIC` INT NOT NULL,
  `FirstName` VARCHAR(50) NULL,
  `LastName` VARCHAR(50) NULL,
  `ContactNo` VARCHAR(13) NULL,
  `JobType` VARCHAR(50) NULL,
  PRIMARY KEY (`NIC`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `photodb`.`Equipments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `photodb`.`Equipments` (
  `equipmentID` INT NOT NULL,
  `Price` FLOAT NULL,
  `Type` VARCHAR(45) NULL,
  `Model` VARCHAR(45) NULL,
  PRIMARY KEY (`equipmentID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `photodb`.`Equipment_sell`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `photodb`.`Equipment_sell` (
  `equipmentID` INT NOT NULL,
  `sellerID` INT NOT NULL,
  PRIMARY KEY (`equipmentID`, `sellerID`),
  CONSTRAINT `equipment_fk`
    FOREIGN KEY (`equipmentID`)
    REFERENCES `photodb`.`Equipments` (`equipmentID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `seller_fk`
    FOREIGN KEY (`sellerID`)
    REFERENCES `photodb`.`People` (`NIC`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `photodb`.`Courses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `photodb`.`Courses` (
  `courseID` INT NOT NULL,
  `price` INT NULL,
  `courseTitle` VARCHAR(45) NULL,
  `difficultyLevel` VARCHAR(5) NULL,
  `courseTeacher` INT NULL,
  PRIMARY KEY (`courseID`),
  CONSTRAINT `fk_teacher`
    FOREIGN KEY (`courseTeacher`)
    REFERENCES `photodb`.`People` (`NIC`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `photodb`.`Photo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `photodb`.`Photo` (
  `photoID` INT NOT NULL,
  `price` FLOAT NULL,
  `genere` VARCHAR(45) NULL,
  `photographerID` INT NULL,
  `Photocol` VARCHAR(45) NULL,
  PRIMARY KEY (`photoID`),
  CONSTRAINT `fk_photographer`
    FOREIGN KEY (`photographerID`)
    REFERENCES `photodb`.`People` (`NIC`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `photodb`.`Exhibitin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `photodb`.`Exhibitin` (
  `name` VARCHAR(50) NOT NULL,
  `venue` VARCHAR(45) NOT NULL,
  `date` DATE NULL,
  `organizerID` INT NOT NULL,
  PRIMARY KEY (`organizerID`),
  CONSTRAINT `fk_organizer`
    FOREIGN KEY (`organizerID`)
    REFERENCES `photodb`.`People` (`NIC`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `photodb`.`Participate_To_Exhibition`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `photodb`.`Participate_To_Exhibition` (
  `exhibitionOrganizerID` INT NOT NULL,
  `photoID` INT NOT NULL,
  PRIMARY KEY (`exhibitionOrganizerID`, `photoID`),
  CONSTRAINT `fk_exhibition`
    FOREIGN KEY (`exhibitionOrganizerID`)
    REFERENCES `photodb`.`Exhibitin` (`organizerID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_photo`
    FOREIGN KEY (`photoID`)
    REFERENCES `photodb`.`Photo` (`photoID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
