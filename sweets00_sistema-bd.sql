-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Abr-2019 às 08:06
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sweets00_sistema-bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_alimento_pedido`
--

CREATE TABLE `tb_alimento_pedido` (
  `id_pedido` int(6) DEFAULT NULL,
  `id_cardapio` int(6) DEFAULT NULL,
  `quant` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cadastro`
--

CREATE TABLE `tb_cadastro` (
  `id_cadastro` int(11) NOT NULL,
  `nome_completo` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_cadastro`
--

INSERT INTO `tb_cadastro` (`id_cadastro`, `nome_completo`, `email`) VALUES
(2, 'Gerente', 'gerente@gmail.com'),
(3, 'Caixa', 'caixa@gmail.com'),
(4, 'Garçom', 'garcom@gmail.com'),
(5, 'Cozinheiro', 'cozinheiro@gmail.com'),
(6, 'vinicius clemente', 'viniciusclemente9680@gmai'),
(7, 'Bruno Miglioretto', 'Brunomiglioretto@gmail.co'),
(15, 'Bruno assis', 'Bruno@hotmail.com'),
(16, 'Bruno assis', 'Bruno@hotmail.com'),
(17, 'Bruno assis', 'Bruno@hotmail.com'),
(18, 'Bruno assis', 'Bruno@hotmail.com'),
(28, 'Illaoi', 'Illaoi@gmail.com'),
(29, 'Willian', 'Willian@gmail.com'),
(30, 'Willian', 'Willian@gmail.com'),
(31, 'Willian', 'Willian@gmail.com'),
(32, 'Willian', 'Willian@gmail.com'),
(41, 'gabriel sousa', 'gabriel@gmail.com'),
(43, 'Bruno', 'bruno@gmail.com'),
(44, 'brenda', 'brenda@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cardapio`
--

CREATE TABLE `tb_cardapio` (
  `id_cardapio` int(11) NOT NULL,
  `id_cardapio_subcat` int(6) DEFAULT NULL,
  `nome` varchar(25) DEFAULT NULL,
  `valor_unitario` float(9,2) DEFAULT NULL,
  `peso_grama` varchar(15) DEFAULT NULL,
  `calorias` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_cardapio`
--

INSERT INTO `tb_cardapio` (`id_cardapio`, `id_cardapio_subcat`, `nome`, `valor_unitario`, `peso_grama`, `calorias`) VALUES
(81, 10, 'Sanduíche Natural G (pão ', 8.00, '800g', 314),
(89, 4, 'Água com gás', 3.00, '500ml', 0),
(90, 4, 'Água sem gás', 3.00, '500ml', 0),
(91, 1, 'Laranja', 4.00, '350ml', 70),
(95, 1, 'Limão', 4.00, '350ml', 70),
(100, 1, 'Morango', 4.00, '350ml', 70),
(101, 1, 'Abacaxi', 4.00, '350ml', 150),
(102, 1, 'Banana', 4.00, '350ml', 120),
(104, 1, 'Mamão', 4.00, '350ml', 120),
(105, 1, 'Manga', 4.00, '350ml', 150),
(107, 1, 'Açai', 4.00, '350ml', 200),
(108, 3, 'Limão', 4.50, '350ml', 170),
(109, 3, 'Laranja', 4.50, '350ml', 170),
(112, 3, 'Morango', 4.50, '350ml', 170),
(113, 3, 'Abacaxi', 4.50, '350ml', 250),
(114, 3, 'Banana', 4.50, '350ml', 220),
(116, 3, 'Mamão', 4.50, '350ml', 220),
(117, 3, 'Manga', 4.50, '350ml', 250),
(119, 3, 'Açai', 4.50, '350ml', 300),
(121, 5, 'Chocolate', 7.00, '350ml', 200),
(122, 5, 'Morango', 7.00, '350ml', 200),
(123, 5, 'Baunilha', 7.00, '350ml', 200),
(147, 6, 'Suco Detox', 5.00, '350ml', 250),
(154, 9, 'Ricota', 5.00, '300g', 300),
(155, 9, 'Carne', 5.00, '300g', 300),
(156, 9, 'Presunto', 5.00, '300g', 300),
(157, 9, 'Queijo branco com brócoli', 5.00, '300g', 300),
(158, 12, 'Salada de frutas', 5.00, '400g', 50),
(159, 12, 'Açaí com granola', 5.00, '350ml', 110),
(160, 12, 'Barra de cereal', 5.00, '400g', 80),
(161, 12, 'Cookies', 5.00, '150g', 12),
(162, 8, '8 Assada de Frango com Ma', 5.00, '450g', 50),
(164, 11, 'Frango', 5.00, '350g', 200),
(165, 11, 'Palmito', 5.00, '350g', 200),
(166, 11, 'Bacalhau', 5.00, '350g', 200);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cardapio_cat`
--

CREATE TABLE `tb_cardapio_cat` (
  `id_cardapio_cat` int(11) NOT NULL,
  `nome_cardapio_cat` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_cardapio_cat`
--

INSERT INTO `tb_cardapio_cat` (`id_cardapio_cat`, `nome_cardapio_cat`) VALUES
(1, 'Bebidas'),
(2, 'Salgados'),
(3, 'Doces');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cardapio_subcat`
--

CREATE TABLE `tb_cardapio_subcat` (
  `id_cardapio_subcat` int(11) NOT NULL,
  `id_cardapio_cat` int(6) DEFAULT NULL,
  `nome_cardapio_subcat` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_cardapio_subcat`
--

INSERT INTO `tb_cardapio_subcat` (`id_cardapio_subcat`, `id_cardapio_cat`, `nome_cardapio_subcat`) VALUES
(1, 1, 'Suco com água'),
(3, 1, 'Suco com leite semi desnatado'),
(4, 1, 'Água'),
(5, 1, 'Shake Whey Protein'),
(6, 1, 'Suco Detox'),
(8, 2, 'Coxinha'),
(9, 2, 'Pastal Assado'),
(10, 2, 'Sanduíche Natural'),
(11, 2, 'Empada'),
(12, 3, 'Doces');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `id_cadastro` int(6) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`id_cadastro`, `data_nascimento`, `sexo`) VALUES
(NULL, '2000-11-20', 'M'),
(29, '1222-12-12', 'M'),
(30, '1222-12-12', 'M'),
(31, '1222-12-12', 'M'),
(32, '1222-12-12', 'M'),
(41, '2002-02-11', 'M'),
(43, '0000-00-00', 'M'),
(44, '0000-00-00', 'F');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionario`
--

CREATE TABLE `tb_funcionario` (
  `id_cadastro` int(6) DEFAULT NULL,
  `rg` int(11) DEFAULT NULL,
  `cpf` int(13) DEFAULT NULL,
  `cargo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_funcionario`
--

INSERT INTO `tb_funcionario` (`id_cadastro`, `rg`, `cpf`, `cargo`) VALUES
(2, 321561, 646546, 'Gerente'),
(3, 32131, 58978, 'Caixa'),
(4, 545, 5544, 'Garçom'),
(5, 55, 555, 'Cozinheiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_historico_alimento_pedido`
--

CREATE TABLE `tb_historico_alimento_pedido` (
  `id_historico_pedido` int(6) DEFAULT NULL,
  `id_cardapio` int(6) DEFAULT NULL,
  `quant` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_historico_pedido`
--

CREATE TABLE `tb_historico_pedido` (
  `id_cadastro` int(6) DEFAULT NULL,
  `date_historico` date DEFAULT NULL,
  `hora` date DEFAULT NULL,
  `subtotal` float(7,2) DEFAULT NULL,
  `id_historico_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ingrediente`
--

CREATE TABLE `tb_ingrediente` (
  `id_ingrediente` int(11) NOT NULL,
  `quant_max` int(8) DEFAULT NULL,
  `quant_min` int(4) DEFAULT NULL,
  `id_tipo_ingrediente` int(6) DEFAULT NULL,
  `validade` date DEFAULT NULL,
  `unidade` varchar(15) DEFAULT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `valor_unitario` float(7,2) DEFAULT NULL,
  `quant` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mesa`
--

CREATE TABLE `tb_mesa` (
  `id_mesa` int(11) NOT NULL,
  `id_cadastro` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_mesa`
--

INSERT INTO `tb_mesa` (`id_mesa`, `id_cadastro`) VALUES
(1, 43),
(2, 43);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_nota_fiscal`
--

CREATE TABLE `tb_nota_fiscal` (
  `id_nota_fiscal` int(11) NOT NULL,
  `id_cadastro` int(6) DEFAULT NULL,
  `id_pagamento` int(6) DEFAULT NULL,
  `data_hora` date DEFAULT NULL,
  `hora` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pagamento`
--

CREATE TABLE `tb_pagamento` (
  `id_pagamento` int(11) NOT NULL,
  `id_cadastro` int(6) DEFAULT NULL,
  `id_pedido` int(6) DEFAULT NULL,
  `forma_pagamento` char(1) DEFAULT NULL,
  `valor_pagamento` float(6,2) DEFAULT NULL,
  `troco` float(6,2) DEFAULT NULL,
  `situacao_pagamento` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedido`
--

CREATE TABLE `tb_pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_cadastro` int(6) DEFAULT NULL,
  `data_pedido` date DEFAULT NULL,
  `hora` date DEFAULT NULL,
  `subtotal` float(9,2) DEFAULT NULL,
  `situacao` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_receita`
--

CREATE TABLE `tb_receita` (
  `id_cardapio` int(6) DEFAULT NULL,
  `id_ingrediente` int(6) DEFAULT NULL,
  `quant_ingrediente` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_senha`
--

CREATE TABLE `tb_senha` (
  `id_cadastro` int(6) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `validar_email` tinyint(1) DEFAULT NULL,
  `token` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_senha`
--

INSERT INTO `tb_senha` (`id_cadastro`, `senha`, `validar_email`, `token`) VALUES
(2, '123', 0, NULL),
(3, '123', 0, NULL),
(4, '123', 0, NULL),
(5, '123', 0, NULL),
(15, '123', 0, NULL),
(16, '123', 0, NULL),
(17, '123', 0, NULL),
(18, '123', 0, '5c9d90abef'),
(28, 'illaoiolll', 0, '5c9d981f3e'),
(28, 'illaoiolll', 0, '5c9d981f3e'),
(28, 'illaoiolll', 0, '5c9d981f3e'),
(29, '99999999999', 0, '5c9d9a3f26'),
(30, '99999999999', 0, '5c9d9b3d05'),
(31, '99999999999', 0, '5c9d9b969a'),
(32, '99999999999', 0, '5c9d9babc1'),
(41, '123456789', 0, '5c9e665a10'),
(43, '123123123', 0, '5c9f92a464'),
(44, '123123123', NULL, '5ca561cb74427');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_telefone`
--

CREATE TABLE `tb_telefone` (
  `id_cadastro` int(6) DEFAULT NULL,
  `ddd` int(2) DEFAULT NULL,
  `numero` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_telefone`
--

INSERT INTO `tb_telefone` (`id_cadastro`, `ddd`, `numero`) VALUES
(2, 41, 322332),
(3, 44, 32123),
(4, 52, 515),
(5, 55, 5454),
(7, 41, 212121),
(32, 55, 23231213),
(41, 41, 0),
(43, 41, 0),
(44, 41, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_ingrediente`
--

CREATE TABLE `tb_tipo_ingrediente` (
  `id_tipo_ingrediente` int(11) NOT NULL,
  `nome_tipo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alimento_pedido`
--
ALTER TABLE `tb_alimento_pedido`
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_cardapio` (`id_cardapio`);

--
-- Indexes for table `tb_cadastro`
--
ALTER TABLE `tb_cadastro`
  ADD PRIMARY KEY (`id_cadastro`);

--
-- Indexes for table `tb_cardapio`
--
ALTER TABLE `tb_cardapio`
  ADD PRIMARY KEY (`id_cardapio`),
  ADD KEY `id_cardapio_subcat` (`id_cardapio_subcat`);

--
-- Indexes for table `tb_cardapio_cat`
--
ALTER TABLE `tb_cardapio_cat`
  ADD PRIMARY KEY (`id_cardapio_cat`);

--
-- Indexes for table `tb_cardapio_subcat`
--
ALTER TABLE `tb_cardapio_subcat`
  ADD PRIMARY KEY (`id_cardapio_subcat`),
  ADD KEY `id_cardapio_cat` (`id_cardapio_cat`);

--
-- Indexes for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD KEY `id_cadastro` (`id_cadastro`);

--
-- Indexes for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD KEY `id_cadastro` (`id_cadastro`);

--
-- Indexes for table `tb_historico_alimento_pedido`
--
ALTER TABLE `tb_historico_alimento_pedido`
  ADD KEY `id_historico_pedido` (`id_historico_pedido`),
  ADD KEY `id_cardapio` (`id_cardapio`);

--
-- Indexes for table `tb_historico_pedido`
--
ALTER TABLE `tb_historico_pedido`
  ADD PRIMARY KEY (`id_historico_pedido`),
  ADD KEY `id_cadastro` (`id_cadastro`);

--
-- Indexes for table `tb_ingrediente`
--
ALTER TABLE `tb_ingrediente`
  ADD PRIMARY KEY (`id_ingrediente`),
  ADD KEY `id_tipo_ingrediente` (`id_tipo_ingrediente`);

--
-- Indexes for table `tb_mesa`
--
ALTER TABLE `tb_mesa`
  ADD PRIMARY KEY (`id_mesa`),
  ADD KEY `id_cadastro` (`id_cadastro`);

--
-- Indexes for table `tb_nota_fiscal`
--
ALTER TABLE `tb_nota_fiscal`
  ADD PRIMARY KEY (`id_nota_fiscal`),
  ADD KEY `id_cadastro` (`id_cadastro`),
  ADD KEY `id_pagamento` (`id_pagamento`);

--
-- Indexes for table `tb_pagamento`
--
ALTER TABLE `tb_pagamento`
  ADD PRIMARY KEY (`id_pagamento`),
  ADD KEY `id_cadastro` (`id_cadastro`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indexes for table `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cadastro` (`id_cadastro`);

--
-- Indexes for table `tb_receita`
--
ALTER TABLE `tb_receita`
  ADD KEY `id_cardapio` (`id_cardapio`),
  ADD KEY `id_ingrediente` (`id_ingrediente`);

--
-- Indexes for table `tb_senha`
--
ALTER TABLE `tb_senha`
  ADD KEY `id_cadastro` (`id_cadastro`);

--
-- Indexes for table `tb_telefone`
--
ALTER TABLE `tb_telefone`
  ADD KEY `id_cadastro` (`id_cadastro`);

--
-- Indexes for table `tb_tipo_ingrediente`
--
ALTER TABLE `tb_tipo_ingrediente`
  ADD PRIMARY KEY (`id_tipo_ingrediente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cadastro`
--
ALTER TABLE `tb_cadastro`
  MODIFY `id_cadastro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_cardapio`
--
ALTER TABLE `tb_cardapio`
  MODIFY `id_cardapio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `tb_cardapio_cat`
--
ALTER TABLE `tb_cardapio_cat`
  MODIFY `id_cardapio_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_cardapio_subcat`
--
ALTER TABLE `tb_cardapio_subcat`
  MODIFY `id_cardapio_subcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_historico_pedido`
--
ALTER TABLE `tb_historico_pedido`
  MODIFY `id_historico_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_ingrediente`
--
ALTER TABLE `tb_ingrediente`
  MODIFY `id_ingrediente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mesa`
--
ALTER TABLE `tb_mesa`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_nota_fiscal`
--
ALTER TABLE `tb_nota_fiscal`
  MODIFY `id_nota_fiscal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pagamento`
--
ALTER TABLE `tb_pagamento`
  MODIFY `id_pagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pedido`
--
ALTER TABLE `tb_pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tipo_ingrediente`
--
ALTER TABLE `tb_tipo_ingrediente`
  MODIFY `id_tipo_ingrediente` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_alimento_pedido`
--
ALTER TABLE `tb_alimento_pedido`
  ADD CONSTRAINT `tb_alimento_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `tb_pedido` (`id_pedido`),
  ADD CONSTRAINT `tb_alimento_pedido_ibfk_2` FOREIGN KEY (`id_cardapio`) REFERENCES `tb_cardapio` (`id_cardapio`);

--
-- Limitadores para a tabela `tb_cardapio`
--
ALTER TABLE `tb_cardapio`
  ADD CONSTRAINT `tb_cardapio_ibfk_1` FOREIGN KEY (`id_cardapio_subcat`) REFERENCES `tb_cardapio_subcat` (`id_cardapio_subcat`);

--
-- Limitadores para a tabela `tb_cardapio_subcat`
--
ALTER TABLE `tb_cardapio_subcat`
  ADD CONSTRAINT `tb_cardapio_subcat_ibfk_1` FOREIGN KEY (`id_cardapio_cat`) REFERENCES `tb_cardapio_cat` (`id_cardapio_cat`);

--
-- Limitadores para a tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD CONSTRAINT `tb_cliente_ibfk_1` FOREIGN KEY (`id_cadastro`) REFERENCES `tb_cadastro` (`id_cadastro`);

--
-- Limitadores para a tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD CONSTRAINT `tb_funcionario_ibfk_1` FOREIGN KEY (`id_cadastro`) REFERENCES `tb_cadastro` (`id_cadastro`);

--
-- Limitadores para a tabela `tb_historico_alimento_pedido`
--
ALTER TABLE `tb_historico_alimento_pedido`
  ADD CONSTRAINT `tb_historico_alimento_pedido_ibfk_1` FOREIGN KEY (`id_historico_pedido`) REFERENCES `tb_historico_pedido` (`id_historico_pedido`),
  ADD CONSTRAINT `tb_historico_alimento_pedido_ibfk_2` FOREIGN KEY (`id_cardapio`) REFERENCES `tb_cardapio` (`id_cardapio`);

--
-- Limitadores para a tabela `tb_historico_pedido`
--
ALTER TABLE `tb_historico_pedido`
  ADD CONSTRAINT `tb_historico_pedido_ibfk_2` FOREIGN KEY (`id_cadastro`) REFERENCES `tb_cadastro` (`id_cadastro`);

--
-- Limitadores para a tabela `tb_ingrediente`
--
ALTER TABLE `tb_ingrediente`
  ADD CONSTRAINT `tb_ingrediente_ibfk_1` FOREIGN KEY (`id_tipo_ingrediente`) REFERENCES `tb_tipo_ingrediente` (`id_tipo_ingrediente`);

--
-- Limitadores para a tabela `tb_mesa`
--
ALTER TABLE `tb_mesa`
  ADD CONSTRAINT `tb_mesa_ibfk_1` FOREIGN KEY (`id_cadastro`) REFERENCES `tb_cadastro` (`id_cadastro`);

--
-- Limitadores para a tabela `tb_nota_fiscal`
--
ALTER TABLE `tb_nota_fiscal`
  ADD CONSTRAINT `tb_nota_fiscal_ibfk_1` FOREIGN KEY (`id_cadastro`) REFERENCES `tb_cadastro` (`id_cadastro`),
  ADD CONSTRAINT `tb_nota_fiscal_ibfk_2` FOREIGN KEY (`id_pagamento`) REFERENCES `tb_pagamento` (`id_pagamento`);

--
-- Limitadores para a tabela `tb_pagamento`
--
ALTER TABLE `tb_pagamento`
  ADD CONSTRAINT `tb_pagamento_ibfk_1` FOREIGN KEY (`id_cadastro`) REFERENCES `tb_cadastro` (`id_cadastro`),
  ADD CONSTRAINT `tb_pagamento_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `tb_pedido` (`id_pedido`);

--
-- Limitadores para a tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD CONSTRAINT `tb_pedido_ibfk_1` FOREIGN KEY (`id_cadastro`) REFERENCES `tb_cadastro` (`id_cadastro`);

--
-- Limitadores para a tabela `tb_receita`
--
ALTER TABLE `tb_receita`
  ADD CONSTRAINT `tb_receita_ibfk_1` FOREIGN KEY (`id_cardapio`) REFERENCES `tb_cardapio` (`id_cardapio`),
  ADD CONSTRAINT `tb_receita_ibfk_2` FOREIGN KEY (`id_ingrediente`) REFERENCES `tb_ingrediente` (`id_ingrediente`);

--
-- Limitadores para a tabela `tb_senha`
--
ALTER TABLE `tb_senha`
  ADD CONSTRAINT `tb_senha_ibfk_1` FOREIGN KEY (`id_cadastro`) REFERENCES `tb_cadastro` (`id_cadastro`);

--
-- Limitadores para a tabela `tb_telefone`
--
ALTER TABLE `tb_telefone`
  ADD CONSTRAINT `tb_telefone_ibfk_1` FOREIGN KEY (`id_cadastro`) REFERENCES `tb_cadastro` (`id_cadastro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
