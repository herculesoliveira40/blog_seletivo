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
                        'autor' => trim($formulario['autor']),
                        'data_de_publicacao' => trim($formulario['data_de_publicacao']),
                        'categoria' =>trim($formulario['categoria']),
                        
                    ];
                
                if($this->livroModel->armazenar($dados)):
                    Sessao::mensagem('livro', ' Livro Cadastrado com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                    Url::redirecionar('livros?sucesso'); 
                else:
                    die("Erro ao cadastrar ");                

                endif;                



                else:
                    $dados = [
                        'titulo' => '',
                        'descricao' => '',
                        'autor' => '',
                        'data_de_publicacao' => '',
                        'categoria' => '',
                        
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
                        Sessao::mensagem('livro', ' livro Atualizado com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                        Url::redirecionar('livros?sucesso'); 
                    else:
                        die("Erro ao Atualizar ");                

                    endif;                



            else:
                $livro = $this->livroModel->livroId($id);

                if($livro->usuario_id != $_SESSION['usuario_id']):
                    Sessao::mensagem('livro', ' Você não criou o livro, então pode editar :/ ', 'alert alert-danger'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                    Url::redirecionar('livros?nao_pode_editar');                     
                endif;

                $dados = [
                    'id' => $livro->id,
                    'descricao' => $livro->descricao,
                    'conteudo' => $livro->conteudo,
                    'imagem' => $livro->imagem,
                    'descricao' => $livro->descricao,
                    'categoria' => $livro->categoria,
                ];      
                                    
            endif;


            $this->view('livros/editar', $dados);
        }


        public function ler($id) {
            $livro = $this->livroModel->livroId($id);
            $autor = $this->usuarioModel->publicacaoUsuarioId($livro->autor);

            $dados = [
                'livro' => $livro,
                'autor' => $autor,
            ];
            $this->view('livros/ler', $dados);           
        }   


        public function lerTitulo($titulo) {
           // $titulo = str_replace(' ', '-', $titulo);
            $livro = $this->livroModel->livroTitulo($titulo);
            $usuario = $this->usuarioModel->publicacaoUsuarioId($livro->autor);

            $dados = [
                'livro' => $livro,
                'autor' => $usuario
            ];
            $this->view('livros/ler', $dados); //lerTitulo/ titulo
        }


        public function deletar($id) {
            $id = (int)$id;
            $livro = $this->livroModel->livroId($id);
            if(is_int($id) && ($livro->usuario_id == $_SESSION['usuario_id'])): 

                    if($this->livroModel->apagar($id)):
                        Sessao::mensagem('livro', ' livro deletado com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                        Url::redirecionar('livros?deletado'); 
                    else:
                        echo "Error ao deletar";
                    endif;    
                else:
                    Sessao::mensagem('livro', ' Error Você não criou o livro, então pode deletar :/ ', 'alert alert-danger'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                    Url::redirecionar('livros?nao_pode_apagar'); 
            endif;
        }


    }

  
?>