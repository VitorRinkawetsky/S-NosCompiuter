-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Maio-2023 às 21:39
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
  `grafico_integrado` varchar(3) DEFAULT NULL,
  `pontuacao` int(5) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `nome_cpu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cpu`
--

INSERT INTO `cpu` (`id`, `marca`, `soquete`, `grafico_integrado`, `pontuacao`, `preco`, `nome_cpu`) VALUES
(1, 'Intel', '1200', 'nao', 38, 440, 'i3-10100f'),
(2, 'Intel', '1700', 'sim', 59, 630, 'i3-12100'),
(3, 'Intel', '1700', 'nao', 61, 980, 'i3-13100f'),
(5, 'Intel', '1200', 'nao', 50, 780, 'i5-11400f'),
(8, 'Intel', '1700', 'sim', 70, 1770, 'i5-12600k'),
(9, 'Intel', '1200', 'sim', 50, 1600, 'i7-10700'),
(10, 'Intel', '1700', 'sim', 77, 2800, 'i7-13700k'),
(11, 'Intel', '1200', 'sim', 56, 2500, 'i9-11900k'),
(12, 'Intel', '1700', 'nao', 66, 2500, 'i9-12900f');

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
  `preferencia` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `requisito_software`
--

INSERT INTO `requisito_software` (`id`, `nome`, `pontuacao_gpu`, `pontuacao_cpu`, `preferencia`) VALUES
(14, 'Call of Duty: Warzone', 49, 32, 'gpu'),
(16, 'Battlefield V', 52, 42, 'gpu'),
(17, 'Cyberpunk 2077', 52, 47, 'gpu'),
(18, 'Destiny 2', 39, 38, 'gpu'),
(19, 'Valorant', 39, 34, 'cpu'),
(20, 'Watch Dogs Legion', 52, 47, 'gpu'),
(21, 'Scarlet Nexus', 49, 46, 'gpu'),
(22, 'Red Dead Redemption 2', 52, 45, 'gpu'),
(23, 'Naruto Ultimate Ninja Storm 4', 30, 30, 'gpu'),
(24, 'Mafia 3', 44, 37, 'gpu'),
(25, 'Counter Strike:Global Offensive', 30, 30, 'cpu');

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
