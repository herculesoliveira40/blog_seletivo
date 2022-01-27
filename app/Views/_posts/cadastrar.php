<div class="col-md-6 mx-auto p-5">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= URL?>/posts"> Posts </a></li>
    <li class="breadcrumb-item active" aria-current="page"> Cadastrar Posts</li>
  </ol>
</nav>    
<div class="card">
    <div class="card-body text-dark bg-light">    
    <div class="card-header text-white bg-success"> <h2>Cadastrar Post</h2></div>
  
            <form name="cadastrar" method="POST" action="<?= URL?>/posts/cadastrar">
                <div class="mb-3">
                    <label for="titulo" class="form-label"> Titulo: </label>
                    <input type="text" name="titulo" id="titulo"  class="form-control" placeholder="titulo">
                </div>  
                <div class="mb-3">  
                    <label for="texto" class="form-label"> Texto: </label>
                    <textarea name="texto" id="texto"  class="form-control" placeholder="texto"> <?= $dados['texto']?> </textarea>
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


