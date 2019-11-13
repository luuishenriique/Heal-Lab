-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 12-Nov-2019 às 22:32
-- Versão do servidor: 10.3.16-MariaDB
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
-- Banco de dados: `id10764760_proifpe`
--
CREATE DATABASE IF NOT EXISTS `id10764760_proifpe` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id10764760_proifpe`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Administradores`
--

CREATE TABLE `Administradores` (
  `id_adm` int(11) NOT NULL,
  `name_adm` varchar(50) NOT NULL,
  `email_adm` varchar(50) DEFAULT NULL,
  `password_adm` varchar(50) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `login_adm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Administradores`
--

INSERT INTO `Administradores` (`id_adm`, `name_adm`, `email_adm`, `password_adm`, `id_user`, `login_adm`) VALUES
(20000, 'Supremo senhor Kaioh', 'khsupremo@gmail.com', 'lgmEknykkZj0E', 1, 'SKaioh'),
(20001, 'João Silva Xavier', 'joao.x@gmail.com', 'lgAwFp8foUYcA', 1, 'admin1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Alunos`
--

CREATE TABLE `Alunos` (
  `id_aluno` int(11) NOT NULL,
  `name_aluno` varchar(150) NOT NULL,
  `mat_aluno` varchar(35) NOT NULL,
  `email_aluno` varchar(50) DEFAULT NULL,
  `password_aluno` varchar(50) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Alunos`
--

INSERT INTO `Alunos` (`id_aluno`, `name_aluno`, `mat_aluno`, `email_aluno`, `password_aluno`, `id_user`) VALUES
(1, 'Luis Henrique Chaves de Oliveira', '20191INFIG0201', 'luis_henrique_co@hotmail.com', 'lghFqNRvZ/mA2', 3),
(3, 'Renata Barbosa de Lima', '20181LG3334', 'rena.barbosa@gmail.com', 'lgqhVuytGZvrs', 3),
(4, 'Larissa Ferreira Lopes', '20191INFIG0082', 'laryssaferreira12386@gmail.com', 'lg15eaqyU49po', 3),
(5, 'Kauê Luí de Souza Silva', '20191INFIG0236', 'ofckaue@gmail.com', 'lgiTueqn5PSZo', 3),
(6, 'Mateus Lopes dos Santos', '20191INFIG0317', 'mateusyasmim2014@gmail.com', 'lgsTC5NSnyhso', 3),
(7, 'Gabriella Batista da Silva', '20191INFIG0333', 'gabriella10batista@gmail.com', 'lgjDtrIYBw/16', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Cursos`
--

CREATE TABLE `Cursos` (
  `id_curso` int(11) NOT NULL,
  `name_curso` varchar(50) NOT NULL,
  `desc_curso` varchar(4000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Disciplinas`
--

CREATE TABLE `Disciplinas` (
  `id_disc` int(11) NOT NULL,
  `name_disc` varchar(150) NOT NULL,
  `desc_disc` varchar(4000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Disciplinas`
--

INSERT INTO `Disciplinas` (`id_disc`, `name_disc`, `desc_disc`) VALUES
(1, 'A', 'AAA'),
(2, 'b', 'bbb');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Matriculas`
--

CREATE TABLE `Matriculas` (
  `id_aluno` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Professores`
--

CREATE TABLE `Professores` (
  `id_prof` int(11) NOT NULL,
  `siape_prof` varchar(15) DEFAULT NULL,
  `name_prof` varchar(150) NOT NULL,
  `email_prof` varchar(50) DEFAULT NULL,
  `password_prof` varchar(50) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Professores`
--

INSERT INTO `Professores` (`id_prof`, `siape_prof`, `name_prof`, `email_prof`, `password_prof`, `id_user`) VALUES
(10000, '1234567', 'João Kleber Para Para', 'parapara@gmail.com', 'lglG.QxZgvFNA', 2),
(10001, '7777777', 'José Maria Lopes', 'jsilva@gmail.com', 'lgz83J9PPQtxg', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Turmas`
--

CREATE TABLE `Turmas` (
  `id_turma` int(11) NOT NULL,
  `turno_turma` varchar(5) NOT NULL,
  `id_disc` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Usuarios`
--

CREATE TABLE `Usuarios` (
  `id_user` int(11) NOT NULL,
  `type_user` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Usuarios`
--

INSERT INTO `Usuarios` (`id_user`, `type_user`) VALUES
(1, 'Administrador(a)'),
(2, 'Professor(a)'),
(3, 'Aluno(a)');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `Administradores`
--
ALTER TABLE `Administradores`
  ADD PRIMARY KEY (`id_adm`),
  ADD KEY `FK_Administradores_Usuarios` (`id_user`);

--
-- Índices para tabela `Alunos`
--
ALTER TABLE `Alunos`
  ADD PRIMARY KEY (`id_aluno`),
  ADD UNIQUE KEY `mat_aluno` (`mat_aluno`),
  ADD KEY `FK_Usuarios_Alunos` (`id_user`);

--
-- Índices para tabela `Cursos`
--
ALTER TABLE `Cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices para tabela `Disciplinas`
--
ALTER TABLE `Disciplinas`
  ADD PRIMARY KEY (`id_disc`);

--
-- Índices para tabela `Matriculas`
--
ALTER TABLE `Matriculas`
  ADD PRIMARY KEY (`id_aluno`,`id_turma`),
  ADD KEY `FK_Matriculas_Turmas` (`id_turma`);

--
-- Índices para tabela `Professores`
--
ALTER TABLE `Professores`
  ADD PRIMARY KEY (`id_prof`),
  ADD KEY `FK_Usuarios_Professores` (`id_user`);

--
-- Índices para tabela `Turmas`
--
ALTER TABLE `Turmas`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `FK_Disciplina_Turma` (`id_disc`),
  ADD KEY `FK_Professor_Turma` (`id_prof`),
  ADD KEY `FK_Curso_Turma` (`id_curso`);

--
-- Índices para tabela `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Administradores`
--
ALTER TABLE `Administradores`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20002;

--
-- AUTO_INCREMENT de tabela `Alunos`
--
ALTER TABLE `Alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `Cursos`
--
ALTER TABLE `Cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Disciplinas`
--
ALTER TABLE `Disciplinas`
  MODIFY `id_disc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `Professores`
--
ALTER TABLE `Professores`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;

--
-- AUTO_INCREMENT de tabela `Turmas`
--
ALTER TABLE `Turmas`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `Administradores`
--
ALTER TABLE `Administradores`
  ADD CONSTRAINT `FK_Administradores_Usuarios` FOREIGN KEY (`id_user`) REFERENCES `Usuarios` (`id_user`);

--
-- Limitadores para a tabela `Alunos`
--
ALTER TABLE `Alunos`
  ADD CONSTRAINT `FK_Usuarios_Alunos` FOREIGN KEY (`id_user`) REFERENCES `Usuarios` (`id_user`);

--
-- Limitadores para a tabela `Matriculas`
--
ALTER TABLE `Matriculas`
  ADD CONSTRAINT `FK_Matriculas_Alunos` FOREIGN KEY (`id_aluno`) REFERENCES `Alunos` (`id_aluno`),
  ADD CONSTRAINT `FK_Matriculas_Turmas` FOREIGN KEY (`id_turma`) REFERENCES `Turmas` (`id_turma`);

--
-- Limitadores para a tabela `Professores`
--
ALTER TABLE `Professores`
  ADD CONSTRAINT `FK_Usuarios_Professores` FOREIGN KEY (`id_user`) REFERENCES `Usuarios` (`id_user`);

--
-- Limitadores para a tabela `Turmas`
--
ALTER TABLE `Turmas`
  ADD CONSTRAINT `FK_Curso_Turma` FOREIGN KEY (`id_curso`) REFERENCES `Cursos` (`id_curso`),
  ADD CONSTRAINT `FK_Disciplina_Turma` FOREIGN KEY (`id_disc`) REFERENCES `Disciplinas` (`id_disc`),
  ADD CONSTRAINT `FK_Professor_Turma` FOREIGN KEY (`id_prof`) REFERENCES `Professores` (`id_prof`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
