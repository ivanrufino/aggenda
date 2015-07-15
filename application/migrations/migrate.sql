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
