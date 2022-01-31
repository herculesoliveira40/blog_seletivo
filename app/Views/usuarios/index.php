<?php echo " <br> <hr> Categorias" ?>

<h1>Categorias  publicacoes </h1>


<div class="container">
<?= Sessao::mensagem('usuarios'); ?> <!--  Invoca mensagemmmmmmmmmmmmmmmmmmmmmmmm -->
    <div class="card">
        <div class="card-header bg-info">
            Categorias  publicacoes
            <a class="btn btn-warning float-right" href="<?=URL?>/categoriaspublicacoes/cadastrar">
                    Cadastrar Categoria  publicacoes
            </a>
        </div>
<?php 
    foreach ($dados['usuarios'] as $usuario):
?>                    
        <div class="card m-5">
            <div class="card-header text-center">
                <h3> <?= $usuario->id ?> </h3>
            </div>
            <div class="card-body">
                <p class="card-text-justify">  <?= $usuario->nome ?> </p>
               
            </div>
        </div>
<?php  
    endforeach; 
?> 
    </div>
</div>