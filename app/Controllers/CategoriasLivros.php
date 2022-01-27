<?php

    Class CategoriasLivros extends Controller {


        public function __construct() {
        //     if(!Sessao::estaLogado()) :
        //         Url::redirecionar('usuarios/login?login_para_ver_livros');
        //     endif;   
            
             $this->publicacaoModel = $this->model('Publicacao');
             $this->usuarioModel = $this->model('Usuario');
             $this->categoriaLivroModel = $this->model('CategoriaLivro');
             

         }


        public function index() {
            $dados = [
                'categorias_livros'=>$this->categoriaLivroModel->exibirCategoriasLivros(), // Categoriassssssssssssssssssssssssssssssssssssssssssss
            ];
            $this->view('categoriaslivros/index', $dados);
// Apaga esses dadosssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss
        }


        public function cadastrar() {

            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($formulario)):
                    $dados = [
                        'nome' =>trim($formulario['nome']),

                    ];
                
                if($this->categoriaLivroModel->armazenar($dados)):
                    Sessao::mensagem('post', ' Categoria Livro Cadastrado com sucesso', 'alert alert-success');
                    Url::redirecionar('categoriaslivros?sucesso'); 
                else:
                    die("Erro ao cadastrar ");                

                endif;                



                else:
                    $dados = [
                        'nome' => '',
                    ];      
                                    
            endif;


            $this->view('categoriaslivros/cadastrar', $dados);
        }


        public function editar($id) {

            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if(isset($formulario)):
                    $dados = [
                        'id' => $id,
                        'titulo' =>trim($formulario['titulo']),
                        'texto' =>trim($formulario['texto'])
                    ];
                
                    if($this->categoriaLivroModel->atualizar($dados)):
                        Sessao::mensagem('post', ' Post Atualizado com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                        Url::redirecionar('posts?sucesso'); 
                    else:
                        die("Erro ao Atualizar ");                

                    endif;                



            else:
                $post = $this->categoriaLivroModel->postId($id);

                if($post->usuario_id != $_SESSION['usuario_id']):
                    Sessao::mensagem('post', ' Você não criou o post, então pode editar :/ ', 'alert alert-danger'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                    Url::redirecionar('posts?nao_pode_editar');                     
                endif;

                $dados = [
                    'id' => $post->id,
                    'titulo' => $post->titulo,
                    'texto' => $post->texto,
                ];      
                                    
            endif;


            $this->view('posts/editar', $dados);
        }



        public function deletar($id) {
            $id = (int)$id;
            $post = $this->categoriaLivroModel->postId($id);
            if(is_int($id) && ($post->usuario_id == $_SESSION['usuario_id'])): 

                    if($this->categoriaLivroModel->apagar($id)):
                        Sessao::mensagem('post', ' Post deletado com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                        Url::redirecionar('posts?deletado'); 
                    else:
                        echo "Error ao deletar";
                    endif;    
                else:
                    Sessao::mensagem('post', ' Error Você não criou o post, então pode deletar :/ ', 'alert alert-danger'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                    Url::redirecionar('posts?nao_pode_apagar'); 
            endif;
        }


    }

  
?>