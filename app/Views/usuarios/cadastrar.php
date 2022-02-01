<div class="col-xl-4 col-md-6 mx-auto p-5">
<div class="card">
    <div class="card-body text-dark bg-light">    
    <div class="card-header text-white bg-success"> <h2>Cadastre-se</h2></div>
  
            <form name="cadastrar" method="POST" action="<?= URL?>/usuarios/cadastrar">
            <div class="mb-3">
                    <label for="cpf" class="form-label"> CPF: </label>
                    <input type="text" name="cpf" id="cpf"  class="form-control" onkeypress="$(this).mask('000.000.000-00')" required>
                </div>            
                <div class="mb-3">
                    <label for="nome" class="form-label"> Nome: </label>
                    <input type="text" name="nome" id="nome"  class="form-control" placeholder="Your name" required>
                </div>  
                <div class="mb-3">  
                    <label for="email" class="form-label"> Email: </label>
                    <input type="email" name="email" id="email"  class="form-control" placeholder="name@example.com" required>
                </div>  
                <div class="mb-3">
                    <label for="senha" class="form-label"> Senha: </label>
                    <input type="password" name="senha" id="senha"  class="form-control" placeholder="" required>
                </div>  
                <div class="mb-3">
                    <label for="confirmar_senha" class="form-label"> Confirmar Senha: </label>
                    <input type="password" name="confirmar_senha" id="confirmar_senha" class="form-control"placeholder="" required>
                </div>   

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Cadastrar" class="btn bg-info">
                        <input type="reset" value="Limpar Campos">
                        
                    </div>
                    <div class="col">
                        <a href="<?= URL?>/usuarios/login"> Já tem cadastro? Faça login</a>
                    </div>
                </div>                                            
            </form>
    </div>
</div>
</div>


