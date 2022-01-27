<?php

    class CategoriaLivro {
        private $db_categoria_livro;

        public function __construct() 
        {
            $this->db_categoria_livro = new Conexao();
        }


        public function exibirCategoriasLivros() {
            $this->db_categoria_livro->query("
                SELECT * FROM blog.categorias_livros;
            ");
            return $this->db_categoria_livro->resultados();
        }


        public function armazenar($dados) {
            $this->db_categoria_livro->query("INSERT INTO categorias_livros(nome) VALUES (:nome)");

            $this->db_categoria_livro->bind("nome", $dados['nome']);

            if($this->db_categoria_livro->executa()):
                return true;
            else:
                return false;
            endif;                                
        }

        public function atualizar($dados) {
            $this->db_categoria_livro->query("UPDATE categorias_livros SET nome = :nome WHERE id = :id");

            $this->db_categoria_livro->bind("nome", $dados['nome']);


            if($this->db_categoria_livro->executa()):
                return true;
            else:
                return false;
            endif;                                
        }


        
        public function apagar($id) {
            $this->db_categoria_livro->query("DELETE FROM categorias_livros WHERE id = :id");

            $this->db_categoria_livro->bind("id", $id);


            if($this->db_categoria_livro->executa()):
                return true;
            else:
                return false;
            endif;   
        }
    }