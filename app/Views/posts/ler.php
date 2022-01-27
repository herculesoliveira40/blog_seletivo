<div class="container my-5">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= URL?>/posts"> Posts </a></li>
    <li class="breadcrumb-item active" aria-current="page"> Posts<?=$dados['post']->id?></li>
  </ol>
</nav>     
<div class="card">
        <div class="card-header bg-info">
            Postagens
            <a class="btn btn-warning float-right" href="<?=URL?>/posts/cadastrar">
                    Cadastrar Post
            </a>
        </div>
                   
        <div class="card m-5">
            <div class="card-header text-center">
                <h3> <?= $dados['post']->titulo ?> </h3>
            </div>
            <div class="card-body">
                <p class="card-text-justify"> <?= $dados['post']->texto?> </p>
            </div>
            <div class="card-footer text-muted">
                <small> <strong> <?= "Escrito por:" . $dados['usuario']->nome . "Em: " . date("d/m/Y h:m ", strtotime($dados['post']->criado_em)) . "<br> Tamanho: ". strlen($dados['post']->texto) ?> </strong></small>
            </div>
            <?php if ($dados['post']->usuario_id == $_SESSION['usuario_id']) : ?>
                <a class="btn btn-primary" href="<?= URL.'/posts/editar/'.$dados['post']->id?>"> Editar </a>
                <form action="<?= URL.'/posts/deletar/'.$dados['post']->id?>" method="POST">
                    <input type="submit" class="btn bg-danger" value="deletar">
                </form>
            <?php endif; ?>    
        </div>

    </div>
</div>