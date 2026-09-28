<?php
$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim((string)($_POST['nome'] ?? ''));
    $entradas = [$_POST['nota1'] ?? '', $_POST['nota2'] ?? '', $_POST['nota3'] ?? ''];
    $notas = [];
    if ($nome === '' || mb_strlen($nome, 'UTF-8') > 100 || strpbrk($nome, "\r\n,") !== false) {
        $erro = 'Informe um nome de até 100 caracteres, sem vírgulas ou quebras de linha.';
    } else {
        foreach ($entradas as $entrada) {
            $valor = filter_var(str_replace(',', '.', (string)$entrada), FILTER_VALIDATE_FLOAT);
            if ($valor === false || $valor < 0 || $valor > 10) {
                $erro = 'Informe três notas válidas de 0 a 10.';
                break;
            }
            $notas[] = number_format($valor, 2, '.', '');
        }
    }
    if ($erro === '') {
        $arquivo = @fopen(__DIR__ . '/notas.txt', 'a');
        if ($arquivo === false) {
            $erro = 'Não foi possível abrir notas.txt para escrita.';
        } else {
            if (flock($arquivo, LOCK_EX)) {
                $gravado = fwrite($arquivo, implode(',', array_merge([$nome], $notas)) . "\n");
                flock($arquivo, LOCK_UN);
            } else { $gravado = false; }
            fclose($arquivo);
            if ($gravado === false) $erro = 'Não foi possível gravar as notas.';
            else { header('Location: notas_ver.php?salvo=1'); exit; }
        }
    }
}
?>
<!doctype html><html lang="pt-BR"><meta charset="utf-8"><title>Cadastrar notas</title><link rel="stylesheet" href="style.css"><main><h1>Cadastro de notas - slide 38</h1><p>Uma nova linha será adicionada ao fim de notas.txt.</p><?php if ($erro): ?><p class="alerta"><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?><form method="post"><label for="nome">Nome do aluno</label><input id="nome" name="nome" maxlength="100" required value="<?= htmlspecialchars((string)($_POST['nome'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"><?php for ($i = 1; $i <= 3; $i++): ?><label for="nota<?= $i ?>">Nota <?= $i ?></label><input id="nota<?= $i ?>" name="nota<?= $i ?>" type="number" min="0" max="10" step="0.01" required value="<?= htmlspecialchars((string)($_POST['nota' . $i] ?? ''), ENT_QUOTES, 'UTF-8') ?>"><?php endfor; ?><p><button type="submit">Salvar notas</button></p></form><footer><a href="notas_ver.php">Ver notas</a> · <a href="index.php">Início</a></footer></main></html>
