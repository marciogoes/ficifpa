<?php
session_start();
if(!isset($_SESSION['autenticado'])){
  header('Location: ../login.php');
}
print_r($_SESSION);
require_once('../conexao.php');

$sql  = "SELECT t.id, a.nome, e.nome_equipe, t.strava
        FROM treino as t
        INNER JOIN atleta as a ON t.id_atleta = a.id
        INNER JOIN equipe as e ON a.id_equipe = e.id;";

$query = $con->query($sql);
$lista = $query->fetchAll();
require_once('../cabecalho.php');
require_once('../rodape.php');
?>

<style>
.extra{
  padding-left: 150px;
}
</style>

<div class="container">
  <br><br>
  <h1>Treinos</h1>
  <br/>
  <center><p>Clique no perfil Strava para acessar os treinos do/a atleta!</p><center>
    <div class="extra">
     <table class="table table-striped table-hover">
       <thead class="">
        <th>Perfil</th>
        <th>Nome</th>
        <th>Equipe</th>
      </thead>
      <tbody>
        <?php foreach($lista as $item):
          $id = $item['id']; ?>
          <tr>
            <td><a href="https://www.strava.com/">
             <img src="icone_strava.png" width="40" height="40"
           </a>
         </td>
         <td><?= $item['nome']; ?></td>
         <td><?= $item['nome_equipe']; ?></td>
       </tr>
     <?php endforeach ?>
   </tbody>
 </table>
</div>
</div> <!-- Div Container-->
