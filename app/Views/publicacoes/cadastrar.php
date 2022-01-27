<div class="col-md-6 mx-auto p-5">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= URL?>/publicacoes"> publicacoes </a></li>
    <li class="breadcrumb-item active" aria-current="page"> Cadastrar publicacoes</li>
  </ol>
</nav>    
<div class="card">
    <div class="card-body text-dark bg-light">    
    <div class="card-header text-white bg-success"> <h2>Cadastrar Post</h2></div>
  
            <form name="cadastrar" method="POST" action="<?= URL?>/publicacoes/cadastrar">
                <div class="mb-3">
                    <label for="titulo" class="form-label"> Titulo: </label>
                    <input type="text" name="titulo" id="titulo"  class="form-control" placeholder="titulo">
                </div>  
                <div class="mb-3">  
                    <label for="descricao" class="form-label"> Descricao: </label>
                    <textarea name="descricao" id="descricao"  class="form-control" placeholder="descricao"> <?= $dados['descricao']?> </textarea>
                </div>  
               
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Cadastrar" class="btn bg-info">                        
                    </div>

                </div>                                            
            </form>
    </div>
</div>
</div>


