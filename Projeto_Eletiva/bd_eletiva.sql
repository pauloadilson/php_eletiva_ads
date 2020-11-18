-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 17-Nov-2020 às 22:08
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `eletiva_web`
--
CREATE DATABASE IF NOT EXISTS `eletiva_web` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `eletiva_web`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estudos`
--

DROP TABLE IF EXISTS `estudos`;
CREATE TABLE IF NOT EXISTS `estudos` (
  `idEstudo` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(90) DEFAULT NULL,
  `descricao` text,
  `Usuarios_idPesquisadorPrincipal` int DEFAULT NULL,
  PRIMARY KEY (`idEstudo`),
  KEY `fk_Estudos_Usuarios1_idx` (`Usuarios_idPesquisadorPrincipal`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estudos`
--

INSERT INTO `estudos` (`idEstudo`, `titulo`, `descricao`, `Usuarios_idPesquisadorPrincipal`) VALUES
(1, 'Estudo de Validação da NumLine', 'Estudo de validação da Numline em crianças de 7 a 12 anos.', 46),
(2, 'Avaliação da NumLine em crianças com epilepsia', 'Avaliação da linha numérica mental em crianças com epilepsia.', 43),
(31, 'Avaliação de crianças com HIV', 'Avaliação neuropsicológica de crianças infectadas pelo hiv', 44);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
  `idGrupo` int NOT NULL AUTO_INCREMENT,
  `Estudos_idEstudo` int NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idGrupo`,`Estudos_idEstudo`),
  KEY `fk_Grupos_Estudos1_idx` (`Estudos_idEstudo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`idGrupo`, `Estudos_idEstudo`, `nome`) VALUES
