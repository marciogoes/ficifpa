<div class="container">
  <?php
  if(isset($registro)){
    $acao = "crud_corrida.php?acao=atualizar&id="
    .$registro['id'];
  }else{
    $acao = "crud_corrida.php?acao=cadastrar";
  }
  ?>

  <h2>Cadastro de Corrida de Rua</h2>
  <form class="" action="<?= $acao; ?>" method="post">
    <div class="form-group">
      <label>Corrida</label>
      <input class="form-control" type="text" name="nome_corrida"
      value="<?php if(isset($registro)) echo $registro['nome_corrida'];?>" required autofocus>
    </div>

    <div class="form-group">
      <label for="data">Data</label>
      <input id="data" class="form-control" type="date" name="data"
      value="<?php if(isset($registro)) echo $registro['data'];?>">
    </div>

    <div class="form-group">
      <label for="">Kilometragem:</label>
      <input class="form-control" type="text" name="kilometragem"
      value="<?php if(isset($registro))
      echo $registro['kilometragem'];?>" required>
    </div>

    <div class="form-group">
      <label for="">Região:</label>
      <input class="form-control" type="text" name="regiao"
      value="<?php if(isset($registro))
      echo $registro['regiao'];?>" required>
    </div>

    <div class="form-group">
      <label for="">Informações Adicionais</label>
      <input class="form-control" type="text" name="info_adicionais"
      value="<?php if(isset($registro))
      echo $registro['info_adicionais'];?>" required>
    </div>

    <button class="btn btn-light btn-lg"> Cadastrar</button>
    <a class="btn btn-light btn-lg" href="<?= BASE_URL . 'corrida/crud_corrida.php?acao=listar';?>">Voltar</a>
  </form>
</div>
