<?php

include_once 'model/Conexao.class.php';
include_once 'model/Manager.class.php';

$manager = new Manager();

 ?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once 'view/dependencias.php'; ?>
</head>
<body>

	<div class="container">

	<img src="view/imagens/ifpa2.png" width="10%">

		<h2 class="text-center">
			Lista de Alunos <i class="fa fa-list"></i>
		</h2>

		<h5 class="text-right">
			<a href="view/page_register.php" class="btn btn-primary btn-xs">
				<i class="fa fa-user-plus"></i>
			</a>
		</h5>

	</div>

	<div class="table-responsive">

        <table class="table table-hover">
        	<thead class="thead">
        		<tr>
        			<th>ID</th>
        			<th>NOME</th>
        			<th>E-MAIL</th>
        			<th>CPF</th>
        			<th>DT.DE NASCIMENTO</th>
        			<th>ENDEREÇO</th>
        			<th>TELEFONE</th>
        			<th colspan="3">AÇÕES</th>
        		</tr>
        	</thead>
        	<tbody>
                        <?php  foreach($manager->listAluno("registros") as $aluno): ?>
        		<tr>
        			<td><?php echo $aluno['id']; ?></td>
        			<td><?php echo $aluno['name']; ?></td>
        			<td><?php echo $aluno['email']; ?></td>
        			<td><?php echo $aluno['cpf']; ?></td>
        			<td><?php echo date("d/m/Y", strtotime($aluno['birth'])); ?></td>
        			<td><?php echo $aluno['address']; ?></td>
        			<td><?php echo $aluno['phone']; ?></td>
        			<td>
        				<form method="POST" action="view/page_update.php">

                        <input type="hidden" name="id" value="<?=$client['id']?>">

        					<button class="btn btn-warning btn-xs">
        						<i class="fa fa-user-edit"></i>
        					</button>
        				</form>
        			</td>
        			<td>
        				<form method="POST" action="controller/delete_aluno.php" onclick="return confirm('Você tem certeza que deseja excluir o registro do Aluno?');">

                            <input type="hidden" name="id" value="<?=$client['id']?>">

        					<button class="btn btn-danger btn-xs">
        						<i class="fa fa-trash"></i>
        					</button>

        				</form>
        			</td>
        		</tr>
                       <?php endforeach;  ?>
        	</tbody>
        </table>

	</div>



</body>
</html>