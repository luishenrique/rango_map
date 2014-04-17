-- phpMyAdmin SQL Dump
-- version 3.5.0-alpha1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.6.11
-- Versão do PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `rango_map`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio`
--

CREATE TABLE IF NOT EXISTS `cardapio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dia_semana` varchar(45) DEFAULT NULL,
  `horario1` time DEFAULT NULL,
  `horario2` time DEFAULT NULL,
  `horario3` time DEFAULT NULL,
  `horario4` time DEFAULT NULL,
  `unidade_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_horario_unidade1_idx` (`unidade_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_cardapio`
--

CREATE TABLE IF NOT EXISTS `itens_cardapio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `valor` decimal(12,2) DEFAULT NULL,
  `calorias` varchar(45) DEFAULT NULL,
  `pessoas` int(11) DEFAULT NULL,
  `cardapio_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_itens_cardapio_cardapio1_idx` (`cardapio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pesquisa`
--

CREATE TABLE IF NOT EXISTS `pesquisa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime DEFAULT NULL,
  `latitude` varchar(45) DEFAULT NULL,
  `longitude` varchar(45) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pesquisa_usuario1_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocao`
--

CREATE TABLE IF NOT EXISTS `promocao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `valor` decimal(12,2) DEFAULT NULL,
  `data_inicio` datetime DEFAULT NULL,
  `data_fim` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recomendacao`
--

CREATE TABLE IF NOT EXISTS `recomendacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `avaliacao` varchar(45) DEFAULT NULL,
  `comentario` varchar(100) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `unidade_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recomendacao_usuario1_idx` (`usuario_id`),
  KEY `fk_recomendacao_unidade1_idx` (`unidade_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `restaurante`
--

CREATE TABLE IF NOT EXISTS `restaurante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_fantasia` varchar(45) DEFAULT NULL,
  `site` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(25) DEFAULT NULL,
  `cnpj` varchar(45) DEFAULT NULL,
  `razao_social` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE IF NOT EXISTS `unidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rua` varchar(45) DEFAULT NULL,
  `numero` varchar(7) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `id_restaurante` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_unidade_restaurante_idx` (`id_restaurante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade_cardapio`
--

CREATE TABLE IF NOT EXISTS `unidade_cardapio` (
  `unidade_id` int(11) NOT NULL,
  `cardapio_id` int(11) NOT NULL,
  PRIMARY KEY (`unidade_id`,`cardapio_id`),
  KEY `fk_unidade_has_cardapio_cardapio1_idx` (`cardapio_id`),
  KEY `fk_unidade_has_cardapio_unidade1_idx` (`unidade_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade_categoria`
--

CREATE TABLE IF NOT EXISTS `unidade_categoria` (
  `unidade_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  PRIMARY KEY (`unidade_id`,`categoria_id`),
  KEY `fk_unidade_has_categoria_categoria1_idx` (`categoria_id`),
  KEY `fk_unidade_has_categoria_unidade1_idx` (`unidade_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade_promocao`
--

CREATE TABLE IF NOT EXISTS `unidade_promocao` (
  `unidade_id` int(11) NOT NULL,
  `promocao_id` int(11) NOT NULL,
  PRIMARY KEY (`unidade_id`,`promocao_id`),
  KEY `fk_unidade_has_promocao_promocao1_idx` (`promocao_id`),
  KEY `fk_unidade_has_promocao_unidade1_idx` (`unidade_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_horario_unidade1` FOREIGN KEY (`unidade_id`) REFERENCES `unidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `itens_cardapio`
--
ALTER TABLE `itens_cardapio`
  ADD CONSTRAINT `fk_itens_cardapio_cardapio1` FOREIGN KEY (`cardapio_id`) REFERENCES `cardapio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `pesquisa`
--
ALTER TABLE `pesquisa`
  ADD CONSTRAINT `fk_pesquisa_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `recomendacao`
--
ALTER TABLE `recomendacao`
  ADD CONSTRAINT `fk_recomendacao_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recomendacao_unidade1` FOREIGN KEY (`unidade_id`) REFERENCES `unidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `unidade`
--
ALTER TABLE `unidade`
  ADD CONSTRAINT `fk_unidade_restaurante` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `unidade_cardapio`
--
ALTER TABLE `unidade_cardapio`
  ADD CONSTRAINT `fk_unidade_has_cardapio_unidade1` FOREIGN KEY (`unidade_id`) REFERENCES `unidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_unidade_has_cardapio_cardapio1` FOREIGN KEY (`cardapio_id`) REFERENCES `cardapio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `unidade_categoria`
--
ALTER TABLE `unidade_categoria`
  ADD CONSTRAINT `fk_unidade_has_categoria_unidade1` FOREIGN KEY (`unidade_id`) REFERENCES `unidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_unidade_has_categoria_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `unidade_promocao`
--
ALTER TABLE `unidade_promocao`
  ADD CONSTRAINT `fk_unidade_has_promocao_unidade1` FOREIGN KEY (`unidade_id`) REFERENCES `unidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_unidade_has_promocao_promocao1` FOREIGN KEY (`promocao_id`) REFERENCES `promocao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
