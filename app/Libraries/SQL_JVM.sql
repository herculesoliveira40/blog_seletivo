CREATE DATABASE if not exists Blog char set utf8;
USE Blog;


SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `blog`.`livros` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `descricao` VARCHAR(500) NOT NULL,
  `autor` VARCHAR(255) NOT NULL,
  `data_de_publicacao` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paginas` INT(11) NOT NULL,
  `imagem` VARCHAR(500) NULL DEFAULT NULL,
  `categoria` INT(11) NOT NULL,
  `autor_usuario` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `categoria_idx` (`categoria` ASC) VISIBLE,
  INDEX `autor_usuario_idx` (`autor_usuario` ASC) VISIBLE,
  CONSTRAINT `categoria_livro`
    FOREIGN KEY (`categoria`)
    REFERENCES `blog`.`categorias_livros` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `autor_usuario`
    FOREIGN KEY (`autor_usuario`)
    REFERENCES `blog`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `blog`.`categorias_livros` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `blog`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(255) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `blog`.`publicacoes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `descricao` VARCHAR(500) NOT NULL,
  `conteudo` VARCHAR(2000) NOT NULL,
  `data_de_publicacao` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imagem` VARCHAR(500) NOT NULL,
  `categoria` INT(11) NOT NULL,
  `autor_usuario` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `categoria_idx` (`categoria` ASC) VISIBLE,
  INDEX `autor_idx` (`autor_usuario` ASC) VISIBLE,
  CONSTRAINT `categoria_publicacao`
    FOREIGN KEY (`categoria`)
    REFERENCES `blog`.`categorias_publicacoes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `autor_publicacao`
    FOREIGN KEY (`autor_usuario`)
    REFERENCES `blog`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `blog`.`categorias_publicacoes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO `blog`.`categorias_publicacoes` (`id`, `nome`) VALUES ('1', 'AmorP');
INSERT INTO `blog`.`categorias_publicacoes` (`id`, `nome`) VALUES ('2', 'BiografiaP');
INSERT INTO `blog`.`categorias_livros` (`id`, `nome`) VALUES ('1', 'AmorL');
INSERT INTO `blog`.`categorias_livros` (`id`, `nome`) VALUES ('2', 'BiografiaL');
