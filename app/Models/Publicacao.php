<?php

    class Publicacao {
        private $db_publicacao;

        public function __construct() 
        {
            $this->db_publicacao = new Conexao();
        }


        public function exibirPublicacoes() {
            $this->db_publicacao->query("
            SELECT * FROM blog.publicacoes;
             
            ");
            return $this->db_publicacao->resultados();
        }


        public function armazenar($dados) {
            $this->db_publicacao->query("INSERT INTO publicacoes(titulo, descricao, conteudo, imagem, categoria, autor_usuario) VALUES (:titulo, :descricao, :conteudo, :imagem, :categoria, :autor_usuario)");

            $this->db_publicacao->bind("titulo", $dados['titulo']);
            $this->db_publicacao->bind("descricao", $dados['descricao']);
            $this->db_publicacao->bind("conteudo", $dados['conteudo']);
            $this->db_publicacao->bind("imagem", $dados['imagem']);
            $this->db_publicacao->bind("autor_usuario", $dados['autor_usuario']);
            $this->db_publicacao->bind("categoria", $dados['categoria']);

            if($this->db_publicacao->executa()):
                return true;
            else:
                return false;
            endif;                                
        }

        public function atualizar($dados) {
            $this->db_publicacao->query("UPDATE publicacoes SET titulo = :titulo, descricao = :descricao, conteudo = :conteudo, imagem = :imagem, categoria = :categoria WHERE id = :id");

            $this->db_publicacao->bind("id", $dados['id']);
            $this->db_publicacao->bind("titulo", $dados['titulo']);
            $this->db_publicacao->bind("descricao", $dados['descricao']);
            $this->db_publicacao->bind("conteudo", $dados['conteudo']);
            $this->db_publicacao->bind("imagem", $dados['imagem']);
            $this->db_publicacao->bind("categoria", $dados['categoria']);

            if($this->db_publicacao->executa()):
                return true;
            else:
                return false;
            endif;                                
        }


         public function publicacaoId($id) {
             $this->db_publicacao->query("SELECT * FROM publicacoes Where id = :id");
             $this->db_publicacao->bind('id', $id);

             return $this->db_publicacao->resultado();
         }
        
        public function apagar($id) {
            $this->db_publicacao->query("DELETE FROM publicacoes WHERE id = :id");

            $this->db_publicacao->bind("id", $id);


            if($this->db_publicacao->executa()):
                return true;
            else:
                return false;
            endif;   
        }
    }