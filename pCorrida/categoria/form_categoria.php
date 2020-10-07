<div class="container">
  <?php
  if(isset($registro)){
    $acao = "crud_categoria.php?acao=atualizar&id="
    .$registro['id'];
  }else{
    $acao = "crud_categoria.php?acao=cadastrar";
  }
  ?>

  <h2>Novo Cadastro Categoria</h2>
  <form class="" action="<?= $acao; ?>" method="post">
    
    <div class="form-group">
      <label for="">Categoria:</label>
      <input class="form-control" type="text" name="categoria"
      value="<?php if(isset($registro))
      echo $registro['categoria'];?>" required autofocus>
    </div>
  
    <div class="form-group">
      <button class="btn btn-light btn-lg">
        Cadastrar
      </button>
      <a class="btn btn-light btn-lg"
      href="<?= BASE_URL . 'categoria/crud_categoria.php?acao=listar';?>">
      Voltar
    </a>
  </form>
</div>
