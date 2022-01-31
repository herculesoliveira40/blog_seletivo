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
        <div class="card-footer text-muted">           
        <?php if(Sessao::estaLogado()) : ?>
                <a class="btn btn-primary" href="<?= URL.'/categoriaspublicacoes/editar/'.$categoria_publicao->id?>"> Editar </a>
                <form action="<?= URL.'/categoriaspublicacoes/deletar/'.$categoria_publicao->id?>" method="POST">
                    <input type="submit" class="btn bg-danger" value="deletar">
                </form>
            <?php endif; ?>    
        </div>
<?php  
    endforeach; 
?> 
    </div>
</div>