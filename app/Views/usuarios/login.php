<div class="col-xl-4 col-md-6 mx-auto p-5">
<div class="card">
    <div class="card-body text-dark bg-light">    
    <div class="card-header text-white bg-success"> <h2>Login</h2></div>
            <?= Sessao::mensagem('usuario'); ?>
            <form name="login" method="POST" action="<?= URL?>/usuarios/login">

                <div class="mb-3">  
                    <label for="email" class="form-label"> Email: </label>
                    <input type="email" name="email" id="email"  class="form-control" placeholder="name@example.com">
                </div>  
                <div class="mb-3">
                    <label for="senha" class="form-label"> Senha: </label>
                    <input type="password" name="senha" id="senha"  class="form-control" placeholder="">
                </div>  
 

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn bg-info">
                        
                    </div>
                    <div class="col">
                        <a href="<?= URL?>/usuarios/cadastrar"> Não tem conta? Faça Cadastro</a>
                    </div>
                </div>                                            
            </form>
    </div>
</div>
</div>


