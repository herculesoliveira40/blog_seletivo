<div class="container">
<?= Sessao::mensagem('livro'); ?> <!--  Invoca mensagemmmmmmmmmmmmmmmmmmmmmmmm -->
    <div class="card">
        <div class="card-header bg-info">
            Livros
            <a class="btn btn-warning float-right" href="<?=URL?>/livros/cadastrar">
                    Cadastrar Livros
            </a>
        </div>
<?php 
    foreach ($dados['livros'] as $livro):  
?>                    
        <div class="card m-5">
            <div class="card-header text-center">
                <h3> <?= $livro->titulo ?> </h3>
            </div>
            <div class="card-body">
                <p class="card-text-justify"> <?= $livro->descricao?> </p>
                <img src="<?=$livro->imagem?>" alt="<?=$livro->imagem?>" height="80px" width="80px" >
                <a class="btn btn-outline-info " href="<?=URL?>/livros/ler/<?= $livro->id?>"> Ver Mais... </a> // mudarlivro->id Para livro->livroIddddddddddddddddddddddddddd
            </div>
            <div class="card-footer text-muted">
                <small> <strong> <?= "Autor: $livro->autor Publicado em: " . date("d/m/Y h:m ", strtotime($livro->data_de_publicacao)) . "<br> Tamanho: ". strlen($livro->descricao) ?> </strong></small>
            </div>
            
        </div>
<?php  
    endforeach; 
?> 
    </div>
</div>




  