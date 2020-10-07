<div class="container">
  <?php
  if(isset($registro)){
    $acao = "crud_equipe.php?acao=atualizar&id="
    .$registro['id'];
  }else{
    $acao = "crud_equipe.php?acao=cadastrar";
  }
  ?>

  <h2>Novo Cadastro de Equipe</h2>
  
  <form class="" action="<?= $acao; ?>" method="post">
    <div class="form-group">
      <label for="">Nome da Equipe:</label>
      <input class="form-control" type="text" name="nome_equipe"
      value="<?php if(isset($registro))
      echo $registro['nome_equipe'];?>" required autofocus>
    </div>

    <div class="form-group">
      <label for="">Cidade/Estado:</label>
      <input class="form-control" type="text" name="cidade"
      value="<?php if(isset($registro))
      echo $registro['cidade'];?>">
    </div>

    <div class="form-group">
      <button class="btn btn-light btn-lg">
        Cadastrar
      </button>
      <a class="btn btn-light btn-lg"
      href="<?= BASE_URL . 'equipe/crud_equipe.php?acao=listar';?>">
      Voltar
    </a>
  </form>
</div>
