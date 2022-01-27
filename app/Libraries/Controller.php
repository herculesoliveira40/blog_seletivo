<?php

    Class Controller {

        public function model($model) {
            require_once '../app/Models/'.$model.'.php';
            return new $model;
        }

        public function view($view, $dados = []) {
            $arquivo = ('../app/Views/'.$view.'.php');
            if(file_exists($arquivo)):
                require_once $arquivo;
            else:
                echo " ************ Errou certo ************<hr>"; 
                $this->view('paginas/erro');
                die("O arquivo da view não existe!!!"); 
                     
            endif;    
        }

    }
?>