-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Mar-2023 às 20:50
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_sonoscompiuter`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(5) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `admin_login`
--

INSERT INTO `admin_login` (`id`, `login`, `senha`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cpu`
--

CREATE TABLE `cpu` (
  `id` int(5) NOT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `soquete` varchar(50) DEFAULT NULL,
  `grafico_integrado` tinyint(1) DEFAULT NULL,
  `pontuacao` int(5) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `nome_cpu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gpu`
--

CREATE TABLE `gpu` (
  `id` int(5) NOT NULL,
  `interface` varchar(50) DEFAULT NULL,
  `chip_grafico` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `pontuacao` int(20) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `nome_gpu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `placa_mae`
--

CREATE TABLE `placa_mae` (
  `id` int(5) NOT NULL,
  `soquete_mae` varchar(50) DEFAULT NULL,
  `interface_grafica` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `nome_mae` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `placa_mae`
--

INSERT INTO `placa_mae` (`id`, `soquete_mae`, `interface_grafica`, `marca`, `preco`, `nome_mae`) VALUES
(17, 'f', 'f', 'f', 5, ''),
(18, 'g', 'g', 'g', 5, 'g'),
(19, 'g', 'g', 'g', 5, 'g');

-- --------------------------------------------------------

--
-- Estrutura da tabela `requisito_software`
--

CREATE TABLE `requisito_software` (
  `id` int(5) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `pontuacao_gpu` int(5) DEFAULT NULL,
  `pontuacao_cpu` int(5) DEFAULT NULL,
  `fps` int(5) DEFAULT NULL,
  `qualidade_grafica` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `requisito_software`
--

INSERT INTO `requisito_software` (`id`, `nome`, `pontuacao_gpu`, `pontuacao_cpu`, `fps`, `qualidade_grafica`) VALUES
(1, 'Valorant', NULL, NULL, NULL, NULL),
(2, 'Counter Strike', NULL, NULL, NULL, NULL),
(3, 'League of Legends', NULL, NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `gpu`
--
ALTER TABLE `gpu`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `placa_mae`
--
ALTER TABLE `placa_mae`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `requisito_software`
--
ALTER TABLE `requisito_software`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cpu`
--
ALTER TABLE `cpu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `gpu`
--
ALTER TABLE `gpu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `placa_mae`
--
ALTER TABLE `placa_mae`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `requisito_software`
--
ALTER TABLE `requisito_software`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
