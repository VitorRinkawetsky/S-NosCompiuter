-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Maio-2023 às 21:44
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
  `pontuacao` int(6) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `nome_cpu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cpu`
--

INSERT INTO `cpu` (`id`, `marca`, `soquete`, `pontuacao`, `preco`, `nome_cpu`) VALUES
(1, 'Intel', '1200', 8806, 440, 'i3-10100f'),
(3, 'Intel', '1700', 15207, 980, 'i3-13100f'),
(5, 'Intel', '1200', 17170, 780, 'i5-11400f'),
(8, 'Intel', '1700', 27467, 1770, 'i5-12600k'),
(10, 'Intel', '1700', 46829, 2800, 'i7-13700k'),
(11, 'Intel', '1200', 25381, 2500, 'i9-11900k'),
(12, 'Intel', '1700', 37240, 2500, 'i9-12900f'),
(13, 'AMD', 'AM4', 11194, 449, 'Ryzen 3 4100'),
(14, 'AMD', 'AM4', 17795, 639, 'Ryzen 5 3600'),
(15, 'AMD', 'AM4', 21632, 899, 'Ryzen 5 5600'),
(16, 'AMD', 'AM4', 28073, 1499, 'Ryzen 7 5800X'),
(17, 'AMD', 'AM4', 39307, 1999, 'Ryzen 9 5900X');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gpu`
--

CREATE TABLE `gpu` (
  `id` int(5) NOT NULL,
  `chip_grafico` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `pontuacao` int(20) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `nome_gpu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `gpu`
--

INSERT INTO `gpu` (`id`, `chip_grafico`, `marca`, `pontuacao`, `preco`, `nome_gpu`) VALUES
(3, 'NVIDIA', 'Asus', 6045, 1999, 'GTX 1650'),
(4, 'NVIDIA', 'Galax', 16612, 2969, 'RTX 2060 SUPER'),
(5, 'NVIDIA', 'MSI', 12811, 1529, 'GTX 1660 SUPER'),
(6, 'NVIDIA', 'Asus', 13190, 4589, 'RTX 2080 '),
(7, 'NVIDIA', 'PNY', 13032, 1899, 'RTX 3050 '),
(8, 'NVIDIA', 'Asus', 22513, 3799, 'RTX 3070'),
(9, 'NVIDIA', 'Gigabyte', 39551, 11489, 'RTX 4090'),
(10, 'AMD', 'Red Dragon', 8915, 911, 'RX 580 '),
(11, 'AMD', 'Gigabyte', 9497, 1599, 'RX 6500 XT'),
(12, 'AMD', 'Sapphire', 19920, 2759, 'RX 6700 XT'),
(13, 'AMD', 'Sapphire', 31873, 7629, 'RX 7900 XTX'),
(14, 'AMD', 'Sapphire', 29145, 10923, 'RX 6950 XT'),
(15, 'AMD', 'Gigabyte', 25108, 5698, 'RX 6800 XT');

-- --------------------------------------------------------

--
-- Estrutura da tabela `placa_mae`
--

CREATE TABLE `placa_mae` (
  `id` int(5) NOT NULL,
  `soquete_mae` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `nome_mae` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `placa_mae`
--

INSERT INTO `placa_mae` (`id`, `soquete_mae`, `marca`, `preco`, `nome_mae`) VALUES
(23, '1200', 'Gigabyte', 549, 'H410M'),
(24, '1200', 'Asus', 809, 'B460M-PLUS'),
(25, '1700', 'Asus', 639, 'H610M-E'),
(26, 'AM4', 'Asus', 579, 'A520M-E'),
(27, 'AM4', 'Gigabyte', 715, 'B450M'),
(28, '1700', 'Asus', 1799, 'Z690-Plus');

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `gpu`
--
ALTER TABLE `gpu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `placa_mae`
--
ALTER TABLE `placa_mae`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `requisito_software`
--
ALTER TABLE `requisito_software`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
