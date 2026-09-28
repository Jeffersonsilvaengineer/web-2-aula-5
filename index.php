<?php
$links = [
    'Arrays e JSON' => 'praticas.php',
    'Consultar CEP com foreach' => 'cep.php',
    'Leitura de arquivo' => 'leitura.php',
    'Escrever no diário' => 'diario_adicionar.php',
    'Ler o diário' => 'diario_ver.php',
    'Cadastrar notas' => 'notas_adicionar.php',
    'Ver notas' => 'notas_ver.php',
];
?>
<!doctype html><html lang="pt-BR"><meta charset="utf-8"><title>Aula 5 - Desenvolvimento Web 2</title><link rel="stylesheet" href="style.css"><main><h1>Aula 5 - PHP</h1><p>Atividades resolvidas conforme os slides.</p><nav><?php foreach ($links as $titulo => $destino): ?><a href="<?= htmlspecialchars($destino, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8') ?></a><?php endforeach; ?></nav></main></html>
