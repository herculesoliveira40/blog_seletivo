<?php echo " <br> <hr> Categorias" ?>

<h1>Categorias  Livros </h1>


<div class="container">
<?= Sessao::mensagem('categorias_livros'); ?> <!--  Invoca mensagemmmmmmmmmmmmmmmmmmmmmmmm -->
    <div class="card">
        <div class="card-header bg-info">
            Categorias  Livros
            <a class="btn btn-warning float-right" href="<?=URL?>/categoriaslivros/cadastrar">
                    Cadastrar Categoria  Livro
            </a>
        </div>
<?php 
    foreach ($dados['categorias_livros'] as $categoria_livro):
?>                    
        <div class="card m-5">
            <div class="card-header text-center">
                <h3> <?= $categoria_livro->id ?> </h3>
            </div>
            <div class="card-body">
                <p class="card-text-justify">  <?= $categoria_livro->nome ?> </p>
               
            </div>
        </div>
<?php  
    endforeach; 
?> 
    </div>
</div>




  