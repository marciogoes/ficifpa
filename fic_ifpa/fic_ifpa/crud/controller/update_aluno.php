<?php

include_once '../model/Conexao.class.php';
include_once '../model/Manager.class.php';

$manager = new Manager();

$update_client = $_POST;
$id = $_POST['id'];

if (isset($id) && !empty($id)) {
	$manager->updateAluno("registros", $update_aluno, $id);

	header("Location: ../index.php?Aluno_update");
}

 ?>