(1, 1, 'Controle'),
(2, 1, 'Dislexia'),
(3, 1, 'Discalculia'),
(4, 2, 'Controle'),
(5, 2, 'Experimental'),
(9, 31, 'Controle'),
(10, 31, 'Assintomáticas'),
(11, 31, 'Sintomáticas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicoesensino`
--

DROP TABLE IF EXISTS `instituicoesensino`;
CREATE TABLE IF NOT EXISTS `instituicoesensino` (
  `idInstituicaoEnsino` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `TipoDeUsuario_idTipoUsuario` int DEFAULT NULL,
  PRIMARY KEY (`idInstituicaoEnsino`),
  KEY `fk_InstituicoesEnsino_TipoUsuarios_idx` (`TipoDeUsuario_idTipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `instituicoesensino`
--

INSERT INTO `instituicoesensino` (`idInstituicaoEnsino`, `nome`, `cidade`, `pais`, `TipoDeUsuario_idTipoUsuario`) VALUES
(38, 'UNESP / FCL Assis', 'Assis-SP', 'Brasil', 1),
(40, 'EE Com. Tannel Abbud', 'Presidente Prudente-SP', 'Brasil', 4),
(58, 'EE Dr. José Foz', 'Presidente Prudente', 'Brasil', 4),
(59, 'UNIFESP', 'São Paulo-SP', 'Brasil', 2),
(60, 'FATEC', 'Presidente Prudente-SP', 'Brasil', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `participantes`
--

DROP TABLE IF EXISTS `participantes`;
CREATE TABLE IF NOT EXISTS `participantes` (
  `idParticipante` int NOT NULL AUTO_INCREMENT,
  `InstituicoesEnsino_idInstituicaoEnsino` int NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `primeiroResponsavel` varchar(45) DEFAULT NULL,
  `segundoResponsavel` varchar(45) DEFAULT NULL,
  `telefone` varchar(25) DEFAULT NULL,
  `TipoDeUsuario_idTipoUsuario` int DEFAULT '4',
  PRIMARY KEY (`idParticipante`),
  KEY `fk_Participantes_InstituicoesEnsino1_idx` (`InstituicoesEnsino_idInstituicaoEnsino`),
  KEY `fk_Participantes_TipoDeUsuarios1_idx` (`TipoDeUsuario_idTipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `participantes`
--

INSERT INTO `participantes` (`idParticipante`, `InstituicoesEnsino_idInstituicaoEnsino`, `nome`, `dataNascimento`, `pais`, `primeiroResponsavel`, `segundoResponsavel`, `telefone`, `TipoDeUsuario_idTipoUsuario`) VALUES
(1, 58, 'Paulo Adilson da Silva', '1986-04-14', 'Brasil', 'Pai', 'Mae', '18996660363', 4),
(2, 38, 'Agusto dos Anjos', '2012-01-06', 'Brasil', 'Pai', 'Mae', '18996660363', 4),
(5, 40, 'João da Silva', '2010-11-09', 'Brasil', 'Paulo da Silva', 'Maria da Silva', '(18) 99666-0363', 4),
(6, 40, 'Maria dos Santos', '2011-11-10', 'Brasil', 'José dos Santos', 'Dulce dos Santos', '(18) 99111-5263', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessaodeteste`
--

DROP TABLE IF EXISTS `sessaodeteste`;
CREATE TABLE IF NOT EXISTS `sessaodeteste` (
  `idSessaoTeste` int NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `anoEscolar` int DEFAULT NULL,
  `idadeParticipante` int DEFAULT NULL,
  `numeroSessao` int DEFAULT NULL,
  `Usuarios_idUsuario` int NOT NULL,
  `Participantes_idParticipante` int NOT NULL,
  `idSessaoAnterior` int DEFAULT NULL,
  `Estudos_idEstudo` int NOT NULL,
  `Grupos_idGrupo` int NOT NULL,
  PRIMARY KEY (`idSessaoTeste`),
  KEY `fk_SessaoTeste_Usuarios1_idx` (`Usuarios_idUsuario`),
  KEY `fk_SessaoTeste_Participantes1_idx` (`Participantes_idParticipante`),
  KEY `fk_SessaoTeste_SessaoTeste1_idx` (`idSessaoAnterior`),
  KEY `fk_SessaoTeste_Estudos1_idx` (`Estudos_idEstudo`),
  KEY `fk_SessaoTeste_Grupos1_idx` (`Grupos_idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sessaodeteste`
--

INSERT INTO `sessaodeteste` (`idSessaoTeste`, `data`, `anoEscolar`, `idadeParticipante`, `numeroSessao`, `Usuarios_idUsuario`, `Participantes_idParticipante`, `idSessaoAnterior`, `Estudos_idEstudo`, `Grupos_idGrupo`) VALUES
(8, '2020-11-13', 5, 10, 1, 43, 5, NULL, 2, 5),
(9, '2020-11-13', 4, 9, 1, 43, 6, NULL, 2, 4),
(30, '2020-11-13', 4, 34, 1, 43, 1, NULL, 1, 1),
(31, '2020-11-13', 4, 34, 1, 43, 2, NULL, 1, 2),
(48, '2020-11-16', 3, 8, 1, 43, 2, NULL, 2, 5),
(49, '2020-11-16', 6, 34, 1, 43, 1, NULL, 1, 3),
(50, '2020-11-16', 6, 34, 1, 43, 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipodeusuario`
--

DROP TABLE IF EXISTS `tipodeusuario`;
CREATE TABLE IF NOT EXISTS `tipodeusuario` (
  `idTipoUsuario` int NOT NULL AUTO_INCREMENT,
  `tipoUsuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`idTipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipodeusuario`
--

INSERT INTO `tipodeusuario` (`idTipoUsuario`, `tipoUsuario`) VALUES
(1, 'Pesquisador'),
(2, 'Avaliador'),
(4, 'Participante');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `InstituicoesEnsino_idInstituicaoEnsino` int NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `TipoDeUsuario_idTipoUsuario` int DEFAULT NULL,
  `hashSenha` text,
  `telefone` varchar(25) DEFAULT NULL,
  `tipoDoc` varchar(45) DEFAULT NULL,
  `numeroDoc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_Usuarios_InstituicoesEnsino1_idx` (`InstituicoesEnsino_idInstituicaoEnsino`),
  KEY `fk_Usuarios_TipoDeUsuarios1_idx` (`TipoDeUsuario_idTipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `InstituicoesEnsino_idInstituicaoEnsino`, `nome`, `pais`, `email`, `TipoDeUsuario_idTipoUsuario`, `hashSenha`, `telefone`, `tipoDoc`, `numeroDoc`) VALUES
(40, 59, 'Maria de Lourdes', 'Brasil', 'maria@gmail.com', 2, '$argon2i$v=19$m=65536,t=4,p=1$Lk9SQ0U5UC5VZlZzcjlrNw$a1MA7g74kqQv0bNHhT+u40HkVWRKTOUH58H5P+RYUSY', '(18) 99954-1234', 'CPF', '56.789.123-00'),
(41, 59, 'Paulo Adilson da Silva', 'Brasil', 'pauloadilson@gmail.com', 2, '$argon2i$v=19$m=65536,t=4,p=1$ZVlKaEc3R3hreklRS25vNw$H8Ljqqmo+7oqCVxmbkQotF4P/LIw4hOrDcNpMwgZsM8', '(18) 99666-0363', 'CPF', '11.222.333-50'),
(43, 38, 'Nadir dos Santos', 'Brasil', 'nadir@gmail.com', 1, '$argon2i$v=19$m=65536,t=4,p=1$LzdHcWdOV1NJYUJjOWZWNA$OK9CvetvNTFZD2pdXqmpHp/VVO1huV9e0Wv/jQ0Q3ac', '(18) 99123-1234', 'RG', '21.400.200'),
(44, 59, 'Paulo Pereira', 'Brasil', 'paulopereira@unifesp.br', 1, '$argon2i$v=19$m=65536,t=4,p=1$TTRsYTRrSlVwci5RLk5QRg$DBjaY96bCvLVbjwvJsydpSHB4FwpQ5uyw+ru5u+dyDU', '(11) 98123-1234', 'RG', '16.456-456'),
(45, 60, 'VANESSA DOS ANJOS BORGES', '', 'vanessa.borges2@fatec.sp.gov.br', 1, '$argon2i$v=19$m=65536,t=4,p=1$VGt0RkROTUZWdFB6L3kwZg$jOMSPnc8pv38eRwfhdcLbhLPNZ6NtSr7x4pqOEbgNSU', '', 'vanessa', ''),
(46, 60, 'Paulo Alexandre da Silva', 'Brasil', 'paulo1000@gmail.com', 1, '$argon2i$v=19$m=65536,t=4,p=1$Q0pjRkZhdVo0c1ZpdHhSRA$ra6a9WKB2baLqR4UY/LYf6/gqJprmp0qbOO2Ppb6YHI', '', '', '');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `estudos`
--
ALTER TABLE `estudos`
  ADD CONSTRAINT `fk_Estudos_Usuarios1` FOREIGN KEY (`Usuarios_idPesquisadorPrincipal`) REFERENCES `usuarios` (`idUsuario`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `fk_Grupos_Estudos1` FOREIGN KEY (`Estudos_idEstudo`) REFERENCES `estudos` (`idEstudo`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `instituicoesensino`
--
ALTER TABLE `instituicoesensino`
  ADD CONSTRAINT `fk_InstituicoesEnsino_TipoUsuarios` FOREIGN KEY (`TipoDeUsuario_idTipoUsuario`) REFERENCES `tipodeusuario` (`idTipoUsuario`) ON DELETE RESTRICT;

--
-- Limitadores para a tabela `participantes`
--
ALTER TABLE `participantes`
  ADD CONSTRAINT `fk_Participantes_InstituicoesEnsino1` FOREIGN KEY (`InstituicoesEnsino_idInstituicaoEnsino`) REFERENCES `instituicoesensino` (`idInstituicaoEnsino`),
  ADD CONSTRAINT `fk_Participantes_TipoDeUsuarios1` FOREIGN KEY (`TipoDeUsuario_idTipoUsuario`) REFERENCES `tipodeusuario` (`idTipoUsuario`) ON DELETE RESTRICT;

--
-- Limitadores para a tabela `sessaodeteste`
--
ALTER TABLE `sessaodeteste`
  ADD CONSTRAINT `fk_SessaoTeste_Estudos1` FOREIGN KEY (`Estudos_idEstudo`) REFERENCES `estudos` (`idEstudo`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_SessaoTeste_Grupos1` FOREIGN KEY (`Grupos_idGrupo`) REFERENCES `grupos` (`idGrupo`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_SessaoTeste_Participantes1` FOREIGN KEY (`Participantes_idParticipante`) REFERENCES `participantes` (`idParticipante`),
  ADD CONSTRAINT `fk_SessaoTeste_Usuarios1` FOREIGN KEY (`Usuarios_idUsuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_Usuarios_InstituicoesEnsino1` FOREIGN KEY (`InstituicoesEnsino_idInstituicaoEnsino`) REFERENCES `instituicoesensino` (`idInstituicaoEnsino`),
  ADD CONSTRAINT `fk_Usuarios_TipoDeUsuario1` FOREIGN KEY (`TipoDeUsuario_idTipoUsuario`) REFERENCES `tipodeusuario` (`idTipoUsuario`) ON DELETE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
