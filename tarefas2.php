<!DOCTYPE html>
<html>

<head>
  <title>Gerenciador de Tarefas</title>
  <link rel="stylesheet" type="text/css" href="tarefas.css">
</head>

<body>
  <h1>Gerenciador de Tarefas</h1>
  <form>
    <fieldset>
      <legend>Nova tarefa</legend>
      <label>
        Tarefa:
        <input type="text" name="nome" />
      </label>
      <input type="submit" value="Cadastrar" />
    </fieldset>
  </form>
  <?php

  $cookie_nome = "nome";

  if (isset($_GET['nome'])) {
    setcookie($cookie_nome, $_GET['nome']);
  }

  ?>

  <table>
    <tr>
      <th>Tarefas</th>
    </tr>

    <?php if (isset($_COOKIE[$cookie_nome])) : ?>
      <tr>
        <td><?php echo $_COOKIE[$cookie_nome]; ?></td>
      </tr>
    <?php endif; ?>
  </table>

</body>

</html>