<div class="container">
  <?php if(isset($_GET['erro'])){ ?>
    <div class="alert alert-danger" role="alert">
      Este dado não pode ser removido,
      pois está atrelado em outras tabelas
    </div>
  <?php } ?>
  <br>
  <h1>Atletas cadastrados</h1>

  <a class="btn btn-secondary align-right"
  href="relatorio_atleta.php" >
  <span data-feather="printer"></span></a>

  <a class="btn btn-secondary"
  href="crud_atleta.php?acao=novo">
  <span data-feather="plus-square"></span> Adicionar
</a>

<br/><br/>
<table class="table table-bordered table-hover">
 <thead class="">
  <th>#</th>
  <th class=>Nome</th>
  <th class=>Equipe</th>
  <th class=>Categoria</th>
  <th class=>Identificação</th>
  <th class=>Informações Adicionais</th>
  <th>Editar</th>
  <th>Excluir</th>
</thead>
<tbody>
  <?php foreach($lista_atleta as $item):
    $id = $item['id']; ?>
    <tr>
      <td><?= $item['id']; ?></td>
      <td><?= $item['nome']; ?></td>
      <td><?= $item['nome_equipe']; ?></td>
      <td><?= $item['categoria']; ?></td>
      <td><?= $item['documento']; ?></td>
      <td><?= $item['info_adicionais']; ?></td>
      <td>
        <a class="btn btn-secondary" href="crud_atleta.php?acao=buscar&id=<?= $id; ?>">
          <span data-feather="edit"></span>
        </a>
      </td>
      <td>
        <a class="btn btn-secondary" href="crud_atleta.php?acao=deletar&id=<?= $id; ?>">
          <span data-feather="delete"></span>
        </a>
      </td>
    </tr>
  <?php endforeach ?>
</tbody>
</table>
</div> <!-- Div Container-->
