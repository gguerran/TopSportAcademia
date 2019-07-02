-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Jul-2019 às 01:46
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avulso`
--

CREATE TABLE `avulso` (
  `idavulso` int(11) NOT NULL,
  `data_avulso` date NOT NULL,
  `valor` float NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `caixa`
--

CREATE TABLE `caixa` (
  `idcaixa` int(11) NOT NULL,
  `pagamento_id` int(11) DEFAULT NULL,
  `saida_id` int(11) DEFAULT NULL,
  `avulso_id` int(11) DEFAULT NULL,
  `data_caixa` date NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `objetivo` varchar(45) NOT NULL,
  `data_cadastro` date NOT NULL,
  `data_vencimento` date NOT NULL,
  `ficha_id` int(11) NOT NULL,
  `atividade` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficha`
--

CREATE TABLE `ficha` (
  `idficha` int(11) NOT NULL,
  `segunda` varchar(200) NOT NULL,
  `terca` varchar(200) NOT NULL,
  `quarta` varchar(200) NOT NULL,
  `quinta` varchar(200) NOT NULL,
  `sexta` varchar(200) NOT NULL,
  `sabado` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medidas`
--

CREATE TABLE `medidas` (
  `idmedidas` int(11) NOT NULL,
  `altura` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `braco_direito` int(11) NOT NULL,
  `antebraco_direito` int(11) NOT NULL,
  `pulso_direito` int(11) NOT NULL,
  `peito` int(11) NOT NULL,
  `torax` int(11) NOT NULL,
  `coxa_direita` int(11) NOT NULL,
  `quadril` int(11) NOT NULL,
  `panturrilha_direita` int(11) NOT NULL,
  `data_medicao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cliente_id` int(11) NOT NULL,
  `braco_esquerdo` int(11) NOT NULL,
  `antebraco_esquerdo` int(11) NOT NULL,
  `tornozelo_direito` int(11) NOT NULL,
  `tornozelo_esquerdo` int(11) NOT NULL,
  `pulso_esquerdo` int(11) NOT NULL,
  `coxa_esquerda` int(11) NOT NULL,
  `panturrilha_esquerda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Acionadores `medidas`
--
DELIMITER $$
CREATE TRIGGER `apaga_medidas` BEFORE UPDATE ON `medidas` FOR EACH ROW DELETE FROM medidas WHERE medidas.cliente_id IN (SELECT cliente.idcliente FROM cliente WHERE cliente.atividade != 1)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `idpagamento` int(11) NOT NULL,
  `data_pagamento` date NOT NULL,
  `valor` float NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `saida`
--

CREATE TABLE `saida` (
  `idsaida` int(11) NOT NULL,
  `descricao` varchar(70) NOT NULL,
  `valor` float NOT NULL,
  `data_saida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nome_user` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `nivel` int(11) NOT NULL,
  `atividade` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome_user`, `senha`, `nivel`, `atividade`) VALUES
(1, 'admin', 'admin', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `valores`
--

CREATE TABLE `valores` (
  `idvalores` int(11) NOT NULL,
  `valor_avulso` int(11) NOT NULL,
  `valor_mensalidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `valores`
--

INSERT INTO `valores` (`idvalores`, `valor_avulso`, `valor_mensalidade`) VALUES
(1, 5, 70);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avulso`
--
ALTER TABLE `avulso`
  ADD PRIMARY KEY (`idavulso`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `caixa`
--
ALTER TABLE `caixa`
  ADD PRIMARY KEY (`idcaixa`),
  ADD KEY `pagamento_id` (`pagamento_id`),
  ADD KEY `saida_id` (`saida_id`),
  ADD KEY `avulso_id` (`avulso_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`),
  ADD KEY `ficha_id` (`ficha_id`),
  ADD KEY `nome` (`nome`);

--
-- Indexes for table `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`idficha`);

--
-- Indexes for table `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`idmedidas`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`idpagamento`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indexes for table `saida`
--
ALTER TABLE `saida`
  ADD PRIMARY KEY (`idsaida`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indexes for table `valores`
--
ALTER TABLE `valores`
  ADD PRIMARY KEY (`idvalores`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avulso`
--
ALTER TABLE `avulso`
  MODIFY `idavulso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `caixa`
--
ALTER TABLE `caixa`
  MODIFY `idcaixa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ficha`
--
ALTER TABLE `ficha`
  MODIFY `idficha` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medidas`
--
ALTER TABLE `medidas`
  MODIFY `idmedidas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `idpagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saida`
--
ALTER TABLE `saida`
  MODIFY `idsaida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `valores`
--
ALTER TABLE `valores`
  MODIFY `idvalores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `avulso`
--
ALTER TABLE `avulso`
  ADD CONSTRAINT `avulso_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`idusuario`);

--
-- Limitadores para a tabela `caixa`
--
ALTER TABLE `caixa`
  ADD CONSTRAINT `caixa_ibfk_1` FOREIGN KEY (`pagamento_id`) REFERENCES `pagamento` (`idpagamento`),
  ADD CONSTRAINT `caixa_ibfk_2` FOREIGN KEY (`saida_id`) REFERENCES `saida` (`idsaida`),
  ADD CONSTRAINT `caixa_ibfk_3` FOREIGN KEY (`avulso_id`) REFERENCES `avulso` (`idavulso`),
  ADD CONSTRAINT `caixa_ibfk_4` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`idusuario`);

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`ficha_id`) REFERENCES `ficha` (`idficha`);

--
-- Limitadores para a tabela `medidas`
--
ALTER TABLE `medidas`
  ADD CONSTRAINT `medidas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`idcliente`);

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `pagamento_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`idcliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
