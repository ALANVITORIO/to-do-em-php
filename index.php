<!DOCTYPE html>

<?php session_start();
include 'banco.php';
include 'helpers.php';


$lista_tarefas = buscar_tarefa($conexao);
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body>
  <h1>Gerenciador de tarefas</h1>
  <?php include('formulario.php'); ?>

  <?php if ($exibir_tabela) : ?>
    <?php include('tabela.php'); ?>
  <?php endif; ?>
</body>

<form action="processa_tarefa.php" method="GET">
  <label>
    Nome:
    <input type="text" name="nome">
  </label>
  <label>
    <p>Descrição</p>
    <textarea name="descricao"></textarea>
  </label>
  <label>
    <p>Prazo</p>
    <input type="date" name="prazo">
  </label>
</form>


</html>