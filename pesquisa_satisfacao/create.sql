-- phpMyAdmin SQL Dump
-- version 2.7.0-rc1
-- http://www.phpmyadmin.net
-- 
-- Máquina: localhost
-- Data de Criação: 19-Jul-2006 às 14:01
-- Versão do servidor: 4.1.14
-- versão do PHP: 5.0.4
-- 
-- Base de Dados: `projelme`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `pesos_por_graus`
-- 

CREATE TABLE `pesos_por_graus` (
  `id` int(11) NOT NULL auto_increment,
  `graus_importancia_baixo` text NOT NULL,
  `graus_importancia_medio` text NOT NULL,
  `graus_importancia_alto` text NOT NULL,
  `graus_satisfacao_baixo` text NOT NULL,
  `graus_satisfacao_medio` text NOT NULL,
  `graus_satisfacao_alto` text NOT NULL,
  `graus_concorrencia_melhor` text NOT NULL,
  `graus_concorrencia_igual` text NOT NULL,
  `graus_concorrencia_deles` text NOT NULL,
  `graus_importancia` text NOT NULL,
  `graus_satisfacao` text NOT NULL,
  `graus_concorrencia` text NOT NULL,
  PRIMARY KEY  (`id`)
) ;

-- 
-- Extraindo dados da tabela `pesos_por_graus`
-- 

INSERT INTO `pesos_por_graus` VALUES (1, '0', '5', '10', '0', '5', '10', '10', '5', '0', '10', '10', '10');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `pesquisa_satisfacao`
-- 

CREATE TABLE `pesquisa_satisfacao` (
  `id` int(11) NOT NULL auto_increment,
  `atendimento_dep_comercial_importancia` text NOT NULL,
  `atendimento_dep_comercial_satisfacao` text NOT NULL,
  `atendimento_dep_comercial_concorrencia` text NOT NULL,
  `atendimento_representante_importancia` text NOT NULL,
  `atendimento_representante_satisfacao` text NOT NULL,
  `atendimento_representante_concorrencia` text NOT NULL,
  `atendimento_dep_projeto_importancia` text NOT NULL,
  `atendimento_dep_projeto_satisfacao` text NOT NULL,
  `atendimento_dep_projeto_concorrencia` text NOT NULL,
  `atendimento_pcp_importancia` text NOT NULL,
  `atendimento_pcp_satisfacao` text NOT NULL,
  `atendimento_pcp_concorrencia` text NOT NULL,
  `atendimento_dep_expedicao_importancia` text NOT NULL,
  `atendimento_dep_expedicao_satisfacao` text NOT NULL,
  `atendimento_dep_expedicao_concorrencia` text NOT NULL,
  `assistencia_tecnica_importancia` text NOT NULL,
  `assistencia_tecnica_satisfacao` text NOT NULL,
  `assistencia_tecnica_concorrencia` text NOT NULL,
  `catalagos_tecnicos_importancia` text NOT NULL,
  `catalagos_tecnicos_satisfacao` text NOT NULL,
  `catalagos_tecnicos_concorrencia` text NOT NULL,
  `condicao_de_pagamento_importancia` text NOT NULL,
  `condicao_de_pagamento_satisfacao` text NOT NULL,
  `condicao_de_pagamento_concorrencia` text NOT NULL,
  `embalagem_importancia` text NOT NULL,
  `embalagem_satisfacao` text NOT NULL,
  `embalagem_concorrencia` text NOT NULL,
  `prazo_de_entrega_importancia` text NOT NULL,
  `prazo_de_entrega_satisfacao` text NOT NULL,
  `prazo_de_entrega_concorrencia` text NOT NULL,
  `preco_dos_produtos_importancia` text NOT NULL,
  `preco_dos_produtos_satisfacao` text NOT NULL,
  `preco_dos_produtos_concorrencia` text NOT NULL,
  `programa_de_selecao_importancia` text NOT NULL,
  `programa_de_selecao_satisfacao` text NOT NULL,
  `programa_de_selecao_concorrencia` text NOT NULL,
  `qualidade_dos_produtos_importancia` text NOT NULL,
  `qualidade_dos_produtos_satisfacao` text NOT NULL,
  `qualidade_dos_produtos_concorrencia` text NOT NULL,
  `seguranca_do_produto_importancia` text NOT NULL,
  `seguranca_do_produto_satisfacao` text NOT NULL,
  `seguranca_do_produto_concorrencia` text NOT NULL,
  `variedade_dos_produtos_importancia` text NOT NULL,
  `variedade_dos_produtos_satisfacao` text NOT NULL,
  `variedade_dos_produtos_concorrencia` text NOT NULL,
  `conduta_da_equipe_tecnica_importancia` text NOT NULL,
  `conduta_da_equipe_tecnica_satisfacao` text NOT NULL,
  `conduta_da_equipe_tecnica_concorrencia` text NOT NULL,
  `cumprimento_do_prazo_importancia` text NOT NULL,
  `cumprimento_do_prazo_satisfacao` text NOT NULL,
  `cumprimento_do_prazo_concorrencia` text NOT NULL,
  `equipe_com_confiabilidade_e_qualificacao_importancia` text NOT NULL,
  `equipe_com_confiabilidade_e_qualificacao_satisfacao` text NOT NULL,
  `equipe_com_confiabilidade_e_qualificacao_concorrencia` text NOT NULL,
  `equipes_disponiveis_para_atendimento_importancia` text NOT NULL,
  `equipes_disponiveis_para_atendimento_satisfacao` text NOT NULL,
  `equipes_disponiveis_para_atendimento_concorrencia` text NOT NULL,
  `facilidade_nas_solicitacoes_importancia` text NOT NULL,
  `facilidade_nas_solicitacoes_satisfacao` text NOT NULL,
  `facilidade_nas_solicitacoes_concorrencia` text NOT NULL,
  `qualidade_dos_servicos_importancia` text NOT NULL,
  `qualidade_dos_servicos_satisfacao` text NOT NULL,
  `qualidade_dos_servicos_concorrencia` text NOT NULL,
  `rapido_atendimento_ao_telefone_importancia` text NOT NULL,
  `rapido_atendimento_ao_telefone_satisfacao` text NOT NULL,
  `rapido_atendimento_ao_telefone_concorrencia` text NOT NULL,
  `criticas_sugestoes` text NOT NULL,
  `compraria_novamente_projelmec` text NOT NULL,
  `recomendaria_projelmec` text NOT NULL,
  `razao_social` text NOT NULL,
  `nome` text NOT NULL,
  `cargo` text NOT NULL,
  `telefone` text NOT NULL,
  `preenchido` text NOT NULL,
  `estado` text NOT NULL,
  PRIMARY KEY  (`id`)
) ;
