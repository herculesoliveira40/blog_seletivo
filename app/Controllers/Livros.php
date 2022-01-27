<?php

    Class Livros extends Controller {


        public function __construct() {
        //     if(!Sessao::estaLogado()) :
        //         Url::redirecionar('usuarios/login?login_para_ver_livros');
        //     endif;   
            
             $this->postModel = $this->model('Post');
             $this->usuarioModel = $this->model('Usuario');

// Fazer livrosmodelsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss
         }


        public function index() {
            $dados = [
                'publicacoes'=>$this->postModel->exibirPublicacoes(), // Livossssssssssssssssssssss
            ];
            $this->view('livros/index', $dados);
// Apaga esses dadosssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss
        }


        public function cadastrar() {

            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($formulario)):
                    $dados = [
                        'titulo' =>trim($formulario['titulo']),
                        'texto' =>trim($formulario['texto']),
                        'usuario_id' => $_SESSION['usuario_id'],
                    ];
                
                if($this->postModel->armazenar($dados)):
                    Sessao::mensagem('post', ' Post Cadastrado com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                    Url::redirecionar('publicacoes?sucesso'); 
                else:
                    die("Erro ao cadastrar ");                

                endif;                



                else:
                    $dados = [
                        'titulo' => '',
                        'texto' => '',
                        'usuario_id' => '',
                    ];      
                                    
            endif;


            $this->view('livros/cadastrar', $dados);
        }


        public function editar($id) {

            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if(isset($formulario)):
                    $dados = [
                        'id' => $id,
                        'titulo' =>trim($formulario['titulo']),
                        'texto' =>trim($formulario['texto'])
                    ];
                
                    if($this->postModel->atualizar($dados)):
                        Sessao::mensagem('post', ' Post Atualizado com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                        Url::redirecionar('publicacoes?sucesso'); 
                    else:
                        die("Erro ao Atualizar ");                

                    endif;                



            else:
                $post = $this->postModel->postId($id);

                if($post->usuario_id != $_SESSION['usuario_id']):
                    Sessao::mensagem('post', ' Você não criou o post, então pode editar :/ ', 'alert alert-danger'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                    Url::redirecionar('publicacoes?nao_pode_editar');                     
                endif;

                $dados = [
                    'id' => $post->id,
                    'titulo' => $post->titulo,
                    'texto' => $post->texto,
                ];      
                                    
            endif;


            $this->view('publicacoes/editar', $dados);
        }


        public function ler($id) {
            $post = $this->postModel->postId($id);
            $usuario = $this->usuarioModel->postUsuarioId($post->usuario_id);

            $dados = [
                'post' => $post,
                'usuario' => $usuario,
            ];
            $this->view('publicacoes/ler', $dados);           
        }   


        public function lerTitulo($titulo) {
           // $titulo = str_replace(' ', '-', $titulo);
            $post = $this->postModel->postTitulo($titulo);
            $usuario = $this->usuarioModel->postUsuarioId($post->usuario_id);

            $dados = [
                'post' => $post,
                'usuario' => $usuario
            ];
            $this->view('publicacoes/ler', $dados); //lerTitulo/ titulo
        }


        public function deletar($id) {
            $id = (int)$id;
            $post = $this->postModel->postId($id);
            if(is_int($id) && ($post->usuario_id == $_SESSION['usuario_id'])): 

                    if($this->postModel->apagar($id)):
                        Sessao::mensagem('post', ' Post deletado com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                        Url::redirecionar('publicacoes?deletado'); 
                    else:
                        echo "Error ao deletar";
                    endif;    
                else:
                    Sessao::mensagem('post', ' Error Você não criou o post, então pode deletar :/ ', 'alert alert-danger'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                    Url::redirecionar('publicacoes?nao_pode_apagar'); 
            endif;
        }


    }

  
?>