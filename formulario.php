<form method="POST">
  <input type="hidden" name="id" value="<?php echo isset($tarefa['id']) ? $tarefa['id'] : ''; ?>" />
  <fieldset>
    <legend><?php echo (isset($tarefa['id']) && $tarefa['id'] > 0) ? 'Editar tarefa' : 'Nova tarefa'; ?></legend>
    <label>
      Tarefa:
      <?php if (isset($tem_erros) && $tem_erros && isset($erros_validacao['nome'])) : ?>
        <span class="erro">
          <?php echo $erros_validacao['nome']; ?>
        </span>
      <?php endif; ?>
      <input type="text" name="nome" value="<?php echo isset($tarefa['nome']) ? $tarefa['nome'] : ''; ?>" />
    </label>
    <label>
      Descrição (Opcional):
      <textarea name="descricao"><?php echo isset($tarefa['descricao']) ? $tarefa['descricao'] : ''; ?></textarea>
    </label>
    <label>
      Prazo (Opcional):
      <?php if (isset($tem_erros) && $tem_erros && isset($erros_validacao['prazo'])) : ?>
        <span class="erro">
          <?php echo $erros_validacao['prazo']; ?>
        </span>
      <?php endif; ?>
      <input type="text" name="prazo" value="<?php
                                              echo isset($tarefa['prazo']) ? traduz_data_para_exibir($tarefa['prazo']) : '';
                                              ?>" />
    </label>
    <fieldset>
      <legend>Prioridade:</legend>
      <label>
        <input type="radio" name="prioridade" value="1" <?php echo (isset($tarefa['prioridade']) && $tarefa['prioridade'] == 1)
                                                          ? 'checked'
                                                          : '';
                                                        ?> /> Baixa

        <input type="radio" name="prioridade" value="2" <?php echo (isset($tarefa['prioridade']) && $tarefa['prioridade'] == 2)
                                                          ? 'checked'
                                                          : '';
                                                        ?> /> Média

        <input type="radio" name="prioridade" value="3" <?php echo (isset($tarefa['prioridade']) && $tarefa['prioridade'] == 3)
                                                          ? 'checked'
                                                          : '';
                                                        ?> /> Alta
      </label>
    </fieldset>
    <label>
      Tarefa concluída:
      <input type="checkbox" name="concluida" value="1" <?php echo (isset($tarefa['concluida']) && $tarefa['concluida'] == 1)
                                                          ? 'checked'
                                                          : '';
                                                        ?> />
    </label>
    <button type="submit">
      <?php echo (isset($tarefa['id']) && $tarefa['id'] > 0) ? 'Atualizar' : 'Cadastrar'; ?>
    </button>
  </fieldset>
</form>