-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 03-Nov-2019 às 19:17
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `maternidade`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bebe`
--

CREATE TABLE `bebe` (
  `reg_bebe` int(6) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `peso` float NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `altura` float NOT NULL,
  `data_nasc` date NOT NULL,
  `hora_nasc` time NOT NULL,
  `tipo_parto` tinyint(1) NOT NULL,
  `cpf_gestante` varchar(11) NOT NULL,
  `num_bercario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bercario`
--

CREATE TABLE `bercario` (
  `num_bercario` int(11) NOT NULL,
  `num_berco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `telefone` varchar(11) NOT NULL,
  `cpf_gestante` varchar(11) NOT NULL,
  `cpf_pessoa` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestante`
--

CREATE TABLE `gestante` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data_nasc` date NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `crm_medico` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

CREATE TABLE `medico` (
  `crm` varchar(6) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `parentesco` varchar(50) NOT NULL,
  `data_nasc` date NOT NULL,
  `cpf_gestante` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `bebe`
--
ALTER TABLE `bebe`
  ADD PRIMARY KEY (`reg_bebe`),
  ADD KEY `fk_mae` (`cpf_gestante`),
  ADD KEY `fk_bercario` (`num_bercario`);

--
-- Índices para tabela `bercario`
--
ALTER TABLE `bercario`
  ADD PRIMARY KEY (`num_bercario`);

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`telefone`),
  ADD KEY `fk_cont_gest` (`cpf_gestante`);

--
-- Índices para tabela `gestante`
--
ALTER TABLE `gestante`
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `fk_crm_med` (`crm_medico`);

--
-- Índices para tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`crm`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `fk_acompanha` (`cpf_gestante`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bebe`
--
ALTER TABLE `bebe`
  MODIFY `reg_bebe` int(6) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `bebe`
--
ALTER TABLE `bebe`
  ADD CONSTRAINT `fk_bercario` FOREIGN KEY (`num_bercario`) REFERENCES `bercario` (`num_bercario`),
  ADD CONSTRAINT `fk_mae` FOREIGN KEY (`cpf_gestante`) REFERENCES `gestante` (`cpf`);

--
-- Limitadores para a tabela `contato`
--
ALTER TABLE `contato`
  ADD CONSTRAINT `fk_cont_gest` FOREIGN KEY (`cpf_gestante`) REFERENCES `gestante` (`cpf`);

--
-- Limitadores para a tabela `gestante`
--
ALTER TABLE `gestante`
  ADD CONSTRAINT `fk_crm_med` FOREIGN KEY (`crm_medico`) REFERENCES `medico` (`crm`);

--
-- Limitadores para a tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `fk_acompanha` FOREIGN KEY (`cpf_gestante`) REFERENCES `gestante` (`cpf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
