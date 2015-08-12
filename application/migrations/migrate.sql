ALTER TABLE  `agendamento` ADD  `COD_SERVICO` INT NOT NULL AFTER  `COD_FUNCIONARIO_SALA` ,
ADD INDEX (  `COD_SERVICO` )

ALTER ALGORITHM = UNDEFINED DEFINER =  `root`@`localhost` SQL SECURITY DEFINER VIEW  `v_agendamento` AS SELECT  `A`.`CODIGO` AS  `CODIGO` , `A`.`COD_CLIENTE` AS  `COD_CLIENTE` , REPLACE(  `A`.`START` ,  ' ',  'T' ) AS  `start` , REPLACE(  `A`.`END` ,  ' ',  'T' ) AS  `end` ,  `A`.`COD_FUNCIONARIO_SALA` AS `COD_FUNCIONARIO_SALA` ,  `A`.`CONFIRMADO` AS  `CONFIRMADO` ,  `A`.`DATA_CADASTRO` AS  `DATA_CADASTRO` , CONCAT(  `U`.`NOME` ,  '\n',  `F`.`NOME` ,  '\n', `S`.`NOME` ) AS  `title` ,  `S`.`COD_ASSOCIADO` AS  `COD_ASSOCIADO` ,  `S`.`BACKGROUNDCOLOR` AS  `backgroundColor` ,  `S`.`TEXTCOLOR` AS  `textColor` , `S`.`BORDERCOLOR` AS  `borderColor` ,  `A`.`EDITABLE` AS  `editable` 
FROM (
(
(
`agendamento`  `A` 
JOIN  `usuario`  `U` ON ( (
`U`.`CODIGO` =  `A`.`COD_CLIENTE`
) )
)
JOIN  `funcionario`  `F` ON ( (
`F`.`CODIGO` =  `A`.`COD_FUNCIONARIO_SALA`
) )
)
JOIN  `servico`  `S` ON ( (
`S`.`CODIGO` =  `A`.`COD_SERVICO`
) )
)

REMOVER CAMPO COD_SERVICO DE FUNCIONARIO.

ALTER TABLE  `empresa` ADD  `AREA` VARCHAR( 100 ) NOT NULL AFTER  `CPF`;
ALTER TABLE  `endereco` ADD  `ENDERECO` VARCHAR( 120 ) NOT NULL AFTER  `CEP`;
ALTER TABLE  `horario` ADD  `FUNCIONAMENTO` VARCHAR( 200 ) NOT NULL;
ALTER TABLE  `endereco` CHANGE  `LATITUDE`  `LATITUDE` VARCHAR( 60 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
CHANGE  `LONGITUDE`  `LONGITUDE` VARCHAR( 60 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;
ALTER TABLE  `horario` CHANGE  `DIA_TODO`  `DIA_TODO` TINYINT( 1 ) NOT NULL DEFAULT  '1';
ALTER TABLE  `horario` CHANGE  `FUNCIONAMENTO`  `FUNCIONAMENTO` VARCHAR( 200 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;


-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 29/07/2015 às 11h14min
-- Versão do Servidor: 5.6.25
-- Versão do PHP: 5.5.27-1+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Banco de Dados: `aggenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `segmento`
--

DROP TABLE IF EXISTS `segmento`;
CREATE TABLE IF NOT EXISTS `segmento` (
  `CODIGO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DESCRICAO` text COLLATE utf8_unicode_ci NOT NULL,
  `SLUG` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TIPO` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1-Serviços, 2 Locação',
  PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `segmento`
--

INSERT INTO `segmento` (`CODIGO`, `NOME`, `DESCRICAO`, `SLUG`, `TIPO`) VALUES
(1, 'Salão de Beleza', '', NULL, '1'),
(2, 'Aluguel de Salas', '', NULL, '2'),
(3, 'Restaurante', 'Reserva de Mesas', NULL, '2'),
(4, 'Cafeteria', 'Reserva de Mesas', NULL, '2'),
(5, 'Acupunturista', '', NULL, '1'),
(6, 'Dentista', '', NULL, '1'),
(7, 'Médico', '', NULL, '1'),
(8, 'Psicólogo', '', NULL, '1'),
(9, 'Quiroprático', '', NULL, '1'),
(10, 'Veterinário', '', NULL, '1'),
(11, 'Nutricionista', '', NULL, '1'),
(12, 'Cabelereiro', '', NULL, '1'),
(13, 'Manicure e Pedicure', '', NULL, '1'),
(14, 'Esteticista', '', NULL, '1'),
(15, 'Pousada', '', NULL, '2'),
(16, 'Religiosos', '', NULL, '1'),
(17, 'Aulas', '', NULL, '1'),
(18, 'Advogados', '', NULL, '1'),
(19, 'Corretor de imóveis', '', NULL, '1'),
(20, 'RH e entrevistas', '', NULL, '1'),
(21, 'Fotografos e cinegrafistas', '', NULL, '1'),
(22, 'Instrutores', '', NULL, '1'),
(23, 'Estilista', '', NULL, '1'),
(24, 'Hotel', '', NULL, '2'),
(25, 'Outros', 'outros', 'outros', '0');
