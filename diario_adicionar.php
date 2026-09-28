<?php
$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $texto = trim((string)($_POST['texto'] ?? ''));
    if ($texto === '') {
        $erro = 'Escreva algo antes de salvar.';
    } elseif (mb_strlen($texto, 'UTF-8') > 5000) {
        $erro = 'O texto deve ter no máximo 5.000 caracteres.';
    } else {
        $registro = '## ' . date('d/m/Y H:i') . "\n\n" . $texto . "\n\n---\n\n";
        if (file_put_contents(__DIR__ . '/diario.md', $registro, FILE_APPEND | LOCK_EX) === false) {
            $erro = 'Não foi possível salvar. Verifique a permissão de escrita da pasta.';
        } else {
            header('Location: diario_ver.php?salvo=1');
            exit;
        }
    }
}
?>
<!doctype html><html lang="pt-BR"><meta charset="utf-8"><title>Adicionar ao diário</title><link rel="stylesheet" href="style.css"><main><h1>Meu diário</h1><p>Escreva uma nova entrada. Ela será adicionada ao arquivo diario.md.</p><?php if ($erro): ?><p class="alerta"><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?><form method="post"><label for="texto">Nova entrada</label><textarea id="texto" name="texto" maxlength="5000" required><?= htmlspecialchars((string)($_POST['texto'] ?? ''), ENT_QUOTES, 'UTF-8') ?></textarea><p><button type="submit">Salvar entrada</button></p></form><footer><a href="diario_ver.php">Ver diário</a> · <a href="index.php">Início</a></footer></main></html>
