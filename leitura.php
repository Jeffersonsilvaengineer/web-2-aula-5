<?php
$caminho = __DIR__ . '/php_aula5_exemplo1.txt';
$existe = is_file($caminho);
$linhas = [];
$arquivo = @fopen($caminho, 'r');
if ($arquivo !== false) {
    while (($linha = fgets($arquivo)) !== false) {
        $linhas[] = str_getcsv(rtrim($linha, "\r\n"), ',', '"', '\\');
    }
    fclose($arquivo);
}
$cabecalho = array_shift($linhas);
?>
<!doctype html><html lang="pt-BR"><meta charset="utf-8"><title>Leitura de arquivo</title><link rel="stylesheet" href="style.css"><main><h1>Leitura de arquivo - slides 27 e 33</h1>
<h2>Conteúdo completo (readfile)</h2><?php if (!$existe): ?><p class="alerta">Arquivo de exemplo não encontrado.</p><?php else: ?><pre><?php ob_start(); readfile($caminho); echo htmlspecialchars(ob_get_clean(), ENT_QUOTES, 'UTF-8'); ?></pre><?php endif; ?>
<h2>Linhas em tabela (fopen, fgets e fclose)</h2><?php if ($cabecalho !== null): ?><table><thead><tr><?php foreach ($cabecalho as $coluna): ?><th><?= htmlspecialchars($coluna, ENT_QUOTES, 'UTF-8') ?></th><?php endforeach; ?></tr></thead><tbody><?php foreach ($linhas as $campos): ?><tr><?php foreach ($campos as $campo): ?><td><?= htmlspecialchars($campo, ENT_QUOTES, 'UTF-8') ?></td><?php endforeach; ?></tr><?php endforeach; ?></tbody></table><?php endif; ?>
<footer><a href="index.php">Voltar ao início</a></footer></main></html>
