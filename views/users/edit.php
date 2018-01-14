<?php
$userModel = new UserModel;
  
$row = $userModel->editOnPost($_SESSION['user_edit']['id']);
?>
<div class="row" style="margin-left: 20%; margin-top: 5%;" >
    <div class="col s12 m9">
        <div class="card white-text">
            <div class="card-content black-text">
                <span class="card-title" style="color: black; margin-left: 1%">Alterar Usuário</span>
                <br/>
                <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />

                    <div class="row">
                        <div class="input col s12">
                            <label for="nome_completo" class="label-color">Nome Completo</label>
                            <input id="nome_completo" type="text" class="validate" name="nome_completo" 
                                   value="<?php echo $row['nome_completo']; ?>">

                        </div>
                    </div>

                    <div class="row">
                        <div class="input col s12">
                            <label for="cpf" class="label-color">CPF</label>
                            <input id="cpf" type="text" class="cpf" name="cpf" 
                                   value="<?php echo $row['cpf']; ?>">

                        </div>
                    </div>

                    <div class="row">
                        <div class="input col s12">
                            <label for="email" class="label-color">Email</label>
                            <input id="email" type="email" class="validate" name="email"
                                   value="<?php echo $row['email']; ?>">

                        </div>
                    </div>

                    <div class="row">
                        <div class="input col s12">
                            <label for="login" class="label-color">Login</label>
                            <input id="login" type="text" class="validate" name="login"
                                   value="<?php echo $row['login']; ?>">

                        </div>
                    </div>
                    <div class="row">
                        <div class="input col s12">
                            <label for="password" class="label-color">Senha</label>
                            <input id="password" type="password" class="validate" name="senha"
                                   value="<?php echo $row['senha']; ?>">

                        </div>
                    </div>
                    <hr />
                    <br/>
                    <input class="btn btn-primary" name="submit" type="submit" value="Alterar" style="margin-left: 60%;" />
                    <a class="waves-effect waves-light btn red" style="margin-left: 1%;" href="<?php echo ROOT_URL; ?>users">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
