-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Fev-2021 às 02:55
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lojavirtual`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `nome` varchar(63) DEFAULT NULL,
  `descr` varchar(511) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`id`, `nome`, `descr`) VALUES
(1, 'Martha Reis', 'Martha Reis é uma autora de livros de Quimica que atualmente deve representar 12% do PNLD.'),
(2, 'Elon Lages Lima', 'O mais famoso matemático e professor de matemática brasileiro, recebeu o Prêmio Elon Lages Lima e ganhou medalha de ouro na competição Elon Lages Lima já quando tinha 15 anos.'),
(3, 'Andrew Tanebaum', 'Andrew Tanenbaum é um autor descontraído e leve que gosta de explicações simplificadas e intuitivas sobre assuntos complexos. Também gosta de transformações de Fourier. '),
(4, 'Stephenie Meyer', 'Autora da série Crepúsculo, tem 47 anos e nasceu (onde mais?) em Connecticut, Tenesse. Ela escreveu outros trabalhos, como A Hospedeira. O que faz esses livros não serem populares é que eles não são da série Crepúsculo, que é muito popular.'),
(5, 'John Green', 'Provavelmente, só ter colocado o nome dele aqui já mudou a demografia dos assinantes deste website. É o autor de \' A culpa é das Estrelas\', se eu não me engano'),
(6, 'Rick Riordan', 'Rick Riordan descobriu a fórmula para o sucesso. Com seus personagens problemáticos, com TDAH (no mínimo), recebe o carinho de adolescentes que claramente não têm TDAH, porque leem séries de livros de 1000 páginas.'),
(7, 'Tito Lívio', 'Velho'),
(8, 'Heródoto', 'Mais velho. E grego'),
(9, 'Plutarco', 'O novinho dos três. Tem mais de 1.900 anos.'),
(10, 'Nietzsche', 'Bigode'),
(11, 'Platão', 'Barba'),
(12, 'Aristóteles', 'cabelo'),
(13, 'Augusto Cury', ''),
(14, 'Jordan Peterson', 'Ele tem aulas na Internet'),
(15, 'Mark Manson', 'Achei na Saraiva');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(63) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Livros Didáticos'),
(2, 'Romance'),
(3, 'História'),
(4, 'Filosofia'),
(5, 'Autoajuda'),
(6, 'Capa dura'),
(7, 'Capa Mole');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(63) DEFAULT NULL,
  `endereco` varchar(63) DEFAULT NULL,
  `email` varchar(63) NOT NULL,
  `id_carrinho` int(11) DEFAULT NULL,
  `senha` varchar(63) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `id` int(11) NOT NULL,
  `nome` varchar(63) DEFAULT NULL,
  `descr` varchar(511) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  `isbn` varchar(15) DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id`, `nome`, `descr`, `preco`, `estoque`, `isbn`, `id_autor`) VALUES
