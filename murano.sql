-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Ago-2022 às 04:28
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
-- Banco de dados: `murano`
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
  `menus` varchar(355) NOT NULL,
  `subs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grupos_permissoes`
--

INSERT INTO `grupos_permissoes` (`id`, `id_grupo`, `menus`, `subs`) VALUES
(1, 1, '1.2.3.17.15.16.18.', ''),
(2, 2, '1', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `tabela` varchar(255) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`id`, `id_user`, `tipo`, `tabela`, `data`) VALUES
(1, 1, 'Acessou', 'Lista de Menu', '2022-08-20 19:58:26'),
(2, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:03:11'),
(3, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:04:21'),
(4, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:07:02'),
(5, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:07:06'),
(6, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:07:58'),
(7, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:08:00'),
(8, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:08:41'),
(9, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:08:45'),
(10, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:09:45'),
(11, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:10:05'),
(12, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:10:07'),
(13, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:10:20'),
(14, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:10:21'),
(15, 1, 'Deletou', 'Menu', '2022-08-20 20:11:12'),
(16, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:11:13'),
(17, 1, 'Acessou', 'Menu', '2022-08-20 20:11:22'),
(18, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:11:23'),
(19, 1, 'Acessou', 'Menu', '2022-08-20 20:12:50'),
(20, 1, 'Acessou', 'Menu', '2022-08-20 20:13:50'),
(21, 1, 'Acessou', 'Menu', '2022-08-20 20:14:21'),
(22, 1, 'Acessou', 'Menu', '2022-08-20 20:14:32'),
(23, 1, 'Acessou', 'Menu', '2022-08-20 20:14:46'),
(24, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 20:17:22'),
(25, 1, 'Criou', 'Menu', '2022-08-20 20:17:29'),
(26, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 20:17:29'),
(27, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 20:18:10'),
(28, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 20:20:04'),
(29, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 20:20:24'),
(30, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 20:21:44'),
(31, 1, 'Criou', 'Menu', '2022-08-20 20:21:51'),
(32, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 20:21:51'),
(33, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 20:22:33'),
(34, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 20:22:45'),
(35, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 20:22:49'),
(36, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 20:22:49'),
(37, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 20:24:07'),
(38, 1, 'Criou', 'Menu', '2022-08-20 20:24:41'),
(39, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 20:24:41'),
(40, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:26:31'),
(41, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:26:58'),
(42, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:27:09'),
(43, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 20:27:11'),
(44, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 20:27:22'),
(45, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 20:27:30'),
(46, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 20:27:41'),
(47, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:27:48'),
(48, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:30:06'),
(49, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:32:50'),
(50, 1, 'Acessou', 'Lista de Menu', '2022-08-20 20:34:27'),
(51, 1, 'Acessou', 'Lista de grupos', '2022-08-20 20:41:14'),
(52, 1, 'Acessou', 'Lista de grupos', '2022-08-20 20:41:27'),
(53, 1, 'Acessou', 'Lista de grupos', '2022-08-20 20:41:40'),
(54, 1, 'Acessou', 'Lista de grupos', '2022-08-20 20:41:48'),
(55, 1, 'Acessou', 'Lista de grupos', '2022-08-20 20:41:57'),
(56, 1, 'Acessou', 'Lista de grupos', '2022-08-20 20:42:11'),
(57, 1, 'Acessou', 'Lista de grupos', '2022-08-20 20:44:25'),
(58, 1, 'Acessou', 'Lista de grupos', '2022-08-20 20:44:52'),
(59, 1, 'Deletou', 'Deletou um grupo', '2022-08-20 20:44:55'),
(60, 1, 'Acessou', 'Lista de grupos', '2022-08-20 20:44:55'),
(61, 1, 'Acessou', 'Form de adicionar grupo', '2022-08-20 20:45:15'),
(62, 1, 'Acessou', 'Lista de grupos', '2022-08-20 20:45:17'),
(63, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 20:46:01'),
(64, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 20:47:28'),
(65, 1, 'Editou', 'Editou um grupo', '2022-08-20 20:47:43'),
(66, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 20:47:43'),
(67, 1, 'Editou', 'Editou um grupo', '2022-08-20 20:47:55'),
(68, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 20:47:55'),
(69, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 20:49:06'),
(70, 1, 'Editou', 'Editou um grupo', '2022-08-20 20:49:08'),
(71, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 20:49:08'),
(72, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 20:54:04'),
(73, 1, 'Editou', 'Editou um grupo', '2022-08-20 21:13:19'),
(74, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:13:19'),
(75, 1, 'Editou', 'Editou um grupo', '2022-08-20 21:13:23'),
(76, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:13:23'),
(77, 1, 'Editou', 'Editou um grupo', '2022-08-20 21:13:25'),
(78, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:13:25'),
(79, 1, 'Editou', 'Editou um grupo', '2022-08-20 21:13:27'),
(80, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:13:27'),
(81, 1, 'Editou', 'Editou um grupo', '2022-08-20 21:13:28'),
(82, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:13:29'),
(83, 1, 'Editou', 'Editou um grupo', '2022-08-20 21:13:30'),
(84, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:13:30'),
(85, 1, 'Editou', 'Editou um grupo', '2022-08-20 21:13:58'),
(86, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:13:58'),
(87, 1, 'Editou', 'Editou um grupo', '2022-08-20 21:14:00'),
(88, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:14:00'),
(89, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:15:40'),
(90, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:16:17'),
(91, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:21:10'),
(92, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:21:26'),
(93, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:21:34'),
(94, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:21:46'),
(95, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:22:02'),
(96, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:22:04'),
(97, 1, 'Acessou', 'Lista de Menu', '2022-08-20 21:22:07'),
(98, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 21:22:10'),
(99, 1, 'Criou', 'Menu', '2022-08-20 21:22:30'),
(100, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 21:22:30'),
(101, 1, 'Acessou', 'Lista de grupos', '2022-08-20 21:22:47'),
(102, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:22:48'),
(103, 1, 'Editou', 'Editou um grupo', '2022-08-20 21:22:50'),
(104, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:22:50'),
(105, 1, 'Acessou', 'Lista de grupos', '2022-08-20 21:23:00'),
(106, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:23:04'),
(107, 1, 'Acessou', 'Lista de Menu', '2022-08-20 21:23:42'),
(108, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 21:23:46'),
(109, 1, 'Criou', 'Menu', '2022-08-20 21:24:45'),
(110, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 21:24:45'),
(111, 1, 'Criou', 'Menu', '2022-08-20 21:25:08'),
(112, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 21:25:08'),
(113, 1, 'Acessou', 'Form de inserir menu', '2022-08-20 21:25:10'),
(114, 1, 'Acessou', 'Lista de grupos', '2022-08-20 21:25:17'),
(115, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:25:19'),
(116, 1, 'Editou', 'Editou um grupo', '2022-08-20 21:25:30'),
(117, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:25:30'),
(118, 1, 'Acessou', 'Lista de grupos', '2022-08-20 21:26:48'),
(119, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:26:50'),
(120, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:27:21'),
(121, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:27:49'),
(122, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:28:21'),
(123, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:28:28'),
(124, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:28:51'),
(125, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:28:55'),
(126, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:29:04'),
(127, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:29:13'),
(128, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:29:45'),
(129, 1, 'Editou', 'Editou um grupo', '2022-08-20 21:29:53'),
(130, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:29:53'),
(131, 1, 'Editou', 'Editou um grupo', '2022-08-20 21:29:56'),
(132, 1, 'Acessou', 'Form de editar grupo', '2022-08-20 21:29:56'),
(133, 1, 'Acessou', 'Lista de grupos', '2022-08-20 21:51:39'),
(134, 1, 'Acessou', 'Lista de Menu', '2022-08-20 21:51:48'),
(135, 1, 'Acessou', 'Lista de Menu', '2022-08-20 21:52:01'),
(136, 1, 'Acessou', 'Lista de Menu', '2022-08-20 21:52:17'),
(137, 1, 'Acessou', 'Lista de Menu', '2022-08-20 21:53:10'),
(138, 1, 'Acessou', 'Lista de Menu', '2022-08-20 21:53:17'),
(139, 1, 'Acessou', 'Lista de Menu', '2022-08-20 23:39:30'),
(140, 1, 'Acessou', 'Lista de Menu', '2022-08-22 01:12:10'),
(141, 1, 'Acessou', 'Lista de grupos', '2022-08-22 01:12:14'),
(142, 1, 'Acessou', 'Form de editar grupo', '2022-08-22 01:12:15'),
(143, 1, 'Acessou', 'Página de minha conta.', '2022-08-22 01:28:18'),
(144, 1, 'Acessou', 'Página de minha conta', '2022-08-22 01:28:32'),
(145, 1, 'Acessou', 'Página de minha conta', '2022-08-22 01:29:22'),
(146, 1, 'Acessou', 'Página de minha conta', '2022-08-22 01:29:43'),
(147, 1, 'Acessou', 'Página de minha conta', '2022-08-22 01:30:40'),
(148, 1, 'Acessou', 'Página de minha conta', '2022-08-22 01:30:52'),
(149, 1, 'Editou', 'Sua conta', '2022-08-22 01:30:55'),
(150, 1, 'Acessou', 'Página de minha conta', '2022-08-22 01:30:55'),
(151, 1, 'Editou', 'Sua conta', '2022-08-22 01:31:01'),
(152, 1, 'Acessou', 'Página de minha conta', '2022-08-22 01:31:01'),
(153, 1, 'Acessou', 'Página de minha conta', '2022-08-22 04:23:48'),
(154, 1, 'Editou', 'Sua conta', '2022-08-22 04:23:52'),
(155, 1, 'Acessou', 'Página de minha conta', '2022-08-22 04:23:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_admins`
--

CREATE TABLE `menu_admins` (
  `id` int(11) NOT NULL,
  `id_pai` int(11) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `icone` varchar(255) NOT NULL DEFAULT 'fas fa-tachometer-alt',
  `url` varchar(255) NOT NULL DEFAULT 'fas fa-tachometer-alt',
  `ordem` int(11) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `menu_admins`
--

INSERT INTO `menu_admins` (`id`, `id_pai`, `titulo`, `icone`, `url`, `ordem`, `ativo`) VALUES
(1, NULL, 'Home', 'las la-home', '/admin', 1000, 1),
(2, NULL, 'Minha conta', 'las la-user-circle', '/admin/minha-conta', 2000, 1),
(3, NULL, 'Configurações', 'las la-cog', '', 30000, 1),
(15, 3, 'Menu', '.', '/admin/menu/lista', 1000, 1),
(16, 3, 'Grupos', '.', '/admin/grupos/lista', 2000, 1),
(17, NULL, 'Admin', 'las la-user-shield', '/', 25000, 1),
(18, 17, 'Logs', '.', '/admin/logs/lista', 1000, 1);

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
(1, 1, 'Iago Vinícios', 'iagovinicius.12328@gmail.com', '$2y$10$sWjAcYHPlsGlGwlQhdBo3OXc6VtVOTsu6aWobYk1MhdtQ4B02cr3O', '2022-07-19', 'c505a6f443692beb37d5d268a946e033', 'a5c937c5582be25426bc0baa24e87531.jpg'),
(47, 2, 'Iago Vinicios', 'iago@kenn.com', '$2y$10$EtDWG6fRtmEvkHJrHa7rB.5vc.2HPSMVzYDDK4WGxwsxfC40QNwzm', '2022-08-17', '28f5fcfa46b074cfa780f7b055b06fc4', 'avatar-01.jpg');

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
-- Índices para tabela `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `menu_admins`
--
ALTER TABLE `menu_admins`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `grupos_permissoes`
--
ALTER TABLE `grupos_permissoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT de tabela `menu_admins`
--
ALTER TABLE `menu_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `notificacaos`
--
ALTER TABLE `notificacaos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
