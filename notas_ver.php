<?php
$registros = [];
$arquivo = @fopen(__DIR__ . '/notas.txt', 'r');
if ($arquivo !== false) {
    while (($linha = fgets($arquivo)) !== false) {
        $campos = str_getcsv(rtrim($linha, "\r\n"), ',', '"', '\\');
        if (count($campos) === 4) $registros[] = $campos;
    }
    fclose($arquivo);
}
?>
<!doctype html><html lang="pt-BR"><meta charset="utf-8"><title>Notas salvas</title><link rel="stylesheet" href="style.css"><main><h1>Notas cadastradas</h1><?php if (isset($_GET['salvo'])): ?><p class="ok">Notas salvas com sucesso.</p><?php endif; ?><?php if (!$registros): ?><p>Nenhum aluno cadastrado ainda.</p><?php else: ?><table><thead><tr><th>Aluno</th><th>Nota 1</th><th>Nota 2</th><th>Nota 3</th></tr></thead><tbody><?php foreach ($registros as $campos): ?><tr><?php foreach ($campos as $campo): ?><td><?= htmlspecialchars($campo, ENT_QUOTES, 'UTF-8') ?></td><?php endforeach; ?></tr><?php endforeach; ?></tbody></table><?php endif; ?><footer><a href="notas_adicionar.php">Cadastrar aluno</a> · <a href="index.php">Início</a></footer></main></html>
