<h1> Usuarios </h1>


<div class="container">
<?= Sessao::mensagem('usuarios'); ?> <!--  Invoca mensagemmmmmmmmmmmmmmmmmmmmmmmm -->
    <div class="card">
        <div class="card-header bg-info">
            Usuarios
            <a class="btn btn-warning float-right" href="<?=URL?>/usuarios/cadastrar">
                    Cadastrar Usuarios
            </a>
        </div>
<?php 
    foreach ($dados['usuarios'] as $usuario):
?>                    
        <div class="card m-5">
            <div class="card-header text-center">
                <h3> <?= $usuario->id . " - " . $usuario->nome ?> </h3>
            </div>
            <div class="card-body">
                <p class="card-text-justify">  <?= $usuario->email ?> </p> 
                <div style="display: flex;justify-content: space-around">  
                    
                    <?php if($usuario->id == $_SESSION['usuario_id']): ?>
                        <a class="btn btn-success" href="<?= URL.'/usuarios/editar/'.$usuario->id?>"> Editar </a>

                            <form action="<?= URL.'/usuarios/deletar/'.$usuario->id?>" method="POST">
                                <input type="submit" class="btn bg-danger" value="deletar">
                            </form>
                    <?php endif; ?>    
                </div>            
            </div>
           
        </div>

<?php  
    endforeach; 
?> 
    </div>
</div>

