-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 03:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_pira_control`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nomeCategoria` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id`, `nomeCategoria`) VALUES
(1, 'Periféricos'),
(2, 'Monitores'),
(3, 'Conectividade'),
(4, 'Fonte/Energia'),
(5, 'Conversores'),
(6, 'Hardware'),
(7, 'Outros');

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nomeProduto` varchar(45) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `quantidade` int(11) DEFAULT 0,
  `nomeCategoria` int(11) NOT NULL,
  `saida` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`id`, `nomeProduto`, `valor`, `quantidade`, `nomeCategoria`, `saida`) VALUES
(5, 'Teclado Logitech', '87.00', 7, 1, 2),
(6, 'Mouse Logitech', '40.00', 6, 1, NULL),
(7, 'Monitor AOC', '376.00', 5, 2, NULL),
(8, 'Pen Drive 8GB', '10.00', 10, 1, NULL),
(9, 'Switch Intelbras 8P Gigabit', '270.00', 1, 3, NULL),
(10, 'Protetor de Linha Intelbras', '36.00', 1, 4, NULL),
(11, 'Conversor VGA/ HDMI', '41.00', 1, 5, NULL),
(12, 'Leitor de Cartão de Memória USB', '78.00', 3, 1, NULL),
(13, 'Mouse Pad com Gel', '28.00', 1, 1, NULL),
(14, 'Carregador para Celular', '18.50', 7, 4, NULL),
(15, 'Cabo VGA', '15.00', 6, 5, NULL),
(16, 'Headset C/ Microfone P2', '22.00', 0, 1, NULL),
(17, 'Mouse Centrium', '40.00', 3, 1, NULL),
(18, 'Teclado Centrium', '22.00', 4, 1, NULL),
(19, 'Fonte de Alimentação', '70.00', 10, 4, NULL),
(20, 'Conversor de Mídia KGM 1105 /1000', '527.00', 8, 5, NULL),
(21, 'Carregador Portátil Power Bank 10.000 mAh', '80.00', 3, 4, NULL),
(22, 'Carregador Portátil Power Bank 8.800 mAh', '70.00', 1, 4, NULL),
(23, 'Placa de Rede TP-LINK TG-3468', '95.00', 4, 3, NULL),
(24, 'Headset AVAYA', '0.00', 3, 7, NULL),
(25, 'Leitor Código de Barras BEMATECH', '150.00', 1, 7, NULL),
(26, 'Processador Core i3-8100 1151', '700.00', 1, 6, NULL),
(27, 'Placa Mãe ASUS H310M-E R2.0/BR', '500.00', 1, 6, NULL),
(28, 'Fita para Etiquetadora Brother 12mm', '70.00', 2, 7, NULL),
(29, 'Kit Teclado e Mouse sem Fio', '200.00', 2, 1, NULL),
(30, 'Telefone Avaya', '0.00', 3, 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `ultimoNome` varchar(45) NOT NULL,
  `nomeUsuario` varchar(45) NOT NULL,
  `email` varchar(80) NOT NULL,
  `matricula` varchar(45) NOT NULL,
  `imagem` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `ultimoNome`, `nomeUsuario`, `email`, `matricula`, `imagem`, `senha`) VALUES
(1, 'Lucas', 'Rodrigues Cardoso', 'lucas.cardoso', 'lucas@email.com', '026271', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Pedro ', 'Augusto', 'psilva', 'psilva@piracicabanadf.com.br', '3387', '', 'd41d8cd98f00b204e9800998ecf8427e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria_idx` (`nomeCategoria`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
