CREATE TABLE `plano_associado` (
 `COD_ASSOCIADO` int(11) NOT NULL,
 `COD_PLANO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `detalhes_plano` (
 `CODIGO` int(11) NOT NULL AUTO_INCREMENT,
 `COD_PLANO` int(11) NOT NULL,
 `NUM_AGENDAMENTOS` int(11) DEFAULT '50',
 `NUM_SERVICOS` int(11) DEFAULT '2',
 `LEMBRETE_EMAIL` tinyint(1) DEFAULT '0',
 `NUM_TEMPLATES` int(11) DEFAULT NULL,
 `PERSONALIZA_TEMPLATE` tinyint(1) DEFAULT '0',
 `NUM_FOTOS_LOCAL` int(11) DEFAULT '2',
 `PRAZO_AGENDAMENTO` int(11) DEFAULT '2',
 `NUM_FUNCIONARIO_LOCAL` int(11) DEFAULT '2',
 PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE  `detalhes_plano` ADD INDEX (  `COD_PLANO` );

ALTER TABLE  `detalhes_plano` ADD FOREIGN KEY (  `COD_PLANO` ) REFERENCES  `aggenda`.`plano` (
`CODIGO`
) ON DELETE CASCADE ON UPDATE RESTRICT ;

INSERT INTO  `aggenda`.`plano` (
`CODIGO` ,
`NOME` ,
`VALOR_MENSAL` ,
`VALOR_ANUAL` ,
`DESCRICAO`
)
VALUES (
NULL ,  'Plano free',  '0',  '0',  'Grátis'
);

INSERT INTO  `aggenda`.`detalhes_plano` (
`CODIGO` ,
`COD_PLANO` ,
`NUM_AGENDAMENTOS` ,
`NUM_SERVICOS` ,
`LEMBRETE_EMAIL` ,
`NUM_TEMPLATES` ,
`PERSONALIZA_TEMPLATE` ,
`NUM_FOTOS_LOCAL` ,
`PRAZO_AGENDAMENTO` ,
`NUM_FUNCIONARIO_LOCAL`
)
VALUES (
NULL ,  '1',  '50',  '2',  '0', NULL ,  '0',  '2',  '2',  '2'
);

CREATE TABLE `agendamento` (
 `CODIGO` int(11) NOT NULL AUTO_INCREMENT,
 `COD_CLIENTE` int(11) NOT NULL,
 `START` datetime NOT NULL,
 `END` datetime NOT NULL,
 `COD_FUNCIONARIO_SALA` int(11) NOT NULL,
 `CONFIRMADO` tinyint(1) NOT NULL,
 `DATA_CADASTRO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`CODIGO`),
 KEY `COD_CLIENTE` (`COD_CLIENTE`,`COD_FUNCIONARIO_SALA`),
 KEY `COD_FUNCIONARIO_SALA` (`COD_FUNCIONARIO_SALA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE  `agendamento` ADD INDEX (  `COD_FUNCIONARIO_SALA` );

ALTER TABLE  `agendamento` ADD FOREIGN KEY (  `COD_FUNCIONARIO_SALA` ) REFERENCES  `aggenda`.`funcionario` (
`CODIGO`
) ON DELETE RESTRICT ON UPDATE RESTRICT ;




 CREATE  TABLE  `aggenda`.`empresa` (  `CODIGO` int( 11  )  NOT  NULL  AUTO_INCREMENT ,
 `NOME` varchar( 150  )  COLLATE utf8_unicode_ci NOT  NULL  COMMENT  'Nome ou razão social',
 `TIPO` varchar( 1  )  COLLATE utf8_unicode_ci  DEFAULT NULL  COMMENT  'F= pessoa fisica, J=pessoa Juridica',
 `CNPJ` varchar( 30  )  COLLATE utf8_unicode_ci NOT  NULL ,
 `CPF` varchar( 12  )  COLLATE utf8_unicode_ci NOT  NULL ,
 `SEGMENTO` int( 11  )  DEFAULT NULL ,
 `LOGIN` varchar( 50  )  COLLATE utf8_unicode_ci NOT  NULL ,
 `SENHA` varchar( 60  )  COLLATE utf8_unicode_ci NOT  NULL ,
 `URL` varchar( 20  )  COLLATE utf8_unicode_ci NOT  NULL ,
 `LOGO` varchar( 30  )  COLLATE utf8_unicode_ci NOT  NULL DEFAULT  'logoPadrao.png',
 `DATA_CADASTRO` timestamp NOT  NULL  DEFAULT CURRENT_TIMESTAMP ,
 `ULTIMA_ATIVIDADE` datetime  DEFAULT NULL ,
 `STATUS` varchar( 1  )  COLLATE utf8_unicode_ci NOT  NULL DEFAULT  'N' COMMENT  'N - inativo, S -ativo',
 `EMAIL` varchar( 100  )  COLLATE utf8_unicode_ci NOT  NULL ,
 `NOME_RESPONSAVEL` varchar( 50  )  COLLATE utf8_unicode_ci NOT  NULL ,
 `SOBRENOME_RESPONSAVEL` varchar( 150  )  COLLATE utf8_unicode_ci NOT  NULL ,
 `TELEFONE` varchar( 16  )  COLLATE utf8_unicode_ci NOT  NULL ,
 `COD_ENDERECO` int( 11  )  NOT  NULL ,
 PRIMARY  KEY (  `CODIGO`  ) ,
 KEY  `COD_ENDERECO` (  `COD_ENDERECO`  ) ,
 KEY  `SEGMENTO` (  `SEGMENTO`  )  ) ENGINE  = InnoDB  DEFAULT CHARSET  = utf8 COLLATE  = utf8_unicode_ci;

SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

INSERT INTO `aggenda`.`empresa` SELECT * FROM `aggenda`.`associado`;

ALTER TABLE  `associado` DROP FOREIGN KEY  `associado_ibfk_1` ;

ALTER TABLE `associado`
  DROP `NOME`,
  DROP `TIPO`,
  DROP `CNPJ`,
  DROP `CPF`,
  DROP `SEGMENTO`,
  DROP `URL`,
  DROP `LOGO`,
  DROP `TELEFONE`,
  DROP `COD_ENDERECO`;

ALTER TABLE `empresa`
  DROP `LOGIN`,
  DROP `SENHA`,
  DROP `DATA_CADASTRO`,
  DROP `ULTIMA_ATIVIDADE`,
  DROP `STATUS`,
  DROP `EMAIL`,
  DROP `NOME_RESPONSAVEL`,
  DROP `SOBRENOME_RESPONSAVEL`,
  DROP `COD_ENDERECO`;

ALTER TABLE  `associado` ADD  `COD_EMPRESA` INT NOT NULL;
ADD INDEX (  `COD_EMPRESA` )
ALTER TABLE  `associado` CHANGE  `COD_EMPRESA`  `COD_EMPRESA` INT( 11 ) NULL DEFAULT NULL

CREATE TABLE `endereco` (
 `CODIGO` int(11) NOT NULL AUTO_INCREMENT,
 `CEP` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
 `BAIRRO` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
 `CIDADE` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
 `ESTADO` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
 `LATITUDE` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
 `LONGITUDE` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
 PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE  `associado` ADD FOREIGN KEY (  `COD_EMPRESA` ) REFERENCES  `aggenda`.`empresa` (
`CODIGO`
) ON DELETE CASCADE ON UPDATE RESTRICT ;

INSERT INTO `aggenda`.`endereco` (`CODIGO`, `CEP`, `BAIRRO`, `CIDADE`, `ESTADO`, `LATITUDE`, `LONGITUDE`) VALUES (NULL, '25.565-241', 'Vilar dos teles', 'São João de Meriti', 'RJ', '123123', '1232131');


CREATE OR REPLACE  ALGORITHM = UNDEFINED VIEW  `v_associado_completo` AS SELECT A . * , E.NOME, E.TIPO, E.CNPJ, E.CPF, E.URL, E.LOGO, E.TELEFONE, S.CODIGO AS COD_SEGMENTO, S.NOME AS SEGMENTO, END.CEP, END.BAIRRO, END.CIDADE, END.ESTADO, END.LONGITUDE, END.LATITUDE
FROM  `associado` A
LEFT JOIN  `empresa` E ON E.CODIGO = A.COD_EMPRESA
LEFT JOIN  `segmento` S ON S.CODIGO = E.SEGMENTO
LEFT JOIN  `endereco` END ON END.COD_ASSOCIADO = A.CODIGO;

CREATE OR REPLACE 
ALGORITHM = UNDEFINED
VIEW  `v_url` AS 
SELECT E.CODIGO, E.URL
FROM associado A
JOIN empresa E ON E.CODIGO = A.COD_EMPRESA
WHERE A.STATUS =  "A"

ALTER TABLE  `endereco` ADD  `COD_ASSOCIADO` INT NOT NULL AFTER  `CODIGO` ,
ADD UNIQUE (
`COD_ASSOCIADO`
);
UPDATE  `aggenda`.`endereco` SET  `COD_ASSOCIADO` =  '1' WHERE  `endereco`.`CODIGO` =1;
ALTER TABLE  `endereco` ADD FOREIGN KEY (  `COD_ASSOCIADO` ) REFERENCES  `aggenda`.`associado` (
`CODIGO`
) ON DELETE CASCADE ON UPDATE RESTRICT ;

--alterado até aqui
ALTER TABLE  `usuario` ADD  `DATA_ANIVERSARIO` DATE NOT NULL ,
ADD  `PROFISSAO` VARCHAR( 100 ) NULL 
ADD  `EMAIL` VARCHAR( 100 ) NOT NULL ,
ADD  `CPF` VARCHAR( 15 ) NOT NULL ; 
ALTER TABLE  `usuario` CHANGE  `ULTIMA_ATIVIDADE`  `ULTIMA_ATIVIDADE` DATETIME NULL DEFAULT NULL ;
--Ate aqui
ALTER TABLE  `segmento` ADD  `TIPO` VARCHAR( 2 ) NOT NULL DEFAULT  '1' COMMENT  '1-Serviços, 2 Locação'

ALTER TABLE  `agendamento` ADD FOREIGN KEY (  `COD_CLIENTE` ) REFERENCES  `aggenda`.`usuario` (
`ID`
) ON DELETE CASCADE ON UPDATE RESTRICT ;
ALTER TABLE  `agendamento` ADD  `EXTRA` TEXT NOT NULL AFTER  `CONFIRMADO`;

--AQUI
-- TEM QUE TIRAR A RELAÇÃO DA TABELA AGENDAMENTOS ANTES
ALTER TABLE  `usuario` CHANGE  `ID`  `CODIGO` INT( 11 ) NOT NULL AUTO_INCREMENT ;
ALTER TABLE  `agendamento` ADD FOREIGN KEY (  `COD_CLIENTE` ) REFERENCES  `aggenda`.`usuario` (
`CODIGO`
) ON DELETE CASCADE ON UPDATE RESTRICT ;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_agendamento` AS select `A`.`CODIGO` AS `CODIGO`,`A`.`COD_CLIENTE` AS `COD_CLIENTE`,replace(`A`.`START`,' ','T') AS `start`,replace(`A`.`END`,' ','T') AS `end`,`A`.`COD_FUNCIONARIO_SALA` AS `COD_FUNCIONARIO_SALA`,`A`.`CONFIRMADO` AS `CONFIRMADO`,`A`.`EXTRA` AS `EXTRA`,`A`.`DATA_CADASTRO` AS `DATA_CADASTRO`,concat(`U`.`NOME`,'\n',`F`.`NOME`,'\n',`S`.`NOME`) AS `title` from (((`agendamento` `A` join `usuario` `U` on((`U`.`CODIGO` = `A`.`COD_CLIENTE`))) join `funcionario` `F` on((`F`.`CODIGO` = `A`.`COD_FUNCIONARIO_SALA`))) join `servico` `S` on((`S`.`CODIGO` = `F`.`COD_SERVICO`)));

INSERT INTO `agendamento` (`CODIGO`, `COD_CLIENTE`, `START`, `END`, `COD_FUNCIONARIO_SALA`, `CONFIRMADO`, `EXTRA`, `DATA_CADASTRO`) VALUES
(1, 1, '2015-06-24 10:00:00', '2015-06-24 11:00:00', 1, 1, 'a:3:{s:5:"color";s:4:"blue";s:15:"backgroundColor";s:3:"fff";s:8:"editable";b:0;}', '2015-06-24 00:05:20'),
(2, 2, '2015-06-24 12:00:00', '2015-06-24 14:45:00', 2, 1, 'a:2:{s:5:"color";s:4:"blue";s:15:"backgroundColor";s:3:"fff";}', '2015-06-24 00:05:20');

-- a partir daui
ALTER TABLE  `servico` ADD  `BACKGROUNDCOLOR` VARCHAR( 55 ) NULL ,
ADD  `TEXTCOLOR` VARCHAR( 55 ) NULL ,
ADD  `BORDERCOLOR` VARCHAR( 55 ) NULL ;

ALTER ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_agendamento` AS select `A`.`CODIGO` AS `CODIGO`,`A`.`COD_CLIENTE` AS `COD_CLIENTE`,replace(`A`.`START`,' ','T') AS `start`,replace(`A`.`END`,' ','T') AS `end`,`A`.`COD_FUNCIONARIO_SALA` AS `COD_FUNCIONARIO_SALA`,`A`.`CONFIRMADO` AS `CONFIRMADO`,`A`.`DATA_CADASTRO` AS `DATA_CADASTRO`,concat(`U`.`NOME`,'\n',`F`.`NOME`,'\n',`S`.`NOME`) AS `title`,`S`.`COD_ASSOCIADO` AS `COD_ASSOCIADO`
,`S`.`BACKGROUNDCOLOR` AS `backgroundColor`
,`S`.`TEXTCOLOR` AS `textColor`
,`S`.`BORDERCOLOR` AS `borderColor`
,`A`.`EDITABLE` AS `editable`
from (((`agendamento` `A` join `usuario` `U` on((`U`.`CODIGO` = `A`.`COD_CLIENTE`))) join `funcionario` `F` on((`F`.`CODIGO` = `A`.`COD_FUNCIONARIO_SALA`))) join `servico` `S` on((`S`.`CODIGO` = `F`.`COD_SERVICO`)))

ALTER TABLE  `agendamento` ADD  `EDITABLE` BOOLEAN NOT NULL DEFAULT TRUE ;

CREATE TABLE `horario` (
 `COD_ASSOCIADO` int(11) NOT NULL,
 `HORA_INICIO` time NOT NULL,
 `HORA_FIM` time NOT NULL,
 `DIA_TODO` tinyint(1) NOT NULL,
 `DIAS_DE_TRABALHO` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
 UNIQUE KEY `COD_ASSOCIADO` (`COD_ASSOCIADO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE  `horario` ADD FOREIGN KEY (  `COD_ASSOCIADO` ) REFERENCES  `aggenda`.`associado` (
`CODIGO`
) ON DELETE CASCADE ON UPDATE RESTRICT ;

ALTER TABLE  `agendamento` ADD  `ALLDAY` BOOLEAN NOT NULL DEFAULT FALSE AFTER  `END` ;

ALTER TABLE  `agendamento` ADD  `BACKGROUNDCOLOR` VARCHAR( 50 ) NULL DEFAULT NULL AFTER  `CONFIRMADO` ,
ADD  `TEXTCOLOR` VARCHAR( 50 ) NULL DEFAULT NULL AFTER  `BACKGROUNDCOLOR` ,
ADD  `BORDERCOLOR` VARCHAR( 50 ) NULL DEFAULT NULL AFTER  `TEXTCOLOR` ;
--a fazer

/*escritorio*/
CREATE TABLE `versao` (
 `CODIGO` int(11) NOT NULL AUTO_INCREMENT,
 `MAJOR` int(11) NOT NULL,
 `MINOR` int(11) NOT NULL,
 `PATCH` int(11) NOT NULL,
 `ESTAGIO` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'beta, release candidate (RC),release to manufacture (RTM), stable = NULL',
 `DATA_LIBERACAO` datetime NOT NULL,
 PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `aggenda`.`versao` (`CODIGO`, `MAJOR`, `MINOR`, `PATCH`, `ESTAGIO`, `DATA_LIBERACAO`) VALUES (NULL, '1', '0', '0', 'beta', '2015-08-01 00:00:00');

CREATE ALGORITHM = UNDEFINED VIEW  `v_versao` AS SELECT  `CODIGO` , CONCAT_WS(  '.',  `MAJOR` ,  `MINOR` ,  `PATCH` ,  `ESTAGIO` ) AS VERSAO_ATUAL, `DATA_LIBERACAO` 
FROM  `versao` 
ORDER BY CODIGO DESC;

/*casa*/
ALTER ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_agendamento` AS select `A`.`CODIGO` AS `CODIGO`,`A`.`COD_CLIENTE` AS `COD_CLIENTE`,if((`A`.`ALLDAY` = 0),replace(`A`.`START`,' ','T'),date_format(`A`.`START`,'%Y-%m-%d')) AS `start`,if((`A`.`ALLDAY` = 0),replace(`A`.`END`,' ','T'),date_format(`A`.`END`,'%Y-%m-%d')) AS `end`,if((`A`.`ALLDAY` = 0),NULL,`A`.`ALLDAY`) AS `allday`,`A`.`COD_FUNCIONARIO_SALA` AS `COD_FUNCIONARIO_SALA`,`A`.`CONFIRMADO` AS `CONFIRMADO`,`A`.`DATA_CADASTRO` AS `DATA_CADASTRO`,concat(`U`.`NOME`,'\n',`S`.`NOME`) AS `title`,`S`.`COD_ASSOCIADO` AS `COD_ASSOCIADO`,

IF(`A`.`BACKGROUNDCOLOR` IS NULL,`S`.`BACKGROUNDCOLOR`,`A`.`BACKGROUNDCOLOR`) AS `backgroundColor`,
IF(`A`.`TEXTCOLOR` IS NULL, `S`.`TEXTCOLOR`,`A`.`TEXTCOLOR`) AS `textColor`,
IF(`A`.`BORDERCOLOR` IS NULL,`S`.`BORDERCOLOR`,`A`.`BORDERCOLOR`) AS `borderColor`

,`A`.`EDITABLE` AS `editable` from (((`agendamento` `A` join `usuario` `U` on((`U`.`CODIGO` = `A`.`COD_CLIENTE`))) join `funcionario` `F` on((`F`.`CODIGO` = `A`.`COD_FUNCIONARIO_SALA`))) join `servico` `S` on((`S`.`CODIGO` = `F`.`COD_SERVICO`)));

ALTER ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_associado_completo` AS select `A`.`CODIGO` AS `CODIGO`,`A`.`LOGIN` AS `LOGIN`,`A`.`SENHA` AS `SENHA`,`A`.`DATA_CADASTRO` AS `DATA_CADASTRO`,`A`.`ULTIMA_ATIVIDADE` AS `ULTIMA_ATIVIDADE`,`A`.`STATUS` AS `STATUS`,`A`.`EMAIL` AS `EMAIL`,`A`.`NOME_RESPONSAVEL` AS `NOME_RESPONSAVEL`,`A`.`SOBRENOME_RESPONSAVEL` AS `SOBRENOME_RESPONSAVEL`,`A`.`COD_EMPRESA` AS `COD_EMPRESA`,`E`.`NOME` AS `NOME`,`E`.`TIPO` AS `TIPO`,`E`.`CNPJ` AS `CNPJ`,`E`.`CPF` AS `CPF`,`E`.`URL` AS `URL`,`E`.`LOGO` AS `LOGO`,`E`.`TELEFONE` AS `TELEFONE`,`S`.`CODIGO` AS `COD_SEGMENTO`,`S`.`NOME` AS `SEGMENTO`,`S`.`TIPO` AS `TIPO_SEGMENTO` ,`END`.`CEP` AS `CEP`,`END`.`BAIRRO` AS `BAIRRO`,`END`.`CIDADE` AS `CIDADE`,`END`.`ESTADO` AS `ESTADO`,`END`.`LONGITUDE` AS `LONGITUDE`,`END`.`LATITUDE` AS `LATITUDE` from (((`associado` `A` left join `empresa` `E` on((`E`.`CODIGO` = `A`.`COD_EMPRESA`))) left join `segmento` `S` on((`S`.`CODIGO` = `E`.`SEGMENTO`))) left join `endereco` `END` on((`END`.`COD_ASSOCIADO` = `A`.`CODIGO`)))

CREATE TABLE `mensagem` (
 `CODIGO` int(11) NOT NULL AUTO_INCREMENT,
 `DE` int(11) DEFAULT NULL,
 `NOME_DE` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `PARA` int(11) NOT NULL,
 `MENSAGEM` text COLLATE utf8_unicode_ci NOT NULL,
 `GRAU` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Baixa Importancia, 2- Media Importancia, 3- Alta Importancia',
 `DATA_CADASTRO` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`CODIGO`),
 KEY `DE` (`DE`,`PARA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE  `mensagem` ADD INDEX (  `PARA` ) ;
ALTER TABLE  `mensagem` ADD  `EMAIL_DE` VARCHAR( 100 ) NOT NULL AFTER  `NOME_DE` ;


ALTER TABLE  `mensagem` ADD FOREIGN KEY (  `DE` ) REFERENCES  `aggenda`.`usuario` (
`CODIGO`
) ON DELETE SET NULL ON UPDATE RESTRICT ;

ALTER TABLE  `mensagem` ADD FOREIGN KEY (  `PARA` ) REFERENCES  `aggenda`.`associado` (
`CODIGO`
) ON DELETE CASCADE ON UPDATE RESTRICT ;

INSERT INTO `aggenda`.`mensagem` (`CODIGO`, `DE`, `NOME_DE`, `PARA`, `MENSAGEM`, `GRAU`, `DATA_CADASTRO`) VALUES (NULL, NULL, 'Fulana alberto de tal queiroz', '1', 'Não sei o q escrever nesta merda de mensagem', '1', CURRENT_TIMESTAMP);

CREATE ALGORITHM = UNDEFINED VIEW  `v_mensagens` AS SELECT CODIGO, PARA AS COD_ASSOCIADO, NOME_DE, MENSAGEM, GRAU, 
CASE 
WHEN GRAU =1
THEN  'Baixa Importancia'
WHEN GRAU =1
THEN  'Média Importancia'
WHEN GRAU =1
THEN  'Alta Importancia'
END AS GRAU_DESC, 
CASE 
WHEN DATEDIFF( NOW( ) ,  `DATA_CADASTRO` ) =0
THEN  'Hoje'
WHEN DATEDIFF( NOW( ) ,  `DATA_CADASTRO` ) =1
THEN  'Ontem'
ELSE DATA_CADASTRO
END AS DATA
FROM  `mensagem`;

ALTER ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mensagens` AS select `mensagem`.`CODIGO` AS `CODIGO`,`mensagem`.`PARA` AS `COD_ASSOCIADO`,`mensagem`.`NOME_DE` AS `NOME_DE`,
`mensagem`.`MENSAGEM` AS `MENSAGEM`,
SUBSTRING(`mensagem`.`MENSAGEM`,1,30) AS `MENSAGEM_CURTA`,
`mensagem`.`GRAU` AS `GRAU`,
(case 
 when (`mensagem`.`GRAU` = 1) then 'Baixa Importancia' 
 when (`mensagem`.`GRAU` = 2) then 'Média Importancia' 
 when (`mensagem`.`GRAU` = 3) then 'Alta Importancia' end) 
AS `GRAU_DESC`,
(case 
 when (`mensagem`.`GRAU` = 1) then 'danger' 
 when (`mensagem`.`GRAU` = 2) then 'success' 
 when (`mensagem`.`GRAU` = 3) then 'primary' end) AS `CLASSE`,
(case 
 when ((to_days(now()) - to_days(`mensagem`.`DATA_CADASTRO`)) = 0) then 'Hoje'                                                                when ((to_days(now()) - to_days(`mensagem`.`DATA_CADASTRO`)) = 1) then 'Ontem'                                                                else DATE_FORMAT(`mensagem`.`DATA_CADASTRO`, '%d-%m-%Y' )  end) 
AS `DATA` from `mensagem`
--a fazer
