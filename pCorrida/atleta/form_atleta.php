<?php
if(!isset($_SESSION['autenticado'])){
  header('Location: ../login.php');
}
$sql_equipe  = "SELECT * FROM equipe;";
$query_equipe = $con->query($sql_equipe);
$lista_equipe = $query_equipe->fetchAll();

$sql_categoria  = "SELECT * FROM categoria;";
$query_categoria = $con->query($sql_categoria);
$lista_categoria = $query_categoria->fetchAll();
?>

<div class="container">
  <?php
  if(isset($registro)){
    $acao = "crud_atleta.php?acao=atualizar&id="
    .$registro['id'];
  }else{
    $acao = "crud_atleta.php?acao=cadastrar";
  }
  ?>

  <h2>Cadastro de Atleta</h2>
  <form class="" action="<?= $acao; ?>" method="post" col-10>
    <div class="form-group">
      <label>Nome</label>
      <input class="form-control" type="text" name="nome"
      value="<?php if(isset($registro))
      echo $registro['nome'];?>" required autofocus>
    </div>

    <div class="form-group">
      <label>Equipe</label>
      <select class="form-control" name="id_equipe">
        <option value="">Selecione uma equipe na lista</option>
        <?php foreach($lista_equipe as $item){ ?>
          <option value="<?= $item['id']; ?>"
            <?php if(isset($registro)
              && $registro['id_equipe']==$item['id'])
              echo "selected"; ?>>
              <?= $item['nome_equipe']; ?>
            </option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group">
        <label>Categoria</label>
        <select class="form-control" name="id_categoria">
          <option value="">
            Selecione uma Categoria
          </option>
          <?php foreach($lista_categoria as $item){ ?>
            <option value="<?= $item['id']; ?>"
              <?php if(isset($registro)
                && $registro['id_categoria']==$item['id'])
                echo "selected"; ?>>
                <?= $item['categoria']; ?>
              </option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label>Documento</label>
          <input class="form-control" type="text" name="documento"
          value="<?php if(isset($registro))
          echo $registro['documento'];?>">
        </div>

        <div class="form-group">
          <label>Informações Adicionais</label>
          <input class="form-control" type="text" name="info_adicionais"
          value="<?php if(isset($registro))
          echo $registro['info_adicionais'];?>">
        </div>

        <button class="btn btn-light btn-lg">Enviar</button>
        <a class="btn btn-light btn-lg" href="<?= BASE_URL . 'atleta/crud_atleta.php?acao=listar';?>">Voltar</a>
      </form>
    </div>
