<?php
 //ATENÇÃO, ALTERAR CASO A APLICAÇÃO MUDE DE LOCAL OU DE NOME DE PASTA
define('BASE_URL', 'http://localhost/pcorrida/');
?>

<!doctype html>
<html lang="pt_br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Template Admin">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <title>Portal da Corrida</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
  crossorigin="anonymous">

  <style>
  h1{
    text-align: center;
  }

  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>

<!-- Custom styles for this template -->
<link href="<?= BASE_URL; ?>dashboard.css" rel="stylesheet">
</head>
<body>

  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../index.php">Portal Corrida</a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link"
        href="<?= BASE_URL.'login.php?acao=logout'; ?>">Sair</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <!--menu LATERAL início -->
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">

            <li class="nav-item">
              <a class="nav-link active" href="<?= BASE_URL; ?>">
                <span data-feather="home"></span>
                Página Inicial <span class="sr-only"></span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link"
              href="<?= BASE_URL.'atleta/crud_atleta.php?acao=listar';?>">
              <span data-feather="heart"></span>
              Atletas
            </a>
            </li>

            <li class="nav-item">
              <a class="nav-link"
              href="<?= BASE_URL.'treino/lista_treino.php';?>">
              <span data-feather="target"></span>
              Treinos
            </a>
            </li>

            <li class="nav-item">
              <a class="nav-link"
              href="<?= BASE_URL.'corrida/crud_corrida.php?acao=listar';?>">
              <span data-feather="user-check"></span>
              Corridas
            </a>
            </li>

            <li class="nav-item">
              <a class="nav-link"
              href="<?= BASE_URL.'equipe/crud_equipe.php?acao=listar';?>">
              <span data-feather="users"></span>
              Equipes
            </a>
            </li>

            <li class="nav-item">
              <a class="nav-link"
              href="<?= BASE_URL.'evento/crud_evento.php?acao=listar';?>">
              <span data-feather="award"></span>
              Eventos
            </a>
            </li>

          <li class="nav-item">
            <a class="nav-link"
            href="<?= BASE_URL.'categoria/crud_categoria.php?acao=listar';?>">
            <span data-feather="zap"></span>
            Categorias
          </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL.'sobre.php';?>">
              <span data-feather="info"></span> Sobre
          </a>
          </li>
        </ul>
    </div>
    </nav>
<!-- fim do menu -->

<!--Quadro principal-->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
