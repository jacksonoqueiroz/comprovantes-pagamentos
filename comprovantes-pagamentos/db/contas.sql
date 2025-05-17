-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/05/2025 às 20:55
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `contas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL,
  `tipo_conta` varchar(50) DEFAULT NULL,
  `mes` varchar(20) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `arquivo` varchar(255) DEFAULT NULL,
  `data_pagamento` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pagamentos`
--

INSERT INTO `pagamentos` (`id`, `tipo_conta`, `mes`, `ano`, `arquivo`, `data_pagamento`) VALUES
(1, 'Luz', 'Dezembro', 2022, '6827b48c2f3fe.pdf', '2025-05-16 18:56:28'),
(2, 'Luz', 'Janeiro', 2023, '6827b6a99eb85.pdf', '2025-05-16 19:05:29'),
(3, 'Luz', 'Fevereiro', 2023, '6827b9e98fa2b.pdf', '2025-05-16 19:19:21'),
(4, 'Luz', 'Março', 2023, '1747434418_luz-março-2023.pdf', '2025-05-16 19:26:58'),
(5, 'Luz', 'Abril', 2023, '1747435140_luz-abril-2023.pdf', '2025-05-16 19:39:00'),
(6, 'Luz', 'Maio', 2023, '1747435282_luz-maio-2023.pdf', '2025-05-16 19:41:22'),
(7, 'Luz', 'Junho', 2023, '1747435636_luz-junho-2023.pdf', '2025-05-16 19:47:16'),
(8, 'Luz', 'Julho', 2023, '1747435739_luz-julho-2023.pdf', '2025-05-16 19:48:59'),
(9, 'Luz', 'Agosto', 2023, '1747435923_luz-agosto-2023.pdf', '2025-05-16 19:52:03'),
(10, 'Luz', 'Setembro', 2023, '1747436025_luz-setembro-2023.pdf', '2025-05-16 19:53:45'),
(11, 'Luz', 'Outubro', 2023, '1747436131_luz-outubro-2023.pdf', '2025-05-16 19:55:31'),
(12, 'Luz', 'Novembro', 2023, '1747436290_luz-novembro-2023.pdf', '2025-05-16 19:58:10'),
(13, 'Luz', 'Dezembro', 2023, '1747436417_luz-dezembro-23.pdf', '2025-05-16 20:00:17'),
(14, 'Luz', 'Janeiro', 2024, '1747437507_luz-janeiro-23.pdf', '2025-05-16 20:18:27'),
(15, 'Luz', 'Fevereiro', 2024, '1747437578_luz-fevereiro-2024.pdf', '2025-05-16 20:19:38'),
(16, 'Luz', 'Março', 2024, '1747437609_luz-março-24-casa-2.pdf', '2025-05-16 20:20:09'),
(17, 'Luz', 'Abril', 2024, '1747437703_luz-abril-2024.pdf', '2025-05-16 20:21:43'),
(18, 'Luz', 'Maio', 2024, '1747437919_luz-maio-2024.pdf', '2025-05-16 20:25:19'),
(19, 'Luz', 'Junho', 2024, '1747437968_Luz-junho-2024.pdf', '2025-05-16 20:26:08'),
(20, 'Luz', 'Julho', 2024, '1747437991_luz-julho-2024.pdf', '2025-05-16 20:26:31'),
(21, 'Luz', 'Agosto', 2024, '1747438044_luz-agosto-2024.pdf', '2025-05-16 20:27:24'),
(22, 'Luz', 'Setembro', 2024, '1747438219_luz-setembro-2024.pdf', '2025-05-16 20:30:19'),
(23, 'Luz', 'Outubro', 2024, '1747438247_luz-outubro-2024.pdf', '2025-05-16 20:30:47'),
(24, 'Luz', 'Novembro', 2024, '1747438761_luz-novembro-2024.pdf', '2025-05-16 20:39:21'),
(25, 'Luz', 'Dezembro', 2024, '1747438910_luz-dezembro-24.pdf', '2025-05-16 20:41:50'),
(26, 'Luz', 'Janeiro', 2025, '1747438964_luz-janeiro-2025.pdf', '2025-05-16 20:42:44'),
(27, 'Luz', 'Fevereiro', 2025, '1747439004_Luz-fevereiro-2025.pdf', '2025-05-16 20:43:24'),
(28, 'Luz', 'Março', 2025, '1747439155_luz-março-2025.pdf', '2025-05-16 20:45:55'),
(29, 'Luz', 'Abril', 2025, '1747439751_Luz-abril-2025.pdf', '2025-05-16 20:55:51'),
(30, 'Luz', 'Maio', 2025, '1747439777_Luz-maio-2025.pdf', '2025-05-16 20:56:17'),
(31, 'Água', 'Dezembro', 2022, '1747439961_agua-dezembro-2022.pdf', '2025-05-16 20:59:21'),
(32, 'Água', 'Janeiro', 2023, '1747440262_agua-janeiro-23.pdf', '2025-05-16 21:04:22');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
