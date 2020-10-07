<?php
session_start();

if(isset($_GET['acao'])
  && $_GET['acao']=='logout'){
  unset($_SESSION['autenticado']);
}

require_once('./conexao.php');
if(isset($_POST['login'])
  && isset($_POST['senha'])){
  $login = $_POST['login'];
$senha = md5($_POST['senha']);

$sql  = "SELECT count(*) as qtd FROM usuario
          WHERE login=:login
          AND senha= :senha";
$query = $con->prepare($sql);
$params = array('login'=>$login,
  'senha'=>$senha);
$r      = $query->execute($params);
$result = $query->fetch();

if($result['qtd']==1){
  $_SESSION['autenticado'] = $login;
  header('Location: index.php');
}else{
  $mensagem = "Usuário/Senha Incorretos";
}
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Login</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
  crossorigin="anonymous">

  <style>
        #copy{
          font-style: italic;
          font-size: small;
        }

        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
        }

        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
  </style>

<!-- Custom styles for this template -->
<link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">
  <form class="form-signin" action="login.php" method="post">
    <img class="mb-4" src="./icone_podio.jpg" alt="" width="100" height="100">
    <?php if(isset($mensagem)){ ?>
      <div class="alert alert-danger" role="alert">
        <?= $mensagem; ?>
      </div>
    <?php } ?>

    <h1 class="h3 mb-3 font-weight-normal">Portal de Corridas</h1>

    <label for="inputlogin" class="sr-only">login</label>
    <input type="login" name="login" id="inputlogin" class="form-control" placeholder="Login" required autofocus>

    <label for="inputPassword" class="sr-only">Senha</label>
    <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="*********" required>

    <button class="btn btn-lg btn-light btn-block" type="submit">Acessar</button>

    <p class="mt-5 mb-3 text-muted" id="copy">&copy; Projeto Final - FIC - IFPA</p>
  </form>
</body>
</html>
