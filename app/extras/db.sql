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
  `ativo` BOOLEAN NOT NULL DEFAULT true,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `senha` VARCHAR(64) NOT NULL,
  `apartamento_id_apartamento` INT NOT NULL,
  `telefone` VARCHAR(45) NULL,
  `telefone_dois` VARCHAR(45) NULL,
   `admin` BOOLEAN NOT NULL DEFAULT false,
  PRIMARY KEY (`id_morador`),
  INDEX `fk_morador_apartamento_idx` (`apartamento_id_apartamento` ASC),
  CONSTRAINT `fk_morador_apartamento`
    FOREIGN KEY (`apartamento_id_apartamento`)
    REFERENCES `festahub`.`apartamento` (`id_apartamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;


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
  `data_reserva` DATETIME NOT NULL,
  `ativo` BOOLEAN NOT NULL DEFAULT TRUE,
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

CREATE TABLE deletion_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    table_name VARCHAR(255) NOT NULL,
    record_id INT NOT NULL,
    deleted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    deleted_by VARCHAR(255),
    reason TEXT,
    ip_address VARCHAR(45)
);

INSERT INTO `festahub`.`apartamento` (`descricao`, `ativo`) VALUES 
('Apartamento 101', 1),
('Apartamento 102', 1),
('Apartamento 103', 1),
('Apartamento 104', 0),
('Apartamento 105', 1);

INSERT INTO `festahub`.`areas_lazer` (`nome`, `ativo`) VALUES 
('Piscina', 1),
('Salão de Festas', 1),
('Churrasqueira', 1),
('Quadra de Esportes', 1),
('Playground', 1),
('Sala de Jogos', 1),
('Cinema', 1);


INSERT INTO morador (
    email, email_dois, nome, cpf, ativo, senha, apartamento_id_apartamento, telefone, telefone_dois, admin
) VALUES (
    'joao.silva@example.com', 'joaosilva@gmail.com', 'João Silva', '123.456.789-00', 1, '$2y$10$1hCh7Vofa9dV2ISYXeURTeb5/m3rFytVF3FYabPnVZ3KhzGOLAeoW', 1, '11987654321', '11987654322', 1
);

-- admin
-- joao.silva@example.com
-- 123456