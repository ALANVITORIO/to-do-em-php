<!DOCTYPE html>
<?php session_start();
include 'banco.php';
$lista_tarefas = buscar_tarefas($conexao);
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
    <fieldset>
      <legend>Prioridade</legend>
      <label>
        <input type="radio" name="prioridade" value="1">Baixa
        <input type="radio" name="prioridade" value="2">Média
        <input type="radio" name="prioridade" value="3">Alta
      </label>
    </fieldset>
    <p> Tarefa concluída :</p>
    <label>
      <input type="checkbox" name="concluida" value="sim">
    </label>
    <input type="submit" value="Cadastrar">
  </form>

  <table>
    <tr>
      <th>Tarefa</th>
      <th>Descrição</th>
      <th>Prazo</th>
      <th>Prioridade</th>
      <th>Concluída</th>
    </tr>
    <?php
    if (isset($lista_tarefas)) {
      foreach ($lista_tarefas as $tarefa) : ?>
        <tr>
          <td><?php echo $tarefa['nome']; ?></td>
          <td><?php echo $tarefa['descricao']; ?></td>
          <td><?php echo $tarefa['prazo']; ?></td>
          <td><?php echo $tarefa['prioridade']; ?></td>
          <td><?php echo $tarefa['concluida']; ?></td>
        </tr>
    <?php endforeach;
    } ?>
  </table>
</body>

</html>