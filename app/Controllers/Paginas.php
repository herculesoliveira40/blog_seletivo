<?php

    Class Paginas extends Controller{

        public function index() {

            // if(Sessao::estaLogado()) :                   // Logado Home = Publicacoes
            //     Url::redirecionar('publicacoes');
            // endif; 

            $dados = [
                'texto' => 'Pagina Inicial Teste Seletivo PHP JR'
            ];

            $this->view('paginas/home', $dados);           
        }

        public function sobre() {
            $dados = [
                'texto' => 'Pagina Sobre'
            ];

            $this->view('paginas/sobre');
        }
    
    }

  
?>