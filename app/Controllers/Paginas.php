<?php

    Class Paginas extends Controller{

        public function index() {

            // if(Sessao::estaLogado()) :                   // Logado Home = Publicacoes
            //     Url::redirecionar('publicacoes');
            // endif; 

            $dados = [
                'tituloPagina' => 'Pagina Inicial'
            ];

            $this->view('paginas/home', $dados);           
        }

        public function sobre() {
            $dados = [
                'tituloPagina' => 'Pagina Sobre'
            ];

            $this->view('paginas/sobre');
        }
    
    }

  
?>