-- MySQL Script generated by MySQL Workbench
-- Sun May 26 12:28:19 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS mydb DEFAULT CHARACTER SET utf8 default collate utf8_general_ci;
USE mydb;

-- -----------------------------------------------------
-- Table `mydb`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS mydb.usuario(
  idusuario INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
  nome_usu VARCHAR(45) NOT NULL,
  usuario_usu VARCHAR(45) NOT NULL UNIQUE,
  telefone_usu VARCHAR(14) NOT NULL,
  endereco_usu VARCHAR(45) NOT NULL,
  cpf_usu VARCHAR(14) NOT NULL UNIQUE,
  rg_usu VARCHAR(14) NOT NULL UNIQUE,
  dat_nasc DATE NOT NULL,
  `email_usu` VARCHAR(45) NOT NULL,
  senha_usu VARCHAR(45) NOT NULL,
  PRIMARY KEY (idusuario)
)
ENGINE = InnoDB default character set utf8;


-- -----------------------------------------------------
-- Table `mydb`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`funcionario` (
  `idfuncionario` INT UNSIGNED NOT NULL UNIQUE AUTO_INCREMENT,
  `nome_fun` VARCHAR(45) NOT NULL,
  `usuario_fun` VARCHAR(45) NOT NULL UNIQUE,
  `telefone_fun` VARCHAR(14) NOT NULL,
  `endereco_fun` VARCHAR(45) NOT NULL,
  `cpf_fun` VARCHAR(14) NOT NULL UNIQUE,
  `rg_fun` VARCHAR(14) NOT NULL UNIQUE,
  `dat_nasc_fun` DATE NOT NULL,
   `email_fun` VARCHAR(55) NOT NULL,
  `registro_func` INT NOT NULL UNIQUE,
  `senha_func` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idfuncionario`)
  )
ENGINE = InnoDB default character set utf8;


-- -----------------------------------------------------
-- Table `mydb`.`relato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`relato` (
  `idrelato` INT UNSIGNED NOT NULL UNIQUE AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  `observ` TEXT NOT NULL,
  `estado` TINYINT(1) NOT NULL DEFAULT false,
  `usuario_idusuario` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idrelato`),
  INDEX `fk_relato_usuario_idx` (`usuario_idusuario`)  ,
  CONSTRAINT `fk_relato_usuario`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `mydb`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB default character set utf8;


-- -----------------------------------------------------
-- Table `mydb`.`usuario_has_funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuario_has_funcionario` (
  `usuario_idusuario` INT UNSIGNED NOT NULL,
  `funcionario_idfuncionario` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`usuario_idusuario`, `funcionario_idfuncionario`),
  INDEX `fk_usuario_has_funcionario_funcionario1_idx` (`funcionario_idfuncionario` )  ,
  INDEX `fk_usuario_has_funcionario_usuario1_idx` (`usuario_idusuario` )  ,
  CONSTRAINT `fk_usuario_has_funcionario_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `mydb`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_funcionario_funcionario1`
    FOREIGN KEY (`funcionario_idfuncionario`)
    REFERENCES `mydb`.`funcionario` (`idfuncionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB default character set utf8;

INSERT INTO `usuario` (`idusuario`, `nome_usu`, `usuario_usu`, `telefone_usu`, `endereco_usu`, `cpf_usu`, `rg_usu`, `dat_nasc`, `email_usu`, `senha_usu`)
 VALUES (NULL, 'admin', 'adm', '12341234', '3dfasd', '3241324123', '42345234', '2000-08-11', 'fadsfad@fadfads', '1234');

INSERT INTO `funcionario` (`idfuncionario`, `nome_fun`, `usuario_fun`, `telefone_fun`, `endereco_fun`, `cpf_fun`, `rg_fun`, `dat_nasc_fun`, `email_fun`, `senha_func`,registro_func)
 VALUES (NULL, 'funcionario', 'func', '12341234', '3dfasd', '3241324123', '42345234', '2000-08-11', 'fadsfad@fadfads', '1234','11111');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
