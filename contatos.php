<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}




if (isset($_GET['nome']) && $_GET['nome'] != '') {
  $contato = array();

  $contato['nome'] = $_GET['nome'];

  if (isset($_GET['telefone']) && $_GET['telefone'] != '') {
    $contato['telefone'] = $_GET['telefone'];
  }
  if (isset($_GET['email']) && $_GET['email'] != '') {
    $contato['email'] = $_GET['email'];
  }
  $_SESSION['lista_contatos'][] = $contato;
}

if (isset($_SESSION['lista_contatos'])) {
  $lista_contatos = $_SESSION['lista_contatos'];
} else {
  $lista_contatos = array();
}

include_once "template.php";
