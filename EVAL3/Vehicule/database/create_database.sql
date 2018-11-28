-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema vtc
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema vtc
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `vtc` DEFAULT CHARACTER SET utf8 ;
USE `vtc` ;

-- -----------------------------------------------------
-- Table `vtc`.`conducteur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vtc`.`conducteur` (
  `id_conducteur` INT NOT NULL AUTO_INCREMENT,
  `prenom` VARCHAR(255) NOT NULL,
  `nom` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_conducteur`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vtc`.`vehicule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vtc`.`vehicule` (
  `id_vehicule` INT NOT NULL AUTO_INCREMENT,
  `marque` VARCHAR(255) NOT NULL,
  `modele` VARCHAR(255) NOT NULL,
  `couleur` VARCHAR(45) NULL,
  `immatriculation` VARCHAR(10) NULL,
  PRIMARY KEY (`id_vehicule`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `vtc`.`vehicule`  -- Démarrage à 501
-- -----------------------------------------------------
ALTER TABLE `vtc`.`vehicule` AUTO_INCREMENT=501;

-- -----------------------------------------------------
-- Table `vtc`.`association_vehicule_conducteur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vtc`.`association_vehicule_conducteur` (
  `id_association` INT NOT NULL AUTO_INCREMENT,
  `id_vehicule` INT NOT NULL,
  `id_conducteur` INT NOT NULL,
  PRIMARY KEY (`id_association`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
