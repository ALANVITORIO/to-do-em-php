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
function buscar_tarefas($conexao)
{
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
