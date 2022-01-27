<div class="container my-5">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= URL?>/publicacoes"> Publicacoes </a></li>
    <li class="breadcrumb-item active" aria-current="page"> Publicacoes<?=$dados['publicacao']->id?></li>
  </ol>
</nav>     
<div class="card">
        <div class="card-header bg-info">
            Publicacao
            <a class="btn btn-warning float-right" href="<?=URL?>/publicacoes/cadastrar">
                    Cadastrar publicacao
            </a>
        </div>
                   
        <div class="card m-5">
            <div class="card-header text-center">
                <h3> <?= $dados['publicacao']->titulo ?> </h3>
            </div>
            <div class="card-body">
                <p class="card-text-justify"> <?= $dados['publicacao']->descricao?> </p>
            </div>
            <div class="card-footer text-muted">
                <small> <strong> <?= "Autor:" . $dados['usuario']->nome . "Em: " . date("d/m/Y h:m ", strtotime($dados['publicacao']->criado_em)) . "<br> Tamanho: ". strlen($dados['publicacao']->texto) ?> </strong></small>
            </div>
            <?php if ($dados['publicacao']->autor == $_SESSION['usuario_id']) : ?>
                <a class="btn btn-primary" href="<?= URL.'/publicacoes/editar/'.$dados['publicacao']->id?>"> Editar </a>
                <form action="<?= URL.'/publicacoes/deletar/'.$dados['publicacao']->id?>" method="publicacao">
                    <input type="submit" class="btn bg-danger" value="deletar">
                </form>
            <?php endif; ?>    
        </div>

    </div>
</div>