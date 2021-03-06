<?php

    Class CategoriasPublicacoes extends Controller {


        public function __construct() {
                if(!Sessao::estaLogado()) :
                    Url::redirecionar('usuarios/login?login_para_ver_categoriaspublicacoes');
                endif;   
                
                 $this->categoriaPublicacaoModel = $this->model('CategoriaPublicacao');
                 
    
             }
    
    
            public function index() {
                $dados = [
                    'categorias_publicacoes'=>$this->categoriaPublicacaoModel->exibirCategoriasPublicacoes(), 
                ];
                $this->view('categoriaspublicacoes/index', $dados);

            }
    
    
            public function cadastrar() {
    
                $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                if(isset($formulario)):
                        $dados = [
                            'nome' =>trim($formulario['nome']),
    
                        ];
                    
                    if($this->categoriaPublicacaoModel->armazenar($dados)):
                        Sessao::mensagem('post', ' Categoria Publicacao Cadastrado com sucesso', 'alert alert-success');
                        Url::redirecionar('categoriaspublicacoes?sucesso'); 
                    else:
                        die("Erro ao cadastrar ");                
    
                    endif;                
    
    
    
                    else:
                        $dados = [
                            'nome' => '',
                        ];      
                                        
                endif;
    
    
                $this->view('categoriaspublicacoes/cadastrar', $dados);
            }
    
    
            public function editar($id) {

                $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                if(isset($formulario)):
                        $dados = [
                            'id' => $id,
                            'nome' =>trim($formulario['nome']),
                        ];
                    
                        if($this->categoriaPublicacaoModel->atualizar($dados)):
                            Sessao::mensagem('categorias_publicacoes', ' categoriaspublicacoes Atualizado com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                            Url::redirecionar('categoriaspublicacoes?sucesso'); 
                        else:
                            die("Erro ao Atualizar ");                
    
                        endif;                
    
                    else:
                        $categorias_publicacoes = $this->categoriaPublicacaoModel->categoriaPublicacaoId($id);
                        $dados = [
                            'id' => $categorias_publicacoes->id,
                            'nome' => $categorias_publicacoes->nome,
                        ];
                                            
                    endif;
    
    
                $this->view('categoriaspublicacoes/editar', $dados);
            }

    
    
            public function deletar($id) {
                $id = (int)$id;
                if(is_int($id) && Sessao::estaLogado()): 
    
                        if($this->categoriaPublicacaoModel->apagar($id)):
                            Sessao::mensagem('categorias_publicacoes', ' categoriaspublicacoes deletado com sucesso', 'alert alert-success'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                            Url::redirecionar('categoriaspublicacoes?deletado'); 
                        else:
                            echo "Error ao deletar";
                        endif;    
                    else:
                        Sessao::mensagem('categoriaspublicacoes', ' Error Voc?? n??o criou o categoriaspublicacoes, ent??o pode deletar :/ ', 'alert alert-danger'); //echo " <br> <h1> Cadastrado com sucesso </h1>";
                        Url::redirecionar('categoriaspublicacoes?nao_pode_apagar'); 
                endif;
            }
    
    
        }
    
      
    ?>