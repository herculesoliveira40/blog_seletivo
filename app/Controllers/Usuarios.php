<?php

    Class Usuarios extends Controller {


        public function __construct() {
            
            $this->usuarioModel = $this->model('Usuario');
        }


        public function index() {
            $dados = [
                'usuarios'=>$this->usuarioModel->exibirUsuarios(),
            ];
            $this->view('usuarios/index', $dados);
        }

        
        public function cadastrar() {

            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($formulario)):
                    $dados = [
                        'cpf' =>trim($formulario['cpf']),
                        'nome' =>trim($formulario['nome']),
                        'email' =>trim($formulario['email']),
                        'senha' =>trim(password_hash($formulario['senha'], PASSWORD_DEFAULT)), //Senha com hash
                        'confirmar_senha' =>trim($formulario['confirmar_senha']),
                    ];

                    // if(empty($formulario['nome'])):
                    //     echo 'Preencha o campo nome';
                    // endif; 
                    if(($formulario['confirmar_senha']) != $formulario['senha']):
                        die('Senhas diferentes') ;
                    endif;
                    
                var_dump($formulario); 
                



                if($this->usuarioModel->armazenar($dados)):
                //  echo " <br> <h1> Cadastrado com sucesso </h1>";
                    Url::redirecionar('usuarios/login?sucesso'); // header("Location:" .URL . "/usuarios/login?sucesso");
                else:
                    die("Erro ao cadastrar ");                

                endif;                



                else:
                    $dados = [
                        'cpf' => '',
                        'nome' => '',
                        'email' => '',
                        'senha' => '',
                        'confirmar_senha' => '',
                    ];      
                                    
            endif;


            $this->view('usuarios/cadastrar', $dados);
        }


        public function login() {
            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($formulario)):
                    $dados = [
                        'email' =>trim($formulario['email']),
                        'senha' =>trim($formulario['senha']), //Senha com hash
                    ];
                  //  var_dump($formulario); 

                    $verificarUsuario = $this->usuarioModel->verificarLogin($formulario['email'], $formulario['senha']);

                    if($verificarUsuario):
                        $this->criarSessaoUsuario($verificarUsuario);
                        echo ' <br> <hr> <h1> Usuario pode fazer login </h1> ';
                    else:
                         Sessao::mensagem('usuario', ' Error Usuario ou senha invalidos', 'alert alert-danger');
                    endif;

                else:   
                    $dados = [
                        'email' => '',
                        'senha' => '',

                    ];      
                                    
            endif;        
            $this->view('usuarios/login');
        }  

        private function criarSessaoUsuario($checarUsuario) {
            $_SESSION['usuario_id'] = $checarUsuario->id;
            $_SESSION['usuario_nome'] = $checarUsuario->nome;
            $_SESSION['usuario_email'] = $checarUsuario->email;
            Url::redirecionar('publicacoes?entrou');
        }
      
        public function sair() {
            unset($_SESSION['usuario_id']);
            unset($_SESSION['usuario_nome']);
            unset($_SESSION['usuario_email']);

            session_destroy();
            Url::redirecionar('usuarios/login?saiu');
        }
    }
?>