(1, 'Química 1', 'O melhor livro de química do planeta.', 15, 230, '123456789', 1),
(2, 'Quimica 2', 'O segundo melhor livro de química do planeta.', 12.5, 231, '123456789', 1),
(3, 'Química 3', 'O terceiro melhor livro de química do planeta.', 10, 232, '123456789', 1),
(4, 'A matemática do ensino médio', 'O título diz tudo.', 25, 450, '123456789', 2),
(5, 'Análise Real', 'O elon diz tudo.', 26.5, 451, '123456789', 2),
(6, 'Logaritmos', 'O tudo diz: Logaritmos.', 27, 452, '123456789', 2),
(7, 'Redes de Computadores', 'Um resumo lindo e divertido do tranquuilo tópico que são as redes de computadores.', 25, 450, '123456789', 3),
(8, 'Sistemas Operacionais', 'Um resumo lindo e divertido do tranquuilo tópico que são sistemas operacionais.', 26.5, 451, '123456789', 3),
(9, 'Sistemas Operacionais Modernos', 'Sistemas operacionais, tudo de novo. Mas mais moderno', 27, 452, '123456789', 3),
(10, 'Crepúsculo', 'Ela fica triste.', 25, 450, '123456789', 4),
(11, 'Lua Nova', 'Ela se apaixona.', 26.5, 451, '123456789', 4),
(12, 'Eclipse', 'Agora eles que se apaixonam', 27, 452, '123456789', 4),
(13, 'Tartarugas até lá embaixo', 'Não tem absolutamente nada a ver com tartarugas.', 25, 450, '123456789', 5),
(14, 'A culpa é das estrelas', 'A culpa é delas mesmo, relaxa.', 26.5, 451, '123456789', 5),
(15, 'Quem é você, Alasca?', 'Espero que não seja um cara procurando 1/3 de continente', 27, 452, '123456789', 5),
(16, 'O ladrão de raios', 'No fim ele nem tinha roubado o raio, foi sem querer.', 25, 450, '123456789', 6),
(17, 'O mar de monstros', 'O filme não é tão bom quanto o livro', 26.5, 451, '123456789', 6),
(18, 'A maldição do titã', 'Não tem filme (ainda)', 27, 452, '123456789', 6),
(19, 'Ab urbe condida', 'Um livro bem bom sobre a história de Roma. Com centenas de capítulos. Mas só sobreviveram uns 25', 25, 450, '123456789', 7),
(20, 'Desde a fundação da cidade', 'Um livro bem bom sobre a história de Roma. Com centenas de capítulos. Mas só sobreviveram uns 25', 26.5, 451, '123456789', 7),
(21, 'Since the founding of the city', 'Um livro bem bom sobre a história de Roma. Com centenas de capítulos. Mas só sobreviveram uns 25', 27, 452, '123456789', 7),
(22, 'Histórias', 'O livro que \"fundou a história\". Mas alguma boa parte dele o próprio autor dizia que provavelmente não era verdade. Leia com um pé atrás', 25, 450, '123456789', 8),
(23, 'As guerras persas', 'Capítulo único das Histórias, sobre as guerras persas', 26.5, 451, '123456789', 8),
(24, 'Thermopilae', 'Fun fact: Thermo-pylae significa literalmente portões quentes. São aguas termais e é só uma passagem estreita na encosta de uma montanha', 27, 452, '123456789', 8),
(25, 'Vidas dos imperadores romanos', 'Um livro bem bom sobre ... os imperadores de Roma. A maioria dos capítulos foi perdida', 25, 450, '123456789', 9),
(26, 'Vida de Alexandre', 'O que este romano pode encontrar de informações sobre a vida de um macedônio que viveu 200 anos antes dele.', 26.5, 451, '123456789', 9),
(27, 'Malícia de Heródoto', 'Um historiador tacando fogo em outro.', 27, 452, '123456789', 9),
(28, 'Ecce Homo', 'Como se chega a ser o que se é', 25, 450, '123456789', 10),
(29, 'Assim Falou Zaratustra', 'Se falou, tá falado.', 26.5, 451, '123456789', 10),
(30, 'Além do Bem e do Mal', 'Bal e Mem.', 27, 452, '123456789', 10),
(31, 'Apologia', 'O julgamento de Sócrates', 25, 450, '123456789', 11),
(32, 'República', 'Diálogo platônico sobre como deveria ser um governo.', 26.5, 451, '123456789', 11),
(33, 'Política', 'Diálogo Platônico sobre política.', 27, 452, '123456789', 11),
(34, 'Categorias', 'Diagramas de Venn, mas muito antes de Venn e sem diagramas.', 25, 450, '123456789', 12),
(35, 'Da Interpretação', 'Segunda parte do Órganon.', 26.5, 451, '123456789', 12),
(36, 'Elencos Sofísticos', 'Sobre sofismos e falácias.', 27, 452, '123456789', 12),
(37, 'Vendedor de Sonhos', '[inserir descrição]', 25, 450, '123456789', 13),
(38, 'O Homem mais Inteligente da História', '[inserir descrição]', 26.5, 451, '123456789', 13),
(39, 'O Mestre dos Mestres', '[inserir descrição]', 27, 452, '123456789', 13),
(40, 'Doze Regras Para a Vida', '[inserir descrição]', 25, 450, '123456789', 14),
(41, 'Mapas de Sentido', '[inserir descrição]', 26.5, 451, '123456789', 14),
(42, 'Doze mais regras para a vida', '[insert description]', 27, 452, '123456789', 14),
(43, 'A Arte de Ligar o F*da-se', '[inserir descrição]', 25, 450, '123456789', 15),
(44, 'F*deu geral', '[inserir descrição]', 26.5, 451, '123456789', 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livrocategoria`
--

CREATE TABLE `livrocategoria` (
  `id_livro` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livrocategoria`
--

INSERT INTO `livrocategoria` (`id_livro`, `id_categoria`) VALUES
(1, 1),
(1, 7),
(2, 1),
(2, 7),
(3, 1),
(3, 7),
(4, 1),
(4, 6),
(5, 1),
(5, 6),
(6, 1),
(6, 7),
(7, 1),
(7, 6),
(8, 1),
(8, 6),
(9, 1),
(9, 7),
(10, 2),
(10, 7),
(11, 2),
(11, 7),
(12, 2),
(12, 7),
(13, 2),
(13, 7),
(14, 2),
(14, 7),
(15, 2),
(15, 7),
(16, 2),
(16, 6),
(17, 2),
(17, 6),
(18, 2),
(18, 6),
(19, 3),
(19, 6),
(20, 3),
(20, 6),
(21, 3),
(21, 6),
(22, 3),
(22, 6),
(23, 3),
(23, 6),
(24, 3),
(24, 6),
(25, 3),
(25, 6),
(26, 3),
(26, 6),
(27, 3),
(27, 6),
(28, 4),
(28, 7),
(29, 4),
(29, 7),
(30, 4),
(30, 7),
(31, 4),
(31, 7),
(32, 4),
(32, 7),
(33, 4),
(33, 7),
(34, 4),
(34, 6),
(35, 4),
(35, 6),
(36, 4),
(36, 6),
(37, 5),
(37, 7),
(38, 5),
(38, 7),
(39, 5),
(39, 7),
(40, 5),
(40, 7),
(41, 5),
(41, 7),
(42, 5),
(42, 7),
(43, 5),
(43, 7),
(44, 5),
(44, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidolivro`
--

CREATE TABLE `pedidolivro` (
  `id_pedido` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `qtd` int(11) DEFAULT NULL,
  `preco_un` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fkcliente` (`id_carrinho`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fklivro` (`id_autor`);

--
-- Índices para tabela `livrocategoria`
--
ALTER TABLE `livrocategoria`
  ADD PRIMARY KEY (`id_livro`,`id_categoria`),
  ADD KEY `fklcat2` (`id_categoria`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkpedido` (`id_cliente`);

--
-- Índices para tabela `pedidolivro`
--
ALTER TABLE `pedidolivro`
  ADD PRIMARY KEY (`id_pedido`,`id_livro`),
  ADD KEY `fkplivro2` (`id_livro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fkcliente` FOREIGN KEY (`id_carrinho`) REFERENCES `pedido` (`id`);

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `fklivro` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id`);

--
-- Limitadores para a tabela `livrocategoria`
--
ALTER TABLE `livrocategoria`
  ADD CONSTRAINT `fklcat1` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id`),
  ADD CONSTRAINT `fklcat2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fkpedido` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`);

--
-- Limitadores para a tabela `pedidolivro`
--
ALTER TABLE `pedidolivro`
  ADD CONSTRAINT `fkplivro1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id`),
  ADD CONSTRAINT `fkplivro2` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
