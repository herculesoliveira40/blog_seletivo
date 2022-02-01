<?php

    Class Livros extends Controller {


        public function __construct() {
  
            
             $this->livroModel = $this->model('Livro');
             $this->usuarioModel = $this->model('Usuario');
             $this->categoriaLivroModel = $this->model('CategoriaLivro');
             $this->data['categorias_livros'] = $this->categoriaLivroModel->exibirCategoriasLivros();

         }


        public function index() {
            $dados = [
                'livros'=>$this->livroModel->exibirLivros(),
            ];
            $this->view('livros/index', $dados);
        }


        public function cadastrar() {

            if(!Sessao::estaLogado()) :
                Url::redirecionar('usuarios/login?login_para_cadastrar_livros');
            endif;  
            
            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($formulario)):
                    $dados = [
                        'titulo' =>trim($formulario['titulo']),
                        'descricao' =>trim($formulario['descricao']),
                        'autor' => trim($formulario['autor']),
                        'data_de_publicacao' => trim($formulario['data_de_publicacao']),
                        'paginas' => trim($formulario['paginas']),
                        'categoria' =>trim($formulario['categoria']),
                        'imagem' =>trim($formulario['imagem']),
                        'autor_usuario' => $_SESSION['usuario_id'],
                        
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
                        'paginas' => '',
                        'categoria' => '',
                        'imagem' => '',
                        'autor_usuario' => '',

                        
                    ];      
                                    
            endif;

            $this->data['dados'] = $dados; 

            $this->view('livros/cadastrar', $this->data);
        }


        public function editar($id) {

            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if(isset($formulario)):
                    $dados = [
                        'id' => $id,
                        'titulo' =>trim($formulario['titulo']),
                        'descricao' =>trim($formulario['descricao']),
                        'autor' =>trim($formulario['autor']),
                        'data_de_publicacao' =>trim($formulario['data_de_publicacao']),
                        'paginas' =>trim($formulario['paginas']),
                        'categoria' =>trim($formulario['categoria']),
                        'imagem' =>trim($formulario['imagem']),

                    ];
                
                    if($this->livroModel->atualizar($dados)):
                        Sessao::mensagem('livro', ' livro Atualizado com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                        Url::redirecionar('livros?sucesso'); 
                    else:
                        die("Erro ao Atualizar ");                

                    endif;                



            else:
                $livro = $this->livroModel->livroId($id);

                if($livro->autor_usuario != $_SESSION['usuario_id']):
                    Sessao::mensagem('livro', ' Você não criou o livro, então pode editar :/ ', 'alert alert-danger'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                    Url::redirecionar('livros?nao_pode_editar');                     
                endif;

                $dados = [
                    'id' => $livro->id,
                    'titulo' => $livro->titulo,
                    'descricao' => $livro->descricao,
                    'autor' => $livro->autor,
                    'data_de_publicacao' => $livro->data_de_publicacao,
                    'paginas' => $livro->paginas,
                    'imagem' => $livro->imagem,
                    'categoria' => $livro->categoria,
                ];      
                                    
            endif;


            $this->view('livros/editar', $dados);
        }


        public function ler($id) {
            $livro = $this->livroModel->livroId($id);
            $usuario = $this->usuarioModel->publicacaoUsuarioId($livro->autor);

            $dados = [
                'livro' => $livro,
                'autor' => $usuario,
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
            if(is_int($id) && ($livro->autor_usuario == $_SESSION['usuario_id'])): 

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