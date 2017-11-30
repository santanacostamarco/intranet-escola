-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 30/11/2017 às 19:23
-- Versão do servidor: 10.1.26-MariaDB
-- Versão do PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `intranet_escola`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `cod` int(10) NOT NULL,
  `data_hora` datetime NOT NULL,
  `extencao` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `proprietario` int(10) NOT NULL,
  `ref` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `visibilidade` varchar(10) NOT NULL,
  `url` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nome_original` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `arquivos`
--

INSERT INTO `arquivos` (`cod`, `data_hora`, `extencao`, `proprietario`, `ref`, `visibilidade`, `url`, `nome_original`, `tipo`) VALUES

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `cod` int(10) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `turno` char(1) NOT NULL,
  `ref` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `codigo` int(6) NOT NULL,
  `ref` varchar(10) NOT NULL,
  `nome_disciplina` varchar(40) NOT NULL,
  `curso` varchar(10) NOT NULL,
  `professor` varchar(40) NOT NULL,
  `turno` varchar(20) DEFAULT NULL,
  `data_p1` date DEFAULT NULL,
  `data_p2` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `faltas`
--

CREATE TABLE `faltas` (
  `cod` int(20) NOT NULL,
  `ref_disciplina` varchar(10) NOT NULL,
  `matricula` int(20) NOT NULL,
  `faltas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `notas`
--

CREATE TABLE `notas` (
  `codigo` int(6) NOT NULL,
  `ref_disciplina` varchar(10) NOT NULL,
  `matricula` int(20) NOT NULL,
  `p1` double DEFAULT NULL,
  `p2` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `user_tipo` varchar(20) NOT NULL,
  `user_birth_date` date DEFAULT NULL,
  `user_date_creation` date DEFAULT NULL,
  `senha_prov` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_first_name`, `user_last_name`, `sex`, `email`, `user_tipo`, `user_birth_date`, `user_date_creation`, `senha_prov`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrador', NULL, NULL, 'admin@intranetescola.com.br', 'admin', '2017-10-01', '2017-10-01', 1),

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `proprietario` (`proprietario`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`cod`),
  ADD UNIQUE KEY `ref` (`ref`);

--
-- Índices de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `ref` (`ref`),
  ADD KEY `curso` (`curso`);

--
-- Índices de tabela `faltas`
--
ALTER TABLE `faltas`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `ref_disciplina` (`ref_disciplina`);

--
-- Índices de tabela `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `ref_disciplina` (`ref_disciplina`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `cod` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `cod` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `codigo` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `faltas`
--
ALTER TABLE `faltas`
  MODIFY `cod` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `notas`
--
ALTER TABLE `notas`
  MODIFY `codigo` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `arquivos`
--
ALTER TABLE `arquivos`
  ADD CONSTRAINT `arquivos_ibfk_1` FOREIGN KEY (`proprietario`) REFERENCES `users` (`user_id`);

--
-- Restrições para tabelas `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD CONSTRAINT `disciplinas_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `curso` (`ref`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `faltas`
--
ALTER TABLE `faltas`
  ADD CONSTRAINT `faltas_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `faltas_ibfk_2` FOREIGN KEY (`ref_disciplina`) REFERENCES `disciplinas` (`ref`),
  ADD CONSTRAINT `faltas_ibfk_3` FOREIGN KEY (`ref_disciplina`) REFERENCES `disciplinas` (`ref`);

--
-- Restrições para tabelas `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`ref_disciplina`) REFERENCES `disciplinas` (`ref`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
