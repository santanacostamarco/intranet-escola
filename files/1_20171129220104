-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 23/11/2017 às 00:48
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
-- Estrutura para tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `cod_disciplinas` int(6) NOT NULL,
  `nome_disciplina` varchar(40) NOT NULL,
  `curso` varchar(40) NOT NULL,
  `professor` varchar(40) NOT NULL,
  `data_p1` date DEFAULT NULL,
  `data_p2` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `disciplinas`
--

INSERT INTO `disciplinas` (`cod_disciplinas`, `nome_disciplina`, `curso`, `professor`, `data_p1`, `data_p2`) VALUES
(1, 'Gestão financeira', 'gti', 'João Aguiar', NULL, NULL);

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
(1, 'admin', '6b52c479ec73a4fea208ae447ded9ca4', 'Administrador', NULL, NULL, 'admin@intranetescola.com.br', 'admin', '2017-10-01', '2017-10-01', 1),
(4, 'Teste', 'f12042a40a7139e9c7b15efd07df2d80', 'Teste', 'teste', 'm', 'teste@teste.com', 'admin', '1222-12-20', '2017-11-20', 1),
(5, 'ricardo', '9aff5cf0b6047fa3d0f7b6a9441b2083', 'Ricardo', 'Salles', 'm', 'ricardo@ricardo.com', 'professor', '1920-08-20', '2017-11-21', 1),
(7, 'aluno', '21bc8db69e00e1a1ae330ac5113a8640', 'aluno', 'aluno', 'f', 'aluno@aluno.cm', 'aluno', '1111-11-11', '2017-11-21', 1),
(8, 'professor', '37c8ac30a2857e479438fd9e66b7a771', 'professor', 'professor', 'o', 'professor@professor', 'professor', '1221-12-22', '2017-11-21', 1),
(9, 'ad', '5d10c990fd3cd5b96219e20ed32b4749', 'ad', 'ad', 'o', 'ad@ad', 'admin', '1212-12-12', '2017-11-21', 1),
(10, 'bla', 'e68c89bdf06531b73e416e39389be511', 'bla', 'bla', 'm', 'bla@bla', 'admin', '1111-11-11', '2017-11-21', 1),
(12, 'teste2', '200e26f0c8cb8349cde5227f467a707c', 'teste', 'teste', 'm', 'teste@teste2', 'professor', '1212-12-12', '2017-11-21', 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`cod_disciplinas`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `cod_disciplinas` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
