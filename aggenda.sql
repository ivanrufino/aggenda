-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 10/06/2015 às 17h21min
-- Versão do Servidor: 5.6.24
-- Versão do PHP: 5.5.25-1+deb.sury.org~precise+2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `aggenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `CODIGO` int(11) NOT NULL AUTO_INCREMENT,
  `COD_FUNCIONARIO` int(11) NOT NULL,
  `DIA` int(2) NOT NULL,
  `HORA_INICIO` time NOT NULL,
  `HORA_FIM` time NOT NULL,
  `DURACAO` int(4) NOT NULL COMMENT 'Duração de cada agendamento',
  `INTERVALO` int(4) NOT NULL COMMENT 'intervalo entre cada agendamento',
  PRIMARY KEY (`CODIGO`),
  KEY `COD_FUNCIONARIO` (`COD_FUNCIONARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `associado`
--

CREATE TABLE IF NOT EXISTS `associado` (
  `CODIGO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nome ou razão social',
  `TIPO` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'F= pessoa fisica, J=pessoa Juridica',
  `CNPJ` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `CPF` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `SEGMENTO` int(11) DEFAULT NULL,
  `LOGIN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SENHA` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `URL` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `LOGO` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'logoPadrao.png',
  `DATA_CADASTRO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ULTIMA_ATIVIDADE` datetime DEFAULT NULL,
  `STATUS` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'N - inativo, S -ativo',
  `EMAIL` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NOME_RESPONSAVEL` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SOBRENOME_RESPONSAVEL` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `TELEFONE` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `COD_ENDERECO` int(11) NOT NULL,
  PRIMARY KEY (`CODIGO`),
  KEY `COD_ENDERECO` (`COD_ENDERECO`),
  KEY `SEGMENTO` (`SEGMENTO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `associado`
--

INSERT INTO `associado` (`CODIGO`, `NOME`, `TIPO`, `CNPJ`, `CPF`, `SEGMENTO`, `LOGIN`, `SENHA`, `URL`, `LOGO`, `DATA_CADASTRO`, `ULTIMA_ATIVIDADE`, `STATUS`, `EMAIL`, `NOME_RESPONSAVEL`, `SOBRENOME_RESPONSAVEL`, `TELEFONE`, `COD_ENDERECO`) VALUES
(1, 'Minha Empresa', 'J', '41.252.075/0001-47', '', NULL, 'ivanrufino', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'minha_empres', 'logoPadrao.png', '2015-06-08 18:06:17', '2015-06-08 00:00:00', 'S', 'ivan.rufino.m@gmail.com', 'Ivan ', 'Rufino Martins', '2127518821', 1),
(2, 'Outra empresa', 'F', '', '09878901742', 2, 'ivan', '123456', 'ivan', 'logoPadrao.png', '2015-06-08 20:07:47', NULL, 'N', 'algo@gmail.com.br', 'ivan', 'rufino', '3215842124', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('027c0fc2f3e61ff9328b8d4c78476950faec699e', '127.0.0.1', 1433963893, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433333936333639353b),
('02c2958f429e4cb0aae88c7428cc3154c99764b8', '127.0.0.1', 1433878444, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433333837383434343b),
('0c3bc4a6341fd44b115053258d02c42b685f2204', '127.0.0.1', 1433879355, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433333837393238323b),
('34ddf9f270bf8bb5d86edde2ffefc20211ebdad2', '127.0.0.1', 1433954595, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433333935343338383b),
('39d6d5ff488bb6d2400124b0db75e79f1172c3a7', '127.0.0.1', 1433953716, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433333935333431393b),
('3a6ce71d252aab804c5679e9e46e232c1d2d7d33', '127.0.0.1', 1433881299, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433333838313134373b),
('72446aaeb19b205a386e4599e75ec8cce21a5cc2', '127.0.0.1', 1433881763, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433333838313439323b),
('74de7b1b15fd1913369136948effbf968c5e6beb', '127.0.0.1', 1433958277, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433333935383033313b),
('7c8cb35c2f6d6d1195440fcd6a89ae5d6fe37353', '127.0.0.1', 1433880158, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433333837393836343b),
('89f9b7193f88e4b58eb604ea0c3339ee3a14c7c8', '127.0.0.1', 1433953964, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433333935333732323b),
('93fc3aecabf79d4a208701a63e9da8dc6cb69a82', '127.0.0.1', 1433876854, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433333837363535353b),
('9871984c2f922cb3b92caeeae0f95000da914d82', '127.0.0.1', 1433957536, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433333935373332393b),
('b10c051cc8bc8dcd67c703005327be4d938e7156', '127.0.0.1', 1433880397, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433333838303137353b),
('b77b42f08b29f40f13f5e4cec1ca63a1d1ee5115', '127.0.0.1', 1433954312, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433333935343037363b),
('c589e84710ed5a21690a3d3e4059bf4e3b2fe80b', '127.0.0.1', 1433876979, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433333837363837363b),
('d56ec7f274033b938e6db317e9a55156bca97f27', '127.0.0.1', 1433965306, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433333936353034373b),
('ef67cd719d3056d324c07c0e3060f57b40d76bc7', '127.0.0.1', 1433957017, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433333935363835323b);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `CODIGO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DESCRICAO` text COLLATE utf8_unicode_ci NOT NULL,
  `FOTO` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `COD_SERVICO` int(11) NOT NULL,
  `STATUS` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`CODIGO`),
  KEY `COD_SERVICO` (`COD_SERVICO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='(funcionario/num_sala) o agendamento pertence a esta tabela' AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`CODIGO`, `NOME`, `DESCRICAO`, `FOTO`, `COD_SERVICO`, `STATUS`) VALUES
(1, 'Sala 1', 'Sala com wifi', '', 3, 1),
(2, 'Sala 2', 'Sala com TV', '', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `func_serv`
--

CREATE TABLE IF NOT EXISTS `func_serv` (
  `COD_FUNCIONARIO` int(11) NOT NULL,
  `COD_SERVICO` int(11) NOT NULL,
  UNIQUE KEY `COD_FUNCIONARIO` (`COD_FUNCIONARIO`,`COD_SERVICO`),
  KEY `FUNC_SERV_ibfk_2` (`COD_SERVICO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `func_serv`
--

INSERT INTO `func_serv` (`COD_FUNCIONARIO`, `COD_SERVICO`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `plano`
--

CREATE TABLE IF NOT EXISTS `plano` (
  `CODIGO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `VALOR_MENSAL` decimal(10,2) NOT NULL,
  `VALOR_ANUAL` decimal(10,2) NOT NULL,
  `DESCRICAO` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `segmento`
--

CREATE TABLE IF NOT EXISTS `segmento` (
  `CODIGO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DESCRICAO` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `segmento`
--

INSERT INTO `segmento` (`CODIGO`, `NOME`, `DESCRICAO`) VALUES
(1, 'Salão de Beleza', ''),
(2, 'Aluguel de Salas', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE IF NOT EXISTS `servico` (
  `CODIGO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `LOGO` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `VALOR` decimal(10,2) DEFAULT NULL,
  `OBS` text COLLATE utf8_unicode_ci NOT NULL,
  `COD_ASSOCIADO` int(11) NOT NULL,
  PRIMARY KEY (`CODIGO`),
  KEY `COD_ASSOCIADO` (`COD_ASSOCIADO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`CODIGO`, `NOME`, `LOGO`, `VALOR`, `OBS`, `COD_ASSOCIADO`) VALUES
(1, 'Corte Masculino', '', NULL, '', 2),
(2, 'Corte Feminino', '', NULL, '', 1),
(3, 'Aluguel de Salas', '', 250.00, 'Valor por hora', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `LOGIN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SENHA` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DATA_CADASTRO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ULTIMA_ATIVIDADE` datetime NOT NULL,
  `STATUS` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `v_quant_servico_e_agenda_por_associado`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aggenda`.`v_quant_servico_e_agenda_por_associado` AS select `A`.`CODIGO` AS `CODIGO`,`A`.`NOME` AS `NOME`,count(`S`.`CODIGO`) AS `QUANT_SERVICOS` from (((`aggenda`.`ASSOCIADO` `A` join `aggenda`.`SERVICO` `S` on((`S`.`COD_ASSOCIADO` = `A`.`CODIGO`))) left join `aggenda`.`FUNC_SERV` `FS` on((`FS`.`COD_SERVICO` = `S`.`CODIGO`))) left join `aggenda`.`FUNCIONARIO` `F` on((`F`.`CODIGO` = `FS`.`COD_FUNCIONARIO`))) group by `A`.`CODIGO`;
-- em uso (#1356 - View 'aggenda.v_quant_servico_e_agenda_por_associado' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them)

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`COD_FUNCIONARIO`) REFERENCES `funcionario` (`CODIGO`) ON DELETE CASCADE;

--
-- Restrições para a tabela `associado`
--
ALTER TABLE `associado`
  ADD CONSTRAINT `associado_ibfk_1` FOREIGN KEY (`SEGMENTO`) REFERENCES `segmento` (`CODIGO`) ON DELETE SET NULL;

--
-- Restrições para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`COD_SERVICO`) REFERENCES `servico` (`CODIGO`) ON DELETE CASCADE;

--
-- Restrições para a tabela `func_serv`
--
ALTER TABLE `func_serv`
  ADD CONSTRAINT `func_serv_ibfk_1` FOREIGN KEY (`COD_FUNCIONARIO`) REFERENCES `funcionario` (`CODIGO`) ON DELETE CASCADE,
  ADD CONSTRAINT `func_serv_ibfk_2` FOREIGN KEY (`COD_SERVICO`) REFERENCES `servico` (`CODIGO`) ON DELETE CASCADE;

--
-- Restrições para a tabela `servico`
--
ALTER TABLE `servico`
  ADD CONSTRAINT `servico_ibfk_1` FOREIGN KEY (`COD_ASSOCIADO`) REFERENCES `associado` (`CODIGO`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
