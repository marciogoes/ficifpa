-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Abr-2019 às 16:29
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agendamentoss`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `birth` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `registros`
--

INSERT INTO `registros` (`id`, `name`, `email`, `cpf`, `birth`, `address`, `phone`) VALUES
(2, 'FULANO', 'fulano@gmail.com', '109.204.887-99', '1995-05-30', 'rua teste do cadastro do cliente fulano', '(81) 9923-8865'),
(3, 'Marcos o1', 'marcos01@gmail.com', '109.204.724-01', '2019-04-11', 'rua teste009886 do cadastro do cliente', '(81) 9923-4401'),
(4, 'usuario teste o2', 'teste02@gmail.com', '109.204.724-02', '2019-04-10', 'rua teste02 do cadastro do cliente', '(81) 9923-4402'),
(5, 'usuario teste o3', 'teste03@gmail.com', '109.204.724-03', '2019-04-20', 'rua teste03 do cadastro do cliente', '(81) 9923-4403'),
(6, 'usuario teste o4', 'teste04@gmail.com', '109.204.724-04', '2019-04-26', 'rua teste04 do cadastro do cliente', '(81) 9923-4404');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
