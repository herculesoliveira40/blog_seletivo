<div class="col-md-6 mx-auto p-5">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= URL?>/livros"> Livros </a></li>
    <li class="breadcrumb-item active" aria-current="page"> Editar Livro: <?= $dados['titulo']?></li>
  </ol>
</nav>   
<div class="card">
    <div class="card-body text-dark bg-light">    
    <div class="card-header text-white bg-success"> <h2>Editar Livro</h2></div>
  
            <form name="cadastrar" method="POST" action="<?= URL?>/livros/editar/<?= $dados['id']?>">
                <div class="mb-3">
                    <label for="titulo" class="form-label"> Titulo: </label>
                    <input type="text" name="titulo" id="titulo"  class="form-control" value="<?= $dados['titulo']?>" required>
                </div>  
                <div class="mb-3">  
                    <label for="descricao" class="form-label"> Descrição: </label>
                    <textarea name="descricao" id="descricao"  class="form-control"> <?= $dados['descricao']?> </textarea>
                </div>  
                <div class="mb-3">
                    <label for="autor" class="form-label"> Autor: </label>
                    <input type="text" name="autor" id="autor"  class="form-control" value="<?= $dados['autor']?>" required>
                </div> 
                <div class="mb-3">
                    <label for="data_de_publicacao" class="form-label"> Data de Publicação: </label>
                    <input type="date" name="data_de_publicacao" id="data_de_publicacao"  class="form-control" value="<?= $dados['data_de_publicacao']?>" required>
                </div> 
                <div class="mb-3">  
                    <label for="categoria" class="form-label"> Categoria Livro: </label>
                    <select  name="categoria" id="categoria"  class="form-control" placeholder="categoria">  
                        <option value="2">2</option>
                    </select >
                </div>
                <div class="mb-3">  
                    <label for="paginas" class="form-label"> Quantidade de Paginas: </label>
                    <input type="number" name="paginas" id="paginas"  class="form-control" value="<?= $dados['paginas']?>" required>
                </div> 
                <div class="mb-3">  
                    <label for="imagem" class="form-label"> Link imagem: </label>
                    <input type="text" name="imagem" id="imagem"  class="form-control" value="<?= $dados['imagem']?>" required>
                </div>  
               
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Editar" class="btn bg-info" required>                        
                    </div>

                </div>                                            
            </form>
    </div>
</div>
</div>


