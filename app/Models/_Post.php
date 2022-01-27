<?php

    class Post {
        private $db_post;

        public function __construct() 
        {
            $this->db_post = new Conexao();
        }


        public function exibirPosts() {
            $this->db_post->query("
                SELECT *,
                posts.id as postId,
                posts.criado_em as postDataCadastro,
                usuarios.id as usuarioId,
                usuarios.criado_em as usuarioDataCadastro
                From posts
                inner join usuarios on
                posts.usuario_id = usuarios.id; 
            ");
            return $this->db_post->resultados();
        }


        public function armazenar($dados) {
            $this->db_post->query("INSERT INTO posts(usuario_id, titulo, texto) VALUES (:usuario_id, :titulo, :texto)");

            $this->db_post->bind("titulo", $dados['titulo']);
            $this->db_post->bind("texto", $dados['texto']);
            $this->db_post->bind("usuario_id", $dados['usuario_id']);

            if($this->db_post->executa()):
                return true;
            else:
                return false;
            endif;                                
        }

        public function atualizar($dados) {
            $this->db_post->query("UPDATE posts SET titulo = :titulo, texto = :texto WHERE id = :id");

            $this->db_post->bind("id", $dados['id']);
            $this->db_post->bind("titulo", $dados['titulo']);
            $this->db_post->bind("texto", $dados['texto']);

            if($this->db_post->executa()):
                return true;
            else:
                return false;
            endif;                                
        }


         public function postId($id) {
             $this->db_post->query("SELECT * FROM posts Where id = :id");
             $this->db_post->bind('id', $id);

             return $this->db_post->resultado();
         }


         public function postTitulo($titulo) {
            $this->db_post->query("SELECT * FROM posts Where titulo = :titulo");
            $this->db_post->bind('titulo', $titulo);

            return $this->db_post->resultado();
        }   
        
        public function apagar($id) {
            $this->db_post->query("DELETE FROM posts WHERE id = :id");

            $this->db_post->bind("id", $id);


            if($this->db_post->executa()):
                return true;
            else:
                return false;
            endif;   
        }
    }