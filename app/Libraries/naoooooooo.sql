CREATE DATABASE if not exists Blog char set utf8;
USE Blog;

CREATE table usuarios(
    id int  primary key auto_increment,
    cpf varchar(255),
    nome varchar(255),
    email varchar(255),
    senha varchar(255)

);

CREATE table categorias_livros(
    id int  primary key auto_increment,
    nome varchar(255)

);

CREATE table categorias_publicacoes(
    id int  primary key auto_increment,
    nome varchar(255)

);

CREATE table livros(
    id int  primary key auto_increment,
    titulo varchar(255),
    descricao varchar(2000),
    autor int,
    CONSTRAINT autor_livro,
    FOREIGN KEY (autor) REFERENCES usuarios(id),
    data_de_publicacao timestamp DEFAULT CURRENT_TIMESTAMP, 
    categoria int not null,
    CONSTRAINT categoria_livro,
	FOREIGN KEY (categoria) REFERENCES categorias(id)
);

CREATE table publicacoes_de_blog(
    id int  primary key auto_increment,
    titulo varchar(255),
	descricao varchar(2000),
    conteudo varchar(2000),
    autor int,
    CONSTRAINT autor_publicacao,
    FOREIGN KEY (autor) REFERENCES usuarios(id),
    imagem varchar(1000),
	categoria int not null,
    CONSTRAINT categoria_publicacao,
    FOREIGN KEY (categoria) REFERENCES categorias(id)
    
);

INSERT INTO `blog`.`categorias_publicacoes` (`id`, `nome`) VALUES ('1', 'AmorP');

INSERT INTO `blog`.`categorias_publicacoes` (`id`, `nome`) VALUES ('2', 'BiografiaP');


INSERT INTO `blog`.`categorias_livros` (`id`, `nome`) VALUES ('1', 'AmorL');

INSERT INTO `blog`.`categorias_livros` (`id`, `nome`) VALUES ('2', 'BiografiaL');