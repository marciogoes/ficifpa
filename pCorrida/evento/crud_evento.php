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
  $sql  = "SELECT e.id, a.nome, c.nome_corrida
  FROM evento e
  left join corrida c on c.id=e.id_corrida
  left join atleta a on a.id=e.id_atleta";
  $query = $con->query($sql);
  $lista_evento = $query->fetchAll();
  require_once('../cabecalho.php');
  require('lista_evento.php');
  require_once('../rodape.php');
}

    //***AÇÃO NOVO, MOSTRA O FORMULARIO PARA CADASTO
else if($acao=="novo"){
  require_once('../cabecalho.php');
  require('form_evento.php');
  require_once('../rodape.php');
}

    //**Ação para Cadastro
else if($acao=="cadastrar"){
  $registro = $_POST;

  $sql = "INSERT INTO evento(id_atleta, id_corrida)
  VALUES(:id_atleta, :id_corrida);";
  $query = $con->prepare($sql);
  $r   = $query->execute($registro);
  if($r==true) {
    header('Location: crud_evento.php?acao=listar');
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
  FROM evento WHERE id=:id";
  $query = $con->prepare($sql);
  $r     = $query->execute(array('id'=>$id));
  $qtd   = $query->fetch();
  if($qtd >= 1) {
    header('Location: crud_evento.php?acao=listar&erro=true');
  }

  $sql = "DELETE FROM evento WHERE id= :id";
  $query = $con->prepare($sql);
  $r = $query->execute(array('id'=>$id));
  if($r==true){
    header('Location: crud_evento.php?acao=listar');
  }else{
    echo "Erro ao tentar excluir o registro";
  }
}

//     //**AÇÃO PARA EXCLUIR ITEM
// else if($acao=="deletar"){
//   $id = $_GET['id'];
//   $sql = "DELETE FROM evento WHERE id= :id";
//   $query = $con->prepare($sql);
//   $r = $query->execute(array('id'=>$id));
//   if($r==true){
//     header('Location: crud_evento.php?acao=listar');
//   }else{
//     echo "Erro ao tentar excluir o registro";
//     print_r($query->errorinfo());
//   }
// }
    
    //**AÇÃO PARA BUSCAR OS DADOS
else if($acao=="buscar"){
  $sql  = "SELECT * FROM evento WHERE id=:id";
  $query = $con->prepare($sql);
  $params = array('id'=>$_GET['id']);
  $r = $query->execute($params);
  if($r==false){
    echo "Erro ao tentar recuperar os dados";
    die();
  }
  $registro = $query->fetch();
  require_once('../cabecalho.php');
  require "./form_evento.php";
  require_once('../rodape.php');
}
    //**AÇÃO PARA ATUALIZAR OS DADOS
else if($acao=="atualizar"){
  $sql = "UPDATE evento
          SET id_atleta=:id_atleta,
          id_corrida=:id_corrida
          WHERE id=:id";
  $query = $con->prepare($sql);
  $registro = $_POST;
  $registro['id'] = $_GET['id'];

  $r   = $query->execute($registro);
  if($r==true) {
    header('Location: crud_evento.php?acao=listar');
  }else{
    echo "Erro ao tentar atualizar os dados";
    print_r($registro);
  }
}
    //** FUNÇÃO PARA RETORNAR OS REGISTROS
function getEventos($con){
  $sql  = "SELECT * FROM evento;";
  $query = $con->query($sql);
  $lista_evento = $query->fetchAll();
  return $lista_evento;
}
?>
