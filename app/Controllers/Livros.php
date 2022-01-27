<?php

    Class Livros extends Controller {


        public function __construct() {
        //     if(!Sessao::estaLogado()) :
        //         Url::redirecionar('usuarios/login?login_para_ver_livros');
        //     endif;   
            
             $this->livroModel = $this->model('Livro');
             $this->usuarioModel = $this->model('Usuario');

         }


        public function index() {
            $dados = [
                'livros'=>$this->livroModel->exibirLivros(),
            ];
            $this->view('livros/index', $dados);
        }


        public function cadastrar() {

            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($formulario)):
                    $dados = [
                        'titulo' =>trim($formulario['titulo']),
                        'descricao' =>trim($formulario['descricao']),
                        'categoria' =>trim($formulario['categoria']),
                        'autor' => trim($formulario['autor']),
                    ];
                
                if($this->livroModel->armazenar($dados)):
                    Sessao::mensagem('publicacao', ' Publicacao Cadastrada com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                    Url::redirecionar('livros?sucesso'); 
                else:
                    die("Erro ao cadastrar ");                

                endif;                



                else:
                    $dados = [
                        'titulo' => '',
                        'descricao' => '',
                        'categoria' => '',
                        'autor' => '',
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
                        'descricao' =>trim($formulario['descricao']),
                        'conteudo' =>trim($formulario['conteudo']),
                        'imagem' =>trim($formulario['imagem']),
                        'descricao' =>trim($formulario['descricao']),
                        'categoria' =>trim($formulario['categoria']),

                    ];
                
                    if($this->livroModel->atualizar($dados)):
                        Sessao::mensagem('publicacao', ' publicacao Atualizado com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                        Url::redirecionar('livros?sucesso'); 
                    else:
                        die("Erro ao Atualizar ");                

                    endif;                



            else:
                $publicacao = $this->livroModel->publicacaoId($id);

                if($publicacao->usuario_id != $_SESSION['usuario_id']):
                    Sessao::mensagem('publicacao', ' Você não criou o publicacao, então pode editar :/ ', 'alert alert-danger'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                    Url::redirecionar('livros?nao_pode_editar');                     
                endif;

                $dados = [
                    'id' => $publicacao->id,
                    'descricao' => $publicacao->descricao,
                    'conteudo' => $publicacao->conteudo,
                    'imagem' => $publicacao->imagem,
                    'descricao' => $publicacao->descricao,
                    'categoria' => $publicacao->categoria,
                ];      
                                    
            endif;


            $this->view('livros/editar', $dados);
        }


        public function ler($id) {
            $publicacao = $this->livroModel->publicacaoId($id);
            $autor = $this->usuarioModel->publicacaoUsuarioId($publicacao->autor);

            $dados = [
                'publicacao' => $publicacao,
                'autor' => $autor,
            ];
            $this->view('livros/ler', $dados);           
        }   


        public function lerTitulo($titulo) {
           // $titulo = str_replace(' ', '-', $titulo);
            $publicacao = $this->livroModel->publicacaoTitulo($titulo);
            $usuario = $this->usuarioModel->publicacaoUsuarioId($publicacao->autor);

            $dados = [
                'publicacao' => $publicacao,
                'autor' => $usuario
            ];
            $this->view('livros/ler', $dados); //lerTitulo/ titulo
        }


        public function deletar($id) {
            $id = (int)$id;
            $publicacao = $this->livroModel->publicacaoId($id);
            if(is_int($id) && ($publicacao->usuario_id == $_SESSION['usuario_id'])): 

                    if($this->livroModel->apagar($id)):
                        Sessao::mensagem('publicacao', ' publicacao deletado com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                        Url::redirecionar('livros?deletado'); 
                    else:
                        echo "Error ao deletar";
                    endif;    
                else:
                    Sessao::mensagem('publicacao', ' Error Você não criou o publicacao, então pode deletar :/ ', 'alert alert-danger'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                    Url::redirecionar('livros?nao_pode_apagar'); 
            endif;
        }


    }

  
?>