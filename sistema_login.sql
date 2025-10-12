-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/10/2025 às 00:23
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_login`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `tipo_terapia` varchar(100) NOT NULL,
  `data_hora` datetime NOT NULL,
  `local` varchar(100) DEFAULT 'Online (Zoom)',
  `status` enum('Cancelada','Agendando','Confirmada','Realizada') DEFAULT 'Agendando'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `consultas`
--

INSERT INTO `consultas` (`id`, `usuario_id`, `tipo_terapia`, `data_hora`, `local`, `status`) VALUES
(11, 8, 'Terapia Energética', '2025-09-13 16:14:00', 'Studio Leka Sarandy', 'Agendando');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` int(11) DEFAULT 1,
  `caminho_foto` varchar(255) DEFAULT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `nivel`, `caminho_foto`, `data_criacao`) VALUES
(6, 'Nickolas Dos Santos Cremasco', 'nickolascremasco@gmail.com', '$2y$12$SKgCR/5NvT4lQjaNykKmUOcfc5LKfw6/nTdqTewjGf2BTLJ9DsKZS', 2, NULL, '2025-05-27 01:51:05'),
(7, 'Leka', 'infolekaeducativa@gmail.com', '$2y$12$f3qZJRPpOuC5RMgoiA73OOSk0GzMRc8jblKFlqL7V.TfV7jMw0yyG', 1, NULL, '2025-05-27 01:51:42'),
(8, 'teste', 'teste@gmail.com', '$2y$12$MDGojS6f7ApXOqnfEDeQFuBRse5oK8Kz.KU/3aD92Me7vF0.fKddK', 1, NULL, '2025-09-10 21:04:20'),
(10, 'teste', 'testandoFoto@gmail.com', '$2y$12$6PUYR/twbKMF2eVtFpd0C.22jkYcE.3hX9QgdFHG7QJtl3w4DcgS6', 1, 'src/uploads/foto_68ec2a0b216ff2.77164143.png', '2025-10-12 22:22:04');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultas_ibfk_1` (`usuario_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
