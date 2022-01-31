<?php

    Class Publicacoes extends Controller {


        public function __construct() {
        //     if(!Sessao::estaLogado()) :
        //         Url::redirecionar('usuarios/login?login_para_ver_publicacoes');
        //     endif;   
            
             $this->publicacaoModel = $this->model('Publicacao');
             $this->usuarioModel = $this->model('Usuario');

         }


        public function index() {
            $dados = [
                'publicacoes'=>$this->publicacaoModel->exibirPublicacoes(),
            ];
            $this->view('publicacoes/index', $dados);
        }


        public function cadastrar() {

            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($formulario)):
                    $dados = [
                        'titulo' =>trim($formulario['titulo']),
                        'descricao' =>trim($formulario['descricao']),
                        'conteudo' =>trim($formulario['conteudo']),
                        'imagem' =>trim($formulario['imagem']),
                        'categoria' =>trim($formulario['categoria']),
                        'autor_usuario' => $_SESSION['usuario_id'],
                    ];
                
                if($this->publicacaoModel->armazenar($dados)):
                    Sessao::mensagem('publicacao', ' Publicacao Cadastrada com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                    Url::redirecionar('publicacoes?sucesso'); 
                else:
                    die("Erro ao cadastrar ");                

                endif;                



                else:
                    $dados = [
                        'titulo' => '',
                        'descricao' => '',
                        'conteudo' => '',
                        'imagem' => '',
                        'categoria' => '',
                        'autor_usuario' => '',
                    ];      
                                    
            endif;


            $this->view('publicacoes/cadastrar', $dados);
        }


        public function editar($id) {

            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if(isset($formulario)):
                    $dados = [
                        'id' => $id,
                        'titulo' =>trim($formulario['titulo']),
                        'descricao' =>trim($formulario['descricao']),
                        'conteudo' =>trim($formulario['conteudo']),
                        'imagem' =>trim($formulario['imagem']),
                        'descricao' =>trim($formulario['descricao']),
                        'categoria' =>trim($formulario['categoria']),

                    ];
                
                    if($this->publicacaoModel->atualizar($dados)):
                        Sessao::mensagem('publicacao', ' publicacao Atualizado com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                        Url::redirecionar('publicacoes?sucesso'); 
                    else:
                        die("Erro ao Atualizar ");                

                    endif;                



            else:
                $publicacao = $this->publicacaoModel->publicacaoId($id);

                if($publicacao->autor_usuario != $_SESSION['usuario_id']):
                    Sessao::mensagem('publicacao', ' Você não criou o publicacao, então pode editar :/ ', 'alert alert-danger'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                    Url::redirecionar('publicacoes?nao_pode_editar');                     
                endif;

                $dados = [
                    'id' => $publicacao->id,
                    'titulo' => $publicacao->titulo,
                    'descricao' => $publicacao->descricao,
                    'conteudo' => $publicacao->conteudo,
                    'imagem' => $publicacao->imagem,
                    'descricao' => $publicacao->descricao,
                    'categoria' => $publicacao->categoria,
                ];      
                                    
            endif;


            $this->view('publicacoes/editar', $dados);
        }


        public function ler($id) {
            $publicacao = $this->publicacaoModel->publicacaoId($id);
            $usuario = $this->usuarioModel->publicacaoUsuarioId($publicacao->autor_usuario);

            $dados = [
                'publicacao' => $publicacao,
                'autor_usuario' => $usuario,
            ];
            $this->view('publicacoes/ler', $dados);           
        }   


        public function lerTitulo($titulo) {
           // $titulo = str_replace(' ', '-', $titulo);
            $publicacao = $this->publicacaoModel->publicacaoTitulo($titulo);
            $usuario = $this->usuarioModel->publicacaoUsuarioId($publicacao->autor);

            $dados = [
                'publicacao' => $publicacao,
                'autor_usuario' => $usuario
            ];
            $this->view('publicacoes/ler', $dados); //lerTitulo/ titulo
        }


        public function deletar($id) {
            $id = (int)$id;
            $publicacao = $this->publicacaoModel->publicacaoId($id);
            if(is_int($id) && ($publicacao->autor_usuario == $_SESSION['usuario_id'])): 

                    if($this->publicacaoModel->apagar($id)):
                        Sessao::mensagem('publicacao', ' publicacao deletado com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                        Url::redirecionar('publicacoes?deletado'); 
                    else:
                        echo "Error ao deletar";
                    endif;    
                else:
                    Sessao::mensagem('publicacao', ' Error Você não criou o publicacao, então pode deletar :/ ', 'alert alert-danger'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                    Url::redirecionar('publicacoes?nao_pode_apagar'); 
            endif;
        }


    }

  
?>