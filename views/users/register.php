
<div class="row" style="margin-left: 15%; margin-top: 5%;" >
  <div class="col s12 m10">
    <div class="card white-text">
      <div class="card-content black-text">
        <span class="card-title" style="color: black;">Registrar Novo Usuário</span>

        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="row">
                <div class="input-field col s12">
                  <input id="nome_completo" type="text" class="validate" name="nome_completo">
                  <label for="nome_completo">Nome Completo</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                  <input id="cpf" type="text" class="cpf" name="cpf">
                  <label for="cpf">CPF</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                  <input id="email" type="email" class="validate" name="email">
                  <label for="email">Email</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                  <input id="login" type="text" class="validate" name="login">
                  <label for="login">Login</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                  <input id="password" type="password" class="validate" name="senha">
                  <label for="password">Senha</label>
                </div>
            </div>
            <div class="card-action">
                <input class="btn btn-primary" name="submit" type="submit" value="Cadastrar" style="margin-left: 45%;" />
                <a class="waves-effect waves-light btn red" style="margin-left: 1%;" href="<?php echo ROOT_URL; ?>users">Cancelar</a>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>