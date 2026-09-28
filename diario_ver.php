<?php
$caminho = __DIR__ . '/diario.md';
$conteudo = is_file($caminho) ? file_get_contents($caminho) : '';
?>
<!doctype html><html lang="pt-BR"><meta charset="utf-8"><title>Diário salvo</title><link rel="stylesheet" href="style.css"><main><h1>Entradas do diário</h1><?php if (isset($_GET['salvo'])): ?><p class="ok">Entrada salva com sucesso.</p><?php endif; ?><?php if ($conteudo === false): ?><p class="alerta">Não foi possível ler o diário.</p><?php elseif (trim($conteudo) === ''): ?><p>Nenhuma entrada ainda.</p><?php else: ?><div class="entrada"><?= nl2br(htmlspecialchars($conteudo, ENT_QUOTES, 'UTF-8')) ?></div><?php endif; ?><footer><a href="diario_adicionar.php">Adicionar entrada</a> · <a href="index.php">Início</a></footer></main></html>
