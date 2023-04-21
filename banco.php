<?php
$bdServidor = 'localHost';
$bdUsuario = 'sistematarefas';
$bdSenha = '1234';
$bdBanco = 'tarefas';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);
if (mysqli_connect_errno()) {
  echo "Problemas para conectar no banco. Verifique os dados!";
  die();
}


function buscar_tarefa($conexao)
{
  $sqlBusca = 'SELECT * FROM tarefas';
  $resultado = mysqli_query($conexao, $sqlBusca);
  $tarefas = array();
  while ($tarefa = mysqli_fetch_assoc($resultado)) {
    $tarefas[] = $tarefa;
  }
  return $tarefas;
}

function editar_tarefa($conexao, $tarefa)
{
  $sqlEditar = "
    UPDATE tarefas SET
    nome = '{$tarefa['nome']}',
    descricao = '{$tarefa['descricao']}',
    prazo = '{$tarefa['prazo']}',
    prioridade = '{$tarefa['prioridade']}',
    concluida = '{$tarefa['concluida']}'
    WHERE id = {$tarefa['id']}
  ";
  mysqli_query($conexao, $sqlEditar);
} {
  $sqlBusca = 'SELECT * FROM tarefa';
  $resultado = mysqli_query($conexao, $sqlBusca);
  $tarefas = array();
  while ($tarefa = mysqli_fetch_assoc($resultado)) {
    $tarefas[] = $tarefa;
  }
  return $tarefas;
}

function gravar_tarefas($conexao, $tarefa)
{
  $sqlGravar = "
    INSERT INTO tarefa
    (nome, descricao, prazo, prioridade, concluida)
    VALUES
    (
      '{$tarefa['nome']}',
      '{$tarefa['descricao']}',
      '{$tarefa['prazo']}',
      '{$tarefa['prioridade']}',
      '{$tarefa['concluida']}'
    )";
  mysqli_query($conexao, $sqlGravar);
}
