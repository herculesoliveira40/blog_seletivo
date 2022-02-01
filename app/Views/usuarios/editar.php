<div class="col-md-6 mx-auto p-5">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= URL?>/publicacoes"> Usuarios </a></li>
    <li class="breadcrumb-item active" aria-current="page"> Editar Usuarios: <?= $dados['nome']?></li>
  </ol>
</nav>   
<div class="card">
    <div class="card-body text-dark bg-light">    
    <div class="card-header text-white bg-success"> <h2>Editar Usuarios</h2></div>
  
            <form name="cadastrar" method="POST" action="<?= URL?>/usuarios/editar/<?= $dados['id']?>">
                <div class="mb-3">
                    <label for="cpf" class="form-label"> CPF: </label>
                    <input type="text" name="cpf" id="cpf"  class="form-control" onkeypress="$(this).mask('000.000.000-00')" value="<?= $dados['cpf']?>" >
                </div>            
                <div class="mb-3">
                    <label for="nome" class="form-label"> Nome: </label>
                    <input type="text" name="nome" id="nome"  class="form-control" value="<?= $dados['nome']?>" >
                </div>  
                <div class="mb-3">  
                    <label for="email" class="form-label"> Email: </label>
                    <input type="email" name="email" id="email"  class="form-control" value="<?= $dados['email']?>" >
                </div>  
                <div class="mb-3">
                    <label for="senha" class="form-label"> Senha Atual: </label>
                    <input type="password" name="senha" id="senha"  class="form-control" placeholder="">
                </div>  
                <div class="mb-3">
                    <label for="confirmar_senha" class="form-label"> Senha Nova: </label>
                    <input type="password" name="confirmar_senha" id="confirmar_senha" class="form-control"placeholder="">
                </div>   

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Editar" class="btn bg-info">
                        
                    </div>

                </div>                                            
            </form>
    </div>
</div>
</div>