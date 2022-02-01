<div class="col-md-6 mx-auto p-5">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= URL?>/publicacoes"> publicacoes </a></li>
    <li class="breadcrumb-item active" aria-current="page"> Cadastrar publicacoes</li>
  </ol>
</nav>    
<div class="card">
    <div class="card-body text-dark bg-light">    
    <div class="card-header text-white bg-success"> <h2>Cadastrar Publicacão</h2></div>
  
            <form name="cadastrar" method="POST" action="<?= URL?>/publicacoes/cadastrar">
                <div class="mb-3">
                    <label for="titulo" class="form-label"> Titulo: </label>
                    <input type="text" name="titulo" id="titulo"  class="form-control" placeholder="titulo" required>
                </div>  
                <div class="mb-3">  
                    <label for="descricao" class="form-label"> Descricao: </label>
                    <textarea name="descricao" id="descricao"  class="form-control" placeholder="descricao">  </textarea>
                </div>  
                <div class="mb-3">  
                    <label for="conteudo" class="form-label"> Conteudo: </label>
                    <textarea name="conteudo" id="conteudo"  class="form-control" placeholder="conteudo">  </textarea>
                </div>    
                <div class="mb-3">  
                    <label for="imagem" class="form-label"> Link imagem: </label>
                    <input type="text" name="imagem" id="imagem"  class="form-control" placeholder=" cole aqui link imagem" required>
                </div>   
                <div class="mb-3">  
                    <label for="categoria" class="form-label"> Categoria Publicação: </label>

                        <select  name="categoria" id="categoria"  class="form-control" placeholder="categoria">  
                            <?php foreach ($dados['categorias_publicacoes'] as $categoria_publicacao): ?>
                                            <?php var_dump($dados['categorias_publicacoes']) ?>
                                <option value="<?=$categoria_publicacao->id?>"> <?=$categoria_publicacao->nome?> </option>
                            <?php endforeach; ?>
                        </select >
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


