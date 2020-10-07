<?php
$sql_atleta  = "SELECT * FROM atleta;";
$query_atleta = $con->query($sql_atleta);
$lista_atleta = $query_atleta->fetchAll();

$sql_corrida  = "SELECT * FROM corrida;";
$query_corrida = $con->query($sql_corrida);
$lista_corrida = $query_corrida->fetchAll();
?>

<div class="container">
  <?php
  if(isset($registro)){
    $acao = "crud_evento.php?acao=atualizar&id="
    .$registro['id'];
  }else{
    $acao = "crud_evento.php?acao=cadastrar";
  }
  ?>

  <h2>Cadastro de Evento</h2>
  <form class="" action="<?= $acao; ?>" method="post" col-10>
  
    <div class="form-group">
      <label>Atleta</label>
      <select class="form-control" name="id_atleta">
        <option value="">
          Selecione o Atleta
        </option>
        <?php foreach($lista_atleta as $item){ ?>
          <option value="<?= $item['id']; ?>"
            <?php if(isset($registro)
              && $registro['id_atleta']==$item['id'])
              echo "selected"; ?>>
              <?= $item['nome']; ?>
            </option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group">
        <label>Corrida</label>
        <select class="form-control" name="id_corrida">
          <option value="">
            Selecione a Corrida à participar
          </option>
          <?php foreach($lista_corrida as $item){ ?>
            <option value="<?= $item['id']; ?>"
              <?php if(isset($registro)
                && $registro['id_corrida']==$item['id'])
                echo "selected"; ?>>
                <?= $item['nome_corrida']; ?>
              </option>
            <?php } ?>
          </select>
        </div>

        <button class="btn btn-light btn-lg">
          Enviar
        </button>
        <a class="btn btn-light btn-lg"
        href="<?= BASE_URL . 'evento/crud_evento.php?acao=listar';?>">
        Voltar
      </a>
    </form>
  </div>
