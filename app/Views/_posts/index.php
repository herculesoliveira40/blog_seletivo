<div class="container">
<?= Sessao::mensagem('post'); ?> <!--  Invoca mensagemmmmmmmmmmmmmmmmmmmmmmmm -->
    <div class="card">
        <div class="card-header bg-info">
            Postagens
            <a class="btn btn-warning float-right" href="<?=URL?>/posts/cadastrar">
                    Cadastrar Post
            </a>
        </div>
<?php 
    foreach ($dados['posts'] as $post):
?>                    
        <div class="card m-5">
            <div class="card-header text-center">
                <h3> <?= $post->titulo ?> </h3>
            </div>
            <div class="card-body">
                <p class="card-text-justify"> <?= $post->texto?> </p>
                <a class="btn btn-outline-info " href="<?=URL?>/posts/ler/<?= $post->postId?>"> a </a>
            </div>
            <div class="card-footer text-muted">
                <small> <strong> <?= "Escrito por: $post->nome em: " . date("d/m/Y h:m ", strtotime($post->postDataCadastro)) . "<br> Tamanho: ". strlen($post->texto) ?> </strong></small>
            </div>
        </div>
<?php  
    endforeach; 
?> 
    </div>
</div>




  