CREATE TABLE `wf3_test`.`articles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `content` TEXT NOT NULL,
  `date_add` DATETIME NOT NULL,
  `author` VARCHAR(45) NOT NULL,
  `figure` TEXT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));
