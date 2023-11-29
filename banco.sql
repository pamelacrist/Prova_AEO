-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Nov-2023 às 01:29
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.5
START TRANSACTION;

SET
    time_zone = "+00:00";

--
-- Banco de dados: `aularevisao`
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `noticias`
--
CREATE TABLE `noticias` (
    `id` int(11) NOT NULL,
    `titulo` varchar(255) NOT NULL,
    `data` date NOT NULL,
    `conteudo` text NOT NULL
);

--
-- Extraindo dados da tabela `noticias`
--
INSERT INTO
    `noticias` (`id`, `titulo`, `data`, `conteudo`)
VALUES
    (
        1,
        'Notícia 1',
        '2023-07-20',
        'Esta é a primeira notícia.'
    ),
    (
        2,
        'Notícia 2',
        '2023-07-21',
        'Esta é a segunda notícia.'
    ),
    (
        3,
        'Notícia 3',
        '2023-07-22',
        'Esta é a terceira notícia.'
    ),
    (
        5,
        'Notícia de última hora',
        '2023-11-18',
        'Resolva seu B.O, falador passa mal, rapaz. O que nós estamos vendo é um interesse seu de promover a deslegitimação dos indivíduos silenciados por seus lugares de dores perpetuando o fascismo.   Pegue a visão, falador passa mal, rapaz. Tá acontecendo aqui um movimento pra promover a deslegitimação das pautas minoritárias infligindo sentimentos de dor na alma dos menos privilegiados.   '
    );

-- --------------------------------------------------------
--
-- Estrutura da tabela `usuarios`
--
CREATE TABLE `usuarios` (
    `idUsu` int(11) NOT NULL,
    `email` varchar(255) NOT NULL,
    `senha` varchar(255) NOT NULL
);

--
-- Extraindo dados da tabela `usuarios`
--
INSERT INTO
    `usuarios` (`idUsu`, `email`, `senha`)
VALUES
    (
        1,
        'fausto.toloi@prof.sc.senac.br',
        '890407fcde2e86c4da4e5554df79b1e7'
    );

--
-- Índices para tabelas despejadas
--
--
-- Índices para tabela `noticias`
--
ALTER TABLE
    `noticias`
ADD
    PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE
    `usuarios`
ADD
    PRIMARY KEY (`idUsu`);

--
-- AUTO_INCREMENT de tabelas despejadas
--
--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE
    `noticias`
MODIFY
    `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE
    `usuarios`
MODIFY
    `idUsu` int(11) NOT NULL AUTO_INCREMENT;

COMMIT;