<?php
session_start();
if(!isset($_SESSION['autenticado'])){
  header('Location: login.php');
}
print_r($_SESSION);
?>
<?php require_once "./cabecalho.php";?>

<style media="screen"> h4{ text-align: center;} </style>

<div class="container">
  <p style="text-align: right;">
    Sessão iniciada como: <?= $_SESSION['autenticado']; ?></p>
    <div class="jumbotron">
      <h4>Acompanhe o calendário geral de próximas corridas,
        <a class="nav-link"href="<?= BASE_URL.'corrida/crud_corrida.php?acao=listar';?>"> acesse aqui!</a></h4>
      </div>
      <div class="jumbotron">
        <h4>Galeria de Fotos</h4>
        <table class="table">
          <thead>
            <tr>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <th scope="row"></th>
              <td><img src="images/galeria/image01.jpg" class="img-thumbnail"></td>
              <td><img src="images/galeria/image02.jpg" class="img-thumbnail"></td>
              <td></td>
            </tr>

            <tr>
              <th scope="row"></th>
              <td><img src="images/galeria/image03.jpg" class="img-thumbnail"></td>
              <td><img src="images/galeria/image04.jpg" class="img-thumbnail"></td>
              <td></td>
            </tr>

            <tr>
              <th scope="row"></th>
              <td><img src="images/galeria/image05.jpg" class="img-thumbnail"></td>
              <td><img src="images/galeria/image06.jpg" class="img-thumbnail"></td>
              <td></td>
            </tr>

            <tr>
              <th scope="row"></th>
              <td><img src="images/galeria/image07.jpg" class="img-thumbnail"></td>
              <td><img src="images/galeria/image08.jpg" class="img-thumbnail"></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php require_once "./rodape.php"; ?>
