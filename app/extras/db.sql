DROP DATABASE festahub;
CREATE SCHEMA IF NOT EXISTS `festahub` DEFAULT CHARACTER SET utf8 ;
USE `festahub` ;

-- -----------------------------------------------------
-- Table `festahub`.`apartamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `festahub`.`apartamento` (
  `id_apartamento` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(40) NOT NULL,
  `ativo` TINYINT NULL,
  PRIMARY KEY (`id_apartamento`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `festahub`.`morador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `festahub`.`morador` (
  `id_morador` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `email_dois` VARCHAR(255) NULL,
  `nome` VARCHAR(255) NOT NULL,
  `cpf` VARCHAR(15) NOT NULL,
  `ativo` BOOLEAN,
  `created_at` DATETIME NULL,
  `senha` VARCHAR(64) NOT NULL,
  `apartamento_id_apartamento` INT NOT NULL,
  `telefone` VARCHAR(45) NULL,
  `telefone_dois` VARCHAR(45) NULL,
  PRIMARY KEY (`id_morador`),
  INDEX `fk_morador_apartamento_idx` (`apartamento_id_apartamento` ASC) VISIBLE,
  CONSTRAINT `fk_morador_apartamento`
    FOREIGN KEY (`apartamento_id_apartamento`)
    REFERENCES `festahub`.`apartamento` (`id_apartamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `festahub`.`areas_lazer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `festahub`.`areas_lazer` (
  `id_areas_lazer` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `ativo` TINYINT NULL,
  PRIMARY KEY (`id_areas_lazer`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `festahub`.`reservas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `festahub`.`reservas` (
  `id_reservas` INT NOT NULL AUTO_INCREMENT,
  `id_morador` INT NOT NULL,
  `id_apartamento` INT NOT NULL,
  `id_areas_lazer` INT NOT NULL,
  PRIMARY KEY (`id_reservas`),
  INDEX `fk_reservas_morador1_idx` (`id_morador` ASC) VISIBLE,
  INDEX `fk_reservas_apartamento1_idx` (`id_apartamento` ASC) VISIBLE,
  INDEX `fk_reservas_areas_lazer1_idx` (`id_areas_lazer` ASC) VISIBLE,
  CONSTRAINT `fk_reservas_morador1`
    FOREIGN KEY (`id_morador`)
    REFERENCES `festahub`.`morador` (`id_morador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservas_apartamento1`
    FOREIGN KEY (`id_apartamento`)
    REFERENCES `festahub`.`apartamento` (`id_apartamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservas_areas_lazer1`
    FOREIGN KEY (`id_areas_lazer`)
    REFERENCES `festahub`.`areas_lazer` (`id_areas_lazer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `festahub`.`login_logs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NULL,
  `username` VARCHAR(255) NOT NULL,
  `success` BOOLEAN NOT NULL,
  `ip_address` VARCHAR(45) NOT NULL,
  `attempt_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_login_logs_user_id_idx` (`user_id` ASC),
  CONSTRAINT `fk_login_logs_user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `festahub`.`morador` (`id_morador`)
    ON DELETE SET NULL
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `festahub`.`login_attempts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NULL,
  `ip_address` VARCHAR(45) NOT NULL,
  `success` BOOLEAN NOT NULL,
  `attempt_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_login_attempts_user_id_idx` (`user_id` ASC),
  CONSTRAINT `fk_login_attempts_user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `festahub`.`morador` (`id_morador`)
    ON DELETE SET NULL
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO `festahub`.`apartamento` (`descricao`, `ativo`) VALUES 
('Apartamento 101', 1),
('Apartamento 102', 1),
('Apartamento 103', 1),
('Apartamento 104', 0),
('Apartamento 105', 1);


INSERT INTO `festahub`.`morador` (`email`, `email_dois`, `nome`, `cpf`, `ativo`, `created_at`, `senha`, `apartamento_id_apartamento`, `telefone`, `telefone_dois`) VALUES 
('joao.silva@example.com', 'joaosilva@gmail.com', 'João Silva', '123.456.789-00', 1, '2023-01-01 10:00:00', '$2y$10$E9bU/jCl7FzR/8O4bF6eU.WxG8GyyTtbfThptph/HL8X8u9PvX6yW', 1, '11987654321', '11987654322'),
('maria.oliveira@example.com', NULL, 'Maria Oliveira', '987.654.321-00', 1, '2023-02-15 14:30:00', '$2y$10$0hmd3d9IeeOKCFOUOKrP2OhR1Uth84NRW1Vh64e5xA.VY6Iv9S9O.', 2, '11987654323', NULL),
('carlos.souza@example.com', 'carlossouza@hotmail.com', 'Carlos Souza', '456.789.123-00', 1, '2023-03-10 09:20:00', '$2y$10$7j6eIhU5dNptt1C2jVX3p.pq15RgJWIoX8F5RmnLzwuLCRLDr8SgG', 3, '11987654324', '11987654325'),
('ana.pereira@example.com', NULL, 'Ana Pereira', '321.654.987-00', 0, '2023-04-25 17:45:00', '$2y$10$5QPRq6kK6C6q5I1cJd1I/uF.Rplb9O.hKxW8vfpplLZt5mGkDQR2y', 4, '11987654326', NULL),
('fernando.almeida@example.com', 'fernandoalmeida@yahoo.com', 'Fernando Almeida', '789.123.456-00', 1, '2023-05-05 11:00:00', '$2y$10$6WdKwlXbV7RlQ15gU9O/FuNzf3vNxu7i0Q9mKf.SZ6t59Axl7AGG.', 5, '11987654327', '11987654328');
