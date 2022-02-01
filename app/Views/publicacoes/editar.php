<div class="col-md-6 mx-auto p-5">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= URL?>/publicacoes"> Publicacões </a></li>
    <li class="breadcrumb-item active" aria-current="page"> Editar Publicacao: <?= $dados['titulo']?></li>
  </ol>
</nav>   
<div class="card">
    <div class="card-body text-dark bg-light">    
    <div class="card-header text-white bg-success"> <h2>Editar Publicacao</h2></div>
  
            <form name="cadastrar" method="POST" action="<?= URL?>/publicacoes/editar/<?= $dados['id']?>">
                <div class="mb-3">
                    <label for="titulo" class="form-label"> Titulo: </label>
                    <input type="text" name="titulo" id="titulo"  class="form-control" value="<?= $dados['titulo']?>" >
                </div>  
                <div class="mb-3">  
                    <label for="descricao" class="form-label"> Descricao: </label>
                    <textarea name="descricao" id="descricao"  class="form-control"> <?= $dados['descricao']?> </textarea>
                </div>  
                <div class="mb-3">  
                    <label for="conteudo" class="form-label"> Conteudo: </label>
                    <textarea name="conteudo" id="conteudo"  class="form-control"> <?= $dados['conteudo']?> </textarea>
                </div>  
                <div class="mb-3">  
                    <label for="imagem" class="form-label"> Link imagem: </label>
                    <input type="text" name="imagem" id="imagem"  class="form-control" value="<?= $dados['imagem']?>" >
                </div> 
                <div class="mb-3">  
                    <label for="categoria" class="form-label"> Categoria Publicao: </label>
                    <select  name="categoria" id="categoria"  class="form-control" placeholder="categoria">  
                        <option value="<?= $dados['categoria']?>" > 1 </option>
                    </select >
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


