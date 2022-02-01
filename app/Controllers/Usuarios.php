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


                    if(($formulario['confirmar_senha']) != $formulario['senha']):
                        die('Senhas diferentes') ;
                    endif;
                    
                var_dump($formulario); 
                

                if($this->usuarioModel->armazenar($dados)):
                    Sessao::mensagem('usuarios', ' Usuario Cadastrado com sucesso', 'alert alert-success'); 
                    Url::redirecionar('usuarios/login?sucesso'); 
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



        public function editar($id) {

            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if(isset($formulario)):
                    $dados = [
                        'id' => $id,
                        'cpf' =>trim($formulario['cpf']),
                        'nome' =>trim($formulario['nome']),
                        'email' =>trim($formulario['email']),
                        'senha' =>trim(password_hash($formulario['senha'], PASSWORD_DEFAULT)),

                    ];
                
                    if($this->usuarioModel->atualizar($dados)):
                        Sessao::mensagem('usuarios', ' usuarios Atualizado com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                        Url::redirecionar('usuarios?sucesso'); 
                    else:
                        die("Erro ao Atualizar ");                

                    endif;                

            else:
                    $usuario = $this->usuarioModel->UsuarioId($id);
                    if($usuario->id != $_SESSION['usuario_id']):
                        Sessao::mensagem('publicacao', ' Você não é o usuario atual, então não pode editar :/ ', 'alert alert-danger'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                        Url::redirecionar('publicacoes?nao_pode_editar');                     
                    endif;

                    $dados = [
                        'id' => $usuario->id,
                        'nome' => $usuario->nome,
                        'cpf' => $usuario->cpf,
                        'email' => $usuario->email,
                        'senha' => $usuario->senha,
                    ];
                                        
            endif;


            $this->view('usuarios/editar', $dados);
        }



        public function deletar($id) {
            $id = (int)$id;
            $autor = $this->usuarioModel->usuarioId($id);

            if(is_int($id) && ($autor->id == $_SESSION['usuario_id'])):  

                    if($this->usuarioModel->apagar($id)):
                        Sessao::mensagem('usuarios', ' usuarios deletado com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                        Url::redirecionar('usuarios?deletado'); 
                    else:
                        echo "Error ao deletar";
                    endif;    
                else:
                    Sessao::mensagem('usuarios', ' Error Você não é o usuarios atual, então não pode deletar :/ ', 'alert alert-danger'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                    Url::redirecionar('usuarios?nao_pode_apagar'); 
            endif;
        }
    }
?>