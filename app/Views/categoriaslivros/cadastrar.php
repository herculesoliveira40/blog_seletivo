<div class="col-xl-4 col-md-6 mx-auto p-5">
<div class="card">
    <div class="card-body text-dark bg-light">    
    <div class="card-header text-white bg-success"> <h2>Cadastar Categoria Livro</h2></div>
  
            <form name="cadastrar" method="POST" action="<?= URL?>/categoriaslivros/cadastrar">
                <div class="mb-3">
                    <label for="nome" class="form-label"> Nome Categoria Livro: </label>
                    <input type="text" name="nome" id="nome"  class="form-control" placeholder="categoria livro">
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


