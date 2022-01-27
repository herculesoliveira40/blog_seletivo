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
    autor varchar(255),
    data_de_publicacao timestamp DEFAULT CURRENT_TIMESTAMP,
    categoria int not null,
	FOREIGN KEY (categoria) REFERENCES categorias_livros(id)
);

CREATE table publicacoes(
    id int  primary key auto_increment,
    titulo varchar(255),
	descricao varchar(2000),
    conteudo varchar(2000),
    imagem varchar(1000),
	categoria int not null,
    FOREIGN KEY (categoria) REFERENCES categorias_publicacoes(id)
    
);

INSERT INTO `blog`.`categorias_publicacoes` (`id`, `nome`) VALUES ('1', 'AmorP');
INSERT INTO `blog`.`categorias_publicacoes` (`id`, `nome`) VALUES ('2', 'BiografiaP');
INSERT INTO `blog`.`categorias_livros` (`id`, `nome`) VALUES ('1', 'AmorL');
INSERT INTO `blog`.`categorias_livros` (`id`, `nome`) VALUES ('2', 'BiografiaL');
INSERT INTO `blog`.`usuarios` (`cpf`, `nome`, `email`, `senha`) VALUES ('123.456.789-01', 'user1', 'u1@mail.com', 'u1');



