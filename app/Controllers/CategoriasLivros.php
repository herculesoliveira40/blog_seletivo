<?php

    Class CategoriasLivros extends Controller {


        public function __construct() {
            if(!Sessao::estaLogado()) :
                Url::redirecionar('usuarios/login?login_para_ver_livros');
            endif;   
            

             $this->categoriaLivroModel = $this->model('CategoriaLivro');
             

         }


        public function index() {
            $dados = [
                'categorias_livros'=>$this->categoriaLivroModel->exibirCategoriasLivros(), 
            ];
            $this->view('categoriaslivros/index', $dados);
        }


        public function cadastrar() {

            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($formulario)):
                    $dados = [
                        'nome' =>trim($formulario['nome']),

                    ];
                
                if($this->categoriaLivroModel->armazenar($dados)):
                    Sessao::mensagem('categorias_livros', ' Categoria Livro Cadastrado com sucesso', 'alert alert-success');
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
                        'nome' =>trim($formulario['nome']),
                    ];
                
                    if($this->categoriaLivroModel->atualizar($dados)):
                        Sessao::mensagem('categorias_livros', ' categoriaslivros Atualizado com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                        Url::redirecionar('categoriaslivros?sucesso'); 
                    else:
                        die("Erro ao Atualizar ");                

                    endif;                

                else:
                    $categorias_livros = $this->categoriaLivroModel->categoriaLivroId($id);
                    $dados = [
                        'id' => $categorias_livros->id,
                        'nome' => $categorias_livros->nome,
                    ];
                                        
                endif;


            $this->view('categoriaslivros/editar', $dados);
        }



        public function deletar($id) {
            $id = (int)$id;
            if(is_int($id) && Sessao::estaLogado()): 

                    if($this->categoriaLivroModel->apagar($id)):
                        Sessao::mensagem('categorias_livros', ' categoriaslivro deletado com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                        Url::redirecionar('categoriaslivros?deletado'); 
                    else:
                        echo "Error ao deletar";
                    endif;    
                else:
                    Sessao::mensagem('categorias_livros', ' Error Você não criou o categoriaslivro, então pode deletar :/ ', 'alert alert-danger'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                    Url::redirecionar('categoriaslivros?nao_pode_apagar'); 
            endif;
        }


    }

  
?>