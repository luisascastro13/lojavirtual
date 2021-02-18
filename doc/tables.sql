
use lojavirtual;

-----------------------------------------
--            CREATE TABLES            --
-----------------------------------------

CREATE TABLE IF NOT EXISTS autor(id integer primary key auto_increment, nome varchar(63), descr varchar(511));

CREATE TABLE IF NOT EXISTS categoria(id integer primary key auto_increment, nome varchar(63));

CREATE TABLE IF NOT EXISTS livro(id integer primary key auto_increment, nome varchar(63), descr varchar(511),
	preco real, estoque integer, isbn varchar(15), id_autor integer,
	constraint fklivro FOREIGN KEY (id_autor) REFERENCES autor(id));


CREATE TABLE IF NOT EXISTS livrocategoria(id_livro integer, id_categoria integer,
	constraint pklcat  PRIMARY KEY (id_livro, id_categoria),
	constraint fklcat1 FOREIGN KEY (id_livro) REFERENCES livro(id),
	constraint fklcat2 FOREIGN KEY (id_categoria) REFERENCES categoria(id));

CREATE TABLE IF NOT EXISTS cliente(id integer primary key AUTO_INCREMENT, nome varchar(63),
	endereco varchar(63), email varchar(63), id_carrinho integer, senha varchar(63));

CREATE TABLE IF NOT EXISTS pedido(id integer primary key auto_increment, id_cliente integer,
	estado integer,
	constraint fkpedido FOREIGN KEY (id_cliente) REFERENCES cliente(id));

CREATE TABLE IF NOT EXISTS pedidolivro(id_pedido integer,
	id_livro integer, qtd integer, preco_un integer,
	constraint pkplivro  PRIMARY KEY (id_pedido,id_livro),
	constraint fkplivro1 FOREIGN KEY (id_pedido) REFERENCES pedido(id),
	constraint fkplivro2 FOREIGN KEY (id_livro)  REFERENCES livro(id));

ALTER TABLE cliente ADD CONSTRAINT fkcliente FOREIGN KEY (id_carrinho) REFERENCES pedido(id);
ALTER TABLE `cliente` CHANGE `email` `email` VARCHAR(63) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;

ALTER TABLE `cliente` ADD UNIQUE(`email`);

-----------------------------------------
--               INSERTS               --
-----------------------------------------
INSERT INTO categoria (nome) VALUES ('Livros Didáticos'), ('Romance'), ('História'), ('Filosofia'), ('Autoajuda'), ('Capa dura'), ('Capa Mole');

INSERT INTO autor (nome, descr) VALUES ('Martha Reis', 'Martha Reis é uma autora de livros de Quimica que atualmente deve representar 12% do PNLD.'),
 						 ('Elon Lages Lima', 'O mais famoso matemático e professor de matemática brasileiro, recebeu o Prêmio Elon Lages Lima e ganhou medalha de ouro na competição Elon Lages Lima já quando tinha 15 anos.'),
						 ('Andrew Tanebaum', 'Andrew Tanenbaum é um autor descontraído e leve que gosta de explicações simplificadas e intuitivas sobre assuntos complexos. Também gosta de transformações de Fourier. '),
						 ('Stephenie Meyer', 'Autora da série Crepúsculo, tem 47 anos e nasceu (onde mais?) em Connecticut, Tenesse. Ela escreveu outros trabalhos, como A Hospedeira. O que faz esses livros não serem populares é que eles não são da série Crepúsculo, que é muito popular.'),
						 ('John Green', 'Provavelmente, só ter colocado o nome dele aqui já mudou a demografia dos assinantes deste website. É o autor de \' A culpa é das Estrelas\', se eu não me engano'),
						 ('Rick Riordan', 'Rick Riordan descobriu a fórmula para o sucesso. Com seus personagens problemáticos, com TDAH (no mínimo), recebe o carinho de adolescentes que claramente não têm TDAH, porque leem séries de livros de 1000 páginas.'),
						 ('Tito Lívio', 'Velho'),
						 ('Heródoto', 'Mais velho. E grego'),
						 ('Plutarco', 'O novinho dos três. Tem mais de 1.900 anos.'),
						 ('Nietzsche', 'Bigode'), ('Platão', 'Barba'), ('Aristóteles', 'cabelo'),
						 ('Augusto Cury', ''), ('Jordan Peterson', 'Ele tem aulas na Internet'), ('Mark Manson', 'Achei na Saraiva');


INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Química 1', 'O melhor livro de química do planeta.', 15.0, 230, '123456789', 1);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Quimica 2', 'O segundo melhor livro de química do planeta.', 12.50, 231, '123456789', 1);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Química 3', 'O terceiro melhor livro de química do planeta.', 10.0, 232, '123456789', 1);
INSERT INTO livrocategoria VALUES (1,1), (1,7), (2,1), (2,7), (3,1), (3,7);

INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('A matemática do ensino médio', 'O título diz tudo.', 25.0, 450, '123456789', 2);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Análise Real', 'O elon diz tudo.', 26.50, 451, '123456789', 2);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Logaritmos', 'O tudo diz: Logaritmos.', 27.0, 452, '123456789', 2);
INSERT INTO livrocategoria VALUES (4,1), (4,6), (5,1), (5,6), (6,1), (6,7);

INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Redes de Computadores', 'Um resumo lindo e divertido do tranquuilo tópico que são as redes de computadores.', 25.0, 450, '123456789', 3);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Sistemas Operacionais', 'Um resumo lindo e divertido do tranquuilo tópico que são sistemas operacionais.', 26.50, 451, '123456789', 3);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Sistemas Operacionais Modernos', 'Sistemas operacionais, tudo de novo. Mas mais moderno', 27.0, 452, '123456789', 3);
INSERT INTO livrocategoria VALUES (7,1), (7,6), (8,1), (8,6), (9,1), (9,7);

INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Crepúsculo', 'Ela fica triste.', 25.0, 450, '123456789', 4);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Lua Nova', 'Ela se apaixona.', 26.50, 451, '123456789', 4);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Eclipse', 'Agora eles que se apaixonam', 27.0, 452, '123456789', 4);
INSERT INTO livrocategoria VALUES (10,2), (10,7), (11,2), (11,7), (12,2), (12,7);

INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Tartarugas até lá embaixo', 'Não tem absolutamente nada a ver com tartarugas.', 25.0, 450, '123456789', 5);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('A culpa é das estrelas', 'A culpa é delas mesmo, relaxa.', 26.50, 451, '123456789', 5);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Quem é você, Alasca?', 'Espero que não seja um cara procurando 1/3 de continente', 27.0, 452, '123456789', 5);
INSERT INTO livrocategoria VALUES (13,2), (13,7), (14,2), (14,7), (15,2), (15,7);

INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('O ladrão de raios', 'No fim ele nem tinha roubado o raio, foi sem querer.', 25.0, 450, '123456789', 6);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('O mar de monstros', 'O filme não é tão bom quanto o livro', 26.50, 451, '123456789', 6);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('A maldição do titã', 'Não tem filme (ainda)', 27.0, 452, '123456789', 6);
INSERT INTO livrocategoria VALUES (16,2), (16,6), (17,2), (17,6), (18,2), (18,6);

INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Ab urbe condida', 'Um livro bem bom sobre a história de Roma. Com centenas de capítulos. Mas só sobreviveram uns 25', 25.0, 450, '123456789', 7);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Desde a fundação da cidade', 'Um livro bem bom sobre a história de Roma. Com centenas de capítulos. Mas só sobreviveram uns 25', 26.50, 451, '123456789', 7);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Since the founding of the city', 'Um livro bem bom sobre a história de Roma. Com centenas de capítulos. Mas só sobreviveram uns 25', 27.0, 452, '123456789', 7);
INSERT INTO livrocategoria VALUES (19,3), (19,6), (20,3), (20,6), (21,3), (21,6);

INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Histórias', 'O livro que "fundou a história". Mas alguma boa parte dele o próprio autor dizia que provavelmente não era verdade. Leia com um pé atrás', 25.0, 450, '123456789', 8);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('As guerras persas', 'Capítulo único das Histórias, sobre as guerras persas', 26.50, 451, '123456789', 8);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Thermopilae', 'Fun fact: Thermo-pylae significa literalmente portões quentes. São aguas termais e é só uma passagem estreita na encosta de uma montanha', 27.0, 452, '123456789', 8);
INSERT INTO livrocategoria VALUES (22,3), (22,6), (23,3), (23,6), (24,3), (24,6);

INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Vidas dos imperadores romanos', 'Um livro bem bom sobre ... os imperadores de Roma. A maioria dos capítulos foi perdida', 25.0, 450, '123456789', 9);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Vida de Alexandre', 'O que este romano pode encontrar de informações sobre a vida de um macedônio que viveu 200 anos antes dele.', 26.50, 451, '123456789', 9);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Malícia de Heródoto', 'Um historiador tacando fogo em outro.', 27.0, 452, '123456789', 9);
INSERT INTO livrocategoria VALUES (25,3), (25,6), (26,3), (26,6), (27,3), (27,6);

INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Ecce Homo', 'Como se chega a ser o que se é', 25.0, 450, '123456789', 10);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Assim Falou Zaratustra', 'Se falou, tá falado.', 26.50, 451, '123456789', 10);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Além do Bem e do Mal', 'Bal e Mem.', 27.0, 452, '123456789', 10);
INSERT INTO livrocategoria VALUES (28,4), (28,7), (29,4), (29,7), (30,4), (30,7);

INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Apologia', 'O julgamento de Sócrates', 25.0, 450, '123456789', 11);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('República', 'Diálogo platônico sobre como deveria ser um governo.', 26.50, 451, '123456789', 11);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Política', 'Diálogo Platônico sobre política.', 27.0, 452, '123456789', 11);
INSERT INTO livrocategoria VALUES (31,4), (31,7), (32,4), (32,7), (33,4), (33,7);

INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Categorias', 'Diagramas de Venn, mas muito antes de Venn e sem diagramas.', 25.0, 450, '123456789', 12);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Da Interpretação', 'Segunda parte do Órganon.', 26.50, 451, '123456789', 12);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Elencos Sofísticos', 'Sobre sofismos e falácias.', 27.0, 452, '123456789', 12);
INSERT INTO livrocategoria VALUES (34,4), (34,6), (35,4), (35,6), (36,4), (36,6);

INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Vendedor de Sonhos', '[inserir descrição]', 25.0, 450, '123456789', 13);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('O Homem mais Inteligente da História', '[inserir descrição]', 26.50, 451, '123456789', 13);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('O Mestre dos Mestres', '[inserir descrição]', 27.0, 452, '123456789', 13);
INSERT INTO livrocategoria VALUES (37,5), (37,7), (38,5), (38,7), (39,5), (39,7);

INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Doze Regras Para a Vida', '[inserir descrição]', 25.0, 450, '123456789', 14);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Mapas de Sentido', '[inserir descrição]', 26.50, 451, '123456789', 14);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('Doze mais regras para a vida', '[insert description]', 27.0, 452, '123456789', 14);
INSERT INTO livrocategoria VALUES (40,5), (40,7), (41,5), (41,7), (42,5), (42,7);

INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('A Arte de Ligar o F*da-se', '[inserir descrição]', 25.0, 450, '123456789', 15);
INSERT INTO livro (nome, descr, preco, estoque, isbn, id_autor) VALUES ('F*deu geral', '[inserir descrição]', 26.50, 451, '123456789', 15);
INSERT INTO livrocategoria VALUES (43,5), (43,7), (44,5), (44,7);

-----------------------------------------
--             DROP TABLES             --
-----------------------------------------

-- ALTER TABLE cliente drop foreign key if exists `fkcliente`;
-- DROP TABLE IF EXISTS `pedidolivro`;
-- DROP TABLE IF EXISTS `livrocategoria`;
-- DROP TABLE IF EXISTS `livro`;
-- DROP TABLE IF EXISTS `b`;
-- DROP TABLE IF EXISTS `a`;
-- DROP TABLE IF EXISTS `pedido`;
-- DROP TABLE IF EXISTS `cliente`;
-- DROP TABLE IF EXISTS `categoria`;
-- DROP TABLE IF EXISTS `autor`;
-- DROP TABLE IF EXISTS `TestTable`;
