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
  $sql  = "select a.id, a.nome, e.nome_equipe, c.categoria, a.documento, a.info_adicionais
  FROM atleta as a
  left JOIN equipe as e ON a.id_equipe = e.id
  left JOIN categoria c ON a.id_categoria = c.id;";
  $query = $con->query($sql);
  $lista_atleta = $query->fetchAll();
      // print_r($lista); exit;
  require_once('../cabecalho.php');
  require('lista_atleta.php');
  require_once('../rodape.php');
}
    //***AÇÃO NOVO, MOSTRA O FORMULARIO PARA CADASTO
else if($acao=="novo"){
  $lista_atleta = getAtletas($con);
  require_once('../cabecalho.php');
  require('form_atleta.php');
  require_once('../rodape.php');
}
    //**Ação para Cadastro
else if($acao=="cadastrar"){
  $registro = $_POST;
  $sql = "INSERT INTO atleta (nome, id_equipe, id_categoria, documento, info_adicionais)
  VALUES (:nome, :id_equipe, :id_categoria, :documento, :info_adicionais)";
  $query = $con->prepare($sql);
  $r   = $query->execute($registro);
  if($r==true) {
        // echo "Dados Cadastrados com sucesso";
        //--redirecionando a Aplicação para a listagem de Pessoas.
    header('Location: crud_atleta.php?acao=listar');
  }else{
    echo "Erro ao tentar cadastrar os dados";
    print_r($registro);
  }
}

 //**AÇÃO PARA EXCLUIR DADOS
else if($acao=="deletar"){
  $id = $_GET['id'];
      //verificando se não esta atrelado ha nenhum dado
  $sql   = "SELECT COUNT(*) as qtd
  FROM atleta WHERE id=:id";
  $query = $con->prepare($sql);
  $r     = $query->execute(array('id'=>$id));
  $qtd   = $query->fetch();
  if($qtd >= 1) {
    header('Location: crud_atleta.php?acao=listar&erro=true');
  }

  $sql = "DELETE FROM atleta WHERE id= :id";
  $query = $con->prepare($sql);
  $r = $query->execute(array('id'=>$id));
  if($r==true){
    header('Location: crud_atleta.php?acao=listar');
  }else{
    echo "Erro ao tentar excluir o registro";
  }
}

    //**AÇÃO PARA BUSCAR OS DADOS
else if($acao=="buscar"){
  $sql  = "SELECT * FROM atleta WHERE id=:id";
  $query = $con->prepare($sql);
  $params = array('id'=>$_GET['id']);
  $r = $query->execute($params);
  if($r==false){
    echo "Erro ao tentar recuperar os dados";
    die();
  }
  $registro = $query->fetch();
      // print_r($registro); exit();
  $lista_atleta = getAtletas($con);
  require_once('../cabecalho.php');
  require "./form_atleta.php";
  require_once('../rodape.php');
}
    //**AÇÃO PARA ATUALIZAR OS DADOS
else if($acao=="atualizar"){
  $sql = "UPDATE atleta
  SET  id=:id,
  nome=:nome,
  id_equipe=:id_equipe,
  id_categoria=:id_categoria,
  documento=:documento,
  info_adicionais=:info_adicionais
  WHERE id=:id";
  $query = $con->prepare($sql);

  $registro = $_POST;
  $registro['id'] = $_GET['id'];

  $r   = $query->execute($registro);
  if($r==true) {
    header('Location: crud_atleta.php?acao=listar');
  }else{
    echo "Erro ao tentar atualizar os dados";
    print_r($registro);
  }
}

//funções em PHP
function getAtletas($con){
  $sql  = "SELECT * FROM atleta;";
  $query = $con->query($sql);
  $lista_atleta = $query->fetchAll();
  return $lista_atleta;
}
?>
