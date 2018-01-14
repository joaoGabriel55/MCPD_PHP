<html>
<head>
	<title>MCPD</title>
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/icon.css">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <script type="text/javascript" src="<?php echo ROOT_URL; ?>assets/js/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  <script src="http://malsup.github.com/jquery.form.js"></script> 
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">

</head>
<body>

  <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background: green">
      <a class="navbar-brand" href="#" style="padding-bottom: 1.5%;">MCPD - Monitoramento e Controle de Pragas e Danos</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">

          </li>
          <li class="nav-item">

          </li>
          <li class="nav-item">

          </li>
        </ul>
        <?php if(isset($_SESSION['is_logged_in'])) : ?>
          <form class="form-inline mt-2 mt-md-0">
            <a class="nav-item nav-link my-2 my-sm-0" style="color: white;" href="<?php echo ROOT_URL; ?>">Usuário: <?php echo $_SESSION['user_data']['nome_completo']; ?></a>
            <a class="nav-item nav-link my-2 my-sm-0" style="color: white"  href="<?php echo ROOT_URL; ?>users/logout" title="Sair"><i class="material-icons">exit_to_app</i></a>
          </form>
        <?php endif; ?>

      </div>
    </nav>
  </header>

</nav>
<?php if(isset($_SESSION['is_logged_in'])) : ?>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light" id="fixed-top-menu">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo ROOT_URL; ?>home"><i class="large material-icons">home</i> <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo ROOT_URL; ?>propriedades" >Propriedades</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Culturas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pragas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo ROOT_URL; ?>users">Usuários</a>
        </li>
      </ul>
    </div>
  </nav>


<?php endif; ?>

<div class="conteudo">
  <?php Messages::display(); ?>
  <?php require($view); ?>

</div>

<footer class="footer">
  <div class="container">
    <span class="text-muted">Place sticky footer content here.</span>
  </div>
</footer>



</body>
</html>