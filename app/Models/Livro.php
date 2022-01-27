<?php

    class Livro {
        private $db_livro;

        public function __construct() 
        {
            $this->db_livro = new Conexao();
        }


        public function exibirPosts() {
            $this->db_livro->query("
                SELECT * ????????????????????????????????????????????????????????????????????????????????
            ");
            return $this->db_livro->resultados();
        }


        public function armazenar($dados) {
            $this->db_livro->query("INSERT INTO posts(usuario_id, titulo, texto) VALUES (:usuario_id, :titulo, :texto)");

            $this->db_livro->bind("titulo", $dados['titulo']);
            $this->db_livro->bind("texto", $dados['texto']);
            $this->db_livro->bind("usuario_id", $dados['usuario_id']);

            if($this->db_livro->executa()):
                return true;
            else:
                return false;
            endif;                                
        }

        public function atualizar($dados) {
            $this->db_livro->query("UPDATE posts SET titulo = :titulo, texto = :texto WHERE id = :id");

            $this->db_livro->bind("id", $dados['id']);
            $this->db_livro->bind("titulo", $dados['titulo']);
            $this->db_livro->bind("texto", $dados['texto']);

            if($this->db_livro->executa()):
                return true;
            else:
                return false;
            endif;                                
        }


         public function postId($id) {
             $this->db_livro->query("SELECT * FROM posts Where id = :id");
             $this->db_livro->bind('id', $id);

             return $this->db_livro->resultado();
         }


         public function postTitulo($titulo) {
            $this->db_livro->query("SELECT * FROM posts Where titulo = :titulo");
            $this->db_livro->bind('titulo', $titulo);

            return $this->db_livro->resultado();
        }   
        
        public function apagar($id) {
            $this->db_livro->query("DELETE FROM posts WHERE id = :id");

            $this->db_livro->bind("id", $id);


            if($this->db_livro->executa()):
                return true;
            else:
                return false;
            endif;   
        }
    }