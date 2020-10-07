<?php
session_start();
if(!isset($_SESSION['autenticado'])){
  header('Location: ../login.php');
}
print_r($_SESSION);
require_once('../conexao.php');

$acao = $_GET['acao'];

    //Ação para listar os dados
if($acao=='listar'){
  $sql  = "SELECT * FROM equipe;";
  $query = $con->query($sql);
  $lista_equipe = $query->fetchAll();
  require_once('../cabecalho.php');
  require('lista_equipe.php');
  require_once('../rodape.php');
}

    //***AÇÃO NOVO, MOSTRA O FORMULARIO PARA CADASTO
else if($acao=="novo"){
  require_once('../cabecalho.php');
  require('form_equipe.php');
  require_once('../rodape.php');
}

    //**Ação para Cadastro
else if($acao=="cadastrar"){
  $registro = $_POST;
  $sql = "INSERT INTO equipe(nome_equipe, cidade)
  VALUES(:nome_equipe, :cidade);";
  $query = $con->prepare($sql);
  $r   = $query->execute($registro);
  if($r==true) {
    header('Location: crud_equipe.php?acao=listar');
  }else{
    echo "Erro ao tentar cadastrar os dados.";
    print_r($registro);
  }
}
    
    //**AÇÃO PARA EXCLUIR ITEM
else if($acao=="deletar"){
  $id = $_GET['id'];
      //verificando se não esta atrelado ha nenhum dado
  $sql   = "SELECT COUNT(*) as qtd
            FROM equipe WHERE id=:id";
  $query = $con->prepare($sql);
  $r     = $query->execute(array('id'=>$id));
  $qtd   = $query->fetch();
  if($qtd >= 1) {
    header('Location: crud_equipe.php?acao=listar&erro=true');
  }

  $sql = "DELETE FROM equipe WHERE id= :id";
  $query = $con->prepare($sql);
  $r = $query->execute(array('id'=>$id));
  if($r==true){
          //echo "Pessoa eliminada";
    header('Location: crud_equipe.php?acao=listar');
  }else{
    echo "Erro ao tentar excluir o registro";
  }
}

    //**AÇÃO PARA BUSCAR OS DADOS
else if($acao=="buscar"){
  $sql  = "SELECT * FROM equipe WHERE id=:id";
  $query = $con->prepare($sql);
  $params = array('id'=>$_GET['id']);
  $r = $query->execute($params);
  if($r==false){
    echo "Erro ao tentar recuperar os dados";
    die();
  }
  $registro = $query->fetch();
  require_once('../cabecalho.php');
  require "./form_equipe.php";
  require_once('../rodape.php');
}

    //**AÇÃO PARA ATUALIZAR OS DADOS
else if($acao=="atualizar"){
  $sql = "UPDATE equipe
  SET nome_equipe=:nome_equipe, cidade=:cidade
  WHERE id=:id";
  $query = $con->prepare($sql);
  $registro = $_POST;
  $registro['id'] = $_GET['id'];

  $r   = $query->execute($registro);
  if($r==true) {
    header('Location: crud_equipe.php?acao=listar');
  }else{
    echo "Erro ao tentar atualizar os dados";
    print_r($registro);
  }
}

    //** FUNÇÃO PARA RETORNAR OS DADOS
function getEquipes($con){
  $sql  = "SELECT * FROM equipe;";
  $query = $con->query($sql);
  $lista_equipe = $query->fetchAll();
  return $lista_equipe;
}
?>
