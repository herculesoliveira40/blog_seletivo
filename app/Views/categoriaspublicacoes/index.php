<?php echo " <br> <hr> Categorias" ?>

<h1>Categorias  publicacoes </h1>


<div class="container">
<?= Sessao::mensagem('categorias_publicacoes'); ?> <!--  Invoca mensagemmmmmmmmmmmmmmmmmmmmmmmm -->
    <div class="card">
        <div class="card-header bg-info">
            Categorias  publicacoes
            <a class="btn btn-warning float-right" href="<?=URL?>/categoriaspublicacoes/cadastrar">
                    Cadastrar Categoria  publicacoes
            </a>
        </div>
<?php 
    foreach ($dados['categorias_publicacoes'] as $categoria_publicao):
?>                    
        <div class="card m-5">
            <div class="card-header text-center">
                <h3> <?= $categoria_publicao->id ?> </h3>
            </div>
            <div class="card-body">
                <p class="card-text-justify">  <?= $categoria_publicao->nome ?> </p>
               
            </div>
        </div>
<?php  
    endforeach; 
?> 
    </div>
</div>