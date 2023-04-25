<?php include "contatos.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Lista de Contatos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-10">
        <div class="card">
          <div class="card-header bg-info">
            <h1>Lista de Contatos</h1>
          </div>
          <div class="card-body">

            <form>
              <fieldset>
                <legend>Novo contato</legend>
                <label>
                  Nome:
                  <input type="text" name="nome" />
                </label>
                <label>
                  Telefone:
                  <input type="text" name="telefone" />
                </label>
                <label>
                  E-mail:
                  <input type="text" name="email" />
                </label>
                <input type="submit" value="Cadastrar" />
              </fieldset>
            </form>
          </div>

          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">E-mail</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($lista_contatos as $contato) : ?>
                <tr>
                  <td><?php echo $contato['nome']; ?></td>
                  <td><?php echo $contato['telefone']; ?></td>
                  <td><?php echo $contato['email']; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
</body>

</html>