<div class="container my-5">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= URL?>/livros"> Livros </a></li>
    <li class="breadcrumb-item active" aria-current="page"> Livros<?=$dados['livro']->id?></li>
  </ol>
</nav>     
<div class="card">
        <div class="card-header bg-info">
            Livros
            <a class="btn btn-warning float-right" href="<?=URL?>/livro/cadastrar">
                    Cadastrar Livro
            </a>
        </div>
                   
        <div class="card m-5">
            <div class="card-header text-center">
                <h3> <?= $dados['livro']->titulo ?> </h3>
            </div>
            <div class="card-body">
                <p class="card-text-justify"> <?= $dados['livro']->descricao?> </p>
                <img src="<?=$dados['livro']->imagem?>" alt="<?=$dados['livro']->imagem?>">

            </div>
            <div class="card-footer text-muted">
                <small> <strong> <?= "Autor: " . $dados['livro']->autor . " Publicado Em: " . date("d/m/Y h:m ", strtotime($dados['livro']->data_de_publicacao)) . "<br> Tamanho: ". strlen($dados['livro']->descricao) ?> </strong></small>
            </div>
            <?php if ($dados['livro']->autor_usuario == $_SESSION['usuario_id']) : ?>
                <a class="btn btn-primary" href="<?= URL.'/livros/editar/'.$dados['livro']->id?>"> Editar </a>
                <form action="<?= URL.'/livro/deletar/'.$dados['livro']->id?>" method="POST">
                    <input type="submit" class="btn bg-danger" value="deletar">
                </form>
            <?php endif; ?>    
        </div>

    </div>
</div>