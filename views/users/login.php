<br/><br/>
<div class="container">
  <div class="card" id="card-login">
    <div class="card-body">
      <form class="form-signin" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <h2 class="form-signin-heading">Entrar</h2>
        <label for="inputEmail" class="sr-only">Login</label>
        <input type="text" id="inputEmail" name="login" class="form-control" placeholder="Login" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required>

        <input class="btn btn-lg btn-success btn-block" name="submit" type="submit" value="Entrar"/>
      </form>
    </div>
  </div>

</div> <!-- /container -->

