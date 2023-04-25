<?php

$bdServidor = 'localhost';
$bdUsuario = 'sistematarefas';
$bdSenha = '1234';
$bdBanco = 'tarefas';


$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

if (mysqli_connect_errno()) {
  echo "Problemas para conectar no banco. Verifique os dados!";
  die();
}

mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

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

function gravar_tarefa($conexao, $tarefa)
{
  $sqlGravar = "INSERT INTO tarefas
                  (nome, descricao, prioridade,prazo,concluida)
                  VALUES
                  (
                    '{$tarefa['nome']}',
                    '{$tarefa['descricao']}',
                    {$tarefa['prioridade']},
                    '{$tarefa['prazo']}',
                    {$tarefa['concluida']}
                  )
                 ";

  mysqli_query($conexao, $sqlGravar);
}

function buscar_tarefa($conexao, $id)
{
  $sqlBusca = 'SELECT * FROM tarefas WHERE id = ' . $id;
  $resultado = mysqli_query($conexao, $sqlBusca);
  return mysqli_fetch_assoc($resultado);
}
function editar_tarefa($conexao, $tarefa)
{
  $sql = "UPDATE tarefas SET
            nome = '{$tarefa['nome']}',
            descricao = '{$tarefa['descricao']}',
            prioridade = {$tarefa['prioridade']},
            prazo = '{$tarefa['prazo']}',
            concluida = {$tarefa['concluida']}
        WHERE id = {$tarefa['id']}";

  mysqli_query($conexao, $sql);
}
function remover_tarefa($conexao, $id)
{
  $sql = "DELETE FROM tarefas WHERE id = {$id}";

  mysqli_query($conexao, $sql);
}

function gravar_anexo($conexao, $anexo)
{
  $sqlGravar = "INSERT INTO anexos
                  (tarefa_id, nome, arquivo)
                  VALUES
                  (
                    {$anexo['tarefa_id']},
                    '{$anexo['nome']}',
                    '{$anexo['arquivo']}'
                   )
                 ";

  mysqli_query($conexao, $sqlGravar);
}

function buscar_anexos($conexao, $tarefa_id)
{
  $sql = 'SELECT * FROM anexos WHERE tarefa_id = ' . $tarefa_id;
  $resultado = mysqli_query($conexao, $sql);

  $anexos = array();

  while ($anexo = mysqli_fetch_assoc($resultado)) {
    $anexos[] = $anexo;
  }

  return $anexos;
}
