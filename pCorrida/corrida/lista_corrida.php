<div class="container">
  <?php if(isset($_GET['erro'])){ ?>
    <div class="alert alert-danger" role="alert">
      Este dado não pode ser removido,
      pois está atrelado em outras tabelas
    </div>
  <?php } ?>

  <br>

  <h1>Corridas cadastradas</h1>
  <a class="btn btn-secondary align-right"
  href="relatorio_corrida.php" >
  <span data-feather="printer"></span></a>

  <a class="btn btn-secondary"
  href="crud_corrida.php?acao=novo">
  <span data-feather="plus-square"></span> Adicionar</a>

  <br/><br/>

  <table class="table table-bordered table-hover">
   <thead class="">
    <th>#</th>
    <th>Nome</th>
    <th>Data</th>
    <th>Kilometragem</th>
    <th>Região</th>
    <th>Informações Adicionais</th>
    <th>Editar</th>
    <th>Excluir</th>
  </thead>
  <tbody>
    <?php foreach($lista_corrida as $item):
      $id = $item['id']; ?>
      <tr>
        <td><?= $item['id']; ?></td>
        <td><?= $item['nome_corrida']; ?></td>
        <td><?= date('d/m/Y', strtotime($item['data'])); ?></td>
        <td><?= $item['kilometragem']; ?></td>
        <td><?= $item['regiao']; ?></td>
        <td><?= $item['info_adicionais']; ?></td>
        <td><a class="btn btn-secondary" href="crud_corrida.php?acao=buscar&id=<?= $id; ?>">
          <span data-feather="edit"></span></a>
        </td>
        <td>
          <a class="btn btn-secondary" href="crud_corrida.php?acao=deletar&id=<?= $id; ?>">
            <span data-feather="delete"></span>
          </a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div> <!-- Div Container-->
