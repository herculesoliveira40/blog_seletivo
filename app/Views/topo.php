<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script> -->

    <link rel="stylesheet" href="<?=URL?>/public/css/bootstrap-4.1.3/css/bootstrap.min.css">    
       <script src="<?=URL?>/public/js/jquery-3.6.0.min.js"></script>      
       <script src="<?=URL?>/public/js/jquery.mask.js"></script>
       <script src="<?=URL?>/public/css/bootstrap-4.1.3/js/bootstrap.min.js"></script>
</head>


<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=URL?>/paginas/home">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?=URL?>/paginas/sobre">Sobre</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?=URL?>/publicacoes">Publicações</a>
                </li>            
                <li class="nav-item">
                <a class="nav-link" href="<?=URL?>/livros">Livros</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?=URL?>/usuarios">Usuarios</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?=URL?>/categoriaslivros">Categorias Livros</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?=URL?>/categoriaspublicacoes">Categorias Publicacoes</a>
                </li>
            </ul>

        </div>
                <div >           
                    <?php    
                        if(isset($_SESSION['usuario_id'])):
                            echo 'Olá: ' . $_SESSION['usuario_nome']; 
                        ?>    
                        <a class="btn btn-outline-danger" href="<?=URL?>/usuarios/sair">
                                Sair
                            </a>
                        <?php
                            else: 
                        ?> 
                            <span >
                            <a class="btn btn-outline-warning" href="<?=URL?>/usuarios/cadastrar">
                                Cadastrar
                            </a>
                            <a class="btn btn-outline-warning" href="<?=URL?>/usuarios/login">
                                Login
                            </a>            
                        </span>    
                    <?php  
                        endif; 
                    ?>        
                    </span>
                </div>
    </div>
    </nav>


</header>
 