<?php

    class Usuario {
        private $db_usuario;

        public function __construct() 
        {
            $this->db_usuario = new Conexao();
        }

        public function exibirUsuarios() {
            $this->db_usuario->query("
            SELECT * FROM blog.usuarios;
             
            ");
            return $this->db_usuario->resultados();
        }

        public function armazenar($dados) {
            $this->db_usuario->query("INSERT INTO usuarios(cpf, nome, email, senha) VALUES (:cpf, :nome, :email, :senha)");

            $this->db_usuario->bind("cpf", $dados['cpf']);
            $this->db_usuario->bind("nome", $dados['nome']);
            $this->db_usuario->bind("email", $dados['email']);
            $this->db_usuario->bind("senha", $dados['senha']);

            if($this->db_usuario->executa()):
                return true;
            else:
                return false;
            endif;                                
        }

        
        public function verificarLogin($email, $senha) {
            $this->db_usuario->query("SELECT * FROM usuarios WHERE email = :email");
            $this->db_usuario->bind("email", $email);

            if($this->db_usuario->resultado()):
                $resultado = $this->db_usuario->resultado();
                if(password_verify($senha, $resultado->senha)): 
                    return $resultado;
                else:
                    return false;                    
                endif;    
            else:
                return false;
            endif;                                 
        }


        public function publicacaoUsuarioId($id) {
            $this->db_usuario->query("SELECT * FROM usuarios Where id = :id");
            $this->db_usuario->bind('id', $id);

            return $this->db_usuario->resultado();
        }
    }