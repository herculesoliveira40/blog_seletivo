<div class="container">
<?= Sessao::mensagem('publicacao'); ?> <!--  Invoca mensagemmmmmmmmmmmmmmmmmmmmmmmm -->
    <div class="card">
        <div class="card-header bg-info">
            Publicações
            <a class="btn btn-warning float-right" href="<?=URL?>/publicacoes/cadastrar">
                    Cadastrar Publicacao
            </a>
        </div>
<?php 
    foreach ($dados['publicacoes'] as $publicacao):  
?>                    
        <div class="card m-5">
            <div class="card-header text-center">
                <h3> <?= $publicacao->titulo ?> </h3>
            </div>
            <div class="card-body">
                <p class="card-text-justify"> <?= $publicacao->descricao?> </p>
                <img src="<?=$publicacao->imagem?>" alt="<?=$publicacao->imagem?>" height="80px" width="80px" >
                <a class="btn btn-outline-info " href="<?=URL?>/publicacoes/ler/<?= $publicacao->id?>"> Ver Mais... </a> // mudarpublicacao->id Para publicacao->publicacaoIddddddddddddddddddddddddddd
            </div>
            <div class="card-footer text-muted">
                <small> <strong> <?= "Autor: $publicacao->autor em: " . date("d/m/Y h:m ", strtotime($publicacao->publicacaoDataCadastro)) . "<br> Tamanho: ". strlen($publicacao->conteudo) ?> </strong></small>
            </div>
            
        </div>
<?php  
    endforeach; 
?> 
    </div>
</div>




  