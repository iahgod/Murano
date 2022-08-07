-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Ago-2022 às 01:04
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `iahgod_framework`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fila_emails`
--

CREATE TABLE `fila_emails` (
  `id` int(11) NOT NULL,
  `from_email` varchar(255) NOT NULL,
  `from_name` varchar(255) NOT NULL,
  `to_email` varchar(255) NOT NULL,
  `to_name` varchar(255) NOT NULL,
  `to_assunto` varchar(255) NOT NULL,
  `to_body` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fila_emails`
--

INSERT INTO `fila_emails` (`id`, `from_email`, `from_name`, `to_email`, `to_name`, `to_assunto`, `to_body`, `status`) VALUES
(1, 'iagovinicius.12328@gmail.com', 'Iago Vinicios', 'iagovinicius.12328@gmail.com', 'Iago Vinicios', 'Sua nova senha', 'Iago Vinicios, Segue a sua nova senha do sistema Teste, sua nova senha é: 32d3cc6c14d4dddf747f01d61670665f', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`id`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Usuário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos_permissoes`
--

CREATE TABLE `grupos_permissoes` (
  `id` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `menus` varchar(355) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grupos_permissoes`
--

INSERT INTO `grupos_permissoes` (`id`, `id_grupo`, `menus`) VALUES
(1, 1, '1.2.3.'),
(2, 2, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_admins`
--

CREATE TABLE `menu_admins` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `icone` varchar(255) NOT NULL DEFAULT 'fas fa-tachometer-alt',
  `url` varchar(255) NOT NULL DEFAULT 'fas fa-tachometer-alt',
  `ordem` int(11) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `menu_admins`
--

INSERT INTO `menu_admins` (`id`, `titulo`, `icone`, `url`, `ordem`, `ativo`) VALUES
(1, 'Home', 'fas fa-tachometer-alt', '/admin', 1, 1),
(2, 'Minha conta', 'zmdi zmdi-account', '/admin/minha-conta', 2, 1),
(3, 'Configurações', 'zmdi zmdi-settings', '/admin/configuracoes', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_admin_subs`
--

CREATE TABLE `menu_admin_subs` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `menu_admin_subs`
--

INSERT INTO `menu_admin_subs` (`id`, `id_menu`, `titulo`, `url`) VALUES
(4, 3, 'Sidebar', '/admin/menu/lista'),
(5, 3, 'Usuários', '/admin/usuarios'),
(6, 3, 'Grupos', '/admin/grupos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacaos`
--

CREATE TABLE `notificacaos` (
  `id` int(11) NOT NULL,
  `to_user` int(11) DEFAULT NULL,
  `from_user` int(11) DEFAULT NULL,
  `mensagem` text NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `notificacaos`
--

INSERT INTO `notificacaos` (`id`, `to_user`, `from_user`, `mensagem`, `data`) VALUES
(1, NULL, NULL, 'Olá seus puto', '2022-07-23 15:10:34'),
(2, NULL, NULL, 'Vagabundos', '2022-07-15 15:10:34'),
(3, NULL, NULL, 'Olá seus corno', '2022-07-03 15:10:34'),
(4, NULL, NULL, 'Vagabundos de merfda', '2022-07-17 15:10:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `criado_em` date NOT NULL,
  `token` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'avatar-01.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `id_grupo`, `nome`, `email`, `senha`, `criado_em`, `token`, `foto`) VALUES
(1, 1, 'Iago Vinícios', 'iagovinicius.12328@gmail.com', '$2y$10$sWjAcYHPlsGlGwlQhdBo3OXc6VtVOTsu6aWobYk1MhdtQ4B02cr3O', '2022-07-19', '0f96f342177da2c084ab2c71ebfdfabd', '6d9f8c39eb95c2ea4e53c0e1c710d6da.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `fila_emails`
--
ALTER TABLE `fila_emails`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `grupos_permissoes`
--
ALTER TABLE `grupos_permissoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `menu` (`menus`);

--
-- Índices para tabela `menu_admins`
--
ALTER TABLE `menu_admins`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `menu_admin_subs`
--
ALTER TABLE `menu_admin_subs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `notificacaos`
--
ALTER TABLE `notificacaos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupo` (`id_grupo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fila_emails`
--
ALTER TABLE `fila_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `grupos_permissoes`
--
ALTER TABLE `grupos_permissoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `menu_admins`
--
ALTER TABLE `menu_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `menu_admin_subs`
--
ALTER TABLE `menu_admin_subs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `notificacaos`
--
ALTER TABLE `notificacaos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `grupos_permissoes`
--
ALTER TABLE `grupos_permissoes`
  ADD CONSTRAINT `grupos_permissoes_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id`);

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `grupo` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
