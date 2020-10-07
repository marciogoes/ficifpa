-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Jun-2019 às 03:14
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trab_ads_132`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atleta`
--

CREATE TABLE `atleta` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `id_equipe` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `documento` varchar(255) NOT NULL,
  `info_adicionais` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `atleta`
--

INSERT INTO `atleta` (`id`, `nome`, `id_equipe`, `id_categoria`, `documento`, `info_adicionais`) VALUES
(1, 'Atleta 1', 1, 12, '95262849', 'telefone 1234-5678 e mais observacoes'),
(2, 'Atleta 2', 1, 10, '78747249', 'responsavel legal Pai'),
(3, 'Atleta 3', 1, 13, '10224520', 'telefone 0987-6543'),
(4, 'Atleta 4', 1, 13, '12390485', 'sem obs'),
(5, 'Atleta 5', 2, 10, '60705040', 'responsavel legal avó categoria kids 10 anos ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`) VALUES
(10, 'Categoria Kids'),
(11, '16/19 anos (2000/2003) - M/F'),
(12, '20/24 anos (1995/1999) - M/F'),
(13, '25/29 anos (1990/1994) - M/F'),
(14, '30/34 anos (1985/1989) - M/F'),
(15, '40/44 anos (1975/1979) - M/F'),
(16, '45/49 anos (1970/1974) - M/F'),
(17, '50/54 anos (1965/1969) - M/F'),
(18, '55/59 anos (1960/1964) - M/F'),
(19, '60/99 anos (1920/1959) - M/F');

-- --------------------------------------------------------

--
-- Estrutura da tabela `corrida`
--

CREATE TABLE `corrida` (
  `id` int(11) NOT NULL,
  `nome_corrida` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `kilometragem` varchar(255) NOT NULL,
  `regiao` varchar(255) NOT NULL,
  `info_adicionais` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `corrida`
--

INSERT INTO `corrida` (`id`, `nome_corrida`, `data`, `kilometragem`, `regiao`, `info_adicionais`) VALUES
(4, 'Segundo Circuito Municipal de Belém 2019', '2019-06-09', '4,5 km', 'Marau', 'Segunda etapa do ano de 2019, Corrida Adulto e Kids com premiaÃ§Ã£o!'),
(5, 'RÃºstica Ong Amor 2019', '2019-06-16', '5 km', 'Belém', 'Corrida da Imed > Ong Amor'),
(6, '1Â° Etapa Corrida de Rua de Belém 2020', '2019-07-23', '5 km', 'Belém', '1Â° etapa de 2019 - adultos'),
(7, 'Circuito SESC Belém', '2019-07-12', '6 km', 'Belém', 'Ver no site'),
(8, 'Meia Maratona de Belém', '2019-08-04', '21km', 'Belém', 'Percurso completo 21 km, + circuito de 5 km'),
(9, 'Segunda Rustica das CrianÃ§as IFPA', '2019-10-06', '3 km', 'Belém', 'Rustica da IFPA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipe`
--

CREATE TABLE `equipe` (
  `id` int(11) NOT NULL,
  `nome_equipe` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipe`
--

INSERT INTO `equipe` (`id`, `nome_equipe`, `cidade`) VALUES
(1, 'Primeira Equipe', 'Belém/PA'),
(2, 'Equipe Kids', 'Ananindeua/PA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  `id_corrida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id`, `id_atleta`, `id_corrida`) VALUES
(1, 1, 4),
(2, 2, 4),
(3, 3, 4),
(4, 4, 5),
(5, 5, 6),
(6, 1, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `treino`
--

CREATE TABLE `treino` (
  `id` int(11) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  `strava` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `treino`
--

INSERT INTO `treino` (`id`, `id_atleta`, `strava`) VALUES
(1, 1, 'https://www.strava.com/'),
(2, 4, 'https://www.strava.com/'),
(3, 3, 'https://www.strava.com/'),
(4, 2, 'https://www.strava.com/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `senha`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atleta`
--
ALTER TABLE `atleta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_atleta_categoria` (`id_categoria`),
  ADD KEY `FK_atleta_equipe` (`id_equipe`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corrida`
--
ALTER TABLE `corrida`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_evento_atleta` (`id_atleta`),
  ADD KEY `FK_evento_corrida` (`id_corrida`);

--
-- Indexes for table `treino`
--
ALTER TABLE `treino`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_treino_atleta` (`id_atleta`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `atleta`
--
ALTER TABLE `atleta`
  ADD CONSTRAINT `FK_atleta_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `FK_atleta_equipe` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id`);

--
-- Limitadores para a tabela `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `FK_evento_atleta` FOREIGN KEY (`id_atleta`) REFERENCES `atleta` (`id`),
  ADD CONSTRAINT `FK_evento_corrida` FOREIGN KEY (`id_corrida`) REFERENCES `corrida` (`id`);

--
-- Limitadores para a tabela `treino`
--
ALTER TABLE `treino`
  ADD CONSTRAINT `FK_treino_atleta` FOREIGN KEY (`id_atleta`) REFERENCES `atleta` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
