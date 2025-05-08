-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24-Nov-2023 às 10:46
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `helpfast`
--
CREATE DATABASE IF NOT EXISTS `helpfast` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `helpfast`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms`
--

DROP TABLE IF EXISTS `adms`;
CREATE TABLE IF NOT EXISTS `adms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(55) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `tipo` varchar(25) DEFAULT NULL,
  `situacao` varchar(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `adms`
--

INSERT INTO `adms` (`id`, `nome`, `email`, `senha`, `tipo`, `situacao`) VALUES
(1, 'João Vitor dos Reis ', 'joaoreis.vitor2016@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivos`
--

DROP TABLE IF EXISTS `arquivos`;
CREATE TABLE IF NOT EXISTS `arquivos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomeArq` varchar(500) DEFAULT NULL,
  `materia` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `arquivos`
--

INSERT INTO `arquivos` (`id`, `nomeArq`, `materia`) VALUES
(1, '../../BACK_END_PHP/arquivos/Arquivos Converts/braille.txt', 'geografia'),
(2, '../../BACK_END_PHP/arquivos/Arquivos Converts/braille (2).txt', 'geografia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

DROP TABLE IF EXISTS `contato`;
CREATE TABLE IF NOT EXISTS `contato` (
  `idCot` int NOT NULL AUTO_INCREMENT,
  `email` varchar(55) DEFAULT NULL,
  `comentario` varchar(500) DEFAULT NULL,
  `tipo_coment` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idCot`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`idCot`, `email`, `comentario`, `tipo_coment`) VALUES
(1, 'joaoreis.vitor2016@gmail.com', 'COMO ISSO FUNCIONOU??', 'Dúvida'),
(2, 'joaoreis.vitor2016@gmail.com', 'FODA', 'Opnião');

-- --------------------------------------------------------

--
-- Estrutura da tabela `edit_postagens`
--

DROP TABLE IF EXISTS `edit_postagens`;
CREATE TABLE IF NOT EXISTS `edit_postagens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(55) DEFAULT NULL,
  `texto` varchar(255) DEFAULT NULL,
  `local_pag` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registrar`
--

DROP TABLE IF EXISTS `registrar`;
CREATE TABLE IF NOT EXISTS `registrar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(55) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `escola` varchar(225) DEFAULT NULL,
  `ano_matricula` varchar(25) DEFAULT NULL,
  `tipo` varchar(25) DEFAULT NULL,
  `situacao` varchar(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `registrar`
--
select * from adms;

INSERT INTO `registrar` (`id`, `nome`, `email`, `senha`, `escola`, `ano_matricula`, `tipo`, `situacao`) VALUES
(1, 'team79', 'katiaevaldir321@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Etec São Jose', '2020', 'professor', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
