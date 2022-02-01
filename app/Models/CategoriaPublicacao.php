<?php

    class CategoriaPublicacao {
        private $db_categoria_publicao;

        public function __construct() 
        {
            $this->db_categoria_publicao = new Conexao();
        }


        public function exibirCategoriasPublicacoes() {
            $this->db_categoria_publicao->query("
                SELECT * FROM blog.categorias_publicacoes;
            ");
            return $this->db_categoria_publicao->resultados();
        }


        public function armazenar($dados) {
            $this->db_categoria_publicao->query("INSERT INTO categorias_publicacoes(nome) VALUES (:nome)");

            $this->db_categoria_publicao->bind("nome", $dados['nome']);

            if($this->db_categoria_publicao->executa()):
                return true;
            else:
                return false;
            endif;                                
        }

        public function atualizar($dados) {
            $this->db_categoria_publicao->query("UPDATE categorias_publicacoes SET nome = :nome WHERE id = :id");

            $this->db_categoria_publicao->bind("id", $dados['id']);
            $this->db_categoria_publicao->bind("nome", $dados['nome']);


            if($this->db_categoria_publicao->executa()):
                return true;
            else:
                return false;
            endif;                                
        }


        public function categoriaPublicacaoId($id) {
            $this->db_categoria_publicao->query("SELECT * FROM categorias_livros Where id = :id");
            $this->db_categoria_publicao->bind('id', $id);

            return $this->db_categoria_publicao->resultado();
        } 

        
        public function apagar($id) {
            $this->db_categoria_publicao->query("DELETE FROM categorias_publicacoes WHERE id = :id");

            $this->db_categoria_publicao->bind("id", $id);


            if($this->db_categoria_publicao->executa()):
                return true;
            else:
                return false;
            endif;   
        }
    }