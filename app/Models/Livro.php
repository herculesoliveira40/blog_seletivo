<?php

    class Livro {
        private $db_livro;

        public function __construct() 
        {
            $this->db_livro = new Conexao();
        }


        public function exibirLivros() {
            $this->db_livro->query("
                SELECT * FROM blog.livros;
            ");
            return $this->db_livro->resultados();
        }

        public function armazenar($dados) {
            $this->db_livro->query("INSERT INTO livros(titulo, descricao, autor, data_de_publicacao, paginas, imagem, categoria, autor_usuario) VALUES (:titulo, :descricao, :autor, :data_de_publicacao, :paginas, :imagem, :categoria, :autor_usuario)");

            $this->db_livro->bind("titulo", $dados['titulo']);
            $this->db_livro->bind("descricao", $dados['descricao']);
            $this->db_livro->bind("autor", $dados['autor']);
            $this->db_livro->bind("data_de_publicacao", $dados['data_de_publicacao']);
            $this->db_livro->bind("paginas", $dados['paginas']);
            $this->db_livro->bind("imagem", $dados['imagem']);
            $this->db_livro->bind("categoria", $dados['categoria']);
            $this->db_livro->bind("autor_usuario", $dados['autor_usuario']);


            if($this->db_livro->executa()):
                return true;
            else:
                return false;
            endif;                                
        }

        public function atualizar($dados) {
            $this->db_livro->query("UPDATE livros SET titulo = :titulo, descricao = :descricao, autor = :autor, data_de_publicacao = :data_de_publicacao, paginas = :paginas, imagem = :imagem, categoria = :categoria WHERE id = :id");

            $this->db_livro->bind("id", $dados['id']);
            $this->db_livro->bind("titulo", $dados['titulo']);
            $this->db_livro->bind("descricao", $dados['descricao']);
            $this->db_livro->bind("autor", $dados['autor']);
            $this->db_livro->bind("data_de_publicacao", $dados['data_de_publicacao']);
            $this->db_livro->bind("paginas", $dados['paginas']);
            $this->db_livro->bind("imagem", $dados['imagem']);
            $this->db_livro->bind("categoria", $dados['categoria']);


            if($this->db_livro->executa()):
                return true;
            else:
                return false;
            endif;                                
        }


         public function livroId($id) {
             $this->db_livro->query("SELECT * FROM livros Where id = :id");
             $this->db_livro->bind('id', $id);

             return $this->db_livro->resultado();
         }


         public function livroTitulo($titulo) {
            $this->db_livro->query("SELECT * FROM livros Where titulo = :titulo");
            $this->db_livro->bind('titulo', $titulo);

            return $this->db_livro->resultado();
        }   
        
        public function apagar($id) {
            $this->db_livro->query("DELETE FROM livros WHERE id = :id");

            $this->db_livro->bind("id", $id);


            if($this->db_livro->executa()):
                return true;
            else:
                return false;
            endif;   
        }
    }